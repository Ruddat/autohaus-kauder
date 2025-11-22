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


