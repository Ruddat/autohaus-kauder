<div>

    @if($success)
        <div class="bg-green-600 text-white p-4 rounded-lg mb-6 font-medium">
            ✔ Vielen Dank! Wir melden uns schnellstmöglich bei Ihnen.
        </div>
    @endif

    <form wire:submit.prevent="submit">

        <div class="glass-effect rounded-2xl p-8 border border-[#333]">
            <h3 class="text-2xl font-bold mb-6">Service-Anfrage</h3>

            <div class="space-y-6">

                {{-- Name + Telefon --}}
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label class="block text-sm font-medium mb-2">Name *</label>
                        <input type="text" wire:model="name"
                               class="w-full bg-[#2D2D2D] border border-[#444] rounded-lg px-4 py-3 focus:ring-[#B91C1C]">
                        @error('name') <p class="text-red-400 text-sm">{{ $message }}</p> @enderror
                    </div>
                    <div>
                        <label class="block text-sm font-medium mb-2">Telefon *</label>
                        <input type="tel" wire:model="phone"
                               class="w-full bg-[#2D2D2D] border border-[#444] rounded-lg px-4 py-3 focus:ring-[#B91C1C]">
                        @error('phone') <p class="text-red-400 text-sm">{{ $message }}</p> @enderror
                    </div>
                </div>

                {{-- Email --}}
                <div>
                    <label class="block text-sm font-medium mb-2">E-Mail *</label>
                    <input type="email" wire:model="email"
                           class="w-full bg-[#2D2D2D] border border-[#444] rounded-lg px-4 py-3 focus:ring-[#B91C1C]">
                    @error('email') <p class="text-red-400 text-sm">{{ $message }}</p> @enderror
                </div>

                {{-- Marke + Modell --}}
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label class="block text-sm font-medium mb-2">Fahrzeugmarke</label>
                        <select wire:model="brand"
                                class="w-full bg-[#2D2D2D] border border-[#444] rounded-lg px-4 py-3 focus:ring-[#B91C1C]">
                            <option value="">Bitte wählen…</option>
                            @foreach($brands as $b)
                                <option value="{{ $b }}">{{ $b }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div>
                        <label class="block text-sm font-medium mb-2">Modell</label>
                        <input type="text" wire:model="model"
                               class="w-full bg-[#2D2D2D] border border-[#444] rounded-lg px-4 py-3">
                    </div>
                </div>

                {{-- Kennzeichen + Baujahr --}}
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label class="block text-sm font-medium mb-2">Kennzeichen</label>
                        <input type="text" wire:model="plate"
                               class="w-full bg-[#2D2D2D] border border-[#444] rounded-lg px-4 py-3">
                    </div>
                    <div>
                        <label class="block text-sm font-medium mb-2">Baujahr</label>
                        <input type="number" wire:model="year"
                               class="w-full bg-[#2D2D2D] border border-[#444] rounded-lg px-4 py-3">
                    </div>
                </div>

                {{-- Service-Auswahl (aus DB!) --}}
                <div>
                    <label class="block text-sm font-medium mb-2">Gewünschter Service *</label>
                    <select wire:model="service"
                            class="w-full bg-[#2D2D2D] border border-[#444] rounded-lg px-4 py-3 focus:ring-[#B91C1C]">
                        <option value="">Bitte wählen…</option>
                        @foreach($services as $s)
                            <option value="{{ $s->title }}">{{ $s->title }}</option>
                        @endforeach
                        <option value="Andere">Andere</option>
                    </select>
                    @error('service') <p class="text-red-400 text-sm">{{ $message }}</p> @enderror
                </div>

                {{-- Beschreibung --}}
                <div>
                    <label class="block text-sm font-medium mb-2">Beschreibung des Problems / Anliegens</label>
                    <textarea rows="4" wire:model="message"
                              class="w-full bg-[#2D2D2D] border border-[#444] rounded-lg px-4 py-3 focus:ring-[#B91C1C]"></textarea>
                </div>

                {{-- Privacy --}}
                <div class="flex items-center">
                    <input type="checkbox" wire:model="privacy"
                           class="w-4 h-4 bg-[#2D2D2D] border border-[#444] rounded focus:ring-[#B91C1C]">
                    <label class="ml-2 text-sm">Ich akzeptiere die Datenschutzerklärung *</label>
                </div>
                @error('privacy') <p class="text-red-400 text-sm">{{ $message }}</p> @enderror

                {{-- Button --}}
                <button type="submit"
                        class="w-full bg-gradient-to-r from-[#B91C1C] to-[#8B0000] hover:from-[#8B0000] hover:to-[#B91C1C] text-white py-4 rounded-lg font-bold text-lg transition-all shadow-lg">
                    <i class="fas fa-calendar-check mr-2"></i> Termin anfragen
                </button>

            </div>
        </div>

    </form>

</div>
