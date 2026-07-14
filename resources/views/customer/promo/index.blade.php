@extends('layouts.customer')

@section('title', 'Promo')

@section('content')

    {{-- ===================== PAGE HEADER ===================== --}}
    <div class="relative overflow-hidden rounded-2xl bg-gradient-to-br from-sky-600 to-blue-700 p-6 sm:p-8 shadow-lg">
        <div class="absolute -top-6 -right-6 w-32 h-32 rounded-full bg-white/10"></div>
        <div class="absolute -bottom-8 -left-6 w-28 h-28 rounded-full bg-white/5"></div>
        <div class="relative">
            <p class="text-xs font-semibold uppercase tracking-widest text-sky-200">Promo</p>
            <h1 class="mt-2 text-2xl sm:text-3xl font-extrabold text-white">Promo &amp; Diskon</h1>
            <p class="mt-2 text-sm text-sky-100 max-w-xl">Lihat promo yang sedang berlaku untuk mendapatkan potongan harga
                rental.</p>
        </div>
    </div>

    {{-- ===================== PROMO GRID ===================== --}}
    <div class="mt-6 grid gap-5 sm:grid-cols-2 lg:grid-cols-3">
        @forelse($promos as $promo)
            <div
                class="group relative overflow-hidden rounded-2xl bg-gradient-to-br from-violet-500 to-indigo-600 p-5 shadow-md hover:shadow-lg transition-shadow duration-200">
                <div class="absolute -top-4 -right-4 w-24 h-24 rounded-full bg-white/10"></div>
                <div class="absolute -bottom-6 -left-4 w-20 h-20 rounded-full bg-white/5"></div>

                <div class="relative">
                    <div class="flex items-center justify-between">
                        <span
                            class="inline-flex items-center gap-1.5 rounded-full bg-white/20 px-3 py-1 text-xs font-bold text-white backdrop-blur-sm">
                            <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z" />
                            </svg>
                            {{ $promo->kode_promo }}
                        </span>
                    </div>

                    <p class="mt-4 text-3xl font-extrabold text-white leading-tight">
                        {{ $promo->jenis == 'persentase'
                            ? $promo->potongan . '%'
                            : 'Rp ' . number_format($promo->potongan, 0, ',', '.') }}
                    </p>
                    <p class="text-sm text-violet-200 mt-0.5">Potongan Harga Sewa</p>

                    <div
                        class="mt-4 pt-4 border-t border-white/20 flex items-center justify-between text-xs text-violet-100">
                        <div>
                            <p class="text-violet-300">Mulai</p>
                            <p class="font-medium text-white">
                                {{ \Carbon\Carbon::parse($promo->tanggal_mulai)->format('d M Y') }}</p>
                        </div>
                        <svg class="w-4 h-4 text-violet-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M14 5l7 7m0 0l-7 7m7-7H3" />
                        </svg>
                        <div class="text-right">
                            <p class="text-violet-300">Selesai</p>
                            <p class="font-medium text-white">
                                {{ \Carbon\Carbon::parse($promo->tanggal_selesai)->format('d M Y') }}</p>
                        </div>
                    </div>
                </div>
            </div>
        @empty
            <div class="col-span-full rounded-2xl bg-white p-12 text-center shadow-sm border border-slate-100">
                <div class="flex flex-col items-center gap-3">
                    <div class="w-14 h-14 rounded-2xl bg-slate-100 flex items-center justify-center">
                        <svg class="w-7 h-7 text-slate-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z" />
                        </svg>
                    </div>
                    <p class="text-sm font-medium text-slate-500">Belum ada promo yang tersedia saat ini.</p>
                </div>
            </div>
        @endforelse
    </div>

@endsection
