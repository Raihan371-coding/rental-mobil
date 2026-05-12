@extends('layouts.admin')

@section('title', 'Pembayaran')

@section('content')
<div class="rounded-[2rem] bg-white p-6 shadow-[0_24px_80px_-40px_rgba(15,23,42,0.2)]">
    <div class="mb-6 flex flex-col gap-4 sm:flex-row sm:items-center sm:justify-between">
        <div>
            <h1 class="text-2xl font-semibold text-slate-950">Halaman Pembayaran</h1>
            <p class="mt-2 text-sm text-slate-600">Kelola semua pembayaran rental dengan mudah.</p>
        </div>
        <a href="{{ route('pembayaran.create') }}" class="inline-flex items-center rounded-full bg-emerald-600 px-5 py-2 text-sm font-semibold text-white transition hover:bg-emerald-700">Tambah Pembayaran</a>
    </div>

    <div class="overflow-x-auto">
        <table class="min-w-full divide-y divide-slate-200 text-sm">
            <thead class="bg-slate-50">
                <tr>
                    <th class="px-4 py-3 text-left font-semibold text-slate-600">ID Pembayaran</th>
                    <th class="px-4 py-3 text-left font-semibold text-slate-600">ID Rental</th>
                    <th class="px-4 py-3 text-left font-semibold text-slate-600">Tanggal Bayar</th>
                    <th class="px-4 py-3 text-left font-semibold text-slate-600">Metode Bayar</th>
                    <th class="px-4 py-3 text-left font-semibold text-slate-600">Jumlah Bayar</th>
                    <th class="px-4 py-3 text-left font-semibold text-slate-600">Status</th>
                    <th class="px-4 py-3 text-left font-semibold text-slate-600">Aksi</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-slate-200 bg-white">
                @foreach($data as $item)
                <tr>
                    <td class="px-4 py-4 text-slate-700">{{ $item->id_pembayaran }}</td>
                    <td class="px-4 py-4 text-slate-700">{{ $item->id_rental }}</td>
                    <td class="px-4 py-4 text-slate-700">{{ $item->tanggal_bayar }}</td>
                    <td class="px-4 py-4 text-slate-700">{{ $item->metode_bayar }}</td>
                    <td class="px-4 py-4 text-slate-700">{{ $item->jumlah_bayar }}</td>
                    <td class="px-4 py-4 text-slate-700">{{ $item->status_bayar }}</td>
                    <td class="px-4 py-4">
                        <div class="flex flex-wrap gap-2">
                            <a href="{{ route('pembayaran.edit', $item->id) }}" class="rounded-full border border-slate-200 bg-slate-100 px-3 py-1 text-sm font-semibold text-slate-700 transition hover:bg-slate-200">Edit</a>
                            <form action="{{ route('pembayaran.destroy', $item->id) }}" method="POST" class="inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="rounded-full bg-rose-600 px-3 py-1 text-sm font-semibold text-white transition hover:bg-rose-700" onclick="return confirm('Are you sure?')">Delete</button>
                            </form>
                        </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
