<x-frontend-layout>
    @include('frontend.vehicles.sections.header', ['vehicle' => $vehicle])
    @include('frontend.vehicles.sections.content')
    @include('frontend.vehicles.sections.similar')
</x-frontend-layout>
