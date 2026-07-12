@extends('layouts.customer')

@section('title', 'Dashboard')

@section('content')
<div class="space-y-6">
    <div class="rounded-lg bg-white p-6 shadow-sm">
        <h1 class="text-2xl font-semibold text-slate-900">Selamat Datang, {{ Auth::user()->name }}</h1>
        <p class="mt-2 text-sm text-slate-500">Kelola booking, rental, dan lihat informasi terbaru dari portal customer Anda.</p>
    </div>

    <div class="grid gap-4 sm:grid-cols-2 lg:grid-cols-3">
        <a href="{{ route('customer.mobil.index') }}" class="group block rounded-2xl border border-slate-200 bg-white p-5 shadow-sm transition hover:border-sky-300 hover:bg-sky-50">
            <p class="text-sm font-semibold text-slate-900">Katalog Mobil</p>
            <p class="mt-2 text-sm text-slate-600">Lihat daftar mobil yang tersedia untuk disewa.</p>
        </a>
        <a href="{{ route('customer.booking.index') }}" class="group block rounded-2xl border border-slate-200 bg-white p-5 shadow-sm transition hover:border-violet-300 hover:bg-violet-50">
            <p class="text-sm font-semibold text-slate-900">Booking Saya</p>
            <p class="mt-2 text-sm text-slate-600">Lihat dan kelola permintaan booking kendaraan Anda.</p>
        </a>
        <a href="{{ route('customer.rental.index') }}" class="group block rounded-2xl border border-slate-200 bg-white p-5 shadow-sm transition hover:border-amber-300 hover:bg-amber-50">
            <p class="text-sm font-semibold text-slate-900">Rental Saya</p>
            <p class="mt-2 text-sm text-slate-600">Lihat riwayat dan status rental Anda.</p>
        </a>
        <a href="{{ route('customer.pengembalian.index') }}" class="group block rounded-2xl border border-slate-200 bg-white p-5 shadow-sm transition hover:border-slate-400 hover:bg-slate-100">
            <p class="text-sm font-semibold text-slate-900">Pengembalian</p>
            <p class="mt-2 text-sm text-slate-600">Lihat status pengembalian kendaraan Anda.</p>
        </a>
        <a href="{{ route('customer.pembayaran.index') }}" class="group block rounded-2xl border border-slate-200 bg-white p-5 shadow-sm transition hover:border-rose-300 hover:bg-rose-50">
            <p class="text-sm font-semibold text-slate-900">Pembayaran</p>
            <p class="mt-2 text-sm text-slate-600">Lihat tagihan dan status pembayaran Anda.</p>
        </a>
        <a href="{{ route('customer.denda.index') }}" class="group block rounded-2xl border border-slate-200 bg-white p-5 shadow-sm transition hover:border-fuchsia-300 hover:bg-fuchsia-50">
            <p class="text-sm font-semibold text-slate-900">Denda</p>
            <p class="mt-2 text-sm text-slate-600">Lihat denda yang dikenakan (jika ada).</p>
        </a>
        <a href="{{ route('customer.promo.index') }}" class="group block rounded-2xl border border-slate-200 bg-white p-5 shadow-sm transition hover:border-indigo-300 hover:bg-indigo-50">
            <p class="text-sm font-semibold text-slate-900">Promo</p>
            <p class="mt-2 text-sm text-slate-600">Lihat promo dan diskon terbaru yang tersedia.</p>
        </a>
        <a href="{{ route('customer.profile') }}" class="group block rounded-2xl border border-slate-200 bg-white p-5 shadow-sm transition hover:border-cyan-300 hover:bg-cyan-50">
            <p class="text-sm font-semibold text-slate-900">Profil Saya</p>
            <p class="mt-2 text-sm text-slate-600">Lihat dan perbarui data profil Anda.</p>
        </a>
    </div>
</div>
@endsection
