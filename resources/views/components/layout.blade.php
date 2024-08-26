<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite('resources/css/app.css')
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.14.1/dist/cdn.min.js"></script>
    <link rel="stylesheet" href="https://rsms.me/inter/inter.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Anek+Devanagari:wght@100..800&display=swap" rel="stylesheet">
    <title>{{ $title }}</title>
</head>
<body class="h-full">
  <div class="min-h-full">
    <div class="flex flex-col xl:flex-row h-screen">
      <x-side-bar></x-side-bar>
      <div class="flex-col">
        {{-- <x-navbar></x-navbar> --}}
        <x-header>{{ $title }}</x-header>
        <main class="inline">
          <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">
            {{ $slot }}
          </div>
        </main>
      </div>
    </div>
  </div>
</body>
</html>