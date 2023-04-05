<?php

namespace App\Http\Controllers;

use Illuminate\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Http\Requests\RegistrationRequest;
use App\Services\RegistrationService;

class RegistrationController extends Controller
{
    public function __construct(protected RegistrationService $service)
    {
    }

    public function index(): View
    {
        return view('registration-form');
    }

    /**
     * Validate data from first step of registration form 
     */
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
     * @return View Congratulation with successful registration and title for message to post on social media
     */
    public function store(RegistrationRequest $request): View
    {
        $this->service->store($request);

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
