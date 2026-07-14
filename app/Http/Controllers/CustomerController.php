<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Customer;
use App\Models\User;

class CustomerController extends Controller
{
    public function index()
    {
        $customers = Customer::all();
        return view('admin.customer.index', compact('customers'));
    }

    public function create()
    {
        $users = User::all();

        return view('admin.customer.create', compact('users'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'user_id' => 'nullable|exists:users,id',
            'nama' => 'required|string|max:255',
            'alamat' => 'required|string|max:500',
            'no_identitas' => 'nullable|string|max:255',
            'no_telp' => 'required|string|max:50',
            'email' => 'nullable|email|max:255',
        ]);

        Customer::create($validated);

        return redirect()->route('admin.customer.index')->with('success', 'Data customer berhasil ditambahkan');
    }

    public function edit(Customer $customer)
    {
        $users = User::all();

        return view('admin.customer.edit', compact('customer', 'users'));
    }

    public function update(Request $request, Customer $customer)
    {
        $validated = $request->validate([
            'user_id' => 'nullable|exists:users,id',
            'nama' => 'required|string|max:255',
            'alamat' => 'required|string|max:500',
            'no_identitas' => 'nullable|string|max:255',
            'no_telp' => 'required|string|max:50',
            'email' => 'nullable|email|max:255',
        ]);

        $customer->update($validated);

        return redirect()->route('admin.customer.index')->with('success', 'Data customer berhasil diupdate');
    }

    public function destroy(Customer $customer)
    {
        $customer->delete();
        return redirect()->route('admin.customer.index')->with('success', 'Data customer berhasil dihapus');
    }

    public function profile()
    {
        $customer = Auth::user()?->customer;

        return view('customer.profile', compact('customer'));
    }

    public function updateProfile(Request $request)
    {
        $validated = $request->validate([
            'nama' => 'required|string|max:255',
            'alamat' => 'required|string|max:500',
            'no_identitas' => 'nullable|string|max:255',
            'no_telp' => 'required|string|max:50',
            'email' => 'nullable|email|max:255',
        ]);

        $user = Auth::user();
        if ($user->customer) {
            $user->customer->update($validated);
        } else {
            $validated['user_id'] = $user->id;
            $validated['email'] = $validated['email'] ?? $user->email;
            Customer::create($validated);
        }

        return redirect()->route('customer.profile')->with('success', 'Profil Anda berhasil diperbarui.');
    }
}
