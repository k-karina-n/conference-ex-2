<?php

namespace App\Http\Controllers;

use Illuminate\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

use App\Http\Requests\RegistrationRequest;
use App\Services\RegistrationService;

class RegistrationController extends Controller
{
    public function index(): View
    {
        return view('registration-form');
    }

    public function first(Request $request)
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
     * Store info from registration form to DB
     * 
     * @param
     * RegistrationFormRequest - validated data
     * RegistrationFormService - store data to DB
     * 
     * @return View 
     * Congratulation with succesful registreation 
     * &
     * Message with conference title to post on social media
     */
    public function store(RegistrationRequest $request, RegistrationService $service): View
    {
        $service->store($request);

        return view('registrationPartials/congratulation', [
            'title' => ucwords($request->title),
        ]);
    }

    /**
     * Return user back in case of failed validation
     */
    public function edit(): View
    {
        return view('registrationPartials/register');
    }
}
