<?php

use App\Http\Controllers\RegistrationFormController;
use App\Http\Controllers\ListController;
use Illuminate\Support\Facades\Route;

Route::resource('/', RegistrationFormController::class)
    ->only(['index', 'store']);

Route::get('/list', [ListController::class, 'index']);

Route::resource('/list/auth', ListController::class)
    ->only(['create', 'edit', 'destroy']);
/* для авторизованных ->middleware(['auth', 'verified']); */