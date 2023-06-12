<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Services\UserService;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use Illuminate\View\View;
use Illuminate\Http\Response;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;


class AdminFunctionsController extends Controller
{
    /**
     * Create a new instance of the class with the provided dependencies
     * 
     * @param UserService $service Stores and updates user data
     * 
     * @return void
     */
    public function __construct(
        protected UserService $service,
    ) {
    }

    /**
     * Returns the form to add a speakaer 
     * 
     * @return View
     */
    public function add(): View
    {
        return view('adminPartials/add');
    }

    /**
     * Validates & saves a new created user with conference to DB.
     * 
     * @param Request $request
     * 
     * @return Response
     */
    public function save(Request $request): Response
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

        $this->service->create($request);

        Session::flash('success', 'New speaker has been created!');

        return response('', 200)->header('HX-Location', '/conference_list');
    }

    /**
     * Shows the form for editing the user info with retrieved data.
     * 
     * @param string $id User id
     * 
     * @return View
     */
    public function edit(int $id): View
    {
        $user = User::findOrFail($id);

        return view('adminPartials/edit', [
            'user' => $user,
            'countries' => $this->countries($user)
        ]);
    }

    /**
     * Puts user's country first in an array 
     * 
     * @param User $user User data from DB 
     * 
     * @return array
     */
    public function countries(User $user): array
    {
        $countries = ['United Kingdom', 'Poland', 'Germany', 'United States', 'China', 'Japan', 'Ukraine'];
        array_unshift($countries, $user->country);

        return array_unique($countries);
    }

    /**
     * Validates & updates the specified user info in DB.
     * 
     * @param Request $request 
     * @param int $id User id
     * 
     * @return Response
     */
    public function update(Request $request, int $id): Response
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

        $this->service->update($request, $user);

        Session::flash('success', 'Speaker has been updated!');

        return response('', 200)->header('HX-Location', '/conference_list');
    }

    /**
     * Deletes the specified user from DB.
     * 
     * @param int $id User id
     * 
     * @return Response
     */
    public function destroy(int $id): Response
    {
        User::destroy($id);

        Session::flash('success', 'Speaker has been deleted!');

        return response('', 200)->header('HX-Location', '/conference_list');
    }
}
