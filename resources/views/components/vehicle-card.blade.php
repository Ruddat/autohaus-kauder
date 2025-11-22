<div class="vehicle-card bg-[#1E1E1E] rounded-2xl overflow-hidden border border-[#2D2D2D] hover:border-[#BFBFBF] transition">

    <!-- IMAGE -->
    <div class="h-48 bg-gradient-to-br from-[#1E1E1E] to-[#2D2D2D] flex items-center justify-center relative overflow-hidden">

        @if($v->images->first())
            <img src="{{ asset('storage/' . $v->images->first()->path) }}"
alt="{{ $v->brandRef->name ?? 'Marke unbekannt' }} {{ $v->model }}"
                 class="w-full h-full object-cover transition duration-300 hover:scale-105">
        @else
            <div class="text-5xl text-[#BFBFBF] opacity-30">
                <i class="fas fa-car"></i>
            </div>
        @endif

<!-- Wishlist Heart -->
<livewire:wishlist :v="$v" :wire:key="'wishlist-'.$v->id" />

        <!-- STATUS BADGE -->
        @if($v->status === 'verfügbar')
            <div class="absolute top-3 right-3 bg-[#B91C1C] text-white text-xs font-bold px-2 py-1 rounded">
                VERFÜGBAR
            </div>
        @elseif($v->status === 'reserviert')
            <div class="absolute top-3 right-3 bg-yellow-600 text-white text-xs font-bold px-2 py-1 rounded">
                RESERVIERT
            </div>
        @else
            <div class="absolute top-3 right-3 bg-gray-600 text-white text-xs font-bold px-2 py-1 rounded">
                VERKAUFT
            </div>
        @endif

        @if($v->badge)
            <div class="absolute top-3 left-3 bg-[#2D2D2D] text-white text-xs font-bold px-2 py-1 rounded border border-[#444]">
                {{ strtoupper($v->badge) }}
            </div>
        @endif

    </div>

    <!-- CONTENT -->
    <div class="p-6">
        <div class="flex justify-between items-start mb-4">
            <h3 class="text-xl font-bold leading-tight">
{{ $v->brandRef->name ?? 'Unbekannt' }}
                <span class="font-normal">{{ $v->model }}</span>
            </h3>

            <span class="text-[#B91C1C] font-bold">
                {{ $v->year }}
            </span>
        </div>

<!-- MwSt. Ausweisbar Badge -->
@if($v->isVatDeductible())
    <div class="inline-block mb-2 px-2 py-1 text-[10px] rounded-md
                bg-[#B91C1C]/20 border border-[#B91C1C]/40 text-[#ffb3b3] uppercase tracking-wide">
        MwSt. ausweisbar
    </div>
@endif


<p class="text-[#BFBFBF] text-sm mb-2">
    {{ number_format($v->km, 0, ',', '.') }} km •
    {{ $v->fuel }} •
    {{ $v->gear }}
</p>

<!-- HIGHLIGHTS -->
@if($v->features->count())
    <div class="flex flex-wrap gap-2 mb-4">
        @foreach($v->features->take(3) as $feat)
            <span class="text-xs px-2 py-1 rounded-full
                         bg-[#2D2D2D] border border-[#444] text-[#BFBFBF]">
                {{ $feat->name }}
            </span>
        @endforeach

        @if($v->features->count() > 3)
            <span class="text-xs px-2 py-1 rounded-full
                         bg-[#B91C1C]/20 border border-[#B91C1C]/40 text-[#ffb3b3]">
                +{{ $v->features->count() - 3 }} mehr
            </span>
        @endif
    </div>
@endif

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
<style>
    .wishlist-btn i {
    opacity: .8;
}
.wishlist-btn:hover i {
    opacity: 1;
}
</style>
