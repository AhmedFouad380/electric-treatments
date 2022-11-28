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
                                <a href="{{url('resources')}}" class="text-muted">{{trans('lang.HR')}}</a>
                            </li>
                            <li class="breadcrumb-item">
                                <a href="{{url('resources/Jobs')}}" class="text-muted">    {{__('lang.Jobs_Title')}}
                                </a>
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
                    <form method="post" action="{{url('Update_Job')}}">
                        @csrf
                        <div class="col-xl-12">
                            <div class="kt-section__body">



                                <div class="form-group row">
                                    <label class="col-xl-3 col-lg-3 col-form-label"> {{__('lang.Jobs_Name')}} </label>
                                    <div class="col-lg-9 col-xl-9">
                                        <input class="form-control form-control-solid" type="text" required name="name" value="{{$Job->name}}">
                                        <input class="form-control" type="hidden" required name="id" value="{{$Job->id}}">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-xl-3 col-lg-3 col-form-label"> {{__('lang.Jobs_number')}} </label>
                                    <div class="col-lg-9 col-xl-9">
                                        <input class="form-control form-control-solid" type="number"  name="job_num" value="{{$Job->job_num}}">
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-xl-3 col-lg-3 col-form-label"> {{__('lang.Jobs_description')}} </label>
                                    <div class="col-lg-9 col-xl-9">
                                        <textarea class="form-control form-control-solid" name="job_description">  {{$Job->job_description}} </textarea>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-xl-3 col-lg-3 col-form-label"> {{__('lang.Jobs_Section')}} </label>
                                    <div class="col-lg-9 col-xl-9">
                                        @inject('AttachmentCategory','App\Category')
                                        <select class="form-control form-control-lg form-control-solid" id="kt_select2_1"  name="category_id" required>
                                            @foreach($AttachmentCategory->all() as $data)
                                                @if($data->id == $Job->category_id)
                                                    <option selected value="{{$data->id}}"> {{$data->name}}</option>
                                                @else
                                                    <option value="{{$data->id}}"> {{$data->name}}</option>
                                                @endif
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-xl-3 col-lg-3 col-form-label"> {{__('lang.Jobs_Type')}} </label>
                                    <div class="col-lg-9 col-xl-9">
                                        @inject('AttachmentCategory','App\JobType')
                                        <select class="form-control form-control-lg form-control-solid" id="kt_select2_1"  name="job_type" required>
                                            @foreach($AttachmentCategory->all() as $data)
                                                @if($data->id == $Job->job_type)
                                                    <option selected value="{{$data->id}}"> {{$data->name}}</option>
                                                @else
                                                    <option value="{{$data->id}}"> {{$data->name}}</option>
                                                @endif
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-xl-3 col-lg-3 col-form-label"> {{__('lang.Jobs_degree')}} </label>
                                    <div class="col-lg-9 col-xl-9">
                                        <input class="form-control form-control-solid" type="number" required name="job_degree" value="{{$Job->job_degree}}">
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-3 col-form-label">{{__('lang.Jobs_validity')}}</label>
                                    <div class="col-9 col-form-label">
                                        <div class="radio-list">
                                            <label class="radio">
                                                <input type="radio" value="1" name="job_role" @if($Job->job_role == 1) checked="checked" @endif />
                                                <span></span>
                                                وظيفة لمدير
                                            </label>
                                            <label class="radio">
                                                <input type="radio" value="2" name="job_role" @if($Job->job_role == 2) checked="checked" @endif />
                                                <span></span>
                                                وظيفة لموظف
                                            </label>

                                        </div>
                                    </div>
                                </div>



                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">{{__('lang.Jobs_Close')}}</button>
                            <button type="submit" class="btn btn-primary">{{__('lang.Jobs_Save')}}</button>
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











