<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rentify Login</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-gray-100">

    <div class="min-h-screen flex">

        <!-- LEFT -->
        <div class="hidden lg:block w-1/2 relative">

            <!-- Background -->
            <img src="{{ asset('build/assets/images/car.jpg ') }}" class="absolute inset-0 w-full h-full object-cover">

            <!-- Overlay -->
            <div class="absolute inset-0 bg-slate-900/55"></div>

            <!-- Content -->
            <div class="absolute bottom-16 left-10 text-white max-w-md">

                <h3 class="text-2xl font-bold">
                    Rentify
                </h3>

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

        <!-- RIGHT -->
        <div class="w-full lg:w-1/2 flex justify-center items-center bg-gray-100 px-6">

            <div class="bg-white rounded-xl shadow-lg w-full max-w-md p-8">

                <!-- Tabs -->
                <div class="mb-8 flex border-b">
                    <a href="{{ route('login') }}"
                        class="flex-1 border-b-2 border-blue-600 py-3 text-center text-sm font-semibold text-blue-700">
                        LOGIN
                    </a>

                    <a href="{{ route('register') }}"
                        class="flex-1 py-3 text-center text-sm text-gray-400 transition hover:text-blue-700">
                        REGISTER
                    </a>
                </div>

                <h2 class="text-2xl font-bold">
                    Selamat Datang Kembali
                </h2>

                <p class="text-gray-500 mt-2 mb-6">
                    Silakan masuk ke akun Rentify Anda.
                </p>

                <form method="POST" action="{{ route('login') }}">
                    @csrf

                    <!-- Email -->
                    <div class="mb-5">

                        <label class="text-sm font-medium">
                            Email
                        </label>

                        <input type="email" name="email" placeholder="contoh@email.com"
                            class="mt-2 w-full rounded-lg border border-gray-300 px-4 py-3 focus:ring-2 focus:ring-blue-400 focus:outline-none">

                    </div>

                    <!-- Password -->
                    <div class="mb-5">

                        <label class="text-sm font-medium">
                            Password
                        </label>

                        <input type="password" name="password" placeholder="********"
                            class="mt-2 w-full rounded-lg border border-gray-300 px-4 py-3 focus:ring-2 focus:ring-blue-400 focus:outline-none">

                    </div>

                    <div class="flex justify-between items-center text-sm mb-6">

                        <label class="flex items-center gap-2">
                            <input type="checkbox">
                            Ingat saya
                        </label>

                        <a href="#" class="text-blue-600 hover:underline">
                            Lupa password?
                        </a>

                    </div>

                    <button
                        class="w-full bg-blue-500 hover:bg-blue-600 text-white rounded-lg py-3 font-semibold transition">
                        Login →
                    </button>

                </form>

            </div>

        </div>

    </div>

</body>

</html>
