<?php

namespace App\Http\Controllers;

use Illuminate\View\View;
use App\Http\Requests\RegistrationRequest;
use App\Services\RegistrationService;

class RegistrationController extends Controller
{
    public function index(): View
    {
        return view('registration-form');
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
