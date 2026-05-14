<!DOCTYPE html>
<html>
<head>
    <title>Edit Service</title>
</head>
<body>

<h1>Edit Service Mobil</h1>

<form action="/service/{{ $service->id }}" method="POST">
    @csrf
    @method('PUT')

    <label>Mobil</label>
    <select name="mobil_id">
        @foreach($mobils as $mobil)
            <option value="{{ $mobil->id }}"
                {{ $service->mobil_id == $mobil->id ? 'selected' : '' }}>
                {{ $mobil->nama_mobil }}
            </option>
        @endforeach
    </select>
    <br><br>

    <label>Tanggal Service</label>
    <input type="date" name="tanggal_service" value="{{ $service->tanggal_service }}">
    <br><br>

    <label>Biaya</label>
    <input type="number" name="biaya_service" value="{{ $service->biaya_service }}">
    <br><br>

    <label>Deskripsi</label>
    <textarea name="deskripsi">{{ $service->deskripsi }}</textarea>
    <br><br>

    <label>Status</label>
    <select name="status_service">
        <option value="pending" {{ $service->status_service == 'pending' ? 'selected' : '' }}>Pending</option>
        <option value="proses" {{ $service->status_service == 'proses' ? 'selected' : '' }}>Proses</option>
        <option value="selesai" {{ $service->status_service == 'selesai' ? 'selected' : '' }}>Selesai</option>
    </select>

    <br><br>

    <button type="submit">Update</button>
</form>

</body>
</html>