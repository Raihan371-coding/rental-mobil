@extends('layouts.admin')

@section('title', 'Admin Home')

@section('content')
<div class="rounded-[2rem] bg-white p-8 shadow-[0_24px_80px_-40px_rgba(15,23,42,0.2)]">
    <div class="mb-6 flex flex-col gap-4 sm:flex-row sm:items-center sm:justify-between">
        <div>
            <h1 class="text-2xl font-semibold text-slate-950">Selamat Datang di Halaman Admin</h1>
            <p class="mt-2 text-sm text-slate-600">Gunakan sidebar untuk membuka menu Pengembalian, Pembayaran, atau Rental. Konten akan tampil di area utama.</p>
        </div>
        <div class="flex flex-wrap gap-3">
            <a href="{{ route('pengembalian.index') }}" class="rounded-full bg-sky-600 px-5 py-2 text-sm font-semibold text-white transition hover:bg-sky-700">Pengembalian</a>
            <a href="{{ route('pembayaran.index') }}" class="rounded-full bg-emerald-600 px-5 py-2 text-sm font-semibold text-white transition hover:bg-emerald-700">Pembayaran</a>
            <a href="{{ route('rental.index') }}" class="rounded-full bg-violet-600 px-5 py-2 text-sm font-semibold text-white transition hover:bg-violet-700">Rental</a>
        </div>
    </div>

    <div class="grid gap-6 sm:grid-cols-3">
        <div class="rounded-[1.75rem] border border-slate-200 bg-slate-50 p-5 shadow-sm shadow-slate-900/5">
            <p class="text-sm font-semibold text-slate-900">Pengembalian</p>
            <p class="mt-3 text-sm text-slate-600">Kelola semua proses pengembalian kendaraan dengan mudah.</p>
        </div>
        <div class="rounded-[1.75rem] border border-slate-200 bg-slate-50 p-5 shadow-sm shadow-slate-900/5">
            <p class="text-sm font-semibold text-slate-900">Pembayaran</p>
            <p class="mt-3 text-sm text-slate-600">Pantau status pembayaran dan transaksi terbaru.</p>
        </div>
        <div class="rounded-[1.75rem] border border-slate-200 bg-slate-50 p-5 shadow-sm shadow-slate-900/5">
            <p class="text-sm font-semibold text-slate-900">Rental</p>
            <p class="mt-3 text-sm text-slate-600">Atur data rental dan kontrol armada dalam satu tampilan.</p>
        </div>
    </div>
</div>
@endsection
