<div class="vehicle-card bg-[#1E1E1E] rounded-2xl overflow-hidden border border-[#2D2D2D] hover:border-[#BFBFBF]">

    <div class="h-48 bg-gradient-to-br from-[#1E1E1E] to-[#2D2D2D] relative overflow-hidden">

        @if($v->images->first())
            <img src="{{ asset('storage/' . $v->images->first()->path) }}"
                 class="w-full h-full object-cover">
        @else
            <div class="flex items-center justify-center h-full">
                <i class="fas fa-car text-5xl text-[#BFBFBF] opacity-30"></i>
            </div>
        @endif

        @if($v->badge)
            <div class="absolute top-4 right-4 bg-[#B91C1C] text-white text-xs font-bold px-2 py-1 rounded">
                {{ strtoupper($v->badge) }}
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
