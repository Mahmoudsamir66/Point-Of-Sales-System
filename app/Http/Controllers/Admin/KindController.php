<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Kind;
use Illuminate\Http\Request;

class KindController extends Controller
{
    public function index()
    {

        $kinds =Kind ::orderBy('id')->paginate(10);
        return view('admin.pages.kind.create', compact('kinds'));

    }

    public function edit(Kind $kind)
    {

        return view('admin.pages.kind.edit', compact('kind'));
    }

    public function create()
    {
        return view('admin.pages.kind.create');
    }

    public function store(Request $request)
    {

        $store_arr = [];
        foreach ($request->all() as $key => $value) {
            if ($key == '_token') continue;//skip token
            $store_arr[$key] = $value;
        }

//        if ($request->hasFile('photo')) {
//            $kind_arr['photo'] = $request->photo->kind('public/kind/photo');
//        }

        Kind ::create($store_arr);
        return redirect()->route('kinds.all.index')->with(['success' => " تم  بنجاح"]);
    }

    public function update(Request $request, Kind $kind)
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
//            $update_arr['photo'] = $request->photo->kind('public/kind/photo');
//        }




        $kind->update($update_arr);
        return redirect()->route('kinds.all.index')->with(['success' => " تم  بنجاح"]);
    }

    public function delete(Kind $kind)
    {

        $kind->delete();
        return redirect()->route('kinds.all.index')->with(['error' => " تم  بنجاح"]);
    }


}


