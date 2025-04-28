<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProfileController;

Route::get('/', function () {
    return redirect('/dashboard');
});

// Agrupamos todas las rutas protegidas
Route::group(['middleware' => ['auth']], function () {
    // profile
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    // dashboard
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::post('/dashboard', [DashboardController::class, 'store'])->name('cocktails.store');
    // list
    Route::get('/cocktails/list', [DashboardController::class, 'list'])->name('cocktails.list');
    // 
    Route::get('/cocktails/{cocktail}/edit', [DashboardController::class, 'edit'])->name('cocktails.edit');
    Route::put('/cocktails/{cocktail}', [DashboardController::class, 'update'])->name('cocktails.update');
    Route::delete('/cocktails/{cocktail}', [DashboardController::class, 'destroy'])->name('cocktails.destroy');
});

require __DIR__ . '/auth.php';
