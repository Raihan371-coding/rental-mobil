<h2>Edit Denda</h2>

<form action="{{ route('denda.update', $denda->id) }}" method="POST">
    @csrf
    @method('PUT')
    <input type="number" name="rental_id" value="{{ $denda->rental_id }}">
    <input type="number" name="jumlah_denda" value="{{ $denda->jumlah_denda }}">
    <button type="submit">Update</button>
</form>