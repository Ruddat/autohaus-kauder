<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title ?? 'Admin Panel - Autohaus Kauder' }}</title>

 
    {{-- Vite --}}
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    {{-- Fonts --}}
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    {{-- Icons --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <style>
        body { font-family: 'Inter', sans-serif; }
        .glass-effect { background: rgba(30,30,30,0.8); backdrop-filter: blur(10px); }
        .sidebar { transition: all 0.3s ease; transform: translateX(-100%); z-index: 1000; }
        .sidebar.mobile-open { transform: translateX(0); }
        .content-area { transition: all 0.3s ease; }
        .mobile-overlay { display:none; position:fixed; inset:0; background:rgba(0,0,0,0.5); z-index:999; }
        .mobile-overlay.active { display:block; }
        @media(min-width:1024px){
            .sidebar{ transform:translateX(0); position:fixed; width:16rem; }
            .content-area{ margin-left:16rem; }
            .sidebar.collapsed{ width:5rem; }
            .sidebar.collapsed + .content-area{ margin-left:5rem; }
        }
    </style>

    @stack('styles')
    @livewireStyles
</head>

<body class="bg-[#0f0f0f] text-white">

{{-- Mobile Overlay --}}
<div class="mobile-overlay" id="mobileOverlay"></div>

{{-- Sidebar --}}
@include('backend.layout.sidebar')

{{-- Main Content --}}
<div class="content-area min-h-screen">

    {{-- Top Bar --}}
    @include('backend.layout.header')

    {{-- Dynamic Page Content --}}
    <main class="p-4 lg:p-6">
        @yield('content')
    </main>
</div>

{{-- Scripts --}}
<script>
    function toggleSidebar(){
        const sidebar = document.getElementById('sidebar');
        const overlay = document.getElementById('mobileOverlay');
        sidebar.classList.toggle('mobile-open');
        overlay.classList.toggle('active');
    }

    document.getElementById('mobileOverlay').addEventListener('click', toggleSidebar);

    window.addEventListener('resize', () => {
        if(window.innerWidth >= 1024){
            document.getElementById('sidebar').classList.remove('mobile-open');
            document.getElementById('mobileOverlay').classList.remove('active');
        }
    });
</script>

@stack('scripts')
@livewireScripts
</body>
</html>
