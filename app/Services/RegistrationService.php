<?php

namespace App\Services;

use App\Models\User;

class RegistrationService
{
    public function store($request)
    {
        $photoPath = time() . '.' . $request->file->extension();

        $request->file->move(public_path('userPhotos'), $photoPath);

        User::create([
            'firstName' => ucfirst($request->firstName),
            'lastName' => ucfirst($request->lastName),
            'phone' => $request->phone,
            'email' => $request->email,
            'country' => $request->country,
            'photo' => $photoPath
        ])->conference()->create([
            'title' => ucwords($request->title),
            'description' => $request->description,
            'date' => $request->date,
        ]);
    }
}
