<?php

namespace App\Http\Livewire;

use Livewire\Component;

use Carbon\Carbon;

use App\Models\User;
use App\Models\Work;

class WorkRecords extends Component
{
    public $editIndex;

    public function edit($user)
    {
        $this->hours = $user['hours'];
        $this->editIndex = $user['id'];
    }

    public function mount()
    {
        $this->date = Carbon::today()->toDateString();
    }

    public function cancel()
    {
        $this->editIndex = null;
    }

    public function save($user)
    {
        if ($this->hours == null) {
            $work = Work::find($user['work_id']);
            if ($work) {
                $work->delete();
                $this->editIndex = null;
            } else {
                $this->editIndex = null;
            }
        } else {
            $work = Work::find($user['work_id']);
            if (!$work) {
                Work::create([
                    'user_id' => $user['id'],
                    'date' => $this->date,
                    'hours' => $this->hours,
                ]);
                $this->editIndex = null;
            } else {
                $this->editIndex = null;
            }
        }
    }

    public function render()
    {
        $users = User::leftJoin('work', function($join) {
            $join->on('work.user_id', '=', 'users.id')->whereDate('date', $this->date);
        })->get();

        return view('livewire.work-records')->with(['users' => $users]);
    }
}
