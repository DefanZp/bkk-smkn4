<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\Attributes\Title;
use Livewire\Attributes\Layout;

#[Title('Faq - BKK SMKN 4 MALANG')]
#[Layout('layouts.app')]
class Faq extends Component
{
    public function render()
    {
        return view('livewire.faq');
    }
}
