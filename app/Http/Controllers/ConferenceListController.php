<?php

namespace App\Http\Controllers;

use Illuminate\View\View;
use App\Models\Conference;

use Illuminate\Http\Request;
use Illuminate\Pagination\Paginator;

use Illuminate\Http\RedirectResponse;
use App\Http\Requests\RegistrationFormRequest;


class ConferenceListController extends Controller
{
    public function index(): View
    {
        //?show description and country 

        return view('list', [
            'conferences' => Conference::with('user')->orderBy('date')->latest()->paginate(10),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
    }

    /**
     * Display the specified resource.
     */
    public function show()
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit()
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update()
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy()
    {
        //
    }
}
