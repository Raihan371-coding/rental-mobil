<h2>Tambah Denda</h2>

<form action="{{ route('denda.store') }}" method="POST">
    @csrf
    <input type="number" name="rental_id" placeholder="Rental ID">
    <input type="number" name="jumlah_denda" placeholder="Jumlah Denda">
    <button type="submit">Simpan</button>
</form>