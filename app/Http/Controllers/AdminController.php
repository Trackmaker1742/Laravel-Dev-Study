<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    /**
     * Show the admin dashboard
     */
    public function dashboard()
    {
        return view('admin.dashboard');
    }

    /**
     * Show users management
     */
    public function users()
    {
        return view('admin.users');
    }

    /**
     * Show products management
     */
    public function products()
    {
        return view('admin.products');
    }
}
