<?php

use App\Http\Controllers\ProfileController;
use App\Livewire\Contact;
use App\Livewire\Faq;
use App\Livewire\Homepage;
use App\Livewire\Information\Announcement;
use App\Livewire\Information\TracerStudy;
use App\Livewire\Login;
use App\Livewire\Profil\ActivityFlow;
use App\Livewire\Profil\OrganizationStructure;
use App\Livewire\Profil\SupportingDocuments;
use App\Livewire\Profil\VisiMisi;
use App\Livewire\Profil\WorkProgram;
use App\Livewire\User\FillTracerStudy;
use App\Livewire\Vacancy;
use Illuminate\Support\Facades\Route;

Route::get('/', Homepage::class)->name('beranda');
Route::get('/faq', Faq::class)->name('faq');
Route::get('/kontak', Contact::class)->name('kontak');

// ProfilRoute
Route::get('/visi-misi', VisiMisi::class)->name('visi-misi')->prefix('profil');
Route::get('/struktur-organisasi', OrganizationStructure::class)->name('struktur-organisasi')->prefix('profil');
Route::get('/program-kerja', WorkProgram::class)->name('program-kerja')->prefix('profil');
Route::get('/alur-kegiatan', ActivityFlow::class)->name('alur-kegiatan')->prefix('profil');
Route::get('/dokumen-pendukung', SupportingDocuments::class)->name('dokumen-pendukung')->prefix('profil');

// Informasi dan berita route
Route::get('/pengumuman', Announcement::class)->name('pengumuman');
Route::get('/tracer-study', TracerStudy::class)->name('tracer-study');

// Lowongan
Route::get('/lowongan', Vacancy::class)->name('lowongan');

// Route User Login
Route::get('/user/isi-tracer-study', FillTracerStudy::class)->middleware('auth')->name('isi-tracer-study');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
