<div>
        <form 
            wire:submit.prevent="login">
            <div class="w-full flex flex-col gap-3 mb-4">
                <label for="nisn" class="paragraph-16r text-bkkNeutral-900">NISN</label>
                <input 
                    id="nisn"
                    type="number" 
                    wire:model="nisn" 
                    placeholder="Masukkan NISN"
                    class="paragraph-14r text-bkkNeutral-900 outline-none 
                    border border-bkkNeutral-100 rounded-2xl focus:border-bkkBlue-700 py-3.5 px-6"/>
            </div>
            <div class="w-full flex flex-col gap-3 mb-9">
                <label for="password" class="paragraph-16r text-bkkNeutral-900">Password</label>
                <input 
                    id="password"
                    type="password" 
                    wire:model="password" 
                    placeholder="Masukkan Password"
                    class="paragraph-14r text-bkkNeutral-900 outline-none 
                    border border-bkkNeutral-100 rounded-2xl focus:border-bkkBlue-700 py-3.5 px-6"/>
            </div>
            <button 
                class="w-full px-6 py-3 bg-bkkBlue-700 paragraph-16s hover:bg-bkkBlue-800 text-bkkNeutral-50 rounded-lg cursor-pointer transition duration-300 mb-3"
                type="submit">
                Masuk
            </button>
            <div class="paragraph-14r text-bkkNeutral-600 text-center">
                Lupa password?
                <a 
                    href="{{ route('kontak') }}"
                    class="text-bkkBlue-700 cursor-pointer">
                    Hubungi admin BKK
                </a>
            </div>
        </form>
        {{-- close button --}}
        <div 
            @click="$dispatch('close-modal')"
            class="absolute top-6 right-6 text-bkkNeutral-900 cursor-pointer">
            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M18 18L12 12M12 12L6 6M12 12L18 6M12 12L6 18" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
            </svg>
        </div>
        {{-- Student icon --}}
        <div 
            class="w-[120px] h-[120px] bg-bkkNeutral-50 absolute -top-[15%] justify-self-center flex justify-center items-center rounded-full z-99">
            <img 
                class="w-[56px] h-[70px] object-cover object-center"
                src="{{ asset('/assets/static/logo/icon/Student logo.webp') }}"/>
        </div>
</div>
