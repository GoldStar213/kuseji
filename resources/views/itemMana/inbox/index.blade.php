@extends('layouts.app')

@section('content')

@php
    use App\Models\ItemUser;
@endphp

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
                <a href="{{ route('myItem.create') }}" class="btn btn-sm fw-bold btn-primary">作品登録</a>
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
        <div id="kt_app_content_container" class="app-container  container-xxl "
            data-select2-id="select2-data-kt_app_content_container">
            <!--begin::Search vertical-->
            <div class="d-flex flex-column flex-lg-row" data-select2-id="select2-data-132-7bgl">
                <!--begin::Aside-->
                <div class="flex-column flex-lg-row-auto w-100 w-lg-250px w-xxl-325px mb-8 mb-lg-0 me-lg-9 me-5" data-select2-id="select2-data-143-977q">
                    <!--begin::Form-->
                    <div>
                        <!--begin::Card-->
                        <div class="card" data-select2-id="select2-data-141-s38f">
                            <!--begin::Body-->
                            <div class="card-body" data-select2-id="select2-data-140-zqdv">
                                <!--begin:Search-->
                                <div class="position-relative">
                                    <i class="ki-duotone ki-magnifier fs-3 text-gray-500 position-absolute top-50 translate-middle ms-6">
                                        <span class="path1"></span>
                                        <span class="path2"></span>
                                    </i>
                                    <input type="text" class="form-control form-control-solid ps-10" name="item_name" id="item_name" value="{{ old('item_name') }}" placeholder="作品名">
                                </div>
                                <!--end:Search-->

                                <!--begin::Border-->
                                <div class="separator separator-dashed my-8"></div>
                                <!--end::Border-->

                                <!--begin::Input group-->
                                <div class="mb-5" data-select2-id="select2-data-139-fp70">
                                    <label class="fs-6 form-label fw-bold text-dark" for="frontal_color">額色(15色)</label>

                                    <select class="form-select" id="frontal_color" name="frontal_color" data-control="select2" data-placeholder="選択してください">
                                        <option value="0">全て</option>
                                        @foreach ($frontal_colors as $frontal_color)
                                            <option value="{{ $frontal_color->id }}">{{ $frontal_color->title }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <!--end::Input group-->

                                <!--begin::Input group-->
                                <div class="mb-10">
                                    <label class="fs-6 form-label fw-bold text-dark mb-5">カテゴリー</label>
            
                                    <!--begin::Checkbox-->
                                    @foreach ($categories as $category)
                                        <div class="form-check form-check-custom form-check-solid mb-5">
                                            <input class="form-check-input category_id" type="checkbox" id="{{ $category->id }}" value="{{ $category->id }}">
                                            <label class="form-check-label flex-grow-1 fw-semibold text-gray-700 fs-6" for="{{ $category->id }}">
                                                {{ $category->title }}
                                            </label>
                                        </div>
                                    @endforeach
                                    <!--end::Checkbox-->
                                </div>
                                <!--end::Input group-->

                                <!--begin::Input group-->
                                <div class="mb-5" data-select2-id="select2-data-139-fp70">
                                    <label class="fs-6 form-label fw-bold text-dark" for="matching">マッチング</label>

                                    <select class="form-select" id="matching" name="matching" data-control="select2" data-placeholder="選択してください">
                                        <option value="0">全て</option>
                                        @foreach ($matchings as $matching)
                                            <option value="{{ $matching->id }}">{{ $matching->title }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <!--end::Input group-->

                                <!--begin::Input group-->
                                <div class="mb-5" data-select2-id="select2-data-139-fp70">
                                    <label class="fs-6 form-label fw-bold text-dark" for="join_type">マッチング参加の可否</label>

                                    <select class="form-select" id="join_type" name="join_type" data-control="select2" data-placeholder="選択してください">
                                        <option value="0">全て</option>
                                        <option value="1">はい</option>
                                        <option value="2">いいえ</option>
                                    </select>
                                </div>
                                <!--end::Input group-->

                                <!--begin::Action-->
                                <div class="d-flex align-items-center justify-content-end">
                                    <button class="btn btn-primary" onclick="getDataList()">検 索</button>
                                </div>
                                <!--end::Action-->  
                            </div>
                            <!--end::Body-->
                        </div>
                        <!--end::Card-->
                    </div>
                    <!--end::Form-->
                </div>
                <!--end::Aside-->

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

<script src="{{ asset('/metronic/assets/js/widgets.bundle.js') }}"></script>
<script src="{{ asset('/metronic/assets/js/custom/widgets.js') }}"></script>
<script src="{{ asset('/metronic/assets/js/custom/apps/chat/chat.js') }}"></script>
<script src="{{ asset('/metronic/assets/js/custom/utilities/modals/upgrade-plan.js') }}"></script>
<script src="{{ asset('/metronic/assets/js/custom/utilities/modals/create-app.js') }}"></script>
<script src="{{ asset('/metronic/assets/js/custom/utilities/modals/users-search.js') }}"></script>

<script>
    function change_sort_type() {
        $("#sort_type").val("0").trigger('change');
    }

    getDataList();

    function getDataList() {

        var item_name = $('#item_name').val();
        var frontal_color_id = $('#frontal_color').val();
        var category_id = $(".category_id:checkbox:checked").map(function() {
            return $(this).val();
        }).get();;
        var matching_id = $("#matching").val();
        var join_type = $('#join_type').val();

        $.get('getMyItem', {
            'item_name': item_name,
            'frontal_color_id': frontal_color_id,
            'category_id': category_id,
            'matching_id': matching_id,
            'join_type': join_type,
        }, function(data){
            $('#dataList').html(data);
        })
    }
</script>
@endsection
