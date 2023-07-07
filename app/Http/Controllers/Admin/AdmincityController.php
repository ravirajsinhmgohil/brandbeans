<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\City;
use App\Models\State;
use Illuminate\Http\Request;

class AdmincityController extends Controller
{
    //
    function __construct()
    {
        $this->middleware('permission:city-list|city-create|city-edit|city-delete', ['only' => ['index', 'store']]);
        $this->middleware('permission:city-create', ['only' => ['create', 'store']]);
        $this->middleware('permission:city-edit', ['only' => ['edit', 'update']]);
        $this->middleware('permission:city-delete', ['only' => ['destroy']]);
    }
    public function index()
    {
        $city = City::join('states', 'states.id', '=', 'cities.statid')
            ->where('cities.is_delete', '=', 'Active')
            ->get(['cities.*', 'states.sname']);
        return view('admincity.index', compact('city'));
    }
    public function create()
    {
        $state = State::all();
        return view('admincity.create', compact('state'));
    }
    public function store(REQUEST $request)
    {
        $city = new City();
        $city->city = $request->cityname;
        $city->statid = $request->statename;
        $city->is_delete = 'Active';
        $city->save();
        return redirect('admincity/index');
    }
    public function edit($id)
    {
        $city = City::find($id);
        $state = State::all();
        return view('admincity.edit', compact('city', 'state'));
    }

    public function update(Request $request)
    {

        $id = $request->cityid;
        // return $id;
        $city = City::find($id);
        // return $city;
        $city->city = $request->cityname;
        $city->statid = $request->statename;
        $city->save();
        return redirect('admincity/index');
    }

    public function delete($id)
    {
        $city = City::find($id);
        $city->is_delete = "Deactive";
        $city->save();
        // return $city;
        return redirect()->back();
    }
}
