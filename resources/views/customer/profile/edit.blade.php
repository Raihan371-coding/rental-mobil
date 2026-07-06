@extends('layouts.customer')

@section('title', 'Edit Profil')

@section('content')
<h1 class="text-2xl font-bold mb-6">Edit Profil</h1>

<form method="POST" action="{{ route('customer.profile.update') }}"
      class="bg-white p-6 rounded shadow max-w-lg">
    @csrf
    @method('PUT')

    <div class="mb-4">
        <label class="block mb-1">Nama</label>
        <input type="text" name="name"
               value="{{ auth()->user()->name }}"
               class="w-full border rounded px-3 py-2">
    </div>

    <div class="mb-4">
        <label class="block mb-1">Email</label>
        <input type="email" name="email"
               value="{{ auth()->user()->email }}"
               class="w-full border rounded px-3 py-2">
    </div>

    <button class="px-4 py-2 bg-green-600 text-white rounded">
        Simpan
    </button>
</form>
@endsection