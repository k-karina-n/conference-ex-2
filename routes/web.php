<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\RegistrationController;
use App\Http\Controllers\ConferenceListController;
use App\Http\Controllers\AdminAuthController;

/*
 Routes: Registration Form Section
*/

Route::get('/', [RegistrationController::class, 'index'])->name('register');
Route::post('/', [RegistrationController::class, 'store']);

Route::get('/edit', [RegistrationController::class, 'edit']);

/*
 Routes: Conference List Section 
*/
Route::get('/conference_list', [ConferenceListController::class, 'index'])->name('conference');
/*
 Routes: Log in/ Log Out Section 
*/
Route::get('/login', [AdminAuthController::class, 'loginView'])->name('login')->middleware('guest');
Route::post('/login', [AdminAuthController::class, 'login'])->middleware('guest');

Route::get('/logout', [AdminAuthController::class, 'logoutView'])->name('logout')->middleware('auth');
Route::post('/logout', [AdminAuthController::class, 'logout'])->middleware('auth');

/*
 Routes: Admin Functions 
*/
Route::get('/add_speaker', [ConferenceListController::class, 'add']);
Route::get('/edit_speaker/{id}', [ConferenceListController::class, 'edit']);

Route::post('/save_new_speaker', [ConferenceListController::class, 'save']);
Route::post('/update_speaker/{id}', [ConferenceListController::class, 'update']);
Route::get('/delete_speaker/{id}', [ConferenceListController::class, 'destroy']);
