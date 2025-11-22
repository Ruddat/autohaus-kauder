<div class="sidebar fixed inset-y-0 left-0 w-64 bg-[#1a1a1a] border-r border-[#333]" id="sidebar">
    <div class="p-4 border-b border-[#333]">
        <div class="flex items-center justify-between lg:justify-start">

            <div class="flex items-center">
                <div class="w-8 h-8 bg-gradient-to-r from-[#B91C1C] to-[#8B0000] rounded-full mr-3"></div>
                <div>
                    <div class="text-lg font-bold">AUTOHAUS KAUDER</div>
                    <div class="text-xs text-[#BFBFBF] hidden lg:block">ADMIN PANEL</div>
                </div>
            </div>

            <button class="lg:hidden text-xl p-2" onclick="toggleSidebar()">
                <i class="fas fa-times"></i>
            </button>
        </div>
    </div>

    <nav class="p-4 space-y-2">
        <x-backend.nav-item icon="fa-tachometer-alt" route="backend.dashboard" label="Dashboard"/>
        <x-backend.nav-item icon="fa-car" route="vehicles.index" label="Fahrzeuge"/>
        <x-backend.nav-item icon="fa-images" route="backend.showroom" label="Showroom"/>
        <x-backend.nav-item icon="fa-users" route="backend.team.index" label="Team"/>
        <x-backend.nav-item icon="fa-tools" route="backend.service" label="Service"/>
        <x-backend.nav-item icon="fa-cog" route="backend.settings" label="Einstellungen"/>
        <x-backend.nav-item icon="fa-address-book" route="backend.website" label="Website & Inhalte"/>
    </nav>
</div>
