<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Vote;

class VotesController extends Controller
{
	// public function store(Request $request, $poll_id){
	// 	// $kek = Vote::find($poll_id)->poll();
	// 	// $poll = poll()->find($poll_id);
	// 	// return $kek;
	// }

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

    // public function show($poll_id){
        // $poll = Vote::find($poll_id)->poll;
        // return $poll_id;
        // return view('pollresult');
    	// $poll = Poll::find($poll_id);
    	// $poll = Vote::find($poll_id)->poll;
    	// return $poll;
    	// return $poll_id;
    	// $poll = Vote::find($poll_id)->poll;
    	// return view('showpoll');
    // }
}
