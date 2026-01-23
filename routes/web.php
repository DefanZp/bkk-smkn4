<?php

use App\Http\Controllers\ProfileController;
use App\Livewire\Faq;
use App\Livewire\Homepage;
use App\Livewire\Profil\VisiMisi;
use Illuminate\Support\Facades\Route;

Route::get('/', Homepage::class)->name('home');
Route::get('/faq', Faq::class)->name('faq');
Route::get('/visi-misi', VisiMisi::class)->name('visi-misi');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
