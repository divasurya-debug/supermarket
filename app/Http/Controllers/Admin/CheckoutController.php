<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Checkout;
use App\Models\Akun;
use Illuminate\Http\Request;

class CheckoutController extends Controller
{
    public function index()
    {
        $checkouts = Checkout::with('akun')->latest()->get();
        return view('admin.checkout.index', compact('checkouts'));
    }

    public function create()
    {
        $customers = Akun::all();
        return view('admin.checkout.create', compact('customers'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'id_akun' => 'required',
            'total_harga' => 'required|numeric',
            'status' => 'required|string'
        ]);

        Checkout::create($request->all());

        return redirect()->route('admin.checkout.index')
            ->with('success', 'Checkout berhasil ditambahkan');
    }

    public function edit($id)
    {
        $checkout = Checkout::findOrFail($id);
        $customers = Akun::all();
        return view('admin.checkout.edit', compact('checkout', 'customers'));
    }

    public function update(Request $request, $id)
    {
        $checkout = Checkout::findOrFail($id);

        $request->validate([
            'id_akun' => 'required',
            'total_harga' => 'required|numeric',
            'status' => 'required|string'
        ]);

        $checkout->update($request->all());

        return redirect()->route('admin.checkout.index')
            ->with('success', 'Checkout berhasil diperbarui');
    }

    public function destroy($id)
    {
        $checkout = Checkout::findOrFail($id);
        $checkout->delete();

        return redirect()->route('admin.checkout.index')
            ->with('success', 'Checkout berhasil dihapus');
    }
}
