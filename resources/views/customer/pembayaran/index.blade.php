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
                        <th class="px-4 py-3">ID Pembayaran</th>
                        <th class="px-4 py-3">ID Rental</th>
                        <th class="px-4 py-3">Tanggal Bayar</th>
                        <th class="px-4 py-3">Metode</th>
                        <th class="px-4 py-3">Jumlah</th>
                        <th class="px-4 py-3">Status</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-200 bg-white">
                    @forelse($data as $item)
                        <tr>
                            <td class="px-4 py-3">{{ $loop->iteration }}</td>
                            <td class="px-4 py-3">{{ $item->id_pembayaran }}</td>
                            <td class="px-4 py-3">{{ $item->id_rental }}</td>
                            <td class="px-4 py-3">{{ $item->tanggal_bayar }}</td>
                            <td class="px-4 py-3">{{ $item->metode_bayar }}</td>
                            <td class="px-4 py-3">Rp {{ number_format($item->jumlah_bayar, 0, ',', '.') }}</td>
                            <td class="px-4 py-3">
                                <span class="rounded-full px-3 py-1 text-xs font-semibold {{ $item->status_bayar === 'lunas' ? 'bg-emerald-100 text-emerald-700' : 'bg-amber-100 text-amber-700' }}">
                                    {{ ucfirst($item->status_bayar) }}
                                </span>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="7" class="px-4 py-6 text-center text-sm text-slate-500">Belum ada data pembayaran.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
