<?php

namespace App\Livewire\Vacancy;

use Livewire\Component;
use App\Models\vacancie;
use Livewire\Attributes\Url;
use Livewire\WithPagination;
use Livewire\Attributes\Title;
use Livewire\Attributes\Layout;

#[Title('Lowongan - BKK SMKN 4 MALANG')]
#[Layout('layouts.app')]
class Vacancy extends Component
{
    use WithPagination;
    #[Url('s')]
    public $filterSearch = null;

    #[Url('k')]
    public $filterKompetensi = [];

    #[Url('k-2')]
    public $filterKompetensi2 = [];

    #[Url('tipe')]
    public $filterTipe = [];

    #[Url('td')]
    public $filterTerakhirDiperbarui = [];

    public function updatedFilterSearch()
    {
        $this->resetPage();
    }

    public function updatedFilterKompetensi()
    {
        $this->filterKompetensi2 = [];
        $this->resetPage();
    }

    public function updatedFilterKompetensi2()
    {
        $this->filterKompetensi = [];
        $this->resetPage();
    }

    public function updatedFilterTipe()
    {
        $this->resetPage();
    }

    public function updatedFilterTerakhirDiperbarui()
    {
        $this->resetPage();
    }

    public $kompetensiKeahlians = [
        'Teknik Grafika',
        'Teknik Logistik',
        'Teknik Mekatronika',
        'Desain Komunikasi Visual',
        'Rekayasa Perangkat Lunak',
        'Animasi',  
        'Perhotelan',
    ];

    public $tipePekerjaans = [
        'Full-time',
        'Part-time',
    ];

    public $terakhirDiperbarui = [
        '24 Jam Terakhir',
        'Seminggu Terakhir',
        'Sebulan Terakhir',
        'Kapan pun',
    ];

    public function render()
    {
        $vacancies = vacancie::with('company')
        ->where('deadline', '>=', now())
        ->when($this->filterSearch, function ($query) {
            $query->where('vacancy_name', 'like', '%' . $this->filterSearch . '%');
        })
        ->when($this->filterKompetensi, function ($query) {
            $query->where(function ($q) {
                foreach ($this->filterKompetensi as $kompetensi) {
                    $q->orWhereJsonContains('major', $kompetensi);
                }
            });
        })
        ->when($this->filterKompetensi2, function ($query) {
            $kompetensiArray = is_array($this->filterKompetensi2) 
                ? $this->filterKompetensi2 
                : [$this->filterKompetensi2];

            $query->where(function ($q) use ($kompetensiArray) {
                foreach ($kompetensiArray as $kompetensi) {
                    $q->orWhereJsonContains('major', $kompetensi);
                }
            });
        })
        ->when($this->filterTipe, function ($query) {
            $cleanedTypes = array_map('strtolower', $this->filterTipe);
            $query->whereIn('employment_classification', $cleanedTypes);
        })
        ->when($this->filterTerakhirDiperbarui, function ($query) {
            $query->where(function ($subQuery) {
                foreach ($this->filterTerakhirDiperbarui as $filter) {
                    if ($filter === '24 Jam Terakhir') {
                        $subQuery->orWhere('created_at', '>=', now()->subDay());
                    } elseif ($filter === 'Seminggu Terakhir') {
                        $subQuery->orWhere('created_at', '>=', now()->subWeek());
                    } elseif ($filter === 'Sebulan Terakhir') {
                        $subQuery->orWhere('created_at', '>=', now()->subMonth());
                    } elseif ($filter === 'Kapan pun') {
                        $subQuery->orWhereNotNull('created_at');
                    }
                }
            });
        })
        ->orderBy('created_at', 'desc')
        ->paginate(8);

        return view('livewire..vacancy.vacancy', [
            'vacancies' => $vacancies,
        ]);
    }
}
