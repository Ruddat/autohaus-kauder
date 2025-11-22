<div>
<!-- Hero Section -->
    <!-- Hero Section -->
    <section class="py-16 gradient-bg">
        <div class="container mx-auto px-4 text-center">
            <h1 class="text-4xl md:text-5xl font-bold mb-4">Unsere Fahrzeugflotte</h1>
            <p class="text-xl text-[#BFBFBF] max-w-2xl mx-auto">
                Entdecken Sie unsere exklusive Auswahl an Premium-Fahrzeugen von Mercedes, Audi, BMW und Lexus.
            </p>
            <div class="w-24 h-1 bg-gradient-to-r from-[#B91C1C] to-[#8B0000] mx-auto mt-6"></div>
        </div>
    </section>

<!-- Filter & Sort Section -->
<section class="py-8 bg-[#0f0f0f] border-b border-[#333]">
    <div class="container mx-auto px-4">
        <div class="flex flex-col md:flex-row justify-between items-center gap-6">

            <!-- Filter Buttons -->
            <div class="flex flex-wrap gap-2">

                @foreach (['Alle Marken','Mercedes','Audi','BMW','Lexus'] as $b)
                    <button
                        wire:click="setBrand('{{ $b }}')"
                        class="filter-btn
                            {{ $brand === $b ? 'active bg-gradient-to-r from-[#B91C1C] to-[#8B0000] text-white' : 'bg-[#2D2D2D] text-white' }}
                            hover:bg-[#BFBFBF] hover:text-[#1E1E1E] px-4 py-2 rounded-lg transition text-sm font-medium"
                    >
                        {{ $b }}
                    </button>
                @endforeach

            </div>

            <!-- Sort Options -->
            <div class="flex items-center gap-4">
                <span class="text-sm text-[#BFBFBF]">Sortieren nach:</span>

                <select wire:model="sort"
                    class="bg-[#2D2D2D] border border-[#444] text-white rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-[#B91C1C]">
                    <option value="price_asc">Preis: Niedrig zu Hoch</option>
                    <option value="price_desc">Preis: Hoch zu Niedrig</option>
                    <option value="year_desc">Jahr: Neu zu Alt</option>
                    <option value="year_asc">Jahr: Alt zu Neu</option>
                    <option value="brand_asc">Marke: A-Z</option>
                </select>
            </div>

        </div>
    </div>
</section>

<!-- Fahrzeuge Grid -->
<section class="py-16 bg-[#0f0f0f]">
    <div class="container mx-auto px-4">

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-8">

@foreach ($vehicles as $v)
    <div class="vehicle-card bg-[#1E1E1E] rounded-2xl overflow-hidden border border-[#2D2D2D] hover:border-[#BFBFBF]">

        <div class="h-48 bg-gradient-to-br from-[#1E1E1E] to-[#2D2D2D] flex items-center justify-center relative overflow-hidden">

            @if($v->images->first())
                <img src="{{ asset('storage/' . $v->images->first()->path) }}"
                     class="w-full h-full object-cover">
            @else
                <div class="text-5xl text-[#BFBFBF] opacity-30">
                    <i class="fas fa-car"></i>
                </div>
            @endif

            @if($v->status === 'verfügbar')
                <div class="absolute top-4 right-4 bg-[#B91C1C] text-white text-xs font-bold px-2 py-1 rounded">
                    VERFÜGBAR
                </div>
            @elseif($v->status === 'reserviert')
                <div class="absolute top-4 right-4 bg-yellow-600 text-white text-xs font-bold px-2 py-1 rounded">
                    RESERVIERT
                </div>
            @else
                <div class="absolute top-4 right-4 bg-gray-600 text-white text-xs font-bold px-2 py-1 rounded">
                    VERKAUFT
                </div>
            @endif
        </div>

        <div class="p-6">
            <div class="flex justify-between items-start mb-4">
                <h3 class="text-xl font-bold">{{ $v->brand }} {{ $v->model }}</h3>
                <span class="text-[#B91C1C] font-bold">{{ $v->year }}</span>
            </div>

            <p class="text-[#BFBFBF] text-sm mb-4">
                {{ number_format($v->km, 0, ',', '.') }} km
            </p>

            <div class="flex justify-between items-center">
                <span class="text-2xl font-bold">
                    {{ number_format($v->price, 0, ',', '.') }} €
                </span>

                <a href="{{ route('vehicles.show', $v->slug) }}"
                   class="bg-[#2D2D2D] hover:bg-[#BFBFBF] hover:text-[#1E1E1E]
                   text-white px-4 py-2 rounded-lg transition text-sm font-medium">
                    Details
                </a>
            </div>
        </div>

    </div>
@endforeach


        </div>

        <!-- Pagination Dummy -->
        <div class="flex justify-center mt-12">
            <div class="flex space-x-2">
                @foreach ([1,2,3] as $page)
                <button class="bg-[#2D2D2D] hover:bg-[#BFBFBF] hover:text-[#1E1E1E] text-white
                    w-10 h-10 rounded-lg flex items-center justify-center transition font-medium">
                    {{ $page }}
                </button>
                @endforeach

                <button class="bg-[#2D2D2D] hover:bg-[#BFBFBF] hover:text-[#1E1E1E] text-white
                    w-10 h-10 rounded-lg flex items-center justify-center transition font-medium">
                    <i class="fas fa-chevron-right"></i>
                </button>
            </div>
        </div>

    </div>
</section>

<!-- CTA Section -->
<section class="py-16 gradient-bg">
    <div class="container mx-auto px-4 text-center">
        <h2 class="text-3xl md:text-4xl font-bold mb-6">
            Nicht das richtige Fahrzeug gefunden?
        </h2>

        <p class="text-xl text-[#BFBFBF] mb-10 max-w-2xl mx-auto">
            Kontaktieren Sie uns für eine persönliche Beratung oder informieren Sie sich über unseren Suchauftrag-Service.
        </p>

        <div class="flex flex-col md:flex-row justify-center gap-4">
            <a href="/kontakt"
                class="bg-gradient-to-r from-[#B91C1C] to-[#8B0000] hover:from-[#8B0000] hover:to-[#B91C1C]
                text-white px-8 py-4 rounded-lg font-medium transition-all shadow-lg hover:shadow-xl">
                <i class="fas fa-phone mr-2"></i> Kontakt aufnehmen
            </a>

            <a href="/suchauftrag"
                class="bg-transparent border-2 border-[#BFBFBF] hover:bg-[#BFBFBF] hover:text-[#1E1E1E]
                text-white px-8 py-4 rounded-lg font-medium transition-all">
                <i class="fas fa-search mr-2"></i> Suchauftrag erstellen
            </a>
        </div>
    </div>
</section>
</div>
