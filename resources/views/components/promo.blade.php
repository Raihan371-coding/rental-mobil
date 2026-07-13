<section class="py-24 bg-slate-50" id="promo">
    <div class="max-w-7xl mx-auto px-6">

        <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-4 mb-10">

            <div>
                <h2 class="text-3xl font-bold text-slate-800">
                    Promo Eksklusif
                </h2>

                <p class="mt-2 text-slate-500">
                    Nikmati berbagai promo menarik yang sedang berlangsung.
                </p>
            </div>

            <a href="{{ route('landing.promo') }}" class="text-sky-700 font-semibold hover:underline">
                Lihat Semua Promo →
            </a>

        </div>

        <div class="grid gap-6 md:grid-cols-2 xl:grid-cols-4">

            @forelse($promos as $promo)
                @php
                    $aktif = now()->between($promo->tanggal_mulai, $promo->tanggal_selesai);
                @endphp

                <div
                    class="rounded-3xl bg-white border border-slate-200 shadow-sm hover:shadow-xl transition duration-300 p-6">

                    <div class="flex items-center justify-between">

                        <span
                            class="rounded-full px-3 py-1 text-xs font-bold
                            {{ $promo->jenis == 'persentase' ? 'bg-blue-100 text-blue-700' : 'bg-emerald-100 text-emerald-700' }}">

                            {{ strtoupper($promo->jenis) }}

                        </span>

                        @if ($aktif)
                            <span class="rounded-full bg-green-100 text-green-700 text-xs px-3 py-1">
                                Aktif
                            </span>
                        @endif

                    </div>

                    <div class="mt-6">

                        <h3 class="text-4xl font-bold text-slate-900">

                            @if ($promo->jenis == 'persentase')
                                {{ $promo->potongan }}%
                            @else
                                Rp {{ number_format($promo->potongan, 0, ',', '.') }}
                            @endif

                        </h3>

                        <p class="mt-2 text-lg font-semibold text-slate-700">
                            {{ $promo->kode_promo }}
                        </p>

                        <p class="mt-4 text-sm text-slate-500">
                            Berlaku mulai
                            <strong>{{ \Carbon\Carbon::parse($promo->tanggal_mulai)->format('d M Y') }}</strong>
                            sampai
                            <strong>{{ \Carbon\Carbon::parse($promo->tanggal_selesai)->format('d M Y') }}</strong>
                        </p>

                    </div>

                </div>

            @empty

                <div class="col-span-full">

                    <div class="rounded-3xl border border-dashed border-slate-300 bg-white p-12 text-center">

                        <svg class="mx-auto h-12 w-12 text-slate-300" fill="none" stroke="currentColor"
                            viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                d="M9 14l6-6m0 0H9m6 0v6" />
                        </svg>

                        <h3 class="mt-4 text-lg font-semibold text-slate-700">
                            Belum Ada Promo
                        </h3>

                        <p class="mt-2 text-slate-500">
                            Nantikan promo menarik dari RentalKu.
                        </p>

                    </div>

                </div>
            @endforelse

        </div>

    </div>
</section>
