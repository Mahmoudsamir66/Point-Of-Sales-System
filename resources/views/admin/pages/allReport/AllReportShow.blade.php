<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!--css file-->
    <link rel="stylesheet" href="{{asset('public/report/css/report.css')}}">
    <link rel="stylesheet" href="{{asset('public/css/charts.min.css')}}">
    <title>report</title>


</head>

<body>
<div class="book">


    <!--start page1-->

    <!--endpage 2-->
    <!--start page3-->
    <div class="page">
        <div class="subpage">
            <!--start header-->
            <div class="header">
                <div class="row">
                    <div class="col header-right ">
                        <p>معرض البركه للادوات الكهربائيه</p>
                        <p>الباجور</p>

                    </div>
{{--                    <div class="col header-center ">--}}
{{--                        <img src="css/images/logo.jpg">--}}
{{--                    </div>--}}
{{--                    <div class="col header-left ">--}}
{{--                        <p>Ministry of Higher Education and <br>Scientific Research <br>Higher Institute of--}}
{{--                            Engineering and Technology <br>Menoufia</p>--}}
{{--                    </div>--}}
                </div>
                <div class="sub-header">
                    <p>الرؤية : " الريادة فى مجال الاجهزه الكهربائيهً "</p>
                </div>
            </div>
            <!--end header-->
            <!--start contain-->
            <div class="contain">
                <p class="title">فاتوره بيع</p>
                <div class="row first-row">

                    <div class=" col">
                        <p>اسم اللمشتري : <span> {{$product->name}}</span></p>

                    </div>

                    <div class="col ">
                        <p>تارخ الفاتوره : <span> {{ Numbers::ShowInArabicDigits(date('d-m-Y', strtotime($product->date)))}}</span></p>
                    </div>
                    <div class="col ">
                        <p>الخصم : <span> {{ Numbers::ShowInArabicDigits($product->tax)}}</span></p>
                    </div>
                </div>
                <table class=" info ">
                    <thead>
                    <tr>
                        <td> م</td>
                        <td>  اسم المخزن</td>
                        <td>  اسم المنتج</td>
                        <td>   العدد</td>
                        <td> السعر </td>
                        <td> اجمالي السعر </td>
                    </tr>
                    </thead>
                    <tbody>
@foreach($reports as $key=> $report)
                    <tr>
                        <td>{{ Numbers::ShowInArabicDigits($key+1)}}</td>
                        <td>{{$report->stores->name}}</td>
                        <td>{{$report->products->name}}</td>
                        <td>{{ Numbers::ShowInArabicDigits($report->count)}}</td>
                        <td>{{ Numbers::ShowInArabicDigits($report->price)}}</td>
                        <td>{{ Numbers::ShowInArabicDigits($report->price * $report->count)}}</td>


                    </tr>

@endforeach
<tr>
                    <tfoot>
                    <tr>
                        <th id="total" colspan="2">الاجمالي :</th>
                        <th colspan="3">{{Numbers::TafqeetMoney($product->total,'EGP')}}</th>
                        <td>{{ Numbers::ShowInArabicDigits($product->total)}}</td>
                    </tr>
                    </tfoot>


</tr>
                    </tbody>
                </table>
            </div>
            <!--end contain-->

            <!--start footer-->
            <div class="footer">
                <div class="row">
                    <div class=" col footer-right">
{{--                        <p> <span>الرسالة:</span> يلتزم المعهد بإعداد خريج مؤهل طبقاً للمعايير القومية--}}
{{--                            الأكاديمية المرجعية محلياً وإقليمياً في العلوم الهندسية يلبي احتياجات سوق العمل--}}
{{--                            وقادرعلي البحث العلمي لخدمة المجتمع وتنمية البيئة في إطار القيم الأخلاقية--}}
{{--                        </p>--}}
                        <p><span>العنوان:</span> جمهورية مصر العربية- محافظة المنوفية- مركز الباجور </p>
                    </div>
{{--                    <div class=" col footer-left">--}}
{{--                        <p>--}}
{{--                            <span>WWW.</span>bie.edu.eg<br>--}}
{{--                            <span>Email:</span> info@ bie.edu.eg<br>--}}
{{--                            <span>tel:</span> 01021840974--}}
{{--                        </p>--}}
{{--                    </div>--}}
                </div>
            </div>
            <!--end footer-->
        </div>
    </div>
    <!--endpage 3-->



</body>

</html>
