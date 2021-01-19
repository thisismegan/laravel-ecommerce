<?php

namespace App\Http\Controllers\User;

use App\Address;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Product;
use App\Cart;
use Illuminate\Support\Facades\Auth;
use App\User;
use Illuminate\Support\Facades\Storage;

class HomepageController extends Controller
{
    public function index()
    {
        $product = Product::all();
        return view('homepage', compact('product'));
    }

    public function show(Product $product)
    {
        $related = Product::where('category_id', $product->category_id)->take(8)->get();
        return view('detail', compact(['related', 'product']));
    }

    public function profil()
    {
        $id = Auth()->user()->id;
        $profil = User::where('id', $id)->first();
        return view('user.profile.index', compact('profil'));
    }

    public function update_profil(Request $request, User $user)
    {
        $request->validate(
            [
                'name'          => 'required|min:3|max:100',
                'image'         => 'file|image',
            ]
        );

        if ($request->file('image')) {
            $path = $request->file('image')->store('assets/profil');
            Storage::delete($user->image);
        }
        if ($request->image == null) {
            $path = $user->image;
        }

        $user = User::where('id', $user->id)
            ->update([
                'name'  => $request->name,
                'image' => $path
            ]);
        return redirect()->back()->with('success', 'Profile has been updated!!');
    }
}
