<!--begin::Toolbar-->
@php
    use App\Models\Item;
    use App\Models\User;
@endphp
<div class="d-flex flex-wrap flex-stack pb-7">
    <!--begin::Title-->
    <div class="d-flex flex-wrap align-items-center my-1">
        <h3 class="fw-bold me-5 my-1">検索結果：{{ $items->count() }}件</h3>
    </div>
    <!--end::Title-->
</div>
<!--end::Toolbar-->

<!--begin::Tab Content-->
<div class="tab-content">
    <!--begin::Tab pane-->
    <div class="tab-pane fade show active">
        <!--begin::Card-->
        <div class="card card-flush ">
            <!--begin::Card body-->
            <div class="card-body pt-0">
                <!--begin::Table container-->
                <div class="table-responsive">
                    <!--begin::Table-->
                    <table id="kt_project_users_table" class="table table-row-bordered table-row-dashed gy-4 align-middle fw-bold">
                        <thead class="fs-7 text-gray-400 text-uppercase">
                            <tr>
                                <th class="min-w-200px">作品情報</th>
                                <th class="min-w-100px">所有者</th>
                                <th class="min-w-150px">登録日</th>
                                <th class="min-w-90px">閲覧数</th>
                                <th class="min-w-90px">いいね</th>
                                <th class="min-w-90px">コメント</th>
                                <th class="min-w-90px">リクエスト</th>
                            </tr>
                        </thead>
                        <tbody class="fs-6">
                            @foreach ($items as $item)
                                <tr>
                                    <td>
                                        <!--begin::User-->
                                        <div class="d-flex align-items-center">
                                            <!--begin::Wrapper-->
                                            <div class="me-5 position-relative">
                                                <!--begin::Avatar-->
                                                <a class="symbol symbol-70px" href="{{ route('item.show', ['item' => $item->id]) }}">
                                                    <img alt="Pic" src="{{ asset($item->front_img) }}" />
                                                </a>
                                                <!--end::Avatar-->

                                            </div>
                                            <!--end::Wrapper-->

                                            <!--begin::Info-->
                                            <div class="d-flex flex-column justify-content-center">
                                                <a href="{{ route('item.show', ['item' => $item->id]) }}" class="mb-1 text-gray-800 text-hover-primary">{{ $item->title }}</a>

                                                <div class="fw-semibold fs-6 text-gray-400">{{ $item->description }}</div>
                                            </div>
                                            <!--end::Info-->
                                        </div>
                                        <!--end::User-->
                                    </td>
                                    <td>
                                        @php
                                            $item_id = $item->id;
                                            $user_id = Item::where('id', $item_id)->first()->user_id;
                                            $nickname = User::where('id', $user_id)->first()->nickname;
                                            echo $nickname;
                                        @endphp
                                    </td>
                                    <td>{{ $item->created_at->format('Y-m-d') }}</td>
                                    <td>{{ $item->view_cnt }}</td>
                                    <td>
                                        @php
                                            $item_id = $item->id;
                                            $like_cnt = DB::table('item_user')->where('item_id', $item_id)->where('like_state', 1)->count();
                                            echo $like_cnt;
                                        @endphp
                                    </td>
                                    <td>
                                        @php
                                            $item_id = $item->id;
                                            $comment_cnt = DB::table('item_user')->where('item_id', $item_id)->whereNotNull('comment')->count();
                                            echo $comment_cnt;
                                        @endphp
                                    </td>
                                    <td>
                                        @php
                                            $item_id = $item->id;
                                            $request_cnt = DB::table('request_match')->where('second_item', $item_id)->count();
                                            echo $request_cnt;
                                        @endphp
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <!--end::Table-->
                </div>
                <!--end::Table container-->
            </div>
            <!--end::Card body-->
        </div>
        <!--end::Card-->
    </div>
    <!--end::Tab pane-->
</div>
<!--end::Tab Content-->

<script src="{{ asset('/metronic/assets/plugins/custom/datatables/datatables.bundle.js') }}"></script>
<script src="{{ asset('/metronic/assets/js/custom/apps/projects/users/users.js') }}"></script>