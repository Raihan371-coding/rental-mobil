@extends('layouts.admin')

@section('title', 'Pengembalian')

@section('content')
<div class="rounded-4xl bg-white p-8 shadow-xl">
    <div class="mb-8 flex flex-col gap-4 sm:flex-row sm:items-center sm:justify-between">
        <div>
            <h1 class="text-2xl font-semibold text-slate-950">Halaman Pengembalian</h1>
            <p class="mt-2 text-sm text-slate-600">Kelola data pengembalian dengan cepat dan aman.</p>
        </div>
        <a href="{{ route('pengembalian.create') }}" class="inline-flex items-center rounded-full bg-slate-950 px-5 py-3 text-sm font-semibold text-white transition hover:bg-slate-800">Tambah Pengembalian</a>
    </div>

    <div class="overflow-x-auto rounded-3xl border border-slate-200 bg-slate-50 p-4">
        <table class="min-w-full divide-y divide-slate-200 text-left text-sm text-slate-700">
            <thead class="border-b border-slate-200 bg-white text-slate-900">
                <tr>
                    <th class="px-4 py-3">ID Rental</th>
                    <th class="px-4 py-3">Tanggal Pengembalian</th>
                    <th class="px-4 py-3">Kondisi Mobil</th>
                    <th class="px-4 py-3">Denda</th>
                    <th class="px-4 py-3">Keterangan</th>
                    <th class="px-4 py-3">Aksi</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-slate-200">
                @forelse($data as $items)
                <tr class="bg-white hover:bg-slate-50">
                    <td class="px-4 py-4">{{ $items->id_rental }}</td>
                    <td class="px-4 py-4">{{ $items->tanggal_pengembalian }}</td>
                    <td class="px-4 py-4">{{ $items->kondisi_mobil }}</td>
                    <td class="px-4 py-4">{{ $items->denda }}</td>
                    <td class="px-4 py-4">{{ $items->keterangan }}</td>
                    <td class="px-4 py-4 space-x-2">
                        <a href="{{ route('pengembalian.edit', $items->id) }}" class="inline-flex rounded-full bg-slate-950 px-3 py-1.5 text-xs font-semibold text-white transition hover:bg-slate-800">Edit</a>
                        <form action="{{ route('pengembalian.destroy', $items->id) }}" method="POST" class="inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="inline-flex rounded-full bg-rose-500 px-3 py-1.5 text-xs font-semibold text-white transition hover:bg-rose-600" onclick="return confirm('Are you sure?')">Hapus</button>
                        </form>
                    </td>
                </tr>
                @empty
                    <tr>
                        <td colspan="6" class="px-4 py-6 text-center text-sm text-slate-500">Data pengembalian belum tersedia</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
