@extends('layouts.admin')

@section('title', 'Edit Customer')

@section('content')

    {{-- ===================== PAGE HEADER ===================== --}}
    <div class="mb-6">
        <div class="flex items-center gap-2 text-sm text-slate-500 mb-3">
            <a href="{{ route('admin.customer.index') }}" class="hover:text-slate-700 transition">Data Customer</a>
            <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
            </svg>
            <span class="text-slate-900 font-medium">Edit Customer</span>
        </div>
        <div class="flex flex-col gap-4 sm:flex-row sm:items-center sm:justify-between">
            <div>
                <h1 class="text-2xl font-bold text-slate-900">Edit Customer</h1>
                <p class="mt-1 text-sm text-slate-500">Perbarui informasi customer <span
                        class="font-semibold text-slate-700">{{ $customer->nama }}</span>.</p>
            </div>
            <a href="{{ route('admin.customer.index') }}"
                class="inline-flex items-center justify-center gap-2 rounded-xl border border-slate-200 bg-white px-4 py-2.5 text-sm font-semibold text-slate-700 shadow-sm hover:bg-slate-50 transition-colors w-full sm:w-auto">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                </svg>
                Kembali
            </a>
        </div>
    </div>

    @include('admin.partials.alert')

    <div class="rounded-2xl bg-white shadow-sm border border-slate-100 overflow-hidden">
        <div class="border-b border-slate-100 px-6 py-4">
            <div class="flex items-center gap-3">
                <div
                    class="flex h-10 w-10 flex-shrink-0 items-center justify-center rounded-full bg-emerald-100 text-sm font-bold text-emerald-700">
                    {{ strtoupper(substr($customer->nama, 0, 1)) }}
                </div>
                <div>
                    <h3 class="text-base font-bold text-slate-900">{{ $customer->nama }}</h3>
                    <p class="text-xs text-slate-400">Perbarui data customer di bawah ini</p>
                </div>
            </div>
        </div>

        <form action="{{ route('admin.customer.update', $customer->id) }}" method="POST" class="p-6 space-y-6"
            id="customerForm">
            @csrf
            @method('PUT')
            <div class="grid gap-6 sm:grid-cols-2">
                <div>
                    <label for="nama" class="block text-sm font-semibold text-slate-700">Nama <span
                            class="text-red-500">*</span></label>
                    <input type="text" id="nama" name="nama" value="{{ old('nama', $customer->nama) }}" required
                        class="mt-2 block w-full rounded-xl border border-slate-200 px-3.5 py-2.5 text-sm shadow-sm placeholder:text-slate-400 focus:border-emerald-500 focus:outline-none focus:ring-1 focus:ring-emerald-500 transition-colors @error('nama') border-red-400 @enderror">
                    @error('nama')
                        <p class="mt-1.5 text-xs text-red-500">{{ $message }}</p>
                    @enderror
                </div>
                <div>
                    <label for="user_id" class="block text-sm font-semibold text-slate-700">User</label>
                    <select id="user_id" name="user_id"
                        class="mt-2 block w-full rounded-xl border border-slate-200 px-3.5 py-2.5 text-sm shadow-sm focus:border-emerald-500 focus:outline-none focus:ring-1 focus:ring-emerald-500 transition-colors">
                        <option value="">Tidak terkait dengan user</option>
                        @foreach ($users as $user)
                            <option value="{{ $user->id }}"
                                {{ old('user_id', $customer->user_id) == $user->id ? 'selected' : '' }}>{{ $user->name }}
                                ({{ $user->email }})
                            </option>
                        @endforeach
                    </select>
                </div>
                <div>
                    <label for="alamat" class="block text-sm font-semibold text-slate-700">Alamat <span
                            class="text-red-500">*</span></label>
                    <input type="text" id="alamat" name="alamat" value="{{ old('alamat', $customer->alamat) }}"
                        required
                        class="mt-2 block w-full rounded-xl border border-slate-200 px-3.5 py-2.5 text-sm shadow-sm placeholder:text-slate-400 focus:border-emerald-500 focus:outline-none focus:ring-1 focus:ring-emerald-500 transition-colors @error('alamat') border-red-400 @enderror">
                    @error('alamat')
                        <p class="mt-1.5 text-xs text-red-500">{{ $message }}</p>
                    @enderror
                </div>
                <div>
                    <label for="no_identitas" class="block text-sm font-semibold text-slate-700">No Identitas</label>
                    <input type="text" id="no_identitas" name="no_identitas"
                        value="{{ old('no_identitas', $customer->no_identitas) }}"
                        class="mt-2 block w-full rounded-xl border border-slate-200 px-3.5 py-2.5 text-sm shadow-sm placeholder:text-slate-400 focus:border-emerald-500 focus:outline-none focus:ring-1 focus:ring-emerald-500 transition-colors @error('no_identitas') border-red-400 @enderror">
                    @error('no_identitas')
                        <p class="mt-1.5 text-xs text-red-500">{{ $message }}</p>
                    @enderror
                </div>
                <div>
                    <label for="no_telp" class="block text-sm font-semibold text-slate-700">No Telepon <span
                            class="text-red-500">*</span></label>
                    <input type="text" id="no_telp" name="no_telp" value="{{ old('no_telp', $customer->no_telp) }}"
                        required
                        class="mt-2 block w-full rounded-xl border border-slate-200 px-3.5 py-2.5 text-sm shadow-sm placeholder:text-slate-400 focus:border-emerald-500 focus:outline-none focus:ring-1 focus:ring-emerald-500 transition-colors @error('no_telp') border-red-400 @enderror">
                    @error('no_telp')
                        <p class="mt-1.5 text-xs text-red-500">{{ $message }}</p>
                    @enderror
                </div>
                <div>
                    <label for="email" class="block text-sm font-semibold text-slate-700">Email</label>
                    <input type="email" id="email" name="email" value="{{ old('email', $customer->email) }}"
                        class="mt-2 block w-full rounded-xl border border-slate-200 px-3.5 py-2.5 text-sm shadow-sm placeholder:text-slate-400 focus:border-emerald-500 focus:outline-none focus:ring-1 focus:ring-emerald-500 transition-colors @error('email') border-red-400 @enderror">
                    @error('email')
                        <p class="mt-1.5 text-xs text-red-500">{{ $message }}</p>
                    @enderror
                </div>
            </div>

            <div class="flex flex-col-reverse gap-3 border-t border-slate-100 pt-6 sm:flex-row sm:justify-start">
                <a href="{{ route('admin.customer.index') }}"
                    class="inline-flex items-center justify-center gap-2 rounded-xl border border-slate-200 bg-white px-5 py-2.5 text-center text-sm font-semibold text-slate-700 transition hover:bg-slate-50">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                    </svg>
                    Batal
                </a>
                <button type="submit"
                    class="inline-flex items-center justify-center gap-2 rounded-xl bg-emerald-600 px-5 py-2.5 text-sm font-semibold text-white transition hover:bg-emerald-700">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                    </svg>
                    Update Customer
                </button>
            </div>
        </form>
    </div>

@endsection

@push('scripts')
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            @if (session('success'))
                Swal.fire({
                    title: 'Berhasil!',
                    text: @json(session('success')),
                    icon: 'success',
                    confirmButtonColor: '#059669',
                    timer: 2500,
                    timerProgressBar: true,
                    customClass: {
                        popup: 'rounded-2xl'
                    }
                });
            @endif

            @if (session('error'))
                Swal.fire({
                    title: 'Gagal!',
                    text: @json(session('error')),
                    icon: 'error',
                    confirmButtonColor: '#ef4444',
                    customClass: {
                        popup: 'rounded-2xl'
                    }
                });
            @endif

            @if ($errors->any())
                Swal.fire({
                    title: 'Periksa Kembali Form',
                    html: `<ul class="text-left text-sm list-disc pl-5">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>`,
                    icon: 'warning',
                    confirmButtonColor: '#059669',
                    customClass: {
                        popup: 'rounded-2xl'
                    }
                });
            @endif
        });
    </script>
@endpush
