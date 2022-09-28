<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Report;
use App\Models\ReportDetail;
use App\Models\ReportDetailBuy;
use App\Models\ReportsBuy;
use App\Models\Store;
use Illuminate\Http\Request;

class AllReportCotroller extends Controller
{
    public function index()
    {


        return view('admin.pages.allReport.index');

    }

    public function reportIndex(Request $request)
    {

        foreach ($request->data['product_id'] as $key => $product) {
            if (Product::where('store_id', $request->data['store_id'][$key])->where('id', $product)->value('count') < $request->data['count'][$key]) {

                return redirect()->route('products.all.index')->with(['error' => Product::where('id', $product)->value('name') . "تاكد من وجود كميه كافيه من"]);

            }

            $productId = Product::where('store_id', $request->data['store_id'][$key])->where('id', $product)->value('count');
            Product::where('id', $product)->update([

                'count' => $productId - $request->data['count'][$key],
            ]);
        }

        $report = Report::create([
            'date' => $request->date,
            'name' => $request->name,
            'user_id' => auth()->user()->id,
            'total' => $request->total_amount,
            'tax' => $request->tax,
        ]);

        foreach ($request->data['product_id'] as $key => $product) {

            ReportDetail::create([
                'report_id' => $report->id,
                'product_id' => $product,
                'store_id' => $request->data['store_id'][$key],
                'price' => $request->data['price'][$key],
                'count' => $request->data['count'][$key],

            ]);
        }

        return redirect()->route('admin.allReport.seller')->with(['success' => " تم  بنجاح"]);

    }

    public function allReport()
    {

        $reports = Report::paginate(10);
        return view('admin.pages.allReport.allReport', compact('reports'));

    }

    public function AllReportShow($id)
    {

        $product = Report::find($id);
        $reports = ReportDetail::where('report_id', $id)->get();
        return view('admin.pages.allReport.AllReportShow', compact('reports', 'product'));

    }

    public function indexBuy()
    {


        return view('admin.pages.allReport.indexBuy');

    }

    public function reportIndexBuy(Request $request)
    {


        $report = ReportsBuy::create([
            'date' => $request->date,
            'name' => $request->name,
            'user_id' => auth()->user()->id,
            'total' => $request->total_amount,
            'tax' => $request->tax,
        ]);

        foreach ($request->data['product_id'] as $key => $product) {

            $productId = Product::where('store_id', $request->data['store_id'][$key])->where('id', $product)->value('count');

            Product::where('id', $product)->update([

                'count' => $productId + $request->data['count'][$key],
                'sellerPrice' => $request->data['price'][$key],
            ]);
            ReportDetailBuy::create([
                'report_id' => $report->id,
                'product_id' => $product,
                'store_id' => $request->data['store_id'][$key],
                'price' => $request->data['price'][$key],
                'count' => $request->data['count'][$key],

            ]);
        }

        return redirect()->route('admin.allReport.seller.buy')->with(['success' => " تم  بنجاح"]);

    }

    public function allReportBuy()
    {

        $reports = ReportsBuy::paginate(10);
        return view('admin.pages.allReport.allReportBuy', compact('reports'));

    }

    public function AllReportShowBuy($id)
    {

        $product = ReportsBuy::find($id);
        $reports = ReportDetailBuy::where('report_id', $id)->get();
        return view('admin.pages.allReport.AllReportShowBuy', compact('reports', 'product'));

    }
}
