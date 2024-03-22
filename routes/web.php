<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use Illuminate\Auth\Middleware\RedirectIfAuthenticated;

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

require __DIR__.'/auth.php';

//Admin Routes//
    //Protected Routes
        Route::middleware(['auth', 'role:admin'])->group(function () {
            Route::get('/admin/dashboard',[AdminController::class,'AdminDashboard'])->name('admin.dashboard');
            Route::get('/admin/logout',[AdminController::class,'AdminLogout'])->name('admin.logout');
            Route::get('/admin/profile',[AdminController::class,'AdminProfile'])->name('admin.profile');
            Route::post('/admin/profile/store',[AdminController::class,'AdminProfileStore'])->name('admin.profile.store');
            Route::get('/admin/change/password',[AdminController::class,'AdminChangePassword'])->name('admin.change.password');
            Route::post('/admin/update/password',[AdminController::class,'AdminUpdatePassword'])->name('admin.update.password');
        });
    //Public Routes
    Route::get('/admin/login',[AdminController::class,'AdminLogin'])->middleware(RedirectIfAuthenticated::class)->name('admin.login');
    Route::get('/admin/logout/page',[AdminController::class,'AdminLogoutPage'])->name('admin.logout.page');

