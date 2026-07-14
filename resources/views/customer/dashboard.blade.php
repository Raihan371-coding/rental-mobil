@extends('layouts.customer')

@section('title', 'Dashboard')

@section('content')

    {{-- ===================== WELCOME BANNER ===================== --}}
    <div class="relative overflow-hidden rounded-2xl bg-gradient-to-br from-sky-600 to-blue-700 p-6 sm:p-8 shadow-lg">
        <div class="absolute -top-6 -right-6 w-32 h-32 rounded-full bg-white/10"></div>
        <div class="absolute -bottom-8 -left-6 w-28 h-28 rounded-full bg-white/5"></div>
        <div class="relative">
            <p class="text-xs font-semibold uppercase tracking-widest text-sky-200">Portal Customer</p>
            <h1 class="mt-2 text-2xl sm:text-3xl font-extrabold text-white">Selamat Datang, {{ Auth::user()->name }}</h1>
            <p class="mt-2 text-sm text-sky-100 max-w-xl">Kelola booking, rental, dan lihat informasi terbaru dari portal
                customer Anda.</p>
        </div>
    </div>

    {{-- ===================== MENU CARDS ===================== --}}
    <div class="mt-6">
        <h3 class="text-base font-bold text-slate-900 mb-4">Menu Layanan</h3>

        <div class="grid grid-cols-2 gap-4 sm:grid-cols-3 lg:grid-cols-4">

            {{-- Katalog Mobil --}}
            <a href="{{ route('customer.mobil.index') }}"
                class="group relative overflow-hidden rounded-2xl bg-white p-5 shadow-sm border border-slate-100 hover:shadow-md hover:border-sky-200 transition-all duration-200">
                <div
                    class="absolute top-0 right-0 w-16 h-16 rounded-bl-[2rem] bg-sky-50 opacity-60 group-hover:bg-sky-100 transition-colors">
                </div>
                <div class="relative flex flex-col gap-3">
                    <div
                        class="flex h-11 w-11 items-center justify-center rounded-xl bg-sky-100 text-sky-600 group-hover:bg-sky-600 group-hover:text-white shadow-sm transition-colors">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M8 17l4 4 4-4m-4-5v9M3 4h18M4 4v3.34a2 2 0 00.4 1.2l3.2 4.26M20 4v3.34a2 2 0 01-.4 1.2l-3.2 4.26" />
                        </svg>
                    </div>
                    <div>
                        <p class="text-sm font-semibold text-slate-900">Katalog Mobil</p>
                        <p class="mt-1 text-xs text-slate-500 leading-snug">Lihat daftar mobil yang tersedia untuk disewa.
                        </p>
                    </div>
                </div>
            </a>

            {{-- Booking Saya --}}
            <a href="{{ route('customer.booking.index') }}"
                class="group relative overflow-hidden rounded-2xl bg-white p-5 shadow-sm border border-slate-100 hover:shadow-md hover:border-violet-200 transition-all duration-200">
                <div
                    class="absolute top-0 right-0 w-16 h-16 rounded-bl-[2rem] bg-violet-50 opacity-60 group-hover:bg-violet-100 transition-colors">
                </div>
                <div class="relative flex flex-col gap-3">
                    <div
                        class="flex h-11 w-11 items-center justify-center rounded-xl bg-violet-100 text-violet-600 group-hover:bg-violet-600 group-hover:text-white shadow-sm transition-colors">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                        </svg>
                    </div>
                    <div>
                        <p class="text-sm font-semibold text-slate-900">Booking Saya</p>
                        <p class="mt-1 text-xs text-slate-500 leading-snug">Lihat dan kelola permintaan booking kendaraan
                            Anda.</p>
                    </div>
                </div>
            </a>

            {{-- Rental Saya --}}
            <a href="{{ route('customer.rental.index') }}"
                class="group relative overflow-hidden rounded-2xl bg-white p-5 shadow-sm border border-slate-100 hover:shadow-md hover:border-amber-200 transition-all duration-200">
                <div
                    class="absolute top-0 right-0 w-16 h-16 rounded-bl-[2rem] bg-amber-50 opacity-60 group-hover:bg-amber-100 transition-colors">
                </div>
                <div class="relative flex flex-col gap-3">
                    <div
                        class="flex h-11 w-11 items-center justify-center rounded-xl bg-amber-100 text-amber-600 group-hover:bg-amber-500 group-hover:text-white shadow-sm transition-colors">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M8 7h12m0 0l-4-4m4 4l-4 4m0 6H4m0 0l4 4m-4-4l4-4" />
                        </svg>
                    </div>
                    <div>
                        <p class="text-sm font-semibold text-slate-900">Rental Saya</p>
                        <p class="mt-1 text-xs text-slate-500 leading-snug">Lihat riwayat dan status rental Anda.</p>
                    </div>
                </div>
            </a>

            {{-- Pengembalian --}}
            <a href="{{ route('customer.pengembalian.index') }}"
                class="group relative overflow-hidden rounded-2xl bg-white p-5 shadow-sm border border-slate-100 hover:shadow-md hover:border-slate-300 transition-all duration-200">
                <div
                    class="absolute top-0 right-0 w-16 h-16 rounded-bl-[2rem] bg-slate-100 opacity-60 group-hover:bg-slate-200 transition-colors">
                </div>
                <div class="relative flex flex-col gap-3">
                    <div
                        class="flex h-11 w-11 items-center justify-center rounded-xl bg-slate-200 text-slate-600 group-hover:bg-slate-700 group-hover:text-white shadow-sm transition-colors">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M9 14l-4-4m0 0l4-4m-4 4h11a4 4 0 010 8h-1" />
                        </svg>
                    </div>
                    <div>
                        <p class="text-sm font-semibold text-slate-900">Pengembalian</p>
                        <p class="mt-1 text-xs text-slate-500 leading-snug">Lihat status pengembalian kendaraan Anda.</p>
                    </div>
                </div>
            </a>

            {{-- Pembayaran --}}
            <a href="{{ route('customer.pembayaran.index') }}"
                class="group relative overflow-hidden rounded-2xl bg-white p-5 shadow-sm border border-slate-100 hover:shadow-md hover:border-rose-200 transition-all duration-200">
                <div
                    class="absolute top-0 right-0 w-16 h-16 rounded-bl-[2rem] bg-rose-50 opacity-60 group-hover:bg-rose-100 transition-colors">
                </div>
                <div class="relative flex flex-col gap-3">
                    <div
                        class="flex h-11 w-11 items-center justify-center rounded-xl bg-rose-100 text-rose-600 group-hover:bg-rose-600 group-hover:text-white shadow-sm transition-colors">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                    </div>
                    <div>
                        <p class="text-sm font-semibold text-slate-900">Pembayaran</p>
                        <p class="mt-1 text-xs text-slate-500 leading-snug">Lihat tagihan dan status pembayaran Anda.</p>
                    </div>
                </div>
            </a>

            {{-- Denda --}}
            <a href="{{ route('customer.denda.index') }}"
                class="group relative overflow-hidden rounded-2xl bg-white p-5 shadow-sm border border-slate-100 hover:shadow-md hover:border-fuchsia-200 transition-all duration-200">
                <div
                    class="absolute top-0 right-0 w-16 h-16 rounded-bl-[2rem] bg-fuchsia-50 opacity-60 group-hover:bg-fuchsia-100 transition-colors">
                </div>
                <div class="relative flex flex-col gap-3">
                    <div
                        class="flex h-11 w-11 items-center justify-center rounded-xl bg-fuchsia-100 text-fuchsia-600 group-hover:bg-fuchsia-600 group-hover:text-white shadow-sm transition-colors">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M12 9v3.75m0 0l-1.5-1.5m1.5 1.5l1.5-1.5M12 21a9 9 0 100-18 9 9 0 000 18z" />
                        </svg>
                    </div>
                    <div>
                        <p class="text-sm font-semibold text-slate-900">Denda</p>
                        <p class="mt-1 text-xs text-slate-500 leading-snug">Lihat denda yang dikenakan (jika ada).</p>
                    </div>
                </div>
            </a>

            {{-- Promo --}}
            <a href="{{ route('customer.promo.index') }}"
                class="group relative overflow-hidden rounded-2xl bg-white p-5 shadow-sm border border-slate-100 hover:shadow-md hover:border-indigo-200 transition-all duration-200">
                <div
                    class="absolute top-0 right-0 w-16 h-16 rounded-bl-[2rem] bg-indigo-50 opacity-60 group-hover:bg-indigo-100 transition-colors">
                </div>
                <div class="relative flex flex-col gap-3">
                    <div
                        class="flex h-11 w-11 items-center justify-center rounded-xl bg-indigo-100 text-indigo-600 group-hover:bg-indigo-600 group-hover:text-white shadow-sm transition-colors">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z" />
                        </svg>
                    </div>
                    <div>
                        <p class="text-sm font-semibold text-slate-900">Promo</p>
                        <p class="mt-1 text-xs text-slate-500 leading-snug">Lihat promo dan diskon terbaru yang tersedia.
                        </p>
                    </div>
                </div>
            </a>

            {{-- Profil Saya --}}
            <a href="{{ route('customer.profile') }}"
                class="group relative overflow-hidden rounded-2xl bg-white p-5 shadow-sm border border-slate-100 hover:shadow-md hover:border-cyan-200 transition-all duration-200">
                <div
                    class="absolute top-0 right-0 w-16 h-16 rounded-bl-[2rem] bg-cyan-50 opacity-60 group-hover:bg-cyan-100 transition-colors">
                </div>
                <div class="relative flex flex-col gap-3">
                    <div
                        class="flex h-11 w-11 items-center justify-center rounded-xl bg-cyan-100 text-cyan-600 group-hover:bg-cyan-600 group-hover:text-white shadow-sm transition-colors">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                        </svg>
                    </div>
                    <div>
                        <p class="text-sm font-semibold text-slate-900">Profil Saya</p>
                        <p class="mt-1 text-xs text-slate-500 leading-snug">Lihat dan perbarui data profil Anda.</p>
                    </div>
                </div>
            </a>

        </div>
    </div>

@endsection
