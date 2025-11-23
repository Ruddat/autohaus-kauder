<div class="space-y-10">

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
    <h2 class="text-xl font-bold mb-4">Stammdaten</h2>
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



<h2 class="text-xl font-bold mb-4">Technische Daten</h2>

<div class="glass-effect rounded-xl p-6 border border-[#333] space-y-8">


    {{-- 🔥 LEISTUNG --}}
    <div>
        <label class="text-sm text-[#BFBFBF] font-semibold mb-2 block">Leistung</label>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">

            {{-- kW --}}
            <div class="relative">
                <label class="text-xs text-[#888]">kW *</label>
                <input type="number" wire:model.live="kw"
                       class="w-full bg-[#2D2D2D] border border-[#444] rounded-lg px-10 py-3
                       focus:border-[#B91C1C] transition duration-300">

                <span class="absolute left-3 top-9 text-[#B91C1C]">⚡</span>
                <span class="absolute right-3 top-9 text-xs text-[#888]" title="kW eingeben – PS berechnet automatisch">ⓘ</span>
            </div>

            {{-- PS automatisch --}}
            <div class="relative">
                <label class="text-xs text-[#888]">PS (automatisch)</label>
                <input type="number" wire:model="hp" readonly
                       class="w-full bg-[#1E1E1E] border border-[#444] rounded-lg px-10 py-3
                       opacity-70 cursor-not-allowed
                       transition-all duration-500"
                       @if($hp) style="box-shadow:0 0 10px #b91c1c55;" @endif>

                <span class="absolute left-3 top-9 text-[#BFBFBF]">🏎️</span>
                @if($hp)
                    <span class="absolute right-3 top-9 bg-[#B91C1C] text-white text-[10px] px-2 py-1 rounded-full">
                        AUTO
                    </span>
                @endif
            </div>

        </div>

        {{-- Live Text --}}
        @if($kw)
            <div class="mt-2 text-xs text-[#BFBFBF]">
                {{ $kw }} kW entsprechen etwa
                <span class="text-[#B91C1C] font-bold">{{ $hp }} PS</span>.
            </div>
        @endif

        {{-- Motor Kategorie --}}
        @php
            $cat = null;
            if ($hp < 100) $cat = 'Eco';
            elseif ($hp < 150) $cat = 'Comfort';
            elseif ($hp < 250) $cat = 'Sport';
            else $cat = 'Performance';
        @endphp

        @if($hp)
            <div class="mt-3 text-xs text-[#BFBFBF]">
                Motor-Kategorie:
                <span class="
                    @if($cat == 'Eco') text-green-400
                    @elseif($cat == 'Comfort') text-blue-400
                    @elseif($cat == 'Sport') text-yellow-400
                    @else text-red-400 @endif
                    font-bold
                ">
                    {{ $cat }}
                </span>
            </div>
        @endif
    </div>



    {{-- 🔥 HUBRAUM / TÜREN / SITZE --}}
    <div class="grid grid-cols-1 md:grid-cols-3 gap-4">

        <div>
            <label class="text-sm text-[#BFBFBF] font-medium">Hubraum (ccm)</label>
            <input type="number" wire:model="ccm"
                   class="w-full bg-[#2D2D2D] border border-[#444] rounded-lg px-3 py-3">
        </div>

        <div>
            <label class="text-sm text-[#BFBFBF] font-medium">Türen</label>
            <input type="number" wire:model="doors"
                   class="w-full bg-[#2D2D2D] border border-[#444] rounded-lg px-3 py-3">
        </div>

        <div>
            <label class="text-sm text-[#BFBFBF] font-medium">Sitze</label>
            <input type="number" wire:model="seats"
                   class="w-full bg-[#2D2D2D] border border-[#444] rounded-lg px-3 py-3">
        </div>

        <div>
            <label class="text-sm text-[#BFBFBF] font-medium">Karosserie</label>
            <input type="text" wire:model="body_type"
                   class="w-full bg-[#2D2D2D] border border-[#444] rounded-lg px-3 py-3">
        </div>

    </div>



    {{-- 🔥 VERBRAUCH --}}
    <div>
        <label class="text-sm text-[#BFBFBF] font-semibold mb-2 block">Verbrauch (WLTP)</label>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-4">

            {{-- Stadt --}}
            <div class="relative">
                <label class="text-xs text-[#888]">Stadt</label>
                <input type="text" wire:model.change="consumption_city"
                       placeholder="z. B. 8,1 l/100km"
                       class="w-full bg-[#2D2D2D] border border-[#444] rounded-lg px-10 py-3">
                <span class="absolute left-3 top-9 text-[#BFBFBF]">🏙️</span>
            </div>

            {{-- Land --}}
            <div class="relative">
                <label class="text-xs text-[#888]">Land</label>
                <input type="text" wire:model.change="consumption_country"
                       placeholder="z. B. 5,9 l/100km"
                       class="w-full bg-[#2D2D2D] border border-[#444] rounded-lg px-10 py-3">
                <span class="absolute left-3 top-9 text-[#BFBFBF]">🌄</span>
            </div>

            {{-- Kombiniert --}}
            <div class="relative">
                <label class="text-xs text-[#888]">Kombiniert</label>
                <input type="text" wire:model="consumption"
                       placeholder="z. B. 6,8 l/100km"
                       class="w-full bg-[#2D2D2D] border border-[#444] rounded-lg px-10 py-3">
                <span class="absolute left-3 top-9 text-[#BFBFBF]">🔄</span>
            </div>

        </div>
    </div>


{{-- 🔥 CO₂ + UMWELTPLAKETTE --}}
<div>
    <label class="text-sm text-[#BFBFBF] font-semibold mb-2 block">CO₂ & Umweltplakette</label>

    <div class="grid grid-cols-1 md:grid-cols-3 gap-4">

        {{-- CO₂ Eingabe --}}
        <div class="relative">
            <label class="text-xs text-[#888]">CO₂-Ausstoß (g/km)</label>

            <div class="w-full bg-[#2D2D2D] border border-[#444] rounded-lg py-3 px-10 relative">

                {{-- Farbiges Icon je nach CO₂ --}}
                <span class="absolute left-3 top-[14px] text-lg">
                    @if($eco_class === 'green')
                        🟢
                    @elseif($eco_class === 'yellow')
                        🟡
                    @elseif($eco_class === 'red')
                        🔴
                    @else
                        🌍
                    @endif
                </span>

                <input type="number"
                       wire:model.live="co2"
                       placeholder="z. B. 120"
                       class="bg-transparent outline-none w-full text-white pl-2">
            </div>
        </div>

        {{-- PLAKETTE AUTOMATISCH --}}
        <div>
            <label class="text-xs text-[#888]">Plakette</label>

            <div class="px-10 py-3 rounded-lg border border-[#444] bg-[#1E1E1E] flex items-center relative">

                <span class="absolute left-3 top-[14px] text-lg">
                    @if($eco_class === 'green')
                        🟢
                    @elseif($eco_class === 'yellow')
                        🟡
                    @elseif($eco_class === 'red')
                        🔴
                    @endif
                </span>

                @if($eco_class === 'green')
                    <span class="text-green-400 font-semibold">Grün</span>
                @elseif($eco_class === 'yellow')
                    <span class="text-yellow-400 font-semibold">Gelb</span>
                @elseif($eco_class === 'red')
                    <span class="text-red-400 font-semibold">Rot</span>
                @else
                    <span class="text-gray-400">–</span>
                @endif
            </div>
        </div>

        {{-- Norm --}}
        <div>
            <label class="text-xs text-[#888]">Messnorm</label>
            <select wire:model="co2_norm"
                    class="w-full bg-[#2D2D2D] border border-[#444] rounded-lg px-3 py-3">
                <option value="WLTP">WLTP</option>
                <option value="NEFZ">NEFZ</option>
            </select>
        </div>

    </div>
</div>



</div>



{{-- Farben & Innenraum --}}

    <h2 class="text-xl font-bold mb-4">Farben & Innenraum</h2>

<div class="grid grid-cols-1 md:grid-cols-3 gap-4 mt-4">

    <div>
        <label class="text-sm text-[#BFBFBF]">Farbe außen</label>
        <input type="text" wire:model="color"
               class="w-full bg-[#2D2D2D] border border-[#444] rounded-lg px-3 py-2">
    </div>

    <div>
        <label class="text-sm text-[#BFBFBF]">Farbcode</label>
        <input type="text" wire:model="color_code"
               class="w-full bg-[#2D2D2D] border border-[#444] rounded-lg px-3 py-2">
    </div>

    <div>
        <label class="text-sm text-[#BFBFBF]">Innenraum</label>
        <input type="text" wire:model="interior"
               class="w-full bg-[#2D2D2D] border border-[#444] rounded-lg px-3 py-2">
    </div>

    <div>
        <label class="text-sm text-[#BFBFBF]">Innenfarbe</label>
        <input type="text" wire:model="interior_color"
               class="w-full bg-[#2D2D2D] border border-[#444] rounded-lg px-3 py-2">
    </div>

    <div>
        <label class="text-sm text-[#BFBFBF]">Innenmaterial</label>
        <input type="text" wire:model="interior_material"
               class="w-full bg-[#2D2D2D] border border-[#444] rounded-lg px-3 py-2">
    </div>

</div>


            {{-- Ausstattungs-Tags --}}
<div class="space-y-3">
    <label class="text-sm text-[#BFBFBF] font-semibold">Ausstattung</label>

    {{-- Kategorien --}}
    <div class="flex flex-wrap gap-2">

        <button type="button"
                wire:click="setFeatureCategory('Alle')"
                class="text-xs px-3 py-1 rounded-full border
                       {{ $featureCategory==='Alle'
                          ? 'bg-[#B91C1C] text-white border-[#B91C1C]'
                          : 'border-[#444] text-[#BFBFBF] hover:bg-[#333]' }}">
            Alle
        </button>

        @foreach($allFeatureCategories as $cat)
            <button type="button"
                    wire:click="setFeatureCategory('{{ $cat }}')"
                    class="text-xs px-3 py-1 rounded-full border
                           {{ $featureCategory===$cat
                              ? 'bg-[#B91C1C] text-white border-[#B91C1C]'
                              : 'border-[#444] text-[#BFBFBF] hover:bg-[#333]' }}">
                {{ $cat }}
            </button>
        @endforeach
    </div>

    {{-- Suchfeld --}}
    <div class="relative">
        <input type="text"
               wire:model.live="featureSearch"
               wire:keydown.enter.prevent="addFeature"
               placeholder="Ausstattung suchen oder neu eingeben…"
               class="w-full bg-[#2D2D2D] border border-[#444] rounded-lg px-3 py-2">

        @if($featureSuggestions)
            <div class="absolute z-30 w-full bg-[#1E1E1E] border border-[#333] mt-1 rounded-lg">
                @foreach($featureSuggestions as $s)
                    <button type="button"
                            wire:click="addFeature('{{ $s->name }}')"
                            class="block w-full text-left px-3 py-1 hover:bg-[#333]">
                        {{ $s->name }}
                    </button>
                @endforeach
            </div>
        @endif
    </div>

    {{-- Quick Picks --}}
    <div class="flex flex-wrap gap-2">
        @foreach($quickFeatures as $qf)
            <button type="button"
                    wire:click="addFeature('{{ $qf->name }}')"
                    class="text-xs px-2 py-1 rounded-full border
                           {{ in_array($qf->slug, $features)
                              ? 'bg-[#B91C1C]/30 border-[#B91C1C]'
                              : 'border-[#444] text-[#BFBFBF] hover:border-[#B91C1C]' }}">
                {{ $qf->name }}
            </button>
        @endforeach
    </div>

    {{-- Ausgewählte Tags --}}
    <div class="flex flex-wrap gap-2 pt-2">
        @foreach($features as $slug)
            @php
                $f = \App\Models\Feature::where('slug', $slug)->first();
            @endphp

            @if($f)
                <span class="px-2 py-1 text-xs bg-[#B91C1C]/20 border border-[#B91C1C]/30
                             text-[#ffb3b3] rounded-full flex items-center gap-1">
                    {{ $f->name }}
                    <button type="button" wire:click="removeFeature('{{ $slug }}')" class="text-red-300">
                        ✕
                    </button>
                </span>
            @endif
        @endforeach
    </div>
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

{{-- Kategorie --}}
<div>
    <label class="text-sm text-[#BFBFBF]">Kategorie</label>
    <input type="text" wire:model="category"
           placeholder="SUV, Limousine, Kombi …"
           class="w-full bg-[#2D2D2D] border border-[#444] rounded-lg px-3 py-2">
</div>

{{-- Badge --}}

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
