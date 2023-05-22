<?php

namespace App\Http\Livewire;

use Livewire\Component;

use App\Models\User;
use App\Models\Role;
use App\Models\WorkObject;
use App\Models\ObjectToUser;

use Validator;
use DB;
use Carbon\Carbon;

class AllUsers extends Component
{

    public $editIndex;
    public $search;

    public function remove($user_id)
    {
        $user = User::find($user_id);
        if ($user->profila_bilde != 'default.jpg') {
            $destination = 'public/'.$user->profila_bilde;
            if(Storage::exists($destination)) {
                Storage::delete($destination);
            }
        }
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
        $this->personal_code = $user->personal_code;
        if ($user->date_of_birth != null) { 
            $this->date_of_birth = Carbon::createFromFormat('Y-m-d', $user->date_of_birth)->format('d/m/Y');
        } else {
            $this->date_of_birth = $user->date_of_birth;
        }
        $this->city = $user->city;
        $this->street = $user->street;
        $this->house_number = $user->house_number;
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
            'personal_code' => 'max:12',
            'date_of_birth' => 'nullable|before:today',
            'city' => 'max:50',
            'street' => 'max:50',
            'house_number' => 'max:10',
        ]);

        $user->update([
            'fname' => $this->fname,
            'lname' => $this->lname,
            'email' => $this->email,
            'role_id' => $this->role_id,
            'personal_code' => $this->personal_code,
            'date_of_birth' => $this->date_of_birth,
            'city' => $this->city,
            'street' => $this->street,
            'house_number' => $this->house_number,
        ]);

        $user->objects()->sync($this->object_to_user);

        $this->editIndex = null;
    }

    public function render()
    {
        $users = User::orderBy('id', 'asc')->when($this->search, function($query, $search){
            return $query->where('id', 'LIKE', "$search")
            ->orWhere('fname', 'LIKE', "%$search%")
            ->orWhere('lname', 'LIKE', "%$search%")
            ->orWhere(DB::raw("CONCAT(`fname`, ' ', `lname`)"), 'LIKE', "%$search%")
            ->orWhere('email', 'LIKE', "%$search%");
        })->get();
        $objects = WorkObject::all();
        $userssum = $users->count('id');
        return view('livewire.all-users')->with(['users' => $users, 'objects' => $objects, 'userssum' => $userssum]);
    }
}
//