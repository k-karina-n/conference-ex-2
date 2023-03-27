<?php

namespace App\Http\Controllers;

use Illuminate\View\View;
use App\Models\Conference;
use App\Models\User;
use App\Http\Requests\ConferenceRequest;
use App\Services\ConferenceService;
use App\Services\RegistrationFormService;


use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;


class ConferenceListController extends Controller
{
    /**
     * Show the conference list with all speakers.
     */
    public function index(): View
    {
        return view('conference-list', [
            'conferences' => Conference::with('user')->paginate(5),
        ]);
    }

    /* [ Functuanility for auth user only ] */

    /**
     * Save a new created conference to DB.
     */
    public function save(ConferenceRequest $request, RegistrationFormService $service): RedirectResponse
    {
        $service->store($request);

        return redirect('/conference_list')->with('success', 'New speaker has been created!');
    }

    /**
     * Return admin back in case of failed validation
     */
    public function change(): View
    {
        return view('adminPartials/add');
    }

    /**
     * Show the form for editing the speaker info with retrieved data.
     */
    public function edit($id): View
    {
        $user = User::findOrFail($id);

        $countries = ['United Kingdom', 'Poland', 'Germany', 'United States', 'China', 'Japan', 'Ukraine'];
        array_unshift($countries, $user->country);
        $countries = array_unique($countries);

        return view('adminPartials/edit', [
            'user' => $user,
            'countries' => $countries,
        ]);
    }

    /**
     * Update the specified speaker info in DB.
     */
    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);

        if ($request->file) {

            $photoPath = time() . '.' . $request->file->extension();

            $request->file->move(public_path('userPhotos'), $photoPath);

            $user->photo = $photoPath;
        }

        /* $user->update($request->validated());
        $user->conference->update($request->validated()); */

        $user->firstName = ucfirst($request->input('firstName'));
        $user->lastName = ucfirst($request->input('lastName'));
        $user->phone = $request->input('phone');
        $user->email = $request->input('email');
        $user->country = $request->input('country');

        if ($user->isDirty()) {
            $user->save();
        }

        $user->conference->title = ucwords($request->input('title'));
        $user->conference->description = $request->input('description');
        $user->conference->date = $request->input('date');

        if ($user->conference->isDirty()) {
            $user->conference->save();
        }

        return redirect('/conference_list')->with('success', 'Speaker has been updated');
    }

    /**
     * Remove the specified speaker from DB.
     */
    public function destroy($id)
    {
        //User::destroy($id);

        return redirect('/conference_list')->with('success', 'Speaker has been deleted');
    }
}
