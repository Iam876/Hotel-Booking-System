<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Facades\Mail;
use App\Mail\AdminResetPassword\adminResetPassword;
use Illuminate\Support\Facades\Hash;
use App\Models\User;


class AdminController extends Controller
{
    public function AdminDashboard(){
        return view('admin.index');
    } // Admin dashboard Redirect


    public function AdminLogout(Request $request)
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }// Logout functionality



    public function AdminLogin(){
        return view('admin.adminLogin');
    } // Login Page

    // Forgot Password

    public function AdminForgotPassword()
    {
        return view('admin.forgotPassword.adminForgotPassword');
    }

    // Send reset password link
    public function AdminResetLinkSent(Request $request)
{
    $request->validate([
        'email' => ['required', 'email'],
    ]);

    // Retrieve the user by email
    $user = User::where('email', $request->email)->first();

    if (!$user) {
        return back()->withErrors(['email' => __('User not found')]);
    }

    // Generate a password reset token
    $token = Password::broker()->createToken($user);

    // Save the token in the user's record
    $user->reset_token = $token;
    $user->save();

    // Manually construct the reset link URL
    $resetLink = url('admin/reset-password') . '/' . $token;

    // Send the password reset email
    $this->sendResetLinkEmail($user, $resetLink);

    return back()->with('status', __('Password reset link has been sent to your email'));
}


    // Send reset password email
    protected function sendResetLinkEmail($user, $resetLink)
    {
        Mail::to($user->email)->send(new adminResetPassword($resetLink));
    }

    // Admin reset password form
    public function AdminResetPasswordForm(Request $request, $token)
    {
        // Validate the token
        $user = User::where('reset_token', $token)->first();

        if (!$user) {
            // Invalid token, redirect with error message
            return redirect()->route('login')->withErrors(['token' => __('Invalid token')]);
        }

        // Token is valid, display the reset password form
        return view('admin.forgotPassword.AdminResetPasswordForm', ['token' => $token]);
    }

//     public function AdminResetPasswordStore(Request $request)
// {
//     $request->validate([
//         'token' => ['required'],
//         'password' => ['required', 'confirmed'],
//     ], [
//         'password.confirmed' => 'The password confirmation does not match.',
//     ]);

//     // Retrieve the user by reset_token
//     $user = User::where('reset_token', $request->token)->first();

//     if (!$user) {
//         return back()->withErrors(['token' => __('Invalid token')]);
//     }

//     // Check if password and confirmation match
//     if ($request->password !== $request->password_confirmation) {
//         return back()->withErrors(['password' => 'The password confirmation does not match.'])->withInput();
//     }

//     // Update the user's password
//     $user->password = Hash::make($request->password);

//     // Reset the reset_token after password update
//     $user->reset_token = null;

//     // Save the user
//     $user->save();

//     return redirect()->route('login')->with('status', __('Password has been reset successfully'));
// }

public function AdminResetPasswordStore(Request $request)
{
    $request->validate([
        'token' => ['required'],
        'password' => ['required', 'confirmed'],
    ], [
        'password.confirmed' => 'The password confirmation does not match.',
    ]);

    // Retrieve the user by reset_token
    $user = User::where('reset_token', $request->token)->first();

    if (!$user) {
        return back()->withErrors(['token' => __('Invalid token')]);
    }

    // Check if password and confirmation match
    if ($request->password !== $request->password_confirmation) {
        return back()->withErrors(['password' => 'The password confirmation does not match.'])->withInput();
    }

    // Update the user's password
    $user->password = Hash::make($request->password);

    // Reset the reset_token after password update
    $user->reset_token = null;

    // Save the user
    $user->save();

    return redirect()->route('login')->with('status', __('Password has been reset successfully'));
}

}
