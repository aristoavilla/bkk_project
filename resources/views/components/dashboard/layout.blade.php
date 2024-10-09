<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite('resources/css/app.css')

    {{-- Alpine.JS script --}}
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.14.1/dist/cdn.min.js"></script>

    {{-- Anek Devanagari font fetched from Google --}}
    <link rel="stylesheet" href="https://rsms.me/inter/inter.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Anek+Devanagari:wght@100..800&display=swap" rel="stylesheet">

    {{-- Trix Editor --}}
    <link rel="stylesheet" type="text/css" href="https://unpkg.com/trix@2.0.8/dist/trix.css">
    <script type="text/javascript" src="https://unpkg.com/trix@2.0.8/dist/trix.umd.min.js"></script>

    <!-- Select2 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

    <!-- Select2 JS -->
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

    <title> {{ $title }} | BKK Skada</title>
</head>
{{-- End of the head element --}}

{{-- Body --}}
<body>
  <div class="flex flex-col xl:flex-row min-h-screen">
    {{-- Children of the div parent above: x-side-bar & div --}}
    <x-side-bar/>
    <div class="flex-col w-full">
      <x-dashboard.navbar/>
      <x-header>{{ request()->is('dashboard') ? 'Welcome, '.auth()->user()->alumni->firstName.' '.auth()->user()->alumni->lastName : $title }}</x-header>
      {{-- Main --}}
      <main class="inline">
        <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">
          {{ $slot }}
        </div>
      </main>
    </div>
  </div>
  <script src="https://cdn.jsdelivr.net/npm/gsap@3.12.5/dist/gsap.min.js"></script>
  <script src="https://kit.fontawesome.com/ed3c904095.js" crossorigin="anonymous"></script>
  {{-- This script could make an animation for elements one by one so it would be seen
  so cool but idk --}}
  <script>
    gsap.from(".delay", {
      opacity: 0,
      y: 20,
      stagger: 0.2, // Delay between each element
      duration: 1,
      ease: "ease-out"
    });
  </script>

  <script>
    $(document).ready(function() {
        $('#batch').select2({
            width: '100%', // Make it responsive
            placeholder: "Select Batch", // Placeholder
            allowClear: true, // Allows clearing the selection
        });
    });
  </script>
</body>
</html>