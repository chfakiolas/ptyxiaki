<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function getAbout(){
    	return view('about');
    }

    public function contact(){
        return view('contact');
    }
}
