<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from lawfirm-admin-template.multipurposethemes.com/main/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 07 Jan 2022 06:11:20 GMT -->

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="shortcut icon" href="{{URL::asset('images/favicon.png')}}" type="image/x-icon">
    <title>{{config('app.name')}} - Dashboard</title>

    <!-- Vendors Style-->
    <link rel="stylesheet" href="{{URL::asset('css/vendors_css.css')}}">
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/@mdi/font@6.5.95/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <!-- Style-->
    <link rel="stylesheet" href="{{URL::asset('css/style.css')}}">
    <link rel="stylesheet" href="{{URL::asset('css/skin_color.css')}}">

</head>

<body class="hold-transition light-skin sidebar-mini theme-primary fixed">

    <div class="wrapper">

        <!-- Dashboard Header -->
        @includeIf('layouts.dashboard_header')
        <!-- End Dashboard Header -->

        <!-- Dashboard Sidebar -->
        @includeIf('layouts.dashboard_sidebar')
        <!-- End Deashboard Sidebar -->

        <!-- Page-Content -->
        @yield('page-content')
        <!-- End Page-Content -->

        <!-- Dashboard Footer -->
        @includeIf('layouts.dashboard_footer')
        <!-- End Dashboard Footer -->

    </div>
    <!-- Vendor JS -->
    <script src="{{URL::asset('js/vendors.min.js')}}"></script>
    <script src="{{URL::asset('js/pages/chat-popup.js')}}"></script>
    <script src="{{URL::asset('assets/icons/feather-icons/feather.min.js')}}"></script>
    <script src="https://use.fontawesome.com/633ef7b88d.js"></script>

    <script src="{{URL::asset('assets/vendor_components/apexcharts-bundle/dist/apexcharts.js')}}"></script>
    <script src="{{URL::asset('assets/vendor_components/dropzone/dropzone.js')}}"></script>
    <script src="{{URL::asset('assets/vendor_components/PACE/pace.min.js')}}"></script>
    <script src="{{URL::asset('assets/vendor_components/datatable/datatables.min.js')}}"></script>

    <!-- Law Firm App -->
    <script src="{{URL::asset('js/template.js')}}"></script>
    <script src="{{URL::asset('js/pages/dashboard.js')}}"></script>
    <script src="{{URL::asset('js/pages/pace.js')}}"></script>
    <script src="{{URL::asset('js/pages/patients.js')}}"></script>

</body>

<!-- Mirrored from lawfirm-admin-template.multipurposethemes.com/main/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 07 Jan 2022 06:12:17 GMT -->

</html>