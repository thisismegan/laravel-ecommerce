<?php

use Illuminate\Support\Facades\Route;
use App\Category;
use App\Contact_support;
use App\DataTables\OrderDataTable;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Facades\Storage;

Route::get('/', 'DashboardController@index')->name('dashboard');

// route product
Route::get('/data-product', 'DataController@product')->name('data.product');
Route::get('/product', 'ProductController@index')->name('product.index');
Route::get('/product/create', 'ProductController@create')->name('product.create');
Route::post('/product', 'ProductController@store')->name('product.store');
Route::delete('/product/{id}', 'ProductController@destroy')->name('product.delete');
Route::get('/product/{id}', 'ProductController@show')->name('product.show');
Route::get('/product/{id}/edit', 'ProductController@edit')->name('product.edit');
Route::patch('/product/{product}', 'ProductController@update')->name('product.update');


// route Category
Route::get('/data-category', function () {
    $model = Category::orderBy('category_name', 'ASC');

    return DataTables()->of($model)
        ->addIndexColumn()
        ->addColumn('action', 'admin.category.action')
        ->rawColumns(['action'])
        ->toJson();
})->name('data-category');
Route::get('/category', 'CategoryController@index')->name('category.index');
Route::get('/category/create', 'CategoryController@create')->name('category.create');
Route::post('/category', 'CategoryController@store')->name('category.store');
Route::get('/category/{id}/edit', 'CategoryController@edit')->name('category.edit');
Route::patch('/category/update/{category}', 'CategoryController@update')->name('category.update');
Route::delete('/category/delete', 'CategoryController@destroy')->name('category.destroy');

// route orders
Route::get('/data-order', 'DataController@order')->name('data-order');
Route::get('/order', 'OrderController@index')->name('order.index');
Route::get('/order/show/{id}', 'OrderController@show')->name('order.show');
Route::post('/order/update/{id}', 'OrderController@update')->name('order.update');

// route user/member
Route::get('/data-user', 'DataController@user')->name('data-user');

Route::get('/user', 'UserController@index')->name('user.index');
Route::get('/user/show/{id}', 'UserController@show')->name('user.show');
Route::delete('/user/delete/{id}', 'UserController@destroy')->name('user.destroy');
Route::get('/user/{id}/edit', 'UserController@edit')->name('user.edit');

Route::patch('/user/address/{id}', 'UserController@update_address')->name('user.update_address');

// route profile admin
Route::get('profile', function () {

    $admin = User::role('admin')->where('id', Auth()->user()->id)->first();
    return view('admin.user.admin_profile', compact('admin'));
})->name('profile');
Route::patch('profile/update/{user}', function (Request $request, User $user) {
    $request->validate(
        [
            'name'         => 'required',
            'image'         => 'file|image'
        ]
    );

    if ($request->file('image')) {
        $path = $request->file('image')->store('assets/profil');
        Storage::delete($user->image);
    }
    if ($request->image == null) {
        $path = $user->image;
    }
    User::where('id', $user->id)
        ->update([
            'name'         => $request->name,
            'image'         => $path
        ]);

    return redirect(route('admin.profile'))->with('success', 'Data Profil Berhasil Di Update!!');
})->name('update');


// route export
Route::get('/export', function (OrderDataTable $dataTable) {
    return $dataTable->render('admin.export.index');
})->name('export.index');

// route contact support
Route::get('/data-contact-support', 'DataController@contact_support')->name('data-contact-support');
Route::get('/contact', function () {
    return view('admin.contact.index');
})->name('contact.index');
Route::patch('/contact', function (Request $request) {
    Contact_support::where('id', $request->id)->update([
        'status' => $request->status
    ]);

    return redirect(route('admin.contact.index'))->with('success', 'Your Data has been updated!');
})->name('message.update');

// route change-password
Route::get('change_password', 'UserController@change_password')->name('change_password');
Route::post('update_password', 'UserController@update_password')->name('update_password');
