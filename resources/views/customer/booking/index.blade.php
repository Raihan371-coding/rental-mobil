@extends('layouts.customer')

@section('title', 'Booking Saya')

@section('content')

{{-- ===================== PAGE HEADER ===================== --}}
<div class="relative overflow-hidden rounded-2xl bg-gradient-to-br from-sky-600 to-blue-700 p-6 sm:p-8 shadow-lg">
    <div class="absolute -top-6 -right-6 w-32 h-32 rounded-full bg-white/10"></div>
    <div class="absolute -bottom-8 -left-6 w-28 h-28 rounded-full bg-white/5"></div>
    <div class="relative flex flex-col gap-4 sm:flex-row sm:items-center sm:justify-between">
        <div>
            <p class="text-xs font-semibold uppercase tracking-widest text-sky-200">Booking</p>
            <h1 class="mt-2 text-2xl sm:text-3xl font-extrabold text-white">Booking Saya</h1>
            <p class="mt-2 text-sm text-sky-100 max-w-xl">Lihat status booking Anda dan kelola permintaan kendaraan.</p>
        </div>
        <a href="{{ route('customer.booking.create') }}"
            class="inline-flex items-center justify-center gap-2 rounded-xl bg-white px-5 py-2.5 text-sm font-semibold text-sky-700 shadow-sm hover:bg-sky-50 transition-colors w-full sm:w-auto">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/>
            </svg>
            Buat Booking Baru
        </a>
    </div>
</div>

{{-- ===================== DESKTOP TABLE (lg and up) ===================== --}}
<div class="hidden lg:block mt-6 rounded-2xl bg-white shadow-sm border border-slate-100 overflow-hidden">
    <div class="overflow-x-auto">
        <table class="min-w-full divide-y divide-slate-100 text-sm text-slate-700">
            <thead class="bg-slate-50">
                <tr>
                    <th class="px-5 py-3.5 text-left text-xs font-semibold uppercase tracking-wider text-slate-500">No</th>
                    <th class="px-5 py-3.5 text-left text-xs font-semibold uppercase tracking-wider text-slate-500">Mobil</th>
                    <th class="px-5 py-3.5 text-left text-xs font-semibold uppercase tracking-wider text-slate-500">Tanggal Booking</th>
                    <th class="px-5 py-3.5 text-left text-xs font-semibold uppercase tracking-wider text-slate-500">Periode Sewa</th>
                    <th class="px-5 py-3.5 text-left text-xs font-semibold uppercase tracking-wider text-slate-500">Status</th>
                    <th class="px-5 py-3.5 text-left text-xs font-semibold uppercase tracking-wider text-slate-500">Promo</th>
                    <th class="px-5 py-3.5 text-left text-xs font-semibold uppercase tracking-wider text-slate-500">Potongan</th>
                    <th class="px-5 py-3.5 text-left text-xs font-semibold uppercase tracking-wider text-slate-500">Total</th>
                    <th class="px-5 py-3.5 text-left text-xs font-semibold uppercase tracking-wider text-slate-500">Aksi</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-slate-100 bg-white">
                @forelse($bookings as $booking)
                    <tr class="hover:bg-slate-50 transition-colors">
                        <td class="px-5 py-4 text-slate-500">{{ $loop->iteration }}</td>
                        <td class="px-5 py-4 font-semibold text-slate-900">{{ $booking->mobil?->nama_mobil ?? 'Tidak ada mobil' }}</td>
                        <td class="px-5 py-4 text-slate-600">{{ $booking->tanggal_booking->format('d M Y') }} &middot; {{ $booking->jam_booking }}</td>
                        <td class="px-5 py-4 text-slate-600">
                            {{ optional($booking->tanggal_mulai)?->format('d M Y') ?? '-' }} &ndash;
                            {{ optional($booking->tanggal_selesai)?->format('d M Y') ?? '-' }}
                        </td>
                        <td class="px-5 py-4">
                            @if($booking->status === 'terkonfirmasi')
                                <span class="inline-flex items-center gap-1 rounded-full bg-emerald-100 px-2.5 py-1 text-xs font-semibold text-emerald-700">
                                    <span class="w-1.5 h-1.5 rounded-full bg-emerald-500"></span> Terkonfirmasi
                                </span>
                            @elseif($booking->status === 'ditolak')
                                <span class="inline-flex items-center gap-1 rounded-full bg-rose-100 px-2.5 py-1 text-xs font-semibold text-rose-700">
                                    <span class="w-1.5 h-1.5 rounded-full bg-rose-500"></span> Ditolak
                                </span>
                            @else
                                <span class="inline-flex items-center gap-1 rounded-full bg-amber-100 px-2.5 py-1 text-xs font-semibold text-amber-700">
                                    <span class="w-1.5 h-1.5 rounded-full bg-amber-500 animate-pulse"></span> {{ ucfirst($booking->status) }}
                                </span>
                            @endif
                        </td>
                        <td class="px-5 py-4 text-slate-600">{{ $booking->promo?->kode_promo ?? '-' }}</td>
                        <td class="px-5 py-4 text-slate-600">Rp {{ number_format($booking->potongan, 0, ',', '.') }}</td>
                        <td class="px-5 py-4 font-semibold text-slate-800">Rp {{ number_format($booking->total_harga, 0, ',', '.') }}</td>
                        <td class="px-5 py-4">
                            @if($booking->status === 'menunggu konfirmasi')
                                <div class="flex items-center gap-2">
                                    <a href="{{ route('customer.booking.edit', $booking) }}"
                                        class="inline-flex items-center gap-1 rounded-lg bg-slate-800 px-3 py-1.5 text-xs font-semibold text-white hover:bg-slate-700 transition-colors">
                                        <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/>
                                        </svg>
                                        Edit
                                    </a>
                                    <form action="{{ route('customer.booking.destroy', $booking) }}" method="POST" class="inline delete-form">
                                        @csrf @method('DELETE')
                                        <button type="button"
                                            data-nama="{{ $booking->mobil?->nama_mobil ?? 'booking ini' }}"
                                            class="btn-delete inline-flex items-center gap-1 rounded-lg bg-rose-500 px-3 py-1.5 text-xs font-semibold text-white hover:bg-rose-600 transition-colors">
                                            <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/>
                                            </svg>
                                            Hapus
                                        </button>
                                    </form>
                                </div>
                            @else
                                <span class="text-xs text-slate-400">&mdash;</span>
                            @endif
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="9" class="px-5 py-16 text-center">
                            <div class="flex flex-col items-center gap-3">
                                <div class="w-14 h-14 rounded-2xl bg-slate-100 flex items-center justify-center">
                                    <svg class="w-7 h-7 text-slate-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                                    </svg>
                                </div>
                                <p class="text-sm font-medium text-slate-500">Belum ada booking.</p>
                                <a href="{{ route('customer.mobil.index') }}" class="text-sm font-semibold text-sky-600 hover:text-sky-700">Lihat katalog mobil →</a>
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
    @forelse($bookings as $booking)
        <div class="rounded-2xl bg-white shadow-sm border border-slate-100 p-4">
            <div class="flex items-start justify-between gap-2">
                <div class="min-w-0">
                    <h3 class="font-semibold text-slate-900 truncate">{{ $booking->mobil?->nama_mobil ?? 'Tidak ada mobil' }}</h3>
                    <p class="text-xs text-slate-500 mt-0.5">{{ $booking->tanggal_booking->format('d M Y') }} &middot; {{ $booking->jam_booking }}</p>
                </div>
                @if($booking->status === 'terkonfirmasi')
                    <span class="flex-shrink-0 inline-flex items-center gap-1 rounded-full bg-emerald-100 px-2 py-1 text-[10px] font-semibold text-emerald-700">
                        <span class="w-1.5 h-1.5 rounded-full bg-emerald-500"></span> Terkonfirmasi
                    </span>
                @elseif($booking->status === 'ditolak')
                    <span class="flex-shrink-0 inline-flex items-center gap-1 rounded-full bg-rose-100 px-2 py-1 text-[10px] font-semibold text-rose-700">
                        <span class="w-1.5 h-1.5 rounded-full bg-rose-500"></span> Ditolak
                    </span>
                @else
                    <span class="flex-shrink-0 inline-flex items-center gap-1 rounded-full bg-amber-100 px-2 py-1 text-[10px] font-semibold text-amber-700">
                        <span class="w-1.5 h-1.5 rounded-full bg-amber-500 animate-pulse"></span> {{ ucfirst($booking->status) }}
                    </span>
                @endif
            </div>

            <div class="mt-3 grid grid-cols-2 gap-3 text-xs">
                <div>
                    <p class="text-slate-400">Periode Sewa</p>
                    <p class="mt-0.5 font-medium text-slate-700">
                        {{ optional($booking->tanggal_mulai)?->format('d M Y') ?? '-' }} &ndash;
                        {{ optional($booking->tanggal_selesai)?->format('d M Y') ?? '-' }}
                    </p>
                </div>
                <div>
                    <p class="text-slate-400">Promo</p>
                    <p class="mt-0.5 font-medium text-slate-700">{{ $booking->promo?->kode_promo ?? '-' }}</p>
                </div>
                <div>
                    <p class="text-slate-400">Potongan</p>
                    <p class="mt-0.5 font-medium text-slate-700">Rp {{ number_format($booking->potongan, 0, ',', '.') }}</p>
                </div>
                <div>
                    <p class="text-slate-400">Total Harga</p>
                    <p class="mt-0.5 font-bold text-slate-900">Rp {{ number_format($booking->total_harga, 0, ',', '.') }}</p>
                </div>
            </div>

            @if($booking->status === 'menunggu konfirmasi')
                <div class="mt-4 flex items-center gap-2 pt-3 border-t border-slate-100">
                    <a href="{{ route('customer.booking.edit', $booking) }}"
                        class="flex-1 inline-flex items-center justify-center gap-1 rounded-lg bg-slate-800 px-3 py-2 text-xs font-semibold text-white hover:bg-slate-700 transition-colors">
                        <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/>
                        </svg>
                        Edit
                    </a>
                    <form action="{{ route('customer.booking.destroy', $booking) }}" method="POST" class="flex-1 delete-form">
                        @csrf @method('DELETE')
                        <button type="button"
                            data-nama="{{ $booking->mobil?->nama_mobil ?? 'booking ini' }}"
                            class="btn-delete w-full inline-flex items-center justify-center gap-1 rounded-lg bg-rose-500 px-3 py-2 text-xs font-semibold text-white hover:bg-rose-600 transition-colors">
                            <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/>
                            </svg>
                            Hapus
                        </button>
                    </form>
                </div>
            @endif
        </div>
    @empty
        <div class="rounded-2xl bg-white shadow-sm border border-slate-100 px-5 py-16 text-center">
            <div class="flex flex-col items-center gap-3">
                <div class="w-14 h-14 rounded-2xl bg-slate-100 flex items-center justify-center">
                    <svg class="w-7 h-7 text-slate-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                    </svg>
                </div>
                <p class="text-sm font-medium text-slate-500">Belum ada booking.</p>
                <a href="{{ route('customer.mobil.index') }}" class="text-sm font-semibold text-sky-600 hover:text-sky-700">Lihat katalog mobil →</a>
            </div>
        </div>
    @endforelse
</div>

@endsection

@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    document.addEventListener('DOMContentLoaded', function () {
        if (typeof Swal === 'undefined') {
            console.error('SweetAlert2 gagal dimuat.');
            return;
        }

        document.body.addEventListener('click', function (e) {
            const btn = e.target.closest('.btn-delete');
            if (!btn) return;

            e.preventDefault();
            const form = btn.closest('form');
            const nama = btn.getAttribute('data-nama');

            Swal.fire({
                title: 'Hapus Booking?',
                html: `Yakin ingin menghapus booking <b>${nama}</b>? Data yang sudah dihapus tidak dapat dikembalikan.`,
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#f43f5e',
                cancelButtonColor: '#94a3b8',
                confirmButtonText: 'Ya, Hapus',
                cancelButtonText: 'Batal',
                reverseButtons: true
            }).then((result) => {
                if (result.isConfirmed) {
                    form.submit();
                }
            });
        });

        @if(session('success'))
            Swal.fire({
                title: 'Berhasil!',
                text: @json(session('success')),
                icon: 'success',
                confirmButtonColor: '#0284c7',
                timer: 2500,
                timerProgressBar: true
            });
        @endif

        @if(session('error'))
            Swal.fire({
                title: 'Gagal!',
                text: @json(session('error')),
                icon: 'error',
                confirmButtonColor: '#0284c7'
            });
        @endif
    });
</script>
@endpush
