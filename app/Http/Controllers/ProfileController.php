<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\User;
use App\Models\Notif;
use App\Models\Post;

use File;
use Hash;

class ProfileController extends Controller
{
    public function profile() {
        $user = auth()->user();
        $recent_notifs = Notif::latest()->limit(3)->get();
        $recent_posts = Post::where(['user_id' => auth()->user()->id])->latest()->limit(3)->get();
        return view('profile.profile')->with(['user' => $user, 'recent_posts' => $recent_posts, 'recent_notifs' => $recent_notifs]);
    }

    public function edit_profile() {
        return view('profile.profile_edit');
    }
}