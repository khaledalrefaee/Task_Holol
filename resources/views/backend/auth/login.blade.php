<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
<meta name="description" content="Smarthr - Bootstrap Admin Template">
<meta name="keywords" content="admin, estimates, bootstrap, business, corporate, creative, management, minimal, modern, accounts, invoice, html5, responsive, CRM, Projects">
<meta name="author" content="Dreamguys - Bootstrap Admin Template">
<meta name="robots" content="noindex, nofollow">
<title>Login -  admin </title>

<link rel="shortcut icon" type="image/x-icon" href="{{asset('back/assets/img/favicon.png')}}">
<link rel="stylesheet" href="http://cdn.bootcss.com/toastr.js/latest/css/toastr.min.css">
<link rel="stylesheet" href="{{asset('back/assets/css/bootstrap.min.css')}}">
<link rel="stylesheet" href="path/to/toastr.css">
<link rel="stylesheet" href="{{asset('back/assets/css/font-awesome.min.css')}}">

<link rel="stylesheet" href="{{asset('back/assets/css/line-awesome.min.css')}}">

<link rel="stylesheet" href="{{asset('back/assets/plugins/morris/morris.css')}}">

<link rel="stylesheet" href="{{asset('back/assets/css/style.css')}}">


<div class="main-wrapper">
    <div class="account-content">
    <div class="container">

    <div class="account-logo">
    </div>

    <div class="account-box">
    <div class="account-wrapper">
    <h3 class="account-title">Login</h3>
    <p class="account-subtitle">Access to our dashboard</p>

    <form action="{{route('admin.post.login')}}" method="POST" id="myForm">
        @csrf

    <div class="form-group">
    <label>Email or Phone</label>
    <input class="form-control @error('email') is-invalid @enderror" id="login_identifier" name="email" value="{{ old('email') }}" placeholder="Enter Email or Phone please" autocomplete="login_identifier" autofocus type="text">
    @error('email')
    <div class="invalid-feedback" style="color: #8B0000;">{{ $message }}</div>
    @enderror
</div>
    <div class="form-group">
    <div class="row">
    <div class="col">
    <label>Password</label>
    </div>
    <div class="col-auto">
    <a class="text-muted" href="forgot-password.html">
    Forgot password?
    </a>
    </div>
    </div>
    <input placeholder="Enter Password please" class="form-control  @error('password') is-invalid @enderror" name="password" value="{{ old('password') }}" type="password">
    @error('password')
    <div class="invalid-feedback" style="color: #8B0000;">{{ $message }}</div>
    @enderror
    </div>
    <div class="form-group text-center">
        @error('error')
        <div class="error-message text-danger">{{ $message }}</div>
    @enderror
    <button class="btn btn-primary account-btn" type="submit">Login</button>
    </div>
    <div class="account-footer">
    </div>
    </form>

    </div>
    </div>
    </div>
    </div>
    </div>

    <script data-cfasync="false" src="../cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script>
    <script src="{{asset('back/assets/js/jquery-3.5.1.min.js')}}"></script>

    <script src="{{asset('back/assets/js/popper.min.js')}}"></script>
    <script src="{{asset('back/assets/js/bootstrap.min.js')}}"></script>

    <script src="{{asset('back/assets/js/jquery.slimscroll.min.js')}}"></script>

    <script src="{{asset('back/assets/plugins/morris/morris.min.js')}}"></script>
    <script src="{{asset('back/assets/plugins/raphael/raphael.min.js')}}"></script>
    <script src="{{asset('back/assets/js/chart.js')}}"></script>
    <script src="path/to/jquery.js"></script>
    <script src="path/to/toastr.js"></script>
    <script src="{{asset('back/assets/js/app.js')}}"></script>
    <script src="http://cdn.bootcss.com/jquery/2.2.4/jquery.min.js"></script>
    <script src="http://cdn.bootcss.com/toastr.js/latest/js/toastr.min.js"></script>

