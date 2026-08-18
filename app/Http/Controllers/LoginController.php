<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;

class LoginController extends Controller
{
    public function store(LoginRequest $request)
    {
        $login = $request->validated();

        if (!auth()->attempt($request->only('email', 'password'))) {
            return back()->with('message', __('auth.login.failed'));
        }

        return redirect()->route('dashboard.index');
    }
}

