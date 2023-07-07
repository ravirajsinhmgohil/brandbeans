<?php

namespace App\Http\Controllers;

use App\Models\Writerslogan;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreWritersloganRequest;
use App\Http\Requests\UpdateWritersloganRequest;
use App\Models\CardsModels;
use App\Models\Category;
use App\Models\Links;
use App\Models\Payment;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class WritersloganController extends Controller
{

    public function index(Request $request)
    {
        $userId = Auth::user()->id;
        $writer = Writerslogan::join('admincategories', 'admincategories.id', '=', 'writerslogans.categoryId')
            ->where('writerslogans.userId', '=',  $userId)
            ->get(['writerslogans.*', 'admincategories.name as categoryName']);
        return view('writer.index', \compact('writer'));
        // if (isset($_SESSION['status'])) {
        //     $status = $_SESSION['status'];
        // } else {
        //     $status = $request->status;
        // }
        // if ($status == "Pending") {
        //     $writer = Writerslogan::join('admincategories', 'admincategories.id', '=', 'writerslogans.categoryId')
        //         ->where('status', '=', $status)
        //         ->paginate(1, ['writerslogans.*', 'admincategories.name as categoryName']);
        //     return view('writer.index', \compact('writer'));
        // } else if ($status == "Approved") {
        //     $writer = Writerslogan::join('admincategories', 'admincategories.id', '=', 'writerslogans.categoryId')
        //         ->where('status', '=', $status)
        //         ->paginate(1, ['writerslogans.*', 'admincategories.name as categoryName']);
        //     return view('writer.index', \compact('writer'));
        // } else {
        //     $writer = Writerslogan::join('admincategories', 'admincategories.id', '=', 'writerslogans.categoryId')
        //         ->paginate(5, ['writerslogans.*', 'admincategories.name as categoryName']);
        //     return view('writer.index', \compact('writer'));
        // }
    }


    public function create()
    {
        $category = Category::where('name', '!=', 'Individual')
            ->get();
        return view('writer.create', compact('category'));
    }


    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required',
            'categoryId' => 'required',
        ]);

        $userId = Auth::user()->id;
        $writer = new Writerslogan();
        $writer->userId = $userId;
        $writer->title = $request->title;
        $writer->categoryId = $request->categoryId;
        $writer->status = "Pending";

        $writer->save();

        return redirect('writer/index')->with('success', 'Slogan Created Successfully');
    }


    public function show()
    {
        //
    }


    public function edit($id)
    {
        $writer = Writerslogan::find($id);
        $category = Category::all();
        return view('writer.edit', \compact('writer', 'category'));
    }


    public function update(Request $request)
    {
        $this->validate($request, [
            'title' => 'required',
            'categoryId' => 'required',
        ]);

        $id = $request->writerId;
        $writer =  Writerslogan::find($id);
        $writer->title = $request->title;
        $writer->categoryId = $request->categoryId;
        $writer->status = "Pending";
        $writer->save();

        return redirect('writer/index')->with('success', 'Slogan Created Successfully');
    }


    public function destroy($id)
    {
        $writer = Writerslogan::find($id);
        $writer->delete();
        return redirect('writer/index')->with('success', 'Slogan Deleted Successfully');
    }

    public function RegisterWriter()
    {
        return view('new_writer');
    }

    public function RegisterWriterstore(Request $request)
    {
        $mobileno = $request->mobileno;
        $email = $request->email;
        $usercount = User::where('mobileno', '=', $mobileno)->get()->count();
        $useremailcount = User::where('email', '=', $email)->get()->count();
        if ($useremailcount > 0) {

            $user = User::where('email', '=', $email)->first();
            $userId  = $user->id;
            $userData = User::find($userId);
            $userData->mobileno = $mobileno;
            $userData->save();
            if ($usercount > 0) {
                $user = User::where('mobileno', '=', $mobileno)->first();

                $userData = User::find($userId);
                $userData->mobileno = $mobileno;
                $userData->assignRole(['Writer', 'User']);
                $userData->save();
                return redirect('login');
            }
            return redirect('login');
        } else {
            $this->validate($request, [
                'name' => 'required',
                'username' => ['required', 'string', 'max:255'],
                'email' => 'required|email',
                'mobileno' => 'required',
                'password' => 'required|same:confirm-password',
            ]);

            $user = new User();
            $user->name = $request->name;
            $user->username = $request->username;
            $user->email = $request->email;
            $user->mobileno = $request->mobileno;
            $user->password = Hash::make($request->password);
            $user->assignRole(['Writer', 'User']);
            $user->package = "FREE";
            $user->save();

            $category = category::where('name', '=', 'Individual')->first();
            $card = new CardsModels();
            $card->name = $user->name;
            $card->user_id = $user->id;
            $card->category = $category->id;
            $card->save();

            $payment = new Payment();
            $payment->card_id = $card->id;
            $payment->save();

            $links = new Links();
            $links->card_id  = $card->id;
            $links->phone1  = $user->mobileno;
            $links->save();

            return redirect('login');
        }
    }
}
