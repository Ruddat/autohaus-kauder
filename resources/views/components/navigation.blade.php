<nav class="sticky top-0 z-50 glass-effect py-4 border-b border-[#333] bg-black/40 backdrop-blur-lg">
    <div class="container mx-auto px-4 flex justify-between items-center">

        <!-- Logo -->
        <div class="flex items-center">
            <div class="w-10 h-10 bg-gradient-to-r from-[#B91C1C] to-[#8B0000] rounded-full mr-3"></div>
            <div>
                <div class="text-xl font-bold">AUTOHAUS KAUDER</div>
                <div class="text-xs text-[#BFBFBF]">PREMIUM FAHRZEUGE</div>
            </div>
        </div>

        <!-- Navigation -->
        <div class="hidden md:flex space-x-8">

            <a href="{{ route('home') }}"
               class="hover:text-[#BFBFBF] transition font-medium {{ request()->routeIs('home') ? 'text-[#B91C1C]' : '' }}">
                Home
            </a>

            <a href="{{ route('vehicles.index') }}"
               class="hover:text-[#BFBFBF] transition font-medium {{ request()->routeIs('vehicles.index*') ? 'text-[#B91C1C]' : '' }}">
                Fahrzeuge
            </a>

            <a href="{{ route('frontend.service') }}"
               class="hover:text-[#BFBFBF] transition font-medium {{ request()->routeIs('frontend.service') ? 'text-[#B91C1C]' : '' }}">
                Service
            </a>

            <a href="{{ route('frontend.about') }}"
               class="hover:text-[#BFBFBF] transition font-medium {{ request()->routeIs('frontend.about') ? 'text-[#B91C1C]' : '' }}">
                Über uns
            </a>

            <a href="{{ route('frontend.contact') }}"
               class="hover:text-[#BFBFBF] transition font-medium {{ request()->routeIs('frontend.contact') ? 'text-[#B91C1C]' : '' }}">
                Kontakt
            </a>

        </div>

        <!-- Mobile Menu Button -->
        <button class="md:hidden text-xl">
            <i class="fas fa-bars"></i>
        </button>

    </div>
</nav>
