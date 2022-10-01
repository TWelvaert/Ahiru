<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;
use Illuminate\Support\Facades\Auth;

class InboxController extends Controller
{
    function index() {
        $user = Auth::user();
        return Inertia::render('Inbox', [
            'user' => $user,
        ]); 
    }
}
