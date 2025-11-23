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
        @if ($team_id)
            Teammitglied bearbeiten
        @else
            Neues Teammitglied hinzufügen
        @endif
    </h2>

    <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">

        <div>
            <label class="text-sm font-medium">Name</label>
            <input type="text" wire:model="name"
                   class="w-full bg-[#2D2D2D] border border-[#444] rounded-lg px-4 py-3">
        </div>

        <div>
            <label class="text-sm font-medium">Position</label>
            <input type="text" wire:model="position"
                   class="w-full bg-[#2D2D2D] border border-[#444] rounded-lg px-4 py-3">
        </div>

        <div>

            <label class="text-sm font-medium">Telefonnummer</label>
            <input type="text" wire:model="phone"
            class="w-full bg-[#2D2D2D] border border-[#444] rounded-lg px-4 py-3">
        </div>

        <div class="col-span-2">
            <label class="text-sm font-medium">Kurzbeschreibung</label>
            <textarea wire:model="bio" rows="3"
                      class="w-full bg-[#2D2D2D] border border-[#444] rounded-lg px-4 py-3"></textarea>
        </div>

        <div>
            <label class="text-sm font-medium">Sortierung</label>
            <input type="number" wire:model="sort_order"
                   class="w-full bg-[#2D2D2D] border border-[#444] rounded-lg px-4 py-3">
        </div>

        <div>
            <label class="text-sm font-medium">Bild (optional)</label>
            <input type="file" wire:model="image"
                   class="w-full bg-[#2D2D2D] border border-[#444] rounded-lg px-4 py-3">

@if ($image)
    <p class="text-xs mt-2 text-gray-400">Neue Vorschau:</p>
    <img src="{{ $image->temporaryUrl() }}"
         class="h-24 rounded-lg mt-1 border border-[#333] object-cover">
@elseif ($existingImage)
    <p class="text-xs mt-2 text-gray-400">Aktuelles Bild:</p>
    <img src="{{ asset('storage/' . $existingImage) }}"
         class="h-24 rounded-lg mt-1 border border-[#333] object-cover">

    <button wire:click="deleteImage"
            class="mt-3 bg-red-600/20 border border-red-600 text-red-400 px-3 py-1 text-xs rounded-lg">
        Bild löschen
    </button>
@endif


</div>

    </div>

    <div class="flex gap-3">
        <button wire:click="save"
                class="bg-gradient-to-r from-[#B91C1C] to-[#8B0000] text-white px-6 py-3 rounded-lg font-medium">
            @if ($team_id)
                Speichern
            @else
                Hinzufügen
            @endif
        </button>

        @if ($team_id)
            <button wire:click="resetForm"
                    class="bg-[#444] px-6 py-3 rounded-lg font-medium">
                Abbrechen
            </button>
        @endif
    </div>

    <hr class="my-10 border-[#333]">

    <h3 class="text-xl font-bold mb-4">Teamliste</h3>

    <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-6">

        @foreach ($team as $m)
            <div class="border border-[#333] glass-effect p-4 rounded-2xl">
                <div class="flex items-center gap-4">
@if($m->image)
    <img src="{{ asset('storage/' . $m->image) }}"
         class="w-20 h-20 rounded-full object-cover">
@else
    <div class="w-20 h-20 rounded-full bg-[#1E1E1E] flex items-center justify-center">
        <i class="fas fa-user text-3xl text-[#777]"></i>
    </div>
@endif

                    <div>
                        <div class="font-bold">{{ $m->name }}</div>
                        <div class="text-[#B91C1C]">{{ $m->position }}</div>

                    @if($m->phone)
    <div class="mt-5 flex flex-col items-center">
        <div class="flex items-center justify-center
                    bg-[#1E1E1E]/70 border border-[#333] rounded-xl
                    px-4 py-2 shadow-md backdrop-blur-sm">

            <i class="fas fa-phone mr-2 text-[#B91C1C] text-sm"></i>

            <span class="text-[#E5E5E5] font-medium tracking-wide text-sm">
                {{ $m->phone }}
            </span>
        </div>
    </div>
@endif


                    </div>
                </div>

                <p class="text-sm mt-4 text-[#BFBFBF]">{{ $m->bio }}</p>



                <div class="mt-4 flex gap-3">
                    <button wire:click="edit({{ $m->id }})"
                            class="text-blue-400 hover:text-blue-300">
                        <i class="fas fa-edit"></i>
                    </button>

                    <button wire:click="delete({{ $m->id }})"
                            class="text-red-400 hover:text-red-300">
                        <i class="fas fa-trash"></i>
                    </button>
                </div>
            </div>
        @endforeach

    </div>

</div>
