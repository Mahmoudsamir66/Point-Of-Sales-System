@extends('admin.layouts.includes.master')
@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0 text-dark"><i class="fas fa-edit text-info ml-2"></i> تقرير بفتره</h1>
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

        <!-- Main content -->
        <div class="row">
            <div class="col-md-8">


                <!-- start table -->
                <table class="table table-hover">
                    <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">اسم المخزن  </th>
                        <th scope="col">اسم الصنف  </th>
                        <th scope="col">اسم المنتج  </th>
                        <th scope="col"> الكميه  </th>
                        <th scope="col"> اسم العميل  </th>
                        <th scope="col">القائم بالشراء   </th>
                        <th scope="col"> تاريخ الشراء   </th>


                    </tr>
                    </thead>
                    <tbody>
                    @foreach($products as  $key=>$product)
                        <tr>
                            <td>{{$key+1}}</td>
                            <td>{{$product->stores->name}}</td>
                            <td>{{$product->kinds->name}}</td>
                            <td>{{$product->products->name	}}</td>
                            <td>{{$product->count}}</td>
                            <td>{{$product->clint}}</td>
                            <td>{{$product->users->name}}</td>
                            <td>{{$product->created_at}}</td>




                        </tr>
                        <tr>
                    @endforeach
                    </tbody>
                    <tr>

                        <th scope="col"> مجموع سعر الشراء </th>
                        <th scope="col">{{$products->sum('price')}}   </th>

                    </tr>
                    <tr>

                        <th scope="col"> عدد المنتجات</th>
                        <th scope="col">{{$products->sum('count')}}   </th>

                    </tr>

                </table>



                <!-- end table -->
            </div>
        </div>

        <!-- /.content -->
    </div>
@endsection
