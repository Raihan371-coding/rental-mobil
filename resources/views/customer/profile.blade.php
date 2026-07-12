@extends('layouts.customer')

@section('title', 'Profil Customer')

@section('content')
    <div class="rounded-lg bg-white p-6 shadow-sm">
        <h1 class="text-2xl font-semibold text-slate-900">Profil Saya</h1>
        <p class="mt-2 text-sm text-slate-500">Informasi akun dan kontak yang tersimpan.</p>

        <div class="mt-6 grid gap-6 sm:grid-cols-2">
            <div class="rounded-3xl border border-slate-200 bg-slate-50 p-6">
                <h2 class="text-lg font-semibold text-slate-900">Data Diri</h2>
                <div class="mt-4 space-y-3 text-sm text-slate-700">
                    <div>
                        <p class="text-slate-500">Nama</p>
                        <p>{{ $customer?->nama ?? auth()->user()->name }}</p>
                    </div>
                    <div>
                        <p class="text-slate-500">Email</p>
                        <p>{{ auth()->user()->email }}</p>
                    </div>
                    <div>
                        <p class="text-slate-500">Nomor Identitas</p>
                        <p>{{ $customer?->no_identitas ?? 'Belum diset' }}</p>
                    </div>
                    <div>
                        <p class="text-slate-500">Telepon</p>
                        <p>{{ $customer?->telepon ?? 'Belum diset' }}</p>
                    </div>
                </div>
            </div>

            <div class="rounded-3xl border border-slate-200 bg-slate-50 p-6">
                <h2 class="text-lg font-semibold text-slate-900">Status Akun</h2>
                <div class="mt-4 space-y-3 text-sm text-slate-700">
                    <div>
                        <p class="text-slate-500">Peran</p>
                        <p>Customer</p>
                    </div>
                    <div>
                        <p class="text-slate-500">Tanggal Bergabung</p>
                        <p>{{ auth()->user()->created_at->format('d M Y') }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
