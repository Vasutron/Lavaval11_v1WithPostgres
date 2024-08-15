<?php

namespace App\Livewire;

use App\Models\User;
use Livewire\Attributes\On;
use Livewire\Attributes\Title;
use Livewire\Attributes\Url;
use Livewire\Component;
use Livewire\WithPagination;

#[Title('Users List')]
class UsersList extends Component
{
    use WithPagination;

    #[Url(as : 's', history : true)]
    public $search = '';

    #[On('user-created')]
    public function updateList($user = null)
    {

    }

    public function placeholder()
    {
        return view('placeholder');
    }

    public function update()
    {

    }

    public function render()
    {
        // sleep(2);
        return view('livewire.users-list', [
            'users' => User::latest()
            ->where('name', 'like', "%{$this->search}%")
            ->paginate(5),
        ]);
    }
}
