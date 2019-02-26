<?php

namespace App\Http\Controllers;

use App\Poll;
use Illuminate\Http\Request;
use App\PollOption; //Μπορει να μην το χρειαζομαι να δω τις σχέσεις.
use App\User;
use Webpatser\Uuid\Uuid; // UUID class generator
use App\Mail\VoteMail; // Mail class για αποστολή των mails
use App\Vote;

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
        return view('index')->with('polls', $polls);
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
        $poll->uuid = Uuid::generate();
        $poll->user_id = auth()->user()->id;
        $poll->name = $request->name;
        $poll->type = $request->votetype;
        if (!empty($request->description)) {
            $poll->description = $request->description;
        } else {
            $poll->description = '';
        }
        $poll->date = $request->date;
        $poll->time = $request->time;
        $poll->status = 'In progress';
        $poll->save();

        /* Έλεγχος αν η ψηφοφορία είναι ανώνυμη τότε δημιουργούμε τις ψήφους 
         και τις αποστέλουμε στους χρήστες */
        if ($poll->type == 'anonymous') {
            $users = User::all();
            foreach ($users as $user) {
                $vote = new Vote();
                $vote->poll_id = $poll->id;
                $vote->token = Uuid::generate();
                $vote->save();
                \Mail::to($user)->queue(new VoteMail($poll, $vote));
            }
        }

        foreach ($request->option as $value) {
            $option = new PollOption();
            $option->poll_id = $poll->id;
            $option->option = $value;
            $option->save();
        }

        return redirect('/admin')->with('success', 'Η ψηφοφορια δημιουργήθηκε με επιτυχία!'); //redirect sto dashboard
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Poll  $poll
     * @return \Illuminate\Http\Response
     */
    // public function show(Poll $poll)
    public function show($uuid)
    {
        $poll = Poll::where('uuid', $uuid)->first();  // Βρίσκω την ψηφοφορία

        // έλεγχος αν είναι ανώνυμη ψηφοφορία να κάνει redirect στα αποτελέσματα
        if ($poll->type == 'anonymous') {
            return redirect('/polls/' . $poll->uuid . '/results');
        }

        $options = Poll::find($poll->id)->pollOption;  // Βρίσκω τις επιλογές της ψηφοφορίας
        $expiration = $poll->date . ' ' . $poll->time;
        $notExpired = strtotime($expiration) > time();
        $pollInPorgress = $poll->status == 'In progress';
        $pollCompleted = $poll->status == 'Completed';

        if($notExpired && $pollInPorgress) {
            // return view('showpoll')->with('poll', $poll)->with('options', $options);  //view που δείχνει την ψηφοφορία
            return view('showpoll', compact('poll', 'options'));
        } else if($pollCompleted || !$notExpired || ($poll->type == 'anonymous' && $token == null)) {
            return $this->results($poll->id); //return results view
        } else {
            // $poll->status = 'Completed';
            // $poll->save();
            
            // $data['poll'] = $poll;
            // $data['options'] = $options;
            // $data['token'] = $token;
            return view('showpoll', compact('data', 'poll', 'options'));

            // compact('persons', 'ms')
            // return view('showpoll')->with('poll', $poll)->with('options', $options)->with('token', $token);  //view που δείχνει την ψηφοφορία
        }
    }
    

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Poll  $poll
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $poll = Poll::find($id);
        $options = Poll::find($id)->pollOption;
        $expiration = $poll->date . ' ' . $poll->time;
        $notExpired = strtotime($expiration) > time(); // Συγκρίνω την ημερομηνία και ώρα της ψηφοφορίας με την τωρινή
        $pollInPorgress = $poll->status == 'In progress';
        $pollCompleted = $poll->status == 'Completed';
        if($notExpired && $pollInPorgress){
            return view('admin.editpoll')->with('poll', $poll)->with('options', $options);
        } else if($pollCompleted) {
            return redirect('/admin')->with('error', 'Η ψηφοφορια έχει λήξει και δε μπορεί να επεξεργαστεί.'); //redirect sto dashboard
        } else {
            $poll->status = 'Completed';
            $poll->save();
            return redirect('/admin')->with('error', 'Η ψηφοφορια έχει λήξει και δε μπορεί να επεξεργαστεί.'); //redirect sto dashboard
        }
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Poll  $poll
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $id = $request->id;
        $options = Poll::find($id)->pollOption;
        // return $options;
        // Validate data
        $request->validate([
            'name' => 'required|max:255',
            'option.*' => 'required|max:255',
            'date' => 'required|max:255',
            'time' => 'required|max:255',
            'description' => 'required|max:255',
        ]);
        $id = $request->id;
        $poll = Poll::find($id);
        $poll->user_id = auth()->user()->id;
        $poll->name = $request->name;
        $poll->date = $request->date;
        $poll->time = $request->time;
        $poll->description = $request->description;
        $poll->save();

        $options = Poll::find($id)->pollOption; // βρισκει τα options του Poll στην βάση
        $updatedOptions = array_combine($request->optionId, $request->option); // Ενώνει τους πίνακες key ειναι το id value το option
        
        foreach($updatedOptions as $key => $value){
            foreach($options as $option){
                if( $option->id == $key){
                    $option->option = $value;
                    $option->save();
                }
            }
        }

        return redirect('/admin/polls')->with('success', 'Η ψηφοφορια έχει ενημερωθεί.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Poll  $poll
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $poll = Poll::find($id);
        $votes = Poll::find($id)->vote;
        $voteExist = $votes->first();
        // return $voteExist;
        if($voteExist) {
            $poll->status = 'Completed';
            $poll->save();
            return redirect('/admin/polls')->with('success', 'Η ψηφοφορια έχει ολοκληρωθεί.');
        } else {
            $options = $poll->pollOption; // Βρίσκω τις επιλογές της ψηφοφορίας
            foreach($options as $o) {
                $o->delete();
            }
            $poll->delete();
            return redirect('/admin/polls')->with('success', 'Η ψηφοφορια έχει διαγραφεί.');
        }
    }

    // Return poll results in view
    public function results($uuid)
    {
        $poll = Poll::where('uuid', $uuid)->first();
        $options = Poll::find($poll->id)->pollOption;
        // $votes = Poll::find($poll->id)->vote->where('vote', '!=', null)->get();
        $votes = Vote::where('poll_id', $poll->id)->where('vote', '!=', null)->get();
        return view('pollresult', compact('poll', 'options', 'votes')); 
    }

    public function showAnon($uuid, $token)
    {
        $poll = Poll::where('uuid', $uuid)->first();  // Βρίσκω την ψηφοφορία
        $vote = Poll::find($poll->id)->vote()->where('token', $token)->first(); //Βρίσκω την ψήφο στη βάση

        // Κάνω έλεγχο αν έχει ψηφίσει με αυτό το τόκεν
        if (!is_null($vote->vote)) {
            return redirect('/polls/' . $uuid . '/results'); // ανακατεύθυνση στα αποτελέσματα
        }
        
        $options = Poll::find($poll->id)->pollOption;  // Βρίσκω τις επιλογές της ψηφοφορίας
        $expiration = $poll->date . ' ' . $poll->time;
        $notExpired = strtotime($expiration) > time();
        $pollInPorgress = $poll->status == 'In progress';
        $pollCompleted = $poll->status == 'Completed';

        if($notExpired && $pollInPorgress) {
            return view('anonpoll', compact('token', 'poll', 'options')); //view που δείχνει την φόρμα για την ψηφοφορία
        } else if($pollCompleted) {
            return $this->results($poll->uuid); //return results view
        } else {
            $poll->status = 'Completed';
            $poll->save();
            return $this->results($poll->uuid);
        }
    }
}
