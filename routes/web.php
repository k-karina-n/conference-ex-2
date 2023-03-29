<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\RegistrationController;
use App\Http\Controllers\ConferenceListController;
use App\Http\Controllers\AdminAuthController;

/*
 Routes: Registration Form Section
*/

Route::controller(RegistrationController::class)->group(function () {
    Route::get('/', 'index')->name('register');
    Route::post('/', 'store');
    Route::get('/edit', 'edit');
});

/*
 Routes: Conference List Section 
*/
Route::get('/conference_list', [ConferenceListController::class, 'index'])
    ->name('conference');

/*
 Routes: Log in / Log out for admin
*/
Route::controller(AdminAuthController::class)->group(function () {
    Route::middleware(['guest'])->group(function () {
        Route::get('/login', 'loginView')
            ->name('login');
        Route::post('/login', 'login');
    });

    Route::middleware(['auth'])->group(function () {
        Route::get('/logout', 'logoutView')
            ->name('logout');
        Route::post('/logout', 'logout');
    });
});

/*
 Routes: Admin functions
*/
Route::middleware(['auth'])->group(function () {
    Route::get('/add_speaker', [ConferenceListController::class, 'add']);
    Route::get('/edit_speaker/{id}', [ConferenceListController::class, 'edit'])->name('edit_speaker');

    Route::post('/save_new_speaker', [ConferenceListController::class, 'save']);
    Route::post('/update_speaker/{id}', [ConferenceListController::class, 'update']);
    Route::get('/delete_speaker/{id}', [ConferenceListController::class, 'destroy']);
});

/* Пыталась роутеры организовать, оставила две опции касательно админа, какая лучше? 
Или все зависит от запроса? 
Мне кажется там где указывается конкретно класс и метод удобнее, 
ибо можно прям на название метода щелкнуть и перейти */