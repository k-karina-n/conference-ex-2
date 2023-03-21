<?php

namespace App\Http\Controllers;

use Illuminate\Http\AdminAccessRequest;

class AdminAccessController extends Controller
{
    public function signIn()
    {
        /*         $user = $request->input('email');

        auth()->login($user); */

        return redirect('/conference_list')->with('success', 'Welcome motherfucker. Enjoy!');
    }

    public function signOut()
    {
        /*         auth()->logout();
 */
        return redirect('/conference_list')->with('success', 'Adios');
    }
}
