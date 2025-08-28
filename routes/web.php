<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DesignationController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('auth.login');
});

Route::controller(AdminController::class)->group(function(){
    Route::get('admin/dashboard', 'AdminDashboard')->name('admin.dash');
});

Route::controller(CategoryController::class)->group(function(){
    Route::get('/admin/categories', 'CategoryIndex')->name('cat.index');
});
Route::controller(DesignationController::class)->group(function(){
    Route::get('/admin/designations', 'DesignationIndex')->name('desig.index');
});

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

// Route::middleware('auth')->group(function () {
//     Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
//     Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
//     Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
// });

require __DIR__.'/auth.php';