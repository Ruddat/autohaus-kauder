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
        .map-container {
            height: 400px;
            border-radius: 16px;
            overflow: hidden;
        }
        .contact-card {
            transition: all 0.3s ease;
        }
        .contact-card:hover {
            transform: translateY(-5px);
        }
    </style>
    @include('frontend.contact.sections.hero')

    @include('frontend.contact.sections.main')

    @include('frontend.contact.sections.services')

    @include('frontend.contact.sections.team')

</x-frontend-layout>
