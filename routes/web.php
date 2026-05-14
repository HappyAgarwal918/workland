<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware(['auth', 'role:admin'])->group(function(){
    Route::get('/admin/dashboard', [Controller::class, 'dashboard'])->name('admin.dashboard');
});

Route::middleware(['auth', 'role:employer'])->group(function(){
    Route::get('/employer/dashboard', [Controller::class, 'Edashboard'])->name('employer.dashboard');
});

Route::middleware(['auth', 'role:guide'])->group(function(){
    Route::get('/guide/dashboard', [Controller::class, 'Gdashboard'])->name('guide.dashboard');
});

require __DIR__.'/auth.php';
