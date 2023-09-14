<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\CardsModels;
use App\Models\Links;
use App\Models\Payment;
use App\Models\User;
use Spatie\Permission\Models\Role;
use DB;
use Hash;
use Illuminate\Support\Arr;

class UserController extends Controller
{
    function __construct()
    {
        $this->middleware('permission:users-list|users-create|users-edit|users-delete', ['only' => ['index', 'store']]);
        $this->middleware('permission:users-create', ['only' => ['create', 'store']]);
        $this->middleware('permission:users-edit', ['only' => ['edit', 'update']]);
        $this->middleware('permission:users-delete', ['only' => ['destroy']]);
        //  $this->middleware('permission:users-payment', ['only' => ['destroy']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        // 
        try {
            $data = User::whereHas('roles', function ($query) {
                return $query->where('name', '!=', 'User');
            })->orderBy('id', 'DESC')->paginate(50);
            $userRoles = Role::all();

            $search = $request->roleSearch;
            if ($search == "Admin") {
                $data = User::whereHas('roles', function ($query) {
                    return $query->where('name', '=', 'Admin');
                })->orderBy('id', 'DESC')->paginate(50);
            }
            if ($search == "Brand") {
                $data = User::whereHas('roles', function ($query) {
                    return $query->where('name', '=', 'Brand');
                })->orderBy('id', 'DESC')->paginate(50);
            }
            if ($search == "Influencer") {
                $data = User::whereHas('roles', function ($query) {
                    return $query->where('name', '=', 'Influencer');
                })->orderBy('id', 'DESC')->paginate(50);
            }
            if ($search == "Reseller") {
                $data = User::whereHas('roles', function ($query) {
                    return $query->where('name', '=', 'Reseller');
                })->orderBy('id', 'DESC')->paginate(50);
            }
            if ($search == "Designer") {
                $data = User::whereHas('roles', function ($query) {
                    return $query->where('name', '=', 'Designer');
                })->orderBy('id', 'DESC')->paginate(50);
            }
            if ($search == "Writer") {
                $data = User::whereHas('roles', function ($query) {
                    return $query->where('name', '=', 'Writer');
                })->orderBy('id', 'DESC')->paginate(50);
            }

            return view('users.index', compact('data', 'userRoles'))
                ->with('i', ($request->input('page', 1) - 1) * 5);
            // $data = User::all();
        } catch (\Throwable $th) {
            //throw $th;    
            return view('servererror');
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        try {
            $roles = Role::pluck('name', 'name')->all();
            return view('users.create', compact('roles'));
        } catch (\Throwable $th) {
            //throw $th;    
            return view('servererror');
            // return view("adminCategory.index", compact('category'));
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|same:confirm-password',
            'roles' => 'required',
            'mobileno' => 'required',
        ]);

        try {
            $input = $request->all();
            $input['password'] = Hash::make($input['password']);

            $input['username'] = $input['name'];
            $input['package'] = "FREE";
            $user = User::create($input);
            $user->assignRole($request->input('roles'));
            if ($request->profilePhoto) {
                $user->profilePhoto = time() . '.' . $request->profilePhoto->extension();
                $request->profilePhoto->move(public_path('profile'), $user->profilePhoto);
            }
            $user->save();

            $userUpdate  = User::find($user->id);
            $userUpdate->assignRole('User');
            $userUpdate->save();

            $card = new CardsModels();
            $card->userid = $user->id;
            $card->save();

            $payment = new Payment();
            $payment->card_id = $card->id;
            $payment->save();

            $links = new Links();
            $links->card_id  = $card->id;
            $links->phone1  = $user->mobileno;
            $links->save();
            return redirect()->route('users.index')
                ->with('success', 'User created successfully');
        } catch (\Throwable $th) {
            //throw $th;    
            return view('servererror');
            // return view("adminCategory.index", compact('category'));
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        try {
            $user = User::find($id);
            $roles = Role::pluck('name', 'name')->all();
            $userRole = $user->roles->pluck('name', 'name')->all();
            return view('users.show', compact('user', 'roles', 'userRole'));
        } catch (\Throwable $th) {
            //throw $th;    
            return view('servererror');
            // return view("adminCategory.index", compact('category'));
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        try {
            $user = User::find($id);
            $roles = Role::pluck('name', 'name')->all();
            $userRole = $user->roles->pluck('name', 'name')->all();

            return view('users.edit', compact('user', 'roles', 'userRole'));
        } catch (\Throwable $th) {
            //throw $th;    
            return view('servererror');
            // return view("adminCategory.index", compact('category'));
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email|unique:users,email,' . $id,
            // 'password' => 'same:confirm-password',
            'roles' => 'required'
        ]);

        try {
            $input = $request->all();
            // if (!empty($input['password'])) {
            //     $input['password'] = Hash::make($input['password']);
            // } else {
            //     $input = Arr::except($input, array('password'));
            // }

            $user = User::find($id);
            $user->update($input);
            DB::table('model_has_roles')->where('model_id', $id)->delete();

            $user->assignRole($request->input('roles'));

            return redirect()->route('users.index')
                ->with('success', 'User updated successfully');
        } catch (\Throwable $th) {
            //throw $th;    
            return view('servererror');
            // return view("adminCategory.index", compact('category'));
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            User::find($id)->delete();
            return redirect()->route('users.index')
                ->with('success', 'User deleted successfully');
        } catch (\Throwable $th) {
            //throw $th;    
            return view('servererror');
            // return view("adminCategory.index", compact('category'));
        }
    }
}
