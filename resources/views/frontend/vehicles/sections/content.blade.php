<section class="py-12 bg-[#0f0f0f]">
    <div class="container mx-auto px-4">
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-12">

            <!-- Main Content -->
            <div class="lg:col-span-2">

                <!-- Beschreibung -->
                <div class="glass-effect rounded-2xl p-8 border border-[#333] mb-8">
                    <h2 class="text-2xl font-bold mb-6 flex items-center">
                        <i class="fas fa-file-alt mr-3 text-[#B91C1C]"></i> Fahrzeugbeschreibung
                    </h2>

                    <p class="text-[#BFBFBF] mb-4">
                        Der Mercedes-Benz E 350 e AMG Line vereint eleganteres Design mit modernster Hybrid-Technologie.
                    </p>

                    <p class="text-[#BFBFBF]">
                        Ausgestattet mit dem AMG Line Paket, inklusive Sportfahrwerk, Ledersitzen, Panoramadach und MBUX.
                    </p>
                </div>

                <!-- Technische Daten -->
                <div class="glass-effect rounded-2xl p-8 border border-[#333] mb-8">
                    <h2 class="text-2xl font-bold mb-6 flex items-center">
                        <i class="fas fa-cogs mr-3 text-[#B91C1C]"></i> Technische Daten
                    </h2>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

                        <div class="space-y-4">
                            <x-vehicle-attribute label="Marke" value="Mercedes-Benz"/>
                            <x-vehicle-attribute label="Modell" value="E 350 e"/>
                            <x-vehicle-attribute label="Erstzulassung" value="März 2022"/>
                            <x-vehicle-attribute label="Kilometerstand" value="15.300 km"/>
                            <x-vehicle-attribute label="Leistung" value="215 kW (292 PS)"/>
                        </div>

                        <div class="space-y-4">
                            <x-vehicle-attribute label="Kraftstoff" value="Hybrid"/>
                            <x-vehicle-attribute label="Verbrauch" value="1,8 l/100km"/>
                            <x-vehicle-attribute label="Getriebe" value="9-Gang Automatik"/>
                            <x-vehicle-attribute label="Farbe" value="Obsidianschwarz Metallic"/>
                            <x-vehicle-attribute label="Innenausstattung" value="Leder Schwarz/Anthrazit"/>
                        </div>

                    </div>
                </div>

                <!-- Ausstattung -->
                <div class="glass-effect rounded-2xl p-8 border border-[#333]">
                    <h2 class="text-2xl font-bold mb-6 flex items-center">
                        <i class="fas fa-star mr-3 text-[#B91C1C]"></i> Ausstattung
                    </h2>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        @foreach ([
                            'AMG Line Paket',
                            'Panoramadach',
                            'Lenkradheizung',
                            'Memory-Sitze',
                            'Keyless Go',
                            '360° Kamera',
                            'Burmester Soundsystem',
                            'Head-up Display',
                            'LED-Scheinwerfer',
                            'Sportfahrwerk',
                            'Ambientebeleuchtung',
                            'Massagesitze',
                        ] as $feature)
                        <div class="flex items-center">
                            <i class="fas fa-check text-green-500 mr-3"></i>
                            <span>{{ $feature }}</span>
                        </div>
                        @endforeach
                    </div>

                </div>

            </div>

                <!-- Sidebar -->
                <div class="sticky-sidebar">
                    <!-- Contact Card -->

                    @include('frontend.vehicles.sections.sidebar')

            </div>
        </div>
    </section>


<section class="py-12 bg-[#0f0f0f]">
    <div class="container mx-auto px-4">
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-12">

            <!-- Main Content -->
            <div class="lg:col-span-2">

                <!-- Beschreibung -->
                <div class="glass-effect rounded-2xl p-8 border border-[#333] mb-8">
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

                <!-- Technische Daten -->
                <div class="glass-effect rounded-2xl p-8 border border-[#333] mb-8">
                    <h2 class="text-2xl font-bold mb-6 flex items-center">
                        <i class="fas fa-cogs mr-3 text-[#B91C1C]"></i> Technische Daten
                    </h2>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

                        <div class="space-y-4">
                            <x-vehicle-attribute label="Marke"
                                :value="$vehicle->brandRef->name ?? '—'" />

                            <x-vehicle-attribute label="Modell"
                                :value="$vehicle->model ?? '—'" />

                            <x-vehicle-attribute label="Erstzulassung"
                                :value="$vehicle->year ? $vehicle->year : '—'" />

                            <x-vehicle-attribute label="Kilometerstand"
                                :value="$vehicle->km !== null ? number_format($vehicle->km, 0, ',', '.') . ' km' : '—'" />

                            <x-vehicle-attribute label="Leistung"
                                :value="($vehicle->kw || $vehicle->hp)
                                    ? trim(($vehicle->kw ? $vehicle->kw.' kW' : '').' '.($vehicle->hp ? '('.$vehicle->hp.' PS)' : ''))
                                    : '—'" />

                            @if($vehicle->ccm)
                                <x-vehicle-attribute label="Hubraum"
                                    :value="number_format($vehicle->ccm, 0, ',', '.') . ' ccm'" />
                            @endif

                            @if($vehicle->doors)
                                <x-vehicle-attribute label="Türen" :value="$vehicle->doors" />
                            @endif

                            @if($vehicle->seats)
                                <x-vehicle-attribute label="Sitze" :value="$vehicle->seats" />
                            @endif
                        </div>

                        <div class="space-y-4">
                            <x-vehicle-attribute label="Kraftstoff"
                                :value="$vehicle->fuel ?? '—'" />

                            <x-vehicle-attribute label="Verbrauch"
                                :value="$vehicle->consumption ?? '—'" />

                            <x-vehicle-attribute label="Getriebe"
                                :value="$vehicle->gear ?? '—'" />

                            <x-vehicle-attribute label="Antrieb"
                                :value="$vehicle->drive ?? '—'" />

                            <x-vehicle-attribute label="Farbe"
                                :value="$vehicle->color ?? '—'" />

                            <x-vehicle-attribute label="Innenausstattung"
                                :value="collect([
                                        $vehicle->interior,
                                        $vehicle->interior_color,
                                        $vehicle->interior_material
                                    ])->filter()->implode(' • ') ?: '—'" />

                            @if($vehicle->co2)
                                <x-vehicle-attribute label="CO₂" :value="$vehicle->co2" />
                            @endif
                        </div>

                    </div>
                </div>

                <!-- Ausstattung -->
                <div class="glass-effect rounded-2xl p-8 border border-[#333]">
                    <h2 class="text-2xl font-bold mb-6 flex items-center">
                        <i class="fas fa-star mr-3 text-[#B91C1C]"></i> Ausstattung
                    </h2>

                    @if($vehicle->features && $vehicle->features->count())
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            @foreach ($vehicle->features as $feature)
                                <div class="flex items-center">
                                    <i class="fas fa-check text-green-500 mr-3"></i>
                                    <span>{{ $feature->name }}</span>
                                </div>
                            @endforeach
                        </div>
                    @else
                        <p class="text-[#BFBFBF] italic">
                            Keine Ausstattungsmerkmale hinterlegt.
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
