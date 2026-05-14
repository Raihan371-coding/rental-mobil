<!DOCTYPE html>
<html>
<head>
    <title>Tambah Service</title>
</head>
<body>

<h1>Tambah Service Mobil</h1>

<form action="/service" method="POST">
    @csrf

    <label>Mobil</label>
    <select name="mobil_id">
        @foreach($mobils as $mobil)
            <option value="{{ $mobil->id }}">{{ $mobil->nama_mobil }}</option>
        @endforeach
    </select>
    <br><br>

    <label>Tanggal Service</label>
    <input type="date" name="tanggal_service">
    <br><br>

    <label>Biaya</label>
    <input type="number" name="biaya_service">
    <br><br>

    <label>Deskripsi</label>
    <textarea name="deskripsi"></textarea>
    <br><br>

    <label>Status</label>
    <select name="status_service">
        <option value="pending">Pending</option>
        <option value="proses">Proses</option>
        <option value="selesai">Selesai</option>
    </select>

    <br><br>

    <button type="submit">Simpan</button>
</form>

</body>
</html>