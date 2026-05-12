<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Form Rental</title>
</head>
<body>
    <h1>Form Rental</h1>
    <form action="/rental/store" method="POST">
        @csrf
        <label for="id_rental">ID Rental:</label>
        <input type="text" id="id_rental" name="id_rental" value="{{ old('id_rental') }}"><br><br>
        <label for="id_customer">ID Customer:</label>
        <input type="text" id="id_customer" name="id_customer" value="{{ old('id_customer') }}"><br><br>
        <label for="id_mobil">ID Mobil:</label>
        <input type="text" id="id_mobil" name="id_mobil" value="{{ old('id_mobil') }}"><br><br>
        <label for="tanggal_rental">Tanggal Rental:</label>
        <input type="date" id="tanggal_rental" name="tanggal_rental" value="{{ old('tanggal_rental') }}"><br><br>
        <label for="tanggal_kembali">Tanggal Kembali:</label>
        <input type="date" id="tanggal_kembali" name="tanggal_kembali" value="{{ old('tanggal_kembali') }}"><br><br>
        <label for="total_harga">Total Harga:</label>
        <input type="number" step="0.01" id="total_harga" name="total_harga" value="{{ old('total_harga') }}"><br><br>
        <label for="status">Status:</label>
        <select id="status" name="status">
            <option value="rental" {{ old('status') == 'rental' ? 'selected' : '' }}>Rental</option>
            <option value="kembali" {{ old('status') == 'kembali' ? 'selected' : '' }}>Kembali</option>
        </select><br><br>
        <input type="submit" value="Submit">
    </form>
</body>
</html>
