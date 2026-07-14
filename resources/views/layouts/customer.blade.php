<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'Customer Portal') | Rental Mobil</title>
    @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    @endif
</head>

<body class="min-h-screen bg-slate-50 text-slate-900">
    <header class="border-b border-slate-200 bg-white shadow-sm">
        <div class="mx-auto flex max-w-7xl items-center justify-between px-6 py-4 sm:px-8">
            <div>
                <a href="{{ route('customer.dashboard') }}" class="text-xl font-semibold text-slate-950">Rentify</a>
                <p class="text-sm text-slate-500">Customer Portal</p>
            </div>
            <nav class="flex flex-wrap items-center gap-2 text-sm font-medium text-slate-700">
                <a href="{{ route('customer.dashboard') }}" class="rounded-full px-3 py-2 hover:bg-slate-100 {{ request()->routeIs('customer.dashboard') ? 'bg-slate-100 text-slate-950' : '' }}">Dashboard</a>
                <a href="{{ route('customer.mobil.index') }}" class="rounded-full px-3 py-2 hover:bg-slate-100 {{ request()->routeIs('customer.mobil.*') ? 'bg-slate-100 text-slate-950' : '' }}">Katalog Mobil</a>
                <a href="{{ route('customer.booking.index') }}" class="rounded-full px-3 py-2 hover:bg-slate-100 {{ request()->routeIs('customer.booking.*') ? 'bg-slate-100 text-slate-950' : '' }}">Booking</a>
                <a href="{{ route('customer.rental.index') }}" class="rounded-full px-3 py-2 hover:bg-slate-100 {{ request()->routeIs('customer.rental.*') ? 'bg-slate-100 text-slate-950' : '' }}">Rental</a>
                <a href="{{ route('customer.pengembalian.index') }}" class="rounded-full px-3 py-2 hover:bg-slate-100 {{ request()->routeIs('customer.pengembalian.*') ? 'bg-slate-100 text-slate-950' : '' }}">Pengembalian</a>
                <a href="{{ route('customer.pembayaran.index') }}" class="rounded-full px-3 py-2 hover:bg-slate-100 {{ request()->routeIs('customer.pembayaran.*') ? 'bg-slate-100 text-slate-950' : '' }}">Pembayaran</a>
                <a href="{{ route('customer.denda.index') }}" class="rounded-full px-3 py-2 hover:bg-slate-100 {{ request()->routeIs('customer.denda.*') ? 'bg-slate-100 text-slate-950' : '' }}">Denda</a>
                <a href="{{ route('customer.promo.index') }}" class="rounded-full px-3 py-2 hover:bg-slate-100 {{ request()->routeIs('customer.promo.*') ? 'bg-slate-100 text-slate-950' : '' }}">Promo</a>
                <a href="{{ route('customer.profile') }}" class="rounded-full px-3 py-2 hover:bg-slate-100 {{ request()->routeIs('customer.profile') ? 'bg-slate-100 text-slate-950' : '' }}">Profil</a>
                <form method="POST" action="{{ route('logout') }}" class="inline">
                    @csrf
                    <button type="submit"
                        class="rounded-full bg-slate-950 px-4 py-2 text-white hover:bg-slate-800">Logout</button>
                </form>
            </nav>
        </div>
    </header>

    <main class="mx-auto max-w-7xl px-6 py-8 sm:px-8 lg:px-10">
        @yield('content')
    </main>
</body>

</html>
