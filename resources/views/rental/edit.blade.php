<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Edit Rental</title>
</head>
<body>
    <h1>Edit Rental</h1>
    <form action="{{ route('rental.update', $data->id) }}" method="POST">
        @csrf
        @method('PUT')
        <label for="id_rental">ID Rental:</label>
        <input type="text" id="id_rental" name="id_rental" value="{{ $data->id_rental }}"><br><br>
        <label for="id_customer">ID Customer:</label>
        <input type="text" id="id_customer" name="id_customer" value="{{ $data->id_customer }}"><br><br>
        <label for="id_mobil">ID Mobil:</label>
        <input type="text" id="id_mobil" name="id_mobil" value="{{ $data->id_mobil }}"><br><br>
        <label for="tanggal_rental">Tanggal Rental:</label>
        <input type="date" id="tanggal_rental" name="tanggal_rental" value="{{ $data->tanggal_rental }}"><br><br>
        <label for="tanggal_kembali">Tanggal Kembali:</label>
        <input type="date" id="tanggal_kembali" name="tanggal_kembali" value="{{ $data->tanggal_kembali }}"><br><br>
        <label for="total_harga">Total Harga:</label>
        <input type="number" step="0.01" id="total_harga" name="total_harga" value="{{ $data->total_harga }}"><br><br>
        <label for="status">Status:</label>
        <select id="status" name="status">
            <option value="rental" {{ $data->status == 'rental' ? 'selected' : '' }}>Rental</option>
            <option value="kembali" {{ $data->status == 'kembali' ? 'selected' : '' }}>Kembali</option>
        </select><br><br>
        <input type="submit" value="Update">
    </form>
</body>
</html>
