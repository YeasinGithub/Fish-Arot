<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from codervent.com/rocker/demo/index5.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 08 Oct 2020 10:50:20 GMT -->
<head>
  <meta charset="utf-8"/>
  <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"/>
  <meta name="description" content=""/>
  <meta name="author" content=""/>
  <title>মৎস্য আড়ৎ</title>
  <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
  <!--favicon-->
  <link rel="icon" href="{{asset('Admin/assets/images/favicon.ico')}}" type="image/x-icon"/>

  <!-- yeasin -->
  <link href="{{asset('Admin/assets/plugins/select2/css/select2.min.css')}}" rel="stylesheet" />


  <!-- Vector CSS -->
  <link rel="stylesheet" href="{{asset('Admin/assets/plugins/vectormap/jquery-jvectormap-2.0.2.css')}}"/>
  <!-- simplebar CSS-->
  <link rel="stylesheet" href="{{asset('Admin/assets/plugins/simplebar/css/simplebar.css')}}"/>
  <!-- Bootstrap core CSS-->
  <link href="{{asset('Admin/assets/css/bootstrap.min.css')}}" rel="stylesheet"/>

  <!--Yeasin data & button -->
  <link href="{{asset('Admin/assets/plugins/bootstrap-datatable/css/dataTables.bootstrap4.min.css')}}" rel="stylesheet">
  <link href="{{asset('Admin/assets/plugins/bootstrap-datatable/css/buttons.bootstrap4.min.css')}}" rel="stylesheet">

  <!-- animate CSS-->
  <link href="{{asset('Admin/assets/css/animate.css')}}" rel="stylesheet" type="text/css"/>
  <!-- Icons CSS-->
  <link href="{{asset('Admin/assets/css/icons.css')}}" rel="stylesheet" type="text/css"/>
  <!-- Sidebar CSS-->
  <link href="{{asset('Admin/assets/css/sidebar-menu.css')}}" rel="stylesheet"/>
  <!-- Custom Style-->
  <link href="{{asset('Admin/assets/css/app-style.css')}}" rel="stylesheet"/>

  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.22/css/jquery.dataTables.css">
  
  @yield('styles')
  
</head>

<body>

<!-- Start wrapper-->
 <div id="wrapper">
 
  <!--Start sidebar-wrapper-->
   @include('Admin.Include.sidebar')
   <!--End sidebar-wrapper-->

<!--Start topbar header-->
@include('Admin.Include.header')
<!--End topbar header-->

<div class="clearfix"></div>
  @yield('content')
  <!--End content-wrapper-->
   <!--Start Back To Top Button-->
    <a href="javaScript:void();" class="back-to-top"><i class="fa fa-angle-double-up"></i> </a>
    <!--End Back To Top Button-->
  
  <!--Start footer-->
  <footer class="footer">
      <div class="container">
        <div class="text-center">
          কপিরাইট © ২০২০ মাছের আড়ৎ
        </div>
      </div>
    </footer>
  <!--End footer-->
  
   
  </div><!--End wrapper-->

  <!-- Bootstrap core JavaScript-->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <!-- <script src="{{asset('Admin/assets/js/jquery.min.js')}}"></script> -->
  <script src="{{asset('Admin/assets/js/popper.min.js')}}"></script>
  <script src="{{asset('Admin/assets/js/bootstrap.min.js')}}"></script>
  
  <!-- simplebar js -->
  <script src="{{asset('Admin/assets/plugins/simplebar/js/simplebar.js')}}"></script>

  
  <!-- waves effect js -->
  <script src="{{asset('Admin/assets/js/waves.js')}}"></script>
  <!-- sidebar-menu js -->
  <script src="{{asset('Admin/assets/js/sidebar-menu.js')}}"></script>
  <!-- Custom scripts -->
  <script src="{{asset('Admin/assets/js/app-script.js')}}"></script>
  
  <!-- Vector map JavaScript -->
  <script src="{{asset('Admin/assets/plugins/vectormap/jquery-jvectormap-2.0.2.min.js')}}"></script>
  <script src="{{asset('Admin/assets/plugins/vectormap/jquery-jvectormap-world-mill-en.js')}}"></script>
  <!-- Chart js -->
  <script src="{{asset('Admin/assets/plugins/Chart.js/Chart.min.js')}}"></script>
  <script src="{{asset('Admin/assets/plugins/Chart.js/Chart.extension.js')}}"></script>
  <!-- Index js -->
  <script src="{{asset('Admin/assets/js/index5.js')}}"></script>


<!-- data table -->
  <script src="{{asset('Admin/assets/plugins/bootstrap-datatable/js/jquery.dataTables.min.js')}}"></script>
  <script src="{{asset('Admin/assets/plugins/bootstrap-datatable/js/dataTables.bootstrap4.min.js')}}"></script>
  
  <!-- select2 -->
  <script src="{{asset('Admin/assets/plugins/select2/js/select2.min.js')}}"></script>

  <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.js"></script>
  
  <script type="text/javascript">
    $(document).ready( function () {
      $('#dataTableExample').DataTable();
  } );
  </script>

  
  
@yield('scripts')

</body>
</html>
