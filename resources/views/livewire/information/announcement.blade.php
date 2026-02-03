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
                    <a href="#">Informasi & Pengumuman</a>
                    <svg width="6" height="10" viewBox="0 0 6 10" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M1 1L5 5L1 9" stroke="#FBFCFD" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                    </svg>
                    <a href="{{ route('pengumuman') }}">Pengumuman</a>
                </div>
                <h1 class="heading-48s text-bkkNeutral-50 mb-3 lg:w-[55%]">
                    Pengumuman
                </h1>
                <div class="paragraph-16r text-bkkNeutral-100 w-full lg:w-[50%]">
                    Memuat pengumuman resmi dan pemberitahuan penting dari BKK dan sekolah sebagai sarana penyampaian informasi terkini kepada siswa, alumni, dan mitra terkait kegiatan, jadwal, dan layanan.
                </div>
            </div>
        </div>
    </section>

    <section class="py-15 lg:py-20">
        <div class="container mx-auto px-5 lg:px-0">
            <h2 class="heading-42s text-bkkNeutral-900">
                Pengumuman Resmi BKK
            </h2>
            <div class="flex items-end justify-between mb-9">
                <div class="paragraph-16r text-bkkNeutral-700 w-[65%]">
                    Pengumuman resmi dan informasi terbaru dari BKK untuk siswa dan alumni terkait kegiatan dan layanan.
                </div>
                <div class="flex justify-end gap-3 w-[35%]">
                    <input 
                        class="w-[300px] py-3 px-6 border border-bkkNeutral-200 rounded-xl outline-none focus:border-bkkBlue-700 paragraph-14r"
                        type="text"
                        wire:model.live.debounce.500ms="filterSearch"
                        placeholder="Masukkan kata kunci"
                    />
                    <button 
                        class="py-3 px-6 bg-bkkBlue-700 rounded-xl text-bkkNeutral-50 paragraph-16s cursor-pointer hover:bg-bkkBlue-800 transition duration-300">
                        Cari
                    </button>
                </div>
            </div>
            <div 
                wire:loading.class="opacity-50 pointer-events-none"
                id="pengumuman" 
                class="grid grid-cols-1 md:grid-cols-2 gap-8 scroll-mt-25 mb-16">
                @forelse ($announcements as $announcement)
                    <div class=" bg-white shadow-lg overflow-hidden rounded-[20px] my-2">
                        <div class="w-full h-[256px]">
                            <img 
                                class="w-full h-full object-cover object-center"
                                src="{{ $announcement->image ? asset('storage/' . $announcement->image) : asset('/assets/static/partial/image-fallback.webp') }}" />
                        </div>
                        <div class="p-5 lg:p-6">
                            <h3 class="heading-20s text-black line-clamp-1 mb-4">
                                {{$announcement->headline}}
                            </h3>
                            <div class="paragraph-16r text-bkkNeutral-700 line-clamp-3">
                                {{ $announcement->content }}
                            </div>
                            {{-- Divider --}}
                            <div class="h-[1.5px] w-full bg-bkkNeutral-200 my-8"></div>
                            <div class="flex flex-col lg:flex-row justify-between items-start gap-8 lg:gap-0 lg:items-center ">
                                <div class="paragraph-14r text-bkkNeutral-700">
                                    Diunggah pada {{ $announcement->created_at->translatedFormat('d F Y') }}
                                </div>
                                <a  href="#"
                                    class="w-full lg:w-auto justify-self-center flex justify-center items-center gap-3 py-3 px-6 bg-bkkBlue-700 hover:bg-bkkBlue-800 transition duration-300 rounded-[8px] group">
                                    <span class="paragraph-16s text-bkkNeutral-50">Baca Selengkapnya</span>
                                    <svg class="shrink-0 group-hover:translate-x-1 transition duration-300" width="20" height="12" viewBox="0 0 20 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M19 6L14 1M19 6L14 11M19 6H1" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                    </svg>
                                </a>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="col-span-full text-center py-16">
                        <div class="w-24 h-24 mx-auto mb-6 rounded-full bg-bkkNeutral-100 flex items-center justify-center">
                            <svg width="48" height="48" viewBox="0 0 24 24" fill="none" stroke="currentColor" class="text-bkkNeutral-400" stroke-width="1.5">
                                <path d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"/>
                            </svg>
                        </div>
                        <p class="heading-20s text-bkkNeutral-700 mb-2">Belum ada pengumuman</p>
                        <p class="paragraph-16r text-bkkNeutral-500">Pengumuman terbaru akan muncul di sini</p>
                    </div>
                @endforelse
            </div>
            {{ $announcements->links(data: ['scrollTo' => '#pengumuman']) }}
        </div>
    </section>
</div>
