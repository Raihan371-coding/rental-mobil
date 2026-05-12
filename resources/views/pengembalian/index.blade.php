<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Halaman Pengembalian</title>
</head>
<body>
    <h1>Halaman Pengembalian</h1>
    <a href="/pengembalian/create">Tambah Pengembalian</a>
    <table border="1">
        <tr>
            <th>ID Rental</th>
            <th>Tanggal Pengembalian</th>
            <th>Kondisi Mobil</th>
            <th>Denda</th>
            <th>Keterangan</th>
        </tr>
        @foreach ($data as $items)
            <tr>
                <td>{{ $items->id_rental }}</td>
                <td>{{ $items->tanggal_pengembalian }}</td>
                <td>{{ $items->kondisi_mobil }}</td>
                <td>{{ $items->denda }}</td>
                <td>{{ $items->keterangan }}</td>
                <td>
                    <a href="/pengembalian/edit/{{ $items->id }}">Edit</a>
                    <form action="/pengembalian/destroy/{{ $items->id }}" method="POST" style="display: inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" onclick="return confirm('Are you sure?')">Delete</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </table>
</body>
</html>
