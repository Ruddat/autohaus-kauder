<x-frontend-layout>


    <style>
        body {
            font-family: 'Inter', sans-serif;
        }
        .gradient-bg {
            background: linear-gradient(135deg, #1a1a1a 0%, #2d2d2d 100%);
        }
        .glass-effect {
            background: rgba(30, 30, 30, 0.8);
            backdrop-filter: blur(10px);
        }
        .team-card {
            transition: all 0.3s ease;
        }
        .team-card:hover {
            transform: translateY(-5px);
        }
        .showroom-item {
            transition: all 0.3s ease;
        }
        .showroom-item:hover {
            transform: scale(1.02);
        }
        .timeline-item {
            position: relative;
        }
        .timeline-item:not(:last-child):after {
            content: '';
            position: absolute;
            bottom: -2rem;
            left: 2rem;
            width: 2px;
            height: 2rem;
            background: #333;
        }
    </style>


<style>
.reveal {
    opacity: 0;
    transform: translateY(18px);
    transition: all .8s ease;
}
.reveal.reveal--in {
    opacity: 1;
    transform: translateY(0px);
}
</style>

<script>
document.addEventListener("DOMContentLoaded", () => {
  const els = document.querySelectorAll(".reveal");
  const io = new IntersectionObserver((entries) => {
    entries.forEach(e => {
      if (e.isIntersecting) {
        e.target.classList.add("reveal--in");
        io.unobserve(e.target);
      }
    });
  }, { threshold: 0.15 });
  els.forEach(el => io.observe(el));
});
</script>



    @include('frontend.about.sections.hero')
    @include('frontend.about.sections.tradition')
    @include('frontend.about.sections.values')
    @include('frontend.about.sections.showroom')
    @include('frontend.about.sections.team')
    @include('frontend.about.sections.timeline')
    @include('frontend.about.sections.cta')




</x-frontend-layout>
