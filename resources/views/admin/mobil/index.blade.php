@extends('layouts.admin')
@section('title', 'Data Mobil')
@section('content')

    {{-- Page Header --}}
    <div class="mb-6 flex flex-col gap-4 sm:flex-row sm:items-center sm:justify-between">
        <div>
            <h1 class="text-2xl font-bold text-slate-900">Data Mobil</h1>
            <p class="mt-1 text-sm text-slate-500">Kelola daftar mobil rental, tarif, dan status armada.</p>
        </div>
        <a href="{{ route('admin.mobil.create') }}"
            class="inline-flex items-center justify-center gap-2 rounded-xl bg-blue-600 px-4 py-2.5 text-sm font-semibold text-white shadow-sm hover:bg-blue-700 transition-colors w-full sm:w-auto">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
            </svg>
            Tambah Mobil
        </a>
    </div>

    {{-- Stat strip (consistent with dashboard cards) --}}
    <div class="grid grid-cols-2 gap-4 mb-6 sm:grid-cols-4">
        <div class="relative overflow-hidden rounded-2xl bg-white p-4 shadow-sm border border-slate-100">
            <div class="absolute top-0 right-0 w-16 h-16 rounded-bl-[2rem] bg-blue-50 opacity-60"></div>
            <p class="relative text-[11px] font-semibold uppercase tracking-widest text-slate-400">Total</p>
            <h2 class="relative mt-1 text-2xl font-extrabold text-slate-900">{{ $mobils->count() }}</h2>
        </div>
        <div class="relative overflow-hidden rounded-2xl bg-white p-4 shadow-sm border border-slate-100">
            <div class="absolute top-0 right-0 w-16 h-16 rounded-bl-[2rem] bg-emerald-50 opacity-60"></div>
            <p class="relative text-[11px] font-semibold uppercase tracking-widest text-slate-400">Tersedia</p>
            <h2 class="relative mt-1 text-2xl font-extrabold text-emerald-600">
                {{ $mobils->where('status', 'tersedia')->count() }}</h2>
        </div>
        <div class="relative overflow-hidden rounded-2xl bg-white p-4 shadow-sm border border-slate-100">
            <div class="absolute top-0 right-0 w-16 h-16 rounded-bl-[2rem] bg-red-50 opacity-60"></div>
            <p class="relative text-[11px] font-semibold uppercase tracking-widest text-slate-400">Disewa</p>
            <h2 class="relative mt-1 text-2xl font-extrabold text-red-500">{{ $mobils->where('status', 'disewa')->count() }}
            </h2>
        </div>
        <div class="relative overflow-hidden rounded-2xl bg-white p-4 shadow-sm border border-slate-100">
            <div class="absolute top-0 right-0 w-16 h-16 rounded-bl-[2rem] bg-amber-50 opacity-60"></div>
            <p class="relative text-[11px] font-semibold uppercase tracking-widest text-slate-400">Service</p>
            <h2 class="relative mt-1 text-2xl font-extrabold text-amber-600">
                {{ $mobils->where('status', 'service')->count() }}</h2>
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
                        <th class="px-5 py-3.5 text-left text-xs font-semibold uppercase tracking-wider text-slate-500">No
                        </th>
                        <th class="px-5 py-3.5 text-left text-xs font-semibold uppercase tracking-wider text-slate-500">Foto
                        </th>
                        <th class="px-5 py-3.5 text-left text-xs font-semibold uppercase tracking-wider text-slate-500">Kode
                        </th>
                        <th class="px-5 py-3.5 text-left text-xs font-semibold uppercase tracking-wider text-slate-500">Nama
                            Mobil</th>
                        <th class="px-5 py-3.5 text-left text-xs font-semibold uppercase tracking-wider text-slate-500">Merk
                        </th>
                        <th class="px-5 py-3.5 text-left text-xs font-semibold uppercase tracking-wider text-slate-500">Plat
                        </th>
                        <th class="px-5 py-3.5 text-left text-xs font-semibold uppercase tracking-wider text-slate-500">
                            Tahun</th>
                        <th class="px-5 py-3.5 text-left text-xs font-semibold uppercase tracking-wider text-slate-500">
                            Harga/Hari</th>
                        <th class="px-5 py-3.5 text-left text-xs font-semibold uppercase tracking-wider text-slate-500">
                            Status</th>
                        <th class="px-5 py-3.5 text-left text-xs font-semibold uppercase tracking-wider text-slate-500">Aksi
                        </th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-100 bg-white">
                    @forelse ($mobils as $mobil)
                        <tr class="hover:bg-slate-50 transition-colors">
                            <td class="px-5 py-4 text-slate-500">{{ $loop->iteration }}</td>
                            <td class="px-5 py-4">
                                @if ($mobil->foto)
                                    <button type="button"
                                        onclick="showFoto('{{ asset('storage/' . $mobil->foto) }}', '{{ $mobil->nama_mobil }}')">
                                        <img src="{{ asset('storage/' . $mobil->foto) }}" alt="{{ $mobil->nama_mobil }}"
                                            class="h-12 w-20 rounded-lg object-cover border border-slate-200 hover:opacity-80 transition cursor-zoom-in">
                                    </button>
                                @else
                                    <div class="h-12 w-20 rounded-lg bg-slate-100 flex items-center justify-center">
                                        <svg class="w-5 h-5 text-slate-300" fill="none" stroke="currentColor"
                                            viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                        </svg>
                                    </div>
                                @endif
                            </td>
                            <td class="px-5 py-4 font-mono text-xs text-slate-500">{{ $mobil->kode_mobil }}</td>
                            <td class="px-5 py-4 font-semibold text-slate-900">{{ $mobil->nama_mobil }}</td>
                            <td class="px-5 py-4 text-slate-600">{{ $mobil->merk }}</td>
                            <td class="px-5 py-4">
                                <span
                                    class="rounded-md bg-slate-100 px-2 py-1 text-xs font-medium text-slate-600">{{ $mobil->plat_nomor }}</span>
                            </td>
                            <td class="px-5 py-4 text-slate-600">{{ $mobil->tahun }}</td>
                            <td class="px-5 py-4 font-semibold text-slate-800">Rp
                                {{ number_format($mobil->harga_sewa, 0, ',', '.') }}</td>
                            <td class="px-5 py-4">
                                @if ($mobil->status == 'tersedia')
                                    <span
                                        class="inline-flex items-center gap-1 rounded-full bg-emerald-100 px-2.5 py-1 text-xs font-semibold text-emerald-700">
                                        <span class="w-1.5 h-1.5 rounded-full bg-emerald-500"></span> Tersedia
                                    </span>
                                @elseif($mobil->status == 'disewa')
                                    <span
                                        class="inline-flex items-center gap-1 rounded-full bg-red-100 px-2.5 py-1 text-xs font-semibold text-red-700">
                                        <span class="w-1.5 h-1.5 rounded-full bg-red-500"></span> Disewa
                                    </span>
                                @else
                                    <span
                                        class="inline-flex items-center gap-1 rounded-full bg-amber-100 px-2.5 py-1 text-xs font-semibold text-amber-700">
                                        <span class="w-1.5 h-1.5 rounded-full bg-amber-500"></span>
                                        {{ ucfirst($mobil->status) }}
                                    </span>
                                @endif
                            </td>
                            <td class="px-5 py-4">
                                <div class="flex items-center gap-2">
                                    <a href="{{ route('admin.mobil.edit', $mobil->id) }}"
                                        class="inline-flex items-center gap-1 rounded-lg bg-slate-800 px-3 py-1.5 text-xs font-semibold text-white hover:bg-slate-700 transition-colors">
                                        <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                        </svg>
                                        Edit
                                    </a>
                                    <form action="{{ route('admin.mobil.destroy', $mobil->id) }}" method="POST"
                                        class="inline delete-form">
                                        @csrf @method('DELETE')
                                        <button type="button" data-nama="{{ $mobil->nama_mobil }}"
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
                            <td colspan="10" class="px-5 py-16 text-center">
                                <div class="flex flex-col items-center gap-3">
                                    <div class="w-14 h-14 rounded-2xl bg-slate-100 flex items-center justify-center">
                                        <svg class="w-7 h-7 text-slate-300" fill="none" stroke="currentColor"
                                            viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M8 7h12m0 0l-4-4m4 4l-4 4m0 6H4m0 0l4 4m-4-4l4-4" />
                                        </svg>
                                    </div>
                                    <p class="text-sm font-medium text-slate-500">Data mobil belum tersedia</p>
                                    <a href="{{ route('admin.mobil.create') }}"
                                        class="text-sm font-semibold text-blue-600 hover:text-blue-700">Tambah mobil
                                        pertama →</a>
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
        @forelse ($mobils as $mobil)
            <div class="rounded-2xl bg-white shadow-sm border border-slate-100 p-4">
                <div class="flex gap-4">
                    @if ($mobil->foto)
                        <button type="button"
                            onclick="showFoto('{{ asset('storage/' . $mobil->foto) }}', '{{ $mobil->nama_mobil }}')"
                            class="flex-shrink-0">
                            <img src="{{ asset('storage/' . $mobil->foto) }}" alt="{{ $mobil->nama_mobil }}"
                                class="h-20 w-28 rounded-xl object-cover border border-slate-200 cursor-zoom-in">
                        </button>
                    @else
                        <div class="h-20 w-28 flex-shrink-0 rounded-xl bg-slate-100 flex items-center justify-center">
                            <svg class="w-6 h-6 text-slate-300" fill="none" stroke="currentColor"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                            </svg>
                        </div>
                    @endif
                    <div class="min-w-0 flex-1">
                        <div class="flex items-start justify-between gap-2">
                            <div class="min-w-0">
                                <p class="font-mono text-[11px] text-slate-400">{{ $mobil->kode_mobil }}</p>
                                <h3 class="font-semibold text-slate-900 truncate">{{ $mobil->nama_mobil }}</h3>
                                <p class="text-xs text-slate-500">{{ $mobil->merk }} &middot; {{ $mobil->tahun }}</p>
                            </div>
                            @if ($mobil->status == 'tersedia')
                                <span
                                    class="flex-shrink-0 inline-flex items-center gap-1 rounded-full bg-emerald-100 px-2 py-1 text-[10px] font-semibold text-emerald-700">
                                    <span class="w-1.5 h-1.5 rounded-full bg-emerald-500"></span> Tersedia
                                </span>
                            @elseif($mobil->status == 'disewa')
                                <span
                                    class="flex-shrink-0 inline-flex items-center gap-1 rounded-full bg-red-100 px-2 py-1 text-[10px] font-semibold text-red-700">
                                    <span class="w-1.5 h-1.5 rounded-full bg-red-500"></span> Disewa
                                </span>
                            @else
                                <span
                                    class="flex-shrink-0 inline-flex items-center gap-1 rounded-full bg-amber-100 px-2 py-1 text-[10px] font-semibold text-amber-700">
                                    <span class="w-1.5 h-1.5 rounded-full bg-amber-500"></span>
                                    {{ ucfirst($mobil->status) }}
                                </span>
                            @endif
                        </div>
                        <div class="mt-2 flex items-center justify-between">
                            <span
                                class="rounded-md bg-slate-100 px-2 py-1 text-xs font-medium text-slate-600">{{ $mobil->plat_nomor }}</span>
                            <span class="text-sm font-bold text-slate-800">Rp
                                {{ number_format($mobil->harga_sewa, 0, ',', '.') }}</span>
                        </div>
                    </div>
                </div>

                <div class="mt-4 flex items-center gap-2 pt-3 border-t border-slate-100">
                    <a href="{{ route('admin.mobil.edit', $mobil->id) }}"
                        class="flex-1 inline-flex items-center justify-center gap-1 rounded-lg bg-slate-800 px-3 py-2 text-xs font-semibold text-white hover:bg-slate-700 transition-colors">
                        <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                        </svg>
                        Edit
                    </a>
                    <form action="{{ route('admin.mobil.destroy', $mobil->id) }}" method="POST"
                        class="flex-1 delete-form">
                        @csrf @method('DELETE')
                        <button type="button" data-nama="{{ $mobil->nama_mobil }}"
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
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M8 7h12m0 0l-4-4m4 4l-4 4m0 6H4m0 0l4 4m-4-4l4-4" />
                        </svg>
                    </div>
                    <p class="text-sm font-medium text-slate-500">Data mobil belum tersedia</p>
                    <a href="{{ route('admin.mobil.create') }}"
                        class="text-sm font-semibold text-blue-600 hover:text-blue-700">Tambah mobil pertama →</a>
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
                    title: 'Hapus Mobil?',
                    html: `Yakin ingin menghapus <b>${nama}</b>? Data yang sudah dihapus tidak dapat dikembalikan.`,
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

        // Popup / lightbox untuk preview foto mobil
        function showFoto(url, nama) {
            Swal.fire({
                title: nama,
                imageUrl: url,
                imageAlt: 'Foto ' + nama,
                showCloseButton: true,
                showConfirmButton: false,
                width: 'auto',
                padding: '1.5rem',
                background: '#fff',
                customClass: {
                    image: 'rounded-xl max-h-[70vh] w-auto object-contain'
                }
            });
        }
    </script>
@endpush
