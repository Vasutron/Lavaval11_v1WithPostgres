<?php

namespace App\Livewire;

use App\Models\User;
use Livewire\Attributes\On;
use Livewire\Component;
use Livewire\WithPagination;

class UsersList extends Component
{
    use WithPagination;

    #[On('user-created')]
    public function updateList($user = null)
    {

    }

    public function placeholder()
    {
        return view('placeholder');
    }

    public function render()
    {
        // sleep(2);
        return view('livewire.users-list', [
            'users' => User::latest()->paginate(5),
            'count' => User::count()
        ]);
    }
}
