    <!-- Werkstatt-Formular -->
    <section class="py-20 gradient-bg">
        <div class="container mx-auto px-4">
            <div class="max-w-6xl mx-auto">
                <div class="text-center mb-16">
                    <h2 class="text-3xl md:text-4xl font-bold mb-4">Service-Termin vereinbaren</h2>
                    <div class="w-24 h-1 bg-gradient-to-r from-[#B91C1C] to-[#8B0000] mx-auto"></div>
                    <p class="text-[#BFBFBF] max-w-2xl mx-auto mt-6">
                        Bitte füllen Sie das Formular aus und wir melden uns schnellstmöglich bei Ihnen zur Terminvereinbarung.
                    </p>
                </div>

                <div class="grid grid-cols-1 lg:grid-cols-2 gap-12">
                    <!-- Service Formular -->
<livewire:frontend.service.request-form />

                    <!-- Werkstatt Info -->
                    <div class="space-y-8">
                        <!-- Öffnungszeiten -->
                        <div class="glass-effect rounded-2xl p-8 border border-[#333]">
                            <h3 class="text-2xl font-bold mb-6">Werkstatt-Öffnungszeiten</h3>
                            <div class="space-y-4">
                                <div class="flex justify-between py-3 border-b border-[#333]">
                                    <span>Montag - Freitag</span>
                                    <span class="font-medium">7:30 - 18:00 Uhr</span>
                                </div>
                                <div class="flex justify-between py-3 border-b border-[#333]">
                                    <span>Samstag</span>
                                    <span class="font-medium">8:00 - 14:00 Uhr</span>
                                </div>
                                <div class="flex justify-between py-3">
                                    <span>Sonntag</span>
                                    <span class="text-[#BFBFBF]">Geschlossen</span>
                                </div>
                            </div>
                            <div class="mt-6 p-4 bg-[#2D2D2D] rounded-lg">
                                <p class="text-sm text-[#BFBFBF]">
                                    <i class="fas fa-info-circle text-[#B91C1C] mr-2"></i>
                                    Notfall-Service außerhalb der Öffnungszeiten nach Vereinbarung möglich.
                                </p>
                            </div>
                        </div>

                        <!-- Warum unsere Werkstatt -->
                        <div class="glass-effect rounded-2xl p-8 border border-[#333]">
                            <h3 class="text-2xl font-bold mb-6">Warum unsere Werkstatt?</h3>
                            <div class="space-y-4">
                                <div class="flex items-start">
                                    <div class="bg-[#2D2D2D] p-2 rounded-lg mr-4 mt-1">
                                        <i class="fas fa-award text-[#B91C1C]"></i>
                                    </div>
                                    <div>
                                        <h4 class="font-bold mb-1">Zertifizierte Meisterwerkstatt</h4>
                                        <p class="text-sm text-[#BFBFBF]">Offizieller Service-Partner für Premium-Marken</p>
                                    </div>
                                </div>
                                <div class="flex items-start">
                                    <div class="bg-[#2D2D2D] p-2 rounded-lg mr-4 mt-1">
                                        <i class="fas fa-clock text-[#B91C1C]"></i>
                                    </div>
                                    <div>
                                        <h4 class="font-bold mb-1">Schnelle Bearbeitung</h4>
                                        <p class="text-sm text-[#BFBFBF]">Moderne Ausstattung für effiziente Reparaturen</p>
                                    </div>
                                </div>
                                <div class="flex items-start">
                                    <div class="bg-[#2D2D2D] p-2 rounded-lg mr-4 mt-1">
                                        <i class="fas fa-shield-alt text-[#B91C1C]"></i>
                                    </div>
                                    <div>
                                        <h4 class="font-bold mb-1">Garantieerhalt</h4>
                                        <p class="text-sm text-[#BFBFBF]">Alle Arbeiten gemäß Herstellervorgaben</p>
                                    </div>
                                </div>
                                <div class="flex items-start">
                                    <div class="bg-[#2D2D2D] p-2 rounded-lg mr-4 mt-1">
                                        <i class="fas fa-car text-[#B91C1C]"></i>
                                    </div>
                                    <div>
                                        <h4 class="font-bold mb-1">Mietwagen-Service</h4>
                                        <p class="text-sm text-[#BFBFBF]">Kostenloser Ersatzwagen bei größeren Reparaturen</p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Notfall-Kontakt -->
                        <div class="glass-effect rounded-2xl p-8 border border-[#333] bg-gradient-to-br from-[#1E1E1E] to-[#2D2D2D]">
                            <h3 class="text-2xl font-bold mb-4">Service Notfall?</h3>
                            <p class="text-[#BFBFBF] mb-6">
                                Bei akuten Problemen oder Pannen kontaktieren Sie uns direkt:
                            </p>
                            <div class="space-y-3">
                                <div class="flex items-center">
                                    <i class="fas fa-phone text-[#B91C1C] mr-3"></i>
                                    <span class="font-bold">+49 5171 123456</span>
                                </div>
                                <div class="flex items-center">
                                    <i class="fas fa-envelope text-[#B91C1C] mr-3"></i>
                                    <span class="font-bold">service@autohaus-kauder.de</span>
                                </div>
                            </div>
                            <button class="w-full bg-transparent border-2 border-[#BFBFBF] hover:bg-[#BFBFBF] hover:text-[#1E1E1E] text-white py-3 rounded-lg font-medium transition-all mt-6">
                                <i class="fas fa-phone-alt mr-2"></i> Jetzt anrufen
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
