<?php

namespace App\Livewire\Components;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class Login extends Component
{
    public $nisn;
    public $password;

    public function login()
    {
        $this->validate([
            'nisn' => 'required|min:10|max:20',
            'password' => 'required|min:8|max:20',
        ]);

        if (Auth::attempt(['nisn' => $this->nisn, 'password' => $this->password])) 
        {
            session()->regenerate();
            $this->dispatch('close-modal');
            return redirect()->intended(route('beranda'));
        }

        $this->addError('nisn', 'NISN atau Password Salah');


    }
    public function render()
    {
        return view('livewire.components.login');
    }
}
