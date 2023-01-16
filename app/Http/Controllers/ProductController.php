<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;

use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::latest()->paginate(5);
        return view('products.index', compact('products'))->with('i', (request()->input('page', 1) - 1) * 5);
    }

    public function create()
    {
        $categories = Category::all();
        return view('products.create', compact('categories'));
    }

    public function store(Request $request)
    {

        $request->validate([
            'name' => 'required',
            'description'  => 'required',
            'price'  => 'required|numeric',
            'category' => 'required|numeric'
        ]);


        Product::create($request->all());
        return redirect()->route('products.index')->with('success', 'Products created succesfully');
    }

    public function show(Product $product)
    {
        return view('products.show', compact('product'));
    }

    public function edit(Product $product)
    {
        $categories = Category::all();
        return view('products.edit', compact('product','categories'));
    }


    public function update(Request $request, Product $product)
    {
        $request->validate([
            'name' => 'required',
            'description'  => 'required',
            'price'  => 'required|numeric',
            'category_id' => 'required|numeric'
        ]);

        $request->validate([]);
        $product->update($request->all());

        return redirect()->route('products.index')->with('success', 'Product updated succesfully');
    }

    public function destroy(Product $product)
    {
        $product->delete();

        return redirect()->route('products.index')->with('success', 'Product deleted succesfully');
    }
}
