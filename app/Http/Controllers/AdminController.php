<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\User;
use App\Poll;

class AdminController extends Controller
{
    public function index(){
    	return view('admin.index');
    }
    
    public function users(){
        $users = User::paginate(10);
        // $users = User::all();
    	return view('admin.users')->with('users', $users);
    }

    public function polls(){
        $polls = Poll::paginate(15);
        // $polls = Poll::all()->paginate(10);
    	return view('admin.polls')->with('polls', $polls);
    }

    public function messages(){
    	return view('admin.messages');
    }

    public function profile(){
        return view('admin.profile');
    }

    public function logout () { // Logout method
        //logout user
        auth()->logout();
        // redirect to homepage
        return redirect('/');
    }
}
