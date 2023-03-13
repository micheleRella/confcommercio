<?php

namespace App\Http\Controllers;

use App\Models\City;
use Illuminate\Http\Request;

class CitiesController extends Controller
{
    public function create()
    {
        return view('admin.city.create');
    }

    public function index()
    {
        return view('admin.city.index');
    }
    public function edit($id)
    {
        $city = City::find($id);
        return view('admin.city.edit', compact('city'));
    }

    
}
