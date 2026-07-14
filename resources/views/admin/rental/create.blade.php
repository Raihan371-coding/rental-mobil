@extends('layouts.admin')

@section('title', 'Tambah Rental')

@section('content')

    {{-- ===================== PAGE HEADER ===================== --}}
    <div class="mb-6">
        <div class="flex items-center gap-2 text-sm text-slate-500 mb-3">
            <a href="{{ route('admin.rental.index') }}" class="hover:text-slate-700 transition">Data Rental</a>
            <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
            </svg>
            <span class="text-slate-900 font-medium">Tambah Rental</span>
        </div>
        <div class="flex flex-col gap-4 sm:flex-row sm:items-center sm:justify-between">
            <div>
                <h1 class="text-2xl font-bold text-slate-900">Tambah Rental</h1>
                <p class="mt-1 text-sm text-slate-500">Tambahkan data rental baru.</p>
            </div>
            <a href="{{ route('admin.rental.index') }}"
                class="inline-flex items-center justify-center gap-2 rounded-xl border border-slate-200 bg-white px-4 py-2.5 text-sm font-semibold text-slate-700 shadow-sm hover:bg-slate-50 transition-colors w-full sm:w-auto">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                </svg>
                Kembali
            </a>
        </div>
    </div>

    @include('admin.partials.alert')

    <div class="rounded-2xl bg-white shadow-sm border border-slate-100 overflow-hidden">
        <div class="border-b border-slate-100 px-6 py-4">
            <div class="flex items-center gap-3">
                <div
                    class="flex h-10 w-10 flex-shrink-0 items-center justify-center rounded-xl bg-amber-100 text-amber-600">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                    </svg>
                </div>
                <div>
                    <h3 class="text-base font-bold text-slate-900">Form Rental</h3>
                    <p class="text-xs text-slate-400">Lengkapi data kontrak rental di bawah ini</p>
                </div>
            </div>
        </div>

        <form action="{{ route('admin.rental.store') }}" method="POST" class="p-6 space-y-6" id="rentalForm">
            @csrf
            <div class="grid gap-6 sm:grid-cols-2">
                <div>
                    <label for="id_customer" class="block text-sm font-semibold text-slate-700">Customer <span
                            class="text-red-500">*</span></label>
                    <select id="id_customer" name="id_customer"
                        class="mt-2 block w-full rounded-xl border border-slate-200 px-3.5 py-2.5 text-sm shadow-sm focus:border-amber-500 focus:outline-none focus:ring-1 focus:ring-amber-500 transition-colors @error('id_customer') border-red-400 @enderror">
                        <option value="">Pilih customer</option>
                        @foreach ($customers as $customer)
                            <option value="{{ $customer->id }}" {{ old('id_customer') == $customer->id ? 'selected' : '' }}>
                                {{ $customer->kode_customer }} - {{ $customer->nama }}
                            </option>
                        @endforeach
                    </select>
                    @error('id_customer')
                        <p class="mt-1.5 text-xs text-red-500">{{ $message }}</p>
                    @enderror
                </div>
                <div>
                    <label for="id_mobil" class="block text-sm font-semibold text-slate-700">Mobil <span
                            class="text-red-500">*</span></label>
                    <select id="id_mobil" name="id_mobil"
                        class="mt-2 block w-full rounded-xl border border-slate-200 px-3.5 py-2.5 text-sm shadow-sm focus:border-amber-500 focus:outline-none focus:ring-1 focus:ring-amber-500 transition-colors @error('id_mobil') border-red-400 @enderror">
                        <option value="">Pilih mobil</option>
                        @foreach ($mobils as $mobil)
                            <option value="{{ $mobil->id }}" {{ old('id_mobil') == $mobil->id ? 'selected' : '' }}>
                                {{ $mobil->kode_mobil }} - {{ $mobil->nama_mobil }}
                            </option>
                        @endforeach
                    </select>
                    @error('id_mobil')
                        <p class="mt-1.5 text-xs text-red-500">{{ $message }}</p>
                    @enderror
                </div>
                <div class="sm:col-span-2">
                    <label for="booking_id" class="block text-sm font-semibold text-slate-700">Booking</label>
                    <select id="booking_id" name="booking_id"
                        class="mt-2 block w-full rounded-xl border border-slate-200 px-3.5 py-2.5 text-sm shadow-sm focus:border-amber-500 focus:outline-none focus:ring-1 focus:ring-amber-500 transition-colors">
                        <option value="">Tidak terhubung ke booking</option>
                        @foreach ($bookings as $booking)
                            <option value="{{ $booking->id }}" {{ old('booking_id') == $booking->id ? 'selected' : '' }}>
                                {{ $booking->kode_booking }} - {{ $booking->customer->nama }} -
                                {{ $booking->mobil->nama_mobil }} ·
                                {{ \Carbon\Carbon::parse($booking->tanggal_booking)->format('d/m/Y') }}
                            </option>
                        @endforeach
                    </select>
                </div>
                <div>
                    <label for="tanggal_rental" class="block text-sm font-semibold text-slate-700">Tanggal Rental <span
                            class="text-red-500">*</span></label>
                    <input type="date" id="tanggal_rental" name="tanggal_rental" value="{{ old('tanggal_rental') }}"
                        class="mt-2 block w-full rounded-xl border border-slate-200 px-3.5 py-2.5 text-sm shadow-sm focus:border-amber-500 focus:outline-none focus:ring-1 focus:ring-amber-500 transition-colors @error('tanggal_rental') border-red-400 @enderror">
                    @error('tanggal_rental')
                        <p class="mt-1.5 text-xs text-red-500">{{ $message }}</p>
                    @enderror
                </div>
                <div>
                    <label for="tanggal_kembali" class="block text-sm font-semibold text-slate-700">Tanggal Kembali</label>
                    <input type="date" id="tanggal_kembali" name="tanggal_kembali" value="{{ old('tanggal_kembali') }}"
                        class="mt-2 block w-full rounded-xl border border-slate-200 px-3.5 py-2.5 text-sm shadow-sm focus:border-amber-500 focus:outline-none focus:ring-1 focus:ring-amber-500 transition-colors @error('tanggal_kembali') border-red-400 @enderror">
                    @error('tanggal_kembali')
                        <p class="mt-1.5 text-xs text-red-500">{{ $message }}</p>
                    @enderror
                </div>
                <div>
                    <label for="total_harga" class="block text-sm font-semibold text-slate-700">Total Harga <span
                            class="text-red-500">*</span></label>
                    <div class="relative mt-2">
                        <span
                            class="absolute left-3.5 top-1/2 -translate-y-1/2 text-sm font-medium text-slate-500">Rp</span>
                        <input type="number" step="0.01" id="total_harga" name="total_harga"
                            value="{{ old('total_harga') }}" placeholder="0"
                            class="block w-full rounded-xl border border-slate-200 pl-10 pr-3.5 py-2.5 text-sm shadow-sm focus:border-amber-500 focus:outline-none focus:ring-1 focus:ring-amber-500 transition-colors @error('total_harga') border-red-400 @enderror">
                    </div>
                    @error('total_harga')
                        <p class="mt-1.5 text-xs text-red-500">{{ $message }}</p>
                    @enderror
                </div>
                <div class="sm:col-span-2">
                    <label for="status" class="block text-sm font-semibold text-slate-700">Status</label>
                    <select id="status" name="status"
                        class="mt-2 block w-full rounded-xl border border-slate-200 px-3.5 py-2.5 text-sm shadow-sm focus:border-amber-500 focus:outline-none focus:ring-1 focus:ring-amber-500 transition-colors">
                        <option value="rental" {{ old('status') == 'rental' ? 'selected' : '' }}>Rental</option>
                        <option value="kembali" {{ old('status') == 'kembali' ? 'selected' : '' }}>Kembali</option>
                    </select>
                </div>
            </div>

            <div class="flex flex-col-reverse gap-3 border-t border-slate-100 pt-6 sm:flex-row sm:justify-start">
                <a href="{{ route('admin.rental.index') }}"
                    class="inline-flex items-center justify-center gap-2 rounded-xl border border-slate-200 bg-white px-5 py-2.5 text-center text-sm font-semibold text-slate-700 transition hover:bg-slate-50">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                    </svg>
                    Batal
                </a>
                <button type="submit"
                    class="inline-flex items-center justify-center gap-2 rounded-xl bg-violet-600 px-5 py-2.5 text-sm font-semibold text-white transition hover:bg-violet-700">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                    </svg>
                    Simpan Rental
                </button>
            </div>
        </form>
    </div>

@endsection

@push('scripts')
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        document.getElementById('rentalForm').addEventListener('submit', function(e) {
            const btn = this.querySelector('button[type="submit"]');
            if (btn.dataset.submitted === 'true') {
                e.preventDefault();
                return;
            }
            btn.dataset.submitted = 'true';
            btn.disabled = true;
            btn.innerHTML = `<svg class="animate-spin w-4 h-4" fill="none" viewBox="0 0 24 24">
        <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
        <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4z"></path>
    </svg> Menyimpan...`;
        });
        document.addEventListener('DOMContentLoaded', function() {
            @if (session('success'))
                Swal.fire({
                    title: 'Berhasil!',
                    text: @json(session('success')),
                    icon: 'success',
                    confirmButtonColor: '#7c3aed',
                    timer: 2500,
                    timerProgressBar: true,
                    customClass: {
                        popup: 'rounded-2xl'
                    }
                });
            @endif

            @if (session('error'))
                Swal.fire({
                    title: 'Gagal!',
                    text: @json(session('error')),
                    icon: 'error',
                    confirmButtonColor: '#7c3aed',
                    customClass: {
                        popup: 'rounded-2xl'
                    }
                });
            @endif

            @if ($errors->any())
                Swal.fire({
                    title: 'Periksa Kembali Form',
                    html: `<ul class="text-left text-sm list-disc pl-5">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>`,
                    icon: 'warning',
                    confirmButtonColor: '#7c3aed',
                    customClass: {
                        popup: 'rounded-2xl'
                    }
                });
            @endif
        });
    </script>
@endpush
