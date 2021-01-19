<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Wishlist;
use App\Contact_support;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Facades\Hash;

Route::get('/', 'User\HomepageController@index')->name('homepage');
Route::get('/detail/{product}', 'User\HomepageController@show')->name('product.detail');
Route::get('/contact', function () {
    return view('contact');
})->name('contact');
Route::post('/contact', function (Request $request) {
    $request->validate([
        'name' => 'required',
        'phone' => 'required',
        'email' => 'required',
        'invoice' => 'required',
        'comment' => 'required'
    ]);

    Contact_support::create([
        'name' => $request->name,
        'phone' => $request->phone,
        'email' => $request->email,
        'invoice' => $request->invoice,
        'comment' => $request->comment,
        'status'  => 0
    ]);
    return redirect()->back()->with('success', 'Laporan sudah dikirim, mohon menunggu untuk dilakukan pengecekan terkait orderan yang bermasalah');
})->name('contact.store')->middleware('verified');

Auth::routes(['verify' => true]);

Route::get('/home', 'HomeController@index')->name('home')->middleware('verified');


// route cart
Route::middleware('verified')->group(function () {
    Route::post('/cart', 'User\CartController@store')->name('cart.store');
    Route::get('/cart', 'User\CartController@index')->name('cart.index');
    Route::delete('/cart/destroy', 'User\CartController@destroy')->name('cart.destroy');
});


// route wishlist
Route::get('/wishlist/{id}', function () {
    $wishlist = Wishlist::where('user_id', Auth()->user()->id)->with('product')->get();
    return view('user.wishlist.index', compact('wishlist'));
})->name('wishlist.index')->middleware('verified');

Route::post('/wishlist', function (Request $request) {
    $wishlist = Wishlist::where('user_id', Auth()->user()->id)
        ->where('product_id', $request->product_id)->count();
    if ($wishlist > 0) {
        return redirect(route('homepage'))->with('warning', 'Product Sudah di dalam wishlist anda');
    }
    Wishlist::create([
        'user_id' => Auth()->user()->id,
        'product_id' => $request->product_id
    ]);
    return redirect(route('homepage'))->with('success', 'Produk Berhasil di tambahkan ke Wishlist');
})->name('wishlist')->middleware('verified');

Route::delete('/wishlist/destroy/{id}', function ($id) {

    Wishlist::where('id', $id)->delete();
    return redirect()->back()->with('success', 'Produk berhasil dihapus dari wishlist');
})->name('wishlist.destroy')->middleware('verified');


// route checkout

Route::middleware('verified')->group(function () {
    Route::get('/checkout', 'User\CheckoutController@index')->name('checkout.index');
    Route::post('/checkout', 'User\CheckoutController@store')->name('checkout.store');
});


//route order member
Route::middleware('verified')->group(function () {
    Route::get('/order', 'User\OrderController@index')->name('order.index');
    Route::post('/order/detail', 'User\OrderController@show')->name('order.show');
    Route::get('/order/paid/{invoice}', 'User\OrderController@paid')->name('order.paid');
    Route::post('/order/order_confirm', 'User\OrderController@order_confirm')->name('order.order_confirm');
});

// route profile
Route::get('/profil', 'User\HomepageController@profil')->name('user.profil')->middleware('verified');
Route::patch('/profil/{user}', 'User\HomepageController@update_profil')->name('user.update')->middleware('verified');

// route address
Route::middleware('verified')->group(function () {
    Route::get('/address', 'User\AddressController@index')->name('address.index');
    Route::get('/address/create', 'User\AddressController@create')->name('address.create');
    Route::post('/address/store', 'User\AddressController@store')->name('address.store');
    Route::get('/address/{id}/edit', 'User\AddressController@edit')->name('address.edit');
    Route::patch('/address/{address}', 'User\AddressController@update')->name('address.update');
});



// route change password
Route::get('/change_password', function () {

    return view('user.change_password');
})->name('change_password')->middleware('verified');
Route::post('/change_password', function (Request $request) {

    $request->validate([
        'old_password' => 'required',
        'password' => 'required|min:8|confirmed'
    ]);
    $old_pass = Auth()->user()->password;
    $hash = Hash::check($request->old_password, $old_pass);
    if (!$hash) {
        return redirect()->back()->with('warning', "The Old Password doesn't Match");
    }
    if (Hash::check($request->password, $old_pass)) {
        return redirect()->back()->with('warning', 'Password Baru harus berbeda dengan password lama');
    }

    $request->user()->fill([
        'password' => Hash::make($request->password)
    ])->save();

    return redirect()->back()->with('success', 'Password Has Been Changed!');
})->name('update_password');
