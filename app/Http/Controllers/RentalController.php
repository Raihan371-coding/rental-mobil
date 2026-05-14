<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Rental;

class RentalController extends Controller
{
    public function index()
    {
        $data = Rental::all();
        return view('rental.index', compact('data'));
    }
    public function create()
    {
        return view('rental.create');
    }
    public function store(Request $request)
    {
        Rental::create($request->all());
        return redirect()->route('rental.index')->with('success', 'Data rental berhasil ditambahkan');
    }

    public function edit($id)
    {
        $data = Rental::findOrFail($id);
        return view('rental.edit', compact('data'));
    }
    public function update(Request $request, $id)
    {
        $rental = Rental::findOrFail($id);
        $rental->update($request->all());
        return redirect()->route('rental.index')->with('success', 'Data rental berhasil diupdate');
    }
    public function destroy($id)
    {
        $rental = Rental::findOrFail($id);
        $rental->delete();
        return redirect()->route('rental.index')->with('success', 'Data rental berhasil dihapus');
    }
}
