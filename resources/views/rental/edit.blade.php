@extends('layouts.admin')

@section('title', 'Edit Rental')

@section('content')
<div class="rounded-[2rem] bg-white p-6 shadow-[0_24px_80px_-40px_rgba(15,23,42,0.2)]">
    <div class="mb-6">
        <h1 class="text-2xl font-semibold text-slate-950">Edit Rental</h1>
        <p class="mt-2 text-sm text-slate-600">Ubah data rental.</p>
    </div>

    <form action="{{ route('rental.update', $data->id) }}" method="POST" class="space-y-6">
        @csrf
        @method('PUT')
        <div class="grid gap-6 sm:grid-cols-2">
            <div>
                <label for="id_rental" class="block text-sm font-semibold text-slate-700">ID Rental</label>
                <input type="text" id="id_rental" name="id_rental" value="{{ $data->id_rental }}" class="mt-2 block w-full rounded-lg border border-slate-300 px-3 py-2 text-sm shadow-sm focus:border-sky-500 focus:outline-none focus:ring-1 focus:ring-sky-500">
            </div>
            <div>
                <label for="id_customer" class="block text-sm font-semibold text-slate-700">ID Customer</label>
                <input type="text" id="id_customer" name="id_customer" value="{{ $data->id_customer }}" class="mt-2 block w-full rounded-lg border border-slate-300 px-3 py-2 text-sm shadow-sm focus:border-sky-500 focus:outline-none focus:ring-1 focus:ring-sky-500">
            </div>
            <div>
                <label for="id_mobil" class="block text-sm font-semibold text-slate-700">ID Mobil</label>
                <input type="text" id="id_mobil" name="id_mobil" value="{{ $data->id_mobil }}" class="mt-2 block w-full rounded-lg border border-slate-300 px-3 py-2 text-sm shadow-sm focus:border-sky-500 focus:outline-none focus:ring-1 focus:ring-sky-500">
            </div>
            <div>
                <label for="tanggal_rental" class="block text-sm font-semibold text-slate-700">Tanggal Rental</label>
                <input type="date" id="tanggal_rental" name="tanggal_rental" value="{{ $data->tanggal_rental }}" class="mt-2 block w-full rounded-lg border border-slate-300 px-3 py-2 text-sm shadow-sm focus:border-sky-500 focus:outline-none focus:ring-1 focus:ring-sky-500">
            </div>
            <div>
                <label for="tanggal_kembali" class="block text-sm font-semibold text-slate-700">Tanggal Kembali</label>
                <input type="date" id="tanggal_kembali" name="tanggal_kembali" value="{{ $data->tanggal_kembali }}" class="mt-2 block w-full rounded-lg border border-slate-300 px-3 py-2 text-sm shadow-sm focus:border-sky-500 focus:outline-none focus:ring-1 focus:ring-sky-500">
            </div>
            <div>
                <label for="total_harga" class="block text-sm font-semibold text-slate-700">Total Harga</label>
                <input type="number" step="0.01" id="total_harga" name="total_harga" value="{{ $data->total_harga }}" class="mt-2 block w-full rounded-lg border border-slate-300 px-3 py-2 text-sm shadow-sm focus:border-sky-500 focus:outline-none focus:ring-1 focus:ring-sky-500">
            </div>
            <div class="sm:col-span-2">
                <label for="status" class="block text-sm font-semibold text-slate-700">Status</label>
                <select id="status" name="status" class="mt-2 block w-full rounded-lg border border-slate-300 px-3 py-2 text-sm shadow-sm focus:border-sky-500 focus:outline-none focus:ring-1 focus:ring-sky-500">
                    <option value="rental" {{ $data->status == 'rental' ? 'selected' : '' }}>Rental</option>
                    <option value="kembali" {{ $data->status == 'kembali' ? 'selected' : '' }}>Kembali</option>
                </select>
            </div>
        </div>
        <div class="flex justify-end gap-3">
            <a href="{{ route('rental.index') }}" class="rounded-full border border-slate-200 bg-white px-5 py-2 text-sm font-semibold text-slate-700 transition hover:bg-slate-50">Batal</a>
            <button type="submit" class="rounded-full bg-violet-600 px-5 py-2 text-sm font-semibold text-white transition hover:bg-violet-700">Update</button>
        </div>
    </form>
</div>
@endsection
