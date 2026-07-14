@extends('layouts.customer')

@section('title', 'Ubah Booking')

@section('content')

{{-- ===================== PAGE HEADER ===================== --}}
<div class="mb-6">
    <div class="flex flex-col gap-4 sm:flex-row sm:items-center sm:justify-between">
        <div>
            <h1 class="text-2xl font-bold text-slate-900">Ubah Booking</h1>
            <p class="mt-1 text-sm text-slate-500">Perbarui informasi booking Anda. Hanya booking dengan status "Menunggu Konfirmasi" yang dapat diubah.</p>
        </div>
        <a href="{{ route('customer.booking.index') }}"
            class="inline-flex items-center justify-center gap-2 rounded-xl border border-slate-200 bg-white px-4 py-2.5 text-sm font-semibold text-slate-700 hover:bg-slate-50 transition-colors w-full sm:w-auto">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/>
            </svg>
            Kembali
        </a>
    </div>
</div>

<div class="rounded-2xl bg-white shadow-sm border border-slate-100 p-5 sm:p-8">
    <form action="{{ route('customer.booking.update', $booking) }}" method="POST" class="space-y-6">
        @csrf
        @method('PUT')

        <div class="grid gap-5 lg:grid-cols-2">
            {{-- Mobil Selection --}}
            <div class="lg:col-span-2">
                <label class="block text-sm font-semibold text-slate-700 mb-1.5">Pilih Mobil <span class="text-rose-500">*</span></label>
                <select name="mobil_id"
                    class="block w-full rounded-xl border border-slate-200 bg-slate-50 px-4 py-2.5 text-sm text-slate-900 focus:border-sky-500 focus:bg-white focus:outline-none focus:ring-2 focus:ring-sky-100 transition">
                    <option value="">-- Pilih Mobil --</option>
                    @foreach ($mobils as $mobil)
                        <option value="{{ $mobil->id }}"
                            {{ old('mobil_id', $booking->mobil_id) == $mobil->id ? 'selected' : '' }}>
                            {{ $mobil->nama_mobil }} — {{ $mobil->merk }} ({{ $mobil->plat_nomor }}) — Rp {{ number_format($mobil->harga_sewa, 0, ',', '.') }}/hari
                        </option>
                    @endforeach
                </select>
                @error('mobil_id')<p class="mt-1 text-xs text-red-500">{{ $message }}</p>@enderror
            </div>

            {{-- Tanggal Booking --}}
            <div>
                <label class="block text-sm font-semibold text-slate-700 mb-1.5">Tanggal Booking <span class="text-rose-500">*</span></label>
                <input type="date" name="tanggal_booking"
                    class="block w-full rounded-xl border border-slate-200 bg-slate-50 px-4 py-2.5 text-sm text-slate-900 focus:border-sky-500 focus:bg-white focus:outline-none focus:ring-2 focus:ring-sky-100 transition"
                    value="{{ old('tanggal_booking', $booking->tanggal_booking->format('Y-m-d')) }}">
                @error('tanggal_booking')<p class="mt-1 text-xs text-red-500">{{ $message }}</p>@enderror
            </div>

            {{-- Jam Booking --}}
            <div>
                <label class="block text-sm font-semibold text-slate-700 mb-1.5">Jam Booking <span class="text-rose-500">*</span></label>
                <input type="time" name="jam_booking"
                    class="block w-full rounded-xl border border-slate-200 bg-slate-50 px-4 py-2.5 text-sm text-slate-900 focus:border-sky-500 focus:bg-white focus:outline-none focus:ring-2 focus:ring-sky-100 transition"
                    value="{{ old('jam_booking', $booking->jam_booking) }}">
                @error('jam_booking')<p class="mt-1 text-xs text-red-500">{{ $message }}</p>@enderror
            </div>

            {{-- Tanggal Mulai Sewa --}}
            <div>
                <label class="block text-sm font-semibold text-slate-700 mb-1.5">Tanggal Mulai Sewa <span class="text-rose-500">*</span></label>
                <input type="date" name="tanggal_mulai"
                    class="block w-full rounded-xl border border-slate-200 bg-slate-50 px-4 py-2.5 text-sm text-slate-900 focus:border-sky-500 focus:bg-white focus:outline-none focus:ring-2 focus:ring-sky-100 transition"
                    value="{{ old('tanggal_mulai', optional($booking->tanggal_mulai)->format('Y-m-d')) }}">
                @error('tanggal_mulai')<p class="mt-1 text-xs text-red-500">{{ $message }}</p>@enderror
            </div>

            {{-- Tanggal Selesai Sewa --}}
            <div>
                <label class="block text-sm font-semibold text-slate-700 mb-1.5">Tanggal Selesai Sewa <span class="text-rose-500">*</span></label>
                <input type="date" name="tanggal_selesai"
                    class="block w-full rounded-xl border border-slate-200 bg-slate-50 px-4 py-2.5 text-sm text-slate-900 focus:border-sky-500 focus:bg-white focus:outline-none focus:ring-2 focus:ring-sky-100 transition"
                    value="{{ old('tanggal_selesai', optional($booking->tanggal_selesai)->format('Y-m-d')) }}">
                @error('tanggal_selesai')<p class="mt-1 text-xs text-red-500">{{ $message }}</p>@enderror
            </div>
        </div>

        {{-- Keterangan --}}
        <div>
            <label class="block text-sm font-semibold text-slate-700 mb-1.5">Keterangan (opsional)</label>
            <textarea name="keterangan" rows="3"
                class="block w-full rounded-xl border border-slate-200 bg-slate-50 px-4 py-2.5 text-sm text-slate-900 focus:border-sky-500 focus:bg-white focus:outline-none focus:ring-2 focus:ring-sky-100 transition"
                placeholder="Catatan tambahan untuk booking ini...">{{ old('keterangan', $booking->keterangan) }}</textarea>
            @error('keterangan')<p class="mt-1 text-xs text-red-500">{{ $message }}</p>@enderror
        </div>

        <div class="flex flex-col-reverse gap-3 pt-4 border-t border-slate-100 sm:flex-row sm:items-center sm:justify-end">
            <a href="{{ route('customer.booking.index') }}"
                class="inline-flex items-center justify-center gap-2 rounded-xl border border-slate-200 bg-white px-5 py-2.5 text-sm font-semibold text-slate-700 hover:bg-slate-50 transition-colors">
                Batal
            </a>
            <button type="submit"
                class="inline-flex items-center justify-center gap-2 rounded-xl bg-sky-600 px-6 py-2.5 text-sm font-semibold text-white hover:bg-sky-700 transition-colors shadow-sm">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-8l-4-4m0 0L8 8m4-4v12"/>
                </svg>
                Perbarui Booking
            </button>
        </div>
    </form>
</div>

@endsection

@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    document.addEventListener('DOMContentLoaded', function () {
        if (typeof Swal === 'undefined') return;

        @if ($errors->any())
            Swal.fire({
                title: 'Periksa Kembali',
                html: `<ul style="text-align:left; margin-top:8px; padding-left:18px;">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>`,
                icon: 'warning',
                confirmButtonColor: '#0284c7'
            });
        @endif
    });
</script>
@endpush
