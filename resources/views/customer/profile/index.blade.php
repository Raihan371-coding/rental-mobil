@extends('layouts.customer')

@section('title', 'Profil Saya')

@section('content')
<h1 class="text-2xl font-bold mb-6">Profil Saya</h1>

<div class="bg-white p-6 rounded shadow max-w-lg">
    <p><b>Nama:</b> {{ auth()->user()->name }}</p>
    <p><b>Email:</b> {{ auth()->user()->email }}</p>

    <a href="{{ route('customer.profile.edit') }}"
       class="inline-block mt-4 px-4 py-2 bg-blue-600 text-white rounded">
        Edit Profil
    </a>
</div>
@endsection