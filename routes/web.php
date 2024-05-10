<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\FrontEndController;
use App\Http\Controllers\LetterController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TypeController;
use App\Http\Controllers\UnitController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

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

Route::get('/', FrontEndController::class);
Route::get('/index-old', [FrontEndController::class, 'oldFunc']);

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // * Route Letter
    Route::get('surat/export', [LetterController::class, 'export']);
    Route::resource('surat', LetterController::class);

    // * Route Unit Controller
    Route::get('unit/export', [UnitController::class, 'export']);
    Route::resource('unit', UnitController::class);

    // * Route Type Controller
    Route::get('type/export', [TypeController::class, 'export']);
    Route::resource('type', TypeController::class);

    // * Route Users
    Route::get('users/export', [UserController::class, 'export']);
    Route::resource('users', UserController::class);

    // * Route Dashboard
    Route::get('/dashboard', DashboardController::class)->name('dashboard');
});

require __DIR__ . '/auth.php';
