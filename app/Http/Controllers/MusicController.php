<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;
use App\Models\Upload;

class MusicController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        return Inertia::render('Music', [
            'user' => $user
        ]);
    }

    public function manager()
    {
        $user = Auth::user();
        $user_uploads = Upload::where('user_id', '=', $user->id)->get();
        $uploads = [];

        foreach ($user_uploads as $upload) {
            if($upload['type'] == 'audio') {
                array_push($uploads, $upload);
            }
        }

        return Inertia::render('MusicManager', [
            'user_uploads' => $uploads
        ]);
    }
}
