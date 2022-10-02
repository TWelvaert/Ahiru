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

class HomeController extends Controller
{
    public function index()
    {
        $advertisements = FreelanceAdvertisement::orderBy('created_at', 'desc')->take(8)->get();
        $users = User::orderBy('created_at', 'desc')->take(8)->get();

        $userProfileData = [];

        foreach ($users as $user) {
            $profile = $user->profile()->get();
            $userProfileArray = ['user' => $user, 'profile' => $profile[0]];
            array_push($userProfileData, $userProfileArray);
        }

        return Inertia::render('Home', [
            'advertisements' => $advertisements,
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
