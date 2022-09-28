<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::get('/admin/login', [\App\Http\Controllers\Admin\LoginController::class, 'getLogin'])->name('admin.login');

Route::group(['middleware' => 'web'], function () {
    Route::post('/admin/login', [\App\Http\Controllers\Admin\LoginController::class, 'login'])->name('admin.login.post');
    Route::get('/logout', [\App\Http\Controllers\Admin\LoginController::class, 'logout'])->name('admin.logout');
});
Route::group(['middleware' => 'MustBeLogin'], function () {
    Route::get('/', [\App\Http\Controllers\Admin\HomeController::class, 'home'])->name('home');
/////store
    Route::group(['prefix' => 'stores', 'as' => 'stores.'], function () {
        //create /
        Route::group(['prefix' => 'create', 'as' => 'create.'], function () {
            Route::get('/', ['as' => 'index', 'uses' => '\App\Http\Controllers\Admin\StoreController@create']);
            Route::post('/', ['as' => 'store', 'uses' => '\App\Http\Controllers\Admin\StoreController@store']);
        });
        //edit / update
        Route::group(['prefix' => 'edit', 'as' => 'edit.'], function () {
            Route::get('/stores/{store}', ['as' => 'index', 'uses' => '\App\Http\Controllers\Admin\StoreController@edit']);
            Route::post('/stores/{store}', ['as' => 'update', 'uses' => '\App\Http\Controllers\Admin\StoreController@update']);
        });
        //show stores
        Route::group(['prefix' => 'all', 'as' => 'all.'], function () {
            Route::get('/', ['as' => 'index', 'uses' => '\App\Http\Controllers\Admin\StoreController@index']);

            Route::get('data', ['as' => 'data', 'uses' => '\App\Http\Controllers\Admin\StoreController@data']); //.data
        });

        Route::get('/stores/{store}', ['as' => 'delete', 'uses' => '\App\Http\Controllers\Admin\StoreController@delete']);
    });
    /////user
    Route::group(['prefix' => 'users', 'as' => 'users.'], function () {
        //create /
        Route::group(['prefix' => 'create', 'as' => 'create.'], function () {
            Route::get('/', ['as' => 'index', 'uses' => '\App\Http\Controllers\Admin\UserController@create']);
            Route::post('/', ['as' => 'store', 'uses' => '\App\Http\Controllers\Admin\UserController@store']);
        });
        //edit / update
        Route::group(['prefix' => 'edit', 'as' => 'edit.'], function () {
            Route::get('/users/{user}', ['as' => 'index', 'uses' => '\App\Http\Controllers\Admin\UserController@edit']);
            Route::post('/users/{user}', ['as' => 'update', 'uses' => '\App\Http\Controllers\Admin\UserController@update']);
        });
        //show users
        Route::group(['prefix' => 'all', 'as' => 'all.'], function () {
            Route::get('/', ['as' => 'index', 'uses' => '\App\Http\Controllers\Admin\UserController@index']);

            Route::get('data', ['as' => 'data', 'uses' => '\App\Http\Controllers\Admin\UserController@data']); //.data
        });

        Route::get('/users/{user}', ['as' => 'delete', 'uses' => '\App\Http\Controllers\Admin\UserController@delete']);
    });
    /////kind
    Route::group(['prefix' => 'kinds', 'as' => 'kinds.'], function () {
        //create /
        Route::group(['prefix' => 'create', 'as' => 'create.'], function () {
            Route::get('/', ['as' => 'index', 'uses' => '\App\Http\Controllers\Admin\KindController@create']);
            Route::post('/', ['as' => 'store', 'uses' => '\App\Http\Controllers\Admin\KindController@store']);
        });
        //edit / update
        Route::group(['prefix' => 'edit', 'as' => 'edit.'], function () {
            Route::get('/kinds/{kind}', ['as' => 'index', 'uses' => '\App\Http\Controllers\Admin\KindController@edit']);
            Route::post('/kinds/{kind}', ['as' => 'update', 'uses' => '\App\Http\Controllers\Admin\KindController@update']);
        });
        //show kinds
        Route::group(['prefix' => 'all', 'as' => 'all.'], function () {
            Route::get('/', ['as' => 'index', 'uses' => '\App\Http\Controllers\Admin\KindController@index']);

            Route::get('data', ['as' => 'data', 'uses' => '\App\Http\Controllers\Admin\KindController@data']); //.data
        });

        Route::get('/kinds/{kind}', ['as' => 'delete', 'uses' => '\App\Http\Controllers\Admin\KindController@delete']);
    });
    //////product
    Route::group(['prefix' => 'products', 'as' => 'products.'], function () {
        //create /
        Route::group(['prefix' => 'create', 'as' => 'create.'], function () {
            Route::get('/', ['as' => 'index', 'uses' => '\App\Http\Controllers\Admin\ProductController@create']);
            Route::post('/', ['as' => 'store', 'uses' => '\App\Http\Controllers\Admin\ProductController@store']);
        });
        //edit / update
        Route::group(['prefix' => 'edit', 'as' => 'edit.'], function () {
            Route::get('/products/{product}', ['as' => 'index', 'uses' => '\App\Http\Controllers\Admin\ProductController@edit']);
            Route::post('/products/{product}', ['as' => 'update', 'uses' => '\App\Http\Controllers\Admin\ProductController@update']);
        });
        //show products
        Route::group(['prefix' => 'all', 'as' => 'all.'], function () {
            Route::get('/', ['as' => 'index', 'uses' => '\App\Http\Controllers\Admin\ProductController@index']);

            Route::get('data', ['as' => 'data', 'uses' => '\App\Http\Controllers\Admin\ProductController@data']); //.data
        });

        Route::get('/products/{product}', ['as' => 'delete', 'uses' => '\App\Http\Controllers\Admin\ProductController@delete']);
    });


//////بيع
    Route::get('/admin/seller/product', [\App\Http\Controllers\Admin\SellerController::class, 'index'])->name('admin.seller.product');
    Route::get('/admin/seller/store/price/{id?}/{store_id?}', [\App\Http\Controllers\Admin\SellerController::class, 'ajax'])->name('admin.store.kind.ajax');
    Route::post('/admin/sell/product', [\App\Http\Controllers\Admin\SellerController::class, 'store'])->name('admin.seller.product.store');
/////////شراء//////////
    Route::get('/admin/purchase/product', [\App\Http\Controllers\Admin\SellerController::class, 'indexPurchase'])->name('admin.Purchase.product');
    Route::post('/admin/purchase/product', [\App\Http\Controllers\Admin\SellerController::class, 'storePurchase'])->name('admin.Purchase.product.store');
    /////التقارير///////

    Route::get('/admin/report/store', [\App\Http\Controllers\Admin\ReportController::class, 'store'])->name('admin.report.store');
    Route::get('/admin/report/store/show', [\App\Http\Controllers\Admin\ReportController::class, 'storeShow'])->name('admin.report.store.show');


    Route::get('/admin/report/kind', [\App\Http\Controllers\Admin\ReportController::class, 'kind'])->name('admin.report.kind');
    Route::get('/admin/report/kind/show', [\App\Http\Controllers\Admin\ReportController::class, 'kindShow'])->name('admin.report.kind.show');

    Route::get('/admin/report/kindStore', [\App\Http\Controllers\Admin\ReportController::class, 'kindStore'])->name('admin.report.kindStore');
    Route::get('/admin/report/kindStore/show', [\App\Http\Controllers\Admin\ReportController::class, 'kindStoreShow'])->name('admin.report.kindStore.show');

    Route::get('/admin/report/time', [\App\Http\Controllers\Admin\ReportController::class, 'time'])->name('admin.report.time');
    Route::get('/admin/report/time/show', [\App\Http\Controllers\Admin\ReportController::class, 'timeShow'])->name('admin.report.time.show');


    Route::get('/admin/report/timePurchase', [\App\Http\Controllers\Admin\ReportController::class, 'timePurchase'])->name('admin.report.timePurchase');
    Route::get('/admin/report/timePurchase/show', [\App\Http\Controllers\Admin\ReportController::class, 'timePurchaseShow'])->name('admin.report.timePurchase.show');


    Route::get('/admin/product/search', [\App\Http\Controllers\Admin\ReportController::class, 'search'])->name('admin.product.search');
    Route::get('/admin/report/product/search', [\App\Http\Controllers\Admin\ReportController::class, 'productSearch'])->name('admin.report.product.search');
/////////////
    Route::get('/admin/allReport/index', [\App\Http\Controllers\Admin\AllReportCotroller::class, 'index'])->name('admin.allReport.index');
    Route::post('/admin/allReport/index/show/', [\App\Http\Controllers\Admin\AllReportCotroller::class, 'reportIndex'])->name('admin.allReport.reportIndex');
    Route::get('/admin/all/Report/sell/show/', [\App\Http\Controllers\Admin\AllReportCotroller::class, 'AllReport'])->name('admin.allReport.seller');
    Route::get('/admin/all/Report/seller/{id?}', [\App\Http\Controllers\Admin\AllReportCotroller::class, 'AllReportShow'])->name('reports.all.show');
/////////////

    Route::get('/admin/allReport/index/buy', [\App\Http\Controllers\Admin\AllReportCotroller::class, 'indexBuy'])->name('admin.allReport.index.buy');
    Route::post('/admin/allReport/index/show/buy', [\App\Http\Controllers\Admin\AllReportCotroller::class, 'reportIndexBuy'])->name('admin.allReport.reportIndex.buy');
    Route::get('/admin/all/Report/sell/show/buy', [\App\Http\Controllers\Admin\AllReportCotroller::class, 'AllReportBuy'])->name('admin.allReport.seller.buy');
    Route::get('/admin/all/Report/seller/buy/{id?}', [\App\Http\Controllers\Admin\AllReportCotroller::class, 'AllReportShowBuy'])->name('reports.all.show.buy');


});
