<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title') — Rentify Admin</title>

    {{-- Google Fonts: Inter --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap"
        rel="stylesheet">

    @include('partials.theme-script')
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <style>
        body {
            font-family: 'Inter', sans-serif;
        }
    </style>
</head>

<body class="bg-slate-100 dark:bg-slate-950 antialiased">

    {{-- Mobile Sidebar Overlay --}}
    <div id="sidebar-overlay" class="fixed inset-0 bg-black/50 z-40 lg:hidden hidden transition-opacity duration-300"
        onclick="closeSidebar()">
    </div>

    {{-- Sidebar --}}
    @include('admin.partials.sidebar')

    {{-- Main wrapper --}}
    <div class="lg:pl-64 min-h-screen flex flex-col">

        {{-- Topbar --}}
        @include('admin.partials.topbar')

        {{-- Page Content --}}
        <main class="flex-1 pt-20 px-4 sm:px-6 lg:px-8 pb-10 overflow-x-hidden">
            <div class="max-w-screen-xl mx-auto py-6">
                @yield('content')
            </div>
        </main>

    </div>

    <script>
        function openSidebar() {
            document.getElementById('sidebar').classList.remove('-translate-x-full');
            document.getElementById('sidebar-overlay').classList.remove('hidden');
        }

        function closeSidebar() {
            document.getElementById('sidebar').classList.add('-translate-x-full');
            document.getElementById('sidebar-overlay').classList.add('hidden');
        }
    </script>
    @stack('scripts')
    {{-- taruh di layouts.admin / layouts.customer, sebelum </body>, setelah @stack('scripts') --}}
    @if (session('success'))
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                Swal.fire({
                    title: 'Berhasil!',
                    text: @json(session('success')),
                    icon: 'success',
                    confirmButtonColor: '#0284c7',
                    timer: 2500,
                    timerProgressBar: true
                });
            });
        </script>
    @endif
</body>

</html>
