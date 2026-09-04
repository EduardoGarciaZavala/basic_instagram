<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdateProfileRequest;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Request $request)
    {
        return view('profile.index', ['user' => $request->user()]);
    }

    public function update(UpdateProfileRequest $request)
    {
        $data = $request->validated();

        if (empty($data['password'])) {
            unset($data['password']);
        }

        $request->user()->update($data);

        return redirect()->route('profile')->with('status', 'Perfil actualizado correctamente.');
    }
}
