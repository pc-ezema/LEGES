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
    <title>{{config('app.name')}} - 404 Error</title>

    <!-- Vendors Style-->
    <link rel="stylesheet" href="{{URL::asset('css/vendors_css.css')}}">
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/@mdi/font@6.5.95/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <!-- Style-->
    <link rel="stylesheet" href="{{URL::asset('css/style.css')}}">
    <link rel="stylesheet" href="{{URL::asset('css/skin_color.css')}}">

    <script type="text/javascript">
        window.setTimeout(function() {
            $(".alert-timeout").fadeTo(500, 0).slideUp(1000, function(){
                $(this).remove(); 
            });
        }, 3000);
    </script>

</head>

<body class="hold-transition light-skin sidebar-mini theme-primary fixed">
    <div class="wrapper">
        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <div class="container-full">
                <!-- Content Header (Page header) -->
                <section class="error-page h-p100">
                    <div class="container h-p100">
                        <div class="row h-p100 align-items-center justify-content-center text-center">
                            <div class="col-lg-7 col-md-10 col-12">
                                <div class="rounded10 p-50">
                                    <img src="{{URL::asset('images/auth-bg/404.jpg')}}" class="max-w-200" alt="" />
                                    <h1>Page Not Found !</h1>
                                    <h3>looks like, page doesn't exist</h3>
                                    <div class="my-30"><a href="/" class="btn btn-danger">Back to dashboard</a></div>				  

                                    <form class="search-form mx-auto mt-30 w-p75">
                                    <div class="input-group rounded5 overflow-h">
                                        <input type="text" name="search" class="form-control" placeholder="Search">
                                        <button type="submit" name="submit" class="btn btn-danger btn-sm"><i class="fa fa-search"></i></button>
                                    </div>
                                    <!-- /.input-group -->
                                    </form>
                                </div>
                            </div>				
                        </div>
                    </div>
                </section>
                <!-- /.content -->
            </div>
        </div>
        <!-- /.content-wrapper --> 
    </div>
    <script>
        function loadPreview(input){
            var data = $(input)[0].files; //this file data
            $.each(data, function(index, file){
                if(/(\.|\/)(gif|jpe?g|png|docx|pdf)$/i.test(file.type)){
                    var fRead = new FileReader();
                    fRead.onload = (function(file){
                        return function(e) {
                            var img = $('<img/>').addClass('thumb').attr('src', e.target.result); //create image thumb element
                            $('#thumb-output').append(img);
                        };
                    })(file);
                    fRead.readAsDataURL(file);
                }
            })
        }
    </script>
    <!-- Vendor JS -->
    <script src="{{URL::asset('js/vendors.min.js')}}"></script>
    <script src="{{URL::asset('js/pages/chat-popup.js')}}"></script>
    <script src="{{URL::asset('assets/icons/feather-icons/feather.min.js')}}"></script>
    <script src="https://use.fontawesome.com/633ef7b88d.js"></script>
    <script src="{{URL::asset('assets/vendor_components/jquery-toast-plugin-master/src/jquery.toast.js')}}"></script>

    <script src="{{URL::asset('assets/vendor_components/apexcharts-bundle/dist/apexcharts.js')}}"></script>
    <script src="{{URL::asset('assets/vendor_components/dropzone/dropzone.js')}}"></script>
    <script src="{{URL::asset('assets/vendor_components/PACE/pace.min.js')}}"></script>
    <script src="{{URL::asset('assets/vendor_components/datatable/datatables.min.js')}}"></script>
    <script src="{{URL::asset('assets/vendor_components/apexcharts-bundle/dist/apexcharts.js')}}"></script>
	<script src="{{URL::asset('assets/vendor_components/jquery.peity/jquery.peity.js')}}"></script>
	<script src="{{URL::asset('assets/vendor_components/easypiechart/dist/jquery.easypiechart.js')}}"></script>
	<script src="{{URL::asset('assets/vendor_components/chart.js-master/Chart.min.js')}}"></script>
	<script src="{{URL::asset('assets/vendor_components/d3/d3.min.js')}}"></script>
	<script src="{{URL::asset('assets/vendor_components/d3/d3_tooltip.js')}}"></script>

    <!-- Law Firm App -->
    <script src="{{URL::asset('js/template.js')}}"></script>
    <script src="{{URL::asset('js/pages/dashboard.js')}}"></script>
    <script src="{{URL::asset('js/pages/pace.js')}}"></script>
    <script src="{{URL::asset('js/pages/patients.js')}}"></script>
    <script src="{{URL::asset('js/pages/toastr.js')}}"></script>
    <script src="{{URL::asset('js/pages/notification.js')}}"></script>
    <script src="{{URL::asset('js/pages/data-table.js')}}"></script>
	<script src="{{URL::asset('js/pages/app-ticket.js')}}"></script>
    <script src="{{URL::asset('js/pages/chart-widgets.js')}}"></script>
    <script src="{{URL::asset('js/pages/chartjs-int.js')}}"></script>

</body>

<!-- Mirrored from lawfirm-admin-template.multipurposethemes.com/main/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 07 Jan 2022 06:12:17 GMT -->
</html>