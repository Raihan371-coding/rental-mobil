@extends('layouts.customer')

@section('title', 'Ubah Booking')

@section('content')
    <div class="space-y-6">
        <div class="rounded-lg bg-white p-6 shadow-sm">
            <h1 class="text-2xl font-semibold text-slate-900">Ubah Booking</h1>
            <p class="mt-2 text-sm text-slate-500">Perbarui informasi booking Anda. Hanya booking dengan status "Menunggu Konfirmasi" yang dapat diubah.</p>
        </div>

        @if ($errors->any())
            <div class="rounded-lg border border-rose-200 bg-rose-50 px-5 py-4 text-sm text-rose-900">
                <p class="font-semibold">Terjadi kesalahan:</p>
                <ul class="mt-2 list-disc list-inside">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <div class="rounded-lg bg-white p-6 shadow-sm">
            <form action="{{ route('customer.booking.update', $booking) }}" method="POST" class="space-y-6">
                @csrf
                @method('PUT')

                <div class="grid gap-6 lg:grid-cols-2">
                    {{-- Mobil Selection --}}
                    <div class="lg:col-span-2">
                        <label class="mb-2 block text-sm font-medium text-slate-700">Pilih Mobil <span class="text-rose-500">*</span></label>
                        <select name="mobil_id"
                            class="w-full rounded-lg border border-slate-300 bg-white px-4 py-3 text-sm text-slate-900 shadow-sm focus:border-slate-700 focus:outline-none focus:ring-1 focus:ring-slate-700">
                            <option value="">-- Pilih Mobil --</option>
                            @foreach ($mobils as $mobil)
                                <option value="{{ $mobil->id }}"
                                    {{ old('mobil_id', $booking->mobil_id) == $mobil->id ? 'selected' : '' }}>
                                    {{ $mobil->nama_mobil }} — {{ $mobil->merk }} ({{ $mobil->plat_nomor }}) — Rp {{ number_format($mobil->harga_sewa, 0, ',', '.') }}/hari
                                </option>
                            @endforeach
                        </select>
                        @error('mobil_id')
                            <p class="mt-2 text-sm text-rose-600">{{ $message }}</p>
                        @enderror
                    </div>

                    {{-- Tanggal Booking --}}
                    <div>
                        <label class="mb-2 block text-sm font-medium text-slate-700">Tanggal Booking <span class="text-rose-500">*</span></label>
                        <input type="date" name="tanggal_booking"
                            class="w-full rounded-lg border border-slate-300 px-4 py-3 text-sm text-slate-900 shadow-sm focus:border-slate-700 focus:outline-none focus:ring-1 focus:ring-slate-700"
                            value="{{ old('tanggal_booking', $booking->tanggal_booking->format('Y-m-d')) }}">
                        @error('tanggal_booking')
                            <p class="mt-2 text-sm text-rose-600">{{ $message }}</p>
                        @enderror
                    </div>

                    {{-- Jam Booking --}}
                    <div>
                        <label class="mb-2 block text-sm font-medium text-slate-700">Jam Booking <span class="text-rose-500">*</span></label>
                        <input type="time" name="jam_booking"
                            class="w-full rounded-lg border border-slate-300 px-4 py-3 text-sm text-slate-900 shadow-sm focus:border-slate-700 focus:outline-none focus:ring-1 focus:ring-slate-700"
                            value="{{ old('jam_booking', $booking->jam_booking) }}">
                        @error('jam_booking')
                            <p class="mt-2 text-sm text-rose-600">{{ $message }}</p>
                        @enderror
                    </div>

                    {{-- Tanggal Mulai Sewa --}}
                    <div>
                        <label class="mb-2 block text-sm font-medium text-slate-700">Tanggal Mulai Sewa <span class="text-rose-500">*</span></label>
                        <input type="date" name="tanggal_mulai"
                            class="w-full rounded-lg border border-slate-300 px-4 py-3 text-sm text-slate-900 shadow-sm focus:border-slate-700 focus:outline-none focus:ring-1 focus:ring-slate-700"
                            value="{{ old('tanggal_mulai', optional($booking->tanggal_mulai)->format('Y-m-d')) }}">
                        @error('tanggal_mulai')
                            <p class="mt-2 text-sm text-rose-600">{{ $message }}</p>
                        @enderror
                    </div>

                    {{-- Tanggal Selesai Sewa --}}
                    <div>
                        <label class="mb-2 block text-sm font-medium text-slate-700">Tanggal Selesai Sewa <span class="text-rose-500">*</span></label>
                        <input type="date" name="tanggal_selesai"
                            class="w-full rounded-lg border border-slate-300 px-4 py-3 text-sm text-slate-900 shadow-sm focus:border-slate-700 focus:outline-none focus:ring-1 focus:ring-slate-700"
                            value="{{ old('tanggal_selesai', optional($booking->tanggal_selesai)->format('Y-m-d')) }}">
                        @error('tanggal_selesai')
                            <p class="mt-2 text-sm text-rose-600">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                {{-- Keterangan --}}
                <div>
                    <label class="mb-2 block text-sm font-medium text-slate-700">Keterangan (opsional)</label>
                    <textarea name="keterangan" rows="3"
                        class="w-full rounded-lg border border-slate-300 px-4 py-3 text-sm text-slate-900 shadow-sm focus:border-slate-700 focus:outline-none focus:ring-1 focus:ring-slate-700"
                        placeholder="Catatan tambahan untuk booking ini...">{{ old('keterangan', $booking->keterangan) }}</textarea>
                    @error('keterangan')
                        <p class="mt-2 text-sm text-rose-600">{{ $message }}</p>
                    @enderror
                </div>

                <div class="flex items-center justify-end gap-4">
                    <a href="{{ route('customer.booking.index') }}"
                        class="rounded-full border border-slate-200 px-5 py-3 text-sm font-medium text-slate-700 transition hover:bg-slate-50">Batal</a>
                    <button type="submit"
                        class="rounded-full bg-slate-950 px-6 py-3 text-sm font-semibold text-white transition hover:bg-slate-800">Perbarui Booking</button>
                </div>
            </form>
        </div>
    </div>
@endsection
