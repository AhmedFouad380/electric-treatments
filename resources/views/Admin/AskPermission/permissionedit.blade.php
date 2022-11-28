@extends('layout.layout')

@section('title')
    {{__('lang.PermissionRequest')}}
@endsection
@section('css')
    <style>
        @media print
        {
            .no-print, .no-print *
            {
                display: none !important;
            }
        }

    </style>
@endsection

@section('content')
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
                        <li class="breadcrumb-item">
                            <a href="{{url('requestslist')}}" class="text-muted">{{trans('lang.requestslist')}}</a>
                        </li>

                        <li class="breadcrumb-item">
                            <h5 class="text-dark font-weight-bold my-1 mr-5 ">{{trans('lang.PermissionRequest')}}</h5>
                        </li>
                    </ul>

                    <!--end::Breadcrumb-->
                </div>
                <!--end::Page Heading-->
            </div>
        </div>
    </div>

    <!--begin::Container-->

    <br>
    <br>
    <br>
    {!! Form::model($permissionAsked, ['url' => ['updateaskpermission/'.$permissionAsked->id] , 'method'=>'post' ]) !!}
    {!! csrf_field() !!}

    <div class="col-xl-12">
        <div class="kt-section__body">
             <h5  class="card-title">{{trans('lang.Employee').'    ' }}@if($permissionAsked->getUser) {{$permissionAsked->getUser->name}} @else تم حذف الموظف @endif
             </h5>


            <div class="form-group row">
                <label class="col-xl-3 col-lg-3 col-form-label">{{__('lang.permission_date')}}</label>
                <div class="col-lg-6 col-xl-6">
                    {{ Form::date('permission_date',$permissionAsked->permission_date ,
                   ["class"=>"form-control","id"=>"date","readonly"]) }}
                </div>
            </div>





            <div class="form-group row">
                <label class="col-xl-3 col-lg-3 col-form-label">{{__('lang.request_date_hijri')}}</label>
                <div class="col-lg-6 col-xl-6">
                    {{ Form::date('hijri_date',\Carbon\Carbon::parse($permissionAsked->hijri_date)->format('Y-m-d')
                    ,
                   ["class"=>"form-control","id"=>"date","readonly"]) }}
                </div>
            </div>



            <div class="form-group row">
                <label class="col-xl-3 col-lg-3 col-form-label">{{__('lang.from_hour')}}</label>
                <div class="col-lg-6 col-xl-6">
                    {{ Form::time('from',$permissionAsked->from ,["class"=>"form-control","readonly" ]) }}

                </div>
            </div>

            <div class="form-group row">
                <label class="col-xl-3 col-lg-3 col-form-label">{{__('lang.to_hour')}}</label>
                <div class="col-lg-6 col-xl-6">
                    {{ Form::time('to',$permissionAsked->to ,["class"=>"form-control" ,"readonly"]) }}

                </div>
            </div>
            <div class="form-group row">
                <label class="col-xl-3 col-lg-3 col-form-label">{{__('lang.reason')}}</label>
                <div class="col-lg-6 col-xl-6">
                    {{ Form::text('reason',$permissionAsked->reason ,["class"=>"form-control","readonly" ]) }}

                </div>
            </div>
            <div class="form-group row">
                <label class="col-xl-3 col-lg-3 col-form-label">{{__('lang.description')}}</label>
                <div class="col-lg-6 col-xl-6">
                    {{ Form::text('description',$permissionAsked->description ,["class"=>"form-control","readonly" ]) }}

                </div>
            </div>
            <div class="form-group row">
                <label class="col-xl-3 col-lg-3 col-form-label">{{__('lang.request_date')}}</label>
                <div class="col-lg-6 col-xl-6">
                    {{ Form::text('request_date',$permissionAsked->request_date ,["class"=>"form-control","readonly" ]) }}

                </div>
            </div>
            <div class="form-group row">
                <label class="col-xl-3 col-lg-3 col-form-label">{{__('lang.status')}}</label>
                <div class="col-lg-6 col-xl-6">
                    {!! Form::select('status', ['notyet'=>trans('lang.notyet') , 'accepted'=>trans('lang.accepted') ,  'declined'=>trans('lang.declined')] , $permissionAsked->status, ['class'=>'form-control',null]) !!}

                </div>
            </div>

        </div>
    </div>
    <div style="text-align: center" class="no-print">
        {{ Form::submit(  __('lang.VacationRequest_Save') ,['class'=>'btn btn-primary ' ]) }}
        {{ Form::close() }}

        <button type="button" onclick="window.print();" class="btn btn-success"> @if(Request::segment(1) == 'ar') طباعة @else Print @endif</button>

    </div>







@endsection
