<section class="py-20 bg-[#0f0f0f]">
    <div class="container mx-auto px-4">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">

            <div>
                <h2 class="text-3xl md:text-4xl font-bold mb-6">Tradition & Leidenschaft</h2>
                <div class="w-24 h-1 bg-gradient-to-r from-[#B91C1C] to-[#8B0000] mb-8"></div>

                <p class="text-[#BFBFBF] text-lg mb-6">
                    1989 begann unsere Reise mit einer kleinen Werkstatt in Peine. Heute sind wir stolz darauf,
                    einer der führenden Anbieter für Premium-Fahrzeuge in der Region zu sein.
                </p>

                <p class="text-[#BFBFBF] mb-8">
                    Was als Familienbetrieb startete, ist heute ein modernes Autohaus mit Showroom,
                    Werkstatt und einem Team von Spezialisten. Unsere Leidenschaft für erstklassige
                    Automobile und exzellenten Service ist jedoch dieselbe geblieben.
                </p>

                <div class="grid grid-cols-2 gap-6">
                    <div class="text-center">
                        <div class="text-3xl font-bold text-[#B91C1C] mb-2">30+</div>
                        <div class="text-[#BFBFBF]">Jahre Erfahrung</div>
                    </div>

                    <div class="text-center">
                        <div class="text-3xl font-bold text-[#B91C1C] mb-2">5.000+</div>
                        <div class="text-[#BFBFBF]">Zufriedene Kunden</div>
                    </div>

                    <div class="text-center">
                        <div class="text-3xl font-bold text-[#B91C1C] mb-2">4</div>
                        <div class="text-[#BFBFBF]">Premium-Marken</div>
                    </div>

                    <div class="text-center">
                        <div class="text-3xl font-bold text-[#B91C1C] mb-2">12</div>
                        <div class="text-[#BFBFBF]">Mitarbeiter</div>
                    </div>
                </div>
            </div>

            <div class="relative">
@php
    // Fahrzeuge für Crossfade (max. 3)
    $aboutVehicles = \App\Models\Vehicle::with('images')
        ->where('status','verfügbar')
        ->whereHas('images')
        ->latest()
        ->take(3)
        ->get();

    // Fallback falls keine Fahrzeuge existieren
    if ($aboutVehicles->isEmpty()) {
        $aboutVehicles = collect([null]);
    }
@endphp

<div
    class="relative reveal"
>
    <div class="glass-effect rounded-2xl p-8 border border-[#333]">

        <!-- CROSSFADE SHOWCASE -->
        <div
            x-data="{ i: 0, total: {{ $aboutVehicles->count() }} }"
            x-init="setInterval(() => i = (i + 1) % total, 4000)"
            class="rounded-xl w-full h-64 overflow-hidden mb-6 bg-gradient-to-br from-[#1E1E1E] to-[#2D2D2D] relative"
        >
            @foreach($aboutVehicles as $idx => $veh)
                @php
                    $img = $veh?->images->first()?->path;
                @endphp

                <div
                    x-show="i === {{ $idx }}"
                    x-transition.opacity.duration.1000ms
                    class="absolute inset-0"
                >
                    @if($img && file_exists(storage_path('app/public/' . $img)))
                        <img src="{{ asset('storage/' . $img) }}"
                             class="w-full h-full object-cover">
                    @else
                        <img src="{{ asset('/images/about-default.jpg') }}"
                             class="w-full h-full object-cover">
                    @endif
                </div>
            @endforeach
        </div>

        <!-- INFO TEXT -->
        <h3 class="text-xl font-bold mb-4">Unser Standort in Peine</h3>

        <p class="text-[#BFBFBF] mb-4">
            Moderne Räumlichkeiten mit Showroom, Werkstatt und Kundenbereich –
            designed für das beste Automobil-Erlebnis.
        </p>

        <div class="flex items-center text-[#BFBFBF]">
            <i class="fas fa-map-marker-alt text-[#B91C1C] mr-2"></i>
            <span>Wilhelm-Rausch-Str. 11, 31228 Peine</span>
        </div>

    </div>
</div>


            </div>

        </div>
    </div>
</section>

