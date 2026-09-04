<?php

namespace App\Http\Controllers\Auth;

use App\DTOs\UserDTO;
use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\RegisterRequest;
use App\Services\Interfaces\AuthServiceInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function __construct(
        private AuthServiceInterface $authServiceInterface
    ) {}


    public function create()
    {
        return view('auth.register');
    }

    public function help()
    {
        return view('auth.register-help');
    }

    public function register(RegisterRequest $request)
    {
        $user = $this->authServiceInterface->register(
            UserDTO::fromRequest(
                $request->validated()
            )
        );

        Auth::login($user);
        $request->session()->regenerate();

        return redirect()->route('dashboard.index');
    }

    public function logout(Request $request)
    {
        auth()->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('home');
    }
}
