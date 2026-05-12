<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Edit Pengembalian</title>
</head>
<body>
    <h1>Edit Pengembalian</h1>
    <form action="{{ route('pengembalian.update', $data->id) }}" method="POST">
        @csrf
        @method('PUT')
        <label for="id_rental">ID Rental:</label>
        <input type="text" id="id_rental" name="id_rental" value="{{ $data->id_rental }}"><br><br>
        <label for="tanggal_pengembalian">Tanggal Pengembalian:</label>
        <input type="date" id="tanggal_pengembalian" name="tanggal_pengembalian" value="{{ $data->tanggal_pengembalian }}"><br><br>
        <label for="kondisi_mobil">Kondisi Mobil:</label>
        <select id="kondisi_mobil" name="kondisi_mobil">
            <option value="baik" {{ $data->kondisi_mobil == 'baik' ? 'selected' : '' }}>Baik</option>
            <option value="rusak" {{ $data->kondisi_mobil == 'rusak' ? 'selected' : '' }}>Rusak</option>
        </select><br><br>
        <label for="denda">Denda:</label>
        <input type="number" step="0.01" id="denda" name="denda" value="{{ $data->denda }}"><br><br>
        <label for="keterangan">Keterangan:</label>
        <textarea id="keterangan" name="keterangan">{{ $data->keterangan }}</textarea><br><br>
        <input type="submit" value="Update">
    </form>
</body>
</html>
