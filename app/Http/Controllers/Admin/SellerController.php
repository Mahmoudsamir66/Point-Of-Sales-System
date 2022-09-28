<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Purchase;
use App\Models\Seller;
use Illuminate\Http\Request;

class SellerController extends Controller
{
    public function index()
    {
        $sellers = Seller::with('stores')
            ->with('kinds')
            ->with('products')->paginate(10);
        return view('admin.pages.seller.index', compact('sellers'));
    }

    public function ajax($id, $store_id)
    {
        $cities = Product::where('kind_id', $id)->where('store_id', $store_id)
            ->select('name', 'id')->orderBy('name')->get();

        if (!$cities) {

            return redirect()->back()->with(['error' => 'هناك خطا/لايوجد ']);
        }
        return json_encode($cities);
    }

    public function store(Request $request)
    {
        if (Product::where('id', $request->product_id)->value('id') == '') {
            return redirect()->back()->with(['error' => 'لا يوجد منتج ']);
        }
        $count = Product::where('id', $request->product_id)->value('count');
        $sellerPrice = Product::where('id', $request->product_id)->value('sellerPrice');
        $purchasingPrice = Product::where('id', $request->product_id)->value('purchasingPrice');
        if ($request->count > $count) {
            return redirect()->back()->with(['error' => 'الكميه لاتكفي من فضلك راجع المخزن']);
        }
        Product::where('id', $request->product_id)->update([
            'count' => $count - $request->count

        ]);
        Seller::create([
            'count' => $request->count,
            'clint' => $request->clint,
            'store_id' => $request->store_id,
            'kind_id' => $request->kind_id,
            'user_id' => auth()->user()->id,
            'product_id' => $request->product_id,
            'money' => ($request->count * $sellerPrice) - ($request->count * $purchasingPrice),
        ]);
        return redirect()->back()->with(['success' => " تم  بنجاح"]);

    }

    public function indexPurchase()
    {
        $sellers = Purchase::with('stores')
            ->with('kinds')
            ->with('products')->paginate(10);
        return view('admin.pages.seller.purchase', compact('sellers'));
    }


    public function storePurchase(Request $request)
    {
        if (Product::where('id', $request->product_id)->value('id') == '') {
            return redirect()->back()->with(['error' => 'لا يوجد منتج ']);
        }
        $count = Product::where('id', $request->product_id)->value('count');

        Product::where('id', $request->product_id)->update([
            'count' => $count + $request->count,
            'purchasingPrice' => $request->price,

        ]);
        Purchase::create([
            'count' => $request->count,
            'clint' => $request->clint,
            'user_id' => auth()->user()->id,
            'price' => $request->price * $request->count,
            'store_id' => $request->store_id,
            'kind_id' => $request->kind_id,
            'product_id' => $request->product_id,
        ]);
        return redirect()->back()->with(['success' => " تم  بنجاح"]);

    }
}
