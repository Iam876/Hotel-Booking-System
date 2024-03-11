<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
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
        header('Cache-Control: no-cache, no-store, must-revalidate');
        header('Pragma: no-cache');
        header('Expires: 0');
        $id = Auth::user()->id;
        $profileData = User::find($id);

    return view('admin.index',compact("profileData"));

    } // Admin dashboard Redirect


    public function AdminLogout(Request $request)
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/admin/login');
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



// Admin Profile Part Start
public function AdminProfile(){
$id = Auth::user()->id;
$profileData = User::find($id);

return view("admin.adminProfile",compact("profileData"));
}

public function AdminProfileStore(Request $request) {
    $id = Auth::user()->id;
    $data = User::find($id);

    // Validate request inputs
    $validatedData = $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|string|email|max:255',
        'address' => 'nullable|string|max:255',
        'phone' => 'nullable|string|max:20',
        'dateOfBirth' => 'nullable|string|max:50',
        'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:8048', // Restrict file types and sizes
    ]);

    // Update user data
    $data->name = $validatedData['name'];
    $data->email = $validatedData['email'];
    $data->address = $validatedData['address'];
    $data->dateOfBirth = $validatedData['dateOfBirth'];
    $data->phone = $validatedData['phone'];

    // Check if a new photo is uploaded
    if ($request->hasFile('photo')) {
        $file = $request->file('photo');
        $fileName = "Admin_Profile_" . date("YMD") . $file->getClientOriginalName();
        $file->move(public_path('/upload/adminImages'), $fileName);
        if ($data->photo && file_exists(public_path('/upload/adminImages/' . $data->photo))) {
            unlink(public_path('/upload/adminImages/' . $data->photo));
        }
        $data->photo = $fileName;
    }
    // dd($data);
    $data->save();
    $notification = array(
        'message' => "Admin Profile Updated",
        'alert-type' => 'success'
    );

    return redirect()->back()->with($notification);
}

public function AdminChangePassword(){
    $id = Auth::user()->id;
$profileData = User::find($id);
    return view('admin.adminChangePassword',compact("profileData"));
}

public function AdminChangePasswordStore(Request $request){
    $request->validate([
        'old_password'=>'required',
        'new_password'=>'required|confirmed'
    ]);

    if(!Hash::check($request->old_password, Auth::user()->password)){
        $notification = array(
            'message' => "Old Password doesn't matched",
            'alert-type' => 'error'
        );
        return back()->with($notification);
    }

    User::whereId(Auth::user()->id)->update([
        'password' => Hash::make($request->new_password)
    ]);
    $notification = array(
        'message' => 'Password Changed Successfully',
        'alert-type' => 'success'
    );
    return back()->with($notification);
}
// Admin Profile Part End






}
