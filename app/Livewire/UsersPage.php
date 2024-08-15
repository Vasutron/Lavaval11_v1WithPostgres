<?php

namespace App\Livewire;

use App\Models\User;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;

#[Title('Users Page')]
class UsersPage extends Component
{
    public User $user;

    public function render()
    {
        return view('livewire.users-page');
    }
}
