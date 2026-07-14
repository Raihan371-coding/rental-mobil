@extends('layouts.admin')

@section('title', 'Edit Pengembalian')

@section('content')

    <div class="mb-6">
        <div class="flex items-center gap-2 text-sm text-slate-500 mb-3">
            <a href="{{ route('admin.pengembalian.index') }}" class="hover:text-slate-700 transition">Data Pengembalian</a>
            <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/></svg>
            <span class="text-slate-900 font-medium">Edit Pengembalian</span>
        </div>
        <div class="flex flex-col gap-4 sm:flex-row sm:items-center sm:justify-between">
            <div>
                <h1 class="text-2xl font-bold text-slate-900">Edit Pengembalian</h1>
                <p class="mt-1 text-sm text-slate-500">Ubah data pengembalian
                    <span class="font-semibold text-slate-700">{{ $data->rental->kode_rental ?? '' }}</span>.
                </p>
            </div>
            <a href="{{ route('admin.pengembalian.index') }}"
                class="inline-flex items-center justify-center gap-2 rounded-xl border border-slate-200 bg-white px-4 py-2.5 text-sm font-semibold text-slate-700 hover:bg-slate-50 transition-colors w-full sm:w-auto">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/>
                </svg>
                Kembali
            </a>
        </div>
    </div>

    @include('admin.partials.alert')

    <div class="rounded-2xl bg-white shadow-sm border border-slate-100 p-5 sm:p-8">
        <div class="flex items-center gap-3 border-b border-slate-100 bg-slate-50">
            <div class="flex h-10 w-10 flex-shrink-0 items-center justify-center rounded-xl bg-amber-100 text-amber-600">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                </svg>
            </div>
            <div>
                <h2 class="text-base font-bold text-slate-900">Form Edit Pengembalian</h2>
                <p class="text-xs text-slate-400">Kode Pengembalian: <span
                        class="font-mono font-semibold text-slate-600">{{ $data->kode_pengembalian ?? '-' }}</span></p>
            </div>
        </div>
        <form action="{{ route('admin.pengembalian.update', $data->id) }}" method="POST" class="space-y-6">
            @csrf
            @method('PUT')
            <div class="grid gap-5 sm:grid-cols-2">
                <div class="sm:col-span-2">
                    <label for="id_rental" class="block text-sm font-semibold text-slate-700 mb-1.5">Rental</label>
                    <select id="id_rental" name="id_rental"
                        class="block w-full rounded-xl border border-slate-200 bg-slate-50 px-4 py-2.5 text-sm text-slate-900 focus:border-blue-500 focus:bg-white focus:outline-none focus:ring-2 focus:ring-blue-100 transition">
                        <option value="">Pilih Rental</option>
                        @foreach ($rentals as $rental)
                            <option value="{{ $rental->id }}" {{ old('id_rental', $data->id_rental) == $rental->id ? 'selected' : '' }}>
                                {{ $rental->kode_rental }} - {{ $rental->customer->nama }} - {{ $rental->mobil->nama_mobil }}
                            </option>
                        @endforeach
                    </select>
                    @error('id_rental')<p class="mt-1 text-xs text-red-500">{{ $message }}</p>@enderror
                </div>

                <div>
                    <label for="tanggal_pengembalian" class="block text-sm font-semibold text-slate-700 mb-1.5">Tanggal Pengembalian</label>
                    <input type="date" id="tanggal_pengembalian" name="tanggal_pengembalian"
                        value="{{ old('tanggal_pengembalian', $data->tanggal_pengembalian) }}"
                        class="block w-full rounded-xl border border-slate-200 bg-slate-50 px-4 py-2.5 text-sm text-slate-900 focus:border-blue-500 focus:bg-white focus:outline-none focus:ring-2 focus:ring-blue-100 transition">
                    @error('tanggal_pengembalian')<p class="mt-1 text-xs text-red-500">{{ $message }}</p>@enderror
                </div>

                <div>
                    <label for="kondisi_mobil" class="block text-sm font-semibold text-slate-700 mb-1.5">Kondisi Mobil</label>
                    <select id="kondisi_mobil" name="kondisi_mobil"
                        class="block w-full rounded-xl border border-slate-200 bg-slate-50 px-4 py-2.5 text-sm text-slate-900 focus:border-blue-500 focus:bg-white focus:outline-none focus:ring-2 focus:ring-blue-100 transition">
                        <option value="baik" {{ old('kondisi_mobil', $data->kondisi_mobil) == 'baik' ? 'selected' : '' }}>Baik</option>
                        <option value="rusak" {{ old('kondisi_mobil', $data->kondisi_mobil) == 'rusak' ? 'selected' : '' }}>Rusak</option>
                    </select>
                    @error('kondisi_mobil')<p class="mt-1 text-xs text-red-500">{{ $message }}</p>@enderror
                </div>

                <div class="sm:col-span-2">
                    <label for="denda" class="block text-sm font-semibold text-slate-700 mb-1.5">Denda</label>
                    <div class="relative">
                        <span class="absolute left-3 top-1/2 -translate-y-1/2 text-sm font-medium text-slate-500">Rp</span>
                        <input type="number" step="0.01" id="denda" name="denda" value="{{ old('denda', $data->denda) }}"
                            class="block w-full rounded-xl border border-slate-200 bg-slate-50 pl-10 pr-4 py-2.5 text-sm text-slate-900 focus:border-blue-500 focus:bg-white focus:outline-none focus:ring-2 focus:ring-blue-100 transition">
                    </div>
                    @error('denda')<p class="mt-1 text-xs text-red-500">{{ $message }}</p>@enderror
                </div>

                <div class="sm:col-span-2">
                    <label for="keterangan" class="block text-sm font-semibold text-slate-700 mb-1.5">Keterangan</label>
                    <textarea id="keterangan" name="keterangan" rows="3"
                        class="block w-full rounded-xl border border-slate-200 bg-slate-50 px-4 py-2.5 text-sm text-slate-900 focus:border-blue-500 focus:bg-white focus:outline-none focus:ring-2 focus:ring-blue-100 transition">{{ old('keterangan', $data->keterangan) }}</textarea>
                    @error('keterangan')<p class="mt-1 text-xs text-red-500">{{ $message }}</p>@enderror
                </div>
            </div>

            <div class="flex flex-col-reverse gap-3 pt-4 border-t border-slate-100 sm:flex-row sm:items-center sm:justify-start">
                <a href="{{ route('admin.pengembalian.index') }}"
                    class="inline-flex items-center justify-center gap-2 rounded-xl border border-slate-200 bg-white px-5 py-2.5 text-sm font-semibold text-slate-700 hover:bg-slate-50 transition-colors">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/>
                    </svg>
                    Batal
                </a>
                <button type="submit"
                    class="inline-flex items-center justify-center gap-2 rounded-xl bg-blue-600 px-5 py-2.5 text-sm font-semibold text-white hover:bg-blue-700 transition-colors shadow-sm">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-8l-4-4m0 0L8 8m4-4v12"/>
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
    @if($errors->any())
        Swal.fire({
            title: 'Periksa Kembali',
            text: 'Beberapa data belum lengkap atau tidak valid.',
            icon: 'warning',
            confirmButtonColor: '#2563eb'
        });
    @endif

    @if(session('success'))
        Swal.fire({
            title: 'Berhasil!',
            text: @json(session('success')),
            icon: 'success',
            confirmButtonColor: '#2563eb',
            timer: 2500,
            timerProgressBar: true
        });
    @endif

    @if(session('error'))
        Swal.fire({
            title: 'Gagal!',
            text: @json(session('error')),
            icon: 'error',
            confirmButtonColor: '#2563eb'
        });
    @endif
</script>
@endpush
