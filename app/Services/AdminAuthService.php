<?php

namespace App\Services;

use Illuminate\Support\Facades\Auth;

class AdminAuthService
{
    public function auth($request)
    {
        $credentials = [
            'email' => $request->email,
            'password' => $request->password
        ];

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect('/conference_list')->with('success', 'Welcome to Admin Mode!');
        }

        return back()->withErrors([
            'password' => 'The provided password does not match our records.',
        ]);
    }

    public function logout($request)
    {
        auth()->logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/conference_list')->with('success', 'Adios');
    }
}
