<x-layout>
    <x-slot:heading>
        Jobs Listings
    </x-slot:heading>
    <h2>Job title: <strong>{{ $job->title }}</strong></h2>
    <p>Annual salary: <strong>${{ $job->salary }} USD per year.</strong></p>

    {{-- Works with Gate --}}
    @can('edit', $job)  
        <p class="mt-6">
            <x-button href="/jobs/{{ $job->id }}/edit">Edit Job</x-button>
        </p>
    @endcan

</x-layout>
