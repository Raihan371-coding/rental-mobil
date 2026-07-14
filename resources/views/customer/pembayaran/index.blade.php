@extends('layouts.customer')

@section('title', 'Pembayaran Saya')

@section('content')
    <div class="space-y-6">
        <div class="rounded-lg bg-white p-6 shadow-sm">
            <h1 class="text-2xl font-semibold text-slate-900">Tagihan & Pembayaran</h1>
            <p class="mt-2 text-sm text-slate-500">Lihat tagihan dan status pembayaran rental Anda.</p>
        </div>

        <div class="rounded-lg bg-white p-6 shadow-sm">
            <div class="overflow-x-auto">
                <table class="min-w-full divide-y divide-slate-200 text-sm text-slate-700">
                    <thead class="bg-slate-50 text-left text-xs uppercase tracking-wide text-slate-500">
                        <tr>
                            <th class="px-4 py-3">No</th>
                            <th class="px-4 py-3">Kode Pembayaran</th>
                            <th class="px-4 py-3">Kode Rental</th>
                            <th class="px-4 py-3">Tanggal Bayar</th>
                            <th class="px-4 py-3">Metode</th>
                            <th class="px-4 py-3">Jumlah</th>
                            <th class="px-4 py-3">Status</th>
                            <th class="px-4 py-3">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-slate-200 bg-white">
                        @forelse($data as $item)
                            <tr>
                                <td class="px-4 py-3">{{ $loop->iteration }}</td>
                                <td class="px-4 py-3">{{ $item->kode_pembayaran }}</td>
                                <td class="px-4 py-3">{{ $item->rental->kode_rental }}</td>
                                <td class="px-4 py-3">{{ $item->tanggal_bayar }}</td>
                                <td class="px-4 py-3">{{ $item->metode_bayar }}</td>
                                <td class="px-4 py-3">Rp {{ number_format($item->jumlah_bayar, 0, ',', '.') }}</td>
                                <td class="px-4 py-3">
                                    @if ($item->status_bayar == 'belum_bayar')
                                        <span class="rounded-full bg-red-100 text-red-700 px-3 py-1 text-xs font-semibold">
                                            Belum Bayar
                                        </span>
                                    @elseif($item->status_bayar == 'menunggu_verifikasi')
                                        <span
                                            class="rounded-full bg-yellow-100 text-yellow-700 px-3 py-1 text-xs font-semibold">
                                            Menunggu Verifikasi
                                        </span>
                                    @elseif($item->status_bayar == 'lunas')
                                        <span
                                            class="rounded-full bg-green-100 text-green-700 px-3 py-1 text-xs font-semibold">
                                            Lunas
                                        </span>
                                    @elseif($item->status_bayar == 'ditolak')
                                        <span class="rounded-full bg-red-100 text-red-700 px-3 py-1 text-xs font-semibold">
                                            Ditolak
                                        </span>
                                    @endif
                                </td>
                                <td class="px-4 py-3">

                                    @if ($item->status_bayar == 'belum_bayar')
                                        <a href="{{ route('customer.pembayaran.show', $item->id) }}"
                                            class="rounded-full bg-slate-900 px-4 py-2 text-white text-xs hover:bg-slate-700">

                                            Bayar

                                        </a>
                                    @elseif($item->status_bayar == 'menunggu_verifikasi')
                                        <button disabled
                                            class="rounded-full bg-yellow-500 px-4 py-2 text-white text-xs cursor-not-allowed opacity-80">

                                            Menunggu Verifikasi

                                        </button>
                                    @elseif($item->status_bayar == 'lunas')
                                        <button disabled
                                            class="rounded-full bg-green-600 px-4 py-2 text-white text-xs cursor-not-allowed opacity-80">

                                            ✓ Selesai

                                        </button>
                                    @elseif($item->status_bayar == 'ditolak')
                                        <a href="{{ route('customer.pembayaran.show', $item->id) }}"
                                            class="rounded-full bg-red-600 px-4 py-2 text-white text-xs hover:bg-red-700">

                                            Upload Ulang

                                        </a>
                                    @endif

                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="7" class="px-4 py-6 text-center text-sm text-slate-500">Belum ada data
                                    pembayaran.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
