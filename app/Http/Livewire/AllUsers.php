<?php

namespace App\Http\Livewire;

use Livewire\Component;

use App\Models\User;
use App\Models\Role;

use Validator;

class AllUsers extends Component
{

    public $editIndex = null;

    public $fname, $lname;

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

    public function edit(User $user)
    {
        $this->fname = $user->fname;
        $this->lname = $user->lname;
        $this->email = $user->email;
        $this->editIndex = $user->id;
    }

    public function save(User $user)
    {

        $this->validate([
            'fname' => ['required', 'string', 'max:50'],
            'lname' => ['required', 'string', 'max:50'],
            'email' => ['required', 'string', 'email', 'max:100', 'unique:users,email,'.$user->id],
        ]);

        $user->update([
            'fname' => $this->fname,
            'lname' => $this->lname,
            'email' => $this->email,
        ]);

        $this->editIndex = null;
    }

    public function cancel()
    {
        $this->editIndex = null;
    }

    public function render()
    {
        $users = User::all();
        return view('livewire.all-users')->with('users', $users);
    }
}
