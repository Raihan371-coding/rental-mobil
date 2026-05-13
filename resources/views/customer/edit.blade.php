<h2>Edit Customer</h2>

<form action="{{ route('customer.update', $customer->id) }}" method="POST">
    @csrf
    @method('PUT')

    <input type="text" name="nama" value="{{ $customer->nama }}" required><br><br>
    <input type="text" name="alamat" value="{{ $customer->alamat }}" required><br><br>
    <input type="text" name="no_telp" value="{{ $customer->no_telp }}" required><br><br>
    <input type="email" name="email" value="{{ $customer->email }}"><br><br>

    <button type="submit">Update</button>
</form>