<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Form Pengembalian Mobil</title>
</head>
<body>
    <h1>Form Pengembalian Mobil</h1>
    <form action="/pengembalian/store" method="POST">
        @csrf
        <label for="id_rental">ID Rental:</label>
        <input type="text" id="id_rental" name="id_rental" value="{{ old('id_rental') }}"><br><br>
        <label for="tanggal_pengembalian">Tanggal Pengembalian:</label>
        <input type="date" id="tanggal_pengembalian" name="tanggal_pengembalian" value="{{ old('tanggal_pengembalian') }}"><br><br>
        <label for="kondisi_mobil">Kondisi Mobil:</label>
        <select id="kondisi_mobil" name="kondisi_mobil">
            <option value="baik" {{ old('kondisi_mobil') == 'baik' ? 'selected' : '' }}>Baik</option>
            <option value="rusak" {{ old('kondisi_mobil') == 'rusak' ? 'selected' : '' }}>Rusak</option>
        </select><br><br>
        <label for="denda">Denda:</label>
        <input type="number" step="0.01" id="denda" name="denda" value="{{ old('denda') }}"><br><br>
        <label for="keterangan">Keterangan:</label>
        <textarea id="keterangan" name="keterangan">{{ old('keterangan') }}</textarea><br><br>
        <input type="submit" value="Submit">
    </form>
</body>
</html>
