<?php

namespace App\Http\Controllers;

use App\Models\FreelanceAdvertisement;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Factories\BelongsToManyRelationship;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;

class HomeController extends Controller
{
    public function index_home()
    {
        $advertisements = FreelanceAdvertisement::all();
        $user = Auth::user();
        return Inertia::render('Home', [
            'user' => $user,
            'advertisements' => $advertisements
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
