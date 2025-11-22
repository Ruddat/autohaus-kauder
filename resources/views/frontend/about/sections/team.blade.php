<section id="team" class="py-20 gradient-bg">
    <div class="container mx-auto px-4">

        <div class="text-center mb-16">
            <h2 class="text-3xl md:text-4xl font-bold mb-4">Unser Team</h2>
            <div class="w-24 h-1 bg-gradient-to-r from-[#B91C1C] to-[#8B0000] mx-auto"></div>
            <p class="text-[#BFBFBF] max-w-2xl mx-auto mt-6">
                Erfahren Sie mehr über die Menschen hinter Autohaus Kauder –
                unser engagiertes Team mit Leidenschaft für Automobile.
            </p>
        </div>

@php
    $teamMembers = \App\Models\TeamMember::orderBy('sort_order')->get();
    $count = $teamMembers->count();

    // Dynamische Grid-Klasse (zentriert wenn < 4)
    $gridClass = match(true) {
        $count === 1 => 'grid-cols-1 md:grid-cols-1 lg:grid-cols-1 justify-center',
        $count === 2 => 'grid-cols-1 md:grid-cols-2 lg:grid-cols-2 justify-center',
        $count === 3 => 'grid-cols-1 md:grid-cols-3 lg:grid-cols-3 justify-center',
        default => 'grid-cols-1 md:grid-cols-2 lg:grid-cols-4', // Standard
    };
@endphp

        <div class="grid {{ $gridClass }} gap-8">

@foreach($teamMembers as $member)

    @php
        // Initialen
        $initials = collect(explode(' ', $member->name))
            ->map(fn($p) => strtoupper(substr($p, 0, 1)))
            ->join('');

        // Buchstaben erste Initiale
        $first = strtoupper(substr($member->name, 0, 1));

        // Farbmap
        $colorMap = [
            'A' => 'from-[#B91C1C] to-[#8B0000]',   // Rot
            'B' => 'from-[#1E3A8A] to-[#1E40AF]',   // Blau
            'C' => 'from-[#065F46] to-[#047857]',   // Grün
            'D' => 'from-[#92400E] to-[#B45309]',   // Orange
            'E' => 'from-[#6D28D9] to-[#7C3AED]',   // Lila
            'F' => 'from-[#0EA5E9] to-[#0284C7]',   // Cyan
            'G' => 'from-[#DB2777] to-[#BE185D]',   // Pink
            'H' => 'from-[#4B5563] to-[#1F2937]',   // Grau
            'I' => 'from-[#16A34A] to-[#166534]',   // Dunkelgrün
            'J' => 'from-[#F97316] to-[#EA580C]',   // Orange
            'K' => 'from-[#1D4ED8] to-[#1E3A8A]',   // Blau dunkel
            'L' => 'from-[#A855F7] to-[#7E22CE]',   // Purple
            'M' => 'from-[#DC2626] to-[#991B1B]',   // Rot dunkel
            'N' => 'from-[#059669] to-[#047857]',   // Grün
            'O' => 'from-[#DB2777] to-[#BE185D]',   // Pink
            'P' => 'from-[#4338CA] to-[#3730A3]',   // Indigo
            'Q' => 'from-[#0891B2] to-[#0E7490]',   // Petrol
            'R' => 'from-[#BE123C] to-[#9F1239]',   // Rot dunkel
            'S' => 'from-[#4F46E5] to-[#4338CA]',   // Violett blau
            'T' => 'from-[#22C55E] to-[#16A34A]',   // Green bright
            'U' => 'from-[#0EA5E9] to-[#0284C7]',   // Sky
            'V' => 'from-[#9333EA] to-[#7E22CE]',   // Purple
            'W' => 'from-[#F43F5E] to-[#BE123C]',   // Red/Pink mix
            'X' => 'from-[#737373] to-[#525252]',   // Grau hell/dunkel
            'Y' => 'from-[#FACC15] to-[#EAB308]',   // Gelb
            'Z' => 'from-[#F472B6] to-[#EC4899]',   // Pink hell
            '*' => 'from-[#1E1E1E] to-[#2D2D2D]',   // Default
        ];

        $gradientClass = $colorMap[$first] ?? $colorMap['*'];
    @endphp

    <div class="team-card glass-effect rounded-2xl p-6 text-center border border-[#333]">
        <div class="w-32 h-32 rounded-full mx-auto mb-4 flex items-center justify-center overflow-hidden bg-gradient-to-br {{ $gradientClass }}">
            @if ($member->image)
                <img src="{{ asset('storage/' . $member->image) }}" class="w-full h-full object-cover rounded-full">
            @else
                <div class="initial-avatar">
                    {{ $initials }}
                </div>
            @endif
        </div>

        <h3 class="text-xl font-bold mb-2">{{ $member->name }}</h3>
        <p class="text-[#B91C1C] font-medium mb-3">{{ $member->position }}</p>
        <p class="text-[#BFBFBF] text-sm">{{ $member->bio }}</p>
    </div>

@endforeach

        </div>

        <div class="text-center mt-12">
            <a href="{{ route('frontend.contact') }}"
               class="border-2 border-[#BFBFBF] hover:bg-[#BFBFBF] hover:text-[#1E1E1E]
                      text-white px-8 py-3 rounded-lg font-medium transition-all inline-block">
                Das ganze Team kennenlernen
            </a>
        </div>

    </div>
</section>
