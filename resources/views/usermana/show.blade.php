@extends('layouts.app')

@section('content')
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.css" />

<style>
    .swiper {
      width: 100%;
      height: 300px;
      margin-left: auto;
      margin-right: auto;
    }

    .swiper-slide {
      background-size: cover;
      background-position: center;
    }

    .mySwiper2 {
      height: 80%;
      width: 100%;
    }

    .mySwiper {
      height: 20%;
      box-sizing: border-box;
      padding: 10px 0;
    }

    .mySwiper .swiper-slide {
      width: 25%;
      height: 100%;
      opacity: 0.4;
    }

    .mySwiper .swiper-slide-thumb-active {
      opacity: 1;
    }

    .swiper-slide img {
      display: block;
      width: 100%;
      height: 100%;
      object-fit: cover;
    }
</style>

<!--begin::Content wrapper-->
<div class="d-flex flex-column flex-column-fluid">

    <!--begin::Toolbar-->
    <div class="app-toolbar py-3 py-lg-6 ">

        <!--begin::Toolbar container-->
        <div id="kt_app_toolbar_container" class="app-container  container-xxl d-flex flex-stack ">



            <!--begin::Page title-->
            <div class="page-title d-flex flex-column justify-content-center flex-wrap me-3 ">
                <!--begin::Title-->
                <h1 class="page-heading d-flex text-dark fw-bold fs-3 flex-column justify-content-center my-0">作品詳細を見る</h1>
                <!--end::Title-->
            </div>
            <!--end::Page title-->
            <!--begin::Actions-->
            <div class="d-flex align-items-center gap-2 gap-lg-3">
                <!--begin::Primary button-->
                <a href="{{ route('myItem.edit', ['myItem' => $myItem->id]) }}" class="btn btn-sm fw-bold btn-primary">戻る</a>
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
            <!--begin::Post card-->
            <div class="card">
                <!--begin::Body-->
                <div class="card-body p-lg-20 pb-lg-0">
                    <!--begin::Layout-->
                    <div class="d-flex flex-column flex-xl-row">
                        <!--begin::Content-->
                        <div class="flex-lg-row-fluid me-xl-15">
                            <!--begin::Post content-->
                            <div class="mb-17">
                                <!--begin::Wrapper-->
                                <div class="mb-8">
                                    <!--begin::Info-->
                                    <div class="d-flex flex-wrap mb-6">
                                        <!--begin::Item-->
                                        <div class="me-9 my-1">
                                            <!--begin::Icon-->
                                            <i
                                                class="ki-duotone ki-element-11 text-primary fs-2 me-1"><span
                                                    class="path1"></span><span
                                                    class="path2"></span><span
                                                    class="path3"></span><span
                                                    class="path4"></span></i> <!--end::Icon-->

                                            <!--begin::Label-->
                                            <span class="fw-bold text-gray-400">{{ $myItem->created_at->format('Y-m-d') }}</span>
                                            <!--end::Label-->
                                        </div>
                                        <!--end::Item-->

                                        <!--begin::Item-->
                                        <div class="me-9 my-1">
                                            <!--begin::Icon-->
                                            <i
                                                class="ki-duotone ki-briefcase text-primary fs-2 me-1"><span
                                                    class="path1"></span><span
                                                    class="path2"></span></i> <!--end::Icon-->

                                            <!--begin::Label-->
                                            <span class="fw-bold text-gray-400">{{ $myItem->category->title }}</span>
                                            <!--begin::Label-->
                                        </div>
                                        <!--end::Item-->

                                        <!--begin::Item-->
                                        <div class="my-1">
                                            <!--begin::Icon-->
                                            <i
                                                class="ki-duotone ki-message-text-2 text-primary fs-2 me-1"><span
                                                    class="path1"></span><span
                                                    class="path2"></span><span
                                                    class="path3"></span></i> <!--end::Icon-->

                                            <!--begin::Label-->
                                            <span class="fw-bold text-gray-400">
                                                @php
                                                    $comment_row = DB::table('item_user')->where('item_id', $myItem->id)->where('comment', '!=', '')->get();
                                                    $comment_cnt = $comment_row->count();
                                                    echo $comment_cnt;
                                                @endphp
                                                 コメント
                                            </span>
                                            <!--end::Label-->
                                        </div>
                                        <!--end::Item-->
                                    </div>
                                    <!--end::Info-->

                                    <!--begin::Title-->
                                    <a href="javascript:;" class="text-dark text-hover-primary fs-2 fw-bold">
                                        {{ $myItem->title }}
                                    </a>
                                    <!--end::Title-->

                                    <!--begin::Container-->
                                    <div class="overlay mt-8 w-100">
                                        <div style="--swiper-navigation-color: #fff; --swiper-pagination-color: #fff" class="swiper mySwiper2 w-100">
                                            <div class="swiper-wrapper w-100">
                                                <div class="swiper-slide w-100">
                                                    <img class="w-100 rounded equal-height1" src="{{ asset($myItem->front_img) }}" />
                                                </div>
                                                <div class="swiper-slide">
                                                    <img class="w-100 rounded equal-height1" src="{{ asset($myItem->back_img) }}" />
                                                </div>
                                                <div class="swiper-slide">
                                                    <img class="w-100 rounded equal-height1" src="{{ asset($myItem->side_img) }}" />
                                                </div>
                                            </div>
                                            <div class="swiper-button-next"></div>
                                            <div class="swiper-button-prev"></div>
                                          </div>
                                          <div thumbsSlider="" class="swiper mySwiper w-100">
                                            <div class="swiper-wrapper d-flex justify-content-between w-100">
                                                <div class="swiper-slide m-0">
                                                    <img class="rounded equal-height2" src="{{ asset($myItem->front_img) }}" />
                                                </div>
                                                <div class="swiper-slide m-0">
                                                    <img class="rounded equal-height2" src="{{ asset($myItem->back_img) }}" />
                                                </div>
                                                <div class="swiper-slide m-0">
                                                    <img class="rounded equal-height2" src="{{ asset($myItem->side_img) }}" />
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!--end::Container-->
                                </div>
                                <!--end::Wrapper-->

                                <!--begin::Description-->
                                <div class="fs-5 fw-semibold text-gray-600">
                                    <!--begin::Text-->
                                    <p class="mb-8">{{ $myItem->description }}</p>
                                    <!--end::Text-->
                                </div>
                                <!--end::Description-->

                                <!--begin::Block-->
                                @foreach ($comment_users as $comment_user)
                                <div class="d-flex align-items-center border-1 border-dashed card-rounded p-5 p-lg-10 mb-14">
                                    <!--begin::Section-->
                                    <div class="text-center flex-shrink-0 me-7 me-lg-13">
                                        <!--begin::Avatar-->
                                        <div class="symbol symbol-70px symbol-circle mb-2">
                                            <img src="{{ asset($comment_user->avatar_url) }}" alt="" />
                                        </div>
                                        <!--end::Avatar-->

                                        <!--begin::Info-->
                                        <div class="mb-0">
                                            <a href="" class="text-gray-700 fw-bold text-hover-primary">{{ $comment_user->nickname }}</a>
                                        </div>
                                        <!--end::Info-->
                                    </div>
                                    <!--end::Section-->

                                    <!--begin::Text-->
                                    <div class="mb-0 fs-6">
                                        <div class="text-muted fw-semibold lh-lg mb-2">
                                            @php
                                                $comment_row = DB::table('item_user')->where('user_id', $comment_user->id)->where('item_id', $myItem->id)->where('comment', '!=', '')->first();
                                                $comment = $comment_row->comment;
                                                echo $comment;
                                            @endphp
                                        </div>
                                        <div class="fw-semibold link-primary">
                                            {{ $comment_row->created_at }}
                                        </div>
                                    </div>
                                    <!--end::Text-->
                                </div>

                                @endforeach
                                <!--end::Block-->
                            </div>
                            <!--end::Post content-->
                        </div>
                        <!--end::Content-->

                        <!--begin::Sidebar-->
                        <div class="flex-column flex-lg-row-auto w-100 w-xl-300px mb-10">
                            
                            <!--begin::Recent posts-->
                            <div class="m-0">
                                <h4 class="text-dark mb-7">最近登録した作品</h4>

                                <!--begin::Item-->
                                @foreach ($recently_items as $recently_item)
                                    <div class="d-flex align-items-center mb-7">
                                        <!--begin::Symbol-->

                                        <div class="symbol symbol-60px symbol-2by3 me-4">
                                            <div class="symbol-label" style="background-image: url({{ asset($recently_item->front_img) }})"></div>
                                        </div>
                                        <!--end::Symbol-->

                                        <!--begin::Title-->
                                        <div class="m-0">
                                            <a href="{{ url('/getDetail', ['userMana' => $recently_item->id]) }}" 
                                            class="text-dark fw-bold text-hover-primary fs-6">{{ $recently_item->title }}</a>

                                            <span class="text-gray-600 fw-semibold d-block pt-1 fs-7">{{ $recently_item->description }}</span>
                                        </div>
                                        <!--end::Title-->
                                    </div>
                                @endforeach
                                <!--end::Item-->
                            </div>
                            <!--end::Recent posts-->
                        </div>
                        <!--end::Sidebar-->
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

<script src="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.js"></script>

<script>
    var swiper = new Swiper(".mySwiper", {
      loop: true,
      spaceBetween: 10,
      slidesPerView: 4,
      freeMode: true,
      watchSlidesProgress: true,
    });
    var swiper2 = new Swiper(".mySwiper2", {
      loop: true,
      spaceBetween: 10,
      navigation: {
        nextEl: ".swiper-button-next",
        prevEl: ".swiper-button-prev",
      },
      thumbs: {
        swiper: swiper,
      },
    });

    var width1 = $('.equal-height1').width();
    $('.equal-height1').css('height', width1 + 'px');

    var width2 = $('.equal-height2').width();
    $('.equal-height2').css('height', width2 + 'px');
</script>
@endsection