<?php

namespace App\Http\Livewire;

use Livewire\Component;

use App\Models\Notif;
use App\Models\User;

class ShowNotifs extends Component
{

    public $search;
    public $sort = 'desc';

    public function render()
    {

        $user = auth()->user();
        $notifs = Notif::orderBy('created_at', 'desc')->get();

        return view('livewire.show-notifs', [
            'notifs' => Notif::when($this->search, function($query, $search){
                return $query->where('title', 'LIKE', "%$search%");
            })->orderBy('created_at', $this->sort)->get()
        ]);
    }
}
