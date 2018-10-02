<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Message;

class MessagesController extends Controller
{
    // Μέθοδος για να επιστρέψω την σελίδα επικοινωνίας
    public function show(){
        return view('contact');
    }

    // Μέθοδος για την αποθήκευση μηνύματος απο την σελίδα επικοινωνίας
    public function store(Request $request){
    	$request->validate([
    		'name' => 'required|max:255',
    		'email' => 'required|email',
    		'message' => 'required'
    	]);

    	$message = New Message();
    	$message->name = $request->input('name');
    	$message->email = $request->input('email');
    	$message->message = $request->input('message');
    	$message->save();

    	return redirect('/')->with('success', 'Your message has successfully been  submitted!');
    }

    public function adminMessages(){
        $messages = Message::paginate(15);
        return view('admin.messages')->with('messages', $messages);
    }
}
