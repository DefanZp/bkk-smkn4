<?php

namespace App\Livewire\User\Partials;

use Livewire\Component;

class Step2StatusDiriForm extends Component
{
    public $status; // Diambil dari parent
    
    // Properti Step 2 (Bekerja, Kuliah, dll)
    public $work_start_date, $work_position, $work_salary, $work_location, $work_company_name, $work_major_relevance;
    public $college_name, $college_major, $college_start_date, $college_degree, $college_university_name;
    public $entrepreneur_start_date, $entrepreneur_location, $entrepreneur_company_name, $entrepreneur_field, $entrepreneur_salary, $entrepreneur_major_relevance, $entrepreneur_sosial_media;
    public $unemployed_timespan, $unemployed_reason, $unemployed_activity;

    public function submit()
    {
        $rules = match ($this->status) {
            'bekerja' => [
                'work_start_date' => 'required',
                'work_position' => 'required|max:255',
                'work_salary' => 'nullable',
                'work_location' => 'required|max:255',
                'work_company_name' => 'required|max:255',
                'work_major_relevance' => 'required',
            ],
            'kuliah' => [
                'college_start_date' => 'required',
                'college_degree' => 'required',
                'college_major' => 'required|max:255',
                'college_university_name' => 'required|max:255',
            ],
            'wiraswasta' => [
                'entrepreneur_start_date' => 'required',
                'entrepreneur_location' => 'required|max:255',
                'entrepreneur_company_name' => 'required|max:255',
                'entrepreneur_field' => 'required|max:255',
                'entrepreneur_major_relevance' => 'required',
            ],
            'menganggur' => [
                'unemployed_timespan' => 'required|max:255',
                'unemployed_reason' => 'required',
                'unemployed_activity' => 'required',
            ],
            default => [],
        };

        $this->validate($rules);

        // Kirim data step 2 ke parent untuk disimpan ke DB
        $this->dispatch('step2-completed', data: $this->all());
    }

    public function previousStep()
    {
        $this->dispatch('go-to-previous-step');
    }

    public function render()
    {
        return view('livewire.user.partials.step2-status-diri-form');
    }
}
