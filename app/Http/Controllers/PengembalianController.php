<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pengembalian;

class PengembalianController extends Controller
{
    public function index()
    {
        $data = Pengembalian::all();
        return view('pengembalian.index', compact('data'));
    }
    public function create()
    {
        return view('pengembalian.create');
    }
    public function store(Request $request)
    {
        $validated = $request->validate([
            'id_rental' => 'required|integer',
            'tanggal_pengembalian' => 'required|date',
            'kondisi_mobil' => 'required|string|max:255',
            'denda' => 'required|numeric',
            'keterangan' => 'nullable|string',
        ]);

        Pengembalian::create($validated);

        return redirect()->route('pengembalian.index')->with('success', 'Data pengembalian berhasil ditambahkan');
    }

    public function edit($id)
    {
        $data = Pengembalian::findOrFail($id);
        return view('pengembalian.edit', compact('data'));
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'id_rental' => 'required|integer',
            'tanggal_pengembalian' => 'required|date',
            'kondisi_mobil' => 'required|string|max:255',
            'denda' => 'required|numeric',
            'keterangan' => 'nullable|string',
        ]);

        $pengembalian = Pengembalian::findOrFail($id);
        $pengembalian->update($validated);

        return redirect()->route('pengembalian.index')->with('success', 'Data pengembalian berhasil diupdate');
    }
    public function destroy($id)
    {
        $pengembalian = Pengembalian::findOrFail($id);
        $pengembalian->delete();

        return redirect()->route('pengembalian.index')->with('success', 'Data pengembalian berhasil dihapus');
    }
}
