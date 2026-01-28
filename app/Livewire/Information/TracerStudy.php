<?php

namespace App\Livewire\Information;

use Livewire\Component;
use Livewire\Attributes\Title;
use Livewire\Attributes\Layout;

#[Title('Tracer Study - BKK SMKN 4 MALANG')]
#[Layout('layouts.app')]
class TracerStudy extends Component
{
    public function render()
    {
        return view('livewire..information.tracer-study');
    }
}
