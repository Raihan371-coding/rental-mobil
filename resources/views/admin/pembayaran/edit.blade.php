@extends('layouts.admin')
@section('title', 'Edit Pembayaran')
@section('content')

<div class="mb-6">
    <div class="flex items-center gap-2 text-sm text-slate-500 mb-3">
        <a href="{{ route('admin.pembayaran.index') }}" class="hover:text-slate-700 transition">Data Pembayaran</a>
        <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
        </svg>
        <span class="text-slate-900 font-medium">Edit Pembayaran</span>
    </div>
    <div class="flex flex-col gap-4 sm:flex-row sm:items-center sm:justify-between">

        <div>
            <h1 class="text-2xl font-bold text-slate-900">Edit Pembayaran</h1>
            <p class="mt-1 text-sm text-slate-500">Ubah data pembayaran
                <span class="font-semibold text-slate-700">{{ $data->kode_pembayaran }}</span>.
            </p>
        </div>
        <a href="{{ route('admin.pembayaran.index') }}"
            class="inline-flex items-center justify-center gap-2 rounded-xl border border-slate-200 bg-white px-4 py-2.5 text-sm font-semibold text-slate-700 shadow-sm hover:bg-slate-50 transition-colors w-full sm:w-auto">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
            </svg>
            Kembali
        </a>

    </div>
</div>

@include('admin.partials.alert')

<div class="rounded-2xl bg-white shadow-sm border border-slate-100 p-6 sm:p-8">
    <div class="flex items-center gap-3 border-b border-slate-100 bg-slate-50">
        <div class="flex h-10 w-10 flex-shrink-0 items-center justify-center rounded-xl bg-amber-100 text-amber-600">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
            </svg>
        </div>
        <div>
            <h2 class="text-base font-bold text-slate-900">Form Edit Pembayaran</h2>
            <p class="text-xs text-slate-400">Kode Pembayaran: <span
                    class="font-mono font-semibold text-slate-600">{{ $data->kode_pembayaran ?? '-' }}</span></p>
        </div>
    </div>
    <form action="{{ route('admin.pembayaran.update', $data->id) }}" method="POST" class="space-y-6">
        @csrf
        @method('PUT')
        <input type="hidden" name="id_pembayaran" value="{{ $data->id_pembayaran }}">
        <input type="hidden" name="id_rental" value="{{ $data->rental->id }}">

        <div class="grid gap-5 sm:grid-cols-2">
            <div>
                <label class="block text-sm font-semibold text-slate-700 mb-1.5">Kode Rental</label>
                <div
                    class="flex items-center rounded-xl border border-slate-200 bg-slate-50 px-4 py-2.5 text-sm text-slate-500">
                    {{ $data->rental->kode_rental }}
                </div>
            </div>

            <div>
                <label class="block text-sm font-semibold text-slate-700 mb-1.5">Tanggal Bayar</label>
                <input type="date" name="tanggal_bayar" value="{{ old('tanggal_bayar', $data->tanggal_bayar) }}"
                    class="block w-full rounded-xl border border-slate-200 bg-slate-50 px-4 py-2.5 text-sm text-slate-900 focus:border-blue-500 focus:bg-white focus:outline-none focus:ring-2 focus:ring-blue-100 transition">
                @error('tanggal_bayar')
                <p class="mt-1 text-xs text-red-500">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label class="block text-sm font-semibold text-slate-700 mb-1.5">Metode Bayar</label>
                <select name="metode_bayar"
                    class="block w-full rounded-xl border border-slate-200 bg-slate-50 px-4 py-2.5 text-sm text-slate-900 focus:border-blue-500 focus:bg-white focus:outline-none focus:ring-2 focus:ring-blue-100 transition">
                    @foreach (['Transfer', 'QRIS'] as $metode)
                    <option value="{{ $metode }}"
                        {{ old('metode_bayar', $data->metode_bayar) == $metode ? 'selected' : '' }}>
                        {{ $metode }}
                    </option>
                    @endforeach
                </select>
                @error('metode_bayar')
                <p class="mt-1 text-xs text-red-500">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label class="block text-sm font-semibold text-slate-700 mb-1.5">Jumlah Bayar</label>
                <div class="relative">
                    <span class="absolute left-3 top-1/2 -translate-y-1/2 text-sm font-medium text-slate-500">Rp</span>
                    <input type="number" step="0.01" name="jumlah_bayar"
                        value="{{ old('jumlah_bayar', $data->jumlah_bayar) }}"
                        class="block w-full rounded-xl border border-slate-200 bg-slate-50 pl-10 pr-4 py-2.5 text-sm text-slate-900 focus:border-blue-500 focus:bg-white focus:outline-none focus:ring-2 focus:ring-blue-100 transition">
                </div>
                @error('jumlah_bayar')
                <p class="mt-1 text-xs text-red-500">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label class="block text-sm font-semibold text-slate-700 mb-1.5">Status Bayar</label>
                <select name="status_bayar"
                    class="block w-full rounded-xl border border-slate-200 bg-slate-50 px-4 py-2.5 text-sm text-slate-900 focus:border-blue-500 focus:bg-white focus:outline-none focus:ring-2 focus:ring-blue-100 transition">
                    <option value="lunas" {{ old('status_bayar', $data->status_bayar) == 'lunas' ? 'selected' : '' }}>
                        Lunas</option>
                    <option value="belum_lunas"
                        {{ old('status_bayar', $data->status_bayar) == 'belum_lunas' ? 'selected' : '' }}>Belum Lunas
                    </option>
                </select>
                @error('status_bayar')
                <p class="mt-1 text-xs text-red-500">{{ $message }}</p>
                @enderror
            </div>
        </div>

        <div class="flex flex-col-reverse gap-3 pt-2 border-t border-slate-100 sm:flex-row sm:items-center">
            <a href="{{ route('admin.pembayaran.index') }}"
                class="inline-flex items-center justify-center gap-2 rounded-xl border border-slate-200 bg-white px-5 py-2.5 text-sm font-semibold text-slate-700 hover:bg-slate-50 transition-colors">
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
    @if(session('success'))
    Swal.fire({
        icon: 'success',
        title: 'Berhasil!',
        text: @json(session('success')),
        confirmButtonColor: '#2563eb',
        timer: 2500,
        timerProgressBar: true
    });
    @endif

    @if($errors - > any())
    Swal.fire({
        icon: 'error',
        title: 'Periksa kembali form Anda',
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