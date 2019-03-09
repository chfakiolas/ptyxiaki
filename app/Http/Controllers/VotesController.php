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

        // Δημιουργία ψήφου
        $vote = new Vote();
        $vote->user_id = auth()->user()->id;
        $vote->token = '';
        $vote->poll_id = $request->poll_id;
        $vote->vote = $request->input('vote');
        $vote->save();
        
        return redirect('/polls/' . $request->uuid . '/results')->with('success', 'Your Vote has been Submited!');
        
    }

    public function anonStore(Request $request)
    {
        // Έλεγχος αν έχει επιλεγεί ψήφος κατά το submit
        $request->validate([
            'vote' => 'required'
        ]);
        
        // Βρίσκω την ψήφο στη βάση δεδομένων
        $anonVote = Vote::where('token', $request->token);
        Vote::where('token', $request->token)->update([
            'vote' => $request->vote 
        ]);
        return redirect('/polls/' . $request->uuid . '/results')->with('success', 'Η ψήφος σας έχει καταχωρηθεί!');
    }
}
