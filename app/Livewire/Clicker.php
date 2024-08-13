<?php

namespace App\Livewire;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Livewire\Attributes\Rule;
use Livewire\Attributes\Validate;
use Livewire\Component;
use Livewire\WithPagination;

class Clicker extends Component
{
    use WithPagination;

    #[Rule(['name' => 'required|min:2|max:50', 'email' => 'required|email|unique:users', 'password' => 'required|min:6'])] // กำหนดกฎการตรวจสอบข้อมูล

    public $name = '';
    public $email = '';
    public $password = '';

    public function createNewUser()
    {
        $validated = $this->Validate();

        User::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'password' => Hash::make($validated['password'])
        ]);

        $this->reset([
                'name',
                'email',
                'password'
            ]);

        // request()->
        session()->flash('message', 'เพิ่มสำเร็จ.!');
    }

    public function render()
    {
        $users = User::paginate(5);

        return view('livewire.clicker', [
            'users' => $users,
        ]);
    }
}
