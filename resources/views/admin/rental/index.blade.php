@extends('layouts.admin')
@section('title', 'Rental')
@section('content')

    {{-- ===================== PAGE HEADER ===================== --}}
    <div class="mb-6">
        <div class="mb-3 flex items-center gap-2 text-sm text-slate-500">
            <span class="text-slate-900 font-medium">Data Rental</span>
        </div>
        <div class="flex flex-col gap-4 sm:flex-row sm:items-center sm:justify-between">
            <div>
                <h1 class="text-2xl font-bold text-slate-900">Data Rental</h1>
                <p class="mt-1 text-sm text-slate-500">Kelola kontrak rental dan data penyewaan kendaraan.</p>
            </div>
            <a href="{{ route('admin.rental.create') }}"
                class="inline-flex items-center justify-center gap-2 rounded-xl bg-amber-500 px-4 py-2.5 text-sm font-semibold text-white shadow-sm hover:bg-amber-600 transition-colors w-full sm:w-auto">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                </svg>
                Tambah Rental
            </a>
        </div>
    </div>

    {{-- ===================== ALERT ===================== --}}
    @include('admin.partials.alert')

    {{-- ===================== STAT SUMMARY ===================== --}}
    <div class="mb-6 grid grid-cols-2 gap-4 sm:grid-cols-3">
        <div class="relative overflow-hidden rounded-2xl bg-white p-4 shadow-sm border border-slate-100">
            <p class="text-[11px] font-semibold uppercase tracking-widest text-slate-400">Total Rental</p>
            <h2 class="mt-1 text-2xl font-extrabold text-slate-900">{{ $data->count() }}</h2>
        </div>
        <div class="relative overflow-hidden rounded-2xl bg-white p-4 shadow-sm border border-slate-100">
            <p class="text-[11px] font-semibold uppercase tracking-widest text-slate-400">Sedang Rental</p>
            <h2 class="mt-1 text-2xl font-extrabold text-blue-600">
                {{ $data->filter(fn($item) => strtolower($item->status) == 'rental')->count() }}</h2>
        </div>
        <div
            class="relative overflow-hidden rounded-2xl bg-white p-4 shadow-sm border border-slate-100 col-span-2 sm:col-span-1">
            <p class="text-[11px] font-semibold uppercase tracking-widest text-slate-400">Sudah Kembali</p>
            <h2 class="mt-1 text-2xl font-extrabold text-emerald-600">
                {{ $data->filter(fn($item) => strtolower($item->status) != 'rental')->count() }}</h2>
        </div>
    </div>

    {{-- ===================== TABLE CARD (desktop / tablet) ===================== --}}
    <div class="hidden rounded-2xl bg-white shadow-sm border border-slate-100 overflow-hidden md:block">
        <div class="flex items-center justify-between border-b border-slate-100 px-5 py-4">
            <h3 class="text-sm font-bold text-slate-900">Daftar Rental</h3>
            <span class="text-xs text-slate-400">{{ $data->count() }} data</span>
        </div>
        <div class="overflow-x-auto">
            <table class="min-w-full divide-y divide-slate-100 text-sm text-slate-700">
                <thead class="bg-slate-50">
                    <tr>
                        <th class="px-5 py-3.5 text-left text-xs font-semibold uppercase tracking-wider text-slate-500">Kode
                            Rental</th>
                        <th class="px-5 py-3.5 text-left text-xs font-semibold uppercase tracking-wider text-slate-500">Kode
                            Booking</th>
                        <th class="px-5 py-3.5 text-left text-xs font-semibold uppercase tracking-wider text-slate-500">
                            Customer</th>
                        <th class="px-5 py-3.5 text-left text-xs font-semibold uppercase tracking-wider text-slate-500">
                            Mobil</th>
                        <th class="px-5 py-3.5 text-left text-xs font-semibold uppercase tracking-wider text-slate-500">Tgl
                            Rental</th>
                        <th class="px-5 py-3.5 text-left text-xs font-semibold uppercase tracking-wider text-slate-500">Tgl
                            Kembali</th>
                        <th class="px-5 py-3.5 text-left text-xs font-semibold uppercase tracking-wider text-slate-500">
                            Total Harga</th>
                        <th class="px-5 py-3.5 text-left text-xs font-semibold uppercase tracking-wider text-slate-500">
                            Status</th>
                        <th class="px-5 py-3.5 text-left text-xs font-semibold uppercase tracking-wider text-slate-500">Aksi
                        </th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-100 bg-white">
                    @forelse($data as $item)
                        <tr class="hover:bg-slate-50 transition-colors">
                            <td
                                class="px-5 py-4 font-mono text-xs font-semibold text-amber-700 bg-amber-50 whitespace-nowrap">
                                {{ $item->kode_rental }}</td>
                            <td class="px-5 py-4 font-mono text-xs text-slate-500">{{ $item->booking->kode_booking ?? '-' }}
                            </td>
                            <td class="px-5 py-4">
                                <div class="flex items-center gap-2">
                                    <div
                                        class="w-7 h-7 rounded-full bg-amber-100 flex items-center justify-center text-xs font-bold text-amber-700 flex-shrink-0">
                                        {{ strtoupper(substr($item->customer->nama ?? 'X', 0, 1)) }}
                                    </div>
                                    <div>
                                        <p class="font-semibold text-slate-800 text-xs">
                                            {{ $item->customer->kode_customer ?? '-' }}</p>
                                        <p class="text-slate-500 text-xs">{{ $item->customer->nama ?? '' }}</p>
                                    </div>
                                </div>
                            </td>
                            <td class="px-5 py-4">
                                <p class="font-semibold text-slate-800 text-xs">{{ $item->mobil->kode_mobil ?? '-' }}</p>
                                <p class="text-slate-500 text-xs">{{ $item->mobil->nama_mobil ?? '' }}</p>
                            </td>
                            <td class="px-5 py-4 text-slate-600">{{ $item->tanggal_rental }}</td>
                            <td class="px-5 py-4 text-slate-600">{{ $item->tanggal_kembali }}</td>
                            <td class="px-5 py-4 font-semibold text-slate-800">Rp
                                {{ number_format($item->total_harga, 0, ',', '.') }}</td>
                            <td class="px-5 py-4">
                                @if (strtolower($item->status) == 'rental')
                                    <span
                                        class="inline-flex items-center gap-1 rounded-full bg-blue-100 px-2.5 py-1 text-xs font-semibold text-blue-700">
                                        <span class="w-1.5 h-1.5 rounded-full bg-blue-500 animate-pulse"></span> Rental
                                    </span>
                                @else
                                    <span
                                        class="inline-flex items-center gap-1 rounded-full bg-emerald-100 px-2.5 py-1 text-xs font-semibold text-emerald-700">
                                        <span class="w-1.5 h-1.5 rounded-full bg-emerald-500"></span> Kembali
                                    </span>
                                @endif
                            </td>
                            <td class="px-5 py-4">
                                <div class="flex items-center gap-2">
                                    <a href="{{ route('admin.rental.edit', $item->id) }}"
                                        class="inline-flex items-center gap-1 rounded-lg bg-slate-800 px-3 py-1.5 text-xs font-semibold text-white hover:bg-slate-700 transition-colors">
                                        <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                        </svg>
                                        Edit
                                    </a>
                                    <form action="{{ route('admin.rental.destroy', $item->id) }}" method="POST"
                                        class="inline delete-form">
                                        @csrf @method('DELETE')
                                        <button type="button" data-name="{{ $item->kode_rental }}"
                                            class="btn-delete inline-flex items-center gap-1 rounded-lg bg-red-500 px-3 py-1.5 text-xs font-semibold text-white hover:bg-red-600 transition-colors">
                                            <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                            </svg>
                                            Hapus
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="9" class="px-5 py-16 text-center">
                                <div class="flex flex-col items-center gap-3">
                                    <div class="w-14 h-14 rounded-2xl bg-slate-100 flex items-center justify-center">
                                        <svg class="w-7 h-7 text-slate-300" fill="none" stroke="currentColor"
                                            viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                                        </svg>
                                    </div>
                                    <p class="text-sm font-medium text-slate-500">Data rental belum tersedia</p>
                                </div>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

    {{-- ===================== CARD LIST (mobile) ===================== --}}
    <div class="space-y-4 md:hidden">
        @forelse($data as $item)
            <div class="rounded-2xl bg-white p-5 shadow-sm border border-slate-100">
                <div class="flex items-start justify-between gap-3">
                    <div class="min-w-0">
                        <p class="text-[11px] font-mono font-semibold text-amber-700">{{ $item->kode_rental }}</p>
                        <h3 class="mt-0.5 text-sm font-bold text-slate-900 truncate">{{ $item->customer->nama ?? '-' }}
                        </h3>
                        <p class="text-xs text-slate-500 truncate">{{ $item->mobil->nama_mobil ?? '-' }}</p>
                    </div>
                    @if (strtolower($item->status) == 'rental')
                        <span
                            class="flex-shrink-0 inline-flex items-center gap-1 rounded-full bg-blue-100 px-2.5 py-1 text-xs font-semibold text-blue-700">
                            <span class="w-1.5 h-1.5 rounded-full bg-blue-500 animate-pulse"></span> Rental
                        </span>
                    @else
                        <span
                            class="flex-shrink-0 inline-flex items-center gap-1 rounded-full bg-emerald-100 px-2.5 py-1 text-xs font-semibold text-emerald-700">
                            <span class="w-1.5 h-1.5 rounded-full bg-emerald-500"></span> Kembali
                        </span>
                    @endif
                </div>

                <div class="mt-4 grid grid-cols-2 gap-y-2 gap-x-3 text-xs">
                    <div>
                        <p class="text-slate-400">Kode Booking</p>
                        <p class="font-medium text-slate-700 font-mono">{{ $item->booking->kode_booking ?? '-' }}</p>
                    </div>
                    <div>
                        <p class="text-slate-400">Total Harga</p>
                        <p class="font-semibold text-slate-800">Rp {{ number_format($item->total_harga, 0, ',', '.') }}
                        </p>
                    </div>
                    <div>
                        <p class="text-slate-400">Tgl Rental</p>
                        <p class="font-medium text-slate-700">{{ $item->tanggal_rental }}</p>
                    </div>
                    <div>
                        <p class="text-slate-400">Tgl Kembali</p>
                        <p class="font-medium text-slate-700">{{ $item->tanggal_kembali }}</p>
                    </div>
                </div>

                <div class="mt-4 flex items-center gap-2 border-t border-slate-100 pt-4">
                    <a href="{{ route('admin.rental.edit', $item->id) }}"
                        class="flex-1 inline-flex items-center justify-center gap-1 rounded-lg bg-slate-800 px-3 py-2 text-xs font-semibold text-white hover:bg-slate-700 transition-colors">
                        <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                        </svg>
                        Edit
                    </a>
                    <form action="{{ route('admin.rental.destroy', $item->id) }}" method="POST"
                        class="flex-1 delete-form">
                        @csrf @method('DELETE')
                        <button type="button" data-name="{{ $item->kode_rental }}"
                            class="btn-delete w-full inline-flex items-center justify-center gap-1 rounded-lg bg-red-500 px-3 py-2 text-xs font-semibold text-white hover:bg-red-600 transition-colors">
                            <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                            </svg>
                            Hapus
                        </button>
                    </form>
                </div>
            </div>
        @empty
            <div class="rounded-2xl bg-white p-10 shadow-sm border border-slate-100">
                <div class="flex flex-col items-center gap-3">
                    <div class="w-14 h-14 rounded-2xl bg-slate-100 flex items-center justify-center">
                        <svg class="w-7 h-7 text-slate-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                        </svg>
                    </div>
                    <p class="text-sm font-medium text-slate-500">Data rental belum tersedia</p>
                </div>
            </div>
        @endforelse
    </div>

@endsection

@push('scripts')
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            document.querySelectorAll('.btn-delete').forEach(function(btn) {
                btn.addEventListener('click', function() {
                    const form = btn.closest('form');
                    const name = btn.getAttribute('data-name');

                    Swal.fire({
                        title: 'Hapus Rental?',
                        text: `Data rental "${name}" akan dihapus permanen dan tidak dapat dikembalikan.`,
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: '#ef4444',
                        cancelButtonColor: '#64748b',
                        confirmButtonText: 'Ya, hapus',
                        cancelButtonText: 'Batal',
                        reverseButtons: true,
                        customClass: {
                            popup: 'rounded-2xl'
                        }
                    }).then(function(result) {
                        if (result.isConfirmed) {
                            form.submit();
                        }
                    });
                });
            });

            @if (session('success'))
                Swal.fire({
                    title: 'Berhasil!',
                    text: @json(session('success')),
                    icon: 'success',
                    confirmButtonColor: '#d97706',
                    timer: 2500,
                    timerProgressBar: true,
                    customClass: {
                        popup: 'rounded-2xl'
                    }
                });
            @endif

            @if (session('error'))
                Swal.fire({
                    title: 'Gagal!',
                    text: @json(session('error')),
                    icon: 'error',
                    confirmButtonColor: '#d97706',
                    customClass: {
                        popup: 'rounded-2xl'
                    }
                });
            @endif
        });
    </script>
@endpush
