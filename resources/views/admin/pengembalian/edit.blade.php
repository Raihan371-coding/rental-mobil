@extends('layouts.admin')

@section('title', 'Edit Pengembalian')

@section('content')
<div class="rounded-[2rem] bg-white p-6 shadow-[0_24px_80px_-40px_rgba(15,23,42,0.2)]">
    <div class="mb-6">
        <h1 class="text-2xl font-semibold text-slate-950">Edit Pengembalian</h1>
        <p class="mt-2 text-sm text-slate-600">Ubah data pengembalian.</p>
    </div>

    <form action="{{ route('admin.pengembalian.update', $data->id) }}" method="POST" class="space-y-6">
        @csrf
        @method('PUT')
        <div class="grid gap-6 sm:grid-cols-2">
            <div>
                <label for="id_rental" class="block text-sm font-semibold text-slate-700">ID Rental</label>
                <input type="text" id="id_rental" name="id_rental" value="{{ $data->id_rental }}" class="mt-2 block w-full rounded-lg border border-slate-300 px-3 py-2 text-sm shadow-sm focus:border-sky-500 focus:outline-none focus:ring-1 focus:ring-sky-500">
            </div>
            <div>
                <label for="tanggal_pengembalian" class="block text-sm font-semibold text-slate-700">Tanggal Pengembalian</label>
                <input type="date" id="tanggal_pengembalian" name="tanggal_pengembalian" value="{{ $data->tanggal_pengembalian }}" class="mt-2 block w-full rounded-lg border border-slate-300 px-3 py-2 text-sm shadow-sm focus:border-sky-500 focus:outline-none focus:ring-1 focus:ring-sky-500">
            </div>
            <div>
                <label for="kondisi_mobil" class="block text-sm font-semibold text-slate-700">Kondisi Mobil</label>
                <select id="kondisi_mobil" name="kondisi_mobil" class="mt-2 block w-full rounded-lg border border-slate-300 px-3 py-2 text-sm shadow-sm focus:border-sky-500 focus:outline-none focus:ring-1 focus:ring-sky-500">
                    <option value="baik" {{ $data->kondisi_mobil == 'baik' ? 'selected' : '' }}>Baik</option>
                    <option value="rusak" {{ $data->kondisi_mobil == 'rusak' ? 'selected' : '' }}>Rusak</option>
                </select>
            </div>
            <div>
                <label for="denda" class="block text-sm font-semibold text-slate-700">Denda</label>
                <input type="number" step="0.01" id="denda" name="denda" value="{{ $data->denda }}" class="mt-2 block w-full rounded-lg border border-slate-300 px-3 py-2 text-sm shadow-sm focus:border-sky-500 focus:outline-none focus:ring-1 focus:ring-sky-500">
            </div>
            <div class="sm:col-span-2">
                <label for="keterangan" class="block text-sm font-semibold text-slate-700">Keterangan</label>
                <textarea id="keterangan" name="keterangan" rows="3" class="mt-2 block w-full rounded-lg border border-slate-300 px-3 py-2 text-sm shadow-sm focus:border-sky-500 focus:outline-none focus:ring-1 focus:ring-sky-500">{{ $data->keterangan }}</textarea>
            </div>
        </div>
        <div class="flex justify-end gap-3">
            <a href="{{ route('admin.pengembalian.index') }}" class="rounded-full border border-slate-200 bg-white px-5 py-2 text-sm font-semibold text-slate-700 transition hover:bg-slate-50">Batal</a>
            <button type="submit" class="rounded-full bg-sky-600 px-5 py-2 text-sm font-semibold text-white transition hover:bg-sky-700">Update</button>
        </div>
    </form>
</div>
@endsection
