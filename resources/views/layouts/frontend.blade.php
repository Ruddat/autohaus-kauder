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
