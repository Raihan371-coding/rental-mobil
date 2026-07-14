@extends('layouts.admin')

@section('title', 'Edit Denda')

@section('content')

    {{-- ===================== PAGE HEADER ===================== --}}
    <div class="mb-6">
        <div class="flex items-center gap-2 text-sm text-slate-500 mb-3">
            <a href="{{ route('admin.denda.index') }}" class="hover:text-slate-700 transition">Data Denda</a>
            <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
            </svg>
            <span class="text-slate-900 font-medium">Edit Denda</span>
        </div>
        <div class="flex flex-col gap-4 sm:flex-row sm:items-center sm:justify-between">
            <div>
                <h1 class="text-2xl font-bold text-slate-900">Edit Denda</h1>
                <p class="mt-1 text-sm text-slate-500">Perbarui data denda <span
                        class="font-semibold text-slate-700">{{ $denda->kode_denda }}</span>.</p>
            </div>
            <a href="{{ route('admin.denda.index') }}"
                class="inline-flex items-center justify-center gap-2 rounded-xl border border-slate-200 bg-white px-4 py-2.5 text-sm font-semibold text-slate-700 hover:bg-slate-50 transition-colors w-full sm:w-auto">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                </svg>
                Kembali
            </a>
        </div>
    </div>

    <div class="rounded-2xl bg-white shadow-sm border border-slate-100 overflow-hidden">
        <div class="flex items-center gap-3 border-b border-slate-100 bg-slate-50 px-6 py-4">
            <div class="flex h-10 w-10 flex-shrink-0 items-center justify-center rounded-xl bg-amber-100 text-amber-600">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                </svg>
            </div>
            <div>
                <h2 class="text-base font-bold text-slate-900">Form Edit Denda</h2>
                <p class="text-xs text-slate-400">Kode Denda: <span
                        class="font-mono font-semibold text-slate-600">{{ $denda->kode_denda ?? '-' }}</span></p>
            </div>
        </div>

        <form action="{{ route('admin.denda.update', $denda->id) }}" method="POST" class="space-y-6 p-6">
            @csrf
            @method('PUT')
            <div class="grid gap-6 sm:grid-cols-2">
                <div>
                    <label for="id_rental" class="block text-sm font-semibold text-slate-700">Kode Rental</label>
                    <select id="id_rental" name="id_rental"
                        class="mt-2 block w-full rounded-lg border border-slate-300 px-3 py-2 text-sm shadow-sm focus:border-sky-500 focus:outline-none focus:ring-1 focus:ring-sky-500">
                        <option value="">Pilih Kode Rental</option>
                        @foreach ($rentals as $rental)
                            <option value="{{ $rental->id }}"
                                {{ old('id_rental', $denda->id_rental) == $rental->id ? 'selected' : '' }}>
                                {{ $rental->kode_rental }}
                            </option>
                        @endforeach
                    </select>
                    @error('id_rental')
                        <p class="mt-1.5 text-xs font-medium text-red-500">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label for="jumlah_denda" class="block text-sm font-semibold text-slate-700">Jumlah Denda</label>
                    <div class="relative mt-2">
                        <span class="absolute inset-y-0 left-0 flex items-center pl-3 text-sm text-slate-400">Rp</span>
                        <input type="number" id="jumlah_denda" name="jumlah_denda"
                            value="{{ old('jumlah_denda', $denda->jumlah_denda) }}"
                            class="block w-full rounded-lg border border-slate-300 py-2 pl-9 pr-3 text-sm shadow-sm focus:border-sky-500 focus:outline-none focus:ring-1 focus:ring-sky-500">
                    </div>
                    @error('jumlah_denda')
                        <p class="mt-1.5 text-xs font-medium text-red-500">{{ $message }}</p>
                    @enderror
                </div>
            </div>

            @if (isset($denda->keterangan))
                <div>
                    <label for="keterangan" class="block text-sm font-semibold text-slate-700">Keterangan</label>
                    <textarea id="keterangan" name="keterangan" rows="3"
                        class="mt-2 block w-full rounded-lg border border-slate-300 px-3 py-2 text-sm shadow-sm focus:border-sky-500 focus:outline-none focus:ring-1 focus:ring-sky-500">{{ old('keterangan', $denda->keterangan) }}</textarea>
                    @error('keterangan')
                        <p class="mt-1.5 text-xs font-medium text-red-500">{{ $message }}</p>
                    @enderror
                </div>
            @endif

            <div class="flex flex-col-reverse gap-3 border-t border-slate-100 pt-6 sm:flex-row sm:justify-start">
                <a href="{{ route('admin.denda.index') }}"
                    class="rounded-full border border-slate-200 bg-white px-5 py-2.5 text-center text-sm font-semibold text-slate-700 transition hover:bg-slate-50">
                    Batal
                </a>
                <button type="submit"
                    class="inline-flex items-center justify-center gap-2 rounded-full bg-sky-600 px-5 py-2.5 text-sm font-semibold text-white transition hover:bg-sky-700">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
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
        @if (session('success'))
            Swal.fire({
                icon: 'success',
                title: 'Berhasil!',
                text: @json(session('success')),
                confirmButtonColor: '#0284c7',
                timer: 2500,
                timerProgressBar: true
            });
        @endif

        @if ($errors->any())
            Swal.fire({
                icon: 'error',
                title: 'Data belum lengkap',
                html: `{!! implode('<br>', $errors->all()) !!}`,
                confirmButtonColor: '#ef4444'
            });
        @endif
    </script>
@endpush
