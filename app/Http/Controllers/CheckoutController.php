<?php

namespace App\Http\Controllers;

use App\Models\Pesanan;
use Illuminate\Http\Request;

class CheckoutController extends Controller
{
    public function index()
    {
        return view('frontend.checkout');
    }

    public function store(Request $request)
    {
        // Validasi data
        $validatedData = $request->validate([
            'fullname' => 'required|string|max:255',
            'phone' => 'required|string|max:15',
            'email' => 'required|email|max:255',
            'address' => 'required|string|max:255',
        ]);

        // Simpan data ke database
        $pesanan = new Pesanan();
        $pesanan->fullname = $validatedData['fullname'];
        $pesanan->phone = $validatedData['phone'];
        $pesanan->email = $validatedData['email'];
        $pesanan->address = $validatedData['address'];
        // Tambahkan atribut lain yang dibutuhkan
        $pesanan->save();

        // Buat URL WhatsApp dengan data form
        $waUrl = "https://api.whatsapp.com/send?phone=+6281213633264&text=Bayu" . urlencode(
            "Fullname: " . $validatedData['fullname'] . "\n" .
            "Phone: " . $validatedData['phone'] . "\n" .
            "Email: " . $validatedData['email'] . "\n" .
            "Address: " . $validatedData['address']
        );

        // Redirect ke URL WhatsApp
        return redirect($waUrl);
    }
}
