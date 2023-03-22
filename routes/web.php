<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\RegistrationFormController;
use App\Http\Controllers\ConferenceListController;
use App\Http\Controllers\AdminAuthController;

/*
 Routes: Registration Form Section
*/

Route::resource('/', RegistrationFormController::class)
    ->only(['index', 'store']);

Route::get('/edit', [RegistrationFormController::class, 'edit']);

/*
 Routes: Conference List Section 
*/
Route::get('/conference_list', [ConferenceListController::class, 'index']);

/*
 Routes: Log in/ Log Out Section 
*/
Route::get('/login', [AdminAuthController::class, 'loginView'])->middleware('guest');
Route::post('/login', [AdminAuthController::class, 'login'])->middleware('guest');

Route::get('/logout', [AdminAuthController::class, 'logoutView'])->middleware('auth');
Route::post('/logout', [AdminAuthController::class, 'logout'])->middleware('auth');

/*
 Routes: Admin Functions 
*/
Route::view('/add_speaker', 'adminPartials/add');
Route::get('/edit_speaker/{id}', [ConferenceListController::class, 'edit']);

Route::post('/save_new_speaker', [ConferenceListController::class, 'save']);
Route::post('/update_speaker/{id}', [ConferenceListController::class, 'update']);
Route::get('/delete_speaker/{id}', [ConferenceListController::class, 'destroy']);
