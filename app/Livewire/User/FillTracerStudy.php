<?php

namespace App\Livewire\User;

use Livewire\Component;
use Livewire\Attributes\Title;
use Livewire\Attributes\Layout;
use App\Models\User;
use App\Models\WorkFill;
use App\Models\CollegeFill;
use App\Models\EntrepreneurFill;
use App\Models\UnemployedFill;

#[Title('Isi Tracer Study - BKK SMKN 4 MALANG')]
#[Layout('layouts.app')]
class FillTracerStudy extends Component
{
    public $currentStep = 1;

    // Step 1: Data Diri
    public $full_name;
    public $nisn;
    public $nik;
    public $major;
    public $graduation_year;
    public $address;
    public $no_hp;
    public $status;

    // Step 2: Bekerja
    public $work_start_date;
    public $work_company_name;
    public $work_position;
    public $work_location;
    public $work_salary;
    public $work_major_relevance;

    // Step 2: Kuliah
    public $college_start_date;
    public $college_university_name;
    public $college_degree;
    public $college_major;

    // Step 2: Wiraswasta
    public $entrepreneur_start_date;
    public $entrepreneur_company_name;
    public $entrepreneur_field;
    public $entrepreneur_location;
    public $entrepreneur_salary;
    public $entrepreneur_major_relevance;
    public $entrepreneur_sosial_media;

    // Step 2: Menganggur
    public $unemployed_timespan;
    public $unemployed_reason;
    public $unemployed_activity;

    protected function rulesStep1()
    {
        return [
            'full_name' => 'required|string|max:255',
            'nisn' => 'required|string|max:20',
            'nik' => 'required|string|max:20',
            'major' => 'required|string',
            'graduation_year' => 'required|date',
            'address' => 'required|string',
            'no_hp' => 'required|string|max:15',
            'status' => 'required|in:bekerja,kuliah,wiraswasta,menganggur',
        ];
    }

    protected function rulesBekerja()
    {
        return [
            'work_start_date' => 'required|date',
            'work_company_name' => 'required|string|max:255',
            'work_position' => 'required|string|max:255',
            'work_location' => 'required|string|max:255',
            'work_salary' => 'nullable|string',
            'work_major_relevance' => 'required|in:sesuai,tidak sesuai,mungkin',
        ];
    }

    protected function rulesKuliah()
    {
        return [
            'college_start_date' => 'required|date',
            'college_university_name' => 'required|string|max:255',
            'college_degree' => 'required|in:s1,d3,d4',
            'college_major' => 'required|string|max:255',
        ];
    }

    protected function rulesWiraswasta()
    {
        return [
            'entrepreneur_start_date' => 'required|date',
            'entrepreneur_company_name' => 'required|string|max:255',
            'entrepreneur_field' => 'required|string|max:255',
            'entrepreneur_location' => 'required|string|max:255',
            'entrepreneur_salary' => 'nullable|string',
            'entrepreneur_major_relevance' => 'required|in:sesuai,tidak sesuai,mungkin',
            'entrepreneur_sosial_media' => 'nullable|string|max:255',
        ];
    }

    protected function rulesMenganggur()
    {
        return [
            'unemployed_timespan' => 'required|string|max:255',
            'unemployed_reason' => 'required|in:menunggu informasi perekrutan,berkecukupan,tidak mau bekerja,lainnya',
            'unemployed_activity' => 'required|string',
        ];
    }  

    public function nextStep()
    {
        $this->validate($this->rulesStep1());
        $this->currentStep = 2;
    }

    public function previousStep()
    {
        $this->currentStep = 1;
    }

    public function submit()
    {
        $this->validate($this->rulesStep1());

        if ($this->status === 'bekerja') {
            $this->validate($this->rulesBekerja());
        } elseif ($this->status === 'kuliah') {
            $this->validate($this->rulesKuliah());
        } elseif ($this->status === 'wiraswasta') {
            $this->validate($this->rulesWiraswasta());
        } elseif ($this->status === 'menganggur') {
            $this->validate($this->rulesMenganggur());
        }

        $user = User::updateOrCreate(
            ['nisn' => $this->nisn],
            [
                'full_name' => $this->full_name,
                'nik' => $this->nik,
                'major' => $this->major,
                'graduation_year' => $this->graduation_year,
                'address' => $this->address,
                'no_hp' => $this->no_hp,
                'status' => $this->status,
            ]
        );

        if ($this->status === 'bekerja') {
            WorkFill::updateOrCreate(
                ['id_user' => $user->id],
                [
                    'start_date' => $this->work_start_date,
                    'company_name' => $this->work_company_name,
                    'position' => $this->work_position,
                    'location' => $this->work_location,
                    'salary' => $this->work_salary,
                    'major_relevance' => $this->work_major_relevance,
                ]
            );
        } elseif ($this->status === 'kuliah') {
            CollegeFill::updateOrCreate(
                ['id_user' => $user->id],
                [
                    'start_date' => $this->college_start_date,
                    'university_name' => $this->college_university_name,
                    'degre' => $this->college_degree,
                    'major' => $this->college_major,
                ]
            );
        } elseif ($this->status === 'wiraswasta') {
            EntrepreneurFill::updateOrCreate(
                ['id_user' => $user->id],
                [
                    'start_date' => $this->entrepreneur_start_date,
                    'company_name' => $this->entrepreneur_company_name,
                    'field' => $this->entrepreneur_field,
                    'location' => $this->entrepreneur_location,
                    'salary' => $this->entrepreneur_salary,
                    'major_relevance' => $this->entrepreneur_major_relevance,
                    'sosial_media' => $this->entrepreneur_sosial_media,
                ]
            );
        } elseif ($this->status === 'menganggur') {
            UnemployedFill::updateOrCreate(
                ['id_user' => $user->id],
                [
                    'timespan' => $this->unemployed_timespan,
                    'reason' => $this->unemployed_reason,
                    'activity' => $this->unemployed_activity,
                ]
            );
        }

        session()->flash('success', 'Data tracer study berhasil disimpan!');
        return redirect()->route('beranda');
    }

    public function render()
    {
        return view('livewire.user.fill-tracer-study');
    }
}
