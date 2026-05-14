@extends('layouts.admin')

@section('title', 'Tambah Mobil')

@section('content')
<div class="rounded-4xl bg-white p-8 shadow-xl">
    <div class="mb-8">
        <h1 class="text-2xl font-semibold text-slate-950">Tambah Mobil</h1>
        <p class="mt-2 text-sm text-slate-600">Tambahkan data mobil baru ke armada rental.</p>
    </div>

    <form action="{{ route('mobil.store') }}" method="POST" class="space-y-6">
        @csrf

        <div class="grid gap-6 sm:grid-cols-2">
            <label class="block text-sm text-slate-700">
                <span class="font-semibold">Nama Mobil</span>
                <input type="text" name="nama_mobil" class="mt-2 block w-full rounded-2xl border border-slate-300 bg-white px-4 py-3 text-sm text-slate-900 focus:border-sky-500 focus:outline-none focus:ring-2 focus:ring-sky-100">
            </label>

            <label class="block text-sm text-slate-700">
                <span class="font-semibold">Merk</span>
                <input type="text" name="merk" class="mt-2 block w-full rounded-2xl border border-slate-300 bg-white px-4 py-3 text-sm text-slate-900 focus:border-sky-500 focus:outline-none focus:ring-2 focus:ring-sky-100">
            </label>

            <label class="block text-sm text-slate-700">
                <span class="font-semibold">Plat Nomor</span>
                <input type="text" name="plat_nomor" class="mt-2 block w-full rounded-2xl border border-slate-300 bg-white px-4 py-3 text-sm text-slate-900 focus:border-sky-500 focus:outline-none focus:ring-2 focus:ring-sky-100">
            </label>

            <label class="block text-sm text-slate-700">
                <span class="font-semibold">Tahun</span>
                <input type="number" name="tahun" class="mt-2 block w-full rounded-2xl border border-slate-300 bg-white px-4 py-3 text-sm text-slate-900 focus:border-sky-500 focus:outline-none focus:ring-2 focus:ring-sky-100">
            </label>

            <label class="block text-sm text-slate-700">
                <span class="font-semibold">Harga Sewa</span>
                <input type="number" name="harga_sewa" class="mt-2 block w-full rounded-2xl border border-slate-300 bg-white px-4 py-3 text-sm text-slate-900 focus:border-sky-500 focus:outline-none focus:ring-2 focus:ring-sky-100">
            </label>

            <label class="block text-sm text-slate-700">
                <span class="font-semibold">Status</span>
                <select name="status" class="mt-2 block w-full rounded-2xl border border-slate-300 bg-white px-4 py-3 text-sm text-slate-900 focus:border-sky-500 focus:outline-none focus:ring-2 focus:ring-sky-100">
                    <option value="tersedia">Tersedia</option>
                    <option value="disewa">Disewa</option>
                    <option value="service">Service</option>
                </select>
            </label>
        </div>

        <div class="flex flex-col gap-3 sm:flex-row sm:items-center">
            <button type="submit" class="inline-flex items-center justify-center rounded-full bg-slate-950 px-6 py-3 text-sm font-semibold text-white transition hover:bg-slate-800">Simpan</button>
            <a href="{{ route('mobil.index') }}" class="inline-flex items-center justify-center rounded-full border border-slate-300 bg-white px-6 py-3 text-sm font-semibold text-slate-700 transition hover:border-slate-400 hover:bg-slate-100">Batal</a>
        </div>
    </form>
</div>
@endsection
