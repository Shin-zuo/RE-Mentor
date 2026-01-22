<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\LandingController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\EnrolleesController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

// 1. Root Route: Redirect to Dashboard if logged in, otherwise show Landing
Route::get('/', function () {
    if (auth()->check()) {
        return redirect()->route('dashboard');
    }
    return view('landing');
});

// 2. Landing Page: Same logic (Optional: remove this if you want landing to always be accessible)
Route::get('/landing', function () {
    if (auth()->check()) {
        return redirect()->route('dashboard');
    }
    // If you have logic in LandingController, keep using that, but add the check inside the controller
    // For now, redirecting here is the safest quick fix.
    return view('landing'); 
})->name('landing');


// 3. Guest Routes: Only accessible if NOT logged in
Route::middleware('guest')->group(function () {
    
    Route::get('/register', [RegisterController::class, 'index'])->name('register');
    Route::post('/register', [RegisterController::class, 'store'])->name('register.store');

    Route::get('/login', [LoginController::class, 'index'])->name('login');
    Route::post('/login', [LoginController::class, 'authenticate'])->name('login.authenticate');

});

// 4. Auth Routes: Only accessible if logged in
Route::middleware('auth')->group(function () {
    
    Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    Route::get('/enrollees', [EnrolleesController::class, 'index'])->name('enrollees');
    Route::post('/enrollees/{id}/approve', [EnrolleesController::class, 'approve'])->name('enrollees.approve');

});