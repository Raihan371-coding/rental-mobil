@php
    $stats = [
        ['value' => '500+', 'label' => 'Armada Mobil'],
        ['value' => '10K+', 'label' => 'Customer Puas'],
        ['value' => '4.9/5', 'label' => 'Rating Pelanggan'],
        ['value' => '15+', 'label' => 'Kota Layanan'],
    ];
@endphp

<section class="bg-paper border-b border-black/5" data-aos="fade-up">
    <div class="max-w-7xl mx-auto px-6">
        <div class="grid grid-cols-2 lg:grid-cols-4 divide-x divide-black/10">
            @foreach ($stats as $stat)
                <div class="text-center py-12 px-4">
                    <h3 class="font-display text-5xl font-bold text-ink">
                        {{ $stat['value'] }}
                    </h3>

                    <p class="font-mono-plate text-xs tracking-widest uppercase text-slate-500 mt-3">
                        {{ $stat['label'] }}
                    </p>
                </div>
            @endforeach
        </div>
    </div>
</section>
