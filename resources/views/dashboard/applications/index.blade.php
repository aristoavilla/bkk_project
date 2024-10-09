<x-dashboard.layout>
  <x-slot:title>My Applications</x-slot:title>

  <div class="container mx-auto py-8">
      <h1 class="text-2xl font-semibold mb-6">My Applications</h1>

      <div class="grid grid-cols-2 gap-4 delay pb-8">
          
          <!-- Button to Find a New Job -->
          <div class="flex justify-center items-center">
              <a href="{{ route('careers.index') }}" class="w-full">
                  <div class="transition ease-in-out hover:-translate-y-1 hover:scale-100 bg-blue-500 rounded-lg p-4 text-center text-white hover:bg-blue-600">
                      <i class="fa fa-plus text-3xl"></i>
                      <p class="font-body text-lg font-semibold mt-2">Find a New Job</p>
                  </div>
              </a>
          </div>

          <!-- Existing Applications -->
          @foreach ($applications as $application)
          <div class="transition ease-in-out hover:-translate-y-1 hover:scale-100">
              <div class="bg-gray-100 rounded-lg p-4 text-balance transition ease-in-out hover:-translate-y-1 hover:scale-105 border border-gray-700 hover:shadow-md">
                  <div class="flex items-center justify-between border border-grey-lighter px-4 py-4 sm:px-6">
                      <span class="w-9/10">
                          <h4 class="font-body text-lg font-semibold text-primary pb-4">
                              {{ $application->career->title }}
                          </h4>
                          <p class="font-body font-light text-primary pb-2">
                              {{ Str::limit($application->description, 100) }}
                          </p>
                          <p class="font-body text-sm text-gray-600 pb-4">
                              Status: {{ ucfirst($application->status) }}
                          </p>
                          <img class="object-cover w-full h-72 pb-4" src="{{ asset('storage/'.$application->self_picture) }}" alt="">

                          <!-- Actions for applications -->
                          <div class="">
                              <button class="bg-green-600 py-1 px-3 text-white rounded-md"><a href="/application">View</a></button>
                          </div>
                      </span>
                  </div>
              </div>
          </div>
          @endforeach

      </div>
  </div>

</x-dashboard.layout>
