<?php

namespace App\Http\Controllers\UserController;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

use App\Models\User;
use App\Models\Team;

class UserController extends Controller
{
    public function Index(){
        // Frontend Team data pass
        $teams = Team::where('status','active')->latest()->get();
        return view("frontend.index",compact('teams'));
    }

    // User Profile
    public function userProfile(){
        $id = Auth::user()->id;
        $userProfileData = User::find($id);
        return view('frontend.dashboard.userProfile',compact("userProfileData"));
    }

    // public function userProfileStore(Request $request){
    //     $id = Auth::user()->id;
    //     $data = User::find($id);

    //     // Validate request inputs
    //     $validatedData = $request->validate([
    //         'firstName' => 'required|string|max:255',
    //         'lastName' => 'required|string|max:255',
    //         // 'email' => 'required|string|email|max:255',
    //         'address' => 'nullable|string|max:255',
    //         'phone' => 'nullable|string|max:20',
    //         'dateOfBirth' => 'nullable|string|max:50',
    //         'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:8048', // Restrict file types and sizes
    //     ]);

    //     // Update user data
    //     $data->name = $validatedData['name'];
    //     // $data->email = $validatedData['email'];
    //     $data->address = $validatedData['address'];
    //     $data->dateOfBirth = $validatedData['dateOfBirth'];
    //     $data->phone = $validatedData['phone'];

    //     // Check if a new photo is uploaded
    //     if ($request->hasFile('photo')) {
    //         $file = $request->file('photo');
    //         $fileName = "User_Profile_" . date("YMD") . $file->getClientOriginalName();
    //         $file->move(public_path('/upload/userImages'), $fileName);
    //         if ($data->photo && file_exists(public_path('/upload/userImages/' . $data->photo))) {
    //             unlink(public_path('/upload/userImages/' . $data->photo));
    //         }
    //         $data->photo = $fileName;
    //     }
    //     // dd($data);
    //     $data->save();
    //     $notification = array(
    //         'message' => "User Profile Updated",
    //         'alert-type' => 'success'
    //     );
    //     return redirect()->back()->with($notification);
    // }

    public function userProfileStore(Request $request)
{
    try {
        $id = Auth::user()->id;
        $data = User::find($id);

        // Validate request inputs
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'address' => 'nullable|string|max:255',
            'phone' => 'nullable|string|max:20',
            'dateOfBirth' => 'nullable|string|max:50',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:8048', // Restrict file types and sizes
        ]);

        // Update user data
        $data->name = $validatedData['name'];
        // $data->email = $validatedData['email'];
        $data->address = $validatedData['address'];
        $data->dateOfBirth = $validatedData['dateOfBirth'];
        $data->phone = $validatedData['phone'];

        // Check if a new photo is uploaded
        if ($request->hasFile('photo')) {
            $file = $request->file('photo');
            $fileName = "User_Profile_" . date("YMD") . $file->getClientOriginalName();
            $file->move(public_path('/upload/userImages'), $fileName);
            if ($data->photo && file_exists(public_path('/upload/userImages/' . $data->photo))) {
                unlink(public_path('/upload/userImages/' . $data->photo));
            }
            $data->photo = $fileName;
        }

        $data->save();

        $notification = [
            'message' => "User Profile Updated",
            'alert-type' => 'success'
        ];
    } catch (\Exception $e) {
        // Handle the error here
        $notification = [
            'message' => "Error: " . $e->getMessage(),
            'alert-type' => 'error'
        ];
    }

    return redirect()->back()->with($notification);
}



    public function userChangePassword(){
        return view('frontend.dashboard.userChangePassword');
    }

    public function userChangePasswordStore(Request $request){
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

    public function userBookingList(){
        return view('frontend.dashboard.userBookingList');
    }
    public function userLogout(Request $request){
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}



































