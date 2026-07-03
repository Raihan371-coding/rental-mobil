<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CustomerProfileController extends Controller
{
    public function index()
    {
        $customer = Auth::user();
        return view('customer_profile.index', compact('customer'));
    }

    public function edit()
    {
        $customer = Auth::user();
        return view('customer_profile.edit', compact('customer'));
    }

    public function update(Request $request)
    {
        $customer = Auth::user();

        $customer->update($request->only('nama', 'no_telp', 'alamat'));

        return redirect()->route('customer.profile')
            ->with('success', 'Profil berhasil diperbarui');
    }
}