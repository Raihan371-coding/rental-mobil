@extends('layouts.customer')

@section('title', 'Pengembalian Saya')

@section('content')

    {{-- ===================== PAGE HEADER ===================== --}}
    <div class="relative overflow-hidden rounded-2xl bg-gradient-to-br from-sky-600 to-blue-700 p-6 sm:p-8 shadow-lg">
        <div class="absolute -top-6 -right-6 w-32 h-32 rounded-full bg-white/10"></div>
        <div class="absolute -bottom-8 -left-6 w-28 h-28 rounded-full bg-white/5"></div>
        <div class="relative">
            <p class="text-xs font-semibold uppercase tracking-widest text-sky-200">Pengembalian</p>
            <h1 class="mt-2 text-2xl sm:text-3xl font-extrabold text-white">Status Pengembalian</h1>
            <p class="mt-2 text-sm text-sky-100 max-w-xl">Lihat status pengembalian kendaraan yang pernah Anda sewa.</p>
        </div>
    </div>

    {{-- ===================== DESKTOP TABLE (md and up) ===================== --}}
    <div class="hidden md:block mt-6 rounded-2xl bg-white shadow-sm border border-slate-100 overflow-hidden">
        <div class="overflow-x-auto">
            <table class="min-w-full divide-y divide-slate-100 text-sm text-slate-700">
                <thead class="bg-slate-50">
                    <tr>
                        <th class="px-5 py-3.5 text-left text-xs font-semibold uppercase tracking-wider text-slate-500">No
                        </th>
                        <th class="px-5 py-3.5 text-left text-xs font-semibold uppercase tracking-wider text-slate-500">ID
                            Rental</th>
                        <th class="px-5 py-3.5 text-left text-xs font-semibold uppercase tracking-wider text-slate-500">
                            Tanggal Pengembalian</th>
                        <th class="px-5 py-3.5 text-left text-xs font-semibold uppercase tracking-wider text-slate-500">
                            Kondisi Mobil</th>
                        <th class="px-5 py-3.5 text-left text-xs font-semibold uppercase tracking-wider text-slate-500">
                            Denda</th>
                        <th class="px-5 py-3.5 text-left text-xs font-semibold uppercase tracking-wider text-slate-500">
                            Keterangan</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-100 bg-white">
                    @forelse($data as $item)
                        <tr class="hover:bg-slate-50 transition-colors">
                            <td class="px-5 py-4 text-slate-500">{{ $loop->iteration }}</td>
                            <td class="px-5 py-4 font-mono text-xs text-slate-500">{{ $item->id_rental }}</td>
                            <td class="px-5 py-4 text-slate-600">{{ $item->tanggal_pengembalian }}</td>
                            <td class="px-5 py-4">
                                @if ($item->kondisi_mobil === 'baik')
                                    <span
                                        class="inline-flex items-center gap-1 rounded-full bg-emerald-100 px-2.5 py-1 text-xs font-semibold text-emerald-700">
                                        <span class="w-1.5 h-1.5 rounded-full bg-emerald-500"></span> Baik
                                    </span>
                                @else
                                    <span
                                        class="inline-flex items-center gap-1 rounded-full bg-amber-100 px-2.5 py-1 text-xs font-semibold text-amber-700">
                                        <span class="w-1.5 h-1.5 rounded-full bg-amber-500"></span>
                                        {{ ucfirst($item->kondisi_mobil) }}
                                    </span>
                                @endif
                            </td>
                            <td class="px-5 py-4">
                                @if ($item->denda > 0)
                                    <span class="font-semibold text-rose-600">Rp
                                        {{ number_format($item->denda, 0, ',', '.') }}</span>
                                @else
                                    <span class="text-slate-400">Rp 0</span>
                                @endif
                            </td>
                            <td class="px-5 py-4 text-slate-600">{{ $item->keterangan ?? '-' }}</td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="px-5 py-16 text-center">
                                <div class="flex flex-col items-center gap-3">
                                    <div class="w-14 h-14 rounded-2xl bg-slate-100 flex items-center justify-center">
                                        <svg class="w-7 h-7 text-slate-300" fill="none" stroke="currentColor"
                                            viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M9 14l-4-4m0 0l4-4m-4 4h11a4 4 0 010 8h-1" />
                                        </svg>
                                    </div>
                                    <p class="text-sm font-medium text-slate-500">Belum ada data pengembalian.</p>
                                </div>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

    {{-- ===================== MOBILE CARD LIST (below md) ===================== --}}
    <div class="md:hidden mt-6 space-y-4">
        @forelse($data as $item)
            <div class="rounded-2xl bg-white shadow-sm border border-slate-100 p-4">
                <div class="flex items-start justify-between gap-2">
                    <div class="min-w-0">
                        <p class="font-mono text-[11px] text-slate-400">ID Rental: {{ $item->id_rental }}</p>
                        <h3 class="mt-0.5 text-sm font-semibold text-slate-900">{{ $item->tanggal_pengembalian }}</h3>
                    </div>
                    @if ($item->kondisi_mobil === 'baik')
                        <span
                            class="flex-shrink-0 inline-flex items-center gap-1 rounded-full bg-emerald-100 px-2 py-1 text-[10px] font-semibold text-emerald-700">
                            <span class="w-1.5 h-1.5 rounded-full bg-emerald-500"></span> Baik
                        </span>
                    @else
                        <span
                            class="flex-shrink-0 inline-flex items-center gap-1 rounded-full bg-amber-100 px-2 py-1 text-[10px] font-semibold text-amber-700">
                            <span class="w-1.5 h-1.5 rounded-full bg-amber-500"></span> {{ ucfirst($item->kondisi_mobil) }}
                        </span>
                    @endif
                </div>

                <div class="mt-3 flex items-center justify-between pt-3 border-t border-slate-100">
                    <span class="text-xs text-slate-400">Denda</span>
                    @if ($item->denda > 0)
                        <span class="text-sm font-semibold text-rose-600">Rp
                            {{ number_format($item->denda, 0, ',', '.') }}</span>
                    @else
                        <span class="text-sm font-medium text-slate-400">Rp 0</span>
                    @endif
                </div>

                @if ($item->keterangan)
                    <p class="mt-2 text-xs text-slate-500 leading-snug">{{ $item->keterangan }}</p>
                @endif
            </div>
        @empty
            <div class="rounded-2xl bg-white shadow-sm border border-slate-100 px-5 py-16 text-center">
                <div class="flex flex-col items-center gap-3">
                    <div class="w-14 h-14 rounded-2xl bg-slate-100 flex items-center justify-center">
                        <svg class="w-7 h-7 text-slate-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M9 14l-4-4m0 0l4-4m-4 4h11a4 4 0 010 8h-1" />
                        </svg>
                    </div>
                    <p class="text-sm font-medium text-slate-500">Belum ada data pengembalian.</p>
                </div>
            </div>
        @endforelse
    </div>

@endsection
