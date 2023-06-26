<!DOCTYPE html>
<html lang="jp" itemscope itemtype="http://schema.org/WebPage">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link rel="apple-touch-icon" sizes="76x76" href="./assets/img/apple-icon.png">
    <link rel="shortcut icon" href="{{ asset('/favicon.png') }}" />

    <title>クセ字コンテスト　クセ字交換会</title>

    <!--     Fonts and icons     -->
    <link rel="stylesheet" type="text/css"
        href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700,900|Roboto+Slab:400,700" />

    <!-- Nucleo Icons -->
    <link href="./assets/css/nucleo-icons.css" rel="stylesheet" />
    <link href="./assets/css/nucleo-svg.css" rel="stylesheet" />

    <!-- Font Awesome Icons -->
    <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>

    <!-- Material Icons -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Round" rel="stylesheet">

    <!-- CSS Files -->
    <link id="pagestyle" href="./assets/css/material-kit.css?v=3.0.4" rel="stylesheet" />

    <!-- jQuery JS -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>

    <!-- Toastr -->
    <link rel="stylesheet" type="text/css"
        href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css">
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js">
    </script>

    <style>
        .custom-table {
            min-width: 900px;
        }

        .custom-table thead tr,
        .custom-table thead th {
            border-top: none;
            border-bottom: none !important;
        }

        .custom-table tbody th,
        .custom-table tbody td {
            color: #777;
            font-weight: 400;
            padding-bottom: 20px;
            padding-top: 20px;
            font-weight: 300;
        }

        .custom-table tbody th small,
        .custom-table tbody td small {
            color: #b3b3b3;
            font-weight: 300;
        }

        .custom-table tbody .persons {
            padding: 0;
            margin: 0;
        }

        .custom-table tbody .persons li {
            padding: 0;
            margin: 0 0 0 -15px;
            list-style: none;
            display: inline-block;
        }

        .custom-table tbody .persons li a {
            display: inline-block;
            width: 50px;
        }

        .custom-table tbody .persons li a img {
            max-width: 100%;
        }

        .custom-table tbody tr th,
        .custom-table tbody tr td {
            position: relative;
            -webkit-transition: .3s all ease;
            -o-transition: .3s all ease;
            transition: .3s all ease;
        }

        .custom-table tbody tr th:before,
        .custom-table tbody tr th:after,
        .custom-table tbody tr td:before,
        .custom-table tbody tr td:after {
            -webkit-transition: .3s all ease;
            -o-transition: .3s all ease;
            transition: .3s all ease;
            content: "";
            left: 0;
            right: 0;
            position: absolute;
            height: 1px;
            background: #bfbfbf;
            width: 100%;
            opacity: 0;
            visibility: hidden;
        }

        .custom-table tbody tr th:before,
        .custom-table tbody tr td:before {
            top: -1px;
        }

        .custom-table tbody tr th:after,
        .custom-table tbody tr td:after {
            bottom: -1px;
        }

        .custom-table tbody tr:hover th,
        .custom-table tbody tr:hover td {
            background: rgba(0, 0, 0, 0.03);
        }

        .custom-table tbody tr:hover th:before,
        .custom-table tbody tr:hover th:after,
        .custom-table tbody tr:hover td:before,
        .custom-table tbody tr:hover td:after {
            opacity: 1;
            visibility: visible;
        }

        .custom-table tbody tr.active th,
        .custom-table tbody tr.active td {
            background: rgba(0, 0, 0, 0.03);
        }

        .custom-table tbody tr.active th:before,
        .custom-table tbody tr.active th:after,
        .custom-table tbody tr.active td:before,
        .custom-table tbody tr.active td:after {
            opacity: 1;
            visibility: visible;
        }

        /* Custom Checkbox */
        .control {
            display: block;
            position: relative;
            margin-bottom: 25px;
            cursor: pointer;
            font-size: 18px;
        }

        .control input {
            position: absolute;
            z-index: -1;
            opacity: 0;
        }

        .control__indicator {
            position: absolute;
            top: 2px;
            left: 0;
            height: 20px;
            width: 20px;
            border-radius: 4px;
            border: 2px solid #ccc;
            background: transparent;
        }

        .control--radio .control__indicator {
            border-radius: 50%;
        }

        .control:hover input~.control__indicator,
        .control input:focus~.control__indicator {
            border: 2px solid #007bff;
        }

        .control input:checked~.control__indicator {
            border: 2px solid #007bff;
            background: #007bff;
        }

        .control input:disabled~.control__indicator {
            background: #e6e6e6;
            opacity: 0.6;
            pointer-events: none;
            border: 2px solid #ccc;
        }

        .control__indicator:after {
            font-family: 'icomoon';
            content: '\e5ca';
            position: absolute;
            display: none;
        }
    </style>

</head>

<body class="index-page bg-gray-200">

    @php
    use App\Models\Item;
    use App\Models\User;

    $items = Item::latest()->take(4)->get();
    $request_cnt = DB::table('request_match')->count();
    $match_success_cnt = DB::table('request_match')->where('match_state', 1)->count();
    @endphp

    <!-- Navbar -->
    <div class="container position-sticky z-index-sticky top-0">
        <div class="row">
            <div class="col-12">
                <nav
                    class="navbar navbar-expand-lg  blur border-radius-xl top-0 z-index-fixed shadow position-absolute my-3 py-2 start-0 end-0 mx-4">
                    <div class="container-fluid px-0">
                        <a class="navbar-brand font-weight-bolder ms-sm-3" href="" rel="logo" title="Logo"
                            data-placement="bottom" target="_self">
                            <img src="{{ asset('/assets/img/logo.png') }}" alt="" style="width: 14rem; height: auto;">
                        </a>
                        <button class="navbar-toggler shadow-none ms-2" type="button" data-bs-toggle="collapse"
                            data-bs-target="#navigation" aria-controls="navigation" aria-expanded="false"
                            aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon mt-2">
                                <span class="navbar-toggler-bar bar1"></span>
                                <span class="navbar-toggler-bar bar2"></span>
                                <span class="navbar-toggler-bar bar3"></span>
                            </span>
                        </button>
                        <div class="collapse navbar-collapse pt-3 pb-2 py-lg-0 w-100" id="navigation">
                            <ul class="navbar-nav navbar-nav-hover ms-auto">
                                <li class="nav-item ms-lg-auto">
                                    <a class="nav-link nav-link-icon" href="/" target="_self">
                                        <i class="fa fa-home me-1"></i>
                                        <p class="d-inline text-sm z-index-1 font-weight-bold" data-bs-toggle="tooltip"
                                            data-bs-placement="bottom" title="ホーム">ホーム</p>
                                    </a>
                                </li>

                                <li class="nav-item ms-lg-auto">
                                    <a class="nav-link nav-link-icon" href="/#intro" target="_self">
                                        <i class="fa fa-info me-1"></i>
                                        <p class="d-inline text-sm z-index-1 font-weight-bold" data-bs-toggle="tooltip"
                                            data-bs-placement="bottom" title="事業概要">事業概要</p>
                                    </a>
                                </li>

                                <li class="nav-item ms-lg-auto">
                                    <a class="nav-link nav-link-icon" href="/#goods" target="_self">
                                        <i class="fa fa-list me-1"></i>
                                        <p class="d-inline text-sm z-index-1 font-weight-bold" data-bs-toggle="tooltip"
                                            data-bs-placement="bottom" title="作品リスト">作品リスト</p>
                                    </a>
                                </li>

                                <li class="nav-item ms-lg-auto">
                                    <a class="nav-link nav-link-icon" href="/#contact" target="_self">
                                        <i class="fa fa-envelope me-1"></i>
                                        <p class="d-inline text-sm z-index-1 font-weight-bold" data-bs-toggle="tooltip"
                                            data-bs-placement="bottom" title="お問い合わせ">お問い合わせ</p>
                                    </a>
                                </li>
                                @if (Route::has('login'))
                                @auth
                                <li class="nav-item dropdown dropdown-hover mx-2">
                                    <a class="nav-link ps-2 d-flex cursor-pointer align-items-center" id="dropdownMenuDocs" data-bs-toggle="dropdown" aria-expanded="false">
                                        <img src="{{ asset(Auth::user()->avatar_url) }}" alt="" class="arrow ms-md-2"
                                            style="width:25px; height: 25px; border-radius: 3px; margin-right: 10px;">
                                        {{ Auth::user()->nickname }}さん
                                    </a>
                                    <ul class="dropdown-menu dropdown-menu-end dropdown-menu-animation dropdown-md dropdown-md-responsive mt-0 mt-lg-3 p-3 border-radius-lg me-n4" aria-labelledby="dropdownMenuDocs">
                                        <div class="d-none d-lg-block">
                                            <ul class="list-group">
                                                <li class="nav-item list-group-item border-0 p-0">
                                                    <a class="dropdown-item py-2 ps-3 border-radius-md" href="{{ route('myItem.index') }}">
                                                        <h6 class="dropdown-header text-dark font-weight-bolder d-flex justify-content-cente align-items-center p-0">マイページ</h6>
                                                    </a>
                                                </li>
                                                <li class="nav-item list-group-item border-0 p-0">
                                                    <form class="dropdown-item py-2 ps-3 border-radius-md" action="{{ route('logout') }}" method="post">
                                                        @csrf
                                                        <button class="dropdown-header text-dark font-weight-bolder d-flex justify-content-cente align-items-center p-0 border-0 bg-transparent w-100">ログアウト</button>
                                                    </form>
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="row d-lg-none">
                                            <div class="col-md-12 g-0">
                                                <a class="dropdown-item py-2 ps-3 border-radius-md" href="{{ route('myItem.index') }}">
                                                    <h6 class="dropdown-header text-dark font-weight-bolder d-flex justify-content-cente align-items-center p-0">マイページ</h6>
                                                </a>
                                                <form class="dropdown-item py-2 ps-3 border-radius-md" action="{{ route('logout') }}" method="post">
                                                    @csrf
                                                    <button class="dropdown-header text-dark font-weight-bolder d-flex justify-content-cente align-items-center p-0 border-0 bg-transparent w-100">ログアウト</button>
                                                </form>
                                            </div>
                                        </div>
                                    </ul>
                                </li>
                                @else
                                <li class="nav-item ms-lg-auto">
                                    <a class="nav-link nav-link-icon me-2" href="/login">
                                        <i class="fa fa-sign-in me-1"></i>
                                        <p class="d-inline text-sm z-index-1 font-weight-bold" data-bs-toggle="tooltip"
                                            data-bs-placement="bottom" title="ログイン">ログイン</p>
                                    </a>
                                </li>

                                <li class="nav-item ms-lg-auto">
                                    <a class="nav-link nav-link-icon me-2" href="/register">
                                        <i class="fa fa-user-plus me-1"></i>
                                        <p class="d-inline text-sm z-index-1 font-weight-bold" data-bs-toggle="tooltip"
                                            data-bs-placement="bottom" title="会員登録">会員登録</p>
                                    </a>
                                </li>
                                @endauth
                                @endif
                            </ul>
                        </div>
                    </div>
                </nav>
                <!-- End Navbar -->
            </div>
        </div>
    </div>

    <script src="{{ asset('./assets/js/auth/register.js') }}"></script>
    <script src="{{ asset('./assets/js/auth/login.js') }}"></script>
    <script src="{{ asset('./assets/js/auth/main.js') }}"></script>

    <header class="header-2 mt-8">
        <div class="container d-flex justify-content-center">
            <img src="{{ asset('./assets/img/bg4.jpg') }}" alt="" class="w-80">
        </div>
    </header>

    <div class="mx-3 mx-md-4">
        <section class="pt-3 pb-4" id="">
            <div class="container">
                <div class="row">
                    <div class="col-lg-9 mx-auto py-3">
                        <div class="row">
                            <div class="col-md-4 position-relative">
                                <div class="p-3 text-center">
                                    <h1 class="text-gradient text-primary"><span id="state1"
                                            countTo="{{ $items->count() }}">0</span>
                                    </h1>
                                    <h5 class="mt-3">登録数</h5>
                                    <p class="text-sm font-weight-normal">※作品登録済みの数</p>
                                </div>
                                <hr class="vertical dark">
                            </div>
                            <div class="col-md-4 position-relative">
                                <div class="p-3 text-center">
                                    <h1 class="text-gradient text-primary"> <span id="state2"
                                            countTo="{{ $request_cnt }}">0</span>
                                    </h1>
                                    <h5 class="mt-3">交換リクエスト数</h5>
                                    <p class="text-sm font-weight-normal">※最大リクエスト数５点</p>
                                </div>
                                <hr class="vertical dark">
                            </div>
                            <div class="col-md-4">
                                <div class="p-3 text-center">
                                    <h1 class="text-gradient text-primary" id="state3"
                                        countTo="{{ $match_success_cnt }}">0</h1>
                                    <h5 class="mt-3">マッチング成立数</h5>
                                    <p class="text-sm font-weight-normal">※１位同士なら即成立</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="py-5" id="intro">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-8 col-10 mx-auto text-center">
                        <div class="mb-md-5">
                            <h3>クセ字コンテストとは？</h3>
                            <p>「個性ある手書き文字を美術館で鑑賞し合おう」という文化企画。</p>
                            <p>今までの「キレイな字じゃないとダメ」ではなく「キレイな字じゃなくてイイ」という個性を重視しています。</p>
                        </div>

                        <a href="https://wayoh.jp/pen" class="btn btn-primary">詳 細</a>
                    </div>
                </div>
            </div>
            <div class="container">
                <div class="row flex-wrap-reverse">
                    <div class="col-md-7 col-12 my-auto">
                        <h3 class="text-gradient text-primary mb-0 mt-4">クセ字交換会とは？</h3>
                        <p class="pe-md-5 mb-4">
                            クセ字コンテストの応募者同士限定のクセ字作品の交換会。<br>
                            会場、オンラインで作品をチェックして交換リクエスト。<br>
                            マッチングが成立したら、作品を交換し、返送します。
                        </p>
                        <p class="pe-md-5 mb-4">
                            ■参加資格<br>
                            クセ字コンテスト参加者のみ。<br>
                        </p>
                        <p class="pe-md-5 mb-4">
                            ■参加の流れ<br>
                            出品登録(仮でOK)→決済→出品資格Get!→〆切までに手続き、作品送付→交換会スタート！(8/5-11)→交換リクエスト送受信→8/11確定→8/12交換して返送<br>
                            ※希望順位は1～5位<br>
                        </p>
                        <p class="pe-md-5 mb-4">
                            ■マッチング成立<br>
                            ２つの成立<br>
                            ・即成立→1位同士<br>
                            ・締切で成立(8/11)<br>
                            【成立のアルゴリズム】<br>
                            1：nの複数成立の場合<br>
                            ①リクエスト順位の高い方<br>
                            ②双方のリクエスト順位が小さい方　例 A：1位＋3位＝4　B:2位＋1位＝3点<br>
                            ③申請が早い方
                        </p>
                    </div>
                    <div class="col-md-5 col-12 my-auto">
                        <img class="w-100 border-radius-lg shadow-lg" src="{{ asset('./assets/img/bg7.png') }}"
                            alt="Product Image">
                    </div>
                </div>
                <div class="row mt-5">
                    <div class="col-12 d-flex justify-content-center">
                        <a href="https://wayoh.jp/pen" class="btn btn-primary text-center">詳 細</a>
                    </div>
                </div>
            </div>
        </section>

        <section class="py-5" id="goods">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-8 col-10 mx-auto text-center">
                        <div class="mb-md-5">
                            <h3>最近登録された作品</h3>
                            <p>Recently Registered Items</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="container">
                <div class="row mb-3">
                    @foreach($items as $item)
                    @php
                    $user_id = Item::find($item->id)->user_id;
                    $nickname = User::find($user_id)->nickname;
                    $avatar_url = User::find($user_id)->avatar_url;
                    @endphp
                    <div class="col-md-3 mt-md-0 mb-4">
                        <div class="card shadow-lg">
                            <div class="card-header p-0 mx-3 mt-3 position-relative z-index-1 move-on-hover">
                                <a href="{{ route('item.show', ['item' => $item->id]) }}" class="d-block">
                                    <img src="{{ asset($item->front_img) }}"
                                        class="img-fluid border-radius-lg object-fit-contain w-100"
                                        style="height: 250px; object-fit:contain;">
                                </a>
                            </div>
                            <div class="card-body pt-3">
                                <a href="{{ route('item.show', ['item' => $item->id]) }}"
                                    class="text-dark h5 d-block">{{ $item->title }}</a>
                                <p class="card-description mb-4">{{ Str::limit($item->description, 15, '...') }}</p>
                                <div class="author align-items-center">
                                    <img src="{{ asset($avatar_url) }}" alt="" class="avatar shadow border-radius-lg">
                                    <div class="name ps-3">
                                        <span>{{ $nickname }}</span>
                                        <div class="stats">
                                            <small>登録日: {{ $item->created_at->format('Y-m-d') }}</small>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
                <div class="row">
                    <div class="col-12 d-flex justify-content-center">
                        <button class="btn btn-primary">すべて表示</button>
                    </div>
                </div>
            </div>
        </section>

        <section class="py-md-5 py-5">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-8 col-10 mx-auto text-center">
                        <div class="mb-md-5">
                            <img src="{{ asset('/assets/img/map_title.png') }}" class="w-75" alt="応募者の全国分布図">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <iframe
                        src="https://www.google.com/maps/d/u/0/embed?mid=1ZhjJRKGM_wQ87ILWj8V4SgvdCko_P0lb&amp;ehbc=2E312F"
                        width="640" height="480"></iframe>
                </div>
            </div>
        </section>

        <section class="py-md-5 py-5" id="contact">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-8 col-10 mx-auto text-center">
                        <div class="mb-md-5">
                            <h3>お問い合わせ</h3>
                            <p>Contact Us</p>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-8 mx-auto">
                        <div class="card card-plain">
                            <form id="contact-form" method="post" autocomplete="off">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="input-group input-group-static mb-4">
                                                <label>氏名</label>
                                                <input type="text" class="form-control" placeholder="氏名">
                                                <span class="input-group-text"><i
                                                        class="material-icons">person</i></span>
                                            </div>
                                        </div>
                                        <div class="col-md-6 ps-md-2">
                                            <div class="input-group input-group-static mb-4">
                                                <label>メール</label>
                                                <input type="email" class="form-control" placeholder="メール">
                                                <span class="input-group-text"><i
                                                        class="material-icons">email</i></span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group mb-4 mt-md-0 mt-4">
                                        <div class="input-group input-group-static mb-4">
                                            <label>お問い合わせ内容</label>
                                            <textarea name="message" class="form-control" id="message" rows="6"
                                                placeholder=""></textarea>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12 text-center">
                                            <button type="submit" class="btn bg-gradient-info mt-4"
                                                style="font-size: 15px;"><i class="fa fa-send me-1"></i> 送 信</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>

    <footer class="footer pt-5 mt-5">
        <div class="container">
            <div class=" row">
                <div
                    class="col-md-12 mb-4 ml-auto mr-auto d-flex justify-content-center align-items-center flex-column">
                    <div>
                        <a href="/">
                            <img src="./assets/img/logo.png" class="mb-3 footer-logo" alt="main_logo"
                                style="scale: 1.5">
                        </a>
                    </div>
                    <div>
                        <ul class="d-flex flex-row ms-n3 nav">
                            <li class="nav-item">
                                <a class="nav-link pe-1" href="https://twitter.com/handwrite_jpn" target="_blank">
                                    <i class="fab fa-twitter text-lg opacity-8"></i>
                                </a>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link pe-1" href="https://www.youtube.com/user/udoyoshi/" target="_blank">
                                    <i class="fab fa-youtube text-lg opacity-8"></i>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>

                <div class="col-12">
                    <div class="text-center">
                        <p class="text-dark my-4 text-sm font-weight-normal">
                            All rights reserved. Copyright ©
                            <script>
                                document.write(new Date().getFullYear())
                            </script>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </footer>

    <!--   Core JS Files   -->
    <script src="./assets/js/core/popper.min.js" type="text/javascript"></script>
    <script src="./assets/js/core/bootstrap.min.js" type="text/javascript"></script>
    <script src="./assets/js/plugins/perfect-scrollbar.min.js"></script>




    <!--  Plugin for TypedJS, full documentation here: https://github.com/inorganik/CountUp.js -->
    <script src="./assets/js/plugins/countup.min.js"></script>





    <script src="./assets/js/plugins/choices.min.js"></script>



    <script src="./assets/js/plugins/prism.min.js"></script>
    <script src="./assets/js/plugins/highlight.min.js"></script>



    <!--  Plugin for Parallax, full documentation here: https://github.com/dixonandmoe/rellax -->
    <script src="./assets/js/plugins/rellax.min.js"></script>
    <!--  Plugin for TiltJS, full documentation here: https://gijsroge.github.io/tilt.js/ -->
    <script src="./assets/js/plugins/tilt.min.js"></script>
    <!--  Plugin for Selectpicker - ChoicesJS, full documentation here: https://github.com/jshjohnson/Choices -->
    <script src="./assets/js/plugins/choices.min.js"></script>


    <!--  Plugin for Parallax, full documentation here: https://github.com/wagerfield/parallax  -->
    <script src="./assets/js/plugins/parallax.min.js"></script>

    <!-- Control Center for Material UI Kit: parallax effects, scripts for the example pages etc -->
    <!--  Google Maps Plugin    -->

    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDTTfWur0PDbZWPr7Pmq8K3jiDp0_xUziI"></script>
    <script src="./assets/js/material-kit.min.js?v=3.0.4" type="text/javascript"></script>


    <script type="text/javascript">
        if (document.getElementById('state1')) {
            const countUp = new CountUp('state1', document.getElementById("state1").getAttribute("countTo"));
            if (!countUp.error) {
                countUp.start();
            } else {
                console.error(countUp.error);
            }
        }
        if (document.getElementById('state2')) {
            const countUp1 = new CountUp('state2', document.getElementById("state2").getAttribute("countTo"));
            if (!countUp1.error) {
                countUp1.start();
            } else {
                console.error(countUp1.error);
            }
        }
        if (document.getElementById('state3')) {
            const countUp2 = new CountUp('state3', document.getElementById("state3").getAttribute("countTo"));
            if (!countUp2.error) {
                countUp2.start();
            } else {
                console.error(countUp2.error);
            };
        }

        $(document).ready(function () {
            toastr.options = {
                'closeButton': true,
                'debug': false,
                'newestOnTop': false,
                'progressBar': true,
                'positionClass': 'toast-top-right',
                'preventDuplicates': false,
                'showDuration': '3000',
                'hideDuration': '3000',
                'timeOut': '5000',
                'extendedTimeOut': '1000',
                'showEasing': 'swing',
                'hideEasing': 'linear',
                'showMethod': 'fadeIn',
                'hideMethod': 'fadeOut',
            }
        });
    </script>

</body>

</html>