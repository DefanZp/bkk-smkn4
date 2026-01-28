<?php

namespace App\Livewire\User;

use Livewire\Component;
use Livewire\Attributes\Title;
use Livewire\Attributes\Layout;

#[Title('Isi Tracer Study - BKK SMKN 4 MALANG')]
#[Layout('layouts.app')]
class FillTracerStudy extends Component
{
    public function render()
    {
        return view('livewire..user.fill-tracer-study');
    }
}
