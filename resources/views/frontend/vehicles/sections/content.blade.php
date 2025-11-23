<section class="py-12 bg-[#0f0f0f]">
    <div class="container mx-auto px-4">
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-12">

            <!-- Main Content -->
            <div class="lg:col-span-2">

                <!-- Technische Daten -->
<div class="glass-effect rounded-2xl p-8 border border-[#333] mb-8">

    <h2 class="text-2xl font-bold mb-6 flex items-center">
        <i class="fas fa-cogs mr-3 text-[#B91C1C]"></i> Technische Daten
    </h2>

    {{-- SECTION: MOTOR & LEISTUNG --}}
    <h3 class="text-lg font-semibold text-white mb-3">Motor & Leistung</h3>

    <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-8">

        <x-vehicle-attribute label="Leistung"
            :value="$vehicle->kw ? $vehicle->kw.' kW ('.$vehicle->hp.' PS)' : '—'" />

        @if($vehicle->ccm)
            <x-vehicle-attribute label="Hubraum"
                :value="number_format($vehicle->ccm, 0, ',', '.') . ' ccm'" />
        @endif

        <x-vehicle-attribute label="Kraftstoff"
            :value="$vehicle->fuelRef->name ?? '—'" />

        <x-vehicle-attribute label="Getriebe"
            :value="$vehicle->transmissionRef->name ?? '—'" />

        <x-vehicle-attribute label="Antrieb"
            :value="$vehicle->driveRef->name ?? '—'" />

    </div>

    {{-- SECTION: VERBRAUCH --}}
    <h3 class="text-lg font-semibold text-white mb-3">Verbrauch</h3>

    <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-8">
        <x-vehicle-attribute label="Stadt" :value="$vehicle->consumption_city ? $vehicle->consumption_city . ' l/100km' : '—'" />
        <x-vehicle-attribute label="Land" :value="$vehicle->consumption_country ? $vehicle->consumption_country . ' l/100km' : '—'" />
        <x-vehicle-attribute label="Kombiniert" :value="$vehicle->consumption ? $vehicle->consumption . ' l/100km' : '—'" />
        <x-vehicle-attribute label="Norm" :value="$vehicle->co2_norm ?? 'WLTP'" />
    </div>

    {{-- SECTION: EMISSIONEN --}}
    <h3 class="text-lg font-semibold text-white mb-3">Emissionen</h3>

    <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-8">
        <x-vehicle-attribute label="CO₂" :value="$vehicle->co2 ? $vehicle->co2 . ' g/km' : '—'" />

        <x-vehicle-attribute label="Umweltplakette"
            :value="match(true) {
                $vehicle->co2 < 100 => '🟢 Grün',
                $vehicle->co2 < 150 => '🟡 Gelb',
                default => '🔴 Rot',
            }" />
    </div>

    {{-- SECTION: FAHRZEUGDATEN --}}
    <h3 class="text-lg font-semibold text-white mb-3">Fahrzeugdaten</h3>

    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

        <x-vehicle-attribute label="Erstzulassung"
            :value="$vehicle->year ?? '—'" />

        <x-vehicle-attribute label="Kilometer"
            :value="number_format($vehicle->km, 0, ',', '.') . ' km'" />

        <x-vehicle-attribute label="Türen"
            :value="$vehicle->doors ?? '—'" />

        <x-vehicle-attribute label="Sitze"
            :value="$vehicle->seats ?? '—'" />

        <x-vehicle-attribute label="Karosserie"
            :value="$vehicle->body_type ?? '—'" />

        <x-vehicle-attribute label="Farbe"
            :value="$vehicle->color ?? '—'" />

        <x-vehicle-attribute label="Innenraum"
            :value="collect([$vehicle->interior, $vehicle->interior_color, $vehicle->interior_material])
                        ->filter()->implode(' • ') ?: '—'" />
    </div>

</div>


                <!-- Ausstattung -->
<div class="bg-[#111] rounded-2xl p-10 border border-[#222]">

    <div class="flex items-center mb-8">
        <div class="text-[#B91C1C] text-3xl mr-3">★</div>
        <h2 class="text-2xl font-bold">Ausstattung</h2>
    </div>

    @php $grouped = $vehicle->features->groupBy('category'); @endphp

    <div class="divide-y divide-[#222]">

        @foreach($grouped as $category => $items)

            <div class="py-6">
                <h3 class="text-lg font-semibold text-white mb-4 uppercase tracking-wide text-[#888]">
                    {{ $category ?? 'Weitere Ausstattung' }}
                </h3>

                <div class="grid grid-cols-1 md:grid-cols-3 gap-3">

                    @foreach($items as $feature)
                        <div class="flex items-center text-[#ccc]">
                            <span class="text-[#2ecc71] text-sm mr-2">✓</span>
                            {{ $feature->name }}
                        </div>
                    @endforeach

                </div>
            </div>

        @endforeach

    </div>

</div>

                <!-- Beschreibung -->
                <div class="glass-effect rounded-2xl p-8 border border-[#333] mt-8 mb-8">
                    <h2 class="text-2xl font-bold mb-6 flex items-center">
                        <i class="fas fa-file-alt mr-3 text-[#B91C1C]"></i> Fahrzeugbeschreibung
                    </h2>

                    @if($vehicle->description)
                        <div class="text-[#BFBFBF] space-y-4 leading-relaxed">
                            {!! nl2br(e($vehicle->description)) !!}
                        </div>
                    @else
                        <p class="text-[#BFBFBF] italic">
                            Keine Beschreibung hinterlegt.
                        </p>
                    @endif
                </div>


            </div>

            <!-- Sidebar -->
            <div class="lg:col-span-1">
                <div class="sticky top-24 space-y-6">
                    @include('frontend.vehicles.sections.sidebar')
                </div>
            </div>

        </div>
    </div>
</section>
