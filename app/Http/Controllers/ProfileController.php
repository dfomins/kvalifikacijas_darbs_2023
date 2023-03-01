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
        // return view('profile.profile')->with('recent_posts', $recent_posts)->with('recent_notifs', $recent_notifs);
        return view('profile.profile')->with(['user' => $user, 'recent_posts' => $recent_posts, 'recent_notifs' => $recent_notifs]);
    }

    public function edit_profile() {
        $user = auth()->user();
        $data['user'] = $user;
        return view('profile.profile_edit', $data);
    }

    public function update_profile(Request $request) {
        if ($request->has('update_profile')) {
            $request->validateWithBag('update_profile', [
                'fname' => 'required|string|max:50',
                'lname' => 'required|string|max:50',
                'email' => 'required|string|email|max:100|unique:users,email,'.auth()->user()->id,
            ], [
                'fname.required' => 'Šis lauks ir obligāts',
                'fname.max' => 'Vārds nevar būt garāks par :max rakstzīmēm',
                'lname.required' => 'Šis lauks ir obligāts',
                'lname.max' => 'Uzvārds nevar būt garāks par :max rakstzīmēm',
                'email.required' => 'Šis lauks ir obligāts',
                'email.max' => 'E-pasts nevar būt garāks par :max rakstzīmēm',
                'email.unique' => 'Šāds e-pasts jau tiek izmantots',
            ]);

            $user = auth()->user();
    
            $user->update([
                'fname' => $request->fname,
                'lname' => $request->lname,
                'email' => $request->email,
            ]);
    
            return redirect()->route('edit_profile');
        }

        if ($request->has('update_password')) {
            $request->validateWithBag('update_password', [
                'old_password' => 'required|string',
                'new_password' => 'required|string|min:8|max:12',
                'confirm_password' => 'required|same:new_password',
            ], [
                'old_password.required' => 'Šis lauks ir obligāts',
                'new_password.required' => 'Šis lauks ir obligāts',
                'new_password.min' => 'Parole nevar būt īsāka par :min rakstzīmēm',
                'new_password.max' => 'Parole nevar būt garāka par :max rakstzīmēm',
                'confirm_password.required' => 'Šis lauks ir obligāts',
                'confirm_password.same' => 'Paroles nesakrīt',
            ]);
    
            $user = auth()->user();
    
            if(Hash::check($request->old_password, $user->password)) {
                $user->update([
                    'password' => Hash::make($request->new_password)
                ]);
                return redirect()->route('edit_profile')->with('success', 'Parole tika veiksmīgi nomainīta!');
            } else {
                return redirect()->route('edit_profile')->with('error', 'Vecā parole tika nepareizi ievadīta');
            }
        }

        if ($request->has('update_image')) {
            $request->validateWithBag('update_image', [
                'profila_bilde' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048'
            ], [
                'profila_bilde.required' => 'Nepieciešams ielādēt bildi!',
            ]);

            $user = auth()->user();

            if ($request->hasfile('profila_bilde')) {
                if ($user->profila_bilde != 'default.jpg') {
                    $destination = 'img/users/'.$user->profila_bilde;
                    if(File::exists($destination)) {
                        File::delete($destination);
                    }
                }
                $file = $request->file('profila_bilde');
                $extention = $file->getClientOriginalExtension();
                $filename = time().'.'.$extention;
                $file->move('img/users', $filename);
                $user->profila_bilde = $filename;
            }

            $user->update();

            return redirect()->route('edit_profile');
        }
    }
}