@extends('layouts.customer')

@section('title', 'Pembayaran Saya')

@section('content')

{{-- ===================== PAGE HEADER ===================== --}}
<div class="relative overflow-hidden rounded-2xl bg-gradient-to-br from-sky-600 to-blue-700 p-6 sm:p-8 shadow-lg">
    <div class="absolute -top-6 -right-6 w-32 h-32 rounded-full bg-white/10"></div>
    <div class="absolute -bottom-8 -left-6 w-28 h-28 rounded-full bg-white/5"></div>
    <div class="relative">
        <p class="text-xs font-semibold uppercase tracking-widest text-sky-200">Pembayaran</p>
        <h1 class="mt-2 text-2xl sm:text-3xl font-extrabold text-white">Tagihan &amp; Pembayaran</h1>
        <p class="mt-2 text-sm text-sky-100 max-w-xl">Lihat tagihan dan status pembayaran rental Anda.</p>
    </div>
</div>

{{-- ===================== DESKTOP TABLE (lg and up) ===================== --}}
<div class="hidden lg:block mt-6 rounded-2xl bg-white shadow-sm border border-slate-100 overflow-hidden">
    <div class="overflow-x-auto">
        <table class="min-w-full divide-y divide-slate-100 text-sm text-slate-700">
            <thead class="bg-slate-50">
                <tr>
                    <th class="px-5 py-3.5 text-left text-xs font-semibold uppercase tracking-wider text-slate-500">No</th>
                    <th class="px-5 py-3.5 text-left text-xs font-semibold uppercase tracking-wider text-slate-500">Kode Pembayaran</th>
                    <th class="px-5 py-3.5 text-left text-xs font-semibold uppercase tracking-wider text-slate-500">Kode Rental</th>
                    <th class="px-5 py-3.5 text-left text-xs font-semibold uppercase tracking-wider text-slate-500">Tanggal Bayar</th>
                    <th class="px-5 py-3.5 text-left text-xs font-semibold uppercase tracking-wider text-slate-500">Metode</th>
                    <th class="px-5 py-3.5 text-left text-xs font-semibold uppercase tracking-wider text-slate-500">Jumlah</th>
                    <th class="px-5 py-3.5 text-left text-xs font-semibold uppercase tracking-wider text-slate-500">Status</th>
                    <th class="px-5 py-3.5 text-left text-xs font-semibold uppercase tracking-wider text-slate-500">Aksi</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-slate-100 bg-white">
                @forelse($data as $item)
                    <tr class="hover:bg-slate-50 transition-colors">
                        <td class="px-5 py-4 text-slate-500">{{ $loop->iteration }}</td>
                        <td class="px-5 py-4 font-mono text-xs text-slate-500">{{ $item->kode_pembayaran }}</td>
                        <td class="px-5 py-4 font-semibold text-slate-900">{{ $item->rental->kode_rental }}</td>
                        <td class="px-5 py-4 text-slate-600">{{ $item->tanggal_bayar }}</td>
                        <td class="px-5 py-4 text-slate-600">{{ $item->metode_bayar }}</td>
                        <td class="px-5 py-4 font-semibold text-slate-800">Rp {{ number_format($item->jumlah_bayar, 0, ',', '.') }}</td>
                        <td class="px-5 py-4">
                            @if ($item->status_bayar == 'belum_bayar')
                                <span class="inline-flex items-center gap-1 rounded-full bg-red-100 px-2.5 py-1 text-xs font-semibold text-red-700">
                                    <span class="w-1.5 h-1.5 rounded-full bg-red-500"></span> Belum Bayar
                                </span>
                            @elseif($item->status_bayar == 'menunggu_verifikasi')
                                <span class="inline-flex items-center gap-1 rounded-full bg-amber-100 px-2.5 py-1 text-xs font-semibold text-amber-700">
                                    <span class="w-1.5 h-1.5 rounded-full bg-amber-500 animate-pulse"></span> Menunggu Verifikasi
                                </span>
                            @elseif($item->status_bayar == 'lunas')
                                <span class="inline-flex items-center gap-1 rounded-full bg-emerald-100 px-2.5 py-1 text-xs font-semibold text-emerald-700">
                                    <span class="w-1.5 h-1.5 rounded-full bg-emerald-500"></span> Lunas
                                </span>
                            @elseif($item->status_bayar == 'ditolak')
                                <span class="inline-flex items-center gap-1 rounded-full bg-red-100 px-2.5 py-1 text-xs font-semibold text-red-700">
                                    <span class="w-1.5 h-1.5 rounded-full bg-red-500"></span> Ditolak
                                </span>
                            @endif
                        </td>
                        <td class="px-5 py-4">
                            @if ($item->status_bayar == 'belum_bayar')
                                <a href="{{ route('customer.pembayaran.show', $item->id) }}"
                                    class="inline-flex items-center gap-1 rounded-lg bg-sky-600 px-3 py-1.5 text-xs font-semibold text-white hover:bg-sky-700 transition-colors">
                                    Bayar
                                </a>
                            @elseif($item->status_bayar == 'menunggu_verifikasi')
                                <span class="inline-flex items-center gap-1 rounded-lg bg-amber-100 px-3 py-1.5 text-xs font-semibold text-amber-700 cursor-not-allowed">
                                    Menunggu
                                </span>
                            @elseif($item->status_bayar == 'lunas')
                                <span class="inline-flex items-center gap-1 rounded-lg bg-emerald-100 px-3 py-1.5 text-xs font-semibold text-emerald-700 cursor-not-allowed">
                                    <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                                    </svg>
                                    Selesai
                                </span>
                            @elseif($item->status_bayar == 'ditolak')
                                <a href="{{ route('customer.pembayaran.show', $item->id) }}"
                                    class="inline-flex items-center gap-1 rounded-lg bg-red-500 px-3 py-1.5 text-xs font-semibold text-white hover:bg-red-600 transition-colors">
                                    Upload Ulang
                                </a>
                            @endif
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="8" class="px-5 py-16 text-center">
                            <div class="flex flex-col items-center gap-3">
                                <div class="w-14 h-14 rounded-2xl bg-slate-100 flex items-center justify-center">
                                    <svg class="w-7 h-7 text-slate-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                    </svg>
                                </div>
                                <p class="text-sm font-medium text-slate-500">Belum ada data pembayaran.</p>
                            </div>
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>

{{-- ===================== MOBILE CARD LIST (below lg) ===================== --}}
<div class="lg:hidden mt-6 space-y-4">
    @forelse($data as $item)
        <div class="rounded-2xl bg-white shadow-sm border border-slate-100 p-4">
            <div class="flex items-start justify-between gap-2">
                <div class="min-w-0">
                    <p class="font-mono text-[11px] text-slate-400">{{ $item->kode_pembayaran }}</p>
                    <h3 class="font-semibold text-slate-900 truncate">{{ $item->rental->kode_rental }}</h3>
                    <p class="text-xs text-slate-500 mt-0.5">{{ $item->tanggal_bayar }} &middot; {{ $item->metode_bayar }}</p>
                </div>
                @if ($item->status_bayar == 'belum_bayar')
                    <span class="flex-shrink-0 inline-flex items-center gap-1 rounded-full bg-red-100 px-2 py-1 text-[10px] font-semibold text-red-700">
                        <span class="w-1.5 h-1.5 rounded-full bg-red-500"></span> Belum Bayar
                    </span>
                @elseif($item->status_bayar == 'menunggu_verifikasi')
                    <span class="flex-shrink-0 inline-flex items-center gap-1 rounded-full bg-amber-100 px-2 py-1 text-[10px] font-semibold text-amber-700">
                        <span class="w-1.5 h-1.5 rounded-full bg-amber-500 animate-pulse"></span> Verifikasi
                    </span>
                @elseif($item->status_bayar == 'lunas')
                    <span class="flex-shrink-0 inline-flex items-center gap-1 rounded-full bg-emerald-100 px-2 py-1 text-[10px] font-semibold text-emerald-700">
                        <span class="w-1.5 h-1.5 rounded-full bg-emerald-500"></span> Lunas
                    </span>
                @elseif($item->status_bayar == 'ditolak')
                    <span class="flex-shrink-0 inline-flex items-center gap-1 rounded-full bg-red-100 px-2 py-1 text-[10px] font-semibold text-red-700">
                        <span class="w-1.5 h-1.5 rounded-full bg-red-500"></span> Ditolak
                    </span>
                @endif
            </div>

            <div class="mt-3 flex items-center justify-between pt-3 border-t border-slate-100">
                <span class="text-sm font-bold text-slate-900">Rp {{ number_format($item->jumlah_bayar, 0, ',', '.') }}</span>

                @if ($item->status_bayar == 'belum_bayar')
                    <a href="{{ route('customer.pembayaran.show', $item->id) }}"
                        class="inline-flex items-center gap-1 rounded-lg bg-sky-600 px-3 py-1.5 text-xs font-semibold text-white hover:bg-sky-700 transition-colors">
                        Bayar
                    </a>
                @elseif($item->status_bayar == 'menunggu_verifikasi')
                    <span class="inline-flex items-center gap-1 rounded-lg bg-amber-100 px-3 py-1.5 text-xs font-semibold text-amber-700">
                        Menunggu
                    </span>
                @elseif($item->status_bayar == 'lunas')
                    <span class="inline-flex items-center gap-1 rounded-lg bg-emerald-100 px-3 py-1.5 text-xs font-semibold text-emerald-700">
                        <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                        </svg>
                        Selesai
                    </span>
                @elseif($item->status_bayar == 'ditolak')
                    <a href="{{ route('customer.pembayaran.show', $item->id) }}"
                        class="inline-flex items-center gap-1 rounded-lg bg-red-500 px-3 py-1.5 text-xs font-semibold text-white hover:bg-red-600 transition-colors">
                        Upload Ulang
                    </a>
                @endif
            </div>
        </div>
    @empty
        <div class="rounded-2xl bg-white shadow-sm border border-slate-100 px-5 py-16 text-center">
            <div class="flex flex-col items-center gap-3">
                <div class="w-14 h-14 rounded-2xl bg-slate-100 flex items-center justify-center">
                    <svg class="w-7 h-7 text-slate-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                    </svg>
                </div>
                <p class="text-sm font-medium text-slate-500">Belum ada data pembayaran.</p>
            </div>
        </div>
    @endforelse
</div>

@endsection
