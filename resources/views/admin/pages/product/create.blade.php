@extends('admin.layouts.includes.master')
@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0 text-dark"><i class="fas fa-edit text-info ml-2"></i> المنتجات</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Dashboard v1</li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->
    @include('admin.layouts.alerts.success')
    @include('admin.layouts.alerts.error')
    <!-- Main content -->
        <div class="row">
            <div class="col-md-8">
                <section class="content">
                    <div class="card card-info user-info">
                        <div class="card-header">
                            <h3 class="card-title"><i class="fas fa-book-reader text-primary ml-2"></i> اضافه منتج
                            </h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form class="form-horizontal" action="{{ route('products.create.store') }}" method="POST"
                              enctype="multipart/form-data">
                            @csrf
                            <div class="card-body">
                                <div class="form-group row" >
                                    <label class="col-sm-3 control-label">اختر المخزن</label>
                                    <div class="col-sm-9">
                                        <select required class="form-control select2 " style="width: 100%;" name="store_id">
                                            <option value=""
                                            >اختر المخزن</option>
                                            @foreach($stores as $store)
                                                <option value="{{$store->id}}"
                                                      >{{$store->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row" >
                                    <label class="col-sm-3 control-label">اختر الصنف</label>
                                    <div class="col-sm-9">
                                        <select required class="form-control select2 " style="width: 100%;" name="kind_id">
                                            <option value=""
                                            >اختر الصنف</option>
                                            @foreach($kinds as $kind)
                                                <option value="{{$kind->id}}"
                                                >{{$kind->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="" class="col-sm-3 control-label"> اسم المنتج</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" id="#" placeholder="تلاجه توشيبا"
                                               name="name" required>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="" class="col-sm-3 control-label">الكميه</label>
                                    <div class="col-sm-9">
                                        <input type="number" class="form-control" id="#" placeholder="50"
                                               name="count" required>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="" class="col-sm-3 control-label">مكان التخزين</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" id="#" placeholder="الجانب الايمن"
                                               name="storePlace" required>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="" class="col-sm-3 control-label">سعر الشراء للمنتج الواحد</label>
                                    <div class="col-sm-9">
                                        <input type="number" class="form-control" id="#" placeholder=" 1000"
                                               name="purchasingPrice" step=".01" >
                                    </div>
                                </div> <div class="form-group row">
                                    <label for="" class="col-sm-3 control-label">سعر البيع للمنتج الواحد</label>
                                    <div class="col-sm-9">
                                        <input type="number" class="form-control" id="#"  step=".01"  placeholder="ا1500"
                                               name="sellerPrice" required >
                                    </div>
                                </div><div class="form-group row">
                                    <label for="" class="col-sm-3 control-label">كود التخزين</label>
                                    <div class="col-sm-9">
                                        <input type="number" class="form-control" id="#"  step=".01"  placeholder="ab101"
                                               name="code"  >
                                    </div>
                                </div><div class="form-group row">
                                    <label for="" class="col-sm-3 control-label">صوره المنتج</label>
                                    <div class="col-sm-9">
                                        <input type="file" class="form-control" id="#"
                                               name="photo"  >
                                    </div>
                                </div>
                            </div>
                            <!-- /.card-body -->
                            <div class="card-footer">
                                <button type="submit" class="btn btn-info"><i class="fas fa-check ml-1"></i>
                                </button>
                            </div>

                            <!-- /.card-footer -->
                        </form>

                    </div>
                </section>


                <!-- start table -->
                <table class="table table-hover">
                    <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">اسم المخزن</th>

                        <th scope="col">اسم الصنف</th>

                        <th scope="col">اسم المنتج</th>
                        <th scope="col">العدد </th>
                        <th scope="col">سعر البيع</th>

                        <th scope="col">العمليات</th>

                    </tr>
                    </thead>
                    <tbody>
                    @foreach($products as  $key=>$product)
                        <tr>
                            <td>{{$key+1}}</td>
                            <td>{{$product->stors->name}}</td>
                            <td>{{$product->kinds->name}}</td>
                            <td>{{$product->name}}</td>
                            <td>{{$product->count}}</td>
                            <td>{{$product->sellerPrice}}</td>


                            <td>
                                <a href="{{route('products.edit.index',$product->id)}}" class="btn btn-warning"><i
                                        class="far fa-edit ml-1"></i>تعديل </a>
                                <a type="submit" href="{{route('products.delete',$product->id)}}"
                                   class="btn btn-danger" onclick="return confirm('هل انت متاكد من حذف هذا العنصر')" ><i class="fas fa-trash-alt ml-1"></i></i>حذف </a>
                            </td>
                        </tr>
                        <tr>
                    @endforeach
                    </tbody>
                </table>

                <div class="col-md-4">{{ $products->render("pagination::bootstrap-4") }}</div>
                <!-- end table -->
            </div>

        </div>

        <!-- /.content -->
    </div>
@endsection
