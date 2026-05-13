@extends('layouts.admin')

@section('title', 'Customer')

@section('content')
<div class="rounded-[2rem] bg-white p-6 shadow-[0_24px_80px_-40px_rgba(15,23,42,0.2)]">
    <div class="mb-6 flex flex-col gap-4 sm:flex-row sm:items-center sm:justify-between">
        <div>
            <h1 class="text-2xl font-semibold text-slate-950">Halaman Customer</h1>
            <p class="mt-2 text-sm text-slate-600">Kelola data customer dengan cepat dan aman.</p>
        </div>
        <a href="{{ route('customer.create') }}" class="inline-flex items-center rounded-full bg-sky-600 px-5 py-2 text-sm font-semibold text-white transition hover:bg-sky-700">Tambah Customer</a>
    </div>

    <div class="overflow-x-auto">
        <table class="min-w-full divide-y divide-slate-200 text-sm">
            <thead class="bg-slate-50">
                <tr>
                    <th class="px-4 py-3 text-left font-semibold text-slate-600">No</th>
                    <th class="px-4 py-3 text-left font-semibold text-slate-600">Nama</th>
                    <th class="px-4 py-3 text-left font-semibold text-slate-600">Alamat</th>
                    <th class="px-4 py-3 text-left font-semibold text-slate-600">No Telp</th>
                    <th class="px-4 py-3 text-left font-semibold text-slate-600">Email</th>
                    <th class="px-4 py-3 text-left font-semibold text-slate-600">Aksi</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-slate-200 bg-white">
                @foreach ($customers as $customer)
                <tr>
                    <td class="px-4 py-4 text-slate-700">{{ $loop->iteration }}</td>
                    <td class="px-4 py-4 text-slate-700">{{ $customer->nama }}</td>
                    <td class="px-4 py-4 text-slate-700">{{ $customer->alamat }}</td>
                    <td class="px-4 py-4 text-slate-700">{{ $customer->no_telp }}</td>
                    <td class="px-4 py-4 text-slate-700">{{ $customer->email }}</td>
                    <td class="px-4 py-4">
                        <div class="flex flex-wrap gap-2">
                            <a href="{{ route('customer.edit', $customer->id) }}" class="rounded-full border border-slate-200 bg-slate-100 px-3 py-1 text-sm font-semibold text-slate-700 transition hover:bg-slate-200">Edit</a>
                            <form action="{{ route('customer.destroy', $customer->id) }}" method="POST" class="inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="rounded-full bg-rose-600 px-3 py-1 text-sm font-semibold text-white transition hover:bg-rose-700" onclick="return confirm('Are you sure?')">Hapus</button>
                            </form>
                        </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
