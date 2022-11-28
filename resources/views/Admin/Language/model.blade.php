@extends('layout.layout')

@section('title')
    {{__('lang.Nationality_Edit')}}
@endsection
@section('css')
    <link href="{{asset('dashboard/assets/plugins/custom/datatables/datatables.bundle.css')}}" rel="stylesheet" type="text/css" />
@endsection

@section('content')

    <!--begin::Entry-->
    <div class="d-flex flex-column-fluid">
        <!--begin::Container-->
        <!--begin::Container-->        <div class="subheader py-2 py-lg-6 subheader-solid" id="kt_subheader">
            <div class="container-fluid d-flex align-items-center justify-content-between flex-wrap flex-sm-nowrap">
                <!--begin::Info-->
                <div class="d-flex align-items-center flex-wrap mr-1">
                    <!--begin::Mobile Toggle-->
                    <button class="burger-icon burger-icon-left mr-4 d-inline-block d-lg-none" id="kt_subheader_mobile_toggle">
                        <span></span>
                    </button>
                    <!--end::Mobile Toggle-->
                    <!--begin::Page Heading-->
                    <div class="d-flex align-items-baseline flex-wrap mr-5">
                        <!--begin::Page Title-->

                        <!--end::Page Title-->
                        <!--begin::Breadcrumb-->
                        <ul class="breadcrumb breadcrumb-transparent breadcrumb-dot font-weight-bold p-0 my-2 font-size-sm">
                            <li class="breadcrumb-item">
                                <a href="{{url('copanel')}}" class="text-muted">{{trans('lang.Control')}}</a>
                            </li>
                            <li class="breadcrumb-item">
                                <a href="{{url('copanel/Languages')}}" class="text-muted">       {{__('lang.languages_Title')}}

                                </a>
                            </li>

                            <li class="breadcrumb-item">
                                <h5 class="text-dark font-weight-bold my-1 mr-5 ">{{__('lang.languages_Edit')}}</h5>
                            </li>
                        </ul>

                        <!--end::Breadcrumb-->
                    </div>
                    <!--end::Page Heading-->
                </div>
            </div>
        </div>

        <div class="container">
            <br><br><br>            <!--begin::Card-->
            <div class="card card-custom gutter-b">
                <div class="card-header flex-wrap py-3">
                    <div class="card-title">
                        <h3 class="card-label">{{__('lang.languages_Edit')}}
                    </div>
                </div>
                <div class="card-body">
                    <form method="post" action="{{url('Update_Language')}}" enctype="multipart/form-data">
                        @csrf
                        <div class="col-xl-6">
                            <div class="kt-section__body">

                                <div class="form-group">
                                    <label>{{__('lang.languages_Arablic')}}:</label>
                                    <input type="text" name="ar_name" value="{{$Language->ar_name}}" class="form-control form-control-solid"/>
                                </div>

                                <div class="form-group">
                                    <label>{{__('lang.languages_English')}}:</label>
                                    <input type="text" name="en_name" value="{{$Language->en_name}}" class="form-control form-control-solid"/>
                                </div>

                                <div class="form-group">
                                    <label>{{__('lang.languages_Screen')}}:</label>
                                    <input type="text" name="page_name" value="{{$Language->page_name}}" class="form-control form-control-solid"/>
                                </div>
                                <div class="form-group">
                                    <label>{{__('lang.languages_Slug')}}:</label>
                                    <input type="text" name="slug" value="{{$Language->slug}}" class="form-control form-control-solid"/>
                                </div>

                                <input type="hidden" name="id" value="{{$Language->id}}" />
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">{{__('lang.logs_Close')}}</button>
                            <button type="submit" class="btn btn-primary">{{__('lang.logs_Save')}}</button>
                        </div>
                    </form>
                </div>
            </div>
            <!--end::Card-->
        </div>
        <!--end::Container-->
    </div>


    <!-- /.modal -->

@section('js')
    {{--    <script src="{{asset('dashboard/assets/plugins/custom/datatables/datatables.bundle.js')}}"></script>--}}
    {{--    <script src="{{asset('dashboard/assets/js/pages/crud/datatables/basic/basic.js')}}"></script>--}}
    {{--    <script src="{{asset('dashboard/assets/js/pages/features/miscellaneous/sweetalert2.js')}}"></script>--}}
    {{--    <script src="{{asset('dashboard/assets/js/pages/features/miscellaneous/dropify.min.js')}}"></script>--}}
    {{--    <script src="{{asset('dashboard/assets/js/pages/crud/file-upload/image-input.js')}}"></script>--}}
    <script>
        // Replace the <textarea id="editor1"> with a CKEditor 4
        // instance, using default configuration.

        function transactionsFunction1() {
            var x = document.getElementById("transactionsBody1");
            if (x.style.display === "none") {
                x.style.display = "block";
            } else {
                x.style.display = "none";
            }
        }

        function resourcesFunction1() {
            var x = document.getElementById("resourcesBody1");
            if (x.style.display === "none") {
                x.style.display = "block";
            } else {
                x.style.display = "none";
            }
        }

        function copanelFunction1() {
            var x = document.getElementById("copanelBody1");
            if (x.style.display === "none") {
                x.style.display = "block";
            } else {
                x.style.display = "none";
            }
        }

        function settingsFunction1() {
            var x = document.getElementById("settingsBody1");
            if (x.style.display === "none") {
                x.style.display = "block";
            } else {
                x.style.display = "none";
            }
        }

    </script>


@endsection
@endsection





