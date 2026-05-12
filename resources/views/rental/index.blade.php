<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Halaman Rental</title>
</head>
<body>
    <h1>Daftar Rental</h1>
    <a href="/rental/create">Tambah Rental</a>
    <table border="1">
        <thead>
            <tr>
                <th>ID Rental</th>
                <th>ID Customer</th>
                <th>ID Mobil</th>
                <th>Tanggal Rental</th>
                <th>Tanggal Kembali</th>
                <th>Total Harga</th>
                <th>Status</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($data as $item)
            <tr>
                <td>{{ $item->id_rental }}</td>
                <td>{{ $item->id_customer }}</td>
                <td>{{ $item->id_mobil }}</td>
                <td>{{ $item->tanggal_rental }}</td>
                <td>{{ $item->tanggal_kembali }}</td>
                <td>{{ $item->total_harga }}</td>
                <td>{{ $item->status }}</td>
                <td>
                    <a href="/rental/{{ $item->id }}/edit">Edit</a>
                    <form action="/rental/{{ $item->id }}/delete" method="POST" style="display: inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
