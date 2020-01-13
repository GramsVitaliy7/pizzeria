<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserInfoController extends Controller
{
    /**
     * Show the user info (phone number, name, delivery address)
     *
     * @return view
     */
    public function index()
    {
        if (Auth::check()) {
            $user = auth()->user();
        }
        return view('shopping_cart.user_info', compact('user'));
    }
}
