<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index(Request $request)
    {
        $categories = Category::where('name', 'like', '%' . $request->input('query') . '%')
        ->paginate(5);

        return view('category.index', compact('categories'));
    }

    public function create()
    {
        return view('category.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
        ]);

        $category = Category::create([
            'name' => $request->name,
        ]);

        return redirect()->route('category.index')->with('success', 'Product successfully stored.');
    }

    public function edit($id)
    {
        $category = Category::findOrFail($id);

        return view('category.edit', compact('category'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
        ]);

        $category = Category::findOrFail($id);

        $category->update([
            'name' => $request->name,
        ]);

        return redirect()->back()->with('success', 'Product successfully updated.');
    }

    public function destroy($id)
    {
        $category = Category::findOrFail($id);

        $category->delete();

        return redirect()->back()->with('success', 'Product successfully deleted.');
    }
}
