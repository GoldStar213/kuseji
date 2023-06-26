@extends('layouts.app')

@section('content')
<div class="app-main flex-column flex-row-fluid" id="kt_app_main">
    <!--begin::Content wrapper-->
    <div class="d-flex flex-column flex-column-fluid">

        <!--begin::Toolbar-->
        <div id="kt_app_toolbar" class="app-toolbar  py-3 py-lg-6 ">

            <!--begin::Toolbar container-->
            <div id="kt_app_toolbar_container" class="app-container  container-xxl d-flex flex-stack ">
                <!--begin::Page title-->
                <div class="page-title d-flex flex-column justify-content-center flex-wrap me-3 ">
                    <!--begin::Title-->
                    <h1 class="page-heading d-flex text-dark fw-bold fs-3 flex-column justify-content-center my-0">使い方</h1>
                    <!--end::Title-->
                </div>
                <!--end::Page title-->
            </div>
            <!--end::Toolbar container-->
        </div>
        <!--end::Toolbar-->

        <!--begin::Content-->
        <div id="kt_app_content" class="app-content  flex-column-fluid ">
            <!--begin::Content container-->
            <div id="kt_app_content_container" class="app-container  container-xxl ">
                <!--begin::Post card-->
                <div class="card">
                    <!--begin::Body-->
                    <div class="card-body p-lg-20 pb-lg-0">
                        <!--begin::Layout-->
                        <div class="d-flex flex-column flex-xl-row">
                            <!--begin::Content-->
                            <div class="flex-lg-row-fluid me-xl-15">
                                <!--begin::Post content-->
                                <div class="mb-10">
                                    <!--begin::Wrapper-->
                                    <div class="mb-8">
                                        <!--begin::Title-->
                                        <a class="text-dark text-hover-primary fs-2 fw-bold">
                                            1. 会員登録
                                        </a>
                                        <!--end::Title-->

                                        <!--begin::Description-->
                                        <div class="fs-5 fw-semibold text-gray-600">
                                            <!--begin::Text-->
                                            <p class="mt-8 mb-5">
                                                メールアドレス、パスワードを設定して、利用規約に☑して「登録」を押してください。
                                            </p>
                                            <!--end::Text-->
                                        </div>
                                        <!--end::Description-->

                                        <!--begin::Container-->
                                        <div class="overlay mt-8">
                                            <!--begin::Image-->
                                            <div class="bgi-no-repeat bgi-position-center bgi-size-cover card-rounded border border-dark w-100 w-lg-50 mx-auto">
                                                <img class="w-100 rounded" src="{{ asset('/assets/img/use_method/01.png') }}" alt="">
                                            </div>
                                            <!--end::Image-->
                                        </div>
                                        <!--end::Container-->
                                    </div>
                                    <!--end::Wrapper-->
                                </div>

                                <div class="mb-10">
                                    <!--begin::Wrapper-->
                                    <div class="mb-8">
                                        <!--begin::Title-->
                                        <a class="text-dark text-hover-primary fs-2 fw-bold">
                                            2. メールアドレス確認
                                        </a>
                                        <!--end::Title-->

                                        <!--begin::Description-->
                                        <div class="fs-5 fw-semibold text-gray-600">
                                            <!--begin::Text-->
                                            <p class="mt-8 mb-5">
                                                登録したメールに届いたメールで「メールアドレス確認」を行なってください。
                                            </p>
                                            <!--end::Text-->
                                        </div>
                                        <!--end::Description-->

                                        <!--begin::Container-->
                                        <div class="overlay mt-8">
                                            <!--begin::Image-->
                                            <div class="bgi-no-repeat bgi-position-center bgi-size-cover card-rounded border w-100 w-lg-50 mx-auto">
                                                <img class="w-100 rounded" src="{{ asset('/assets/img/use_method/02.png') }}" alt="">
                                            </div>
                                            <!--end::Image-->
                                        </div>
                                        <!--end::Container-->
                                    </div>
                                    <!--end::Wrapper-->
                                </div>

                                <div class="mb-10">
                                    <!--begin::Wrapper-->
                                    <div class="mb-8">
                                        <!--begin::Title-->
                                        <a class="text-dark text-hover-primary fs-2 fw-bold">
                                            3. 個人情報編集
                                        </a>
                                        <!--end::Title-->

                                        <!--begin::Description-->
                                        <div class="fs-5 fw-semibold text-gray-600">
                                            <!--begin::Text-->
                                            <p class="mt-8 mb-5">
                                                必要事項を入れてください。(後に編集可能)
                                            </p>
                                            <!--end::Text-->
                                        </div>
                                        <!--end::Description-->

                                        <!--begin::Container-->
                                        <div class="overlay mt-8">
                                            <!--begin::Image-->
                                            <div class="row">
                                                <div class="col-lg-6">
                                                    <div class="bgi-no-repeat bgi-position-center bgi-size-cover card-rounded border">
                                                        <img class="w-100 rounded" src="{{ asset('/assets/img/use_method/03.png') }}" alt="">
                                                    </div>
                                                </div>
                                                <div class="col-lg-6">
                                                    <div class="bgi-no-repeat bgi-position-center bgi-size-cover card-rounded border">
                                                        <img class="w-100 rounded" src="{{ asset('/assets/img/use_method/04.png') }}" alt="">
                                                    </div>
                                                </div>
                                            </div>
                                            <!--end::Image-->
                                        </div>
                                        <!--end::Container-->
                                    </div>
                                    <!--end::Wrapper-->
                                </div>

                                <div class="mb-10">
                                    <!--begin::Wrapper-->
                                    <div class="mb-8">
                                        <!--begin::Title-->
                                        <a class="text-dark text-hover-primary fs-2 fw-bold">
                                            4. 作品登録
                                        </a>
                                        <!--end::Title-->

                                        <!--begin::Description-->
                                        <div class="fs-5 fw-semibold text-gray-600">
                                            <!--begin::Text-->
                                            <p class="mt-8 mb-5">
                                                作品登録をしてください。 仮登録だけして、先に「決済」に進んでください。(編集も可能)
                                            </p>
                                            <p class="mb-5">
                                                ※決済を先にしないと出品(+クセ字交換会)できません。
                                            </p>
                                            <!--end::Text-->
                                        </div>
                                        <!--end::Description-->

                                        <!--begin::Container-->
                                        <div class="overlay mt-8">
                                            <!--begin::Image-->
                                            <div class="row">
                                                <div class="col-lg-6">
                                                    <div class="bgi-no-repeat bgi-position-center bgi-size-cover card-rounded border">
                                                        <img class="w-100 rounded" src="{{ asset('/assets/img/use_method/05.png') }}" alt="">
                                                    </div>
                                                </div>
                                                <div class="col-lg-6">
                                                    <div class="bgi-no-repeat bgi-position-center bgi-size-cover card-rounded border">
                                                        <img class="w-100 rounded" src="{{ asset('/assets/img/use_method/06.png') }}" alt="">
                                                    </div>
                                                </div>
                                            </div>
                                            <!--end::Image-->
                                        </div>
                                        <!--end::Container-->
                                    </div>
                                    <!--end::Wrapper-->
                                </div>
                                <!--end::Post content-->
                            </div>
                            <!--end::Content-->
                        </div>
                        <!--end::Layout-->
                    </div>
                    <!--end::Body-->
                </div>
                <!--end::Post card-->
            </div>
            <!--end::Content container-->
        </div>
        <!--end::Content-->
    </div>
    <!--end::Content wrapper-->
</div>
@endsection