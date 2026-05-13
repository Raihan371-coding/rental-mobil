<h2>Tambah Promo</h2>

<form action="{{ route('promo.store') }}" method="POST">
    @csrf

    <input type="text" name="kode_promo" placeholder="Kode Promo" required><br><br>
    <input type="number" name="potongan" placeholder="Potongan" required><br><br>
    <input type="date" name="tanggal_mulai" required><br><br>
    <input type="date" name="tanggal_selesai" required><br><br>

    <button type="submit">Simpan</button>
</form>