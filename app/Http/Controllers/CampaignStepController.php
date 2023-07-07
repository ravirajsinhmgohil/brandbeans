<?php

namespace App\Http\Controllers;

use App\Models\CampaignStep;
use App\Http\Controllers\Controller;
use App\Models\Campaign;
use Illuminate\Http\Request;

class CampaignStepController extends Controller
{
    public function index()
    {
        $step = CampaignStep::with('campaign')->get();
        return view('brand.campaignStep.index', compact('step'));
    }

    public function create()
    {
        $campaign = Campaign::all();
        return view('brand.campaignStep.create', \compact('campaign'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'campaignId' => 'required',
            'title' => 'required',
            'detail' => 'required',
        ]);
        $campaign = new CampaignStep();
        $campaign->campaignId = $request->campaignId;
        $campaign->title = $request->title;
        $campaign->detail = $request->detail;
        $campaign->save();

        return redirect('brand/campaign/step/index')->with('success', 'Campaign step Added Successfully..');
    }

    public function show()
    {
        //
    }

    public function edit($id)
    {
        $step = CampaignStep::find($id);
        $campaign = Campaign::all();
        return view('brand.campaignStep.edit', compact('step', 'campaign'));
    }

    public function update(Request $request)
    {
        $this->validate($request, [
            'campaignId' => 'required',
            'title' => 'required',
            'detail' => 'required',
        ]);
        $id = $request->campaignStepId;
        $campaign = CampaignStep::find($id);
        $campaign->campaignId = $request->campaignId;
        $campaign->title = $request->title;
        $campaign->detail = $request->detail;
        $campaign->save();

        return redirect('brand/campaign/step/index')->with('success', 'Campaign step updated Successfully..');
    }

    public function delete($id)
    {
        CampaignStep::find($id)->delete();
        return redirect('brand/campaign/step/index')->with('success', 'Campaign step deleted Successfully..');
    }
}
