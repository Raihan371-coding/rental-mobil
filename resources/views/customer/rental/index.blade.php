@extends('layouts.customer')

@section('title', 'Rental Saya')

@section('content')

    {{-- ===================== PAGE HEADER ===================== --}}
    <div class="relative overflow-hidden rounded-2xl bg-gradient-to-br from-sky-600 to-blue-700 p-6 sm:p-8 shadow-lg">
        <div class="absolute -top-6 -right-6 w-32 h-32 rounded-full bg-white/10"></div>
        <div class="absolute -bottom-8 -left-6 w-28 h-28 rounded-full bg-white/5"></div>
        <div class="relative">
            <p class="text-xs font-semibold uppercase tracking-widest text-sky-200">Rental</p>
            <h1 class="mt-2 text-2xl sm:text-3xl font-extrabold text-white">Rental Saya</h1>
            <p class="mt-2 text-sm text-sky-100 max-w-xl">Lihat riwayat rental dan status pengembalian kendaraan.</p>
        </div>
    </div>

    {{-- ===================== DESKTOP TABLE (md and up) ===================== --}}
    <div class="hidden md:block mt-6 rounded-2xl bg-white shadow-sm border border-slate-100 overflow-hidden">
        <div class="overflow-x-auto">
            <table class="min-w-full divide-y divide-slate-100 text-sm text-slate-700">
                <thead class="bg-slate-50">
                    <tr>
                        <th class="px-5 py-3.5 text-left text-xs font-semibold uppercase tracking-wider text-slate-500">Kode
                            Rental</th>
                        <th class="px-5 py-3.5 text-left text-xs font-semibold uppercase tracking-wider text-slate-500">
                            Mobil</th>
                        <th class="px-5 py-3.5 text-left text-xs font-semibold uppercase tracking-wider text-slate-500">
                            Tanggal Rental</th>
                        <th class="px-5 py-3.5 text-left text-xs font-semibold uppercase tracking-wider text-slate-500">
                            Tanggal Kembali</th>
                        <th class="px-5 py-3.5 text-left text-xs font-semibold uppercase tracking-wider text-slate-500">
                            Status</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-100 bg-white">
                    @forelse($data as $rental)
                        <tr class="hover:bg-slate-50 transition-colors">
                            <td class="px-5 py-4 font-mono text-xs text-slate-500">{{ $rental->kode_rental }}</td>
                            <td class="px-5 py-4 font-semibold text-slate-900">{{ $rental->mobil?->nama_mobil ?? 'N/A' }}
                            </td>
                            <td class="px-5 py-4 text-slate-600">{{ optional($rental->tanggal_rental)->format('d M Y') }}
                            </td>
                            <td class="px-5 py-4 text-slate-600">
                                {{ optional($rental->tanggal_kembali)->format('d M Y') ?? '-' }}</td>
                            <td class="px-5 py-4">
                                @if ($rental->status === 'selesai')
                                    <span
                                        class="inline-flex items-center gap-1 rounded-full bg-emerald-100 px-2.5 py-1 text-xs font-semibold text-emerald-700">
                                        <span class="w-1.5 h-1.5 rounded-full bg-emerald-500"></span> Selesai
                                    </span>
                                @else
                                    <span
                                        class="inline-flex items-center gap-1 rounded-full bg-amber-100 px-2.5 py-1 text-xs font-semibold text-amber-700">
                                        <span class="w-1.5 h-1.5 rounded-full bg-amber-500 animate-pulse"></span>
                                        {{ ucfirst($rental->status) }}
                                    </span>
                                @endif
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="px-5 py-16 text-center">
                                <div class="flex flex-col items-center gap-3">
                                    <div class="w-14 h-14 rounded-2xl bg-slate-100 flex items-center justify-center">
                                        <svg class="w-7 h-7 text-slate-300" fill="none" stroke="currentColor"
                                            viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M8 7h12m0 0l-4-4m4 4l-4 4m0 6H4m0 0l4 4m-4-4l4-4" />
                                        </svg>
                                    </div>
                                    <p class="text-sm font-medium text-slate-500">Belum ada rental.</p>
                                    <a href="{{ route('customer.mobil.index') }}"
                                        class="text-sm font-semibold text-sky-600 hover:text-sky-700">Lihat katalog mobil
                                        →</a>
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
        @forelse($data as $rental)
            <div class="rounded-2xl bg-white shadow-sm border border-slate-100 p-4">
                <div class="flex items-start justify-between gap-2">
                    <div class="min-w-0">
                        <p class="font-mono text-[11px] text-slate-400">{{ $rental->kode_rental }}</p>
                        <h3 class="font-semibold text-slate-900 truncate">{{ $rental->mobil?->nama_mobil ?? 'N/A' }}</h3>
                    </div>
                    @if ($rental->status === 'selesai')
                        <span
                            class="flex-shrink-0 inline-flex items-center gap-1 rounded-full bg-emerald-100 px-2 py-1 text-[10px] font-semibold text-emerald-700">
                            <span class="w-1.5 h-1.5 rounded-full bg-emerald-500"></span> Selesai
                        </span>
                    @else
                        <span
                            class="flex-shrink-0 inline-flex items-center gap-1 rounded-full bg-amber-100 px-2 py-1 text-[10px] font-semibold text-amber-700">
                            <span class="w-1.5 h-1.5 rounded-full bg-amber-500 animate-pulse"></span>
                            {{ ucfirst($rental->status) }}
                        </span>
                    @endif
                </div>

                <div class="mt-3 grid grid-cols-2 gap-3 text-xs pt-3 border-t border-slate-100">
                    <div>
                        <p class="text-slate-400">Tanggal Rental</p>
                        <p class="mt-0.5 font-medium text-slate-700">
                            {{ optional($rental->tanggal_rental)->format('d M Y') }}</p>
                    </div>
                    <div>
                        <p class="text-slate-400">Tanggal Kembali</p>
                        <p class="mt-0.5 font-medium text-slate-700">
                            {{ optional($rental->tanggal_kembali)->format('d M Y') ?? '-' }}</p>
                    </div>
                </div>
            </div>
        @empty
            <div class="rounded-2xl bg-white shadow-sm border border-slate-100 px-5 py-16 text-center">
                <div class="flex flex-col items-center gap-3">
                    <div class="w-14 h-14 rounded-2xl bg-slate-100 flex items-center justify-center">
                        <svg class="w-7 h-7 text-slate-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M8 7h12m0 0l-4-4m4 4l-4 4m0 6H4m0 0l4 4m-4-4l4-4" />
                        </svg>
                    </div>
                    <p class="text-sm font-medium text-slate-500">Belum ada rental.</p>
                    <a href="{{ route('customer.mobil.index') }}"
                        class="text-sm font-semibold text-sky-600 hover:text-sky-700">Lihat katalog mobil →</a>
                </div>
            </div>
        @endforelse
    </div>

@endsection
