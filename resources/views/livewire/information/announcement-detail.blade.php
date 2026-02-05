<div>
    <section class="pt-30 lg:pt-25">
        <div 
            style="background-image: url('{{ asset('storage/' . $announcement->image) }}')"
            class="container mx-auto px-5 lg:px-0 rounded-3xl bg-cover bg-center relative h-[90vh] overflow-hidden">
            <div class="absolute inset-0 bg-linear-to-t from-bkkNeutral-900/90 to-88% to-bkkNeutral-900/45 z-1"></div>
        </div>
    </section>

    <section class="py-15 lg:py-20">
        <div class="container mx-auto px-5 lg:px-0">
            <h2 class="heading-42s text-bkkNeutral-900 mb-3">
                {{ $announcement->headline }}
            </h2>
            <div class="flex flex-col lg:flex-row items-start lg:items-center gap-4 paragraph-14r text-bkkNeutral-600">
                <div>Diunggah pada {{ $announcement->created_at->format('d F Y') }}</div>
                <div class="w-px h-3 bg-bkkNeutral-600 hidden lg:block"></div>
                <div class="flex items-center gap-1">
                    <svg width="13" height="14" viewBox="0 0 13 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M11.4167 12.75C11.4167 10.9091 9.02885 9.41667 6.08333 9.41667C3.13781 9.41667 0.75 10.9091 0.75 12.75M6.08333 7.41667C4.24238 7.41667 2.75 5.92428 2.75 4.08333C2.75 2.24238 4.24238 0.75 6.08333 0.75C7.92428 0.75 9.41667 2.24238 9.41667 4.08333C9.41667 5.92428 7.92428 7.41667 6.08333 7.41667Z" stroke="#596B88" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                    </svg>
                    <div>Admin BKK</div>
                </div>
            </div>
            {{-- divider --}}
            <div class="w-full h-[1.5px] bg-bkkNeutral-200 my-9"></div>
            <div class="dynamic-announce mb-9">
                    {{ \Filament\Forms\Components\RichEditor\RichContentRenderer::make($announcement->content) }}
            </div>
        </div>
    </section>
</div>
