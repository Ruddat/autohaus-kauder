<!-- Breadcrumb -->
<div class="bg-[#1a1a1a] py-4 border-b border-[#2D2D2D]">
    <div class="container mx-auto px-4">
        <div class="flex items-center space-x-2 text-sm text-[#BFBFBF]">
            <a href="/" class="hover:text-white transition">Home</a>
            <i class="fas fa-chevron-right text-xs"></i>
            <a href="/fahrzeuge" class="hover:text-white transition">Fahrzeuge</a>
            <i class="fas fa-chevron-right text-xs"></i>
            <span class="text-white">
                {{ $vehicle->brandRef->name ?? '' }} {{ $vehicle->model }}
            </span>
        </div>
    </div>
</div>

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/glightbox/dist/css/glightbox.min.css" />
<script src="https://cdn.jsdelivr.net/npm/glightbox/dist/js/glightbox.min.js"></script>

<!-- Premium Gallery Wrapper -->
<section class="gradient-bg py-8">

    <div class="container mx-auto px-4"
         x-data="{ activeIndex: 0 }">

        <!-- Title / Price -->
        <div class="flex flex-col lg:flex-row justify-between items-start lg:items-center mb-8">
            <div>
                <h1 class="text-3xl md:text-4xl font-bold mb-2">
                    {{ $vehicle->brandRef->name ?? '' }} {{ $vehicle->model }}
                </h1>
                <div class="flex items-center space-x-4 text-[#BFBFBF] text-sm">
                    <span class="flex items-center">
                        <i class="fas fa-calendar-alt mr-2"></i> {{ $vehicle->year }}
                    </span>
                    <span class="flex items-center">
                        <i class="fas fa-tachometer-alt mr-2"></i>
                        {{ number_format($vehicle->km, 0, ',', '.') }} km
                    </span>
                    <span class="flex items-center">
                        <i class="fas fa-gas-pump mr-2"></i> {{ $vehicle->fuelRef->name ?? '—' }}
                    </span>
                </div>
            </div>

            <!-- Price -->
            <div class="mt-4 lg:mt-0">
                <div class="text-3xl font-bold text-[#B91C1C]">
                    € {{ number_format($vehicle->price, 0, ',', '.') }}
                </div>
                <div class="text-sm text-[#BFBFBF] text-right">
                    @if($vehicle->vat > 0)
                        inkl. MwSt.
                    @else
                        MwSt. nicht ausweisbar
                    @endif
                </div>
            </div>
        </div>

        <!-- SWIPER HERO -->
        <div class="swiper mySwiperHero rounded-2xl overflow-hidden aspect-[16/9] mb-4">
            <div class="swiper-wrapper">

                @foreach($vehicle->images as $index => $img)
                    <div class="swiper-slide relative">

                        {{-- 🔒 SPERRE + BANNER BEI RESERVIERT/VERKAUFT --}}
                        @if($vehicle->status !== 'verfügbar')
                            <!-- Diagonaler Banner -->
                            <div class="absolute inset-0 pointer-events-none z-20 flex items-center justify-center">
                                <div class="bg-[#B91C1C] text-white font-bold text-3xl px-10 py-3 opacity-80 transform rotate-[-20deg]">
                                    {{ strtoupper($vehicle->status) }}
                                </div>
                            </div>

                            <!-- Schwarzes Overlay -->
                            <div class="absolute inset-0 bg-black/60 z-10 pointer-events-none"></div>
                        @endif

                        {{-- 🔥 Bild + Sperre der Lightbox --}}
                        <a href="{{ Storage::url($img->original ?: $img->hero) }}"
                           class="glightbox {{ $vehicle->status !== 'verfügbar' ? 'pointer-events-none' : '' }}"
                           data-gallery="vehicle-{{ $vehicle->id }}">

                            <img src="{{ Storage::url($img->hero ?: $img->path) }}"
                                 class="w-full h-full object-cover
                                 {{ $vehicle->status !== 'verfügbar' ? 'opacity-70' : '' }}">
                        </a>

                    </div>
                @endforeach

            </div>

            <!-- Navigation -->
            <div class="swiper-button-next text-white"></div>
            <div class="swiper-button-prev text-white"></div>
        </div>

        <!-- THUMBNAIL STRIP -->
        <div class="swiper mySwiperThumbs mt-4">
            <div class="swiper-wrapper">

                @foreach($vehicle->images as $index => $img)
                    <div class="swiper-slide cursor-pointer"
                         @click="activeIndex = {{ $index }}">

                        <div class="relative h-20 rounded-lg overflow-hidden border border-transparent hover:border-[#BFBFBF] transition">

                            {{-- Thumbnail --}}
                            <img src="{{ Storage::url($img->thumb ?: $img->path) }}"
                                 class="w-full h-full object-cover
                                        {{ $vehicle->status !== 'verfügbar' ? 'opacity-50' : '' }}">

                            {{-- Kleines Badge im Thumbnail für Hauptbild --}}
                            @if($img->is_main)
                                <div class="absolute bottom-1 right-1 bg-[#B91C1C] text-white text-[10px] px-2 py-0.5 rounded">
                                    Hauptbild
                                </div>
                            @endif

                        </div>

                    </div>
                @endforeach

            </div>
        </div>

    </div>

</section>
