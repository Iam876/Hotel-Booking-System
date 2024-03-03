<?php
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AdminController;
use App\Http\Controllers\UserController\UserController;

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

// ######################### Start Admin Panel #########################
Route::middleware(['auth', 'roleMiddleware:admin'])->group(function () {
    Route::get('/admin/dashboard', [AdminController::class, 'AdminDashboard'])->name('admin.dashboard');
    Route::get('/admin/logout', [AdminController::class, 'AdminLogout'])->name('admin.logout');
    // Admin Profile Start
    Route::get('/admin/profile', [AdminController::class, 'AdminProfile'])->name('admin.profile');
    Route::post('/admin/profile/store', [AdminController::class, 'AdminProfileStore'])->name('admin.profile.store');
    Route::get('/admin/change/password', [AdminController::class, 'AdminChangePassword'])->name('adminChangePassword');
    Route::post('/admin/change/password/store', [AdminController::class, 'AdminChangePasswordStore'])->name('admin.changePasswordStore');

});

// Admin Login Page
Route::get('/admin/login', [AdminController::class, 'AdminLogin'])->name('admin.login');
Route::get('/admin/forgot-password', [AdminController::class, 'AdminForgotPassword'])->name('admin.forgot-password');
Route::post('/admin/password-link-sent', [AdminController::class, 'AdminResetLinkSent'])->name('admin.password-link-sent');
Route::get('/admin/reset-password/{token}', [AdminController::class, 'AdminResetPasswordForm'])->name('admin.reset-password-form');
Route::post('/admin/reset-password/store', [AdminController::class, 'AdminResetPasswordStore'])->name('admin.reset-password-store');

// ######################### End Admin Panel #########################

// ######################### Start Frontend #######################
Route::get('/', [UserController::class, 'Index']);


Route::middleware('auth')->group(function () {
    Route::get('/dashboard', [UserController::class, 'dashboard'])->name('user.dashboard');
    Route::get('/user/logout', [UserController::class, 'userLogout'])->name('user.logout');

    Route::get('/user/profile', [UserController::class, 'userProfile'])->name('user.profile');
    Route::post('/user/profile/store', [UserController::class, 'userProfileStore'])->name('user.profile.store');

    Route::get('/user/change/password', [UserController::class, 'userChangePassword'])->name('user.change.password');
    Route::post('/user/change/password/store', [UserController::class, 'userChangePasswordStore'])->name('user.change.password.store');

    Route::get('/user/booking/list', [UserController::class, 'userBookingList'])->name('user.booking.list');

});
// ######################### End Frontend #########################
