@extends('layouts.admin')
@section('title', 'Pengembalian')
@section('content')

    {{-- Page Header --}}
    <div class="mb-6 flex flex-col gap-4 sm:flex-row sm:items-center sm:justify-between">
        <div>
            <h1 class="text-2xl font-bold text-slate-900">Data Pengembalian</h1>
            <p class="mt-1 text-sm text-slate-500">Kelola proses pengembalian kendaraan secara cepat dan akurat.</p>
        </div>
        <a href="{{ route('admin.pengembalian.create') }}"
            class="inline-flex items-center justify-center gap-2 rounded-xl bg-blue-600 px-4 py-2.5 text-sm font-semibold text-white shadow-sm hover:bg-blue-700 transition-colors w-full sm:w-auto">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
            </svg>
            Tambah Pengembalian
        </a>
    </div>

    {{-- Stat strip (consistent with dashboard & mobil index) --}}
    <div class="grid grid-cols-2 gap-4 mb-6 sm:grid-cols-4">
        <div class="relative overflow-hidden rounded-2xl bg-white p-4 shadow-sm border border-slate-100">
            <div class="absolute top-0 right-0 w-16 h-16 rounded-bl-[2rem] bg-blue-50 opacity-60"></div>
            <p class="relative text-[11px] font-semibold uppercase tracking-widest text-slate-400">Total</p>
            <h2 class="relative mt-1 text-2xl font-extrabold text-slate-900">{{ $data->count() }}</h2>
        </div>
        <div class="relative overflow-hidden rounded-2xl bg-white p-4 shadow-sm border border-slate-100">
            <div class="absolute top-0 right-0 w-16 h-16 rounded-bl-[2rem] bg-emerald-50 opacity-60"></div>
            <p class="relative text-[11px] font-semibold uppercase tracking-widest text-slate-400">Kondisi Baik</p>
            <h2 class="relative mt-1 text-2xl font-extrabold text-emerald-600">
                {{ $data->filter(fn($d) => strtolower($d->kondisi_mobil) == 'baik')->count() }}</h2>
        </div>
        <div class="relative overflow-hidden rounded-2xl bg-white p-4 shadow-sm border border-slate-100">
            <div class="absolute top-0 right-0 w-16 h-16 rounded-bl-[2rem] bg-red-50 opacity-60"></div>
            <p class="relative text-[11px] font-semibold uppercase tracking-widest text-slate-400">Kondisi Rusak</p>
            <h2 class="relative mt-1 text-2xl font-extrabold text-red-500">
                {{ $data->filter(fn($d) => strtolower($d->kondisi_mobil) != 'baik')->count() }}</h2>
        </div>
        <div class="relative overflow-hidden rounded-2xl bg-white p-4 shadow-sm border border-slate-100">
            <div class="absolute top-0 right-0 w-16 h-16 rounded-bl-[2rem] bg-amber-50 opacity-60"></div>
            <p class="relative text-[11px] font-semibold uppercase tracking-widest text-slate-400">Total Denda</p>
            <h2 class="relative mt-1 text-lg font-extrabold text-amber-600">
                Rp {{ number_format($data->sum('denda'), 0, ',', '.') }}</h2>
        </div>
    </div>

    {{-- Alert (server-side, shown once via SweetAlert) --}}
    @include('admin.partials.alert')

    {{-- ===================== DESKTOP TABLE (md and up) ===================== --}}
    <div class="hidden md:block rounded-2xl bg-white shadow-sm border border-slate-100 overflow-hidden">
        <div class="overflow-x-auto">
            <table class="min-w-full divide-y divide-slate-100 text-sm text-slate-700">
                <thead class="bg-slate-50">
                    <tr>
                        <th class="px-5 py-3.5 text-left text-xs font-semibold uppercase tracking-wider text-slate-500">Kode Rental</th>
                        <th class="px-5 py-3.5 text-left text-xs font-semibold uppercase tracking-wider text-slate-500">Tgl Pengembalian</th>
                        <th class="px-5 py-3.5 text-left text-xs font-semibold uppercase tracking-wider text-slate-500">Kondisi Mobil</th>
                        <th class="px-5 py-3.5 text-left text-xs font-semibold uppercase tracking-wider text-slate-500">Denda</th>
                        <th class="px-5 py-3.5 text-left text-xs font-semibold uppercase tracking-wider text-slate-500">Keterangan</th>
                        <th class="px-5 py-3.5 text-left text-xs font-semibold uppercase tracking-wider text-slate-500">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-100 bg-white">
                    @forelse ($data as $items)
                        <tr class="hover:bg-slate-50 transition-colors">
                            <td class="px-5 py-4 font-mono text-xs font-semibold text-slate-700">{{ $items->rental->kode_rental ?? '-' }}</td>
                            <td class="px-5 py-4 text-slate-600">{{ $items->tanggal_pengembalian }}</td>
                            <td class="px-5 py-4">
                                @if (strtolower($items->kondisi_mobil) == 'baik')
                                    <span class="inline-flex items-center gap-1 rounded-full bg-emerald-100 px-2.5 py-1 text-xs font-semibold text-emerald-700">
                                        <span class="w-1.5 h-1.5 rounded-full bg-emerald-500"></span> Baik
                                    </span>
                                @else
                                    <span class="inline-flex items-center gap-1 rounded-full bg-red-100 px-2.5 py-1 text-xs font-semibold text-red-700">
                                        <span class="w-1.5 h-1.5 rounded-full bg-red-500"></span> Rusak
                                    </span>
                                @endif
                            </td>
                            <td class="px-5 py-4 font-semibold text-red-600">
                                @if ($items->denda > 0)
                                    Rp {{ number_format($items->denda, 0, ',', '.') }}
                                @else
                                    <span class="text-slate-400 font-normal">-</span>
                                @endif
                            </td>
                            <td class="px-5 py-4 text-slate-600 max-w-[200px] truncate">{{ $items->keterangan ?: '-' }}</td>
                            <td class="px-5 py-4">
                                <div class="flex items-center gap-2">
                                    <a href="{{ route('admin.pengembalian.edit', $items->id) }}"
                                        class="inline-flex items-center gap-1 rounded-lg bg-slate-800 px-3 py-1.5 text-xs font-semibold text-white hover:bg-slate-700 transition-colors">
                                        <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                        </svg>
                                        Edit
                                    </a>
                                    <form action="{{ route('admin.pengembalian.destroy', $items->id) }}" method="POST"
                                        class="inline delete-form">
                                        @csrf @method('DELETE')
                                        <button type="button" data-nama="{{ $items->rental->kode_rental ?? 'data ini' }}"
                                            class="btn-delete inline-flex items-center gap-1 rounded-lg bg-red-500 px-3 py-1.5 text-xs font-semibold text-white hover:bg-red-600 transition-colors">
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
                            <td colspan="6" class="px-5 py-16 text-center">
                                <div class="flex flex-col items-center gap-3">
                                    <div class="w-14 h-14 rounded-2xl bg-slate-100 flex items-center justify-center">
                                        <svg class="w-7 h-7 text-slate-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15" />
                                        </svg>
                                    </div>
                                    <p class="text-sm font-medium text-slate-500">Data pengembalian belum tersedia</p>
                                    <a href="{{ route('admin.pengembalian.create') }}"
                                        class="text-sm font-semibold text-blue-600 hover:text-blue-700">Tambah pengembalian pertama →</a>
                                </div>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

    {{-- ===================== MOBILE CARD LIST (below md) ===================== --}}
    <div class="md:hidden space-y-4">
        @forelse ($data as $items)
            <div class="rounded-2xl bg-white shadow-sm border border-slate-100 p-4">
                <div class="flex items-start justify-between gap-2">
                    <div class="min-w-0">
                        <p class="font-mono text-[11px] text-slate-400">{{ $items->rental->kode_rental ?? '-' }}</p>
                        <h3 class="font-semibold text-slate-900 truncate">{{ $items->rental->customer->nama ?? '-' }}</h3>
                        <p class="text-xs text-slate-500">{{ $items->tanggal_pengembalian }}</p>
                    </div>
                    @if (strtolower($items->kondisi_mobil) == 'baik')
                        <span class="flex-shrink-0 inline-flex items-center gap-1 rounded-full bg-emerald-100 px-2 py-1 text-[10px] font-semibold text-emerald-700">
                            <span class="w-1.5 h-1.5 rounded-full bg-emerald-500"></span> Baik
                        </span>
                    @else
                        <span class="flex-shrink-0 inline-flex items-center gap-1 rounded-full bg-red-100 px-2 py-1 text-[10px] font-semibold text-red-700">
                            <span class="w-1.5 h-1.5 rounded-full bg-red-500"></span> Rusak
                        </span>
                    @endif
                </div>

                <div class="mt-3 flex items-center justify-between">
                    <span class="text-xs text-slate-500 truncate max-w-[60%]">{{ $items->keterangan ?: 'Tidak ada keterangan' }}</span>
                    <span class="text-sm font-bold text-red-600">
                        @if ($items->denda > 0)
                            Rp {{ number_format($items->denda, 0, ',', '.') }}
                        @else
                            <span class="text-slate-400 font-normal">-</span>
                        @endif
                    </span>
                </div>

                <div class="mt-4 flex items-center gap-2 pt-3 border-t border-slate-100">
                    <a href="{{ route('admin.pengembalian.edit', $items->id) }}"
                        class="flex-1 inline-flex items-center justify-center gap-1 rounded-lg bg-slate-800 px-3 py-2 text-xs font-semibold text-white hover:bg-slate-700 transition-colors">
                        <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                        </svg>
                        Edit
                    </a>
                    <form action="{{ route('admin.pengembalian.destroy', $items->id) }}" method="POST"
                        class="flex-1 delete-form">
                        @csrf @method('DELETE')
                        <button type="button" data-nama="{{ $items->rental->kode_rental ?? 'data ini' }}"
                            class="btn-delete w-full inline-flex items-center justify-center gap-1 rounded-lg bg-red-500 px-3 py-2 text-xs font-semibold text-white hover:bg-red-600 transition-colors">
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
            <div class="rounded-2xl bg-white shadow-sm border border-slate-100 px-5 py-16 text-center">
                <div class="flex flex-col items-center gap-3">
                    <div class="w-14 h-14 rounded-2xl bg-slate-100 flex items-center justify-center">
                        <svg class="w-7 h-7 text-slate-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15" />
                        </svg>
                    </div>
                    <p class="text-sm font-medium text-slate-500">Data pengembalian belum tersedia</p>
                    <a href="{{ route('admin.pengembalian.create') }}"
                        class="text-sm font-semibold text-blue-600 hover:text-blue-700">Tambah pengembalian pertama →</a>
                </div>
            </div>
        @endforelse
    </div>

@endsection

@push('scripts')
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        // Delete confirmation via SweetAlert2
        document.querySelectorAll('.btn-delete').forEach(function(btn) {
            btn.addEventListener('click', function() {
                const form = btn.closest('form');
                const nama = btn.getAttribute('data-nama');

                Swal.fire({
                    title: 'Hapus Pengembalian?',
                    html: `Yakin ingin menghapus data pengembalian <b>${nama}</b>? Data yang sudah dihapus tidak dapat dikembalikan.`,
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#ef4444',
                    cancelButtonColor: '#94a3b8',
                    confirmButtonText: 'Ya, Hapus',
                    cancelButtonText: 'Batal',
                    reverseButtons: true
                }).then((result) => {
                    if (result.isConfirmed) {
                        form.submit();
                    }
                });
            });
        });

        // Flash messages from session (see admin.partials.alert)
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

        @if (session('error'))
            Swal.fire({
                title: 'Gagal!',
                text: @json(session('error')),
                icon: 'error',
                confirmButtonColor: '#2563eb'
            });
        @endif
    </script>
@endpush
