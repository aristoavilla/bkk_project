<x-dashboard.layout>
    <x-slot:title>
        {{ $title }}
    </x-slot:title>
    @if (auth()->user()->isAdmin() || auth()->user()->isTeacher())
    <button class="transition ease-in-out hover:-translate-y-1 hover:scale-110 hover:shadow-md hover:bg-blue-600 bg-blue-500 p-2 rounded-lg text-white my-3">
        <a href="{{ route('users.create') }}" >Create User</a>
    </button>                    
    @endif
    <div class="container bg-slate-300 rounded">
        <table class="table-auto border border-slate-900 w-full text-center">
            <thead class="border border-slate-900 bg-slate-600 h-10 text-white">
                <tr>
                    <th class="border border-slate-400">No</th>
                    <th class="border border-slate-400">Email</th>
                    <th class="border border-slate-400">Username</th>
                    <th class="border border-slate-400">Type</th>
                    <th class="border border-slate-400">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $user)
                <tr class="border border-slate-400 odd:bg-slate-300 even:bg-slate-400 m-2">
                    <td class="border border-slate-400 p-3">{{ $user->id }}</td>
                    <td class="border border-slate-400">{{ $user->email }}</td>
                    <td class="border border-slate-400">{{ $user->username }}</td>
                    <td class="border border-slate-400">{{ $user->userType->type }}</td>
                    @if (auth()->user()->isAdmin() || auth()->user()->isTeacher())
                    <td class="border border-slate-400 text-white px-1 py-2">
                        <button class="inline transition ease-in-out hover:-translate-y-1 hover:scale-110 hover:shadow-md hover:bg-yellow-600 bg-yellow-500 px-3 py-1 rounded-lg text-black"><a href="/dashboard/users/{{ $user->id }}/edit"><i class="fa-regular fa-pen-to-square"></i></a></button>
                        <form method="post" action="/dashboard/users/{{ $user->id }}" class="inline">
                            @method('delete')
                            @csrf
                            <button onclick="return confirm('Are you sure tho?')" class="transition ease-in-out hover:-translate-y-1 hover:scale-110 hover:shadow-md hover:bg-red-600 bg-red-500 px-3 py-1 rounded-lg"><i class="fa-solid fa-trash"></i></button>
                        </form>
                        <button class="inline transition ease-in-out hover:-translate-y-1 hover:scale-110 hover:shadow-md hover:bg-teal-600 bg-teal-400 px-3 py-1 rounded-lg"><a href="/dashboard/users/{{ $user->id }}"><i class="fa-regular fa-eye"></i></a></button>
                    </td>
                    @endif
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</x-dashboard.layout>
