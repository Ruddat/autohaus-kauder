    <!-- Kontakt Section -->
    <section class="py-20 gradient-bg">
        <div class="container mx-auto px-4">
            <div class="max-w-6xl mx-auto">
                <div class="text-center mb-16">
                    <h2 class="text-3xl md:text-4xl font-bold mb-4">Anfrage / Kontakt</h2>
                    <div class="w-24 h-1 bg-gradient-to-r from-[#B91C1C] to-[#8B0000] mx-auto"></div>
                </div>

                <div class="grid grid-cols-1 lg:grid-cols-3 gap-12">
                    <!-- Contact Form -->
                    <div class="lg:col-span-2">
                        <div class="glass-effect rounded-2xl p-8 border border-[#333]">
                            <h3 class="text-2xl font-bold mb-6">Kontaktformular</h3>

                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                <div>
                                    <label class="block text-sm font-medium mb-2">Name</label>
                                    <input type="text" class="w-full bg-[#2D2D2D] border border-[#444] rounded-lg px-4 py-3 focus:outline-none focus:ring-2 focus:ring-[#B91C1C]">
                                </div>
                                <div>
                                    <label class="block text-sm font-medium mb-2">E-Mail</label>
                                    <input type="email" class="w-full bg-[#2D2D2D] border border-[#444] rounded-lg px-4 py-3 focus:outline-none focus:ring-2 focus:ring-[#B91C1C]">
                                </div>
                                <div>
                                    <label class="block text-sm font-medium mb-2">Telefonnummer</label>
                                    <input type="tel" class="w-full bg-[#2D2D2D] border border-[#444] rounded-lg px-4 py-3 focus:outline-none focus:ring-2 focus:ring-[#B91C1C]">
                                </div>
                                <div>
                                    <label class="block text-sm font-medium mb-2">Fahrzeug-Kennzeichen</label>
                                    <input type="text" class="w-full bg-[#2D2D2D] border border-[#444] rounded-lg px-4 py-3 focus:outline-none focus:ring-2 focus:ring-[#B91C1C]">
                                </div>
                                <div>
                                    <label class="block text-sm font-medium mb-2">Kaufdatum</label>
                                    <input type="date" class="w-full bg-[#2D2D2D] border border-[#444] rounded-lg px-4 py-3 focus:outline-none focus:ring-2 focus:ring-[#B91C1C]">
                                </div>
                                <div>
                                    <label class="block text-sm font-medium mb-2">Marke / Modell</label>
                                    <input type="text" class="w-full bg-[#2D2D2D] border border-[#444] rounded-lg px-4 py-3 focus:outline-none focus:ring-2 focus:ring-[#B91C1C]">
                                </div>
                            </div>

                            <div class="mt-6">
                                <label class="block text-sm font-medium mb-2">Beschreibung der Reklamation</label>
                                <textarea rows="4" class="w-full bg-[#2D2D2D] border border-[#444] rounded-lg px-4 py-3 focus:outline-none focus:ring-2 focus:ring-[#B91C1C]"></textarea>
                            </div>

                            <div class="mt-6">
                                <label class="block text-sm font-medium mb-2">Upload</label>
                                <div class="flex items-center justify-center w-full bg-[#2D2D2D] border-2 border-dashed border-[#444] rounded-lg p-6 cursor-pointer hover:border-[#BFBFBF] transition">
                                    <div class="text-center">
                                        <i class="fas fa-cloud-upload-alt text-2xl text-[#BFBFBF] mb-2"></i>
                                        <p class="text-sm text-[#BFBFBF]">Dateien hierher ziehen oder klicken zum Hochladen</p>
                                    </div>
                                </div>
                            </div>

                            <div class="mt-6 flex items-center">
                                <input type="checkbox" class="w-4 h-4 bg-[#2D2D2D] border border-[#444] rounded focus:ring-[#B91C1C]">
                                <label class="ml-2 text-sm">Ich akzeptiere die Datenschutzerklärung</label>
                            </div>

                            <div class="mt-8">
                                <button class="w-full bg-gradient-to-r from-[#B91C1C] to-[#8B0000] hover:from-[#8B0000] hover:to-[#B91C1C] text-white py-4 rounded-lg font-bold text-lg transition-all shadow-lg">
                                    Senden <i class="fas fa-paper-plane ml-2"></i>
                                </button>
                            </div>
                        </div>
                    </div>

                    <!-- Contact Info -->
                    <div>
                        <div class="glass-effect rounded-2xl p-8 border border-[#333] h-full">
                            <h3 class="text-2xl font-bold mb-6">Kontaktinformationen</h3>

                            <div class="space-y-6">
                                <div class="flex items-start">
                                    <div class="bg-[#2D2D2D] p-3 rounded-lg mr-4">
                                        <i class="fas fa-map-marker-alt text-[#B91C1C]"></i>
                                    </div>
                                    <div>
                                        <h4 class="font-bold">Adresse</h4>
                                        <p class="text-[#BFBFBF]">{{ Settings::get('company.address') }}<br>{{ Settings::get('company.zip_city') }}</p>
                                    </div>
                                </div>

                                <div class="flex items-start">
                                    <div class="bg-[#2D2D2D] p-3 rounded-lg mr-4">
                                        <i class="fas fa-phone text-[#B91C1C]"></i>
                                    </div>
                                    <div>
                                        <h4 class="font-bold">Telefon</h4>
                                        <p class="text-[#BFBFBF]">{{ Settings::get('company.phone') }}</p>
                                    </div>
                                </div>

                                <div class="flex items-start">
                                    <div class="bg-[#2D2D2D] p-3 rounded-lg mr-4">
                                        <i class="fas fa-envelope text-[#B91C1C]"></i>
                                    </div>
                                    <div>
                                        <h4 class="font-bold">E-Mail</h4>
                                        <p class="text-[#BFBFBF]">{{ Settings::get('company.email') }}</p>
                                    </div>
                                </div>

@php
    $sales = opening_week_grouped('sales');
    $work = opening_week_grouped('workshop');
@endphp

<div class="flex items-start">
    <div class="bg-[#2D2D2D] p-3 rounded-lg mr-4">
        <i class="fas fa-clock text-[#B91C1C]"></i>
    </div>

    <div>
        <h4 class="font-bold mb-2">Öffnungszeiten – Verkauf</h4>
        <p class="text-[#BFBFBF] leading-5">
            @foreach($sales as $row)
                <strong>
                    {{-- Von - Bis Tag --}}
                    @php
                        $from = short_day($row['from']);
                        $to = short_day($row['to']);
                    @endphp

                    @if($from === $to)
                        {{ $from }}:
                    @else
                        {{ $from }}–{{ $to }}:
                    @endif
                </strong>

                {{-- Uhrzeit oder geschlossen --}}
                @if($row['time'] === 'closed')
                    <span class="text-red-400">geschlossen</span>
                @else
                    {{ $row['time'] }}
                @endif

                <br>
            @endforeach
        </p>

        <h4 class="font-bold mt-4 mb-2">Öffnungszeiten – Werkstatt</h4>
        <p class="text-[#BFBFBF] leading-5">
            @foreach($work as $row)
                <strong>
                    @php
                        $from = short_day($row['from']);
                        $to = short_day($row['to']);
                    @endphp

                    @if($from === $to)
                        {{ $from }}:
                    @else
                        {{ $from }}–{{ $to }}:
                    @endif
                </strong>

                @if($row['time'] === 'closed')
                    <span class="text-red-400">geschlossen</span>
                @else
                    {{ $row['time'] }}
                @endif

                <br>
            @endforeach
        </p>
    </div>
</div>


                            </div>

                            <div class="mt-8 pt-6 border-t border-[#333]">
                                <h4 class="font-bold mb-4">Folgen Sie uns</h4>
                                <div class="flex space-x-4">
                                    <a href="#" class="bg-[#2D2D2D] hover:bg-[#BFBFBF] hover:text-[#1E1E1E] w-10 h-10 rounded-full flex items-center justify-center transition">
                                        <i class="fab fa-facebook-f"></i>
                                    </a>
                                    <a href="#" class="bg-[#2D2D2D] hover:bg-[#BFBFBF] hover:text-[#1E1E1E] w-10 h-10 rounded-full flex items-center justify-center transition">
                                        <i class="fab fa-instagram"></i>
                                    </a>
                                    <a href="#" class="bg-[#2D2D2D] hover:bg-[#BFBFBF] hover:text-[#1E1E1E] w-10 h-10 rounded-full flex items-center justify-center transition">
                                        <i class="fab fa-whatsapp"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
