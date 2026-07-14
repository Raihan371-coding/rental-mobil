<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rentify Register</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-gray-100">
    <div class="flex min-h-screen">
        <div class="hidden lg:block relative w-1/2">
            <img src="{{ asset('build/assets/images/car.jpg ') }}" class="absolute inset-0 h-full w-full object-cover">
            <div class="absolute inset-0 bg-slate-900/55"></div>

            <div class="absolute bottom-16 left-10 max-w-md text-white">
                <h3 class="text-2xl font-bold">Rentify</h3>
                <h1 class="mt-2 text-5xl font-extrabold leading-tight">
                    Temukan Kebebasan <br>
                    di Setiap Perjalanan
                </h1>
                <p class="mt-6 text-lg text-gray-200">
                    Nikmati kenyamanan berkendara dengan pilihan armada terbaik
                    dan proses pemesanan yang transparan.
                </p>
            </div>
        </div>

        <div class="flex w-full items-center justify-center bg-gray-100 px-6 lg:w-1/2">
            <div class="w-full max-w-md rounded-xl bg-white p-8 shadow-lg">
                <div class="mb-8 flex border-b">
                    <a href="{{ route('login') }}"
                        class="flex-1 py-3 text-center text-sm text-gray-400 transition hover:text-blue-700">
                        LOGIN
                    </a>
                    <a href="{{ route('register') }}"
                        class="flex-1 border-b-2 border-blue-600 py-3 text-center text-sm font-semibold text-blue-700">
                        REGISTER
                    </a>
                </div>

                <h2 class="text-2xl font-bold">Buat Akun Baru</h2>
                <p class="mt-2 mb-6 text-gray-500">Daftarkan akun Rentify Anda untuk mulai booking.</p>

                <form method="POST" action="{{ route('register') }}">
                    @csrf

                    <div class="mb-5">
                        <label class="text-sm font-medium">Nama Lengkap</label>
                        <input type="text" name="name" placeholder="Nama lengkap" value="{{ old('name') }}"
                            required autofocus
                            class="mt-2 w-full rounded-lg border border-gray-300 px-4 py-3 focus:outline-none focus:ring-2 focus:ring-blue-400">
                        @error('name')
                            <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="mb-5">
                        <label class="text-sm font-medium">Email</label>
                        <input type="email" name="email" placeholder="contoh@email.com" value="{{ old('email') }}"
                            required
                            class="mt-2 w-full rounded-lg border border-gray-300 px-4 py-3 focus:outline-none focus:ring-2 focus:ring-blue-400">
                        @error('email')
                            <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="mb-5">
                        <label class="text-sm font-medium">Password</label>
                        <input type="password" name="password" placeholder="********" required
                            class="mt-2 w-full rounded-lg border border-gray-300 px-4 py-3 focus:outline-none focus:ring-2 focus:ring-blue-400">
                        @error('password')
                            <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="mb-6">
                        <label class="text-sm font-medium">Konfirmasi Password</label>
                        <input type="password" name="password_confirmation" placeholder="********" required
                            class="mt-2 w-full rounded-lg border border-gray-300 px-4 py-3 focus:outline-none focus:ring-2 focus:ring-blue-400">
                    </div>

                    <button type="submit"
                        class="w-full rounded-lg bg-blue-500 py-3 font-semibold text-white transition hover:bg-blue-600">
                        Register →
                    </button>
                </form>
            </div>
        </div>
    </div>
</body>

</html>
