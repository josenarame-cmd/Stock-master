<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Supplier;
use App\Models\Warehouse;
use App\Models\PurchaseOrder;
use App\Models\Stock;

/**
 * Dashboard controller — shows summary statistics
 */
class DashboardController extends Controller
{
    public function index()
    {
        $totalProducts = Product::count();
        $totalSuppliers = Supplier::count();
        $totalWarehouses = Warehouse::count();
        $totalOrders = PurchaseOrder::count();
        $totalStock = Stock::sum('quantity');
        $lowStockItems = Stock::where('quantity', '<=', \DB::raw('reorder_level'))->count();
        $pendingOrders = PurchaseOrder::where('status', 'pending')->count();
        $recentOrders = PurchaseOrder::with('supplier')->latest()->take(5)->get();

        return view('dashboard', compact(
            'totalProducts', 'totalSuppliers', 'totalWarehouses', 'totalOrders',
            'totalStock', 'lowStockItems', 'pendingOrders', 'recentOrders'
        ));
    }
}
