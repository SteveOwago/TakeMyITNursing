<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>Take My IT & Medical Class</title>
        <meta name="description" content="Take My IT Class, programming, exams ranging form assignment, online semester class, discussions, proctored exams, and programing quiz with our professional team.">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- Favicon -->
        @include('layouts.partials.styles')

    </head>
    <body class="antialiased">

    @include('layouts.partials.header-frontend')

    <!--==================================================-->
    <!----- Start Techno Slider Area ----->
    <!--==================================================-->
    <div class="slider_area d-flex align-items-center slider2 landing" id="home">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="single_slider">
                        <div class="slider_content text-center">
                            <div class="slider_text">
                                <div class="slider_text_inner">
                                    <h1>Take My Nursing and IT Exam Tests</h1>

                                </div>
                                @if (\Session::has('message'))
                                    <div class="alert alert-success alert-block">
                                        <button type="button" class="close" data-dismiss="alert">×</button>
                                        <strong>{!! \Session::get('message') !!}</strong>
                                    </div>
                                @endif
                                <div class="slider_text_desc pt-4">
                                    <p>Our specialised Team of Examiners in Different Subject Domains have Created Tests
                                        Our Tests Covers Examinations in Medical & Nursing Courses and IT & Computer Science Courses.
                                        Click on the button below to get started.
                                        {{-- We Cover and Handle  Online Courses, Exams, Proctored exams in Medical and Nursing Courses, Programming Projects, Essays,assignments, Thesis, and Research papers in the Field of Technology, Programming, and Coding.--}}
                                    </p>
                                </div>
                                <div class="slider_button pt-5 d-flex">
                                    <div class="button">
                                        <a href="{{route('tests.trial')}}">Take Trial Test Exam<i class="fa fa-long-arrow-right"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="intro__bg">
            <canvas id="intro__canvas" data-colors='["#FBA500", "#FF3C00", "#fff"]'></canvas>
        </div>
    </div>
    <!--==================================================-->
    <!----- End Techno Slider Area ----->
    <!--==================================================-->

    <!--==================================================-->
    <!----- Start Techno Flipbox Top Feature Area ----->
    <!--==================================================-->
    <div class="flipbox_area top_feature">
        <div class="container">
            <div class="row nagative_margin">
                <div class="col-lg-3 col-md-6 col-sm-12 col-xs-6">
                    <div class="techno_flipbox mb-30">
                        <div class="techno_flipbox_font">
                            <div class="techno_flipbox_inner">
                                <div class="techno_flipbox_icon">
                                    <div class="icon">
                                        <i class="flaticon-global-1"></i>
                                    </div>
                                </div>
                                <div class="flipbox_title">
                                    <h3>Online Medical & Nursing Exam Tests</h3>
                                </div>
                            </div>
                        </div>
                        <div class="techno_flipbox_back">
                            <div class="techno_flipbox_inner">
                                <div class="flipbox_title">
                                    <h3>Online Medical & Nursing Tests</h3>
                                </div>
                                <div class="flipbox_desc">
                                    <p>The System has unlimited Test attempts for our Students. The Tests provides a Full Report and Analysis of the Test.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-12 col-xs-6">
                    <div class="techno_flipbox mb-30">
                        <div class="techno_flipbox_font">
                            <div class="techno_flipbox_inner">
                                <div class="techno_flipbox_icon">
                                    <div class="icon">
                                        <i class="flaticon-data"></i>
                                    </div>
                                </div>
                                <div class="flipbox_title">
                                    <h3>Solution For Tests and Quiz</h3>
                                </div>
                            </div>
                        </div>
                        <div class="techno_flipbox_back">
                            <div class="techno_flipbox_inner">
                                <div class="flipbox_title">
                                    <h3>Test Answers & Explanation</h3>
                                </div>
                                <div class="flipbox_desc">
                                    <p>Each Question answer is explanined fully, Additional revisions resource is also included in the Tests report for each question</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-12 col-xs-6">
                    <div class="techno_flipbox mb-30">
                        <div class="techno_flipbox_font">
                            <div class="techno_flipbox_inner">
                                <div class="techno_flipbox_icon">
                                    <div class="icon">
                                        <i class="flaticon-interaction"></i>
                                    </div>
                                </div>
                                <div class="flipbox_title">
                                    <h3>Continuous Evaluation</h3>
                                </div>
                            </div>
                        </div>
                        <div class="techno_flipbox_back">
                            <div class="techno_flipbox_inner">
                                <div class="flipbox_title">
                                    <h3>Continous Evaluation and Assessment</h3>
                                </div>
                                <div class="flipbox_desc">
                                    <p>Student can reevaluate themselves on a Test by doing unlimited tests to get better with time.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-12 col-xs-6">
                    <div class="techno_flipbox mb-30">
                        <div class="techno_flipbox_font">
                            <div class="techno_flipbox_inner">
                                <div class="techno_flipbox_icon">
                                    <div class="icon">
                                        <i class="flaticon-developer"></i>
                                    </div>
                                </div>
                                <div class="flipbox_title">
                                    <h3>Best Experts in The Field </h3>
                                </div>
                            </div>
                        </div>
                        <div class="techno_flipbox_back">
                            <div class="techno_flipbox_inner">
                                <div class="flipbox_title">
                                    <h3>Our Examiners</h3>
                                </div>
                                <div class="flipbox_desc">
                                    <p>Our Examiners guarantees passing on first attempt in actual Exams. The Examiners aim to achieve the best out come in preparedness of the Student</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <!--==================================================-->
    <!----- End Techno Flipbox Top Feature Area ----->
    <!--==================================================-->
    <!--==================================================-->
    <!----- Start Techno How IT Work Area ----->
    <!--==================================================-->
    <div class="how_it_work pt-50 pb-65" id="how-it-works">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section_title text_center mb-60 mt-3">

                        <div class="section_sub_title uppercase mb-3">
                            <h6>HOW IT WORKS</h6>
                        </div>
                        <div class="section_main_title">
                            <h1>Our Working Process</h1>
                        </div>
                        <div class="em_bar">
                            <div class="em_bar_bg"></div>
                        </div>

                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4 col-sm-12">
                    <div class="single_it_work mb-4">
                        <div class="single_it_work_content pl-2 pr-2">
                            <div class="single_it_work_content_list pb-5">
                                <span>1</span>
                            </div>
                            <div class="single_work_content_title pb-2">
                                <h4>Interact With Our Test</h4>
                            </div>
                            <div class="single_it_work_content_text pt-1">
                                <p>Our System Creates a One-time Test with 30 Question from Within Your Selected Subject Area. The system will Give You a Summary of Your Score.</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 col-sm-12">
                    <div class="single_it_work mb-4">
                        <div class="single_it_work_content pl-2 pr-2">
                            <div class="single_it_work_content_list pb-5">
                                <span>2</span>
                            </div>
                            <div class="single_work_content_title pb-2">
                                <h4>Subscription To Service</h4>
                            </div>
                            <div class="single_it_work_content_text pt-1">
                                <p>Our Service Packages are renewable with an Option of cancelling at any time. Click Here to View our Pricing Services Available.</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 col-sm-12">
                    <div class="single_it_work mb-4">
                        <div class="single_it_work_content pl-2 pr-2">
                            <div class="single_it_work_content_list three pb-5">
                                <span>3</span>
                            </div>
                            <div class="single_work_content_title pb-2">
                                <h4>Enjoy the Service</h4>
                            </div>
                            <div class="single_it_work_content_text pt-1">
                                <p>The system offers a wide range of Tests from Diferent Subject Areas. The Revision of the Tests Comes alongside with a Detailed</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--==================================================-->
    <!----- End Techno How IT Work Area ----->
    <!--==================================================-->

    <!--==================================================-->
    <!----- Start Techno Flipbox Area ----->
    <!--==================================================-->

    <div class="flipbox_area pt-85 pb-70" id="services" style="background-image:url({{asset('frontendIT/assets/images/slider/slider-4.jpg')}})"; >
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section_title text_center white mb-55">
                        <div class="section_sub_title uppercase mb-3">
                            <h6>SERVICES</h6>
                        </div>
                        <div class="section_main_title">
                            <h1>Provide Exclusive Services</h1>
                        </div>
                        <div class="em_bar">
                            <div class="em_bar_bg"></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-4 col-md-6 col-sm-12 col-xs-6">
                    <div class="techno_flipbox mb-30">
                        <div class="techno_flipbox_font">
                            <div class="techno_flipbox_inner">
                                <div class="techno_flipbox_icon">
                                    <div class="icon">
                                        <i class="flaticon-padlock"></i>
                                    </div>
                                </div>
                                <div class="flipbox_title">
                                    <h3>Nursing School Test Examinations</h3>
                                </div>
                                <div class="flipbox_desc">
                                    <p>There are Various Test Evaluation for Nursing School.</p>
                                </div>
                            </div>
                        </div>
                        <div class="techno_flipbox_back " style="background-image:url({{asset('frontendIT/assets/images/feature1.jpg')}});">
                            <div class="techno_flipbox_inner">
                                <div class="flipbox_title">
                                    <h3>TEAS, HESI, NLN PAX & ACT and SAT</h3>
                                </div>
                                <div class="flipbox_desc">
                                    <p>The System Unlimited Tests and Exam Questions for TEAS, HESI,  NLN PAX and ACT & SAT  Exams</p>
                                </div>
                                <div class="flipbox_button">
                                    <a  href="#https://web.whatsapp.com/send?phone=254718614983&amp;text=Hello, I need some help with my online course"  target="_blank">Learn More<i class="fa fa-angle-double-right"></i></a>
                                    {{-- <a  href="https://web.whatsapp.com/send?phone=254718614983&amp;text=Hello, I need some help with my online course"  target="_blank">Chat on WhatsApp<i class="fa fa-angle-double-right"></i></a> --}}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-12 col-xs-6">
                    <div class="techno_flipbox mb-30">
                        <div class="techno_flipbox_font">
                            <div class="techno_flipbox_inner">
                                <div class="techno_flipbox_icon">
                                    <div class="icon">
                                        <i class="flaticon-intelligent"></i>
                                    </div>
                                </div>
                                <div class="flipbox_title">
                                    <h3>Medical School Test Examinations</h3>
                                </div>
                                <div class="flipbox_desc">
                                    <p>There are Various Test Evaluation for Nursing School.</p>
                                </div>
                            </div>
                        </div>
                        <div class="techno_flipbox_back " style="background-image:url({{asset('frontendIT/assets/images/feature2.jpg')}});">
                            <div class="techno_flipbox_inner">
                                <div class="flipbox_title">
                                    <h3>MCAT, DAT and GRE </h3>
                                </div>
                                <div class="flipbox_desc">
                                    <p>The System Unlimited Tests and Exam Questions for MCAT, MCAT - Orthopedic, GRE and Dental Admission Test (DAT)</p>
                                </div>
                                <div class="flipbox_button">
                                    <a  href="#https://web.whatsapp.com/send?phone=254718614983&amp;text=Hello, I need some help with my online course"  target="_blank">Learn More<i class="fa fa-angle-double-right"></i></a>
                                   </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-12 col-xs-6">
                    <div class="techno_flipbox mb-30">
                        <div class="techno_flipbox_font">
                            <div class="techno_flipbox_inner">
                                <div class="techno_flipbox_icon">
                                    <div class="icon">
                                        <i class="flaticon-code"></i>
                                    </div>
                                </div>
                                <div class="flipbox_title">
                                    <h3>Web Development</h3>
                                </div>
                                <div class="flipbox_desc">
                                    <p>Custom Web App Development Projects for your Final Projects</p>
                                </div>
                            </div>
                        </div>
                        <div class="techno_flipbox_back " style="background-image:url(frontendIT/assets/images/feature3.jpg')}});">
                            <div class="techno_flipbox_inner">
                                <div class="flipbox_title">
                                    <h3>Web Development Projects</h3>
                                </div>
                                <div class="flipbox_desc">
                                    <p>Our Software And Web Devs will help you finish your final year project. Let's Discuss About your Final Year Project on What's App</p>
                                </div>
                                <div class="flipbox_button">
                                    <a  href="https://web.whatsapp.com/send?phone=254718614983&amp;text=Hello, I need some help with my online course"  target="_blank">Chat on WhatsApp<i class="fa fa-angle-double-right"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-12 col-xs-6">
                    <div class="techno_flipbox mb-30">
                        <div class="techno_flipbox_font">
                            <div class="techno_flipbox_inner">
                                <div class="techno_flipbox_icon">
                                    <div class="icon">
                                        <i class="flaticon-content-writing"></i>
                                    </div>
                                </div>
                                <div class="flipbox_title">
                                    <h3>Essays and Assignment</h3>
                                </div>
                                <div class="flipbox_desc">
                                    <p>We help you write custom essays, research proposals, in the IT related topics</p>
                                </div>
                            </div>
                        </div>
                        <div class="techno_flipbox_back " style="background-image:url({{asset('frontendIT/assets/images/feature3.jpg')}});">
                            <div class="techno_flipbox_inner">
                                <div class="flipbox_title">
                                    <h3>Essays and Assignment</h3>
                                </div>
                                <div class="flipbox_desc">
                                    <p>We handle Thesis, Research Proposals, Software Documentations, Custom Essays on Different topics, and s/w Product Description Articles</p>
                                </div>
                                <div class="flipbox_button">
                                    <a  href="https://web.whatsapp.com/send?phone=254718614983&amp;text=Hello, I need some help with my online course"  target="_blank">Chat on WhatsApp<i class="fa fa-angle-double-right"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-12 col-xs-6">
                    <div class="techno_flipbox mb-30">
                        <div class="techno_flipbox_font">
                            <div class="techno_flipbox_inner">
                                <div class="techno_flipbox_icon">
                                    <div class="icon">
                                        <i class="flaticon-bar-chart"></i>
                                    </div>
                                </div>
                                <div class="flipbox_title">
                                    <h3>Grade Booster</h3>
                                </div>
                                <div class="flipbox_desc">
                                    <p>We also Take Halfway Done Courses to help you boost your overall mean Grade</p>
                                </div>
                            </div>
                        </div>
                        <div class="techno_flipbox_back " style="background-image:url({{asset('frontendIT/assets/images/feature1.jpg')}});">
                            <div class="techno_flipbox_inner">
                                <div class="flipbox_title">
                                    <h3>Boost Your Grades</h3>
                                </div>
                                <div class="flipbox_desc">
                                    <p>Share with us your details about the course and leave everything to us. We will help you scoop higher grades in the remaining Sections.</p>
                                </div>
                                <div class="flipbox_button">
                                    <a  href="https://web.whatsapp.com/send?phone=254718614983&amp;text=Hello, I need some help with my online course"  target="_blank">Chat on WhatsApp<i class="fa fa-angle-double-right"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-12 col-xs-6">
                    <div class="techno_flipbox mb-30">
                        <div class="techno_flipbox_font">
                            <div class="techno_flipbox_inner">
                                <div class="techno_flipbox_icon">
                                    <div class="icon">
                                        <i class="flaticon-business-and-finance"></i>
                                    </div>
                                </div>
                                <div class="flipbox_title">
                                    <h3>Database Development</h3>
                                </div>
                                <div class="flipbox_desc">
                                    <p>We handle online courses, assignments, and tests on in Database design and development</p>
                                </div>
                            </div>
                        </div>
                        <div class="techno_flipbox_back " style="background-image:url({{asset('frontendIT/assets/images/feature2.jpg')}});">
                            <div class="techno_flipbox_inner">
                                <div class="flipbox_title">
                                    <h3>Database Design</h3>
                                </div>
                                <div class="flipbox_desc">
                                    <p>MySql, NoSql, Oracle. We Develop Database design schemas, DFDs, ERDs, and Database Normalization Assignments, quizzes, and tasks</p>
                                </div>
                                <div class="flipbox_button">
                                    <a  href="https://web.whatsapp.com/send?phone=254718614983&amp;text=Hello, I need some help with my online course"  target="_blank">Chat on WhatsApp<i class="fa fa-angle-double-right"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <!--==================================================-->
    <!----- End Techno Flipbox Area ----->
    <!--==================================================-->

    <!--==================================================-->
    <!----- Start Techno About Area ----->
    <!--==================================================-->
    <div class="about_area pt-70 pb-70" id="about">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-6 col-sm-12 col-xs-6">
                    <div class="section_title text_left mb-40 mt-3">
                        <div class="section_sub_title uppercase mb-3">
                            <h6>ABOUT US</h6>
                        </div>
                        <div class="section_main_title">
                            <h1>Preparing For Your Success</h1>
                            <h1>Provide Best <span>Services</span></h1>
                        </div>
                        <div class="em_bar">
                            <div class="em_bar_bg"></div>
                        </div>
                        <div class="section_content_text bold pt-5">
                            <p>We are a team of professional experts in the Nursing, Medicine, IT, and Software engineering industry who are passionate and here to help you out to balance between work, online course and family time.</p>
                        </div>
                    </div>
                    <div class="singel_about_left mb-30">
                        <div class="singel_about_left_inner mb-3">
                            <div class="singel-about-content boder pl-4">
                                <p>Time flies fast, but it's good you are the pilot. Just control your time well away from hijackers. Save time profitably; Spend time productively!</p>
                                <p>People who have fully prepared always save time. Albert Einstein was right to teach that if he is given six hours to chop down a tree, he would spend the first four sharpening the axes. When you are done with your action plans, work will be easier!</p>
                            </div>
                        </div>
                        <div class="singel_about_left_inner pl-4">
                            <div class="button two">
                                <a href="#contact">Get In Touch</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-12 col-xs-6">
                    <div class="single_about_thumb mb-3">
                        <div class="single_about_thumb_inner">
                            <img src="{{asset('frontendIT/assets/images/about-img2.png')}}" alt="" />
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--==================================================-->
    <!----- End Techno About Area ----->
    <!--==================================================-->



    <!--==================================================-->
    <!----- End Techno Case Study Area ----->
    <!--==================================================-->




    <!--==================================================-->
    <!----- Start Techno Portfolio Area ----->
    <!--==================================================-->
    <div class="portfolio_area pt-80 pb-70" id="portfolio">
        <div class="container">
            <div class="row">
                <!-- Start Section Tile -->
                <div class="col-lg-12">
                    <div class="section_title text_center mb-50 mt-3">

                        <div class="section_sub_title uppercase mb-3">
                            <h6>PORTFOLIO</h6>
                        </div>
                        <div class="section_main_title">
                            <h1>Our Latest Works To Consider</h1>
                            <h1>Just For You</h1>
                        </div>
                        <div class="em_bar">
                            <div class="em_bar_bg"></div>
                        </div>

                    </div>

                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="portfolio_nav">
                        <div class="portfolio_menu">
                            <ul class="menu-filtering">
                                <li class="current_menu_item" data-filter="*">All Works and Services</li>
                                <li data-filter=".physics" >Proctored Exams</li>
                                <li data-filter=".cemes" >Essays & Thesis</li>
                                <li data-filter=".math" >Online Course</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row image_load">
                <div class="col-lg-4 col-md-6 col-sm-12 grid-item physics english">
                    <div class="single_portfolio">
                        <div class="single_portfolio_inner">
                            <div class="single_portfolio_thumb">
                                <a href="#"><img src="{{asset('frontendIT/assets/images/portfolio/p1.jpg')}}" alt="" /></a>
                            </div>
                        </div>
                        <div class="single_portfolio_content">
                            <div class="single_portfolio_icon">
                                <a class="portfolio-icon venobox vbox-item" data-gall="myportfolio" href="{{asset('frontendIT/assets/images/portfolio/p1.jpg')}}"><i class="fa fa-search-plus"></i></a>
                            </div>
                            <div class="single_portfolio_content_inner">
                                <span>Online Course and Exams</span>
                                <h2><a href="#">Cengage | Canvas</a></h2>

                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-12 grid-item cemes">
                    <div class="single_portfolio">
                        <div class="single_portfolio_inner">
                            <div class="single_portfolio_thumb">
                                <a href="#"><img src="{{asset('frontendIT/assets/images/portfolio/p2.jpg')}}" alt="" /></a>
                            </div>
                        </div>
                        <div class="single_portfolio_content">
                            <div class="single_portfolio_icon">
                                <a class="portfolio-icon venobox vbox-item" data-gall="myportfolio" href="{{asset('frontendIT/assets/images/portfolio/p2.jpg')}}"><i class="fa fa-search-plus"></i></a>
                            </div>
                            <div class="single_portfolio_content_inner">
                                <span>Project Management</span>
                                <h2><a href="#">Management | Analysis | Development</a></h2>

                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-12 grid-item cemes">
                    <div class="single_portfolio">
                        <div class="single_portfolio_inner">
                            <div class="single_portfolio_thumb">
                                <a href="#"><img src="{{asset('frontendIT/assets/images/portfolio/p3.jpg')}}" alt="" /></a>
                            </div>
                        </div>
                        <div class="single_portfolio_content">
                            <div class="single_portfolio_icon">
                                <a class="portfolio-icon venobox vbox-item" data-gall="myportfolio" href="{{asset('frontendIT/assets/images/portfolio/p3.jpg')}}"><i class="fa fa-search-plus"></i></a>
                            </div>
                            <div class="single_portfolio_content_inner">
                                <span>Assignment Essay</span>
                                <h2><a href="#">Short Custom Essays | Quiz | Tests</a></h2>

                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-12 grid-item cemes math">
                    <div class="single_portfolio">
                        <div class="single_portfolio_inner">
                            <div class="single_portfolio_thumb">
                                <a href="#"><img src="{{asset('frontendIT/assets/images/portfolio/p4.jpg')}}" alt="" /></a>
                            </div>
                        </div>
                        <div class="single_portfolio_content">
                            <div class="single_portfolio_icon">
                                <a class="portfolio-icon venobox vbox-item" data-gall="myportfolio" href="{{asset('frontendIT/assets/images/portfolio/p4.jpg')}}"><i class="fa fa-search-plus"></i></a>
                            </div>
                            <div class="single_portfolio_content_inner">
                                <span>Writing Projects</span>
                                <h2><a href="#">Thesis | Project Proposals</a></h2>

                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-12 col-sm-12 grid-item physics english">
                    <div class="single_portfolio admin">
                        <div class="single_portfolio_inner">
                            <div class="single_portfolio_thumb">
                                <a href="#"><img src="{{asset('frontendIT/assets/images/portfolio/p5.jpg')}}" alt="" /></a>
                            </div>
                        </div>
                        <div class="single_portfolio_content">
                            <div class="single_portfolio_icon">
                                <a class="portfolio-icon venobox vbox-item" data-gall="myportfolio" href="{{asset('frontendIT/assets/images/portfolio/p5.jpg')}}"><i class="fa fa-search-plus"></i></a>
                            </div>
                            <div class="single_portfolio_content_inner">
                                <span>Online Proctored Exam</span>
                                <h2><a href="#">Peasonvue | Examity</a></h2>

                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-12 col-sm-12 grid-item math">
                    <div class="single_portfolio admin">
                        <div class="single_portfolio_inner">
                            <div class="single_portfolio_thumb">
                                <a href="#"><img src="{{asset('frontendIT/assets/images/portfolio/p6.jpg')}}" alt="" /></a>
                            </div>
                        </div>
                        <div class="single_portfolio_content">
                            <div class="single_portfolio_icon">
                                <a class="portfolio-icon venobox vbox-item" data-gall="myportfolio" href="{{asset('frontendIT/assets/images/portfolio/p6.jpg')}}"><i class="fa fa-search-plus"></i></a>
                            </div>
                            <div class="single_portfolio_content_inner">
                                <span>Discussion Posts</span>
                                <h2><a href="#">Discussion Response | Reflective Reviews</a></h2>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <!--==================================================-->
    <!----- Start Techno Video Area ----->
    <!--==================================================-->
    <div class="video_area pt-100 pb-200"style="background-image:url(frontendIT/assets/images/slider/bg.jpg')}})">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section_title text_center white mb-55">
                        <div class="section_main_title">
                            <h1>We Create Real Impact For Those</h1>
                            <h1>Who Partner With Us.</h1>
                        </div>
                        <div class="em_bar">
                            <div class="em_bar_bg"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="video_area pb-200">
        <div class="container">
            <div class="row mrt-200">
                <div class="col-lg-12">
                    <div class="single_video">
                        <div class="single_video_thumb">
                            <img src="{{asset('frontendIT/assets/images/slider/nurses.jpg')}}" alt="" />
                        </div>
                    </div>
                    <div class="single-video text-center">
                        <div class="video-icon mrt-345">
                            <h1 class="lead text-white">We are You Best Partner Ever</h1>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--==================================================-->
    <!----- End Techno Video Area ----->
    <!--==================================================-->



    <!--==================================================-->
    <!----- Start Techno Testimonial Area ----->
    <!--==================================================-->
    <div id="review" class="testimonial-bg pt-100 pb-70">
        <div id="container-general" class="ready anim-section-features anim-section-desc anim-section-quote">
            <section id="section-quote">
                <div class="col-lg-12">
                    <div class="section_title text_center mt-3">
                        <div class="section_sub_title uppercase mb-3">
                            <h6>TESTIMONIAL</h6>
                        </div>
                        <div class="section_main_title">
                            <h1>Our Happy <span>Clients Says</span></h1>
                        </div>
                        <div class="em_bar">
                            <div class="em_bar_bg"></div>
                        </div>
                    </div>
                </div>
                <!--Left Bubble Images-->
                <div class="container-pe-quote left">
                    <div class="pp-quote li-quote-1" data-textquote="quote-text-1">
                        <div class="img animated bounce"></div>
                    </div>
                    <div class="pp-quote li-quote-2" data-textquote="quote-text-2">
                        <div class="img animated bounce"></div>
                    </div>
                    <div class="pp-quote li-quote-3" data-textquote="quote-text-3">
                        <div class="img animated bounce"></div>
                    </div>
                    <div class="pp-quote li-quote-4 active" data-textquote="quote-text-4">
                        <div class="img animated bounce"></div>
                    </div>
                    <div class="pp-quote li-quote-5" data-textquote="quote-text-5">
                        <div class="img animated bounce"></div>
                    </div>
                    <div class="pp-quote li-quote-6" data-textquote="quote-text-6">
                        <div class="img animated bounce"></div>
                    </div>
                </div>
                <!--Left Bubble Images-->
                <!--Center Testimonials-->
                <div class="container-quote carousel-on">
                    <!--Testimonial 1-->
                    <div class="quote quote-text-3 hide-bottom" data-ppquote="li-quote-3">
                        <p>'Best Decision Ever! Am glad to be able to spend more time with My family...Keep up with the good work :)'</p>
                        <div class="container-info">
                            <div class="pp"></div>
                            <div class="name">Tom Abel De</div>
                            <div class="job">Student</div>
                        </div>
                    </div>
                    <!--Testimonial 2-->
                    <div class="quote quote-text-4 show" data-ppquote="li-quote-4">
                        <p>'Got quality grades..Absolutely worth every penny. I highly recommend them'</p>
                        <div class="container-info">
                            <div class="pp"></div>
                            <div class="name">Sanuka Santa</div>
                            <div class="job">Student</div>
                        </div>
                    </div>
                    <!--Testimonial 3-->
                    <div class="quote hide-bottom quote-text-5" data-ppquote="li-quote-5">
                        <p>'My product got the best description and top-notch reviews from them...Thank You So Much'</p>
                        <div class="container-info">
                            <div class="pp"></div>
                            <div class="name">Grégoire Pasquet</div>
                            <div class="job">Product Designer</div>
                        </div>
                    </div>
                    <!--Testimonial 4-->
                    <div class="quote hide-bottom quote-text-6" data-ppquote="li-quote-6">
                        <p>'What a lifesaver! You guys just came in to my help when i needed it the most. Got stuck with my project and am glad they helped me to complete it way before the deadline'</p>
                        <div class="container-info">
                            <div class="pp"></div>
                            <div class="name">Nicolas Puran</div>
                            <div class="job">Project Manager</div>
                        </div>
                    </div>
                    <!--Testimonial 5-->
                    <div class="quote hide-bottom quote-text-7" data-ppquote="li-quote-7">
                        <p>'Got my proctored exam done in no time. their software made things real. i finaly got all I wanted. i will come back for your services any day. Thank You guys'</p>
                        <div class="container-info">
                            <div class="pp"></div>
                            <div class="name">Mathieu Jouhet</div>
                            <div class="job">Networking Student</div>
                        </div>
                    </div>
                    <!--Testimonial 6-->
                    <div class="quote hide-bottom quote-text-8" data-ppquote="li-quote-8">
                        <p>'Redoing psychology course and exam was boring. At least i got to save my time spend more time with family and friends. Best Service ever. I highly recommend.'</p>
                        <div class="container-info">
                            <div class="pp"></div>
                            <div class="name">Charles Jadran</div>
                            <div class="job">Business Student</div>
                        </div>
                    </div>
                    <!--Testimonial 7-->
                    <div class="quote hide-bottom quote-text-9" data-ppquote="li-quote-9">
                        <p>'I can say 'Goodbye' to the stress, anxiety, and fear of failing in my online class. At last I've got my solution. One of the best services around.'</p>
                        <div class="container-info">
                            <div class="pp"></div>
                            <div class="name">Digong Frando</div>
                            <div class="job">Accounts Student</div>
                        </div>
                    </div>
                    <!--Testimonial 8-->
                    <div class="quote hide-bottom quote-text-10" data-ppquote="li-quote-10">
                        <p>'Qonto is 100% in tune with what we do at Alan.eu: a user-friendly service, a user-centric interface and a very reactive customer support.'</p>
                        <div class="container-info">
                            <div class="pp"></div>
                            <div class="name">Charles Samuelian</div>
                            <div class="job">Web Development Student</div>
                        </div>
                    </div>
                    <!--Testimonial 9-->
                    <div class="quote hide-bottom quote-text-11" data-ppquote="li-quote-11">
                        <p>'I’ve used other services but they ain’t nearly as good as this one. They keep their promises in terms of pricing and give out the discounts you're eligible to. The customer department is available all the time. The writers know proper English.'</p>
                        <div class="container-info">
                            <div class="pp"></div>
                            <div class="name">Khatry Firmanio</div>
                            <div class="job">IT student</div>
                        </div>
                    </div>
                    <!--Testimonial 10-->
                    <div class="quote hide-bottom quote-text-13" data-ppquote="li-quote-13">
                        <p>'That's just perfect - We can't get any better than this? TakeMyITClass.com is the Deal'</p>
                        <div class="container-info">
                            <div class="pp"></div>
                            <div class="name">Jadran Parvej Imon</div>
                            <div class="job">Telecommunication Student</div>
                        </div>
                    </div>
                    <!--Testimonial 11-->
                    <div class="quote quote-text-1 hide-bottom" data-ppquote="li-quote-1">
                        <p>'I got an A grade in my term paper. Zero plagiarism? This was the perfect blend for my schedule and course work.'</p>
                        <div class="container-info">
                            <div class="pp"></div>
                            <div class="name">Bertier Luyt</div>
                            <div class="job">Communication Student</div>
                        </div>
                    </div>
                    <!--Testimonial 12-->
                    <div class="quote quote-text-2 hide-bottom" data-ppquote="li-quote-2">
                        <p>'Thank you! Well elaborated and understanding solutions for my assignments. Will come back for more...'</p>
                        <div class="container-info">
                            <div class="pp"></div>
                            <div class="name">Darpon Abir Khan</div>
                            <div class="job">Student</div>
                        </div>
                    </div>
                </div>
                <!--Right Bubble Images-->
                <div class="container-pe-quote right">
                    <div class="pp-quote li-quote-7" data-textquote="quote-text-7">
                        <div class="img animated bounce"></div>
                    </div>
                    <div class="pp-quote li-quote-8" data-textquote="quote-text-8">
                        <div class="img animated bounce"></div>
                    </div>
                    <div class="pp-quote li-quote-9" data-textquote="quote-text-9">
                        <div class="img animated bounce"></div>
                    </div>
                    <div class="pp-quote li-quote-10" data-textquote="quote-text-10">
                        <div class="img animated bounce"></div>
                    </div>
                    <div class="pp-quote li-quote-11" data-textquote="quote-text-11">
                        <div class="img animated bounce"></div>
                    </div>
                    <div class="pp-quote li-quote-13" data-textquote="quote-text-13">
                        <div class="img animated bounce"></div>
                    </div>
                </div>
            </section>
        </div>
    </div>
    <!--==================================================-->
    <!----- End Techno Testimonial Area ----->
    <!--==================================================-->

    <!--==================================================-->
    <!----- Start Techno Contact Area ----->
    <!--==================================================-->
    <div class="contact_area pt-85 pb-90" style="background-image:url({{asset('frontendIT/assets/images/bg-cnt.jpg')}})" id="contact">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section_title white text_center mb-60 mt-3">
                        <div class="section_sub_title uppercase mb-3">
                            <h6>CONTACT US</h6>
                        </div>
                        <div class="section_main_title">
                            <h1>Have Questions?</h1>
                            <h1>We Got you Covered</h1>
                        </div>
                        <div class="em_bar">
                            <div class="em_bar_bg"></div>
                        </div>

                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-xl-12">
                    <div class="quote_wrapper">
                        <form id="contact_form" action="{{route('post')}}" method="POST" >
                            @csrf
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form_box mb-30">
                                        <input type="text" name="name"  placeholder="Name" required>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form_box mb-30">
                                        <input type="email" name="email" placeholder="Email Address" required>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form_box mb-30">
                                        <input type="text" name="phone" placeholder="WhatsApp Phone Number" required>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form_box mb-30">
                                        <input type="text" name="subject" placeholder="Subject" required>
                                    </div>
                                </div>

                                <div class="col-lg-12">
                                    <div class="form_box mb-30">
                                        <textarea name="message" id="message" cols="30" rows="10" placeholder="Write a Message" required></textarea>
                                    </div>
                                    <div class="quote_btn text_center">
                                        <button class="btn" type="submit">Submit Query</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                        <p class="form-message"></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--==================================================-->
    <!----- End Techno Contact Area ----->
    <!--==================================================-->

    <!--==================================================-->
    <!----- Start Techno Brand Area ----->
    <!--==================================================-->

    <div class="brand_area pt-30 pb-20">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="row">
                        <!--brand owl curousel -->
                        <div class="brand_list owl-carousel curosel-style">
                            <!-- Start Single Brand -->
                            <div class="col-lg-12">
                                <div class="single_brand mt-3 mb-5">
                                    <div class="single_brand_thumb">
                                        <img src="{{asset('frontendIT/assets/images/brand/1.png')}}" alt="" />
                                    </div>
                                </div>
                            </div>
                            <!-- Start Single Brand -->
                            <div class="col-lg-12">
                                <div class="single_brand mt-3 mb-5">
                                    <div class="single_brand_thumb">
                                        <img src="{{asset('frontendIT/assets/images/brand/2.png')}}" alt="" />
                                    </div>
                                </div>
                            </div>
                            <!-- Start Single Brand -->
                            <div class="col-lg-12">
                                <div class="single_brand mt-3 mb-5">
                                    <div class="single_brand_thumb">
                                        <img src="{{asset('frontendIT/assets/images/brand/3.png')}}" alt="" />
                                    </div>
                                </div>
                            </div>
                            <!-- Start Single Brand -->
                            <div class="col-lg-12">
                                <div class="single_brand mt-3 mb-5">
                                    <div class="single_brand_thumb">
                                        <img src="{{asset('frontendIT/assets/images/brand/4.png')}}" alt="" />
                                    </div>
                                </div>
                            </div>
                            <!-- Start Single Brand -->
                            <div class="col-lg-12">
                                <div class="single_brand mt-3 mb-5">
                                    <div class="single_brand_thumb">
                                        <img src="{{asset('frontendIT/assets/images/brand/5.png')}}" alt="" />
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--==================================================-->
    <!----- End Techno Brand Area ----->
    <!--==================================================-->

    <!--==================================================-->
    <!----- Start Techno Footer Middle Area ----->
    <!--==================================================-->
    <div class="footer-middle bg-dark2 pt-95">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-6 col-sm-12">
                    <div class="widget widgets-company-info">
                        <div class="footer-bottom-logo pb-40">
                            <img src="{{asset('frontendIT/assets/images/fav-icon/logo-white.jpg')}}" alt="" />
                        </div>
                        <div class="company-info-desc">
                            <p>We are a team of professional experts in the Medical & Nursing and IT & Software Engineering Industry who are passionate and here to help you out to prepare and help you get the best of you.
                            </p>
                        </div>
                        <div class="follow-company-info pt-3">
                            <div class="follow-company-text mr-3">
                                <a href="#"><p>Follow Us</p></a>
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
                                        <img width="80" height="80" src="{{asset('frontendIT/assets/images/recent1.jpg')}}" alt="">
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
                                        <img width="80" height="80" src="{{asset('frontendIT/assets/images/recent3.jpg')}}" alt="">
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
                            <p>© 2021  &lt;TakeMyNursingITClass/&gt;.All Rights Reserved. </p>
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
        @media(max-width: 768px){
            .visible-xs{
                display: block;
            }
            .visible-lg{
                display: none;
            }
        }
        @media(min-width: 768px){
            .visible-xs{
                display: none;
            }
            .visible-lg{
                display: inline-block;
            }
        }
        strong{
            color: #13425f !important;
        }
    </style>
    <!--==================================================-->
    <!----- End Techno Footer Middle Area ----->
    <!--==================================================-->
    <a class="visible-lg" id="whatsAppLink" href="https://web.whatsapp.com/send?phone=254718614983&amp;text=Hello, I need some help with my online course"  target="_blank">
        <i class="fa fa-whatsapp"></i>&nbsp;&nbsp; WhatsApp Us
    </a>

    <a class="visible-xs" id="whatsAppLink" href="https://api.whatsapp.com/send?phone=254718614983&amp;text=Hello, I need some help with my online course"  target="_blank">
        <i class="fa fa-whatsapp"></i>&nbsp;&nbsp; WhatsApp Us
    </a>
    @include('layouts.partials.scripts')
    <!-- jquery js -->
    <!--<script src="//code.tidio.co/odd0ytvu6qwx3o4gjr8j44w4ogftxlzr.js" async></script>-->
    <!--Start of Tawk.to Script
// <script type="text/javascript">
// var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
// (function(){
// var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
// s1.async=true;
// s1.src='https://embed.tawk.to/6137c79e649e0a0a5cd51882/1ff0u7gtl';
// s1.charset='UTF-8';
// s1.setAttribute('crossorigin','*');
// s0.parentNode.insertBefore(s1,s0);
// })();
// </script>
<!--End of Tawk.to Script-->
<script type="text/javascript">function add_chatinline(){var hccid=47676652;var nt=document.createElement("script");nt.async=true;nt.src="https://www.mylivechat.com/chatinline.aspx?hccid="+hccid;var ct=document.getElementsByTagName("script")[0];ct.parentNode.insertBefore(nt,ct);}
add_chatinline();</script>
    </body>

</html>
