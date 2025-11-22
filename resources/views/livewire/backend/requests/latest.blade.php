<div class="glass-effect rounded-2xl border border-[#333] p-6">
    <h2 class="text-2xl font-bold mb-4">Neue Anfragen</h2>

    @forelse($requests as $req)
        <div class="border-b border-[#333] py-3 flex justify-between items-center">
            <div>
                <div class="font-medium">{{ $req->name }}</div>
                <div class="text-xs text-[#BFBFBF]">{{ $req->email }}</div>
                <div class="text-sm mt-1">{{ Str::limit($req->message, 50) }}</div>
            </div>

            <button wire:click="markRead({{ $req->id }})"
                    class="text-blue-500 hover:text-blue-300 text-sm">
                <i class="fas fa-check"></i>
            </button>
        </div>
    @empty
        <p class="text-[#BFBFBF] text-sm">Keine neuen Anfragen.</p>
    @endforelse
</div>
