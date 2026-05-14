@extends('layouts.app')

@section('content')

<h2>Data Mobil Rental</h2>

<a href="{{ route('mobil.create') }}">
    Tambah Mobil
</a>

<br><br>

@if(session('success'))
    <p>{{ session('success') }}</p>
@endif

<table border="1" cellpadding="10">

    <tr>
        <th>No</th>
        <th>Nama Mobil</th>
        <th>Merk</th>
        <th>Plat Nomor</th>
        <th>Tahun</th>
        <th>Harga Sewa</th>
        <th>Status</th>
    </tr>

    @forelse ($mobils as $mobil)

    <tr>
        <td>{{ $loop->iteration }}</td>

        <td>{{ $mobil->nama_mobil }}</td>

        <td>{{ $mobil->merk }}</td>

        <td>{{ $mobil->plat_nomor }}</td>

        <td>{{ $mobil->tahun }}</td>

        <td>
            Rp {{ number_format($mobil->harga_sewa, 0, ',', '.') }}
        </td>

        <td>{{ $mobil->status }}</td>

        <td>

            <a href="{{ route('mobil.edit', $mobil->id) }}">
                Edit
            </a>

            |

            <form action="{{ route('mobil.destroy', $mobil->id) }}"
                  method="POST"
                  style="display:inline;">

                @csrf
                @method('DELETE')

                <button type="submit">
                    Hapus
                </button>

            </form>

        </td>
    </tr>

    @empty

    <tr>
        <td colspan="8">
            Data mobil belum tersedia
        </td>
    </tr>

    @endforelse

</table>

@endsection