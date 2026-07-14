@extends('layouts.customer')

@section('title', 'Katalog Mobil')

@section('content')

{{-- ===================== PAGE HEADER ===================== --}}
<div class="relative overflow-hidden rounded-2xl bg-gradient-to-br from-sky-600 to-blue-700 p-6 sm:p-8 shadow-lg">
    <div class="absolute -top-6 -right-6 w-32 h-32 rounded-full bg-white/10"></div>
    <div class="absolute -bottom-8 -left-6 w-28 h-28 rounded-full bg-white/5"></div>
    <div class="relative">
        <p class="text-xs font-semibold uppercase tracking-widest text-sky-200">Katalog</p>
        <h1 class="mt-2 text-2xl sm:text-3xl font-extrabold text-white">Katalog Mobil</h1>
        <p class="mt-2 text-sm text-sky-100 max-w-xl">Lihat daftar mobil yang tersedia untuk disewa. Pilih mobil lalu buat booking.</p>
    </div>
</div>

{{-- ===================== CAR GRID ===================== --}}
<div class="mt-6 grid gap-5 sm:grid-cols-2 lg:grid-cols-3">
    @forelse($mobils as $mobil)
        <div class="group overflow-hidden rounded-2xl bg-white shadow-sm border border-slate-100 hover:shadow-md hover:border-sky-200 transition-all duration-200">

            {{-- Photo --}}
            <div class="relative h-48 overflow-hidden bg-slate-100">
                @if($mobil->foto)
                    <img src="{{ asset('storage/' . $mobil->foto) }}" alt="{{ $mobil->nama_mobil }}"
                        class="h-full w-full object-cover transition-transform duration-300 group-hover:scale-105">
                @else
                    <div class="flex h-full items-center justify-center">
                        <svg class="w-10 h-10 text-slate-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                        </svg>
                    </div>
                @endif

                {{-- Status badge overlay --}}
                <div class="absolute top-3 right-3">
                    @if($mobil->status === 'tersedia')
                        <span class="inline-flex items-center gap-1.5 rounded-full bg-white/95 backdrop-blur-sm px-2.5 py-1 text-xs font-semibold text-emerald-700 shadow-sm">
                            <span class="w-1.5 h-1.5 rounded-full bg-emerald-500 animate-pulse"></span>
                            Tersedia
                        </span>
                    @else
                        <span class="inline-flex items-center gap-1.5 rounded-full bg-white/95 backdrop-blur-sm px-2.5 py-1 text-xs font-semibold text-rose-700 shadow-sm">
                            <span class="w-1.5 h-1.5 rounded-full bg-rose-500"></span>
                            {{ ucfirst($mobil->status) }}
                        </span>
                    @endif
                </div>
            </div>

            {{-- Body --}}
            <div class="p-5">
                <h3 class="text-base font-bold text-slate-900 truncate">{{ $mobil->nama_mobil }}</h3>
                <p class="mt-1 text-sm text-slate-500">{{ $mobil->merk }} &middot; {{ $mobil->tahun }}</p>

                <div class="mt-2">
                    <span class="inline-flex items-center rounded-md bg-slate-100 px-2 py-1 text-xs font-medium text-slate-600">
                        {{ $mobil->plat_nomor }}
                    </span>
                </div>

                <div class="mt-4 pt-4 border-t border-slate-100 flex items-center justify-between">
                    <div>
                        <span class="text-lg font-extrabold text-slate-900">Rp {{ number_format($mobil->harga_sewa, 0, ',', '.') }}</span>
                        <span class="text-xs font-medium text-slate-400">/hari</span>
                    </div>
                </div>

                @if($mobil->status === 'tersedia')
                    <a href="{{ route('customer.booking.create', ['mobil_id' => $mobil->id]) }}"
                        class="mt-4 flex items-center justify-center gap-2 w-full rounded-xl bg-sky-600 px-4 py-2.5 text-sm font-semibold text-white shadow-sm hover:bg-sky-700 transition-colors">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                        </svg>
                        Booking Sekarang
                    </a>
                @else
                    <div class="mt-4 flex items-center justify-center gap-2 w-full rounded-xl bg-slate-100 px-4 py-2.5 text-sm font-semibold text-slate-400 cursor-not-allowed">
                        Tidak Tersedia
                    </div>
                @endif
            </div>
        </div>
    @empty
        <div class="col-span-full rounded-2xl bg-white p-12 text-center shadow-sm border border-slate-100">
            <div class="flex flex-col items-center gap-3">
                <div class="w-14 h-14 rounded-2xl bg-slate-100 flex items-center justify-center">
                    <svg class="w-7 h-7 text-slate-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7h12m0 0l-4-4m4 4l-4 4m0 6H4m0 0l4 4m-4-4l4-4"/>
                    </svg>
                </div>
                <p class="text-sm font-medium text-slate-500">Belum ada mobil yang tersedia saat ini.</p>
            </div>
        </div>
    @endforelse
</div>

@endsection
