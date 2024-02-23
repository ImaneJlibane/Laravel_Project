<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    public function index()
    {
        // Your code for the admin dashboard
        return view('admin.dashboard');
    }

    // Add other admin-specific methods here as needed
}
