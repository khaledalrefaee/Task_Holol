<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
<meta name="description" content="Smarthr - Bootstrap Admin Template">
<meta name="keywords" content="admin, estimates, bootstrap, business, corporate, creative, management, minimal, modern, accounts, invoice, html5, responsive, CRM, Projects">
<meta name="author" content="Dreamguys - Bootstrap Admin Template">
<meta name="robots" content="noindex, nofollow">
<title>Dashboard - HRMS admin template</title>

<link rel="shortcut icon" type="image/x-icon" href="{{asset('back/assets/img/favicon.png')}}">

<link rel="stylesheet" href="{{asset('back/assets/css/bootstrap.min.css')}}">

<link rel="stylesheet" href="{{asset('back/assets/css/font-awesome.min.css')}}">

<link rel="stylesheet" href="{{asset('back/assets/css/line-awesome.min.css')}}">

<link rel="stylesheet" href="{{asset('back/assets/plugins/morris/morris.css')}}">

<link rel="stylesheet" href="{{asset('back/assets/css/style.css')}}">

</head>
<body>




@include('backend.partials.header')

@include('backend.partials.sidebar')


<main>
    @yield('content')
</main>



<script data-cfasync="false" src="../cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script>
<script src="{{asset('back/assets/js/jquery-3.5.1.min.js')}}"></script>

<script src="{{asset('back/assets/js/popper.min.js')}}"></script>
<script src="{{asset('back/assets/js/bootstrap.min.js')}}"></script>

<script src="{{asset('back/assets/js/jquery.slimscroll.min.js')}}"></script>

<script src="{{asset('back/assets/plugins/morris/morris.min.js')}}"></script>
<script src="{{asset('back/assets/plugins/raphael/raphael.min.js')}}"></script>
<script src="{{asset('back/assets/js/chart.js')}}"></script>



<script src="{{asset('back/assets/js/app.js')}}"></script>

</body>
</html>
