<?php

namespace App\Http\Controllers;

use App\Models\Conference;
use Illuminate\View\View;



class ConferenceListController extends Controller
{
    /**
     * Show the conference list with all speakers.
     */
    public function __invoke(): View
    {
        return view('conference-list', [
            'conferences' => Conference::with('user')->paginate(5),
        ]);
    }
}
