<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Mahasiswa</title>
</head>
<body>
    <table border="1">
        <tr>
            <th>Nama Mobil</th>
            <th>Merk</th>
            <th>Plat Nomor</th>
            <th>Tahun</th>
            <th>Harga Sewa</th>
            <th>Status Tersedia</th>
        </tr>
        @foreach ($data as $items)
            <tr>
                <td>{{ $items->nama_mobil }}</td>
                <td>{{ $items->merk }}</td>
                <td>{{ $items->plat_nomor }}</td>
                <td>{{ $items->tahun }}</td>
                <td>{{ $items->harga_sewa }}</td>
                <td>{{ $items->status_tersedia }}</td>
            </tr>
        @endforeach
    </table>
</body>
</html>
