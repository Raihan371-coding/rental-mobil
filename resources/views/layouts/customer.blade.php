<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>@yield('title')</title>
    @vite('resources/css/app.css')
</head>
<body class="bg-slate-100">

<div class="flex min-h-screen">
    <!-- Sidebar -->
    <aside class="w-64 bg-white shadow">
        <div class="p-6 font-bold text-lg">
            Customer Panel
        </div>
        <nav class="px-4 space-y-2">
            <a href="{{ route('customer.profile') }}" class="block rounded px-4 py-2 hover:bg-slate-100">
                Profil Saya
            </a>
        </nav>
    </aside>

    <!-- Content -->
    <main class="flex-1 p-8">
        @yield('content')
    </main>
</div>

</body>
</html>