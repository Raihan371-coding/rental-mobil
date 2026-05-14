<!DOCTYPE html>
<html>
<head>
    <title>Tambah Booking</title>
</head>
<body>

<h1>Tambah Data Booking</h1>

<form action="/databooking" method="POST">
    @csrf

    <label>Nama Pelanggan</label>
    <input type="text" name="nama_pelanggan">
    <br><br>

    <label>Mobil</label>
    <select name="mobil_id">
        @foreach($mobils as $mobil)
            <option value="{{ $mobil->id }}">{{ $mobil->nama_mobil }}</option>
        @endforeach
    </select>
    <br><br>

    <label>Tanggal Booking</label>
    <input type="date" name="tanggal_booking">
    <br><br>

    <label>Jam Booking</label>
    <input type="time" name="jam_booking">
    <br><br>

    <label>Status</label>
    <select name="status">
        <option value="pending">Pending</option>
        <option value="diproses">Diproses</option>
        <option value="selesai">Selesai</option>
    </select>
    <br><br>

    <label>Keterangan</label>
    <textarea name="keterangan"></textarea>
    <br><br>

    <button type="submit">Simpan</button>

</form>

</body>
</html>