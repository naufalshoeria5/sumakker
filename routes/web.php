<?php

use App\Http\Controllers\IncomingLetterController;
use App\Http\Controllers\LetterController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TypeController;
use App\Http\Controllers\UnitController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('auth.new-login');
});

Route::get('/dashboard', function () {
    return view('new-dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // * Route Letter
    Route::resource('surat', LetterController::class);

    // * Route Unit Controller
    Route::resource('unit', UnitController::class);

    // * Route Type Controller
    Route::resource('type', TypeController::class);

    // * Route Users
    Route::resource('users', UserController::class);
});

require __DIR__ . '/auth.php';
