<x-layout>
    <x-slot:heading>
        Jobs Listings
    </x-slot:heading>
    <h2>Job title: <strong>{{ $job['title'] }}</strong></h2>
    <p>Annual salary: <strong>{{ $job['salary'] }}</strong></p>
    <p class="mt-6">
        <x-button href="">Edit Job</x-button>
    </p>
</x-layout>
