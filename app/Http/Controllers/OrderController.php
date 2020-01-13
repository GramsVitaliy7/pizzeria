<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\View\View;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return View
     */
    public function index()
    {
        $orders = Order::with(['user', 'selectedProducts'])->latest()->paginate(10);
        return view('orders.index', compact(['orders']));
    }

    /**
     * Display the specified resource.
     *
     * @param Order $order
     * @return View
     */
    public function show(Order $order)
    {
        return view('orders.show', compact('order'));
    }

}
