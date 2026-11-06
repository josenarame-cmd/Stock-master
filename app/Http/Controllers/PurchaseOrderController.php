<?php

namespace App\Http\Controllers;

use App\Models\PurchaseOrder;
use App\Models\Supplier;
use App\Models\Warehouse;
use Illuminate\Http\Request;

class PurchaseOrderController extends Controller
{
    public function index()
    {
        $orders = PurchaseOrder::with('supplier', 'warehouse')->get();
        return view('purchase_orders.index', compact('orders'));
    }

    public function create()
    {
        $suppliers = Supplier::all();
        $warehouses = Warehouse::all();
        return view('purchase_orders.create', compact('suppliers', 'warehouses'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'order_number' => 'required|string|max:50|unique:purchase_orders,order_number',
            'supplier_id' => 'required|exists:suppliers,id',
            'warehouse_id' => 'required|exists:warehouses,id',
            'order_date' => 'required|date',
            'expected_date' => 'nullable|date|after:order_date',
            'status' => 'required|in:pending,received,cancelled',
            'total_amount' => 'required|numeric|min:0',
        ]);

        PurchaseOrder::create($validated);
        return redirect()->route('purchase_orders.index')->with('success', 'Purchase Order created successfully.');
    }

    public function show(PurchaseOrder $purchaseOrder)
    {
        $purchaseOrder->load('supplier', 'warehouse', 'orderItems.product');
        return view('purchase_orders.show', compact('purchaseOrder'));
    }

    public function edit(PurchaseOrder $purchaseOrder)
    {
        $suppliers = Supplier::all();
        $warehouses = Warehouse::all();
        return view('purchase_orders.edit', compact('purchaseOrder', 'suppliers', 'warehouses'));
    }

    public function update(Request $request, PurchaseOrder $purchaseOrder)
    {
        $validated = $request->validate([
            'order_number' => 'required|string|max:50|unique:purchase_orders,order_number,' . $purchaseOrder->id,
            'supplier_id' => 'required|exists:suppliers,id',
            'warehouse_id' => 'required|exists:warehouses,id',
            'order_date' => 'required|date',
            'expected_date' => 'nullable|date|after:order_date',
            'status' => 'required|in:pending,received,cancelled',
            'total_amount' => 'required|numeric|min:0',
        ]);

        $purchaseOrder->update($validated);
        return redirect()->route('purchase_orders.index')->with('success', 'Purchase Order updated successfully.');
    }

    public function destroy(PurchaseOrder $purchaseOrder)
    {
        $purchaseOrder->delete();
        return redirect()->route('purchase_orders.index')->with('success', 'Purchase Order deleted successfully.');
    }
}
