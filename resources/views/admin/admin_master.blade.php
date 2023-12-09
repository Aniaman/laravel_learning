<!doctype html>
<html lang="en">

<head>

  <meta charset="utf-8" />
  <title>Admin </title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
  <meta content="Themesdesign" name="author" />
  <!-- App favicon -->
  <link rel="shortcut icon" href="{{asset('backend/assets/images/favicon.ico')}}">
  {{asset('backend')}}
  <!-- Bootstrap Css -->
  <link href="{{asset('backend/assets/css/bootstrap.min.css')}}" id="bootstrap-style" rel="stylesheet" type="text/css" />
  <!-- Icons Css -->
  <link href="{{asset('backend/assets/css/icons.min.css')}}" rel="stylesheet" type="text/css" />
  <!-- App Css-->
  <link href="{{asset('backend/assets/css/app.min.css')}}" id="app-style" rel="stylesheet" type="text/css" />
  <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css">
</head>

<body data-topbar="dark">

  <!-- <body data-layout="horizontal" data-topbar="dark"> -->

  <!-- Begin page -->
  <div id="layout-wrapper">
    @include('admin.common.header')



    <!-- ========== Left Sidebar Start ========== -->
    @include('admin.common.sidebar')
    <!-- Left Sidebar End -->



    <!-- ============================================================== -->
    <!-- Start right Content here -->
    <!-- ============================================================== -->
    <div class="main-content">

      @yield('admin')
      <!-- End Page-content -->

      @include('admin.common.footer')

    </div>
    <!-- end main content-->

  </div>
  <!-- END layout-wrapper -->


  <!-- Right bar overlay-->
  <div class="rightbar-overlay"></div>

  <!-- JAVASCRIPT -->
  <script src="{{asset('backend/assets/libs/jquery/jquery.min.js')}}"></script>
  <script src="{{asset('backend/assets/libs/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
  <script src="{{asset('backend/assets/libs/metismenu/metisMenu.min.js')}}"></script>
  <script src="{{asset('backend/assets/libs/simplebar/simplebar.min.js')}}"></script>
  <script src="{{asset('backend/assets/libs/node-waves/waves.min.js')}}"></script>

  <script src="{{asset('backend/assets/js/app.js')}}"></script>
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

  <script>
    @if(Session::has('message'))
    var type = "{{ Session::get('alert-type','info') }}"
    switch (type) {
      case 'info':
        toastr.info(" {{ Session::get('message') }} ");
        break;

      case 'success':
        toastr.success(" {{ Session::get('message') }} ");
        break;

      case 'warning':
        toastr.warning(" {{ Session::get('message') }} ");
        break;

      case 'error':
        toastr.error(" {{ Session::get('message') }} ");
        break;
    }
    @endif
  </script>

</body>

</html>