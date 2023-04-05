<?php

namespace App\Http\Livewire;

use Livewire\Component;

use Carbon\Carbon;
use DB;

use App\Models\User;
use App\Models\Work;

class WorkRecords extends Component
{

    public $editIndex = 0;

    public function edit(User $user)
    {
        $editIndex = 1;
        dd($user->work);
        // $this->hours = $user->work->pluck('id')->where('work_date', $this->work_date);
    }

    public function mount()
    {
        $this->work_date = Carbon::today()->toDateString();
    }

    public function render()
    {
        $users = User::All();
        $work = Work::All();

        return view('livewire.work-records')->with(['users' => $users, 'work' => $work]);
    }
}
