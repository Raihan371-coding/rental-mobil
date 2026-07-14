@extends('layouts.landing')

@section('title', 'Promo')

@section('content')
    <section class="py-20 bg-slate-50" id="promo">
        <div class="max-w-7xl mx-auto px-6">

            <div class="text-center mb-12">
                <h1 class="text-4xl font-bold text-slate-800">
                    Promo Rental Mobil
                </h1>

                <p class="mt-3 text-slate-500">
                    Nikmati berbagai promo menarik yang sedang berlangsung.
                </p>
            </div>

            <div class="grid gap-6 md:grid-cols-2 xl:grid-cols-3">

                @forelse($promos as $promo)
                    <div class="bg-white rounded-3xl shadow-lg p-8 border">

                        <span
                            class="inline-flex rounded-full px-3 py-1 text-xs font-semibold
                        {{ $promo->jenis == 'persentase' ? 'bg-blue-100 text-blue-700' : 'bg-emerald-100 text-emerald-700' }}">

                            {{ strtoupper($promo->jenis) }}

                        </span>

                        <h2 class="text-4xl font-bold mt-6 text-slate-900">

                            @if ($promo->jenis == 'persentase')
                                {{ $promo->potongan }}%
                            @else
                                Rp {{ number_format($promo->potongan, 0, ',', '.') }}
                            @endif

                        </h2>

                        <h3 class="mt-3 text-xl font-semibold">
                            {{ $promo->kode_promo }}
                        </h3>

                        <div class="mt-6 text-sm text-slate-500">

                            Berlaku

                            <br>

                            {{ \Carbon\Carbon::parse($promo->tanggal_mulai)->format('d M Y') }}

                            -

                            {{ \Carbon\Carbon::parse($promo->tanggal_selesai)->format('d M Y') }}

                        </div>

                    </div>

                @empty

                    <div class="col-span-full text-center py-20">

                        <h3 class="text-xl font-semibold">
                            Belum ada promo.
                        </h3>

                    </div>
                @endforelse

            </div>

        </div>
    </section>
@endsection
