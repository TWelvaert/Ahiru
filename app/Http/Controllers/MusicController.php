<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;
use App\Models\Upload;
use App\Models\MusicUpload;

class MusicController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        return Inertia::render('Music', [
            'user' => $user
        ]);
    }

    public function create()
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

        $music = $user->music()->get();

        foreach ($music as $key => $track) {
            $image = 0;
            if($track->image_id == '0') {
                $image = Upload::where('id', '=', 1)->get();
            } else {
                $image = Upload::where('id', '=', $track->image_id)->get();
            }
           
            $track->image_id = $image[0]['name'];
        }
       
        return Inertia::render('MusicManager', [
            'user' => $user,
            'music' => $music,
            'user_uploads_audio' => $uploads_audio,
            'user_uploads_images' => $uploads_images,
        ]);
    }

    public function store(Request $request)
    {
        foreach ($request->uploads as $req) {
            $musicupload = MusicUpload::create([
                'user_id' => Auth::user()->id,
                'audio_id' => $req['audio_id'],
                'image_id' => $req['image_id'],
                'track_title' => $req['track_title'],
            ]);
        }
 
        return $request;
    }

}
