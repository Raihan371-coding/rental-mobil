<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Mobil;

class MobilController extends Controller
{
    public function index()
    {
        $mobils = Mobil::all();

        return view('mobil.index', compact('mobils'));
    }

    public function create()
    {
        return view('mobil.create');
    }

    public function store(Request $request)
    {
        Mobil::create([
            'nama_mobil' => $request->nama_mobil,
            'merk' => $request->merk,
            'plat_nomor' => $request->plat_nomor,
            'tahun' => $request->tahun,
            'harga_sewa' => $request->harga_sewa,
            'status' => $request->status,
        ]);

        return redirect('/mobil')
                ->with('success', 'Data mobil berhasil ditambahkan');
    }

    public function edit(string $id)
    {
        $mobil = Mobil::findOrFail($id);

        return view('mobil.edit', compact('mobil'));
    }

    public function update(Request $request, string $id)
    {
        $mobil = Mobil::findOrFail($id);

        $mobil->update([
            'nama_mobil' => $request->nama_mobil,
            'merk' => $request->merk,
            'plat_nomor' => $request->plat_nomor,
            'tahun' => $request->tahun,
            'harga_sewa' => $request->harga_sewa,
            'status' => $request->status,
        ]);

        return redirect('/mobil')
                ->with('success', 'Data mobil berhasil diupdate');
    }

    public function destroy(string $id)
    {
        $mobil = Mobil::findOrFail($id);

        $mobil->delete();

        return redirect('/mobil')
                ->with('success', 'Data mobil berhasil dihapus');
    }
}