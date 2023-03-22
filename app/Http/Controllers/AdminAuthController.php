<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\AdminAuthRequest;
use App\Services\AdminAuthService;

use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;


class AdminAuthController extends Controller
{
    public function loginView(): View
    {
        return view('login');
    }

    public function login(AdminAuthRequest $request, AdminAuthService $admin)
    {
        return $admin->auth($request);
    }

    public function logoutView(): View
    {
        return view('logout');
    }

    public function logout(Request $request, AdminAuthService $admin): RedirectResponse
    {
        return $admin->logout($request);
    }
}
