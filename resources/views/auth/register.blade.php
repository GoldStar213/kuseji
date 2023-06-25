<!DOCTYPE html>

<html lang="en">

<head>
    <title>クセ字コンテスト　クセ字交換会</title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta property="og:locale" content="jp" />
    
    <link rel="canonical" href="https://preview.keenthemes.com/metronic8" />
    <link rel="shortcut icon" href="{{ asset('/favicon.png') }}" />

    <!--begin::Fonts(mandatory for all pages)-->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Inter:300,400,500,600,700" />
    <!--end::Fonts-->

    <!--begin::Global Stylesheets Bundle(mandatory for all pages)-->
    <link href="https://preview.keenthemes.com/metronic8/demo1/assets/plugins/global/plugins.bundle.css"
        rel="stylesheet" type="text/css" />
    <link href="https://preview.keenthemes.com/metronic8/demo1/assets/css/style.bundle.css" rel="stylesheet"
        type="text/css" />
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

<body id="kt_body" class="app-blank">
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

        <!--begin::Authentication - Sign-up -->
        <div class="d-flex flex-column flex-lg-row flex-column-fluid">
            <!--begin::Body-->
            <div class="d-flex flex-column flex-lg-row-fluid w-lg-50 p-10 order-2 order-lg-1">
                <!--begin::Form-->
                <div class="d-flex flex-center flex-column flex-lg-row-fluid">
                    <!--begin::Wrapper-->
                    <div class="w-lg-500px p-10">

                        <!--begin::Form-->
                        <form class="form w-100" method="POST" action="{{ route('register') }}">
                            @csrf
                            <!--begin::Heading-->
                            <div class="text-center mb-11">
                                <!--begin::Title-->
                                <h1 class="text-dark fw-bolder mb-3">
                                    会員登録
                                </h1>
                                <!--end::Title-->

                                <!--begin::Subtitle-->
                                <div class="text-gray-500 fw-semibold fs-6">
                                    情報を入力してください。
                                </div>
                                <!--end::Subtitle--->
                            </div>
                            <!--begin::Heading-->
                            
                            <div class="fv-row mb-8">
                                <!--begin::Email-->
                                <input type="text" placeholder="メール" name="email" autocomplete="off" class="form-control bg-transparent @error('email') is-invalid @enderror" value="{{ old('email') }}" />
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                <!--end::Email-->
                            </div>

                            <!--begin::Input group-->
                            <div class="fv-row mb-8" data-kt-password-meter="true">
                                <!--begin::Wrapper-->
                                <div class="mb-1">
                                    <!--begin::Input wrapper-->
                                    <div class="position-relative mb-3">
                                        <input class="form-control bg-transparent @error('password') is-invalid @enderror" placeholder="パスワード" type="password" name="password" value="{{ old('password') }}" />
                                        @error('password')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <!--end::Input wrapper-->
                                </div>
                                <!--end::Wrapper-->
                            </div>
                            <!--end::Input group--->

                            <!--end::Input group--->
                            <div class="fv-row mb-8">
                                <!--begin::Repeat Password-->
                                <input class="form-control bg-transparent" placeholder="パスワードを繰り返す" type="password" name="password_confirmation" value="{{ old('password_confirmation') }}" />
                                <!--end::Repeat Password-->
                            </div>
                            <!--end::Input group--->

                            <!--begin::Accept-->
                            <div class="fv-row mb-8">
                                {{-- <label class="form-check form-check-inline">
                                    <input class="form-check-input" type="checkbox" name="toc" value="" />
                                    <span class="form-check-label fw-semibold text-gray-700 fs-base ms-1">
                                        
                                    </span>
                                </label> --}}
                                <div class="form-check">
                                    <input type="checkbox" class="form-check-input" id="terms" name="terms">
                                    <label for="terms"><a href="{{ route('terms') }}" class="ms-1 link-primary">利用規約</a>に同意します。</label>
                                </div>
                                @error('terms')
                                    <span class="invalid-feedback d-block" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <!--end::Accept-->

                            <!--begin::Submit button-->
                            <div class="d-grid mb-10">
                                <button type="submit" id="kt_sign_up_submit" class="btn btn-primary">

                                    <!--begin::Indicator label-->
                                    <span class="indicator-label">登 録</span>
                                    <!--end::Indicator label-->

                                    <!--begin::Indicator progress-->
                                    <span class="indicator-progress">
                                        お待ちください...<span class="spinner-border spinner-border-sm align-middle ms-2"></span>
                                    </span>
                                    <!--end::Indicator progress-->
                                </button>
                            </div>
                            <!--end::Submit button-->

                            <!--begin::Sign up-->
                            <div class="text-gray-500 text-center fw-semibold fs-6">
                                すでにアカウントを持っていますか?
                                <a href="/login" class="link-primary fw-semibold">ログイン</a>
                            </div>
                            <!--end::Sign up-->
                        </form>
                        <!--end::Form-->

                    </div>
                    <!--end::Wrapper-->
                </div>
                <!--end::Form-->

                <!--begin::Footer-->
                <div class="w-lg-500px d-flex flex-stack px-10 mx-auto">
                    <!--begin::Languages-->
                    <div class="me-10"></div>
                    <!--end::Languages-->

                    <!--begin::Links-->
                    <div class="d-flex fw-semibold text-primary fs-base gap-5">
                        <a href="/terms">利用規約</a>
                        <a href="/#contact">お問い合わせ</a>
                    </div>
                    <!--end::Links-->
                </div>
                <!--end::Footer-->
            </div>
            <!--end::Body-->
        </div>
        <!--end::Authentication - Sign-up-->



    </div>
    <!--end::Root-->

    <!--begin::Javascript-->
    <script>
        var hostUrl = "/metronic8/demo1/assets/";
    </script>

    <!--begin::Global Javascript Bundle(mandatory for all pages)-->
    <script src="{{ asset('/metronic/assets/plugins/global/plugins.bundle.js') }}"></script>
    <script src="{{ asset('/metronic/assets/js/scripts.bundle.js') }}"></script>
    <!--end::Global Javascript Bundle-->


    <!--begin::Custom Javascript(used for this page only)-->
    <script src="{{ asset('/metronic/assets/js/custom/authentication/sign-up/general.js') }}"></script>
    <!--end::Custom Javascript-->
    <!--end::Javascript-->

</body>
<!--end::Body-->

</html>
