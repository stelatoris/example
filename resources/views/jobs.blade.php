<x-layout>
    <x-slot:heading>
        Jobs Listings
    </x-slot:heading>

    @foreach ($jobs as $job)
        <li>
            <a href="/jobs/{{$job['id']}}" class="text-blue-600 hover:underline">
                <strong>
                    {{ $job['title'] }}:</strong> Pays {{ $job['salary'] }} per year.
                
            </a>

        </li>
    @endforeach
</x-layout>
