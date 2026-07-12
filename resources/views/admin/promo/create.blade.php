@extends('layouts.admin')

@section('title', 'Tambah Promo')

@section('content')
<div class="rounded-[2rem] bg-white p-6 shadow-[0_24px_80px_-40px_rgba(15,23,42,0.2)]">
    <div class="mb-6">
        <h1 class="text-2xl font-semibold text-slate-950">Form Tambah Promo</h1>
        <p class="mt-2 text-sm text-slate-600">Tambahkan promo baru untuk pelanggan.</p>
    </div>

    <form action="{{ route('admin.promo.store') }}" method="POST" class="space-y-6">
        @csrf
        <div class="grid gap-6 sm:grid-cols-2">
            <div>
                <label for="kode_promo" class="block text-sm font-semibold text-slate-700">Kode Promo</label>
                <input type="text" id="kode_promo" name="kode_promo" value="{{ old('kode_promo') }}" required class="mt-2 block w-full rounded-lg border border-slate-300 px-3 py-2 text-sm shadow-sm focus:border-sky-500 focus:outline-none focus:ring-1 focus:ring-sky-500">
            </div>
            <div>
                <label for="potongan" class="block text-sm font-semibold text-slate-700">Potongan</label>
                <input type="number" id="potongan" name="potongan" value="{{ old('potongan') }}" required class="mt-2 block w-full rounded-lg border border-slate-300 px-3 py-2 text-sm shadow-sm focus:border-sky-500 focus:outline-none focus:ring-1 focus:ring-sky-500">
            </div>
            <div>
                <label for="tanggal_mulai" class="block text-sm font-semibold text-slate-700">Tanggal Mulai</label>
                <input type="date" id="tanggal_mulai" name="tanggal_mulai" value="{{ old('tanggal_mulai') }}" required class="mt-2 block w-full rounded-lg border border-slate-300 px-3 py-2 text-sm shadow-sm focus:border-sky-500 focus:outline-none focus:ring-1 focus:ring-sky-500">
            </div>
            <div>
                <label for="tanggal_selesai" class="block text-sm font-semibold text-slate-700">Tanggal Selesai</label>
                <input type="date" id="tanggal_selesai" name="tanggal_selesai" value="{{ old('tanggal_selesai') }}" required class="mt-2 block w-full rounded-lg border border-slate-300 px-3 py-2 text-sm shadow-sm focus:border-sky-500 focus:outline-none focus:ring-1 focus:ring-sky-500">
            </div>
        </div>

        <div class="flex justify-end gap-3">
            <a href="{{ route('admin.promo.index') }}" class="rounded-full border border-slate-200 bg-white px-5 py-2 text-sm font-semibold text-slate-700 transition hover:bg-slate-50">Batal</a>
            <button type="submit" class="rounded-full bg-sky-600 px-5 py-2 text-sm font-semibold text-white transition hover:bg-sky-700">Simpan</button>
        </div>
    </form>
</div>
@endsection
