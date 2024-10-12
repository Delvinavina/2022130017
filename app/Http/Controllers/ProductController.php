<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $Product = Product::paginate(10);
        return view('Products.index', compact('Product'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('Products.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'id' => 'required|string|max:255',
            'name' => 'required|string|max:255',
            'desc' => 'required|string|max:255',
            'retail' => 'string|max:13',
            'whole' => 'string|max:13',
            'origin' => 'string|max:13',
            'quantity' => 'string|max:13',
        ]);

        if ($request->hasFile('avatar')) {
            $request->validate([
                'avatar' => 'image|mimes:png,jpg,jpeg,gif,svg|max:2048',
            ]);

            $imagePath = $request->file('avatar')->storePublicly('public/images');

            $validated['avatar'] = $imagePath;
    }
    Product::create([
        'id' => $validated['id'],
        'name' => $validated['name'],
        'desc' => $validated['desc'],
        'retail' => $validated['retail'],
        'whole' => $validated['whole'],
        'origin' => $validated['origin'],
        'quantity' => $validated['quantity'],
        'avatar' => $validated['avatar'] ?? null,
       ]);
       return redirect()->route('Products.index')->with('succes', 'Product input successfully.');
}

    /**
     * Display the specified resource.
     */
    public function show(Product $Product)
    {
        return view('Products.show', compact('Product'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $Product)
    {
        return view('Products.edit' , compact('Product'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $Product)
    {
        $validated = $request->validate([
            'id' => 'required|string|max:255',
            'name' => 'required|string|max:255',
            'desc' => 'required|string|max:255',
            'retail' => 'string|max:13',
            'whole' => 'string|max:13',
            'origin' => 'required|string|max:255',
            'quantity' => 'string|max:13',
        ]);

        if ($request->hasFile('avatar')) {
            $request->validate([
                'avatar' => 'image|mimes:png,jpg,jpeg,gif,svg|max:2048',
            ]);

            $imagePath = $request->file('avatar')->storePublicly('public/images');

//hapus file existing
if ($Product->avatar) {
    Storage::delete($Product->avatar);
    }
    $validated['avatar'] = $imagePath;

            $validated['avatar'] = $imagePath;
           }
           $Product->update([

           'id' => $validated['id'],
        'name' => $validated['name'],
        'desc' => $validated['desc'],
        'retail' => $validated['retail'],
        'whole' => $validated['whole'],
        'origin' => $validated['origin'],
        'quantity' => $validated['quantity'],
            'avatar'=> $validated['avatar'] ?? $Product->avatar,
           ]);

           return redirect()->route('Products.index')->with('succes', 'Product Update successfully.');
}

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $Product)
    {
        if ($Product->avatar){
            Storage::delete($Product->avatar);
        }
        $Product->delete();
        return redirect()->route('Products.index')->with('succes', 'Product Deleted successfully!');
    }
}
