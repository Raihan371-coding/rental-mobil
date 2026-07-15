@php
    $testimonials = [
        [
            'name' => 'Andi Saputra',
            'city' => 'Bandung',
            'avatar' => 'https://i.pravatar.cc/100?img=11',
            'message' => 'Pelayanan sangat cepat dan mobil dalam kondisi bersih. Proses booking juga mudah dan transparan.',
        ],
        [
            'name' => 'Siti Rahma',
            'city' => 'Jakarta',
            'avatar' => 'https://i.pravatar.cc/100?img=32',
            'message' => 'Sangat membantu ketika perjalanan bisnis. Harga sesuai dengan kualitas pelayanan.',
        ],
        [
            'name' => 'Rina Amelia',
            'city' => 'Surabaya',
            'avatar' => 'https://i.pravatar.cc/100?img=48',
            'message' => 'Armada lengkap dan customer service sangat responsif. Sangat direkomendasikan.',
        ],
    ];
@endphp

<section class="py-24 bg-ink" id="testimoni" data-aos="fade-up">
    <div class="max-w-7xl mx-auto px-6">
        <div class="max-w-xl">
            <span class="font-mono-plate text-xs tracking-[0.3em] text-sky-400 uppercase">Testimonial</span>
            <h2 class="font-display text-4xl lg:text-5xl font-bold text-white mt-3 uppercase">
                Apa Kata Pelanggan Kami?
            </h2>
        </div>

        <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-6 mt-16">
            @foreach ($testimonials as $t)
                <div class="bg-white/[0.04] border border-white/10 rounded-2xl p-8">
                    <div class="text-sky-400 text-lg tracking-wider">
                        ★★★★★
                    </div>

                    <p class="mt-5 text-slate-300 leading-relaxed">
                        &ldquo;{{ $t['message'] }}&rdquo;
                    </p>

                    <div class="flex items-center gap-3 mt-6 pt-6 border-t border-white/10">
                        <img src="{{ $t['avatar'] }}" class="w-11 h-11 rounded-full">

                        <div>
                            <h3 class="font-semibold text-white text-sm">
                                {{ $t['name'] }}
                            </h3>

                            <p class="text-slate-400 text-xs">
                                {{ $t['city'] }}
                            </p>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>
