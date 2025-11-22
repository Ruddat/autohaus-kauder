<section class="py-16 bg-[#0f0f0f]">
    <div class="container mx-auto px-4">
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-12">
            <!-- Contact Info -->
            <div class="lg:col-span-1">
                <div class="glass-effect rounded-2xl p-8 border border-[#333] h-full">
                    <h2 class="text-2xl font-bold mb-6">Unsere Kontaktdaten</h2>

                    <div class="space-y-6">
                        <div class="flex items-start contact-card">
                            <div class="bg-[#2D2D2D] p-3 rounded-lg mr-4">
                                <i class="fas fa-map-marker-alt text-[#B91C1C]"></i>
                            </div>
                            <div>
                                <h4 class="font-bold">Adresse</h4>
                                <p class="text-[#BFBFBF]">
                                    Wilhelm-Rausch-Str. 11<br>
                                    31228 Peine
                                </p>
                            </div>
                        </div>

                        <div class="flex items-start contact-card">
                            <div class="bg-[#2D2D2D] p-3 rounded-lg mr-4">
                                <i class="fas fa-phone text-[#B91C1C]"></i>
                            </div>
                            <div>
                                <h4 class="font-bold">Telefon</h4>
                                <p class="text-[#BFBFBF]">+49 5171 123456</p>
                            </div>
                        </div>

                        <div class="flex items-start contact-card">
                            <div class="bg-[#2D2D2D] p-3 rounded-lg mr-4">
                                <i class="fas fa-envelope text-[#B91C1C]"></i>
                            </div>
                            <div>
                                <h4 class="font-bold">E-Mail</h4>
                                <p class="text-[#BFBFBF]">info@autohaus-kauder.de</p>
                            </div>
                        </div>

                        <div class="flex items-start contact-card">
                            <div class="bg-[#2D2D2D] p-3 rounded-lg mr-4">
                                <i class="fas fa-clock text-[#B91C1C]"></i>
                            </div>
                            <div>
                                <h4 class="font-bold">Öffnungszeiten</h4>
                                <p class="text-[#BFBFBF]">
                                    Mo-Fr: 8:00 - 18:00<br>
                                    Sa: 9:00 - 14:00<br>
                                    So: Geschlossen
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

            <!-- Map & Contact Form -->
            <div class="lg:col-span-2">
                <!-- Map -->
                <div class="mb-12">
                    <h2 class="text-2xl font-bold mb-6">So finden Sie uns</h2>
                    <div class="map-container rounded-2xl overflow-hidden" style="height: 400px;">
                        <iframe
                            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2443.987317240729!2d10.22691127688758!3d52.22092407195433!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x47af7d56c2b6b4a9%3A0x4b1b3e5b0b0b0b0b!2sWilhelm-Rausch-Stra%C3%9Fe%2011%2C%2031228%20Peine!5e0!3m2!1sde!2sde!4v1690000000000!5m2!1sde!2sde"
                            width="100%"
                            height="100%"
                            style="border:0;"
                            allowfullscreen=""
                            loading="lazy"
                            referrerpolicy="no-referrer-when-downgrade">
                        </iframe>
                    </div>
                </div>

                <!-- Contact Form (statisch, später Livewire) -->
                <div class="glass-effect rounded-2xl p-8 border border-[#333]">
                    <h2 class="text-2xl font-bold mb-6">Schnellanfrage</h2>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <label class="block text-sm font-medium mb-2">Name *</label>
                            <input type="text"
                                   class="w-full bg-[#2D2D2D] border border-[#444] rounded-lg px-4 py-3 focus:outline-none focus:ring-2 focus:ring-[#B91C1C]">
                        </div>
                        <div>
                            <label class="block text-sm font-medium mb-2">E-Mail *</label>
                            <input type="email"
                                   class="w-full bg-[#2D2D2D] border border-[#444] rounded-lg px-4 py-3 focus:outline-none focus:ring-2 focus:ring-[#B91C1C]">
                        </div>
                        <div>
                            <label class="block text-sm font-medium mb-2">Telefonnummer</label>
                            <input type="tel"
                                   class="w-full bg-[#2D2D2D] border border-[#444] rounded-lg px-4 py-3 focus:outline-none focus:ring-2 focus:ring-[#B91C1C]">
                        </div>
                        <div>
                            <label class="block text-sm font-medium mb-2">Betreff</label>
                            <select class="w-full bg-[#2D2D2D] border border-[#444] rounded-lg px-4 py-3 focus:outline-none focus:ring-2 focus:ring-[#B91C1C]">
                                <option>Allgemeine Anfrage</option>
                                <option>Fahrzeug-Anfrage</option>
                                <option>Service-Termin</option>
                                <option>Probefahrt</option>
                                <option>Finanzierung</option>
                                <option>Reklamation</option>
                            </select>
                        </div>
                        <div class="md:col-span-2">
                            <label class="block text-sm font-medium mb-2">Nachricht *</label>
                            <textarea rows="5"
                                      class="w-full bg-[#2D2D2D] border border-[#444] rounded-lg px-4 py-3 focus:outline-none focus:ring-2 focus:ring-[#B91C1C]"></textarea>
                        </div>
                    </div>

                    <div class="mt-6 flex items-center">
                        <input type="checkbox"
                               class="w-4 h-4 bg-[#2D2D2D] border border-[#444] rounded focus:ring-[#B91C1C]">
                        <label class="ml-2 text-sm">
                            Ich akzeptiere die Datenschutzerklärung *
                        </label>
                    </div>

                    <div class="mt-8">
                        <button class="w-full bg-gradient-to-r from-[#B91C1C] to-[#8B0000] hover:from-[#8B0000] hover:to-[#B91C1C] text-white py-4 rounded-lg font-bold text-lg transition-all shadow-lg">
                            Nachricht senden <i class="fas fa-paper-plane ml-2"></i>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
