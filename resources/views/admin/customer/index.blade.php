@extends('layouts.admin')
@section('title', 'Customer')
@section('content')

    {{-- ===================== PAGE HEADER ===================== --}}
    <div class="mb-6 flex flex-col gap-4 sm:flex-row sm:items-center sm:justify-between">
        <div>
            <h1 class="text-2xl font-bold text-slate-900">Data Customer</h1>
            <p class="mt-1 text-sm text-slate-500">Kelola data pelanggan dan histori penyewaan mereka.</p>
        </div>
        <a href="{{ route('admin.customer.create') }}"
            class="inline-flex items-center justify-center gap-2 rounded-xl bg-emerald-600 px-4 py-2.5 text-sm font-semibold text-white shadow-sm hover:bg-emerald-700 transition-colors">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
            </svg>
            Tambah Customer
        </a>
    </div>

    {{-- ===================== STAT SUMMARY ===================== --}}
    <div class="mb-6 grid grid-cols-1 gap-5 sm:grid-cols-3">
        <div
            class="relative overflow-hidden rounded-2xl bg-white p-6 shadow-sm border border-slate-100 hover:shadow-md transition-shadow duration-300">
            <div class="absolute top-0 right-0 w-24 h-24 rounded-bl-[3rem] bg-emerald-50 opacity-60"></div>
            <div class="relative flex items-start justify-between">
                <div>
                    <p class="text-xs font-semibold uppercase tracking-widest text-slate-400">Total Customer</p>
                    <h2 class="mt-3 text-4xl font-extrabold text-slate-900">{{ $customers->count() }}</h2>
                </div>
                <div
                    class="flex h-12 w-12 flex-shrink-0 items-center justify-center rounded-xl bg-emerald-100 text-emerald-600 shadow-sm">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0z" />
                    </svg>
                </div>
            </div>
            <div class="mt-5">
                <span class="text-xs text-slate-400">Total pelanggan terdaftar</span>
            </div>
        </div>

        <div
            class="relative overflow-hidden rounded-2xl bg-white p-6 shadow-sm border border-slate-100 hover:shadow-md transition-shadow duration-300 sm:col-span-2">
            <div class="relative flex h-full flex-col justify-center">
                <h3 class="text-sm font-bold text-slate-900">Tips</h3>
                <p class="mt-1 text-xs text-slate-500 leading-relaxed">
                    Kaitkan customer dengan akun user (opsional) agar pelanggan dapat login dan melihat histori penyewaannya
                    sendiri.
                </p>
            </div>
        </div>
    </div>

    {{-- ===================== TABLE CARD ===================== --}}
    <div class="rounded-2xl bg-white shadow-sm border border-slate-100 overflow-hidden">

        {{-- Mobile search / info bar (optional visual, purely cosmetic) --}}
        <div class="flex items-center justify-between border-b border-slate-100 px-5 py-4">
            <h3 class="text-sm font-bold text-slate-900">Daftar Customer</h3>
            <span class="text-xs text-slate-400">{{ $customers->count() }} data</span>
        </div>

        {{-- Desktop / tablet table --}}
        <div class="hidden overflow-x-auto md:block">
            <table class="min-w-full divide-y divide-slate-100 text-sm text-slate-700">
                <thead class="bg-slate-50">
                    <tr>
                        <th class="px-5 py-3.5 text-left text-xs font-semibold uppercase tracking-wider text-slate-500">No
                        </th>
                        <th class="px-5 py-3.5 text-left text-xs font-semibold uppercase tracking-wider text-slate-500">Nama
                        </th>
                        <th class="px-5 py-3.5 text-left text-xs font-semibold uppercase tracking-wider text-slate-500">
                            Alamat</th>
                        <th class="px-5 py-3.5 text-left text-xs font-semibold uppercase tracking-wider text-slate-500">No
                            Identitas</th>
                        <th class="px-5 py-3.5 text-left text-xs font-semibold uppercase tracking-wider text-slate-500">No
                            Telepon</th>
                        <th class="px-5 py-3.5 text-left text-xs font-semibold uppercase tracking-wider text-slate-500">
                            Email</th>
                        <th class="px-5 py-3.5 text-left text-xs font-semibold uppercase tracking-wider text-slate-500">Aksi
                        </th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-100 bg-white">
                    @forelse($customers as $customer)
                        <tr class="hover:bg-slate-50 transition-colors">
                            <td class="px-5 py-4 text-slate-500">{{ $loop->iteration }}</td>
                            <td class="px-5 py-4">
                                <div class="flex items-center gap-3">
                                    <div
                                        class="w-8 h-8 rounded-full bg-emerald-100 flex items-center justify-center text-xs font-bold text-emerald-700 flex-shrink-0">
                                        {{ strtoupper(substr($customer->nama, 0, 1)) }}
                                    </div>
                                    <span class="font-semibold text-slate-900">{{ $customer->nama }}</span>
                                </div>
                            </td>
                            <td class="px-5 py-4 text-slate-600 max-w-[160px] truncate">{{ $customer->alamat }}</td>
                            <td class="px-5 py-4 font-mono text-xs text-slate-500">{{ $customer->no_identitas ?? '-' }}</td>
                            <td class="px-5 py-4 text-slate-600">{{ $customer->no_telp }}</td>
                            <td class="px-5 py-4 text-slate-600">{{ $customer->email ?? '-' }}</td>
                            <td class="px-5 py-4">
                                <div class="flex items-center gap-2">
                                    <a href="{{ route('admin.customer.edit', $customer->id) }}"
                                        class="inline-flex items-center gap-1 rounded-lg bg-slate-800 px-3 py-1.5 text-xs font-semibold text-white hover:bg-slate-700 transition-colors">
                                        <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                        </svg>
                                        Edit
                                    </a>
                                    <form action="{{ route('admin.customer.destroy', $customer->id) }}" method="POST"
                                        class="inline delete-form">
                                        @csrf @method('DELETE')
                                        <button type="button" data-name="{{ $customer->nama }}"
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
                            <td colspan="7" class="px-5 py-16 text-center">
                                <div class="flex flex-col items-center gap-3">
                                    <div class="w-14 h-14 rounded-2xl bg-slate-100 flex items-center justify-center">
                                        <svg class="w-7 h-7 text-slate-300" fill="none" stroke="currentColor"
                                            viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0z" />
                                        </svg>
                                    </div>
                                    <p class="text-sm font-medium text-slate-500">Data customer belum tersedia</p>
                                </div>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        {{-- Mobile card list --}}
        <div class="divide-y divide-slate-100 md:hidden">
            @forelse($customers as $customer)
                <div class="p-4">
                    <div class="flex items-start justify-between gap-3">
                        <div class="flex items-center gap-3 min-w-0">
                            <div
                                class="w-10 h-10 rounded-full bg-emerald-100 flex items-center justify-center text-sm font-bold text-emerald-700 flex-shrink-0">
                                {{ strtoupper(substr($customer->nama, 0, 1)) }}
                            </div>
                            <div class="min-w-0">
                                <p class="font-semibold text-slate-900 truncate">{{ $customer->nama }}</p>
                                <p class="text-xs text-slate-500 truncate">{{ $customer->email ?? '-' }}</p>
                            </div>
                        </div>
                        <span
                            class="flex-shrink-0 rounded-full bg-slate-100 px-2.5 py-1 text-[11px] font-semibold text-slate-500">#{{ $loop->iteration }}</span>
                    </div>

                    <div class="mt-3 grid grid-cols-2 gap-y-2 gap-x-3 text-xs">
                        <div>
                            <p class="text-slate-400">Alamat</p>
                            <p class="text-slate-700 truncate">{{ $customer->alamat }}</p>
                        </div>
                        <div>
                            <p class="text-slate-400">No Telepon</p>
                            <p class="text-slate-700">{{ $customer->no_telp }}</p>
                        </div>
                        <div>
                            <p class="text-slate-400">No Identitas</p>
                            <p class="text-slate-700 font-mono">{{ $customer->no_identitas ?? '-' }}</p>
                        </div>
                    </div>

                    <div class="mt-4 flex items-center gap-2">
                        <a href="{{ route('admin.customer.edit', $customer->id) }}"
                            class="flex-1 inline-flex items-center justify-center gap-1 rounded-lg bg-slate-800 px-3 py-2 text-xs font-semibold text-white hover:bg-slate-700 transition-colors">
                            <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                            </svg>
                            Edit
                        </a>
                        <form action="{{ route('admin.customer.destroy', $customer->id) }}" method="POST"
                            class="flex-1 delete-form">
                            @csrf @method('DELETE')
                            <button type="button" data-name="{{ $customer->nama }}"
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
                <div class="px-5 py-16 text-center">
                    <div class="flex flex-col items-center gap-3">
                        <div class="w-14 h-14 rounded-2xl bg-slate-100 flex items-center justify-center">
                            <svg class="w-7 h-7 text-slate-300" fill="none" stroke="currentColor"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0z" />
                            </svg>
                        </div>
                        <p class="text-sm font-medium text-slate-500">Data customer belum tersedia</p>
                    </div>
                </div>
            @endforelse
        </div>
    </div>

@endsection

@push('scripts')
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Delete confirmation
            document.querySelectorAll('.btn-delete').forEach(function(btn) {
                btn.addEventListener('click', function() {
                    const form = btn.closest('form');
                    const name = btn.getAttribute('data-name');

                    Swal.fire({
                        title: 'Hapus Customer?',
                        text: `Data customer "${name}" akan dihapus permanen dan tidak dapat dikembalikan.`,
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: '#ef4444',
                        cancelButtonColor: '#94a3b8',
                        confirmButtonText: 'Ya, Hapus',
                        cancelButtonText: 'Batal',
                        reverseButtons: true,
                        borderRadius: '1rem'
                    }).then((result) => {
                        if (result.isConfirmed) {
                            form.submit();
                        }
                    });
                });
            });

            // Flash messages from session
            @if (session('success'))
                Swal.fire({
                    title: 'Berhasil!',
                    text: @json(session('success')),
                    icon: 'success',
                    confirmButtonColor: '#059669',
                    timer: 2500,
                    timerProgressBar: true
                });
            @endif

            @if (session('error'))
                Swal.fire({
                    title: 'Gagal!',
                    text: @json(session('error')),
                    icon: 'error',
                    confirmButtonColor: '#ef4444'
                });
            @endif
        });
    </script>
@endpush
