@extends('layouts.customer')

@section('title', 'Buat Booking Baru')

@section('content')

    {{-- ===================== PAGE HEADER ===================== --}}
    <div class="mb-6">
        <div class="flex flex-col gap-4 sm:flex-row sm:items-center sm:justify-between">
            <div>
                <h1 class="text-2xl font-bold text-slate-900">Buat Booking Baru</h1>
                <p class="mt-1 text-sm text-slate-500">Lengkapi form di bawah ini untuk memesan mobil. Booking akan menunggu
                    konfirmasi dari admin.</p>
            </div>
            <a href="{{ route('customer.booking.index') }}"
                class="inline-flex items-center justify-center gap-2 rounded-xl border border-slate-200 bg-white px-4 py-2.5 text-sm font-semibold text-slate-700 hover:bg-slate-50 transition-colors w-full sm:w-auto">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                </svg>
                Kembali
            </a>
        </div>
    </div>

    <div class="rounded-2xl bg-white shadow-sm border border-slate-100 p-5 sm:p-8">
        <form action="{{ route('customer.booking.store') }}" method="POST" class="space-y-6">
            @csrf

            <div class="grid gap-5 lg:grid-cols-2">
                {{-- Mobil Selection --}}
                <div class="lg:col-span-2">
                    <label class="block text-sm font-semibold text-slate-700 mb-1.5">Pilih Mobil <span
                            class="text-rose-500">*</span></label>
                    <select name="mobil_id"
                        class="block w-full rounded-xl border border-slate-200 bg-slate-50 px-4 py-2.5 text-sm text-slate-900 focus:border-sky-500 focus:bg-white focus:outline-none focus:ring-2 focus:ring-sky-100 transition">
                        <option value="">-- Pilih Mobil --</option>
                        @foreach ($mobils as $mobil)
                            <option value="{{ $mobil->id }}"
                                {{ old('mobil_id', $selectedMobilId ?? '') == $mobil->id ? 'selected' : '' }}>
                                {{ $mobil->nama_mobil }} — {{ $mobil->merk }} ({{ $mobil->plat_nomor }}) — Rp
                                {{ number_format($mobil->harga_sewa, 0, ',', '.') }}/hari
                            </option>
                        @endforeach
                    </select>
                    @error('mobil_id')
                        <p class="mt-1 text-xs text-red-500">{{ $message }}</p>
                    @enderror
                </div>

                {{-- Tanggal Booking --}}
                <div>
                    <label class="block text-sm font-semibold text-slate-700 mb-1.5">Tanggal Booking <span
                            class="text-rose-500">*</span></label>
                    <input type="date" name="tanggal_booking"
                        class="block w-full rounded-xl border border-slate-200 bg-slate-50 px-4 py-2.5 text-sm text-slate-900 focus:border-sky-500 focus:bg-white focus:outline-none focus:ring-2 focus:ring-sky-100 transition"
                        value="{{ old('tanggal_booking', date('Y-m-d')) }}" min="{{ date('Y-m-d') }}">
                    @error('tanggal_booking')
                        <p class="mt-1 text-xs text-red-500">{{ $message }}</p>
                    @enderror
                </div>

                {{-- Jam Booking --}}
                <div>
                    <label class="block text-sm font-semibold text-slate-700 mb-1.5">Jam Booking <span
                            class="text-rose-500">*</span></label>
                    <input type="time" name="jam_booking"
                        class="block w-full rounded-xl border border-slate-200 bg-slate-50 px-4 py-2.5 text-sm text-slate-900 focus:border-sky-500 focus:bg-white focus:outline-none focus:ring-2 focus:ring-sky-100 transition"
                        value="{{ old('jam_booking') }}">
                    @error('jam_booking')
                        <p class="mt-1 text-xs text-red-500">{{ $message }}</p>
                    @enderror
                </div>

                {{-- Tanggal Mulai Sewa --}}
                <div>
                    <label class="block text-sm font-semibold text-slate-700 mb-1.5">Tanggal Mulai Sewa <span
                            class="text-rose-500">*</span></label>
                    <input type="date" name="tanggal_mulai"
                        class="block w-full rounded-xl border border-slate-200 bg-slate-50 px-4 py-2.5 text-sm text-slate-900 focus:border-sky-500 focus:bg-white focus:outline-none focus:ring-2 focus:ring-sky-100 transition"
                        value="{{ old('tanggal_mulai') }}" min="{{ date('Y-m-d') }}">
                    @error('tanggal_mulai')
                        <p class="mt-1 text-xs text-red-500">{{ $message }}</p>
                    @enderror
                </div>

                {{-- Tanggal Selesai Sewa --}}
                <div>
                    <label class="block text-sm font-semibold text-slate-700 mb-1.5">Tanggal Selesai Sewa <span
                            class="text-rose-500">*</span></label>
                    <input type="date" name="tanggal_selesai"
                        class="block w-full rounded-xl border border-slate-200 bg-slate-50 px-4 py-2.5 text-sm text-slate-900 focus:border-sky-500 focus:bg-white focus:outline-none focus:ring-2 focus:ring-sky-100 transition"
                        value="{{ old('tanggal_selesai') }}" min="{{ date('Y-m-d') }}">
                    @error('tanggal_selesai')
                        <p class="mt-1 text-xs text-red-500">{{ $message }}</p>
                    @enderror
                </div>
            </div>

            {{-- Promo --}}
            <div>
                <label class="block text-sm font-semibold text-slate-700 mb-1.5">Promo (opsional)</label>
                <select name="promo_id"
                    class="block w-full rounded-xl border border-slate-200 bg-slate-50 px-4 py-2.5 text-sm text-slate-900 focus:border-sky-500 focus:bg-white focus:outline-none focus:ring-2 focus:ring-sky-100 transition">
                    <option value="">Tanpa Promo</option>
                    @foreach ($promos as $promo)
                        <option value="{{ $promo->id }}" {{ old('promo_id') == $promo->id ? 'selected' : '' }}>
                            {{ $promo->nama_promo }} -
                            @if ($promo->jenis === 'persentase')
                                Potongan {{ rtrim(rtrim(number_format($promo->potongan, 2, ',', '.'), '0'), ',') }}%
                            @else
                                Potongan Rp {{ number_format($promo->potongan, 0, ',', '.') }}
                            @endif
                        </option>
                    @endforeach
                </select>
                @error('promo_id')
                    <p class="mt-1 text-xs text-red-500">{{ $message }}</p>
                @enderror
            </div>

            {{-- Keterangan --}}
            <div>
                <label class="block text-sm font-semibold text-slate-700 mb-1.5">Keterangan (opsional)</label>
                <textarea name="keterangan" rows="3"
                    class="block w-full rounded-xl border border-slate-200 bg-slate-50 px-4 py-2.5 text-sm text-slate-900 focus:border-sky-500 focus:bg-white focus:outline-none focus:ring-2 focus:ring-sky-100 transition"
                    placeholder="Catatan tambahan untuk booking ini...">{{ old('keterangan') }}</textarea>
                @error('keterangan')
                    <p class="mt-1 text-xs text-red-500">{{ $message }}</p>
                @enderror
            </div>

            {{-- Info Box --}}
            <div class="flex gap-3 rounded-xl border border-sky-200 bg-sky-50 p-4">
                <svg class="w-5 h-5 flex-shrink-0 text-sky-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                </svg>
                <div class="text-sm text-sky-800">
                    <p class="font-semibold">Informasi</p>
                    <p class="mt-1">Booking akan berstatus <strong>"Menunggu Konfirmasi"</strong> hingga admin menyetujui
                        atau menolak permintaan Anda.</p>
                </div>
            </div>

            <div
                class="flex flex-col-reverse gap-3 pt-4 border-t border-slate-100 sm:flex-row sm:items-center sm:justify-end">
                <a href="{{ route('customer.booking.index') }}"
                    class="inline-flex items-center justify-center gap-2 rounded-xl border border-slate-200 bg-white px-5 py-2.5 text-sm font-semibold text-slate-700 hover:bg-slate-50 transition-colors">
                    Batal
                </a>
                <button type="submit"
                    class="inline-flex items-center justify-center gap-2 rounded-xl bg-sky-600 px-6 py-2.5 text-sm font-semibold text-white hover:bg-sky-700 transition-colors shadow-sm">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                    </svg>
                    Kirim Booking
                </button>
            </div>
        </form>
    </div>

@endsection

@push('scripts')
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            if (typeof Swal === 'undefined') return;

            @if (session('error'))
                Swal.fire({
                    title: 'Gagal!',
                    text: @json(session('error')),
                    icon: 'error',
                    confirmButtonColor: '#0284c7'
                });
            @endif

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
