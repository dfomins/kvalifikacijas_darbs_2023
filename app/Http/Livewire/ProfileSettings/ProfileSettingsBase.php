<?php

namespace App\Http\Livewire\ProfileSettings;

use Livewire\Component;

use RealRashid\SweetAlert\Facades\Alert;

class ProfileSettingsBase extends Component
{
    public function update_profile_base()
    {
        $user = auth()->user();

        if($this->fname == $user->fname && $this->lname == $user->lname && $this->email == $user->email) {
            $this->dispatchBrowserEvent('process-swall', ['type' => 'warning', 'title' => 'Cita informācija netika ievadīta!']);
        } else {
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
            $this->dispatchBrowserEvent('process-swall', ['type' => 'success', 'title' => 'Informācija atjaunota!']);
        }
    }

    public function render()
    {
        $user = auth()->user();
        $this->fname = $user->fname;
        $this->lname = $user->lname;
        $this->email = $user->email;

        return view('livewire.profile-settings.profile-settings-base');
    }
}