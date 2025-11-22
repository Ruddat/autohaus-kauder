<div id="termin">

    @if($success)
        <div class="bg-green-600 text-white p-4 rounded-lg mb-6">
            Vielen Dank! Wir melden uns schnellstmöglich bei Ihnen.
        </div>
    @endif

    <form wire:submit.prevent="submit"
          class="glass-effect rounded-2xl p-8 border border-[#333] space-y-6">

        <div>
            <label class="block mb-1">Name</label>
            <input type="text" wire:model="name" class="input-dark">
            @error('name') <span class="error">{{ $message }}</span> @enderror
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <div>
                <label class="block mb-1">E-Mail</label>
                <input type="email" wire:model="email" class="input-dark">
                @error('email') <span class="error">{{ $message }}</span> @enderror
            </div>

            <div>
                <label class="block mb-1">Telefon</label>
                <input type="text" wire:model="phone" class="input-dark">
                @error('phone') <span class="error">{{ $message }}</span> @enderror
            </div>
        </div>

        <div>
            <label class="block mb-1">Ihr Fahrzeug</label>
            <input type="text" wire:model="vehicle" class="input-dark" placeholder="z.B. Mercedes C200">
        </div>

        <div>
            <label class="block mb-1">Gewünschte Leistung</label>
            <select wire:model="service" class="input-dark">
                <option value="">Bitte wählen…</option>

                @foreach(\App\Models\ServiceItem::orderBy('sort_order')->get() as $s)
                    <option value="{{ $s->title }}">{{ $s->title }}</option>
                @endforeach

            </select>
            @error('service') <span class="error">{{ $message }}</span> @enderror
        </div>

        <div>
            <label class="block mb-1">Nachricht (optional)</label>
            <textarea wire:model="message" class="input-dark h-28"></textarea>
        </div>

        <button class="btn-primary w-full mt-4">
            <i class="fas fa-paper-plane mr-2"></i> Anfrage senden
        </button>

    </form>

</div>
