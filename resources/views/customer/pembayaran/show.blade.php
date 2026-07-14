@extends('layouts.customer')

@section('title', 'Detail Pembayaran')

@section('content')

    <div class="space-y-6">

        <div class="bg-white rounded-xl shadow p-6">

            <h2 class="text-2xl font-bold">
                Detail Pembayaran
            </h2>

            <hr class="my-5">

            <div class="grid md:grid-cols-2 gap-8">

                <div>

                    <h3 class="font-semibold text-lg mb-3">
                        Informasi Tagihan
                    </h3>

                    <table class="text-sm">

                        <tr>
                            <td class="py-2 w-44">Kode Pembayaran</td>
                            <td>: {{ $pembayaran->kode_pembayaran }}</td>
                        </tr>

                        <tr>
                            <td class="py-2">Rental</td>
                            <td>: {{ $pembayaran->rental->kode_rental }}</td>
                        </tr>

                        <tr>
                            <td class="py-2">Jumlah</td>
                            <td>: Rp {{ number_format($pembayaran->jumlah_bayar, 0, ',', '.') }}</td>
                        </tr>

                        <tr>
                            <td class="py-2">Status</td>

                            <td>

                                @if ($pembayaran->status_bayar == 'belum_bayar')
                                    <span class="text-red-600 font-semibold">
                                        Belum Bayar
                                    </span>
                                @elseif($pembayaran->status_bayar == 'menunggu_verifikasi')
                                    <span class="text-yellow-500 font-semibold">
                                        Menunggu Verifikasi
                                    </span>
                                @elseif($pembayaran->status_bayar == 'lunas')
                                    <span class="text-green-600 font-semibold">
                                        Lunas
                                    </span>
                                @elseif($pembayaran->status_bayar == 'ditolak')
                                    <span class="text-red-600 font-semibold">
                                        Pembayaran Ditolak
                                    </span>
                                @endif

                            </td>
                        </tr>

                    </table>

                </div>

                <div>

                    <h3 class="font-semibold text-lg mb-3">
                        Pembayaran QRIS
                    </h3>

                    <img src="https://api.qrserver.com/v1/create-qr-code/?size=250x250&data=PEMBAYARAN-{{ $pembayaran->kode_pembayaran }}"
                        class="border rounded-lg">

                    <p class="mt-3 text-sm text-slate-500">
                        Scan QR menggunakan aplikasi pembayaran.
                    </p>

                </div>

            </div>

        </div>



        <div class="bg-white rounded-xl shadow p-6">

            <h3 class="font-semibold text-xl mb-4">

                Transfer Bank

            </h3>

            <div class="space-y-2">

                <p>

                    <b>Bank BCA</b>

                </p>

                <p>

                    1234567890

                </p>

                <p>

                    a.n Rental Mobil Jaya

                </p>

            </div>

        </div>



        @if ($pembayaran->status_bayar == 'belum_bayar')
            <div class="bg-white rounded-xl shadow p-6">

                <h3 class="font-semibold text-xl mb-5">
                    Upload Bukti Pembayaran
                </h3>

                <form action="{{ route('customer.pembayaran.upload', $pembayaran->id) }}" method="POST"
                    enctype="multipart/form-data">

                    @csrf

                    <input type="file" name="bukti_pembayaran" class="w-full border rounded-lg p-3">

                    @error('bukti_pembayaran')
                        <p class="text-red-500 mt-2">
                            {{ $message }}
                        </p>
                    @enderror

                    <button type="submit" class="mt-5 bg-slate-900 hover:bg-slate-800 text-white px-6 py-3 rounded-lg">

                        Upload Bukti

                    </button>

                </form>

            </div>
        @elseif($pembayaran->status_bayar == 'menunggu_verifikasi')
            <div class="bg-white rounded-xl shadow p-6 text-center">

                <h3 class="text-lg font-semibold mb-4">
                    Bukti Pembayaran Berhasil Dikirim
                </h3>

                <button disabled class="w-full bg-yellow-500 text-white px-6 py-3 rounded-lg cursor-not-allowed opacity-80">

                    Menunggu Verifikasi Admin

                </button>

            </div>
        @elseif($pembayaran->status_bayar == 'lunas')
            <div class="bg-white rounded-xl shadow p-6 text-center">

                <h3 class="text-lg font-semibold mb-4 text-green-600">
                    Pembayaran Berhasil Diverifikasi
                </h3>

                <button disabled class="w-full bg-green-600 text-white px-6 py-3 rounded-lg cursor-not-allowed opacity-80">

                    ✓ Selesai

                </button>

            </div>
        @elseif($pembayaran->status_bayar == 'ditolak')
            <div class="bg-white rounded-xl shadow p-6">

                <div class="mb-4 rounded-lg bg-red-100 p-4 text-red-700">
                    Bukti pembayaran ditolak. Silakan upload ulang bukti pembayaran yang benar.
                </div>

                <form action="{{ route('customer.pembayaran.upload', $pembayaran->id) }}" method="POST"
                    enctype="multipart/form-data">

                    @csrf

                    <input type="file" name="bukti_pembayaran" class="w-full border rounded-lg p-3">

                    @error('bukti_pembayaran')
                        <p class="text-red-500 mt-2">
                            {{ $message }}
                        </p>
                    @enderror

                    <button type="submit" class="mt-5 bg-red-600 hover:bg-red-700 text-white px-6 py-3 rounded-lg">

                        Upload Ulang Bukti

                    </button>

                </form>

            </div>
        @endif

    </div>

@endsection
