<div>
    <section class="pt-32 lg:pt-40 bg-bkkNeutral-50">
        <div class="container px-5 lg:px-0 mx-auto">
            <h1 class="heading-48s text-neutral-900 mb-4">Pengumuman BKK</h1>
            <p class="paragraph-16r text-bkkNeutral-600 w-full lg:w-[60%]">
                Lorem ipsum is placeholder text commonly used in the graphic, print, and publishing industries for previewing
            </p>
        </div>
    </section>

    <section class="py-16 bg-white">
        <div class="container mx-auto px-5 lg:px-0">
            <div class="flex items-center justify-between mb-4">
                <h2 class="heading-24s text-bkkNeutral-900">Periksa Pengumuman Terbaru</h2>
                <!-- <div class="flex items-center gap-3">
                    <button 
                        class="w-10 h-10 rounded-full border-2 border-bkkBlue-700 flex items-center justify-center text-bkkBlue-700 hover:bg-bkkBlue-700 hover:text-white transition duration-300 cursor-pointer"
                        onclick="scrollAnnouncements(-1)">
                        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <path d="M15 19l-7-7 7-7"/>
                        </svg>
                    </button>
                    <button 
                        class="w-10 h-10 rounded-full bg-bkkBlue-700 flex items-center justify-center text-white hover:bg-bkkBlue-800 transition duration-300 cursor-pointer"
                        onclick="scrollAnnouncements(1)">
                        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <path d="M9 5l7 7-7 7"/>
                        </svg>
                    </button>
                </div> -->
            </div>

            <div id="announcementContainer" class="grid grid-cols-1 md:grid-cols-2 gap-8">
                @forelse ($announcements as $announcement)
                    <div class="bg-bkkNeutral-50 rounded-2xl p-4 border border-bkkNeutral-200 hover:shadow-lg transition duration-300">
                        <div class="flex items-center gap-4 mb-4">
                            <div class="w-12 h-12 rounded-full bg-bkkBlue-100 flex items-center justify-center shrink-0">
                                <img 
                                    src="{{ asset('/assets/static/logo/logo-bkk.png') }}" 
                                    alt="BKK Logo" 
                                    class="w-8 h-8 object-contain">
                            </div>
                            <div>
                                <h3 class="heading-16s text-bkkNeutral-900">BKK SMK NEGERI 4 MALANG</h3>
                                <p class="paragraph-14r text-bkkNeutral-500">{{ $announcement->created_at->format('d F Y') }}</p>
                            </div>
                        </div>

                        <p class="paragraph-16r text-bkkNeutral-700 mb-4 line-clamp-3">
                            {{ Str::limit($announcement->content, 150) }}
                        </p>

                        @if($announcement->image)
                            <div class="relative rounded-xl overflow-hidden mb-4">
                                <img 
                                    src="{{ asset('storage/' . $announcement->image) }}" 
                                    alt="{{ $announcement->headline }}"
                                    class="w-full h-128 object-cover object-top">
                                <div class="absolute inset-0 bg-gradient-to-t from-bkkBlue-900/90 via-bkkBlue-800/40 via-10% to-transparent flex flex-col justify-end p-6">
                                    <h4 class="heading-22s text-white uppercase tracking-wide">{{ $announcement->headline }}</h4>
                                </div>
                            </div>
                        @else
                            <div class="bg-bkkBlue-700 rounded-xl p-6 mb-4">
                                <h4 class="heading-22s text-white uppercase">{{ $announcement->headline }}</h4>
                            </div>
                        @endif
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
        </div>
    </section>
</div>

<!-- <script>
    function scrollAnnouncements(direction) {
        const container = document.getElementById('announcementContainer');
        const scrollAmount = 400;
        container.scrollBy({ left: scrollAmount * direction, behavior: 'smooth' });
    }
</script> -->