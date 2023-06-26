@php
use Illuminate\Support\Str;

use App\Models\User;
use App\Models\Item;
use App\Models\RequestMatch;

use Carbon\Carbon;
@endphp

<!DOCTYPE html>

<html lang="en">
<!--begin::Head-->

<head>
    <title>クセ字コンテスト　クセ字交換会</title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta property="og:locale" content="jp" />
    <meta property="og:type" content="article" />

    <link rel="shortcut icon" href="{{ asset('/favicon.png') }}" />

    <meta name="csrf-token" content="{{ csrf_token() }}">


    <!--begin::Fonts(mandatory for all pages)-->
    <!-- <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Inter:300,400,500,600,700" /> -->
    <!--end::Fonts-->

    <!--begin::Global Stylesheets Bundle(mandatory for all pages)-->
    <link href="{{ asset('metronic/assets/plugins/global/plugins.bundle.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('metronic/assets/css/style.bundle.css') }}" rel="stylesheet" type="text/css" />
    <!--end::Global Stylesheets Bundle-->


    {{-- jQuery --}}
    <script src="{{ asset('/assets/js/jquery.min.js') }}"></script>

    <!--begin::Javascript-->

    <!--begin::Global Javascript Bundle(mandatory for all pages)-->
    <script src="{{ asset('/metronic/assets/plugins/global/plugins.bundle.js') }}"></script>
    <script src="{{ asset('/metronic/assets/js/scripts.bundle.js') }}"></script>
    <!--end::Global Javascript Bundle-->

    <!--end::Javascript-->

    <!--Begin::Google Tag Manager -->
    <!-- <script>
        (function(w, d, s, l, i) {
            w[l] = w[l] || [];
            w[l].push({
                'gtm.start': new Date().getTime(),
                event: 'gtm.js'
            });
            var f = d.getElementsByTagName(s)[0],
                j = d.createElement(s),
                dl = l != 'dataLayer' ? '&l=' + l : '';
            j.async = true;
            j.src =
                'https://www.googletagmanager.com/gtm.js?id=' + i + dl;
            f.parentNode.insertBefore(j, f);
        })(window, document, 'script', 'dataLayer', 'GTM-5FS8GGP');
    </script> -->
    <!--End::Google Tag Manager -->

    <script>
        // Frame-busting to prevent site from being loaded within a frame without permission (click-jacking)
        if (window.top != window.self) {
            window.top.location.replace(window.self.location.href);
        }
    </script>
</head>
<!--end::Head-->

<!--begin::Body-->

<body id="kt_app_body" data-kt-app-layout="dark-sidebar" data-kt-app-header-fixed="true"
    data-kt-app-sidebar-enabled="true" data-kt-app-sidebar-fixed="true" data-kt-app-sidebar-hoverable="true"
    data-kt-app-sidebar-push-header="true" data-kt-app-sidebar-push-toolbar="true"
    data-kt-app-sidebar-push-footer="true" data-kt-app-toolbar-enabled="true" class="app-default">
    <!--begin::Theme mode setup on page load-->
    <script>
        var defaultThemeMode = "light";
        var themeMode;

        if (document.documentElement) {
            if (document.documentElement.hasAttribute("data-bs-theme-mode")) {
                themeMode = document.documentElement.getAttribute("data-bs-theme-mode");
            } else {
                if (localStorage.getItem("data-bs-theme") !== null) {
                    themeMode = localStorage.getItem("data-bs-theme");
                } else {
                    themeMode = defaultThemeMode;
                }
            }

            if (themeMode === "system") {
                themeMode = window.matchMedia("(prefers-color-scheme: dark)").matches ? "dark" : "light";
            }

            document.documentElement.setAttribute("data-bs-theme", themeMode);
        }
    </script>
    <!--end::Theme mode setup on page load-->
    <!--Begin::Google Tag Manager (noscript) -->
    <noscript>
        <iframe src="https://www.googletagmanager.com/ns.html?id=GTM-5FS8GGP" height="0" width="0"
            style="display:none;visibility:hidden"></iframe>
    </noscript>
    <!--End::Google Tag Manager (noscript) -->


    <!--begin::App-->
    <div class="d-flex flex-column flex-root app-root" id="kt_app_root">
        <!--begin::Page-->
        <div class="app-page  flex-column flex-column-fluid " id="kt_app_page">


            <!--begin::Header-->
            <div id="kt_app_header" class="app-header ">

                <!--begin::Header container-->
                <div class="app-container  container-fluid d-flex align-items-stretch justify-content-between "
                    id="kt_app_header_container">

                    <!--begin::Sidebar mobile toggle-->
                    <div class="d-flex align-items-center d-lg-none ms-n3 me-1 me-md-2" title="Show sidebar menu">
                        <div class="btn btn-icon btn-active-color-primary w-35px h-35px"
                            id="kt_app_sidebar_mobile_toggle">
                            <i class="ki-duotone ki-abstract-14 fs-2 fs-md-1"><span class="path1"></span><span
                                    class="path2"></span></i>
                        </div>
                    </div>
                    <!--end::Sidebar mobile toggle-->


                    <!--begin::Mobile logo-->
                    <div class="d-flex align-items-center flex-grow-1 flex-lg-grow-0">
                        <a href="{{ url('/') }}" class="d-lg-none">
                            <img alt="Logo" src="{{ asset('/metronic/assets/media/logos/small-default.png') }}"
                                class="h-30px" />
                        </a>
                    </div>
                    <!--end::Mobile logo-->

                    <!--begin::Header wrapper-->
                    <div class="d-flex align-items-stretch justify-content-between flex-lg-grow-1"
                        id="kt_app_header_wrapper">

                        <!--begin::Menu wrapper-->
                        <div class="app-header-menu app-header-mobile-drawer align-items-stretch" data-kt-drawer="true"
                            data-kt-drawer-name="app-header-menu" data-kt-drawer-activate="{default: true, lg: false}"
                            data-kt-drawer-overlay="true" data-kt-drawer-width="250px" data-kt-drawer-direction="end"
                            data-kt-drawer-toggle="#kt_app_header_menu_toggle" data-kt-swapper="true"
                            data-kt-swapper-mode="{default: 'append', lg: 'prepend'}"
                            data-kt-swapper-parent="{default: '#kt_app_body', lg: '#kt_app_header_wrapper'}">
                            <!--begin::Menu-->
                            <div class="menu menu-rounded menu-column menu-lg-row my-5 my-lg-0 align-items-stretch fw-semibold px-2 px-lg-0"
                                id="kt_app_header_menu" data-kt-menu="true">
                                <!--begin:Menu item-->
                                <div data-kt-menu-trigger="{default: 'click', lg: 'hover'}"
                                    data-kt-menu-placement="bottom-start"
                                    class="menu-item menu-lg-down-accordion menu-sub-lg-down-indention me-0 me-lg-2">
                                </div>
                                <!--end:Menu item-->
                            </div>
                            <!--end::Menu-->
                        </div>
                        <!--end::Menu wrapper-->

                        @php
                        $request_matches = RequestMatch::all();
                        // print_r($request_matches_inbox->count());
                        foreach ($request_matches as $request_match) {
                        // if($request_match->items_second->user_id)
                        }
                        @endphp


                        <!--begin::Navbar-->
                        <div class="app-navbar flex-shrink-0">

                            <div class="app-navbar-item ms-1 ms-md-3">
                                <!--begin::Menu wrapper-->
                                <div class="btn btn-icon btn-custom btn-icon-muted btn-active-light btn-active-color-primary w-30px h-30px w-md-40px h-md-40px position-relative"
                                    id="kt_activities_toggle">
                                    <i class="ki-duotone ki-message-text-2 fs-2 fs-lg-1">
                                        <span class="path1"></span>
                                        <span class="path2"></span>
                                        <span class="path3"></span>
                                    </i>
                                    @if($request_matches->where('receive_date', null)->count() > 0)
                                    @php
                                    $flag = 0;
                                    foreach ($request_matches as $request_match) {
                                    if($request_match->items_second->user_id == Auth::user()->id) {
                                    $flag = 1;
                                    }
                                    }
                                    @endphp
                                    @if($flag == 1)
                                    <span
                                        class="bullet bullet-dot bg-success h-6px w-6px position-absolute translate-middle top-0 start-50 animation-blink"></span>
                                    @endif
                                    @endif
                                </div>
                                <!--end::Menu wrapper-->
                            </div>

                            <!--begin::User menu-->
                            <div class="app-navbar-item ms-1 ms-md-3" id="kt_header_user_menu_toggle">
                                <!--begin::Menu wrapper-->
                                <div class="cursor-pointer symbol symbol-30px symbol-md-40px"
                                    data-kt-menu-trigger="{default: 'click', lg: 'hover'}" data-kt-menu-attach="parent"
                                    data-kt-menu-placement="bottom-end">
                                    <img src="{{ asset(Auth::user()->avatar_url) }}" alt="user" />
                                </div>

                                <!--begin::User account menu-->
                                <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-800 menu-state-bg menu-state-color fw-semibold py-4 fs-6 w-275px"
                                    data-kt-menu="true">
                                    <!--begin::Menu item-->
                                    <div class="menu-item px-3">
                                        <div class="menu-content d-flex align-items-center px-3">
                                            <!--begin::Avatar-->
                                            <div class="symbol symbol-50px me-5">
                                                <img alt="Logo" src="{{ asset(Auth::user()->avatar_url) }}" />
                                            </div>
                                            <!--end::Avatar-->

                                            <!--begin::Username-->
                                            <div class="d-flex flex-column">
                                                <div class="fw-bold d-flex align-items-center fs-5">
                                                    {{ Auth::user()->firstname }} {{ Auth::user()->lastname }}
                                                </div>

                                                <a href="mailto:;{{ Auth::user()->email }}"
                                                    class="fw-semibold text-muted text-hover-primary fs-7">
                                                    {{ Auth::user()->email }} </a>
                                            </div>
                                            <!--end::Username-->
                                        </div>
                                    </div>
                                    <!--end::Menu item-->

                                    <!--begin::Menu separator-->
                                    <div class="separator my-2"></div>
                                    <!--end::Menu separator-->

                                    <!--begin::Menu item-->
                                    <div class="menu-item px-5">
                                        <a href="{{ route('profile.confirm') }}" class="menu-link px-5">
                                            プロフィール
                                        </a>
                                    </div>
                                    <!--end::Menu item-->

                                    <!--begin::Menu item-->
                                    <div class="menu-item px-5">
                                        <a href="{{ route('logout') }}"
                                            onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
                                            class="menu-link px-5">ログアウト</a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                            class="d-none">
                                            @csrf
                                        </form>
                                    </div>
                                    <!--end::Menu item-->
                                </div>
                                <!--end::User account menu-->
                                <!--end::Menu wrapper-->
                            </div>
                            <!--end::User menu-->

                        </div>
                        <!--end::Navbar-->
                    </div>
                    <!--end::Header wrapper-->
                </div>
                <!--end::Header container-->
            </div>
            <!--end::Header-->
            <!--begin::Wrapper-->
            <div class="app-wrapper  flex-column flex-row-fluid " id="kt_app_wrapper">

                <!--begin::Sidebar-->
                <div id="kt_app_sidebar" class="app-sidebar  flex-column " data-kt-drawer="true"
                    data-kt-drawer-name="app-sidebar" data-kt-drawer-activate="{default: true, lg: false}"
                    data-kt-drawer-overlay="true" data-kt-drawer-width="225px" data-kt-drawer-direction="start"
                    data-kt-drawer-toggle="#kt_app_sidebar_mobile_toggle">


                    <!--begin::Logo-->
                    <div class="app-sidebar-logo px-6" id="kt_app_sidebar_logo">
                        <!--begin::Logo image-->
                        <a href="/">
                            <img alt="Logo" src="{{ asset('/metronic/assets/media/logos/logo-default.png') }}"
                                class="h-45px app-sidebar-logo-default" />
                            <img alt="Logo" src="{{ asset('/metronic/assets/media/logos/small-default.png') }}"
                                class="h-20px app-sidebar-logo-minimize" />
                        </a>
                        <!--end::Logo image-->

                        <div id="kt_app_sidebar_toggle"
                            class="app-sidebar-toggle btn btn-icon btn-shadow btn-sm btn-color-muted btn-active-color-primary body-bg h-30px w-30px position-absolute top-50 start-100 translate-middle rotate "
                            data-kt-toggle="true" data-kt-toggle-state="active" data-kt-toggle-target="body"
                            data-kt-toggle-name="app-sidebar-minimize">

                            <i class="ki-duotone ki-double-left fs-2 rotate-180">
                                <span class="path1"></span>
                                <span class="path2"></span>
                            </i>
                        </div>
                        <!--end::Sidebar toggle-->
                    </div>
                    <!--end::Logo-->
                    <!--begin::sidebar menu-->
                    <div class="app-sidebar-menu overflow-hidden flex-column-fluid">
                        <!--begin::Menu wrapper-->
                        <div id="kt_app_sidebar_menu_wrapper" class="app-sidebar-wrapper hover-scroll-overlay-y my-5"
                            data-kt-scroll="true" data-kt-scroll-activate="true" data-kt-scroll-height="auto"
                            data-kt-scroll-dependencies="#kt_app_sidebar_logo, #kt_app_sidebar_footer"
                            data-kt-scroll-wrappers="#kt_app_sidebar_menu" data-kt-scroll-offset="5px"
                            data-kt-scroll-save-state="true">
                            <!--begin::Menu-->
                            <div class="menu menu-column menu-rounded menu-sub-indention px-3" id="#kt_app_sidebar_menu"
                                data-kt-menu="true" data-kt-menu-expand="false">
                                <!--begin:Menu item-->
                                {{-- <div class="menu-item"> --}}
                                    <!--begin:Menu link-->
                                    {{-- <a class="menu-link" href="/home" target="_self">
                                        <span class="menu-icon">
                                            <i class="ki-duotone ki-element-11 fs-2">
                                                <span class="path1"></span>
                                                <span class="path2"></span>
                                                <span class="path3"></span>
                                                <span class="path4"></span>
                                            </i>
                                        </span>
                                        <span class="menu-title">ダッシュボード</span>
                                    </a> --}}
                                    <!--end:Menu link-->
                                    {{--
                                </div> --}}
                                <!--begin:Menu item-->
                                @if(Str::contains(url()->current(), 'myItem'))
                                <div data-kt-menu-trigger="click" class="menu-item menu-accordion hover show">
                                    @else
                                    <div data-kt-menu-trigger="click" class="menu-item menu-accordion">
                                        @endif
                                        <!--begin:Menu link-->
                                        <span class="menu-link">
                                            <span class="menu-icon">
                                                <i class="ki-duotone ki-picture fs-2">
                                                    <span class="path1"></span>
                                                    <span class="path2"></span>
                                                </i>
                                            </span>
                                            <span class="menu-title">私の作品</span>
                                            <span class="menu-arrow"></span>
                                        </span>
                                        <!--end:Menu link-->
                                        <!--begin:Menu sub-->
                                        <div class="menu-sub menu-sub-accordion">
                                            <!--begin:Menu item-->
                                            <div class="menu-item">
                                                <!--begin:Menu link-->
                                                <a class="menu-link" href="{{ route('myItem.create') }}">
                                                    <span class="menu-bullet">
                                                        <span class="bullet bullet-dot"></span>
                                                    </span>
                                                    <span class="menu-title">登録</span>
                                                </a>
                                                <!--end:Menu link-->
                                            </div>
                                            <!--end:Menu item-->
                                            <!--begin:Menu item-->
                                            <div class="menu-item">
                                                <!--begin:Menu link-->
                                                <a class="menu-link" href="{{ route('myItem.index') }}">
                                                    <span class="menu-bullet">
                                                        <span class="bullet bullet-dot"></span>
                                                    </span>
                                                    <span class="menu-title">リスト</span>
                                                </a>
                                                <!--end:Menu link-->
                                            </div>
                                            <!--end:Menu item-->
                                        </div>
                                        <!--end:Menu sub-->
                                    </div>
                                    <!--end:Menu item-->

                                    <!--begin:Menu item-->
                                    @if(Str::contains(url()->current(), 'requestMatch'))
                                    <div data-kt-menu-trigger="click" class="menu-item menu-accordion hover show">
                                        @else
                                        <div data-kt-menu-trigger="click" class="menu-item menu-accordion">
                                            @endif
                                            <!--begin:Menu link-->
                                            <span class="menu-link">
                                                <span class="menu-icon">
                                                    <i class="ki-duotone ki-messages fs-2">
                                                        <span class="path1"></span>
                                                        <span class="path2"></span>
                                                        <span class="path3"></span>
                                                        <span class="path4"></span>
                                                        <span class="path5"></span>
                                                    </i>
                                                </span>
                                                <span class="menu-title">交換リクエスト</span>
                                                <span class="menu-arrow"></span>
                                            </span>
                                            <!--end:Menu link-->
                                            <!--begin:Menu sub-->
                                            <div class="menu-sub menu-sub-accordion">
                                                <!--begin:Menu item-->
                                                <div class="menu-item">
                                                    <!--begin:Menu link-->
                                                    <a class="menu-link" href="{{route('requestMatch_inbox')}}">
                                                        <span class="menu-bullet">
                                                            <span class="bullet bullet-dot"></span>
                                                        </span>
                                                        <span class="menu-title">交換リクエスト一覧</span>
                                                    </a>
                                                    <!--end:Menu link-->
                                                </div>
                                                <!--end:Menu item-->
                                                <!--begin:Menu item-->
                                                <div class="menu-item">
                                                    <!--begin:Menu link-->
                                                    <a class="menu-link" href="{{ route('requestMatch.index') }}">
                                                        <span class="menu-bullet">
                                                            <span class="bullet bullet-dot"></span>
                                                        </span>
                                                        <span class="menu-title">交換リクエスト</span>
                                                    </a>
                                                    <!--end:Menu link-->
                                                </div>
                                                <!--end:Menu item-->
                                            </div>
                                            <!--end:Menu sub-->
                                        </div>
                                        <!--end:Menu item-->

                                        <!--begin:Menu item-->
                                        <div class="menu-item">
                                            <!--begin:Menu link-->
                                            <a class="menu-link" href="{{ route('status.register') }}">
                                                <span class="menu-icon">
                                                    <i class="ki-duotone ki-chart-line fs-2">
                                                        <span class="path1"></span>
                                                        <span class="path2"></span>
                                                    </i>
                                                </span>
                                                <span class="menu-title">登録状況</span></a>
                                            <!--end:Menu link-->
                                        </div>
                                        <!--end:Menu item-->

                                        <!--begin:Menu item-->
                                        <div class="menu-item">
                                            <!--begin:Menu link-->
                                            <a class="menu-link" href="{{ route('status.matching') }}">
                                                <span class="menu-icon">
                                                    <i class="ki-duotone ki-document fs-2">
                                                        <span class="path1"></span>
                                                        <span class="path2"></span>
                                                    </i>
                                                </span>
                                                <span class="menu-title">マッチング状況</span></a>
                                            <!--end:Menu link-->
                                        </div>
                                        <!--end:Menu item-->

                                        @if(Auth::user()->id == 1)
                                        <!--begin:Menu item-->
                                        <div class="menu-item">
                                            <!--begin:Menu link-->
                                            <a class="menu-link" href="{{route('userMana.index')}}">
                                                <span class="menu-icon">
                                                    <i class="ki-duotone ki-profile-user fs-2">
                                                        <span class="path1"></span>
                                                        <span class="path2"></span>
                                                        <span class="path3"></span>
                                                        <span class="path4"></span>
                                                    </i>
                                                </span>
                                                <span class="menu-title">ユーザー管理</span></a>
                                            <!--end:Menu link-->
                                        </div>
                                        <!--end:Menu item-->
                                        @endif

                                        <!--begin:Menu item-->
                                        <div class="menu-item">
                                            <!--begin:Menu link-->
                                            <a class="menu-link" href="{{ route('use_method') }}">
                                                <span class="menu-icon">
                                                    <i class="ki-duotone ki-abstract-26 fs-2">
                                                        <span class="path1"></span>
                                                        <span class="path2"></span>
                                                    </i>
                                                </span>
                                                <span class="menu-title">使い方</span></a>
                                            <!--end:Menu link-->
                                        </div>
                                        <!--end:Menu item-->

                                    </div>
                                    <!--end::Menu-->
                                </div>
                                <!--end::Menu wrapper-->
                            </div>
                            <!--end::sidebar menu-->
                            <!--begin::Footer-->
                            <div class="app-sidebar-footer flex-column-auto pt-2 pb-6 px-6" id="kt_app_sidebar_footer">
                                <a href="/terms" class="btn btn-flex flex-center btn-custom btn-primary overflow-hidden text-nowrap px-0 h-40px w-100"
                                    data-bs-toggle="tooltip" data-bs-trigger="hover" data-bs-dismiss-="click"
                                    title="">
                                    <span class="btn-label">利用規約</span>
                                    <i class="ki-duotone ki-document btn-icon fs-2 m-0">
                                        <span class="path1"></span>
                                        <span class="path2"></span>
                                    </i>
                                </a>
                            </div>
                            <!--end::Footer-->
                        </div>
                        <!--end::Sidebar-->

                        <!--begin::Main-->
                        <div class="app-main flex-column flex-row-fluid" id="kt_app_main">

                            @yield('content')

                            <!--begin::Footer-->
                            <div id="kt_app_footer" class="app-footer ">
                                <!--begin::Footer container-->
                                <div
                                    class="app-container  container-fluid d-flex flex-column flex-md-row flex-center flex-md-stack py-3 ">
                                    <!--begin::Copyright-->
                                    <div class="text-dark order-2 order-md-1">
                                        <span class="text-muted fw-semibold me-1">2023&copy;</span>
                                        <a href="javascript:;" class="text-gray-800 text-hover-primary">Copyright</a>
                                    </div>
                                    <!--end::Copyright-->

                                    <!--begin::Menu-->
                                    <ul class="menu menu-gray-600 menu-hover-primary fw-semibold order-1">
                                        <li class="menu-item">
                                            <a href="https://twitter.com/@handwrite_jpn" target="_blank"
                                                class="menu-link px-2">
                                                <i class="ki-duotone ki-twitter fs-2x">
                                                    <i class="path1"></i>
                                                    <i class="path2"></i>
                                                </i>
                                            </a>
                                        </li>

                                        <li class="menu-item">
                                            <a href="https://www.youtube.com/user/udoyoshi/" target="_blank"
                                                class="menu-link px-2">
                                                <i class="ki-duotone ki-youtube fs-2x">
                                                    <i class="path1"></i>
                                                    <i class="path2"></i>
                                                </i>
                                            </a>
                                        </li>
                                    </ul>
                                    <!--end::Menu-->
                                </div>
                                <!--end::Footer container-->
                            </div>
                            <!--end::Footer-->
                        </div>
                        <!--end:::Main-->
                    </div>
                    <!--end::Wrapper-->
                </div>
                <!--end::Page-->
            </div>
            <!--end::App-->

            <!--begin::Scrolltop-->
            <div id="kt_scrolltop" class="scrolltop" data-kt-scrolltop="true">
                <i class="ki-duotone ki-arrow-up">
                    <span class="path1"></span>
                    <span class="path2"></span>
                </i>
            </div>
            <!--end::Scrolltop-->

            <!--begin::Activities drawer-->
            <div id="kt_activities" class="bg-body" data-kt-drawer="true" data-kt-drawer-name="activities"
                data-kt-drawer-activate="true" data-kt-drawer-overlay="true"
                data-kt-drawer-width="{default:'300px', 'lg': '900px'}" data-kt-drawer-direction="end"
                data-kt-drawer-toggle="#kt_activities_toggle" data-kt-drawer-close="#kt_activities_close">

                <div class="card shadow-none border-0 rounded-0 w-100">
                    <!--begin::Header-->
                    <div class="card-header" id="kt_activities_header">
                        <h3 class="card-title fw-bold text-dark">マッチング通知状態（送信、受信）</h3>

                        <div class="card-toolbar">
                            <button type="button" class="btn btn-sm btn-icon btn-active-light-primary me-n5"
                                id="kt_activities_close">
                                <i class="ki-duotone ki-cross fs-1">
                                    <span class="path1"></span>
                                    <span class="path2"></span>
                                </i>
                            </button>
                        </div>
                    </div>
                    <!--end::Header-->

                    <!--begin::Body-->
                    <div class="card-body position-relative" id="kt_activities_body">
                        <!--begin::Content-->
                        <div id="kt_activities_scroll" class="position-relative scroll-y me-n5 pe-5"
                            data-kt-scroll="true" data-kt-scroll-height="auto"
                            data-kt-scroll-wrappers="#kt_activities_body"
                            data-kt-scroll-dependencies="#kt_activities_header, #kt_activities_footer"
                            data-kt-scroll-offset="5px">

                            @foreach($request_matches as $request_match)
                                @if($request_match->items_first->user_id == Auth::user()->id)
                                <!--begin::Items-->
                                <div class="scroll-y mh-100vh my-5 px-8">
                                    <!--begin::Item-->
                                    <div class="d-flex flex-stack py-4">
                                        <!--begin::Section-->
                                        <div class="d-flex align-items-center">
                                            <!--begin::Symbol-->
                                            <div class="symbol symbol-35px me-4">
                                                <span class="symbol-label bg-light-primary">
                                                    <i class="ki-duotone ki-arrow-down-left fs-2 text-danger">
                                                        <span class="path1"></span>
                                                        <span class="path2"></span>
                                                    </i>
                                                </span>
                                            </div>
                                            <!--end::Symbol-->

                                            <!--begin::Title-->
                                            <div class="mb-0 me-2">
                                                <p href="" class="fs-6 text-danger fw-bold" style="line-height: 1;">{{ User::find($request_match->items_first->user_id)->nickname }}さんから交換リクエストが届きました。</p>
                                                <div class="fs-6">{{ User::find($request_match->items_first->user_id)->nickname }}の作品名：{{ $request_match->items_first->title }} -> {{ User::find($request_match->items_second->user_id)->nickname }}の作品名：{{ $request_match->items_second->title }}</div>
                                            </div>
                                            <!--end::Title-->
                                            @if($request_match->receive_date == null)
                                            <span class="badge badge-success me-2">New</span>
                                            @endif
                                        </div>
                                        <!--end::Section-->

                                        <!--begin::Label-->
                                        {{ $request_match->updated_at->diff(now())->format('%d日 %h時間 %i分') }}
                                        <!--end::Label-->
                                    </div>
                                    <!--end::Item-->
                                </div>
                                <!--end::Items-->
                                @endif

                                @if($request_match->items_second->user_id == Auth::user()->id)
                                <!--begin::Items-->
                                <div class="scroll-y mh-100vh my-5 px-8">
                                    <!--begin::Item-->
                                    <div class="d-flex flex-stack py-4">
                                        <!--begin::Section-->
                                        <div class="d-flex align-items-center">
                                            <!--begin::Symbol-->
                                            <div class="symbol symbol-35px me-4">
                                                <span class="symbol-label bg-light-primary">
                                                    <i class="ki-duotone ki-arrow-up-right fs-2 text-primary">
                                                        <span class="path1"></span>
                                                        <span class="path2"></span>
                                                    </i>
                                                </span>
                                            </div>
                                            <!--end::Symbol-->

                                            <!--begin::Title-->
                                            <div class="mb-0 me-2">
                                                <p class="fs-6 text-primary fw-bold" style="line-height: 1;">{{ User::find($request_match->items_second->user_id)->nickname }}さんに交換リクエストを送りました。</p>
                                                <div class="fs-6">{{ User::find($request_match->items_second->user_id)->nickname }}の作品名：{{ $request_match->items_second->title }} -> {{ User::find($request_match->items_first->user_id)->nickname }}の作品名：{{ $request_match->items_first->title }}</div>
                                            </div>
                                            <!--end::Title-->
                                            @if($request_match->receive_date == null)
                                            <span class="badge badge-success me-2">New</span>
                                            @endif
                                        </div>
                                        <!--end::Section-->

                                        <!--begin::Label-->
                                        {{ $request_match->created_at->diff(now())->format('%d日 %h時間 %i分') }}
                                        <!--end::Label-->
                                    </div>
                                    <!--end::Item-->
                                </div>
                                <!--end::Items-->
                                @endif
                            @endforeach
                        </div>
                        <!--end::Content-->
                    </div>
                    <!--end::Body-->

                    <!--begin::Footer-->
                    <div class="card-footer py-5 text-center" id="kt_activities_footer">
                        <a href="{{ route('requestMatch_inbox') }}"
                            class="btn btn-bg-body text-primary">
                            全て見る
                            <i class="ki-duotone ki-arrow-right fs-3 text-primary">
                                <span class="path1"></span>
                                <span class="path2"></span>
                            </i>
                        </a>
                    </div>
                    <!--end::Footer-->
                </div>
            </div>
            <!--end::Activities drawer-->
        </div>
    </div>

</body>
<!--end::Body-->

</html>