<x-layout>
    <x-slot:heading>
        Job
    </x-slot:heading>
    <h2 class="font-bold text-lg">{{$job['title']}}</h2>
    <p>
        This Job Pay {{$job['salary']}} per year.
    </p>
</x-layout>
