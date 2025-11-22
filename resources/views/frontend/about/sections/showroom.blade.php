<section id="showroom" class="py-20 bg-[#0f0f0f]">
    <div class="container mx-auto px-4">

        <div class="text-center mb-16">
            <h2 class="text-3xl md:text-4xl font-bold mb-4">Unser Showroom</h2>
            <div class="w-24 h-1 bg-gradient-to-r from-[#B91C1C] to-[#8B0000] mx-auto"></div>
            <p class="text-[#BFBFBF] max-w-2xl mx-auto mt-6">
                Erleben Sie Premium-Automobile in perfekter Umgebung. Unser Showroom bietet
                die ideale Atmosphäre, um Ihr Traumfahrzeug zu entdecken.
            </p>
        </div>

        @php
            $slides = \App\Models\ShowroomImage::orderBy('sort_order')->get();
        @endphp

        <!-- 🔥 Der Slider ersetzt die 3 Karten vollständig -->
        <div class="swiper myShowroomSlider mb-12">
            <div class="swiper-wrapper">

                @foreach ($slides as $s)
                <div class="swiper-slide">
                    <div class="showroom-item glass-effect rounded-2xl overflow-hidden border border-[#333]">

<div class="h-64 overflow-hidden flex items-center justify-center bg-gradient-to-br from-[#1E1E1E] to-[#2D2D2D]">

    @if($s->image && file_exists(storage_path('app/public/' . $s->image)))
        <img src="{{ asset('storage/' . $s->image) }}"
             class="w-full h-full object-cover">
    @else
        <i class="fas fa-image text-6xl text-[#BFBFBF] opacity-30"></i>
    @endif

</div>

                        <div class="p-6">
                            <h3 class="text-xl font-bold mb-2">{{ $s->title }}</h3>
                            <p class="text-[#BFBFBF] text-sm">
                                {{ $s->subtitle }}
                            </p>
                        </div>

                    </div>
                </div>
                @endforeach

            </div>

            <!-- Pfeile -->
            <div class="swiper-button-next"></div>
            <div class="swiper-button-prev"></div>

            <!-- Pagination Punkte -->
            <div class="swiper-pagination mt-6"></div>
        </div>

        <!-- 🔥 Der Terminblock bleibt unverändert -->
        <div class="glass-effect rounded-2xl p-8 border border-[#333]">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-8 items-center">

                <div>
                    <h3 class="text-2xl font-bold mb-4">Showroom Besuch planen</h3>
                    <p class="text-[#BFBFBF] mb-6">
                        Vereinbaren Sie einen persönlichen Termin und erleben Sie unsere Fahrzeuge
                        in entspannter Atmosphäre. Wir nehmen uns Zeit für Ihre individuellen Wünsche.
                    </p>

                    <div class="space-y-3">
                        <div class="flex items-center">
                            <i class="fas fa-clock text-[#B91C1C] mr-3 w-6"></i>
                            <span>Mo-Fr: 8:00 - 19:00 | Sa: 9:00 - 16:00</span>
                        </div>
                        <div class="flex items-center">
                            <i class="fas fa-phone text-[#B91C1C] mr-3 w-6"></i>
                            <span>+49 5171 123456</span>
                        </div>
                        <div class="flex items-center">
                            <i class="fas fa-envelope text-[#B91C1C] mr-3 w-6"></i>
                            <span>showroom@autohaus-kauder.de</span>
                        </div>
                    </div>
                </div>

                <div class="text-center">
                    <a href="{{ route('frontend.contact') }}"
                       class="bg-gradient-to-r from-[#B91C1C] to-[#8B0000]
                              hover:from-[#8B0000] hover:to-[#B91C1C]
                              text-white px-8 py-4 rounded-lg font-medium transition-all
                              shadow-lg hover:shadow-xl text-lg inline-block">
                        <i class="fas fa-calendar-plus mr-2"></i> Termin vereinbaren
                    </a>
                    <p class="text-[#BFBFBF] text-sm mt-4">Auch spontane Besuche sind willkommen!</p>
                </div>

            </div>
        </div>

    </div>
</section>


