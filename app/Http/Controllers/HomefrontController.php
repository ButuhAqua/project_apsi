<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class HomefrontController extends Controller
{
    public function index()
    {
        $products = Product::all();
        return view('frontend.home', compact('products'));
    }
}