@extends('layouts.app')

@section('content')
<link href="{{ asset('/metronic/assets/plugins/custom/datatables/datatables.bundle.css') }}" rel="stylesheet" type="text/css" />

<div class="d-flex flex-column flex-column-fluid py-10">

    <!--begin::Content-->
    <div class="docs-content d-flex flex-column flex-column-fluid" id="kt_docs_content">
        <!--begin::Container-->
        <div class="container d-flex flex-column flex-lg-row" id="kt_docs_content_container">
            <!--begin::Card-->
            <div class="card card-docs flex-row-fluid mb-2" id="kt_docs_content_card">
                <!--begin::Card Body-->
                <div class="card-body fs-6 py-15 px-10 py-lg-15 px-lg-15 text-gray-700">
                    
                    <!--begin::Section-->
                    <div class="py-5">

                        <!--begin::Heading-->
                        <h1 class="anchor fw-bold mb-5" id="horizontal-scroll" data-kt-scroll-offset="50">
                            ユーザー管理(決済機能状態)
                        </h1>
                        <!--end::Heading-->

                        <!--begin::Block-->
                        <div class="py-5">
                            <table id="kt_datatable_horizontal_scroll" class="table table-striped gy-5 gs-7">
                                <thead>
                                    <tr class="fw-semibold fs-6 text-gray-800">
                                        <th class="min-w-50px">番号</th>
                                        <th class="min-w-100px">名前</th>
                                        <th class="min-w-150px">ペンネーム</th>
                                        <th class="min-w-200px">メールアドレス</th>
                                        <th class="min-w-150px">電話番号</th>
                                        <th class="min-w-100px">郵便番号</th>
                                        <th class="min-w-100px">都道府県</th>
                                        <th class="min-w-150px">住所（番地まで）</th>
                                        <th class="min-w-150px">住所（ビル名等）</th>
                                        <th class="min-w-250px">ツイッター</th>
                                        <th class="min-w-250px">インスタ</th>
                                        <th class="min-w-250px">TikTok</th>
                                        <th class="min-w-150px">決済機能状態</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                        $i = 1;
                                    @endphp
                                    @foreach($common_users as $common_user)
                                    <tr>
                                        <td>{{ $i ++ }}</td>
                                        <td>{{ $common_user->firstname }} {{ $common_user->lastname }}</td>
                                        <td>{{ $common_user->nickname }}</td>
                                        <td>{{ $common_user->email }}</td>
                                        <td>{{ $common_user->phone_number }}</td>
                                        <td>{{ $common_user->postal_code }}</td>
                                        <td>{{ $common_user->prefectures }}</td>
                                        <td>{{ $common_user->house_number }}</td>
                                        <td>{{ $common_user->building_name }}</td>
                                        <td>
                                            <a href="{{ $common_user->twitter }}" target="_blank">{{ $common_user->twitter }}</a>
                                        </td>
                                        <td>
                                            <a href="{{ $common_user->instagram }}" target="_blank">{{ $common_user->instagram }}</a>
                                        </td>
                                        <td>
                                            <a href="{{ $common_user->tiktok }}" target="_blank">{{ $common_user->tiktok }}</a>
                                        </td>
                                        <td>
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault" onchange="changePaypemtState({{ $common_user->id }})" />
                                            </div>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <!--end::Block-->
                    </div>
                    <!--end::Section-->
                </div>
                <!--end::Card Body-->
            </div>
            <!--end::Card-->
        </div>
        <!--end::Container-->
    </div>
    <!--end::Content-->
</div>

<script src="{{ asset('/assets/js/jquery.min.js') }}"></script>
<script src="{{ asset('/metronic/assets/plugins/custom/datatables/datatables.bundle.js') }}"></script>
<script src="{{ asset('/metronic/assets/js/widgets.bundle.js') }}"></script>
<script src="{{ asset('/metronic/assets/js/custom/widgets.js') }}"></script>
<script src="{{ asset('/metronic/assets/js/custom/apps/chat/chat.js') }}"></script>
<script src="{{ asset('/metronic/assets/js/custom/utilities/modals/upgrade-plan.js') }}"></script>
<script src="{{ asset('/metronic/assets/js/custom/utilities/modals/create-app.js') }}"></script>
<script src="{{ asset('/metronic/assets/js/custom/utilities/modals/users-search.js') }}"></script>
<script>

    $("#kt_datatable_horizontal_scroll").DataTable({
        "scrollX": true
    });

    function changePaypemtState(id) {
        $.post('/changePaypemtState', {
            '_token': $('meta[name="csrf-token"]').attr('content'),
            "id": id,
        }, function(data){
            alert(data);
        });
    }
</script>
@endsection