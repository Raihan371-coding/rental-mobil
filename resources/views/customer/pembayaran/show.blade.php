@extends('layouts.customer')

@section('title', 'Detail Pembayaran')

@section('content')

    {{-- ===================== PAGE HEADER ===================== --}}
    <div class="mb-6">
        <div class="flex flex-col gap-4 sm:flex-row sm:items-center sm:justify-between">
            <div>
                <h1 class="text-2xl font-bold text-slate-900">Detail Pembayaran</h1>
                <p class="mt-1 text-sm text-slate-500">Kode <span
                        class="font-semibold text-slate-700">{{ $pembayaran->kode_pembayaran }}</span></p>
            </div>
            <a href="{{ route('customer.pembayaran.index') }}"
                class="inline-flex items-center justify-center gap-2 rounded-xl border border-slate-200 bg-white px-4 py-2.5 text-sm font-semibold text-slate-700 hover:bg-slate-50 transition-colors w-full sm:w-auto">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                </svg>
                Kembali
            </a>
        </div>
    </div>

    <div class="space-y-6">

        {{-- ===================== INFO TAGIHAN + QRIS ===================== --}}
        <div class="rounded-2xl bg-white shadow-sm border border-slate-100 p-5 sm:p-8">
            <div class="grid gap-8 lg:grid-cols-2">

                {{-- Informasi Tagihan --}}
                <div>
                    <h3 class="text-base font-bold text-slate-900 mb-4">Informasi Tagihan</h3>
                    <dl class="space-y-3 text-sm">
                        <div class="flex items-center justify-between border-b border-slate-100 pb-3">
                            <dt class="text-slate-500">Kode Pembayaran</dt>
                            <dd class="font-mono font-medium text-slate-800">{{ $pembayaran->kode_pembayaran }}</dd>
                        </div>
                        <div class="flex items-center justify-between border-b border-slate-100 pb-3">
                            <dt class="text-slate-500">Rental</dt>
                            <dd class="font-medium text-slate-800">{{ $pembayaran->rental->kode_rental }}</dd>
                        </div>
                        <div class="flex items-center justify-between border-b border-slate-100 pb-3">
                            <dt class="text-slate-500">Jumlah</dt>
                            <dd class="text-lg font-extrabold text-slate-900">Rp
                                {{ number_format($pembayaran->jumlah_bayar, 0, ',', '.') }}</dd>
                        </div>
                        <div class="flex items-center justify-between">
                            <dt class="text-slate-500">Status</dt>
                            <dd>
                                @if ($pembayaran->status_bayar == 'belum_bayar')
                                    <span
                                        class="inline-flex items-center gap-1 rounded-full bg-red-100 px-2.5 py-1 text-xs font-semibold text-red-700">
                                        <span class="w-1.5 h-1.5 rounded-full bg-red-500"></span> Belum Bayar
                                    </span>
                                @elseif($pembayaran->status_bayar == 'menunggu_verifikasi')
                                    <span
                                        class="inline-flex items-center gap-1 rounded-full bg-amber-100 px-2.5 py-1 text-xs font-semibold text-amber-700">
                                        <span class="w-1.5 h-1.5 rounded-full bg-amber-500 animate-pulse"></span> Menunggu
                                        Verifikasi
                                    </span>
                                @elseif($pembayaran->status_bayar == 'lunas')
                                    <span
                                        class="inline-flex items-center gap-1 rounded-full bg-emerald-100 px-2.5 py-1 text-xs font-semibold text-emerald-700">
                                        <span class="w-1.5 h-1.5 rounded-full bg-emerald-500"></span> Lunas
                                    </span>
                                @elseif($pembayaran->status_bayar == 'ditolak')
                                    <span
                                        class="inline-flex items-center gap-1 rounded-full bg-red-100 px-2.5 py-1 text-xs font-semibold text-red-700">
                                        <span class="w-1.5 h-1.5 rounded-full bg-red-500"></span> Pembayaran Ditolak
                                    </span>
                                @endif
                            </dd>
                        </div>
                    </dl>
                </div>

                {{-- QRIS --}}
                <div>
                    <h3 class="text-base font-bold text-slate-900 mb-4">Pembayaran QRIS</h3>
                    <div class="rounded-xl border border-slate-200 bg-slate-50 p-4 flex flex-col items-center">
                        <img src="https://api.qrserver.com/v1/create-qr-code/?size=220x220&data=PEMBAYARAN-{{ $pembayaran->kode_pembayaran }}"
                            class="rounded-lg border border-slate-200 bg-white" alt="QRIS">
                        <p class="mt-3 text-xs text-slate-500 text-center">Scan QR menggunakan aplikasi pembayaran
                            (m-banking / e-wallet).</p>
                    </div>
                </div>

            </div>
        </div>

        {{-- ===================== TRANSFER BANK ===================== --}}
        <div class="rounded-2xl bg-white shadow-sm border border-slate-100 p-5 sm:p-8">
            <h3 class="text-base font-bold text-slate-900 mb-4">Transfer Bank</h3>
            <div class="flex items-center gap-4 rounded-xl bg-slate-50 border border-slate-100 p-4">
                <div class="flex h-11 w-11 flex-shrink-0 items-center justify-center rounded-xl bg-blue-100 text-blue-600">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M3 21h18M4 18h16M6 18v-7m4 7v-7m4 7v-7m4 7v-7M4 11h16l-8-6-8 6z" />
                    </svg>
                </div>
                <div>
                    <p class="text-sm font-bold text-slate-900">Bank BCA</p>
                    <p class="text-sm font-mono text-slate-700 mt-0.5">1234567890</p>
                    <p class="text-xs text-slate-500 mt-0.5">a.n Rental Mobil Jaya</p>
                </div>
            </div>
        </div>

        {{-- ===================== ACTION AREA ===================== --}}
        @if ($pembayaran->status_bayar == 'belum_bayar')
            <div class="rounded-2xl bg-white shadow-sm border border-slate-100 p-5 sm:p-8">
                <h3 class="text-base font-bold text-slate-900 mb-4">Upload Bukti Pembayaran</h3>
                <form action="{{ route('customer.pembayaran.upload', $pembayaran->id) }}" method="POST"
                    enctype="multipart/form-data">
                    @csrf
                    <input type="file" name="bukti_pembayaran" accept="image/*,application/pdf"
                        class="block w-full rounded-xl border border-slate-200 bg-slate-50 px-4 py-2.5 text-sm text-slate-900 focus:border-sky-500 focus:bg-white focus:outline-none focus:ring-2 focus:ring-sky-100 transition file:mr-3 file:rounded-lg file:border-0 file:bg-sky-600 file:px-3 file:py-1 file:text-xs file:font-semibold file:text-white hover:file:bg-sky-700">
                    @error('bukti_pembayaran')
                        <p class="mt-1 text-xs text-red-500">{{ $message }}</p>
                    @enderror

                    <button type="submit"
                        class="mt-5 inline-flex items-center justify-center gap-2 rounded-xl bg-sky-600 px-6 py-2.5 text-sm font-semibold text-white hover:bg-sky-700 transition-colors shadow-sm">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M12 12v9m0-9l-3 3m3-3l3 3" />
                        </svg>
                        Upload Bukti
                    </button>
                </form>
            </div>
        @elseif($pembayaran->status_bayar == 'menunggu_verifikasi')
            <div class="rounded-2xl bg-white shadow-sm border border-slate-100 p-8 text-center">
                <div class="w-14 h-14 rounded-2xl bg-amber-100 flex items-center justify-center mx-auto">
                    <svg class="w-7 h-7 text-amber-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                </div>
                <h3 class="mt-4 text-base font-bold text-slate-900">Bukti Pembayaran Berhasil Dikirim</h3>
                <p class="mt-1 text-sm text-slate-500">Menunggu verifikasi dari admin. Proses ini biasanya memakan waktu
                    singkat.</p>
            </div>
        @elseif($pembayaran->status_bayar == 'lunas')
            <div class="rounded-2xl bg-white shadow-sm border border-slate-100 p-8 text-center">
                <div class="w-14 h-14 rounded-2xl bg-emerald-100 flex items-center justify-center mx-auto">
                    <svg class="w-7 h-7 text-emerald-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                    </svg>
                </div>
                <h3 class="mt-4 text-base font-bold text-emerald-700">Pembayaran Berhasil Diverifikasi</h3>
                <p class="mt-1 text-sm text-slate-500">Terima kasih, pembayaran Anda sudah lunas.</p>
            </div>
        @elseif($pembayaran->status_bayar == 'ditolak')
            <div class="rounded-2xl bg-white shadow-sm border border-slate-100 p-5 sm:p-8">
                <div class="flex gap-3 rounded-xl border border-red-200 bg-red-50 p-4 mb-5">
                    <svg class="w-5 h-5 flex-shrink-0 text-red-500" fill="none" stroke="currentColor"
                        viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M12 9v3.75m-9.303 3.376c-.866 1.5.217 3.374 1.948 3.374h14.71c1.73 0 2.813-1.874 1.948-3.374L13.949 3.378c-.866-1.5-3.032-1.5-3.898 0L2.697 16.126zM12 15.75h.007v.008H12v-.008z" />
                    </svg>
                    <p class="text-sm text-red-700">Bukti pembayaran ditolak. Silakan upload ulang bukti pembayaran yang
                        benar.</p>
                </div>

                <h3 class="text-base font-bold text-slate-900 mb-4">Upload Ulang Bukti Pembayaran</h3>
                <form action="{{ route('customer.pembayaran.upload', $pembayaran->id) }}" method="POST"
                    enctype="multipart/form-data">
                    @csrf
                    <input type="file" name="bukti_pembayaran" accept="image/*,application/pdf"
                        class="block w-full rounded-xl border border-slate-200 bg-slate-50 px-4 py-2.5 text-sm text-slate-900 focus:border-red-500 focus:bg-white focus:outline-none focus:ring-2 focus:ring-red-100 transition file:mr-3 file:rounded-lg file:border-0 file:bg-red-600 file:px-3 file:py-1 file:text-xs file:font-semibold file:text-white hover:file:bg-red-700">
                    @error('bukti_pembayaran')
                        <p class="mt-1 text-xs text-red-500">{{ $message }}</p>
                    @enderror

                    <button type="submit"
                        class="mt-5 inline-flex items-center justify-center gap-2 rounded-xl bg-red-600 px-6 py-2.5 text-sm font-semibold text-white hover:bg-red-700 transition-colors shadow-sm">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M12 12v9m0-9l-3 3m3-3l3 3" />
                        </svg>
                        Upload Ulang Bukti
                    </button>
                </form>
            </div>
        @endif

    </div>

@endsection

@push('scripts')
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            if (typeof Swal === 'undefined') return;

            @if (session('success'))
                Swal.fire({
                    title: 'Berhasil!',
                    text: @json(session('success')),
                    icon: 'success',
                    confirmButtonColor: '#0284c7',
                    timer: 2500,
                    timerProgressBar: true
                });
            @endif

            @if ($errors->any())
                Swal.fire({
                    title: 'Gagal!',
                    html: `<ul style="text-align:left; margin-top:8px; padding-left:18px;">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>`,
                    icon: 'error',
                    confirmButtonColor: '#0284c7'
                });
            @endif
        });
    </script>
@endpush
