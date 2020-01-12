<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\View\View;

class OrderController extends Controller
{

    /**
     * Display a listing of the order.
     *
     * @return View
     */
    public function index()
    {
        $orders = Order::with(['user', 'selectedProducts'])->latest()->paginate(10);
        foreach ($orders as $order) {
            $order->total = $order->getOrderTotalPrice();
        }
        return view('admin.orders.index', compact(['orders']));
    }

    /**
     * Display the specified order.
     *
     * @param Order $order
     * @return View
     */
    public function show(Order $order)
    {
        return view('admin.orders.show', compact('order'));
    }

}
