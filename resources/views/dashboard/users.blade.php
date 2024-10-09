<x-dashboard.layout>
    <x-slot:title>
        {{ $title }}
    </x-slot:title>
    <button class="transition ease-in-out hover:-translate-y-1 hover:scale-110 hover:shadow-md hover:bg-blue-600 bg-blue-500 p-2 rounded-lg text-white my-3">Create User</button>
    <div class="container bg-slate-300 rounded">
        <table class="table-auto border border-slate-900 w-full text-center">
            <thead class="border border-slate-900 bg-slate-600 h-10 text-white">
                <tr>
                    <th class="border border-slate-400">No</th>
                    <th class="border border-slate-400">Email</th>
                    <th class="border border-slate-400">Username</th>
                    <th class="border border-slate-400">Type</th>
                    <th class="border border-slate-400"></th>
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $user)
                <tr class="border border-slate-400 odd:bg-slate-300 even:bg-slate-400 m-2">
                    <td class="border border-slate-400 p-3">{{ $user->id }}</td>
                    <td class="border border-slate-400">{{ $user->email }}</td>
                    <td class="border border-slate-400">{{ $user->username }}</td>
                    <td class="border border-slate-400">{{ $user->type }}</td>
                    <td class="border border-slate-400 text-white">
                        <button class="transition ease-in-out hover:-translate-y-1 hover:scale-110 hover:shadow-md hover:bg-blue-600 bg-blue-500 px-3 py-1 rounded-lg">Edit</button>
                        <button class="transition ease-in-out hover:-translate-y-1 hover:scale-110 hover:shadow-md hover:bg-red-600 bg-red-500 px-3 py-1 rounded-lg">Delete</button>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</x-dashboard.layout>