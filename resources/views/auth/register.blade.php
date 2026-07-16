<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <title>Rentify Register</title>
    @include('partials.theme-script')
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-slate-100">

    <div class="min-h-screen flex">

        {{-- ===================== LEFT (branding) ===================== --}}
        <div class="hidden lg:block w-1/2 relative">
            <img src="{{ asset('images/auth.jpg') }}" alt="Rentify" class="absolute inset-0 w-full h-full object-cover">

            <div class="absolute inset-0 bg-gradient-to-t from-slate-950/80 via-slate-900/40 to-slate-900/20"></div>

            <div class="absolute -top-10 -right-10 w-56 h-56 rounded-full bg-blue-500/20 blur-3xl"></div>
            <div class="absolute bottom-0 left-0 w-72 h-72 rounded-full bg-sky-400/10 blur-3xl"></div>

            <div class="absolute top-10 left-10 flex items-center gap-2.5">
                <div
                    class="flex h-10 w-10 items-center justify-center rounded-xl bg-white/15 backdrop-blur-sm ring-1 ring-white/20">
                    <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M8 17h8m-8-4h8m-9 8h10a2 2 0 002-2V5a2 2 0 00-2-2H7a2 2 0 00-2 2v14a2 2 0 002 2z" />
                    </svg>
                </div>
                <span class="text-lg font-bold text-white tracking-tight">Rentify</span>
            </div>

            <div class="absolute bottom-16 left-10 right-10 text-white max-w-md">
                <span
                    class="inline-flex items-center gap-1.5 rounded-full bg-white/10 px-3 py-1 text-xs font-semibold text-white backdrop-blur-sm ring-1 ring-white/20">
                    <span class="w-1.5 h-1.5 rounded-full bg-emerald-400"></span>
                    Bergabung dalam hitungan menit
                </span>
                <h1 class="mt-4 text-4xl xl:text-5xl font-extrabold leading-tight">
                    Temukan Kebebasan<br>di Setiap Perjalanan
                </h1>
                <p class="mt-5 text-base text-slate-200 leading-relaxed">
                    Nikmati kenyamanan berkendara dengan pilihan armada terbaik
                    dan proses pemesanan yang transparan.
                </p>
            </div>
        </div>

        {{-- ===================== RIGHT (form) ===================== --}}
        <div class="w-full lg:w-1/2 flex flex-col justify-center items-center bg-slate-100 px-6 py-10">

            <div class="mb-6 flex items-center gap-2.5 lg:hidden">
                <div class="flex h-10 w-10 items-center justify-center rounded-xl bg-blue-600 text-white shadow-sm">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M8 17h8m-8-4h8m-9 8h10a2 2 0 002-2V5a2 2 0 00-2-2H7a2 2 0 00-2 2v14a2 2 0 002 2z" />
                    </svg>
                </div>
                <span class="text-lg font-bold text-slate-900 tracking-tight">Rentify</span>
            </div>

            <div class="bg-white rounded-2xl shadow-sm border border-slate-100 w-full max-w-md p-8">

                {{-- Tabs --}}
                <div class="mb-8 flex rounded-xl bg-slate-100 p-1">
                    <a href="{{ route('login') }}"
                        class="flex-1 rounded-lg py-2.5 text-center text-sm font-medium text-slate-500 transition hover:text-slate-700">
                        Login
                    </a>
                    <a href="{{ route('register') }}"
                        class="flex-1 rounded-lg bg-white py-2.5 text-center text-sm font-semibold text-blue-700 shadow-sm transition">
                        Register
                    </a>
                </div>

                <h2 class="text-2xl font-bold text-slate-900">Buat Akun Baru</h2>
                <p class="mt-1.5 mb-6 text-sm text-slate-500">Daftarkan akun Rentify Anda untuk mulai booking.</p>

                <form method="POST" action="{{ route('register') }}" class="space-y-5">
                    @csrf

                    {{-- Nama --}}
                    <div>
                        <label class="block text-sm font-semibold text-slate-700 mb-1.5">Nama Lengkap</label>
                        <div class="relative">
                            <span
                                class="pointer-events-none absolute inset-y-0 left-0 flex items-center pl-3.5 text-slate-400">
                                <svg width="18" height="18" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                                </svg>
                            </span>
                            <input type="text" name="name" placeholder="Nama lengkap" value="{{ old('name') }}"
                                required autofocus
                                class="block w-full rounded-xl border bg-slate-50 pl-10 pr-4 py-2.5 text-sm text-slate-900 placeholder-slate-400 transition focus:bg-white focus:outline-none focus:ring-2 focus:ring-blue-100
                                @error('name') border-red-400 @else border-slate-200 focus:border-blue-500 @enderror">
                        </div>
                        @error('name')
                            <p class="mt-1.5 text-xs font-medium text-red-500">{{ $message }}</p>
                        @enderror
                    </div>

                    {{-- Email --}}
                    <div>
                        <label class="block text-sm font-semibold text-slate-700 mb-1.5">Email</label>
                        <div class="relative">
                            <span
                                class="pointer-events-none absolute inset-y-0 left-0 flex items-center pl-3.5 text-slate-400">
                                <svg width="18" height="18" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                                </svg>
                            </span>
                            <input type="email" name="email" placeholder="contoh@email.com"
                                value="{{ old('email') }}" required
                                class="block w-full rounded-xl border bg-slate-50 pl-10 pr-4 py-2.5 text-sm text-slate-900 placeholder-slate-400 transition focus:bg-white focus:outline-none focus:ring-2 focus:ring-blue-100
                                @error('email') border-red-400 @else border-slate-200 focus:border-blue-500 @enderror">
                        </div>
                        @error('email')
                            <p class="mt-1.5 text-xs font-medium text-red-500">{{ $message }}</p>
                        @enderror
                    </div>

                    {{-- Password --}}
                    <div>
                        <label class="block text-sm font-semibold text-slate-700 mb-1.5">Password</label>
                        <div class="relative">
                            <span
                                class="pointer-events-none absolute inset-y-0 left-0 flex items-center pl-3.5 text-slate-400">
                                <svg width="18" height="18" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z" />
                                </svg>
                            </span>
                            <input type="password" name="password" placeholder="••••••••" required id="password"
                                class="block w-full rounded-xl border bg-slate-50 pl-10 pr-11 py-2.5 text-sm text-slate-900 placeholder-slate-400 transition focus:bg-white focus:outline-none focus:ring-2 focus:ring-blue-100
                                @error('password') border-red-400 @else border-slate-200 focus:border-blue-500 @enderror">
                            <button type="button" onclick="togglePassword('password', 'eyeIcon1')"
                                class="absolute inset-y-0 right-0 flex items-center pr-3.5 text-slate-400 hover:text-slate-600">
                                <svg id="eyeIcon1" width="18" height="18" fill="none"
                                    stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                </svg>
                            </button>
                        </div>
                        @error('password')
                            <p class="mt-1.5 text-xs font-medium text-red-500">{{ $message }}</p>
                        @enderror
                    </div>

                    {{-- Konfirmasi Password --}}
                    <div>
                        <label class="block text-sm font-semibold text-slate-700 mb-1.5">Konfirmasi Password</label>
                        <div class="relative">
                            <span
                                class="pointer-events-none absolute inset-y-0 left-0 flex items-center pl-3.5 text-slate-400">
                                <svg width="18" height="18" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>
                            </span>
                            <input type="password" name="password_confirmation" placeholder="••••••••" required
                                id="password_confirmation"
                                class="block w-full rounded-xl border border-slate-200 bg-slate-50 pl-10 pr-11 py-2.5 text-sm text-slate-900 placeholder-slate-400 transition focus:border-blue-500 focus:bg-white focus:outline-none focus:ring-2 focus:ring-blue-100">
                            <button type="button" onclick="togglePassword('password_confirmation', 'eyeIcon2')"
                                class="absolute inset-y-0 right-0 flex items-center pr-3.5 text-slate-400 hover:text-slate-600">
                                <svg id="eyeIcon2" width="18" height="18" fill="none"
                                    stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                </svg>
                            </button>
                        </div>
                    </div>

                    <button type="submit"
                        class="w-full inline-flex items-center justify-center gap-2 rounded-xl bg-blue-600 py-3 text-sm font-semibold text-white shadow-sm transition hover:bg-blue-700">
                        Register
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M17 8l4 4m0 0l-4 4m4-4H3" />
                        </svg>
                    </button>
                </form>

                <p class="mt-6 text-center text-sm text-slate-500">
                    Sudah punya akun?
                    <a href="{{ route('login') }}"
                        class="font-semibold text-blue-600 hover:text-blue-700 hover:underline">Masuk di sini</a>
                </p>
            </div>

            <p class="mt-6 text-xs text-slate-400">&copy; {{ date('Y') }} Rentify. All rights reserved.</p>
        </div>

    </div>

    <script>
        function togglePassword(inputId, iconId) {
            const input = document.getElementById(inputId);
            const eye = document.getElementById(iconId);
            if (input.type === 'password') {
                input.type = 'text';
                eye.innerHTML =
                    '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13.875 18.825A10.05 10.05 0 0112 19c-4.478 0-8.268-2.943-9.542-7a9.97 9.97 0 011.563-3.029m5.858.908a3 3 0 114.243 4.243M9.878 9.878l4.242 4.242M9.878 9.878L3 3m6.878 6.878L21 21"/>';
            } else {
                input.type = 'password';
                eye.innerHTML =
                    '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/>';
            }
        }

        @if ($errors->any())
            Swal.fire({
                icon: 'error',
                title: 'Registrasi Gagal',
                text: @json($errors->first()),
                confirmButtonColor: '#2563eb'
            });
        @endif
    </script>
</body>

</html>
