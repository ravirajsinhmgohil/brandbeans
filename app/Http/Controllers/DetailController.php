<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CardsModels;
use Auth;
class DetailController extends Controller
{
    //

    // public function create()
    // {
    //     return view('details.create');
    // }
    // public function edit($id)
    // {

    //     $details = CardsModels::find($id);
    //     return view('demo',compact('details'));
       
    // }

    // public function update($id, Request $req)
    // {
    //      $id=$req->id;
    //         $details = CardsModels::find($id);
    //         $details->name = $req->name;
    //         $details->heading = $req->heading;
    //         $details->companyname = $req->companyname;
    //         $details->location = $req->location;
    //         $details->about =$req->about;
            
    //         $details->save();
       
    //     return json_encode(array('statusCode'=>200));
      
    // }


    // public function store(Request $request)
    // {
    //     $id = Auth::user()->id;
    //     $validatedData = $request->validate([
    //       'name' => 'required',
    //       'companyname' => 'required|max:255',
    //     ]);
 
    //     $save = new CardsModels;
    //     $save->user_id = $id;
    //     $save->name = $request->name;
    //     $save->heading = $request->heading;
    //     $save->companyname = $request->companyname;
    //     $save->location = $request->location;
    //     $save->about = $request->about;
    //     $save ->save();
 
    //     return redirect()->route('link.create')->with('status', 'Ajax Form Data Has Been validated and store into database');
 
    // }
    public function store(Request $request)
    {

        $id = Auth::user()->id;
        $details = new CardsModels();
        $details->user_id = $id;
        $details->name = $request->name;
        $details->heading = $request->heading;
        $details->companyname = $request->companyname;
        $details->location = $request->location;
        $details->about = $request->about;
        $details ->save();
        
        $response=Array('status'=>true,"msg"=>"inserted",'data'=>$request->all());
        return $response; 
 
    }
   
    
}
