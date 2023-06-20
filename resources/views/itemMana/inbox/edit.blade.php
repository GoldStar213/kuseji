@extends('layouts.app')

@section('content')

    <link href="{{ asset('/metronic/assets/plugins/custom/datatables/datatables.bundle.css') }}" rel="stylesheet" type="text/css" />
    
    <div class="d-flex flex-column flex-column-fluid">

        <!--begin::Toolbar-->
        <div id="kt_app_toolbar" class="app-toolbar  py-3 py-lg-6 ">

            <!--begin::Toolbar container-->
            <div id="kt_app_toolbar_container" class="app-container  container-xxl d-flex flex-stack ">
                <!--begin::Page title-->
                <div class="page-title d-flex flex-column justify-content-center flex-wrap me-3 ">
                    <!--begin::Title-->
                    <h1 class="page-heading d-flex text-dark fw-bold fs-3 flex-column justify-content-center my-0">作品編集</h1>
                    <!--end::Title-->
                </div>
                <!--end::Page title-->
            </div>
            <!--end::Toolbar container-->
        </div>
        <!--end::Toolbar-->

        <!--begin::Content-->
        <div id="kt_app_content" class="app-content flex-column-fluid">

            <!--begin::Content container-->
            <div id="kt_app_content_container" class="app-container container-xxl">
                <!--begin::Home card-->
                <div class="card">
                    <!--begin::Body-->
                    <div class="card-body p-lg-20">

                        <!--begin::Alert-->
                        @error('front_img')
                        <div class="alert alert-danger d-flex align-items-center px-5 py-3">
                            <!--begin::Icon-->
                            <i class="ki-duotone ki-information-2 fs-2hx text-danger me-4">
                                <span class="path1"></span>
                                <span class="path2"></span>
                                <span class="path3"></span>
                            </i>
                            <!--end::Icon-->

                            <!--begin::Wrapper-->
                            <div class="d-flex flex-column">
                                <!--begin::Content-->
                                <span>{{ $message}}</span>
                                <!--end::Content-->
                            </div>
                            <!--end::Wrapper-->
                        </div>
                        @enderror

                        @error('back_img')
                        <div class="alert alert-danger d-flex align-items-center px-5 py-3">
                            <!--begin::Icon-->
                            <i class="ki-duotone ki-information-2 fs-2hx text-danger me-4">
                                <span class="path1"></span>
                                <span class="path2"></span>
                                <span class="path3"></span>
                            </i>
                            <!--end::Icon-->

                            <!--begin::Wrapper-->
                            <div class="d-flex flex-column">
                                <!--begin::Content-->
                                <span>{{ $message}}</span>
                                <!--end::Content-->
                            </div>
                            <!--end::Wrapper-->
                        </div>
                        @enderror

                        @error('side_img')
                        <div class="alert alert-danger d-flex align-items-center px-5 py-3">
                            <!--begin::Icon-->
                            <i class="ki-duotone ki-information-2 fs-2hx text-danger me-4">
                                <span class="path1"></span>
                                <span class="path2"></span>
                                <span class="path3"></span>
                            </i>
                            <!--end::Icon-->

                            <!--begin::Wrapper-->
                            <div class="d-flex flex-column">
                                <!--begin::Content-->
                                <span>{{ $message}}</span>
                                <!--end::Content-->
                            </div>
                            <!--end::Wrapper-->
                        </div>
                        @enderror

                        @error('title')
                        <div class="alert alert-danger d-flex align-items-center px-5 py-3">
                            <!--begin::Icon-->
                            <i class="ki-duotone ki-information-2 fs-2hx text-danger me-4">
                                <span class="path1"></span>
                                <span class="path2"></span>
                                <span class="path3"></span>
                            </i>
                            <!--end::Icon-->

                            <!--begin::Wrapper-->
                            <div class="d-flex flex-column">
                                <!--begin::Content-->
                                <span>{{ $message}}</span>
                                <!--end::Content-->
                            </div>
                            <!--end::Wrapper-->
                        </div>
                        @enderror

                        @error('description')
                        <div class="alert alert-danger d-flex align-items-center px-5 py-3">
                            <!--begin::Icon-->
                            <i class="ki-duotone ki-information-2 fs-2hx text-danger me-4">
                                <span class="path1"></span>
                                <span class="path2"></span>
                                <span class="path3"></span>
                            </i>
                            <!--end::Icon-->

                            <!--begin::Wrapper-->
                            <div class="d-flex flex-column">
                                <!--begin::Content-->
                                <span>{{ $message}}</span>
                                <!--end::Content-->
                            </div>
                            <!--end::Wrapper-->
                        </div>
                        @enderror

                        @error('frontal_color')
                        <div class="alert alert-danger d-flex align-items-center px-5 py-3">
                            <!--begin::Icon-->
                            <i class="ki-duotone ki-information-2 fs-2hx text-danger me-4">
                                <span class="path1"></span>
                                <span class="path2"></span>
                                <span class="path3"></span>
                            </i>
                            <!--end::Icon-->

                            <!--begin::Wrapper-->
                            <div class="d-flex flex-column">
                                <!--begin::Content-->
                                <span>{{ $message}}</span>
                                <!--end::Content-->
                            </div>
                            <!--end::Wrapper-->
                        </div>
                        @enderror

                        @error('category')
                        <div class="alert alert-danger d-flex align-items-center px-5 py-3">
                            <!--begin::Icon-->
                            <i class="ki-duotone ki-information-2 fs-2hx text-danger me-4">
                                <span class="path1"></span>
                                <span class="path2"></span>
                                <span class="path3"></span>
                            </i>
                            <!--end::Icon-->

                            <!--begin::Wrapper-->
                            <div class="d-flex flex-column">
                                <!--begin::Content-->
                                <span>{{ $message}}</span>
                                <!--end::Content-->
                            </div>
                            <!--end::Wrapper-->
                        </div>
                        @enderror

                        @error('matching')
                        <div class="alert alert-danger d-flex align-items-center px-5 py-3">
                            <!--begin::Icon-->
                            <i class="ki-duotone ki-information-2 fs-2hx text-danger me-4">
                                <span class="path1"></span>
                                <span class="path2"></span>
                                <span class="path3"></span>
                            </i>
                            <!--end::Icon-->

                            <!--begin::Wrapper-->
                            <div class="d-flex flex-column">
                                <!--begin::Content-->
                                <span>{{ $message}}</span>
                                <!--end::Content-->
                            </div>
                            <!--end::Wrapper-->
                        </div>
                        @enderror

                        @if(session('myItem_Register_Success'))
                        <div class="alert alert-success d-flex align-items-center px-5 py-3">
                            <!--begin::Icon-->
                            <i class="ki-duotone ki-shield-tick fs-2hx text-success me-4">
                                <span class="path1"></span>
                                <span class="path2"></span>
                            </i>
                            <!--end::Icon-->

                            <!--begin::Wrapper-->
                            <div class="d-flex flex-column">
                                <!--begin::Content-->
                                <span>{{ session('myItem_Register_Success') }}</span>
                                <!--end::Content-->
                            </div>
                            <!--end::Wrapper-->
                        </div>
                        @endif
                        <!--end::Alert-->
                        
                        <!--begin::Section-->
                        <form class="mb-17" method="POST" action="{{ route('myItem.update', ['myItem' => $myItem->id]) }}">
                            @csrf
                            @method('PUT')
                            <!--begin::Row-->
                            <div class="row g-10 mb-4">
                                <!--begin::Col-->
                                <div class="col-md-4">
                                    <!--begin::Image input-->
                                    <div class="image-input image-input-outline w-100" data-kt-image-input="true">
                                        <!--begin::Preview existing avatar-->
                                        <div class="image-input-wrapper w-100" style="background-image: url({{ asset($myItem->front_img) }});"></div>
                                        <input type="hidden" name="front_img" id="front_img" value="">
                                        <!--end::Preview existing avatar-->

                                        <!--begin::Label-->
                                        <label class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow" data-kt-image-input-action="change" data-bs-toggle="tooltip" title="正面画像">
                                            <i class="ki-duotone ki-pencil fs-7">
                                                <span class="path1"></span>
                                                <span class="path2"></span>
                                            </i>
                                            <!--begin::Inputs-->
                                            <input type="file" id="front" onchange="uploadImg('front')" accept=".png, .jpg, .jpeg"/>
                                            <!--end::Inputs-->
                                        </label>
                                        <!--end::Label-->

                                        <!--begin::Cancel-->
                                        <span class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow" data-kt-image-input-action="cancel" data-bs-toggle="tooltip" title="画像削除">
                                            <i class="ki-duotone ki-cross fs-2">
                                                <span class="path1"></span>
                                                <span class="path2"></span>
                                            </i>
                                        </span>
                                        <!--end::Cancel-->
                                    </div>
                                    <!--end::Image input-->
                                </div>
                                <!--end::Col-->

                                <!--begin::Col-->
                                <div class="col-md-4">
                                    <!--begin::Image input-->
                                    <div class="image-input image-input-outline w-100" data-kt-image-input="true">
                                        <!--begin::Preview existing avatar-->
                                        <div class="image-input-wrapper w-100" style="background-image: url({{ asset($myItem->back_img) }});"></div>
                                        <input type="hidden" name="back_img" id="back_img" value="">
                                        <!--end::Preview existing avatar-->

                                        <!--begin::Label-->
                                        <label class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow" data-kt-image-input-action="change" data-bs-toggle="tooltip" title="正面画像">
                                            <i class="ki-duotone ki-pencil fs-7">
                                                <span class="path1"></span>
                                                <span class="path2"></span>
                                            </i>
                                            <!--begin::Inputs-->
                                            <input type="file" id="back" onchange="uploadImg('back')" accept=".png, .jpg, .jpeg"/>
                                            <!--end::Inputs-->
                                        </label>
                                        <!--end::Label-->

                                        <!--begin::Cancel-->
                                        <span class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow" data-kt-image-input-action="cancel" data-bs-toggle="tooltip" title="画像削除">
                                            <i class="ki-duotone ki-cross fs-2">
                                                <span class="path1"></span>
                                                <span class="path2"></span>
                                            </i>
                                        </span>
                                        <!--end::Cancel-->
                                    </div>
                                    <!--end::Image input-->
                                </div>
                                <!--end::Col-->

                                <!--begin::Col-->
                                <div class="col-md-4">
                                    <!--begin::Image input-->
                                    <div class="image-input image-input-outline w-100" data-kt-image-input="true">
                                        <!--begin::Preview existing avatar-->
                                        <div class="image-input-wrapper w-100" style="background-image: url({{ asset($myItem->side_img) }});"></div>
                                        <input type="hidden" name="side_img" id="side_img" value="">
                                        <!--end::Preview existing avatar-->

                                        <!--begin::Label-->
                                        <label class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow" data-kt-image-input-action="change" data-bs-toggle="tooltip" title="正面画像">
                                            <i class="ki-duotone ki-pencil fs-7">
                                                <span class="path1"></span>
                                                <span class="path2"></span>
                                            </i>
                                            <!--begin::Inputs-->
                                            <input type="file" id="side" onchange="uploadImg('side')" accept=".png, .jpg, .jpeg"/>
                                            <!--end::Inputs-->
                                        </label>
                                        <!--end::Label-->

                                        <!--begin::Cancel-->
                                        <span class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow" data-kt-image-input-action="cancel" data-bs-toggle="tooltip" title="画像削除">
                                            <i class="ki-duotone ki-cross fs-2">
                                                <span class="path1"></span>
                                                <span class="path2"></span>
                                            </i>
                                        </span>
                                        <!--end::Cancel-->
                                    </div>
                                    <!--end::Image input-->
                                </div>
                                <!--end::Col-->
                            </div>
                            <!--end::Row-->

                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="row g-10 mb-2">
                                        <!--begin::Label-->
                                        <label class="col-lg-4 col-form-label fw-semibold fs-6" for="title">
                                            <span class="required">タイトル</span>
                                        </label>
                                        <!--end::Label-->
                                        
                                        <!--begin::Col-->
                                        <div class="col-lg-8 fv-row">
                                            <input type="text" name="title" id="title" class="form-control form-control-lg form-control-solid" placeholder="タイトル" value="{{ $myItem->title }}" />
                                        </div>
                                        <!--end::Col-->
                                    </div>
        
                                    <div class="row g-10 mb-6">
                                        <!--begin::Label-->
                                        <label class="col-lg-4 col-form-label fw-semibold fs-6" for="description">
                                            <span class="required">説明</span>
                                        </label>
                                        <!--end::Label-->
                                        
                                        <!--begin::Col-->
                                        <div class="col-lg-8 fv-row">
                                            <textarea name="description" id="description" cols="30" rows="6" class="form-control form-control-lg form-control-solid" value="">{{ $myItem->description }}</textarea>
                                        </div>
                                        <!--end::Col-->
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="row g-10 mb-2">
                                        <!--begin::Label-->
                                        <label class="col-lg-4 col-form-label fw-semibold fs-6" for="frontal_color">
                                            <span class="required">額色</span>
                                        </label>
                                        <!--end::Label-->
                                        
                                        <!--begin::Col-->
                                        <div class="col-lg-8 fv-row">
                                            <select aria-label="選択" id="frontal_color" name="frontal_color" data-control="select2" data-placeholder="選択" class="form-select form-select-solid form-select-lg">
                                                <option value="">選択</option>
                                                @foreach ($frontal_colors as $frontal_color)
                                                    <option data-kt-flag="flags/united-states.svg" value="{{ $frontal_color->id }}" {{ $myItem->frontal_color_id == $frontal_color->id ? 'selected' : '' }}>{{ $frontal_color->title }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <!--end::Col-->
                                    </div>

                                    <div class="row g-10 mb-2">
                                        <!--begin::Label-->
                                        <label class="col-lg-4 col-form-label fw-semibold fs-6" for="category">
                                            <span class="required">カテゴリー</span>
                                        </label>
                                        <!--end::Label-->
                                        
                                        <!--begin::Col-->
                                        <div class="col-lg-8 fv-row">
                                            <select aria-label="選択" id="category" name="category" data-control="select2" data-placeholder="選択" class="form-select form-select-solid form-select-lg">
                                                @foreach ($categories as $category)
                                                    <option value="{{ $category->id }}" {{ $myItem->category_id == $category->id ? 'selected' : '' }}>{{ $category->title }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <!--end::Col-->
                                    </div>
                                </div>
                            </div>

                            <div class="card-footer d-flex justify-content-end py-6 px-0">
                                <button type="submit" class="btn btn-primary py-2">セーブ</button>
                            </div>
                        </form>
                        <!--end::Section-->

                    </div>
                    <!--end::Body-->
                </div>
                <!--end::Home card-->

            </div>
            <!--end::Content container-->
        </div>
        <!--end::Content-->
    </div>
    <script src="{{ asset('/metronic/assets/plugins/custom/fslightbox/fslightbox.bundle.js') }}"></script>
    <script src="{{ asset('/metronic/assets/plugins/custom/datatables/datatables.bundle.js') }}"></script>

    <script>
        var divWidth = $('.image-input-wrapper').width(); 
        $('.image-input-wrapper').height(divWidth);
        $(window).resize(function(){
            $('.image-input-wrapper').height(divWidth);
        });

        function uploadImg(pos) {
            var inputElement = document.querySelector('#' + pos);

            var file = inputElement.files[0];
            var reader = new FileReader();
            reader.onload = function() {

                // Convert the binary data to a base64-encoded string
                var base64String = btoa(reader.result);

                // Use the base64-encoded string as needed
                base64String = 'data:' + file.type + ';base64,' + base64String;

                $('#' + pos + '_img').val(base64String);

            };

            reader.readAsBinaryString(file);
        }
    </script>
@endsection
