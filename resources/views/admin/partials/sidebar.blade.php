<aside
    id="sidebar"
    class="fixed inset-y-0 left-0 z-50 w-64 flex flex-col
           bg-gradient-to-b from-slate-900 via-slate-900 to-slate-800
           text-white transform -translate-x-full lg:translate-x-0
           transition-transform duration-300 ease-in-out shadow-2xl">

    {{-- Logo Section --}}
    <div class="flex items-center justify-between px-6 py-6 border-b border-slate-700/60">
        <div class="flex items-center gap-3">
            <div class="w-9 h-9 rounded-xl bg-sky-500 flex items-center justify-center shadow-lg">
                <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M8 7h12m0 0l-4-4m4 4l-4 4m0 6H4m0 0l4 4m-4-4l4-4"/>
                </svg>
            </div>
            <div>
                <h1 class="text-lg font-bold tracking-tight">Rentify</h1>
                <p class="text-xs text-slate-400 font-medium">Rental Mobil</p>
            </div>
        </div>
        {{-- Close button (mobile only) --}}
        <button onclick="closeSidebar()"
            class="lg:hidden text-slate-400 hover:text-white transition p-1 rounded-lg hover:bg-slate-700">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
            </svg>
        </button>
    </div>

    {{-- Navigation --}}
    <nav class="flex-1 overflow-y-auto px-3 py-4 space-y-1">

        @php
            $navItems = [
                ['route' => 'admin.dashboard', 'label' => 'Dashboard', 'icon' => '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"/>'],
                ['route' => 'admin.mobil.index', 'label' => 'Mobil', 'icon' => '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7h12m0 0l-4-4m4 4l-4 4m0 6H4m0 0l4 4m-4-4l4-4"/>'],
                ['route' => 'admin.customer.index', 'label' => 'Customer', 'icon' => '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0z"/>'],
                ['route' => 'admin.booking.index', 'label' => 'Booking', 'icon' => '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>'],
                ['route' => 'admin.rental.index', 'label' => 'Rental', 'icon' => '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>'],
                ['route' => 'admin.pembayaran.index', 'label' => 'Pembayaran', 'icon' => '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 10h18M7 15h1m4 0h1m-7 4h12a3 3 0 003-3V8a3 3 0 00-3-3H6a3 3 0 00-3 3v8a3 3 0 003 3z"/>'],
                ['route' => 'admin.pengembalian.index', 'label' => 'Pengembalian', 'icon' => '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15"/>'],
                ['route' => 'admin.denda.index', 'label' => 'Denda', 'icon' => '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"/>'],
                ['route' => 'admin.service.index', 'label' => 'Service', 'icon' => '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>'],
                ['route' => 'admin.promo.index', 'label' => 'Promo', 'icon' => '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z"/>'],
            ];
        @endphp

        @foreach($navItems as $item)
            @php
                $isActive = request()->routeIs($item['route']) || request()->routeIs($item['route'] . '.*');
            @endphp
            <a href="{{ route($item['route']) }}"
                class="group flex items-center gap-3 rounded-xl px-3 py-2.5 text-sm font-medium transition-all duration-200
                {{ $isActive
                    ? 'bg-sky-500 text-white shadow-lg shadow-sky-500/30'
                    : 'text-slate-300 hover:bg-slate-700/60 hover:text-white' }}">

                <svg class="w-5 h-5 flex-shrink-0 {{ $isActive ? 'text-white' : 'text-slate-400 group-hover:text-white' }}"
                    fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    {!! $item['icon'] !!}
                </svg>

                <span>{{ $item['label'] }}</span>

                @if($isActive)
                    <span class="ml-auto w-1.5 h-1.5 rounded-full bg-white opacity-80"></span>
                @endif
            </a>
        @endforeach

    </nav>

    {{-- Footer User Section --}}
    <div class="px-4 py-4 border-t border-slate-700/60">
        <div class="flex items-center gap-3 rounded-xl px-3 py-2.5 bg-slate-800/60">
            <div class="w-8 h-8 rounded-lg bg-sky-500 text-white flex items-center justify-center text-sm font-bold flex-shrink-0">
                {{ strtoupper(substr(auth()->user()->name, 0, 1)) }}
            </div>
            <div class="min-w-0">
                <p class="text-sm font-semibold text-white truncate">{{ auth()->user()->name }}</p>
                <p class="text-xs text-slate-400">Administrator</p>
            </div>
        </div>
    </div>

</aside>
