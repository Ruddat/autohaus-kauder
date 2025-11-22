<header class="bg-[#1a1a1a] border-b border-[#333] p-4">
    <div class="flex justify-between items-center">

        <div class="flex items-center">
            <button class="p-2 hover:bg-[#2D2D2D] rounded-lg mr-4" onclick="toggleSidebar()">
                <i class="fas fa-bars"></i>
            </button>
            <h1 class="text-xl font-bold">{{ $title ?? 'Dashboard' }}</h1>
        </div>

        <div class="flex items-center space-x-4">

            <div class="relative hidden sm:block">
                <input type="text" placeholder="Suchen..." class="bg-[#2D2D2D] border border-[#444] rounded-lg px-4 py-2 pl-10 focus:ring-[#B91C1C] focus:ring-2">
                <i class="fas fa-search absolute left-3 top-3 text-[#BFBFBF]"></i>
            </div>

            <button class="p-2 hover:bg-[#2D2D2D] rounded-lg relative">
                <i class="fas fa-bell"></i>
                <span class="absolute top-1 right-1 w-3 h-3 bg-[#B91C1C] rounded-full"></span>
            </button>

            <div class="flex items-center space-x-3">
                <div class="w-10 h-10 bg-gradient-to-r from-[#B91C1C] to-[#8B0000] rounded-full flex items-center justify-center">
                    <span class="font-bold">MK</span>
                </div>
                <div class="hidden sm:block">
                    <div class="font-medium">Markus Kauder</div>
                    <div class="text-xs text-[#BFBFBF]">Administrator</div>
                </div>
            </div>

        </div>
    </div>
</header>
