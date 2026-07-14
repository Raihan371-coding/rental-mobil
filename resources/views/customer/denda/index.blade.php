@extends('layouts.customer')

@section('title', 'Denda Saya')

@section('content')

    {{-- ===================== PAGE HEADER ===================== --}}
    <div class="relative overflow-hidden rounded-2xl bg-gradient-to-br from-sky-600 to-blue-700 p-6 sm:p-8 shadow-lg">
        <div class="absolute -top-6 -right-6 w-32 h-32 rounded-full bg-white/10"></div>
        <div class="absolute -bottom-8 -left-6 w-28 h-28 rounded-full bg-white/5"></div>
        <div class="relative">
            <p class="text-xs font-semibold uppercase tracking-widest text-sky-200">Denda</p>
            <h1 class="mt-2 text-2xl sm:text-3xl font-extrabold text-white">Denda</h1>
            <p class="mt-2 text-sm text-sky-100 max-w-xl">Lihat denda yang dikenakan atas keterlambatan atau kerusakan
                kendaraan.</p>
        </div>
    </div>

    {{-- ===================== SUMMARY CARD ===================== --}}
    @php $totalDenda = $dendas->sum('jumlah_denda'); @endphp
    <div class="mt-6 relative overflow-hidden rounded-2xl bg-white p-5 shadow-sm border border-slate-100">
        @if ($totalDenda > 0)
            <div class="absolute top-0 right-0 w-20 h-20 rounded-bl-[2.5rem] bg-rose-50 opacity-60"></div>
        @else
            <div class="absolute top-0 right-0 w-20 h-20 rounded-bl-[2.5rem] bg-emerald-50 opacity-60"></div>
        @endif
        <div class="relative flex items-center gap-4">
            <div
                class="flex h-12 w-12 flex-shrink-0 items-center justify-center rounded-xl {{ $totalDenda > 0 ? 'bg-rose-100 text-rose-600' : 'bg-emerald-100 text-emerald-600' }} shadow-sm">
                @if ($totalDenda > 0)
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M12 9v3.75m-9.303 3.376c-.866 1.5.217 3.374 1.948 3.374h14.71c1.73 0 2.813-1.874 1.948-3.374L13.949 3.378c-.866-1.5-3.032-1.5-3.898 0L2.697 16.126zM12 15.75h.007v.008H12v-.008z" />
                    </svg>
                @else
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                    </svg>
                @endif
            </div>
            <div>
                <p class="text-xs font-semibold uppercase tracking-widest text-slate-400">Total Denda</p>
                @if ($totalDenda > 0)
                    <h2 class="mt-1 text-2xl font-extrabold text-rose-600">Rp {{ number_format($totalDenda, 0, ',', '.') }}
                    </h2>
                @else
                    <h2 class="mt-1 text-2xl font-extrabold text-emerald-600">Tidak ada denda 🎉</h2>
                @endif
            </div>
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
                        <th class="px-5 py-3.5 text-left text-xs font-semibold uppercase tracking-wider text-slate-500">Kode
                            Rental</th>
                        <th class="px-5 py-3.5 text-left text-xs font-semibold uppercase tracking-wider text-slate-500">
                            Jumlah Denda</th>
                        <th class="px-5 py-3.5 text-left text-xs font-semibold uppercase tracking-wider text-slate-500">
                            Keterangan</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-100 bg-white">
                    @forelse($dendas as $denda)
                        <tr class="hover:bg-slate-50 transition-colors">
                            <td class="px-5 py-4 text-slate-500">{{ $loop->iteration }}</td>
                            <td class="px-5 py-4 font-semibold text-slate-900">{{ $denda->rental->kode_rental }}</td>
                            <td class="px-5 py-4">
                                <span class="font-semibold text-rose-600">Rp
                                    {{ number_format($denda->jumlah_denda, 0, ',', '.') }}</span>
                            </td>
                            <td class="px-5 py-4 text-slate-600">{{ $denda->keterangan ?? '-' }}</td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4" class="px-5 py-16 text-center">
                                <div class="flex flex-col items-center gap-3">
                                    <div class="w-14 h-14 rounded-2xl bg-emerald-50 flex items-center justify-center">
                                        <svg class="w-7 h-7 text-emerald-400" fill="none" stroke="currentColor"
                                            viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M5 13l4 4L19 7" />
                                        </svg>
                                    </div>
                                    <p class="text-sm font-medium text-slate-500">Tidak ada denda. Kendaraan Anda selalu
                                        dikembalikan dengan baik 🎉</p>
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
        @forelse($dendas as $denda)
            <div class="rounded-2xl bg-white shadow-sm border border-slate-100 p-4">
                <div class="flex items-start justify-between gap-2">
                    <h3 class="font-semibold text-slate-900">{{ $denda->rental->kode_rental }}</h3>
                    <span class="text-sm font-bold text-rose-600">Rp
                        {{ number_format($denda->jumlah_denda, 0, ',', '.') }}</span>
                </div>
                @if ($denda->keterangan)
                    <p class="mt-2 text-xs text-slate-500 leading-snug pt-2 border-t border-slate-100">
                        {{ $denda->keterangan }}</p>
                @endif
            </div>
        @empty
            <div class="rounded-2xl bg-white shadow-sm border border-slate-100 px-5 py-16 text-center">
                <div class="flex flex-col items-center gap-3">
                    <div class="w-14 h-14 rounded-2xl bg-emerald-50 flex items-center justify-center">
                        <svg class="w-7 h-7 text-emerald-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                        </svg>
                    </div>
                    <p class="text-sm font-medium text-slate-500">Tidak ada denda. Kendaraan Anda selalu dikembalikan dengan
                        baik 🎉</p>
                </div>
            </div>
        @endforelse
    </div>

@endsection
