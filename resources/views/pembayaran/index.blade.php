<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Halaman Pembayaran</title>
</head>
<body>
    <h1>Halaman Pembayaran</h1>
    <p>Ini adalah halaman untuk mengelola pembayaran.</p>
    <a href="/pembayaran/create">Tambah Pembayaran</a>
    <table border="1">
        <thead>
            <tr>
                <th>ID Pembayaran</th>
                <th>ID Rental</th>
                <th>Tanggal Bayar</th>
                <th>Metode Bayar</th>
                <th>Jumlah Bayar</th>
                <th>Status Bayar</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($data as $item)
            <tr>
                <td>{{ $item->id_pembayaran }}</td>
                <td>{{ $item->id_rental }}</td>
                <td>{{ $item->tanggal_bayar }}</td>
                <td>{{ $item->metode_bayar }}</td>
                <td>{{ $item->jumlah_bayar }}</td>
                <td>{{ $item->status_bayar }}</td>
                <td>
                    <a href="/pembayaran/{{ $item->id }}/edit">Edit</a>
                    <form action="/pembayaran/{{ $item->id }}" method="POST" style="display: inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" onclick="return confirm('Are you sure?')">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
