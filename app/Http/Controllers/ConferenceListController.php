<?php

namespace App\Http\Controllers;

use App\Models\Conference;
use Illuminate\View\View;



class ConferenceListController extends Controller
{
    /**
     * Shows the conference list with all speakers.
     * 
     * @return View
     */
    public function __invoke(): View
    {
        return view('conference-list', [
            'conferences' => Conference::with('user')->paginate(5),
        ]);
    }
}
