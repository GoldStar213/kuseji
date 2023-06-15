<!DOCTYPE html>

<html lang="en">
<!--begin::Head-->

<head>
    <title>Verify Email</title>
    <meta charset="utf-8" />
    <meta name="description" content="" />
    <meta name="keywords" content="" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta property="og:locale" content="en_US" />
    <meta property="og:type" content="article" />
    <meta property="og:title" content="" />
    <meta property="og:url" content="https://keenthemes.com/metronic" />
    <meta property="og:site_name" content="Keenthemes | Metronic" />
    <link rel="canonical" href="https://preview.keenthemes.com/metronic8" />
    <link rel="shortcut icon" href="{{ asset('/favicon.png') }}" />

    <!--begin::Fonts(mandatory for all pages)-->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Inter:300,400,500,600,700" />
    <!--end::Fonts-->



    <!--begin::Global Stylesheets Bundle(mandatory for all pages)-->
    <link href="/metronic8/demo1/assets/plugins/global/plugins.bundle.css" rel="stylesheet" type="text/css" />
    <link href="/metronic8/demo1/assets/css/style.bundle.css" rel="stylesheet" type="text/css" />
    <!--end::Global Stylesheets Bundle-->

    <!--Begin::Google Tag Manager -->
    <script>
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
    </script>
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

<body id="kt_body" class="app-blank bgi-size-cover bgi-position-center bgi-no-repeat">
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
    <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-5FS8GGP" height="0" width="0"
            style="display:none;visibility:hidden"></iframe></noscript>
    <!--End::Google Tag Manager (noscript) -->

    <!--begin::Root-->
    <div class="d-flex flex-column flex-root" id="kt_app_root">
        <!--begin::Page bg image-->
        <style>
            body {
                background-image: url('/metronic8/demo1/assets/media/auth/bg5.jpg');
            }

            [data-bs-theme="dark"] body {
                background-image: url('/metronic8/demo1/assets/media/auth/bg5-dark.jpg');
            }
        </style>
        <!--end::Page bg image-->


        <!--begin::Authentication - Signup Welcome Message -->
        <div class="d-flex flex-column flex-center flex-column-fluid">
            <!--begin::Content-->
            <div class="d-flex flex-column flex-center text-center p-10">
                <!--begin::Wrapper-->
                <div class="card card-flush w-lg-650px py-5">
                    <div class="card-body py-15 py-lg-20">

                        <!--begin::Logo-->
                        <div class="mb-14">
                            <a href="/metronic8/demo1/../demo1/index.html" class="">
                                <img alt="Logo" src="/metronic8/demo1/assets/media/logos/custom-2.svg"
                                    class="h-40px" />
                            </a>
                        </div>
                        <!--end::Logo-->

                        <!--begin::Title-->
                        <h1 class="fw-bolder text-gray-900 mb-5">
                            Verify your email
                        </h1>
                        <!--end::Title-->

                        <!--begin::Action-->
                        <div class="fs-6 mb-8">
                            <span class="fw-semibold text-gray-500">Did’t receive an email?</span>

                            <a href="/metronic8/demo1/../demo1/authentication/layouts/corporate/sign-up.html"
                                class="link-primary fw-bold"> Try Again</a>
                        </div>
                        <!--end::Action-->

                        <!--begin::Link-->
                        <div class="mb-11">
                            <a href="/metronic8/demo1/../demo1/index.html" class="btn btn-sm btn-primary">Skip for
                                now</a>
                        </div>
                        <!--end::Link-->

                        <!--begin::Illustration-->
                        <div class="mb-0">
                            <img src="/metronic8/demo1/assets/media/auth/please-verify-your-email.png"
                                class="mw-100 mh-300px theme-light-show" alt="" />
                            <img src="/metronic8/demo1/assets/media/auth/please-verify-your-email-dark.png"
                                class="mw-100 mh-300px theme-dark-show" alt="" />
                        </div>
                        <!--end::Illustration-->

                    </div>
                </div>
                <!--end::Wrapper-->
            </div>
            <!--end::Content-->
        </div>
        <!--end::Authentication - Signup Welcome Message-->
    </div>
    <!--end::Root-->

    <!--begin::Javascript-->
    <script>
        var hostUrl = "/metronic8/demo1/assets/";
    </script>

    <!--begin::Global Javascript Bundle(mandatory for all pages)-->
    <script src="/metronic8/demo1/assets/plugins/global/plugins.bundle.js"></script>
    <script src="/metronic8/demo1/assets/js/scripts.bundle.js"></script>
    <!--end::Global Javascript Bundle-->


    <!--end::Javascript-->

</body>
<!--end::Body-->

</html>
