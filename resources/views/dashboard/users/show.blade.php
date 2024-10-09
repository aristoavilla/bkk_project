<x-dashboard.layout>
    <x-slot:title>{{ $title }}</x-slot:title>

    <p><b>Email: </b>{{ $user->email }}</p>
    <p><b>Username: </b>{{ $user->username }}</p>
    <p><b>Type: </b>{{ $user->userType->type }}</p>
    <p><b>Password: </b>{{ $user->password }}</p>
</x-dashboard.layout>