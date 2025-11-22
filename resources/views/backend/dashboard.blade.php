@extends('backend.layout.app')

@section('content')

{{-- Titel für die Header-Bar --}}
@php($title = 'Admin Dashboard')

{{-- STATISTIKEN --}}
<div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6 mb-10">

    {{-- Aktive Fahrzeuge --}}
    <div class="stat-card glass-effect rounded-2xl p-6 border border-[#333]">
        <div class="flex justify-between items-start">
            <div>
                <div class="text-2xl font-bold">{{ $activeVehicles ?? 0 }}</div>
                <div class="text-[#BFBFBF]">Aktive Fahrzeuge</div>
            </div>
            <div class="w-12 h-12 bg-gradient-to-r from-[#B91C1C] to-[#8B0000] rounded-lg flex items-center justify-center">
                <i class="fas fa-car"></i>
            </div>
        </div>
    </div>

    {{-- Verkaufte Fahrzeuge --}}
    <div class="stat-card glass-effect rounded-2xl p-6 border border-[#333]">
        <div class="flex justify-between items-start">
            <div>
                <div class="text-2xl font-bold">{{ $soldVehicles ?? 0 }}</div>
                <div class="text-[#BFBFBF]">Verkaufte Fahrzeuge</div>
            </div>
            <div class="w-12 h-12 bg-gradient-to-r from-[#B91C1C] to-[#8B0000] rounded-lg flex items-center justify-center">
                <i class="fas fa-chart-line"></i>
            </div>
        </div>
    </div>

    {{-- Service-Termine --}}
    <div class="stat-card glass-effect rounded-2xl p-6 border border-[#333]">
        <div class="flex justify-between items-start">
            <div>
                <div class="text-2xl font-bold">{{ $serviceAppointments ?? 0 }}</div>
                <div class="text-[#BFBFBF]">Service-Termine</div>
            </div>
            <div class="w-12 h-12 bg-gradient-to-r from-[#B91C1C] to-[#8B0000] rounded-lg flex items-center justify-center">
                <i class="fas fa-tools"></i>
            </div>
        </div>
    </div>

    {{-- Neue Anfragen --}}
    <div class="stat-card glass-effect rounded-2xl p-6 border border-[#333]">
        <div class="flex justify-between items-start">
            <div>
                <div class="text-2xl font-bold">{{ $newRequests ?? 0 }}</div>
                <div class="text-[#BFBFBF]">Neue Anfragen</div>
            </div>
            <div class="w-12 h-12 bg-gradient-to-r from-[#B91C1C] to-[#8B0000] rounded-lg flex items-center justify-center">
                <i class="fas fa-envelope"></i>
            </div>
        </div>
    </div>

</div>

{{-- HAUPTBEREICH: Fahrzeuge-Liste + Fahrzeug-Form --}}
<div class="grid grid-cols-1 xl:grid-cols-3 gap-6 mb-10">

    {{-- Fahrzeuge Liste --}}
    <div class="xl:col-span-2 glass-effect rounded-2xl border border-[#333]">
        <div class="p-6 border-b border-[#333] flex justify-between items-center">
            <h2 class="text-2xl font-bold">Fahrzeuge Verwaltung</h2>

            <a href="{{ route('backend.vehicles.create') }}"
               class="bg-gradient-to-r from-[#B91C1C] to-[#8B0000] text-white px-4 py-2 rounded-lg hover:opacity-80">
               <i class="fas fa-plus mr-2"></i> Neues Fahrzeug
            </a>
        </div>


<livewire:backend.vehicles.index
    mode="dashboard"
wire:on.vehicle-added="refreshVehicles"
/>




    </div>

    {{-- Form-Sidebar (optional) --}}
    <div>
        <livewire:backend.vehicles.quick-create />
    </div>

</div>

{{-- Service Termine & Anfragen --}}
<div class="grid grid-cols-1 lg:grid-cols-2 gap-6">

    {{-- Service-Termine --}}
    <livewire:backend.service.recent-appointments />
    {{-- Neue Anfragen --}}
    <livewire:backend.requests.latest />

</div>

@endsection
