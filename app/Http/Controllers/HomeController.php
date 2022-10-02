<?php

namespace App\Http\Controllers;

use App\Models\FreelanceAdvertisement;
use App\Models\Profile;
use App\Models\Upload;
use App\Models\MusicUpload;
use App\Models\User;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Factories\BelongsToManyRelationship;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;

class HomeController extends Controller
{
    public function index()
    {
        $collaborations = FreelanceAdvertisement::orderBy('created_at', 'desc')->take(8)->get();
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
            $collab = ['user' => $user, 'collab' => $collaboration, 'uploads' => $uploadsResult, 'profile' => $profile]; 

            array_push($collabs, $collab); 
        }

        $latest_users = User::orderBy('id', 'DESC')->take(8)->get();

        foreach ($latest_users as $key => $user) {
    
            $profile = Profile::Where('user_id', '=',$user->id)->first();
            $image = 0;
            
            if($profile->profile_image != 0) {
                $image = Upload::Where('id', '=', $profile->profile_image)->first();

                $image = $image->name;
            }
          
            $latest_users[$key] = collect($user)->merge(['profile_image' => $image]);
        }

        $latest_music = MusicUpload::orderBy('id', 'DESC')->take(4)->get();
       
        foreach ($latest_music as $key => $track) {
            $audio_file = Upload::Where('id', '=', $track->audio_id)->first();
            $image_file = Upload::Where('id', '=', $track->image_id)->first();
            $latest_music[$key] = collect($track)->merge(['image' => $image_file, 'audio' => $audio_file]);
        }

        return Inertia::render('Home', [
            'collabs' => $collabs, 
            'latest_users' => $latest_users,
            'latest_tracks' => $latest_music,
        ]);
    }

    public function index_following()
    {
        $user = Auth::user();
        return Inertia::render('Following', [
            'user' => $user
        ]);
    }
}
