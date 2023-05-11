<?php

namespace App\Http\Livewire\WorkShow;

use App\Models\User;
use App\Models\Work;

use Livewire\Component;

use Carbon\Carbon;
use Carbon\CarbonPeriod;
use Barryvdh\DomPDF\Facade\Pdf;

class UserWorkShow extends Component
{
    public $user_filter, $start_date, $end_date;

    public function mount()
    {
        $this->user_filter = User::all()->first()->id;
        $this->start_date = Carbon::now()->startOfMonth()->format('d/m/Y');
        $this->end_date = Carbon::today()->format('d/m/Y');
    }

    public function render()
    {
        $this->user = User::find(auth()->id());
        $qstart_date = Carbon::createFromFormat('d/m/Y', $this->start_date)->format('Y-m-d');
        $qend_date = Carbon::createFromFormat('d/m/Y', $this->end_date)->format('Y-m-d');
        $work = Work::orderBy('date', 'asc')->whereBetween('date', [$qstart_date, $qend_date])->where('user_id', $this->user->id)->get();
        $worksum = $work->sum('hours');
        return view('livewire.work-show.user-work-show')->with(['work' => $work, 'qstart_date' => $qstart_date, 'qend_date' => $qend_date, 'worksum' => $worksum]);
    }
}
