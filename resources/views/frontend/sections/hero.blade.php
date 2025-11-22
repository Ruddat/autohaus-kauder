<section
  class="relative bg-cover bg-center bg-no-repeat pt-20 pb-32 overflow-hidden"
  style="background-image: url('https://images.unsplash.com/photo-1533473359331-0135ef1b58bf?q=80&w=2400&auto=format&fit=crop');"
>
    <div class="absolute inset-0 bg-black/60"></div>

    <div class="container mx-auto px-4 relative z-10 text-center">
        <h1 class="text-4xl md:text-6xl font-bold mb-6">
            {{ Settings::get('company.name') }}
        </h1>
        <p class="text-xl text-[#BFBFBF] mb-10 max-w-2xl mx-auto">
            Exklusive Fahrzeuge von Mercedes, Audi, BMW und Lexus. Geprüft, gepflegt, garantiert.
        </p>

        <div class="flex flex-col md:flex-row justify-center gap-4">
            <a class="bg-gradient-to-r from-[#B91C1C] to-[#8B0000] px-8 py-4 rounded-lg font-medium shadow-lg hover:shadow-xl" href="/fahrzeuge">
                <i class="fas fa-car mr-2"></i> Fahrzeuge ansehen
            </a>

            <a class="bg-transparent border-2 border-[#BFBFBF] px-8 py-4 rounded-lg font-medium hover:bg-[#BFBFBF] hover:text-[#1E1E1E]" href="/kontakt">
                <i class="fas fa-phone mr-2"></i> Kontakt aufnehmen
            </a>
        </div>
    </div>
</section>
