<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

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

        // This logs the new user automatically in and starts a session. The session token is added to cookies.
        Auth::login($user);

        return redirect()->route('ninjas.index');
    }

    public function logout(Request $request)
    {
        // This only removes user data, but all other data will remain. So shopping cart stuff saved in the session
        // will persist.
        Auth::logout();
        // This will remove the rest of the data.
        $request->session()->invalidate();
        // This will replace the old token.
        $request->session()->regenerateToken();

        return redirect()->route('show.login');
    }

    public function login(Request $request)
    {
        $validated = $request->validate([
            'email' => 'required|string|email|max:255',
            'password' => 'required|string',
        ]);

        if(Auth::attempt($validated)) {
            // This keeps all the session data intact but makes a new token
            $request->session()->regenerate();

            return redirect()->route('ninjas.index');
        }

        throw ValidationException::withMessages([
            'credentials' => 'These credentials do not match our records.',
        ]);

    }
}
