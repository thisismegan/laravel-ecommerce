<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Product;
use App\Category;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $category = Category::all();
        return view('admin.product.index', compact('category'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $category = Category::all();
        return view('admin.product.create', compact('category'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate(
            [
                'title'         => 'required|min:10|max:100',
                'description'   => 'required|min:20|max:3000',
                'price'         => 'required|numeric|min:1',
                'qty'           => 'required|numeric|min:1',
                'image'         => 'file|image'
            ]
        );
        if ($request->file('image')) {
            $path = $request->file('image')->store('assets/product');
        } else {
            $path = 'https://via.placeholder.com/150';
        }

        Product::create([
            'title'         => $request->title,
            'category_id'   => $request->category,
            'description'   => $request->description,
            'price'         => $request->price,
            'qty'           => $request->qty,
            'image'         => $path
        ]);

        return redirect(route('admin.product.index'))->with('success', 'Produk Berhasil Ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $product = Product::where('id', $id)->first();
        return view('admin.product.show', compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $category = Category::all();
        $product = Product::where('id', $id)->first();
        return view('admin.product.edit', compact('product', 'category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        $request->validate(
            [
                'title'         => 'required|min:10|max:100',
                'description'   => 'required|min:20|max:3000',
                'price'         => 'required|numeric|min:1',
                'qty'           => 'required|numeric|min:1',
                'image'         => 'file|image'
            ]
        );

        if ($request->file('image')) {
            $path = $request->file('image')->store('assets/product');
            Storage::delete($product->image);
        }
        if ($request->image == null) {
            $path = $product->image;
        }
        Product::where('id', $product->id)
            ->update([
                'title'         => $request->title,
                'category_id'   => $request->category,
                'description'   => $request->description,
                'price'         => $request->price,
                'qty'           => $request->qty,
                'image'         => $path
            ]);

        return redirect(route('admin.product.index'))->with('success', 'Produk Berhasil Di Update!!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        // Storage::delete($request->image);
        Product::where('id', $request->id)->delete();

        return redirect(route('admin.product.index'))->with('success', 'Produk Berhasil Dihapus');
    }
}
