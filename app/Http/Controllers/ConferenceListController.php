<?php

namespace App\Http\Controllers;

use Illuminate\View\View;
use App\Models\Conference;
use App\Models\User;
use App\Http\Requests\AddRequest;
use App\Http\Requests\UpdateRequest;

use App\Services\ConferenceService;
use App\Services\RegistrationService;
use Illuminate\Support\Facades\Session;



use Illuminate\Http\Request;
use Illuminate\Http\Response;


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
     * Get the view to add a speakaer 
     * &
     * Return admin back in case of failed validation
     */
    public function add(): View
    {
        return view('adminPartials/add');
    }

    /**
     * Save a new created conference to DB.
     */
    public function save(AddRequest $request, RegistrationService $service): Response
    {
        $service->store($request);

        Session::flash('success', 'New speaker has been created!');

        return response('', 200)->header('HX-Location', '/conference_list');
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
    public function update(Request $request, ConferenceService $service, $id)
    {
        $user = User::findOrFail($id);

        $service->update($request, $user);

        Session::flash('success', 'Speaker has been updated!');

        return response('', 200)->header('HX-Location', '/conference_list');
    }

    /**
     * Remove the specified speaker from DB.
     */
    public function destroy($id)
    {
        User::destroy($id);

        Session::flash('success', 'Speaker has been deleted!');

        return response('', 200)->header('HX-Location', '/conference_list');
    }
}
