<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>OPMRS</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

        <!-- Bootstrap core CSS -->
        <link href="assets/welpg/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

        <!-- Custom fonts for this template -->
        
        <link href="assets/welpg/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
        <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">
        <link href='https://fonts.googleapis.com/css?family=Kaushan+Script' rel='stylesheet' type='text/css'>
        <link href='https://fonts.googleapis.com/css?family=Droid+Serif:400,700,400italic,700italic' rel='stylesheet' type='text/css'>
        <link href='https://fonts.googleapis.com/css?family=Roboto+Slab:400,100,300,700' rel='stylesheet' type='text/css'>

        <!-- Custom styles for this template -->
        <link href="assets/welpg/css/agency.min.css" rel="stylesheet">



    </head>
    <body id="page-top">
    <!-- Navigation -->
        <nav class="navbar navbar-expand-lg navbar-dark fixed-top" id="mainNav">
            <div class="container">
                <a class="navbar-brand js-scroll-trigger" href="#page-top">OPMRS</a>
                <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                    Menu
                    <i class="fas fa-bars"></i>
                </button>
                <div class="collapse navbar-collapse" id="navbarResponsive">
                    <ul class="navbar-nav text-uppercase ml-auto">
                        <div class="dropdown nav-item">
                            <a href="#" class="dropdown-toggle nav-link" data-toggle="dropdown">
                                <i class="fas fa-fw fa-user"></i>
                                Patient
                            </a>
                            <div class="dropdown-menu">
                                @if (Route::has('login'))
                                    @auth('web')
                                        <li class="nav-item">
                                            <a class="dropdown-item" href="{{ url('/home') }}">Home</a>
                                        </li>
                                        
                                    @else
                                        <a class="dropdown-item" href="{{ route('login') }}">Login</a>
                                        @if (Route::has('register'))     
                                            <a class="dropdown-item " href="{{ route('register') }}">Register</a>                              
                                        @endif

                                    @endauth                          

                                @endif


                            </div>
                        </div>
                        <div class="dropdown nav-item">
                            <a href="#" class="dropdown-toggle nav-link" data-toggle="dropdown">
                                <i class="fas fa-fw fa-hospital"></i>
                                Hospital
                            </a>
                            <div class="dropdown-menu">
                                @if (Route::has('hospital.login'))
                                    @auth('practitioner')
                                        <li class="nav-item">
                                            <a class="dropdown-item" href="{{ url('/hospital') }}">Home</a>
                                        </li>
                                        
                                    @else
                                        <a class="dropdown-item" href="{{ route('hospital.login') }}">Login</a>
                                        @if (Route::has('hospital.register'))     
                                            <a class="dropdown-item " href="{{ route('hospital.register') }}">Register</a>                              
                                        @endif

                                    @endauth                          

                                @endif


                            </div>
                        </div>  
                        <div class="dropdown nav-item">
                            <a href="#" class="dropdown-toggle nav-link" data-toggle="dropdown">
                                <i class="fas fa-fw fa-user-md"></i>
                                Medical Practitioners
                            </a>
                            <div class="dropdown-menu">
                                @if (Route::has('practitioner.login'))
                                    @auth('practitioner')
                                        <li class="nav-item">
                                            <a class="dropdown-item" href="{{ url('/practitioner') }}">Home</a>
                                        </li>
                                        
                                    @else
                                        <a class="dropdown-item" href="{{ route('practitioner.login') }}">Login</a>
                                        @if (Route::has('practitioner.register'))     
                                            <a class="dropdown-item " href="{{ route('practitioner.register') }}">Register</a>                              
                                        @endif

                                    @endauth                          

                                @endif


                            </div>
                        </div>                        

                    </ul>
                </div>
            </div>
        </nav>

        <!-- Header -->
        <header class="masthead">
            <div class="container">
            <div class="intro-text">
                <div class="intro-lead-in">Welcome To</div>
                <div class="intro-heading">Online Patient Medical Recording System</div>
                <a class="btn btn-primary btn-xl text-uppercase js-scroll-trigger" data-toggle="modal" data-target="#myModal">Tell Me More</a>
            </div>
            </div>
        </header>

        <!-- The Modal -->
        <div class="modal" id="myModal">
        <div class="modal-dialog">
            <div class="modal-content">

            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title">About the Student</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>

            <!-- Modal body -->
            <div class="modal-body">
                <table class="table table-striped">
                    <tr>
                        <td>Name:</td><td>Miss Eunice Charles</td>
                    </tr>
                    <tr>
                        <td>Reg No:</td><td>CS/H2005/057</td>
                    </tr>

                </table>
            </div>

            <!-- Modal footer -->
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
            </div>

            </div>
        </div>
        </div>

        <!-- Footer -->
        <footer class="footer">
            <div class="container">
            <div class="row align-items-center">
                <div class="col-md-12">
                    <span class="copyright text-danger font-weight-bold">OPMRS &copy; {{date('Y')}}</span>
                </div>

            </div>
            </div>
        </footer>



        <!-- Bootstrap core JavaScript -->
        <script src="assets/welpg/vendor/jquery/jquery.min.js"></script>
        <script src="assets/welpg/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

        <!-- Plugin JavaScript -->
        <script src="assets/welpg/vendor/jquery/easing/jquery.easing.min.js"></script>

        <!-- Contact form JavaScript -->
     
      

        <!-- Custom scripts for this template -->
        <script src="assets/js/agency.min.js"></script>
    </body>
</html>
