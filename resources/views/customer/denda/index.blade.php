@extends('layouts.customer')

@section('title', 'Denda Saya')

@section('content')
<div class="space-y-6">
    <div class="rounded-lg bg-white p-6 shadow-sm">
        <h1 class="text-2xl font-semibold text-slate-900">Denda</h1>
        <p class="mt-2 text-sm text-slate-500">Lihat denda yang dikenakan atas keterlambatan atau kerusakan kendaraan.</p>
    </div>

    <div class="rounded-lg bg-white p-6 shadow-sm">
        <div class="overflow-x-auto">
            <table class="min-w-full divide-y divide-slate-200 text-sm text-slate-700">
                <thead class="bg-slate-50 text-left text-xs uppercase tracking-wide text-slate-500">
                    <tr>
                        <th class="px-4 py-3">No</th>
                        <th class="px-4 py-3">ID Rental</th>
                        <th class="px-4 py-3">Jumlah Denda</th>
                        <th class="px-4 py-3">Keterangan</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-200 bg-white">
                    @forelse($dendas as $denda)
                        <tr>
                            <td class="px-4 py-3">{{ $loop->iteration }}</td>
                            <td class="px-4 py-3">{{ $denda->id_rental }}</td>
                            <td class="px-4 py-3">Rp {{ number_format($denda->jumlah_denda, 0, ',', '.') }}</td>
                            <td class="px-4 py-3">{{ $denda->keterangan ?? '-' }}</td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4" class="px-4 py-6 text-center text-sm text-slate-500">Tidak ada denda. 🎉</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
