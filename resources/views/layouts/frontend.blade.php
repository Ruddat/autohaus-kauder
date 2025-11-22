<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <title>Autohaus Kauder</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @livewireStyles
</head>

<body class="bg-[#0f0f0f] text-white">

@php
    $special = next_exception_with_note_from_any();

    if ($special) {
        // Farben je Bereich
        $bgColor = $special->department === 'sales'
            ? 'bg-gradient-to-r from-[#B91C1C] to-[#8B0000]'
            : 'bg-gradient-to-r from-[#FACC15] to-[#EAB308]';

        // Icon anhand Text
        $text = strtolower($special->note);

        if (str_contains($text, 'geschlossen')) {
            $icon = 'fa-lock';
        } elseif (str_contains($text, 'verkürzt') || str_contains($text, 'nur bis') || str_contains($text, 'kurz')) {
            $icon = 'fa-clock';
        } elseif (str_contains($text, 'ab')) {
            $icon = 'fa-ban';
        } else {
            $icon = 'fa-bullhorn';
        }

        $headline = $special->department === 'sales'
            ? 'Verkauf – Sonderhinweis'
            : 'Werkstatt – Sonderhinweis';

        $date = \Carbon\Carbon::parse($special->date)->translatedFormat('d. F Y');
        $msg = "$headline • $date • $special->note";
    }
@endphp


@if($special)
    <div class="{{ $bgColor }} text-white py-3 border-b border-black/30 shadow-lg">

        <div class="marquee-container">
            <div class="marquee-track text-lg font-semibold tracking-wide flex items-center space-x-4">

                <i class="fas {{ $icon }} text-xl"></i>

                <span>{{ $msg }}</span>

                <i class="fas {{ $icon }} text-xl"></i>

                {{-- Nachricht wiederholen, damit der Loop smooth wird --}}
                <span class="ml-10">{{ $msg }}</span>
                <span class="ml-10">{{ $msg }}</span>

            </div>
        </div>

    </div>
@endif



<style>
.marquee-container {
    overflow: hidden;
    width: 100%;
    position: relative;
}

.marquee-track {
    display: inline-block;
    white-space: nowrap;
    padding-left: 100%;
    animation: marquee-scroll 18s linear infinite;
}

@keyframes marquee-scroll {
    from { transform: translateX(0%); }
    to   { transform: translateX(-100%); }
}
</style>


    @include('components.navigation')

    <main>
        {{ $slot }}
    </main>

    @include('components.footer')

    <x-cookie-banner />

    {{-- Back to Top Button --}}
<button id="backToTop" class="back-to-top" onclick="scrollToTop()">
    <svg id="backToTopProgress" class="progress-ring" width="60" height="60">
        <circle class="progress-bg" cx="30" cy="30" r="26" />
        <circle class="progress-bar" cx="30" cy="30" r="26" />
    </svg>
    <i class="fas fa-chevron-up absolute text-xl"></i>
</button>

    @livewireScripts

<script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>

<script>
    const showroomSlider = new Swiper('.myShowroomSlider', {
        loop: true,
        slidesPerView: 1,
        spaceBetween: 30,
        centeredSlides: true,

        autoplay: {
            delay: 3500,
            disableOnInteraction: false,
        },

        pagination: {
            el: '.swiper-pagination',
            clickable: true,
        },

        navigation: {
            nextEl: '.swiper-button-next',
            prevEl: '.swiper-button-prev',
        },

        breakpoints: {
            768: { slidesPerView: 2 },
            1200: { slidesPerView: 3 },
        }
    });
</script>


</body>
</html>
