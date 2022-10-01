<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Upload;
use App\Models\Profile;
use App\Models\PrivateMessage;

class InboxController extends Controller
{
    public function index() {
        $user = Auth::user();
        return Inertia::render('Inbox', [
            'user' => $user,
            'user2' => 0,
        ]); 
    }

    public function date_compare($element1, $element2) {
        $datetime1 = strtotime($element1['datetime']);
        $datetime2 = strtotime($element2['datetime']);
        return $datetime1 - $datetime2;
    } 

    public function load_conversation(User $user) {

        $user_auth = Auth::user();

        $user2_profile = Profile::Where('id', '=', $user->id)->get();;
        $user2_profile_img = Upload::Where('id', '=', $user2_profile[0]->profile_image)->get();
  
        $user_auth_messages = PrivateMessage::Where([['user_id', '=',  $user_auth->id],['to_user', '=', $user->id]])->get();
        $user2_messages = PrivateMessage::Where([['user_id', '=',  $user->id],['to_user', '=', $user_auth->id]])->get();
        $messages = $user_auth_messages->merge($user2_messages);
        $messages = $messages->sortByDesc('created_at');
        $messages = $messages->toArray();

        return Inertia::render('Inbox', [
            'user_auth' => $user_auth,
            'user2' => $user,
            'user2_profile_img' => $user2_profile_img[0]->name,
            'messages' => $messages,
        ]); 
    }

    
    public function send_message(Request $request) 
    {
        $user = Auth::user();

        $message = $request->message;
        $to_user = $request->to;

        PrivateMessage::create([
            'user_id' => $user->id,
            'to_user' => $to_user['id'],
            'message' => $message,
        ]);

        return $request;
        
    } 
}
