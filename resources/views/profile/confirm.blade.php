<!DOCTYPE html>
<!--
Author: Keenthemes
Product Name: Metronic
Product Version: 8.1.8
Purchase: https://1.envato.market/EA4JP
Website: http://www.keenthemes.com
Contact: support@keenthemes.com
Follow: www.twitter.com/keenthemes
Dribbble: www.dribbble.com/keenthemes
Like: www.facebook.com/keenthemes
License: For each use you must have a valid license purchased only from above link in order to legally use the theme for your project.
-->
<html lang="en">
<!--begin::Head-->

<head>
    <title>プロフィール確認</title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta property="og:locale" content="en_US" />
    <meta property="og:type" content="article" />

    <link rel="shortcut icon" href="{{ asset('/favicon.ico') }}" />

    <!--begin::Fonts(mandatory for all pages)-->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Inter:300,400,500,600,700" />
    <!--end::Fonts-->

    <!--begin::Vendor Stylesheets(used for this page only)-->
    <link href="{{ asset('/metronic/assets/plugins/custom/datatables/datatables.bundle.css') }}" rel="stylesheet"
        type="text/css" />
    <!--end::Vendor Stylesheets-->


    <!--begin::Global Stylesheets Bundle(mandatory for all pages)-->
    <link href="{{ asset('/metronic/assets/plugins/global/plugins.bundle.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('/metronic/assets/css/style.bundle.css') }}" rel="stylesheet" type="text/css" />
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
            j.src = 'https://www.googletagmanager.com/gtm.js?id=' + i + dl;
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

<body>

    <!--begin::Basic info-->
    <div id="kt_app_content_container" class="app-container container-xxl" style="margin-top: 15vh;">
        <!--begin::details View-->
        <div class="card mb-5 mb-xl-10" id="kt_profile_details_view">
            <!--begin::Card header-->
            <div class="card-header cursor-pointer">
                <!--begin::Card title-->
                <div class="card-title m-0">
                    <h3 class="fw-bold m-0">公開ページ確認</h3>
                </div>
                <!--end::Card title-->

                <!--begin::Action-->
                <a href="/profile/{{ Auth::user()->id }}" class="btn btn-sm btn-primary align-self-center">プロフィール編集</a>
                <!--end::Action-->
            </div>
            <!--begin::Card header-->

            <!--begin::Card body-->
            <div class="card-body p-9 d-flex">
                <div class="col-lg-6">
                    <!--begin::Row-->
                    <div class="row mb-7">
                        <!--begin::Label-->
                        <label class="col-lg-4 fw-semibold text-muted">プロフィール画像</label>
                        <!--end::Label-->

                        <!--begin::Col-->
                        <div class="col-lg-8">
                            <!--begin: Pic-->
                            <div class="me-7 mb-4">
                                <div class="symbol symbol-100px symbol-lg-160px symbol-fixed position-relative">
                                    <img src="{{ asset(Auth::user()->avatar_url) }}" alt="image">
                                </div>
                            </div>
                            <!--end::Pic-->
                        </div>
                        <!--end::Col-->
                    </div>
                    <!--end::Row-->

                    <!--begin::Row-->
                    <div class="row mb-7">
                        <!--begin::Label-->
                        <label class="col-lg-4 fw-semibold text-muted">氏 名</label>
                        <!--end::Label-->

                        <!--begin::Col-->
                        <div class="col-lg-8">
                            <span class="fw-bold fs-6 text-gray-800">{{ Auth::user()->firstname }} {{
                                Auth::user()->lastname }}</span>
                        </div>
                        <!--end::Col-->
                    </div>
                    <!--end::Row-->

                    <!--begin::Input group-->
                    <div class="row mb-7">
                        <!--begin::Label-->
                        <label class="col-lg-4 fw-semibold text-muted">ペンネーム</label>
                        <!--end::Label-->

                        <!--begin::Col-->
                        <div class="col-lg-8 fv-row">
                            <span class="fw-semibold text-gray-800 fs-6">{{ Auth::user()->nickname }}</span>
                        </div>
                        <!--end::Col-->
                    </div>
                    <!--end::Input group-->

                    <!--begin::Input group-->
                    <div class="row mb-7">
                        <!--begin::Label-->
                        <label class="col-lg-4 fw-semibold text-muted">メールアドレス</label>
                        <!--end::Label-->

                        <!--begin::Col-->
                        <div class="col-lg-8 fv-row">
                            <a href="mailto:;{{ Auth::user()->email }}" class="fw-semibold text-gray-800 fs-6">{{
                                Auth::user()->email }}</a>
                            @if(Auth::user()->email_verified_at != null)
                            <span class="badge badge-success">Verified</span>
                            @endif
                        </div>
                        <!--end::Col-->
                    </div>
                    <!--end::Input group-->

                    <!--begin::Input group-->
                    <div class="row mb-7">
                        <!--begin::Label-->
                        <label class="col-lg-4 fw-semibold text-muted">
                            電話番号
                        </label>
                        <!--end::Label-->

                        <!--begin::Col-->
                        <div class="col-lg-8 d-flex align-items-center">
                            <span class="fw-bold fs-6 text-gray-800 me-2">{{ Auth::user()->phone_number }}</span>
                        </div>
                        <!--end::Col-->
                    </div>
                    <!--end::Input group-->

                    <!--begin::Input group-->
                    <div class="row mb-7">
                        <!--begin::Label-->
                        <label class="col-lg-4 fw-semibold text-muted">郵便番号</label>
                        <!--end::Label-->

                        <!--begin::Col-->
                        <div class="col-lg-8">
                            <label class="fw-semibold fs-6 text-gray-800">{{ Auth::user()->postal_code }}</label>
                        </div>
                        <!--end::Col-->
                    </div>
                    <!--end::Input group-->

                    <!--begin::Input group-->
                    <div class="row mb-7">
                        <!--begin::Label-->
                        <label class="col-lg-4 fw-semibold text-muted">都道府県</label>
                        <!--end::Label-->

                        <!--begin::Col-->
                        <div class="col-lg-8">
                            <label class="fw-semibold fs-6 text-gray-800">{{ Auth::user()->prefectures }}</label>
                        </div>
                        <!--end::Col-->
                    </div>
                    <!--end::Input group-->

                    <!--begin::Input group-->
                    <div class="row mb-7">
                        <!--begin::Label-->
                        <label class="col-lg-4 fw-semibold text-muted">住所（番地まで）</label>
                        <!--end::Label-->

                        <!--begin::Col-->
                        <div class="col-lg-8">
                            <label class="fw-semibold fs-6 text-gray-800">{{ Auth::user()->house_number }}</label>
                        </div>
                        <!--end::Col-->
                    </div>
                    <!--end::Input group-->

                    <!--begin::Input group-->
                    <div class="row mb-7">
                        <!--begin::Label-->
                        <label class="col-lg-4 fw-semibold text-muted">住所（ビル名等）</label>
                        <!--end::Label-->

                        <!--begin::Col-->
                        <div class="col-lg-8">
                            <label class="fw-semibold fs-6 text-gray-800">{{ Auth::user()->building_name }}</label>
                        </div>
                        <!--end::Col-->
                    </div>
                    <!--end::Input group-->

                    <!--begin::Input group-->
                    <div class="row mb-7">
                        <!--begin::Label-->
                        <label class="col-lg-4 fw-semibold text-muted">ツイッター</label>
                        <!--end::Label-->

                        <!--begin::Col-->
                        <div class="col-lg-8">
                            <a href="{{ Auth::user()->twitter }}" target="_blank" class="fw-semibold fs-6 text-gray-800">{{ Auth::user()->twitter }}</a>
                        </div>
                        <!--end::Col-->
                    </div>
                    <!--end::Input group-->

                    <!--begin::Input group-->
                    <div class="row mb-7">
                        <!--begin::Label-->
                        <label class="col-lg-4 fw-semibold text-muted">インスタ</label>
                        <!--end::Label-->

                        <!--begin::Col-->
                        <div class="col-lg-8">
                            <a href="{{ Auth::user()->instagram }}" target="_blank" class="fw-semibold fs-6 text-gray-800">{{ Auth::user()->instagram }}</a>
                        </div>
                        <!--end::Col-->
                    </div>
                    <!--end::Input group-->

                    <!--begin::Input group-->
                    <div class="row mb-7">
                        <!--begin::Label-->
                        <label class="col-lg-4 fw-semibold text-muted">TikTok</label>
                        <!--end::Label-->

                        <!--begin::Col-->
                        <div class="col-lg-8">
                            <a href="{{ Auth::user()->tiktok }}" target="_blank" class="fw-semibold fs-6 text-gray-800">{{ Auth::user()->tiktok }}</a>
                        </div>
                        <!--end::Col-->
                    </div>
                    <!--end::Input group-->
                </div>

                <div class="col-lg-6">
                    <iframe width="640" height="480" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" class="w-100" src="https://maps.google.it/maps?q={{ Auth::user()->postal_code }}&output=embed"></iframe>
                </div>
            </div>
            <!--end::Card body-->
        </div>
        <!--end::details View-->
    </div>
    <!--end::Basic info-->
    <!--begin::Javascript-->
    <script>
        var hostUrl = "/metronic8/demo1/assets/";
    </script>

    <script src="https://ajaxzip3.github.io/ajaxzip3.js" charset="UTF-8"></script>


    <!--begin::Global Javascript Bundle(mandatory for all pages)-->
    <script src="{{ asset('/metronic/assets/plugins/global/plugins.bundle.js') }}"></script>
    <script src="{{ asset('/metronic/assets/js/scripts.bundle.js') }}"></script>
    <!--end::Global Javascript Bundle-->

    <!--begin::Vendors Javascript(used for this page only)-->
    <script src="{{ asset('/metronic/assets/plugins/custom/datatables/datatables.bundle.js') }}"></script>
    <!--end::Vendors Javascript-->

    <!--begin::Custom Javascript(used for this page only)-->
    <script src="{{ asset('/metronic/assets/js/custom/account/settings/signin-methods.js') }}"></script>
    <script src="{{ asset('/metronic/assets/js/custom/account/settings/profile-details.js') }}"></script>
    <script src="{{ asset('/metronic/assets/js/custom/account/settings/deactivate-account.js') }}"></script>
    <script src="{{ asset('/metronic/assets/js/custom/pages/user-profile/general.js') }}"></script>
    <script src="{{ asset('/metronic/assets/js/widgets.bundle.js') }}"></script>
    <script src="{{ asset('/metronic/assets/js/custom/widgets.js') }}"></script>
    <script src="{{ asset('/metronic/assets/js/custom/apps/chat/chat.js') }}"></script>
    <script src="{{ asset('/metronic/assets/js/custom/utilities/modals/upgrade-plan.js') }}"></script>
    <script src="{{ asset('/metronic/assets/js/custom/utilities/modals/create-app.js') }}"></script>
    <script src="{{ asset('/metronic/assets/js/custom/utilities/modals/offer-a-deal/type.js') }}"></script>
    <script src="{{ asset('/metronic/assets/js/custom/utilities/modals/offer-a-deal/details.js') }}"></script>
    <script src="{{ asset('/metronic/assets/js/custom/utilities/modals/offer-a-deal/finance.js') }}"></script>
    <script src="{{ asset('/metronic/assets/js/custom/utilities/modals/offer-a-deal/complete.js') }}"></script>
    <script src="{{ asset('/metronic/assets/js/custom/utilities/modals/offer-a-deal/main.js') }}"></script>
    <script src="{{ asset('/metronic/assets/js/custom/utilities/modals/two-factor-authentication.js') }}"></script>
    <script src="{{ asset('/metronic/assets/js/custom/utilities/modals/users-search.js') }}"></script>
    <!--end::Custom Javascript-->
    <!--end::Javascript-->

    <script>
        function uploadImg() {
            var inputElement = document.querySelector('input[type="file"]');

            var file = inputElement.files[0];
            var reader = new FileReader();
            reader.onload = function() {

                // Convert the binary data to a base64-encoded string
                var base64String = btoa(reader.result);

                // Use the base64-encoded string as needed
                base64String = 'data:' + file.type + ';base64,' + base64String;

                $('#avatar_img').val(base64String);

            };

            reader.readAsBinaryString(file);
        }
    </script>

</body>
<!--end::Body-->

</html>