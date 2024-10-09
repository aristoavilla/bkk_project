<x-dashboard.layout>
    <x-slot:title>{{ $title }}</x-slot:title>
    <p><b>Name: </b>{{ $alumni->firstName.' '.$alumni->lastName }}</p>
    <p><b>Gender: </b>{{ $alumni->gender->gender }}</p>
    <p><b>Batch: </b>{{ $alumni->batch->batch }}</p>
    @if (auth()->user()->isAdmin())
    <p><b>Email: </b>{{ $alumni->email }}</p>
    @endif
</x-dashboard.layout>