@extends('layouts.admin')

@section('title', 'Tambah Booking')

@section('content')

{{-- ===================== PAGE HEADER ===================== --}}
<div class="mb-6">
    <div class="flex items-center gap-2 text-sm text-slate-500 mb-3">
        <a href="{{ route('admin.booking.index') }}" class="hover:text-slate-700 transition">Data Booking</a>
        <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/></svg>
        <span class="text-slate-900 font-medium">Tambah Booking</span>
    </div>
    <div class="flex flex-col gap-4 sm:flex-row sm:items-center sm:justify-between">
        <div>
            <h1 class="text-2xl font-bold text-slate-900">Tambah Booking</h1>
            <p class="mt-1 text-sm text-slate-500">Isi data booking baru untuk pelanggan.</p>
        </div>
        <a href="{{ route('admin.booking.index') }}"
            class="inline-flex items-center justify-center gap-2 rounded-xl border border-slate-200 bg-white px-4 py-2.5 text-sm font-semibold text-slate-600 shadow-sm hover:bg-slate-50 transition-colors w-full sm:w-auto">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
            </svg>
            Kembali
        </a>
    </div>
</div>

@include('admin.partials.alert')

<form action="{{ route('admin.booking.store') }}" method="POST" id="bookingForm" class="space-y-6">
    @csrf

    {{-- ===================== DATA PELANGGAN ===================== --}}
    <div class="relative overflow-hidden rounded-2xl bg-white p-6 shadow-sm border border-slate-100">
        <div class="absolute top-0 right-0 w-24 h-24 rounded-bl-[3rem] bg-blue-50 opacity-60"></div>
        <div class="relative mb-6 flex items-center gap-3">
            <div class="flex h-10 w-10 flex-shrink-0 items-center justify-center rounded-xl bg-blue-100 text-blue-600">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                </svg>
            </div>
            <div>
                <h3 class="text-base font-bold text-slate-900">Data Pelanggan</h3>
                <p class="text-xs text-slate-400">Pilih customer terdaftar atau isi manual</p>
            </div>
        </div>

        <div class="relative grid gap-5 sm:grid-cols-2">
            <label class="block text-sm text-slate-700">
                <span class="font-semibold">Customer</span>
                <select name="customer_id"
                    class="mt-2 block w-full rounded-xl border border-slate-200 bg-slate-50 px-4 py-3 text-sm text-slate-900 focus:border-sky-500 focus:bg-white focus:outline-none focus:ring-2 focus:ring-sky-100 transition-colors">
                    <option value="">Pilih customer (opsional)</option>
                    @foreach ($customers as $customer)
                        <option value="{{ $customer->id }}" {{ old('customer_id') == $customer->id ? 'selected' : '' }}>
                            {{ $customer->nama }} - {{ $customer->email }}
                        </option>
                    @endforeach
                </select>
                @error('customer_id')<p class="mt-1.5 text-xs text-red-500">{{ $message }}</p>@enderror
            </label>

            <label class="block text-sm text-slate-700">
                <span class="font-semibold">Nama Pelanggan</span>
                <input type="text" name="nama_pelanggan" value="{{ old('nama_pelanggan') }}"
                    placeholder="Nama lengkap pelanggan"
                    class="mt-2 block w-full rounded-xl border border-slate-200 bg-slate-50 px-4 py-3 text-sm text-slate-900 focus:border-sky-500 focus:bg-white focus:outline-none focus:ring-2 focus:ring-sky-100 transition-colors">
                @error('nama_pelanggan')<p class="mt-1.5 text-xs text-red-500">{{ $message }}</p>@enderror
            </label>
        </div>
    </div>

    {{-- ===================== DETAIL BOOKING ===================== --}}
    <div class="relative overflow-hidden rounded-2xl bg-white p-6 shadow-sm border border-slate-100">
        <div class="absolute top-0 right-0 w-24 h-24 rounded-bl-[3rem] bg-amber-50 opacity-60"></div>
        <div class="relative mb-6 flex items-center gap-3">
            <div class="flex h-10 w-10 flex-shrink-0 items-center justify-center rounded-xl bg-amber-100 text-amber-600">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                </svg>
            </div>
            <div>
                <h3 class="text-base font-bold text-slate-900">Detail Booking</h3>
                <p class="text-xs text-slate-400">Mobil, jadwal, dan status pemesanan</p>
            </div>
        </div>

        <div class="relative grid gap-5 sm:grid-cols-2 xl:grid-cols-3">
            <label class="block text-sm text-slate-700">
                <span class="font-semibold">Mobil</span>
                <select name="mobil_id"
                    class="mt-2 block w-full rounded-xl border border-slate-200 bg-slate-50 px-4 py-3 text-sm text-slate-900 focus:border-sky-500 focus:bg-white focus:outline-none focus:ring-2 focus:ring-sky-100 transition-colors">
                    @foreach ($mobils as $mobil)
                        <option value="{{ $mobil->id }}" {{ old('mobil_id') == $mobil->id ? 'selected' : '' }}>
                            {{ $mobil->nama_mobil }}
                        </option>
                    @endforeach
                </select>
                @error('mobil_id')<p class="mt-1.5 text-xs text-red-500">{{ $message }}</p>@enderror
            </label>

            <label class="block text-sm text-slate-700">
                <span class="font-semibold">Status</span>
                <select name="status"
                    class="mt-2 block w-full rounded-xl border border-slate-200 bg-slate-50 px-4 py-3 text-sm text-slate-900 focus:border-sky-500 focus:bg-white focus:outline-none focus:ring-2 focus:ring-sky-100 transition-colors">
                    <option value="menunggu konfirmasi" {{ old('status') == 'menunggu konfirmasi' ? 'selected' : '' }}>
                        Menunggu Konfirmasi</option>
                    <option value="terkonfirmasi" {{ old('status') == 'terkonfirmasi' ? 'selected' : '' }}>
                        Terkonfirmasi</option>
                    <option value="ditolak" {{ old('status') == 'ditolak' ? 'selected' : '' }}>Ditolak</option>
                </select>
            </label>

            <label class="block text-sm text-slate-700">
                <span class="font-semibold">Tanggal Booking</span>
                <input type="date" name="tanggal_booking" value="{{ old('tanggal_booking') }}"
                    class="mt-2 block w-full rounded-xl border border-slate-200 bg-slate-50 px-4 py-3 text-sm text-slate-900 focus:border-sky-500 focus:bg-white focus:outline-none focus:ring-2 focus:ring-sky-100 transition-colors">
                @error('tanggal_booking')<p class="mt-1.5 text-xs text-red-500">{{ $message }}</p>@enderror
            </label>

            <label class="block text-sm text-slate-700">
                <span class="font-semibold">Jam Booking</span>
                <input type="time" name="jam_booking" value="{{ old('jam_booking') }}"
                    class="mt-2 block w-full rounded-xl border border-slate-200 bg-slate-50 px-4 py-3 text-sm text-slate-900 focus:border-sky-500 focus:bg-white focus:outline-none focus:ring-2 focus:ring-sky-100 transition-colors">
            </label>

            <label class="block text-sm text-slate-700">
                <span class="font-semibold">Mulai Sewa</span>
                <input type="date" name="tanggal_mulai" value="{{ old('tanggal_mulai') }}"
                    class="mt-2 block w-full rounded-xl border border-slate-200 bg-slate-50 px-4 py-3 text-sm text-slate-900 focus:border-sky-500 focus:bg-white focus:outline-none focus:ring-2 focus:ring-sky-100 transition-colors">
            </label>

            <label class="block text-sm text-slate-700">
                <span class="font-semibold">Selesai Sewa</span>
                <input type="date" name="tanggal_selesai" value="{{ old('tanggal_selesai') }}"
                    class="mt-2 block w-full rounded-xl border border-slate-200 bg-slate-50 px-4 py-3 text-sm text-slate-900 focus:border-sky-500 focus:bg-white focus:outline-none focus:ring-2 focus:ring-sky-100 transition-colors">
            </label>
        </div>

        <label class="relative mt-5 block text-sm text-slate-700">
            <span class="font-semibold">Keterangan</span>
            <textarea name="keterangan" rows="4" placeholder="Catatan tambahan (opsional)"
                class="mt-2 block w-full rounded-xl border border-slate-200 bg-slate-50 px-4 py-3 text-sm text-slate-900 focus:border-sky-500 focus:bg-white focus:outline-none focus:ring-2 focus:ring-sky-100 transition-colors">{{ old('keterangan') }}</textarea>
        </label>
    </div>

    {{-- ===================== ACTIONS ===================== --}}
    <div class="flex flex-col-reverse gap-3 pt-2 sm:flex-row sm:items-center">
        <a href="{{ route('admin.booking.index') }}"
            class="inline-flex items-center justify-center gap-2 rounded-xl border border-slate-200 bg-white px-6 py-3 text-sm font-semibold text-slate-600 transition hover:bg-slate-50">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
            </svg>
            Batal
        </a>
        <button type="submit"
            class="inline-flex items-center justify-center gap-2 rounded-xl bg-violet-600 px-6 py-3 text-sm font-semibold text-white shadow-sm transition hover:bg-violet-700">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
            </svg>
            Simpan Booking
        </button>
    </div>
</form>

@endsection

@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        @if ($errors->any())
            Swal.fire({
                title: 'Data belum lengkap',
                html: `<ul style="text-align:left;margin-top:8px;">
                @foreach ($errors->all() as $error)
                    <li>• {{ $error }}</li>
                @endforeach
            </ul>`,
                icon: 'error',
                confirmButtonColor: '#7c3aed',
                customClass: { popup: 'rounded-2xl' }
            });
        @endif

        @if (session('success'))
            Swal.fire({
                title: 'Berhasil!',
                text: @json(session('success')),
                icon: 'success',
                confirmButtonColor: '#7c3aed',
                timer: 2500,
                timerProgressBar: true,
                customClass: { popup: 'rounded-2xl' }
            });
        @endif

        document.getElementById('bookingForm').addEventListener('submit', function(e) {
            const nama = document.querySelector('[name="nama_pelanggan"]').value.trim();
            const tglBooking = document.querySelector('[name="tanggal_booking"]').value;

            if (!nama || !tglBooking) {
                e.preventDefault();
                Swal.fire({
                    title: 'Lengkapi data',
                    text: 'Nama pelanggan dan tanggal booking wajib diisi.',
                    icon: 'warning',
                    confirmButtonColor: '#7c3aed',
                    customClass: { popup: 'rounded-2xl' }
                });
            }
        });
    });
</script>
@endpush
