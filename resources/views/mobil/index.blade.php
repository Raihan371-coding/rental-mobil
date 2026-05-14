@extends('layouts.admin')

@section('title', 'Data Mobil')

@section('content')
<div class="rounded-4xl bg-white p-8 shadow-xl">
    <div class="mb-8 flex flex-col gap-4 sm:flex-row sm:items-center sm:justify-between">
        <div>
            <h1 class="text-2xl font-semibold text-slate-950">Data Mobil Rental</h1>
            <p class="mt-2 text-sm text-slate-600">Kelola daftar mobil, tarif, dan status armada di sini.</p>
        </div>
        <a href="{{ route('mobil.create') }}" class="inline-flex items-center rounded-full bg-slate-950 px-5 py-3 text-sm font-semibold text-white transition hover:bg-slate-800">Tambah Mobil</a>
    </div>

    @if(session('success'))
        <div class="mb-6 rounded-3xl border border-emerald-200 bg-emerald-50 px-5 py-4 text-sm text-emerald-900">{{ session('success') }}</div>
    @endif

    <div class="overflow-x-auto rounded-3xl border border-slate-200 bg-slate-50 p-4">
        <table class="min-w-full divide-y divide-slate-200 text-left text-sm text-slate-700">
            <thead class="border-b border-slate-200 bg-white text-slate-900">
                <tr>
                    <th class="px-4 py-3">No</th>
                    <th class="px-4 py-3">Nama Mobil</th>
                    <th class="px-4 py-3">Merk</th>
                    <th class="px-4 py-3">Plat Nomor</th>
                    <th class="px-4 py-3">Tahun</th>
                    <th class="px-4 py-3">Harga Sewa</th>
                    <th class="px-4 py-3">Status</th>
                    <th class="px-4 py-3">Aksi</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-slate-200">
                @forelse ($mobils as $mobil)
                    <tr class="bg-white hover:bg-slate-50">
                        <td class="px-4 py-4">{{ $loop->iteration }}</td>
                        <td class="px-4 py-4">{{ $mobil->nama_mobil }}</td>
                        <td class="px-4 py-4">{{ $mobil->merk }}</td>
                        <td class="px-4 py-4">{{ $mobil->plat_nomor }}</td>
                        <td class="px-4 py-4">{{ $mobil->tahun }}</td>
                        <td class="px-4 py-4">Rp {{ number_format($mobil->harga_sewa, 0, ',', '.') }}</td>
                        <td class="px-4 py-4">{{ $mobil->status }}</td>
                        <td class="px-4 py-4 space-x-2">
                            <a href="{{ route('mobil.edit', $mobil->id) }}" class="inline-flex rounded-full bg-slate-950 px-3 py-1.5 text-xs font-semibold text-white transition hover:bg-slate-800">Edit</a>
                            <form action="{{ route('mobil.destroy', $mobil->id) }}" method="POST" class="inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="inline-flex rounded-full bg-rose-500 px-3 py-1.5 text-xs font-semibold text-white transition hover:bg-rose-600">Hapus</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="8" class="px-4 py-6 text-center text-sm text-slate-500">Data mobil belum tersedia</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
