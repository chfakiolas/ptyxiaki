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

    // Return form view
    public function newAdmin(){
        return view('admin.newadmin');
    }

    // Post request form
    public function createAdmin(Request $request){
        $request->validate([
            'name' => 'required|string|max:255',
            'username' => 'unique:users|required|string|max:255',
            'email' => 'email|unique:users|required|string|max:255',
            'password' => 'confirmed|min:6|required|string|max:255',
        ]);

        $admin = new User();
        $admin->name = $request->input('name');
        $admin->username = $request->input('username');
        $admin->email = $request->input('email');
        $admin->admin = 1;
        $admin->password = Hash::make($request->input('password'));
        
        if ($admin->save()) {
            return redirect('/admin')->with('success', 'Admin has successfully been created');
        }
    }

    // Logout method edw
    public function logout () {
        //logout user
        auth()->logout();
        // redirect to homepage
        return redirect('/');
    }
}
