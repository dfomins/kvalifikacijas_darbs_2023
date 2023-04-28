<?php

namespace App\Http\Livewire\WorkRecords;

use Livewire\Component;

use Carbon\Carbon;

use App\Models\User;
use App\Models\Work;
use App\Models\WorkObject;
use App\Models\ObjectToUser;

class AdminWorkRecords extends Component
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
        if ($this->object_filter != null) {
            $users = User::orderBy('id', 'asc')->withWhereHas('objects', fn($query) =>
                $query->where('object_id', $this->object_filter)
            )->leftJoin('work', function($join) {
                $join->on('work.user_id', '=', 'users.id')->whereDate('date', Carbon::createFromFormat('d/m/Y', $this->date)->format('Y-m-d'));
            })->get();
        } else {
            $users = User::leftJoin('work', function($join) {
                $join->on('work.user_id', '=', 'users.id')->whereDate('date', Carbon::createFromFormat('d/m/Y', $this->date)->format('Y-m-d'));
            })->get();
        }

        $objrels = ObjectToUser::all()->unique('object_id')->sortBy('object_id');
        // $objects = WorkObject::all();

        return view('livewire.work-records.admin-work-records')->with(['users' => $users, 'objrels' => $objrels]);
    }
}
