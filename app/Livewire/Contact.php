<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\Attributes\Title;
use Livewire\Attributes\Layout;

#[Title('Contact - BKK SMKN 4 MALANG')]
#[Layout('layouts.app')]
class Contact extends Component
{
    public function render()
    {
        return view('livewire.contact');
    }
}
