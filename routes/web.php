<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\RegistrationController;
use App\Http\Controllers\ConferenceListController;
use App\Http\Controllers\AdminFunctionsController;
use App\Http\Controllers\AdminAuthController;

Route::controller(RegistrationController::class)->group(function () {
    Route::get('/', 'index')->name('register');
    Route::post('/first', 'first');
    Route::post('/', 'store');
    Route::get('/edit', 'edit');
});

Route::get('/conference_list', ConferenceListController::class)
    ->name('conference');

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

Route::middleware(['auth'])->group(function () {
    Route::get('/add_speaker', [AdminFunctionsController::class, 'add']);
    Route::get('/edit_speaker/{id}', [AdminFunctionsController::class, 'edit'])->name('edit_speaker');

    Route::post('/save_new_speaker', [AdminFunctionsController::class, 'save']);
    Route::post('/update_speaker/{id}', [AdminFunctionsController::class, 'update']);
    Route::get('/delete_speaker/{id}', [AdminFunctionsController::class, 'destroy']);
});
