<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Kind;
use App\Models\Product;
use App\Models\Store;
use Illuminate\Http\Request;

class ProductController extends Controller
{

    public function index()
    {

        $stores =Store ::orderBy('id')->get();
        $kinds =Kind ::orderBy('id')->get();
        $products =Product ::orderBy('id')->paginate(10);

        return view('admin.pages.product.create', compact('products','kinds','stores'));

    }

    public function edit(Product $product)
    {
        $stores =Store ::orderBy('id')->get();
        $kinds =Kind ::orderBy('id')->get();
        return view('admin.pages.product.edit', compact('product','kinds','stores'));
    }

    public function create()
    {
        return view('admin.pages.product.create');
    }

    public function store(Request $request)
    {

        $store_arr = [];
        foreach ($request->all() as $key => $value) {
            if ($key == '_token') continue;//skip token
            $store_arr[$key] = $value;
        }

        if ($request->hasFile('photo')) {
            $store_arr['photo'] = $request->photo->store('public/product/photo');
        }

        Product ::create($store_arr);
        return redirect()->route('products.all.index')->with(['success' => " تم  بنجاح"]);
    }

    public function update(Request $request, Product $product)
    {

        $update_arr = [];
        foreach ($request->all() as $key => $value) {
            /**
             * 'title' => 'My Title'
             * $key => $value
             */
            if ($key == '_token') continue;//skip token
            $update_arr[$key] = $value;
        }

        if ($request->hasFile('photo')) {
            $update_arr['photo'] = $request->photo->product('public/product/photo');
        }




        $product->update($update_arr);
        return redirect()->route('products.all.index')->with(['success' => " تم  بنجاح"]);
    }

    public function delete(Product $product)
    {

        $product->delete();
        return redirect()->route('products.all.index')->with(['error' => " تم  بنجاح"]);
    }


}



