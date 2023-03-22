<?php

namespace App\Http\Controllers;

use Illuminate\View\View;
use App\Models\Conference;
use App\Models\User;
use App\Http\Requests\ConferenceRequest;
use App\Services\RegistrationFormService;


use Illuminate\Http\Request;
use Illuminate\Pagination\Paginator;
use Illuminate\Http\RedirectResponse;


class ConferenceListController extends Controller
{
    /**
     * Show the conference list with all speakers.
     */
    public function index(): View
    {
        $date = date('Y-m-d');

        return view('conference-list', [
            'conferences' => Conference::with('user')
                ->paginate(5),
        ]);
    }

    /*     public function table(): View
    {
        $date = date('Y-m-d');

        return view('table-body', [
            'conferences' => Conference::where('date', '>=', $date)
                ->with('user')
                ->orderBy('date')
                ->paginate(5),
        ]);
    } */

    /* [ Functuanility for auth user only ] */

    /**
     * Save a new created conference to DB.
     */
    public function save(ConferenceRequest $request, RegistrationFormService $service)
    {
        $service->store($request);

        return redirect('/table_body')->with('success', 'New speaker has been created!');
        //return response('', 200)->header('HX-Location', '/focus');
    }

    /**
     * Show the form for editing the speaker info with retrieved data.
     */
    public function edit($id)
    {
        $user = User::find($id);

        $countries = ['United Kingdom', 'Poland', 'Germany', 'United States', 'China', 'Japan', 'Ukraine'];
        array_unshift($countries, $user->country);
        $countries = array_unique($countries);

        return view('adminPartials/edit', compact('user', 'countries'));
    }

    /**
     * Update the specified speaker info in DB.
     */
    public function update(Request $request, $id)
    {
        $user = User::find($id);

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

        return response('', 200)->header('HX-Location', '/conference_list');
    }

    /**
     * Remove the specified speaker from DB.
     */
    public function destroy($id)
    {
        /* User::find($id)->delete(); */

        return redirect('/table_body')->with('success', 'Speaker has been deleted');
    }
}
