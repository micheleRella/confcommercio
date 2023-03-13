<?php

namespace App\Http\Controllers;

use App\Models\Shop;
use App\Imports\ShopsImport;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class ShopController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function create()
    {
        return view('admin.shop.create');
    }

    public function index()
    {
        return view('admin.shop.index');
    }
    public function edit($id)
    {
        $shop = Shop::find($id);
        return view('admin.shop.edit', compact('shop'));
    }
    public function import(Request $request) 
    {
        Excel::import(new ShopsImport, $request->file);
        return redirect()->route('shop.index')->with('success', 'All good!');
    }
}
