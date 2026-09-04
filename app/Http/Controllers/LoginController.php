<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;

class LoginController extends Controller
{
    public function store(LoginRequest $request)
    {
        $request->validated();

        if (!auth()->attempt(
            $request->only('email', 'password'),
            $request->boolean('remember')
        )) {
            return back()->with('message', __('auth.login.failed'));
        }

        $request->session()->regenerate();

        return redirect()->route('dashboard.index');
    }
}
