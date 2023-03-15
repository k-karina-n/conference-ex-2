<?php

namespace App\Http\Controllers;

use Illuminate\View\View;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function signIn(): View
    {
        return view('sign-in');
    }

    /* 
    Сидинг (seed) БД с одним аккаунтом для тестирования; у нас не будет
страницы регистрации. 
*/
}
