@extends('layouts.admin')

@section('title', 'Pengembalian')

@section('content')
<div class="rounded-[2rem] bg-white p-6 shadow-[0_24px_80px_-40px_rgba(15,23,42,0.2)]">
    <div class="mb-6 flex flex-col gap-4 sm:flex-row sm:items-center sm:justify-between">
        <div>
            <h1 class="text-2xl font-semibold text-slate-950">Halaman Pengembalian</h1>
            <p class="mt-2 text-sm text-slate-600">Kelola data pengembalian dengan cepat dan aman.</p>
        </div>
        <a href="{{ route('pengembalian.create') }}" class="inline-flex items-center rounded-full bg-sky-600 px-5 py-2 text-sm font-semibold text-white transition hover:bg-sky-700">Tambah Pengembalian</a>
    </div>

    <div class="overflow-x-auto">
        <table class="min-w-full divide-y divide-slate-200 text-sm">
            <thead class="bg-slate-50">
                <tr>
                    <th class="px-4 py-3 text-left font-semibold text-slate-600">ID Rental</th>
                    <th class="px-4 py-3 text-left font-semibold text-slate-600">Tanggal Pengembalian</th>
                    <th class="px-4 py-3 text-left font-semibold text-slate-600">Kondisi Mobil</th>
                    <th class="px-4 py-3 text-left font-semibold text-slate-600">Denda</th>
                    <th class="px-4 py-3 text-left font-semibold text-slate-600">Keterangan</th>
                    <th class="px-4 py-3 text-left font-semibold text-slate-600">Aksi</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-slate-200 bg-white">
                @foreach ($data as $items)
                <tr>
                    <td class="px-4 py-4 text-slate-700">{{ $items->id_rental }}</td>
                    <td class="px-4 py-4 text-slate-700">{{ $items->tanggal_pengembalian }}</td>
                    <td class="px-4 py-4 text-slate-700">{{ $items->kondisi_mobil }}</td>
                    <td class="px-4 py-4 text-slate-700">{{ $items->denda }}</td>
                    <td class="px-4 py-4 text-slate-700">{{ $items->keterangan }}</td>
                    <td class="px-4 py-4">
                        <div class="flex flex-wrap gap-2">
                            <a href="{{ route('pengembalian.edit', $items->id) }}" class="rounded-full border border-slate-200 bg-slate-100 px-3 py-1 text-sm font-semibold text-slate-700 transition hover:bg-slate-200">Edit</a>
                            <form action="{{ route('pengembalian.destroy', $items->id) }}" method="POST" class="inline">
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
