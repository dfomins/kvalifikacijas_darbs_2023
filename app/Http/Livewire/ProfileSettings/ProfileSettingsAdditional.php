<?php

namespace App\Http\Livewire\ProfileSettings;

use Livewire\Component;

class ProfileSettingsAdditional extends Component
{
    public function update_profile_additional()
    {

        $user = auth()->user();

        $this->validate([
            'personal_code' => 'required|max:12',
            'date_of_birth' => 'nullable|before:today',
            'city' => 'max:50',
            'street' => 'max:50',
            'house_number' => 'max:10',
        ]);

        $user->update([
            'personal_code' => $this->personal_code,
            'date_of_birth' => $this->date_of_birth,
            'city' => $this->city,
            'street' => $this->street,
            'house_number' => $this->house_number,
        ]);

        session()->flash('additional_success');
    }

    public function render()
    {
        $user = auth()->user();

        $this->personal_code = $user->personal_code;
        $this->date_of_birth = $user->date_of_birth;
        $this->city = $user->city;
        $this->street = $user->street;
        $this->house_number = $user->house_number;

        return view('livewire.profile-settings.profile-settings-additional');
    }
}
