<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function create (){

    return view('profile.index');
    }

    public function update (Request $request){
        
    }
}
