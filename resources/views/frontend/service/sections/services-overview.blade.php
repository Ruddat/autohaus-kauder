<section class="py-20 bg-[#0f0f0f]">
    <div class="container mx-auto px-4">

        <div class="text-center mb-16">
            <h2 class="text-3xl md:text-4xl font-bold mb-4">Unsere Serviceleistungen</h2>
            <div class="w-24 h-1 bg-gradient-to-r from-[#B91C1C] to-[#8B0000] mx-auto"></div>

            <p class="text-[#BFBFBF] max-w-2xl mx-auto mt-6">
                Von der Inspektion bis zur komplexen Reparatur – wir bieten umfassenden Service für alle Marken
            </p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">

            {{-- Servicekarten (statisch, später DB-fähig) --}}
            @include('frontend.service.sections.parts.service-cards')

        </div>

@php
    $services = \App\Models\ServiceItem::orderBy('sort_order')->get();
@endphp

<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
    @foreach($services as $s)
        <div class="glass-effect rounded-2xl p-8 border border-[#333] text-center">
            <div class="text-5xl text-[#B91C1C] mb-4">
                <i class="{{ $s->icon }}"></i>
            </div>
            <h3 class="text-xl font-bold mb-4">{{ $s->title }}</h3>
            <p class="text-[#BFBFBF] text-sm">{{ $s->text }}</p>
        </div>
    @endforeach
</div>




    </div>
</section>
