<h2>Tambah Customer</h2>

<form action="{{ route('customer.store') }}" method="POST">
    @csrf

    <input type="text" name="nama" placeholder="Nama" required><br><br>
    <input type="text" name="alamat" placeholder="Alamat" required><br><br>
    <input type="text" name="no_telp" placeholder="No Telepon" required><br><br>
    <input type="email" name="email" placeholder="Email"><br><br>

    <button type="submit">Simpan</button>
</form>