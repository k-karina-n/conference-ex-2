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

    /**
     * Store information from Registration Form to DB
     */
    public function store(RegistrationFormRequest $request, RegistrationFormService $service): View
    {
        /*         $service->store($request);
 */
        $title = ucwords($request->input('title'));

        return view('registrationPartials/congratulation', compact('title'));
    }
}
