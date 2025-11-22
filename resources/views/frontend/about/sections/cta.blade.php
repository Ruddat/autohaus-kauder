<section class="py-20 gradient-bg">
    <div class="container mx-auto px-4 text-center">
        <h2 class="text-3xl md:text-4xl font-bold mb-6">Werden Sie Teil unserer Geschichte</h2>

        <p class="text-xl text-[#BFBFBF] mb-8 max-w-2xl mx-auto">
            Entdecken Sie Ihr neues Premium-Fahrzeug in unserem Showroom oder profitieren Sie
            von unserem exzellenten Service.
        </p>

        <div class="flex flex-col md:flex-row justify-center gap-4">
            <a href="{{ route('vehicles.index') }}"
               class="bg-gradient-to-r from-[#B91C1C] to-[#8B0000]
                      hover:from-[#8B0000] hover:to-[#B91C1C]
                      text-white px-8 py-4 rounded-lg font-medium transition-all shadow-lg hover:shadow-xl">
                <i class="fas fa-car mr-2"></i> Fahrzeuge entdecken
            </a>

            <a href="{{ route('frontend.contact') }}"
               class="bg-transparent border-2 border-[#BFBFBF]
                      hover:bg-[#BFBFBF] hover:text-[#1E1E1E]
                      text-white px-8 py-4 rounded-lg font-medium transition-all">
                <i class="fas fa-phone mr-2"></i> Kontakt aufnehmen
            </a>
        </div>
    </div>
</section>
