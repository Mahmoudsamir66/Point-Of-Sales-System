@extends('admin.layouts.includes.master')
@section('content')
    <script src="{{asset('public/assets/jss.js')}}"></script>

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
            <div class="col-md-10">
                <section class="content">
                    <div class="card card-info user-info">
                        <div class="card-header">
                            <h3 class="card-title"><i class="fas fa-book-reader text-primary ml-2"></i> اضافه  فاتوره شراء
                            </h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <div class="col-lg-12">
                            <form action="{{ route('admin.allReport.reportIndex.buy') }}" method="POST" class="form-horizontal"
                            >
                                @csrf
                                <div class="row clearfix" style="margin-top:20px">
                                    <div class="pull-right col-md-4">
                                        <table class="table table-bordered table-hover" id="tab_logic_total">
                                            <tbody>
                                            <tr>
                                            <tr>
                                                <th class="text-center">اسم العميل</th>
                                                <td class="text-center">
                                                    <input required type="text" name='name' class="form-control qty" />

                                                </td>
                                            </tr>
                                            <tr>
                                                <th class="text-center">التاريخ</th>
                                                <td class="text-center">
                                                    <input type="date" name='date' class="form-control qty"
                                                           value='<?php echo date('Y-m-d');?>' />
                                                </td>
                                            </tr>


                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <!------ Include the above in your HEAD tag ---------->
                                <div class="row clearfix">
                                    <div class="col-md-12">
                                        <table class="table table-bordered table-hover" id="tab_logic">
                                            <thead>
                                            <tr>
                                                <th class="text-center"> #</th>
                                                <th class="text-center"> اسم المخزن </th>
                                                <th class="text-center"> اسم المنتج</th>
                                                <th class="text-center"> الكميه</th>
                                                <th class="text-center"> سعر المنتج الواحد</th>
                                                <th class="text-center"> المجموع</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            <tr id='addr0'>
                                                <td>1</td>
                                                <td><select  required class="w-100" name="data[store_id][]">
                                                        <option value="">اختر </option>
                                                        @foreach (\App\Models\Store::get() as $store)

                                                            <option value="{{ $store->id }}">
                                                                {{ $store->name }}</option>

                                                        @endforeach
                                                    </select></td>
                                                <td><select  required class="w-100" name="data[product_id][]">
                                                        <option value="">اختر </option>
                                                        @foreach (\App\Models\Product::get() as $product)

                                                            <option value="{{ $product->id }}">
                                                                {{ $product->name }}</option>

                                                        @endforeach
                                                    </select></td>
                                                <td><input type="number" name='data[count][]' placeholder=' الكميه'
                                                           class="form-control qty" step="0" min="0" /></td>
                                                <td><input type="number" name='data[price][]'
                                                           placeholder='سعر المنتج الواحد' class="form-control price"
                                                           step="0.001" min="0" /></td>
                                                <td><input type="number" name='total[]' placeholder='0.00'
                                                           class="form-control total" readonly /></td>
                                            </tr>
                                            <tr id='addr1'></tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <div class="row clearfix">
                                    <div class="col-md-12">
                                        <a id="add_row" class="btn btn-default pull-left"
                                           style=" background: #2196f3;color: #fff;"><i class="fa fa-plus-circle"></i></a>
                                        <a id='delete_row' class="pull-right btn btn-default"
                                           style=" background: #DC3545;color: #fff;"><i class="fa fa-minus-circle"></i></a>
                                    </div>
                                </div>
                                <div class="row clearfix" style="margin-top:20px">
                                    <div class="pull-right col-md-4">
                                        <table class="table table-bordered table-hover" id="tab_logic_total">
                                            <tbody>
                                            <tr>
                                                <th class="text-center">المجموع الكلي</th>
                                                <td class="text-center"><input type="number" name='sub_total'
                                                                               placeholder='0.00' class="form-control" id="sub_total"
                                                                               readonly /></td>
                                            </tr>
                                            <tr>
                                                <th class="text-center"> الخصم</th>
                                                <td class="text-center">
                                                    <div class="input-group mb-2 mb-sm-0">
                                                        <input type="number" class="form-control" id="tax"
                                                               placeholder="0" name="tax">
                                                        <div class="input-group-addon">%</div>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr hidden>
                                                <th class="text-center">الخصم</th>
                                                <td class="text-center"><input type="number" name='tax_amount'
                                                                               id="tax_amount" placeholder='0.00' class="form-control"
                                                                               readonly /></td>
                                            </tr>
                                            <tr>
                                                <th class="text-center">المجموع بعد الخصم</th>
                                                <td class="text-center"><input type="number" name='total_amount'
                                                                               id="total_amount" placeholder='0.00' class="form-control"
                                                                               readonly /></td>
                                            </tr>

                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <div class="text-center form-button">
                                    <button type="submit" class="btn btn-success "><i class="fa fa-plus fa-fw white"></i>
                                        حفظ
                                    </button>

                                </div>
                            </form>
                        </div>

                    </div>
                </section>


            </div>
        </div>

        <!-- /.content -->
    </div>
    <script>
        $(document).ready(function() {
            var i = 1;
            $("#add_row").click(function() {
                b = i - 1;
                $('#addr' + i).html($('#addr' + b).html()).find('td:first-child').html(i + 1);
                $('#tab_logic').append('<tr id="addr' + (i + 1) + '"></tr>');
                i++;
            });
            $("#delete_row").click(function() {
                if (i > 1) {
                    $("#addr" + (i - 1)).html('');
                    i--;
                }
                calc();
            });

            $('#tab_logic tbody').on('keyup change', function() {
                calc();
            });
            $('#tax').on('keyup change', function() {
                calc_total();
            });


        });

        function calc() {
            $('#tab_logic tbody tr').each(function(i, element) {
                var html = $(this).html();
                if (html != '') {
                    var qty = $(this).find('.qty').val();
                    var price = $(this).find('.price').val();
                    $(this).find('.total').val(qty * price);

                    calc_total();
                }
            });
        }

        function calc_total() {

            total = 0;
            $('.total').each(function() {
                total += parseInt($(this).val());
            });
            $('#sub_total').val(total.toFixed(2));
            tax_sum = 1* $('#tax').val();
            $('#tax_amount').val(tax_sum.toFixed(2));
            $('#total_amount').val(( total-tax_sum ).toFixed(2));
            totall= 1* $('#total_amount').val();
            pushPrice=1* $('#pushPrice').val();
            nolon2= -1* $('#nolon2').val();
            $('#totalAll').val(( totall-pushPrice-nolon2).toFixed(2));
        }
    </script>
@endsection
