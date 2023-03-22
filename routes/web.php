<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\RegistrationFormController;
use App\Http\Controllers\ConferenceListController;
use App\Http\Controllers\AdminAccessController;

/*
 Routes: Registration Form Section
*/

Route::resource('/', RegistrationFormController::class)
    ->only(['index', 'store']);

// redirect to '/edit_form' in case of failed validation
Route::view('/edit_form', 'registrationPartials/register');

/*
 Routes: Conference List Section 
*/
Route::get('/conference_list', [ConferenceListController::class, 'index']);

/*
 Routes: Sign In / Sign Out Section 
*/
Route::view('/sign_in', 'sign-in')->middleware('guest');
Route::view('/sign_out', 'sign-out')->middleware('auth');

Route::post('/get_admin_access', [AdminAccessController::class, 'signIn'])->middleware('guest');
Route::post('/leave_admin_access', [AdminAccessController::class, 'signOut'])->middleware('auth');

/*
 Routes: Admin Functions 
*/
Route::view('/add_speaker', 'adminPartials/add');
Route::get('/edit_speaker/{id}', [ConferenceListController::class, 'edit']);

Route::post('/save_new_speaker', [ConferenceListController::class, 'save']);
Route::post('/update_speaker/{id}', [ConferenceListController::class, 'update']);
Route::get('/delete_speaker/{id}', [ConferenceListController::class, 'destroy']);
