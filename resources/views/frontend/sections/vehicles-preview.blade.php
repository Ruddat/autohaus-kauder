
{{--


<section class="py-20 bg-[#0f0f0f]">
    @include('frontend.sections.vehicles-inner')
</section>

--}}

<!-- NEW VEHICLES SECTION -->
<section class="py-16 bg-[#0f0f0f]">
    <div class="container mx-auto px-4">

        <div class="text-center mb-12">
            <h2 class="text-3xl md:text-4xl font-bold mb-3">Neu eingetroffen</h2>
            <div class="w-24 h-1 bg-gradient-to-r from-[#B91C1C] to-[#8B0000] mx-auto"></div>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">

        @foreach ($newVehicles as $v)
            @include('frontend.components.vehicle-card', ['v' => $v])
        @endforeach

        </div>
                <div class="text-center mt-12">
<a href="{{ route('vehicles.index', ['filter' => 'new']) }}"
   class="border-2 border-[#BFBFBF] hover:bg-[#BFBFBF] hover:text-[#1E1E1E] text-white px-8 py-3 rounded-lg font-medium transition-all inline-block">
    Alle Fahrzeuge anzeigen <i class="fas fa-arrow-right ml-2"></i>
</a>


            </div>


    </div>
</section>


<!-- TOP VEHICLES SECTION -->
<section class="py-16 gradient-bg">
    <div class="container mx-auto px-4">

        <div class="text-center mb-12">
            <h2 class="text-3xl md:text-4xl font-bold mb-3">Top Fahrzeuge</h2>
            <div class="w-24 h-1 bg-gradient-to-r from-[#B91C1C] to-[#8B0000] mx-auto"></div>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">

        @foreach ($topVehicles as $v)
            @include('frontend.components.vehicle-card', ['v' => $v])
        @endforeach

        </div>

            <div class="text-center mt-12">
<a href="{{ route('vehicles.index', ['filter' => 'top']) }}"
   class="border-2 border-[#BFBFBF] hover:bg-[#BFBFBF] hover:text-[#1E1E1E] text-white px-8 py-3 rounded-lg font-medium transition-all inline-block">
    Alle Fahrzeuge anzeigen <i class="fas fa-arrow-right ml-2"></i>
</a>
            </div>


    </div>
</section>





<!-- HOT DEALS SECTION -->
<section class="py-16 bg-[#0f0f0f]">
    <div class="container mx-auto px-4">

        <div class="text-center mb-12">
            <h2 class="text-3xl md:text-4xl font-bold mb-3">Aktuelle Angebote</h2>
            <div class="w-24 h-1 bg-gradient-to-r from-[#B91C1C] to-[#8B0000] mx-auto"></div>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">

        @foreach ($hotDeals as $v)
            @include('frontend.components.vehicle-card', ['v' => $v])
        @endforeach

        </div>

            <div class="text-center mt-12">
<a href="{{ route('vehicles.index', ['filter' => 'hot']) }}"
   class="border-2 border-[#BFBFBF] hover:bg-[#BFBFBF] hover:text-[#1E1E1E] text-white px-8 py-3 rounded-lg font-medium transition-all inline-block">
    Alle Fahrzeuge anzeigen <i class="fas fa-arrow-right ml-2"></i>
</a>
            </div>

    </div>
</section>
