<?php

namespace App\Http\Livewire\WorkShow;

use App\Models\User;
use App\Models\Work;
use App\Exports\WorkShowExport\UserWorkShowExport;

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

    public function export()
    {
        $this->user = User::find(auth()->id());
        $userobj = $this->user->objects->pluck('id')->toArray();
        $qstart_date = Carbon::createFromFormat('d/m/Y', $this->start_date)->format('Y-m-d');
        $qend_date = Carbon::createFromFormat('d/m/Y', $this->end_date)->format('Y-m-d');
        $work = Work::orderBy('date', 'asc')->whereBetween('date', [$qstart_date, $qend_date])->where('user_id', $this->user->id)->get();
        $worksum = $work->sum('hours');
        return (new UserWorkShowExport($userobj, $qstart_date, $qend_date, $this->user, $worksum))->download($this->user->fname . '_' . $this->user->lname . '_' . Carbon::parse($qstart_date)->format('d-m-Y') . '-' . Carbon::parse($qend_date)->format('d-m-Y') .'.xlsx');
    }

    public function render()
    {
        $this->user = User::find(auth()->id());
        $qstart_date = Carbon::createFromFormat('d/m/Y', $this->start_date)->format('Y-m-d');
        $qend_date = Carbon::createFromFormat('d/m/Y', $this->end_date)->format('Y-m-d');
        $work = Work::orderBy('date', 'asc')->whereBetween('date', [$qstart_date, $qend_date])->where('user_id', $this->user->id)->get();
        $worksum = $work->whereIn('hours', [1, 2, 3, 4, 5, 6, 7, 8])->sum('hours');
        return view('livewire.work-show.user-work-show')->with(['work' => $work, 'qstart_date' => $qstart_date, 'qend_date' => $qend_date, 'worksum' => $worksum]);
    }
}
