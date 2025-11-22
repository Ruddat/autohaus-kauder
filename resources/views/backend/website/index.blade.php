@extends('backend.layout.app')

@section('content')

<div class="container mx-auto px-6 py-10">

    <h1 class="text-3xl font-bold mb-10">Website & Inhalte</h1>

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">

        <!-- Showroom -->
        <a href="{{ route('backend.showroom') }}"
           class="glass-effect p-8 rounded-2xl border border-[#333] hover:scale-[1.04] transition-all duration-300 block shadow-lg">
            <div class="flex items-center mb-6">
                <i class="fas fa-images text-4xl text-[#B91C1C] mr-4"></i>
                <h3 class="text-2xl font-bold">Showroom</h3>
            </div>
            <p class="text-[#BFBFBF] text-sm">
                Verwalten Sie Bilder, Titel, Reihenfolge und Uploads für Ihren Showroom.
            </p>
        </a>

        <!-- Team -->
        <a href="{{ route('backend.team.index') }}"
           class="glass-effect p-8 rounded-2xl border border-[#333] hover:scale-[1.04] transition-all duration-300 block shadow-lg">
            <div class="flex items-center mb-6">
                <i class="fas fa-users text-4xl text-[#B91C1C] mr-4"></i>
                <h3 class="text-2xl font-bold">Team</h3>
            </div>
            <p class="text-[#BFBFBF] text-sm">
                Mitarbeiter hinzufügen, bearbeiten und sortieren – inklusive Telefon & Bild.
            </p>
        </a>

        <!-- Fahrzeuge -->
        <a href="{{ route('backend.vehicles.index') }}"
           class="glass-effect p-8 rounded-2xl border border-[#333] hover:scale-[1.04] transition-all duration-300 block shadow-lg">
            <div class="flex items-center mb-6">
                <i class="fas fa-car text-4xl text-[#B91C1C] mr-4"></i>
                <h3 class="text-2xl font-bold">Fahrzeuge</h3>
            </div>
            <p class="text-[#BFBFBF] text-sm">
                Fahrzeugbestand verwalten, Daten pflegen und Bilder hochladen.
            </p>
        </a>

        <!-- Service -->
        <a href="{{ route('backend.service') }}"
           class="glass-effect p-8 rounded-2xl border border-[#333] hover:scale-[1.04] transition-all duration-300 block shadow-lg">
            <div class="flex items-center mb-6">
                <i class="fas fa-tools text-4xl text-[#B91C1C] mr-4"></i>
                <h3 class="text-2xl font-bold">Werkstatt & Service</h3>
            </div>
            <p class="text-[#BFBFBF] text-sm">
                Inhalte der Service-Seite pflegen, Texte, Vorteile & Bilder verwalten.
            </p>
        </a>

        <!-- Kontakt / Öffnungszeiten -->
        <a href="{{ route('backend.settings') }}?tab=contact"
           class="glass-effect p-8 rounded-2xl border border-[#333] hover:scale-[1.04] transition-all duration-300 block shadow-lg">
            <div class="flex items-center mb-6">
                <i class="fas fa-address-book text-4xl text-[#B91C1C] mr-4"></i>
                <h3 class="text-2xl font-bold">Kontakt & Öffnungszeiten</h3>
            </div>
            <p class="text-[#BFBFBF] text-sm">
                Telefonnummern, E-Mail-Adressen, Öffnungszeiten & Standort pflegen.
            </p>
        </a>

        <!-- Website Settings -->
        <a href="{{ route('backend.settings') }}"
           class="glass-effect p-8 rounded-2xl border border-[#333] hover:scale-[1.04] transition-all duration-300 block shadow-lg">
            <div class="flex items-center mb-6">
                <i class="fas fa-cog text-4xl text-[#B91C1C] mr-4"></i>
                <h3 class="text-2xl font-bold">Website Einstellungen</h3>
            </div>
            <p class="text-[#BFBFBF] text-sm">
                Logos, Farben, Footer-Texte, Meta-Daten & Bilder verwalten.
            </p>
        </a>

    </div>

</div>

@endsection
