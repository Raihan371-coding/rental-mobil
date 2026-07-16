<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'Customer Portal') | Rental Mobil</title>
    @include('partials.theme-script')
    @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    @endif
    <style>
        [x-cloak] {
            display: none !important;
        }
    </style>
</head>

<body class="min-h-screen bg-slate-50 text-slate-900 dark:bg-slate-950 dark:text-slate-100" x-data="{ mobileNavOpen: false }">

    <header class="sticky top-0 z-40 border-b border-slate-200 bg-white/80 backdrop-blur-sm shadow-sm">
        <div class="mx-auto flex max-w-7xl items-center justify-between px-4 py-3.5 sm:px-6 sm:py-4 lg:px-8">

            {{-- Logo --}}
            <a href="{{ route('customer.dashboard') }}" class="flex items-center gap-2.5">
                <span
                    class="flex h-9 w-9 items-center justify-center rounded-xl bg-gradient-to-br from-sky-600 to-blue-700 text-white shadow-sm">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M8 17l4 4 4-4m-4-5v9M3 4h18M4 4v3.34a2 2 0 00.4 1.2l3.2 4.26M20 4v3.34a2 2 0 01-.4 1.2l-3.2 4.26" />
                    </svg>
                </span>
                <span class="leading-tight">
                    <span class="block text-lg font-bold dark:text-slate-100 text-slate-950">Rentify</span>
                    <span class="block text-[11px] font-medium text-slate-400 -mt-0.5">Customer Portal</span>
                </span>
            </a>

            {{-- Desktop nav --}}
            <nav class="hidden lg:flex flex-wrap items-center gap-1 text-sm font-medium text-slate-600">
                <a href="{{ route('customer.dashboard') }}"
                    class="rounded-full px-3.5 py-2 transition-colors hover:bg-slate-100 hover:text-slate-950 {{ request()->routeIs('customer.dashboard') ? 'bg-sky-50 text-sky-700' : '' }}">Dashboard</a>
                <a href="{{ route('customer.mobil.index') }}"
                    class="rounded-full px-3.5 py-2 transition-colors hover:bg-slate-100 hover:text-slate-950 {{ request()->routeIs('customer.mobil.*') ? 'bg-sky-50 text-sky-700' : '' }}">Katalog
                    Mobil</a>
                <a href="{{ route('customer.booking.index') }}"
                    class="rounded-full px-3.5 py-2 transition-colors hover:bg-slate-100 hover:text-slate-950 {{ request()->routeIs('customer.booking.*') ? 'bg-sky-50 text-sky-700' : '' }}">Booking</a>
                <a href="{{ route('customer.rental.index') }}"
                    class="rounded-full px-3.5 py-2 transition-colors hover:bg-slate-100 hover:text-slate-950 {{ request()->routeIs('customer.rental.*') ? 'bg-sky-50 text-sky-700' : '' }}">Rental</a>
                <a href="{{ route('customer.pengembalian.index') }}"
                    class="rounded-full px-3.5 py-2 transition-colors hover:bg-slate-100 hover:text-slate-950 {{ request()->routeIs('customer.pengembalian.*') ? 'bg-sky-50 text-sky-700' : '' }}">Pengembalian</a>
                <a href="{{ route('customer.pembayaran.index') }}"
                    class="rounded-full px-3.5 py-2 transition-colors hover:bg-slate-100 hover:text-slate-950 {{ request()->routeIs('customer.pembayaran.*') ? 'bg-sky-50 text-sky-700' : '' }}">Pembayaran</a>
                <a href="{{ route('customer.denda.index') }}"
                    class="rounded-full px-3.5 py-2 transition-colors hover:bg-slate-100 hover:text-slate-950 {{ request()->routeIs('customer.denda.*') ? 'bg-sky-50 text-sky-700' : '' }}">Denda</a>
                <a href="{{ route('customer.promo.index') }}"
                    class="rounded-full px-3.5 py-2 transition-colors hover:bg-slate-100 hover:text-slate-950 {{ request()->routeIs('customer.promo.*') ? 'bg-sky-50 text-sky-700' : '' }}">Promo</a>
            </nav>

            {{-- Desktop right side: profile + logout --}}
            <div class="hidden lg:flex items-center gap-2">
                <button type="button" data-theme-toggle onclick="toggleTheme()"
                    class="inline-flex items-center gap-2 rounded-full border border-slate-200 bg-white px-3 py-2 text-sm font-medium text-slate-700 hover:bg-slate-50 transition duration-150 dark:border-slate-700 dark:bg-slate-900 dark:text-slate-200 dark:hover:bg-slate-800">
                    <svg data-theme-icon-moon class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M20.354 15.354A9 9 0 118.646 3.646a7 7 0 1011.708 11.708z" />
                    </svg>
                    <svg data-theme-icon-sun class="hidden w-4 h-4" fill="none" stroke="currentColor"
                        viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M12 3v2m0 14v2m9-9h-2M5 12H3m15.364-6.364l-1.414 1.414M7.05 16.95l-1.414 1.414m0-11.314l1.414 1.414M16.95 16.95l1.414 1.414M12 7a5 5 0 100 10 5 5 0 000-10z" />
                    </svg>
                    <span data-theme-toggle-label>Mode Gelap</span>
                </button>

                <a href="{{ route('customer.profile') }}"
                    class="flex items-center gap-2 rounded-full px-3.5 py-2 text-sm font-medium text-slate-600 transition-colors hover:bg-slate-100 hover:text-slate-950 {{ request()->routeIs('customer.profile') ? 'bg-sky-50 text-sky-700' : '' }}">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                    </svg>
                    Profil
                </a>
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit"
                        class="inline-flex items-center gap-1.5 rounded-full bg-slate-950 px-4 py-2 text-sm font-semibold text-white transition-colors hover:bg-slate-800">
                        <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1" />
                        </svg>
                        Logout
                    </button>
                </form>
            </div>

            {{-- Mobile menu toggle --}}
            <button type="button" @click="mobileNavOpen = !mobileNavOpen"
                class="lg:hidden flex h-10 w-10 items-center justify-center rounded-xl border border-slate-200 text-slate-600 hover:bg-slate-100 transition-colors">
                <svg x-show="!mobileNavOpen" class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                </svg>
                <svg x-show="mobileNavOpen" x-cloak class="w-5 h-5" fill="none" stroke="currentColor"
                    viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                </svg>
            </button>
        </div>

        {{-- Mobile nav panel --}}
        <div x-show="mobileNavOpen" x-cloak x-transition class="lg:hidden border-t border-slate-200 bg-white px-4 py-3">
            <nav class="flex flex-col gap-1 text-sm font-medium text-slate-600">
                <a href="{{ route('customer.dashboard') }}"
                    class="rounded-xl px-3.5 py-2.5 transition-colors hover:bg-slate-100 hover:text-slate-950 {{ request()->routeIs('customer.dashboard') ? 'bg-sky-50 text-sky-700' : '' }}">Dashboard</a>
                <a href="{{ route('customer.mobil.index') }}"
                    class="rounded-xl px-3.5 py-2.5 transition-colors hover:bg-slate-100 hover:text-slate-950 {{ request()->routeIs('customer.mobil.*') ? 'bg-sky-50 text-sky-700' : '' }}">Katalog
                    Mobil</a>
                <a href="{{ route('customer.booking.index') }}"
                    class="rounded-xl px-3.5 py-2.5 transition-colors hover:bg-slate-100 hover:text-slate-950 {{ request()->routeIs('customer.booking.*') ? 'bg-sky-50 text-sky-700' : '' }}">Booking</a>
                <a href="{{ route('customer.rental.index') }}"
                    class="rounded-xl px-3.5 py-2.5 transition-colors hover:bg-slate-100 hover:text-slate-950 {{ request()->routeIs('customer.rental.*') ? 'bg-sky-50 text-sky-700' : '' }}">Rental</a>
                <a href="{{ route('customer.pengembalian.index') }}"
                    class="rounded-xl px-3.5 py-2.5 transition-colors hover:bg-slate-100 hover:text-slate-950 {{ request()->routeIs('customer.pengembalian.*') ? 'bg-sky-50 text-sky-700' : '' }}">Pengembalian</a>
                <a href="{{ route('customer.pembayaran.index') }}"
                    class="rounded-xl px-3.5 py-2.5 transition-colors hover:bg-slate-100 hover:text-slate-950 {{ request()->routeIs('customer.pembayaran.*') ? 'bg-sky-50 text-sky-700' : '' }}">Pembayaran</a>
                <a href="{{ route('customer.denda.index') }}"
                    class="rounded-xl px-3.5 py-2.5 transition-colors hover:bg-slate-100 hover:text-slate-950 {{ request()->routeIs('customer.denda.*') ? 'bg-sky-50 text-sky-700' : '' }}">Denda</a>
                <a href="{{ route('customer.promo.index') }}"
                    class="rounded-xl px-3.5 py-2.5 transition-colors hover:bg-slate-100 hover:text-slate-950 {{ request()->routeIs('customer.promo.*') ? 'bg-sky-50 text-sky-700' : '' }}">Promo</a>
                <a href="{{ route('customer.profile') }}"
                    class="rounded-xl px-3.5 py-2.5 transition-colors hover:bg-slate-100 hover:text-slate-950 {{ request()->routeIs('customer.profile') ? 'bg-sky-50 text-sky-700' : '' }}">Profil</a>

                <form method="POST" action="{{ route('logout') }}" class="mt-2 border-t border-slate-100 pt-3">
                    @csrf
                    <button type="submit"
                        class="flex w-full items-center justify-center gap-1.5 rounded-xl bg-slate-950 px-4 py-2.5 text-sm font-semibold text-white hover:bg-slate-800 transition-colors">
                        <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1" />
                        </svg>
                        Logout
                    </button>
                </form>
            </nav>
        </div>
    </header>

    <main class="mx-auto max-w-7xl px-4 py-6 sm:px-6 sm:py-8 lg:px-8">
        @yield('content')
    </main>

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
