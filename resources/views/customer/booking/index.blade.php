@extends('layouts.customer')

@section('title', 'Booking Saya')

@section('content')
    <div class="space-y-6">
        <div class="rounded-lg bg-white p-6 shadow-sm">
            <div class="flex flex-col gap-4 sm:flex-row sm:items-center sm:justify-between">
                <div>
                    <h1 class="text-2xl font-semibold text-slate-900">Booking Saya</h1>
                    <p class="mt-2 text-sm text-slate-500">Lihat status booking Anda dan kelola permintaan kendaraan.</p>
                </div>
                <a href="{{ route('customer.booking.create') }}"
                    class="inline-flex items-center rounded-full bg-slate-950 px-5 py-3 text-sm font-semibold text-white transition hover:bg-slate-800">Buat
                    Booking Baru</a>
            </div>
        </div>

        @if (session('success'))
            <div class="rounded-lg border border-emerald-200 bg-emerald-50 px-5 py-4 text-sm text-emerald-900">
                {{ session('success') }}
            </div>
        @endif

        @if (session('error'))
            <div class="rounded-lg border border-rose-200 bg-rose-50 px-5 py-4 text-sm text-rose-900">
                {{ session('error') }}
            </div>
        @endif

        <div class="rounded-lg bg-white p-6 shadow-sm">
            <div class="overflow-x-auto">
                <table class="min-w-full divide-y divide-slate-200 text-sm text-slate-700">
                    <thead class="bg-slate-50 text-left text-xs uppercase tracking-wide text-slate-500">
                        <tr>
                            <th class="px-4 py-3">No</th>
                            <th class="px-4 py-3">Mobil</th>
                            <th class="px-4 py-3">Tanggal Booking</th>
                            <th class="px-4 py-3">Periode Sewa</th>
                            <th class="px-4 py-3">Status</th>
                            <th class="px-4 py-3">Kode Promo</th>
                            <th class="px-4 py-3">Potongan</th>
                            <th class="px-4 py-3">Total Harga</th>
                            <th class="px-4 py-3">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-slate-200 bg-white">
                        @forelse($bookings as $booking)
                            <tr>
                                <td class="px-4 py-3">{{ $loop->iteration }}</td>
                                <td class="px-4 py-3 font-medium">{{ $booking->mobil?->nama_mobil ?? 'Tidak ada mobil' }}
                                </td>
                                <td class="px-4 py-3">{{ $booking->tanggal_booking->format('d M Y') }}
                                    {{ $booking->jam_booking }}</td>
                                <td class="px-4 py-3">
                                    {{ optional($booking->tanggal_mulai)?->format('d M Y') ?? '-' }}
                                    —
                                    {{ optional($booking->tanggal_selesai)?->format('d M Y') ?? '-' }}
                                </td>
                                <td class="px-4 py-3">
                                    <span
                                        class="rounded-full px-3 py-1 text-xs font-semibold
                                        {{ $booking->status === 'terkonfirmasi' ? 'bg-emerald-100 text-emerald-700' : ($booking->status === 'ditolak' ? 'bg-rose-100 text-rose-700' : 'bg-amber-100 text-amber-700') }}">
                                        {{ ucfirst($booking->status) }}
                                    </span>
                                </td>
                                <td>{{ $booking->promo?->kode_promo ?? '-' }}</td>

                                <td>
                                    Rp {{ number_format($booking->potongan, 0, ',', '.') }}
                                </td>

                                <td>
                                    Rp {{ number_format($booking->total_harga, 0, ',', '.') }}
                                </td>
                                <td class="px-4 py-3">
                                    @if ($booking->status === 'menunggu konfirmasi')
                                        <div class="flex items-center gap-2">
                                            <a href="{{ route('customer.booking.edit', $booking) }}"
                                                class="inline-flex rounded-full bg-slate-950 px-3 py-1.5 text-xs font-semibold text-white transition hover:bg-slate-800">Edit</a>
                                            <form action="{{ route('customer.booking.destroy', $booking) }}" method="POST"
                                                class="inline">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit"
                                                    class="inline-flex rounded-full bg-rose-500 px-3 py-1.5 text-xs font-semibold text-white transition hover:bg-rose-600"
                                                    onclick="return confirm('Yakin ingin menghapus booking ini?')">Hapus</button>
                                            </form>
                                        </div>
                                    @else
                                        <span class="text-xs text-slate-400">—</span>
                                    @endif
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6" class="px-4 py-8 text-center text-sm text-slate-500">
                                    Belum ada booking. <a href="{{ route('customer.mobil.index') }}"
                                        class="text-sky-600 hover:underline">Lihat katalog mobil</a> untuk mulai booking.
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
