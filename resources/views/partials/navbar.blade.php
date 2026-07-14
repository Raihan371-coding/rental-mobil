<nav class="fixed top-0 left-0 z-50 w-full border-b border-slate-200 bg-white/90 backdrop-blur-sm"
    x-data="{ mobileOpen: false, userMenuOpen: false }">
    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
        <div class="flex h-16 items-center justify-between">

            {{-- Logo --}}
            <a href="{{ url('/') }}" class="flex items-center gap-2">
                <span
                    class="flex h-9 w-9 items-center justify-center rounded-xl bg-gradient-to-br from-blue-600 to-sky-600 text-white shadow-sm">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M8 17l4 4 4-4m-4-5v9M3 4h18M4 4v3.34a2 2 0 00.4 1.2l3.2 4.26M20 4v3.34a2 2 0 01-.4 1.2l-3.2 4.26" />
                    </svg>
                </span>
                <span class="text-xl font-bold text-blue-600">Rentify</span>
            </a>

            {{-- Desktop nav links --}}
            <div class="hidden md:flex items-center gap-1">
                <a href="{{ url('/') }}"
                    class="rounded-full px-3.5 py-2 text-sm font-medium transition-colors {{ request()->is('/') ? 'bg-blue-50 text-blue-700' : 'text-gray-600 hover:bg-gray-50 hover:text-gray-900' }}">Beranda</a>
                <a href="{{ route('home') }}#how-it-works"
                    class="rounded-full px-3.5 py-2 text-sm font-medium text-gray-600 hover:bg-gray-50 hover:text-gray-900 transition-colors">Cara
                    Kerja</a>
                <a href="{{ route('home') }}#promo"
                    class="rounded-full px-3.5 py-2 text-sm font-medium text-gray-600 hover:bg-gray-50 hover:text-gray-900 transition-colors">Promo</a>
                <a href="{{ route('home') }}#katalog"
                    class="rounded-full px-3.5 py-2 text-sm font-medium text-gray-600 hover:bg-gray-50 hover:text-gray-900 transition-colors">Katalog</a>
                <a href="{{ route('home') }}#testimoni"
                    class="rounded-full px-3.5 py-2 text-sm font-medium text-gray-600 hover:bg-gray-50 hover:text-gray-900 transition-colors">Testimoni</a>
                <a href="{{ route('home') }}#kontak"
                    class="rounded-full px-3.5 py-2 text-sm font-medium text-gray-600 hover:bg-gray-50 hover:text-gray-900 transition-colors">Kontak</a>
            </div>

            {{-- Desktop right side --}}
            <div class="hidden md:flex items-center gap-2">
                @auth
                    @php $user = auth()->user(); @endphp
                    @if (($user->role ?? null) === 'admin' || ($user->is_admin ?? false))
                        <a href="{{ route('admin.dashboard') }}"
                            class="rounded-full px-3.5 py-2 text-sm font-medium text-gray-700 hover:bg-gray-100 transition-colors">Dashboard</a>
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button type="submit"
                                class="rounded-full px-3.5 py-2 text-sm font-medium text-gray-700 hover:bg-gray-100 transition-colors">Logout</button>
                        </form>
                    @else
                        <div class="relative">
                            <button type="button" @click="userMenuOpen = !userMenuOpen"
                                @click.outside="userMenuOpen = false"
                                class="inline-flex items-center gap-1.5 rounded-full px-3.5 py-2 text-sm font-medium text-gray-700 hover:bg-gray-100 transition-colors"
                                aria-haspopup="true" :aria-expanded="userMenuOpen">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                                </svg>
                                Akun
                                <svg class="w-4 h-4 transition-transform" :class="userMenuOpen ? 'rotate-180' : ''"
                                    fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M19 9l-7 7-7-7" />
                                </svg>
                            </button>
                            <div x-show="userMenuOpen" x-cloak x-transition
                                class="absolute right-0 mt-2 w-48 origin-top-right rounded-xl bg-white py-1.5 shadow-lg border border-slate-100">
                                <a href="{{ route('customer.profile') }}"
                                    class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-50">Profile</a>
                                <a href="{{ route('customer.dashboard') }}"
                                    class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-50">Dashboard</a>
                                <form method="POST" action="{{ route('logout') }}"
                                    class="border-t border-slate-100 mt-1 pt-1">
                                    @csrf
                                    <button type="submit"
                                        class="w-full text-left block px-4 py-2 text-sm text-gray-700 hover:bg-gray-50">Logout</button>
                                </form>
                            </div>
                        </div>
                    @endif
                @else
                    <a href="{{ route('login') }}"
                        class="rounded-full px-3.5 py-2 text-sm font-medium text-gray-700 hover:bg-gray-100 transition-colors">Login</a>
                    <a href="{{ route('register') }}"
                        class="rounded-full bg-blue-600 px-4 py-2 text-sm font-semibold text-white hover:bg-blue-700 transition-colors shadow-sm">Get
                        Started</a>
                @endauth
            </div>

            {{-- Mobile menu toggle --}}
            <button type="button" @click="mobileOpen = !mobileOpen"
                class="md:hidden flex h-10 w-10 items-center justify-center rounded-xl text-gray-700 hover:bg-gray-100 transition-colors"
                :aria-expanded="mobileOpen">
                <span class="sr-only">Buka menu</span>
                <svg x-show="!mobileOpen" class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                </svg>
                <svg x-show="mobileOpen" x-cloak class="w-6 h-6" fill="none" stroke="currentColor"
                    viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                </svg>
            </button>
        </div>
    </div>

    {{-- Mobile menu panel --}}
    <div x-show="mobileOpen" x-cloak x-transition class="md:hidden border-t border-slate-200 bg-white">
        <div class="px-4 py-3 space-y-1">
            <a href="{{ url('/') }}"
                class="block rounded-xl px-3 py-2.5 text-sm font-medium transition-colors {{ request()->is('/') ? 'bg-blue-600 text-white' : 'text-gray-600 hover:bg-gray-50 hover:text-gray-900' }}">Beranda</a>
            <a href="{{ route('home') }}#how-it-works"
                class="block rounded-xl px-3 py-2.5 text-sm font-medium text-gray-600 hover:bg-gray-50 hover:text-gray-900 transition-colors">Cara
                Kerja</a>
            <a href="{{ route('home') }}#promo"
                class="block rounded-xl px-3 py-2.5 text-sm font-medium text-gray-600 hover:bg-gray-50 hover:text-gray-900 transition-colors">Promo</a>
            <a href="{{ route('home') }}#katalog"
                class="block rounded-xl px-3 py-2.5 text-sm font-medium text-gray-600 hover:bg-gray-50 hover:text-gray-900 transition-colors">Katalog</a>
            <a href="{{ route('home') }}#testimoni"
                class="block rounded-xl px-3 py-2.5 text-sm font-medium text-gray-600 hover:bg-gray-50 hover:text-gray-900 transition-colors">Testimoni</a>
            <a href="{{ route('home') }}#kontak"
                class="block rounded-xl px-3 py-2.5 text-sm font-medium text-gray-600 hover:bg-gray-50 hover:text-gray-900 transition-colors">Kontak</a>

            <div class="border-t border-slate-200 pt-2 mt-2 space-y-1">
                @auth
                    @php $user = auth()->user(); @endphp
                    @if (($user->role ?? null) === 'admin' || ($user->is_admin ?? false))
                        <a href="{{ route('admin.dashboard') }}"
                            class="block rounded-xl px-3 py-2.5 text-sm font-medium text-gray-700 hover:bg-gray-50">Dashboard</a>
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button type="submit"
                                class="w-full text-left rounded-xl px-3 py-2.5 text-sm font-medium text-gray-700 hover:bg-gray-50">Logout</button>
                        </form>
                    @else
                        <a href="{{ route('customer.profile') }}"
                            class="block rounded-xl px-3 py-2.5 text-sm font-medium text-gray-700 hover:bg-gray-50">Profile</a>
                        <a href="{{ route('customer.dashboard') }}"
                            class="block rounded-xl px-3 py-2.5 text-sm font-medium text-gray-700 hover:bg-gray-50">Dashboard</a>
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button type="submit"
                                class="w-full text-left rounded-xl px-3 py-2.5 text-sm font-medium text-gray-700 hover:bg-gray-50">Logout</button>
                        </form>
                    @endif
                @else
                    <a href="{{ route('login') }}"
                        class="block rounded-xl px-3 py-2.5 text-sm font-medium text-gray-700 hover:bg-gray-50">Login</a>
                    <a href="{{ route('register') }}"
                        class="block rounded-xl px-3 py-2.5 text-sm font-semibold bg-blue-600 text-white hover:bg-blue-700 text-center">Get
                        Started</a>
                @endauth
            </div>
        </div>
    </div>
</nav>
