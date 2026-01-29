<div>
    <section class="pt-30 lg:pt-25">
        <div 
            style="background-image: url('{{ asset('/assets/static/background/hero-section.png') }}')"
            class="container mx-auto px-5 lg:px-0 rounded-3xl bg-cover bg-center relative h-[50vh] overflow-hidden">
            <div class="absolute inset-0 bg-linear-to-t from-bkkNeutral-900/90 to-88% to-bkkNeutral-900/45 z-1"></div>
            <div class="relative z-2 w-full h-full flex flex-col justify-center mx-0 lg:mx-14">
                <div class="flex items-center gap-2.5 paragraph-16s text-bkkNeutral-50 mb-7">
                    <a href="{{ route('beranda') }}">Beranda</a>
                    <svg width="6" height="10" viewBox="0 0 6 10" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M1 1L5 5L1 9" stroke="#FBFCFD" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                    </svg>
                    <a href="#">Faq</a>
                </div>
                <h1 class="heading-48s text-bkkNeutral-50 mb-3 lg:w-[55%]">
                    FAQ
                </h1>
                <div class="paragraph-16r text-bkkNeutral-100 w-full lg:w-[50%]">
                    Temukan jawaban atas pertanyaan yang sering diajukan terkait layanan, program, dan mekanisme BKK, guna membantu siswa, alumni, dan mitra industri memperoleh informasi yang dibutuhkan.
                </div>
            </div>
        </div>
    </section>
    <section class="py-15 lg:py-20">
        <div class="container mx-auto px-5 lg:px-0">
            <h2 class="heading-42s text-bkkNeutral-900 mb-4">Pertanyaan Umum BKK</h2>
            <div class="paragraph-16r text-bkkNeutral-700 mb-9">Jawaban atas berbagai pertanyaan umum terkait layanan BKK yang sering dibutuhkan guna membantu memahami layanan BKK.</div>
            <div 
                class="lg:p-10 lg:shadow-lg rounded-3xl space-y-4">
                @foreach ($faqContent as $faq)
                    <div 
                        x-data="{open: false,openFaq : null}"
                        class="p-4 rounded-[20px] border border-bkkNeutral-200">
                        <div 
                            @click="open = !open; openFaq = {{ $loop->index }}"
                            class="flex items-center justify-between transition duration-300 cursor-pointer"
                            :class="open === true && openFaq == {{ $loop->index }} ? 'text-bkkBlue-700' : 'text-bkkNeutral-900'">
                            <h2 class="heading-16s">{{ $faq['title'] }}</h2>
                            <div 
                                class="w-12 h-12 flex items-center justify-center rounded-full cursor-pointer">
                                <svg
                                    class="transition duration-300"
                                    :class="open === true && openFaq == {{ $loop->index }} ? 'transform rotate-180' : ''" 
                                    width="12" height="8" viewBox="0 0 12 8" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M10.5833 1.25L5.91667 5.91667L1.25 1.25" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"/>
                                </svg>
                            </div>
                        </div>
                        <div 
                            class="paragraph-14r text-bkkNeutral-700 mt-4"
                            x-collapse
                            x-cloak
                            x-show="open && openFaq == {{ $loop->index }}">
                            <div>{{ $faq['content'] }}</div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
</div>

