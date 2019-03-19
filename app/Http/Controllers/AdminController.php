<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Poll;
use App\Vote;

class AdminController extends Controller
{
    public function index()
    {
    	return view('admin.index');
    }

    public function polls()
    {
        $polls = Poll::orderBy('id', 'desc')->paginate(10);
    	return view('admin.polls')->with('polls', $polls);
    }

    public function pollDetails($uuid)
    {
        $poll = Poll::where('uuid', $uuid)->first(); // βρίσκω την ψηφοφορία
        $options = Poll::find($poll->id)->pollOption; // Βρίσκω τις επιλογές
        $votes = Vote::where('poll_id', $poll->id)->where('vote', '!=', null)->get(); // Βρίσκω τις ψήφους των χρηστών
        if($poll->type == 'eponymous'){
            $users = Vote::where('poll_id', $poll->id)->where('vote', '!=', null)->paginate(2); //Χρησιμοποιώ την ίδα μέθοδο για αλλά με paginate για να χωρίσω σε σελίδες τους χρήστες
            return view('admin.polldetails', compact('poll', 'options', 'votes', 'users'));
        } else {
            return view('admin.polldetails', compact('poll', 'options', 'votes'));
        }
       
    }

    public function messages()
    {
    	return view('admin.messages');
    }

    public function logout () 
    { // Logout method
        //logout user
        auth()->logout();
        // redirect to homepage
        return redirect('/');
    }
}
