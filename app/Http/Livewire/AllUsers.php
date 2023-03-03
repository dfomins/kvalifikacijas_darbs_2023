<?php

namespace App\Http\Livewire;

use Livewire\Component;

use App\Models\User;

use Auth;

class AllUsers extends Component
{
    public function render()
    {
        $users = User::All();
        return view('livewire.all_users')->with('users', $users);
    }

    public function remove($user_id) {
        $user = User::find($user_id);
        $user->delete();
    }
}
