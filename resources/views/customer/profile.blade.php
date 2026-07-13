@extends('layouts.customer')

@section('title', 'Profil Customer')

@section('content')
    <div class="space-y-6">
        {{-- Header --}}
        <div class="rounded-lg bg-white p-6 shadow-sm">
            <h1 class="text-2xl font-semibold text-slate-900">Profil Saya</h1>
            <p class="mt-2 text-sm text-slate-500">Lengkapi atau perbarui informasi profil Anda di bawah ini agar dapat melakukan booking kendaraan.</p>
        </div>

        {{-- Alerts --}}
        @if(session('success'))
            <div class="rounded-lg border border-emerald-200 bg-emerald-50 px-5 py-4 text-sm text-emerald-900">
                {{ session('success') }}
            </div>
        @endif

        @if(session('error'))
            <div class="rounded-lg border border-rose-200 bg-rose-50 px-5 py-4 text-sm text-rose-900">
                {{ session('error') }}
            </div>
        @endif

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

        <div class="grid gap-6 lg:grid-cols-3">
            {{-- Data Diri / Status Akun --}}
            <div class="space-y-6 lg:col-span-1">
                <div class="rounded-2xl border border-slate-200 bg-white p-6 shadow-sm">
                    <h2 class="text-lg font-semibold text-slate-900">Data Profil Saat Ini</h2>
                    <div class="mt-4 space-y-4 text-sm text-slate-700">
                        <div>
                            <p class="text-xs font-medium text-slate-400 uppercase tracking-wider">Nama Lengkap</p>
                            <p class="mt-1 font-semibold text-slate-900">{{ $customer?->nama ?? auth()->user()->name }}</p>
                        </div>
                        <div>
                            <p class="text-xs font-medium text-slate-400 uppercase tracking-wider">Alamat</p>
                            <p class="mt-1 text-slate-900">{{ $customer?->alamat ?? 'Belum diset' }}</p>
                        </div>
                        <div>
                            <p class="text-xs font-medium text-slate-400 uppercase tracking-wider">Nomor Identitas (NIK/SIM)</p>
                            <p class="mt-1 text-slate-900">{{ $customer?->no_identitas ?? 'Belum diset' }}</p>
                        </div>
                        <div>
                            <p class="text-xs font-medium text-slate-400 uppercase tracking-wider">Nomor Telepon</p>
                            <p class="mt-1 text-slate-900">{{ $customer?->no_telp ?? 'Belum diset' }}</p>
                        </div>
                        <div>
                            <p class="text-xs font-medium text-slate-400 uppercase tracking-wider">Email</p>
                            <p class="mt-1 text-slate-900">{{ $customer?->email ?? auth()->user()->email }}</p>
                        </div>
                    </div>
                </div>

                <div class="rounded-2xl border border-slate-200 bg-white p-6 shadow-sm">
                    <h2 class="text-lg font-semibold text-slate-900">Status Akun</h2>
                    <div class="mt-4 space-y-3 text-sm text-slate-700">
                        <div>
                            <p class="text-slate-500">Peran</p>
                            <p class="font-semibold text-slate-900">Customer</p>
                        </div>
                        <div>
                            <p class="text-slate-500">Tanggal Bergabung</p>
                            <p class="font-semibold text-slate-900">{{ auth()->user()->created_at->format('d M Y') }}</p>
                        </div>
                    </div>
                </div>
            </div>

            {{-- Form Lengkapi / Perbarui Profil --}}
            <div class="rounded-2xl border border-slate-200 bg-white p-6 shadow-sm lg:col-span-2">
                <h2 class="text-lg font-semibold text-slate-900">Perbarui Profil Anda</h2>
                <p class="mt-1 text-xs text-slate-500">Harap isi data dengan benar agar proses verifikasi rental Anda berjalan lancar.</p>

                <form action="{{ route('customer.profile.update') }}" method="POST" class="mt-6 space-y-6">
                    @csrf

                    <div>
                        <label class="mb-2 block text-sm font-medium text-slate-700">Nama Lengkap <span class="text-rose-500">*</span></label>
                        <input type="text" name="nama"
                            class="w-full rounded-lg border border-slate-300 px-4 py-2.5 text-sm text-slate-900 shadow-sm focus:border-slate-700 focus:outline-none focus:ring-1 focus:ring-slate-700"
                            value="{{ old('nama', $customer?->nama ?? auth()->user()->name) }}" required>
                    </div>

                    <div>
                        <label class="mb-2 block text-sm font-medium text-slate-700">Alamat Lengkap <span class="text-rose-500">*</span></label>
                        <textarea name="alamat" rows="3"
                            class="w-full rounded-lg border border-slate-300 px-4 py-2.5 text-sm text-slate-900 shadow-sm focus:border-slate-700 focus:outline-none focus:ring-1 focus:ring-slate-700"
                            required placeholder="Alamat domisili saat ini...">{{ old('alamat', $customer?->alamat ?? '') }}</textarea>
                    </div>

                    <div class="grid gap-6 sm:grid-cols-2">
                        <div>
                            <label class="mb-2 block text-sm font-medium text-slate-700">Nomor Identitas (NIK KTP / SIM) <span class="text-rose-500">*</span></label>
                            <input type="text" name="no_identitas"
                                class="w-full rounded-lg border border-slate-300 px-4 py-2.5 text-sm text-slate-900 shadow-sm focus:border-slate-700 focus:outline-none focus:ring-1 focus:ring-slate-700"
                                value="{{ old('no_identitas', $customer?->no_identitas ?? '') }}" required placeholder="Contoh: 3273xxxxxxxxxxxx">
                        </div>

                        <div>
                            <label class="mb-2 block text-sm font-medium text-slate-700">Nomor Telepon (WhatsApp) <span class="text-rose-500">*</span></label>
                            <input type="text" name="no_telp"
                                class="w-full rounded-lg border border-slate-300 px-4 py-2.5 text-sm text-slate-900 shadow-sm focus:border-slate-700 focus:outline-none focus:ring-1 focus:ring-slate-700"
                                value="{{ old('no_telp', $customer?->no_telp ?? '') }}" required placeholder="Contoh: 0812xxxxxxxx">
                        </div>
                    </div>

                    <div>
                        <label class="mb-2 block text-sm font-medium text-slate-700">Alamat Email (opsional)</label>
                        <input type="email" name="email"
                            class="w-full rounded-lg border border-slate-300 px-4 py-2.5 text-sm text-slate-900 shadow-sm focus:border-slate-700 focus:outline-none focus:ring-1 focus:ring-slate-700"
                            value="{{ old('email', $customer?->email ?? auth()->user()->email) }}">
                    </div>

                    <div class="flex justify-end">
                        <button type="submit"
                            class="rounded-full bg-slate-950 px-6 py-3 text-sm font-semibold text-white transition hover:bg-slate-800">
                            Simpan Perubahan
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
