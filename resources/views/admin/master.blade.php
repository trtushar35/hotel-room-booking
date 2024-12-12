<!DOCTYPE html>
<html lang="en">


@include('admin.partial.header')

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">


@include('admin.partial.sidebar')



        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                    <!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>

                    <!-- Topbar Search -->
                    <form
                        class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
                        <div class="input-group">
                            <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..."
                                aria-label="Search" aria-describedby="basic-addon2">
                            <div class="input-group-append">
                                <button class="btn btn-primary" type="button">
                                    <i class="fas fa-search fa-sm"></i>
                                </button>
                            </div>
                            
                        </div>
                                
                        
                    </form>
                    
                    <img style="border-radius: 50%;" height="30" width="30" src="{{url('uploads/users',auth()->user()->image)}}" alt=""/> 
                    <div class="p-4">
                    {{auth()->user()->name}}
                       ({{auth()->user()->role}})
                    </div>
                    <a  href="{{route('admin.logout')}}" type="button" class="btn btn-success">Logout</a>
                                  

                </nav>
                <!-- End of Topbar -->
                @include('notify::components.notify')
                @yield('content')

            </div>
            <!-- End of Main Content -->

            @include('admin.partial.footer')

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true"></span>
                    </button>
                </div>
                <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-primary" href="login.html">Logout</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="{{url('/backend')}}/vendor/jquery/jquery.min.js"></script>
    <script src="{{url('/backend')}}/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="{{url('/backend')}}/vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="{{url('/backend')}}/js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="{{url('/backend')}}/vendor/chart.js/Chart.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="{{url('/backend')}}/js/demo/chart-area-demo.js"></script>
    <script src="{{url('/backend')}}/js/demo/chart-pie-demo.js"></script>
    <script src="https://kit.fontawesome.com/4ca2fa527c.js" crossorigin="anonymous"></script>
    @notifyJs
</body>

</html>