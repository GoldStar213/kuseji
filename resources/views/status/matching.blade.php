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
                <h1 class="page-heading d-flex text-dark fw-bold fs-3 flex-column justify-content-center my-0">マッチング状況</h1>
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
            <!--begin::Tables Widget 10-->
            <div class="card mb-5 mb-xl-8">
                <!--begin::Header-->
                <div class="card-header border-0 pt-5">
                    <h3 class="card-title align-items-start flex-column">
                        <span class="card-label fw-bold fs-3 mb-1">マッチング成立数 : {{ $request_matches->count() }}</span>
                    </h3>
                    <div class="card-toolbar">
                        @if(Auth::user()->id == 1)
                        <a href="javascript:;downloadCSV()" class="btn btn-sm btn-light-primary">
                            <i class="ki-duotone ki-cloud-download">
                                <i class="path1"></i>
                                <i class="path2"></i>
                            </i> csvファイルダウンロード
                        </a>
                        @endif
                    </div>
                </div>
                <!--end::Header-->

                <!--begin::Body-->
                <div class="card-body pt-3">
                    <!--begin::Table container-->
                    <div class="table-responsive">
                        <!--begin::Table-->
                        <table class="table table-row-dashed table-row-gray-300 align-middle gs-0 gy-4">
                            <!--begin::Table body-->
                            <thead>
                                <tr class="fw-bold text-muted bg-light">
                                    <th class="ps-4 rounded-start">番号</th>
                                    <th class="">リクエスト作品</th>
                                    <th class="">作品所有者</th>
                                    <th class="">リクエスト転送時間</th>
                                    <th class="">マッチング希望</th>
                                    <th class="">応答作品</th>
                                    <th class="">作品所有者</th>
                                    <th class="">応答時間</th>
                                    <th class="">マッチング希望</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $i = 1;
                                @endphp
                                @foreach($request_matches as $request_match)
                                @php
                                    $first_item = Item::find($request_match->first_item);
                                    $first_user = User::find($first_item->user_id);
                                    $second_item = Item::find($request_match->second_item);
                                    $second_user = User::find($second_item->user_id);
                                @endphp
                                <tr>
                                    <td class="text-muted fw-semibold text-center col-auto">{{ $i ++ }}</td>
                                    <td>
                                        <div class="d-flex align-items-center">
                                            <div class="symbol symbol-100px me-5">
                                                <img alt="Pic" src="{{ asset($first_item->front_img) }}">
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="d-flex align-items-center">
                                            <!--begin::Avatar-->
                                            <div class="symbol symbol-45px me-5">
                                                <img alt="Pic" src="{{ $first_user->avatar_url }}">
                                            </div>
                                            <!--end::Avatar-->

                                            <!--begin::Name-->
                                            <div class="d-flex justify-content-start flex-column">
                                                <label class="text-dark fw-bold text-hover-primary mb-1 fs-6">{{ $first_user->nickname }}</label>
                                            </div>
                                            <!--end::Name-->
                                        </div>
                                    </td>
                                    <td class="text-muted fw-semibold text-start col-auto">{{ $request_match->send_date }}</td>
                                    <td class="text-muted fw-semibold text-start col-auto">{{ $request_match->grade }}</td>
                                    <td>
                                        <div class="d-flex align-items-center">
                                            <div class="symbol symbol-100px me-5">
                                                <img alt="Pic" src="{{ asset($second_item->front_img) }}">
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="d-flex align-items-center">
                                            <!--begin::Avatar-->
                                            <div class="symbol symbol-45px me-5">
                                                <img alt="Pic" src="{{ $second_user->avatar_url }}">
                                            </div>
                                            <!--end::Avatar-->

                                            <!--begin::Name-->
                                            <div class="d-flex justify-content-start flex-column">
                                                <label class="text-dark fw-bold text-hover-primary mb-1 fs-6">{{ $second_user->nickname }}</label>
                                            </div>
                                            <!--end::Name-->
                                        </div>
                                    </td>
                                    <td class="text-muted fw-semibold text-start col-auto">{{ $request_match->receive_date }}</td>
                                    <td class="text-muted fw-semibold text-center col-auto">{{ $request_match->receive_grade }}</td>
                                </tr>
                                @endforeach
                            </tbody>
                            <!--end::Table body-->
                        </table>
                        <!--end::Table-->
                    </div>
                    <!--end::Table container-->
                </div>
                <!--begin::Body-->
            </div>
            <!--end::Tables Widget 10-->
        </div>
        <!--end::Content container-->
    </div>
    <!--end::Content-->
</div>

<script>
    function downloadCSV() {
        $.get("{{ route('matching_csv') }}", function(data){
            location.href = data;
        });
    }
</script>
@endsection