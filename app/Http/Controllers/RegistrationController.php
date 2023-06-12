<?php

namespace App\Http\Controllers;

use Illuminate\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Http\Requests\RegistrationRequest;
use App\Services\UserService;

class RegistrationController extends Controller
{
    /**
     * Return the view for the main page with registration form. 
     * 
     * @return View
     */
    public function index(): View
    {
        return view('registration-form');
    }

    /**
     * Instant data validation from the first step of registration form 
     * 
     * @param Request $request
     * 
     * @return View or redirects user back 
     */
    public function first(Request $request): View
    {
        $validator = Validator::make($request->all(), [
            'firstName' => 'required|string|max:255',
            'lastName' => 'required|string|max:255',
            'phone' => 'required',
            'email' => 'required|email|unique:users',
            'country' => 'required'
        ]);

        if ($validator->stopOnFirstFailure()->fails()) {
            return redirect('/edit')->withErrors($validator);
        }

        return view('registrationPartials/register');
    }

    /**
     * Stores data and returns the next step of registration process
     * 
     * @param RegistrationRequest $request Validated data from registration form
     * @param UserService $service Stores user data in the database 
     * 
     * @return View congratulation with successful registration
     */
    public function store(RegistrationRequest $request, UserService $service): View
    {
        $service->create($request);

        return view('registrationPartials/congratulation', [
            'title' => ucwords($request->title),
        ]);
    }

    /**
     * Returns user back in case of failed validation
     * 
     * @return View
     */
    public function edit(): View
    {
        return view('registrationPartials/register');
    }
}
