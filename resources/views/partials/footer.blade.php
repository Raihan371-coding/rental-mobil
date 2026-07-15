<footer class="bg-ink text-slate-300 border-t border-white/10">

    <div class="max-w-7xl mx-auto px-6 py-16 sm:py-20">

        <div class="grid gap-10 sm:grid-cols-2 lg:grid-cols-4 lg:gap-12">

            {{-- Brand --}}
            <div class="sm:col-span-2 lg:col-span-1">
                <a href="{{ url('/') }}" class="inline-flex items-center gap-2">
                    <span
                        class="flex h-9 w-9 items-center justify-center rounded bg-sky-600 text-white font-display font-extrabold text-lg">
                        R
                    </span>
                    <span class="font-display text-2xl font-bold text-white uppercase tracking-wide">Rentify</span>
                </a>
                <p class="mt-4 leading-relaxed text-sm text-slate-400 max-w-xs">
                    Solusi rental mobil terpercaya untuk perjalanan pribadi maupun bisnis di seluruh Indonesia.
                </p>
            </div>

            {{-- Menu --}}
            <div>
                <h3 class="font-mono-plate text-xs font-semibold uppercase tracking-widest text-sky-400 mb-5">Menu</h3>
                <ul class="space-y-3 text-sm">
                    <li><a href="{{ url('/') }}"
                            class="text-slate-400 hover:text-white transition-colors">Beranda</a></li>
                    <li><a href="{{ route('home') }}#katalog"
                            class="text-slate-400 hover:text-white transition-colors">Mobil</a></li>
                    <li><a href="{{ route('home') }}#promo"
                            class="text-slate-400 hover:text-white transition-colors">Promo</a></li>
                    <li><a href="{{ route('home') }}#how-it-works"
                            class="text-slate-400 hover:text-white transition-colors">Cara Kerja</a></li>
                </ul>
            </div>

            {{-- Layanan --}}
            <div>
                <h3 class="font-mono-plate text-xs font-semibold uppercase tracking-widest text-sky-400 mb-5">Layanan
                </h3>
                <ul class="space-y-3 text-sm text-slate-400">
                    <li>Sewa Harian</li>
                    <li>Sewa Mingguan</li>
                    <li>Sewa Bulanan</li>
                    <li>Corporate Rental</li>
                </ul>
            </div>

            {{-- Kontak --}}
            <div>
                <h3 class="font-mono-plate text-xs font-semibold uppercase tracking-widest text-sky-400 mb-5">Kontak
                </h3>
                <ul class="space-y-3.5 text-sm">
                    <li class="flex items-start gap-2.5 text-slate-400">
                        <svg class="w-4 h-4 mt-0.5 flex-shrink-0 text-slate-500" fill="none" stroke="currentColor"
                            viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M17.657 16.657L13.414 20.9a2 2 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                        </svg>
                        Bandung, Indonesia
                    </li>
                    <li class="flex items-start gap-2.5 text-slate-400">
                        <svg class="w-4 h-4 mt-0.5 flex-shrink-0 text-slate-500" fill="none" stroke="currentColor"
                            viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z" />
                        </svg>
                        <a href="tel:+6281234567890" class="hover:text-white transition-colors">+62 812-3456-7890</a>
                    </li>
                    <li class="flex items-start gap-2.5 text-slate-400">
                        <svg class="w-4 h-4 mt-0.5 flex-shrink-0 text-slate-500" fill="none" stroke="currentColor"
                            viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                        </svg>
                        <a href="mailto:rentify@email.com"
                            class="hover:text-white transition-colors">rentify@email.com</a>
                    </li>
                </ul>
            </div>

        </div>

        <div class="route-line w-full my-10 opacity-30"></div>

        <div class="flex flex-col gap-3 sm:flex-row sm:items-center sm:justify-between text-sm text-slate-500">
            <p>&copy; {{ date('Y') }} Rentify. All Rights Reserved.</p>
            <p class="text-slate-600">Dibuat dengan &hearts; di Indonesia</p>
        </div>

    </div>

</footer>
