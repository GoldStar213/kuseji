@extends('layouts.app')

@section('content')
    @php
        use App\Models\Item;
        use App\Models\User;
    @endphp

    <div class="d-flex flex-column flex-column-fluid">

        <!--begin::Toolbar-->
        <div id="kt_app_toolbar" class="app-toolbar  py-3 py-lg-6 ">

            <!--begin::Toolbar container-->
            <div id="kt_app_toolbar_container" class="app-container  container-xxl d-flex flex-stack ">
                <!--begin::Page title-->
                <div class="page-title d-flex flex-column justify-content-center flex-wrap me-3 ">
                    <!--begin::Title-->
                    <h1 class="page-heading d-flex text-dark fw-bold fs-3 flex-column justify-content-center my-0">
                        作品詳細を見る
                    </h1>
                    <!--end::Title-->
                </div>
                <!--end::Page title-->
                <!--begin::Actions-->
                <div class="d-flex align-items-center gap-2 gap-lg-3">
                </div>
                <!--end::Actions-->
            </div>

        </div>
        <div id="kt_app_content" class="app-content  flex-column-fluid ">

            <!--begin::Content container-->
            <div id="kt_app_content_container" class="app-container container-xxl d-flex flex-stack pt-5">
                @php
                    $item_id = $item->id;
                    $item_users = DB::table('item_user')
                        ->where('item_id', $item_id)
                        ->get();
                @endphp
                <!--begin::Home card-->
                <div class="card w-100 pt-5">
                    @if (session('success'))
                        <div class="px-10">
                            <div class="alert alert-success d-flex align-items-center px-5">
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
                        </div>
                    @endif
                
                    <ul class="nav py-3 px-10">
                        <!--begin::Item-->

                        <li class="nav-item">
                            <a class="nav-link btn btn-sm btn-color-gray-600 btn-active-color-primary fw-bold px-4 me-1"
                                data-bs-toggle="collapse" href="#kt_social_feeds_comments_1">

                                <i class="ki-duotone ki-element-11  fs-2 me-1"><span class="path1"></span><span
                                        class="path2"></span><span class="path3"></span></i>
                                {{ $item->created_at }}
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="javascript:;" onclick="showModal()"
                                class="nav-link btn btn-sm btn-color-gray-600 btn-active-color-primary btn-active-light-primary fw-bold px-4 me-1 collapsible active"
                                data-bs-toggle="modal" data-bs-target="#kt_modal_create_app">

                                <i class="ki-duotone ki-message-text-2 fs-2 me-1"><span class="path1"></span><span
                                        class="path2"></span><span class="path3"></span></i>
                                {{ $item_users->count() }} コメント
                            </a>
                        </li>
                        <!--end::Item-->

                        <!--begin::Item-->
                        <li class="nav-item">
                            {{-- <button class="btn btn-icon btn-sm btn-color-gray-500 btn-active-color-primary w-25px p-0"
                                style="align-items: flex-start" onclick="rcmd({{ $item->id }})">
                                <i class="ki-duotone ki-heart fs-2 me-1"><span class="path1"></span><span
                                        class="path2"></span></i>
                            </button>
                            <span class="fw-bold text-gray-400" id="like_state"> --}}
                                @php
                                    $comment_row = DB::table('item_user')
                                        ->where('item_id', $item->id)
                                        ->where('like_state', '!=', '0')
                                        ->get();
                                    $comment_cnt = $comment_row->count();
                                   
                                @endphp
                                {{-- いいね
                            </span> --}}
                            <button  onclick="rcmd({{ $item->id }})"
                                class="nav-link btn btn-sm btn-color-gray-600 btn-active-color-primary fw-bold px-4 me-1">
                                <i class="ki-duotone ki-heart fs-2 me-1"><span class="path1"></span><span
                                        class="path2" ></span></i><span id='like_state'>{{$comment_cnt}} いいね</span>
                                       
                                </button>
                        </li>

                        <!--end::Item-->
                    </ul>
                    <!--begin::Body-->
                    <div class="card-body p-lg-20">
                        <!--begin::Section-->
                        <div class="mb-17">
                            <!--begin::Row-->
                            <div class="row">
                                <!--begin::Col-->
                                <div class="col-md-6">
                                    <!--begin::Feature post-->
                                    <div class="d-flex flex-column justify-content-between pe-lg-6 mb-lg-0 mb-10">
                                        <!--begin::Video-->
                                        <div class="mb-3">
                                            <img src="{{ asset($item->front_img) }}"
                                                class="embed-responsive-item card-rounded h-275px w-100 object-fit-contain"
                                                alt="">
                                        </div>
                                        <!--end::Video-->

                                        <!--begin::Body-->
                                        <div class="mb-5">
                                            <!--begin::Title-->
                                            <a href="javascript:;"
                                                class="fs-2 text-dark fw-bold text-hover-primary text-dark lh-base">
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
                                            <a href="{{ route('requestMatch.create', ['requestMatch' => $item->id]) }}"
                                                class="btn btn-primary">交換リクエスト</a>
                                        </div>
                                        <!--end::Footer-->
                                    </div>
                                    <!--end::Feature post-->



                                </div>
                                <!--end::Col-->

                                <!--begin::Col-->
                                <div class="col-md-6 justify-content-between d-flex flex-column"
                                    style="height: 500px; overflow-y: scroll;">
                                    <!--begin::Post-->

                                    @foreach ($item_users as $item_user)
                                  
                                        @if ($item_user->comment!="")
                                        <div class="ps-lg-6 mb-16 mt-md-0 mt-17">
                                            <!--begin::Body-->
                                            <div class="mb-6">
                                                <!--begin::Text-->
                                                <div class="fw-semibold fs-2 mt-4 text-gray-600 text-dark">
                                                    {{ $item_user->comment }}
                                                </div>
                                                <!--end::Text-->
                                            </div>
                                            <!--end::Body-->

                                            @php
                                                $user = User::where('id', $item_user->user_id)->first();
                                            @endphp

                                            <!--begin::Footer-->
                                            <div class="d-flex flex-stack flex-wrap">
                                                <!--begin::Item-->
                                                <div class="d-flex align-items-center pe-2">
                                                    <!--begin::Avatar-->
                                                    <div class="symbol symbol-35px symbol-circle me-3">
                                                        <img src="{{ asset($user->avatar_url) }}" class=""
                                                            alt="" />
                                                    </div>
                                                    <!--end::Avatar-->

                                                    <!--begin::Text-->
                                                    <div class="fs-5 fw-bold">
                                                        <a href="#"
                                                            class="text-gray-700 text-hover-primary">{{ $user->nickname }}</a>

                                                        <span class="text-muted">
                                                            {{ \Carbon\Carbon::parse($item_user->created_at)->format('Y-m-d') }}</span>
                                                    </div>
                                                    <!--end::Text-->
                                                </div>
                                                <!--end::Item-->
                                            </div>
                                            <!--end::Footer-->
                                        </div>
                                            
                                        @endif
                                   
                                        
                                        
                                    @endforeach
                                    <!--end::Post-->
                                </div>
                                <!--end::Col-->
                            </div>
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
        <div class="modal fade show " id="kt_modal_create_app" tabindex="-1" style="padding-left: 0px;" aria-modal="true"
            role="dialog">
            <!--begin::Modal dialog-->
            <form class="modal-dialog modal-dialog-centered mw-900px"action="{{ route('setComment') }}" method="post">
                @csrf
                <input type="hidden" name="item_id" id="{{ $item_id }}" value="{{ $item_id }}">
                <!--begin::Modal content-->
                <div class="modal-content">
                    <!--begin::Modal header-->
                    <div class="modal-header">
                        <!--begin::Modal title-->
                        <h2>コメントの作成</h2>

                        <div class="btn btn-sm btn-icon btn-active-color-primary" data-bs-dismiss="modal">
                            <i class="ki-duotone ki-cross fs-1"><span class="path1"></span><span
                                    class="path2"></span></i>
                        </div>
                        <!--end::Close-->
                    </div>
                    <div class="modal-body py-lg-10 px-lg-10">
                        <!--begin::Stepper-->
                        <div class="stepper stepper-pills stepper-column d-flex flex-column flex-xl-row flex-row-fluid"
                            id="kt_modal_create_app_stepper" data-kt-stepper="true">

                            <div class="flex-row-fluid py-lg-5 px-lg-15">
                                <!--begin::Form-->
                                <form class="form fv-plugins-bootstrap5 fv-plugins-framework" novalidate="novalidate"
                                    id="kt_modal_create_app_form">
                                    <!--begin::Step 1-->
                                    <div class="current" data-kt-stepper-element="content">
                                        <div class="w-100">
                                            <!--begin::Input group-->
                                            <div class="fv-row mb-10 fv-plugins-icon-container">
                                                <!--begin::Label-->
                                                <textarea name="comment" class="form-control form-control-lg form-control-solid" cols="30" rows="10"
                                                    required></textarea>
                                                <div class="fv-plugins-message-container invalid-feedback"></div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="d-flex flex-stack pt-10">
                                        <div>
                                            <button type="submit" class="btn btn-lg btn-primary">
                                                保存
                                                <i class="ki-duotone ki-arrow-right fs-3 ms-1 me-0">
                                                    <span class="path1"></span><span class="path2"></span>
                                                </i>
                                            </button>
                                        </div>
                                    </div>

                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <script src="{{ asset('/metronic/assets/plugins/custom/fslightbox/fslightbox.bundle.js') }}"></script>
    <script src="{{ asset('/metronic/assets/plugins/custom/datatables/datatables.bundle.js') }}"></script>
    <script src="{{ asset('/metronic/assets/js/widgets.bundle.js') }}"></script>
    <script src="{{ asset('/metronic/assets/js/custom/widgets.js') }}"></script>
    <script src="{{ asset('/metronic/assets/js/custom/apps/chat/chat.js') }}"></script>
    <script src="{{ asset('/metronic8/assets/js/custom/utilities/modals/upgrade-plan.js') }}"></script>
    <script src="{{ asset('/metronic8/assets/js/custom/utilities/modals/create-app.js') }}"></script>
    <script src="{{ asset('/metronic8/assets/js/custom/utilities/modals/users-search.js') }}"></script>

    <script>
        function rcmd(id) {
            console.log(id);
            $.post("/item/1", {
                _method: 'PUT',
                _token: $('meta[name="csrf-token"]').attr('content'),
                'item_id': id,
                'user_id': {{ Auth::user()->id }},
            }, function(data) {
                if (data == "failed") {
                    toastr.warning('すでにチェックしています。');
                } else {
                    $("#like_state").html(data+" いいね");
                }
            });
        }
    </script>
@endsection
