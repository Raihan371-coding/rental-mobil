<h2>Data Customer</h2>

<a href="{{ route('customer.create') }}">Tambah Customer</a>

<table border="1" cellpadding="5">
    <tr>
        <th>No</th>
        <th>Nama</th>
        <th>Alamat</th>
        <th>No Telp</th>
        <th>Email</th>
        <th>Aksi</th>
    </tr>

    @foreach ($customers as $customer)
    <tr>
        <td>{{ $loop->iteration }}</td>
        <td>{{ $customer->nama }}</td>
        <td>{{ $customer->alamat }}</td>
        <td>{{ $customer->no_telp }}</td>
        <td>{{ $customer->email }}</td>
        <td>
            <a href="{{ route('customer.edit', $customer->id) }}">Edit</a>

            <form action="{{ route('customer.destroy', $customer->id) }}" method="POST" style="display:inline;">
                @csrf
                @method('DELETE')
                <button type="submit">Hapus</button>
            </form>
        </td>
    </tr>
    @endforeach
</table>