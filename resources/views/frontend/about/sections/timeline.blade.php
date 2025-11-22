<section class="py-20 bg-[#0f0f0f]">
    <div class="container mx-auto px-4">

        <div class="text-center mb-16">
            <h2 class="text-3xl md:text-4xl font-bold mb-4">Unsere Geschichte</h2>
            <div class="w-24 h-1 bg-gradient-to-r from-[#B91C1C] to-[#8B0000] mx-auto"></div>
        </div>

        @php
            $timeline = \App\Models\TimelineEvent::orderBy('sort_order')->get();
        @endphp

        <div class="max-w-4xl mx-auto space-y-12">

            @foreach($timeline as $item)
                <div class="timeline-item grid grid-cols-1 md:grid-cols-4 gap-6">

                    <div class="md:col-span-1">
                        <div class="bg-gradient-to-r from-[#B91C1C] to-[#8B0000]
                                    text-white px-4 py-2 rounded-lg text-center font-bold">
                            {{ $item->year }}
                        </div>
                    </div>

                    <div class="md:col-span-3 glass-effect rounded-2xl p-6 border border-[#333]">
                        <h3 class="text-xl font-bold mb-2">{{ $item->title }}</h3>
                        <p class="text-[#BFBFBF]">{{ $item->text }}</p>
                    </div>

                </div>
            @endforeach

        </div>

    </div>
</section>
