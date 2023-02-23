<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class ProfileController extends Controller
{
    public function profile() {
        return view('profile.profile');
    }

    public function edit_profile() {
        $user = auth()->user();
        $data['user'] = $user;
        return view('profile.profile_edit', $data);
    }

    public function update_profile(Request $request) {
        $request->validate([
            'fname' => 'required|string|max:50',
            'lname' => 'required|string|max:50',
            'email' => 'required|string|email|max:100|unique:users,email,'.auth()->user()->id,
        ], [
            'fname.required' => 'Šis lauks ir obligāts',
            'fname.max' => 'Vārds nevar būt garāks par :max rakstzīmēm',
            'lname.required' => 'Šis lauks ir obligāts',
            'lname.max' => 'Uzvārds nevar būt garāks par :max rakstzīmēm',
            'email.max' => 'E-pasts nevar būt garāks par :max rakstzīmēm',
        ]);

        auth()->user()->update([
            'fname' => $request->fname,
            'lname' => $request->lname,
            'email' => $request->email,
        ]);

        return redirect()->route('edit_profile');
    }

}
