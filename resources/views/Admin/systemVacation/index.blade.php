@extends('layout.layout')

@section('title')
    {{__('lang.systemVacation')}}
@endsection
@section('css')
    <link href="{{asset('dashboard/assets/plugins/custom/datatables/datatables.bundle.css')}}" rel="stylesheet"
          type="text/css"/>
@endsection

@section('content')

    <!--begin::Entry-->
    <div class="d-flex flex-column-fluid">
        <div class="subheader py-2 py-lg-6 subheader-solid" id="kt_subheader">
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
                            {{--                            <li class="breadcrumb-item">--}}
                            {{--                                <a href="" class="text-muted">Profile</a>--}}
                            {{--                            </li>--}}

                            <li class="breadcrumb-item">
                                <h5 class="text-dark font-weight-bold my-1 mr-5 ">{{trans('lang.systemVacation')}}</h5>
                            </li>
                        </ul>

                        <!--end::Breadcrumb-->
                    </div>
                    <!--end::Page Heading-->
                </div>
            </div>
        </div>

        <!--begin::Container-->

        <div class="container">
            <br>
            <br>
            <br>
            <!--begin::Card-->
            <div class="card card-custom gutter-b">
                <div class="card-header flex-wrap py-3">
                    <div class="card-title">
                        <h3 class="card-label">{{__('lang.systemVacation')}}
                    </div>

                    <div class="card-body">

                        <div class="card-body" style=' padding-top: 10px;
                            padding-right: 15px;
                             padding-left: 20px;
                             '>
                             <form method="post" action="/systemVacation">
                                @csrf
                            <div class="col-xl-12">
                                <div class="kt-section__body">


                                    <div class="form-group">
                                        {{ Form::label('annual',trans('lang.annual') ) }}
                                        {{ Form::number('annual',$vacations->annual,["class"=>"form-control"  , 'step' => 'any' ,'max'=>'100' ]) }}
                                        <input class="form-control" type="hidden" name="id" value="{{$vacations->id}}">

                                    </div>

                                    <div class="form-group">
                                        {{ Form::label('monthly',trans('lang.monthly') ) }}
                                        {{ Form::number('monthly',$vacations->monthly,["class"=>"form-control"  , 'step' => 'any' ,'max'=>'100' ]) }}
                                    </div>

                                    <div class="form-group">
                                        {{ Form::label('daily',trans('lang.daily') ) }}
                                        {{ Form::number('daily',$vacations->daily,["class"=>"form-control"  , 'step' => 'any' ,'max'=>'100' ]) }}
                                    </div>

                                    <div style=' padding-top: 10px;
                                                    padding-right: 15px;
                                                     padding-left: 20px;
                                                     '>
                                        {{ Form::submit(trans('lang.vacation_edit'),['class'=>'btn btn-info']) }}

                                    </div>
                                </div>
                            </div>

                        </div>
                        <!-- /.card-body -->
                    </div>


                </div>

            </div>
            <!--end::Card-->
        </div>
        <!--end::Container-->
    </div>





@section('js')
    <script src="{{asset('dashboard/assets/plugins/custom/datatables/datatables.bundle.js')}}"></script>
    <script src="{{asset('dashboard/assets/js/pages/crud/datatables/basic/basic.js')}}"></script>
    <script src="{{asset('dashboard/assets/js/pages/features/miscellaneous/sweetalert2.js')}}"></script>
    <script src="{{asset('dashboard/assets/js/pages/features/miscellaneous/dropify.min.js')}}"></script>
    <!--begin::Page scripts(used by this page) -->



    <?php
    $message = session()->get("message");
    ?>

    @if( session()->has("message"))
        @if( $message == "Success")
            <script>
                Swal.fire({
                    icon: 'success',
                    title: "{{__('lang.Success')}}",
                    text: "{{__('lang.Success_text')}}",
                    type: "success",
                    timer: 1000,
                    showConfirmButton: false
                });

            </script>
        @elseif ( $message == "Failed")
            <script>
                Swal.fire({
                    icon: 'warning',
                    title: "{{__('lang.Sorry')}}",
                    text: "{{__('lang.operation_failed')}}",
                    type: "error",
                    timer: 2000,
                    showConfirmButton: false
                });
            </script>
        @endif
    @endif
@endsection
@endsection
