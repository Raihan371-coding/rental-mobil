@extends('layouts.admin')

@section('title', 'Dashboard')

@section('content')

{{-- ===================== PAGE HEADER ===================== --}}
<div class="mb-8">
    <h1 class="text-2xl font-bold text-slate-900">Dashboard Overview</h1>
    <p class="mt-1 text-sm text-slate-500">Ringkasan data dan aktivitas terkini sistem rental mobil.</p>
</div>

{{-- ===================== STAT CARDS ===================== --}}
<div class="grid grid-cols-1 gap-5 sm:grid-cols-2 xl:grid-cols-4">

    {{-- Total Mobil --}}
    <div class="relative overflow-hidden rounded-2xl bg-white p-6 shadow-sm border border-slate-100 hover:shadow-md transition-shadow duration-300">
        <div class="absolute top-0 right-0 w-24 h-24 rounded-bl-[3rem] bg-blue-50 opacity-60"></div>
        <div class="relative flex items-start justify-between">
            <div>
                <p class="text-xs font-semibold uppercase tracking-widest text-slate-400">Total Mobil</p>
                <h2 class="mt-3 text-4xl font-extrabold text-slate-900">{{ $totalMobil }}</h2>
            </div>
            <div class="flex h-12 w-12 flex-shrink-0 items-center justify-center rounded-xl bg-blue-100 text-blue-600 shadow-sm">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M8 7h12m0 0l-4-4m4 4l-4 4m0 6H4m0 0l4 4m-4-4l4-4"/>
                </svg>
            </div>
        </div>
        <div class="mt-5 flex items-center gap-2">
            <span class="inline-flex items-center gap-1 rounded-full bg-green-100 px-2.5 py-0.5 text-xs font-semibold text-green-700">
                <span class="w-1.5 h-1.5 rounded-full bg-green-500 animate-pulse"></span>
                {{ $mobilTersedia }} Tersedia
            </span>
            <span class="text-xs text-slate-400">dari {{ $totalMobil }} armada</span>
        </div>
        @if($totalMobil > 0)
        <div class="mt-3 h-1.5 w-full rounded-full bg-slate-100">
            <div class="h-1.5 rounded-full bg-green-400 transition-all duration-500"
                style="width: {{ ($mobilTersedia / $totalMobil) * 100 }}%"></div>
        </div>
        @endif
    </div>

    {{-- Customer --}}
    <div class="relative overflow-hidden rounded-2xl bg-white p-6 shadow-sm border border-slate-100 hover:shadow-md transition-shadow duration-300">
        <div class="absolute top-0 right-0 w-24 h-24 rounded-bl-[3rem] bg-emerald-50 opacity-60"></div>
        <div class="relative flex items-start justify-between">
            <div>
                <p class="text-xs font-semibold uppercase tracking-widest text-slate-400">Customer</p>
                <h2 class="mt-3 text-4xl font-extrabold text-slate-900">{{ $totalCustomer }}</h2>
            </div>
            <div class="flex h-12 w-12 flex-shrink-0 items-center justify-center rounded-xl bg-emerald-100 text-emerald-600 shadow-sm">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0z"/>
                </svg>
            </div>
        </div>
        <div class="mt-5">
            <span class="text-xs text-slate-400">Total pelanggan terdaftar</span>
        </div>
        <div class="mt-3 h-1.5 w-full rounded-full bg-slate-100">
            <div class="h-1.5 w-3/4 rounded-full bg-emerald-400"></div>
        </div>
    </div>

    {{-- Total Booking --}}
    <div class="relative overflow-hidden rounded-2xl bg-white p-6 shadow-sm border border-slate-100 hover:shadow-md transition-shadow duration-300">
        <div class="absolute top-0 right-0 w-24 h-24 rounded-bl-[3rem] bg-amber-50 opacity-60"></div>
        <div class="relative flex items-start justify-between">
            <div>
                <p class="text-xs font-semibold uppercase tracking-widest text-slate-400">Total Booking</p>
                <h2 class="mt-3 text-4xl font-extrabold text-slate-900">{{ $totalBooking }}</h2>
            </div>
            <div class="flex h-12 w-12 flex-shrink-0 items-center justify-center rounded-xl bg-amber-100 text-amber-600 shadow-sm">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                </svg>
            </div>
        </div>
        <div class="mt-5 flex items-center gap-2">
            @if($bookingMenunggu > 0)
            <span class="inline-flex items-center gap-1 rounded-full bg-amber-100 px-2.5 py-0.5 text-xs font-semibold text-amber-700">
                <span class="w-1.5 h-1.5 rounded-full bg-amber-500 animate-pulse"></span>
                {{ $bookingMenunggu }} Menunggu
            </span>
            @else
            <span class="text-xs text-slate-400">Semua booking tertangani</span>
            @endif
        </div>
        <div class="mt-3 h-1.5 w-full rounded-full bg-slate-100">
            @if($totalBooking > 0)
            <div class="h-1.5 rounded-full bg-amber-400 transition-all duration-500"
                style="width: {{ ($bookingKonfirmasi / $totalBooking) * 100 }}%"></div>
            @endif
        </div>
    </div>

    {{-- Pendapatan --}}
    <div class="relative overflow-hidden rounded-2xl bg-gradient-to-br from-sky-600 to-blue-700 p-6 shadow-lg hover:shadow-xl transition-shadow duration-300">
        <div class="absolute -top-4 -right-4 w-28 h-28 rounded-full bg-white/10"></div>
        <div class="absolute -bottom-6 -left-4 w-24 h-24 rounded-full bg-white/5"></div>
        <div class="relative flex items-start justify-between">
            <div>
                <p class="text-xs font-semibold uppercase tracking-widest text-sky-200">Pendapatan</p>
                <h2 class="mt-3 text-2xl font-extrabold text-white leading-tight">
                    Rp {{ number_format($pendapatan, 0, ',', '.') }}
                </h2>
            </div>
            <div class="flex h-12 w-12 flex-shrink-0 items-center justify-center rounded-xl bg-white/20 text-white shadow-sm">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                </svg>
            </div>
        </div>
        <div class="mt-5">
            <span class="text-xs text-sky-200">Total pendapatan terkonfirmasi</span>
        </div>
        <div class="mt-3 h-1.5 w-full rounded-full bg-white/20">
            <div class="h-1.5 w-2/3 rounded-full bg-white/70"></div>
        </div>
    </div>

</div>

{{-- ===================== ROW 2 ===================== --}}
<div class="mt-6 grid gap-5 lg:grid-cols-2">

    {{-- Booking Status --}}
    <div class="rounded-2xl bg-white p-6 shadow-sm border border-slate-100">
        <div class="flex items-center justify-between mb-6">
            <div>
                <h3 class="text-base font-bold text-slate-900">Status Booking</h3>
                <p class="text-xs text-slate-400 mt-0.5">Distribusi status pemesanan</p>
            </div>
            <a href="{{ route('admin.booking.index') }}"
                class="text-xs font-medium text-sky-600 hover:text-sky-700 flex items-center gap-1">
                Lihat semua
                <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                </svg>
            </a>
        </div>

        <div class="space-y-4">
            {{-- Menunggu --}}
            <div>
                <div class="flex items-center justify-between mb-1.5">
                    <div class="flex items-center gap-2">
                        <span class="w-2.5 h-2.5 rounded-full bg-amber-400 flex-shrink-0"></span>
                        <span class="text-sm font-medium text-slate-700">Menunggu Konfirmasi</span>
                    </div>
                    <span class="text-sm font-bold text-amber-600">{{ $bookingMenunggu }}</span>
                </div>
                <div class="h-2 w-full rounded-full bg-slate-100">
                    @if($totalBooking > 0)
                    <div class="h-2 rounded-full bg-amber-400 transition-all duration-700"
                        style="width: {{ ($bookingMenunggu / $totalBooking) * 100 }}%"></div>
                    @endif
                </div>
            </div>

            {{-- Dikonfirmasi --}}
            <div>
                <div class="flex items-center justify-between mb-1.5">
                    <div class="flex items-center gap-2">
                        <span class="w-2.5 h-2.5 rounded-full bg-emerald-400 flex-shrink-0"></span>
                        <span class="text-sm font-medium text-slate-700">Dikonfirmasi</span>
                    </div>
                    <span class="text-sm font-bold text-emerald-600">{{ $bookingKonfirmasi }}</span>
                </div>
                <div class="h-2 w-full rounded-full bg-slate-100">
                    @if($totalBooking > 0)
                    <div class="h-2 rounded-full bg-emerald-400 transition-all duration-700"
                        style="width: {{ ($bookingKonfirmasi / $totalBooking) * 100 }}%"></div>
                    @endif
                </div>
            </div>

            {{-- Ditolak --}}
            <div>
                <div class="flex items-center justify-between mb-1.5">
                    <div class="flex items-center gap-2">
                        <span class="w-2.5 h-2.5 rounded-full bg-red-400 flex-shrink-0"></span>
                        <span class="text-sm font-medium text-slate-700">Ditolak</span>
                    </div>
                    <span class="text-sm font-bold text-red-500">{{ $bookingDitolak }}</span>
                </div>
                <div class="h-2 w-full rounded-full bg-slate-100">
                    @if($totalBooking > 0)
                    <div class="h-2 rounded-full bg-red-400 transition-all duration-700"
                        style="width: {{ ($bookingDitolak / $totalBooking) * 100 }}%"></div>
                    @endif
                </div>
            </div>
        </div>

        {{-- Total --}}
        <div class="mt-6 pt-4 border-t border-slate-100 flex items-center justify-between">
            <span class="text-xs text-slate-400">Total Booking</span>
            <span class="text-sm font-bold text-slate-700">{{ $totalBooking }}</span>
        </div>
    </div>

    {{-- Ringkasan Armada --}}
    <div class="rounded-2xl bg-white p-6 shadow-sm border border-slate-100">
        <div class="flex items-center justify-between mb-6">
            <div>
                <h3 class="text-base font-bold text-slate-900">Ringkasan Armada</h3>
                <p class="text-xs text-slate-400 mt-0.5">Status ketersediaan kendaraan</p>
            </div>
            <a href="{{ route('admin.mobil.index') }}"
                class="text-xs font-medium text-sky-600 hover:text-sky-700 flex items-center gap-1">
                Kelola
                <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                </svg>
            </a>
        </div>

        {{-- Visual circles --}}
        <div class="flex items-center justify-around py-4">
            <div class="text-center">
                <div class="w-20 h-20 rounded-full bg-blue-50 border-4 border-blue-200 flex items-center justify-center mx-auto">
                    <span class="text-2xl font-extrabold text-blue-600">{{ $totalMobil }}</span>
                </div>
                <p class="mt-2 text-xs font-medium text-slate-500">Total</p>
            </div>
            <div class="text-center">
                <div class="w-20 h-20 rounded-full bg-emerald-50 border-4 border-emerald-300 flex items-center justify-center mx-auto">
                    <span class="text-2xl font-extrabold text-emerald-600">{{ $mobilTersedia }}</span>
                </div>
                <p class="mt-2 text-xs font-medium text-slate-500">Tersedia</p>
            </div>
            <div class="text-center">
                <div class="w-20 h-20 rounded-full bg-red-50 border-4 border-red-200 flex items-center justify-center mx-auto">
                    <span class="text-2xl font-extrabold text-red-500">{{ $mobilDisewa }}</span>
                </div>
                <p class="mt-2 text-xs font-medium text-slate-500">Disewa</p>
            </div>
        </div>

        @if($totalMobil > 0)
        <div class="mt-4 pt-4 border-t border-slate-100">
            <div class="flex items-center justify-between mb-1.5">
                <span class="text-xs text-slate-400">Tingkat Ketersediaan</span>
                <span class="text-xs font-bold text-emerald-600">{{ round(($mobilTersedia / $totalMobil) * 100) }}%</span>
            </div>
            <div class="h-2.5 w-full rounded-full bg-slate-100 overflow-hidden">
                <div class="h-full rounded-full bg-gradient-to-r from-emerald-400 to-emerald-500 transition-all duration-700"
                    style="width: {{ ($mobilTersedia / $totalMobil) * 100 }}%"></div>
            </div>
        </div>
        @endif
    </div>

</div>

{{-- ===================== ROW 3 ===================== --}}
<div class="mt-6 grid gap-5 lg:grid-cols-2">

    {{-- Promo Aktif --}}
    <div class="rounded-2xl bg-white p-6 shadow-sm border border-slate-100">
        <div class="flex items-center justify-between mb-5">
            <div>
                <h3 class="text-base font-bold text-slate-900">Promo Aktif</h3>
                <p class="text-xs text-slate-400 mt-0.5">Kode promo yang sedang berjalan</p>
            </div>
            <a href="{{ route('admin.promo.index') }}"
                class="text-xs font-medium text-sky-600 hover:text-sky-700 flex items-center gap-1">
                Kelola
                <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                </svg>
            </a>
        </div>

        <div class="relative overflow-hidden rounded-xl bg-gradient-to-br from-violet-500 to-indigo-600 p-6">
            <div class="absolute -top-4 -right-4 w-24 h-24 rounded-full bg-white/10"></div>
            <div class="relative flex items-center justify-between">
                <div>
                    <p class="text-sm font-medium text-violet-200">Total Promo Aktif</p>
                    <h2 class="text-5xl font-extrabold text-white mt-2">{{ $promoAktif }}</h2>
                    <p class="text-xs text-violet-300 mt-2">promo sedang berjalan</p>
                </div>
                <div class="flex h-16 w-16 flex-shrink-0 items-center justify-center rounded-2xl bg-white/20">
                    <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z"/>
                    </svg>
                </div>
            </div>
        </div>

        <div class="mt-4">
            <a href="{{ route('admin.promo.create') }}"
                class="flex items-center justify-center gap-2 w-full py-2.5 rounded-xl border-2 border-dashed border-slate-200 text-sm font-medium text-slate-500 hover:border-violet-300 hover:text-violet-600 hover:bg-violet-50 transition-colors duration-200">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/>
                </svg>
                Tambah Promo Baru
            </a>
        </div>
    </div>

    {{-- Quick Actions --}}
    <div class="rounded-2xl bg-white p-6 shadow-sm border border-slate-100">
        <div class="mb-5">
            <h3 class="text-base font-bold text-slate-900">Quick Actions</h3>
            <p class="text-xs text-slate-400 mt-0.5">Aksi cepat yang sering digunakan</p>
        </div>

        <div class="grid grid-cols-2 gap-3">

            <a href="{{ route('admin.mobil.create') }}"
                class="group flex flex-col items-center gap-2.5 rounded-xl bg-blue-50 hover:bg-blue-600 border border-blue-100 p-4 text-center transition-all duration-200">
                <div class="w-10 h-10 rounded-xl bg-blue-100 group-hover:bg-white/20 flex items-center justify-center transition-colors">
                    <svg class="w-5 h-5 text-blue-600 group-hover:text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M8 7h12m0 0l-4-4m4 4l-4 4m0 6H4m0 0l4 4m-4-4l4-4"/>
                    </svg>
                </div>
                <span class="text-sm font-semibold text-blue-700 group-hover:text-white transition-colors">Tambah Mobil</span>
            </a>

            <a href="{{ route('admin.customer.create') }}"
                class="group flex flex-col items-center gap-2.5 rounded-xl bg-emerald-50 hover:bg-emerald-600 border border-emerald-100 p-4 text-center transition-all duration-200">
                <div class="w-10 h-10 rounded-xl bg-emerald-100 group-hover:bg-white/20 flex items-center justify-center transition-colors">
                    <svg class="w-5 h-5 text-emerald-600 group-hover:text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
                    </svg>
                </div>
                <span class="text-sm font-semibold text-emerald-700 group-hover:text-white transition-colors">Tambah Customer</span>
            </a>

            <a href="{{ route('admin.booking.create') }}"
                class="group flex flex-col items-center gap-2.5 rounded-xl bg-amber-50 hover:bg-amber-500 border border-amber-100 p-4 text-center transition-all duration-200">
                <div class="w-10 h-10 rounded-xl bg-amber-100 group-hover:bg-white/20 flex items-center justify-center transition-colors">
                    <svg class="w-5 h-5 text-amber-600 group-hover:text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                    </svg>
                </div>
                <span class="text-sm font-semibold text-amber-700 group-hover:text-white transition-colors">Buat Booking</span>
            </a>

            <a href="{{ route('admin.promo.create') }}"
                class="group flex flex-col items-center gap-2.5 rounded-xl bg-violet-50 hover:bg-violet-600 border border-violet-100 p-4 text-center transition-all duration-200">
                <div class="w-10 h-10 rounded-xl bg-violet-100 group-hover:bg-white/20 flex items-center justify-center transition-colors">
                    <svg class="w-5 h-5 text-violet-600 group-hover:text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z"/>
                    </svg>
                </div>
                <span class="text-sm font-semibold text-violet-700 group-hover:text-white transition-colors">Tambah Promo</span>
            </a>

        </div>
    </div>

</div>

@endsection
