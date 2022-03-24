<?php

namespace App\Http\Livewire;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Loign extends Component
{

    public $username;
    public $password;
    public function render()
    {
        return view('livewire.loign')->layout('layout.login-app');
    }

    public function login()
    {
        $this->validate([
            'username' => ['required', 'string'],
            'password' => ['required'],
        ]);

        $user = Auth::attempt(['name' => $this->username, 'password' => $this->password]);

        if ($user) {
            session()->flash('success', 'Login Successfully');
            return redirect(route('dashboard'));
        } else {
            session()->flash('error', 'Invalid Credational');
        }
    }
}
