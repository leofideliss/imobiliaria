@if(Session::has('message'))
<!--begin::Alert-->
<div class="alert alert-dismissible bg-light-primary d-flex flex-column flex-sm-row p-5 mx-auto">
    <!--begin::Icon-->
    <span class="svg-icon svg-icon-2hx svg-icon-primary me-4 mb-5 mb-sm-0">
        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
            <rect opacity="0.3" x="2" y="2" width="20" height="20" rx="10" fill="currentColor"></rect>
            <rect x="11" y="14" width="7" height="2" rx="1" transform="rotate(-90 11 14)" fill="currentColor"></rect>
            <rect x="11" y="17" width="2" height="2" rx="1" transform="rotate(-90 11 17)" fill="currentColor"></rect>
        </svg>
    </span>
    <!--end::Icon-->

    <!--begin::Wrapper-->
    <div class="d-flex flex-column pe-0 pe-sm-10">
        <!--begin::Title-->
        <h4 class="fw-semibold">Atenção</h4>
        <!--end::Title-->
        <!--begin::Content-->
        <span>{!! session()->get('message') !!}</span>
        <!--end::Content-->
    </div>
    <!--end::Wrapper-->

    <!--begin::Close-->
    <button type="button" class="position-absolute position-sm-relative m-2 m-sm-0 top-0 end-0 btn btn-icon ms-sm-auto" data-bs-dismiss="alert">
        <i class="bi bi-x fs-1 text-primary"></i>
    </button>
    <!--end::Close-->
</div>
<!--end::Alert-->
@endif