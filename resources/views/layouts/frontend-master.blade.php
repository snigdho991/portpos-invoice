
<!doctype html>
<html lang="en">

    <head>
        
        <meta charset="utf-8" />
        <title>@yield('title') - {{ config('app.name') }}</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta content="Hello there" name="description" />
        <meta content="Snigdho" name="author" />
        <!-- App favicon -->
        <link rel="shortcut icon" href="{{ asset('/assets/images/favicon.ico') }}">

        <link href="{{ asset('/assets/libs/select2/css/select2.min.css') }}" rel="stylesheet" type="text/css" />

        <!-- owl.carousel css -->
        <link rel="stylesheet" href="{{ asset('/assets/libs/owl.carousel/assets/owl.carousel.min.css') }}">

        <link rel="stylesheet" href="{{ asset('/assets/libs/owl.carousel/assets/owl.theme.default.min.css') }}">

        <!-- Icons Css -->
        <link href="{{ asset('/assets/css/icons.min.css') }}" rel="stylesheet" type="text/css" />
        

        {{-- @if(Auth::check())
            <?php
                $user_theme = Auth::user()->theme; 
            ?>

            @if ($user_theme == 'default') --}}
                {{-- <!-- Bootstrap Css -->
                <link href="{{ asset('/assets/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css" />
                <!-- App Css-->
                <link href="{{ asset('/assets/css/app.min.css') }}" rel="stylesheet" type="text/css" />

                <style type="text/css">
                    .notification-msg {
                        color: #495057; 
                        font-weight: 450;
                    }
                </style> --}}
            {{-- @else --}}
                <link href="{{ asset('assets/css/bootstrap-dark.min.css') }}" rel="stylesheet" type="text/css" />
                <link href="{{ asset('/assets/css/app-dark.min.css') }}" rel="stylesheet" type="text/css" />

                <style type="text/css">
                    .notification-msg {
                        color: rgb(195, 203, 228); 
                        font-weight: 450;
                    }
                    .notification-time {
                        color: #fff;
                    }
                </style>
            {{-- @endif --}}

        {{-- @else
            <link href="{{ asset('/assets/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css" />
            <link href="{{ asset('/assets/css/app.min.css') }}" rel="stylesheet" type="text/css" />
        @endif --}}

        <style type="text/css">
            .navigation.nav-sticky {
                background-color: #fff !important;
            }

            .mfp-img {
                max-height: 451px !important;
            }

            .mfp-title a {
                display: none !important;
            }
        </style>

        <!-- Lightbox css -->
        <link href="{{ asset('/assets/libs/magnific-popup/magnific-popup.css') }}" rel="stylesheet" type="text/css" />

        @yield('styles')

    </head>

    <body data-bs-spy="scroll" data-bs-target="#topnav-menu" data-bs-offset="60">

        <nav class="navbar navbar-expand-lg navigation fixed-top sticky">
            <div class="container">
                <a class="navbar-logo" href="{{ url('/') }}">
                    <img src="{{ config('core.image.default.logo2d') }}" class="editPro" alt="" height="80">
                </a>

                <button type="button" class="btn btn-sm px-3 font-size-16 d-lg-none header-item waves-effect waves-light" data-bs-toggle="collapse" data-bs-target="#topnav-menu-content">
                    <i class="fa fa-fw fa-bars"></i>
                </button>
              
                <div class="collapse navbar-collapse" id="topnav-menu-content">
                    <ul class="navbar-nav ms-auto" id="topnav-menu" >
                        <li class="nav-item">
                            <a class="nav-link active" href="{{ url('/') }}">Home</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" href="#">Events</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" href="#">Recent Deals</a>
                        </li>

                        {{-- <li class="nav-item">
                            <a class="nav-link @if(url()->full() == route('frontend.about')) active @endif" target="_blank" href="{{ route('frontend.about') }}">About</a>
                        </li>
                        
                        <li class="nav-item">
                            <a class="nav-link @if(url()->full() == route('frontend.faq')) active @endif" target="_blank" href="{{ route('frontend.faq') }}">FAQs</a>
                        </li>
 --}}
                        {{-- <li class="nav-item">
                            <a class="nav-link" href="">Contact Us</a>
                        </li> --}}

                    </ul>

                    <div class="my-2 ms-lg-2">
                        {{-- @if(Auth::user())
                            <a href="{{ route('dashboard') }}" class="btn btn-dark w-xs">Go To Dashboard</a>
                        @else
                            <a href="{{ route('login') }}" class="btn btn-success w-xs">Sign In</a>
                        @endif --}}
                    </div>
                </div>
            </div>
        </nav>

        @yield('content')

        <!-- Footer start -->
        <footer class="landing-footer">
            <div class="container">

                <div class="row">
                    <div class="col-lg-4 col-sm-6">
                        <div class="mb-4 mb-lg-0">
                            <h5 class="mb-3 footer-list-title">Company</h5>
                            <ul class="list-unstyled footer-list-menu">
                                <li><a href="#">Team</a></li>
                                <li><a href="#">News</a></li>
                                <li><a href="#">FAQs</a></li>
                                <li><a href="#">About Us</a></li>
                                <li><a href="#">Features</a></li>
                                
                            </ul>
                        </div>
                    </div>
                    
                    <div class="col-lg-4 col-sm-6">
                        <div class="mb-4 mb-lg-0">
                            <h5 class="mb-3 footer-list-title">Important Links</h5>
                            <ul class="list-unstyled footer-list-menu">
                                <li><a href="#">Tokens</a></li>
                                <li><a href="#">Roadmap</a></li>
                                <li><a href="#">FAQs</a></li>
                                <li><a href="#">Privacy Policy</a></li>
                                <li><a href="#">Terms & Conditions</a></li>
                            </ul>
                        </div>
                    </div>

                    <div class="col-lg-4 col-sm-6">
                        <div class="mb-4">
                            
                            <img src="{{ config('core.image.default.logo3d') }}" style="background: #fff;border-radius: 2px;" class="editPro" alt="" height="100">
                        </div>
    
                        <p class="mb-2"><script>document.write(new Date().getFullYear())</script> © Protagger. Developed by Snigdho</p>
                        <p>It will be as simple as occidental in fact, it will be to an english person, it will seem like simplified English, as a skeptical</p>
                    </div>

                    
                </div>
                
            </div>
            <!-- end container -->
        </footer>
        <!-- Footer end -->

        <!-- JAVASCRIPT -->
        <script src="{{ asset('/assets/libs/jquery/jquery.min.js') }}"></script>
        <script src="{{ asset('/assets/libs/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
        <script src="{{ asset('/assets/libs/metismenu/metisMenu.min.js') }}"></script>
        <script src="{{ asset('/assets/libs/simplebar/simplebar.min.js') }}"></script>
        <script src="{{ asset('/assets/libs/node-waves/waves.min.js') }}"></script>

        <script src="{{ asset('/assets/libs/jquery.easing/jquery.easing.min.js') }}"></script>

        <!-- Plugins js-->
        <script src="{{ asset('/assets/libs/jquery-countdown/jquery.countdown.min.js') }}"></script>

        <!-- owl.carousel js -->
        <script src="{{ asset('/assets/libs/owl.carousel/owl.carousel.min.js') }}"></script>

        <!-- ICO landing init -->
        <script src="{{ asset('/assets/js/pages/ico-landing.init.js') }}"></script>

        <script src="{{ asset('/assets/js/app.js') }}"></script>
        <script src="{{ asset('/assets/js/pages/form-validation.init.js') }}"></script>

        <!-- Magnific Popup-->
        <script src="{{ asset('/assets/libs/magnific-popup/jquery.magnific-popup.min.js') }}"></script>
        
        <!-- lightbox init js-->
        <script src="{{ asset('/assets/js/pages/lightbox.init.js') }}"></script>

        <script src="{{ asset('/assets/libs/select2/js/select2.min.js') }}"></script>

        @yield('scripts')

    </body>

</html>
