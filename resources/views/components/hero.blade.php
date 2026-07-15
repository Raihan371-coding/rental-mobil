<section class="relative bg-ink" data-aos="fade">
    <div class="max-w-7xl mx-auto px-6 pt-40 pb-24 lg:pt-48 lg:pb-32">
        <div class="max-w-2xl">
            <span class="font-mono-plate text-xs tracking-[0.3em] text-sky-400 uppercase">
                Rentify &mdash; Rental Mobil Indonesia
            </span>

            <h1 class="font-display text-white text-6xl lg:text-8xl font-extrabold leading-[0.95] mt-6 uppercase">
                Setiap Jalan
                Punya Cerita
            </h1>

            <p class="mt-8 text-lg text-slate-300 leading-8 max-w-lg">
                Nikmati kebebasan perjalanan Anda dengan armada pilihan terbaik.
                Dari bisnis hingga liburan keluarga, Rentify hadir untuk setiap langkah Anda.
            </p>

            <div class="mt-10 flex flex-wrap items-center gap-5">
                <a href="{{ route('home') }}#katalog"
                    class="bg-sky-600 hover:bg-blue-700 text-white px-8 py-4 rounded font-semibold transition">
                    Cari Mobil Sekarang
                </a>

                <a href="{{ route('home') }}#how-it-works"
                    class="text-white/80 hover:text-white transition inline-flex items-center gap-2">
                    Pelajari Cara Kerja
                    <span aria-hidden="true">&rarr;</span>
                </a>
            </div>
        </div>
    </div>

    {{-- Route line: seam between hero and rest of page --}}
    <div class="route-line w-full"></div>
</section>
