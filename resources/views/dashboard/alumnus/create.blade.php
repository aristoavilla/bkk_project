<x-dashboard.layout>
    <x-slot:title>{{ $title }}</x-slot:title>
    <form method="POST" action="{{ route('alumnus.store') }}" class="w-4/5 p-2">
    @csrf
        <div class="mb-2">
            <label for="firstName">First Name</label>
            <input id="firstName" type="text" name="firstName" class="border border-gray-600 block w-4/5 transition ease-in-out rounded-md focus:border-solid focus:border-purple-500" required>
        </div>
        <div class="mb-3">
            <label for="lastName">Last Name</label>
            <input id="lastName" type="text" name="lastName" class="border border-gray-600 block w-4/5 transition ease-in-out rounded-md focus:border-solid focus:border-purple-500" required>
        </div>
        <div class="mb-3">
            <label for="gender">Gender</label>
            <select id="gender" name="gender_id" class="border border-gray-600 block w-4/5 transition ease-in-out rounded-md focus:border-solid focus:border-purple-500" required>
                <option selected value="" disabled>Select Gender</option>
                @foreach ($genders as $gender)
                    <option value="{{ $gender->id }}" {{ old('gender_id') == $gender->id ? 'selected' : '' }}>{{ $gender->gender}}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="batch">Batch</label>
            <select id="batch" name="batch_id" class="border border-gray-600 block w-4/5 transition ease-in-out rounded-md focus:border-solid focus:border-purple-500" required style="max-height: 150px; overflow-y: auto;">
                <option selected value="" disabled>Select Batch</option>
                @foreach ($batches as $batch)
                <option value="{{ $batch->id }}" {{ old('batch_id') == $batch->id ? 'selected' : '' }}>{{ $batch->batch}}</option>
                @endforeach
            </select>
        </div>
        <button type="submit" class="bg-blue-600 py-1 px-2 rounded-md text-white">Create Alumni</button>
    </form>
</x-dashboard.layout>