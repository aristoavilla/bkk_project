<x-dashboard.layout>
    <x-slot:title>{{ $title }}</x-slot:title>
    <form method="POST" action="/dashboard/careers/{{ $career->id}}" class="w-4/5 p-2">
        @method('put')
        @csrf
        <div class="mb-2">
            <label for="company">Company</label>
            <input type="text" name="company" class="border border-gray-600 block w-4/5 transition ease-in-out rounded-md focus:border-solid focus:border-purple-500" value="{{ old('title', $career->company) }}">
        </div>
        <div class="mb-3">
            <label for="location">Location</label>
            <input type="text" name="location" class="border border-gray-600 block w-4/5 transition ease-in-out rounded-md focus:border-solid focus:border-purple-500" value="{{ old('location', $career->location) }}">
        </div>
        <div class="mb-3">
            <label for="job_title">Job Title</label>
            <input type="text" name="job_title" class="border border-gray-600 block w-4/5 transition ease-in-out rounded-md focus:border-solid focus:border-purple-500" value="{{ old('job_title', $career->job_title) }}">
        </div>
        <div class="mb-3">
            <label for="user_id">User ID</label>
            <input type="text" name="user_id" class="border border-gray-600 block w-4/5 transition ease-in-out rounded-md focus:border-solid focus:border-purple-500" value="{{ auth()->user()->id}}" readonly>
        </div>
        <div class="mb-3 w-4/5">
            <label for="description">Description</label>
            <input id="description" type="hidden" name="description" value="{{ old('description' , $career->description) }}">
            <trix-editor input="description" class="transition ease-in-out rounded-md focus:border-solid focus:border-purple-500"></trix-editor>
        </div>
        <button type="submit" class="bg-yellow-500 py-1 px-2 rounded-md">Update Career</button>
    </form>
</x-dashboard.layout>