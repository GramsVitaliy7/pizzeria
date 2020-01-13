<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    /**
     * Show the payment form
     *
     * @return view
     */
    public function index()
    {
        return view('shopping_cart.payment');
    }
}
