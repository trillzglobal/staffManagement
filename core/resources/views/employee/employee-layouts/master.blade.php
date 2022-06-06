<!DOCTYPE html>
<html lang="en">

@include('employee.employee-layouts._head')

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        @include('employee.employee-layouts._sidebar')

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                @include('employee.employee-layouts._topNav')

                @yield('content')

            </div>
            <!-- End of Main Content -->

            @include('employee.employee-layouts._footer')

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

  
    @include('sweetalert::alert')

    @include('employee.employee-layouts._js')

    <script>
        'use strict'

        var url = "{{ route('employee.changeLang') }}";

        $(".changeLang").change(function() {
            if ($(this).val() == '') {
                return false;
            }
            window.location.href = url + "?lang=" + $(this).val();
        });
    </script>
</body>

</html>
