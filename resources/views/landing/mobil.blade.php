@extends('layouts.landing')

@section('title', 'Rental Mobil - Home')

@section('content')

    <section class="py-24 bg-white" id="mobil">

        <div class="max-w-7xl mx-auto px-6">

            <div class="text-center mb-14">

                <h2 class="text-4xl font-bold text-slate-800">
                    Pilihan Terpopuler
                </h2>

                <p class="text-gray-500 mt-4">
                    Kendaraan favorit pelanggan kami yang siap menemani perjalanan Anda.
                </p>

            </div>

            <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">

                @forelse($mobils as $mobil)
                    <div class="bg-white rounded-3xl overflow-hidden shadow hover:shadow-2xl transition duration-300">

                        <div class="overflow-hidden">

                            @if ($mobil->foto)
                                <img src="{{ asset('storage/' . $mobil->foto) }}"
                                    class="w-full h-56 object-cover hover:scale-105 transition duration-500">
                            @else
                                <img src="{{ asset('images/no-image.png') }}" class="w-full h-56 object-cover">
                            @endif

                        </div>

                        <div class="p-6">

                            <div class="flex justify-between items-start">

                                <div>

                                    <h3 class="font-bold text-xl">
                                        {{ $mobil->nama_mobil }}
                                    </h3>

                                    <p class="text-gray-500 mt-2">
                                        {{ $mobil->merk }}
                                    </p>

                                </div>

                                <div class="text-right">

                                    <h3 class="text-sky-800 text-2xl font-bold">
                                        Rp {{ number_format($mobil->harga_sewa, 0, ',', '.') }}
                                    </h3>

                                    <span class="text-gray-400 text-sm">
                                        /hari
                                    </span>

                                </div>

                            </div>

                            <div class="flex flex-wrap gap-3 mt-6 text-sm text-gray-500">

                                @if (isset($mobil->transmisi))
                                    <span>
                                        🚗 {{ ucfirst($mobil->transmisi) }}
                                    </span>
                                @endif

                                @if (isset($mobil->kapasitas))
                                    <span>
                                        👤 {{ $mobil->kapasitas }} Seat
                                    </span>
                                @endif

                                <span
                                    class="px-3 py-1 rounded-full text-xs
                                {{ $mobil->status == 'tersedia' ? 'bg-green-100 text-green-700' : 'bg-red-100 text-red-700' }}">

                                    {{ ucfirst($mobil->status) }}

                                </span>

                            </div>

                            <a href="{{ route('login') }}"
                                class="block text-center w-full mt-8 bg-sky-900 hover:bg-sky-950 text-white py-3 rounded-xl transition">

                                Booking Sekarang

                            </a>

                        </div>

                    </div>

                @empty

                    <div class="col-span-full text-center py-20">

                        <h3 class="text-xl font-semibold text-slate-700">
                            Belum ada mobil yang tersedia.
                        </h3>

                    </div>
                @endforelse

            </div>

            <div class="text-center mt-16">

                <a href="{{ route('landing.mobil') }}"
                    class="inline-flex bg-sky-600 hover:bg-blue-700 text-white px-10 py-4 rounded-xl transition">

                    Lihat Semua Mobil

                </a>

            </div>

        </div>

    </section>
@endsection
