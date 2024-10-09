<x-dashboard.layout>
    <x-slot:title>{{ $title }}</x-slot:title>
    <form method="POST" action="{{ route('users.store') }}" class="w-4/5 p-2">
        @csrf
        <div class="mb-3">
            <label for="email">Email</label>
            <input type="email" name="email" class="@error('title') border border-red-500 @enderror border border-gray-600 block w-4/5 transition ease-in-out rounded-md focus:border-solid focus:border-purple-500" value="{{ old('email') }}" required>
        </div>
        <div class="mb-2">
            <label for="username">Username</label>
            <input id="username" type="text" name="username" class="@error('username')border border-red-500 @enderror border border-gray-600 block w-4/5 transition ease-in-out rounded-md focus:border-solid focus:border-purple-500" value="{{ old('username') }}" required>
        </div>
        <div class="mb-3">
            <label for="password">Password</label>
            <input id="password" type="password" name="password" class="border border-gray-600 block w-4/5 transition ease-in-out rounded-md focus:border-solid focus:border-purple-500" value="{{ old('password') }}" required>
        </div>
        <div class="mb-3">
            <label for="type_id">Type</label>
            <select id="type_id" name="type_id" class="border border-gray-600 block w-4/5 transition ease-in-out rounded-md focus:border-solid focus:border-purple-500" required>
                <option selected value="" disabled>Select Type</option>
                @foreach ($user_types as $user_type)
                    <option value="{{ $user_type->id }}" {{ old('type_id') == $user_type->id ? 'selected' : '' }}>{{ $user_type->id }} | {{ $user_type->type}}</option>
                @endforeach
            </select>
        </div>
        <button type="submit" class="bg-blue-600 py-1 px-2 rounded-md text-white">Create Alumni</button>
    </form>
</x-dashboard.layout>