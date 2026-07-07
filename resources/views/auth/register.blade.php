@extends('layouts.landing')

@section('title', 'Register')

@section('content')
  <div class="max-w-3xl mx-auto mt-16 grid gap-10 lg:grid-cols-[1.3fr_1fr] items-center">
    <div class="rounded-3xl bg-gradient-to-br from-slate-900 via-slate-700 to-blue-600 p-10 text-white shadow-xl">
      <h1 class="text-4xl font-bold">Buat akun baru</h1>
      <p class="mt-4 text-lg text-slate-200/90">Daftar untuk mulai menyewa mobil, melihat riwayat pesanan, dan mengelola reservasi Anda.</p>
      <div class="mt-8 rounded-3xl bg-white/10 p-6">
        <p class="font-semibold text-white/90">Dapatkan pengalaman penyewaan mobil yang cepat dan aman bersama kami.</p>
      </div>
    </div>

    <div class="rounded-3xl bg-white p-10 shadow-xl border border-gray-200">
      <div class="flex items-center justify-between mb-8">
        <div>
          <h2 class="text-2xl font-semibold text-gray-900">Daftar Akun</h2>
          <p class="mt-1 text-sm text-gray-500">Isi informasi di bawah untuk membuat akun baru.</p>
        </div>
        <a href="{{ route('login') }}" class="inline-flex items-center gap-2 rounded-full border border-slate-300 bg-slate-50 px-4 py-2 text-sm font-medium text-slate-700 hover:bg-slate-100">Login</a>
      </div>

      <form method="POST" action="{{ route('register') }}" class="space-y-5">
        @csrf

        <div>
          <label class="block text-sm font-medium text-gray-700">Nama Lengkap</label>
          <input type="text" name="name" value="{{ old('name') }}" required autofocus class="mt-2 w-full rounded-2xl border border-gray-200 bg-gray-50 px-4 py-3 text-gray-900 shadow-sm focus:border-blue-500 focus:outline-none focus:ring-2 focus:ring-blue-200">
          @error('name') <p class="mt-2 text-sm text-red-600">{{ $message }}</p> @enderror
        </div>

        <div>
          <label class="block text-sm font-medium text-gray-700">Email</label>
          <input type="email" name="email" value="{{ old('email') }}" required class="mt-2 w-full rounded-2xl border border-gray-200 bg-gray-50 px-4 py-3 text-gray-900 shadow-sm focus:border-blue-500 focus:outline-none focus:ring-2 focus:ring-blue-200">
          @error('email') <p class="mt-2 text-sm text-red-600">{{ $message }}</p> @enderror
        </div>

        <div>
          <label class="block text-sm font-medium text-gray-700">Password</label>
          <input type="password" name="password" required class="mt-2 w-full rounded-2xl border border-gray-200 bg-gray-50 px-4 py-3 text-gray-900 shadow-sm focus:border-blue-500 focus:outline-none focus:ring-2 focus:ring-blue-200">
          @error('password') <p class="mt-2 text-sm text-red-600">{{ $message }}</p> @enderror
        </div>

        <div>
          <label class="block text-sm font-medium text-gray-700">Konfirmasi Password</label>
          <input type="password" name="password_confirmation" required class="mt-2 w-full rounded-2xl border border-gray-200 bg-gray-50 px-4 py-3 text-gray-900 shadow-sm focus:border-blue-500 focus:outline-none focus:ring-2 focus:ring-blue-200">
        </div>

        <button type="submit" class="w-full rounded-2xl bg-slate-900 px-5 py-3 text-base font-semibold text-white shadow-lg shadow-slate-900/10 transition hover:bg-slate-800">Daftar</button>
      </form>
    </div>
  </div>
@endsection
