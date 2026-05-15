@extends('layouts.admin')

@section('title', 'Edit Denda')

@section('content')
<div class="rounded-[2rem] bg-white p-6 shadow-[0_24px_80px_-40px_rgba(15,23,42,0.2)]">
    <div class="mb-6">
        <h1 class="text-2xl font-semibold text-slate-950">Form Edit Denda</h1>
        <p class="mt-2 text-sm text-slate-600">Perbarui data denda rental.</p>
    </div>

    <form action="{{ route('denda.update', $denda->id) }}" method="POST" class="space-y-6">
        @csrf
        @method('PUT')
        <div class="grid gap-6 sm:grid-cols-2">
            <div>
                <label for="id_rental" class="block text-sm font-semibold text-slate-700">Rental ID</label>
                <input type="number" id="id_rental" name="id_rental" value="{{ old('id_rental', $denda->id_rental) }}" class="mt-2 block w-full rounded-lg border border-slate-300 px-3 py-2 text-sm shadow-sm focus:border-sky-500 focus:outline-none focus:ring-1 focus:ring-sky-500">
            </div>
            <div>
                <label for="jumlah_denda" class="block text-sm font-semibold text-slate-700">Jumlah Denda</label>
                <input type="number" id="jumlah_denda" name="jumlah_denda" value="{{ old('jumlah_denda', $denda->jumlah_denda) }}" class="mt-2 block w-full rounded-lg border border-slate-300 px-3 py-2 text-sm shadow-sm focus:border-sky-500 focus:outline-none focus:ring-1 focus:ring-sky-500">
            </div>
        </div>

        <div class="flex justify-end gap-3">
            <a href="{{ route('denda.index') }}" class="rounded-full border border-slate-200 bg-white px-5 py-2 text-sm font-semibold text-slate-700 transition hover:bg-slate-50">Batal</a>
            <button type="submit" class="rounded-full bg-sky-600 px-5 py-2 text-sm font-semibold text-white transition hover:bg-sky-700">Update</button>
        </div>
    </form>
</div>
@endsection
