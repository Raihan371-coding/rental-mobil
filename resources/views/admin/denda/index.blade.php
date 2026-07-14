@extends('layouts.admin')
@section('title', 'Denda')
@section('content')

    {{-- ===================== PAGE HEADER ===================== --}}
    <div class="mb-6 flex flex-col gap-4 sm:flex-row sm:items-center sm:justify-between">
        <div>
            <h1 class="text-2xl font-bold text-slate-900">Data Denda</h1>
            <p class="mt-1 text-sm text-slate-500">Atur denda keterlambatan dan kerusakan kendaraan.</p>
        </div>
        <a href="{{ route('admin.denda.create') }}"
            class="inline-flex items-center justify-center gap-2 rounded-xl bg-sky-600 px-4 py-2.5 text-sm font-semibold text-white shadow-sm hover:bg-sky-700 transition-colors">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
            </svg>
            Tambah Denda
        </a>
    </div>

    {{-- ===================== STAT SUMMARY ===================== --}}
    <div class="mb-6 grid grid-cols-1 gap-5 sm:grid-cols-2 xl:grid-cols-3">
        <div
            class="relative overflow-hidden rounded-2xl bg-white p-6 shadow-sm border border-slate-100 hover:shadow-md transition-shadow duration-300">
            <div class="absolute top-0 right-0 w-24 h-24 rounded-bl-[3rem] bg-red-50 opacity-60"></div>
            <div class="relative flex items-start justify-between">
                <div>
                    <p class="text-xs font-semibold uppercase tracking-widest text-slate-400">Total Denda</p>
                    <h2 class="mt-3 text-4xl font-extrabold text-slate-900">{{ $dendas->count() }}</h2>
                </div>
                <div
                    class="flex h-12 w-12 flex-shrink-0 items-center justify-center rounded-xl bg-red-100 text-red-600 shadow-sm">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z" />
                    </svg>
                </div>
            </div>
            <div class="mt-5">
                <span class="text-xs text-slate-400">Jumlah catatan denda tercatat</span>
            </div>
        </div>

        <div
            class="relative overflow-hidden rounded-2xl bg-gradient-to-br from-red-500 to-rose-600 p-6 shadow-lg hover:shadow-xl transition-shadow duration-300 sm:col-span-1 xl:col-span-2">
            <div class="absolute -top-4 -right-4 w-28 h-28 rounded-full bg-white/10"></div>
            <div class="absolute -bottom-6 -left-4 w-24 h-24 rounded-full bg-white/5"></div>
            <div class="relative flex items-start justify-between">
                <div>
                    <p class="text-xs font-semibold uppercase tracking-widest text-rose-100">Total Nilai Denda</p>
                    <h2 class="mt-3 text-2xl sm:text-3xl font-extrabold text-white leading-tight">
                        Rp {{ number_format($dendas->sum('jumlah_denda'), 0, ',', '.') }}
                    </h2>
                </div>
                <div
                    class="flex h-12 w-12 flex-shrink-0 items-center justify-center rounded-xl bg-white/20 text-white shadow-sm">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                </div>
            </div>
            <div class="mt-5">
                <span class="text-xs text-rose-100">Akumulasi seluruh denda rental</span>
            </div>
        </div>
    </div>

    @include('admin.partials.alert')

    {{-- ===================== TABLE (desktop) ===================== --}}
    <div class="rounded-2xl bg-white shadow-sm border border-slate-100 overflow-hidden">
        {{-- Mobile search / info bar (optional visual, purely cosmetic) --}}
        <div class="flex items-center justify-between border-b border-slate-100 px-5 py-4">
            <h3 class="text-sm font-bold text-slate-900">Daftar Denda</h3>
            <span class="text-xs text-slate-400">{{ $dendas->count() }} data</span>
        </div>
        <div class="hidden md:block overflow-x-auto">
            <table class="min-w-full divide-y divide-slate-100 text-sm text-slate-700">
                <thead class="bg-slate-50">
                    <tr>
                        <th class="px-5 py-3.5 text-left text-xs font-semibold uppercase tracking-wider text-slate-500">No
                        </th>
                        <th class="px-5 py-3.5 text-left text-xs font-semibold uppercase tracking-wider text-slate-500">Kode
                            Denda</th>
                        <th class="px-5 py-3.5 text-left text-xs font-semibold uppercase tracking-wider text-slate-500">Kode
                            Rental</th>
                        <th class="px-5 py-3.5 text-left text-xs font-semibold uppercase tracking-wider text-slate-500">
                            Jumlah Denda</th>
                        <th class="px-5 py-3.5 text-left text-xs font-semibold uppercase tracking-wider text-slate-500">Aksi
                        </th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-100 bg-white">
                    @forelse($dendas as $denda)
                        <tr class="hover:bg-slate-50 transition-colors">
                            <td class="px-5 py-4 text-slate-500">{{ $loop->iteration }}</td>
                            <td class="px-5 py-4 font-mono text-xs font-semibold text-sky-700">{{ $denda->kode_denda }}</td>
                            <td class="px-5 py-4 font-mono text-xs text-slate-500">{{ $denda->rental->kode_rental ?? '-' }}
                            </td>
                            <td class="px-5 py-4">
                                <span class="font-bold text-red-600">Rp
                                    {{ number_format($denda->jumlah_denda, 0, ',', '.') }}</span>
                            </td>
                            <td class="px-5 py-4">
                                <div class="flex items-center gap-2">
                                    <a href="{{ route('admin.denda.edit', $denda->id) }}"
                                        class="inline-flex items-center gap-1 rounded-lg bg-slate-800 px-3 py-1.5 text-xs font-semibold text-white hover:bg-slate-700 transition-colors">
                                        <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                        </svg>
                                        Edit
                                    </a>
                                    <form action="{{ route('admin.denda.destroy', $denda->id) }}" method="POST"
                                        class="inline delete-form">
                                        @csrf @method('DELETE')
                                        <button type="button" onclick="confirmDelete(this)"
                                            class="inline-flex items-center gap-1 rounded-lg bg-red-500 px-3 py-1.5 text-xs font-semibold text-white hover:bg-red-600 transition-colors">
                                            <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                            </svg>
                                            Hapus
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="px-5 py-16 text-center">
                                <div class="flex flex-col items-center gap-3">
                                    <div class="w-14 h-14 rounded-2xl bg-slate-100 flex items-center justify-center">
                                        <svg class="w-7 h-7 text-slate-300" fill="none" stroke="currentColor"
                                            viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z" />
                                        </svg>
                                    </div>
                                    <p class="text-sm font-medium text-slate-500">Data denda belum tersedia</p>
                                </div>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        {{-- ===================== CARD LIST (mobile) ===================== --}}
        <div class="md:hidden divide-y divide-slate-100">
            @forelse($dendas as $denda)
                <div class="p-4">
                    <div class="flex items-start justify-between gap-3">
                        <div>
                            <p class="font-mono text-xs font-semibold text-sky-700">{{ $denda->kode_denda }}</p>
                            <p class="mt-1 text-xs text-slate-400">Rental: <span
                                    class="font-mono text-slate-600">{{ $denda->rental->kode_rental ?? '-' }}</span></p>
                        </div>
                        <span
                            class="rounded-full bg-slate-100 px-2.5 py-0.5 text-xs font-semibold text-slate-500">#{{ $loop->iteration }}</span>
                    </div>
                    <div class="mt-3">
                        <span class="text-lg font-bold text-red-600">Rp
                            {{ number_format($denda->jumlah_denda, 0, ',', '.') }}</span>
                    </div>
                    <div class="mt-4 flex items-center gap-2">
                        <a href="{{ route('admin.denda.edit', $denda->id) }}"
                            class="flex-1 inline-flex items-center justify-center gap-1 rounded-lg bg-slate-800 px-3 py-2 text-xs font-semibold text-white hover:bg-slate-700 transition-colors">
                            <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                            </svg>
                            Edit
                        </a>
                        <form action="{{ route('admin.denda.destroy', $denda->id) }}" method="POST"
                            class="flex-1 delete-form">
                            @csrf @method('DELETE')
                            <button type="button" onclick="confirmDelete(this)"
                                class="w-full inline-flex items-center justify-center gap-1 rounded-lg bg-red-500 px-3 py-2 text-xs font-semibold text-white hover:bg-red-600 transition-colors">
                                <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                </svg>
                                Hapus
                            </button>
                        </form>
                    </div>
                </div>
            @empty
                <div class="px-5 py-16 text-center">
                    <div class="flex flex-col items-center gap-3">
                        <div class="w-14 h-14 rounded-2xl bg-slate-100 flex items-center justify-center">
                            <svg class="w-7 h-7 text-slate-300" fill="none" stroke="currentColor"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z" />
                            </svg>
                        </div>
                        <p class="text-sm font-medium text-slate-500">Data denda belum tersedia</p>
                    </div>
                </div>
            @endforelse
        </div>
    </div>

@endsection

@push('scripts')
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        function confirmDelete(btn) {
            Swal.fire({
                title: 'Yakin hapus denda ini?',
                text: "Data yang sudah dihapus tidak dapat dikembalikan.",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#ef4444',
                cancelButtonColor: '#64748b',
                confirmButtonText: 'Ya, hapus',
                cancelButtonText: 'Batal',
                reverseButtons: true
            }).then((result) => {
                if (result.isConfirmed) {
                    btn.closest('form').submit();
                }
            });
        }

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

        @if (session('error'))
            Swal.fire({
                icon: 'error',
                title: 'Gagal!',
                text: @json(session('error')),
                confirmButtonColor: '#ef4444'
            });
        @endif

        @if ($errors->any())
            Swal.fire({
                icon: 'error',
                title: 'Terjadi Kesalahan',
                html: `{!! implode('<br>', $errors->all()) !!}`,
                confirmButtonColor: '#ef4444'
            });
        @endif
    </script>
@endpush
