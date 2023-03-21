<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\RegistrationFormController;
use App\Http\Controllers\ConferenceListController;
use App\Http\Controllers\AdminAccessController;
use App\Models\User;

/*
 Routes: registration form 
*/

Route::resource('/', RegistrationFormController::class)
    ->only(['index', 'store']);

Route::view('/edit_form', 'registrationPartials/register');

/*
 Routes: conference list 
*/
Route::get('/conference_list', [ConferenceListController::class, 'index']);

/*
 Routes: admin access
*/
Route::view('/sign_in', 'sign-in')->middleware('guest');
Route::view('/sign_out', 'sign-out')->middleware(['auth', 'verified']);

Route::post('/get_admin_access', [AdminAccessController::class, 'signIn']);
Route::post('/leave_admin_access', [AdminAccessController::class, 'signOut']);

Route::view('/add_speaker', 'adminPartials/add');
Route::get('/edit_speaker/{id}', [ConferenceListController::class, 'edit']);

Route::post('/save_new_speaker', [ConferenceListController::class, 'save']);
Route::post('/update_speaker/{id}', [ConferenceListController::class, 'update']);
Route::get('/delete_speaker/{id}', [ConferenceListController::class, 'destroy']);
