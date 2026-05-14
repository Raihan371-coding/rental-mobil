<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', 'Rental Mobil')</title>

    @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @endif
</head>

<body class="min-h-screen bg-slate-50 text-slate-900">
    <div class="mx-auto max-w-7xl px-6 py-8 sm:px-8">
        <header class="mb-8">
            <h1 class="text-3xl font-semibold text-slate-900">@yield('title', 'Rental Mobil')</h1>
        </header>

        <main class="space-y-6">
            @yield('content')
        </main>
    </div>
</body>

</html>