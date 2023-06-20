<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Take My IT & Medical Class</title>
    <meta name="description"
        content="Take My IT Class, programming, exams ranging form assignment, online semester class, discussions, proctored exams, and programing quiz with our professional team.">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Favicon -->
    @include('layouts.partials.styles')
    {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.min.js"
        integrity="sha512-3dZ9wIrMMij8rOH7X3kLfXAzwtcHpuYpEgQg1OA4QAob1e81H8ntUQmQm3pBudqIoySO5j0tHN4ENzA6+n2r4w=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script> --}}
    <style>
        .answer-area {
            display: none;
        }

        .show-indicator {
            cursor: pointer;
            text-decoration: none;
            color: blue;
        }
    </style>
    <link rel="stylesheet" href="{{ asset('backendIT/assets/css/main/app.css') }}">
    @livewireStyles
</head>

<body class="antialiased">

    @include('layouts.partials.header-frontend')


    <div class="slider_area d-flex align-items-center slider2 landing" id="home">
        <div class="container" style="margin-top: 10%;">
            <div class="row">
                <div class="single_slider">
                    <section class="section">
                        <div class="col-12 justify-content">
                            <div class="card mt-2 mb-5">
                                <div class="card-header">
                                    <h4>Test: {{ $test['0']['name'] }} <span class="float-start float-lg-end">Expected
                                            Number of
                                            Questions: 25</span></h4>
                                </div>
                                <div class="card-body mt-3 mb-3">
                                    @livewire('test-trial-exam', ['test_id' => $test[0]['id'], 'email' => request()->email, 'ip' => request()->ip()])
                                </div>
                            </div>
                        </div>
                    </section>
                </div>
            </div>
            <!-- Basic Tables start -->

        </div>
        {{-- <div class="intro__bg">
            <canvas id="intro__canvas" data-colors='["#FBA500", "#FF3C00", "#fff"]'></canvas>
        </div> --}}
    </div>
    <div class="footer-middle bg-dark2 pt-95" style="margin-top: 5%;">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-6 col-sm-12">
                    <div class="widget widgets-company-info">
                        <div class="footer-bottom-logo pb-40">
                            <img src="{{ asset('frontendIT/assets/images/fav-icon/logo-white.jpg') }}" alt="" />
                        </div>
                        <div class="company-info-desc">
                            <p>We are a team of professional experts in the IT, and Software engineering industry
                                who
                                are passionate and here to help you out to balance between work, online course and
                                family time
                            </p>
                        </div>
                        <div class="follow-company-info pt-3">
                            <div class="follow-company-text mr-3">
                                <a href="#">
                                    <p>Follow Us</p>
                                </a>
                            </div>
                            <div class="follow-company-icon">
                                <a href="#"><i class="fa fa-facebook"></i></a>
                                <a href="#"><i class="fa fa-twitter"></i></a>
                                <a href="#"><i class="fa fa-linkedin"></i></a>
                                <a href="#"><i class="fa fa-skype"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-12">
                    <div class="widget widget-nav-menu">
                        <h4 class="widget-title pb-4">Our Services</h4>
                        <div class="menu-quick-link-container ml-4">
                            <ul id="menu-quick-link" class="menu">
                                <li><a href="#">Online IT Courses</a></li>
                                <li><a href="#">Final Course Projects</a></li>
                                <li><a href="#">Custom Essays</a></li>
                                <li><a href="#">Proctored Exams and Quiz</a></li>
                                <li><a href="#">Thesis and Dissertations</a></li>
                                <li><a href="#">Coding and Programming Tasks</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-12">
                    <div class="widget widgets-company-info">
                        <h3 class="widget-title pb-4">TakeNursingITClass</h3>
                        <div class="company-info-desc">
                            <p>Quality Above Everything</p>
                        </div>
                        <div class="footer-social-info">
                            <p><span>Phone :</span>254718614983</p>
                        </div>
                        <div class="footer-social-info">
                            <p><span>Email:</span>excellentessayprof@gmail.com</p>
                        </div>

                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-12">
                    <div id="em-recent-post-widget">
                        <div class="single-widget-item">
                            <h4 class="widget-title pb-3">Popular Post</h4>
                            <div class="recent-post-item active pb-3">
                                <div class="recent-post-image mr-3">
                                    <a href="#">
                                        <img width="80" height="80"
                                            src="{{ asset('frontendIT/assets/images/recent1.jpg') }}" alt="">
                                    </a>
                                </div>
                                <div class="recent-post-text">
                                    <h6><a href="#">
                                            The Best Student Platform
                                        </a>
                                    </h6>
                                    <span class="rcomment">December 12, 2020</span>
                                </div>
                            </div>
                            <div class="recent-post-item pt-1">
                                <div class="recent-post-image mr-3">
                                    <a href="#">
                                        <img width="80" height="80"
                                            src="{{ asset('frontendIT/assets/images/recent3.jpg') }}" alt="">
                                    </a>
                                </div>
                                <div class="recent-post-text">
                                    <h6><a href="#">
                                            How can use our latest news by
                                        </a>
                                    </h6>
                                    <span class="rcomment">December 15, 2020</span>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>

            </div>
            <div class="row footer-bottom mt-70 pt-3 pb-1">
                <div class="col-lg-6 col-md-6">
                    <div class="footer-bottom-content">
                        <div class="footer-bottom-content-copy">
                            <p>© 2021 &lt;TakeMyNursingITClass/&gt;.All Rights Reserved. </p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6">
                    <div class="footer-bottom-right">
                        <div class="footer-bottom-right-text">
                            <a class="absod" href="#">Privacy Policy </a>
                            <a href="#"> Terms & Conditions</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <style>
        #whatsAppLink {
            position: fixed;
            z-index: 9999;
            float: left;
            left: 1.3em;
            top: 91%;
            margin-top: -25px;
            cursor: pointer;
            min-width: 50px;
            max-width: 240px;
            color: #fff;
            text-align: center;
            padding: 12px 21px;
            margin: 0 auto 0 auto;
            background: #20B038;
            -webkit-transition: All 0.5s ease;
            -moz-transition: All 0.5s ease;
            -o-transition: All 0.5s ease;
            -ms-transition: All 0.5s ease;
            transition: All 0.5s ease;
            border-radius: 50px;
        }

        @media(max-width: 768px) {
            .visible-xs {
                display: block;
            }

            .visible-lg {
                display: none;
            }
        }

        @media(min-width: 768px) {
            .visible-xs {
                display: none;
            }

            .visible-lg {
                display: inline-block;
            }
        }

        strong {
            color: #13425f !important;
        }
    </style>
    <!--==================================================-->
    <!----- End Techno Footer Middle Area ----->
    <!--==================================================-->
    <a class="visible-lg" id="whatsAppLink"
        href="https://web.whatsapp.com/send?phone=254718614983&amp;text=Hello, I need some help with my online course"
        target="_blank">
        <i class="fa fa-whatsapp"></i>&nbsp;&nbsp; WhatsApp Us
    </a>

    <a class="visible-xs" id="whatsAppLink"
        href="https://api.whatsapp.com/send?phone=254718614983&amp;text=Hello, I need some help with my online course"
        target="_blank">
        <i class="fa fa-whatsapp"></i>&nbsp;&nbsp; WhatsApp Us
    </a>
    @include('layouts.partials.scripts')
    <script>
        function showAnswer() {
            var answerArea = document.getElementById('answerArea');
            answerArea.style.display = 'block';
        }

        function showShortAnswer() {
            var shortAnswerArea = document.getElementById('shortAnswerArea');
            shortAnswerArea.style.display = 'block';
        }

        function showFullAnswer() {
            var fullAnswerArea = document.getElementById('fullAnswerArea');
            fullAnswerArea.style.display = 'block';
        }

        function showAnswerResource() {
            var answerResourceArea = document.getElementById('answerResourceArea');
            answerResourceArea.style.display = 'block';
        }
    </script>
    <!--End of Tawk.to Script-->
    <script type="text/javascript">
        function add_chatinline() {
            var hccid = 47676652;
            var nt = document.createElement("script");
            nt.async = true;
            nt.src = "https://www.mylivechat.com/chatinline.aspx?hccid=" + hccid;
            var ct = document.getElementsByTagName("script")[0];
            ct.parentNode.insertBefore(nt, ct);
        }
        add_chatinline();
    </script>

    @livewireScripts
</body>

</html>
