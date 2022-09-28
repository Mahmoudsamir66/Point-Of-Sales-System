@extends('admin.layouts.includes.master')
@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0 text-dark"><i class="fas fa-edit text-info ml-2"></i> الفواتير</h1>
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



                <!-- start table -->
                <table class="table table-hover">
                    <thead>
                    <tr>
                        <th scope="col">رقم الفاتورا</th>

                        <th scope="col">اسم صاحب الفاتورا</th>
                        <th scope="col">اسم القائم بالفاتور</th>

                        <th scope="col">تاريخ الفاتورا</th>


                        <th scope="col">عرض</th>

                    </tr>
                    </thead>
                    <tbody>
                    @foreach($reports as  $key=>$report)
                        <tr>
                            <td>{{$report->id}}</td>
                            <td>{{$report->name}}</td>

                            <td>{{$report->users->name}}</td>
                            <td>{{$report->date}}</td>
                            <td><a href="{{route('reports.all.show',$report->id)}}" class="btn btn-warning"><i
                                        class="far fa-eye ml-1"></i>عرض </a></td>



                        </tr>
                        <tr>
                    @endforeach
                    </tbody>
                </table>

                <div class="col-md-4">{{ $reports->render("pagination::bootstrap-4") }}</div>
                <!-- end table -->
            </div>

        </div>

        <!-- /.content -->
    </div>
@endsection
