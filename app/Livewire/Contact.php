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
        ], [
            'contact.firstName.required' => 'Nama depan harus diisi.',
            'contact.firstName.max' => 'Nama depan harus kurang dari 255 karakter.',
            'contact.lastName.required' => 'Nama belakang harus diisi.',
            'contact.lastName.max' => 'Nama belakang harus kurang dari 255 karakter.',
            'contact.email.required' => 'Email harus diisi.',
            'contact.email.max' => 'Email harus kurang dari 255 karakter.',
            'contact.message.required' => 'Pesan harus diisi.',
            'contact.message.max' => 'Pesan harus kurang dari 255 karakter.',
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
