<section class="py-24 bg-white" id="katalog" data-aos="fade-up">
    <div class="max-w-7xl mx-auto px-6">
        <div class="max-w-xl mb-14">
            <span class="font-mono-plate text-xs tracking-[0.3em] text-sky-600 uppercase">Katalog</span>
            <h2 class="font-display text-4xl lg:text-5xl font-bold text-ink mt-3 uppercase">
                Pilihan Terpopuler
            </h2>
            <p class="text-slate-500 mt-4">
                Kendaraan favorit pelanggan kami yang siap menemani perjalanan Anda.
            </p>
        </div>

        <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
            @forelse ($mobils->take(3) as $mobil)
                <div
                    class="group bg-white rounded-2xl overflow-hidden border border-black/5 shadow-sm hover:shadow-xl transition duration-300">
                    <div class="overflow-hidden relative">
                        @if ($mobil->foto)
                            <img src="{{ asset('storage/' . $mobil->foto) }}"
                                class="w-full h-56 object-cover group-hover:scale-105 transition duration-500">
                        @else
                            <img src="{{ asset('images/no-image.png') }}" class="w-full h-56 object-cover">
                        @endif

                        <span
                            class="absolute top-4 left-4 font-mono-plate px-2.5 py-1 rounded text-[11px] font-semibold tracking-wider {{ $mobil->status == 'tersedia' ? 'bg-emerald-500 text-white' : 'bg-red-500 text-white' }}">
                            {{ ucfirst($mobil->status) }}
                        </span>
                    </div>

                    <div class="p-6">
                        <div class="flex justify-between items-start">
                            <div>
                                <h3 class="font-display text-2xl font-bold text-ink uppercase">
                                    {{ $mobil->nama_mobil }}
                                </h3>

                                <p class="text-slate-500 mt-1 text-sm">
                                    {{ $mobil->merk }}
                                </p>
                            </div>

                            <div class="text-right shrink-0">
                                <h3 class="font-mono-plate text-ink text-xl font-semibold">
                                    Rp {{ number_format($mobil->harga_sewa, 0, ',', '.') }}
                                </h3>

                                <span class="text-slate-400 text-xs">/hari</span>
                            </div>
                        </div>

                        <div class="flex flex-wrap gap-3 mt-5 text-xs font-medium text-slate-500">
                            @if (isset($mobil->transmisi))
                                <span class="inline-flex items-center gap-1.5 bg-slate-50 rounded px-2.5 py-1">
                                    🚗 {{ ucfirst($mobil->transmisi) }}
                                </span>
                            @endif

                            @if (isset($mobil->kapasitas))
                                <span class="inline-flex items-center gap-1.5 bg-slate-50 rounded px-2.5 py-1">
                                    👤 {{ $mobil->kapasitas }} Seat
                                </span>
                            @endif
                        </div>

                        <a href="{{ route('login') }}"
                            class="block text-center w-full mt-7 bg-ink hover:bg-sky-600 text-white py-3.5 rounded font-semibold transition-colors">
                            Booking Sekarang
                        </a>
                    </div>
                </div>
            @empty
                <div class="col-span-full text-center py-20">
                    <h3 class="font-display text-2xl font-bold text-ink uppercase">
                        Belum Ada Mobil yang Tersedia
                    </h3>
                </div>
            @endforelse
        </div>

        <div class="text-center mt-16">
            <a href="{{ route('landing.mobil') }}"
                class="inline-flex bg-sky-600 hover:bg-blue-700 text-white px-10 py-4 rounded font-semibold transition-colors">
                Lihat Semua Mobil
            </a>
        </div>
    </div>
</section>
