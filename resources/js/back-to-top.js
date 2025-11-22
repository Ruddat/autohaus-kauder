// resources/js/back-to-top.js

const backToTopBtn = document.getElementById('backToTop');

function toggleBackToTop() {
    if (!backToTopBtn) return;

    const scrollPosition = window.scrollY || document.documentElement.scrollTop;
    const windowHeight = window.innerHeight;
    const documentHeight = document.documentElement.scrollHeight;

    // Progress (falls du später die Progress-Variante aktivierst)
    const scrollPercent = (scrollPosition / (documentHeight - windowHeight)) * 100;
    backToTopBtn.style.setProperty('--progress', `${scrollPercent}%`);

    // Einblenden ab 300px Scroll
    if (scrollPosition > 300) {
        backToTopBtn.classList.add('visible');
    } else {
        backToTopBtn.classList.remove('visible');
    }

    // Mobile Varianten
    if (window.innerWidth <= 480) {
        backToTopBtn.classList.add('mobile-tiny');
    } else if (window.innerWidth <= 768) {
        backToTopBtn.classList.add('mobile-minimal');
    } else {
        backToTopBtn.classList.remove('mobile-minimal', 'mobile-tiny');
    }
}

// Smooth Scroll nach oben
window.scrollToTop = function () {
    window.scrollTo({
        top: 0,
        behavior: 'smooth',
    });
};

function checkMobile() {
    if (!backToTopBtn) return;

    if (window.innerWidth <= 480) {
        backToTopBtn.classList.add('mobile-tiny');
    } else if (window.innerWidth <= 768) {
        backToTopBtn.classList.add('mobile-minimal');
    }
}

// Events
window.addEventListener('scroll', toggleBackToTop);
window.addEventListener('resize', checkMobile);
window.addEventListener('load', () => {
    checkMobile();
    toggleBackToTop();
});
