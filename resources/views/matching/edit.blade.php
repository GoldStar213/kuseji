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
                <h1 class="page-heading d-flex text-dark fw-bold fs-3 flex-column justify-content-center my-0">マッチング編集
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
            <!--begin::Card-->
            <div class="card ">
                @if(session('success'))
                    <!--begin::Alert-->
                    <div class="alert alert-primary d-flex align-items-center p-5 mb-5">
                        <!--begin::Icon-->
                        <i class="ki-duotone ki-shield-tick fs-2hx text-success me-4"><span class="path1"></span><span class="path2"></span></i>
                        <!--end::Icon-->

                        <!--begin::Wrapper-->
                        <div class="d-flex flex-column">
                            <!--begin::Content-->
                            <span>{{ session('success') }}</span>
                            <!--end::Content-->
                        </div>
                        <!--end::Wrapper-->
                    </div>
                    <!--end::Alert-->
                @endif
                <!--begin::Card body-->
                <form class="card-body p-0 pt-10" action="{{ route('matching.update', ['matching' => $matching->id]) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="row px-5">
                        <div class="col-lg-6">
                            <div class="p-5">
                                <label for="exampleFormControlInput1" class="form-label">タイトル</label>
                                <input type="text" name="title" class="form-control form-control-solid" placeholder="" value="{{ $matching->title }}" />
                            </div>
                        </div>
                        <div class="col-lg-6">
                            
                        </div>
                    </div>
                    <div class="row px-5">
                        <div class="col-lg-6">
                            <div class="p-5">
                                <label for="exampleFormControlInput1" class="form-label">開始日</label>
                                <input type="date" name="start_date" class="form-control form-control-solid" placeholder="" value="{{ DateTime::createFromFormat('Y-m-d H:i:s', $matching->start_date)->format('Y-m-d') }}" />
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="p-5">
                                <label for="exampleFormControlInput1" class="form-label">終了日</label>
                                <input type="date" name="end_date" class="form-control form-control-solid" placeholder="" value="{{ DateTime::createFromFormat('Y-m-d H:i:s', $matching->end_date)->format('Y-m-d') }}" />
                            </div>
                        </div>
                    </div>
                    <div class="row px-5">
                        <div class="col-12 d-flex justify-content-end p-5">
                            <button type="submit" class="mx-4 btn btn-primary">保存する</button>
                        </div>
                    </div>
                </form>
                <!--end::Card body-->
            </div>
            <!--end::Card-->

        </div>
        <!--end::Content container-->
    </div>
    <!--end::Content-->
</div>
@endsection