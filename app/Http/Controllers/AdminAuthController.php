<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\AdminAuthRequest;
use App\Services\AdminAuthService;
use Illuminate\Support\Facades\Auth;

use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;


class AdminAuthController extends Controller
{
    public function loginView(): View
    {
        return view('login');
    }

    /** 
     * Log in user and give admin functions
     * 
     * @param
     * AdminAuthRequest - validated data 
     * AdminAuthService - authenticate user 
     *
     * @return 
     * 1st way | success | conference list with a flash message
     * 2nd way | wrong password | back with an error message
     */
    public function login(AdminAuthRequest $request, AdminAuthService $admin)
    {
        if ($admin->auth($request)) {
            $request->session()->regenerate();
            return redirect('/conference_list')->with('success', 'Welcome to Admin Mode!');
        }

        return back()->withErrors([
            'password' => 'The provided password does not match our records.',
        ]);
    }

    public function logoutView(): View
    {
        return view('logout');
    }

    public function logout(Request $request, AdminAuthService $admin): RedirectResponse
    {
        $admin->logout($request);

        return redirect('/conference_list')->with('success', 'Adios');
    }
}
