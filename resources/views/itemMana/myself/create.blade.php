@extends('layouts.app')

@section('content')

<style>
    .drop-zone {
        max-width: 300px;
        width: 100%;
        height: 300px;
        padding: 0px;
        display: flex;
        align-items: center;
        justify-content: center;
        text-align: center;
        font-family: "Quicksand", sans-serif;
        font-weight: 500;
        font-size: 20px;
        cursor: pointer;
        color: #cccccc;
        border: 4px dashed #009ef7;
        border-radius: 10px;
        background-size: contain;
        background-repeat: no-repeat;
        background-position: center;
    }

    .drop-zone--over {
        border-style: solid;
    }

    .drop-zone__input {
        display: none;
    }

    .drop-zone__thumb {
        width: 100%;
        height: 100%;
        border-radius: 10px;
        overflow: hidden;
        background-color: #cccccc;
        background-size: contain;
        background-repeat: no-repeat;
        background-position: center;
        position: relative;
    }

    .drop-zone__prompt {
        color: #009ef7;
    }

    .drop-zone__thumb::after {
        content: attr(data-label);
        position: absolute;
        bottom: 0;
        left: 0;
        width: 100%;
        padding: 5px 0;
        color: #ffffff;
        background: rgba(0, 0, 0, 0.75);
        font-size: 14px;
        text-align: center;
    }
</style>

<link href="{{ asset('/metronic/assets/plugins/custom/datatables/datatables.bundle.css') }}" rel="stylesheet"
    type="text/css" />

<div class="d-flex flex-column flex-column-fluid">

    <!--begin::Toolbar-->
    <div id="kt_app_toolbar" class="app-toolbar  py-3 py-lg-6 ">

        <!--begin::Toolbar container-->
        <div id="kt_app_toolbar_container" class="app-container  container-xxl d-flex flex-stack ">



            <!--begin::Page title-->
            <div class="page-title d-flex flex-column justify-content-center flex-wrap me-3 ">
                <!--begin::Title-->
                <h1 class="page-heading d-flex text-dark fw-bold fs-3 flex-column justify-content-center my-0">クセ字作品登録
                </h1>
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
                    <form class="mb-17" method="POST" action="{{ route('myItem.store') }}" id="myForm">
                        @csrf
                        <!--begin::Row-->
                        <div class="row g-10 mb-4">
                            <div class="col-md-4 d-flex justify-content-start">
                                <div class="drop-zone"
                                    style="background-image: url({{ old('front_img', 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcStdszc97zfCye1WEu5_qKSQfoCgrVjb3Zq2ntwevXMLg&usqp=CAU&ec=48600112') }}); background-size: contain;">
                                    <span class="drop-zone__prompt">運営画像</span>
                                    <input type="file" name="myFile" class="drop-zone__input" id="front"
                                        onchange="uploadImg('front')" accept=".png, .jpg, .jpeg" />
                                    <input type="hidden" name="front_img" id="front_img" value="">
                                </div>
                            </div>
                            <div class="col-md-4 d-flex justify-content-center">
                                <div class="drop-zone"
                                    style="background-image: url({{ old('back_img', 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcStdszc97zfCye1WEu5_qKSQfoCgrVjb3Zq2ntwevXMLg&usqp=CAU&ec=48600112') }}); background-size: contain;">
                                    <span class="drop-zone__prompt">画像1</span>
                                    <input type="file" name="myFile" class="drop-zone__input" id="back"
                                        onchange="uploadImg('back')" accept=".png, .jpg, .jpeg" />
                                    <input type="hidden" name="back_img" id="back_img" value="{{ old('back_img') }}">
                                </div>
                            </div>
                            <div class="col-md-4 d-flex justify-content-end">
                                <div class="drop-zone"
                                    style="background-image: url({{ old('side_img', 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcStdszc97zfCye1WEu5_qKSQfoCgrVjb3Zq2ntwevXMLg&usqp=CAU&ec=48600112') }}); background-size: contain;">
                                    <span class="drop-zone__prompt">画像2</span>
                                    <input type="file" name="myFile" class="drop-zone__input" id="side"
                                        onchange="uploadImg('side')" accept=".png, .jpg, .jpeg" />
                                    <input type="hidden" name="side_img" id="side_img" value="">
                                </div>
                            </div>
                        </div>
                        <!--end::Row-->

                        <div class="row">
                            <div class="col-lg-6">
                                <div class="row g-10 mb-2">
                                    <!--begin::Label-->
                                    <label class="col-lg-4 col-form-label fw-semibold fs-6" for="title">
                                        <span class="required">タイトル(会場掲示)</span>
                                    </label>
                                    <!--end::Label-->

                                    <!--begin::Col-->
                                    <div class="col-lg-8 fv-row">
                                        <input type="text" name="title" id="title"
                                            class="form-control form-control-lg form-control-solid"
                                            placeholder="タイトル(会場掲示)" value="{{ old('title') }}" />
                                    </div>
                                    <!--end::Col-->
                                </div>

                                <div class="row g-10 mb-6">
                                    <!--begin::Label-->
                                    <label class="col-lg-4 col-form-label fw-semibold fs-6" for="description">
                                        <span>説明</span>
                                    </label>
                                    <!--end::Label-->

                                    <!--begin::Col-->
                                    <div class="col-lg-8 fv-row">
                                        <textarea name="description" id="description" cols="30" rows="6"
                                            class="form-control form-control-lg form-control-solid"
                                            value="">{{ old('description') }}</textarea>
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
                                        <select aria-label="選択" id="frontal_color" name="frontal_color"
                                            data-control="select2" data-placeholder="選択"
                                            class="form-select form-select-solid form-select-lg">
                                            <option value="">選択</option>
                                            @foreach ($frontal_colors as $frontal_color)
                                            <option data-kt-flag="flags/united-states.svg"
                                                value="{{ $frontal_color->id }}" {{
                                                old('frontal_color')==$frontal_color->id ? 'selected' : '' }}>{{
                                                $frontal_color->title }}</option>
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
                                        <select aria-label="選択" id="category" name="category[]" data-control="select2"
                                            data-placeholder="選択" class="form-select form-select-solid form-select-lg"
                                            multiple size="3">
                                            <option value="">選択</option>
                                            @foreach ($categories as $category)
                                            <option data-kt-flag="flags/united-states.svg" value="{{ $category->id }}"
                                                {{ in_array($category->id, old('category', [])) ? 'selected' : '' }}>
                                                {{ $category->title }}
                                            </option>
                                            @endforeach
                                        </select>
                                        <span class="text-info px-3">最大3つのカテゴリを選択できます。</span>
                                    </div>
                                    <!--end::Col-->
                                </div>

                                <div class="row g-10 mb-2">
                                    <!--begin::Label-->
                                    <label class="col-lg-4 col-form-label fw-semibold fs-6" for="join_type">
                                        <span class="required">クセ字交換会の参加</span>
                                    </label>
                                    <!--end::Label-->

                                    <!--begin::Col-->
                                    <div class="col-lg-8 fv-row">
                                        <select aria-label="選択" id="join_type" name="join_type" data-control="select2"
                                            data-placeholder="選択" class="form-select form-select-solid form-select-lg">
                                            <option data-kt-flag="flags/united-states.svg" value="0" {{
                                                old('join_type')==0 ? 'selected' : '' }}>はい</option>
                                            <option data-kt-flag="flags/united-states.svg" value="1" {{
                                                old('join_type')==1 ? 'selected' : '' }}>いいえ</option>
                                        </select>
                                    </div>
                                    <!--end::Col-->
                                </div>
                            </div>
                        </div>

                        <input type="hidden" name="register_type" value="" id="register_type">

                        <div class="card-footer d-flex justify-content-end py-6 px-0">
                            <button type="button" onclick="submitForm('nopay')" class="btn btn-primary py-2 me-2" id="kt_account_profile_details_submit"> 一時保存 </button>
                            <button type="button" class="btn btn-primary py-2 ms-2" id="" data-bs-toggle="modal" data-bs-target="#kt_modal_stacked_2"> 決 済 </button>
                        </div>
                        <div class="row">
                            <span class="text-right" style="text-align: end;">「決済＝出品可能」なので、一旦仮入力で決済後に編集してください」</span>
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

<div class="modal fade" tabindex="-1" id="kt_modal_stacked_2">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title">決済方法の確認</h3>
                <!--begin::Close-->
                <div class="btn btn-icon btn-sm btn-active-light-primary ms-2" data-bs-dismiss="modal"
                    aria-label="Close">
                    <i class="ki-duotone ki-cross fs-1"><span class="path1"></span><span class="path2"></span></i>
                </div>
                <!--end::Close-->
            </div>

            <div class="modal-body">
                <img src="{{ asset('/assets/img/modal.png') }}" class="w-100" alt="">
                <p>クセ字コンテスト　出品料　3000円(込)</p>
                <p>次画面のPaypal登録画面の下部の「カードで支払う」ボタンをクリックして決済をしてください。</p>
                <p>次画面のPaypal画面でボタンをクリックして決済に進んでください。(端末、OSで違う場合があります)</p>
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-light" data-bs-dismiss="modal">キャンセル</button>
                <button type="button" onclick="submitForm('pay')" class="btn btn-primary">決済ページへ</button>
            </div>
        </div>
    </div>
</div>
<script src="{{ asset('/metronic/assets/plugins/custom/fslightbox/fslightbox.bundle.js') }}"></script>
<script src="{{ asset('/metronic/assets/plugins/custom/datatables/datatables.bundle.js') }}"></script>
<script src="https://preview.keenthemes.com/html/metronic/docs/assets/js/custom/documentation/base/modal.js"></script>

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

    function submitForm(param) {
        $('#register_type').val(param);
        $('#myForm').off('submit').submit();
    }
</script>

<script>
    document.querySelectorAll(".drop-zone__input").forEach((inputElement) => {
        const dropZoneElement = inputElement.closest(".drop-zone");

        dropZoneElement.addEventListener("click", (e) => {
            inputElement.click();
        });

        inputElement.addEventListener("change", (e) => {
            if (inputElement.files.length) {
                updateThumbnail(dropZoneElement, inputElement.files[0]);
            }
        });

        dropZoneElement.addEventListener("dragover", (e) => {
            e.preventDefault();
            dropZoneElement.classList.add("drop-zone--over");
        });

        ["dragleave", "dragend"].forEach((type) => {
            dropZoneElement.addEventListener(type, (e) => {
                dropZoneElement.classList.remove("drop-zone--over");
            });
        });

        dropZoneElement.addEventListener("drop", (e) => {
            e.preventDefault();

            if (e.dataTransfer.files.length) {
                inputElement.files = e.dataTransfer.files;
                updateThumbnail(dropZoneElement, e.dataTransfer.files[0]);
            }

            dropZoneElement.classList.remove("drop-zone--over");

            var divString = String(dropZoneElement.innerHTML);

            if(String(dropZoneElement.innerHTML).includes("front_img") == true) {
                uploadImg('front');
            }

            if(String(dropZoneElement.innerHTML).includes("back_img") == true) {
                uploadImg('back');
            }

            if(String(dropZoneElement.innerHTML).includes("side_img") == true) {
                uploadImg('side');
            }
        });
    });

    /**
     * Updates the thumbnail on a drop zone element.
     *
     * @param {HTMLElement} dropZoneElement
     * @param {File} file
     */
    function updateThumbnail(dropZoneElement, file) {
        let thumbnailElement = dropZoneElement.querySelector(".drop-zone__thumb");

        // First time - remove the prompt
        if (dropZoneElement.querySelector(".drop-zone__prompt")) {
            dropZoneElement.querySelector(".drop-zone__prompt").remove();
        }

        // First time - there is no thumbnail element, so lets create it
        if (!thumbnailElement) {
            thumbnailElement = document.createElement("div");
            thumbnailElement.classList.add("drop-zone__thumb");
            dropZoneElement.appendChild(thumbnailElement);
        }

        thumbnailElement.dataset.label = file.name;

        // Show thumbnail for image files
        if (file.type.startsWith("image/")) {
            const reader = new FileReader();

            reader.readAsDataURL(file);
            reader.onload = () => {
                thumbnailElement.style.backgroundImage = `url('${reader.result}')`;
            };
        } else {
            thumbnailElement.style.backgroundImage = null;
        }
    }
</script>
@endsection