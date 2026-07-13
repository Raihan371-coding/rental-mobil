<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>@yield('title', 'Admin Dashboard') | Rental Mobil</title>

        @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
            @vite(['resources/css/app.css', 'resources/js/app.js'])
        @endif
    </head>
    <body class="min-h-screen bg-slate-50 text-slate-900">
        <div class="min-h-screen lg:flex">
            <aside class="border-b border-slate-200 bg-white lg:min-h-screen lg:w-80 lg:border-r">
                <div class="mx-auto flex max-w-7xl flex-col gap-8 px-6 py-8 sm:px-8 lg:max-w-none">
                    <div>
                        <p class="text-xs font-semibold uppercase tracking-[0.3em] text-sky-700">Admin Rental Mobil</p>
                        <h1 class="mt-3 text-2xl font-semibold text-slate-950">Dashboard</h1>
                        <p class="mt-3 text-sm leading-6 text-slate-600">Gunakan sidebar untuk mengakses menu pengembalian, pembayaran, dan rental.</p>
                    </div>

                    <nav class="space-y-2">
                        <a href="{{ route('admin.mobil.index') }}" class="block rounded-3xl border border-slate-200 bg-slate-100 px-4 py-3 text-sm font-semibold transition {{ request()->routeIs('admin.mobil.*') ? 'bg-sky-100 text-sky-700 shadow-sm' : 'text-slate-700 hover:bg-slate-200' }}">Mobil</a>
                        <a href="{{ route('admin.service.index') }}" class="block rounded-3xl border border-slate-200 bg-slate-100 px-4 py-3 text-sm font-semibold transition {{ request()->routeIs('admin.service.*') ? 'bg-sky-100 text-sky-700 shadow-sm' : 'text-slate-700 hover:bg-slate-200' }}">Service</a>
                        <a href="{{ route('admin.booking.index') }}" class="block rounded-3xl border border-slate-200 bg-slate-100 px-4 py-3 text-sm font-semibold transition {{ request()->routeIs('admin.booking.*') ? 'bg-sky-100 text-sky-700 shadow-sm' : 'text-slate-700 hover:bg-slate-200' }}">Booking</a>
                        <a href="{{ route('admin.pengembalian.index') }}" class="block rounded-3xl border border-slate-200 bg-slate-100 px-4 py-3 text-sm font-semibold transition {{ request()->routeIs('admin.pengembalian.*') ? 'bg-sky-100 text-sky-700 shadow-sm' : 'text-slate-700 hover:bg-slate-200' }}">Pengembalian</a>
                        <a href="{{ route('admin.pembayaran.index') }}" class="block rounded-3xl border border-slate-200 bg-slate-100 px-4 py-3 text-sm font-semibold transition {{ request()->routeIs('admin.pembayaran.*') ? 'bg-sky-100 text-sky-700 shadow-sm' : 'text-slate-700 hover:bg-slate-200' }}">Pembayaran</a>
                        <a href="{{ route('admin.rental.index') }}" class="block rounded-3xl border border-slate-200 bg-slate-100 px-4 py-3 text-sm font-semibold transition {{ request()->routeIs('admin.rental.*') ? 'bg-sky-100 text-sky-700 shadow-sm' : 'text-slate-700 hover:bg-slate-200' }}">Rental</a>
                        <a href="{{ route('admin.denda.index') }}" class="block rounded-3xl border border-slate-200 bg-slate-100 px-4 py-3 text-sm font-semibold transition {{ request()->routeIs('admin.denda.*') ? 'bg-sky-100 text-sky-700 shadow-sm' : 'text-slate-700 hover:bg-slate-200' }}">Denda</a>
                        <a href="{{ route('admin.customer.index') }}" class="block rounded-3xl border border-slate-200 bg-slate-100 px-4 py-3 text-sm font-semibold transition {{ request()->routeIs('admin.customer.*') ? 'bg-sky-100 text-sky-700 shadow-sm' : 'text-slate-700 hover:bg-slate-200' }}">Customer</a>
                        <a href="{{ route('admin.promo.index') }}" class="block rounded-3xl border border-slate-200 bg-slate-100 px-4 py-3 text-sm font-semibold transition {{ request()->routeIs('admin.promo.*') ? 'bg-sky-100 text-sky-700 shadow-sm' : 'text-slate-700 hover:bg-slate-200' }}">Promo</a>
                    </nav>

                    <div class="rounded-[1.75rem] bg-slate-900 p-5 text-white shadow-lg shadow-slate-900/10">
                        <p class="text-sm uppercase tracking-[0.24em] text-slate-300">Tips</p>
                        <p class="mt-3 text-sm leading-6 text-slate-200">Pilih menu di atas untuk melihat isi setiap modul. Sidebar akan tetap aktif saat berpindah halaman.</p>
                    </div>
                </div>
            </aside>

            <main class="flex-1 bg-slate-50">
                <header class="border-b border-slate-200 bg-white/80 px-6 py-5 shadow-sm shadow-slate-900/5 lg:px-10">
                    <div class="mx-auto max-w-7xl flex flex-col gap-3 sm:flex-row sm:items-center sm:justify-between">
                        <div>
                            <p class="text-xs uppercase tracking-[0.3em] text-slate-500">Admin Panel</p>
                            <h2 class="mt-2 text-3xl font-semibold text-slate-950">@yield('title', 'Dashboard')</h2>
                        </div>
                        <div class="flex gap-3">
                            <a href="{{ route('admin.dashboard') }}" class="inline-flex items-center rounded-full bg-slate-950 px-5 py-2 text-sm font-semibold text-white transition hover:bg-slate-800">Beranda</a>
                        </div>
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf

                            <x-dropdown-link :href="route('logout')"
                                    onclick="event.preventDefault();
                                                this.closest('form').submit();">
                                {{ __('Log Out') }}
                            </x-dropdown-link>
                        </form>
                    </div>
                </header>

                <section class="mx-auto max-w-7xl px-6 py-8 sm:px-8 lg:px-10">
                    @yield('content')
                </section>
            </main>
        </div>
    </body>
</html>
