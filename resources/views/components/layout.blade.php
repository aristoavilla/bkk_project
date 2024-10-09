<!DOCTYPE html>
<html lang="en">
  <head>
  <meta charset="utf-8" />

  <meta content="IE=edge,chrome=1" http-equiv="X-UA-Compatible" />

  <meta
    content="width=device-width, initial-scale=1, shrink-to-fit=no"
    name="viewport"
  />

  <title>{{ $title }} | BKK Skada</title>

  <meta property="og:title" content="Homepage | Atlas Template" />

  <meta property="og:locale" content="en_US" />

  @vite('resources/css/app.css')

  <link
    rel="canonical"
    href="https://atlas.tailwindmade.com/"
  />

  <meta
    property="og:url"
    content="https://atlas.tailwindmade.com/"
  />

  <meta
    name="description"
    content="Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua."
  />

  <link rel="icon" type="image/png" href="{{ asset('storage/img/favicon.png') }}" />

  <meta property="og:site_name" content="Atlas Template" />

  <meta property="og:image" content="https://atlas.tailwindmade.com/assets/img/social.jpg" />

  <meta name="twitter:card" content="summary_large_image" />

  <meta name="twitter:site" content="@tailwindmade" />

  <link
    crossorigin="crossorigin"
    href="https://fonts.gstatic.com"
    rel="preconnect"
  />

  <link
    as="style"
    href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap"
    rel="preload"
  />

  <link
    href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap"
    rel="stylesheet"
  />

  <link
    rel="stylesheet"
    href="https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css"
  />

  <link
    crossorigin="anonymous"
    href="{{ asset('css/main.min.css') }}"
    media="screen"
    rel="stylesheet"
  />

  <script src="//cdnjs.cloudflare.com/ajax/libs/highlight.js/10.5.0/highlight.min.js"></script>

  <link
    rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/highlight.js/10.5.0/styles/atom-one-dark.min.css"
  />

  <script>
    hljs.initHighlightingOnLoad();
  </script>

  <!--Alpine Js V3-->
  <script src="https://unpkg.com/alpinejs@3.1.4/dist/cdn.min.js" defer></script>
</head>

{{-- Body --}}
<body
    x-data="global()"
    x-init="themeInit()"
    :class="isMobileMenuOpen ? 'max-h-screen overflow-hidden relative' : ''"
    class="dark:bg-primary"
  >
  
  {{ $slot }}

  <script src="{{ asset('js/main.js') }}"></script>
    
</body>
</html>
