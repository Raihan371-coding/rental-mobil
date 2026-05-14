<!DOCTYPE html>
<html>
<head>
    <title>Edit Booking</title>
</head>
<body>

<h1>Edit Data Booking</h1>

<form action="/databooking/{{ $booking->id }}" method="POST">
    @csrf
    @method('PUT')

    <label>Nama Pelanggan</label>
    <input type="text" name="nama_pelanggan" value="{{ $booking->nama_pelanggan }}">
    <br><br>

    <label>Mobil</label>
    <select name="mobil_id">
        @foreach($mobils as $mobil)
            <option value="{{ $mobil->id }}"
                {{ $booking->mobil_id == $mobil->id ? 'selected' : '' }}>
                {{ $mobil->nama_mobil }}
            </option>
        @endforeach
    </select>
    <br><br>

    <label>Tanggal Booking</label>
    <input type="date" name="tanggal_booking" value="{{ $booking->tanggal_booking }}">
    <br><br>

    <label>Jam Booking</label>
    <input type="time" name="jam_booking" value="{{ $booking->jam_booking }}">
    <br><br>

    <label>Status</label>
    <select name="status">
        <option value="pending" {{ $booking->status == 'pending' ? 'selected' : '' }}>Pending</option>
        <option value="diproses" {{ $booking->status == 'diproses' ? 'selected' : '' }}>Diproses</option>
        <option value="selesai" {{ $booking->status == 'selesai' ? 'selected' : '' }}>Selesai</option>
    </select>
    <br><br>

    <label>Keterangan</label>
    <textarea name="keterangan">{{ $booking->keterangan }}</textarea>
    <br><br>

    <button type="submit">Update</button>

</form>

</body>
</html>