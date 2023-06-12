<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use App\Http\Requests\AdminAuthRequest;
use App\Services\AdminAuthService;
use Illuminate\View\View;

class AdminAuthController extends Controller
{
    /**
     * Constructor method
     *
     * @param AdminAuthService $service Logs in / logs out Admin 
     *
     * @return void
     */
    public function __construct(protected AdminAuthService $service)
    {
    }

    /**
     * Returns login view 
     *
     * @return View
     */
    public function loginView(): View
    {
        return view('login');
    }

    /**
     * Logs in an admin
     *
     * @param AdminAuthRequest $request Validated data from login form
     * 
     * @return RedirectResponse 
     */
    public function login(AdminAuthRequest $request): RedirectResponse
    {
        if ($this->service->auth($request)) {
            $request->session()->regenerate();
            return redirect('/conference_list')->with('success', 'Welcome to Admin Mode!');
        }

        return back()->withErrors([
            'password' => 'The provided password does not match our records.',
        ]);
    }

    /**
     * Returns logout view 
     *
     * @return View
     */
    public function logoutView(): View
    {
        return view('logout');
    }

    /**
     * Logs out an admin
     *
     * @param Request $request
     * 
     * @return RedirectResponse 
     */
    public function logout(Request $request): RedirectResponse
    {
        $this->service->logout($request);

        return redirect('/conference_list')->with('success', 'Adios');
    }
}
