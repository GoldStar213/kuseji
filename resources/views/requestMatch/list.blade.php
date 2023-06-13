@foreach ($items as $item)
    <div class="col-md-4">
        <!--begin::Hot sales post-->
        <div class="card-xl-stretch me-md-6">
            <!--begin::Overlay-->
            <a class="d-block overlay" data-fslightbox="lightbox-hot-sales"
                href="{{ asset($item->front_img) }}">
                <!--begin::Image-->
                <div class="overlay-wrapper bgi-no-repeat bgi-position-center bgi-size-cover card-rounded min-h-175px"
                    style="background-image:url({{asset($item->front_img)}})">
                </div>
                <!--end::Image-->

                <!--begin::Action-->
                <div
                    class="overlay-layer card-rounded bg-dark bg-opacity-25">
                    <i class="ki-duotone ki-eye fs-2x text-white">
                        <span class="path1"></span>
                        <span class="path2"></span>
                        <span class="path3"></span>
                    </i>
                </div>
                <!--end::Action-->
            </a>
            <!--end::Overlay-->

            <!--begin::Body-->
            <div class="mt-5">
                <!--begin::Title-->
                <a href="{{ route('item.show', ['item' => $item->id]) }}" class="fs-4 text-dark fw-bold text-hover-primary text-dark lh-base">{{ $item->title }}</a>
                <!--end::Title-->

                <!--begin::Text-->
                <div class="fw-semibold fs-5 text-gray-600 text-dark mt-3">
                    {{ $item->description }}
                </div>
                <!--end::Text-->

                <!--begin::Text-->
                <div class="fs-6 fw-bold mt-5 d-flex flex-stack">
                    <!--begin::Action-->
                    <a href="{{ route('requestMatch.create') }}" class="btn btn-sm btn-primary">交換要求の送信</a>
                    <!--end::Action-->
                </div>
                <!--end::Text-->
            </div>
            <!--end::Body-->
        </div>
        <!--end::Hot sales post-->
    </div>
@endforeach