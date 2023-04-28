<?php

namespace App\Http\Livewire\WorkRecords;

use Livewire\Component;

use Carbon\Carbon;

use App\Models\User;
use App\Models\Work;
use App\Models\ObjectToUser;

class ForemanWorkRecords extends Component
{

    public $editIndex = null;
    public $object_filter;

    public function edit($user)
    {
        $this->hours = $user['hours'];
        $this->editIndex = $user['id'];
    }

    public function mount()
    {
        // $this->object_filter =;
        $this->date = Carbon::today()->format('d/m/Y');
    }

    public function cancel()
    {
        $this->editIndex = null;
    }

    public function save($user)
    {
        $work = Work::find($user['work_id']);
        $this->validate(Work::$rules);
        if ($this->hours == null) {
            if ($work) {
                $work->delete();
                $this->editIndex = null;
            } else {
                $this->editIndex = null;
            }
        } else {
            if (!$work) {
                Work::create([
                    'user_id' => $user['id'],
                    'date' => $this->date,
                    'hours' => $this->hours,
                ]);
                $this->editIndex = null;
            } else {
                $work->update([
                    'hours' => $this->hours,
                ]);
                $this->editIndex = null;
            }
        }
    }

    public function render()
    {
        // $users = User::leftJoin('work', function($join) {
        //     $join->on('work.user_id', '=', 'users.id')->whereDate('date', Carbon::createFromFormat('d/m/Y', $this->date)->format('Y-m-d'));
        // })->get()->dd();
        dd($user = User::find(1)->objects);
        $objrels = ObjectToUser::where('user_id', auth()->user()->id)->get();
        return view('livewire.work-records.foreman-work-records')->with(['users' => $users, 'objrels' => $objrels]);
    }
}
