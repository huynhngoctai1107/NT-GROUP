<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title')</title>

    <!-- Google Font: Source Sans Pro -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{asset('plugins/fontawesome-free/css/all.min.css') }}">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Tempusdominus Bootstrap 4 -->
    <link rel="stylesheet" href="{{ asset('plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css') }}">
    <!-- iCheck -->
    <link rel="stylesheet" href="{{asset('plugins/icheck-bootstrap/icheck-bootstrap.min.css') }}">
    <!-- JQVMap -->
    <link rel="stylesheet" href="{{asset('plugins/jqvmap/jqvmap.min.css') }}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{asset('dist/css/adminlte.min.css') }}">
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="{{asset('plugins/overlayScrollbars/css/OverlayScrollbars.min.css') }}">
    @yield('link')
    <!-- Daterange picker -->
    <link rel="stylesheet" href="{{asset('plugins/daterangepicker/daterangepicker.css') }}">
    <link rel="stylesheet" href="{{asset('plugins/summernote/summernote-bs4.min.css') }}">

</head>

<body class="hold-transition sidebar-mini layout-fixed">
<x-admin.nav.navbar></x-admin.nav.navbar>
<div class="wrapper bg-white" style="background-color: white !important ">


    <!-- Main content -->
    @yield('main')

    <!-- /.content -->
</div>


<x-admin.footer.footer>
</x-admin.footer.footer>
@stack('javascript')
 </body>

<script>
    document.getElementById('toggleOldPassword').addEventListener('click', function () {
        var passwordInput = document.getElementById('exampleInputPassword');
        var passwordToggle = document.getElementById('toggleOldPassword');

        if (passwordInput.type === 'password') {
            passwordInput.type = 'text';
            passwordToggle.innerHTML = '<i class="bi bi-eye"></i>';
        }
        else {
            passwordInput.type = 'password';
            passwordToggle.innerHTML = '<i class="bi bi-eye-slash"></i>';
        }
    });

    document.getElementById('toggleNewPassword').addEventListener('click', function () {
        var passwordInput = document.getElementById('exampleInputNewPassword');
        var passwordToggle = document.getElementById('toggleNewPassword');

        if (passwordInput.type === 'password') {
            passwordInput.type = 'text';
            passwordToggle.innerHTML = '<i class="bi bi-eye"></i>';
        }
        else {
            passwordInput.type = 'password';
            passwordToggle.innerHTML = '<i class="bi bi-eye-slash"></i>';
        }
    });
</script>

</html>
 