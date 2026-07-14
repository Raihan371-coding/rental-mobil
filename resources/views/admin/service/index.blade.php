@extends('layouts.admin')
@section('title', 'Service Mobil')
@section('content')

    <div class="mb-6 flex flex-col gap-4 sm:flex-row sm:items-center sm:justify-between">
        <div>
            <h1 class="text-2xl font-bold text-slate-900">Data Service Mobil</h1>
            <p class="mt-1 text-sm text-slate-500">Kelola jadwal service dan catatan perawatan kendaraan.</p>
        </div>
        <a href="{{ route('admin.service.create') }}"
            class="inline-flex items-center justify-center gap-2 rounded-xl bg-cyan-600 px-4 py-2.5 text-sm font-semibold text-white shadow-sm hover:bg-cyan-700 transition-colors">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
            </svg>
            Tambah Service
        </a>
    </div>

    @include('admin.partials.alert')

    {{-- ===================== STAT SUMMARY ===================== --}}
    <div class="mb-6 grid grid-cols-2 gap-4 sm:gap-5 lg:grid-cols-4">
        <div
            class="relative overflow-hidden rounded-2xl bg-white p-5 shadow-sm border border-slate-100 hover:shadow-md transition-shadow duration-300">
            <div class="absolute top-0 right-0 w-20 h-20 rounded-bl-[2.5rem] bg-cyan-50 opacity-60"></div>
            <div class="relative flex items-start justify-between">
                <div>
                    <p class="text-xs font-semibold uppercase tracking-widest text-slate-400">Total Service</p>
                    <h2 class="mt-2 text-3xl font-extrabold text-slate-900">{{ $services->count() }}</h2>
                </div>
                <div
                    class="flex h-10 w-10 flex-shrink-0 items-center justify-center rounded-xl bg-cyan-100 text-cyan-600 shadow-sm">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z" />
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                    </svg>
                </div>
            </div>
        </div>

        <div
            class="relative overflow-hidden rounded-2xl bg-white p-5 shadow-sm border border-slate-100 hover:shadow-md transition-shadow duration-300">
            <div class="absolute top-0 right-0 w-20 h-20 rounded-bl-[2.5rem] bg-amber-50 opacity-60"></div>
            <div class="relative flex items-start justify-between">
                <div>
                    <p class="text-xs font-semibold uppercase tracking-widest text-slate-400">Pending</p>
                    <h2 class="mt-2 text-3xl font-extrabold text-slate-900">
                        {{ $services->where('status_service', 'pending')->count() }}</h2>
                </div>
                <div
                    class="flex h-10 w-10 flex-shrink-0 items-center justify-center rounded-xl bg-amber-100 text-amber-600 shadow-sm">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                </div>
            </div>
        </div>

        <div
            class="relative overflow-hidden rounded-2xl bg-white p-5 shadow-sm border border-slate-100 hover:shadow-md transition-shadow duration-300">
            <div class="absolute top-0 right-0 w-20 h-20 rounded-bl-[2.5rem] bg-blue-50 opacity-60"></div>
            <div class="relative flex items-start justify-between">
                <div>
                    <p class="text-xs font-semibold uppercase tracking-widest text-slate-400">Proses</p>
                    <h2 class="mt-2 text-3xl font-extrabold text-slate-900">
                        {{ $services->where('status_service', 'proses')->count() }}</h2>
                </div>
                <div
                    class="flex h-10 w-10 flex-shrink-0 items-center justify-center rounded-xl bg-blue-100 text-blue-600 shadow-sm">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15" />
                    </svg>
                </div>
            </div>
        </div>

        <div
            class="relative overflow-hidden rounded-2xl bg-gradient-to-br from-emerald-500 to-teal-600 p-5 shadow-lg hover:shadow-xl transition-shadow duration-300">
            <div class="absolute -top-4 -right-4 w-24 h-24 rounded-full bg-white/10"></div>
            <div class="relative flex items-start justify-between">
                <div>
                    <p class="text-xs font-semibold uppercase tracking-widest text-emerald-100">Total Biaya</p>
                    <h2 class="mt-2 text-xl sm:text-2xl font-extrabold text-white leading-tight">
                        Rp {{ number_format($services->sum('biaya_service'), 0, ',', '.') }}
                    </h2>
                </div>
                <div
                    class="flex h-10 w-10 flex-shrink-0 items-center justify-center rounded-xl bg-white/20 text-white shadow-sm">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                </div>
            </div>
        </div>
    </div>

    <div class="rounded-2xl bg-white shadow-sm border border-slate-100 overflow-hidden">
        <div class="hidden lg:block overflow-x-auto">
            <table class="min-w-full divide-y divide-slate-100 text-sm text-slate-700">
                <thead class="bg-slate-50">
                    <tr>
                        <th class="px-5 py-3.5 text-left text-xs font-semibold uppercase tracking-wider text-slate-500">No
                        </th>
                        <th class="px-5 py-3.5 text-left text-xs font-semibold uppercase tracking-wider text-slate-500">Kode
                            Service</th>
                        <th class="px-5 py-3.5 text-left text-xs font-semibold uppercase tracking-wider text-slate-500">
                            Mobil</th>
                        <th class="px-5 py-3.5 text-left text-xs font-semibold uppercase tracking-wider text-slate-500">
                            Tanggal</th>
                        <th class="px-5 py-3.5 text-left text-xs font-semibold uppercase tracking-wider text-slate-500">
                            Biaya</th>
                        <th class="px-5 py-3.5 text-left text-xs font-semibold uppercase tracking-wider text-slate-500">
                            Status</th>
                        <th class="px-5 py-3.5 text-left text-xs font-semibold uppercase tracking-wider text-slate-500">Aksi
                        </th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-100 bg-white">
                    @forelse($services as $service)
                        <tr class="hover:bg-slate-50 transition-colors">
                            <td class="px-5 py-4 text-slate-500">{{ $loop->iteration }}</td>
                            <td class="px-5 py-4 font-mono text-xs font-semibold text-cyan-700">{{ $service->kode_service }}
                            </td>
                            <td class="px-5 py-4 font-semibold text-slate-800">{{ $service->mobil->nama_mobil ?? '-' }}</td>
                            <td class="px-5 py-4 text-slate-600">{{ $service->tanggal_service }}</td>
                            <td class="px-5 py-4 font-semibold text-slate-800">Rp
                                {{ number_format($service->biaya_service, 0, ',', '.') }}</td>
                            <td class="px-5 py-4">
                                @if ($service->status_service == 'pending')
                                    <span
                                        class="inline-flex items-center gap-1 rounded-full bg-amber-100 px-2.5 py-1 text-xs font-semibold text-amber-700">
                                        <span class="w-1.5 h-1.5 rounded-full bg-amber-500"></span> Pending
                                    </span>
                                @elseif($service->status_service == 'proses')
                                    <span
                                        class="inline-flex items-center gap-1 rounded-full bg-blue-100 px-2.5 py-1 text-xs font-semibold text-blue-700">
                                        <span class="w-1.5 h-1.5 rounded-full bg-blue-500 animate-pulse"></span> Proses
                                    </span>
                                @elseif($service->status_service == 'selesai')
                                    <span
                                        class="inline-flex items-center gap-1 rounded-full bg-emerald-100 px-2.5 py-1 text-xs font-semibold text-emerald-700">
                                        <span class="w-1.5 h-1.5 rounded-full bg-emerald-500"></span> Selesai
                                    </span>
                                @else
                                    <span
                                        class="inline-flex items-center gap-1 rounded-full bg-slate-100 px-2.5 py-1 text-xs font-semibold text-slate-600">
                                        {{ ucfirst($service->status_service) }}
                                    </span>
                                @endif
                            </td>
                            <td class="px-5 py-4">
                                <div class="flex items-center gap-2">
                                    <a href="{{ route('admin.service.edit', $service->id) }}"
                                        class="inline-flex items-center gap-1 rounded-lg bg-slate-800 px-3 py-1.5 text-xs font-semibold text-white hover:bg-slate-700 transition-colors">
                                        <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                        </svg>
                                        Edit
                                    </a>
                                    <form action="{{ route('admin.service.destroy', $service->id) }}" method="POST"
                                        class="inline delete-form">
                                        @csrf @method('DELETE')
                                        <button type="button"
                                            onclick="confirmDelete(this, '{{ $service->kode_service }}')"
                                            class="inline-flex items-center gap-1 rounded-lg bg-red-500 px-3 py-1.5 text-xs font-semibold text-white hover:bg-red-600 transition-colors">
                                            <svg class="w-3 h-3" fill="none" stroke="currentColor"
                                                viewBox="0 0 24 24">
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
                            <td colspan="7" class="px-5 py-16 text-center">
                                <div class="flex flex-col items-center gap-3">
                                    <div class="w-14 h-14 rounded-2xl bg-slate-100 flex items-center justify-center">
                                        <svg class="w-7 h-7 text-slate-300" fill="none" stroke="currentColor"
                                            viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z" />
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                        </svg>
                                    </div>
                                    <p class="text-sm font-medium text-slate-500">Data service belum tersedia</p>
                                </div>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        {{-- Card List (mobile & tablet) --}}
        <div class="lg:hidden divide-y divide-slate-100">
            @forelse($services as $service)
                <div class="p-4">
                    <div class="flex items-start justify-between gap-3">
                        <div class="min-w-0">
                            <p class="font-mono text-xs font-semibold text-cyan-700">{{ $service->kode_service }}</p>
                            <p class="mt-1 truncate font-semibold text-slate-800">{{ $service->mobil->nama_mobil ?? '-' }}
                            </p>
                        </div>
                        @if ($service->status_service == 'pending')
                            <span
                                class="flex-shrink-0 inline-flex items-center gap-1 rounded-full bg-amber-100 px-2.5 py-1 text-xs font-semibold text-amber-700">
                                <span class="w-1.5 h-1.5 rounded-full bg-amber-500"></span> Pending
                            </span>
                        @elseif($service->status_service == 'proses')
                            <span
                                class="flex-shrink-0 inline-flex items-center gap-1 rounded-full bg-blue-100 px-2.5 py-1 text-xs font-semibold text-blue-700">
                                <span class="w-1.5 h-1.5 rounded-full bg-blue-500 animate-pulse"></span> Proses
                            </span>
                        @elseif($service->status_service == 'selesai')
                            <span
                                class="flex-shrink-0 inline-flex items-center gap-1 rounded-full bg-emerald-100 px-2.5 py-1 text-xs font-semibold text-emerald-700">
                                <span class="w-1.5 h-1.5 rounded-full bg-emerald-500"></span> Selesai
                            </span>
                        @else
                            <span
                                class="flex-shrink-0 inline-flex items-center gap-1 rounded-full bg-slate-100 px-2.5 py-1 text-xs font-semibold text-slate-600">
                                {{ ucfirst($service->status_service) }}
                            </span>
                        @endif
                    </div>
                    <div class="mt-3 flex items-center justify-between text-sm">
                        <span class="text-slate-500">{{ $service->tanggal_service }}</span>
                        <span class="font-semibold text-slate-800">Rp
                            {{ number_format($service->biaya_service, 0, ',', '.') }}</span>
                    </div>
                    <div class="mt-4 flex items-center gap-2">
                        <a href="{{ route('admin.service.edit', $service->id) }}"
                            class="flex-1 inline-flex items-center justify-center gap-1 rounded-lg bg-slate-800 px-3 py-2 text-xs font-semibold text-white hover:bg-slate-700 transition-colors">
                            <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                            </svg>
                            Edit
                        </a>
                        <form action="{{ route('admin.service.destroy', $service->id) }}" method="POST"
                            class="flex-1 delete-form">
                            @csrf @method('DELETE')
                            <button type="button" onclick="confirmDelete(this, '{{ $service->kode_service }}')"
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
                                    d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z" />
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                            </svg>
                        </div>
                        <p class="text-sm font-medium text-slate-500">Data service belum tersedia</p>
                    </div>
                </div>
            @endforelse
        </div>
    </div>

@endsection

@push('scripts')
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        function confirmDelete(btn, kode) {
            Swal.fire({
                title: `Yakin hapus service ${kode}?`,
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
                confirmButtonColor: '#0891b2',
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
