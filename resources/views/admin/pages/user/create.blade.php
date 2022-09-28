@extends('admin.layouts.includes.master')
@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0 text-dark"><i class="fas fa-edit text-info ml-2"></i> المستخدمين</h1>
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
                            <h3 class="card-title"><i class="fas fa-book-reader text-primary ml-2"></i> اضافه  المستخدمين
                            </h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form class="form-horizontal" action="{{ route('users.create.store') }}" method="POST"
                            enctype="multipart/form-data">
                            @csrf
                            <div class="card-body">

                                <div class="form-group row">
                                    <label for="" class="col-sm-3 control-label"> اسم المستخدم</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" id="#" placeholder="اسم المستخدم" name="name" required>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="" class="col-sm-3 control-label">  ايميل الدخول</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" id="#" placeholder="اايميل الدخول" name="email" required>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="" class="col-sm-3 control-label">  الباسورد</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" id="#" placeholder="password" name="password" required>
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
                        <th scope="col">اسم المستخدم  </th>
                        <th scope="col"> ايميل الدخول  </th>

                        <th scope="col">العمليات</th>

                    </tr>
                    </thead>
                    <tbody>
                    @foreach($users as  $key=>$user)
                        <tr>
                            <td>{{$key+1}}</td>
                            <td>{{$user->name}}</td>
                            <td>{{$user->email}}</td>




                            <td>
                                <a  href="{{route('users.edit.index',$user->id)}}" class="btn btn-warning"><i class="far fa-edit ml-1"></i>تعديل </a>
                                <a type="submit" onclick="return confirm('هل انت متاكد من حذف هذا العنصر')"  href="{{route('users.delete',$user->id)}}" class="btn btn-danger"><i class="fas fa-trash-alt ml-1"></i></i>حذف </a>
                            </td>
                        </tr>
                        <tr>
                    @endforeach
                    </tbody>
                </table>

                <div class="col-md-4">{{ $users->render("pagination::bootstrap-4") }}</div>

                <!-- end table -->
            </div>
        </div>

        <!-- /.content -->
    </div>
@endsection
