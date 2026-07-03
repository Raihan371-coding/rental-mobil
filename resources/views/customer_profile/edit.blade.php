@extends('layouts.customer')

@section('title', 'Edit Profil')

@section('content')
<h1 class="text-2xl font-semibold mb-4">Edit Profil</h1>

<form action="{{ route('customer.profile.update') }}" method="POST" class="bg-white p-6 rounded shadow max-w-xl">
    @csrf
    @method('PUT')

    <div class="mb-3">
        <label>Nama</label>
        <input type="text" name="nama" value="{{ $customer->nama }}" class="w-full border rounded px-3 py-2">
    </div>

    <div class="mb-3">
        <label>No Telp</label>
        <input type="text" name="no_telp" value="{{ $customer->no_telp }}" class="w-full border rounded px-3 py-2">
    </div>

    <div class="mb-3">
        <label>Alamat</label>
        <textarea name="alamat" class="w-full border rounded px-3 py-2">{{ $customer->alamat }}</textarea>
    </div>

    <button class="bg-green-600 text-white px-4 py-2 rounded">
        Simpan
    </button>
</form>
@endsection