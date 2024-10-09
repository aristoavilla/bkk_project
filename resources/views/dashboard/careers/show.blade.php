<x-dashboard.layout>
    <x-slot:title>{{ $title }}</x-slot:title>
    <p><b>Company: </b>{{ $career->company }}</p>
    <p><b>Location: </b>{{ $career->location }}</p>
    <p><b>Job Title: </b>{{ $career->job_title }}</p>
    <p><b>Description: </b>{{ $career->description }}</p>
</x-dashboard.layout>