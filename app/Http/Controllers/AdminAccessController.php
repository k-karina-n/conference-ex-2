<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\AdminAccessRequest;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;


class AdminAccessController extends Controller
{
    public function signIn(AdminAccessRequest $request)
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

    public function signOut(Request $request): RedirectResponse
    {
        auth()->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/conference_list')->with('success', 'Adios');
    }
}
