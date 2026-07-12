@extends('layouts.admin')

@section('title', 'Tambah Customer')

@section('content')
    <div class="rounded-[2rem] bg-white p-6 shadow-[0_24px_80px_-40px_rgba(15,23,42,0.2)]">
        <div class="mb-6">
            <h1 class="text-2xl font-semibold text-slate-950">Form Tambah Customer</h1>
            <p class="mt-2 text-sm text-slate-600">Tambah data customer baru dengan mudah.</p>
        </div>

        <form action="{{ route('admin.customer.store') }}" method="POST" class="space-y-6">
            @csrf
            <div class="grid gap-6 sm:grid-cols-2">
                <div>
                    <label for="nama" class="block text-sm font-semibold text-slate-700">Nama</label>
                    <input type="text" id="nama" name="nama" value="{{ old('nama') }}" required
                        class="mt-2 block w-full rounded-lg border border-slate-300 px-3 py-2 text-sm shadow-sm focus:border-sky-500 focus:outline-none focus:ring-1 focus:ring-sky-500">
                </div>
                <div>
                    <label for="user_id" class="block text-sm font-semibold text-slate-700">User</label>
                    <select id="user_id" name="user_id"
                        class="mt-2 block w-full rounded-lg border border-slate-300 px-3 py-2 text-sm shadow-sm focus:border-sky-500 focus:outline-none focus:ring-1 focus:ring-sky-500">
                        <option value="">Tidak terkait dengan user</option>
                        @foreach ($users as $user)
                            <option value="{{ $user->id }}" {{ old('user_id') == $user->id ? 'selected' : '' }}>
                                {{ $user->name }} ({{ $user->email }})</option>
                        @endforeach
                    </select>
                </div>
                <div>
                    <label for="alamat" class="block text-sm font-semibold text-slate-700">Alamat</label>
                    <input type="text" id="alamat" name="alamat" value="{{ old('alamat') }}" required
                        class="mt-2 block w-full rounded-lg border border-slate-300 px-3 py-2 text-sm shadow-sm focus:border-sky-500 focus:outline-none focus:ring-1 focus:ring-sky-500">
                </div>
                <div>
                    <label for="no_identitas" class="block text-sm font-semibold text-slate-700">No Identitas</label>
                    <input type="text" id="no_identitas" name="no_identitas" value="{{ old('no_identitas') }}"
                        class="mt-2 block w-full rounded-lg border border-slate-300 px-3 py-2 text-sm shadow-sm focus:border-sky-500 focus:outline-none focus:ring-1 focus:ring-sky-500">
                </div>
                <div>
                    <label for="no_telp" class="block text-sm font-semibold text-slate-700">No Telepon</label>
                    <input type="text" id="no_telp" name="no_telp" value="{{ old('no_telp') }}" required
                        class="mt-2 block w-full rounded-lg border border-slate-300 px-3 py-2 text-sm shadow-sm focus:border-sky-500 focus:outline-none focus:ring-1 focus:ring-sky-500">
                </div>
                <div>
                    <label for="email" class="block text-sm font-semibold text-slate-700">Email</label>
                    <input type="email" id="email" name="email" value="{{ old('email') }}"
                        class="mt-2 block w-full rounded-lg border border-slate-300 px-3 py-2 text-sm shadow-sm focus:border-sky-500 focus:outline-none focus:ring-1 focus:ring-sky-500">
                </div>
            </div>

            <div class="flex justify-end gap-3">
                <a href="{{ route('admin.customer.index') }}"
                    class="rounded-full border border-slate-200 bg-white px-5 py-2 text-sm font-semibold text-slate-700 transition hover:bg-slate-50">Batal</a>
                <button type="submit"
                    class="rounded-full bg-sky-600 px-5 py-2 text-sm font-semibold text-white transition hover:bg-sky-700">Simpan</button>
            </div>
        </form>
    </div>
@endsection
