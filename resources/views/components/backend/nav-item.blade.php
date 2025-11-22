@props([
    'icon' => null,
    'label' => '',
    'route' => null,
])

@php
    $isActive = $route && request()->routeIs($route . '*');
@endphp

<a href="{{ $route ? route($route) : '#' }}"
   class="flex items-center px-4 py-3 rounded-lg transition
          {{ $isActive ? 'bg-[#B91C1C] text-white' : 'text-[#BFBFBF] hover:bg-[#2D2D2D]' }}">

    @if($icon)
        <i class="fas {{ $icon }} w-6 mr-3"></i>
    @endif

    <span class="text-base">{{ $label }}</span>
</a>
