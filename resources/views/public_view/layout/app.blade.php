<!DOCTYPE html>
<html lang="en">
    <head>
        <title>@yield('title')</title>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />

        <link href="https://fonts.googleapis.com/css?family=Muli:300,400,700,900" rel="stylesheet" />
        <link rel="stylesheet" href="{{ asset('pv_assets/fonts/icomoon/style.css') }}" />

        <link rel="stylesheet" href="{{ asset('pv_assets/css/bootstrap.min.css') }}" />
        <link rel="stylesheet" href="{{ asset('pv_assets/css/jquery-ui.css') }}" />
        <link rel="stylesheet" href="{{ asset('pv_assets/css/owl.carousel.min.css') }}" />
        <link rel="stylesheet" href="{{ asset('pv_assets/css/owl.theme.default.min.css') }}" />
        {{-- <link rel="stylesheet" href="css/owl.theme.default.min.css {{ asset('pv_assets/css/owl.theme.default.min.css') }}" /> --}}

        <link rel="stylesheet" href="{{ asset('pv_assets/css/jquery.fancybox.min.css') }}" />

        <link rel="stylesheet" href="{{ asset('pv_assets/css/bootstrap-datepicker.css') }}" />

        <link rel="stylesheet" href="{{ asset('pv_assets/fonts/flaticon/font/flaticon.css') }}" />

        <link rel="stylesheet" href="{{ asset('pv_assets/css/aos.css') }}" />
        <link href="{{ asset('pv_assets/css/jquery.mb.YTPlayer.min.css') }}" media="all" rel="stylesheet" type="text/css" />

        <link rel="stylesheet" href="{{ asset('pv_assets/css/style.css') }}" />
    
        <!-- Favicon -->
        <link rel="shortcut icon" href="{{ asset('admin_assets/img/favicon.ico') }}" type="image/x-icon">

    </head>

    <body data-spy="scroll" data-target=".site-navbar-target" data-offset="300">
        <div class="site-wrap">
            <div class="site-mobile-menu site-navbar-target">
                <div class="site-mobile-menu-header">
                    <div class="site-mobile-menu-close mt-3">
                        <span class="icon-close2 js-menu-toggle"></span>
                    </div>
                </div>
                <div class="site-mobile-menu-body"></div>
            </div>

            <div class="py-2 bg-light">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-lg-9 d-none d-lg-block">
                            <a href="#" target="_blank" class="small mr-3"><span class="icon-question-circle-o mr-2"></span> Have a questions?</a>
                            <a href="tel:+8801944715158" target="_blank" class="small mr-3"><span class="icon-phone2 mr-2"></span> +8801944715158</a>
                            <a href="mailto:mttijamalpur@gmail.com" target="_blank" class="small mr-3"><span class="icon-envelope-o mr-2"></span>mttijamalpur@gmail.com</a>
                        </div>
                        <div class="col-lg-3 text-right">
                            {{-- <a href="{{ route('login') }}" class="small mr-3"><span class="icon-unlock-alt"></span> Log In</a> --}}
                            <a href="{{ route('login') }}" class="small btn btn-primary px-4 py-2 rounded-0"><span class="icon-users"></span> Log In</a>
                        </div>
                    </div>
                </div>
            </div>
            <header class="site-navbar py-4 js-sticky-header site-navbar-target" role="banner">
                <div class="container">
                    <div class="d-flex align-items-center">
                        <div class="site-logo">
                            <a href="{{ route('home') }}" class="d-block">
                                <img src="{{ asset('pv_assets/images/logo.png') }}" alt="Logo" class="img-fluid" />
                            </a>
                        </div>
                        <div class="mr-auto">
                            <nav class="site-navigation position-relative text-right" role="navigation">
                                <ul class="site-menu main-menu js-clone-nav mr-auto d-none d-lg-block">
                                    <li class="active">
                                        <a href="{{ route('home') }}" class="nav-link text-left">Home</a>
                                    </li>
                                    <li class="has-children">
                                        <a href="{{ route('all_courses') }}" class="nav-link text-left">Courses</a>
                                        <ul class="dropdown" id="">
                                            @php
                                            $header_courses = App\Models\course::header_courses();
                                            @endphp
                                            @foreach ($header_courses as $header_course)

                                            <li><a href="{{ route('single_course', ['course_id'=>$header_course->course_id]) }}">{{ $header_course->title }}</a></li>
                                                
                                            @endforeach
                                            {{-- <li><a href="teachers.php">Diploma in Computer Science & ICT</a></li>
                                            <li><a href="about.php">Certificate in Computer Science & Application</a></li>
                                            <li><a href="teachers.php">Diploma in Computer Hardware, Software & Troubleshooting</a></li>
                                            <li><a href="about.php">Diploma in Graphics Design</a></li>
                                            <li><a href="teachers.php">Diploma in Multilingual Secretarial Science (Data Entry/Typing)</a></li>
                                            <li><a href="about.php">Certificate in Library & Information Science</a></li>
                                            <li><a href="teachers.php">Diploma in Electric & Electronic Technology</a></li>
                                            <li><a href="about.php">Diploma in Dress Making & Tailoring Technology</a></li>
                                            <li><a href="teachers.php">Web Design & Development</a></li>
                                            <li><a href="about.php">Diploma in Land Surveyor Technology Course (Aminship)</a></li>
                                            <li><a href="about.php">Diploma In Auto CAD</a></li>
                                            <li><a href="about.php">Diplolma In Welding Technology</a></li>
                                            <li><a href="about.php">Diplolma In Sprayer Mechanic Technology</a></li>
                                            <li><a href="about.php">Certificate/Diploma Course in Plumbing, Refrigeration & Aircondition</a></li>
                                            <li><a href="about.php">Diploma in Mason, Steel Fixture, Carpenter, Sattering, Carpenter & Painter</a></li>
                                            <li><a href="about.php">Diploma in Food Processing & Preservation Technology</a></li>
                                            <li><a href="about.php">Diploma in Fish Culture Technology</a></li>
                                            <li><a href="about.php">Certificate in Rural Agriculture Development</a></li>
                                            <li><a href="about.php">Diploma in Livestock & Poultry Technology</a></li>
                                            <li><a href="about.php">Certificate in Arts & Culture (Professional)</a></li>
                                            <li><a href="about.php">Diploma in Medical Assistant</a></li>
                                            <li><a href="about.php">Diploma in Medical Professional Course for Rural Doctors on (Allopathy)</a></li> --}}
                                        </ul>
                                    </li>
                                    <li>
                                        <a href="{{ route('admission') }}" class="nav-link text-left">Admissions</a>
                                    </li>
                                    <li>
                                        <a href="#" class="nav-link text-left">Result</a>
                                    </li>
                                    <li>
                                        <a href="{{ route('contact_us') }}" class="nav-link text-left">Contact</a>
                                    </li>
                                </ul>
                            </nav>
                        </div>
                        <div class="ml-auto">
                            <div class="social-wrap">
                                <a target="_blank" href="https://www.facebook.com/MediaTechTrainingCenter"><span class="icon-facebook"></span></a>
                                <a target="_blank" href="https://www.youtube.com/@mediattc5387"><span class="icon-youtube"></span></a>
                                <a href="#"><span class="icon-linkedin"></span></a>

                                <a href="#" class="d-inline-block d-lg-none site-menu-toggle js-menu-toggle text-black"><span class="icon-menu h3"></span></a>
                            </div>
                        </div>
                    </div>
                </div>
            </header>
            @yield('content')
            <div class="footer">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-3">
                            <p class="mb-4"><a href="{{ route('home') }}"><img src="{{ asset('pv_assets/images/logo.png') }}" alt="Logo" class="img-fluid" /></a></p>
                            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Beatae nemo minima qui dolor, iusto iure.</p>
                            <p><a href="#">Learn More</a></p>
                        </div>
                        <div class="col-lg-3">
                            <h3 class="footer-heading"><span>Our Campus</span></h3>
                            <ul class="list-unstyled">
                                <li><a href="#">Acedemic</a></li>
                                {{-- <li><a href="#">News</a></li>
                                <li><a href="#">Our Interns</a></li>
                                <li><a href="#">Our Leadership</a></li>
                                <li><a href="#">Careers</a></li>
                                <li><a href="#">Human Resources</a></li> --}}
                            </ul>
                        </div>
                        <div class="col-lg-3">
                            <h3 class="footer-heading"><span>Our Courses</span></h3>
                            <ul class="list-unstyled">
                                <li><a href="#">Math</a></li>
                                <li><a href="#">Science &amp; Engineering</a></li>
                                <li><a href="#">Arts &amp; Humanities</a></li>
                                <li><a href="#">Economics &amp; Finance</a></li>
                                <li><a href="#">Business Administration</a></li>
                                <li><a href="#">Computer Science</a></li>
                            </ul>
                        </div>
                        <div class="col-lg-3">
                            <h3 class="footer-heading"><span>Contact</span></h3>
                            <ul class="list-unstyled">
                                <li><a href="#">Help Center</a></li>
                                <li><a href="#">Support Community</a></li>
                                <li><a href="#">Press</a></li>
                                <li><a href="#">Share Your Story</a></li>
                                <li><a href="#">Our Supporters</a></li>
                            </ul>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-12">
                            <div class="copyright">
                                <p>
                                    <!-- Links of copyright and developer -->
                                    Copyright &copy;
                                    <script>
                                        document.write(new Date().getFullYear());
                                    </script>
                                    All rights reserved <i class="icon-heart" aria-hidden="true"></i> by <a href="{{ route('home') }}" target="_blank">MediaTTC</a>
                                    <p>Made by <a href="https://wa.me/+8801734167539" target="_blank" rel="noopener noreferrer">Holy IT</a></p>
                                    <!-- Links of copyright and developer -->
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- .site-wrap -->

        <!-- loader -->
        <div id="loader" class="show fullscreen">
            <svg class="circular" width="48px" height="48px">
                <circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee" />
                <circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#51be78" />
            </svg>
        </div>

        <script src="{{ asset('pv_assets/js/jquery-3.3.1.min.js') }}"></script>
        <script src="{{ asset('pv_assets/js/jquery-migrate-3.0.1.min.js') }}"></script>
        <script src="{{ asset('pv_assets/js/jquery-ui.js') }}"></script>
        <script src="{{ asset('pv_assets/js/popper.min.js') }}"></script>
        <script src="{{ asset('pv_assets/js/bootstrap.min.js') }}"></script>
        <script src="{{ asset('pv_assets/js/owl.carousel.min.js') }}"></script>
        <script src="{{ asset('pv_assets/js/jquery.stellar.min.js') }}"></script>
        <script src="{{ asset('pv_assets/js/jquery.countdown.min.js') }}"></script>
        <script src="{{ asset('pv_assets/js/bootstrap-datepicker.min.js') }}"></script>
        <script src="{{ asset('pv_assets/js/jquery.easing.1.3.js') }}"></script>
        <script src="{{ asset('pv_assets/js/aos.js') }}"></script>
        <script src="{{ asset('pv_assets/js/jquery.fancybox.min.js') }}"></script>
        <script src="{{ asset('pv_assets/js/jquery.sticky.js') }}"></script>
        <script src="{{ asset('pv_assets/js/jquery.mb.YTPlayer.min.js') }}"></script>
        <script src="{{ asset('pv_assets/js/main.js') }}"></script>

    </body>
</html>



