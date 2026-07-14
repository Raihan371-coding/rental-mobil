@extends('layouts.customer')

@section('title', 'Katalog Mobil')

@section('content')
<div class="space-y-6">
    <div class="rounded-lg bg-white p-6 shadow-sm">
        <h1 class="text-2xl font-semibold text-slate-900">Katalog Mobil</h1>
        <p class="mt-2 text-sm text-slate-500">Lihat daftar mobil yang tersedia untuk disewa. Pilih mobil lalu buat booking.</p>
    </div>

    <div class="grid gap-6 sm:grid-cols-2 lg:grid-cols-3">
        @forelse($mobils as $mobil)
            <div class="overflow-hidden rounded-2xl border border-slate-200 bg-white shadow-sm transition hover:shadow-md">
                @if($mobil->foto)
                    <img src="{{ asset('storage/' . $mobil->foto) }}" alt="{{ $mobil->nama_mobil }}" class="h-48 w-full object-cover">
                @else
                    <div class="flex h-48 items-center justify-center bg-slate-100 text-sm text-slate-400">Tidak ada foto</div>
                @endif
                <div class="p-5">
                    <h3 class="text-lg font-semibold text-slate-900">{{ $mobil->nama_mobil }}</h3>
                    <p class="mt-1 text-sm text-slate-500">{{ $mobil->merk }} &middot; {{ $mobil->tahun }}</p>
                    <p class="mt-1 text-xs text-slate-400">Plat: {{ $mobil->plat_nomor }}</p>
                    <div class="mt-4 flex items-center justify-between">
                        <span class="text-lg font-bold text-sky-700">Rp {{ number_format($mobil->harga_sewa, 0, ',', '.') }}<span class="text-xs font-normal text-slate-400">/hari</span></span>
                        <span class="rounded-full px-3 py-1 text-xs font-semibold {{ $mobil->status === 'tersedia' ? 'bg-emerald-100 text-emerald-700' : 'bg-rose-100 text-rose-700' }}">
                            {{ ucfirst($mobil->status) }}
                        </span>
                    </div>
                    @if($mobil->status === 'tersedia')
                        <a href="{{ route('customer.booking.create', ['mobil_id' => $mobil->id]) }}" class="mt-4 block w-full rounded-full bg-slate-950 px-4 py-2.5 text-center text-sm font-semibold text-white transition hover:bg-slate-800">Booking Sekarang</a>
                    @endif
                </div>
            </div>
        @empty
            <div class="col-span-full rounded-lg bg-white p-8 text-center text-sm text-slate-500 shadow-sm">
                Belum ada mobil yang tersedia saat ini.
            </div>
        @endforelse
    </div>
</div>
@endsection
