<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserVendorController extends Controller
{
    public function create()
    {
        return view('admin.user.create');
    }

    public function index()
    {
        return view('admin.user.index');
    }
    public function edit($id)
    {
        $user = User::find($id);
        return view('admin.user.edit', compact('user'));
    }
    public function vendorShop()
    {
        $shop = auth()->user()->shop;
        return view('vendors.shop.edit', compact('shop'));
        
    }
}
