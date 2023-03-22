<?php

namespace App\Http\Livewire;

use Livewire\Component;

use App\Models\User;

class AllUsers extends Component
{

    public function render()
    {
        $users = User::all();
        return view('livewire.all-users')->with('users', $users);
    }
}
