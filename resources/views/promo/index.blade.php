<h2>Data Promo</h2>

<a href="{{ route('promo.create') }}">Tambah Promo</a>

<table border="1" cellpadding="5">
    <tr>
        <th>No</th>
        <th>Kode Promo</th>
        <th>Potongan</th>
        <th>Tanggal Mulai</th>
        <th>Tanggal Selesai</th>
        <th>Aksi</th>
    </tr>

    @foreach ($promos as $promo)
    <tr>
        <td>{{ $loop->iteration }}</td>
        <td>{{ $promo->kode_promo }}</td>
        <td>{{ $promo->potongan }}</td>
        <td>{{ $promo->tanggal_mulai }}</td>
        <td>{{ $promo->tanggal_selesai }}</td>
        <td>
            <a href="{{ route('promo.edit', $promo->id) }}">Edit</a>

            <form action="{{ route('promo.destroy', $promo->id) }}" method="POST" style="display:inline;">
                @csrf
                @method('DELETE')
                <button type="submit">Hapus</button>
            </form>
        </td>
    </tr>
    @endforeach
</table>