<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use App\Http\Requests\AdminAuthRequest;
use App\Services\AdminAuthService;
use Illuminate\View\View;

class AdminAuthController extends Controller
{
    public function __construct(protected AdminAuthService $admin)
    {
    }

    public function loginView(): View
    {
        return view('login');
    }

    public function login(AdminAuthRequest $request)
    {
        if ($this->admin->auth($request)) {
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

    public function logout(Request $request): RedirectResponse
    {
        $this->admin->logout($request);

        return redirect('/conference_list')->with('success', 'Adios');
    }
}
