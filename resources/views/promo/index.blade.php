@extends('layouts.admin')

@section('title', 'Promo')

@section('content')
<div class="rounded-4xl bg-white p-8 shadow-xl">
    <div class="mb-8 flex flex-col gap-4 sm:flex-row sm:items-center sm:justify-between">
        <div>
            <h1 class="text-2xl font-semibold text-slate-950">Halaman Promo</h1>
            <p class="mt-2 text-sm text-slate-600">Kelola data promo dengan cepat dan aman.</p>
        </div>
        <a href="{{ route('promo.create') }}" class="inline-flex items-center rounded-full bg-slate-950 px-5 py-3 text-sm font-semibold text-white transition hover:bg-slate-800">Tambah Promo</a>
    </div>

    @if(session('success'))
        <div class="mb-6 rounded-3xl border border-emerald-200 bg-emerald-50 px-5 py-4 text-sm text-emerald-900">{{ session('success') }}</div>
    @endif

    <div class="overflow-x-auto rounded-3xl border border-slate-200 bg-slate-50 p-4">
        <table class="min-w-full divide-y divide-slate-200 text-left text-sm text-slate-700">
            <thead class="border-b border-slate-200 bg-white text-slate-900">
                <tr>
                    <th class="px-4 py-3">No</th>
                    <th class="px-4 py-3">Kode Promo</th>
                    <th class="px-4 py-3">Potongan</th>
                    <th class="px-4 py-3">Tanggal Mulai</th>
                    <th class="px-4 py-3">Tanggal Selesai</th>
                    <th class="px-4 py-3">Aksi</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-slate-200">
                @forelse($promos as $promo)
                <tr class="bg-white hover:bg-slate-50">
                    <td class="px-4 py-4">{{ $loop->iteration }}</td>
                    <td class="px-4 py-4">{{ $promo->kode_promo }}</td>
                    <td class="px-4 py-4">{{ $promo->potongan }}</td>
                    <td class="px-4 py-4">{{ $promo->tanggal_mulai }}</td>
                    <td class="px-4 py-4">{{ $promo->tanggal_selesai }}</td>
                    <td class="px-4 py-4 space-x-2">
                        <a href="{{ route('promo.edit', $promo->id) }}" class="inline-flex rounded-full bg-slate-950 px-3 py-1.5 text-xs font-semibold text-white transition hover:bg-slate-800">Edit</a>
                        <form action="{{ route('promo.destroy', $promo->id) }}" method="POST" class="inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="inline-flex rounded-full bg-rose-500 px-3 py-1.5 text-xs font-semibold text-white transition hover:bg-rose-600" onclick="return confirm('Are you sure?')">Hapus</button>
                        </form>
                    </td>
                </tr>
                @empty
                    <tr>
                        <td colspan="6" class="px-4 py-6 text-center text-sm text-slate-500">Data promo belum tersedia</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
