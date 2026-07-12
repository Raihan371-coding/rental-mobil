@extends('layouts.admin')

@section('title', 'Tambah Rental')

@section('content')
    <div class="rounded-[2rem] bg-white p-6 shadow-[0_24px_80px_-40px_rgba(15,23,42,0.2)]">
        <div class="mb-6">
            <h1 class="text-2xl font-semibold text-slate-950">Form Rental</h1>
            <p class="mt-2 text-sm text-slate-600">Tambahkan data rental baru.</p>
        </div>

        <form action="{{ route('admin.rental.store') }}" method="POST" class="space-y-6">
            @csrf
            <div class="grid gap-6 sm:grid-cols-2">
                <div>
                    <label for="id_rental" class="block text-sm font-semibold text-slate-700">ID Rental</label>
                    <input type="text" id="id_rental" name="id_rental" value="{{ old('id_rental') }}"
                        class="mt-2 block w-full rounded-lg border border-slate-300 px-3 py-2 text-sm shadow-sm focus:border-sky-500 focus:outline-none focus:ring-1 focus:ring-sky-500">
                </div>
                <div>
                    <label for="id_customer" class="block text-sm font-semibold text-slate-700">Customer</label>
                    <select id="id_customer" name="id_customer"
                        class="mt-2 block w-full rounded-lg border border-slate-300 px-3 py-2 text-sm shadow-sm focus:border-sky-500 focus:outline-none focus:ring-1 focus:ring-sky-500">
                        <option value="">Pilih customer</option>
                        @foreach ($customers as $customer)
                            <option value="{{ $customer->id }}" {{ old('id_customer') == $customer->id ? 'selected' : '' }}>
                                {{ $customer->nama }} - {{ $customer->email }}</option>
                        @endforeach
                    </select>
                </div>
                <div>
                    <label for="id_mobil" class="block text-sm font-semibold text-slate-700">Mobil</label>
                    <select id="id_mobil" name="id_mobil"
                        class="mt-2 block w-full rounded-lg border border-slate-300 px-3 py-2 text-sm shadow-sm focus:border-sky-500 focus:outline-none focus:ring-1 focus:ring-sky-500">
                        <option value="">Pilih mobil</option>
                        @foreach ($mobils as $mobil)
                            <option value="{{ $mobil->id }}" {{ old('id_mobil') == $mobil->id ? 'selected' : '' }}>
                                {{ $mobil->nama_mobil }}</option>
                        @endforeach
                    </select>
                </div>
                <div>
                    <label for="booking_id" class="block text-sm font-semibold text-slate-700">Booking</label>
                    <select id="booking_id" name="booking_id"
                        class="mt-2 block w-full rounded-lg border border-slate-300 px-3 py-2 text-sm shadow-sm focus:border-sky-500 focus:outline-none focus:ring-1 focus:ring-sky-500">
                        <option value="">Tidak terhubung ke booking</option>
                        @foreach ($bookings as $booking)
                            <option value="{{ $booking->id }}" {{ old('booking_id') == $booking->id ? 'selected' : '' }}>
                                #{{ $booking->id }} - {{ $booking->nama_pelanggan }}</option>
                        @endforeach
                    </select>
                </div>
                <div>
                    <label for="tanggal_rental" class="block text-sm font-semibold text-slate-700">Tanggal Rental</label>
                    <input type="date" id="tanggal_rental" name="tanggal_rental" value="{{ old('tanggal_rental') }}"
                        class="mt-2 block w-full rounded-lg border border-slate-300 px-3 py-2 text-sm shadow-sm focus:border-sky-500 focus:outline-none focus:ring-1 focus:ring-sky-500">
                </div>
                <div>
                    <label for="tanggal_kembali" class="block text-sm font-semibold text-slate-700">Tanggal Kembali</label>
                    <input type="date" id="tanggal_kembali" name="tanggal_kembali" value="{{ old('tanggal_kembali') }}"
                        class="mt-2 block w-full rounded-lg border border-slate-300 px-3 py-2 text-sm shadow-sm focus:border-sky-500 focus:outline-none focus:ring-1 focus:ring-sky-500">
                </div>
                <div>
                    <label for="total_harga" class="block text-sm font-semibold text-slate-700">Total Harga</label>
                    <input type="number" step="0.01" id="total_harga" name="total_harga"
                        value="{{ old('total_harga') }}"
                        class="mt-2 block w-full rounded-lg border border-slate-300 px-3 py-2 text-sm shadow-sm focus:border-sky-500 focus:outline-none focus:ring-1 focus:ring-sky-500">
                </div>
                <div class="sm:col-span-2">
                    <label for="status" class="block text-sm font-semibold text-slate-700">Status</label>
                    <select id="status" name="status"
                        class="mt-2 block w-full rounded-lg border border-slate-300 px-3 py-2 text-sm shadow-sm focus:border-sky-500 focus:outline-none focus:ring-1 focus:ring-sky-500">
                        <option value="berjalan" {{ old('status') == 'berjalan' ? 'selected' : '' }}>Berjalan</option>
                        <option value="selesai" {{ old('status') == 'selesai' ? 'selected' : '' }}>Selesai</option>
                    </select>
                </div>
            </div>
            <div class="flex justify-end gap-3">
                <a href="{{ route('admin.rental.index') }}"
                    class="rounded-full border border-slate-200 bg-white px-5 py-2 text-sm font-semibold text-slate-700 transition hover:bg-slate-50">Batal</a>
                <button type="submit"
                    class="rounded-full bg-violet-600 px-5 py-2 text-sm font-semibold text-white transition hover:bg-violet-700">Simpan</button>
            </div>
        </form>
    </div>
@endsection
