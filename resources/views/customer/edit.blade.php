@extends('layouts.admin')

@section('title', 'Edit Customer')

@section('content')
<div class="rounded-[2rem] bg-white p-6 shadow-[0_24px_80px_-40px_rgba(15,23,42,0.2)]">
    <div class="mb-6">
        <h1 class="text-2xl font-semibold text-slate-950">Form Edit Customer</h1>
        <p class="mt-2 text-sm text-slate-600">Perbarui informasi customer yang sudah ada.</p>
    </div>

    <form action="{{ route('customer.update', $customer->id) }}" method="POST" class="space-y-6">
        @csrf
        @method('PUT')
        <div class="grid gap-6 sm:grid-cols-2">
            <div>
                <label for="nama" class="block text-sm font-semibold text-slate-700">Nama</label>
                <input type="text" id="nama" name="nama" value="{{ old('nama', $customer->nama) }}" required class="mt-2 block w-full rounded-lg border border-slate-300 px-3 py-2 text-sm shadow-sm focus:border-sky-500 focus:outline-none focus:ring-1 focus:ring-sky-500">
            </div>
            <div>
                <label for="alamat" class="block text-sm font-semibold text-slate-700">Alamat</label>
                <input type="text" id="alamat" name="alamat" value="{{ old('alamat', $customer->alamat) }}" required class="mt-2 block w-full rounded-lg border border-slate-300 px-3 py-2 text-sm shadow-sm focus:border-sky-500 focus:outline-none focus:ring-1 focus:ring-sky-500">
            </div>
            <div>
                <label for="no_telp" class="block text-sm font-semibold text-slate-700">No Telepon</label>
                <input type="text" id="no_telp" name="no_telp" value="{{ old('no_telp', $customer->no_telp) }}" required class="mt-2 block w-full rounded-lg border border-slate-300 px-3 py-2 text-sm shadow-sm focus:border-sky-500 focus:outline-none focus:ring-1 focus:ring-sky-500">
            </div>
            <div>
                <label for="email" class="block text-sm font-semibold text-slate-700">Email</label>
                <input type="email" id="email" name="email" value="{{ old('email', $customer->email) }}" class="mt-2 block w-full rounded-lg border border-slate-300 px-3 py-2 text-sm shadow-sm focus:border-sky-500 focus:outline-none focus:ring-1 focus:ring-sky-500">
            </div>
        </div>

        <div class="flex justify-end gap-3">
            <a href="{{ route('customer.index') }}" class="rounded-full border border-slate-200 bg-white px-5 py-2 text-sm font-semibold text-slate-700 transition hover:bg-slate-50">Batal</a>
            <button type="submit" class="rounded-full bg-sky-600 px-5 py-2 text-sm font-semibold text-white transition hover:bg-sky-700">Update</button>
        </div>
    </form>
</div>
@endsection
