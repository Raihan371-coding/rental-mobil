<section class="py-24 bg-paper" id="promo" data-aos="fade-up">
    <div class="max-w-7xl mx-auto px-6">
        <div class="flex flex-col md:flex-row md:items-end md:justify-between gap-4 mb-12">
            <div>
                <span class="font-mono-plate text-xs tracking-[0.3em] text-sky-600 uppercase">Jangan Lewatkan</span>
                <h2 class="font-display text-4xl font-bold text-ink mt-3 uppercase">
                    Promo Eksklusif
                </h2>
            </div>

            <a href="{{ route('landing.promo') }}"
                class="text-ink font-semibold hover:text-sky-600 transition-colors inline-flex items-center gap-1">
                Lihat Semua Promo <span aria-hidden="true">&rarr;</span>
            </a>
        </div>

        <div class="grid gap-6 md:grid-cols-2 xl:grid-cols-4">
            @forelse ($promos as $promo)
                @php $aktif = now()->between($promo->tanggal_mulai, $promo->tanggal_selesai); @endphp

                <div
                    class="rounded-2xl bg-white border border-black/5 shadow-sm hover:shadow-lg hover:-translate-y-0.5 transition duration-300 p-6">
                    <div class="flex items-center justify-between">
                        <span
                            class="font-mono-plate rounded px-2.5 py-1 text-[11px] font-semibold tracking-wider {{ $promo->jenis == 'persentase' ? 'bg-steel/10 text-steel' : 'bg-sky-100 text-sky-700' }}">
                            {{ strtoupper($promo->jenis) }}
                        </span>

                        @if ($aktif)
                            <span class="flex items-center gap-1.5 text-xs text-emerald-600 font-medium">
                                <span class="w-1.5 h-1.5 rounded-full bg-emerald-500"></span>
                                Aktif
                            </span>
                        @endif
                    </div>

                    <div class="mt-6">
                        <h3 class="font-display text-4xl font-bold text-ink">
                            @if ($promo->jenis == 'persentase')
                                {{ $promo->potongan }}%
                            @else
                                Rp {{ number_format($promo->potongan, 0, ',', '.') }}
                            @endif
                        </h3>

                        <p class="font-mono-plate mt-2 text-sm font-semibold text-slate-600 tracking-wide">
                            {{ $promo->kode_promo }}
                        </p>

                        <p class="mt-4 text-sm text-slate-500 leading-relaxed">
                            Berlaku mulai
                            <strong
                                class="text-slate-700">{{ \Carbon\Carbon::parse($promo->tanggal_mulai)->format('d M Y') }}</strong>
                            sampai
                            <strong
                                class="text-slate-700">{{ \Carbon\Carbon::parse($promo->tanggal_selesai)->format('d M Y') }}</strong>
                        </p>
                    </div>
                </div>
            @empty
                <div class="col-span-full">
                    <div class="rounded-2xl border border-dashed border-black/15 bg-white p-12 text-center">
                        <svg class="mx-auto h-12 w-12 text-slate-300" fill="none" stroke="currentColor"
                            viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                d="M9 14l6-6m0 0H9m6 0v6" />
                        </svg>

                        <h3 class="font-display text-lg font-bold text-ink mt-4 uppercase">
                            Belum Ada Promo
                        </h3>

                        <p class="mt-2 text-slate-500">
                            Nantikan promo menarik dari Rentify.
                        </p>
                    </div>
                </div>
            @endforelse
        </div>
    </div>
</section>
