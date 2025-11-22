<section class="py-16 bg-[#0f0f0f]">
    <div class="container mx-auto px-4">

        <div class="text-center mb-12">
            <h2 class="text-3xl md:text-4xl font-bold mb-4">Ihre Ansprechpartner</h2>
            <div class="w-24 h-1 bg-gradient-to-r from-[#B91C1C] to-[#8B0000] mx-auto"></div>
        </div>

        @php
            $team = \App\Models\TeamMember::orderBy('sort_order')->get();
            $count = $team->count();

            // automatische Zentrierung bei < 4 Personen
            $gridClass = match(true) {
                $count === 1 => 'grid-cols-1 md:grid-cols-1 lg:grid-cols-1 justify-center',
                $count === 2 => 'grid-cols-1 md:grid-cols-2 lg:grid-cols-2 justify-center',
                $count === 3 => 'grid-cols-1 md:grid-cols-3 lg:grid-cols-3 justify-center',
                default => 'grid-cols-1 md:grid-cols-2 lg:grid-cols-4'
            };
        @endphp

        <div class="grid {{ $gridClass }} gap-8">

            @foreach($team as $m)

                <div class="glass-effect rounded-2xl p-6 border border-[#333] text-center contact-card">

                    <!-- Avatar -->
                    <div class="w-24 h-24 rounded-full mx-auto mb-4 overflow-hidden
                                bg-gradient-to-br from-[#1E1E1E] to-[#2D2D2D] flex items-center justify-center">
                        @if($m->image)
                            <img src="{{ asset('storage/' . $m->image) }}"
                                 class="w-full h-full object-cover rounded-full">
                        @else
                            <i class="fas fa-user text-[#BFBFBF] text-3xl"></i>
                        @endif
                    </div>

                    <!-- Name & Position -->
                    <h3 class="text-xl font-bold mb-2">{{ $m->name }}</h3>
                    <p class="text-[#B91C1C] font-medium mb-4">{{ $m->position }}</p>

                    <!-- Bio -->
                    <p class="text-[#BFBFBF] text-sm">{{ $m->bio }}</p>

                    <!-- Telefon nur wenn vorhanden -->
                    @if($m->phone)
                        <div class="mt-5 flex justify-center">
                            <a href="tel:{{ $m->phone }}"
                               class="flex items-center bg-[#1A1A1A]/80 border border-[#333]
                                      px-5 py-2 rounded-xl shadow-lg backdrop-blur-md
                                      transition-transform duration-300 hover:scale-105
                                      text-sm text-[#F5F5F5] font-semibold tracking-wide">
                                <i class="fas fa-phone text-[#B91C1C] mr-2 text-sm"></i>
                                {{ $m->phone }}
                            </a>
                        </div>
                    @endif
                </div>

            @endforeach

        </div>

    </div>
</section>
