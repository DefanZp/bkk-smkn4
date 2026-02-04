<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\Attributes\Title;
use Livewire\Attributes\Layout;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

#[Title('Contact - BKK SMKN 4 MALANG')]
#[Layout('layouts.app')]
class Contact extends Component
{
    public $contact = [];

    public function submitContact() 
    {
        $validatedData = $this->validate([
            'contact.firstName' => 'required|max:255',
            'contact.lastName' => 'required|max:255',
            'contact.email' => 'required|email|max:255',
            'contact.message' => 'required|max:255'
        ]);

        DB::table('contacts')->insert([
            'firstname' => $validatedData['contact']['firstName'],
            'lastname' => $validatedData['contact']['lastName'],
            'email' => $validatedData['contact']['email'],
            'message' => $validatedData['contact']['message'],
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        
        Session::flash('success', 'Message sent successfully');
        $this->reset('contact');
    }

    public function render()
    {
        return view('livewire.contact');
    }
}
