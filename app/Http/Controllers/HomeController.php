<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $products = 'Vina!';
        return view('home', compact('products'));
    }

    public function getProduct($id, $serial_number = -1)
    {

        return view('Product-detail', compact('id','serial_number'));
    }
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|min:10'
        ]);
        return $request->name;
    }
}
