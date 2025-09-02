<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DesignationController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UsersController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('auth.login');
});

Route::controller(AdminController::class)->group(function () {
    Route::get('admin/dashboard', 'AdminDashboard')->name('admin.dash');
});

Route::controller(CategoryController::class)->group(function () {
    Route::get('/admin/categories', 'CategoryIndex')->name('cat.index');
    Route::post('/admin/categories/store', 'CategoryStore')->name('cat.store');
    Route::get('/admin/categories/edit/{id}', 'CategoryEdit')->name('cat.edit');
    Route::post('/admin/categories/update', 'CategoryUpdate')->name('cat.update');
    Route::get('/admin/categories/delete/{id}', 'CategoryDelete')->name('cat.delete');
});
Route::controller(DesignationController::class)->group(function () {
    Route::get('/admin/designations', 'DesignationIndex')->name('desig.index');
    Route::get('/admin/designations/edit/{id}', 'DesignationEdit')->name('desig.edit');
    Route::post('/admin/designations/store', 'DesignationStore')->name('desig.store');
    Route::post('/admin/designations/update', 'DesignationUpdate')->name('desig.update');
    Route::get('/admin/designations/delete/{id}', 'DesignationDelete')->name('desig.delete');
});

Route::controller(UsersController::class)->group(function () {
    Route::get('/admin/users-members/', 'UsersIndex')->name('users.index');
    Route::get('/admin/users-members/{id}', 'UserInfo')->name('users.info');
    Route::post('/admin/users-members/store', 'UsersStore')->name('users.store');
});

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

// Route::middleware('auth')->group(function () {
//     Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
//     Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
//     Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
// });

require __DIR__ . '/auth.php';