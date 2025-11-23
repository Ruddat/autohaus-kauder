<div class="space-y-6">

    @if (session()->has('success'))
        <div class="bg-green-500/20 text-green-300 px-4 py-3 rounded-xl border border-green-500/30">
            {{ session('success') }}
        </div>
    @endif

    {{-- HEADER --}}
    <div class="flex items-center justify-between">
        <h1 class="text-2xl font-bold">
            {{ $this->vehicle ? 'Fahrzeug bearbeiten' : 'Neues Fahrzeug anlegen' }}
        </h1>

        <a href="{{ route('backend.vehicles.index') }}"
           class="px-4 py-2 rounded-lg bg-[#2D2D2D] hover:bg-[#3A3A3A] transition">
            ← Zur Liste
        </a>
    </div>

    {{-- GRID --}}
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">

        {{-- LEFT: Daten --}}
        <div class="lg:col-span-2 glass-effect rounded-2xl p-6 border border-[#333] space-y-6">

            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div>
                    <label class="text-sm text-[#BFBFBF]">Marke *</label>
<select wire:model.live="brand_id"
        class="w-full bg-[#2D2D2D] border border-[#444] rounded-lg px-3 py-2">
    <option value="">– Marke wählen –</option>
    @foreach($brands as $brand)
        <option value="{{ $brand->id }}">{{ $brand->name }}</option>
    @endforeach
</select>
@error('brand_id') <div class="text-red-400 text-xs mt-1">{{ $message }}</div> @enderror
                </div>
                <div>
                    <label class="text-sm text-[#BFBFBF]">Modell *</label>
                    <input type="text" wire:model.live="model"
                           class="w-full bg-[#2D2D2D] border border-[#444] rounded-lg px-3 py-2">
                    @error('model') <div class="text-red-400 text-xs mt-1">{{ $message }}</div> @enderror
                </div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                <div>
                    <label class="text-sm text-[#BFBFBF]">Slug (auto) *</label>
                    <input type="text" wire:model="slug"
                           class="w-full bg-[#2D2D2D] border border-[#444] rounded-lg px-3 py-2">
                </div>
                <div>
                    <label class="text-sm text-[#BFBFBF]">Erstzulassung *</label>
                    <input type="number" wire:model="year"
                           class="w-full bg-[#2D2D2D] border border-[#444] rounded-lg px-3 py-2">
                    @error('year') <div class="text-red-400 text-xs mt-1">{{ $message }}</div> @enderror
                </div>
                <div>
                    <label class="text-sm text-[#BFBFBF]">Kilometer *</label>
                    <input type="number" wire:model="km"
                           class="w-full bg-[#2D2D2D] border border-[#444] rounded-lg px-3 py-2">
                    @error('km') <div class="text-red-400 text-xs mt-1">{{ $message }}</div> @enderror
                </div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                <div>
                    <label class="text-sm text-[#BFBFBF]">Preis (brutto) *</label>
                    <input type="number" wire:model="price"
                           class="w-full bg-[#2D2D2D] border border-[#444] rounded-lg px-3 py-2">
                    @error('price') <div class="text-red-400 text-xs mt-1">{{ $message }}</div> @enderror
                </div>
                <div>
                    <label class="text-sm text-[#BFBFBF]">Preis (netto)</label>
                    <input type="number" wire:model="price_net"
                           class="w-full bg-[#2D2D2D] border border-[#444] rounded-lg px-3 py-2">
                </div>
                <div>
                    <label class="text-sm text-[#BFBFBF]">MwSt (%)</label>
                    <input type="number" wire:model="vat"
                           class="w-full bg-[#2D2D2D] border border-[#444] rounded-lg px-3 py-2">
                </div>
            </div>

<div class="grid grid-cols-1 md:grid-cols-3 gap-4">

    {{-- Kraftstoff --}}
    <div>
        <label class="text-sm text-[#BFBFBF]">Kraftstoff *</label>
        <select wire:model="fuel_type_id"
                class="w-full bg-[#2D2D2D] border border-[#444] rounded-lg px-3 py-2 text-white">
            <option value="">– Bitte wählen –</option>
            @foreach(\App\Models\FuelType::orderBy('name')->get() as $item)
                <option value="{{ $item->id }}">{{ $item->name }}</option>
            @endforeach
        </select>
        @error('fuel_type_id')
            <div class="text-red-400 text-xs mt-1">{{ $message }}</div>
        @enderror
    </div>

    {{-- Getriebe --}}
    <div>
        <label class="text-sm text-[#BFBFBF]">Getriebe *</label>
        <select wire:model="transmission_id"
                class="w-full bg-[#2D2D2D] border border-[#444] rounded-lg px-3 py-2 text-white">
            <option value="">– Bitte wählen –</option>
            @foreach(\App\Models\Transmission::orderBy('name')->get() as $item)
                <option value="{{ $item->id }}">{{ $item->name }}</option>
            @endforeach
        </select>
        @error('transmission_id')
            <div class="text-red-400 text-xs mt-1">{{ $message }}</div>
        @enderror
    </div>

    {{-- Antrieb (bleibt erstmal Text oder später auch Select) --}}
<div>
    <label class="text-sm text-[#BFBFBF]">Antrieb *</label>
    <select wire:model="drive_id"
            class="w-full bg-[#2D2D2D] border border-[#444] rounded-lg px-3 py-2 text-white">
        <option value="">– Bitte wählen –</option>
        @foreach(\App\Models\Drive::orderBy('name')->get() as $item)
            <option value="{{ $item->id }}">{{ $item->name }}</option>
        @endforeach
    </select>
    @error('drive_id')
        <div class="text-red-400 text-xs mt-1">{{ $message }}</div>
    @enderror
</div>

</div>

            {{-- Ausstattungs-Tags --}}
            <div>
                <label class="text-sm text-[#BFBFBF]">Ausstattung (Tags, Komma-getrennt)</label>
                <input type="text" wire:model.live="features_input"
                       placeholder="Panorama, Leder, Keyless Go, 360° Kamera..."
                       class="w-full bg-[#2D2D2D] border border-[#444] rounded-lg px-3 py-2">

                @if(!empty($features))
                    <div class="flex flex-wrap gap-2 mt-2">
                        @foreach($features as $f)
                            <span class="bg-[#B91C1C]/20 text-[#ffb3b3] text-xs px-2 py-1 rounded-full border border-[#B91C1C]/30">
                                {{ $f }}
                            </span>
                        @endforeach
                    </div>
                @endif
            </div>

            {{-- Beschreibung --}}
            <div>
                <label class="text-sm text-[#BFBFBF]">Beschreibung</label>
                <textarea wire:model="description" rows="5"
                          class="w-full bg-[#2D2D2D] border border-[#444] rounded-lg px-3 py-2"></textarea>
            </div>

        </div>

        {{-- RIGHT: Status + Galerie --}}
        <div class="glass-effect rounded-2xl p-6 border border-[#333] space-y-6">

            <div>
                <label class="text-sm text-[#BFBFBF]">Status *</label>
                <select wire:model="status"
                        class="w-full bg-[#2D2D2D] border border-[#444] rounded-lg px-3 py-2">
                    <option value="verfügbar">Verfügbar</option>
                    <option value="reserviert">Reserviert</option>
                    <option value="verkauft">Verkauft</option>
                </select>
                @error('status') <div class="text-red-400 text-xs mt-1">{{ $message }}</div> @enderror
            </div>

<div>
    <label class="text-sm text-[#BFBFBF]">Badge</label>
    <select wire:model="badge_id"
            class="w-full bg-[#2D2D2D] border border-[#444] rounded-lg px-3 py-2 text-white">
        <option value="">– Kein Badge –</option>
        @foreach(\App\Models\Badge::where('active', true)->orderBy('sort_order')->get() as $item)
            <option value="{{ $item->id }}">{{ $item->label }}</option>
        @endforeach
    </select>

    @error('badge_id')
        <div class="text-red-400 text-xs mt-1">{{ $message }}</div>
    @enderror
</div>

            <div>
                <label class="text-sm text-[#BFBFBF]">Fahrzeugnummer</label>
                <input type="text" wire:model="vehicle_number" placeholder="FZ-12345"
                       class="w-full bg-[#2D2D2D] border border-[#444] rounded-lg px-3 py-2">
            </div>

            {{-- Upload --}}
            <div>
                <label class="text-sm text-[#BFBFBF]">Galerie (max 30 Bilder)</label>

                <input type="file" wire:model="gallery" multiple
                       class="w-full bg-[#2D2D2D] border border-[#444] rounded-lg px-3 py-2">

                @error('gallery') <div class="text-red-400 text-xs mt-1">{{ $message }}</div> @enderror
                @error('gallery.*') <div class="text-red-400 text-xs mt-1">{{ $message }}</div> @enderror

                {{-- Preview neue Uploads --}}
                @if($gallery)
                    <div class="grid grid-cols-3 gap-2 mt-3">
                        @foreach($gallery as $idx => $img)
                            <div class="relative group">
                                <img src="{{ $img->temporaryUrl() }}"
                                     class="h-24 w-full object-cover rounded-lg border border-[#444]">
                                <button type="button"
                                        wire:click="removeNewImage({{ $idx }})"
                                        class="absolute top-1 right-1 bg-black/60 rounded-full px-2 py-1 text-xs opacity-0 group-hover:opacity-100 transition">
                                    ✕
                                </button>
                            </div>
                        @endforeach
                    </div>
                @endif
            </div>

            {{-- Existing Images + Main --}}
            @if($existingImages->count())
                <div>
                    <label class="text-sm text-[#BFBFBF]">Vorhandene Bilder</label>
                    <div class="grid grid-cols-3 gap-2 mt-2">
                        @foreach($existingImages as $img)
                            <button type="button"
                                    wire:click="setMainImage({{ $img->id }})"
                                    class="relative border rounded-lg overflow-hidden
                                           {{ $main_image_id == $img->id ? 'border-[#B91C1C]' : 'border-[#444]' }}">
                                <img src="{{ Storage::url($img->path) }}"
                                     class="h-24 w-full object-cover">
                                @if($main_image_id == $img->id)
                                    <span class="absolute bottom-1 left-1 text-xs bg-[#B91C1C] px-2 py-0.5 rounded">
                                        Hauptbild
                                    </span>
                                @endif
                            </button>
                        @endforeach
                    </div>
                    <p class="text-xs text-[#BFBFBF] mt-2">Klicke ein Bild, um es als Hauptbild zu setzen.</p>
                </div>
            @endif

@foreach($existingImages as $img)
    <div class="relative border rounded-lg overflow-hidden
        {{ $main_image_id == $img->id ? 'border-[#B91C1C]' : 'border-[#444]' }}">

        <img src="{{ Storage::url($img->path) }}"
             class="h-24 w-full object-cover cursor-pointer"
             wire:click="setMainImage({{ $img->id }})">

        {{-- DELETE BUTTON --}}
        <button type="button"
                wire:click="deleteImage({{ $img->id }})"
                class="absolute top-1 right-1 bg-black/60 text-white
                       px-2 py-1 rounded-full text-xs hover:bg-black">
            ✕
        </button>

        @if($main_image_id == $img->id)
            <span class="absolute bottom-1 left-1 text-xs bg-[#B91C1C] px-2 py-0.5 rounded">
                Hauptbild
            </span>
        @endif
    </div>
@endforeach




        </div>
    </div>

    {{-- SAVE BUTTON --}}
    <div class="flex justify-end">
        <button wire:click="save"
                wire:loading.attr="disabled"
                class="px-6 py-3 rounded-lg bg-gradient-to-r from-[#B91C1C] to-[#8B0000] hover:opacity-90 transition font-bold">
            <span wire:loading.remove>Speichern</span>
            <span wire:loading>Speichere...</span>
        </button>
    </div>

</div>
