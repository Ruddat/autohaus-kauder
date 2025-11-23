<x-frontend-layout>

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
<script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>

    @include('frontend.vehicles.sections.header', ['vehicle' => $vehicle])
    @include('frontend.vehicles.sections.content')
    @include('frontend.vehicles.sections.similar')





<script>
document.addEventListener('DOMContentLoaded', function () {

    // Fullscreen Lightbox
    const lightbox = GLightbox({
        touchNavigation: true,
        loop: true,
    });

    // Thumbnail Slider
    var thumbSwiper = new Swiper(".mySwiperThumbs", {
        spaceBetween: 10,
        slidesPerView: 6,
        freeMode: true,
        watchSlidesProgress: true,
        breakpoints: {
            320: { slidesPerView: 4 },
            640: { slidesPerView: 6 },
        }
    });

    // Main Hero Slider
    var heroSwiper = new Swiper(".mySwiperHero", {
        spaceBetween: 10,
        navigation: {
            nextEl: ".swiper-button-next",
            prevEl: ".swiper-button-prev",
        },
        thumbs: {
            swiper: thumbSwiper,
        },
    });

});
</script>








</x-frontend-layout>
