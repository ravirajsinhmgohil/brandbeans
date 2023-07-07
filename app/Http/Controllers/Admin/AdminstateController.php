<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\State;

use Illuminate\Http\Request;

class AdminstateController extends Controller
{
    //
    function __construct()
    {
        $this->middleware('permission:state-list|state-create|state-edit|state-delete', ['only' => ['index', 'store']]);
        $this->middleware('permission:state-create', ['only' => ['create', 'store']]);
        $this->middleware('permission:state-edit', ['only' => ['edit', 'update']]);
        $this->middleware('permission:state-delete', ['only' => ['destroy']]);
    }
    public function index()
    {
        $state = State::where('is_delete', '=', 'Active')->get();
        // return $state;
        return view('adminstate.index', compact('state'));
    }
    public function create()
    {
        return view('adminstate.create');
    }
    public function store(REQUEST $request)
    {
        $this->validate($request, [
            'statename' => 'required',
        ]);

        $state = new State();
        $state->sname = $request->statename;
        $state->is_delete = 'Active';
        $state->save();
        return redirect('adminstate/index');
    }
    public function edit($id)
    {
        //
        $state = State::find($id);
        // return $state;
        return view('adminstate.edit', compact('state'));
    }

    public function update(Request $request)
    {

        $id = $request->stateid;
        // return $id;
        $state = State::find($id);
        $state->sname = $request->statename;
        $state->save();
        return redirect('adminstate/index');
    }
    public function delete($id)
    {
        $state = State::find($id);
        $state->is_delete = 'Deactive';
        $state->save();
        return redirect()->back();
    }
}
