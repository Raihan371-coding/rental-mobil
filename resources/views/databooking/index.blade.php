<!DOCTYPE html>
<html>
<head>
    <title>Data Booking</title>
</head>
<body>

<h1>Data Booking</h1>

<a href="/databooking/create">+ Tambah Booking</a>

<br><br>

@if(session('success'))
    <p style="color:green;">{{ session('success') }}</p>
@endif

<table border="1" cellpadding="10">
    <tr>
        <th>ID</th>
        <th>Nama Pelanggan</th>
        <th>Mobil</th>
        <th>Tanggal</th>
        <th>Jam</th>
        <th>Status</th>
        <th>Keterangan</th>
        <th>Aksi</th>
    </tr>

    @foreach($bookings as $booking)
    <tr>
        <td>{{ $booking->id }}</td>
        <td>{{ $booking->nama_pelanggan }}</td>
        <td>{{ $booking->mobil->nama_mobil ?? '-' }}</td>
        <td>{{ $booking->tanggal_booking }}</td>
        <td>{{ $booking->jam_booking }}</td>
        <td>{{ $booking->status }}</td>
        <td>{{ $booking->keterangan }}</td>
        <td>
            <a href="/databooking/{{ $booking->id }}/edit">Edit</a>

            <form action="/databooking/{{ $booking->id }}" method="POST" style="display:inline;">
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