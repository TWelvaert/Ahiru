<?php

namespace App\Http\Controllers;

use App\Models\FreelanceAdvertisement;
use App\Models\Profile;
use App\Models\Upload;
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
        $users = User::orderBy('created_at', 'desc')->take(8)->get();

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
           
            $collab = ['collab' => $collaboration, 'uploads' => $uploadsResult]; 
            array_push($collabs, $collab);
           
        }
       // dd($collabs);
        $userProfileData = [];
        foreach ($users as $user) {
            $profile = $user->profile()->get();
            $userProfileArray = ['user' => $user, 'profile' => $profile, 'collabs' => $collabs];
            array_push($userProfileData, $userProfileArray);
        }
        
        //dd($userProfileData);
        

        return Inertia::render('Home', [
            'artists' => $users,
            'userProfileData' => $userProfileData
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
