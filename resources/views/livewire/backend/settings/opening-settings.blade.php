<div class="space-y-6">

    {{-- Tabs --}}
    <div class="flex flex-wrap gap-2">
        <button wire:click="$set('tab','sales')"
            class="px-4 py-2 rounded-lg border border-[#333] glass-effect
            {{ $tab==='sales' ? 'bg-[#B91C1C] text-white' : 'text-[#BFBFBF]' }}">
            Verkauf
        </button>

        <button wire:click="$set('tab','workshop')"
            class="px-4 py-2 rounded-lg border border-[#333] glass-effect
            {{ $tab==='workshop' ? 'bg-[#B91C1C] text-white' : 'text-[#BFBFBF]' }}">
            Werkstatt
        </button>

        <button wire:click="$set('tab','exceptions')"
            class="px-4 py-2 rounded-lg border border-[#333] glass-effect
            {{ $tab==='exceptions' ? 'bg-[#B91C1C] text-white' : 'text-[#BFBFBF]' }}">
            Sondertage
        </button>
    </div>

    {{-- SALES TAB --}}
    @if($tab==='sales')
        <div class="glass-effect p-8 rounded-2xl border border-[#333]">
            <h2 class="text-2xl font-bold mb-6 flex items-center">
                <i class="fas fa-clock text-[#B91C1C] mr-3"></i>
                Öffnungszeiten Verkauf
            </h2>

            <table class="w-full">
                @foreach($salesHours as $i => $day)
                    <tr class="border-b border-[#333]">
                        <td class="py-3 font-medium">
                            {{ \App\Models\OpeningHour::weekdayName($day['weekday']) }}
                        </td>

                        <td class="py-3">
                            <input type="time" wire:model="salesHours.{{ $i }}.opens"
                                   class="bg-[#2D2D2D] border border-[#444] rounded px-3 py-1"
                                   @disabled($day['is_closed'])>
                        </td>

                        <td class="py-3">
                            <input type="time" wire:model="salesHours.{{ $i }}.closes"
                                   class="bg-[#2D2D2D] border border-[#444] rounded px-3 py-1"
                                   @disabled($day['is_closed'])>
                        </td>

                        <td class="py-3">
                            <label class="flex items-center space-x-2">
                                <input type="checkbox" wire:model="salesHours.{{ $i }}.is_closed">
                                <span class="text-sm text-[#BFBFBF]">geschlossen</span>
                            </label>
                        </td>
                    </tr>
                @endforeach
            </table>

            <button wire:click="saveSales"
                class="mt-6 w-full bg-gradient-to-r from-[#B91C1C] to-[#8B0000]
                hover:from-[#8B0000] hover:to-[#B91C1C] text-white py-3 rounded-lg font-medium transition">
                Speichern
            </button>
        </div>
    @endif

    {{-- WORKSHOP TAB --}}
    @if($tab==='workshop')
        <div class="glass-effect p-8 rounded-2xl border border-[#333]">
            <h2 class="text-2xl font-bold mb-6 flex items-center">
                <i class="fas fa-tools text-[#B91C1C] mr-3"></i>
                Öffnungszeiten Werkstatt
            </h2>

            <table class="w-full">
                @foreach($workshopHours as $i => $day)
                    <tr class="border-b border-[#333]">
                        <td class="py-3 font-medium">
                            {{ \App\Models\OpeningHour::weekdayName($day['weekday']) }}
                        </td>

                        <td class="py-3">
                            <input type="time" wire:model="workshopHours.{{ $i }}.opens"
                                   class="bg-[#2D2D2D] border border-[#444] rounded px-3 py-1"
                                   @disabled($day['is_closed'])>
                        </td>

                        <td class="py-3">
                            <input type="time" wire:model="workshopHours.{{ $i }}.closes"
                                   class="bg-[#2D2D2D] border border-[#444] rounded px-3 py-1"
                                   @disabled($day['is_closed'])>
                        </td>

                        <td class="py-3">
                            <label class="flex items-center space-x-2">
                                <input type="checkbox" wire:model="workshopHours.{{ $i }}.is_closed">
                                <span class="text-sm text-[#BFBFBF]">geschlossen</span>
                            </label>
                        </td>
                    </tr>
                @endforeach
            </table>

            <button wire:click="saveWorkshop"
                class="mt-6 w-full bg-gradient-to-r from-[#B91C1C] to-[#8B0000]
                hover:from-[#8B0000] hover:to-[#B91C1C] text-white py-3 rounded-lg font-medium transition">
                Speichern
            </button>
        </div>
    @endif

    {{-- EXCEPTIONS TAB --}}
    @if($tab==='exceptions')
        <div class="glass-effect p-8 rounded-2xl border border-[#333]">
            <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-3 mb-6">
                <h2 class="text-2xl font-bold flex items-center">
                    <i class="fas fa-calendar text-[#B91C1C] mr-3"></i>
                    Sonderöffnungszeiten
                </h2>

                <div class="flex gap-2">
                    <button wire:click="openExceptionModal('sales')"
                        class="px-4 py-2 rounded-lg bg-[#B91C1C] text-white">
                        Sondertag Verkauf
                    </button>

                    <button wire:click="openExceptionModal('workshop')"
                        class="px-4 py-2 rounded-lg bg-[#2D2D2D] text-white border border-[#444]">
                        Sondertag Werkstatt
                    </button>
                </div>
            </div>

            <div class="space-y-3">
                @forelse($exceptions as $ex)
                    <div class="flex justify-between items-start p-4 bg-[#2D2D2D] rounded-lg border border-[#333]">
                        <div>
                            <div class="font-medium">
                                {{ $ex['date'] }}
                                <span class="text-xs ml-2 px-2 py-1 rounded bg-black/40">
                                    {{ $ex['department']==='sales' ? 'Verkauf' : 'Werkstatt' }}
                                </span>
                            </div>

                            <div class="text-sm text-[#BFBFBF] mt-1">
                                {{ $ex['is_closed'] ? 'Geschlossen' : ($ex['opens'].' – '.$ex['closes']) }}
                            </div>

                            @if($ex['note'])
                                <div class="text-xs text-[#888] mt-1">{{ $ex['note'] }}</div>
                            @endif
                        </div>

                        <button wire:click="deleteException({{ $ex['id'] }})"
                            class="text-red-400 hover:text-red-300">
                            <i class="fas fa-trash"></i>
                        </button>
                    </div>
                @empty
                    <div class="text-[#BFBFBF] text-sm">Keine Sondertage vorhanden.</div>
                @endforelse
            </div>
        </div>

        {{-- Modal --}}
        @if($showExceptionModal)
            <div class="fixed inset-0 bg-black/60 flex items-center justify-center z-50">
                <div class="glass-effect p-6 rounded-2xl border border-[#333] w-full max-w-lg">
                    <h3 class="text-xl font-bold mb-4">Neuer Sondertag</h3>

                    <div class="space-y-3">
                        <div>
                            <label class="text-sm text-[#BFBFBF]">Bereich</label>
                            <select wire:model="exceptionForm.department"
                                    class="w-full bg-[#2D2D2D] border border-[#444] rounded px-3 py-2">
                                <option value="sales">Verkauf</option>
                                <option value="workshop">Werkstatt</option>
                            </select>
                        </div>

                        <div>
                            <label class="text-sm text-[#BFBFBF]">Datum</label>
                            <input type="date" wire:model="exceptionForm.date"
                                   class="w-full bg-[#2D2D2D] border border-[#444] rounded px-3 py-2">
                        </div>

                        <div class="grid grid-cols-2 gap-3">
                            <div>
                                <label class="text-sm text-[#BFBFBF]">Öffnet</label>
                                <input type="time" wire:model="exceptionForm.opens"
                                       class="w-full bg-[#2D2D2D] border border-[#444] rounded px-3 py-2"
                                       @disabled($exceptionForm['is_closed'])>
                            </div>
                            <div>
                                <label class="text-sm text-[#BFBFBF]">Schließt</label>
                                <input type="time" wire:model="exceptionForm.closes"
                                       class="w-full bg-[#2D2D2D] border border-[#444] rounded px-3 py-2"
                                       @disabled($exceptionForm['is_closed'])>
                            </div>
                        </div>

                        <label class="flex items-center space-x-2">
                            <input type="checkbox" wire:model="exceptionForm.is_closed">
                            <span class="text-sm text-[#BFBFBF]">komplett geschlossen</span>
                        </label>

                        <div>
                            <label class="text-sm text-[#BFBFBF]">Notiz (optional)</label>
                            <input type="text" wire:model="exceptionForm.note"
                                   class="w-full bg-[#2D2D2D] border border-[#444] rounded px-3 py-2"
                                   placeholder="z.B. Feiertag, Event, Inventur">
                        </div>
                    </div>

                    <div class="mt-6 flex justify-end gap-2">
                        <button wire:click="$set('showExceptionModal',false)"
                                class="px-4 py-2 rounded bg-[#2D2D2D] border border-[#444]">
                            Abbrechen
                        </button>
                        <button wire:click="saveException"
                                class="px-4 py-2 rounded bg-[#B91C1C] text-white">
                            Speichern
                        </button>
                    </div>
                </div>
            </div>
        @endif
    @endif

    {{-- Toast --}}
    <script>
        document.addEventListener('livewire:init', () => {
            Livewire.on('saved', () => {
                // simple mini toast
                const t = document.createElement('div');
                t.innerText = 'Gespeichert ✅';
                t.className = 'fixed bottom-6 right-6 bg-black text-white px-4 py-2 rounded-lg border border-[#333] z-[9999]';
                document.body.appendChild(t);
                setTimeout(()=>t.remove(), 1800);
            });
        });
    </script>

</div>
