<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AdminController;

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


Route::middleware(['auth', 'roleMiddleware:admin'])->group(function () {
    Route::get('/admin/dashboard', [AdminController::class, 'AdminDashboard'])->name('admin.dashboard');
    Route::get('/admin/logout', [AdminController::class, 'AdminLogout'])->name('admin.logout');
});

// Admin Login Page
Route::get('/admin/login', [AdminController::class, 'AdminLogin'])->name('admin.login');
Route::get('/admin/forgot-password', [AdminController::class, 'AdminForgotPassword'])->name('admin.forgot-password');
Route::post('/admin/password-link-sent', [AdminController::class, 'AdminResetLinkSent'])->name('admin.password-link-sent');
Route::get('/admin/reset-password/{token}', [AdminController::class, 'AdminResetPasswordForm'])->name('admin.reset-password-form');
Route::post('/admin/reset-password/store', [AdminController::class, 'AdminResetPasswordStore'])->name('admin.reset-password-store');

