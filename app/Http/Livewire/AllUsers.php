<?php

namespace App\Http\Livewire;

use Livewire\Component;

use App\Models\User;
use App\Models\Role;
use App\Models\WorkObject;
use App\Models\ObjectToUser;

use Validator;

class AllUsers extends Component
{

    public $editIndex;
    public $object_to_user = [0];
    public $object;

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
        $this->role_id = $user->role_id;
        $this->object_to_user = $user->objects->pluck('id')->toArray();
        $this->editIndex = $user->id;
    }

    public function cancel()
    {
        $this->editIndex = null;
    }

    public function save(User $user)
    {

        $this->validate([
            'fname' => ['required', 'string', 'max:50'],
            'lname' => ['required', 'string', 'max:50'],
            'email' => ['required', 'string', 'email', 'max:100', 'unique:users,email,'.$user->id],
            'role_id' => ['required', 'in:1,2,3'],
        ]);

        $user->update([
            'fname' => $this->fname,
            'lname' => $this->lname,
            'email' => $this->email,
            'role_id' => $this->role_id,
        ]);

        $user->objects()->sync($this->object_to_user);

        $this->editIndex = null;
    }

    public function render()
    {
        $users = User::all();
        $objects = WorkObject::all();
        return view('livewire.all-users')->with(['users' => $users, 'objects' => $objects]);
    }
}
