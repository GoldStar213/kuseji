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
                        ユーザーの詳細を表示する
                    </h1>
                </div>
            </div>
            <!--end::Toolbar container-->
        </div>
        <!--end::Toolbar-->

        <!--begin::Content-->
        <div id="kt_app_content" class="app-content  flex-column-fluid ">


            <!--begin::Content container-->
            <div id="kt_app_content_container" class="app-container  container-xxl ">
                <!--begin::Layout-->
                <div class="d-flex flex-column flex-lg-row">
                    <!--begin::Sidebar-->
                    <div class="flex-column flex-lg-row-auto w-lg-250px w-xl-350px mb-10">

                        <!--begin::Card-->
                        <div class="card mb-5 mb-xl-8">
                            <!--begin::Card body-->
                            <div class="card-body">
                                <!--begin::Summary-->


                                <!--begin::User Info-->
                                <div class="d-flex flex-center flex-column py-5">
                                    <!--begin::Avatar-->
                                    <div class="symbol symbol-100px symbol-circle mb-7">
                                        <img src={{ $usermana->avatar_url }} alt="image">
                                    </div>
                                    <!--end::Avatar-->

                                    <!--begin::Name-->
                                    <a href="#" class="fs-3 text-gray-800 text-hover-primary fw-bold mb-3">
                                        {{ $usermana->firstname }} {{ $usermana->lastname }} </a>
                                    <!--end::Name-->

                                  
                                    <!--end::Info heading-->
                                   
                                    <!--end::Info-->
                                </div>


                                <div class="separator"></div>

                                <!--begin::Details content-->
                                <div id="kt_user_view_details" class="collapse show">
                                    <div class="pb-5 fs-6">
                                        <!--begin::Details item-->
                                        <div class="fw-bold mt-5">メール</div>
                                        <div class="text-gray-600"><a href="#"
                                                class="text-gray-600 text-hover-primary">{{ $usermana->email }}</a></div>
                                        <!--begin::Details item-->
                                        <!--begin::Details item-->
                                        <div class="fw-bold mt-5">住所</div>
                                        <div class="text-gray-600">{{ $usermana->building_name }}
                                            <br>{{ $usermana->house_number }}<br>{{ $usermana->prefectures }}
                                        </div>
                                        <!--begin::Details item-->
                                        <!--begin::Details item-->
                                        <div class="fw-bold mt-5">電話番号</div>
                                        <div class="text-gray-600">{{ $usermana->phone_number }}</div>
                                        <!--begin::Details item-->
                                        <!--begin::Details item-->
                                        <div class="fw-bold mt-5">前回のログイン</div>
                                        <div class="text-gray-600">{{ $usermana->created_at }}</div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>




                    <div class="flex-lg-row-fluid ms-lg-15">

                        <div class="flex-lg-row-fluid" data-select2-id="select2-data-131-f8z0" id="dataList">
                            <!--begin::Toolbar-->
                            <div class="d-flex flex-wrap flex-stack pb-7">
                                <!--begin::Title-->
                                <div class="d-flex flex-wrap align-items-center my-1">
                                    <h3 class="fw-bold me-5 my-1">所有作品：{{ $myItems->count() }}件</h3>
                                </div>
                                <!--end::Title-->
                            </div>
                            <!--end::Toolbar-->

                            <div class="tab-content">
                                <div class="tab-pane fade show active">
                                    <div class="card card-flush ">
                                        <div class="card-body pt-0">
                                            <!--begin::Table container-->
                                            <table id="kt_project_users_table"
                                                            class="table table-row-bordered table-row-dashed gy-4 align-middle fw-bold dataTable no-footer">
                                                            <thead class="fs-7 text-gray-400 text-uppercase">
                                                                <tr>
                                                                    <th class="min-w-250px sorting" tabindex="0"
                                                                        aria-controls="kt_project_users_table"
                                                                        rowspan="1" colspan="1"
                                                                        aria-label="作品情報: activate to sort column ascending"
                                                                        style="width: 300.641px;">作品情報</th>
                                                                    <th class="min-w-150px sorting" tabindex="0"
                                                                        aria-controls="kt_project_users_table"
                                                                        rowspan="1" colspan="1"
                                                                        aria-label="登録日: activate to sort column ascending"
                                                                        style="width: 150px;">登録日</th>
                                                                    <th class="min-w-90px sorting" tabindex="0"
                                                                        aria-controls="kt_project_users_table"
                                                                        rowspan="1" colspan="1"
                                                                        aria-label="閲覧数: activate to sort column ascending"
                                                                        style="width: 90px;">閲覧数</th>
                                                                    <th class="min-w-90px sorting" tabindex="0"
                                                                        aria-controls="kt_project_users_table"
                                                                        rowspan="1" colspan="1"
                                                                        aria-label="いいね: activate to sort column ascending"
                                                                        style="width: 90px;">いいね</th>
                                                                    <th class="min-w-90px sorting_disabled" rowspan="1"
                                                                        colspan="1" aria-label="コメント"
                                                                        style="width: 90px;">コメント</th>
                                                                    <th class="min-w-90px sorting" tabindex="0"
                                                                        aria-controls="kt_project_users_table"
                                                                        rowspan="1" colspan="1"
                                                                        aria-label="リクエスト: activate to sort column ascending"
                                                                        style="width: 90px;">リクエスト</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody class="fs-6">
                                                                @foreach ($myItems as $myItem)
                                                                    <tr class="odd">
                                                                        <td>
                                                                            <!--begin::User-->
                                                                            <div class="d-flex align-items-center">
                                                                                <!--begin::Wrapper-->
                                                                                <div class="me-5 position-relative">
                                                                                    <!--begin::Avatar-->
                                                                                    <div class="symbol symbol-70px">
                                                                                        <img alt="Pic"
                                                                                            src="{{ asset($myItem->front_img) }}">
                                                                                    </div>
                                                                                    <!--end::Avatar-->

                                                                                </div>
                                                                                <!--end::Wrapper-->

                                                                                <!--begin::Info-->
                                                                                <div
                                                                                    class="d-flex flex-column justify-content-center">
                                                                                    <div
                                                                                        class="d-flex flex-column justify-content-center">
                                                                                        <a href="{{ url('/getDetail', ['userMana' => $myItem->id])}}"
                                                                                            class="mb-1 text-gray-800 text-hover-primary">{{ $myItem->title }}</a>

                                                                                        <div
                                                                                            class="fw-semibold fs-6 text-gray-400">
                                                                                            {{ $myItem->description }}
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                                <!--end::Info-->
                                                                            </div>
                                                                            <!--end::User-->
                                                                        </td>
                                                                        <td>{{ $myItem->created_at->format('Y-m-d') }}</td>
                                                                        <td>{{ $myItem->view_cnt }}</td>
                                                                        <td>
                                                                            @php
                                                                                $item_id = $myItem->id;
                                                                                $like_cnt = DB::table('item_user')
                                                                                    ->where('item_id', $item_id)
                                                                                    ->where('like_state', 1)
                                                                                    ->count();
                                                                                echo $like_cnt;
                                                                            @endphp
                                                                        </td>
                                                                        <td>
                                                                            @php
                                                                                $item_id = $myItem->id;
                                                                                $comment_cnt = DB::table('item_user')
                                                                                    ->where('item_id', $item_id)
                                                                                    ->whereNotNull('comment')
                                                                                    ->count();
                                                                                echo $comment_cnt;
                                                                            @endphp
                                                                        </td>
                                                                        <td>
                                                                            @php
                                                                                $item_id = $myItem->id;
                                                                                $request_cnt = DB::table('request_match')
                                                                                    ->where('second_item', $item_id)
                                                                                    ->count();
                                                                                echo $request_cnt;
                                                                            @endphp
                                                                        </td>
                                                                    </tr>
                                                                @endforeach
                                                            </tbody>
                                                        </table>
                                            <!--end::Table container-->
                                        </div>
                                        <!--end::Card body-->
                                    </div>
                                    <!--end::Card-->
                                </div>
                                <!--end::Tab pane-->
                            </div>
                            <!--end::Tab Content-->

                            <script src="http://localhost:8000/metronic/assets/plugins/custom/datatables/datatables.bundle.js"></script>
                            <script src="http://localhost:8000/metronic/assets/js/custom/apps/projects/users/users.js"></script>
                        </div>
                    </div>
                </div>


            </div>
            <!--end::Content container-->
        </div>
        <!--end::Content-->
    </div>
@endsection
