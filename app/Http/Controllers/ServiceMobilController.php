<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ServiceMobil;
use App\Models\Mobil;

class ServiceMobilController extends Controller
{
    public function index()
    {
        $services = ServiceMobil::with('mobil')->get();

        return view('servicemobil.index', compact('services'));
    }

    public function create()
    {
        $mobils = Mobil::all();

        return view('servicemobil.create', compact('mobils'));
    }

    public function store(Request $request)
    {
        ServiceMobil::create([
            'mobil_id' => $request->mobil_id,
            'tanggal_service' => $request->tanggal_service,
            'biaya_service' => $request->biaya_service,
            'deskripsi' => $request->deskripsi,
            'status_service' => $request->status_service,
        ]);

        return redirect('/service')
                ->with('success', 'Data service berhasil ditambahkan');
    }

    public function edit(string $id)
    {
        $service = ServiceMobil::findOrFail($id);

        $mobils = Mobil::all();

        return view('servicemobil.edit', compact('service', 'mobils'));
    }

    public function update(Request $request, string $id)
    {
        $service = ServiceMobil::findOrFail($id);

        $service->update([
            'mobil_id' => $request->mobil_id,
            'tanggal_service' => $request->tanggal_service,
            'biaya_service' => $request->biaya_service,
            'deskripsi' => $request->deskripsi,
            'status_service' => $request->status_service,
        ]);

        return redirect('/service')
                ->with('success', 'Data service berhasil diupdate');
    }

    public function destroy(string $id)
    {
        $service = ServiceMobil::findOrFail($id);

        $service->delete();

        return redirect('/service')
                ->with('success', 'Data service berhasil dihapus');
    }
}