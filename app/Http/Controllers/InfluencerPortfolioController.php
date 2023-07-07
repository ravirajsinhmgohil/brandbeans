<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\InfluencerPortfolio;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class InfluencerPortfolioController extends Controller
{
    public function index()
    {
        $portfolio = InfluencerPortfolio::all();
        return view('influencer.portfolio.index', compact('portfolio'));
    }
    public function create()
    {
        return view('influencer.portfolio.create');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required',
            'photo' => 'required',
            'type' => 'required',
            'details' => 'required',
        ]);
        $userId = Auth::user()->id;
        $portfolio = new InfluencerPortfolio();
        $portfolio->title = $request->title;
        $portfolio->userId = $userId;
        $portfolio->photo = time() . '.' . $request->photo->extension();
        $request->photo->move(public_path('portfolioPhoto'), $portfolio->photo);
        $portfolio->type = $request->type;
        $portfolio->details = $request->details;
        $portfolio->save();

        return redirect('influencer/portfolio')->with('success', 'Added Successfully..');
    }
    public function edit($id)
    {
        $portfolio = InfluencerPortfolio::find($id);
        return view('influencer.portfolio.edit', \compact('portfolio'));
    }

    public function update(Request $request)
    {
        $this->validate($request, [
            'title' => 'required',
            'type' => 'required',
            'details' => 'required',
        ]);

        $id = $request->portfolioId;
        $portfolio = InfluencerPortfolio::find($id);
        $portfolio->title = $request->title;
        if ($request->photo) {
            $portfolio->photo = time() . '.' . $request->photo->extension();
            $request->photo->move(public_path('portfolioPhoto'), $portfolio->photo);
        }
        $portfolio->type = $request->type;
        $portfolio->details = $request->details;
        $portfolio->save();

        return redirect('influencer/portfolio')->with('success', 'Updated Successfully..');
    }
    public function delete($id)
    {
        $portfolio = InfluencerPortfolio::find($id)->delete();
        return redirect('influencer/portfolio')->with('success', 'Deleted Successfully..');
    }
}
