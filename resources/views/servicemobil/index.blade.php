<!DOCTYPE html>
<html>
<head>
    <title>Service Mobil</title>
</head>
<body>

<h1>Data Service Mobil</h1>

<a href="/service/create">+ Tambah Service</a>

<br><br>

<table border="1" cellpadding="10">
    <tr>
        <th>ID</th>
        <th>Mobil</th>
        <th>Tanggal</th>
        <th>Biaya</th>
        <th>Status</th>
    </tr>

    @foreach($services as $service)
    <tr>
        <td>{{ $service->id }}</td>
        <td>{{ $service->mobil->nama_mobil ?? '-' }}</td>
        <td>{{ $service->tanggal_service }}</td>
        <td>{{ $service->biaya_service }}</td>
        <td>{{ $service->status_service }}</td>
        <td>
            <a href="/service/{{ $service->id }}/edit">Edit</a>

            <form action="/service/{{ $service->id }}" method="POST" style="display:inline;">
                @csrf
                @method('DELETE')
                <button type="submit">Hapus</button>
            </form>
        </td>
    </tr>
    @endforeach

</table>

</body>
</html>