<div>
    <section class="pt-30 lg:pt-25 pb-20">
        <div class="container mx-auto px-5 lg:px-0">
            
            {{-- ======================================== --}}
            {{-- HEADER SECTION --}}
            {{-- Judul dan deskripsi halaman --}}
            {{-- ======================================== --}}
            <div class="text-center mb-12">
                <h1 class="heading-42s text-bkkNeutral-900 mb-4">Isi Tracer Study</h1>
                <p class="paragraph-16r text-bkkNeutral-700">
                    Bantu kami melacak karier alumni untuk meningkatkan mutu pendidikan
                </p>
            </div>
            
            {{-- ======================================== --}}
            {{-- PROGRESS INDICATOR --}}
            {{-- Menampilkan step saat ini (1 atau 2) --}}
            {{-- currentStep akan diisi dari Livewire component --}}
            {{-- ======================================== --}}
            <div class="flex justify-center mb-12">
                <div class="flex items-center gap-4">
                    
                    {{-- Step 1 Indicator --}}
                    <div class="flex items-center gap-2">
                        {{-- Circle dengan angka 1, warna biru jika step >= 1 --}}
                        <div class="w-10 h-10 rounded-full flex items-center justify-center paragraph-16s transition-all duration-300
                            {{ $currentStep >= 1 ? 'bg-bkkBlue-700 text-white' : 'bg-bkkNeutral-200 text-bkkNeutral-600' }}">
                            1
                        </div>
                        <span class="paragraph-16s hidden md:block {{ $currentStep >= 1 ? 'text-bkkBlue-700' : 'text-bkkNeutral-600' }}">
                            Data Diri
                        </span>
                    </div>
                    
                    {{-- Garis penghubung antar step --}}
                    <div class="w-12 md:w-20 h-1 rounded transition-all duration-300 {{ $currentStep >= 2 ? 'bg-bkkBlue-700' : 'bg-bkkNeutral-200' }}"></div>
                    
                    {{-- Step 2 Indicator --}}
                    <div class="flex items-center gap-2">
                        {{-- Circle dengan angka 2, warna biru jika step >= 2 --}}
                        <div class="w-10 h-10 rounded-full flex items-center justify-center paragraph-16s transition-all duration-300
                            {{ $currentStep >= 2 ? 'bg-bkkBlue-700 text-white' : 'bg-bkkNeutral-200 text-bkkNeutral-600' }}">
                            2
                        </div>
                        <span class="paragraph-16s hidden md:block {{ $currentStep >= 2 ? 'text-bkkBlue-700' : 'text-bkkNeutral-600' }}">
                            Status & Detail
                        </span>
                    </div>
                </div>
            </div>
            
            {{-- ======================================== --}}
            {{-- SUCCESS MESSAGE --}}
            {{-- Menampilkan pesan sukses jika ada --}}
            {{-- ======================================== --}}
            @if (session()->has('success'))
                <div class="max-w-3xl mx-auto mb-6 p-4 bg-green-100 border border-green-400 text-green-700 rounded-xl">
                    {{ session('success') }}
                </div>
            @endif
            
            {{-- ======================================== --}}
            {{-- FORM CONTAINER --}}
            {{-- Container utama untuk form dengan styling card --}}
            {{-- ======================================== --}}
            <div class="max-w-3xl mx-auto bg-white shadow-lg rounded-3xl p-6 md:p-10">
                @if($currentStep === 1)
                    {{-- Mengirim data awal ke Child --}}
                    <livewire:user.partials.step1-data-diri-form :userData="$formData" wire:key="step1" />
                @endif
                
                @if($currentStep === 2)
                    {{-- Mengirim status terpilih ke Child --}}
                    <livewire:user.partials.step2-status-diri-form :status="$formData['status']" wire:key="step2" />
                @endif
            </div>
        </div>
    </section>
</div>
