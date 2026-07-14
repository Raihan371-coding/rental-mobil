@extends('layouts.customer')

@section('title', 'Profil Customer')

@section('content')

    {{-- ===================== PAGE HEADER ===================== --}}
    <div class="relative overflow-hidden rounded-2xl bg-gradient-to-br from-sky-600 to-blue-700 p-6 sm:p-8 shadow-lg">
        <div class="absolute -top-6 -right-6 w-32 h-32 rounded-full bg-white/10"></div>
        <div class="absolute -bottom-8 -left-6 w-28 h-28 rounded-full bg-white/5"></div>
        <div class="relative flex items-center gap-4">
            <div
                class="flex h-14 w-14 flex-shrink-0 items-center justify-center rounded-2xl bg-white/20 text-white backdrop-blur-sm">
                <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                </svg>
            </div>
            <div>
                <p class="text-xs font-semibold uppercase tracking-widest text-sky-200">Profil</p>
                <h1 class="mt-1 text-2xl sm:text-3xl font-extrabold text-white">
                    {{ $customer?->nama ?? auth()->user()->name }}</h1>
                <p class="mt-1 text-sm text-sky-100">Lengkapi atau perbarui informasi profil Anda agar dapat melakukan
                    booking kendaraan.</p>
            </div>
        </div>
    </div>

    <div class="mt-6 grid gap-6 lg:grid-cols-3">

        {{-- ===================== SIDEBAR: DATA & STATUS ===================== --}}
        <div class="space-y-6 lg:col-span-1">

            {{-- Data Profil Saat Ini --}}
            <div class="rounded-2xl bg-white shadow-sm border border-slate-100 p-6">
                <h2 class="text-base font-bold text-slate-900 mb-4">Data Profil Saat Ini</h2>
                <div class="space-y-4 text-sm">
                    <div class="pb-3 border-b border-slate-100">
                        <p class="text-xs font-semibold uppercase tracking-wider text-slate-400">Nama Lengkap</p>
                        <p class="mt-1 font-semibold text-slate-900">{{ $customer?->nama ?? auth()->user()->name }}</p>
                    </div>
                    <div class="pb-3 border-b border-slate-100">
                        <p class="text-xs font-semibold uppercase tracking-wider text-slate-400">Alamat</p>
                        <p class="mt-1 text-slate-700">{{ $customer?->alamat ?? 'Belum diset' }}</p>
                    </div>
                    <div class="pb-3 border-b border-slate-100">
                        <p class="text-xs font-semibold uppercase tracking-wider text-slate-400">Nomor Identitas (NIK/SIM)
                        </p>
                        <p class="mt-1 text-slate-700">{{ $customer?->no_identitas ?? 'Belum diset' }}</p>
                    </div>
                    <div class="pb-3 border-b border-slate-100">
                        <p class="text-xs font-semibold uppercase tracking-wider text-slate-400">Nomor Telepon</p>
                        <p class="mt-1 text-slate-700">{{ $customer?->no_telp ?? 'Belum diset' }}</p>
                    </div>
                    <div>
                        <p class="text-xs font-semibold uppercase tracking-wider text-slate-400">Email</p>
                        <p class="mt-1 text-slate-700">{{ $customer?->email ?? auth()->user()->email }}</p>
                    </div>
                </div>
            </div>

            {{-- Status Akun --}}
            <div class="rounded-2xl bg-white shadow-sm border border-slate-100 p-6">
                <h2 class="text-base font-bold text-slate-900 mb-4">Status Akun</h2>
                <div class="space-y-3 text-sm">
                    <div class="flex items-center justify-between">
                        <span class="text-slate-500">Peran</span>
                        <span
                            class="inline-flex items-center gap-1 rounded-full bg-sky-100 px-2.5 py-1 text-xs font-semibold text-sky-700">Customer</span>
                    </div>
                    <div class="flex items-center justify-between pt-3 border-t border-slate-100">
                        <span class="text-slate-500">Bergabung Sejak</span>
                        <span class="font-semibold text-slate-900">{{ auth()->user()->created_at->format('d M Y') }}</span>
                    </div>
                </div>
            </div>
        </div>

        {{-- ===================== FORM UPDATE PROFIL ===================== --}}
        <div class="rounded-2xl bg-white shadow-sm border border-slate-100 p-5 sm:p-8 lg:col-span-2">
            <h2 class="text-base font-bold text-slate-900">Perbarui Profil Anda</h2>
            <p class="mt-1 text-xs text-slate-500">Harap isi data dengan benar agar proses verifikasi rental Anda berjalan
                lancar.</p>

            <form action="{{ route('customer.profile.update') }}" method="POST" class="mt-6 space-y-5">
                @csrf

                <div>
                    <label class="block text-sm font-semibold text-slate-700 mb-1.5">Nama Lengkap <span
                            class="text-rose-500">*</span></label>
                    <input type="text" name="nama"
                        class="block w-full rounded-xl border border-slate-200 bg-slate-50 px-4 py-2.5 text-sm text-slate-900 focus:border-sky-500 focus:bg-white focus:outline-none focus:ring-2 focus:ring-sky-100 transition"
                        value="{{ old('nama', $customer?->nama ?? auth()->user()->name) }}" required>
                    @error('nama')
                        <p class="mt-1 text-xs text-red-500">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label class="block text-sm font-semibold text-slate-700 mb-1.5">Alamat Lengkap <span
                            class="text-rose-500">*</span></label>
                    <textarea name="alamat" rows="3"
                        class="block w-full rounded-xl border border-slate-200 bg-slate-50 px-4 py-2.5 text-sm text-slate-900 focus:border-sky-500 focus:bg-white focus:outline-none focus:ring-2 focus:ring-sky-100 transition"
                        required placeholder="Alamat domisili saat ini...">{{ old('alamat', $customer?->alamat ?? '') }}</textarea>
                    @error('alamat')
                        <p class="mt-1 text-xs text-red-500">{{ $message }}</p>
                    @enderror
                </div>

                <div class="grid gap-5 sm:grid-cols-2">
                    <div>
                        <label class="block text-sm font-semibold text-slate-700 mb-1.5">Nomor Identitas (NIK KTP / SIM)
                            <span class="text-rose-500">*</span></label>
                        <input type="text" name="no_identitas"
                            class="block w-full rounded-xl border border-slate-200 bg-slate-50 px-4 py-2.5 text-sm text-slate-900 focus:border-sky-500 focus:bg-white focus:outline-none focus:ring-2 focus:ring-sky-100 transition"
                            value="{{ old('no_identitas', $customer?->no_identitas ?? '') }}" required
                            placeholder="Contoh: 3273xxxxxxxxxxxx">
                        @error('no_identitas')
                            <p class="mt-1 text-xs text-red-500">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label class="block text-sm font-semibold text-slate-700 mb-1.5">Nomor Telepon (WhatsApp) <span
                                class="text-rose-500">*</span></label>
                        <input type="text" name="no_telp"
                            class="block w-full rounded-xl border border-slate-200 bg-slate-50 px-4 py-2.5 text-sm text-slate-900 focus:border-sky-500 focus:bg-white focus:outline-none focus:ring-2 focus:ring-sky-100 transition"
                            value="{{ old('no_telp', $customer?->no_telp ?? '') }}" required
                            placeholder="Contoh: 0812xxxxxxxx">
                        @error('no_telp')
                            <p class="mt-1 text-xs text-red-500">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <div>
                    <label class="block text-sm font-semibold text-slate-700 mb-1.5">Alamat Email (opsional)</label>
                    <input type="email" name="email"
                        class="block w-full rounded-xl border border-slate-200 bg-slate-50 px-4 py-2.5 text-sm text-slate-900 focus:border-sky-500 focus:bg-white focus:outline-none focus:ring-2 focus:ring-sky-100 transition"
                        value="{{ old('email', $customer?->email ?? auth()->user()->email) }}">
                    @error('email')
                        <p class="mt-1 text-xs text-red-500">{{ $message }}</p>
                    @enderror
                </div>

                <div class="flex justify-end pt-2 border-t border-slate-100">
                    <button type="submit"
                        class="inline-flex items-center justify-center gap-2 rounded-xl bg-sky-600 px-6 py-2.5 text-sm font-semibold text-white hover:bg-sky-700 transition-colors shadow-sm">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                        </svg>
                        Simpan Perubahan
                    </button>
                </div>
            </form>
        </div>
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
