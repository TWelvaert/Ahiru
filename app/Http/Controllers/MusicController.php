<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;
use App\Models\Upload;
use App\Models\MusicUpload;
use Session;

class MusicController extends Controller
{
    public function index()
    {
        $user = Auth::user();

        $music = MusicUpload::all();

        foreach ($music as $key => $track) {
            $image = 0;
            if($track->image_id == '0') {
                $image = Upload::where('id', '=', 90)->get();
            } else {
                $image = Upload::where('id', '=', $track->image_id)->get();
            }
           
            $track->image_id = $image[0]['name'];

            $audio = Upload::where('id', '=', $track->audio_id)->first();
            $music[$key] = collect($track)->merge(['audio_file' => $audio->name]);
        }

        return Inertia::render('Music', [
            'music' => $music
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
                $image = Upload::where('id', '=', 90)->get();
            } else {
                $image = Upload::where('id', '=', $track->image_id)->first();
            }
            $track->image_id = $image->name;
            $audio = Upload::where('id', '=', $track->audio_id)->first();
            $music[$key] = collect($track)->merge(['audio_file' => $audio->name]);
        }
       
        return Inertia::render('Music/Manager', [
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

        Session::flash('message', 'Your music has been published!');
        Session::flash('flashtype', 'success');
 
        return $request;
    }

    public function edit(MusicUpload $track)
    {   
        $user = Auth::user();
        $user_uploads = Upload::where('user_id', '=', $user->id)->get();
        $uploads_images = [];

        $image = Upload::where('id', '=', $track->image_id)->get();
  
        foreach ($user_uploads as $upload) {
            if($upload['type'] == 'image') {
                array_push($uploads_images, $upload);
            }
        }
        
        return Inertia::render('Music/Edit', [
            'uploads_images' => $uploads_images,
            'music' => $track,
            'image' => $image[0]['name']
        ]);
    }

    public function update(MusicUpload $track, Request $request)
    {
            $track->update([
                'user_id' => Auth::user()->id,
                'audio_id' => $request->track['audio_id'],
                'image_id' => $request->track['image_id'],
                'track_title' => $request->track['track_title'],
            ]);

            Session::flash('message', 'Your track has been updated!');
            Session::flash('flashtype', 'success');
 
        return $track;
    }


    public function destroy(MusicUpload $track)
    {
        $track->delete();
        
        Session::flash('message', 'Your track has been deleted!');
        Session::flash('flashtype', 'success');

        return redirect()->back();
    }

}
