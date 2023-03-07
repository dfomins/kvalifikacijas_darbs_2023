<?php

namespace App\Http\Livewire;

use Livewire\Component;

use App\Models\User;

use Validator;

use Auth;

class AllUsers extends Component
{
    public function changeRole(User $user, $role_id)
    {

        Validator::make(['role_id' => $role_id], [
            'role_id' => 'required|in:1,2,3',
        ])->validate();

        $user->update(['role_id' => $role_id]);
    }

    public function remove($user_id)
    {
        $user = User::find($user_id);
        $user->delete();
    }

    public function render()
    {
        $users = User::paginate();
        return view('livewire.all_users')->with('users', $users);
    }
}
