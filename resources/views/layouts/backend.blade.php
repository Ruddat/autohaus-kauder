<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <title>Autohaus Admin</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @livewireStyles
</head>
<body class="bg-gray-100 text-gray-900">

    <livewire:backend.sidebar />

    <main class="p-6">
        {{ $slot }}
    </main>

    @livewireScripts
</body>
</html>
