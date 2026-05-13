<h2>Data Denda</h2>

<a href="{{ route('denda.create') }}">Tambah Denda</a>

<table border="1">
    <tr>
        <th>No</th>
        <th>Rental ID</th>
        <th>Jumlah</th>
        <th>Aksi</th>
    </tr>
    @foreach ($dendas as $denda)
    <tr>
        <td>{{ $loop->iteration }}</td>
        <td>{{ $denda->rental_id }}</td>
        <td>{{ $denda->jumlah_denda }}</td>
        <td>
            <a href="{{ route('denda.edit', $denda->id) }}">Edit</a>
            <form action="{{ route('denda.destroy', $denda->id) }}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit">Hapus</button>
            </form>
        </td>
    </tr>
    @endforeach
</table>