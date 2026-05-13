@extends('layouts.admin')

@section('title', 'Admin Home')

@section('content')
<div class="rounded-[2rem] bg-white p-8 shadow-[0_24px_80px_-40px_rgba(15,23,42,0.2)]">
    <div class="mb-6 flex flex-col gap-4 sm:flex-row sm:items-center sm:justify-between">
        <div>
            <h1 class="text-2xl font-semibold text-slate-950">Selamat Datang di Halaman Admin</h1>
            <p class="mt-2 text-sm text-slate-600">Gunakan sidebar untuk membuka menu Pengembalian, Pembayaran, atau Rental. Konten akan tampil di area utama.</p>
        </div>
    </div>

    <div class="mb-6 rounded-[1.75rem] border border-slate-200 bg-slate-50 p-5 shadow-sm shadow-slate-900/5">
        <div class="flex flex-col gap-4 sm:flex-row sm:items-center sm:justify-between">
            <div>
                <p class="text-xs font-semibold uppercase tracking-[0.24em] text-sky-700">Quick Access</p>
                <h2 class="mt-2 text-xl font-semibold text-slate-950">Akses cepat ke menu penting</h2>
                <p class="mt-2 text-sm text-slate-600">Klik salah satu item di bawah untuk langsung masuk ke halaman Pengembalian, Pembayaran, Rental, dan lainnya.</p>
            </div>
        </div>
    </div>

    <div class="grid gap-4 sm:grid-cols-2 lg:grid-cols-3">
        <a href="{{ route('pengembalian.index') }}" class="group block rounded-[1.75rem] border border-slate-200 bg-white p-5 shadow-sm transition hover:border-sky-300 hover:bg-sky-50">
            <p class="text-sm font-semibold text-slate-900">Pengembalian</p>
            <p class="mt-3 text-sm text-slate-600">Kelola semua proses pengembalian kendaraan dengan mudah.</p>
        </a>
        <a href="{{ route('pembayaran.index') }}" class="group block rounded-[1.75rem] border border-slate-200 bg-white p-5 shadow-sm transition hover:border-emerald-300 hover:bg-emerald-50">
            <p class="text-sm font-semibold text-slate-900">Pembayaran</p>
            <p class="mt-3 text-sm text-slate-600">Pantau status pembayaran dan transaksi terbaru.</p>
        </a>
        <a href="{{ route('rental.index') }}" class="group block rounded-[1.75rem] border border-slate-200 bg-white p-5 shadow-sm transition hover:border-violet-300 hover:bg-violet-50">
            <p class="text-sm font-semibold text-slate-900">Rental</p>
            <p class="mt-3 text-sm text-slate-600">Atur data rental dan kontrol armada dalam satu tampilan.</p>
        </a>
        <a href="{{ route('denda.index') }}" class="group block rounded-[1.75rem] border border-slate-200 bg-white p-5 shadow-sm transition hover:border-rose-300 hover:bg-rose-50">
            <p class="text-sm font-semibold text-slate-900">Denda</p>
            <p class="mt-3 text-sm text-slate-600">Kelola denda rental dan lihat riwayat pelanggaran.</p>
        </a>
        <a href="{{ route('customer.index') }}" class="group block rounded-[1.75rem] border border-slate-200 bg-white p-5 shadow-sm transition hover:border-slate-400 hover:bg-slate-100">
            <p class="text-sm font-semibold text-slate-900">Customer</p>
            <p class="mt-3 text-sm text-slate-600">Lihat dan edit data customer yang terdaftar.</p>
        </a>
        <a href="{{ route('promo.index') }}" class="group block rounded-[1.75rem] border border-slate-200 bg-white p-5 shadow-sm transition hover:border-amber-300 hover:bg-amber-50">
            <p class="text-sm font-semibold text-slate-900">Promo</p>
            <p class="mt-3 text-sm text-slate-600">Kelola kode promo dan masa berlakunya.</p>
        </a>
    </div>
</div>
@endsection
