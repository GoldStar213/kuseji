<!--begin::Table-->
@php
    $i = 1;
@endphp
<table id="kt_project_users_table" class="table table-row-bordered table-row-dashed gy-4 align-middle fw-bold">
    <thead class="fs-7 text-gray-400 text-uppercase">
        <tr>
            <th class="min-w-50px">番号</th>
            <th class="min-w-150px">タイトル</th>
            <th class="min-w-90px">開始日</th>
            <th class="min-w-90px">終了日</th>
            <th class="min-w-90px">編集</th>
            <th class="min-w-90px">削除</th>
        </tr>
    </thead>
    <tbody class="fs-6">
        @foreach ($matchings as $matching)
            <tr>
                <td>{{ $i ++ }}</td>
                <td>{{ $matching->title }}</td>
                <td>{{ $matching->start_date }}</td>
                <td>{{ $matching->end_date }}</td>
                <td>
                    <a href="{{ route('matching.edit', ['matching' => $matching->id]) }}" class="btn btn-primary">Edit</a>
                </td>
                <td>
                    <form action="{{ route('matching.destroy', ['matching' => $matching->id]) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
<!--end::Table-->

<script src="{{ asset('/metronic/assets/plugins/custom/datatables/datatables.bundle.js') }}"></script>
<script src="{{ asset('/metronic/assets/js/custom/apps/projects/users/users.js') }}"></script>