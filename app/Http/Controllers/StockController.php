<?php

namespace App\Http\Controllers;

use App\Models\Stock;
use App\Models\Product;
use App\Models\Warehouse;
use Illuminate\Http\Request;

class StockController extends Controller
{
    public function index()
    {
        $stocks = Stock::with('product', 'warehouse')->get();
        return view('stocks.index', compact('stocks'));
    }

    public function create()
    {
        $products = Product::all();
        $warehouses = Warehouse::all();
        return view('stocks.create', compact('products', 'warehouses'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'product_id' => 'required|exists:products,id',
            'warehouse_id' => 'required|exists:warehouses,id',
            'quantity' => 'required|integer|min:0',
            'reorder_level' => 'required|integer|min:0',
        ]);

        Stock::create($validated);
        return redirect()->route('stocks.index')->with('success', 'Stock created successfully.');
    }

    public function show(Stock $stock)
    {
        $stock->load('product', 'warehouse');
        return view('stocks.show', compact('stock'));
    }

    public function edit(Stock $stock)
    {
        $products = Product::all();
        $warehouses = Warehouse::all();
        return view('stocks.edit', compact('stock', 'products', 'warehouses'));
    }

    public function update(Request $request, Stock $stock)
    {
        $validated = $request->validate([
            'product_id' => 'required|exists:products,id',
            'warehouse_id' => 'required|exists:warehouses,id',
            'quantity' => 'required|integer|min:0',
            'reorder_level' => 'required|integer|min:0',
        ]);

        $stock->update($validated);
        return redirect()->route('stocks.index')->with('success', 'Stock updated successfully.');
    }

    public function destroy(Stock $stock)
    {
        $stock->delete();
        return redirect()->route('stocks.index')->with('success', 'Stock deleted successfully.');
    }
}
