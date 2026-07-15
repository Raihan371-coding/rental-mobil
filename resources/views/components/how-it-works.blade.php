@php
    $steps = [
        [
            'stop' => 'A',
            'title' => 'Pilih Jadwal',
            'desc' => 'Tentukan lokasi penjemputan, tanggal mulai serta tanggal pengembalian.',
        ],
        ['stop' => 'B', 'title' => 'Pilih Mobil', 'desc' => 'Temukan kendaraan sesuai kebutuhan dan budget Anda.'],
        [
            'stop' => 'C',
            'title' => 'Konfirmasi',
            'desc' => 'Lakukan pembayaran dan sistem akan memverifikasi otomatis.',
        ],
        [
            'stop' => 'D',
            'title' => 'Nikmati Perjalanan',
            'desc' => 'Kendaraan siap digunakan sesuai jadwal yang telah dipilih.',
        ],
    ];
@endphp

<section class="py-24 bg-white" id="how-it-works" data-aos="fade-up">
    <div class="max-w-7xl mx-auto px-6">
        <div class="max-w-xl">
            <span class="font-mono-plate text-xs tracking-[0.3em] text-sky-600 uppercase">Rute Booking</span>
            <h2 class="font-display text-4xl lg:text-5xl font-bold text-ink mt-3 uppercase">
                Empat Titik Menuju Perjalanan Anda
            </h2>
        </div>

        {{-- Route line connecting the stops --}}
        <div class="relative mt-16">
            <div class="route-line absolute left-0 right-0 top-6 hidden lg:block"></div>

            <div class="grid lg:grid-cols-4 gap-10 relative">
                @foreach ($steps as $step)
                    <div>
                        <div
                            class="relative z-10 w-12 h-12 rounded-full bg-ink flex items-center justify-center font-mono-plate text-sky-400 font-semibold">
                            {{ $step['stop'] }}
                        </div>

                        <h3 class="font-display text-2xl font-bold text-ink mt-5 uppercase">
                            {{ $step['title'] }}
                        </h3>

                        <p class="text-slate-500 mt-2 text-sm leading-relaxed">
                            {{ $step['desc'] }}
                        </p>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</section>
