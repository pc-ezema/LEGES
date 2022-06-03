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
    <title>{{config('app.name')}} - 500 Internal Server Error </title>

    <!-- Vendors Style-->
    <link rel="stylesheet" href="{{URL::asset('css/vendors_css.css')}}">
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/@mdi/font@6.5.95/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <!-- Style-->
    <link rel="stylesheet" href="{{URL::asset('css/style.css')}}">
    <link rel="stylesheet" href="{{URL::asset('css/skin_color.css')}}">

</head>

<body class="hold-transition theme-primary bg-img" style="background-image: url(assets/images/auth-bg/bg-4.jpg)">
    <section class="error-page h-p100">
        <div class="container h-p100">
            <div class="row h-p100 align-items-center justify-content-center text-center">
                <div class="col-lg-7 col-md-10 col-12">
                    <div class="rounded30 p-50">
                        <img src="{{URL::asset('images/auth-bg/500.jpg')}}" class="max-w-200" alt="" />
                        <h1>Uh-Ah</h1>
                        <h3>Internal Server Error !</h3>
                        <div class="my-30"><a href="/" class="btn btn-info">Back to Home</a></div>
                        <h5 class="mb-15">-- OR --</h5>
                        <h4>Please try after some time</h4>			  			  
                    </div>							  			  
                </div>				
            </div>
        </div>
    </section>

    <!-- Vendor JS -->
    <script src="{{URL::asset('js/vendors.min.js')}}"></script>
    <script src="{{URL::asset('js/pages/chat-popup.js')}}"></script>
    <script src="{{URL::asset('assets/icons/feather-icons/feather.min.js')}}"></script>
    <script src="https://use.fontawesome.com/633ef7b88d.js"></script>
</body>

</html>