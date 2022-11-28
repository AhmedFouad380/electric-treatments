

@extends('layout.layout')

@section('title')
    {{__('lang.Nationality_Edit')}}
@endsection
@section('css')
    <link href="{{asset('dashboard/assets/plugins/custom/datatables/datatables.bundle.css')}}" rel="stylesheet"
          type="text/css"/>
@endsection

@section('content')
    <!--begin::Entry-->
    <div class="d-flex flex-column-fluid">
        <!--begin::Container-->
        <!--begin::Container-->
        <div class="subheader py-2 py-lg-6 subheader-solid" id="kt_subheader">
            <div class="container-fluid d-flex align-items-center justify-content-between flex-wrap flex-sm-nowrap">
                <!--begin::Info-->
                <div class="d-flex align-items-center flex-wrap mr-1">
                    <!--begin::Mobile Toggle-->
                    <button class="burger-icon burger-icon-left mr-4 d-inline-block d-lg-none"
                            id="kt_subheader_mobile_toggle">
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
                                <a href="{{url('settings')}}" class="text-muted">{{trans('lang.Settings')}}</a>
                            </li>
                            <li class="breadcrumb-item">
                                <a href="{{url('settings/InboxSetting')}}" class="text-muted">@if(Request::segment(1) == 'ar')  اعدادات البريد  @else Inbox Setting @endif</a>
                            </li>
                            <li class="breadcrumb-item">
                                <a href="{{url('settings/inboxProcessType')}}"
                                   class="text-muted">{{trans('lang.inboxProcessType_Title')}}</a>
                            </li>
                            <li class="breadcrumb-item">
                                <h5 class="text-dark font-weight-bold my-1 mr-5 ">{{__('lang.Nationality_Edit')}}</h5>
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
                        <h3 class="card-label">{{__('lang.Nationality_Edit')}}
                    </div>
                </div>
                <div class="card-body">
                    <form method="post" action="{{url('Update_InboxProcessType')}}">
                        @csrf
                        <div class="col-xl-12">
                            <div class="kt-section__body">

                                <div class="form-group row">
                                    <label class="col-xl-3 col-lg-3 col-form-label">{{__('lang.inboxProcessType_Name')}}</label>
                                    <div class="col-lg-9 col-xl-9">
                                        <input class="form-control" type="text" name="ar_name" value="{{$data->ar_name}}">
                                        <input class="form-control" type="hidden" name="id" value="{{$data->id}}">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-xl-3 col-lg-3 col-form-label">{{__('lang.inboxProcessType_Nameen')}}</label>
                                    <div class="col-lg-9 col-xl-9">
                                        <input class="form-control" type="text" name="en_name" value="{{$data->en_name}}">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">{{__('lang.inboxProcessType_Close')}}</button>
                            <button type="submit" class="btn btn-primary">{{__('lang.inboxProcessType_Save')}}</button>
                        </div>
                    </form>
                </div>
            </div>
            <!--end::Card-->
        </div>
        <!--end::Container-->
    </div>
    <!-- /.modal -->
@endsection
@section('js')
    <script>
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






