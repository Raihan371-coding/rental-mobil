@extends('layouts.customer')

@section('title', 'Promo')

@section('content')
<div class="space-y-6">
    <div class="rounded-lg bg-white p-6 shadow-sm">
        <h1 class="text-2xl font-semibold text-slate-900">Promo & Diskon</h1>
        <p class="mt-2 text-sm text-slate-500">Lihat promo yang sedang berlaku untuk mendapatkan potongan harga rental.</p>
    </div>

    <div class="grid gap-4 sm:grid-cols-2 lg:grid-cols-3">
        @forelse($promos as $promo)
            <div class="rounded-2xl border border-indigo-200 bg-gradient-to-br from-indigo-50 to-white p-5 shadow-sm">
                <div class="flex items-center gap-3">
                    <span class="rounded-full bg-indigo-100 px-3 py-1 text-xs font-bold text-indigo-700">{{ $promo->kode_promo }}</span>
                </div>
                <p class="mt-3 text-2xl font-bold text-indigo-700">{{ $promo->potongan }}%</p>
                <p class="text-sm text-slate-500">Potongan</p>
                <div class="mt-3 text-xs text-slate-400">
                    <p>Mulai: {{ $promo->tanggal_mulai }}</p>
                    <p>Selesai: {{ $promo->tanggal_selesai }}</p>
                </div>
            </div>
        @empty
            <div class="col-span-full rounded-lg bg-white p-8 text-center text-sm text-slate-500 shadow-sm">
                Belum ada promo yang tersedia saat ini.
            </div>
        @endforelse
    </div>
</div>
@endsection
