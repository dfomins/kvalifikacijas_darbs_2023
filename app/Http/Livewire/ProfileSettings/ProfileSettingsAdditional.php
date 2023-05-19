<?php

namespace App\Http\Livewire\ProfileSettings;

use Livewire\Component;

use Carbon\Carbon;

class ProfileSettingsAdditional extends Component
{

    // protected $listeners = ['setBirthDate'];

    // public function setBirthDate($data){
    //     $this->date_of_birth = $data;
    // }

    public function update_profile_additional()
    {
        $user = auth()->user();

        if ($this->personal_code == $user->personal_code && $this->date_of_birth == $user->date_of_birth && $this->city == $user->city && $this->street == $user->street && $this->house_number == $user->house_number) {
            $this->dispatchBrowserEvent('process-swall', ['type' => 'warning', 'title' => 'Nekas netika mainīts!']);
        } else {
            $this->validate([
                'personal_code' => 'max:12',
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

            $this->dispatchBrowserEvent('process-swall', ['type' => 'success', 'title' => 'Informācija atjaunota!']);
        }
    }

    public function render()
    {
        $user = auth()->user();

        $this->personal_code = $user->personal_code;
        if ($user->date_of_birth != null) { 
            $this->date_of_birth = Carbon::createFromFormat('Y-m-d', $user->date_of_birth)->format('d/m/Y');
        } else {
            $this->date_of_birth = $user->date_of_birth;
        }
        $this->city = $user->city;
        $this->street = $user->street;
        $this->house_number = $user->house_number;

        return view('livewire.profile-settings.profile-settings-additional');
    }
}