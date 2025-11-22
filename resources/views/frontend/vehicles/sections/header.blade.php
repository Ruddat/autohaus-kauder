<!-- Breadcrumb -->
<div class="bg-[#1a1a1a] py-4 border-b border-[#2D2D2D]">
    <div class="container mx-auto px-4">
        <div class="flex items-center space-x-2 text-sm text-[#BFBFBF]">
            <a href="/" class="hover:text-white transition">Home</a>
            <i class="fas fa-chevron-right text-xs"></i>
            <a href="/fahrzeuge" class="hover:text-white transition">Fahrzeuge</a>
            <i class="fas fa-chevron-right text-xs"></i>
            <span class="text-white">{{ $vehicle['title'] }}</span>
        </div>
    </div>
</div>



    <!-- Vehicle Hero Section -->
    <section class="gradient-bg py-8">
        <div class="container mx-auto px-4">
            <div class="flex flex-col lg:flex-row justify-between items-start lg:items-center mb-8">
                <div>
                <h1 class="text-3xl md:text-4xl font-bold mb-2">{{ $vehicle['title'] }}</h1>
                    <div class="flex items-center space-x-4 text-[#BFBFBF]">
                        <span class="flex items-center">
                            <i class="fas fa-calendar-alt mr-2"></i> 2022
                        </span>
                        <span class="flex items-center">
                            <i class="fas fa-tachometer-alt mr-2"></i> 15.300 km
                        </span>
                        <span class="flex items-center">
                            <i class="fas fa-gas-pump mr-2"></i> Hybrid
                        </span>
                    </div>
                </div>
                <div class="mt-4 lg:mt-0">
                    <div class="text-3xl font-bold text-[#B91C1C]">€ 62.900</div>
                    <div class="text-sm text-[#BFBFBF] text-right">inkl. MwSt.</div>
                </div>
            </div>

            <!-- Main Image -->
            <div class="rounded-2xl overflow-hidden mb-6 bg-gradient-to-br from-[#1E1E1E] to-[#2D2D2D] h-96 flex items-center justify-center relative">
                <div class="text-8xl text-[#BFBFBF] opacity-20">
                    <i class="fas fa-car"></i>
                </div>
                <div class="absolute top-4 right-4 bg-[#B91C1C] text-white font-bold px-3 py-1 rounded-full text-sm">
                    <i class="fas fa-bolt mr-1"></i> VERFÜGBAR
                </div>
            </div>

            <!-- Image Gallery -->
            <div class="image-gallery mb-8">
    <div class="image-gallery grid grid-cols-2 md:grid-cols-3 gap-4 mb-8">
        @foreach ([1,2,3,4] as $i)
        <div class="bg-[#1E1E1E] rounded-xl h-24 flex items-center justify-center cursor-pointer border-2 border-transparent hover:border-[#BFBFBF] transition">
            <i class="fas fa-car text-2xl text-[#BFBFBF]"></i>
        </div>
        @endforeach
    </div>
            </div>
        </div>
    </section>
