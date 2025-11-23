
        <div class="p-6 overflow-x-auto">
<table class="w-full min-w-[500px]">
    <thead>
        <tr class="border-b border-[#333]">
            <th class="py-3 px-4 text-left">Fahrzeug</th>
            <th class="py-3 px-4 text-left">Preis</th>
            <th class="py-3 px-4 text-left">Status</th>
            <th class="py-3 px-4 text-left">Aktionen</th>
        </tr>
    </thead>

    <tbody>
        @forelse($vehicles as $vehicle)
            <tr class="border-b border-[#333] hover:bg-[#2D2D2D]/50">
                <td class="py-3 px-4">
                    <div class="flex items-center">
<div class="w-12 h-12 rounded-lg overflow-hidden bg-[#2D2D2D] mr-4 flex items-center justify-center">

    @php
        $thumb = $vehicle->images->first()?->thumb
            ?? $vehicle->images->first()?->hero
            ?? $vehicle->images->first()?->path;
    @endphp

    @if($thumb)
        <img src="{{ Storage::url($thumb) }}"
             class="w-full h-full object-cover">
    @else
        <i class="fas fa-car text-[#BFBFBF] text-xl"></i>
    @endif

</div>
                        <div>
                            <div class="font-medium">{{ $vehicle->brand }} {{ $vehicle->model }}</div>
                            <div class="text-xs text-[#BFBFBF]">{{ $vehicle->year }} • {{ $vehicle->km }} km</div>
                        </div>
                    </div>
                </td>

                <td class="py-3 px-4 font-bold">
                    {{ number_format($vehicle->price, 0, ',', '.') }} €
                </td>

                <td class="py-3 px-4">
                    @if($vehicle->status === 'verfügbar')
                        <span class="text-green-400">Verfügbar</span>
                    @elseif($vehicle->status === 'reserviert')
                        <span class="text-yellow-400">Reserviert</span>
                    @else
                        <span class="text-red-400">Verkauft</span>
                    @endif
                </td>

                <td class="py-3 px-4 flex gap-3">
                    <a href="{{ route('backend.vehicles.edit', $vehicle->id) }}"
                       class="text-blue-400 hover:text-blue-300">
                        <i class="fas fa-edit"></i>
                    </a>
                                <a href="{{ route('vehicles.show', $vehicle->id) }}" class="text-green-500 hover:text-green-300">
                                    <i class="fas fa-eye"></i>
                                </a>
                    <button wire:click="deleteVehicle({{ $vehicle->id }})"
                            class="text-red-400 hover:text-red-300">
                        <i class="fas fa-trash"></i>
                    </button>
                </td>
            </tr>
        @empty
            <tr>
                <td colspan="4" class="text-center py-6 text-[#BFBFBF]">
                    Noch keine Fahrzeuge vorhanden.
                </td>
            </tr>
        @endforelse
    </tbody>
</table>

<div class="p-4">
    {{ $vehicles->links() }}
</div>
        </div>
