// resources/js/back-to-top.js

/* --------------------------------------------------
   Elemente referenzieren
-------------------------------------------------- */
const backToTopBtn = document.getElementById('backToTop');
const ring = document.getElementById('backToTopProgress');
const progressCircle = ring?.querySelector('.progress-bar');

/* --------------------------------------------------
   Progress Ring Setup (SVG)
-------------------------------------------------- */
let circumference = 0;

if (progressCircle) {
    const radius = progressCircle.r.baseVal.value;
    circumference = radius * 2 * Math.PI;

    progressCircle.style.strokeDasharray = `${circumference} ${circumference}`;
    progressCircle.style.strokeDashoffset = circumference;
}

/* --------------------------------------------------
   Fortschritt aktualisieren
-------------------------------------------------- */
function setProgress(percent) {
    if (!progressCircle) return;
    const offset = circumference - (percent / 100) * circumference;
    progressCircle.style.strokeDashoffset = offset;
}

/* --------------------------------------------------
   Button anzeigen & Scroll-Prozent berechnen
-------------------------------------------------- */
function toggleBackToTop() {
    if (!backToTopBtn) return;

    const scrollPosition = window.scrollY;
    const documentHeight =
        document.documentElement.scrollHeight - window.innerHeight;

    // Fortschritt in %
    let percent = (scrollPosition / documentHeight) * 100;
    percent = Math.min(Math.max(percent, 0), 100); // clamp 0–100

    setProgress(percent);

    // Button anzeigen ab 300px Scroll
    if (scrollPosition > 300) {
        backToTopBtn.classList.add('visible');
    } else {
        backToTopBtn.classList.remove('visible');
    }

    // Mobile-Dynamik
    applyMobileStyles();
}

/* --------------------------------------------------
   Smooth Scroll nach oben
-------------------------------------------------- */
window.scrollToTop = function () {
    window.scrollTo({
        top: 0,
        behavior: 'smooth',
    });
};

/* --------------------------------------------------
   Mobile-Design je nach Breite anpassen
-------------------------------------------------- */
function applyMobileStyles() {
    if (!backToTopBtn) return;

    const w = window.innerWidth;

    // Alles zurücksetzen
    backToTopBtn.classList.remove('mobile-minimal', 'mobile-tiny');

    if (w <= 480) {
        backToTopBtn.classList.add('mobile-tiny');
    } else if (w <= 768) {
        backToTopBtn.classList.add('mobile-minimal');
    }
}

/* --------------------------------------------------
   Initial Setup beim Laden der Seite
-------------------------------------------------- */
window.addEventListener('load', () => {
    applyMobileStyles();
    toggleBackToTop();
});

/* --------------------------------------------------
   Events
-------------------------------------------------- */
window.addEventListener('scroll', toggleBackToTop);
window.addEventListener('resize', applyMobileStyles);
