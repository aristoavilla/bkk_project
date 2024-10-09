<x-dashboard.layout>
    <x-slot:title>
        
    {{ $title }}
    </x-slot:title>

    @if (session()->has('success'))
    <div x-data="{isOn: false}" :class="{'hidden': isOn, 'block': !isOn }" class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative" role="alert">
        <strong class="font-bold">Success!</strong>
        <span class="block sm:inline">{{ session('success') }}</span>
        <span class="absolute top-0 bottom-0 right-0 px-4 py-3">
          <svg @click="isOn = !isOn" class="fill-current h-6 w-6 text-green-500" role="button" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><title>Close</title><path d="M14.348 14.849a1.2 1.2 0 0 1-1.697 0L10 11.819l-2.651 3.029a1.2 1.2 0 1 1-1.697-1.697l2.758-3.15-2.759-3.152a1.2 1.2 0 1 1 1.697-1.697L10 8.183l2.651-3.031a1.2 1.2 0 1 1 1.697 1.697l-2.758 3.152 2.758 3.15a1.2 1.2 0 0 1 0 1.698z"/></svg>
        </span>
      </div>
    @endif

    @if (auth()->user()->isAdmin() || auth()->user()->isTeacher())
    <button class="transition ease-in-out hover:-translate-y-1 hover:scale-110 hover:shadow-md hover:bg-blue-600 bg-blue-500 p-2 rounded-lg text-white my-3">
        <a href="{{ route('alumnus.create') }}" >Create Alumni</a>
    </button>                    
    @endif

    <!-- Search form -->
    <form action="{{ route('alumnus.index') }}" method="GET" class="my-3">
        <input type="text" name="search" placeholder="Search..." class="border border-gray-400 p-1" value="{{ request('search') }}">
        
        <!-- Gender Selection from Genders Table -->
        <select name="filter_gender" class="border border-gray-400 p-1 w-32">
            <option selected value="">All Genders</option>
            @foreach($genders as $gender)
                <option value="{{ $gender->id }}" {{ request('filter_gender') == $gender->id ? 'selected' : '' }}>
                    {{ $gender->gender }}
                </option>
            @endforeach
        </select>
    
        <!-- Batch Selection from Batches Table -->
        <select name="filter_batch" class="border border-gray-400 p-1 w-32">
            <option selected value="">All Batches</option>
            @foreach($batches as $batch)
                <option value="{{ $batch->id }}" {{ request('filter_batch') == $batch->id ? 'selected' : '' }}>
                    {{ $batch->batch }}
                </option>
            @endforeach
        </select>
    
        <button type="submit" class="bg-blue-500 p-2 text-white">Search</button>
    </form>
    
    

    <div class="container bg-slate-300 rounded">
        <table class="table-auto border border-slate-900 w-full text-center">
            <thead class="border border-slate-900 bg-slate-600 h-10 text-white">
                <tr>
                    <th class="border border-slate-400">No</th>
                    <th class="border border-slate-400 w-2/6">Name</th>
                    <th class="border border-slate-400 w-1/6">Gender</th>
                    @if (auth()->check() && auth()->user()->isAdmin() || auth()->user()->isTeacher())
                    <th class="border border-slate-400">Batch</th>
                        @if (auth()->user()->isAdmin())
                        <th class="border border-slate-400">Email</th>
                        @endif
                    <th class="border border-slate-400">Actions</th>
                    @endif
                </tr>
            </thead>
            <tbody>
                @foreach ($alumnus as $alumni)
                <tr class="border border-slate-400 odd:bg-slate-300 even:bg-slate-400 m-2">
                    <td class="border border-slate-400 p-3">{{ $alumni->id }}</td>
                    <td class="border border-slate-400">{{ $alumni->firstName.' '.$alumni->lastName }}</td>
                    <td class="border border-slate-400">{{ $alumni->gender ? $alumni->gender->gender : '-' }}</td>
                    @if (auth()->check() && auth()->user()->isAdmin() || auth()->user()->isTeacher())
                    <td class="border border-slate-400">{{ $alumni->batch->batch }}</td>
                        @if (auth()->user()->isAdmin())
                        <td class="border border-slate-400">
                            @if($alumni->user)
                                {{ $alumni->user->email }}
                            @else
                                -
                            @endif
                        </td>
                        @endif
                        <td class="border border-slate-400 text-white px-1 py-2">
                            <button class="inline transition ease-in-out hover:-translate-y-1 hover:scale-110 hover:shadow-md hover:bg-yellow-600 bg-yellow-500 px-3 py-1 rounded-lg text-black"><a href="/dashboard/alumnus/{{ $alumni->id }}/edit"><i class="fa-regular fa-pen-to-square"></i></a></button>
                            <form method="post" action="/dashboard/alumnus/{{ $alumni->id }}" class="inline">
                                @method('delete')
                                @csrf
                                <button onclick="return confirm('Are you sure tho?')" class="transition ease-in-out hover:-translate-y-1 hover:scale-110 hover:shadow-md hover:bg-red-600 bg-red-500 px-3 py-1 rounded-lg"><i class="fa-solid fa-trash"></i></button>
                            </form>
                            <button class="inline transition ease-in-out hover:-translate-y-1 hover:scale-110 hover:shadow-md hover:bg-teal-600 bg-teal-400 px-3 py-1 rounded-lg"><a href="/dashboard/alumnus/{{ $alumni->id }}"><i class="fa-regular fa-eye"></i></a></button>
                        </td>
                    @endif
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</x-dashboard.layout>