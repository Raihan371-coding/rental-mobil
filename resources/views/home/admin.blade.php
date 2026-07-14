@extends('layouts.admin')

@section('title', 'Admin Home')

@section('content')

{{-- ===================== HERO GREETING ===================== --}}
<div class="relative overflow-hidden rounded-2xl bg-gradient-to-br from-slate-900 via-slate-800 to-sky-900 p-8 mb-8 shadow-xl">
    <div class="absolute -top-10 -right-10 w-48 h-48 rounded-full bg-sky-500/20"></div>
    <div class="absolute -bottom-8 -left-8 w-36 h-36 rounded-full bg-blue-500/10"></div>
    <div class="relative">
        <div class="inline-flex items-center gap-2 rounded-full bg-sky-500/20 border border-sky-500/30 px-3 py-1 mb-4">
            <span class="w-2 h-2 rounded-full bg-sky-400 animate-pulse"></span>
            <span class="text-xs font-semibold text-sky-300 uppercase tracking-widest">Admin Panel</span>
        </div>
        <h1 class="text-2xl sm:text-3xl font-bold text-white">
            Selamat datang, {{ auth()->user()->name }}! 👋
        </h1>
        <p class="mt-2 text-slate-400 text-sm sm:text-base max-w-xl">
            Gunakan menu di bawah untuk mengelola data rental mobil, mulai dari armada, booking, pembayaran, hingga promo.
        </p>
    </div>
</div>

{{-- ===================== QUICK ACCESS LABEL ===================== --}}
<div class="mb-5">
    <div class="flex items-center gap-3">
        <div class="h-px flex-1 bg-slate-200"></div>
        <span class="text-xs font-semibold uppercase tracking-widest text-slate-400 px-2">Akses Cepat</span>
        <div class="h-px flex-1 bg-slate-200"></div>
    </div>
</div>

{{-- ===================== QUICK ACCESS GRID ===================== --}}
<div class="grid grid-cols-1 gap-4 sm:grid-cols-2 lg:grid-cols-3">

    {{-- Mobil --}}
    <a href="{{ route('admin.mobil.index') }}"
        class="group relative overflow-hidden rounded-2xl bg-white border border-slate-100 p-6 shadow-sm hover:shadow-lg hover:-translate-y-0.5 transition-all duration-300">
        <div class="absolute top-0 right-0 w-24 h-24 rounded-bl-[3rem] bg-blue-50 opacity-60 group-hover:opacity-100 transition-opacity"></div>
        <div class="relative flex items-start gap-4">
            <div class="flex h-12 w-12 flex-shrink-0 items-center justify-center rounded-xl bg-blue-100 text-blue-600 group-hover:bg-blue-600 group-hover:text-white transition-colors duration-300 shadow-sm">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M8 7h12m0 0l-4-4m4 4l-4 4m0 6H4m0 0l4 4m-4-4l4-4"/>
                </svg>
            </div>
            <div class="min-w-0">
                <h3 class="text-base font-bold text-slate-900 group-hover:text-blue-700 transition-colors">Mobil</h3>
                <p class="mt-1 text-sm text-slate-500 leading-snug">Kelola daftar mobil rental, tarif, dan status armada.</p>
            </div>
        </div>
        <div class="relative mt-4 flex items-center text-xs font-medium text-blue-600 opacity-0 group-hover:opacity-100 translate-y-1 group-hover:translate-y-0 transition-all duration-300">
            Buka menu
            <svg class="w-3.5 h-3.5 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
            </svg>
        </div>
    </a>

    {{-- Service --}}
    <a href="{{ route('admin.service.index') }}"
        class="group relative overflow-hidden rounded-2xl bg-white border border-slate-100 p-6 shadow-sm hover:shadow-lg hover:-translate-y-0.5 transition-all duration-300">
        <div class="absolute top-0 right-0 w-24 h-24 rounded-bl-[3rem] bg-emerald-50 opacity-60 group-hover:opacity-100 transition-opacity"></div>
        <div class="relative flex items-start gap-4">
            <div class="flex h-12 w-12 flex-shrink-0 items-center justify-center rounded-xl bg-emerald-100 text-emerald-600 group-hover:bg-emerald-600 group-hover:text-white transition-colors duration-300 shadow-sm">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"/>
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                </svg>
            </div>
            <div class="min-w-0">
                <h3 class="text-base font-bold text-slate-900 group-hover:text-emerald-700 transition-colors">Service</h3>
                <p class="mt-1 text-sm text-slate-500 leading-snug">Lihat riwayat service dan atur jadwal perawatan kendaraan.</p>
            </div>
        </div>
        <div class="relative mt-4 flex items-center text-xs font-medium text-emerald-600 opacity-0 group-hover:opacity-100 translate-y-1 group-hover:translate-y-0 transition-all duration-300">
            Buka menu
            <svg class="w-3.5 h-3.5 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
            </svg>
        </div>
    </a>

    {{-- Booking --}}
    <a href="{{ route('admin.booking.index') }}"
        class="group relative overflow-hidden rounded-2xl bg-white border border-slate-100 p-6 shadow-sm hover:shadow-lg hover:-translate-y-0.5 transition-all duration-300">
        <div class="absolute top-0 right-0 w-24 h-24 rounded-bl-[3rem] bg-violet-50 opacity-60 group-hover:opacity-100 transition-opacity"></div>
        <div class="relative flex items-start gap-4">
            <div class="flex h-12 w-12 flex-shrink-0 items-center justify-center rounded-xl bg-violet-100 text-violet-600 group-hover:bg-violet-600 group-hover:text-white transition-colors duration-300 shadow-sm">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                </svg>
            </div>
            <div class="min-w-0">
                <h3 class="text-base font-bold text-slate-900 group-hover:text-violet-700 transition-colors">Booking</h3>
                <p class="mt-1 text-sm text-slate-500 leading-snug">Kelola pemesanan pelanggan dan status booking secara langsung.</p>
            </div>
        </div>
        <div class="relative mt-4 flex items-center text-xs font-medium text-violet-600 opacity-0 group-hover:opacity-100 translate-y-1 group-hover:translate-y-0 transition-all duration-300">
            Buka menu
            <svg class="w-3.5 h-3.5 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
            </svg>
        </div>
    </a>

    {{-- Pengembalian --}}
    <a href="{{ route('admin.pengembalian.index') }}"
        class="group relative overflow-hidden rounded-2xl bg-white border border-slate-100 p-6 shadow-sm hover:shadow-lg hover:-translate-y-0.5 transition-all duration-300">
        <div class="absolute top-0 right-0 w-24 h-24 rounded-bl-[3rem] bg-slate-100 opacity-60 group-hover:opacity-100 transition-opacity"></div>
        <div class="relative flex items-start gap-4">
            <div class="flex h-12 w-12 flex-shrink-0 items-center justify-center rounded-xl bg-slate-100 text-slate-600 group-hover:bg-slate-700 group-hover:text-white transition-colors duration-300 shadow-sm">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15"/>
                </svg>
            </div>
            <div class="min-w-0">
                <h3 class="text-base font-bold text-slate-900 group-hover:text-slate-700 transition-colors">Pengembalian</h3>
                <p class="mt-1 text-sm text-slate-500 leading-snug">Kelola proses pengembalian kendaraan secara cepat.</p>
            </div>
        </div>
        <div class="relative mt-4 flex items-center text-xs font-medium text-slate-600 opacity-0 group-hover:opacity-100 translate-y-1 group-hover:translate-y-0 transition-all duration-300">
            Buka menu
            <svg class="w-3.5 h-3.5 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
            </svg>
        </div>
    </a>

    {{-- Pembayaran --}}
    <a href="{{ route('admin.pembayaran.index') }}"
        class="group relative overflow-hidden rounded-2xl bg-white border border-slate-100 p-6 shadow-sm hover:shadow-lg hover:-translate-y-0.5 transition-all duration-300">
        <div class="absolute top-0 right-0 w-24 h-24 rounded-bl-[3rem] bg-rose-50 opacity-60 group-hover:opacity-100 transition-opacity"></div>
        <div class="relative flex items-start gap-4">
            <div class="flex h-12 w-12 flex-shrink-0 items-center justify-center rounded-xl bg-rose-100 text-rose-600 group-hover:bg-rose-600 group-hover:text-white transition-colors duration-300 shadow-sm">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M3 10h18M7 15h1m4 0h1m-7 4h12a3 3 0 003-3V8a3 3 0 00-3-3H6a3 3 0 00-3 3v8a3 3 0 003 3z"/>
                </svg>
            </div>
            <div class="min-w-0">
                <h3 class="text-base font-bold text-slate-900 group-hover:text-rose-700 transition-colors">Pembayaran</h3>
                <p class="mt-1 text-sm text-slate-500 leading-snug">Pantau status pembayaran dan histori transaksi.</p>
            </div>
        </div>
        <div class="relative mt-4 flex items-center text-xs font-medium text-rose-600 opacity-0 group-hover:opacity-100 translate-y-1 group-hover:translate-y-0 transition-all duration-300">
            Buka menu
            <svg class="w-3.5 h-3.5 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
            </svg>
        </div>
    </a>

    {{-- Rental --}}
    <a href="{{ route('admin.rental.index') }}"
        class="group relative overflow-hidden rounded-2xl bg-white border border-slate-100 p-6 shadow-sm hover:shadow-lg hover:-translate-y-0.5 transition-all duration-300">
        <div class="absolute top-0 right-0 w-24 h-24 rounded-bl-[3rem] bg-amber-50 opacity-60 group-hover:opacity-100 transition-opacity"></div>
        <div class="relative flex items-start gap-4">
            <div class="flex h-12 w-12 flex-shrink-0 items-center justify-center rounded-xl bg-amber-100 text-amber-600 group-hover:bg-amber-500 group-hover:text-white transition-colors duration-300 shadow-sm">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                </svg>
            </div>
            <div class="min-w-0">
                <h3 class="text-base font-bold text-slate-900 group-hover:text-amber-700 transition-colors">Rental</h3>
                <p class="mt-1 text-sm text-slate-500 leading-snug">Kelola kontrak rental dan data penyewaan.</p>
            </div>
        </div>
        <div class="relative mt-4 flex items-center text-xs font-medium text-amber-600 opacity-0 group-hover:opacity-100 translate-y-1 group-hover:translate-y-0 transition-all duration-300">
            Buka menu
            <svg class="w-3.5 h-3.5 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
            </svg>
        </div>
    </a>

    {{-- Denda --}}
    <a href="{{ route('admin.denda.index') }}"
        class="group relative overflow-hidden rounded-2xl bg-white border border-slate-100 p-6 shadow-sm hover:shadow-lg hover:-translate-y-0.5 transition-all duration-300">
        <div class="absolute top-0 right-0 w-24 h-24 rounded-bl-[3rem] bg-fuchsia-50 opacity-60 group-hover:opacity-100 transition-opacity"></div>
        <div class="relative flex items-start gap-4">
            <div class="flex h-12 w-12 flex-shrink-0 items-center justify-center rounded-xl bg-fuchsia-100 text-fuchsia-600 group-hover:bg-fuchsia-600 group-hover:text-white transition-colors duration-300 shadow-sm">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"/>
                </svg>
            </div>
            <div class="min-w-0">
                <h3 class="text-base font-bold text-slate-900 group-hover:text-fuchsia-700 transition-colors">Denda</h3>
                <p class="mt-1 text-sm text-slate-500 leading-snug">Atur denda keterlambatan dan kerusakan kendaraan.</p>
            </div>
        </div>
        <div class="relative mt-4 flex items-center text-xs font-medium text-fuchsia-600 opacity-0 group-hover:opacity-100 translate-y-1 group-hover:translate-y-0 transition-all duration-300">
            Buka menu
            <svg class="w-3.5 h-3.5 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
            </svg>
        </div>
    </a>

    {{-- Customer --}}
    <a href="{{ route('admin.customer.index') }}"
        class="group relative overflow-hidden rounded-2xl bg-white border border-slate-100 p-6 shadow-sm hover:shadow-lg hover:-translate-y-0.5 transition-all duration-300">
        <div class="absolute top-0 right-0 w-24 h-24 rounded-bl-[3rem] bg-cyan-50 opacity-60 group-hover:opacity-100 transition-opacity"></div>
        <div class="relative flex items-start gap-4">
            <div class="flex h-12 w-12 flex-shrink-0 items-center justify-center rounded-xl bg-cyan-100 text-cyan-600 group-hover:bg-cyan-600 group-hover:text-white transition-colors duration-300 shadow-sm">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0z"/>
                </svg>
            </div>
            <div class="min-w-0">
                <h3 class="text-base font-bold text-slate-900 group-hover:text-cyan-700 transition-colors">Customer</h3>
                <p class="mt-1 text-sm text-slate-500 leading-snug">Kelola data pelanggan dan histori penyewaan mereka.</p>
            </div>
        </div>
        <div class="relative mt-4 flex items-center text-xs font-medium text-cyan-600 opacity-0 group-hover:opacity-100 translate-y-1 group-hover:translate-y-0 transition-all duration-300">
            Buka menu
            <svg class="w-3.5 h-3.5 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
            </svg>
        </div>
    </a>

    {{-- Promo --}}
    <a href="{{ route('admin.promo.index') }}"
        class="group relative overflow-hidden rounded-2xl bg-white border border-slate-100 p-6 shadow-sm hover:shadow-lg hover:-translate-y-0.5 transition-all duration-300">
        <div class="absolute top-0 right-0 w-24 h-24 rounded-bl-[3rem] bg-indigo-50 opacity-60 group-hover:opacity-100 transition-opacity"></div>
        <div class="relative flex items-start gap-4">
            <div class="flex h-12 w-12 flex-shrink-0 items-center justify-center rounded-xl bg-indigo-100 text-indigo-600 group-hover:bg-indigo-600 group-hover:text-white transition-colors duration-300 shadow-sm">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z"/>
                </svg>
            </div>
            <div class="min-w-0">
                <h3 class="text-base font-bold text-slate-900 group-hover:text-indigo-700 transition-colors">Promo</h3>
                <p class="mt-1 text-sm text-slate-500 leading-snug">Buat dan kelola kode promo untuk menarik lebih banyak pelanggan.</p>
            </div>
        </div>
        <div class="relative mt-4 flex items-center text-xs font-medium text-indigo-600 opacity-0 group-hover:opacity-100 translate-y-1 group-hover:translate-y-0 transition-all duration-300">
            Buka menu
            <svg class="w-3.5 h-3.5 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
            </svg>
        </div>
    </a>

</div>

@endsection
