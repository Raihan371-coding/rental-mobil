@extends('layouts.landing')

@section('title', 'Login')

@section('content')
  <div class="max-w-3xl mx-auto mt-16 grid gap-10 lg:grid-cols-[1.3fr_1fr] items-center">
    <div class="rounded-3xl bg-gradient-to-br from-blue-600 to-cyan-500 p-10 text-white shadow-xl">
      <h1 class="text-4xl font-bold">Selamat datang kembali!</h1>
      <p class="mt-4 text-lg text-blue-100/90">Masuk untuk mengelola pemesanan dan melihat armada terbaru kami.</p>
      <div class="mt-8 rounded-3xl bg-white/10 p-6">
        <p class="font-semibold">Kamu bisa login dengan email dan password yang sudah terdaftar.</p>
      </div>
    </div>

    <div class="rounded-3xl bg-white p-10 shadow-xl border border-gray-200">
      <div class="flex items-center justify-between mb-8">
        <div>
          <h2 class="text-2xl font-semibold text-gray-900">Login</h2>
          <p class="mt-1 text-sm text-gray-500">Masukkan kredensial untuk melanjutkan.</p>
        </div>
        <a href="{{ route('register') }}" class="inline-flex items-center gap-2 rounded-full border border-blue-600 bg-blue-50 px-4 py-2 text-sm font-medium text-blue-700 hover:bg-blue-100">Daftar</a>
      </div>

      <form method="POST" action="{{ route('login') }}" class="space-y-5">
        @csrf

        <div>
          <label class="block text-sm font-medium text-gray-700">Email</label>
          <input type="email" name="email" value="{{ old('email') }}" required autofocus class="mt-2 w-full rounded-2xl border border-gray-200 bg-gray-50 px-4 py-3 text-gray-900 shadow-sm focus:border-blue-500 focus:outline-none focus:ring-2 focus:ring-blue-200">
          @error('email') <p class="mt-2 text-sm text-red-600">{{ $message }}</p> @enderror
        </div>

        <div>
          <label class="block text-sm font-medium text-gray-700">Password</label>
          <input type="password" name="password" required class="mt-2 w-full rounded-2xl border border-gray-200 bg-gray-50 px-4 py-3 text-gray-900 shadow-sm focus:border-blue-500 focus:outline-none focus:ring-2 focus:ring-blue-200">
          @error('password') <p class="mt-2 text-sm text-red-600">{{ $message }}</p> @enderror
        </div>

        <div class="flex items-center justify-between text-sm text-gray-500">
          <label class="inline-flex items-center gap-2">
            <input type="checkbox" name="remember" class="h-4 w-4 rounded border-gray-300 text-blue-600 focus:ring-blue-500">
            Remember me
          </label>
          @if(Route::has('password.request'))
            <a href="{{ route('password.request') }}" class="font-medium text-blue-600 hover:text-blue-700">Lupa password?</a>
          @endif
        </div>

        <button type="submit" class="w-full rounded-2xl bg-blue-600 px-5 py-3 text-base font-semibold text-white shadow-lg shadow-blue-500/20 transition hover:bg-blue-700">Masuk</button>
      </form>
    </div>
  </div>
@endsection
