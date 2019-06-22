<!DOCTYPE html>
<html lang="en">

<head>



  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Admin panel</title>
  <!-- plugins:css -->
  <link rel="stylesheet" href="/vendors/iconfonts/mdi/css/materialdesignicons.min.css">
  <link rel="stylesheet" href="/vendors/css/vendor.bundle.base.css">
  <link rel="stylesheet" href="/vendors/css/vendor.bundle.addons.css">
  <link rel="stylesheet" href="vendors/css/font-awesome.css">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
  <!-- endinject -->
  <!-- plugin css for this page -->
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <link rel="stylesheet" href="{{ asset('css/admin_style.css') }}">

   <!-- Datatable:css -->
  <link rel="stylesheet" href="{{ asset('css/datatables.min.css') }}">
  <!-- endinject -->
  <link rel="shortcut icon" href="{{asset('/images/favicon.png')}}" />
</head>

<body>
  <div class="container-scroller">

  <!-- admin:partials/navbar.blade.php -->
    @include('admin.partials.nav')


    <div class="container-fluid page-body-wrapper">

    <!-- admin:partials/left_sidebar.blade.php -->
     @include('admin.partials.left-sidebar')

    <!-- admin:pages/index.blade.php -->

      @yield('content')

    </div>
    <!-- page-body-wrapper ends -->
  </div>
  <!-- container-scroller -->




  <!-- plugins:js -->
  <script src="{{asset('vendors/js/vendor.bundle.base.js')}}"></script>
  <script src="{{asset('vendors/js/vendor.bundle.addons.js')}}"></script>

  <!-- endinject -->
  <!-- Plugin js for this page-->
  <!-- End plugin js for this page-->
  <!-- inject:js -->
  <script src="{{asset('js/admin-js/admin-js/off-canvas.js')}}"></script>
  <script src="{{asset('js/admin-js/admin-js/misc.js')}}"></script>
  <!-- endinject -->
  <!-- Custom js for this page-->
  <script src="{{asset('js/admin-js/dashboard.js')}}"></script>

  <!-- Datatables:js -->
  <script src="{{asset('js/datatables.min.js')}}"></script>


  <script>
    //Datatable 
    $(document).ready(function() {
    $('#datatable').DataTable();
    });

  </script>
  <!-- End custom js for this page-->
</body>

</html>
