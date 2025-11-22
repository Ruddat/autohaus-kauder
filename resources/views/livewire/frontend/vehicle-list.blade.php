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

<!-- Filter-Leiste -->
<section class="py-6 bg-[#0f0f0f] border-b border-[#333]">
    <div class="container mx-auto px-4">

        <div class="grid grid-cols-1 md:grid-cols-5 gap-4">

            <!-- Marke -->
            <div>
                <label class="text-xs text-[#BFBFBF]">Marke</label>
                <select wire:model.live="brand_id"
                        class="w-full bg-[#2D2D2D] border border-[#444] text-white px-3 py-2 rounded-lg">
                    <option value="">Alle Marken</option>
                    @foreach($brands as $b)
                        <option value="{{ $b->id }}">{{ $b->name }}</option>
                    @endforeach
                </select>
            </div>

            <!-- Modell -->
            <div>
                <label class="text-xs text-[#BFBFBF]">Modell</label>
                <select wire:model.live="model"
                        class="w-full bg-[#2D2D2D] border border-[#444] text-white px-3 py-2 rounded-lg">
                    <option value="">Alle Modelle</option>

                    @foreach($models as $m)
                        <option value="{{ $m }}">{{ $m }}</option>
                    @endforeach
                </select>
            </div>

            <!-- Preis von -->
            <div>
                <label class="text-xs text-[#BFBFBF]">Preis von (€)</label>
                <input type="number" wire:model.live="price_from"
                       class="w-full bg-[#2D2D2D] border border-[#444] text-white px-3 py-2 rounded-lg">
            </div>

            <!-- Preis bis -->
            <div>
                <label class="text-xs text-[#BFBFBF]">Preis bis (€)</label>
                <input type="number" wire:model.live="price_to"
                       class="w-full bg-[#2D2D2D] border border-[#444] text-white px-3 py-2 rounded-lg">
            </div>

            <!-- Sortierung -->
            <div>
                <label class="text-xs text-[#BFBFBF]">Sortieren</label>
                <select wire:model.live="sort"
                        class="w-full bg-[#2D2D2D] border border-[#444] text-white px-3 py-2 rounded-lg">
                    <option value="price_asc">Preis ↑</option>
                    <option value="price_desc">Preis ↓</option>
                    <option value="year_desc">Jahr neu → alt</option>
                    <option value="year_asc">Jahr alt → neu</option>
                    <option value="km_asc">km ↑</option>
                    <option value="km_desc">km ↓</option>
                </select>
            </div>
        </div>

        <!-- Zweite Filterreihe -->
        <div class="grid grid-cols-1 md:grid-cols-4 gap-4 mt-4">

            <!-- Erstzulassung -->
            <div>
                <label class="text-xs text-[#BFBFBF]">EZ von</label>
                <input type="number" wire:model.live="year_from"
                       class="w-full bg-[#2D2D2D] border border-[#444] text-white px-3 py-2 rounded-lg">
            </div>

            <div>
                <label class="text-xs text-[#BFBFBF]">EZ bis</label>
                <input type="number" wire:model.live="year_to"
                       class="w-full bg-[#2D2D2D] border border-[#444] text-white px-3 py-2 rounded-lg">
            </div>

            <!-- Kilometer -->
            <div>
                <label class="text-xs text-[#BFBFBF]">km von</label>
                <input type="number" wire:model.live="km_from"
                       class="w-full bg-[#2D2D2D] border border-[#444] text-white px-3 py-2 rounded-lg">
            </div>

            <div>
                <label class="text-xs text-[#BFBFBF]">km bis</label>
                <input type="number" wire:model.live="km_to"
                       class="w-full bg-[#2D2D2D] border border-[#444] text-white px-3 py-2 rounded-lg">
            </div>

        </div>

        <!-- Reset Button -->
        <div class="mt-4">
            <button wire:click="resetFilters"
                    class="bg-[#2D2D2D] hover:bg-[#BFBFBF] hover:text-[#1E1E1E]
                           text-white px-4 py-2 rounded-lg text-sm font-medium transition">
                <i class="fas fa-undo mr-1"></i> Filter zurücksetzen
            </button>
        </div>

    </div>
</section>

<!-- Fahrzeuge Grid -->
<section class="py-16 bg-[#0f0f0f]">
    <div class="container mx-auto px-4">

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-8">

@foreach ($vehicles as $v)
    <x-vehicle-card :v="$v" />
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
