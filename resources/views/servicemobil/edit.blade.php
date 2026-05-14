@extends('layouts.admin')

@section('title', 'Edit Service')

@section('content')
<div class="rounded-4xl bg-white p-8 shadow-xl">
    <div class="mb-8">
        <h1 class="text-2xl font-semibold text-slate-950">Edit Service Mobil</h1>
        <p class="mt-2 text-sm text-slate-600">Perbarui detail service kendaraan.</p>
    </div>

    <form action="{{ route('service.update', $service->id) }}" method="POST" class="space-y-6">
        @csrf
        @method('PUT')

        <div class="grid gap-6 sm:grid-cols-2">
            <label class="block text-sm text-slate-700">
                <span class="font-semibold">Mobil</span>
                <select name="mobil_id" class="mt-2 block w-full rounded-2xl border border-slate-300 bg-white px-4 py-3 text-sm text-slate-900 focus:border-sky-500 focus:outline-none focus:ring-2 focus:ring-sky-100">
                    @foreach($mobils as $mobil)
                        <option value="{{ $mobil->id }}" {{ $service->mobil_id == $mobil->id ? 'selected' : '' }}>{{ $mobil->nama_mobil }}</option>
                    @endforeach
                </select>
            </label>

            <label class="block text-sm text-slate-700">
                <span class="font-semibold">Tanggal Service</span>
                <input type="date" name="tanggal_service" value="{{ $service->tanggal_service }}" class="mt-2 block w-full rounded-2xl border border-slate-300 bg-white px-4 py-3 text-sm text-slate-900 focus:border-sky-500 focus:outline-none focus:ring-2 focus:ring-sky-100">
            </label>

            <label class="block text-sm text-slate-700">
                <span class="font-semibold">Biaya</span>
                <input type="number" name="biaya_service" value="{{ $service->biaya_service }}" class="mt-2 block w-full rounded-2xl border border-slate-300 bg-white px-4 py-3 text-sm text-slate-900 focus:border-sky-500 focus:outline-none focus:ring-2 focus:ring-sky-100">
            </label>

            <label class="block text-sm text-slate-700">
                <span class="font-semibold">Status</span>
                <select name="status_service" class="mt-2 block w-full rounded-2xl border border-slate-300 bg-white px-4 py-3 text-sm text-slate-900 focus:border-sky-500 focus:outline-none focus:ring-2 focus:ring-sky-100">
                    <option value="pending" {{ $service->status_service == 'pending' ? 'selected' : '' }}>Pending</option>
                    <option value="proses" {{ $service->status_service == 'proses' ? 'selected' : '' }}>Proses</option>
                    <option value="selesai" {{ $service->status_service == 'selesai' ? 'selected' : '' }}>Selesai</option>
                </select>
            </label>
        </div>

        <label class="block text-sm text-slate-700">
            <span class="font-semibold">Deskripsi</span>
            <textarea name="deskripsi" rows="4" class="mt-2 block w-full rounded-2xl border border-slate-300 bg-white px-4 py-3 text-sm text-slate-900 focus:border-sky-500 focus:outline-none focus:ring-2 focus:ring-sky-100">{{ $service->deskripsi }}</textarea>
        </label>

        <div class="flex flex-col gap-3 sm:flex-row sm:items-center">
            <button type="submit" class="inline-flex items-center justify-center rounded-full bg-slate-950 px-6 py-3 text-sm font-semibold text-white transition hover:bg-slate-800">Update</button>
            <a href="{{ route('service.index') }}" class="inline-flex items-center justify-center rounded-full border border-slate-300 bg-white px-6 py-3 text-sm font-semibold text-slate-700 transition hover:border-slate-400 hover:bg-slate-100">Batal</a>
        </div>
    </form>
</div>
@endsection
