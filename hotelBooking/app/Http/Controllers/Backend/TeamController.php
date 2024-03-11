<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Team;
use Carbon\Carbon;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;


class TeamController extends Controller
{
    public function AllTeam(){

        $id = Auth::user()->id;
        $profileData = User::find($id);
        return view('admin.adminTeam',compact('profileData'));
    }

    public function AddTeam(Request $request){


        try {
        // Validation
            $request->validate([
                'Team_Image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
                'Team_Name' => 'required',
                'Team_Position' => 'nullable',
                'Team_Status' => 'required',
                'Fb_Url' => 'nullable|url',
                'Git_Url' => 'nullable|url',
                'Tw_Url' => 'nullable|url',
                'Yt_Url' => 'nullable|url',
            ]);


            // Upload Team Image
            if($request->hasFile('Team_Image')){
                $manager = new ImageManager(new Driver());
                $TeamImage = $request->file('Team_Image');
                $TeamImageNameGenerate = hexdec(uniqid()).'.'.$TeamImage->getClientOriginalExtension();
                $image = $manager->read($TeamImage);
                $image = $image->resize(550,670);
                $image->toJpeg(80)->save(base_path('public/upload/teamImage/'.$TeamImageNameGenerate));
                $save_url = 'upload/teamImage/'.$TeamImageNameGenerate;
            }

            // Error Catching
            if (!$request->hasFile('Team_Image')) {
                return response()->json([
                    'error' => 'Team image not found'
                ]);
            }

            Team::insert([
                'name'=>$request->Team_Name,
                'position'=>$request->Team_Position,
                'facebook'=>$request->Fb_Url,
                'github'=>$request->Git_Url,
                'twitter'=>$request->Tw_Url,
                'youtube'=>$request->Yt_Url,
                'image'=>$save_url,
                'status'=>$request->Team_Status,
                'created_at'=> Carbon::now()
            ]);

            return response()->json([
                'success' => 'Team Added Successfully',
            ]);
        } catch (\Exception $e) {
                \Log::error($e->getMessage());
                return response()->json(['error' => 'An error occurred while adding the team'], 500);
        }
    }

    public function ShowTeam(){
        $teams = Team::all();
        return response()->json([
            'status' => 200,
            'Alldata' => $teams
        ]);
    }

    public function ActiveTeam($id){
        $activeTeam = Team::findorFail($id);
        $activeTeam->update([
            'status'=>'inactive'
        ]);
        return response()->json([
            'success'=>$activeTeam->status // this will return the status from the database.
        ]);
    }
    public function InactiveTeam($id){
        $InactiveTeam = Team::findorFail($id);
        $InactiveTeam->update([
            'status'=>'active'
        ]);
        return response()->json([
            'success'=>$InactiveTeam->status // this will return the status from the database.
        ]);
    }

    public function DeleteTeam($id){
        $team = Team::findorFail($id);
        $teamImage = public_path($team->image);

        if(file_exists($teamImage)){
            @unlink($teamImage);
        }

        $team->delete();
        return response()->json([
            'status' => 'Team Deleted successfully'
        ]);
    }

    public function EditTeam($id){
        $team = Team::findorFail($id);
        return response()->json([
            'status' => 200,
            'Alldata' => $team
        ]);
    }

    public function UpdateTeam(Request $request,$id){

        $request->validate([
            'Edit_uploadImage' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'Edit_Team_Name' => 'required',
            'Edit_Team_Position' => 'nullable',
            'Edit_Status' => 'required',
            'Edit_Fb_Url' => 'nullable|url',
            'Edit_Git_Url' => 'nullable|url',
            'Edit_Tw_Url' => 'nullable|url',
            'Edit_Yt_Url' => 'nullable|url',
        ]);

        $team = Team::findorFail($id);
        $save_url = null;
        // Upload Team Image
        if($request->hasFile('Edit_uploadImage')){
            @unlink($team->image);
            $manager = new ImageManager(new Driver());
            $EditTeamImage = $request->file('Edit_uploadImage');
            $editTeamImageNameGenerate = hexdec(uniqid()).'.'.$EditTeamImage->getClientOriginalExtension();
            $image = $manager->read($EditTeamImage);
            $image = $image->resize(550,670);
            $image->toJpeg(80)->save(base_path('public/upload/teamImage/'.$editTeamImageNameGenerate));
            $save_url = 'upload/teamImage/'.$editTeamImageNameGenerate;
        }

        $team->update([
            'name'=>$request->Edit_Team_Name,
            'image'=>$save_url,
            'position'=>$request->Edit_Team_Position,
            'facebook'=>$request->Edit_Fb_Url,
            'github'=>$request->Edit_Git_Url,
            'twitter'=>$request->Edit_Tw_Url,
            'youtube'=>$request->Edit_Yt_Url,
            'status'=>$request->Edit_Status,
        ]);

        return response()->json([
            'status' => 'Team Updated Successfully'
        ]);

    }

}
