<?php

namespace App\Livewire\Components;

use Livewire\Component;
use Livewire\Attributes\On;

class NavbarProfile extends Component
{
    // Hanya sebagai pemicu
    #[On('update-profile')]
    public function refreshNavbar() {
        
    }

    public function render()
    {
        return view('livewire..components.navbar-profile');
    }
}
