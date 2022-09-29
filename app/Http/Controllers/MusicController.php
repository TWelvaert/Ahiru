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
        $uploads_audio = [];
        $uploads_images = [];

        foreach ($user_uploads as $upload) {
            if($upload['type'] == 'audio') {
                array_push($uploads_audio, $upload);
            }
        }

        foreach ($user_uploads as $upload) {
            if($upload['type'] == 'image') {
                array_push($uploads_images, $upload);
            }
        }

        return Inertia::render('MusicManager', [
            'user_uploads_audio' => $uploads_audio,
            'user_uploads_images' => $uploads_images,
        ]);
    }
}
