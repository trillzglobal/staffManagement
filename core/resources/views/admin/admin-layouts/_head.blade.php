<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ @$sitename->sitename }}</title>

    <link rel="stylesheet" href="{{ asset('assets/backend/css/all.min.css') }}">

    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i">
   
    <link rel="stylesheet" href="{{ asset('assets/backend/css/bootstrap.min.css') }}"/>
    <link rel="stylesheet" href="{{ asset('assets/backend/css/fullcalendar.css') }}"/>
    <link rel="stylesheet" href="{{ asset('assets/backend/css/toaster.min.css') }}"/>
    <link rel="stylesheet" href="{{ asset('assets/backend/css/gijgo.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/backend/css/bbchoices.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/backend/css/daterangepicker.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/backend/css/dataTables.bootstrap4.css') }}">

    @stack('style-plugin')

    <link rel="stylesheet" href="{{ asset('assets/backend/css/sb-admin-2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/backend/css/toaster.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/backend/css/scroller.css') }}">

</head>
