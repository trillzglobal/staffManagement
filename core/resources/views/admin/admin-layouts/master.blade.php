<!DOCTYPE html>
<html lang="en">
<link rel="icon" type="image/x-icon" href="{{ asset('assets/favicon.ico') }}" />

@include('admin.admin-layouts._head')

@stack('style')


<body id="page-top">

    <div id="wrapper">

        @include('admin.admin-layouts._sidebar')

      
        <div id="content-wrapper" class="d-flex flex-column">

           
            <div id="content">

                @include('admin.admin-layouts._topNav')

                @yield('content')

            </div>

            @include('admin.admin-layouts._footer')

        </div>
       
        <a class="rounded scroll-to-top" href="#page-top">
            <i class="fas fa-angle-up"></i>
        </a>



    </div>


    <script src="{{ asset('assets/backend/js/jquery.min.js') }}"></script>
    <script src="{{ asset('assets/backend/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('assets/backend/js/sb-admin-2.js') }}"></script>

    <script src="{{ asset('assets/backend/js/jquery.easing.min.js') }}"></script>
    <script src="{{ asset('assets/backend/js/loader.js') }}"></script>

    <script src="{{ asset('assets/backend/js/gijgo.min.js') }}"></script>
    <script src="{{ asset('assets/backend/js/chart.js') }}"></script>

    @stack('script-plugin')

    <script src="{{ asset('assets/backend/js/dropzone.min.js') }}"></script>
    <script src="{{ asset('assets/backend/js/select2.min.js') }}"></script>
    <script src="{{ asset('assets/backend/js/inputmask.min.js') }}"></script>
    <script src="{{ asset('assets/backend/js/daterangepicker.min.js') }}"></script>
    <script src="{{ asset('assets/backend/js/moment.min.js') }}"></script>
    <script src="{{ asset('assets/backend/js/fullcalendar.js') }}"></script>
    <script src="{{ asset('assets/backend/js/sweetalert.min.js') }}"></script>
    <script src="{{ asset('assets/backend/js/toastr.min.js') }}"></script>

    @include('sweetalert::alert')
 
    <script src="{{ asset('assets/backend/js/jquery.dataTables.js') }}"></script>
    <script src="{{ asset('assets/backend/js/dataTables.bootstrap4.min.js') }}"></script>

    <script src="{{ asset('assets/backend/js/datatables-demo.js') }}"></script>





    <script>
        'use strict'


        var url = "{{ route('changeLang') }}";

        $(".changeLang").change(function() {
            if ($(this).val() == '') {
                return false;
            }
            window.location.href = url + "?lang=" + $(this).val();
        });
    </script>

    @stack('script')


   



</body>

</html>
