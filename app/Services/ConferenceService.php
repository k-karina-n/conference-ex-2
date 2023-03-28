<?php

namespace App\Services;

use App\Models\User;

class ConferenceService
{
    public function update($request, $user)
    {
        if ($request->file) {

            $photoPath = time() . '.' . $request->file->extension();

            $request->file->move(public_path('userPhotos'), $photoPath);

            $user->photo = $photoPath;
        }

        $user->update($request->except(['file']));
        $user->conference->update($request->all());
    }
}
