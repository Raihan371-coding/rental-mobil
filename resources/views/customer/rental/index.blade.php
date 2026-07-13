@extends('layouts.customer')

@section('title', 'Rental Saya')

@section('content')
    <div class="space-y-6">
        <div class="rounded-lg bg-white p-6 shadow-sm">
            <h1 class="text-2xl font-semibold text-slate-900">Rental Saya</h1>
            <p class="mt-2 text-sm text-slate-500">Lihat riwayat rental dan status pengembalian kendaraan.</p>
        </div>

        <div class="rounded-lg bg-white p-6 shadow-sm">
            <div class="overflow-x-auto">
                <table class="min-w-full divide-y divide-slate-200 text-sm text-slate-700">
                    <thead class="bg-slate-50 text-left text-xs uppercase tracking-wide text-slate-500">
                        <tr>
                            <th class="px-4 py-3">Kode Rental</th>
                            <th class="px-4 py-3">Mobil</th>
                            <th class="px-4 py-3">Tanggal Rental</th>
                            <th class="px-4 py-3">Tanggal Kembali</th>
                            <th class="px-4 py-3">Status</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-slate-200 bg-white">
                        @forelse($data as $rental)
                            <tr>
                                <td class="px-4 py-3">{{ $rental->kode_rental }}</td>
                                <td class="px-4 py-3">{{ $rental->mobil?->nama_mobil ?? 'N/A' }}</td>
                                <td class="px-4 py-3">{{ optional($rental->tanggal_rental)->format('d M Y') }}</td>
                                <td class="px-4 py-3">{{ optional($rental->tanggal_kembali)->format('d M Y') ?? '-' }}</td>
                                <td class="px-4 py-3">
                                    <span
                                        class="rounded-full px-3 py-1 text-xs font-semibold {{ $rental->status === 'selesai' ? 'bg-emerald-100 text-emerald-700' : 'bg-amber-100 text-amber-700' }}">
                                        {{ ucfirst($rental->status) }}
                                    </span>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="px-4 py-6 text-center text-sm text-slate-500">Belum ada rental.
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
