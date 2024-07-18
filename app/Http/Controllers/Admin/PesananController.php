<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyPesananRequest;
use App\Http\Requests\StorePesananRequest;
use App\Http\Requests\UpdatePesananRequest;
use App\Models\Pesanan;
use App\Models\Product;
use Gate;
use Symfony\Component\HttpFoundation\Response;

class PesananController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('pesanan_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $pesanans = Pesanan::with(['products'])->get();

        return view('admin.pesanans.index', compact('pesanans'));
    }

    public function create()
    {
        abort_if(Gate::denies('pesanan_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $products = Product::all();

        return view('admin.pesanans.create', compact('products'));
    }

    public function store(StorePesananRequest $request)
    {
        $total = 0;
        $quantities = $request->input('quantities');

        foreach ($quantities as $product_id => $quantity) {
            $product = Product::find($product_id);
            if ($product->stock < $quantity) {
                return redirect()->back()->withErrors(['error' => 'Stock for product ' . $product->name . ' is insufficient.']);
            }
            $total += $product->price * $quantity;
        }

        $pesanan = Pesanan::create($request->all());

        foreach ($quantities as $product_id => $quantity) {
            $pesanan->products()->attach($product_id, ['quantity' => $quantity]);
        }

        $pesanan->update(['total' => $total]);

        // Update stock if status is 'terkirim' or 'take_away'
        if (in_array($pesanan->status, ['terkirim', 'take_away'])) {
            $this->adjustProductStock($pesanan);
        }

        return redirect()->route('admin.pesanans.index');
    }

    public function edit(Pesanan $pesanan)
    {
        abort_if(Gate::denies('pesanan_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $products = Product::all();

        return view('admin.pesanans.edit', compact('pesanan', 'products'));
    }

    public function update(UpdatePesananRequest $request, Pesanan $pesanan)
    {
        $total = 0;
        $quantities = $request->input('quantities');

        foreach ($quantities as $product_id => $quantity) {
            $product = Product::find($product_id);
            if ($product->stock < $quantity) {
                return redirect()->back()->withErrors(['error' => 'Stock for product ' . $product->name . ' is insufficient.']);
            }
            $total += $product->price * $quantity;
        }

        $pesanan->update($request->all());
        $pesanan->products()->detach();

        foreach ($quantities as $product_id => $quantity) {
            $pesanan->products()->attach($product_id, ['quantity' => $quantity]);
        }

        $pesanan->update(['total' => $total]);

        // Update stock if status is 'terkirim' or 'take_away'
        if (in_array($pesanan->status, ['terkirim', 'take_away'])) {
            $this->adjustProductStock($pesanan);
        }

        return redirect()->route('admin.pesanans.index');
    }

    public function show(Pesanan $pesanan)
    {
        abort_if(Gate::denies('pesanan_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $pesanan->load(['products']);

        return view('admin.pesanans.show', compact('pesanan'));
    }

    public function destroy(Pesanan $pesanan)
    {
        abort_if(Gate::denies('pesanan_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $pesanan->delete();

        return back();
    }

    public function massDestroy(MassDestroyPesananRequest $request)
    {
        $pesanans = Pesanan::find(request('ids'));

        foreach ($pesanans as $pesanan) {
            $pesanan->delete();
        }

        return response(null, Response::HTTP_NO_CONTENT);
    }

    private function adjustProductStock(Pesanan $pesanan)
    {
        foreach ($pesanan->products as $product) {
            $quantity = $product->pivot->quantity;
            $product->decrement('stock', $quantity);
        }
    }
}
