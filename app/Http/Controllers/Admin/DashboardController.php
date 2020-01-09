<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index() {
        $message = __('messages.dashboard_welcome');
        return view('admin.dashboard', compact('message'));
    }
}
