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
        <a href="{{ route('careers.create') }}" >Create Career</a>
    </button>                    
    @endif
    
    @if (!auth()->user()->isStudent())
    <div class="container bg-slate-300 rounded">
        <table class="table-auto border border-slate-900 w-full text-center">
            <thead class="border border-slate-900 bg-slate-600 h-10 text-white">
                <tr>
                    <th class="border border-slate-400">No</th>
                    <th class="border border-slate-400 columns-md">Company</th>
                    <th class="border border-slate-400">Location</th>
                    <th class="border border-slate-400">Job Title</th>
                    <th class="border border-slate-400">Description</th>
                    @if (auth()->user()->isAdmin() || auth()->user()->isTeacher())
                    <th class="border border-slate-400">Actions</th>
                    @endif
                </tr>
            </thead>
            <tbody>
                @foreach ($careers as $career)
                <tr class="border border-slate-400 odd:bg-slate-300 even:bg-slate-400 m-2">
                    <td class="border border-slate-400 px-4 py-2">{{ $career->id }}</td>
                    <td class="border border-slate-400 px-4 py-2">{{ $career->company }}</td>
                    <td class="border border-slate-400 px-4 py-2">{{ $career->location }}</td>
                    <td class="border border-slate-400 px-4 py-2">{{ $career->job_title }}</td>   
                    <td class="border border-slate-400 px-4 py-2">{{ Str::limit(strip_tags($career->description), 50)  }}</td>
                    @if (auth()->user()->isAdmin() || auth()->user()->isTeacher())
                    <td class="border border-slate-400 text-white columns-md px-1 py-2">    
                        <button class="inline transition ease-in-out hover:-translate-y-1 hover:scale-110 hover:shadow-md hover:bg-yellow-600 bg-yellow-500 px-3 py-1 rounded-lg text-black"><a href="/dashboard/careers/{{ $career->id }}/edit"><i class="fa-regular fa-pen-to-square"></i></a></button>
                        <form method="post" action="/dashboard/careers/{{ $career->id }}" class="inline">
                            @method('delete')
                            @csrf
                            <button onclick="return confirm('Are you sure tho?')" class="transition ease-in-out hover:-translate-y-1 hover:scale-110 hover:shadow-md hover:bg-red-600 bg-red-500 px-3 py-1 rounded-lg"><i class="fa-solid fa-trash"></i></button>
                        </form>
                        <button class="inline transition ease-in-out hover:-translate-y-1 hover:scale-110 hover:shadow-md hover:bg-teal-600 bg-teal-400 px-3 py-1 rounded-lg"><a href="/dashboard/careers/{{ $career->id }}"><i class="fa-regular fa-eye"></i></a></button>
                    </td>
                    @endif
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    @endif

    @if (auth()->user()->isStudent())
    <div class="grid grid-cols-2 gap-4 delay pb-8">
        @foreach ($paginatedCareers as $career)
        <div class="transition ease-in-out hover:-translate-y-1 hover:scale-105">
        <div class="bg-gray-100 rounded-lg p-4 text-balance transition ease-in-out hover:-translate-y-1 hover:scale-105 border border-gray-700 hover:shadow-md">
            <div
            href=" / "
            class="flex items-center justify-between border border-grey-lighter px-4 py-4 sm:px-6"
        >
            <span class="w-9/10">
            <h4
                class="font-body text-lg font-semibold text-primary pb-4"
            >
            {{ $career->job_title }}
            </h4>
            <img class="pb-4" src="{{ asset('storage/img/post-image-01.png') }}" alt="">

            <p class="font-body font-light text-primary pb-2">
                {{ Str::limit(strip_tags($career->description), 100) }}
            </p>
            <div class="">
                @auth
                    <button class="bg-blue-600 py-1 px-3 text-white rounded-md"><a href="{{ route('applications.create', $career->id) }}">Apply</a></button>
                    @else
                    <button class="bg-blue-600 py-1 px-3 text-white rounded-md"><a href="{{ route('login') }}">Apply</a></button>
                @endauth
            </div>
            </span>
        </div>
        </div>
        </div>
        @endforeach
    </div>

    <!-- Pagination Links -->
    <div class="mt-6">
        {{ $paginatedCareers->links() }} <!-- Renders pagination links -->
    </div>
    @endif

    
</x-dashboard.layout>