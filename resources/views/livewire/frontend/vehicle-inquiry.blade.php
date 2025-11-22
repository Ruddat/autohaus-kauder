<div class="sticky-sidebar">

    @if ($success)
        <div class="glass-effect rounded-2xl p-6 border border-green-600 text-green-400 mb-8">
            <strong>Vielen Dank!</strong><br>
            Ihre Anfrage wurde erfolgreich gesendet.
        </div>
    @endif

    <!-- Anfrageformular -->
    <div class="glass-effect rounded-2xl p-8 border border-[#333] mb-8">
        <h3 class="text-2xl font-bold mb-6">Fahrzeug anfragen</h3>

        <div class="space-y-4">

            <!-- Name -->
            <div>
                <label class="block text-sm font-medium mb-2">Ihr Name</label>
                <input type="text" wire:model="name"
                    class="w-full bg-[#2D2D2D] border border-[#444] rounded-lg px-4 py-3 focus:outline-none focus:ring-2 focus:ring-[#B91C1C]">

                @error('name')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- E-Mail -->
            <div>
                <label class="block text-sm font-medium mb-2">E-Mail</label>
                <input type="email" wire:model="email"
                    class="w-full bg-[#2D2D2D] border border-[#444] rounded-lg px-4 py-3 focus:outline-none focus:ring-2 focus:ring-[#B91C1C]">

                @error('email')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Telefon -->
            <div>
                <label class="block text-sm font-medium mb-2">Telefon</label>
                <input type="tel" wire:model="phone"
                    class="w-full bg-[#2D2D2D] border border-[#444] rounded-lg px-4 py-3 focus:outline-none focus:ring-2 focus:ring-[#B91C1C]">

                @error('phone')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Nachricht -->
            <div>
                <label class="block text-sm font-medium mb-2">Nachricht</label>
                <textarea rows="4" wire:model="message"
                    class="w-full bg-[#2D2D2D] border border-[#444] rounded-lg px-4 py-3 focus:outline-none focus:ring-2 focus:ring-[#B91C1C]">
                </textarea>

                @error('message')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Datenschutz -->
            <div class="flex items-center">
                <input type="checkbox" wire:model="privacy"
                    class="w-4 h-4 bg-[#2D2D2D] border border-[#444] rounded focus:ring-[#B91C1C]">
                <label class="ml-2 text-sm">Ich akzeptiere die Datenschutzerklärung</label>
            </div>

            @error('privacy')
                <p class="text-red-500 text-sm">{{ $message }}</p>
            @enderror

            <!-- Submit -->
            <button wire:click="submit"
                class="w-full bg-gradient-to-r from-[#B91C1C] to-[#8B0000] hover:from-[#8B0000] hover:to-[#B91C1C] text-white py-4 rounded-lg font-bold text-lg transition-all shadow-lg mt-4">
                <i class="fas fa-paper-plane mr-2"></i> Jetzt anfragen
            </button>

        </div>
    </div>

    <!-- Quick Info -->
    <div class="glass-effect rounded-2xl p-6 border border-[#333]">
        <h3 class="text-xl font-bold mb-4">Schnell-Info</h3>

        <div class="space-y-3 text-sm">
            <div class="flex justify-between">
                <span class="text-[#BFBFBF]">Fahrzeugnummer</span>
                <span class="font-medium">FZ-{{ $vehicleId }}</span>
            </div>

            <div class="flex justify-between">
                <span class="text-[#BFBFBF]">Standort</span>
                <span class="font-medium">Peine</span>
            </div>

            <div class="flex justify-between">
                <span class="text-[#BFBFBF]">Verfügbarkeit</span>
                <span class="font-medium text-green-500">Sofort verfügbar</span>
            </div>

            <div class="flex justify-between">
                <span class="text-[#BFBFBF]">Garantie</span>
                <span class="font-medium">12 Monate</span>
            </div>
        </div>

        <div class="mt-6 pt-6 border-t border-[#333]">
            <button class="w-full bg-transparent border-2 border-[#BFBFBF] hover:bg-[#BFBFBF] hover:text-[#1E1E1E] text-white py-3 rounded-lg font-medium transition-all flex items-center justify-center">
                <i class="fas fa-phone mr-2"></i> Direkt anrufen
            </button>

            <button class="w-full mt-3 bg-transparent border-2 border-[#BFBFBF] hover:bg-[#BFBFBF] hover:text-[#1E1E1E] text-white py-3 rounded-lg font-medium transition-all flex items-center justify-center">
                <i class="fas fa-calendar mr-2"></i> Probefahrt vereinbaren
            </button>
        </div>
    </div>

</div>
