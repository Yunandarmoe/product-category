<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {   
        $products = Product::paginate(5);

        return view('product.index', compact('products', $products));
    }

    public function create()
    {
        $categories = Category::all();
        return view('product.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'category_name' => 'required'
        ]);

        $product = Product::create([
            'name' => $request->name,
        ]);

        $categories = $request->category_name;
        $product->categories()->attach($categories);

        return redirect()->back();
    }

    public function show($id)
    {
        $product = Product::findOrFail($id);

        return view('product.show', compact('product'));
    }

    public function edit(Request $request, $id)
    {
        $product = Product::findOrFail($id);
        $categories = Category::all();

        return view('product.edit', compact('product', 'categories'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'category_name' => 'required'
        ]);

        $product = Product::findOrFail($id);

        $product->update([
            'name' => $request->name,
        ]);

        $product->categories()->sync($request->category_name);

        return redirect()->back()->with('success', 'Product successfully updated.');
    }

    public function destroy($id)
    {
        $product = Product::findOrFail($id);

        $product->delete();

        return redirect()->back()->with('success', 'Product successfully deleted.');
    }

    public function search(Request $request)
    {
        $data = Product::where('name', 'like', '%' . $request->input('query') . '%')
            ->get();
        
        $categories = Category::all();
        
        return view('product.search', ['products' => $data], compact('categories'));
    }
}
