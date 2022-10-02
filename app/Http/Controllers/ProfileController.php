<?php

namespace App\Http\Controllers;

use App\Models\FreelanceAdvertisement;
use App\Models\Profile;
use App\Models\Upload;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Inertia\Inertia;
use Session;

class ProfileController extends Controller
{
  public function index (User $user)
    {

         $collaborations = $user->advertisements()->get();

        $collaborations = $collaborations->sortByDesc('created_at')->take(8);
        $followers = User::orderBy('created_at', 'desc')->take(5)->get();

        $followProfileData = [];

        foreach ($followers as $follow) {
            $profile = $follow->profile()->get();
            $followProfileArray = ['follow' => $follow, 'profile' => $profile];
            array_push($followProfileData, $followProfileArray);
        }

        $collabs = [];
        
        foreach ($collaborations as $collaboration) {

            $uploads = explode(",", $collaboration->uploads);
            $uploadsResult = [];
            
            foreach ($uploads as $upload) {
                if (strlen($upload) > 0) {
                    $result = Upload::where('id', '=', $upload)->first();
                    $uploadsResult = $result;
                }
            }
            
            $profile = Profile::Where('user_id', '=',$collaboration->user_id)->first();
            
            $user = User::Where('id', '=',$collaboration->user_id)->first();
            $collab = ['user' => $user, 'collab' => $collaboration, 'upload' => $uploadsResult, 'profile' => $profile]; 

            array_push($collabs, $collab); 
        }

        //dd($collabs);
        
        $profile = $user->profile()->get();
       
        $profileImage = Upload::where('id', '=', $profile[0]->profile_image)->first();
        

        $auth = Auth::user();
        
        return Inertia::render('Profile',[
            'user' => $user,
            'collaborations' => $collaborations,
            'collabs' => $collabs,
            'profile' => $profile,
            'followProfileData' => $followProfileData,
            'auth' => $auth,
            'profileImage' => $profileImage
        ]);


    }

    public function update(Request $request, User $user)
    {
       
        $profile = $user->profile()->get(); 
        
        $profile[0]->update([
            "bio" => $request->profile[0]['bio'],
        ]);


        Session::flash('message', 'Your Profile was Updated successfully!');
        Session::flash('flashtype', 'success');

        return redirect()->back();
    }

    
}
