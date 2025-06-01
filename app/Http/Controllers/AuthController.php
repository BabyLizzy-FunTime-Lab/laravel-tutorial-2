<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function showRegister() {

        return view('auth.register');
    }

    public function showLogin() {

        return view('auth.login');
    }

    public function register(Request $request) {
        // validate will return an array with key value pairs that can be used to create a user.
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
        ]);

        // create() returns a user model instance.
        $user = User::create($validated);

        Auth::login($user);
        return redirect()->route('ninjas.index');
    }

    public function login() {

    }
}
