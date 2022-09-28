<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{ route('home') }}" class="brand-link">
        <img src="{{ asset('public/assets/dist/img/white.png') }}" alt="pos"
             class=" brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">pos</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="{{ asset('public/assets/dist/img/AdminLTELogo.png') }}" class="img-circle elevation-2"
                     alt="User Image">
            </div>
            <div class="info">
                <a href="{{ route('home') }}" class="d-block">
                    {{ auth('web')->user()->name }}
                </a>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
                <li class="nav-item has-treeview menu-open">
                    <a href="{{ route('home') }}" class="nav-link active">
                        <i class="nav-icon fas fa-tachometer-alt "></i>
                        <p>
                            الرئيسيه
                        </p>
                    </a>

                </li>

                <li class="nav-item has-treeview ">
                    <a href="#" class="nav-link ">
                        <i class="fas fa-cogs text-light"></i>
                        <p>
                            الاعدادت العامة

                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">

                        <li class="nav-item has-treeview">
                            <a href="#" class="nav-link">
                                <i class="fas fa-users-cog text-info"></i>
                                <p>
                                    اعدادات المستخدمين
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="{{route('users.all.index')}}" class="nav-link">
                                        <i class="fas fa-user-plus text-primary"></i>
                                        <p>اضافه مستخدم</p>
                                    </a>
                                </li>

                            </ul>
                        </li>
                        <li class="nav-item has-treeview">

                        </li>


                        <li class="nav-item">
                            <a href="{{route('stores.all.index')}}" class="nav-link">
                                <i class="fas fa-server text-primary"></i>
                                <p> المخازن</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('kinds.all.index')}}" class="nav-link">
                                <i class="fas fa-server text-primary"></i>
                                <p> الاصناف</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('products.all.index')}}" class="nav-link">
                                <i class="fas fa-server text-primary"></i>
                                <p> المنتجات</p>
                            </a>
                        </li>
                    </ul>


                <li class="nav-item">
                    <a href="{{route('admin.Purchase.product')}}" class="nav-link">
                        <i class="fas fa-server text-primary"></i>
                        <p> الشراء</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{route('admin.seller.product')}}" class="nav-link">
                        <i class="fas fa-server text-primary"></i>
                        <p> البيع</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{route('admin.product.search')}}" class="nav-link">
                        <i class="fas fa-server text-primary"></i>
                        <p> بحث عن منتج</p>
                    </a>
                </li>

                <li class="nav-item has-treeview ">
                    <a href="#" class="nav-link ">
                        <i class="fas fa-cogs text-light"></i>
                        <p>
                            التقارير

                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{route('admin.report.store')}}" class="nav-link">
                                <i class="fas fa-server text-primary"></i>
                                <p> تقرير مخزن</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('admin.report.kind')}}" class="nav-link">
                                <i class="fas fa-server text-primary"></i>
                                <p> تقرير نوع</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('admin.report.kindStore')}}" class="nav-link">
                                <i class="fas fa-server text-primary"></i>
                                <p> تقرير مخزن ونوع</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('admin.report.time')}}" class="nav-link">
                                <i class="fas fa-server text-primary"></i>
                                <p> تقرير بفتره للبيع</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('admin.report.timePurchase')}}" class="nav-link">
                                <i class="fas fa-server text-primary"></i>
                                <p> تقرير بفتره للشراء</p>
                            </a>
                        </li>
                    </ul>



                   <li class="nav-item has-treeview ">
                <a href="#" class="nav-link ">
                    <i class="fas fa-cogs text-light"></i>
                    <p>
                        الفواتير

                        <i class="fas fa-angle-left right"></i>
                    </p>
                </a>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="{{route('admin.allReport.index')}}" class="nav-link">
                            <i class="fas fa-server text-primary"></i>
                            <p> فاتوره بيع</p>
                        </a>
                    </li> <li class="nav-item">
                        <a href="{{route('admin.allReport.seller')}}" class="nav-link">
                            <i class="fas fa-server text-primary"></i>
                            <p> جميع فواتير البيع</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{route('admin.allReport.index.buy')}}" class="nav-link">
                            <i class="fas fa-server text-primary"></i>
                            <p> فاتوره شراء</p>
                        </a>
                    </li> <li class="nav-item">
                        <a href="{{route('admin.allReport.seller.buy')}}" class="nav-link">
                            <i class="fas fa-server text-primary"></i>
                            <p> جميع فواتير الشراء</p>
                        </a>
                    </li>


                </ul>


                       <!-- /.sidebar --></li>
        </ul>
        </nav>
    </div>
</aside>
