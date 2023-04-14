<?php

namespace App\Http\Livewire\ProfileSettings;

use Livewire\Component;

use Hash;

class ProfileSettingsPassword extends Component
{
    public $old_password, $new_password, $confirm_password;

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
            $this->dispatchBrowserEvent('process-swall', ['type' => 'success', 'title' => 'Parole tika veiksmīgi atjaunota!']);
        } else {
            $this->dispatchBrowserEvent('process-swall', ['type' => 'error', 'title' => 'Vecā parole tika nepareizi ievadīta!']);
        }

        $this->reset(['old_password', 'new_password', 'confirm_password']);
    }

    public function render()
    {
        return view('livewire.profile-settings.profile-settings-password');
    }
}