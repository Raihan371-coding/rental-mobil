@extends('layouts.admin')
@section('title', 'Edit Promo')
@section('content')

    <div class="mb-6">
        <div class="flex items-center gap-2 text-sm text-slate-500 mb-3">
            <a href="{{ route('admin.promo.index') }}" class="hover:text-slate-700 transition">Data Promo</a>
            <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
            </svg>
            <span class="text-slate-900 font-medium">Edit Promo</span>
        </div>
        <div class="flex flex-col gap-4 sm:flex-row sm:items-center sm:justify-between">
            <div>
                <h1 class="text-2xl font-bold text-slate-900">Edit Promo</h1>
                <p class="mt-1 text-sm text-slate-500">Perbarui data promo <span
                        class="font-semibold text-slate-700">{{ $promo->kode_promo }}</span>.</p>
            </div>
            <a href="{{ route('admin.promo.index') }}"
                class="inline-flex items-center justify-center gap-2 rounded-xl border border-slate-200 bg-white px-4 py-2.5 text-sm font-semibold text-slate-700 hover:bg-slate-50 transition-colors w-full sm:w-auto">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                </svg>
                Kembali
            </a>
        </div>
    </div>

    <div class="rounded-2xl bg-white shadow-sm border border-slate-100 p-5 sm:p-8">
        <div class="flex items-center gap-3 border-b border-slate-100 bg-slate-50">
            <div class="flex h-10 w-10 flex-shrink-0 items-center justify-center rounded-xl bg-amber-100 text-amber-600">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                </svg>
            </div>
            <div>
                <h2 class="text-base font-bold text-slate-900">Form Edit Promo</h2>
                <p class="text-xs text-slate-400">Kode Promo: <span
                        class="font-mono font-semibold text-slate-600">{{ $promo->kode_promo ?? '-' }}</span></p>
            </div>
        </div>
        <form action="{{ route('admin.promo.update', $promo->id) }}" method="POST" class="space-y-6">
            @csrf @method('PUT')

            <div class="grid gap-5 sm:grid-cols-2">
                <div>
                    <label for="kode_promo" class="block text-sm font-semibold text-slate-700 mb-1.5">Kode Promo</label>
                    <input type="text" id="kode_promo" name="kode_promo"
                        value="{{ old('kode_promo', $promo->kode_promo) }}" required
                        class="block w-full rounded-xl border border-slate-200 bg-slate-50 px-4 py-2.5 text-sm text-slate-900 focus:border-blue-500 focus:bg-white focus:outline-none focus:ring-2 focus:ring-blue-100 transition">
                    @error('kode_promo')
                        <p class="mt-1 text-xs text-red-500">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label for="potongan" class="block text-sm font-semibold text-slate-700 mb-1.5">Potongan</label>
                    <input type="number" id="potongan" name="potongan" value="{{ old('potongan', $promo->potongan) }}"
                        required
                        class="block w-full rounded-xl border border-slate-200 bg-slate-50 px-4 py-2.5 text-sm text-slate-900 focus:border-blue-500 focus:bg-white focus:outline-none focus:ring-2 focus:ring-blue-100 transition">
                    @error('potongan')
                        <p class="mt-1 text-xs text-red-500">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label for="tanggal_mulai" class="block text-sm font-semibold text-slate-700 mb-1.5">Tanggal
                        Mulai</label>
                    <input type="date" id="tanggal_mulai" name="tanggal_mulai"
                        value="{{ old('tanggal_mulai', $promo->tanggal_mulai) }}" required
                        class="block w-full rounded-xl border border-slate-200 bg-slate-50 px-4 py-2.5 text-sm text-slate-900 focus:border-blue-500 focus:bg-white focus:outline-none focus:ring-2 focus:ring-blue-100 transition">
                    @error('tanggal_mulai')
                        <p class="mt-1 text-xs text-red-500">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label for="tanggal_selesai" class="block text-sm font-semibold text-slate-700 mb-1.5">Tanggal
                        Selesai</label>
                    <input type="date" id="tanggal_selesai" name="tanggal_selesai"
                        value="{{ old('tanggal_selesai', $promo->tanggal_selesai) }}" required
                        class="block w-full rounded-xl border border-slate-200 bg-slate-50 px-4 py-2.5 text-sm text-slate-900 focus:border-blue-500 focus:bg-white focus:outline-none focus:ring-2 focus:ring-blue-100 transition">
                    @error('tanggal_selesai')
                        <p class="mt-1 text-xs text-red-500">{{ $message }}</p>
                    @enderror
                </div>
            </div>

            <div class="flex flex-col-reverse gap-3 pt-4 border-t border-slate-100 sm:flex-row sm:items-center">
                <a href="{{ route('admin.promo.index') }}"
                    class="inline-flex items-center justify-center gap-2 rounded-xl border border-slate-200 bg-white px-5 py-2.5 text-sm font-semibold text-slate-700 hover:bg-slate-50 transition-colors">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                    </svg>
                    Batal
                </a>
                <button type="submit"
                    class="inline-flex items-center justify-center gap-2 rounded-xl bg-blue-600 px-5 py-2.5 text-sm font-semibold text-white hover:bg-blue-700 transition-colors shadow-sm">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-8l-4-4m0 0L8 8m4-4v12" />
                    </svg>
                    Update
                </button>
            </div>
        </form>
    </div>

@endsection

@push('scripts')
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        @if ($errors->any())
            Swal.fire({
                title: 'Periksa Kembali',
                text: 'Beberapa data belum lengkap atau tidak valid.',
                icon: 'warning',
                confirmButtonColor: '#2563eb'
            });
        @endif

        @if (session('success'))
            Swal.fire({
                title: 'Berhasil!',
                text: @json(session('success')),
                icon: 'success',
                confirmButtonColor: '#2563eb',
                timer: 2500,
                timerProgressBar: true
            });
        @endif
    </script>
@endpush
