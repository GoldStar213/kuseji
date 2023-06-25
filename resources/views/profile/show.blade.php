@extends('layouts.app')

@section('content')

<!--begin::Basic info-->
<div class="card mb-5 mb-xl-10 w-xl-75 mx-auto" style="margin-top: 5vh;">
    <!--begin::Card header-->
    <div class="card-header border-0 cursor-pointer" role="button" data-bs-toggle="collapse"
        data-bs-target="#kt_account_profile_details" aria-expanded="true" aria-controls="kt_account_profile_details">
        <!--begin::Card title-->
        <div class="card-title m-0">
            <h3 class="fw-bold m-0">基本情報編集</h3>
        </div>
        <!--end::Card title-->
    </div>
    <!--begin::Card header-->

    <!--begin::Content-->
    <div class="collapse show">
        <!--begin::Form-->
        <form class="form" method="POST" action="{{ route('profile.update', ['profile' => Auth::user()->id]) }}">
            @csrf
            @method('PUT')

            <!--begin::Card body-->
            <div class="card-body border-top p-9">
                <!--begin::Input group-->
                <div class="row mb-6">
                    <!--begin::Label-->
                    <label class="col-lg-4 col-form-label fw-semibold fs-6">プロフィール画像</label>
                    <!--end::Label-->

                    <!--begin::Col-->
                    <div class="col-lg-8">
                        <!--begin::Image input-->
                        <div class="image-input image-input-outline" data-kt-image-input="true">
                            <!--begin::Preview existing avatar-->
                            <div class="image-input-wrapper w-125px h-125px"
                                style="background-image: url({{ asset(Auth::user()->avatar_url) }})"></div>
                            <!--end::Preview existing avatar-->

                            <input type="hidden" name="avatar_img" id="avatar_img" value="">

                            <!--begin::Label-->
                            <label class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow"
                                data-kt-image-input-action="change" data-bs-toggle="tooltip" aria-label="Change avatar"
                                data-bs-original-title="Change avatar" data-kt-initialized="1">
                                <i class="ki-duotone ki-pencil fs-7">
                                    <span class="path1"></span>
                                    <span class="path2"></span>
                                </i>
                                <!--begin::Inputs-->
                                <input type="file" name="avatar" onchange="uploadImg()" accept=".png, .jpg, .jpeg">
                                <input type="hidden" name="avatar_remove">
                                <!--end::Inputs-->
                            </label>
                            <!--end::Label-->

                            <!--begin::Cancel-->
                            <span class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow"
                                data-kt-image-input-action="cancel" data-bs-toggle="tooltip" aria-label="Cancel avatar"
                                data-bs-original-title="Cancel avatar" data-kt-initialized="1">
                                <i class="ki-duotone ki-cross fs-2">
                                    <span class="path1"></span>
                                    <span class="path2"></span>
                                </i>
                            </span>
                            <!--end::Cancel-->

                        </div>
                        <!--end::Image input-->

                        <!--begin::Hint-->
                        <div class="form-text">許可されているファイルの種類: png、jpg、jpeg。</div>
                        <!--end::Hint-->
                    </div>
                    <!--end::Col-->
                </div>
                <!--end::Input group-->

                <!--begin::Input group-->
                <div class="row mb-6">
                    <!--begin::Label-->
                    <label class="col-lg-4 col-form-label required fw-semibold fs-6">氏名</label>
                    <!--end::Label-->

                    <!--begin::Col-->
                    <div class="col-lg-8">
                        <!--begin::Row-->
                        <div class="row">
                            <!--begin::Col-->
                            <div class="col-lg-6 fv-row">
                                <input type="text" name="firstname"
                                    class="form-control form-control-lg form-control-solid mb-3 mb-lg-0" placeholder="姓"
                                    value="{{ old('firstname', Auth::user()->firstname) }}" />
                                @error('firstname')
                                <span class="invalid-feedback d-block" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            <!--end::Col-->

                            <!--begin::Col-->
                            <div class="col-lg-6 fv-row">
                                <input type="text" name="lastname"
                                    class="form-control form-control-lg form-control-solid" placeholder="名"
                                    value="{{ old('lastname', Auth::user()->lastname) }}" />
                                @error('lastname')
                                <span class="invalid-feedback d-block" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            <!--end::Col-->
                        </div>
                        <!--end::Row-->
                    </div>
                    <!--end::Col-->
                </div>
                <!--end::Input group-->

                <!--begin::Input group-->
                <div class="row mb-6">
                    <!--begin::Label-->
                    <label class="col-lg-4 col-form-label required fw-semibold fs-6">ペンネーム(公開)</label>
                    <!--end::Label-->

                    <!--begin::Col-->
                    <div class="col-lg-8 fv-row">
                        <input type="text" name="nickname" class="form-control form-control-lg form-control-solid"
                            placeholder="" value="{{ old('nickname', Auth::user()->nickname) }}" />
                        @error('nickname')
                        <span class="invalid-feedback d-block" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <!--end::Col-->
                </div>
                <!--end::Input group-->

                <!--begin::Input group-->
                <div class="row mb-6">
                    <!--begin::Label-->
                    <label class="col-lg-4 col-form-label fw-semibold fs-6">
                        <span class="required">メール</span>
                    </label>
                    <!--end::Label-->

                    <!--begin::Col-->
                    <div class="col-lg-8 fv-row">
                        <input type="email" name="email" class="form-control form-control-lg form-control-solid"
                            placeholder="" value="{{ Auth::user()->email }}" disabled />
                        @error('email')
                        <span class="invalid-feedback d-block" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <!--end::Col-->
                </div>
                <!--end::Input group-->

                <!--begin::Input group-->
                <div class="row mb-6">
                    <!--begin::Label-->
                    <label class="col-lg-4 col-form-label fw-semibold fs-6">
                        <span class="required">郵便番号</span>
                    </label>
                    <!--end::Label-->

                    <!--begin::Col-->
                    <div class="col-lg-8 fv-row">
                        <!--begin::Row-->
                        <div class="row">
                            <!--begin::Col-->
                            <div class="col-lg-6 fv-row">
                                <input type="text" name="zip1" class="form-control form-control-lg form-control-solid mb-3 mb-lg-0" placeholder="" value="{{ old('zip1', substr(Auth::user()->postal_code, 0, 3)) }}" size="4" maxlength="3" />
                                @error('zip1')
                                <span class="invalid-feedback d-block" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            <!--end::Col-->

                            <!--begin::Col-->
                            <div class="col-lg-6 fv-row">
                                <input type="text" name="zip2" class="form-control form-control-lg form-control-solid" placeholder="" value="{{ old('zip2', substr(Auth::user()->postal_code, 3, 8)) }}" size="5" maxlength="4" onKeyUp="AjaxZip3.zip2addr('zip1','zip2','prefectures','house_number');" />
                                @error('zip2')
                                <span class="invalid-feedback d-block" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            <!--end::Col-->
                        </div>
                        <!--end::Row-->
                    </div>
                    <!--end::Col-->
                </div>
                <!--end::Input group-->

                <!--begin::Input group-->
                <div class="row mb-6">
                    <!--begin::Label-->
                    <label class="col-lg-4 col-form-label required fw-semibold fs-6">都道府県</label>
                    <!--end::Label-->

                    <!--begin::Col-->
                    <div class="col-lg-8 fv-row">
                        <input type="text" name="prefectures" class="form-control form-control-lg form-control-solid"
                            placeholder="" value="{{ old('prefectures', Auth::user()->prefectures) }}" />
                        @error('prefectures')
                        <span class="invalid-feedback d-block" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <!--end::Col-->
                </div>
                <!--end::Input group-->

                <!--begin::Input group-->
                <div class="row mb-6">
                    <!--begin::Label-->
                    <label class="col-lg-4 col-form-label required fw-semibold fs-6">住所（番地まで）</label>
                    <!--end::Label-->

                    <!--begin::Col-->
                    <div class="col-lg-8 fv-row">
                        <input type="text" name="house_number" class="form-control form-control-lg form-control-solid"
                            placeholder="" value="{{ old('house_number', Auth::user()->house_number) }}" />
                        @error('house_number')
                        <span class="invalid-feedback d-block" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <!--end::Col-->
                </div>
                <!--end::Input group-->

                <!--begin::Input group-->
                <div class="row mb-6">
                    <!--begin::Label-->
                    <label class="col-lg-4 col-form-label fw-semibold fs-6">住所（ビル名等）</label>
                    <!--end::Label-->

                    <!--begin::Col-->
                    <div class="col-lg-8 fv-row">
                        <input type="text" name="building_name" class="form-control form-control-lg form-control-solid"
                            placeholder="" value="{{ old('building_name', Auth::user()->building_name) }}" />
                        @error('building_name')
                        <span class="invalid-feedback d-block" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <!--end::Col-->
                </div>
                <!--end::Input group-->

                <!--begin::Input group-->
                <div class="row mb-6">
                    <!--begin::Label-->
                    <label class="col-lg-4 col-form-label fw-semibold fs-6" for="phone_number">電話番号</label>
                    <!--end::Label-->

                    <!--begin::Col-->
                    <div class="col-lg-8 fv-row">
                        <input type="tel" name="phone_number" id="phone_number"
                            class="form-control form-control-lg form-control-solid" placeholder="000-0000-0000"
                            value="{{ old('phone_number', Auth::user()->phone_number) }}" />
                        @error('phone_number')
                        <span class="invalid-feedback d-block" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <!--end::Col-->
                </div>
                <!--end::Input group-->

                <!--begin::Input group-->
                <div class="row mb-6">
                    <!--begin::Label-->
                    <label class="col-lg-4 col-form-label fw-semibold fs-6">ツイッター</label>
                    <!--end::Label-->

                    <!--begin::Col-->
                    <div class="col-lg-8 fv-row">
                        <input type="text" name="twitter" class="form-control form-control-lg form-control-solid"
                            placeholder="https://twitter.com/idの中から(id)のみを入力してください。"
                            value="{{ old('twitter', str_replace('https://twitter.com/', '', Auth::user()->twitter)) }}" />
                    </div>
                    <!--end::Col-->
                </div>
                <!--end::Input group-->

                <!--begin::Input group-->
                <div class="row mb-6">
                    <!--begin::Label-->
                    <label class="col-lg-4 col-form-label fw-semibold fs-6">インスタ</label>
                    <!--end::Label-->

                    <!--begin::Col-->
                    <div class="col-lg-8 fv-row">
                        <input type="text" name="instagram" class="form-control form-control-lg form-control-solid"
                            placeholder="https://www.instagram.com/idの中から(id)のみを入力してください。"
                            value="{{ old('instagram', str_replace('https://www.instagram.com/', '', Auth::user()->instagram)) }}" />
                    </div>
                    <!--end::Col-->
                </div>
                <!--end::Input group-->

                <!--begin::Input group-->
                <div class="row mb-6">
                    <!--begin::Label-->
                    <label class="col-lg-4 col-form-label fw-semibold fs-6">TikTok</label>
                    <!--end::Label-->

                    <!--begin::Col-->
                    <div class="col-lg-8 fv-row">
                        <input type="text" name="tiktok" class="form-control form-control-lg form-control-solid"
                            placeholder="https://www.tiktok.com/@idの中から(id)のみを入力してください。"
                            value="{{ old('tiktok', str_replace('https://www.tiktok.com/@', '', Auth::user()->tiktok)) }}" />
                    </div>
                    <!--end::Col-->
                </div>
                <!--end::Input group-->

            </div>
            <!--end::Card body-->

            <!--begin::Actions-->
            <div class="card-footer d-flex justify-content-end py-6 px-9">
                <button type="submit" class="btn btn-primary" id="kt_account_profile_details_submit">基本情報を更新する</button>
            </div>
            <!--end::Actions-->
        </form>
        <!--end::Form-->
    </div>
    <!--end::Content-->
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
@endsection