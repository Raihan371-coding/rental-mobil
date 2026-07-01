@extends('layouts.admin')

@section('title', 'Admin Dashboard')

@section('content')
<div class="rounded-[2rem] bg-white p-8 shadow-[0_24px_80px_-40px_rgba(15,23,42,0.2)]">
    <div class="mb-6 flex flex-col gap-4 sm:flex-row sm:items-center sm:justify-between">
        <div>
            <h1 class="text-2xl font-semibold text-slate-950">Selamat Datang di Halaman Admin</h1>
            <p class="mt-2 text-sm text-slate-600">Gunakan sidebar untuk membuka menu Pengembalian, Pembayaran, Rental, atau menu lainnya di bawah ini.</p>
        </div>
    </div>

    <div class="mb-6 rounded-[1.75rem] border border-slate-200 bg-slate-50 p-5 shadow-sm shadow-slate-900/5">
        <div class="flex flex-col gap-4 sm:flex-row sm:items-center sm:justify-between">
            <div>
                <p class="text-xs font-semibold uppercase tracking-[0.24em] text-sky-700">Quick Access</p>
                <h2 class="mt-2 text-xl font-semibold text-slate-950">Akses cepat ke menu penting</h2>
                <p class="mt-2 text-sm text-slate-600">Klik salah satu item di bawah untuk langsung membuka fitur Mobil, Service, Booking, dan modul lainnya.</p>
            </div>
        </div>
    </div>

    <div class="grid gap-4 sm:grid-cols-2 lg:grid-cols-3">
        <a href="{{ route('mobil.index') }}" class="group block rounded-[1.75rem] border border-slate-200 bg-white p-5 shadow-sm transition hover:border-sky-300 hover:bg-sky-50">
            <p class="text-sm font-semibold text-slate-900">Mobil</p>
            <p class="mt-3 text-sm text-slate-600">Kelola daftar mobil rental, tarif, dan status armada.</p>
        </a>
        <a href="{{ route('service.index') }}" class="group block rounded-[1.75rem] border border-slate-200 bg-white p-5 shadow-sm transition hover:border-emerald-300 hover:bg-emerald-50">
            <p class="text-sm font-semibold text-slate-900">Service</p>
            <p class="mt-3 text-sm text-slate-600">Lihat riwayat service dan atur jadwal perawatan kendaraan.</p>
        </a>
        <a href="{{ route('booking.index') }}" class="group block rounded-[1.75rem] border border-slate-200 bg-white p-5 shadow-sm transition hover:border-violet-300 hover:bg-violet-50">
            <p class="text-sm font-semibold text-slate-900">Booking</p>
            <p class="mt-3 text-sm text-slate-600">Kelola pemesanan pelanggan dan status booking secara langsung.</p>
        </a>
        <a href="{{ route('pengembalian.index') }}" class="group block rounded-[1.75rem] border border-slate-200 bg-white p-5 shadow-sm transition hover:border-slate-400 hover:bg-slate-100">
            <p class="text-sm font-semibold text-slate-900">Pengembalian</p>
            <p class="mt-3 text-sm text-slate-600">Kelola proses pengembalian kendaraan secara cepat.</p>
        </a>
        <a href="{{ route('pembayaran.index') }}" class="group block rounded-[1.75rem] border border-slate-200 bg-white p-5 shadow-sm transition hover:border-rose-300 hover:bg-rose-50">
            <p class="text-sm font-semibold text-slate-900">Pembayaran</p>
            <p class="mt-3 text-sm text-slate-600">Pantau status pembayaran dan histori transaksi.</p>
        </a>
        <a href="{{ route('rental.index') }}" class="group block rounded-[1.75rem] border border-slate-200 bg-white p-5 shadow-sm transition hover:border-amber-300 hover:bg-amber-50">
            <p class="text-sm font-semibold text-slate-900">Rental</p>
            <p class="mt-3 text-sm text-slate-600">Kelola kontrak rental dan data penyewaan.</p>
        </a>
        <a href="{{ route('denda.index') }}" class="group block rounded-[1.75rem] border border-slate-200 bg-white p-5 shadow-sm transition hover:border-fuchsia-300 hover:bg-fuchsia-50">
            <p class="text-sm font-semibold text-slate-900">Denda</p>
            <p class="mt-3 text-sm text-slate-600">Atur denda keterlambatan dan kerusakan kendaraan.</p>
        </a>
        <a href="{{ route('customer.index') }}" class="group block rounded-[1.75rem] border border-slate-200 bg-white p-5 shadow-sm transition hover:border-cyan-300 hover:bg-cyan-50">
            <p class="text-sm font-semibold text-slate-900">Customer</p>
            <p class="mt-3 text-sm text-slate-600">Kelola data pelanggan dan histori penyewaan mereka.</p>
        </a>
        <a href="{{ route('promo.index') }}" class="group block rounded-[1.75rem] border border-slate-200 bg-white p-5 shadow-sm transition hover:border-indigo-300 hover:bg-indigo-50">
            <p class="text-sm font-semibold text-slate-900">Promo</p>
            <p class="mt-3 text-sm text-slate-600">Buat dan kelola kode promo untuk menarik lebih banyak pelanggan.</p>
        </a>
    </div>
</div>
@endsection
