@extends('layouts.app')

@section('content')
@php
use App\Models\Item;
use App\Models\User;

$i = 1;
@endphp

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
                {{-- <h1 class="page-heading d-flex text-dark fw-bold fs-3 flex-column justify-content-center my-0">要求件数：{{ $request_matches->count() }}件</h1> --}}
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
            <!--begin::Inbox App - Messages -->
            <div class="d-flex flex-column flex-lg-row">
                <!--begin::Content-->
                <div class="flex-lg-row-fluid">
                    <!--begin::Card-->
                    <div class="card">
                        <div class="table-responsive p-6">

                            <ul class="nav nav-tabs nav-line-tabs mb-5 fs-6">
                                <li class="nav-item">
                                    <a class="nav-link active" data-bs-toggle="tab" href="#kt_tab_pane_1">全て見る</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" data-bs-toggle="tab" href="#kt_tab_pane_2">送信一覧</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" data-bs-toggle="tab" href="#kt_tab_pane_3">受信一覧</a>
                                </li>
                            </ul>

                            <div class="tab-content" id="myTabContent">
                                <div class="tab-pane fade show active" id="kt_tab_pane_1" role="tabpanel">
                                    <!--begin::Table-->
                                    <table id="kt_project_users_table" class="table table-row-bordered table-row-dashed gy-4 align-middle fw-bold">
                                        <thead class="fs-7 text-gray-400 text-uppercase">
                                            <tr>
                                                <th class="min-w-50px">番号</th>
                                                <th class="min-w-250px">リクエスト作品</th>
                                                <th class="min-w-150px">交換作品</th>
                                                <th class="min-w-90px">希望も</th>
                                                <th class="min-w-90px">リクエスト日</th>
                                                <th class="min-w-90px">合意状態</th>
                                                <th class="min-w-90px">合意</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($request_all_matches as $request_all_match)
                                            @php
                                                $myItem = Item::where('id', $request_all_match->first_item)->first();
                                                $requestItem = Item::where('id', $request_all_match->second_item)->first();
                                            @endphp
                                            <tr>
                                                <td>{{ $i ++ }}</td>
                                                <td>
                                                    <!--begin::User-->
                                                    <div class="d-flex align-items-center">
                                                        <!--begin::Wrapper-->
                                                        <div class="me-5 position-relative">
                                                            <!--begin::Avatar-->
                                                            <div class="symbol symbol-70px">
                                                                <img alt="Pic" src="{{ $myItem->front_img }}" />
                                                            </div>
                                                            <!--end::Avatar-->

                                                        </div>
                                                        <!--end::Wrapper-->

                                                        <!--begin::Info-->
                                                        <div class="d-flex flex-column justify-content-center">
                                                            <a href="{{ route('myItem_inbox.show', ['myItem_inbox' => $myItem->id]) }}" class="mb-1 text-gray-800 text-hover-primary">{{ $myItem->title }}</a>
                                                            <div class="fw-semibold fs-6 text-gray-400">{{ $myItem->description }}</div>
                                                        </div>
                                                        <!--end::Info-->
                                                    </div>
                                                    <!--end::User-->
                                                </td>
                                                <td>
                                                    <!--begin::User-->
                                                    <div class="d-flex align-items-center">
                                                        <!--begin::Wrapper-->
                                                        <div class="me-5 position-relative">
                                                            <!--begin::Avatar-->
                                                            <div class="symbol symbol-70px">
                                                                <img alt="Pic" src="{{ $requestItem->front_img }}" />
                                                            </div>
                                                            <!--end::Avatar-->

                                                        </div>
                                                        <!--end::Wrapper-->

                                                        <!--begin::Info-->
                                                        <div class="d-flex flex-column justify-content-center">


                                                            <div class="fw-semibold fs-6 text-gray-400">{{
                                                                $requestItem->description }}</div>
                                                        </div>
                                                        <!--end::Info-->
                                                    </div>
                                                    <!--end::User-->
                                                </td>
                                                <td>{{$request_all_match->grade}}</td>
                                                <td>{{$request_all_match->send_date}}</td>
                                                <td>
                                                    <select name="receive_grade" id="receive_grade_{{ $i }}"
                                                        class="form-select" data-control="select2"
                                                        data-placeholder="Select an option">
                                                        <option value="0" {{ $request_all_match->receive_grade != null ?
                                                            'selected': ''}}>0(拒否)</option>
                                                        <option value="1" {{ $request_all_match->receive_grade != null ?
                                                            'selected': ''}} >1</option>
                                                        <option value="2" {{ $request_all_match->receive_grade != null ?
                                                            'selected': ''}} >2</option>
                                                        <option value="3" {{ $request_all_match->receive_grade != null ?
                                                            'selected': ''}} >3</option>
                                                        <option value="4" {{ $request_all_match->receive_grade != null ?
                                                            'selected': ''}} >4</option>
                                                        <option value="5" {{ $request_all_match->receive_grade != null ?
                                                            'selected': ''}} >5(同意)</option>
                                                    </select>
                                                </td>
                                                <td>
                                                    <button
                                                        class="btn btn-primary {{ $request_all_match->receive_grade != null ? 'disabled': ''}}"
                                                        onclick="reply_request({{ $myItem->id }}, {{ $requestItem->id }}, {{ $i }})">確
                                                        認</button>
                                                </td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                    <!--end::Table-->
                                </div>
                                <div class="tab-pane fade" id="kt_tab_pane_2" role="tabpanel">
                                    2
                                </div>
                                <div class="tab-pane fade" id="kt_tab_pane_3" role="tabpanel">
                                    <!--begin::Table-->
                                    <table id="kt_project_users_table" class="table table-row-bordered table-row-dashed gy-4 align-middle fw-bold">
                                        <thead class="fs-7 text-gray-400 text-uppercase">
                                            <tr>
                                                <th class="min-w-50px">番号</th>
                                                <th class="min-w-250px">リクエスト作品</th>
                                                <th class="min-w-150px">交換作品</th>
                                                <th class="min-w-90px">希望も</th>
                                                <th class="min-w-90px">リクエスト日</th>
                                                <th class="min-w-90px">合意状態</th>
                                                <th class="min-w-90px">合意</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($request_inbox_matches as $request_match)
                                            @php
                                            $myItem = Item::where('id', $request_match->first_item)->first();
                                            $requestItem = Item::where('id', $request_match->second_item)->first();
                                            @endphp

                                            <tr>
                                                <td>{{ $i ++ }}</td>

                                                <td>
                                                    <!--begin::User-->
                                                    <div class="d-flex align-items-center">
                                                        <!--begin::Wrapper-->
                                                        <div class="me-5 position-relative">
                                                            <!--begin::Avatar-->
                                                            <div class="symbol symbol-70px">
                                                                <img alt="Pic" src="{{ $myItem->front_img }}" />
                                                            </div>
                                                            <!--end::Avatar-->

                                                        </div>
                                                        <!--end::Wrapper-->

                                                        <!--begin::Info-->
                                                        <div class="d-flex flex-column justify-content-center">
                                                            <a href="{{ route('myItem_inbox.show', ['myItem_inbox' => $myItem->id]) }}"
                                                                class="mb-1 text-gray-800 text-hover-primary">{{
                                                                $myItem->title }}</a>

                                                            <div class="fw-semibold fs-6 text-gray-400">{{
                                                                $myItem->description }}</div>
                                                        </div>
                                                        <!--end::Info-->
                                                    </div>
                                                    <!--end::User-->
                                                </td>
                                                <td>
                                                    <!--begin::User-->
                                                    <div class="d-flex align-items-center">
                                                        <!--begin::Wrapper-->
                                                        <div class="me-5 position-relative">
                                                            <!--begin::Avatar-->
                                                            <div class="symbol symbol-70px">
                                                                <img alt="Pic" src="{{ $requestItem->front_img }}" />
                                                            </div>
                                                            <!--end::Avatar-->

                                                        </div>
                                                        <!--end::Wrapper-->

                                                        <!--begin::Info-->
                                                        <div class="d-flex flex-column justify-content-center">


                                                            <div class="fw-semibold fs-6 text-gray-400">{{
                                                                $requestItem->description }}</div>
                                                        </div>
                                                        <!--end::Info-->
                                                    </div>
                                                    <!--end::User-->
                                                </td>
                                                <td>{{$request_match->grade}}</td>
                                                <td>{{$request_match->send_date}}</td>
                                                <td>
                                                    <select name="receive_grade" id="receive_grade_{{ $i }}"
                                                        class="form-select" data-control="select2"
                                                        data-placeholder="Select an option">
                                                        <option value="0" {{ $request_match->receive_grade != null ?
                                                            'selected': ''}}>0(拒否)</option>
                                                        <option value="1" {{ $request_match->receive_grade != null ?
                                                            'selected': ''}} >1</option>
                                                        <option value="2" {{ $request_match->receive_grade != null ?
                                                            'selected': ''}} >2</option>
                                                        <option value="3" {{ $request_match->receive_grade != null ?
                                                            'selected': ''}} >3</option>
                                                        <option value="4" {{ $request_match->receive_grade != null ?
                                                            'selected': ''}} >4</option>
                                                        <option value="5" {{ $request_match->receive_grade != null ?
                                                            'selected': ''}} >5(同意)</option>
                                                    </select>
                                                </td>
                                                <td>
                                                    <button
                                                        class="btn btn-primary {{ $request_match->receive_grade != null ? 'disabled': ''}}"
                                                        onclick="reply_request({{ $myItem->id }}, {{ $requestItem->id }}, {{ $i }})">確
                                                        認</button>
                                                </td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                    <!--end::Table-->
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--end::Card-->

                </div>
                <!--end::Content-->
            </div>
            <!--end::Inbox App - Messages -->




        </div>
        <!--end::Content container-->
    </div>
    <!--end::Content-->
</div>

<script src="{{ asset('/metronic/assets/plugins/custom/datatables/datatables.bundle.js') }}"></script>
<script src="{{ asset('/metronic/assets/js/custom/apps/projects/users/users.js') }}"></script>

<script src="{{ asset('/metronic/assets/js/widgets.bundle.js') }}"></script>
<script src="{{ asset('/metronic/assets/js/custom/widgets.js') }}"></script>
<script src="{{ asset('/metronic/assets/js/custom/apps/chat/chat.js') }}"></script>
<script src="{{ asset('/metronic/assets/js/custom/utilities/modals/upgrade-plan.js') }}"></script>
<script src="{{ asset('/metronic/assets/js/custom/utilities/modals/create-app.js') }}"></script>
<script src="{{ asset('/metronic/assets/js/custom/utilities/modals/users-search.js') }}"></script>

<script>
    function reply_request(first_item, second_item, i) {

        if (!window.confirm("よろしいですか？")) return;

        var receive_grade = $('#receive_grade_' + i).val();

        $.post("/requestMatch/1", {
            _method: 'PUT',
            _token: $('meta[name="csrf-token"]').attr('content'),
            'first_item': first_item,
            'second_item': second_item,
            'receive_grade': receive_grade,
        }, function(data){
            if(data == "OK") {
                toastr.success('正常にチェックされました');
            } else {
                toastr.warning('あなたはすでにチェックしました。');
            }
        });
    }
</script>
@endsection