<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;

class DeliveryInfoController extends Controller
{
    /**
     * Show the delivery info.
     *
     * @return View
     */
    public function index() {
        return view('delivery_info.index');
    }
}
