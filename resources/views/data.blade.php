<x-layout>
    <!-- Your content -->
    {{-- <img src="{{ asset('storage/statue.jpeg') }}" alt="" style="display:block; width: 100px
    "> --}}
    <x-slot:title>{{ $title }}</x-slot:title>
  
    <!-- First container - Individual Block -->
    <div class="bg-gray-300 rounded-lg p-4 mb-4 delay">
      <h2 class="font-bold text-2xl">{{ $data['title'] }}</h2>
      <div class="flex justify-center">
          <p class="text-4xl">{{ $data['number'] }}</p>
      </div>
      <h3 class="font-light text-slate-700 text-sm">{{ Str::limit($data['desc']), 150 }}</h3>
      <a href="/" class="hover:underline text-blue-500">&laquo; Read more</a>
    </div>
  
  </x-layout>