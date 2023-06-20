@extends('layouts.app')

@section('content')

<!--begin::Vendor Stylesheets(used for this page only)-->
<link href="{{ asset('/metronic/assets/plugins/custom/datatables/datatables.bundle.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ asset('/metronic/assets/plugins/custom/vis-timeline/vis-timeline.bundle.css') }}" rel="stylesheet" type="text/css" />
<!--end::Vendor Stylesheets-->

<!--begin::Content wrapper-->
<div class="d-flex flex-column flex-column-fluid">

    <!--begin::Toolbar-->
    <div id="kt_app_toolbar" class="app-toolbar  py-3 py-lg-6 ">

        <!--begin::Toolbar container-->
        <div id="kt_app_toolbar_container"
            class="app-container  container-xxl d-flex flex-stack ">



            <!--begin::Page title-->
            <div class="page-title d-flex flex-column justify-content-center flex-wrap me-3 ">
                <!--begin::Title-->
                <h1 class="page-heading d-flex text-dark fw-bold fs-3 flex-column justify-content-center my-0">ダッシュボード</h1>
                <!--end::Title-->


                <!--begin::Breadcrumb-->
                <ul class="breadcrumb breadcrumb-separatorless fw-semibold fs-7 my-0 pt-1">
                    <!--begin::Item-->
                    <li class="breadcrumb-item text-muted">
                        <a href="javascript:;" class="text-muted text-hover-primary">Home</a>
                    </li>
                    <!--end::Item-->
                </ul>
                <!--end::Breadcrumb-->
            </div>
            <!--end::Page title-->
            <!--begin::Actions-->
            <div class="d-flex align-items-center gap-2 gap-lg-3">
                <!--begin::Primary button-->
                <a href="" class="btn btn-sm fw-bold btn-primary">作品登録 </a>
                <!--end::Primary button-->
            </div>
            <!--end::Actions-->
        </div>
        <!--end::Toolbar container-->
    </div>
    <!--end::Toolbar-->

    <!--begin::Content-->
    <div id="kt_app_content" class="app-content  flex-column-fluid ">

        <!--begin::Content container-->
        <div id="kt_app_content_container" class="app-container  container-xxl ">
            <!--begin::Row-->
            <div class="row g-5 g-xl-10 mb-xl-10">
                <!--begin::Col-->
                <div class="col-md-6 col-lg-6 col-xl-6 col-xxl-3 mb-md-5 mb-xl-10">

                    <!--begin::Card widget 4-->
                    <div class="card card-flush h-md-50 mb-5 mb-xl-10">
                        <!--begin::Header-->
                        <div class="card-header pt-5">
                            <!--begin::Title-->
                            <div class="card-title d-flex flex-column">
                                <!--begin::Info-->
                                <div class="d-flex align-items-center">
                                    <!--begin::Currency-->
                                    <span
                                        class="fs-4 fw-semibold text-gray-400 me-1 align-self-start">$</span>
                                    <!--end::Currency-->

                                    <!--begin::Amount-->
                                    <span
                                        class="fs-2hx fw-bold text-dark me-2 lh-1 ls-n2">69,700</span>
                                    <!--end::Amount-->

                                    <!--begin::Badge-->
                                    <span class="badge badge-light-success fs-base">
                                        <i class="ki-duotone ki-arrow-up fs-5 text-success ms-n1"><span
                                                class="path1"></span><span
                                                class="path2"></span></i>
                                        2.2%
                                    </span>
                                    <!--end::Badge-->
                                </div>
                                <!--end::Info-->

                                <!--begin::Subtitle-->
                                <span class="text-gray-400 pt-1 fw-semibold fs-6">Expected
                                    Earnings</span>
                                <!--end::Subtitle-->
                            </div>
                            <!--end::Title-->
                        </div>
                        <!--end::Header-->

                        <!--begin::Card body-->
                        <div class="card-body pt-2 pb-4 d-flex align-items-center">
                            <!--begin::Chart-->
                            <div class="d-flex flex-center me-5 pt-2">
                                <div id="kt_card_widget_4_chart"
                                    style="min-width: 70px; min-height: 70px" data-kt-size="70"
                                    data-kt-line="11">
                                </div>
                            </div>
                            <!--end::Chart-->

                            <!--begin::Labels-->
                            <div class="d-flex flex-column content-justify-center w-100">
                                <!--begin::Label-->
                                <div class="d-flex fs-6 fw-semibold align-items-center">
                                    <!--begin::Bullet-->
                                    <div class="bullet w-8px h-6px rounded-2 bg-danger me-3">
                                    </div>
                                    <!--end::Bullet-->

                                    <!--begin::Label-->
                                    <div class="text-gray-500 flex-grow-1 me-4">Shoes</div>
                                    <!--end::Label-->

                                    <!--begin::Stats-->
                                    <div class="fw-bolder text-gray-700 text-xxl-end">$7,660</div>
                                    <!--end::Stats-->
                                </div>
                                <!--end::Label-->

                                <!--begin::Label-->
                                <div class="d-flex fs-6 fw-semibold align-items-center my-3">
                                    <!--begin::Bullet-->
                                    <div class="bullet w-8px h-6px rounded-2 bg-primary me-3">
                                    </div>
                                    <!--end::Bullet-->

                                    <!--begin::Label-->
                                    <div class="text-gray-500 flex-grow-1 me-4">Gaming</div>
                                    <!--end::Label-->

                                    <!--begin::Stats-->
                                    <div class="fw-bolder text-gray-700 text-xxl-end">$2,820</div>
                                    <!--end::Stats-->
                                </div>
                                <!--end::Label-->

                                <!--begin::Label-->
                                <div class="d-flex fs-6 fw-semibold align-items-center">
                                    <!--begin::Bullet-->
                                    <div class="bullet w-8px h-6px rounded-2 me-3"
                                        style="background-color: #E4E6EF"></div>
                                    <!--end::Bullet-->

                                    <!--begin::Label-->
                                    <div class="text-gray-500 flex-grow-1 me-4">Others</div>
                                    <!--end::Label-->

                                    <!--begin::Stats-->
                                    <div class=" fw-bolder text-gray-700 text-xxl-end">$45,257
                                    </div>
                                    <!--end::Stats-->
                                </div>
                                <!--end::Label-->
                            </div>
                            <!--end::Labels-->
                        </div>
                        <!--end::Card body-->
                    </div>
                    <!--end::Card widget 4-->

                    <!--begin::Card widget 5-->
                    <div class="card card-flush h-md-50 mb-xl-10">
                        <!--begin::Header-->
                        <div class="card-header pt-5">
                            <!--begin::Title-->
                            <div class="card-title d-flex flex-column">
                                <!--begin::Info-->
                                <div class="d-flex align-items-center">
                                    <!--begin::Amount-->
                                    <span
                                        class="fs-2hx fw-bold text-dark me-2 lh-1 ls-n2">1,836</span>
                                    <!--end::Amount-->

                                    <!--begin::Badge-->
                                    <span class="badge badge-light-danger fs-base">
                                        <i
                                            class="ki-duotone ki-arrow-down fs-5 text-danger ms-n1"><span
                                                class="path1"></span><span
                                                class="path2"></span></i>
                                        2.2%
                                    </span>
                                    <!--end::Badge-->
                                </div>
                                <!--end::Info-->

                                <!--begin::Subtitle-->
                                <span class="text-gray-400 pt-1 fw-semibold fs-6">Orders This
                                    Month</span>
                                <!--end::Subtitle-->
                            </div>
                            <!--end::Title-->
                        </div>
                        <!--end::Header-->

                        <!--begin::Card body-->
                        <div class="card-body d-flex align-items-end pt-0">
                            <!--begin::Progress-->
                            <div class="d-flex align-items-center flex-column mt-3 w-100">
                                <div class="d-flex justify-content-between w-100 mt-auto mb-2">
                                    <span class="fw-bolder fs-6 text-dark">1,048 to Goal</span>
                                    <span class="fw-bold fs-6 text-gray-400">62%</span>
                                </div>

                                <div class="h-8px mx-3 w-100 bg-light-success rounded">
                                    <div class="bg-success rounded h-8px" role="progressbar"
                                        style="width: 62%;" aria-valuenow="50"
                                        aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                            </div>
                            <!--end::Progress-->
                        </div>
                        <!--end::Card body-->
                    </div>
                    <!--end::Card widget 5-->
                </div>
                <!--end::Col-->

                <!--begin::Col-->
                <div class="col-md-6 col-lg-6 col-xl-6 col-xxl-3 mb-md-5 mb-xl-10">
                    <!--begin::Card widget 6-->
                    <div class="card card-flush  h-md-50 mb-5 mb-xl-10">
                        <!--begin::Header-->
                        <div class="card-header pt-5">
                            <!--begin::Title-->
                            <div class="card-title d-flex flex-column">
                                <!--begin::Info-->
                                <div class="d-flex align-items-center">
                                    <!--begin::Currency-->
                                    <span
                                        class="fs-4 fw-semibold text-gray-400 me-1 align-self-start">$</span>
                                    <!--end::Currency-->

                                    <!--begin::Amount-->
                                    <span
                                        class="fs-2hx fw-bold text-dark me-2 lh-1 ls-n2">2,420</span>
                                    <!--end::Amount-->

                                    <!--begin::Badge-->
                                    <span class="badge badge-light-success fs-base">
                                        <i class="ki-duotone ki-arrow-up fs-5 text-success ms-n1"><span
                                                class="path1"></span><span
                                                class="path2"></span></i>
                                        2.6%
                                    </span>
                                    <!--end::Badge-->
                                </div>
                                <!--end::Info-->

                                <!--begin::Subtitle-->
                                <span class="text-gray-400 pt-1 fw-semibold fs-6">Average Daily
                                    Sales</span>
                                <!--end::Subtitle-->
                            </div>
                            <!--end::Title-->
                        </div>
                        <!--end::Header-->

                        <!--begin::Card body-->
                        <div class="card-body d-flex align-items-end px-0 pb-0">
                            <!--begin::Chart-->
                            <div id="kt_card_widget_6_chart" class="w-100"
                                style="height: 80px"></div>
                            <!--end::Chart-->
                        </div>
                        <!--end::Card body-->
                    </div>
                    <!--end::Card widget 6-->


                    <!--begin::Card widget 7-->
                    <div class="card card-flush h-md-50 mb-xl-10">
                        <!--begin::Header-->
                        <div class="card-header pt-5">
                            <!--begin::Title-->
                            <div class="card-title d-flex flex-column">
                                <!--begin::Amount-->
                                <span class="fs-2hx fw-bold text-dark me-2 lh-1 ls-n2">6.3k</span>
                                <!--end::Amount-->

                                <!--begin::Subtitle-->
                                <span class="text-gray-400 pt-1 fw-semibold fs-6">New Customers
                                    This Month</span>
                                <!--end::Subtitle-->
                            </div>
                            <!--end::Title-->
                        </div>
                        <!--end::Header-->

                        <!--begin::Card body-->
                        <div class="card-body d-flex flex-column justify-content-end pe-0">
                            <!--begin::Title-->
                            <span class="fs-6 fw-bolder text-gray-800 d-block mb-2">Today’s
                                Heroes</span>
                            <!--end::Title-->

                            <!--begin::Users group-->
                            <div class="symbol-group symbol-hover flex-nowrap">
                                <div class="symbol symbol-35px symbol-circle"
                                    data-bs-toggle="tooltip" title="Alan Warden">
                                    <span
                                        class="symbol-label bg-warning text-inverse-warning fw-bold">A</span>
                                </div>
                                <div class="symbol symbol-35px symbol-circle"
                                    data-bs-toggle="tooltip" title="Michael Eberon">
                                    <img alt="Pic"
                                        src="/metronic8/demo1/assets/media/avatars/300-11.jpg" />
                                </div>
                                <div class="symbol symbol-35px symbol-circle"
                                    data-bs-toggle="tooltip" title="Susan Redwood">
                                    <span
                                        class="symbol-label bg-primary text-inverse-primary fw-bold">S</span>
                                </div>
                                <div class="symbol symbol-35px symbol-circle"
                                    data-bs-toggle="tooltip" title="Melody Macy">
                                    <img alt="Pic"
                                        src="/metronic8/demo1/assets/media/avatars/300-2.jpg" />
                                </div>
                                <div class="symbol symbol-35px symbol-circle"
                                    data-bs-toggle="tooltip" title="Perry Matthew">
                                    <span
                                        class="symbol-label bg-danger text-inverse-danger fw-bold">P</span>
                                </div>
                                <div class="symbol symbol-35px symbol-circle"
                                    data-bs-toggle="tooltip" title="Barry Walter">
                                    <img alt="Pic"
                                        src="/metronic8/demo1/assets/media/avatars/300-12.jpg" />
                                </div>
                                <a href="#" class="symbol symbol-35px symbol-circle"
                                    data-bs-toggle="modal"
                                    data-bs-target="#kt_modal_view_users">
                                    <span
                                        class="symbol-label bg-light text-gray-400 fs-8 fw-bold">+42</span>
                                </a>
                            </div>
                            <!--end::Users group-->
                        </div>
                        <!--end::Card body-->
                    </div>
                    <!--end::Card widget 7-->
                </div>
                <!--end::Col-->

                <!--begin::Col-->
                <div class="col-lg-12 col-xl-12 col-xxl-6 mb-5 mb-xl-0">
                    <!--begin::Chart widget 3-->
                    <div class="card card-flush overflow-hidden h-md-100">
                        <!--begin::Header-->
                        <div class="card-header py-5">
                            <!--begin::Title-->
                            <h3 class="card-title align-items-start flex-column">
                                <span class="card-label fw-bold text-dark">Sales This
                                    Months</span>
                                <span class="text-gray-400 mt-1 fw-semibold fs-6">Users from all
                                    channels</span>
                            </h3>
                            <!--end::Title-->

                            <!--begin::Toolbar-->
                            <div class="card-toolbar">
                                <!--begin::Menu-->
                                <button
                                    class="btn btn-icon btn-color-gray-400 btn-active-color-primary justify-content-end"
                                    data-kt-menu-trigger="click"
                                    data-kt-menu-placement="bottom-end"
                                    data-kt-menu-overflow="true">

                                    <i class="ki-duotone ki-dots-square fs-1"><span
                                            class="path1"></span><span
                                            class="path2"></span><span
                                            class="path3"></span><span
                                            class="path4"></span></i>
                                </button>


                                <!--begin::Menu 2-->
                                <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-800 menu-state-bg-light-primary fw-semibold w-200px"
                                    data-kt-menu="true">
                                    <!--begin::Menu item-->
                                    <div class="menu-item px-3">
                                        <div
                                            class="menu-content fs-6 text-dark fw-bold px-3 py-4">
                                            Quick Actions</div>
                                    </div>
                                    <!--end::Menu item-->

                                    <!--begin::Menu separator-->
                                    <div class="separator mb-3 opacity-75"></div>
                                    <!--end::Menu separator-->

                                    <!--begin::Menu item-->
                                    <div class="menu-item px-3">
                                        <a href="#" class="menu-link px-3">
                                            New Ticket
                                        </a>
                                    </div>
                                    <!--end::Menu item-->

                                    <!--begin::Menu item-->
                                    <div class="menu-item px-3">
                                        <a href="#" class="menu-link px-3">
                                            New Customer
                                        </a>
                                    </div>
                                    <!--end::Menu item-->

                                    <!--begin::Menu item-->
                                    <div class="menu-item px-3" data-kt-menu-trigger="hover"
                                        data-kt-menu-placement="right-start">
                                        <!--begin::Menu item-->
                                        <a href="#" class="menu-link px-3">
                                            <span class="menu-title">New Group</span>
                                            <span class="menu-arrow"></span>
                                        </a>
                                        <!--end::Menu item-->

                                        <!--begin::Menu sub-->
                                        <div class="menu-sub menu-sub-dropdown w-175px py-4">
                                            <!--begin::Menu item-->
                                            <div class="menu-item px-3">
                                                <a href="#" class="menu-link px-3">
                                                    Admin Group
                                                </a>
                                            </div>
                                            <!--end::Menu item-->

                                            <!--begin::Menu item-->
                                            <div class="menu-item px-3">
                                                <a href="#" class="menu-link px-3">
                                                    Staff Group
                                                </a>
                                            </div>
                                            <!--end::Menu item-->

                                            <!--begin::Menu item-->
                                            <div class="menu-item px-3">
                                                <a href="#" class="menu-link px-3">
                                                    Member Group
                                                </a>
                                            </div>
                                            <!--end::Menu item-->
                                        </div>
                                        <!--end::Menu sub-->
                                    </div>
                                    <!--end::Menu item-->

                                    <!--begin::Menu item-->
                                    <div class="menu-item px-3">
                                        <a href="#" class="menu-link px-3">
                                            New Contact
                                        </a>
                                    </div>
                                    <!--end::Menu item-->

                                    <!--begin::Menu separator-->
                                    <div class="separator mt-3 opacity-75"></div>
                                    <!--end::Menu separator-->

                                    <!--begin::Menu item-->
                                    <div class="menu-item px-3">
                                        <div class="menu-content px-3 py-3">
                                            <a class="btn btn-primary  btn-sm px-4"
                                                href="#">
                                                Generate Reports
                                            </a>
                                        </div>
                                    </div>
                                    <!--end::Menu item-->
                                </div>
                                <!--end::Menu 2-->

                                <!--end::Menu-->
                            </div>
                            <!--end::Toolbar-->
                        </div>
                        <!--end::Header-->

                        <!--begin::Card body-->
                        <div
                            class="card-body d-flex justify-content-between flex-column pb-1 px-0">
                            <!--begin::Statistics-->
                            <div class="px-9 mb-5">
                                <!--begin::Statistics-->
                                <div class="d-flex mb-2">
                                    <span class="fs-4 fw-semibold text-gray-400 me-1">$</span>
                                    <span
                                        class="fs-2hx fw-bold text-gray-800 me-2 lh-1 ls-n2">14,094</span>
                                </div>
                                <!--end::Statistics-->

                                <!--begin::Description-->
                                <span class="fs-6 fw-semibold text-gray-400">Another $48,346 to
                                    Goal</span>
                                <!--end::Description-->
                            </div>
                            <!--end::Statistics-->

                            <!--begin::Chart-->
                            <div id="kt_charts_widget_3" class="min-h-auto ps-4 pe-6"
                                style="height: 300px"></div>
                            <!--end::Chart-->
                        </div>
                        <!--end::Card body-->
                    </div>
                    <!--end::Chart widget 3-->
                </div>
                <!--end::Col-->
            </div>
            <!--end::Row-->

            <!--begin::Row-->
            <div class="row gy-5 g-xl-10">
                <!--begin::Col-->
                <div class="col-xl-6 mb-xl-10">

                    <!--begin::Table widget 2-->
                    <div class="card h-md-100">
                        <!--begin::Header-->
                        <div class="card-header align-items-center border-0">
                            <!--begin::Title-->
                            <h3 class="fw-bold text-gray-900 m-0">Recent Orders</h3>
                            <!--end::Title-->

                            <!--begin::Menu-->
                            <button
                                class="btn btn-icon btn-color-gray-400 btn-active-color-primary justify-content-end"
                                data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end"
                                data-kt-menu-overflow="true">

                                <i class="ki-duotone ki-dots-square fs-1"><span
                                        class="path1"></span><span class="path2"></span><span
                                        class="path3"></span><span class="path4"></span></i>
                            </button>

                            <!--begin::Menu 2-->
                            <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-800 menu-state-bg-light-primary fw-semibold w-200px"
                                data-kt-menu="true">
                                <!--begin::Menu item-->
                                <div class="menu-item px-3">
                                    <div class="menu-content fs-6 text-dark fw-bold px-3 py-4">
                                        Quick Actions</div>
                                </div>
                                <!--end::Menu item-->

                                <!--begin::Menu separator-->
                                <div class="separator mb-3 opacity-75"></div>
                                <!--end::Menu separator-->

                                <!--begin::Menu item-->
                                <div class="menu-item px-3">
                                    <a href="#" class="menu-link px-3">
                                        New Ticket
                                    </a>
                                </div>
                                <!--end::Menu item-->

                                <!--begin::Menu item-->
                                <div class="menu-item px-3">
                                    <a href="#" class="menu-link px-3">
                                        New Customer
                                    </a>
                                </div>
                                <!--end::Menu item-->

                                <!--begin::Menu item-->
                                <div class="menu-item px-3" data-kt-menu-trigger="hover"
                                    data-kt-menu-placement="right-start">
                                    <!--begin::Menu item-->
                                    <a href="#" class="menu-link px-3">
                                        <span class="menu-title">New Group</span>
                                        <span class="menu-arrow"></span>
                                    </a>
                                    <!--end::Menu item-->

                                    <!--begin::Menu sub-->
                                    <div class="menu-sub menu-sub-dropdown w-175px py-4">
                                        <!--begin::Menu item-->
                                        <div class="menu-item px-3">
                                            <a href="#" class="menu-link px-3">
                                                Admin Group
                                            </a>
                                        </div>
                                        <!--end::Menu item-->

                                        <!--begin::Menu item-->
                                        <div class="menu-item px-3">
                                            <a href="#" class="menu-link px-3">
                                                Staff Group
                                            </a>
                                        </div>
                                        <!--end::Menu item-->

                                        <!--begin::Menu item-->
                                        <div class="menu-item px-3">
                                            <a href="#" class="menu-link px-3">
                                                Member Group
                                            </a>
                                        </div>
                                        <!--end::Menu item-->
                                    </div>
                                    <!--end::Menu sub-->
                                </div>
                                <!--end::Menu item-->

                                <!--begin::Menu item-->
                                <div class="menu-item px-3">
                                    <a href="#" class="menu-link px-3">
                                        New Contact
                                    </a>
                                </div>
                                <!--end::Menu item-->

                                <!--begin::Menu separator-->
                                <div class="separator mt-3 opacity-75"></div>
                                <!--end::Menu separator-->

                                <!--begin::Menu item-->
                                <div class="menu-item px-3">
                                    <div class="menu-content px-3 py-3">
                                        <a class="btn btn-primary  btn-sm px-4" href="#">
                                            Generate Reports
                                        </a>
                                    </div>
                                </div>
                                <!--end::Menu item-->
                            </div>
                            <!--end::Menu 2-->

                            <!--end::Menu-->
                        </div>
                        <!--end::Header-->

                        <!--begin::Body-->
                        <div class="card-body pt-2">
                            <!--begin::Nav-->
                            <ul class="nav nav-pills nav-pills-custom mb-3">
                                <!--begin::Item-->
                                <li class="nav-item mb-3 me-3 me-lg-6">
                                    <!--begin::Link-->
                                    <a class="nav-link d-flex justify-content-between flex-column flex-center overflow-hidden active w-80px h-85px py-4"
                                        data-bs-toggle="pill" href="#kt_stats_widget_2_tab_1">
                                        <!--begin::Icon-->
                                        <div class="nav-icon">
                                            <img alt=""
                                                src="/metronic8/demo1/assets/media/svg/products-categories/t-shirt.svg"
                                                class="" />
                                        </div>
                                        <!--end::Icon-->

                                        <!--begin::Subtitle-->
                                        <span class="nav-text text-gray-700 fw-bold fs-6 lh-1">
                                            T-shirt
                                        </span>
                                        <!--end::Subtitle-->

                                        <!--begin::Bullet-->
                                        <span
                                            class="bullet-custom position-absolute bottom-0 w-100 h-4px bg-primary"></span>
                                        <!--end::Bullet-->
                                    </a>
                                    <!--end::Link-->
                                </li>
                                <!--end::Item-->

                                <!--begin::Item-->
                                <li class="nav-item mb-3 me-3 me-lg-6">
                                    <!--begin::Link-->
                                    <a class="nav-link d-flex justify-content-between flex-column flex-center overflow-hidden w-80px h-85px py-4"
                                        data-bs-toggle="pill" href="#kt_stats_widget_2_tab_2">
                                        <!--begin::Icon-->
                                        <div class="nav-icon">
                                            <img alt=""
                                                src="/metronic8/demo1/assets/media/svg/products-categories/gaming.svg"
                                                class="" />
                                        </div>
                                        <!--end::Icon-->

                                        <!--begin::Subtitle-->
                                        <span class="nav-text text-gray-700 fw-bold fs-6 lh-1">
                                            Gaming
                                        </span>
                                        <!--end::Subtitle-->

                                        <!--begin::Bullet-->
                                        <span
                                            class="bullet-custom position-absolute bottom-0 w-100 h-4px bg-primary"></span>
                                        <!--end::Bullet-->
                                    </a>
                                    <!--end::Link-->
                                </li>
                                <!--end::Item-->

                                <!--begin::Item-->
                                <li class="nav-item mb-3 me-3 me-lg-6">
                                    <!--begin::Link-->
                                    <a class="nav-link d-flex justify-content-between flex-column flex-center overflow-hidden w-80px h-85px py-4"
                                        data-bs-toggle="pill" href="#kt_stats_widget_2_tab_3">
                                        <!--begin::Icon-->
                                        <div class="nav-icon">
                                            <img alt=""
                                                src="/metronic8/demo1/assets/media/svg/products-categories/watch.svg"
                                                class="" />
                                        </div>
                                        <!--end::Icon-->

                                        <!--begin::Subtitle-->
                                        <span class="nav-text text-gray-600 fw-bold fs-6 lh-1">
                                            Watch
                                        </span>
                                        <!--end::Subtitle-->

                                        <!--begin::Bullet-->
                                        <span
                                            class="bullet-custom position-absolute bottom-0 w-100 h-4px bg-primary"></span>
                                        <!--end::Bullet-->
                                    </a>
                                    <!--end::Link-->
                                </li>
                                <!--end::Item-->

                                <!--begin::Item-->
                                <li class="nav-item mb-3 me-3 me-lg-6">
                                    <!--begin::Link-->
                                    <a class="nav-link d-flex justify-content-between flex-column flex-center overflow-hidden w-80px h-85px py-4"
                                        data-bs-toggle="pill" href="#kt_stats_widget_2_tab_4">
                                        <!--begin::Icon-->
                                        <div class="nav-icon">
                                            <img alt=""
                                                src="/metronic8/demo1/assets/media/svg/products-categories/gloves.svg"
                                                class="nav-icon" />
                                        </div>
                                        <!--end::Icon-->

                                        <!--begin::Subtitle-->
                                        <span class="nav-text text-gray-600 fw-bold fs-6 lh-1">
                                            Gloves
                                        </span>
                                        <!--end::Subtitle-->

                                        <!--begin::Bullet-->
                                        <span
                                            class="bullet-custom position-absolute bottom-0 w-100 h-4px bg-primary"></span>
                                        <!--end::Bullet-->
                                    </a>
                                    <!--end::Link-->
                                </li>
                                <!--end::Item-->

                                <!--begin::Item-->
                                <li class="nav-item mb-3">
                                    <!--begin::Link-->
                                    <a class="nav-link d-flex justify-content-between flex-column flex-center overflow-hidden w-80px h-85px py-4"
                                        data-bs-toggle="pill" href="#kt_stats_widget_2_tab_5">
                                        <!--begin::Icon-->
                                        <div class="nav-icon">
                                            <img alt=""
                                                src="/metronic8/demo1/assets/media/svg/products-categories/shoes.svg"
                                                class="nav-icon" />
                                        </div>
                                        <!--end::Icon-->

                                        <!--begin::Subtitle-->
                                        <span class="nav-text text-gray-600 fw-bold fs-6 lh-1">
                                            Shoes
                                        </span>
                                        <!--end::Subtitle-->

                                        <!--begin::Bullet-->
                                        <span
                                            class="bullet-custom position-absolute bottom-0 w-100 h-4px bg-primary"></span>
                                        <!--end::Bullet-->
                                    </a>
                                    <!--end::Link-->
                                </li>
                                <!--end::Item-->
                            </ul>
                            <!--end::Nav-->

                            <!--begin::Tab Content-->
                            <div class="tab-content">

                                <!--begin::Tap pane-->
                                <div class="tab-pane fade show active"
                                    id="kt_stats_widget_2_tab_1">
                                    <!--begin::Table container-->
                                    <div class="table-responsive">
                                        <!--begin::Table-->
                                        <table
                                            class="table table-row-dashed align-middle gs-0 gy-4 my-0">
                                            <!--begin::Table head-->
                                            <thead>
                                                <tr
                                                    class="fs-7 fw-bold text-gray-500 border-bottom-0">
                                                    <th class="ps-0 w-50px">ITEM</th>
                                                    <th class="min-w-125px"></th>
                                                    <th class="text-end min-w-100px">QTY</th>
                                                    <th class="pe-0 text-end min-w-100px">PRICE
                                                    </th>
                                                    <th class="pe-0 text-end min-w-100px">TOTAL
                                                        PRICE</th>
                                                </tr>
                                            </thead>
                                            <!--end::Table head-->

                                            <!--begin::Table body-->
                                            <tbody>
                                                <tr>
                                                    <td>
                                                        <img src="/metronic8/demo1/assets/media/stock/ecommerce/210.gif"
                                                            class="w-50px ms-n1"
                                                            alt="" />
                                                    </td>
                                                    <td class="ps-0">
                                                        <a href="/metronic8/demo1/../demo1/apps/ecommerce/catalog/edit-product.html"
                                                            class="text-gray-800 fw-bold text-hover-primary mb-1 fs-6 text-start pe-0">Elephant
                                                            1802</a>
                                                        <span
                                                            class="text-gray-400 fw-semibold fs-7 d-block text-start ps-0">Item:
                                                            #XDG-2347</span>
                                                    </td>
                                                    <td>
                                                        <span
                                                            class="text-gray-800 fw-bold d-block fs-6 ps-0 text-end">x1</span>
                                                    </td>
                                                    <td class="text-end pe-0">
                                                        <span
                                                            class="text-gray-800 fw-bold d-block fs-6">$72.00</span>
                                                    </td>
                                                    <td class="text-end pe-0">
                                                        <span
                                                            class="text-gray-800 fw-bold d-block fs-6">$126.00</span>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <img src="/metronic8/demo1/assets/media/stock/ecommerce/215.gif"
                                                            class="w-50px ms-n1"
                                                            alt="" />
                                                    </td>
                                                    <td class="ps-0">
                                                        <a href="/metronic8/demo1/../demo1/apps/ecommerce/catalog/edit-product.html"
                                                            class="text-gray-800 fw-bold text-hover-primary mb-1 fs-6 text-start pe-0">Red
                                                            Laga</a>
                                                        <span
                                                            class="text-gray-400 fw-semibold fs-7 d-block text-start ps-0">Item:
                                                            #XDG-1321</span>
                                                    </td>
                                                    <td>
                                                        <span
                                                            class="text-gray-800 fw-bold d-block fs-6 ps-0 text-end">x2</span>
                                                    </td>
                                                    <td class="text-end pe-0">
                                                        <span
                                                            class="text-gray-800 fw-bold d-block fs-6">$45.00</span>
                                                    </td>
                                                    <td class="text-end pe-0">
                                                        <span
                                                            class="text-gray-800 fw-bold d-block fs-6">$76.00</span>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <img src="/metronic8/demo1/assets/media/stock/ecommerce/209.gif"
                                                            class="w-50px ms-n1"
                                                            alt="" />
                                                    </td>
                                                    <td class="ps-0">
                                                        <a href="/metronic8/demo1/../demo1/apps/ecommerce/catalog/edit-product.html"
                                                            class="text-gray-800 fw-bold text-hover-primary mb-1 fs-6 text-start pe-0">RiseUP</a>
                                                        <span
                                                            class="text-gray-400 fw-semibold fs-7 d-block text-start ps-0">Item:
                                                            #XDG-4312</span>
                                                    </td>
                                                    <td>
                                                        <span
                                                            class="text-gray-800 fw-bold d-block fs-6 ps-0 text-end">x3</span>
                                                    </td>
                                                    <td class="text-end pe-0">
                                                        <span
                                                            class="text-gray-800 fw-bold d-block fs-6">$84.00</span>
                                                    </td>
                                                    <td class="text-end pe-0">
                                                        <span
                                                            class="text-gray-800 fw-bold d-block fs-6">$168.00</span>
                                                    </td>
                                                </tr>
                                            </tbody>
                                            <!--end::Table body-->
                                        </table>
                                        <!--end::Table-->
                                    </div>
                                    <!--end::Table container-->
                                </div>
                                <!--end::Tap pane-->

                                <!--begin::Tap pane-->
                                <div class="tab-pane fade " id="kt_stats_widget_2_tab_2">
                                    <!--begin::Table container-->
                                    <div class="table-responsive">
                                        <!--begin::Table-->
                                        <table
                                            class="table table-row-dashed align-middle gs-0 gy-4 my-0">
                                            <!--begin::Table head-->
                                            <thead>
                                                <tr
                                                    class="fs-7 fw-bold text-gray-500 border-bottom-0">
                                                    <th class="ps-0 w-50px">ITEM</th>
                                                    <th class="min-w-125px"></th>
                                                    <th class="text-end min-w-100px">QTY</th>
                                                    <th class="pe-0 text-end min-w-100px">PRICE
                                                    </th>
                                                    <th class="pe-0 text-end min-w-100px">TOTAL
                                                        PRICE</th>
                                                </tr>
                                            </thead>
                                            <!--end::Table head-->

                                            <!--begin::Table body-->
                                            <tbody>
                                                <tr>
                                                    <td>
                                                        <img src="/metronic8/demo1/assets/media/stock/ecommerce/197.gif"
                                                            class="w-50px ms-n1"
                                                            alt="" />
                                                    </td>
                                                    <td class="ps-0">
                                                        <a href="/metronic8/demo1/../demo1/apps/ecommerce/catalog/edit-product.html"
                                                            class="text-gray-800 fw-bold text-hover-primary mb-1 fs-6 text-start pe-0">Elephant
                                                            1802</a>
                                                        <span
                                                            class="text-gray-400 fw-semibold fs-7 d-block text-start ps-0">Item:
                                                            #XDG-4312</span>
                                                    </td>
                                                    <td>
                                                        <span
                                                            class="text-gray-800 fw-bold d-block fs-6 ps-0 text-end">x1</span>
                                                    </td>
                                                    <td class="text-end pe-0">
                                                        <span
                                                            class="text-gray-800 fw-bold d-block fs-6">$32.00</span>
                                                    </td>
                                                    <td class="text-end pe-0">
                                                        <span
                                                            class="text-gray-800 fw-bold d-block fs-6">$312.00</span>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <img src="/metronic8/demo1/assets/media/stock/ecommerce/178.gif"
                                                            class="w-50px ms-n1"
                                                            alt="" />
                                                    </td>
                                                    <td class="ps-0">
                                                        <a href="/metronic8/demo1/../demo1/apps/ecommerce/catalog/edit-product.html"
                                                            class="text-gray-800 fw-bold text-hover-primary mb-1 fs-6 text-start pe-0">Red
                                                            Laga</a>
                                                        <span
                                                            class="text-gray-400 fw-semibold fs-7 d-block text-start ps-0">Item:
                                                            #XDG-3122</span>
                                                    </td>
                                                    <td>
                                                        <span
                                                            class="text-gray-800 fw-bold d-block fs-6 ps-0 text-end">x2</span>
                                                    </td>
                                                    <td class="text-end pe-0">
                                                        <span
                                                            class="text-gray-800 fw-bold d-block fs-6">$53.00</span>
                                                    </td>
                                                    <td class="text-end pe-0">
                                                        <span
                                                            class="text-gray-800 fw-bold d-block fs-6">$62.00</span>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <img src="/metronic8/demo1/assets/media/stock/ecommerce/22.gif"
                                                            class="w-50px ms-n1"
                                                            alt="" />
                                                    </td>
                                                    <td class="ps-0">
                                                        <a href="/metronic8/demo1/../demo1/apps/ecommerce/catalog/edit-product.html"
                                                            class="text-gray-800 fw-bold text-hover-primary mb-1 fs-6 text-start pe-0">RiseUP</a>
                                                        <span
                                                            class="text-gray-400 fw-semibold fs-7 d-block text-start ps-0">Item:
                                                            #XDG-1142</span>
                                                    </td>
                                                    <td>
                                                        <span class="text-gray-800 fw-bold d-block fs-6 ps-0 text-end">x3</span>
                                                    </td>
                                                    <td class="text-end pe-0">
                                                        <span
                                                            class="text-gray-800 fw-bold d-block fs-6">$74.00</span>
                                                    </td>
                                                    <td class="text-end pe-0">
                                                        <span
                                                            class="text-gray-800 fw-bold d-block fs-6">$139.00</span>
                                                    </td>
                                                </tr>
                                            </tbody>
                                            <!--end::Table body-->
                                        </table>
                                        <!--end::Table-->
                                    </div>
                                    <!--end::Table container-->
                                </div>
                                <!--end::Tap pane-->

                                <!--begin::Tap pane-->
                                <div class="tab-pane fade " id="kt_stats_widget_2_tab_3">
                                    <!--begin::Table container-->
                                    <div class="table-responsive">
                                        <!--begin::Table-->
                                        <table
                                            class="table table-row-dashed align-middle gs-0 gy-4 my-0">
                                            <!--begin::Table head-->
                                            <thead>
                                                <tr
                                                    class="fs-7 fw-bold text-gray-500 border-bottom-0">
                                                    <th class="ps-0 w-50px">ITEM</th>
                                                    <th class="min-w-125px"></th>
                                                    <th class="text-end min-w-100px">QTY</th>
                                                    <th class="pe-0 text-end min-w-100px">PRICE
                                                    </th>
                                                    <th class="pe-0 text-end min-w-100px">TOTAL
                                                        PRICE</th>
                                                </tr>
                                            </thead>
                                            <!--end::Table head-->

                                            <!--begin::Table body-->
                                            <tbody>
                                                <tr>
                                                    <td>
                                                        <img src="/metronic8/demo1/assets/media/stock/ecommerce/1.gif"
                                                            class="w-50px ms-n1"
                                                            alt="" />
                                                    </td>
                                                    <td class="ps-0">
                                                        <a href="/metronic8/demo1/../demo1/apps/ecommerce/catalog/edit-product.html"
                                                            class="text-gray-800 fw-bold text-hover-primary mb-1 fs-6 text-start pe-0">Elephant
                                                            1324</a>
                                                        <span
                                                            class="text-gray-400 fw-semibold fs-7 d-block text-start ps-0">Item:
                                                            #XDG-1523</span>
                                                    </td>
                                                    <td>
                                                        <span
                                                            class="text-gray-800 fw-bold d-block fs-6 ps-0 text-end">x1</span>
                                                    </td>
                                                    <td class="text-end pe-0">
                                                        <span
                                                            class="text-gray-800 fw-bold d-block fs-6">$43.00</span>
                                                    </td>
                                                    <td class="text-end pe-0">
                                                        <span
                                                            class="text-gray-800 fw-bold d-block fs-6">$231.00</span>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <img src="/metronic8/demo1/assets/media/stock/ecommerce/24.gif"
                                                            class="w-50px ms-n1"
                                                            alt="" />
                                                    </td>
                                                    <td class="ps-0">
                                                        <a href="/metronic8/demo1/../demo1/apps/ecommerce/catalog/edit-product.html"
                                                            class="text-gray-800 fw-bold text-hover-primary mb-1 fs-6 text-start pe-0">Red
                                                            Laga</a>
                                                        <span
                                                            class="text-gray-400 fw-semibold fs-7 d-block text-start ps-0">Item:
                                                            #XDG-5314</span>
                                                    </td>
                                                    <td>
                                                        <span
                                                            class="text-gray-800 fw-bold d-block fs-6 ps-0 text-end">x2</span>
                                                    </td>
                                                    <td class="text-end pe-0">
                                                        <span
                                                            class="text-gray-800 fw-bold d-block fs-6">$71.00</span>
                                                    </td>
                                                    <td class="text-end pe-0">
                                                        <span
                                                            class="text-gray-800 fw-bold d-block fs-6">$53.00</span>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <img src="/metronic8/demo1/assets/media/stock/ecommerce/71.gif"
                                                            class="w-50px ms-n1"
                                                            alt="" />
                                                    </td>
                                                    <td class="ps-0">
                                                        <a href="/metronic8/demo1/../demo1/apps/ecommerce/catalog/edit-product.html"
                                                            class="text-gray-800 fw-bold text-hover-primary mb-1 fs-6 text-start pe-0">RiseUP</a>
                                                        <span
                                                            class="text-gray-400 fw-semibold fs-7 d-block text-start ps-0">Item:
                                                            #XDG-4222</span>
                                                    </td>
                                                    <td>
                                                        <span
                                                            class="text-gray-800 fw-bold d-block fs-6 ps-0 text-end">x3</span>
                                                    </td>
                                                    <td class="text-end pe-0">
                                                        <span
                                                            class="text-gray-800 fw-bold d-block fs-6">$23.00</span>
                                                    </td>
                                                    <td class="text-end pe-0">
                                                        <span
                                                            class="text-gray-800 fw-bold d-block fs-6">$213.00</span>
                                                    </td>
                                                </tr>
                                            </tbody>
                                            <!--end::Table body-->
                                        </table>
                                        <!--end::Table-->
                                    </div>
                                    <!--end::Table container-->
                                </div>
                                <!--end::Tap pane-->

                                <!--begin::Tap pane-->
                                <div class="tab-pane fade " id="kt_stats_widget_2_tab_4">
                                    <!--begin::Table container-->
                                    <div class="table-responsive">
                                        <!--begin::Table-->
                                        <table
                                            class="table table-row-dashed align-middle gs-0 gy-4 my-0">
                                            <!--begin::Table head-->
                                            <thead>
                                                <tr
                                                    class="fs-7 fw-bold text-gray-500 border-bottom-0">
                                                    <th class="ps-0 w-50px">ITEM</th>
                                                    <th class="min-w-125px"></th>
                                                    <th class="text-end min-w-100px">QTY</th>
                                                    <th class="pe-0 text-end min-w-100px">PRICE
                                                    </th>
                                                    <th class="pe-0 text-end min-w-100px">TOTAL
                                                        PRICE</th>
                                                </tr>
                                            </thead>
                                            <!--end::Table head-->

                                            <!--begin::Table body-->
                                            <tbody>
                                                <tr>
                                                    <td>
                                                        <img src="/metronic8/demo1/assets/media/stock/ecommerce/41.gif"
                                                            class="w-50px ms-n1"
                                                            alt="" />
                                                    </td>
                                                    <td class="ps-0">
                                                        <a href="/metronic8/demo1/../demo1/apps/ecommerce/catalog/edit-product.html"
                                                            class="text-gray-800 fw-bold text-hover-primary mb-1 fs-6 text-start pe-0">Elephant
                                                            2635</a>
                                                        <span
                                                            class="text-gray-400 fw-semibold fs-7 d-block text-start ps-0">Item:
                                                            #XDG-1523</span>
                                                    </td>
                                                    <td>
                                                        <span
                                                            class="text-gray-800 fw-bold d-block fs-6 ps-0 text-end">x1</span>
                                                    </td>
                                                    <td class="text-end pe-0">
                                                        <span
                                                            class="text-gray-800 fw-bold d-block fs-6">$65.00</span>
                                                    </td>
                                                    <td class="text-end pe-0">
                                                        <span
                                                            class="text-gray-800 fw-bold d-block fs-6">$163.00</span>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <img src="/metronic8/demo1/assets/media/stock/ecommerce/63.gif"
                                                            class="w-50px ms-n1"
                                                            alt="" />
                                                    </td>
                                                    <td class="ps-0">
                                                        <a href="/metronic8/demo1/../demo1/apps/ecommerce/catalog/edit-product.html"
                                                            class="text-gray-800 fw-bold text-hover-primary mb-1 fs-6 text-start pe-0">Red
                                                            Laga</a>
                                                        <span
                                                            class="text-gray-400 fw-semibold fs-7 d-block text-start ps-0">Item:
                                                            #XDG-2745</span>
                                                    </td>
                                                    <td>
                                                        <span
                                                            class="text-gray-800 fw-bold d-block fs-6 ps-0 text-end">x2</span>
                                                    </td>
                                                    <td class="text-end pe-0">
                                                        <span
                                                            class="text-gray-800 fw-bold d-block fs-6">$64.00</span>
                                                    </td>
                                                    <td class="text-end pe-0">
                                                        <span
                                                            class="text-gray-800 fw-bold d-block fs-6">$73.00</span>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <img src="/metronic8/demo1/assets/media/stock/ecommerce/59.gif"
                                                            class="w-50px ms-n1"
                                                            alt="" />
                                                    </td>
                                                    <td class="ps-0">
                                                        <a href="/metronic8/demo1/../demo1/apps/ecommerce/catalog/edit-product.html"
                                                            class="text-gray-800 fw-bold text-hover-primary mb-1 fs-6 text-start pe-0">RiseUP</a>
                                                        <span
                                                            class="text-gray-400 fw-semibold fs-7 d-block text-start ps-0">Item:
                                                            #XDG-5173</span>
                                                    </td>
                                                    <td>
                                                        <span
                                                            class="text-gray-800 fw-bold d-block fs-6 ps-0 text-end">x3</span>
                                                    </td>
                                                    <td class="text-end pe-0">
                                                        <span
                                                            class="text-gray-800 fw-bold d-block fs-6">$54.00</span>
                                                    </td>
                                                    <td class="text-end pe-0">
                                                        <span
                                                            class="text-gray-800 fw-bold d-block fs-6">$173.00</span>
                                                    </td>
                                                </tr>
                                            </tbody>
                                            <!--end::Table body-->
                                        </table>
                                        <!--end::Table-->
                                    </div>
                                    <!--end::Table container-->
                                </div>
                                <!--end::Tap pane-->

                                <!--begin::Tap pane-->
                                <div class="tab-pane fade " id="kt_stats_widget_2_tab_5">
                                    <!--begin::Table container-->
                                    <div class="table-responsive">
                                        <!--begin::Table-->
                                        <table
                                            class="table table-row-dashed align-middle gs-0 gy-4 my-0">
                                            <!--begin::Table head-->
                                            <thead>
                                                <tr
                                                    class="fs-7 fw-bold text-gray-500 border-bottom-0">
                                                    <th class="ps-0 w-50px">ITEM</th>
                                                    <th class="min-w-125px"></th>
                                                    <th class="text-end min-w-100px">QTY</th>
                                                    <th class="pe-0 text-end min-w-100px">PRICE
                                                    </th>
                                                    <th class="pe-0 text-end min-w-100px">TOTAL
                                                        PRICE</th>
                                                </tr>
                                            </thead>
                                            <!--end::Table head-->

                                            <!--begin::Table body-->
                                            <tbody>
                                                <tr>
                                                    <td>
                                                        <img src="/metronic8/demo1/assets/media/stock/ecommerce/10.gif"
                                                            class="w-50px ms-n1"
                                                            alt="" />
                                                    </td>
                                                    <td class="ps-0">
                                                        <a href="/metronic8/demo1/../demo1/apps/ecommerce/catalog/edit-product.html"
                                                            class="text-gray-800 fw-bold text-hover-primary mb-1 fs-6 text-start pe-0">Nike</a>
                                                        <span
                                                            class="text-gray-400 fw-semibold fs-7 d-block text-start ps-0">Item:
                                                            #XDG-2163</span>
                                                    </td>
                                                    <td>
                                                        <span
                                                            class="text-gray-800 fw-bold d-block fs-6 ps-0 text-end">x1</span>
                                                    </td>
                                                    <td class="text-end pe-0">
                                                        <span
                                                            class="text-gray-800 fw-bold d-block fs-6">$64.00</span>
                                                    </td>
                                                    <td class="text-end pe-0">
                                                        <span
                                                            class="text-gray-800 fw-bold d-block fs-6">$287.00</span>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <img src="/metronic8/demo1/assets/media/stock/ecommerce/96.gif"
                                                            class="w-50px ms-n1"
                                                            alt="" />
                                                    </td>
                                                    <td class="ps-0">
                                                        <a href="/metronic8/demo1/../demo1/apps/ecommerce/catalog/edit-product.html"
                                                            class="text-gray-800 fw-bold text-hover-primary mb-1 fs-6 text-start pe-0">Adidas</a>
                                                        <span
                                                            class="text-gray-400 fw-semibold fs-7 d-block text-start ps-0">Item:
                                                            #XDG-2162</span>
                                                    </td>
                                                    <td>
                                                        <span
                                                            class="text-gray-800 fw-bold d-block fs-6 ps-0 text-end">x2</span>
                                                    </td>
                                                    <td class="text-end pe-0">
                                                        <span
                                                            class="text-gray-800 fw-bold d-block fs-6">$76.00</span>
                                                    </td>
                                                    <td class="text-end pe-0">
                                                        <span
                                                            class="text-gray-800 fw-bold d-block fs-6">$51.00</span>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <img src="/metronic8/demo1/assets/media/stock/ecommerce/13.gif"
                                                            class="w-50px ms-n1"
                                                            alt="" />
                                                    </td>
                                                    <td class="ps-0">
                                                        <a href="/metronic8/demo1/../demo1/apps/ecommerce/catalog/edit-product.html"
                                                            class="text-gray-800 fw-bold text-hover-primary mb-1 fs-6 text-start pe-0">Puma</a>
                                                        <span
                                                            class="text-gray-400 fw-semibold fs-7 d-block text-start ps-0">Item:
                                                            #XDG-1537</span>
                                                    </td>
                                                    <td>
                                                        <span
                                                            class="text-gray-800 fw-bold d-block fs-6 ps-0 text-end">x3</span>
                                                    </td>
                                                    <td class="text-end pe-0">
                                                        <span
                                                            class="text-gray-800 fw-bold d-block fs-6">$27.00</span>
                                                    </td>
                                                    <td class="text-end pe-0">
                                                        <span
                                                            class="text-gray-800 fw-bold d-block fs-6">$167.00</span>
                                                    </td>
                                                </tr>
                                            </tbody>
                                            <!--end::Table body-->
                                        </table>
                                        <!--end::Table-->
                                    </div>
                                    <!--end::Table container-->
                                </div>
                                <!--end::Tap pane-->
                            </div>
                            <!--end::Tab Content-->
                        </div>
                        <!--end: Card Body-->
                    </div>
                    <!--end::Table widget 2-->
                </div>
                <!--end::Col-->

                <!--begin::Col-->
                <div class="col-xl-6 mb-5 mb-xl-10">
                    <!--begin::Chart widget 4-->
                    <div class="card card-flush overflow-hidden h-md-100">
                        <!--begin::Header-->
                        <div class="card-header py-5">
                            <!--begin::Title-->
                            <h3 class="card-title align-items-start flex-column">
                                <span class="card-label fw-bold text-dark">Discounted Product
                                    Sales</span>
                                <span class="text-gray-400 mt-1 fw-semibold fs-6">Users from all
                                    channels</span>
                            </h3>
                            <!--end::Title-->

                            <!--begin::Toolbar-->
                            <div class="card-toolbar">
                                <!--begin::Menu-->
                                <button
                                    class="btn btn-icon btn-color-gray-400 btn-active-color-primary justify-content-end"
                                    data-kt-menu-trigger="click"
                                    data-kt-menu-placement="bottom-end"
                                    data-kt-menu-overflow="true">

                                    <i class="ki-duotone ki-dots-square fs-1"><span
                                            class="path1"></span><span
                                            class="path2"></span><span
                                            class="path3"></span><span
                                            class="path4"></span></i>
                                </button>


                                <!--begin::Menu 2-->
                                <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-800 menu-state-bg-light-primary fw-semibold w-200px"
                                    data-kt-menu="true">
                                    <!--begin::Menu item-->
                                    <div class="menu-item px-3">
                                        <div
                                            class="menu-content fs-6 text-dark fw-bold px-3 py-4">
                                            Quick Actions</div>
                                    </div>
                                    <!--end::Menu item-->

                                    <!--begin::Menu separator-->
                                    <div class="separator mb-3 opacity-75"></div>
                                    <!--end::Menu separator-->

                                    <!--begin::Menu item-->
                                    <div class="menu-item px-3">
                                        <a href="#" class="menu-link px-3">
                                            New Ticket
                                        </a>
                                    </div>
                                    <!--end::Menu item-->

                                    <!--begin::Menu item-->
                                    <div class="menu-item px-3">
                                        <a href="#" class="menu-link px-3">
                                            New Customer
                                        </a>
                                    </div>
                                    <!--end::Menu item-->

                                    <!--begin::Menu item-->
                                    <div class="menu-item px-3" data-kt-menu-trigger="hover"
                                        data-kt-menu-placement="right-start">
                                        <!--begin::Menu item-->
                                        <a href="#" class="menu-link px-3">
                                            <span class="menu-title">New Group</span>
                                            <span class="menu-arrow"></span>
                                        </a>
                                        <!--end::Menu item-->

                                        <!--begin::Menu sub-->
                                        <div class="menu-sub menu-sub-dropdown w-175px py-4">
                                            <!--begin::Menu item-->
                                            <div class="menu-item px-3">
                                                <a href="#" class="menu-link px-3">
                                                    Admin Group
                                                </a>
                                            </div>
                                            <!--end::Menu item-->

                                            <!--begin::Menu item-->
                                            <div class="menu-item px-3">
                                                <a href="#" class="menu-link px-3">
                                                    Staff Group
                                                </a>
                                            </div>
                                            <!--end::Menu item-->

                                            <!--begin::Menu item-->
                                            <div class="menu-item px-3">
                                                <a href="#" class="menu-link px-3">
                                                    Member Group
                                                </a>
                                            </div>
                                            <!--end::Menu item-->
                                        </div>
                                        <!--end::Menu sub-->
                                    </div>
                                    <!--end::Menu item-->

                                    <!--begin::Menu item-->
                                    <div class="menu-item px-3">
                                        <a href="#" class="menu-link px-3">
                                            New Contact
                                        </a>
                                    </div>
                                    <!--end::Menu item-->

                                    <!--begin::Menu separator-->
                                    <div class="separator mt-3 opacity-75"></div>
                                    <!--end::Menu separator-->

                                    <!--begin::Menu item-->
                                    <div class="menu-item px-3">
                                        <div class="menu-content px-3 py-3">
                                            <a class="btn btn-primary  btn-sm px-4"
                                                href="#">
                                                Generate Reports
                                            </a>
                                        </div>
                                    </div>
                                    <!--end::Menu item-->
                                </div>
                                <!--end::Menu 2-->

                                <!--end::Menu-->
                            </div>
                            <!--end::Toolbar-->
                        </div>
                        <!--end::Header-->

                        <!--begin::Card body-->
                        <div
                            class="card-body d-flex justify-content-between flex-column pb-1 px-0">
                            <!--begin::Info-->
                            <div class="px-9 mb-5">
                                <!--begin::Statistics-->
                                <div class="d-flex align-items-center mb-2">
                                    <!--begin::Currency-->
                                    <span
                                        class="fs-4 fw-semibold text-gray-400 align-self-start me-1">$</span>
                                    <!--end::Currency-->

                                    <!--begin::Value-->
                                    <span
                                        class="fs-2hx fw-bold text-gray-800 me-2 lh-1 ls-n2">3,706</span>
                                    <!--end::Value-->

                                    <!--begin::Label-->
                                    <span class="badge badge-light-success fs-base">
                                        <i
                                            class="ki-duotone ki-arrow-down fs-5 text-success ms-n1"><span
                                                class="path1"></span><span
                                                class="path2"></span></i> 4.5%
                                    </span>
                                    <!--end::Label-->
                                </div>
                                <!--end::Statistics-->

                                <!--begin::Description-->
                                <span class="fs-6 fw-semibold text-gray-400">Total Discounted
                                    Sales This Month</span>
                                <!--end::Description-->
                            </div>
                            <!--end::Info-->

                            <!--begin::Chart-->
                            <div id="kt_charts_widget_4" class="min-h-auto ps-4 pe-6"
                                style="height: 300px"></div>
                            <!--end::Chart-->
                        </div>
                        <!--end::Card body-->
                    </div>
                    <!--end::Chart widget 4-->
                </div>
                <!--end::Col-->
            </div>
            <!--end::Row-->

            <!--begin::Row-->
            <div class="row gy-5 g-xl-10">
                <!--begin::Col-->
                <div class="col-xl-4 mb-xl-10">

                    <!--begin::Engage widget 1-->
                    <div class="card h-md-100" dir="ltr">
                        <!--begin::Body-->
                        <div class="card-body d-flex flex-column flex-center">
                            <!--begin::Heading-->
                            <div class="mb-2">
                                <!--begin::Title-->
                                <h1 class="fw-semibold text-gray-800 text-center lh-lg">
                                    Have you tried <br /> new
                                    <span class="fw-bolder"> eCommerce App ?</span>
                                </h1>
                                <!--end::Title-->

                                <!--begin::Illustration-->
                                <div class="py-10 text-center">
                                    <img src="/metronic8/demo1/assets/media/svg/illustrations/easy/2.svg"
                                        class="theme-light-show w-200px" alt="" />
                                    <img src="/metronic8/demo1/assets/media/svg/illustrations/easy/2-dark.svg"
                                        class="theme-dark-show w-200px" alt="" />
                                </div>
                                <!--end::Illustration-->
                            </div>
                            <!--end::Heading-->

                            <!--begin::Links-->
                            <div class="text-center mb-1">
                                <!--begin::Link-->
                                <a class="btn btn-sm btn-primary me-2"
                                    href="/metronic8/demo1/../demo1/apps/ecommerce/sales/listing.html">
                                    View App </a>
                                <!--end::Link-->

                                <!--begin::Link-->
                                <a class="btn btn-sm btn-light"
                                    href="/metronic8/demo1/../demo1/apps/ecommerce/catalog/add-product.html">
                                    New Product </a>
                                <!--end::Link-->
                            </div>
                            <!--end::Links-->
                        </div>
                        <!--end::Body-->
                    </div>
                    <!--end::Engage widget 1-->

                </div>
                <!--end::Col-->

                <!--begin::Col-->
                <div class="col-xl-8 mb-5 mb-xl-10">

                    <!--begin::Table Widget 4-->
                    <div class="card card-flush h-xl-100">
                        <!--begin::Card header-->
                        <div class="card-header pt-7">
                            <!--begin::Title-->
                            <h3 class="card-title align-items-start flex-column">
                                <span class="card-label fw-bold text-gray-800">Product
                                    Orders</span>
                                <span class="text-gray-400 mt-1 fw-semibold fs-6">Avg. 57 orders
                                    per day</span>
                            </h3>
                            <!--end::Title-->

                            <!--begin::Actions-->
                            <div class="card-toolbar">
                                <!--begin::Filters-->
                                <div class="d-flex flex-stack flex-wrap gap-4">
                                    <!--begin::Destination-->
                                    <div class="d-flex align-items-center fw-bold">
                                        <!--begin::Label-->
                                        <div class="text-gray-400 fs-7 me-2">Cateogry</div>
                                        <!--end::Label-->

                                        <!--begin::Select-->
                                        <select
                                            class="form-select form-select-transparent text-graY-800 fs-base lh-1 fw-bold py-0 ps-3 w-auto"
                                            data-control="select2" data-hide-search="true"
                                            data-dropdown-css-class="w-150px"
                                            data-placeholder="Select an option">
                                            <option></option>
                                            <option value="Show All" selected>Show All</option>
                                            <option value="a">Category A</option>
                                            <option value="b">Category A</option>
                                        </select>
                                        <!--end::Select-->
                                    </div>
                                    <!--end::Destination-->

                                    <!--begin::Status-->
                                    <div class="d-flex align-items-center fw-bold">
                                        <!--begin::Label-->
                                        <div class="text-gray-400 fs-7 me-2">Status</div>
                                        <!--end::Label-->

                                        <!--begin::Select-->
                                        <select
                                            class="form-select form-select-transparent text-dark fs-7 lh-1 fw-bold py-0 ps-3 w-auto"
                                            data-control="select2" data-hide-search="true"
                                            data-dropdown-css-class="w-150px"
                                            data-placeholder="Select an option"
                                            data-kt-table-widget-4="filter_status">
                                            <option></option>
                                            <option value="Show All" selected>Show All</option>
                                            <option value="Shipped">Shipped</option>
                                            <option value="Confirmed">Confirmed</option>
                                            <option value="Rejected">Rejected</option>
                                            <option value="Pending">Pending</option>
                                        </select>
                                        <!--end::Select-->
                                    </div>
                                    <!--end::Status-->

                                    <!--begin::Search-->
                                    <div class="position-relative my-1">
                                        <i
                                            class="ki-duotone ki-magnifier fs-2 position-absolute top-50 translate-middle-y ms-4"><span
                                                class="path1"></span><span
                                                class="path2"></span></i> <input type="text"
                                            data-kt-table-widget-4="search"
                                            class="form-control w-150px fs-7 ps-12"
                                            placeholder="Search" />
                                    </div>
                                    <!--end::Search-->
                                </div>
                                <!--begin::Filters-->
                            </div>
                            <!--end::Actions-->
                        </div>
                        <!--end::Card header-->

                        <!--begin::Card body-->
                        <div class="card-body pt-2">
                            <!--begin::Table-->
                            <table class="table align-middle table-row-dashed fs-6 gy-3"
                                id="kt_table_widget_4_table">
                                <!--begin::Table head-->
                                <thead>
                                    <!--begin::Table row-->
                                    <tr
                                        class="text-start text-gray-400 fw-bold fs-7 text-uppercase gs-0">
                                        <th class="min-w-100px">Order ID</th>
                                        <th class="text-end min-w-100px">Created</th>
                                        <th class="text-end min-w-125px">Customer</th>
                                        <th class="text-end min-w-100px">Total</th>
                                        <th class="text-end min-w-100px">Profit</th>
                                        <th class="text-end min-w-50px">Status</th>
                                        <th class="text-end"></th>
                                    </tr>
                                    <!--end::Table row-->
                                </thead>
                                <!--end::Table head-->

                                <!--begin::Table body-->
                                <tbody class="fw-bold text-gray-600">
                                    <tr data-kt-table-widget-4="subtable_template"
                                        class="d-none">
                                        <td colspan="2">
                                            <div class="d-flex align-items-center gap-3">
                                                <a href="#"
                                                    class="symbol symbol-50px bg-secondary bg-opacity-25 rounded">
                                                    <img src=""
                                                        data-kt-src-path="/metronic8/demo1/assets/media/stock/ecommerce/"
                                                        alt=""
                                                        data-kt-table-widget-4="template_image" />
                                                </a>
                                                <div class="d-flex flex-column text-muted">
                                                    <a href="#"
                                                        class="text-gray-800 text-hover-primary fw-bold"
                                                        data-kt-table-widget-4="template_name">Product
                                                        name</a>
                                                    <div class="fs-7"
                                                        data-kt-table-widget-4="template_description">
                                                        Product description</div>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="text-end">
                                            <div class="text-gray-800 fs-7">Cost</div>
                                            <div class="text-muted fs-7 fw-bold"
                                                data-kt-table-widget-4="template_cost">1</div>
                                        </td>
                                        <td class="text-end">
                                            <div class="text-gray-800 fs-7">Qty</div>
                                            <div class="text-muted fs-7 fw-bold"
                                                data-kt-table-widget-4="template_qty">1</div>
                                        </td>
                                        <td class="text-end">
                                            <div class="text-gray-800 fs-7">Total</div>
                                            <div class="text-muted fs-7 fw-bold"
                                                data-kt-table-widget-4="template_total">name</div>
                                        </td>
                                        <td class="text-end">
                                            <div class="text-gray-800 fs-7 me-3">On hand</div>
                                            <div class="text-muted fs-7 fw-bold"
                                                data-kt-table-widget-4="template_stock">32</div>
                                        </td>
                                        <td></td>
                                    </tr>

                                    <tr>
                                        <td>
                                            <a href="/metronic8/demo1/../demo1/apps/ecommerce/catalog/edit-product.html"
                                                class="text-gray-800 text-hover-primary">#XGY-346</a>
                                        </td>

                                        <td class="text-end">
                                            7 min ago
                                        </td>

                                        <td class="text-end">
                                            <a href="#"
                                                class="text-gray-600 text-hover-primary">Albert
                                                Flores</a>
                                        </td>

                                        <td class="text-end">
                                            $630.00 </td>

                                        <td class="text-end">
                                            <span class="text-gray-800 fw-bolder">$86.70</span>
                                        </td>

                                        <td class="text-end">
                                            <span
                                                class="badge py-3 px-4 fs-7 badge-light-warning">Pending</span>
                                        </td>

                                        <td class="text-end">
                                            <button type="button"
                                                class="btn btn-sm btn-icon btn-light btn-active-light-primary toggle h-25px w-25px"
                                                data-kt-table-widget-4="expand_row">
                                                <i
                                                    class="ki-duotone ki-plus fs-4 m-0 toggle-off"></i>
                                                <i
                                                    class="ki-duotone ki-minus fs-4 m-0 toggle-on"></i>
                                            </button>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <a href="/metronic8/demo1/../demo1/apps/ecommerce/catalog/edit-product.html"
                                                class="text-gray-800 text-hover-primary">#YHD-047</a>
                                        </td>

                                        <td class="text-end">
                                            52 min ago
                                        </td>

                                        <td class="text-end">
                                            <a href="#"
                                                class="text-gray-600 text-hover-primary">Jenny
                                                Wilson</a>
                                        </td>

                                        <td class="text-end">
                                            $25.00 </td>

                                        <td class="text-end">
                                            <span class="text-gray-800 fw-bolder">$4.20</span>
                                        </td>

                                        <td class="text-end">
                                            <span
                                                class="badge py-3 px-4 fs-7 badge-light-primary">Confirmed</span>
                                        </td>

                                        <td class="text-end">
                                            <button type="button"
                                                class="btn btn-sm btn-icon btn-light btn-active-light-primary toggle h-25px w-25px"
                                                data-kt-table-widget-4="expand_row">
                                                <i
                                                    class="ki-duotone ki-plus fs-4 m-0 toggle-off"></i>
                                                <i
                                                    class="ki-duotone ki-minus fs-4 m-0 toggle-on"></i>
                                            </button>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <a href="/metronic8/demo1/../demo1/apps/ecommerce/catalog/edit-product.html"
                                                class="text-gray-800 text-hover-primary">#SRR-678</a>
                                        </td>

                                        <td class="text-end">
                                            1 hour ago
                                        </td>

                                        <td class="text-end">
                                            <a href="#"
                                                class="text-gray-600 text-hover-primary">Robert
                                                Fox</a>
                                        </td>

                                        <td class="text-end">
                                            $1,630.00 </td>

                                        <td class="text-end">
                                            <span class="text-gray-800 fw-bolder">$203.90</span>
                                        </td>

                                        <td class="text-end">
                                            <span
                                                class="badge py-3 px-4 fs-7 badge-light-warning">Pending</span>
                                        </td>

                                        <td class="text-end">
                                            <button type="button"
                                                class="btn btn-sm btn-icon btn-light btn-active-light-primary toggle h-25px w-25px"
                                                data-kt-table-widget-4="expand_row">
                                                <i
                                                    class="ki-duotone ki-plus fs-4 m-0 toggle-off"></i>
                                                <i
                                                    class="ki-duotone ki-minus fs-4 m-0 toggle-on"></i>
                                            </button>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <a href="/metronic8/demo1/../demo1/apps/ecommerce/catalog/edit-product.html"
                                                class="text-gray-800 text-hover-primary">#PXF-534</a>
                                        </td>

                                        <td class="text-end">
                                            3 hour ago
                                        </td>

                                        <td class="text-end">
                                            <a href="#"
                                                class="text-gray-600 text-hover-primary">Cody
                                                Fisher</a>
                                        </td>

                                        <td class="text-end">
                                            $119.00 </td>

                                        <td class="text-end">
                                            <span class="text-gray-800 fw-bolder">$12.00</span>
                                        </td>

                                        <td class="text-end">
                                            <span
                                                class="badge py-3 px-4 fs-7 badge-light-success">Shipped</span>
                                        </td>

                                        <td class="text-end">
                                            <button type="button"
                                                class="btn btn-sm btn-icon btn-light btn-active-light-primary toggle h-25px w-25px"
                                                data-kt-table-widget-4="expand_row">
                                                <i
                                                    class="ki-duotone ki-plus fs-4 m-0 toggle-off"></i>
                                                <i
                                                    class="ki-duotone ki-minus fs-4 m-0 toggle-on"></i>
                                            </button>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <a href="/metronic8/demo1/../demo1/apps/ecommerce/catalog/edit-product.html"
                                                class="text-gray-800 text-hover-primary">#XGD-249</a>
                                        </td>

                                        <td class="text-end">
                                            2 day ago
                                        </td>

                                        <td class="text-end">
                                            <a href="#"
                                                class="text-gray-600 text-hover-primary">Arlene
                                                McCoy</a>
                                        </td>

                                        <td class="text-end">
                                            $660.00 </td>

                                        <td class="text-end">
                                            <span class="text-gray-800 fw-bolder">$52.26</span>
                                        </td>

                                        <td class="text-end">
                                            <span
                                                class="badge py-3 px-4 fs-7 badge-light-success">Shipped</span>
                                        </td>

                                        <td class="text-end">
                                            <button type="button"
                                                class="btn btn-sm btn-icon btn-light btn-active-light-primary toggle h-25px w-25px"
                                                data-kt-table-widget-4="expand_row">
                                                <i
                                                    class="ki-duotone ki-plus fs-4 m-0 toggle-off"></i>
                                                <i
                                                    class="ki-duotone ki-minus fs-4 m-0 toggle-on"></i>
                                            </button>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <a href="/metronic8/demo1/../demo1/apps/ecommerce/catalog/edit-product.html"
                                                class="text-gray-800 text-hover-primary">#SKP-035</a>
                                        </td>

                                        <td class="text-end">
                                            2 day ago
                                        </td>

                                        <td class="text-end">
                                            <a href="#"
                                                class="text-gray-600 text-hover-primary">Eleanor
                                                Pena</a>
                                        </td>

                                        <td class="text-end">
                                            $290.00 </td>

                                        <td class="text-end">
                                            <span class="text-gray-800 fw-bolder">$29.00</span>
                                        </td>

                                        <td class="text-end">
                                            <span
                                                class="badge py-3 px-4 fs-7 badge-light-danger">Rejected</span>
                                        </td>

                                        <td class="text-end">
                                            <button type="button"
                                                class="btn btn-sm btn-icon btn-light btn-active-light-primary toggle h-25px w-25px"
                                                data-kt-table-widget-4="expand_row">
                                                <i
                                                    class="ki-duotone ki-plus fs-4 m-0 toggle-off"></i>
                                                <i
                                                    class="ki-duotone ki-minus fs-4 m-0 toggle-on"></i>
                                            </button>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <a href="/metronic8/demo1/../demo1/apps/ecommerce/catalog/edit-product.html"
                                                class="text-gray-800 text-hover-primary">#SKP-567</a>
                                        </td>

                                        <td class="text-end">
                                            7 min ago
                                        </td>

                                        <td class="text-end">
                                            <a href="#"
                                                class="text-gray-600 text-hover-primary">Dan
                                                Wilson</a>
                                        </td>

                                        <td class="text-end">
                                            $590.00 </td>

                                        <td class="text-end">
                                            <span class="text-gray-800 fw-bolder">$50.00</span>
                                        </td>

                                        <td class="text-end">
                                            <span
                                                class="badge py-3 px-4 fs-7 badge-light-success">Shipped</span>
                                        </td>

                                        <td class="text-end">
                                            <button type="button"
                                                class="btn btn-sm btn-icon btn-light btn-active-light-primary toggle h-25px w-25px"
                                                data-kt-table-widget-4="expand_row">
                                                <i
                                                    class="ki-duotone ki-plus fs-4 m-0 toggle-off"></i>
                                                <i
                                                    class="ki-duotone ki-minus fs-4 m-0 toggle-on"></i>
                                            </button>
                                        </td>
                                    </tr>
                                </tbody>
                                <!--end::Table body-->
                            </table>
                            <!--end::Table-->
                        </div>
                        <!--end::Card body-->
                    </div>
                    <!--end::Table Widget 4-->
                </div>
                <!--end::Col-->
            </div>
            <!--end::Row-->
        </div>
        <!--end::Content container-->
    </div>
    <!--end::Content-->
</div>
<!--end::Content wrapper-->

<!--begin::Vendors Javascript(used for this page only)-->
<script src="{{ asset('/metronic/assets/plugins/custom/datatables/datatables.bundle.js') }}"></script>
<script src="{{ asset('/metronic/assets/plugins/custom/vis-timeline/vis-timeline.bundle.js') }}"></script>
<!--end::Vendors Javascript-->

<!--begin::Custom Javascript(used for this page only)-->
<script src="{{ asset('/metronic/assets/js/widgets.bundle.js') }}"></script>
<script src="{{ asset('/metronic/assets/js/custom/widgets.js') }}"></script>
<script src="{{ asset('/metronic/assets/js/custom/apps/chat/chat.js') }}"></script>
<script src="{{ asset('/metronic/assets/js/custom/utilities/modals/upgrade-plan.js') }}"></script>
<script src="{{ asset('/metronic/assets/js/custom/utilities/modals/users-search.js') }}"></script>
<!--end::Custom Javascript-->

@endsection