<?php

use App\Http\Controllers\ProfileController;
use App\Livewire\UserManagement;
use Illuminate\Support\Facades\Route;
use App\Livewire\BusinessDetailsForm;


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

// Public Routes
Route::get('/', function () {
    return view('welcome');
});

// Authenticated Routes
Route::middleware(['auth', 'approved'])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    // Profile Routes
    Route::prefix('profile')->group(function () {
        Route::get('/', [ProfileController::class, 'edit'])->name('profile.edit');
        Route::patch('/', [ProfileController::class, 'update'])->name('profile.update');
        Route::delete('/', [ProfileController::class, 'destroy'])->name('profile.destroy');
    });

    // User Management Routes
    Route::get('/users', UserManagement::class)->name('users');
});


Route::get('/unapproved', BusinessDetailsForm::class)->name('unapproved');


// Route::get('/generic-business-details', BusinessDetailsForm::class)->name('generic.business.details');


// Authentication Routes
require __DIR__.'/auth.php';
