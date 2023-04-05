<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Conference;
use App\Services\ConferenceService;
use App\Services\RegistrationService;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use Illuminate\View\View;
use Illuminate\Http\Response;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;


class ConferenceListController extends Controller
{
    public function __construct(
        protected RegistrationService $registrationService,
        protected ConferenceService $conferenceService,
    ) {
    }
    /**
     * Show the conference list with all speakers.
     */
    public function index(): View
    {
        return view('conference-list', [
            'conferences' => Conference::with('user')->paginate(5),
        ]);
    }

    /**
     * Get the Form view to add a speakaer 
     */
    public function add()
    {
        return view('adminPartials/add');
    }

    /**
     * Validate & save a new created conference to DB.
     */
    public function save(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'firstName' => 'required|string|max:255',
            'lastName' => 'required|string|max:255',
            'phone' => 'required',
            'email' => 'required|email|unique:users',
            'country' => 'required',
            'file' => 'required|mimes:png,jpg,jpeg|max:2048',

            'title' => 'required',
            'description' => 'required|max:1000',
            'date' => 'required|after_or_equal:today'
        ]);

        if ($validator->fails()) {
            return redirect('/add_speaker')->withErrors($validator)->withInput();
        }

        $this->registrationService->store($request);

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
            'countries' => $countries
        ]);
    }

    /**
     * Validate & update the specified speaker info in DB.
     */
    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);

        $validator = Validator::make($request->all(), [
            'firstName' => 'required|string|max:255',
            'lastName' => 'required|string|max:255',
            'phone' => 'required',
            'email' => [
                'required',
                Rule::unique('users')->ignore($user->id),
            ],
            'country' => 'required',
            'file' => 'mimes:png,jpg,jpeg|max:2048',

            'title' => 'required',
            'description' => 'required|max:1000',
            'date' => 'required|after_or_equal:today'
        ]);

        if ($validator->fails()) {
            return redirect()->route('edit_speaker', [$user])->withErrors($validator);
        }

        $this->conferenceService->update($request, $user);

        Session::flash('success', 'Speaker has been updated!');

        return response('', 200)->header('HX-Location', '/conference_list');
    }

    /**
     * Remove the specified speaker from DB.
     */
    public function destroy($id): Response
    {
        User::destroy($id);

        Session::flash('success', 'Speaker has been deleted!');

        return response('', 200)->header('HX-Location', '/conference_list');
    }
}
