<header
    class="fixed top-0 right-0 left-0 lg:left-64 h-16 px-6 py-6 bg-white/80 backdrop-blur-md border-b border-slate-200 z-30">

    <div class="flex items-center justify-between h-full px-4 sm:px-6 lg:px-8">

        {{-- Left: Hamburger + Page Title --}}
        <div class="flex items-center gap-4">

            {{-- Hamburger (mobile only) --}}
            <button onclick="openSidebar()"
                class="lg:hidden inline-flex items-center justify-center w-9 h-9 rounded-lg text-slate-500 hover:text-slate-800 hover:bg-slate-100 transition">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
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
            <div
                class="hidden md:flex items-center gap-2 text-sm text-slate-500 bg-slate-50 rounded-lg px-3 py-1.5 border border-slate-200">
                <svg class="w-4 h-4 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                </svg>
                <span id="topbar-date" class="font-medium">{{ now()->locale('id')->isoFormat('dddd, D MMM Y') }}</span>
            </div>

            {{-- User Info --}}
            <div class="hidden sm:flex items-center gap-2.5">
                <div class="text-right">
                    <p class="text-sm font-semibold text-slate-800 leading-tight">{{ auth()->user()->name }}</p>
                    <p class="text-xs text-slate-400">Administrator</p>
                </div>
                <div
                    class="w-9 h-9 rounded-xl bg-gradient-to-br from-sky-400 to-sky-600 text-white flex items-center justify-center text-sm font-bold shadow-md shadow-sky-200">
                    {{ strtoupper(substr(auth()->user()->name, 0, 1)) }}
                </div>
            </div>

            <button type="button" data-theme-toggle onclick="toggleTheme()"
                class="inline-flex items-center gap-2 rounded-full border border-slate-300 bg-white px-3 py-2 text-sm font-medium text-slate-700 shadow-sm hover:bg-slate-50 transition duration-150 dark:border-slate-700 dark:bg-slate-900 dark:text-slate-200 dark:hover:bg-slate-800">
                <svg data-theme-icon-moon class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M20.354 15.354A9 9 0 118.646 3.646a7 7 0 1011.708 11.708z" />
                </svg>
                <svg data-theme-icon-sun class="hidden w-4 h-4" fill="none" stroke="currentColor"
                    viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M12 3v2m0 14v2m9-9h-2M5 12H3m15.364-6.364l-1.414 1.414M7.05 16.95l-1.414 1.414m0-11.314l1.414 1.414M16.95 16.95l1.414 1.414M12 7a5 5 0 100 10 5 5 0 000-10z" />
                </svg>
                <span data-theme-toggle-label>Mode Gelap</span>
            </button>

            {{-- Logout --}}
            <form action="{{ route('logout') }}" method="POST">
                @csrf
                <button type="submit"
                    class="inline-flex items-center gap-1.5 text-sm font-medium bg-red-50 hover:bg-red-100 text-red-600 hover:text-red-700 border border-red-200 px-3 py-1.5 rounded-lg transition-colors duration-200">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1" />
                    </svg>
                    <span class="hidden sm:inline">Logout</span>
                </button>
            </form>

        </div>

    </div>

</header>
