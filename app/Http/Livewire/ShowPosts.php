<?php

namespace App\Http\Livewire;

use Livewire\Component;

use App\Models\Post;
use App\Models\User;

class ShowPosts extends Component
{

    public $search;
    public $sort = 'desc';

    public function render()
    {
        $user_id = auth()->user()->id;
        $user = User::find($user_id);

        return view('livewire.show-posts', [
            'posts' => Post::when($this->search, function($query, $search){
                return $query->where('title', 'LIKE', "%$search%");
            })->orderBy('created_at', $this->sort)->get()
        ]);
    }

}
