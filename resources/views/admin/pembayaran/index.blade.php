@extends('layouts.admin')

@section('title', 'Pembayaran')

@section('content')
    <div class="rounded-4xl bg-white p-8 shadow-xl">
        <div class="mb-8 flex flex-col gap-4 sm:flex-row sm:items-center sm:justify-between">
            <div>
                <h1 class="text-2xl font-semibold text-slate-950">Halaman Pembayaran</h1>
                <p class="mt-2 text-sm text-slate-600">Kelola semua pembayaran rental dengan mudah.</p>
            </div>
            <a href="{{ route('admin.pembayaran.create') }}"
                class="inline-flex items-center rounded-full bg-slate-950 px-5 py-3 text-sm font-semibold text-white transition hover:bg-slate-800">Tambah
                Pembayaran</a>
        </div>

        @if (session('success'))
            <div class="mb-6 rounded-3xl border border-emerald-200 bg-emerald-50 px-5 py-4 text-sm text-emerald-900">
                {{ session('success') }}</div>
        @endif

        <div class="overflow-x-auto rounded-3xl border border-slate-200 bg-slate-50 p-4">
            <table class="min-w-full divide-y divide-slate-200 text-left text-sm text-slate-700">
                <thead class="border-b border-slate-200 bg-white text-slate-900">
                    <tr>
                        <th class="px-4 py-3">Kode Pembayaran</th>
                        <th class="px-4 py-3">ID Rental</th>
                        <th class="px-4 py-3">Tanggal Bayar</th>
                        <th class="px-4 py-3">Metode Bayar</th>
                        <th class="px-4 py-3">Jumlah Bayar</th>
                        <th class="px-4 py-3">Status</th>
                        <th class="px-4 py-3">Bukti</th>
                        <th class="px-4 py-3">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-200">
                    @forelse($data as $item)
                        <tr class="bg-white hover:bg-slate-50">
                            <td class="px-4 py-4">{{ $item->kode_pembayaran }}</td>
                            <td class="px-4 py-4">{{ $item->rental->kode_rental }}</td>
                            <td class="px-4 py-4">{{ $item->tanggal_bayar }}</td>
                            <td class="px-4 py-4">{{ $item->metode_bayar }}</td>
                            <td class="px-4 py-4">{{ $item->jumlah_bayar }}</td>
                            <td class="px-4 py-4">

                                @if ($item->status_bayar == 'belum_bayar')
                                    <span class="px-3 py-1 rounded bg-red-100 text-red-700">
                                        Belum Bayar
                                    </span>
                                @elseif($item->status_bayar == 'menunggu_verifikasi')
                                    <span class="px-3 py-1 rounded bg-yellow-100 text-yellow-700">
                                        Menunggu Verifikasi
                                    </span>
                                @elseif($item->status_bayar == 'lunas')
                                    <span class="px-3 py-1 rounded bg-green-100 text-green-700">
                                        Lunas
                                    </span>
                                @elseif($item->status_bayar == 'ditolak')
                                    <span class="px-3 py-1 rounded bg-red-100 text-red-700">
                                        Ditolak
                                    </span>
                                @endif

                            </td>
                            <td class="px-4 py-4">

                                @if ($item->bukti_pembayaran)
                                    <a href="{{ asset('bukti_pembayaran/' . $item->bukti_pembayaran) }}" target="_blank">

                                        <img src="{{ asset('bukti_pembayaran/' . $item->bukti_pembayaran) }}"
                                            class="w-20 h-20 rounded border object-cover">

                                    </a>
                                @else
                                    <span class="text-gray-400">
                                        Belum Upload
                                    </span>
                                @endif

                            </td>
                            <td class="px-4 py-4">

                                @if ($item->status_bayar == 'menunggu_verifikasi')
                                    <form action="{{ route('admin.pembayaran.terima', $item->id) }}" method="POST"
                                        class="inline">

                                        @csrf
                                        @method('PUT')

                                        <button class="bg-green-600 text-white px-3 py-2 rounded">

                                            Terima

                                        </button>

                                    </form>

                                    <form action="{{ route('admin.pembayaran.tolak', $item->id) }}" method="POST"
                                        class="inline">

                                        @csrf
                                        @method('PUT')

                                        <button class="bg-red-600 text-white px-3 py-2 rounded">

                                            Tolak

                                        </button>

                                    </form>
                                @else
                                    <a href="{{ route('admin.pembayaran.edit', $item->id) }}"
                                        class="bg-blue-600 text-white px-3 py-2 rounded">

                                        Edit

                                    </a>

                                    <form action="{{ route('admin.pembayaran.destroy', $item->id) }}" method="POST"
                                        class="inline">

                                        @csrf
                                        @method('DELETE')

                                        <button onclick="return confirm('Hapus pembayaran?')"
                                            class="bg-red-600 text-white px-3 py-2 rounded">

                                            Hapus

                                        </button>

                                    </form>
                                @endif

                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="7" class="px-4 py-6 text-center text-sm text-slate-500">Data pembayaran belum
                                tersedia</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
@endsection
