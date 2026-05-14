@extends('layouts.admin')

@section('title', 'Pembayaran')

@section('content')
<div class="rounded-4xl bg-white p-8 shadow-xl">
    <div class="mb-8 flex flex-col gap-4 sm:flex-row sm:items-center sm:justify-between">
        <div>
            <h1 class="text-2xl font-semibold text-slate-950">Halaman Pembayaran</h1>
            <p class="mt-2 text-sm text-slate-600">Kelola semua pembayaran rental dengan mudah.</p>
        </div>
        <a href="{{ route('pembayaran.create') }}" class="inline-flex items-center rounded-full bg-slate-950 px-5 py-3 text-sm font-semibold text-white transition hover:bg-slate-800">Tambah Pembayaran</a>
    </div>

    @if(session('success'))
        <div class="mb-6 rounded-3xl border border-emerald-200 bg-emerald-50 px-5 py-4 text-sm text-emerald-900">{{ session('success') }}</div>
    @endif

    <div class="overflow-x-auto rounded-3xl border border-slate-200 bg-slate-50 p-4">
        <table class="min-w-full divide-y divide-slate-200 text-left text-sm text-slate-700">
            <thead class="border-b border-slate-200 bg-white text-slate-900">
                <tr>
                    <th class="px-4 py-3">ID Pembayaran</th>
                    <th class="px-4 py-3">ID Rental</th>
                    <th class="px-4 py-3">Tanggal Bayar</th>
                    <th class="px-4 py-3">Metode Bayar</th>
                    <th class="px-4 py-3">Jumlah Bayar</th>
                    <th class="px-4 py-3">Status</th>
                    <th class="px-4 py-3">Aksi</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-slate-200">
                @forelse($data as $item)
                <tr class="bg-white hover:bg-slate-50">
                    <td class="px-4 py-4">{{ $item->id_pembayaran }}</td>
                    <td class="px-4 py-4">{{ $item->id_rental }}</td>
                    <td class="px-4 py-4">{{ $item->tanggal_bayar }}</td>
                    <td class="px-4 py-4">{{ $item->metode_bayar }}</td>
                    <td class="px-4 py-4">{{ $item->jumlah_bayar }}</td>
                    <td class="px-4 py-4">{{ $item->status_bayar }}</td>
                    <td class="px-4 py-4 space-x-2">
                        <a href="{{ route('pembayaran.edit', $item->id) }}" class="inline-flex rounded-full bg-slate-950 px-3 py-1.5 text-xs font-semibold text-white transition hover:bg-slate-800">Edit</a>
                        <form action="{{ route('pembayaran.destroy', $item->id) }}" method="POST" class="inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="inline-flex rounded-full bg-rose-500 px-3 py-1.5 text-xs font-semibold text-white transition hover:bg-rose-600" onclick="return confirm('Are you sure?')">Hapus</button>
                        </form>
                    </td>
                </tr>
                @empty
                    <tr>
                        <td colspan="7" class="px-4 py-6 text-center text-sm text-slate-500">Data pembayaran belum tersedia</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
