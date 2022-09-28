<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Kind;
use App\Models\Product;
use App\Models\Purchase;
use App\Models\Seller;
use App\Models\Store;
use Illuminate\Http\Request;

class ReportController extends Controller
{
    public function store()
    {
        $stores = Store::get();
        return view('admin.pages.report.store', compact('stores'));
    }

    public function storeShow(Request $request)
    {
        $products = Product::where('store_id', $request->store_id)->orderBy('name')->get();
        return view('admin.pages.report.storeShow', compact('products'));
    }

    public function kind()
    {
        $kinds = Kind::get();
        return view('admin.pages.report.kind', compact('kinds'));
    }

    public function kindShow(Request $request)
    {
        $products = Product::where('kind_id', $request->kind_id)->orderBy('store_id')->get();
        return view('admin.pages.report.kindShow', compact('products'));
    }

    public function kindStore()
    {
        $stores = Store::get();

        $kinds = Kind::get();
        return view('admin.pages.report.kindStore', compact('kinds', 'stores'));
    }

    public function kindStoreShow(Request $request)
    {
        $products = Product::where('kind_id', $request->kind_id)->where('store_id', $request->store_id)->orderBy('name')->get();
        return view('admin.pages.report.kindStoreShow', compact('products'));
    }

    public function time()
    {
        return view('admin.pages.report.time');
    }

    public function timeShow(Request $request)
    {
        $products = Seller::whereDate('created_at', '>=', $request->from)->whereDate('created_at', '<=', $request->to)->get();
        return view('admin.pages.report.timeShow', compact('products'));
    }

    public function timePurchase()
    {
        return view('admin.pages.report.timePurchase');
    }

    public function timePurchaseShow(Request $request)
    {
        $products = Purchase::whereDate('created_at', '>=', $request->from)->whereDate('created_at', '<=', $request->to)->get();
        return view('admin.pages.report.timePurchaseShow', compact('products'));
    }public function search()
    {
        $products =Product::get();
        return view('admin.pages.report.search',compact('products'));
    }

    public function productSearch(Request $request)
    {
        if(Product::where('name',  $request->name)->value('id') == ''){

            return redirect()->route('products.all.index')->with(['error' => "تاكد من بيانات المنتج"]);

        }
        $products = Product::where('name',  $request->name)->get();
        return view('admin.pages.report.productSearch', compact('products'));
    }
}
