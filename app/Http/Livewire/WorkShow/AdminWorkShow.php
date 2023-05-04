<?php

namespace App\Http\Livewire\WorkShow;

use App\Models\User;
use App\Models\Work;

use Livewire\Component;

use Carbon\Carbon;

class AdminWorkShow extends Component
{
    public $user_filter, $start_date, $end_date;

    public function mount()
    {
        $this->user_filter = User::all()->first()->id;
        $this->start_date = Carbon::now()->startOfMonth()->format('d/m/Y');
        // $this->start_date = 31/03/2022;
        $this->end_date = Carbon::today()->format('d/m/Y');
        // $this->end_date = 04/05/2023;
    }

    public function render()
    {
        $qstart_date = Carbon::createFromFormat('d/m/Y', $this->start_date)->format('Y-m-d');
        $qend_date = Carbon::createFromFormat('d/m/Y', $this->end_date)->format('Y-m-d');
        $users = User::all();
        $work = Work::whereBetween('date', [$qstart_date, $qend_date])->get();
        // ('date', Carbon::createFromFormat('d/m/Y', $this->date)->format('Y-m-d')
        // $work = $workQuery->whereBetween('date', [$this->start_date, $this->end_date]);
        // $work = $workQuery->where('date', '>=', $this->start_date)->where('date', '<=', $this->end_date)->dd();
        return view('livewire.work-show.admin-work-show')->with(['users' => $users, 'work' => $work]);
    }
}
