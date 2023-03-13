<?php

namespace App\Http\Controllers;

use Illuminate\View\View;
use App\Http\Requests\RegistrationFormRequest;
use App\Services\RegistrationFormService;

class RegistrationFormController extends Controller
{
    public function index(): View
    {
        return view('registrationForm');
    }

    public function show(RegistrationFormRequest $request): View
    {
        return view('registrationPartials/register');
    }

    /**
     * Store information from Registration Form to DB
     */
    public function store(RegistrationFormRequest $request, RegistrationFormService $service): View
    {
        $service->store($request);

        //? проблема с вьюхой при проваленной валидации 

        $title = ucwords($_POST['title']);

        return view('registrationPartials/congratulation', compact('title'));
    }
}
