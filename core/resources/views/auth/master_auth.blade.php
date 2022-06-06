<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>{{@$sitename->sitename}}</title>


    
    <link rel="stylesheet" href="{{ asset('assets/backend/css/all.min.css') }}">

    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i">
   
    <link rel="stylesheet" href="{{ asset('assets/backend/css/bootstrap.min.css') }}"/>
    <link rel="stylesheet" href="{{ asset('assets/backend/css/login.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/backend/css/custom.css') }}" >
    <link rel="stylesheet" href="{{ asset('assets/backend/css/toaster.min.css') }}"/>


    @stack('style-plugin')



</head>

<body class="bg-gradient-primary">

    @yield('section')

    <script src="{{ asset('assets/backend/js/jquery.min.js') }}"></script>
    <script src="{{ asset('assets/backend/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('assets/backend/js/sb-admin-2.js') }}"></script>

    <script src="{{ asset('assets/backend/js/jquery.easing.min.js') }}"></script>
    <script src="{{ asset('assets/backend/js/loader.js') }}"></script>
    <script src="{{ asset('assets/backend/js/toastr.min.js') }}"></script>

    <script>
        @if(session()->has('success'))

            toastr.success("{{session('success')}}")      


            {{session()->forget('success')}}

        @endif
    </script>

</body>

</html>
