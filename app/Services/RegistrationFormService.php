<?php

namespace App\Services;

use App\Models\User;

class RegistrationFormService
{
    public function store($request)
    {
        $photoPath = time() . '.' . $request->file->extension();

        $request->file->move(public_path('userPhotos'), $photoPath);

        $user = User::create([
            'firstName' => ucfirst($request->input('firstName')),
            'lastName' => ucfirst($request->input('lastName')),
            'phone' => $request->input('phone'),
            'email' => $request->input('email'),
            'country' => $request->input('country'),
            'photo' => $photoPath
        ]);

        $user->conferences()->create([
            'title' => ucwords($request->input('title')),
            'description' => $request->input('description'),
            'date' => $request->input('date'),
        ]);
    }
}
