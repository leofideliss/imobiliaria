<!--begin::Page title-->
<div class="page-title d-flex flex-column justify-content-center flex-wrap me-3">
    <!--begin::Title-->
    <h1 class="page-heading d-flex text-dark fw-bold fs-3 flex-column justify-content-center my-0">
        {{$bread_title}}</h1>
    <!--end::Title-->
    <!--begin::Breadcrumb-->
    <ul class="breadcrumb breadcrumb-separatorless fw-semibold fs-7 my-0 pt-1">
        @foreach($bread_subcontents as $key=>$subcontent)
        <!--begin::Item-->
            <li class="breadcrumb-item text-muted">
                <div class="text-muted">{{$subcontent['title']}}</div>
            </li>
            @if($key+1 < count($bread_subcontents))
                <li class="breadcrumb-item">
                    <span class="bullet bg-gray-400 w-5px h-2px"></span>
                </li>
            @endif
        @endforeach
        <!--end::Item-->
    </ul>
    <!--end::Breadcrumb-->
</div>
<!--end::Page title-->
