<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\CampaignStep;
use Illuminate\Http\Request;

class InfluencerStepController extends Controller
{
    public function index($campaignId)
    {
        $campaignStep = CampaignStep::where('campaignId', '=', $campaignId)->get();
        return view('influencer.campaignView.viewStep', \compact('campaignStep'));
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        //
    }

    public function show($id)
    {
        //
    }


    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }
}
