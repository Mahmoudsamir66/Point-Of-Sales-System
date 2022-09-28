<!DOCTYPE html>
<html>
@include('admin.layouts.includes.header')
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

  <!-- Navbar -->
  @include('admin.layouts.includes.navbar')
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  
  @include('admin.layouts.includes.sidebar')

@yield('content')
  <!-- Content Wrapper. Contains page content -->

  <!-- /.content-wrapper -->
  @include('admin.layouts.includes.footer')

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->

</body>
</html>
