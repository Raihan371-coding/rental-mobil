<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link href="https://unpkg.com/aos@2.3.4/dist/aos.css" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Big+Shoulders+Display:wght@600;700;800&family=Inter:wght@400;500;600&family=IBM+Plex+Mono:wght@500;600&display=swap"
        rel="stylesheet">
    <title>@yield('title', 'Rental Mobil')</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <style>
        .font-display {
            font-family: 'Big Shoulders Display', sans-serif;
        }

        .font-mono-plate {
            font-family: 'IBM Plex Mono', monospace;
        }

        body {
            font-family: 'Inter', sans-serif;
        }

        .route-line {
            background-image: repeating-linear-gradient(90deg, #0ea5e9 0 20px, transparent 20px 36px);
            height: 3px;
        }
    </style>
</head>

<body class="antialiased bg-paper text-graphite">
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
