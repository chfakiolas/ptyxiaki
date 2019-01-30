<?php

namespace App\Http\Controllers;

use App\Poll;
use Illuminate\Http\Request;
use App\PollOption;

class PollsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $polls = Poll::orderBy('id', 'desc')->paginate(10);
        return view('welcome')->with('polls', $polls);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.createpoll');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Validate data
        $request->validate([
            'name' => 'required|max:255',
            'option.*' => 'required|max:255',
        ]);

        $poll = new Poll();
        $poll->user_id = auth()->user()->id;
        $poll->name = $request->input('name');
        if (!empty($request->input('description'))) {
            $poll->description = $request->input('description');
        } else {
            $poll->description = '';
        }
        $poll->expiration = $request->date . ' ' . $request->time;
        $poll->status = 'In progress';
        $poll->save();

        foreach ($request->option as $value) {
            $option = new PollOption();
            $option->poll_id = $poll->id;
            $option->option = $value;
            $option->save();
        }

        return redirect('/admin')->with('success', 'Your poll has successfully been create!'); //redirect sto dashboard
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Poll  $poll
     * @return \Illuminate\Http\Response
     */
    // public function show(Poll $poll)
    public function show($id)
    {
        $poll = Poll::find($id);  // Βρίσκω την ψηφοφορία
        $options = Poll::find($id)->pollOption;  // Βρίσκω τις επιλογές της ψηφοφορίας
        if(strtotime($poll->expiration) < time()){
            return $this->results($id); //return results view
        } else {
            return view('showpoll')->with('poll', $poll)->with('options', $options);  //view που δείχνει την ψηφοφορία
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Poll  $poll
     * @return \Illuminate\Http\Response
     */
    public function edit(Poll $poll)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Poll  $poll
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Poll $poll)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Poll  $poll
     * @return \Illuminate\Http\Response
     */
    public function destroy(Poll $poll)
    {
        //
    }

    public function results($id)
    {
        $poll = Poll::find($id);
        $options = Poll::find($id)->pollOption;
        $votes = Poll::find($id)->vote;
        return view('pollresult')->with('poll', $poll)->with('options', $options)->with('votes', $votes);
    }
}
