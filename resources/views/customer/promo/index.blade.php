@extends('layouts.customer')

@section('title', 'Promo')

@section('content')
<h1 class="text-2xl font-bold mb-6">Promo Untuk Anda</h1>

<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
    @foreach ($promos as $promo)
        <div class="bg-white rounded shadow overflow-hidden">
            {{-- Banner --}}
            <img src="{{ asset('storage/' . $promo->gambar) }}"
                 class="w-full h-40 object-cover">

            <div class="p-4">
                <h2 class="font-semibold text-lg">
                    {{ $promo->nama_promo }}
                </h2>

                <p class="text-sm text-gray-600">
                    Diskon {{ $promo->diskon }}%
                </p>

                <p class="text-xs text-gray-500 mt-2">
                    Berlaku:
                    {{ $promo->tanggal_mulai }} –
                    {{ $promo->tanggal_selesai }}
                </p>
            </div>
        </div>
    @endforeach
</div>
@endsection