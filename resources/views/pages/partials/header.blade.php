<!doctype html>
<html class="no-js" lang="en">

<!-- Mirrored from html.themegenix.com/skillgro/ by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 20 Apr 2025 10:33:58 GMT -->

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>SkillGro - Online Courses & Education Template</title>
    <meta name="description" content="SkillGro - Online Courses & Education Template">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('assets/img/favicon.png') }}">
    <!-- Place favicon.ico in the root directory -->

    <!-- CSS here -->
    <!-- CSS -->
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/animate.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/magnific-popup.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/fontawesome-all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/flaticon-skillgro.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/flaticon-skillgro-new.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/swiper-bundle.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/default-icons.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/select2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/odometer.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/aos.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/plyr.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/spacing.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/tg-cursor.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/main.css') }}">

    <style>
        @media (max-width: 1500px) {
            .tgmenu__navbar-wrap ul {
                margin: auto;
            }
        }

        .tgmenu__navbar-wrap ul li .sub-menu li a {
            font-size: 14px !important;
        }

        @media (max-width: 1500px) {
            .tgmenu__navbar-wrap ul li .mega-menu {
                min-width: 630px;
                padding: 27px 0px 43px 0px;
            }
        }

        .tgmenu__navbar-wrap ul li .mega-menu {
            left: -150px;
        }

        .hero-content h2 {
            color: #fff !important;
            font-size: 48px;
            font-weight: 700;
            margin-bottom: 15px;
            position: relative;
        }

        .hero-content p {
            font-size: 18px;
            line-height: 1.6;
            color: #fff !important;
        }
    </style>

    <style>
        .media-marquee-area {
            background: #f9f9f9;
            padding: 45px 0;
            overflow: hidden;
        }

        .media-marquee {
            display: flex;
            align-items: center;
            gap: 35px;
            width: max-content;
            animation: scroll-left 40s linear infinite;
        }

        .media-marquee-area:hover .media-marquee {
            animation-play-state: paused;
        }

        .media-item {
            border: 1px solid #eee;
            padding: 8px;
            background: #fff;
            box-shadow: 0 2px 6px rgba(0, 0, 0, 0.05);
        }


        .media-item:hover {
            transform: scale(1.06);
            box-shadow: 0 10px 28px rgba(0, 0, 0, 0.18);
        }

        .media-item img,
        .media-item video {
            width: 100%;
            height: 100%;
            object-fit: cover;
            display: block;
        }

        .video-thumb {
            width: 100%;
            height: 100%;
            position: relative;
        }

        .play-btn {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            width: 40px;
            height: 40px;
            line-height: 40px;
            font-size: 20px;
            text-align: center;
            border-radius: 50%;
            background: rgba(0, 0, 0, 0.65);
            color: #fff;
            pointer-events: none;
        }

        .video-item::after {
            content: "Video";
            position: absolute;
            bottom: 6px;
            left: 6px;
            font-size: 11px;
            background: rgba(0, 0, 0, 0.6);
            color: #fff;
            padding: 2px 6px;
            border-radius: 4px;
        }

        @media (max-width: 991px) {
            .media-item {
                width: 160px;
                height: 100px;
            }
        }

        @media (max-width: 576px) {
            .media-item {
                width: 140px;
                height: 90px;
            }

            .play-btn {
                width: 34px;
                height: 34px;
                line-height: 34px;
                font-size: 18px;
            }
        }

        @keyframes scroll-left {
            0% {
                transform: translateX(0);
            }

            100% {
                transform: translateX(-50%);
            }
        }

        .about-card {
            background: #ffffff;
            border-radius: 20px;
            padding: 45px 45px;
            text-align: center;
            box-shadow: 0 10px 35px rgba(0, 0, 0, 0.08);
        }

        .about-subtitle {
            display: inline-block;
            font-size: 14px;
            font-weight: 600;
            letter-spacing: 1.4px;
            color: #1a2bff;
            margin-bottom: 10px;
        }

        .about-title {
            font-size: 28px;
            font-weight: 700;
            color: #0b0b2c;
            margin-bottom: 20px;
        }

        .about-desc {
            font-size: 15.5px;
            line-height: 1.9;
            color: #6b6b84;
        }

        @media (max-width: 768px) {
            .about-card {
                padding: 30px 25px;
            }

            .about-title {
                font-size: 22px;
            }
        }

        .modal-close-btn {
            position: absolute;
            top: -12px;
            right: -12px;
            width: 36px;
            height: 36px;
            border-radius: 50%;
            border: none;
            background: #000;
            color: #fff;
            font-size: 22px;
            line-height: 1;
            cursor: pointer;
            z-index: 1056;
            display: flex;
            align-items: center;
            justify-content: center;
            transition: all 0.3s ease;
        }

        .modal-close-btn:hover {
            background: #dc3545;
            transform: scale(1.1);
        }
    </style>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">


</head>

<body>

    <!--Preloader-->
    <div id="preloader">
        <div id="loader" class="loader">
            <div class="loader-container">
                <div class="loader-icon"><img src="{{ asset('images/Untitled design (1).png') }}" alt="Preloader">
                </div>
            </div>
        </div>
    </div>
    <!--Preloader-end -->

    <!-- Scroll-top -->
    <button class="scroll__top scroll-to-target" data-target="html">
        <i class="tg-flaticon-arrowhead-up"></i>
    </button>
    <!-- Scroll-top-end-->
