<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::latest()->paginate(5);
        return view('categories.index', compact('categories'))->with('i', (request()->input('page', 1) - 1) * 5);
    }

    public function create()
    {
        return view('categories.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'description'  => 'required',
        ]);

        Category::create($request->all());
        return redirect()->route('categories.index')->with('success', 'Category created succesfully');
    }

    public function show(Category $category)
    {
        return view('categories.show', compact('category'));
    }

    public function edit(Category $category)
    {
        return view('categories.edit', compact('category'));
    }

    public function update(Request $request, Category $category)
    {
        $request->validate([
            'name' => 'required',
            'description'  => 'required',
        ]);

        $category->update($request->all());

        return redirect()->route('categories.index')->with('success', 'Category updated succesfully');
    }

    public function destroy(Category $category)
    {
        $category->products()->delete();
        $category->delete();

        return redirect()->route('categories.index')->with('success', 'Category deleted succesfully');
    }
}