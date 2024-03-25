<!DOCTYPE html>
<html>
<head>
  @include('tenant.partials.head')
</head>
<body class="hold-transition sidebar-mini layout-fixed text-sm">
  <div class="preloader">
  </div>
  <div class="loader"></div>

  <div class="wrapper">

    <!-- Navbar -->
    @include('tenant.partials.nav')
    <!-- /.navbar -->

    <!-- Main Sidebar Container -->
    @include('tenant.partials.sidebar')

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      @yield('breadcrumb')
      <!-- /.content-header -->

      <!-- Main content -->
      <section class="content">
        <div class="container-fluid">
          @include('tenant.partials.validation_errors')
          @yield('content')
          <input type="hidden" id="system_currency" value="{{cache('currency')}}">
        </div><!-- /.container-fluid -->
      </section>
      <!-- /.content -->

    </div>
    <!-- /.content-wrapper -->
    
    <!-- Footer -->
    @include('tenant.partials.footer')
    <!-- /.Footer -->

    <!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-dark">
      <!-- Control sidebar content goes here -->
    </aside>
    <!-- /.control-sidebar -->

  </div>
  <!-- ./wrapper -->

  @include('tenant.partials.scripts')

  @yield('scripts')

</body>
</html>
