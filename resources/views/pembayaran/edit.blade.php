<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Edit Pembayaran</title>
</head>
<body>
    <h1>Edit Pembayaran</h1>
    <form action="/pembayaran/{{ $data->id }}" method="POST">
        @csrf
        @method('PUT')
        <label for="id_pembayaran">ID Pembayaran:</label>
        <input type="text" id="id_pembayaran" name="id_pembayaran" value="{{ $data->id_pembayaran }}"><br><br>
        <label for="id_rental">ID Rental:</label>
        <input type="text" id="id_rental" name="id_rental" value="{{ $data->id_rental }}"><br><br>
        <label for="tanggal_bayar">Tanggal Bayar:</label>
        <input type="date" id="tanggal_bayar" name="tanggal_bayar" value="{{ $data->tanggal_bayar }}"><br><br>
        <label for="metode_bayar">Metode Bayar:</label>
        <input type="text" id="metode_bayar" name="metode_bayar" value="{{ $data->metode_bayar }}"><br><br>
        <label for="jumlah_bayar">Jumlah Bayar:</label>
        <input type="number" step="0.01" id="jumlah_bayar" name="jumlah_bayar" value="{{ $data->jumlah_bayar }}"><br><br>
        <label for="status_bayar">Status Bayar:</label>
        <select id="status_bayar" name="status_bayar">
            <option value="lunas" {{ $data->status_bayar == 'lunas' ? 'selected' : '' }}>Lunas</option>
            <option value="belum_lunas" {{ $data->status_bayar == 'belum_lunas' ? 'selected' : '' }}>Belum Lunas</option>
        </select><br><br>
        <input type="submit" value="Update">
    </form>
</body>
</html>
