@extends('layouts.app')

@section('content')
<link href="{{ asset('/metronic/assets/plugins/custom/datatables/datatables.bundle.css') }}" rel="stylesheet" type="text/css"/>

<div class="d-flex flex-column flex-column-fluid">

    <!--begin::Toolbar-->
    <div id="kt_app_toolbar" class="app-toolbar  py-3 py-lg-6 ">

        <!--begin::Toolbar container-->
        <div id="kt_app_toolbar_container" class="app-container  container-xxl d-flex flex-stack ">
            <!--begin::Page title-->
            <div class="page-title d-flex flex-column justify-content-center flex-wrap me-3 ">
                <!--begin::Title-->
                <h1 class="page-heading d-flex text-dark fw-bold fs-3 flex-column justify-content-center my-0">私の作品</h1>
                <!--end::Title-->
            </div>
            <!--end::Page title-->
            <!--begin::Actions-->
            <div class="d-flex align-items-center gap-2 gap-lg-3">
                <!--begin::Primary button-->
                <a href="{{ route('matching.create') }}" class="btn btn-sm fw-bold btn-primary">作品登録</a>
                <!--end::Primary button-->
            </div>
            <!--end::Actions-->
        </div>
        <!--end::Toolbar container-->
    </div>
    <!--end::Toolbar-->

    <!--begin::Content-->
    <div id="kt_app_content" class="app-content  flex-column-fluid " data-select2-id="select2-data-kt_app_content">
        <!--begin::Content container-->
        <div class="app-container  container-xxl " data-select2-id="select2-data-kt_app_content_container">
            <!--begin::Search vertical-->
            @if(session('success'))
                <!--begin::Alert-->
                <div class="alert alert-primary d-flex align-items-center p-5 mb-5">
                    <!--begin::Icon-->
                    <i class="ki-duotone ki-shield-tick fs-2hx text-success me-4"><span class="path1"></span><span class="path2"></span></i>
                    <!--end::Icon-->

                    <!--begin::Wrapper-->
                    <div class="d-flex flex-column">
                        <!--begin::Content-->
                        <span>{{ session('success') }}</span>
                        <!--end::Content-->
                    </div>
                    <!--end::Wrapper-->
                </div>
                <!--end::Alert-->
            @endif
            <div class="d-flex flex-column flex-lg-row" data-select2-id="select2-data-132-7bgl">
                <!--begin::Layout-->
                <div class="flex-lg-row-fluid" data-select2-id="select2-data-131-f8z0" id="dataList">
                    
                </div>
                <!--end::Layout-->
            </div>
            <!--begin::Search vertical-->
        </div>
        <!--end::Content container-->
    </div>
    <!--end::Content-->
</div>

<script src="{{ asset('/assets/js/jquery.min.js') }}"></script>
<script src="{{ asset('/metronic/assets/js/widgets.bundle.js') }}"></script>
<script src="{{ asset('/metronic/assets/js/custom/widgets.js') }}"></script>
<script src="{{ asset('/metronic/assets/js/custom/apps/chat/chat.js') }}"></script>
<script src="{{ asset('/metronic/assets/js/custom/utilities/modals/upgrade-plan.js') }}"></script>
<script src="{{ asset('/metronic/assets/js/custom/utilities/modals/create-app.js') }}"></script>
<script src="{{ asset('/metronic/assets/js/custom/utilities/modals/users-search.js') }}"></script>
<script>
    getDataList();

    function getDataList() {
        $.get('/getMatching',function(data){
            $('#dataList').html(data);
        });
    }
</script>
@endsection