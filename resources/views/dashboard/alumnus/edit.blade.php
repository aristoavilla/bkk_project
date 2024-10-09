<x-dashboard.layout>
    <x-slot:title>{{ $title }}</x-slot:title>
    <form method="POST" action="/dashboard/alumnus/{{ $alumni->id }}" class="w-4/5 p-2">
    @method('put')
    @csrf
        <div class="mb-2">
            <label for="firstName">First Name</label>
            <input id="firstName" type="text" name="firstName" class="border border-gray-600 block w-4/5 transition ease-in-out rounded-md focus:border-solid focus:border-purple-500" value="{{ old('firstName', $alumni->firstName) }}">
        </div>
        <div class="mb-3">
            <label for="lastName">Last Name</label>
            <input id="lastName" type="text" name="lastName" class="border border-gray-600 block w-4/5 transition ease-in-out rounded-md focus:border-solid focus:border-purple-500" value="{{ old('lastName', $alumni->lastName) }}">
        </div>
        <div class="mb-3">
            <label for="gender">Gender</label>
            <select id="gender" name="gender_id" class="border border-gray-600 block w-4/5 transition ease-in-out rounded-md focus:border-solid focus:border-purple-500" value="{{ old('gender_id', $alumni->gender_id) }}">
                <option selected value="" disabled>Select Gender</option>
                @foreach ($genders as $gender)
                    <option value="{{ $gender->id }}" {{ old('gender_id') || $gender->id == $alumni->gender->id ? 'selected' : '' }}>{{ $gender->gender}}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="batch">Batch</label>
            <select id="batch" name="batch_id" class="border border-gray-600 block w-4/5 transition ease-in-out rounded-md focus:border-solid focus:border-purple-500" style="max-height: 150px; overflow-y: auto;" value="{{ old('batch_id', $alumni->batch_id) }}">
                <option selected value="" disabled>Select Batch</option>
                @foreach ($batches as $batch)
                <option value="{{ $batch->id }}" {{ old('batch_id') || $batch->id == $alumni->batch->id ? 'selected' : '' }}>{{ $batch->batch}}</option>
                @endforeach
            </select>
        </div>
        <button type="submit" class="bg-yellow-400 py-1 px-2 rounded-md text-black">Update Alumni</button>
    </form>
</x-dashboard.layout>