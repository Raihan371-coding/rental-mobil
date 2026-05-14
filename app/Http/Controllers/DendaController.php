<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Denda;

class DendaController extends Controller
{
    public function index()
    {
        $dendas = Denda::all();
        return view('denda.index', compact('dendas'));
    }

    public function create()
    {
        return view('denda.create');
    }

    public function store(Request $request)
    {
        Denda::create($request->all());
        return redirect()->route('denda.index')->with('success', 'Data denda berhasil ditambahkan');
    }

    public function edit(Denda $denda)
    {
        return view('denda.edit', compact('denda'));
    }

    public function update(Request $request, Denda $denda)
    {
        $denda->update($request->all());
        return redirect()->route('denda.index')->with('success', 'Data denda berhasil diupdate');
    }

    public function destroy(Denda $denda)
    {
        $denda->delete();
        return redirect()->route('denda.index')->with('success', 'Data denda berhasil dihapus');
    }
}