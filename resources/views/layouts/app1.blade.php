<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    
    @include('layouts.inc.head')

</head>

    <body id="page-top">

        <!-- Page Wrapper -->
        <div id="wrapper">

            <!-- Sidebar -->
            @include('layouts.inc.sidebar1')
            <!-- End of Sidebar -->

            <!-- Content Wrapper -->
            <div id="content-wrapper" class="d-flex flex-column">

                <!-- Main Content -->
                <div id="content">
 
                    <!-- Topbar -->
                    @include('layouts.inc.navbar1')
                    <!-- End of Topbar -->

                    <!-- Begin Page Content -->
                    <div id="app" class="container-fluid">
                        @yield('content')                    
                    </div>
                    <!-- /.container-fluid -->

                </div>
                <!-- End of Main Content -->

                <!-- Footer -->
                @include('layouts.inc.footer')
                <!-- End of Footer -->

            </div>
            <!-- End of Content Wrapper -->

        </div>
        <!-- End of Page Wrapper -->

        <!-- Scroll to Top Button-->
        <a class="scroll-to-top rounded" href="#page-top">
            <i class="fas fa-angle-up"></i>
        </a>

        <!-- Logout Modal-->
        @include('layouts.inc.logout')

        <!-- footer-script-->
        @include('layouts.inc.footer-script')


    </body>
</html>
