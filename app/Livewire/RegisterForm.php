<?php

namespace App\Livewire;

use App\Models\User;
use Livewire\Attributes\Rule;
use Livewire\Component;
use Livewire\WithFileUploads;

class RegisterForm extends Component
{
    use WithFileUploads;

    #[Rule(['name' => 'required|min:2|max:50',
        'email' => 'required|email|unique:users',
        'password' => 'required|min:6',
        'image' => 'nullable|sometimes|image|max:1024'
        ])]

    public $name;
    public $email;
    public $password;
    public $image;

    public function create(){

        sleep(2);

        $validated = $this->validate();

        if($this->image){
            $validated['image'] = $this->image->store('images', 'public');
        }

        $user = User::create($validated);

        $this->reset('name', 'email', 'password', 'image');

        session()->flash('success', 'ลงทะเบียนสำเร็จ.');

        $this->dispatch('user-created', $user);
    }

    public function ReloadList()
    {
        $this->dispatch('user-created');
    }

    public function render()
    {
        return view('livewire.register-form');
    }
}
