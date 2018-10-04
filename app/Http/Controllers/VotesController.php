<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Vote;

class VotesController extends Controller
{
    public function store(Request $request){
        // Valitate oti yparxei psifos kata to submit
        $request->validate([
            'vote' => 'required'
        ]);
        $vote = new Vote();
        $vote->poll_id = $request->input('poll_id');
        if(empty(auth()->user()->id)){
            $vote->user_id = 'guest';
        } else {
            $vote->user_id = auth()->user()->id;
        }
        $vote->vote = $request->input('vote');
        $vote->save();
        return redirect('/polls/' . $vote->poll_id . '/results')->with('success', 'Your Vote has been Submited!');
    }
}
