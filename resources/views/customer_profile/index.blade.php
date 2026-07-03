@extends('layouts.customer')

@section('title', 'Profil Saya')

@section('content')
<h1 class="text-2xl font-semibold mb-4">Profil Saya</h1>

<div class="bg-white p-6 rounded shadow max-w-xl">
    <p><b>Nama:</b> {{ $customer->nama }}</p>
    <p><b>Email:</b> {{ $customer->email }}</p>
    <p><b>No Telp:</b> {{ $customer->no_telp }}</p>
    <p><b>Alamat:</b> {{ $customer->alamat }}</p>

    <a href="{{ route('customer.profile.edit') }}"
       class="inline-block mt-4 bg-blue-600 text-white px-4 py-2 rounded">
        Edit Profil
    </a>
</div>
@endsection