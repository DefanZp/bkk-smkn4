<?php

namespace App\Livewire\Vacancy;

use Livewire\Component;
use App\Models\vacancie;
use Livewire\Attributes\Title;
use Livewire\Attributes\Layout;

#[Title('Detail Lowongan - BKK SMKN 4 MALANG')]
#[Layout('layouts.app')]
class VacancyDetail extends Component
{
    public $vacancyId;
    public $vacancy;
    public $otherVacancies;

    public function mount($id)
    {
        $this->vacancyId = $id;
        $this->vacancy = vacancie::with('company')
        ->where('entryId', $this->vacancyId)
        ->firstOrFail();

        $this->otherVacancies = vacancie::where('entryId', '!=', $this->vacancyId)
        ->where('deadline', '>=', now())
        ->where( function ($q) {
            foreach ($this->vacancy->major as $major) {
                $q->orWhereJsonContains('major', $major);
            }
        })
        ->inRandomOrder()
        ->take(2)
        ->get();
    }

    public function render()
    {
        return view('livewire..vacancy.vacancy-detail');
    }
}
