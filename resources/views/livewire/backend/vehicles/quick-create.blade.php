<div class="glass-effect rounded-2xl p-6 border border-[#333] space-y-6">

    <h2 class="text-xl font-bold mb-4">Schnellfahrzeug anlegen</h2>

    @if(session()->has('quick_created'))
        <div class="bg-green-500/20 text-green-300 px-4 py-3 rounded-xl border border-green-500/30">
            {{ session('quick_created') }}
        </div>
    @endif

    <div class="space-y-4">

        <div>
            <label class="text-sm text-[#BFBFBF]">Marke *</label>
            <input type="text" wire:model="brand"
                   class="w-full bg-[#2D2D2D] border border-[#444] rounded-lg px-3 py-2">
        </div>

        <div>
            <label class="text-sm text-[#BFBFBF]">Modell *</label>
            <input type="text" wire:model="model"
                   class="w-full bg-[#2D2D2D] border border-[#444] rounded-lg px-3 py-2">
        </div>

        <div class="grid grid-cols-2 gap-4">
            <div>
                <label class="text-sm text-[#BFBFBF]">Preis *</label>
                <input type="number" wire:model="price"
                       class="w-full bg-[#2D2D2D] border border-[#444] rounded-lg px-3 py-2">
            </div>

            <div>
                <label class="text-sm text-[#BFBFBF]">Kilometer *</label>
                <input type="number" wire:model="km"
                       class="w-full bg-[#2D2D2D] border border-[#444] rounded-lg px-3 py-2">
            </div>
        </div>

        <div class="grid grid-cols-2 gap-4">
            <div>
                <label class="text-sm text-[#BFBFBF]">Erstzulassung *</label>
                <input type="number" wire:model="year"
                       class="w-full bg-[#2D2D2D] border border-[#444] rounded-lg px-3 py-2">
            </div>

            <div>
                <label class="text-sm text-[#BFBFBF]">Getriebe *</label>
                <select wire:model="gear"
                        class="w-full bg-[#2D2D2D] border border-[#444] rounded-lg px-3 py-2">
                    <option value="Automatik">Automatik</option>
                    <option value="Schaltgetriebe">Schaltgetriebe</option>
                </select>
            </div>
        </div>

        <div>
            <label class="text-sm text-[#BFBFBF]">Kraftstoff *</label>
            <select wire:model="fuel"
                    class="w-full bg-[#2D2D2D] border border-[#444] rounded-lg px-3 py-2">
                <option>Benzin</option>
                <option>Diesel</option>
                <option>Hybrid</option>
                <option>Elektro</option>
            </select>
        </div>
    </div>

    <button wire:click="save"
            class="w-full py-3 rounded-lg bg-gradient-to-r from-[#B91C1C] to-[#8B0000] hover:opacity-90 transition font-bold text-white">
        Speichern
    </button>
</div>
