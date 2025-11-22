<!-- Overlay -->
<div id="cookieOverlay" class="cookie-overlay fixed inset-0 bg-black/70 z-[999]"></div>

<!-- Cookie Banner -->
<div id="cookieBanner" class="cookie-banner fixed bottom-0 left-0 right-0 bg-[#1E1E1E]/95 backdrop-blur-xl border-t border-[#333] translate-y-full transition-all duration-300 z-[1000]">
    <div class="container mx-auto px-4 py-6">
        <div class="flex flex-col lg:flex-row items-start lg:items-center justify-between gap-6">

            <div class="flex-1">
                <h3 class="text-lg font-bold mb-2">Cookie-Einstellungen</h3>
                <p class="text-sm text-[#BFBFBF]">
                    Wir verwenden Cookies, um Ihnen die bestmögliche Erfahrung zu bieten. Einige sind notwendig,
                    andere helfen uns, die Nutzung zu analysieren und Marketing zu optimieren.
                </p>

                <div class="mt-3 flex flex-wrap gap-4 text-sm">
                    <a href="/datenschutz" class="text-[#B91C1C] hover:text-white transition">Datenschutzerklärung</a>
                    <a href="/impressum" class="text-[#B91C1C] hover:text-white transition">Impressum</a>
                </div>
            </div>

            <div class="flex flex-col sm:flex-row gap-3">
                <button onclick="openCookieSettings()"
                    class="bg-[#2D2D2D] hover:bg-[#BFBFBF] hover:text-[#1E1E1E] text-white px-6 py-3 rounded-lg text-sm transition-all">
                    Einstellungen
                </button>

                <button onclick="acceptAllCookies()"
                    class="bg-gradient-to-r from-[#B91C1C] to-[#8B0000] hover:from-[#8B0000] hover:to-[#B91C1C] text-white px-6 py-3 rounded-lg text-sm transition-all">
                    Alle akzeptieren
                </button>
            </div>
        </div>
    </div>
</div>


<!-- Cookie Settings Modal -->
<div id="cookieSettings" class="cookie-settings fixed inset-0 flex items-center justify-center z-[1001]">
    <div class="bg-[#1E1E1E] border border-[#333] rounded-2xl p-6 w-full max-w-xl shadow-2xl">

        <div class="flex justify-between items-center mb-6">
            <h2 class="text-2xl font-bold">Cookie-Einstellungen</h2>
            <button onclick="closeCookieSettings()" class="text-[#BFBFBF] hover:text-white text-xl">
                <i class="fas fa-times"></i>
            </button>
        </div>

        <div class="space-y-6">

            <x-cookie-toggle
                label="Notwendige Cookies"
                description="Für den Betrieb der Website erforderlich."
                id="necessaryCookies"
                disabled="true"
                checked="true"
            />

            <x-cookie-toggle
                label="Analytics Cookies"
                description="Helfen uns zu verstehen, wie Besucher interagieren."
                id="analyticsCookies"
            />

            <x-cookie-toggle
                label="Marketing Cookies"
                description="Werbung personalisieren und Kampagnen messen."
                id="marketingCookies"
            />

            <x-cookie-toggle
                label="Personalisierungs-Cookies"
                description="Speichert Präferenzen für ein personalisiertes Erlebnis."
                id="personalizationCookies"
            />

        </div>

        <div class="mt-8 pt-6 border-t border-[#333] flex flex-col sm:flex-row justify-end gap-3">
            <button onclick="saveCookiePreferences()"
                class="bg-gradient-to-r from-[#B91C1C] to-[#8B0000] hover:from-[#8B0000] hover:to-[#B91C1C] text-white px-6 py-3 rounded-lg font-medium transition-all">
                Auswahl speichern
            </button>

            <button onclick="acceptAllCookies()"
                class="bg-[#2D2D2D] hover:bg-[#BFBFBF] hover:text-[#1E1E1E] text-white px-6 py-3 rounded-lg font-medium transition-all">
                Alle akzeptieren
            </button>
        </div>

    </div>
</div>
