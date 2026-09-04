<?php

namespace App\Http\Controllers;

use App\Models\User;


class PostController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function create(User $user)
    {
        return view('post.index', ['user' => $user]);
    }
}
