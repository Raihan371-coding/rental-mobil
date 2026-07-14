@extends('layouts.admin')
@section('title', 'Data Booking')
@section('content')

{{-- ===================== PAGE HEADER ===================== --}}
<div class="mb-6">
    <div class="mb-3 flex items-center gap-2 text-sm text-slate-500">
        <span class="text-slate-900 font-medium">Data Booking</span>
    </div>
    <div class="flex flex-col gap-4 sm:flex-row sm:items-center sm:justify-between">
        <div>
            <h1 class="text-2xl font-bold text-slate-900">Data Booking</h1>
            <p class="mt-1 text-sm text-slate-500">Pantau semua pemesanan pelanggan dan kelola status booking.</p>
        </div>
        <a href="{{ route('admin.booking.create') }}"
            class="inline-flex items-center justify-center gap-2 rounded-xl bg-violet-600 px-4 py-2.5 text-sm font-semibold text-white shadow-sm hover:bg-violet-700 transition-colors w-full sm:w-auto">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
            </svg>
            Tambah Booking
        </a>
    </div>
</div>

{{-- ===================== ALERT ===================== --}}
@include('admin.partials.alert')

{{-- ===================== SUMMARY STRIP ===================== --}}
<div class="mb-6 grid grid-cols-2 gap-4 sm:grid-cols-4">
    <div class="relative overflow-hidden rounded-2xl bg-white p-4 shadow-sm border border-slate-100">
        <p class="text-[11px] font-semibold uppercase tracking-widest text-slate-400">Total</p>
        <h2 class="mt-1 text-2xl font-extrabold text-slate-900">{{ $bookings->count() }}</h2>
    </div>
    <div class="relative overflow-hidden rounded-2xl bg-white p-4 shadow-sm border border-slate-100">
        <p class="text-[11px] font-semibold uppercase tracking-widest text-slate-400">Menunggu</p>
        <h2 class="mt-1 text-2xl font-extrabold text-amber-600">
            {{ $bookings->where('status', 'menunggu konfirmasi')->count() }}</h2>
    </div>
    <div class="relative overflow-hidden rounded-2xl bg-white p-4 shadow-sm border border-slate-100">
        <p class="text-[11px] font-semibold uppercase tracking-widest text-slate-400">Terkonfirmasi</p>
        <h2 class="mt-1 text-2xl font-extrabold text-emerald-600">
            {{ $bookings->where('status', 'terkonfirmasi')->count() }}</h2>
    </div>
    <div class="relative overflow-hidden rounded-2xl bg-white p-4 shadow-sm border border-slate-100">
        <p class="text-[11px] font-semibold uppercase tracking-widest text-slate-400">Ditolak</p>
        <h2 class="mt-1 text-2xl font-extrabold text-red-500">{{ $bookings->where('status', 'ditolak')->count() }}</h2>
    </div>
</div>

{{-- ===================== TABLE CARD (desktop / tablet) ===================== --}}
<div class="hidden rounded-2xl bg-white shadow-sm border border-slate-100 overflow-hidden md:block">
    <div class="flex items-center justify-between border-b border-slate-100 px-5 py-4">
        <h3 class="text-sm font-bold text-slate-900">Daftar Booking</h3>
        <span class="text-xs text-slate-400">{{ $bookings->count() }} data</span>
    </div>
    <div class="overflow-x-auto">
        <table class="min-w-full divide-y divide-slate-100 text-sm text-slate-700">
            <thead class="bg-slate-50">
                <tr>
                    <th class="px-5 py-3.5 text-left text-xs font-semibold uppercase tracking-wider text-slate-500">Kode</th>
                    <th class="px-5 py-3.5 text-left text-xs font-semibold uppercase tracking-wider text-slate-500">Pelanggan</th>
                    <th class="px-5 py-3.5 text-left text-xs font-semibold uppercase tracking-wider text-slate-500">Customer</th>
                    <th class="px-5 py-3.5 text-left text-xs font-semibold uppercase tracking-wider text-slate-500">Mobil</th>
                    <th class="px-5 py-3.5 text-left text-xs font-semibold uppercase tracking-wider text-slate-500">Tgl Booking</th>
                    <th class="px-5 py-3.5 text-left text-xs font-semibold uppercase tracking-wider text-slate-500">Jam</th>
                    <th class="px-5 py-3.5 text-left text-xs font-semibold uppercase tracking-wider text-slate-500">Mulai</th>
                    <th class="px-5 py-3.5 text-left text-xs font-semibold uppercase tracking-wider text-slate-500">Selesai</th>
                    <th class="px-5 py-3.5 text-left text-xs font-semibold uppercase tracking-wider text-slate-500">Status</th>
                    <th class="px-5 py-3.5 text-left text-xs font-semibold uppercase tracking-wider text-slate-500">Aksi</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-slate-100 bg-white">
                @forelse($bookings as $booking)
                <tr class="hover:bg-slate-50 transition-colors">
                    <td class="px-5 py-4 font-mono text-xs text-slate-500">{{ $booking->customer->kode_customer ?? '-' }}</td>
                    <td class="px-5 py-4 font-semibold text-slate-900">{{ $booking->nama_pelanggan }}</td>
                    <td class="px-5 py-4 text-slate-600">{{ $booking->customer->nama ?? '-' }}</td>
                    <td class="px-5 py-4 text-slate-600">{{ $booking->mobil->nama_mobil ?? '-' }}</td>
                    <td class="px-5 py-4 text-slate-600">{{ $booking->tanggal_booking }}</td>
                    <td class="px-5 py-4 text-slate-600">{{ $booking->jam_booking }}</td>
                    <td class="px-5 py-4 text-slate-600">{{ $booking->tanggal_mulai ?? '-' }}</td>
                    <td class="px-5 py-4 text-slate-600">{{ $booking->tanggal_selesai ?? '-' }}</td>
                    <td class="px-5 py-4">
                        @include('admin.booking.partials.status-badge', ['status' => $booking->status])
                    </td>
                    <td class="px-5 py-4">
                        <div class="flex items-center gap-2">
                            <a href="{{ route('admin.booking.edit', $booking->id) }}"
                                class="inline-flex items-center gap-1 rounded-lg bg-slate-800 px-3 py-1.5 text-xs font-semibold text-white hover:bg-slate-700 transition-colors">
                                <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                </svg>
                                Edit
                            </a>
                            <form action="{{ route('admin.booking.destroy', $booking->id) }}" method="POST" class="inline delete-form">
                                @csrf @method('DELETE')
                                <button type="button" data-name="{{ $booking->nama_pelanggan }}"
                                    class="btn-delete inline-flex items-center gap-1 rounded-lg bg-red-500 px-3 py-1.5 text-xs font-semibold text-white hover:bg-red-600 transition-colors">
                                    <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                    </svg>
                                    Hapus
                                </button>
                            </form>
                        </div>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="10" class="px-5 py-16 text-center">
                        @include('admin.booking.partials.empty-state')
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>

{{-- ===================== CARD LIST (mobile) ===================== --}}
<div class="space-y-4 md:hidden">
    @forelse($bookings as $booking)
    <div class="rounded-2xl bg-white p-5 shadow-sm border border-slate-100">
        <div class="flex items-start justify-between gap-3">
            <div class="min-w-0">
                <p class="text-[11px] font-mono text-slate-400">{{ $booking->customer->kode_customer ?? '#'.$booking->id }}</p>
                <h3 class="mt-0.5 text-sm font-bold text-slate-900 truncate">{{ $booking->nama_pelanggan }}</h3>
                <p class="text-xs text-slate-500 truncate">{{ $booking->customer->nama ?? '-' }}</p>
            </div>
            @include('admin.booking.partials.status-badge', ['status' => $booking->status])
        </div>

        <div class="mt-4 grid grid-cols-2 gap-y-2 gap-x-3 text-xs">
            <div>
                <p class="text-slate-400">Mobil</p>
                <p class="font-medium text-slate-700">{{ $booking->mobil->nama_mobil ?? '-' }}</p>
            </div>
            <div>
                <p class="text-slate-400">Tgl / Jam Booking</p>
                <p class="font-medium text-slate-700">{{ $booking->tanggal_booking }} · {{ $booking->jam_booking }}</p>
            </div>
            <div>
                <p class="text-slate-400">Mulai Sewa</p>
                <p class="font-medium text-slate-700">{{ $booking->tanggal_mulai ?? '-' }}</p>
            </div>
            <div>
                <p class="text-slate-400">Selesai Sewa</p>
                <p class="font-medium text-slate-700">{{ $booking->tanggal_selesai ?? '-' }}</p>
            </div>
        </div>

        <div class="mt-4 flex items-center gap-2 border-t border-slate-100 pt-4">
            <a href="{{ route('admin.booking.edit', $booking->id) }}"
                class="flex-1 inline-flex items-center justify-center gap-1 rounded-lg bg-slate-800 px-3 py-2 text-xs font-semibold text-white hover:bg-slate-700 transition-colors">
                <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                </svg>
                Edit
            </a>
            <form action="{{ route('admin.booking.destroy', $booking->id) }}" method="POST" class="flex-1 delete-form">
                @csrf @method('DELETE')
                <button type="button" data-name="{{ $booking->nama_pelanggan }}"
                    class="btn-delete w-full inline-flex items-center justify-center gap-1 rounded-lg bg-red-500 px-3 py-2 text-xs font-semibold text-white hover:bg-red-600 transition-colors">
                    <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                    </svg>
                    Hapus
                </button>
            </form>
        </div>
    </div>
    @empty
    <div class="rounded-2xl bg-white p-10 shadow-sm border border-slate-100">
        @include('admin.booking.partials.empty-state')
    </div>
    @endforelse
</div>

@if (method_exists($bookings ?? null, 'links'))
<div class="mt-6">
    {{ $bookings->links() }}
</div>
@endif

@endsection

@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    document.addEventListener('DOMContentLoaded', function () {
        document.querySelectorAll('.btn-delete').forEach(function (btn) {
            btn.addEventListener('click', function () {
                const form = btn.closest('form');
                const name = btn.getAttribute('data-name');

                Swal.fire({
                    title: 'Hapus Booking?',
                    text: `Booking atas nama "${name}" akan dihapus permanen dan tidak dapat dikembalikan.`,
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#ef4444',
                    cancelButtonColor: '#64748b',
                    confirmButtonText: 'Ya, hapus',
                    cancelButtonText: 'Batal',
                    reverseButtons: true,
                    customClass: { popup: 'rounded-2xl' }
                }).then(function (result) {
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
                confirmButtonColor: '#7c3aed',
                timer: 2500,
                timerProgressBar: true,
                customClass: { popup: 'rounded-2xl' }
            });
        @endif

        @if (session('error'))
            Swal.fire({
                title: 'Gagal!',
                text: @json(session('error')),
                icon: 'error',
                confirmButtonColor: '#7c3aed',
                customClass: { popup: 'rounded-2xl' }
            });
        @endif
    });
</script>
@endpush
