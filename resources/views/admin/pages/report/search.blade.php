@extends('admin.layouts.includes.master')
@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0 text-dark"><i class="fas fa-edit text-info ml-2"></i>  بحث عن منتج</h1>
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
                            <h3 class="card-title"><i class="fas fa-book-reader text-primary ml-2"></i>   بحث عن منتج
                            </h3>
                        </div>
                    @include('admin.layouts.alerts.error')
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form class="form-horizontal" action="{{ route('admin.report.product.search') }}" method="get"
                        >

                            <div class="card-body">

                                <div class="form-group row" >
                                    <label class="col-sm-3 control-label">اختر المخزن</label>
                                    <div class="col-sm-9">
                                        <div class="form-group row">
                                            <div class="col-sm-9">
                                                <input type="text" list="browsers" class="form-control" required id="#" placeholder="اسم المنتج" name="name">
                                            </div>
                                        </div>
                                        <datalist id="browsers">
                                            @foreach($products as $product)
                                                <option value="{{$product->name}}">

                                            @endforeach
                                        </datalist>

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


                <!-- end table -->
            </div>
        </div>

        <!-- /.content -->
    </div>
@endsection
