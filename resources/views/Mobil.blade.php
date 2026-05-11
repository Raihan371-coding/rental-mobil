@extends('layouts.app')

@section('content')
<div class="container mt-4">

    <div class="d-flex justify-content-between mb-3">
        <h3>Data Mobil</h3>

        <a href="{{ route('mobil.create') }}" class="btn btn-primary">
            + Tambah Mobil
        </a>
    </div>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <table class="table table-bordered table-striped">
        <thead class="table-dark">
            <tr>
                <th>No</th>
                <th>Nama Mobil</th>
                <th>Merk</th>
                <th>Plat Nomor</th>
                <th>Tahun</th>
                <th>Harga Sewa</th>
                <th>Status</th>
                <th width="200">Aksi</th>
            </tr>
        </thead>

        <tbody>
            @forelse ($mobils as $mobil)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $mobil->nama_mobil }}</td>
                <td>{{ $mobil->merk }}</td>
                <td>{{ $mobil->plat_nomor }}</td>
                <td>{{ $mobil->tahun }}</td>
                <td>Rp {{ number_format($mobil->harga_sewa, 0, ',', '.') }}</td>

                <td>
                    @if($mobil->status == 'tersedia')
                        <span class="badge bg-success">Tersedia</span>
                    @elseif($mobil->status == 'disewa')
                        <span class="badge bg-warning">Disewa</span>
                    @else
                        <span class="badge bg-danger">Service</span>
                    @endif
                </td>

                <td>
                    <a href="{{ route('mobil.edit', $mobil->id) }}" 
                       class="btn btn-warning btn-sm">
                        Edit
                    </a>

                    <form action="{{ route('mobil.destroy', $mobil->id) }}" 
                          method="POST" 
                          class="d-inline">

                        @csrf
                        @method('DELETE')

                        <button type="submit" 
                                class="btn btn-danger btn-sm"
                                onclick="return confirm('Yakin ingin menghapus data?')">
                            Hapus
                        </button>
                    </form>
                </td>
            </tr>

            @empty
            <tr>
                <td colspan="8" class="text-center">
                    Data mobil belum tersedia
                </td>
            </tr>
            @endforelse
        </tbody>
    </table>

</div>
@endsection