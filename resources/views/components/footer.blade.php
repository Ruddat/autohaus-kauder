    <!-- Footer -->
    <footer class="bg-[#0a0a0a] py-12 border-t border-[#1E1E1E]">
        <div class="container mx-auto px-4">
            <div class="text-center">
                <div class="flex justify-center mb-6">
                    <div class="w-10 h-10 bg-gradient-to-r from-[#B91C1C] to-[#8B0000] rounded-full mr-3"></div>
                    <div class="text-xl font-bold">{{ Settings::get('company.name') }}</div>
                </div>
                <p class="text-[#BFBFBF] max-w-2xl mx-auto mb-8">
                    Ihr Premium-Partner für Mercedes, Audi, BMW und Lexus in Peine und Umgebung.
                </p>
                <div class="flex flex-wrap justify-center gap-6 text-sm text-[#BFBFBF]">
                    <a href="#" class="hover:text-white transition">Impressum</a>
                    <a href="#" class="hover:text-white transition">Datenschutz</a>
                    <a href="#" class="hover:text-white transition">AGB</a>
                    <a href="#" class="hover:text-white transition">Kontakt</a>
                    <a href="#" class="hover:text-white transition">Service</a>
                </div>
                <div class="mt-8 text-xs text-[#666]">
                    {{ Settings::get('footer.copyright') }}
                </div>
            </div>
        </div>
    </footer>
