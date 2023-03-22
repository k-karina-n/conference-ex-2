<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class AdminAccessController extends Controller
{
    public function signIn(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email|exists:admins,email',
            'password' => 'required'
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect('/conference_list')->with('success', 'Welcome!');
        }

        return back()->withErrors([
            'password' => 'The provided password does not match our records.',
        ]);
    }

    public function signOut(Request $request)
    {
        auth()->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/conference_list')->with('success', 'Adios');
    }
}
