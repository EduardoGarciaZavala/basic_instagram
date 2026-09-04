<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdateProfileRequest;
use App\Models\User;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(User $user)
    {
        return view('profile.index', ['user' => $user]);
    }

    public function edit(Request $request)
    {
        return view('profile.update', ['user' => $request->user()]);
    }

    public function update(UpdateProfileRequest $request)
    {
        $data = $request->validated();

        if (empty($data['password'])) {
            unset($data['password']);
        }

        $request->user()->update($data);

        return redirect()->route('profile.index', [
            'user' => $request->user()->username,
        ])->with('status', 'Perfil actualizado correctamente.');
    }
}
