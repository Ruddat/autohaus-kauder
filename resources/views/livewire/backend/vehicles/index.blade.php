<div class="space-y-6">

    <div class="flex justify-between items-center">
        <h1 class="text-2xl font-bold">Fahrzeuge</h1>

        <a href="{{ route('backend.vehicles.create') }}"
           class="px-4 py-2 rounded-lg bg-gradient-to-r from-[#B91C1C] to-[#8B0000] text-white hover:opacity-90">
            <i class="fas fa-plus mr-2"></i> Neues Fahrzeug
        </a>
    </div>

    <div class="glass-effect rounded-2xl p-4 border border-[#333]">
        <div class="flex flex-wrap gap-4">

            <input type="text"
                   wire:model.live="search"
                   placeholder="Suche nach Marke / Modell"
                   class="bg-[#2D2D2D] border border-[#444] rounded-lg px-4 py-2 w-full md:w-1/3">

            <select wire:model.live="status"
                    class="bg-[#2D2D2D] border border-[#444] rounded-lg px-4 py-2 w-full md:w-1/4">
                <option value="">Alle Stati</option>
                <option value="verfügbar">Verfügbar</option>
                <option value="reserviert">Reserviert</option>
                <option value="verkauft">Verkauft</option>
            </select>

        </div>
    </div>

    <div class="glass-effect rounded-2xl border border-[#333] overflow-hidden">
        <table class="w-full">
            <thead class="bg-[#1a1a1a]">
                <tr>
                    <th class="p-3 cursor-pointer" wire:click="sortBy('brand')">Marke/Modell</th>
                    <th class="p-3 cursor-pointer" wire:click="sortBy('price')">Preis</th>
                    <th class="p-3">Status</th>
                    <th class="p-3">Aktionen</th>
                </tr>
            </thead>

            <tbody>
            @forelse($vehicles as $v)
                <tr class="border-t border-[#333] hover:bg-[#2D2D2D]/50">
<td class="p-3">
    <div class="flex items-center gap-3">

        {{-- THUMBNAIL --}}
        <div class="w-12 h-12 rounded-lg overflow-hidden bg-[#2D2D2D] flex items-center justify-center">

            @php
                $thumb = $v->images->first()?->thumb
                    ?? $v->images->first()?->hero
                    ?? $v->images->first()?->path;
            @endphp

            @if($thumb)
                <img src="{{ Storage::url($thumb) }}" class="w-full h-full object-cover">
            @else
                <i class="fas fa-car text-[#BFBFBF] text-xl"></i>
            @endif

        </div>

        {{-- TEXT --}}
        <div>
            <div class="font-semibold">{{ $v->brandRef->name ?? 'Unbekannt' }} {{ $v->model }}</div>
            <div class="text-xs text-[#BFBFBF]">
                {{ $v->year }} • {{ number_format($v->km, 0, ',', '.') }} km
            </div>
        </div>

    </div>
</td>


                    <td class="p-3 font-bold">
                        € {{ number_format($v->price, 0, ',', '.') }}
                    </td>

                    <td class="p-3">
                        @if($v->status === 'verfügbar')
                            <span class="text-green-400">Verfügbar</span>
                        @elseif($v->status === 'reserviert')
                            <span class="text-yellow-400">Reserviert</span>
                        @else
                            <span class="text-red-400">Verkauft</span>
                        @endif
                    </td>

                    <td class="p-3 flex gap-3">

                        <a href="{{ route('backend.vehicles.edit', $v->id) }}"
                           class="text-blue-400 hover:text-blue-300">
                            <i class="fas fa-edit"></i>
                        </a>

                        <button wire:click="deleteVehicle({{ $v->id }})"
                                class="text-red-400 hover:text-red-300">
                            <i class="fas fa-trash"></i>
                        </button>
                    </td>

                </tr>
            @empty
                <tr>
                    <td colspan="4" class="p-4 text-center text-[#BFBFBF]">
                        Keine Fahrzeuge gefunden.
                    </td>
                </tr>
            @endforelse
            </tbody>
        </table>

        <div class="p-4">
            {{ $vehicles->links() }}
        </div>
    </div>

</div>
