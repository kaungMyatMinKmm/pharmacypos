<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <meta name="csrf-token" content="{{ csrf_token() }}">

  <title>Good Health Pharmacy</title>

  <!-- Custom fonts for this template-->
  <link href="{{asset('sb_admin/vendor/fontawesome-free/css/all.min.css')}}" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="{{asset('sb_admin/css/sb-admin-2.min.css')}}" rel="stylesheet">


  <link rel="stylesheet" type="text/css" href="{{asset('css/style.css')}}">

 

  <!-- Custom styles for this page -->
  <link href="{{asset('sb_admin/vendor/datatables/dataTables.bootstrap4.min.css')}}"  rel="stylesheet"> 

</head>

<body id="page-top">

  <!-- Page Wrapper -->
  <div id="wrapper">

    <!-- Sidebar -->
    <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

      <!-- Sidebar - Brand -->
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{route('home')}}">
        <div class="sidebar-brand-icon rotate-n-15">
          <i class="fas fa-plus-circle" style="color:red;"></i>
        </div>
        <div class="sidebar-brand-text mx-3">Good Health</div>
      </a>

@can('crud')
      <!-- Divider -->
      <hr class="sidebar-divider my-0">

      <!-- Nav Item - Dashboard -->
      <li class="nav-item active">
        <a class="nav-link" href="{{route('admin.dashboard.index')}}">
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span>Dashboard</span></a>
      </li>
@endcan


       <li class="nav-item active">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
          <i class="fas fa-fw fa-folder"></i>
          <span>Accounting</span>
        </a>
        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <a class="collapse-item" href="{{route('sales.index')}}"><i class="fas fa-list-alt"></i> <span>Sales List</span> </a>

            @can('crud')
              <a class="collapse-item" href="{{route('admin.stocks.index')}}"><i class="fas fa-list-alt"></i> <span>Stocks List</span> </a>
              <a class="collapse-item" href="{{route('admin.purchases.index')}}"><i class="fas fa-list-alt"></i> <span>Purchases List</span> </a>
            @endcan
          </div>
        </div>
      </li>

      <!-- Divider -->
      <hr class="sidebar-divider">

      <li class="nav-item">
        <a class="nav-link" href="{{route('home')}}">
          <i class="fas fa-cart-plus"></i>
          <span>Start New Sales</span></a>
      </li> 

@can('crud')
      <li class="nav-item">
        <a class="nav-link" href="{{route('admin.users.index')}}">
          <i class="fas fa-users-cog"></i>
          <span>User Management</span></a>
      </li>
@endcan
     

<!--       <li class="nav-item">
        <a class="nav-link" href="{{route('sales.index')}}">
          <i class="fas fa-fw fa-chart-area"></i>
          <span>Sales History</span></a>
      </li> -->



  


      <!-- Divider -->
      <hr class="sidebar-divider d-none d-md-block">

      <!-- Sidebar Toggler (Sidebar) -->
      <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
      </div>

    </ul>
    <!-- End of Sidebar -->

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

      

      <!-- Main Content -->
        <div>
          <!-- Topbar -->
            <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">
              

                 <!-- Topbar Navbar -->
                  <ul class="navbar-nav ml-auto">
                    <!-- Nav Item - User Information -->
                    <li class="nav-item dropdown no-arrow">
                      <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <span class="mr-2 d-none d-lg-inline text-gray-600 small">Login as {{ Auth::user()->name }}</span>
                      </a>
                      <!-- Dropdown - User Information -->
                      <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                       
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                          <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                          Logout
                        </a>
                      </div>
                    </li>

                  </ul>

            </nav>
        </div>
<div class="container">
  @include('noti.alerts')
</div>
@yield('content')

      <!-- End of Main Content -->

      <!-- Footer -->
       <footer class="sticky-footer bg-white">
        <div class="container my-auto">
          <div class="copyright text-center my-auto">
            <span>Copyright &copy; {{now()->year}} All Right Reserved by Kaung Myat Min</span>
          </div>
        </div>
      </footer>
      <!-- End of Footer -->

    </div>
    <!-- End of Content Wrapper -->

  </div>
  <!-- End of Page Wrapper -->

  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

  <!-- Logout Modal-->
  <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
          <a class="btn btn-primary" href="{{route('logout')}}" onclick="event.preventDefault();
                        document.getElementById('logout-form').submit();">Logout</a>


                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
        </div>
      </div>
    </div>
  </div>



  <!-- Bootstrap core JavaScript-->
  <script src="{{asset('sb_admin/vendor/jquery/jquery.min.js')}}"></script>
  <script src="{{asset('sb_admin/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
  <script src="{{asset('js/custom.js')}}"></script>
  <script src="{{asset('js/jquery-datatable/js/jquery.dataTables.min.js')}}"></script>

  <!-- Core plugin JavaScript-->
  <script src="{{asset('sb_admin/vendor/jquery-easing/jquery.easing.min.js')}}"></script>

  <!-- Custom scripts for all pages-->
  <script src="{{asset('sb_admin/js/sb-admin-2.min.js')}}"></script>

   <!-- Page level plugins -->


  <!-- Page level plugins -->
  <script src="{{asset('sb_admin/vendor/chart.js/Chart.min.js')}}"></script>
    <script src="{{asset('sb_admin/vendor/datatables/jquery.dataTables.min.js')}}"></script>
  <script src="{{asset('sb_admin/vendor/datatables/dataTables.bootstrap4.min.js')}}"></script>

  <!-- Page level custom scripts -->
  <script src="{{asset('sb_admin/js/demo/chart-area-demo.js')}}"></script>
  <script src="{{asset('sb_admin/js/demo/chart-pie-demo.js')}}"></script>
@yield('script')
</body>

</html>
