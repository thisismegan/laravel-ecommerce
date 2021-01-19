<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Category;
use App\Product;

class CategoryController extends Controller
{
    public function index()
    {
        return view('admin.category.index');
    }

    public function create()
    {
        return view('admin.category.create');
    }

    public function store(Request $request)
    {
        $request->validate(
            [
                'category_name' => 'required',
            ],
            [
                'category_name.required' => 'Kolom tidak boleh kosong'
            ]
        );

        Category::create([
            'category_name' => $request->category_name,
        ]);

        return redirect(route('admin.category.index'))->with('success', 'Berhasil Menambahkan Kategori');
    }

    public function edit($id)
    {
        if ($id == 5) {
            return redirect(route('admin.category.index'))->with('failed', 'Kategori ini tidak bisa diedit atau dihapus');
        }

        $category = Category::where('id', $id)->first();
        return view('admin.category.edit', compact('category'));
    }

    public function update(Request $request, $category)
    {
        Category::where('id', $category)->update(['category_name' => $request->category_name]);
        return redirect(route('admin.category.index'))->with('success', 'Category Has Been Updated!');
    }

    public function destroy(Request $request)
    {
        Product::where('category_id', $request->id)->update([
            'category_id' => 5
        ]);

        Category::where('id', $request->id)->delete();

        return redirect()->back()->with('success', 'Kategori berhasil dihapus');
    }
}
