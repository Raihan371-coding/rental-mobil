<h2>Edit Promo</h2>

<form action="{{ route('promo.update', $promo->id) }}" method="POST">
    @csrf
    @method('PUT')

    <input type="text" name="kode_promo" value="{{ $promo->kode_promo }}" required><br><br>
    <input type="number" name="potongan" value="{{ $promo->potongan }}" required><br><br>
    <input type="date" name="tanggal_mulai" value="{{ $promo->tanggal_mulai }}" required><br><br>
    <input type="date" name="tanggal_selesai" value="{{ $promo->tanggal_selesai }}" required><br><br>

    <button type="submit">Update</button>
</form>