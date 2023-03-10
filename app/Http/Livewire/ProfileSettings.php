<?php

namespace App\Http\Livewire;

use Livewire\Component;

use Request;
use Hash;

use App\Models\Post;
use App\Models\Notif;

class ProfileSettings extends Component
{

    public $old_password;
    public $new_password;
    public $confirm_password;

    public function render()
    {
        $user = auth()->user();
        $this->fname = $user->fname;
        $this->lname = $user->lname;
        $this->email = $user->email;
        return view('livewire.profile-settings', $user);
    }

    public function update_profile_base()
    {
        $user = auth()->user();

        $this->validate([
            'fname' => 'required|string|max:50',
            'lname' => 'required|string|max:50',
            'email' => 'required|string|email|max:100|unique:users,email,'.auth()->user()->id,
        ]);
    
        $user->update([
            'fname' => $this->fname,
            'lname' => $this->lname,
            'email' => $this->email,
        ]);

        session()->flash('base_success');
    }

    public function update_profile_password()
    {
        $user = auth()->user();

        $this->validate([
            'old_password' => 'required|string',
            'new_password' => 'required|string|min:8|max:12',
            'confirm_password' => 'required|same:new_password',
        ]);

        if(Hash::check($this->old_password, $user->password)) {
            $user->update([
                'password' => Hash::make($this->new_password)
            ]);
            session()->flash('password_success');
        } else {
            session()->flash('password_error');
        }

        $this->reset(['old_password', 'new_password', 'confirm_password']);
    }

}