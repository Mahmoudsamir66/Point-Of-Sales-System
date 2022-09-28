@extends('admin.layouts.includes.master')
@section('content')
    <script src="{{asset('public/assets/dist/js/jquery.js')}}"></script>


    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0 text-dark"><i class="fas fa-edit text-info ml-2"></i> تحويل من مخزن الى مخزن</h1>
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
                            <h3 class="card-title"><i class="fas fa-book-reader text-primary ml-2"></i> تحويل من مخزن الى مخزن
                            </h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form class="form-horizontal" action="{{ route('admin.trans.from.to.transFromStore') }}" method="get">

                            <div class="card-body">
                                <div class="form-group row">
                                    <label class="col-sm-3 control-label"> اختر المخزن</label>
                                    <div class="col-sm-9">
                                        <select required class="form-control select2 " style="width: 100%;" name="store_id" id="store_id">
                                            <option value="">اختر المخزن</option>

                                            @foreach($stores as $store)
                                                <option value="{{$store->id}}"
                                                >{{$store->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-3 control-label">اختر الصنف</label>
                                    <div class="col-sm-9">
                                        <select required class="form-control select2 " style="width: 100%;" name="kind_id" id="kind_id">
                                            <option value="">اختر الصنف</option>

                                            @foreach(\App\Models\Kind::get() as $kind)
                                                <option value="{{$kind->id}}"
                                                >{{$kind->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-3 control-label"> المنتج</label>
                                    <div class="col-sm-9">
                                        <select required class="form-control select2 " style="width: 100%;" name="product_id" id="product_id">

                                            <option value=""> المنتج</option>

                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="" class="col-sm-3 control-label">الكميه</label>
                                    <div class="col-sm-9">
                                        <input type="number" class="form-control" id="#" placeholder="الكميه "
                                               name="count" required>
                                    </div>
                                </div>
                                <br>
                                <div class="form-group row">
                                    <label class="col-sm-3 control-label" style="color: red"> اختر المخزن المحول اليه</label>
                                    <div class="col-sm-9">
                                        <select required class="form-control select2 " style="width: 100%;" name="store_id2" id="store_id">
                                            <option value="" >اختر المخزن</option>

                                            @foreach($stores as $store)
                                                <option value="{{$store->id}}"
                                                >{{$store->name}}</option>
                                            @endforeach
                                        </select>
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



    <script type="text/javascript">
        $(document).ready(function () {
            $('select[name="kind_id"]').on('change', function () {
                var stateID = $(this).val();
                var csrf = $('meta[name="csrf-token"]').attr('content');

                var route = '{{route('admin.store.kind.ajax',['id' => ':id','store_id' => ':store_id'])}}';
                route = route.replace(':id', stateID).replace(':store_id', $('#store_id option:selected').val())

                if (stateID) {
                    $.ajax({
                        beforeSend: function (x) {
                            return x.setRequestHeader('X-CSRF-TOKEN', csrf);
                        },
                        url: route,
                        type: "GET",
                        dataType: "json",
                        success: function (data) {
                            $('#product_id').empty();
                            $.each(data, function (key, value) {
                                $('#product_id').append($('<option> ', {
                                    value: value.id,
                                    text: value.name,
                                }));
                            });
                            $('#product_id').trigger('change');

                        }
                    });
                } else {
                    $('select[name="product"]').empty();
                }
            });
        });
    </script>


@endsection
