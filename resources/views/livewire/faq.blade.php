<div>
    <section class="py-30 lg:py-25 ">
        <div class="container mx-auto px-5 lg:px-0">
            <h1 class="heading-42s text-bkkNeutral-900 my-15">Frequently Ask Questions</h1>
            <div 
                class="space-y-8">
                @foreach ($faqContent as $faq)
                    <div 
                        x-data="{open: false,openFaq : null}"
                        class="px-8 py-4 shadow-lg rounded-[20px] border border-bkkNeutral-100">
                        <div class="flex items-center justify-between">
                            <h2 class="heading-16s text-bkkNeutral-900">{{ $faq['title'] }}</h2>
                            <div 
                                @click="open = !open; openFaq = {{ $loop->index }}"
                                class="bg-bkkNeutral-100 w-12 h-12 flex items-center justify-center rounded-full cursor-pointer">
                                <svg width="8" height="14" viewBox="0 0 8 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M0.851562 12.7607L6.80667 6.80564L0.851562 0.85053" stroke="#6F6C8F" stroke-width="1.70146" stroke-linecap="round" stroke-linejoin="round"/>
                                </svg>
                            </div>
                        </div>
                        <div 
                            class="paragraph-16r text"
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

