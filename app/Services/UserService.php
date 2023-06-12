<?php

namespace App\Services;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;

class UserService
{
    /**
     * Stores user data in the database
     * 
     * @param $request Validated data from Request
     * 
     * @return void
     */
    public function create(Request $request): void
    {
        User::create([
            'firstName' => ucfirst($request->firstName),
            'lastName' => ucfirst($request->lastName),
            'phone' => $request->phone,
            'email' => $request->email,
            'country' => $request->country,
            'photo' => $this->uploadPhoto($request->file)
        ])->conference()->create([
            'title' => ucwords($request->title),
            'description' => $request->description,
            'date' => $request->date,
        ]);
    }

    /**
     * Stores user data in the database
     * 
     * @param $request Validated data from Request
     * @param User $user
     * 
     * @return void
     */
    public function update($request, User $user): void
    {
        if ($request->file) {
            $user->photo = $this->uploadPhoto($request->file);
        }

        $user->update($request->except(['file']));

        $user->conference->update($request->all());
    }

    /**
     * Stores user's photo in the database
     * 
     * @param UploadedFile $file File from Request
     * 
     * @return string
     */
    private function uploadPhoto(UploadedFile $file): string
    {
        $photoPath = time() . '.' . $file->extension();

        $file->move(public_path('userPhotos'), $photoPath);

        return $photoPath;
    }
}
