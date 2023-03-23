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

        return Auth::attempt($credentials);
    }

    public function logout($request)
    {
        auth()->logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();
    }
}
