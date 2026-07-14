@extends('layouts.admin')
@section('title', 'Promo')
@section('content')

    <div class="mb-6">
        <div class="flex items-center gap-2 text-sm text-slate-500 mb-3">
            <span class="text-slate-900 font-medium">Data Promo</span>
        </div>
        <div class="flex flex-col gap-4 sm:flex-row sm:items-center sm:justify-between">
            <div>
                <h1 class="text-2xl font-bold text-slate-900">Data Promo</h1>
                <p class="mt-1 text-sm text-slate-500">Buat dan kelola kode promo untuk menarik lebih banyak pelanggan.</p>
            </div>
            <a href="{{ route('admin.promo.create') }}"
                class="inline-flex items-center justify-center gap-2 rounded-xl bg-blue-600 px-4 py-2.5 text-sm font-semibold text-white shadow-sm hover:bg-blue-700 transition-colors w-full sm:w-auto">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                </svg>
                Tambah Promo
            </a>
        </div>
    </div>

    <div class="rounded-2xl bg-white shadow-sm border border-slate-100 overflow-hidden">

        {{-- ===================== DESKTOP TABLE (sm and up) ===================== --}}
        <div class="hidden sm:block overflow-x-auto">
            <table class="min-w-full divide-y divide-slate-100 text-sm text-slate-700">
                <thead class="bg-slate-50">
                    <tr>
                        <th class="px-5 py-3.5 text-left text-xs font-semibold uppercase tracking-wider text-slate-500">No
                        </th>
                        <th class="px-5 py-3.5 text-left text-xs font-semibold uppercase tracking-wider text-slate-500">Kode
                            Promo</th>
                        <th class="px-5 py-3.5 text-left text-xs font-semibold uppercase tracking-wider text-slate-500">
                            Jenis</th>
                        <th class="px-5 py-3.5 text-left text-xs font-semibold uppercase tracking-wider text-slate-500">
                            Potongan</th>
                        <th class="px-5 py-3.5 text-left text-xs font-semibold uppercase tracking-wider text-slate-500">Tgl
                            Mulai</th>
                        <th class="px-5 py-3.5 text-left text-xs font-semibold uppercase tracking-wider text-slate-500">Tgl
                            Selesai</th>
                        <th class="px-5 py-3.5 text-left text-xs font-semibold uppercase tracking-wider text-slate-500">
                            Status</th>
                        <th class="px-5 py-3.5 text-left text-xs font-semibold uppercase tracking-wider text-slate-500">Aksi
                        </th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-100 bg-white">
                    @forelse($promos as $promo)
                        @php
                            $now = now();
                            $mulai = \Carbon\Carbon::parse($promo->tanggal_mulai);
                            $selesai = \Carbon\Carbon::parse($promo->tanggal_selesai);
                            $isAktif = $now->between($mulai, $selesai);
                        @endphp
                        <tr class="hover:bg-slate-50 transition-colors">
                            <td class="px-5 py-4 text-slate-500">{{ $loop->iteration }}</td>
                            <td class="px-5 py-4">
                                <span
                                    class="font-mono text-sm font-bold text-blue-700 bg-blue-50 px-2 py-1 rounded-lg">{{ $promo->kode_promo }}</span>
                            </td>
                            <td class="px-5 py-4">
                                <span
                                    class="rounded-full px-2.5 py-1 text-xs font-semibold
                            {{ $promo->jenis == 'persentase' ? 'bg-blue-100 text-blue-700' : 'bg-emerald-100 text-emerald-700' }}">
                                    {{ ucfirst($promo->jenis) }}
                                </span>
                            </td>
                            <td class="px-5 py-4 font-bold text-slate-800">
                                @if ($promo->jenis == 'persentase')
                                    {{ $promo->potongan }}%
                                @else
                                    Rp {{ number_format($promo->potongan, 0, ',', '.') }}
                                @endif
                            </td>
                            <td class="px-5 py-4 text-slate-600">{{ $promo->tanggal_mulai }}</td>
                            <td class="px-5 py-4 text-slate-600">{{ $promo->tanggal_selesai }}</td>
                            <td class="px-5 py-4">
                                @if ($isAktif)
                                    <span
                                        class="inline-flex items-center gap-1 rounded-full bg-emerald-100 px-2.5 py-1 text-xs font-semibold text-emerald-700">
                                        <span class="w-1.5 h-1.5 rounded-full bg-emerald-500 animate-pulse"></span> Aktif
                                    </span>
                                @else
                                    <span
                                        class="inline-flex items-center gap-1 rounded-full bg-slate-100 px-2.5 py-1 text-xs font-semibold text-slate-500">
                                        <span class="w-1.5 h-1.5 rounded-full bg-slate-400"></span> Nonaktif
                                    </span>
                                @endif
                            </td>
                            <td class="px-5 py-4">
                                <div class="flex items-center gap-2">
                                    <a href="{{ route('admin.promo.edit', $promo->id) }}"
                                        class="inline-flex items-center gap-1 rounded-lg bg-slate-800 px-3 py-1.5 text-xs font-semibold text-white hover:bg-slate-700 transition-colors">
                                        <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                        </svg>
                                        Edit
                                    </a>
                                    <form action="{{ route('admin.promo.destroy', $promo->id) }}" method="POST"
                                        class="inline js-delete-form" data-kode="{{ $promo->kode_promo }}">
                                        @csrf @method('DELETE')
                                        <button type="submit"
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
                            <td colspan="8" class="px-5 py-16 text-center">
                                <div class="flex flex-col items-center gap-3">
                                    <div class="w-14 h-14 rounded-2xl bg-slate-100 flex items-center justify-center">
                                        <svg class="w-7 h-7 text-slate-300" fill="none" stroke="currentColor"
                                            viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z" />
                                        </svg>
                                    </div>
                                    <p class="text-sm font-medium text-slate-500">Data promo belum tersedia</p>
                                </div>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        {{-- ===================== MOBILE CARD LIST (below sm) ===================== --}}
        <div class="sm:hidden divide-y divide-slate-100">
            @forelse($promos as $promo)
                @php
                    $now = now();
                    $mulai = \Carbon\Carbon::parse($promo->tanggal_mulai);
                    $selesai = \Carbon\Carbon::parse($promo->tanggal_selesai);
                    $isAktif = $now->between($mulai, $selesai);
                @endphp
                <div class="p-4">
                    <div class="flex items-start justify-between gap-3">
                        <div>
                            <span
                                class="font-mono text-sm font-bold text-blue-700 bg-blue-50 px-2 py-1 rounded-lg">{{ $promo->kode_promo }}</span>
                            <div class="mt-2 flex items-center gap-2">
                                <span
                                    class="rounded-full px-2.5 py-1 text-xs font-semibold
                            {{ $promo->jenis == 'persentase' ? 'bg-blue-100 text-blue-700' : 'bg-emerald-100 text-emerald-700' }}">
                                    {{ ucfirst($promo->jenis) }}
                                </span>
                                @if ($isAktif)
                                    <span
                                        class="inline-flex items-center gap-1 rounded-full bg-emerald-100 px-2.5 py-1 text-xs font-semibold text-emerald-700">
                                        <span class="w-1.5 h-1.5 rounded-full bg-emerald-500 animate-pulse"></span> Aktif
                                    </span>
                                @else
                                    <span
                                        class="inline-flex items-center gap-1 rounded-full bg-slate-100 px-2.5 py-1 text-xs font-semibold text-slate-500">
                                        <span class="w-1.5 h-1.5 rounded-full bg-slate-400"></span> Nonaktif
                                    </span>
                                @endif
                            </div>
                        </div>
                        <span class="font-bold text-slate-800 text-sm whitespace-nowrap">
                            @if ($promo->jenis == 'persentase')
                                {{ $promo->potongan }}%
                            @else
                                Rp {{ number_format($promo->potongan, 0, ',', '.') }}
                            @endif
                        </span>
                    </div>
                    <div class="mt-3 grid grid-cols-2 gap-2 text-xs text-slate-500">
                        <div>
                            <p class="text-slate-400">Tgl Mulai</p>
                            <p class="text-slate-700 font-medium">{{ $promo->tanggal_mulai }}</p>
                        </div>
                        <div>
                            <p class="text-slate-400">Tgl Selesai</p>
                            <p class="text-slate-700 font-medium">{{ $promo->tanggal_selesai }}</p>
                        </div>
                    </div>
                    <div class="mt-4 flex items-center gap-2">
                        <a href="{{ route('admin.promo.edit', $promo->id) }}"
                            class="flex-1 inline-flex items-center justify-center gap-1 rounded-lg bg-slate-800 px-3 py-2 text-xs font-semibold text-white hover:bg-slate-700 transition-colors">
                            <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                            </svg>
                            Edit
                        </a>
                        <form action="{{ route('admin.promo.destroy', $promo->id) }}" method="POST"
                            class="flex-1 js-delete-form" data-kode="{{ $promo->kode_promo }}">
                            @csrf @method('DELETE')
                            <button type="submit"
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
                                    d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z" />
                            </svg>
                        </div>
                        <p class="text-sm font-medium text-slate-500">Data promo belum tersedia</p>
                    </div>
                </div>
            @endforelse
        </div>
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

        document.querySelectorAll('.js-delete-form').forEach(function(form) {
            form.addEventListener('submit', function(e) {
                e.preventDefault();
                const kode = form.dataset.kode;
                Swal.fire({
                    title: 'Yakin hapus promo?',
                    text: 'Promo "' + kode + '" akan dihapus permanen.',
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#ef4444',
                    cancelButtonColor: '#94a3b8',
                    cancelButtonText: 'Batal',
                    confirmButtonText: 'Ya, hapus',
                    reverseButtons: true
                }).then(function(result) {
                    if (result.isConfirmed) {
                        form.submit();
                    }
                });
            });
        });
    </script>
@endpush
