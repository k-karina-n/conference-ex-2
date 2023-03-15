<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\RegistrationFormController;
use App\Http\Controllers\ConferenceListController;
use App\Http\Controllers\UserController;

Route::resource('/', RegistrationFormController::class)
    ->only(['index', 'store']);

Route::view('/edit_form', 'registrationPartials/register');

Route::get('/conference_list', [ConferenceListController::class, 'index']);

Route::get('/sign_in', [UserController::class, 'signIn']);

/* Route::resource('/list/auth', ListController::class)
    ->only(['create', 'edit', 'destroy']); */
/* для авторизованных ->middleware(['auth', 'verified']); */

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
