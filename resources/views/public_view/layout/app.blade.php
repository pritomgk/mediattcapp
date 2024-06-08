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

        {{-- custom css  --}}

        <style>
            @media print {
                /* Sets print view with media query */

                /* body * { */
                    /* display: none; */
                /* } */
                /* Sets body and elements in it to not display */
            
                /* #result, #result * {
                    display: block;
                } */
                /* Sets print area element and all its content to display */
            }

        </style>


        <script nonce="e8fac500-d639-43e1-8c24-3665ee4fc2bd">
            try {
                (function (w, d) {
                    !(function (k, l, m, n) {
                        k[m] = k[m] || {};
                        k[m].executed = [];
                        k.zaraz = { deferred: [], listeners: [] };
                        k.zaraz.q = [];
                        k.zaraz._f = function (o) {
                            return async function () {
                                var p = Array.prototype.slice.call(arguments);
                                k.zaraz.q.push({ m: o, a: p });
                            };
                        };
                        for (const q of ["track", "set", "debug"]) k.zaraz[q] = k.zaraz._f(q);
                        k.zaraz.init = () => {
                            var r = l.getElementsByTagName(n)[0],
                                s = l.createElement(n),
                                t = l.getElementsByTagName("title")[0];
                            t && (k[m].t = l.getElementsByTagName("title")[0].text);
                            k[m].x = Math.random();
                            k[m].w = k.screen.width;
                            k[m].h = k.screen.height;
                            k[m].j = k.innerHeight;
                            k[m].e = k.innerWidth;
                            k[m].l = k.location.href;
                            k[m].r = l.referrer;
                            k[m].k = k.screen.colorDepth;
                            k[m].n = l.characterSet;
                            k[m].o = new Date().getTimezoneOffset();
                            if (k.dataLayer) for (const x of Object.entries(Object.entries(dataLayer).reduce((y, z) => ({ ...y[1], ...z[1] }), {}))) zaraz.set(x[0], x[1], { scope: "page" });
                            k[m].q = [];
                            for (; k.zaraz.q.length; ) {
                                const A = k.zaraz.q.shift();
                                k[m].q.push(A);
                            }
                            s.defer = !0;
                            for (const B of [localStorage, sessionStorage])
                                Object.keys(B || {})
                                    .filter((D) => D.startsWith("_zaraz_"))
                                    .forEach((C) => {
                                        try {
                                            k[m]["z_" + C.slice(7)] = JSON.parse(B.getItem(C));
                                        } catch {
                                            k[m]["z_" + C.slice(7)] = B.getItem(C);
                                        }
                                    });
                            s.referrerPolicy = "origin";
                            s.src = "../../cdn-cgi/zaraz/sd0d9.js?z=" + btoa(encodeURIComponent(JSON.stringify(k[m])));
                            r.parentNode.insertBefore(s, r);
                        };
                        ["complete", "interactive"].includes(l.readyState) ? zaraz.init() : k.addEventListener("DOMContentLoaded", zaraz.init);
                    })(w, d, "zarazData", "script");
                })(window, document);
            } catch (e) {
                throw (fetch("/cdn-cgi/zaraz/t"), e);
            }
        </script>
                
        <script>
            window.onload = function () {
            document.getElementById("download")
                .addEventListener("click", () => {
                    const result = this.document.getElementById("result");
                    console.log(result);
                    console.log(window);
                    var opt = {
                        margin: 0.1,
                        filename: 'result.pdf',
                        image: { type: 'jpeg', quality: 0.98 },
                        html2canvas: { scale: 2 },
                        jsPDF: { unit: 'in', format: 'letter', orientation: 'portrait' }
                    };
                    html2pdf().from(result).set(opt).save();
                })
        }


        </script>

        <script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.9.2/html2pdf.bundle.js"></script>

    </head>

    <body data-spy="scroll" data-target=".site-navbar-target" data-offset="300" id="body">
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
                        <div class="col-lg-7 d-none d-lg-block">
                            <a href="#" target="_blank" class="small mr-3"><span class="icon-question-circle-o mr-2"></span> Have a questions?</a>
                            <a href="tel:+8801944715158" target="_blank" class="small mr-3"><span class="icon-phone2 mr-2"></span> +8801944715158</a>
                            <a href="mailto:mttijamalpur@gmail.com" target="_blank" class="small mr-3"><span class="icon-envelope-o mr-2"></span>mttijamalpur@gmail.com</a>
                        </div>
                        <div class="col-lg-5 text-right">
                            <a href="{{ route('result') }}" class="small mr-3"><span class="icon-certificate"></span> Individual Result</a>
                            <a href="{{ route('institution_result_course') }}" class="small mr-3"><span class="icon-certificate"></span> Institute Result</a>
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
                                    <li class="has-children">
                                        <a href="{{ route('result') }}" class="nav-link text-left">Result</a>
                                        <ul class="dropdown" id="">

                                            <li>
                                                <a href="{{ route('result') }}">Individual</a>
                                            </li>

                                            <li>
                                                <a href="{{ route('institution_result_course') }}">Institution</a>
                                            </li>
                                                
                                        </ul>
                                    </li>
                                    <li>
                                        <a href="{{ route('contact_us') }}" class="nav-link text-left">Contact</a>
                                    </li>
                                </ul>
                            </nav>
                        </div>

                        <!-- <div class="mr-auto">
                            <nav class="site-navigation position-relative text-right" role="navigation">
                                <ul class="site-menu main-menu js-clone-nav mr-auto d-none d-lg-block">
                                    <li class="active">
                                        <a href="{{ route('home') }}" class="nav-link text-left">Home</a>
                                    </li>
                                    <li class="has-children">
                                        <a href="about.html" class="nav-link text-left">About Us</a>
                                        <ul class="dropdown">
                                            <li><a href="teachers.html">Our Teachers</a></li>
                                            <li><a href="about.html">Our School</a></li>
                                        </ul>
                                    </li>
                                    <li>
                                        <a href="{{ route('admission') }}" class="nav-link text-left">Admissions</a>
                                    </li>
                                    <li>
                                        <a href="{{ route('result') }}" class="nav-link text-left">Result</a>
                                    </li>
                                    <li>
                                        <a href="{{ route('contact_us') }}" class="nav-link text-left">Contact</a>
                                    </li>
                                </ul>
                            </nav>
                        </div> -->

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
                                    <p>Made by <a href="https://techpartit.net/" target="_blank" rel="noopener noreferrer">Techpart IT</a></p>
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

        <script async src="https://www.googletagmanager.com/gtag/js?id=UA-23581568-13"></script>
        <script>
            window.dataLayer = window.dataLayer || [];
            function gtag() {
                dataLayer.push(arguments);
            }
            gtag("js", new Date());

            gtag("config", "UA-23581568-13");
        </script>

        <script type="text/javascript">

            // document.getElementById('printBtn').addEventListener('click', () => { window.print() });
            // Prints area to which class was assigned only
            function printResult(){
                var body = document.getElementById('body').innerHTML;
                var result = document.getElementById('result').innerHTML;
                document.getElementById('body').innerHTML = result;
                window.print();
                document.getElementById('body').innerHTML = body;
            }

        </script>

        <script
            defer
            src="https://static.cloudflareinsights.com/beacon.min.js/v84a3a4012de94ce1a686ba8c167c359c1696973893317"
            integrity="sha512-euoFGowhlaLqXsPWQ48qSkBSCFs3DPRyiwVu3FjR96cMPx+Fr+gpWRhIafcHwqwCqWS42RZhIudOvEI+Ckf6MA=="
            data-cf-beacon='{"rayId":"86dabd1058bbbc21","b":1,"version":"2024.3.0","token":"cd0b4b3a733644fc843ef0b185f98241"}'
            crossorigin="anonymous"
        ></script>

    </body>
</html>



