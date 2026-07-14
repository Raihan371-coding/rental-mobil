@extends('layouts.admin')

@section('title', 'Tambah Service')

@section('content')

    {{-- ===================== PAGE HEADER ===================== --}}
    <div class="mb-6">
        <div class="flex items-center gap-2 text-sm text-slate-500 mb-3">
            <a href="{{ route('admin.service.index') }}" class="hover:text-slate-700 transition">Data Service</a>
            <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
            </svg>
            <span class="text-slate-900 font-medium">Tambah Service</span>
        </div>
        <div class="flex flex-col gap-4 sm:flex-row sm:items-center sm:justify-between">
            <div>
                <h1 class="text-2xl font-bold text-slate-900">Tambah Service Baru</h1>
                <p class="mt-1 text-sm text-slate-500">Tambahkan data service baru</p>
            </div>
            <a href="{{ route('admin.service.index') }}"
                class="inline-flex items-center justify-center gap-2 rounded-xl border border-slate-200 bg-white px-4 py-2.5 text-sm font-semibold text-slate-700 hover:bg-slate-50 transition-colors w-full sm:w-auto">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                </svg>
                Kembali
            </a>
        </div>
    </div>

    @include('admin.partials.alert')

    <div class="rounded-2xl bg-white shadow-sm border border-slate-100 overflow-hidden">
        <div class="flex items-center gap-3 border-b border-slate-100 bg-slate-50 px-6 py-4">
            <div class="flex h-10 w-10 flex-shrink-0 items-center justify-center rounded-xl bg-cyan-100 text-cyan-600">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z" />
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                </svg>
            </div>
            <div>
                <h2 class="text-base font-bold text-slate-900">Form Tambah Service</h2>
                <p class="text-xs text-slate-400">Lengkapi data di bawah ini</p>
            </div>
        </div>

        <form action="{{ route('admin.service.store') }}" method="POST" class="space-y-6 p-6">
            @csrf

            <div class="grid gap-5 sm:grid-cols-2">
                <div>
                    <label class="block text-sm font-semibold text-slate-700 mb-1.5">Mobil</label>
                    <select name="mobil_id"
                        class="block w-full rounded-xl border border-slate-200 bg-slate-50 px-4 py-2.5 text-sm text-slate-900 focus:border-cyan-500 focus:bg-white focus:outline-none focus:ring-2 focus:ring-cyan-100 transition">
                        <option value="">Pilih Mobil</option>
                        @foreach ($mobils as $mobil)
                            <option value="{{ $mobil->id }}" {{ old('mobil_id') == $mobil->id ? 'selected' : '' }}>
                                {{ $mobil->nama_mobil }}</option>
                        @endforeach
                    </select>
                    @error('mobil_id')
                        <p class="mt-1 text-xs text-red-500">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label class="block text-sm font-semibold text-slate-700 mb-1.5">Tanggal Service</label>
                    <input type="date" name="tanggal_service" value="{{ old('tanggal_service') }}"
                        class="block w-full rounded-xl border border-slate-200 bg-slate-50 px-4 py-2.5 text-sm text-slate-900 focus:border-cyan-500 focus:bg-white focus:outline-none focus:ring-2 focus:ring-cyan-100 transition">
                    @error('tanggal_service')
                        <p class="mt-1 text-xs text-red-500">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label class="block text-sm font-semibold text-slate-700 mb-1.5">Biaya</label>
                    <div class="relative">
                        <span class="absolute left-3 top-1/2 -translate-y-1/2 text-sm font-medium text-slate-500">Rp</span>
                        <input type="number" name="biaya_service" value="{{ old('biaya_service') }}"
                            class="block w-full rounded-xl border border-slate-200 bg-slate-50 pl-10 pr-4 py-2.5 text-sm text-slate-900 placeholder-slate-400 focus:border-cyan-500 focus:bg-white focus:outline-none focus:ring-2 focus:ring-cyan-100 transition"
                            placeholder="250000">
                    </div>
                    @error('biaya_service')
                        <p class="mt-1 text-xs text-red-500">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label class="block text-sm font-semibold text-slate-700 mb-1.5">Status</label>
                    <select name="status_service"
                        class="block w-full rounded-xl border border-slate-200 bg-slate-50 px-4 py-2.5 text-sm text-slate-900 focus:border-cyan-500 focus:bg-white focus:outline-none focus:ring-2 focus:ring-cyan-100 transition">
                        <option value="pending" {{ old('status_service') == 'pending' ? 'selected' : '' }}>Pending</option>
                        <option value="proses" {{ old('status_service') == 'proses' ? 'selected' : '' }}>Proses</option>
                        <option value="selesai" {{ old('status_service') == 'selesai' ? 'selected' : '' }}>Selesai</option>
                    </select>
                    @error('status_service')
                        <p class="mt-1 text-xs text-red-500">{{ $message }}</p>
                    @enderror
                </div>

                <div class="sm:col-span-2">
                    <label class="block text-sm font-semibold text-slate-700 mb-1.5">Deskripsi</label>
                    <textarea name="deskripsi" rows="4"
                        class="block w-full rounded-xl border border-slate-200 bg-slate-50 px-4 py-2.5 text-sm text-slate-900 focus:border-cyan-500 focus:bg-white focus:outline-none focus:ring-2 focus:ring-cyan-100 transition">{{ old('deskripsi') }}</textarea>
                    @error('deskripsi')
                        <p class="mt-1 text-xs text-red-500">{{ $message }}</p>
                    @enderror
                </div>
            </div>

            <div class="flex flex-col-reverse gap-3 pt-2 border-t border-slate-100 sm:flex-row sm:items-center">
                <a href="{{ route('admin.service.index') }}"
                    class="inline-flex items-center justify-center gap-2 rounded-xl border border-slate-200 bg-white px-5 py-2.5 text-sm font-semibold text-slate-700 hover:bg-slate-50 transition-colors">
                    Batal
                </a>
                <button type="submit"
                    class="inline-flex items-center justify-center gap-2 rounded-xl bg-cyan-600 px-5 py-2.5 text-sm font-semibold text-white hover:bg-cyan-700 transition-colors shadow-sm">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                    </svg>
                    Simpan
                </button>
            </div>
        </form>
    </div>

@endsection

@push('scripts')
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        @if (session('success'))
            Swal.fire({
                icon: 'success',
                title: 'Berhasil!',
                text: @json(session('success')),
                confirmButtonColor: '#0891b2',
                timer: 2500,
                timerProgressBar: true
            });
        @endif

        @if ($errors->any())
            Swal.fire({
                icon: 'error',
                title: 'Data belum lengkap',
                html: `<ul style="text-align:left; margin:0; padding-left:1.1em;">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>`,
                confirmButtonColor: '#ef4444'
            });
        @endif
    </script>
@endpush
