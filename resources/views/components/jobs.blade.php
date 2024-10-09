{{-- Jobs Section --}}
<div class="pb-16 lg:pb-20">

    <div class="flex items-center pb-6">
      <img src="{{ asset('storage/img/icon-project.png') }}" alt="icon story" />
      <h3
        class="ml-3 font-body text-2xl font-semibold text-primary"
      >
        Applicants
      </h3>
    </div>

    <div>
      {{ $slot }}
    </div>

  </div>
  {{-- End of job section --}}