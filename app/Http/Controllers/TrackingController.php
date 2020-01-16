<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;

class TrackingController extends Controller
{
    /**
     * Show the google map (order's tracking)
     *
     * @return view
     */

    public function index()
    {
        $orders = auth()->user()->orders;
        return view('home.tracking', compact('orders'));
    }
}
