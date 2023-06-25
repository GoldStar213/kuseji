@extends('layouts.app')

@section('content')
<div class="d-flex flex-column flex-column-fluid">

    <!--begin::Toolbar-->
    <div id="kt_app_toolbar" class="app-toolbar  py-3 py-lg-6 ">

        <!--begin::Toolbar container-->
        <div id="kt_app_toolbar_container" class="app-container  container-xxl d-flex flex-stack ">

            <!--begin::Page title-->
            <div class="page-title d-flex flex-column justify-content-center flex-wrap me-3 ">
                <!--begin::Title-->
                <h1 class="page-heading d-flex text-dark fw-bold fs-3 flex-column justify-content-center my-0">
                    交換リクエスト
                </h1>
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
            <!--begin::Home card-->
            <div class="card">
                <!--begin::Body-->
                <div class="card-body p-lg-20">
                    <!--begin::Section-->
                    <div class="mb-17">

                        <!--begin::Alert-->
                        @error('second_item_id')
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

                        @error('already')
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

                        @error('message')
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

                        @error('grade')
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

                        @error('nopay')
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

                        @if(session('success'))
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
                                <span>{{ session('success') }}</span>
                                <!--end::Content-->
                            </div>
                            <!--end::Wrapper-->
                        </div>
                        @endif
                        <!--end::Alert-->

                        <!--begin::Row-->
                        <form class="row" action="{{ route('requestMatch.store') }}" method="POST">
                            @csrf
                            <input type="hidden" name="first_item_id" value="{{ $item->id }}">
                            <!--begin::Col-->
                            <div class="col-md-6">
                                <!--begin::Feature post-->
                                <div class="h-100 d-flex flex-column justify-content-between pe-lg-6 mb-lg-0 mb-10">
                                    <!--begin::Video-->
                                    <div class="mb-3">
                                        <img src="{{ asset($item->front_img) }}" class="embed-responsive-item card-rounded h-275px w-100 object-fit-contain" alt="">
                                    </div>
                                    <!--end::Video-->

                                    <!--begin::Body-->
                                    <div class="mb-5">
                                        <!--begin::Title-->
                                        <a href="javascript:;" class="fs-2 text-dark fw-bold text-hover-primary text-dark lh-base">
                                            {{ $item->title }}
                                        </a>
                                        <!--end::Title-->

                                        <!--begin::Text-->
                                        <div class="fw-semibold fs-5 text-gray-600 text-dark mt-4">
                                            {{ $item->description }}
                                        </div>
                                        <!--end::Text-->
                                    </div>
                                    <!--end::Body-->

                                    <!--begin::Footer-->
                                    <div class="d-flex flex-stack flex-wrap">
                                        @php
                                            use App\Models\Item;
                                            use App\Models\User;

                                            $item_id = $item->id;
                                            $user_id = Item::where('id', $item_id)->first()->user_id;
                                            $nickname = User::where('id', $user_id)->first()->nickname;
                                            $avatar = User::where('id', $user_id)->first()->avatar_url;
                                        @endphp
                                        <!--begin::Item-->
                                        <div class="d-flex align-items-center pe-2">
                                            <!--begin::Avatar-->
                                            <div class="symbol symbol-35px symbol-circle me-3">
                                                <img alt="" src="{{ asset($avatar) }}" />
                                            </div>
                                            <!--end::Avatar-->

                                            <!--begin::Text-->
                                            <div class="fs-5 fw-bold">
                                                <a href="" class="text-gray-700 text-hover-primary">
                                                    {{ $nickname }}
                                                </a>
                                                <span class="text-muted">{{ $item->created_at->format('Y-m-d') }}</span>
                                            </div>
                                            <!--end::Text-->
                                        </div>
                                        <!--end::Item-->
                                    </div>
                                    <!--end::Footer-->
                                </div>
                                <!--end::Feature post-->



                            </div>
                            <!--end::Col-->

                            <!--begin::Col-->
                            <div class="col-md-6">
                                <div class="row me-lg-6 mb-10">
                                    <select class="form-select" data-control="select2" data-placeholder="交換したい作品を選択" name="second_item_id">
                                        <option></option>
                                        @foreach($myItems as $myItem)
                                            <option value="{{ $myItem->id }}" {{ old('second_item_id') == $myItem->id ? 'selected' : '' }}>{{ $myItem->title }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="row me-lg-6 mb-10 px-3">
                                    <textarea name="message" id="" class="form-control" cols="30" rows="8" placeholder="交換したい作品にメッセ-ジを記載くだ龙 い。">{{ old('message') }}</textarea>
                                </div>
                                <div class="row me-lg-6 mb-10">
                                    <select class="form-select" name="grade" data-control="select2" data-placeholder="リクエスト順位">
                                        <option></option>
                                        <option value="1" {{ old('grade') == 1 ? 'selected' : '' }}>1</option>
                                        <option value="2" {{ old('grade') == 2 ? 'selected' : '' }}>2</option>
                                        <option value="3" {{ old('grade') == 3 ? 'selected' : '' }}>3</option>
                                        <option value="4" {{ old('grade') == 4 ? 'selected' : '' }}>4</option>
                                        <option value="5" {{ old('grade') == 5 ? 'selected' : '' }}>5</option>
                                    </select>
                                </div>
                                <div class="row me-lg-6">
                                    <div class="col-12 d-flex justify-content-end">
                                        <button type="submit" class="btn btn-primary">送 信</button>
                                    </div>
                                </div>
                            </div>
                            <!--end::Col-->
                        </form>
                        <!--begin::Row-->
                    </div>
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
@endsection