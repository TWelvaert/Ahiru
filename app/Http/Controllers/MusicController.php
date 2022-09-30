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

        return Inertia::render('MusicManager', [
            'user_uploads_audio' => $uploads_audio,
            'user_uploads_images' => $uploads_images,
        ]);
    }

    public function store(Request $request)
    {
        // foreach ($request as $req) {
        //     $musicupload = MusicUpload::create([
        //         'user_id' => Auth::user()->id,
        //         'audio_id' => $req->uploads[0]['audio_id'],
        //         'image_id' => $req->uploads[0]['image_id'],
        //         'track_title' => $req->uploads[0]['track_title'],
        //     ]);
        // }

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
