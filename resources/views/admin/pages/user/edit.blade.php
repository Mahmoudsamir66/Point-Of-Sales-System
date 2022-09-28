@extends('admin.layouts.includes.master')
@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0 text-dark"><i class="fas fa-edit text-info ml-2"></i>  تعديل اسم المستخدم</h1>
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
                            <h3 class="card-title"><i class="fas fa-book-reader text-primary ml-2"></i>تعديل اسم المستخدم
                            </h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form class="form-horizontal" action="{{ route('users.edit.update',$user->id) }}" method="POST"
                              enctype="multipart/form-data">
                            @csrf
                            <div class="card-body">
                                <div class="form-group row">
                                    <label for="" class="col-sm-3 control-label"> اسم المستخدم</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" id="#" value="{{$user->name}}" name="name" required>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="" class="col-sm-3 control-label">  ايميل الدخول</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" id="#" value="{{$user->email}}" name="email" required>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="" class="col-sm-3 control-label">  الباسورد</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" id="#"  name="password" >
                                    </div>
                                </div>
                            </div>
                            <!-- /.card-body -->
                            <div class="card-footer">
                                <button type="submit" class="btn btn-info"><i class="fas fa-user-plus ml-1"></i>
                                </button>
                            </div>
                            <!-- /.card-footer -->
                        </form>
                    </div>

                </section>
            </div>
        </div>
@endsection
