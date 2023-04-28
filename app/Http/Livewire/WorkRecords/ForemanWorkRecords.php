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
        // $this->object_filter = auth()->user()->objects->first()->id;
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
        // Objekti, kuriem tiek piesaistīts brigadieris
        $foreman_objects = auth()->user()->objects->pluck('id')->toArray();

        // Ja filtrēšanas izvēlnē izvēlēts "Visi", tad attēlo visus darbiniekus no objektiem, pie kuriem tiek piesaistīts brigadieris
        if ($this->object_filter != null) {
            $users = User::orderBy('id', 'asc')->withWhereHas('objects', fn($query) =>
                $query->whereIn('object_id', $foreman_objects)->where('object_id', $this->object_filter)
            )->leftJoin('work', function($join) {
                $join->on('work.user_id', '=', 'users.id')->whereDate('date', Carbon::createFromFormat('d/m/Y', $this->date)->format('Y-m-d'));
            })->get();
        // Ja filtrēšanas izvēlnē izvēlēts konkrēts objekts, tad attēlo visus darbiniekus no tā
        } else {
            $users = User::orderBy('id', 'asc')->withWhereHas('objects', fn($query) =>
                $query->whereIn('object_id', $foreman_objects)
            )->leftJoin('work', function($join) {
                $join->on('work.user_id', '=', 'users.id')->whereDate('date', Carbon::createFromFormat('d/m/Y', $this->date)->format('Y-m-d'));
            })->get();
        }
        $objrels = ObjectToUser::all()->where('user_id', auth()->user()->id)->unique('object_id')->sortBy('object_id');
        return view('livewire.work-records.foreman-work-records')->with(['users' => $users, 'objrels' => $objrels]);
    }
}
