<?php

namespace App\Livewire\User\Profile;

use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\Attributes\Title;
use Livewire\Attributes\Layout;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;

#[Title('Data Pribadi - BKK SMKN 4 MALANG')]
#[Layout('layouts.app')]
class PersonalData extends Component
{
    Use WithFileUploads;

    public $isCvExist = false; 
    public $userPhoto;

    public $kompetensiKeahlians = [
        'Animasi',
        'Desain Komunikasi Visual',
        'Logistik', 
        'Perhotelan',
        'Teknik Grafika',
        'Teknik Komputer dan Jaringan',
        'Rekayasa Perangkat Lunak',
        'Mekatronika'
    ];

    public $tahunLulus = [];

    public $personal = [];

    public function submitPersonal() {
         $rules = [
            'personal.full_name' => 'required|max:255',
            'personal.major' => 'required',
            'personal.nisn' => 'required',
            'personal.domisili' => 'required',
            'personal.no_hp' => 'required',
        ];

        if ($this->personal['cv'] instanceof \Livewire\Features\SupportFileUploads\TemporaryUploadedFile) {
            $rules['personal.cv'] = 'mimes:pdf,docx,jpg,jpeg,png|max:3072';
        }

        $this->validate($rules, [
            'personal.full_name.required' => 'Nama Lengkap harus diisi.',
            'personal.domisili.required' => 'Domisili harus diisi.',
            'personal.no_hp.required' => 'No whatsapp aktif harus diisi.',
            'personal.cv.mimes' => 'Format CV tidak didukung.',
            'personal.cv.max' => 'Ukuran CV maksimal 3MB.',
        ]);

        $updateData = ([
            'full_name' => $this->personal['full_name'],
            'major' => $this->personal['major'],
            'nisn' => $this->personal['nisn'],
            'graduation_year' => $this->personal['tahun_lulus'],
            'birth_place' => $this->personal['domisili'],
            'no_hp' => $this->personal['no_hp'],
            'certificate' => $this->personal['portofolio'],
        ]);

        $user = auth()->user();

        if ($this->personal['cv']) {
            if ($user->CVuser) {
                Storage::disk('public')->delete($user->CVuser);
            }
            $path = $this->personal['cv']->store('cv', 'public');
            $updateData['CVuser'] = $path;

            $this->personal['cv'] = null;
        }

        $user->update($updateData);

        $this->isCvExist = $user->CVuser ? true : false;

        Session::flash('success', 'Data pribadi berhasil diperbarui.');

        $this->dispatch('scroll-to-top');
    }

    public function updatedUserPhoto() {
        $this->validate([
            'userPhoto' => 'required|image|mimes:jpg,png,jpeg|max:2048',
        ],
        [
            'userPhoto.required' => 'Foto harus diisi.',
            'userPhoto.image' => 'Foto harus berformat jpg, png, jpeg.',
            'userPhoto.mimes' => 'Foto harus berformat jpg, png, jpeg.',
            'userPhoto.max' => 'Foto harus kurang dari 2MB.',
        ]);

        $user = auth()->user();

        if ($user->photo) {
            Storage::disk('public')->delete($user->photo);
        }

        $path = $this->userPhoto->store('photo', 'public');

        $user->update([
            'photo' => $path
        ]);

        $this->dispatch('update-profile');

        $this->userPhoto = null;
    }

    public function mount() {
        $user = auth()->user();
        $this->tahunLulus = range(2019, date('Y'));
        $this->isCvExist = auth()->user()->CVuser ? true : false;

        $this->personal = ([
            'full_name' => $user->full_name,
            'major' => $user->major,
            'nisn' => $user->nisn,
            'tahun_lulus' => $user->graduation_year,
            'domisili' => $user->birth_place,
            'no_hp' => $user->no_hp,
            'cv' => null,
            'portofolio' => $user->certificate,
        ]);
    }
    public function render()
    {
        return view('livewire..user.profile.personal-data');
    }
}
