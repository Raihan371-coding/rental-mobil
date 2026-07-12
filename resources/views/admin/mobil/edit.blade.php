@extends('layouts.admin')

@section('title', 'Edit Mobil')

@section('content')
<div class="rounded-4xl bg-white p-8 shadow-xl">
    <div class="mb-8">
        <h1 class="text-2xl font-semibold text-slate-950">Edit Mobil</h1>
        <p class="mt-2 text-sm text-slate-600">Perbarui data mobil yang sudah tersedia.</p>
    </div>

    <form action="{{ route('admin.mobil.update', $mobil->id) }}" method="POST" enctype="multipart/form-data" class="space-y-6">
        @csrf
        @method('PUT')

        <div class="grid gap-6 sm:grid-cols-2">
            <label class="block text-sm text-slate-700">
                <span class="font-semibold">Nama Mobil</span>
                <input type="text" name="nama_mobil" value="{{ $mobil->nama_mobil }}" class="mt-2 block w-full rounded-2xl border border-slate-300 bg-white px-4 py-3 text-sm text-slate-900 focus:border-sky-500 focus:outline-none focus:ring-2 focus:ring-sky-100">
            </label>

            <label class="block text-sm text-slate-700">
                <span class="font-semibold">Merk</span>
                <input type="text" name="merk" value="{{ $mobil->merk }}" class="mt-2 block w-full rounded-2xl border border-slate-300 bg-white px-4 py-3 text-sm text-slate-900 focus:border-sky-500 focus:outline-none focus:ring-2 focus:ring-sky-100">
            </label>

            <label class="block text-sm text-slate-700">
                <span class="font-semibold">Plat Nomor</span>
                <input type="text" name="plat_nomor" value="{{ $mobil->plat_nomor }}" class="mt-2 block w-full rounded-2xl border border-slate-300 bg-white px-4 py-3 text-sm text-slate-900 focus:border-sky-500 focus:outline-none focus:ring-2 focus:ring-sky-100">
            </label>

            <label class="block text-sm text-slate-700">
                <span class="font-semibold">Tahun</span>
                <input type="number" name="tahun" value="{{ $mobil->tahun }}" class="mt-2 block w-full rounded-2xl border border-slate-300 bg-white px-4 py-3 text-sm text-slate-900 focus:border-sky-500 focus:outline-none focus:ring-2 focus:ring-sky-100">
            </label>

            <label class="block text-sm text-slate-700">
                <span class="font-semibold">Harga Sewa</span>
                <input type="number" name="harga_sewa" value="{{ $mobil->harga_sewa }}" class="mt-2 block w-full rounded-2xl border border-slate-300 bg-white px-4 py-3 text-sm text-slate-900 focus:border-sky-500 focus:outline-none focus:ring-2 focus:ring-sky-100">
            </label>

            <label class="block text-sm text-slate-700">
                <span class="font-semibold">Status</span>
                <select name="status" class="mt-2 block w-full rounded-2xl border border-slate-300 bg-white px-4 py-3 text-sm text-slate-900 focus:border-sky-500 focus:outline-none focus:ring-2 focus:ring-sky-100">
                    <option value="tersedia" {{ $mobil->status == 'tersedia' ? 'selected' : '' }}>Tersedia</option>
                    <option value="disewa" {{ $mobil->status == 'disewa' ? 'selected' : '' }}>Disewa</option>
                    <option value="service" {{ $mobil->status == 'service' ? 'selected' : '' }}>Service</option>
                </select>
            </label>

            <!-- Foto Mobil -->
            <div class="block text-sm text-slate-700">
                <span class="font-semibold">Foto Mobil</span>

                @if($mobil->foto)
                    <div class="mt-3">
                        <img src="{{ asset('storage/' . $mobil->foto) }}"
                             alt="Foto Mobil"
                             class="h-32 w-48 rounded-xl border object-cover">
                    </div>
                @endif

                <input
                    type="file"
                    name="foto"
                    accept="image/*"
                    class="mt-3 block w-full rounded-2xl border border-slate-300 bg-white px-4 py-3 text-sm text-slate-900 focus:border-sky-500 focus:outline-none focus:ring-2 focus:ring-sky-100">

                <p class="mt-2 text-xs text-slate-500">
                    Kosongkan jika tidak ingin mengganti foto.
                </p>

                @error('foto')
                    <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                @enderror
            </div>
        </div>

        <div class="flex flex-col gap-3 sm:flex-row sm:items-center">
            <button type="submit" class="inline-flex items-center justify-center rounded-full bg-slate-950 px-6 py-3 text-sm font-semibold text-white transition hover:bg-slate-800">
                Update
            </button>

            <a href="{{ route('admin.mobil.index') }}" class="inline-flex items-center justify-center rounded-full border border-slate-300 bg-white px-6 py-3 text-sm font-semibold text-slate-700 transition hover:border-slate-400 hover:bg-slate-100">
                Batal
            </a>
        </div>
    </form>
</div>
@endsection