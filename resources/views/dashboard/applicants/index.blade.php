<x-dashboard.layout>
    <x-slot:title>{{ $title }}</x-slot:title>
    <x-jobs>
         <!-- Navigation Links -->
         <div class="flex justify-center space-x-4 pb-8">
            <a href="{{ route('applicants.index') }}" class="bg-gray-100 text-black py-2 px-4 rounded-md hover:bg-gray-300">All</a>
            <a href="{{ route('applicants.pending') }}" class="bg-yellow-600 text-white py-2 px-4 rounded-md hover:bg-yellow-800">Pending</a>
            <a href="{{ route('applicants.accepted') }}" class="bg-green-600 text-white py-2 px-4 rounded-md hover:bg-green-800">Accepted</a>
            <a href="{{ route('applicants.rejected') }}" class="bg-red-600 text-white py-2 px-4 rounded-md hover:bg-red-800">Rejected</a>
        </div>

        @if ($applicants->isEmpty())
                <div class="col-span-2 text-center text-gray-500">
                    <p>No applications yet</p>
                </div>
        @else
        <div class="grid grid-cols-2 gap-4 delay pb-8">
          @foreach ($applicants as $applicant)
          <div class="transition ease-in-out hover:-translate-y-1 hover:scale-100">
            <div class=" rounded-lg p-4 text-balance transition ease-in-out hover:-translate-y-1 hover:scale-105 border border-gray-700 hover:shadow-md
                    @if($applicant->status == 'accepted') bg-green-100 
                    @elseif($applicant->status == 'pending') bg-yellow-100 
                    @elseif($applicant->status == 'rejected') bg-red-100 
                    @else bg-gray-100 
                    @endif"        
            >
              <div
              href=" / "
              class="flex items-center justify-between border border-grey-lighter px-4 py-4 sm:px-6"
            >
              <span class="w-9/10">
                <h4
                  class="font-body text-lg font-semibold text-primary pb-4"
                >
                 {{ $applicant->user->alumni->firstName.' '.$applicant->user->alumni->lastName }}
                </h4>
                <h5>Filed at: {{  $applicant->created_at->diffForHumans() }}</h5>
                <h5>Status: {{ $applicant->status }}</h5>
                <img class="object-cover w-full h-72 pb-4" src="{{ asset('storage/'.$applicant->self_picture) }}" alt="">
    
                <p class="font-body font-light text-primary pb-2">
                  {{ Str::limit($applicant->career->description, 100) }}
                </p>
                <div class="">
                @if ($applicant->status == "pending")
                <!-- Accept Button -->
                <form action="{{ route('applicants.accept', $applicant->id) }}" method="POST" class="inline">
                    @csrf
                    <button type="submit" class="bg-green-600 py-1 px-3 text-white rounded-md">
                      Accept
                    </button>
                </form>

                <!-- Reject Button -->
                <form action="{{ route('applicants.reject', $applicant->id) }}" method="POST" class="inline">
                    @csrf
                    <button type="submit" class="bg-red-600 py-1 px-3 text-white rounded-md">
                        Deny
                    </button>
                </form>
                @endif
                <button class="bg-teal-400 py-1 px-3 inline transition ease-in-out hover:-translate-y-1 hover:scale-110 hover:shadow-md hover:bg-teal-600 rounded-lg"><a href="/dashboard/applicants/{{ $applicant->id }}"><i class="fa-regular fa-eye"></i></a></button>
                </div>
              </span>
            </div>
            </div>
          </div>
          @endforeach
        </div>
        @endif
      </x-jobs>
</x-dashboard.layout>