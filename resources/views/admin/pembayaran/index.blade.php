@extends('layouts.admin')
@section('title', 'Pembayaran')
@section('content')

    {{-- ===================== PAGE HEADER ===================== --}}
    <div class="mb-6 flex flex-col gap-4 sm:flex-row sm:items-center sm:justify-between">
        <div>
            <h1 class="text-2xl font-bold text-slate-900">Data Pembayaran</h1>
            <p class="mt-1 text-sm text-slate-500">Pantau status pembayaran dan verifikasi transaksi rental.</p>
        </div>
        <a href="{{ route('admin.pembayaran.create') }}"
            class="inline-flex items-center justify-center gap-2 rounded-xl bg-rose-600 px-4 py-2.5 text-sm font-semibold text-white shadow-sm hover:bg-rose-700 transition-colors">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
            </svg>
            Tambah Pembayaran
        </a>
    </div>

    {{-- ===================== STAT STRIP ===================== --}}
    <div class="mb-6 grid grid-cols-2 gap-4 sm:grid-cols-4">
        <div class="rounded-2xl bg-white p-4 shadow-sm border border-slate-100">
            <p class="text-xs font-semibold uppercase tracking-widest text-slate-400">Total</p>
            <h2 class="mt-2 text-2xl font-extrabold text-slate-900">{{ $data->count() }}</h2>
        </div>
        <div class="rounded-2xl bg-white p-4 shadow-sm border border-slate-100">
            <p class="text-xs font-semibold uppercase tracking-widest text-slate-400">Lunas</p>
            <h2 class="mt-2 text-2xl font-extrabold text-emerald-600">{{ $data->where('status_bayar', 'lunas')->count() }}
            </h2>
        </div>
        <div class="rounded-2xl bg-white p-4 shadow-sm border border-slate-100">
            <p class="text-xs font-semibold uppercase tracking-widest text-slate-400">Menunggu</p>
            <h2 class="mt-2 text-2xl font-extrabold text-amber-600">
                {{ $data->where('status_bayar', 'menunggu_verifikasi')->count() }}</h2>
        </div>
        <div class="rounded-2xl bg-white p-4 shadow-sm border border-slate-100">
            <p class="text-xs font-semibold uppercase tracking-widest text-slate-400">Ditolak</p>
            <h2 class="mt-2 text-2xl font-extrabold text-red-500">{{ $data->where('status_bayar', 'ditolak')->count() }}
            </h2>
        </div>
    </div>

    {{-- ===================== TABLE (desktop) ===================== --}}
    <div class="hidden rounded-2xl bg-white shadow-sm border border-slate-100 overflow-hidden md:block">
        <div class="overflow-x-auto">
            <table class="min-w-full divide-y divide-slate-100 text-sm text-slate-700">
                <thead class="bg-slate-50">
                    <tr>
                        <th class="px-5 py-3.5 text-left text-xs font-semibold uppercase tracking-wider text-slate-500">Kode
                            Pembayaran</th>
                        <th class="px-5 py-3.5 text-left text-xs font-semibold uppercase tracking-wider text-slate-500">
                            Rental</th>
                        <th class="px-5 py-3.5 text-left text-xs font-semibold uppercase tracking-wider text-slate-500">Tgl
                            Bayar</th>
                        <th class="px-5 py-3.5 text-left text-xs font-semibold uppercase tracking-wider text-slate-500">
                            Metode</th>
                        <th class="px-5 py-3.5 text-left text-xs font-semibold uppercase tracking-wider text-slate-500">
                            Jumlah</th>
                        <th class="px-5 py-3.5 text-left text-xs font-semibold uppercase tracking-wider text-slate-500">
                            Status</th>
                        <th class="px-5 py-3.5 text-left text-xs font-semibold uppercase tracking-wider text-slate-500">
                            Bukti</th>
                        <th class="px-5 py-3.5 text-left text-xs font-semibold uppercase tracking-wider text-slate-500">Aksi
                        </th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-100 bg-white">
                    @forelse($data as $item)
                        <tr class="hover:bg-slate-50 transition-colors">
                            <td class="px-5 py-4 font-mono text-xs font-semibold text-rose-700">{{ $item->kode_pembayaran }}
                            </td>
                            <td class="px-5 py-4 font-mono text-xs text-slate-500">{{ $item->rental->kode_rental }}</td>
                            <td class="px-5 py-4 text-slate-600">{{ $item->tanggal_bayar }}</td>
                            <td class="px-5 py-4">
                                <span
                                    class="rounded-md bg-slate-100 px-2 py-1 text-xs font-medium text-slate-600">{{ $item->metode_bayar }}</span>
                            </td>
                            <td class="px-5 py-4 font-semibold text-slate-800">Rp
                                {{ number_format($item->jumlah_bayar, 0, ',', '.') }}</td>
                            <td class="px-5 py-4">
                                @include('admin.pembayaran.partials.status-badge', [
                                    'status' => $item->status_bayar,
                                ])
                            </td>
                            <td class="px-5 py-4">
                                @if ($item->bukti_pembayaran)
                                    <button type="button"
                                        onclick="showBukti('{{ asset('bukti_pembayaran/' . $item->bukti_pembayaran) }}', '{{ $item->kode_pembayaran }}')"
                                        class="block">
                                        <img src="{{ asset('bukti_pembayaran/' . $item->bukti_pembayaran) }}"
                                            class="w-14 h-14 rounded-lg border border-slate-200 object-cover hover:opacity-80 transition cursor-zoom-in">
                                    </button>
                                @else
                                    <span class="text-xs text-slate-400 italic">Belum upload</span>
                                @endif
                            </td>
                            <td class="px-5 py-4">
                                <div class="flex items-center flex-wrap gap-2">
                                    @if ($item->status_bayar == 'menunggu_verifikasi')
                                        <form action="{{ route('admin.pembayaran.terima', $item->id) }}" method="POST"
                                            class="inline js-confirm-form" data-title="Terima pembayaran ini?"
                                            data-text="Pembayaran akan ditandai sebagai lunas." data-icon="question"
                                            data-confirm="Ya, terima" data-color="#059669">
                                            @csrf @method('PUT')
                                            <button type="submit"
                                                class="inline-flex items-center gap-1 rounded-lg bg-emerald-600 px-3 py-1.5 text-xs font-semibold text-white hover:bg-emerald-700 transition-colors">
                                                <svg class="w-3 h-3" fill="none" stroke="currentColor"
                                                    viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                        d="M5 13l4 4L19 7" />
                                                </svg>
                                                Terima
                                            </button>
                                        </form>
                                        <form action="{{ route('admin.pembayaran.tolak', $item->id) }}" method="POST"
                                            class="inline js-confirm-form" data-title="Tolak pembayaran ini?"
                                            data-text="Customer perlu mengunggah ulang bukti pembayaran."
                                            data-icon="warning" data-confirm="Ya, tolak" data-color="#ef4444">
                                            @csrf @method('PUT')
                                            <button type="submit"
                                                class="inline-flex items-center gap-1 rounded-lg bg-red-500 px-3 py-1.5 text-xs font-semibold text-white hover:bg-red-600 transition-colors">
                                                <svg class="w-3 h-3" fill="none" stroke="currentColor"
                                                    viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                        d="M6 18L18 6M6 6l12 12" />
                                                </svg>
                                                Tolak
                                            </button>
                                        </form>
                                    @else
                                        <a href="{{ route('admin.pembayaran.edit', $item->id) }}"
                                            class="inline-flex items-center gap-1 rounded-lg bg-slate-800 px-3 py-1.5 text-xs font-semibold text-white hover:bg-slate-700 transition-colors">
                                            <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                            </svg>
                                            Edit
                                        </a>
                                        <form action="{{ route('admin.pembayaran.destroy', $item->id) }}" method="POST"
                                            class="inline js-confirm-form" data-title="Hapus pembayaran ini?"
                                            data-text="Data yang sudah dihapus tidak dapat dikembalikan."
                                            data-icon="warning" data-confirm="Ya, hapus" data-color="#ef4444">
                                            @csrf @method('DELETE')
                                            <button type="submit"
                                                class="inline-flex items-center gap-1 rounded-lg bg-red-500 px-3 py-1.5 text-xs font-semibold text-white hover:bg-red-600 transition-colors">
                                                <svg class="w-3 h-3" fill="none" stroke="currentColor"
                                                    viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                        d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                                </svg>
                                                Hapus
                                            </button>
                                        </form>
                                    @endif
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="8" class="px-5 py-16 text-center">
                                @include('admin.pembayaran.partials.empty-state')
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

    {{-- ===================== CARDS (mobile) ===================== --}}
    <div class="space-y-4 md:hidden">
        @forelse($data as $item)
            <div class="rounded-2xl bg-white p-5 shadow-sm border border-slate-100">
                <div class="flex items-start justify-between gap-3">
                    <div>
                        <p class="font-mono text-xs font-semibold text-rose-700">{{ $item->kode_pembayaran }}</p>
                        <p class="mt-1 font-mono text-xs text-slate-500">{{ $item->rental->kode_rental }}</p>
                    </div>
                    @include('admin.pembayaran.partials.status-badge', ['status' => $item->status_bayar])
                </div>

                <div class="mt-4 grid grid-cols-2 gap-3 text-sm">
                    <div>
                        <p class="text-xs text-slate-400">Tgl Bayar</p>
                        <p class="mt-0.5 font-medium text-slate-700">{{ $item->tanggal_bayar }}</p>
                    </div>
                    <div>
                        <p class="text-xs text-slate-400">Metode</p>
                        <span
                            class="mt-0.5 inline-block rounded-md bg-slate-100 px-2 py-0.5 text-xs font-medium text-slate-600">{{ $item->metode_bayar }}</span>
                    </div>
                    <div>
                        <p class="text-xs text-slate-400">Jumlah</p>
                        <p class="mt-0.5 font-semibold text-slate-800">Rp
                            {{ number_format($item->jumlah_bayar, 0, ',', '.') }}</p>
                    </div>
                    <div>
                        <p class="text-xs text-slate-400">Bukti</p>
                        @if ($item->bukti_pembayaran)
                            <button type="button"
                                onclick="showBukti('{{ asset('bukti_pembayaran/' . $item->bukti_pembayaran) }}', '{{ $item->kode_pembayaran }}')">
                                <img src="{{ asset('bukti_pembayaran/' . $item->bukti_pembayaran) }}"
                                    class="mt-1 w-12 h-12 rounded-lg border border-slate-200 object-cover cursor-zoom-in">
                            </button>
                        @else
                            <p class="mt-0.5 text-xs text-slate-400 italic">Belum upload</p>
                        @endif
                    </div>
                </div>

                <div class="mt-4 flex items-center flex-wrap gap-2 border-t border-slate-100 pt-4">
                    @if ($item->status_bayar == 'menunggu_verifikasi')
                        <form action="{{ route('admin.pembayaran.terima', $item->id) }}" method="POST"
                            class="flex-1 js-confirm-form" data-title="Terima pembayaran ini?"
                            data-text="Pembayaran akan ditandai sebagai lunas." data-icon="question"
                            data-confirm="Ya, terima" data-color="#059669">
                            @csrf @method('PUT')
                            <button type="submit"
                                class="flex w-full items-center justify-center gap-1 rounded-lg bg-emerald-600 px-3 py-2 text-xs font-semibold text-white hover:bg-emerald-700 transition-colors">
                                <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M5 13l4 4L19 7" />
                                </svg>
                                Terima
                            </button>
                        </form>
                        <form action="{{ route('admin.pembayaran.tolak', $item->id) }}" method="POST"
                            class="flex-1 js-confirm-form" data-title="Tolak pembayaran ini?"
                            data-text="Customer perlu mengunggah ulang bukti pembayaran." data-icon="warning"
                            data-confirm="Ya, tolak" data-color="#ef4444">
                            @csrf @method('PUT')
                            <button type="submit"
                                class="flex w-full items-center justify-center gap-1 rounded-lg bg-red-500 px-3 py-2 text-xs font-semibold text-white hover:bg-red-600 transition-colors">
                                <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M6 18L18 6M6 6l12 12" />
                                </svg>
                                Tolak
                            </button>
                        </form>
                    @else
                        <a href="{{ route('admin.pembayaran.edit', $item->id) }}"
                            class="flex flex-1 items-center justify-center gap-1 rounded-lg bg-slate-800 px-3 py-2 text-xs font-semibold text-white hover:bg-slate-700 transition-colors">
                            <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                            </svg>
                            Edit
                        </a>
                        <form action="{{ route('admin.pembayaran.destroy', $item->id) }}" method="POST"
                            class="flex-1 js-confirm-form" data-title="Hapus pembayaran ini?"
                            data-text="Data yang sudah dihapus tidak dapat dikembalikan." data-icon="warning"
                            data-confirm="Ya, hapus" data-color="#ef4444">
                            @csrf @method('DELETE')
                            <button type="submit"
                                class="flex w-full items-center justify-center gap-1 rounded-lg bg-red-500 px-3 py-2 text-xs font-semibold text-white hover:bg-red-600 transition-colors">
                                <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                </svg>
                                Hapus
                            </button>
                        </form>
                    @endif
                </div>
            </div>
        @empty
            <div class="rounded-2xl bg-white p-6 shadow-sm border border-slate-100">
                @include('admin.pembayaran.partials.empty-state')
            </div>
        @endforelse
    </div>

@endsection

@push('scripts')
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        // Toast notifikasi dari session flash (success / error)
        @if (session('success'))
            Swal.fire({
                toast: true,
                position: 'top-end',
                icon: 'success',
                title: @json(session('success')),
                showConfirmButton: false,
                timer: 2500,
                timerProgressBar: true
            });
        @endif

        @if (session('error'))
            Swal.fire({
                toast: true,
                position: 'top-end',
                icon: 'error',
                title: @json(session('error')),
                showConfirmButton: false,
                timer: 2500,
                timerProgressBar: true
            });
        @endif

        // Konfirmasi aksi (terima / tolak / hapus) via SweetAlert
        document.querySelectorAll('.js-confirm-form').forEach(function(form) {
            form.addEventListener('submit', function(e) {
                e.preventDefault();
                Swal.fire({
                    title: form.dataset.title,
                    text: form.dataset.text,
                    icon: form.dataset.icon || 'warning',
                    showCancelButton: true,
                    confirmButtonText: form.dataset.confirm || 'Ya',
                    cancelButtonText: 'Batal',
                    confirmButtonColor: form.dataset.color || '#0ea5e9',
                    cancelButtonColor: '#94a3b8',
                    reverseButtons: true
                }).then(function(result) {
                    if (result.isConfirmed) {
                        form.submit();
                    }
                });
            });
        });

        // Popup / lightbox untuk preview gambar bukti pembayaran
        function showBukti(url, kode) {
            Swal.fire({
                title: kode,
                imageUrl: url,
                imageAlt: 'Bukti Pembayaran ' + kode,
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
