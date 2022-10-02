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

        return Inertia::render('Home', [
            'collabs' => $collabs, 
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
