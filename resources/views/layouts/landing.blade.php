<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link href="https://unpkg.com/aos@2.3.4/dist/aos.css" rel="stylesheet">
    <title>@yield('title', 'Rental Mobil')</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="antialiased bg-gray-50 text-gray-800">
    @include('partials.navbar')

    <main class="min-h-screen">
        @yield('content')
    </main>

    @if (!request()->routeIs('login', 'register'))
        @include('partials.footer')
    @endif

    <script src="https://unpkg.com/aos@2.3.4/dist/aos.js"></script>

    <script>
        AOS.init({
            duration: 900,
            once: true,
            offset: 120,
        });
    </script>
</body>

</html>
