<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\View\View;

class AboutController extends Controller
{
    /**
     * Show the company contact data.
     *
     * @return View
     */
    public function index()
    {
        return view('about.index');
    }
}
