<?php

namespace App\Services;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Http\Requests\AdminAuthRequest;

class AdminAuthService
{
    /**
     * Logs out an admin
     *
     * @param AdminAuthRequest $request Validated admin data
     * 
     * @return bool 
     */
    public function auth(AdminAuthRequest $request): bool
    {
        $credentials = [
            'email' => $request->email,
            'password' => $request->password
        ];

        return Auth::attempt($credentials);
    }

    /**
     * Logs out an admin
     *
     * @param Request $request
     * 
     * @return void 
     */
    public function logout(Request $request): void
    {
        auth()->logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();
    }
}
