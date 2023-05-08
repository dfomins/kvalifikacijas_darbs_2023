<?php

namespace App\Http\Livewire\WorkShow;

use App\Models\User;
use App\Models\Work;

use Livewire\Component;

use Carbon\Carbon;
use Carbon\CarbonPeriod;

class AdminWorkShow extends Component
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
        $this->user = User::find($this->user_filter);
        $qstart_date = Carbon::createFromFormat('d/m/Y', $this->start_date)->format('Y-m-d');
        $qend_date = Carbon::createFromFormat('d/m/Y', $this->end_date)->format('Y-m-d');
        $result = CarbonPeriod::create(Carbon::parse($qstart_date)->firstOfMonth(), '1 month', $qend_date);
        $users = User::all();
        $workQuery = Work::orderBy('date', 'desc')->whereBetween('date', [$qstart_date, $qend_date])->get();
        $work = $workQuery->where('user_id', $this->user_filter);
        return view('livewire.work-show.admin-work-show')->with(['users' => $users, 'work' => $work, 'qstart_date' => $qstart_date, 'qend_date' => $qend_date, 'result' => $result]);
    }
}
