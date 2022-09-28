<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Store;
use Illuminate\Http\Request;

class StoreController extends Controller
{

    public function index()
    {

        $stores =Store ::orderBy('id')->paginate(10);
        return view('admin.pages.store.create', compact('stores'));

    }

    public function edit(Store $store)
    {

        return view('admin.pages.store.edit', compact('store'));
    }

    public function create()
    {
        return view('admin.pages.store.create');
    }

    public function store(Request $request)
    {

        $store_arr = [];
        foreach ($request->all() as $key => $value) {
            if ($key == '_token') continue;//skip token
            $store_arr[$key] = $value;
        }

//        if ($request->hasFile('photo')) {
//            $store_arr['photo'] = $request->photo->store('public/store/photo');
//        }

        Store ::create($store_arr);
        return redirect()->route('stores.all.index')->with(['success' => " تم  بنجاح"]);
    }

    public function update(Request $request, Store $store)
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

//        if ($request->hasFile('photo')) {
//            $update_arr['photo'] = $request->photo->store('public/store/photo');
//        }




        $store->update($update_arr);
        return redirect()->route('stores.all.index')->with(['success' => " تم  بنجاح"]);
    }

    public function delete(Store $store)
    {

        $store->delete();
        return redirect()->route('stores.all.index')->with(['error' => " تم  بنجاح"]);
    }


}


