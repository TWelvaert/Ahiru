<?php

namespace App\Http\Controllers;

use App\Models\FreelanceAdvertisement;
use App\Models\Profile;
use App\Models\User;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Factories\BelongsToManyRelationship;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;
use App\Models\User;
use Illuminate\Database\Eloquent\Collection;
class HomeController extends Controller
{
    public function index_home()
    {
        $advertisements = FreelanceAdvertisement::orderBy('created_at', 'desc')->take(8)->get();
        $users = User::orderBy('created_at', 'desc')->take(8)->get();
        
        $userProfileData = [];
        
        foreach ($users as $user) {
            $profile = $user->profile()->get();
            $userProfileArray = ['user' => $user, 'profile' => $profile[0]];
            array_push($userProfileData, $userProfileArray);
        }
        
        dd($userProfileData);
        
        return Inertia::render('Home', [
            'advertisements' => $advertisements,
            'artists' => $users,
            'artistInfos' => $userProfileData
        ]);
        
    }

    public function index_music()
    {
        $user = Auth::user();
        return Inertia::render('Music', [
            'user' => $user
        ]);
    }

    public function index_likes()
    {
        $user = Auth::user();
        return Inertia::render('Likes', [
            'user' => $user
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
