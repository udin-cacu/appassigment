<?php
session_start();
?><!DOCTYPE html>
<html lang="en">
<head>
    <title>App</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->  
    <link rel="icon" type="image/png" href="{{ asset ('assets/splash/dist/img/favicon.png') }}"/>
<!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{ asset ('assets/splash/vendor/bootstrap/css/bootstrap.min.css') }}">
<!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{ asset ('assets/splash/fonts/font-awesome-4.7.0/css/font-awesome.min.css') }}">
<!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{ asset ('assets/splash/fonts/Linearicons-Free-v1.0.0/icon-font.min.css') }}">
<!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{ asset ('assets/splash/vendor/animate/animate.css') }}">
<!--===============================================================================================-->  
    <link rel="stylesheet" type="text/css" href="{{ asset ('assets/splash/vendor/css-hamburgers/hamburgers.min.css') }}">
<!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{ asset ('assets/splash/css/util.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset ('assets/splash/css/main.css') }}">
<!--===============================================================================================-->

</head>
<body>
    <div class="limiter">
        <div class="koperasi-login100" >
            <div class="wrap-login100 p-b-30" style="padding-top: 75%">
                <span class="login100-form-title p-t-20 p-b-45">             
                </span>
            </div>
        </div>
    </div>

    
<!--===============================================================================================-->  
<script src="{{ asset ('assets/splash/vendor/jquery/jquery-3.2.1.min.js') }}"></script>
<!--===============================================================================================-->
<script src="{{ asset ('assets/splash/vendor/bootstrap/js/popper.js') }}"></script>
<script src="{{ asset ('assets/splash/vendor/bootstrap/js/bootstrap.min.js') }}"></script>

<!--===============================================================================================-->
<script src="{{ asset ('assets/splash/js/main.js') }}"></script>

<script type="text/javascript">
    
    setTimeout(function(){ window.location.href = '/login'; }, 3000);

</script>


</body>
</html>