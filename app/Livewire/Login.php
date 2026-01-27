<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\Attributes\Title;
use Livewire\Attributes\Layout;

#[Title('Login - BKK SMKN 4 MALANG')]
#[Layout('layouts.appBlank')]
class Login extends Component
{
    public function render()
    {
        return view('livewire.login');
    }
}
