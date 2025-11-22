<div class="glass-effect rounded-2xl p-8 border border-[#333]">

    @if (session('info'))
        <div class="p-3 mb-4 bg-blue-600/20 border border-blue-600 text-blue-300 rounded-lg">
            {{ session('info') }}
        </div>
    @endif

    @if (session('success'))
        <div class="p-3 mb-4 bg-green-600/20 border border-green-600 text-green-400 rounded-lg">
            {{ session('success') }}
        </div>
    @endif

    <h2 class="text-2xl font-bold mb-6">
        @if ($editId)
            Showroom Bild bearbeiten
        @else
            Neues Showroom Bild hinzufügen
        @endif
    </h2>

    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
        <div>
            <label class="font-medium text-sm">Titel</label>
            <input type="text" wire:model="title"
                   class="w-full bg-[#2D2D2D] border border-[#444] rounded-lg px-4 py-3">
        </div>

        <div>
            <label class="font-medium text-sm">Untertitel</label>
            <input type="text" wire:model="subtitle"
                   class="w-full bg-[#2D2D2D] border border-[#444] rounded-lg px-4 py-3">
        </div>

        <div>
            <label class="font-medium text-sm">Sortierung</label>
            <input type="number" wire:model="sort_order"
                   class="w-full bg-[#2D2D2D] border border-[#444] rounded-lg px-4 py-3">
        </div>

        <div class="col-span-3">
            <label class="font-medium text-sm">
                Bild @if($editId) <span class="text-[#777]">(optional)</span> @endif
            </label>

            <input type="file" wire:model="image"
                   class="w-full bg-[#2D2D2D] border border-[#444] rounded-lg px-4 py-3">

@if ($image)
    <p class="text-xs text-[#BFBFBF] mt-2">Neue Vorschau:</p>
    <img src="{{ $image->temporaryUrl() }}"
         class="h-28 mt-1 rounded-lg border border-[#333] object-cover">
@elseif ($existingImage)
    <p class="text-xs text-[#BFBFBF] mt-2">Aktuelles Bild:</p>
    <img src="{{ Storage::url($existingImage) }}"
         class="h-28 mt-1 rounded-lg border border-[#333] object-cover">
@endif
        </div>
    </div>

    <div class="mt-6 flex gap-3">
        <button wire:click="save"
                class="bg-gradient-to-r from-[#B91C1C] to-[#8B0000] text-white px-6 py-3 rounded-lg font-medium">
            @if ($editId)
                Speichern
            @else
                Hinzufügen
            @endif
        </button>

        @if ($editId)
            <button wire:click="cancelEdit"
                    class="bg-[#444] px-6 py-3 rounded-lg font-medium">
                Abbrechen
            </button>
        @endif
    </div>



    <!-- List -->
    <h3 class="text-xl font-bold mb-4">Vorhandene Bilder</h3>

    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
        @foreach($items as $item)
            <div class="bg-[#1E1E1E] rounded-2xl overflow-hidden border border-[#333]">
                <img src="{{ Storage::url($item->image) }}" class="h-40 w-full object-cover">
                <div class="p-4">
                    <div class="font-bold">{{ $item->title }}</div>
                    <div class="text-sm text-[#BFBFBF]">{{ $item->subtitle }}</div>
                    <div class="text-xs text-[#666] mt-1">Sortierung: {{ $item->sort_order }}</div>

<button wire:click="setEdit({{ $item->id }})"
        class="text-blue-400 hover:text-blue-300 text-sm mr-3">
    <i class="fas fa-edit"></i> Edit
</button>

<button wire:click="delete({{ $item->id }})"
        class="text-red-500 hover:text-red-400 text-sm">
    <i class="fas fa-trash"></i> Löschen
</button>
                </div>
            </div>
        @endforeach
    </div>
</div>
