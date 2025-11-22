<div class="glass-effect rounded-2xl border border-[#333] p-6">
    <h2 class="text-2xl font-bold mb-4">Letzte Service-Termine</h2>

    @forelse($appointments as $appt)
        <div class="border-b border-[#333] py-3 flex justify-between items-center">
            <div>
                <div class="font-medium">{{ $appt->name }}</div>
                <div class="text-xs text-[#BFBFBF]">{{ $appt->brand }} · {{ $appt->model }}</div>
            </div>

            <button wire:click="markAsDone({{ $appt->id }})"
                    class="text-green-500 hover:text-green-300 text-sm">
                <i class="fas fa-check"></i>
            </button>
        </div>
    @empty
        <p class="text-[#BFBFBF] text-sm">Keine Termine vorhanden.</p>
    @endforelse
</div>
