<?php

use App\Http\Controllers\ContactsController;
use App\Http\Controllers\ShiftController;
use App\Http\Controllers\UserController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION
    ]);
});

// Shifts
Route::get('shifts', [ShiftController::class, 'index'])
    ->name('shifts.index')
    ->middleware('auth');

Route::get('shifts/create', [ShiftController::class, 'create'])
    ->name('shifts.create')
    ->middleware('auth');

Route::post('shifts', [ShiftController::class, 'store'])
    ->name('shifts.store')
    ->middleware('auth');

Route::get('shifts/calendar', [ShiftController::class, 'calendar'])
    ->name('shifts.calendar')
    ->middleware('auth');

Route::delete('shifts/{shift}', [ShiftController::class, 'delete'])
    ->name('shifts.delete')
    ->middleware('auth');

// Users
Route::get('users', [UserController::class, 'index'])
    ->name('users.index')
    ->middleware('auth');

Route::get('users/create', [UserController::class, 'create'])
    ->name('users.create')
    ->middleware('auth');

Route::post('users', [UserController::class, 'store'])
    ->name('users.store')
    ->middleware('auth');

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->name('dashboard');

