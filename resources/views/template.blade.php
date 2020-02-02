<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="x-ua-compatible" content="ie=edge">

  <title>Camtel Operation Manager</title>

  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="{!! asset('plugins/fontawesome-free/css/all.min.css') !!}">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="{!! asset('plugins/overlayScrollbars/css/OverlayScrollbars.min.css') !!}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{!! asset('dist/css/adminlte.min.css') !!}">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
  <!-- DataTables -->
  <link rel="stylesheet" href="{!! asset('plugins/datatables-bs4/css/dataTables.bootstrap4.css') !!}">
  <!-- Ionicons -->
 <!--  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css"> -->
  <!-- daterange picker -->
  <link rel="stylesheet" href="{!! asset('plugins/daterangepicker/daterangepicker.css') !!}">

  @toastr_css
</head>
<body class="hold-transition sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed') !!}">
<div class="wrapper">
  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#"><i class="fas fa-bars"></i></a>
      </li>
    <!--   <li class="nav-item d-none d-sm-inline-block">
        <a href="index3.html" class="nav-link">Home</a>
      </li> -->
   <!--    <li class="nav-item d-none d-sm-inline-block">
        <a href="#" class="nav-link">Contact</a>
      </li> -->
    </ul>

    <!-- SEARCH FORM -->
  <!--   <form class="form-inline ml-3">
      <div class="input-group input-group-sm">
        <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
        <div class="input-group-append">
          <button class="btn btn-navbar" type="submit">
            <i class="fas fa-search"></i>
          </button>
        </div>
      </div>
    </form> -->

    <!-- Right navbar links -->
   
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="/" class="brand-link">
      <img src="{!! asset('dist/img/logo-camtel.jpg') !!}" alt="Camtel Operation Manager" class="brand-image img-circle elevation-3"
           style="opacity: .8">
      <span class="brand-text font-weight-light">COM</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
     <!--  <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">Alexander Pierce</a>
        </div>
      </div> -->

      <!-- Sidebar Menu -->
      <nav class="mt-2">
          <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <li class="nav-item">
            <a href="/" class="nav-link">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
              </p>
            </a>
          </li>
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item">
            <a href="{{ route('equipes.index') }}" class="nav-link">
              <i class="fas fa-user-friends"></i>
              <p>
                Equipes
              </p>
            </a>
          </li>

          <li class="nav-item">
            <a href="{{ route('personnels.index') }}" class="nav-link">
            <i class="fas fa-user-tie"></i>
              <p>
                Personnels
              </p>
            </a>
          </li>

          <li class="nav-item">
            <a href="{{ route('derangements.index') }}" class="nav-link">
             <i class="fas fa-tasks"></i>
              <p>
                Derangements
              </p>
            </a>
          </li>

          <li class="nav-item">
            <a href="installations" class="nav-link">
            <i class="fas fa-home"></i>
              <p>
                Installations
              </p>
            </a>
          </li>

          <li class="nav-item">
            <a href="pages/widgets.html" class="nav-link">
              <i class="fab fa-leanpub"></i>
              <p>
                Etudes
              </p>
            </a>
          </li>

          <li class="nav-item">
            <a href="{{ route('resiliations.index') }}" class="nav-link">
             <i class="far fa-stop-circle"></i>
              <p>
                Résiliations
              </p>
            </a>
          </li>

          <li class="nav-item">
            <a href="{{ route('instances.index') }}" class="nav-link">
              <i class="fas fa-thumbtack"></i>
              <p>
                Instances
              </p>
            </a>
          </li>

          <li class="nav-item">
            <a href="{{ route('notes.index') }}" class="nav-link">
             <i class="fas fa-thumbtack"></i>
              <p>
                Notes
              </p>
            </a>
          </li>

          <li class="nav-item">
            <a href="" class="nav-link">
             <i class="fas fa-database"></i>
              <p>
                Reporting
              </p>
            </a>
          </li>
        
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">@yield('titre') | COD </h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">@yield('titre')</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    @yield('contenu')
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->

  <!-- Main Footer -->
  <footer class="main-footer">
    <strong>Copyright &copy; 2018-2019 <a href="">Camtel</a>.</strong>
    All rights reserved.
    <div class="float-right d-none d-sm-inline-block">
      <b>Version</b> 1.0
    </div>
  </footer>
</div>
<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->
<!-- jQuery -->
<script src="{!! asset('plugins/jquery/jquery.min.js') !!}"></script>
<!-- Bootstrap -->
<script src="{!! asset('plugins/bootstrap/js/bootstrap.bundle.min.js') !!}"></script>
<!-- overlayScrollbars -->
<script src="{!! asset('plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js') !!}"></script>
<!-- AdminLTE App -->
<script src="{!! asset('dist/js/adminlte.js') !!}"></script>

<!-- OPTIONAL SCRIPTS -->
<script src="{!! asset('dist/js/demo.js') !!}"></script>

<!-- PAGE PLUGINS -->
<!-- jQuery Mapael -->
<script src="{!! asset('plugins/jquery-mousewheel/jquery.mousewheel.js') !!}"></script>
<script src="{!! asset('plugins/raphael/raphael.min.js') !!}"></script>
<script src="{!! asset('plugins/jquery-mapael/jquery.mapael.min.js') !!}"></script>
<script src="{!! asset('plugins/jquery-mapael/maps/usa_states.min.js') !!}"></script>
<!-- ChartJS -->
<script src="{!! asset('plugins/chart.js/Chart.min.js') !!}"></script>

<!-- PAGE SCRIPTS -->
<script src="{!! asset('dist/js/pages/dashboard2.js') !!}"></script>
<!-- date-range-picker -->
<script src="{!! asset('plugins/daterangepicker/daterangepicker.js') !!}"></script>
 @jquery
    @toastr_js
    @toastr_render
<!-- page script -->
<script>
  $(function () {
    $("#example1").DataTable();
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
    });
  });

 $('#date').daterangepicker({
      timePicker: false,
      timePickerIncrement: 30,
      locale: {
        format: 'MM/DD/YYYY'
      }
    });
  
</script>


<!-- DataTables -->
<script src="{!! asset('plugins/datatables/jquery.dataTables.js') !!}"></script>
<script src="{!! asset('plugins/datatables-bs4/js/dataTables.bootstrap4.js') !!}"></script>

 @yield('javascripts')

</body>
</html>
