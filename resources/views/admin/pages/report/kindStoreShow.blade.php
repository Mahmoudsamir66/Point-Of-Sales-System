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

        <!-- Main content -->
        <div class="row">
            <div class="col-md-8">


                <!-- start table -->
                <table class="table table-hover">
                    <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">اسم المنتج  </th>
                        <th scope="col"> الكميه  </th>
                        <th scope="col">سعر الشراء  </th>
                        <th scope="col">سعر البيع  </th>
                        <th scope="col"> مكان التخزين  </th>
                        <th scope="col"> العمليات   </th>


                    </tr>
                    </thead>
                    <tbody>
                    @foreach($products as  $key=>$product)
                        <tr>


                            <td>{{$key+1}}</td>
                            <td>{{$product->name}}</td>
                            <td>{{$product->count}}</td>
                            <td>{{$product->purchasingPrice	}}</td>
                            <td>{{$product->sellerPrice}}</td>
                            <td>{{$product->storePlace}}</td>

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


                <!-- end table -->
            </div>
        </div>

        <!-- /.content -->
    </div>
@endsection
