<header class="fixed top-0 right-0 left-0 lg:left-64 h-16 bg-white/80 backdrop-blur-md border-b border-slate-200 z-30">

    <div class="flex items-center justify-between h-full px-4 sm:px-6 lg:px-8">

        {{-- Left: Hamburger + Page Title --}}
        <div class="flex items-center gap-4">

            {{-- Hamburger (mobile only) --}}
            <button onclick="openSidebar()"
                class="lg:hidden inline-flex items-center justify-center w-9 h-9 rounded-lg text-slate-500 hover:text-slate-800 hover:bg-slate-100 transition">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/>
                </svg>
            </button>

            {{-- Page title & breadcrumb --}}
            <div>
                <h2 class="text-base font-semibold text-slate-800 leading-tight">@yield('title')</h2>
                <p class="text-xs text-slate-400 hidden sm:block">
                    Selamat datang kembali, <span class="font-medium text-slate-500">{{ auth()->user()->name }}</span>
                </p>
            </div>

        </div>

        {{-- Right: Date + User + Logout --}}
        <div class="flex items-center gap-3 sm:gap-4">

            {{-- Date (hidden on very small screens) --}}
            <div class="hidden md:flex items-center gap-2 text-sm text-slate-500 bg-slate-50 rounded-lg px-3 py-1.5 border border-slate-200">
                <svg class="w-4 h-4 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                </svg>
                <span id="topbar-date" class="font-medium">{{ now()->locale('id')->isoFormat('dddd, D MMM Y') }}</span>
            </div>

            {{-- User Info --}}
            <div class="hidden sm:flex items-center gap-2.5">
                <div class="text-right">
                    <p class="text-sm font-semibold text-slate-800 leading-tight">{{ auth()->user()->name }}</p>
                    <p class="text-xs text-slate-400">Administrator</p>
                </div>
                <div class="w-9 h-9 rounded-xl bg-gradient-to-br from-sky-400 to-sky-600 text-white flex items-center justify-center text-sm font-bold shadow-md shadow-sky-200">
                    {{ strtoupper(substr(auth()->user()->name, 0, 1)) }}
                </div>
            </div>

            {{-- Logout --}}
            <form action="{{ route('logout') }}" method="POST">
                @csrf
                <button type="submit"
                    class="inline-flex items-center gap-1.5 text-sm font-medium bg-red-50 hover:bg-red-100 text-red-600 hover:text-red-700 border border-red-200 px-3 py-1.5 rounded-lg transition-colors duration-200">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"/>
                    </svg>
                    <span class="hidden sm:inline">Logout</span>
                </button>
            </form>

        </div>

    </div>

</header>
