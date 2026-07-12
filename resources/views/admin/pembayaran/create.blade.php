@extends('layouts.admin')

@section('title', 'Tambah Pembayaran')

@section('content')
<div class="rounded-[2rem] bg-white p-6 shadow-[0_24px_80px_-40px_rgba(15,23,42,0.2)]">
    <div class="mb-6">
        <h1 class="text-2xl font-semibold text-slate-950">Form Pembayaran</h1>
        <p class="mt-2 text-sm text-slate-600">Tambahkan data pembayaran baru.</p>
    </div>

    <form action="{{ route('admin.pembayaran.store') }}" method="POST" class="space-y-6">
        @csrf
        <div class="grid gap-6 sm:grid-cols-2">
            <div>
                <label for="id_pembayaran" class="block text-sm font-semibold text-slate-700">ID Pembayaran</label>
                <input type="text" id="id_pembayaran" name="id_pembayaran" value="{{ old('id_pembayaran') }}" class="mt-2 block w-full rounded-lg border border-slate-300 px-3 py-2 text-sm shadow-sm focus:border-sky-500 focus:outline-none focus:ring-1 focus:ring-sky-500">
            </div>
            <div>
                <label for="id_rental" class="block text-sm font-semibold text-slate-700">ID Rental</label>
                <input type="text" id="id_rental" name="id_rental" value="{{ old('id_rental') }}" class="mt-2 block w-full rounded-lg border border-slate-300 px-3 py-2 text-sm shadow-sm focus:border-sky-500 focus:outline-none focus:ring-1 focus:ring-sky-500">
            </div>
            <div>
                <label for="tanggal_bayar" class="block text-sm font-semibold text-slate-700">Tanggal Bayar</label>
                <input type="date" id="tanggal_bayar" name="tanggal_bayar" value="{{ old('tanggal_bayar') }}" class="mt-2 block w-full rounded-lg border border-slate-300 px-3 py-2 text-sm shadow-sm focus:border-sky-500 focus:outline-none focus:ring-1 focus:ring-sky-500">
            </div>
            <div>
                <label for="metode_bayar" class="block text-sm font-semibold text-slate-700">Metode Bayar</label>
                <input type="text" id="metode_bayar" name="metode_bayar" value="{{ old('metode_bayar') }}" class="mt-2 block w-full rounded-lg border border-slate-300 px-3 py-2 text-sm shadow-sm focus:border-sky-500 focus:outline-none focus:ring-1 focus:ring-sky-500">
            </div>
            <div>
                <label for="jumlah_bayar" class="block text-sm font-semibold text-slate-700">Jumlah Bayar</label>
                <input type="number" step="0.01" id="jumlah_bayar" name="jumlah_bayar" value="{{ old('jumlah_bayar') }}" class="mt-2 block w-full rounded-lg border border-slate-300 px-3 py-2 text-sm shadow-sm focus:border-sky-500 focus:outline-none focus:ring-1 focus:ring-sky-500">
            </div>
            <div>
                <label for="status_bayar" class="block text-sm font-semibold text-slate-700">Status Bayar</label>
                <select id="status_bayar" name="status_bayar" class="mt-2 block w-full rounded-lg border border-slate-300 px-3 py-2 text-sm shadow-sm focus:border-sky-500 focus:outline-none focus:ring-1 focus:ring-sky-500">
                    <option value="lunas" {{ old('status_bayar') == 'lunas' ? 'selected' : '' }}>Lunas</option>
                    <option value="belum_lunas" {{ old('status_bayar') == 'belum_lunas' ? 'selected' : '' }}>Belum Lunas</option>
                </select>
            </div>
        </div>
        <div class="flex justify-end gap-3">
            <a href="{{ route('admin.pembayaran.index') }}" class="rounded-full border border-slate-200 bg-white px-5 py-2 text-sm font-semibold text-slate-700 transition hover:bg-slate-50">Batal</a>
            <button type="submit" class="rounded-full bg-emerald-600 px-5 py-2 text-sm font-semibold text-white transition hover:bg-emerald-700">Simpan</button>
        </div>
    </form>
</div>
@endsection
