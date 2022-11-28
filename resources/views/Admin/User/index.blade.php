@extends('layout.layout')

@section('title')
    {{__('lang.Users_Title')}}
@endsection
@section('css')
    <link href="{{asset('dashboard/assets/plugins/custom/datatables/datatables.bundle.css')}}" rel="stylesheet" type="text/css" />
    @if(Request::segment(1) == 'ar' )
        <link href="{{asset('dashboard/assets/css/pages/wizard/wizard-6.rtl.css')}}" rel="stylesheet" type="text/css" />
    @else
        <link href="{{asset('dashboard/assets/css/pages/wizard/wizard-6.css')}}" rel="stylesheet" type="text/css" />
    @endif
    <link href="{{asset('hijri/css/bootstrap-datetimepicker.css')}}" rel="stylesheet" />

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
                            {{--                            <li class="breadcrumb-item">--}}
                            {{--                                <a href="" class="text-muted">Profile</a>--}}
                            {{--                            </li>--}}

                            <li class="breadcrumb-item">
                                <h5 class="text-dark font-weight-bold my-1 mr-5 ">{{trans('lang.Users_Title')}}</h5>
                            </li>
                        </ul>

                        <!--end::Breadcrumb-->
                    </div>
                    <!--end::Page Heading-->
                </div>
            </div>
        </div>

        <div class="container">
            <!--begin::Card--><br><br><br>            <!--begin::Card-->
            <!--begin::Card-->
            <div class="card card-custom gutter-b">
                <div class="card-header flex-wrap py-3">
                    <div class="card-title">
                        <h3 class="card-label">{{__('lang.Users_Title')}}
                    </div>
                    <div class="card-toolbar">
                        <!--begin::Button-->
                        <button  style="margin: 6px"  type="button" data-toggle="modal" data-toggle="modal" data-target="#kt_modal_5" class="btn btn-info font-weight-bolder">
                            &nbsp;&nbsp;<i class="flaticon2-magnifier-tool"></i>

                            {{__('lang.search')}}</button>
                        <button type="button" data-toggle="modal" data-toggle="modal" data-target="#kt_modal_4" class="btn btn-primary font-weight-bolder">
            <span class="svg-icon svg-icon-md">
              <!--begin::Svg Icon | path:assets/media/svg/icons/Design/Flatten.svg-->
              <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                  <rect x="0" y="0" width="24" height="24" />
                  <circle fill="#000000" cx="9" cy="15" r="6" />
                  <path d="M8.8012943,7.00241953 C9.83837775,5.20768121 11.7781543,4 14,4 C17.3137085,4 20,6.6862915 20,10 C20,12.2218457 18.7923188,14.1616223 16.9975805,15.1987057 C16.9991904,15.1326658 17,15.0664274 17,15 C17,10.581722 13.418278,7 9,7 C8.93357256,7 8.86733422,7.00080962 8.8012943,7.00241953 Z" fill="#000000" opacity="0.3" />
                </g>
              </svg>
                <!--end::Svg Icon-->
            </span> {{__('lang.Users_Create')}}</button>
                        &nbsp;&nbsp;
                        <button id="delete" class="btn btn-danger font-weight-bolder"><span class="svg-icon svg-icon-md"><!--begin::Svg Icon | path:C:\wamp64\www\keenthemes\themes\metronic\theme\html\demo1\dist/../src/media/svg/icons\General\Trash.svg--><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                  <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                    <rect x="0" y="0" width="24" height="24"/>
                    <circle fill="#000000" opacity="0.3" cx="12" cy="12" r="10"/>
                    <path d="M12.0355339,10.6213203 L14.863961,7.79289322 C15.2544853,7.40236893 15.8876503,7.40236893 16.2781746,7.79289322 C16.6686989,8.18341751 16.6686989,8.81658249 16.2781746,9.20710678 L13.4497475,12.0355339 L16.2781746,14.863961 C16.6686989,15.2544853 16.6686989,15.8876503 16.2781746,16.2781746 C15.8876503,16.6686989 15.2544853,16.6686989 14.863961,16.2781746 L12.0355339,13.4497475 L9.20710678,16.2781746 C8.81658249,16.6686989 8.18341751,16.6686989 7.79289322,16.2781746 C7.40236893,15.8876503 7.40236893,15.2544853 7.79289322,14.863961 L10.6213203,12.0355339 L7.79289322,9.20710678 C7.40236893,8.81658249 7.40236893,8.18341751 7.79289322,7.79289322 C8.18341751,7.40236893 8.81658249,7.40236893 9.20710678,7.79289322 L12.0355339,10.6213203 Z" fill="#000000"/>
                </g>
            </svg><!--end::Svg Icon--></span>
                            {{__('lang.Users_Delete')}}</button>
                        <!--end::Button-->
                    </div>
                </div>
                <div class="card-body">

                    <!--begin: Datatable-->
                    <table class="table table-bordered table-hover table-checkable mt-10" id="kt_tdata">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th class="center" >{{__('lang.image')}} </th>
                            <th>{{__('lang.Users_Name')}} </th>
                            <th>{{__('lang.Users_mail')}} </th>
                            <th>{{__('lang.Users_Mobile')}} </th>
                            <th>{{__('lang.Users_Nationality')}} </th>
                            <th>{{__('lang.Users_main')}} </th>
                            <th>{{__('lang.Users_active')}} </th>
                            <th> {{__('lang.Users_Edit')}}  </th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($Users as $User)
                            <tr>
                                <td>
                                    <label class="checkbox checkbox-single">
                                        <input type="checkbox" value="{{$User->id}}" class="checkable" name="check_delete[]"/>
                                        <span></span>
                                    </label>
                                </td>
                                <td class="center" >
                                        @if($User->img)
                                            <div class="kt-user-card-v2__pic">
                                                <img src="{{asset('Upload/User/'.$User->img)}}" class="m-img-rounded kt-marginless img-thumbnail" width="75px" alt="photo">
                                            </div>
                                        @endif

                                </td>
                                <td>
                                    <div class="kt-user-card-v2">
                                        <a  class="kt-user-card-v2__email kt-link" href="/viewProfile/{{$User->id}}">
                                            {{$User->name}}
                                        </a>
                                    </div>
                                </td>
                                <td>{{$User->email}}</td>
                                <td>{{$User->phone}}</td>
                                @inject('Nationality','App\Nationality')
                                <td>@if($Nationality->find($User->country_id)) {{$Nationality->find($User->country_id)->name}} @else   تم حذف الجنسية @endif</td>
                                @inject('Job','App\Job')
                                <td>
                                    <span class="label font-weight-bold label-lg label-light-primary label-inline">@if($Job->find($User->mainJob_id)) {{$Job->find($User->mainJob_id)->name}} @else   تم حذف الوظيفة @endif</span>
                                </td>


                                <td>
                    <span class="switch switch-sm switchery-demo">
                        <label>
                         <input type="checkbox" class="switchery-demo" data-id="{{$User->id}}" @if($User->isActive == 1) checked="checked" @endif />
                         <span></span>
                        </label>
                       </span>
                                </td>
                                <td nowrap="nowrap">
                    <span class="dropdown">
                        <a href="#" class="btn btn-warning  btn-sm btn-clean btn-icon btn-icon-md" data-toggle="dropdown" aria-expanded="true">
                          <i class="la la-ellipsis-h"></i>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right">
                            <a class="dropdown-item " href="/resources/UserAttachment/{{$User->id}}"><i class="la la-file"></i> {{__('lang.Users_attachments')}} </a>
                            <a class="dropdown-item edit-notation"  data-id="{{$User->id}}" ><i class="la la-print"></i> {{__('lang.Users_visa')}}</a>
                            <a class="dropdown-item edit-inboxGroup"  data-id="{{$User->id}}" ><i class="la la-inbox"></i>  {{__('lang.Users_groups')}}</a>
                        </div>
                    </span>
                                    <a  class="btn btn-success btn-sm btn-clean btn-icon btn-icon-md edit-Advert"   data-id="{{$User->id}}" data-original-title="{{__('lang.Users_Edit')}}" title="{{__('lang.Users_Edit')}}">
                                        <i class="fa fa-edit icon-nm"></i>
                                    </a>
{{--                            add btn to open empshifts modal                   --}}
                                    <a  class="btn btn-outline-primary btn-sm btn-clean btn-icon btn-icon-md edit-Shift"   data-id="{{$User->id}}" data-original-title="{{__('lang.Users_Shifts')}}" title="{{__('lang.Users_Shifts')}}">
                                        <i class="fa fa-location-arrow"></i>
                                    </a>

                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                    <!--end: Datatable-->
                </div>

                <h3>اجمالي الموظفيين : @inject('AllUsers','App\User') {{$AllUsers->count()}} </h3>
            </div>
            <!--end::Card-->
        </div>
        <!--end::Container-->
    </div>

    <div class="modal fade" id="kt_modal_5" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">
                        {{__('lang.search')}}</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    </button>
                </div>
                <div class="modal-body">
                    <form method="get" action="/resources/Search_User">
                        <div class="col-xl-12">
                            <div class="kt-section__body">

                                <div class="form-group row">
                                    <label class="col-xl-3 col-lg-3 col-form-label"> {{__('lang.Users_Name')}}</label>
                                    <div class="col-lg-9 col-xl-9">
                                        <input type="text" class="form-control form-control-solid" name="name"  placeholder="{{__('lang.Users_Name')}}" >
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-xl-3 col-lg-3 col-form-label"> {{__('lang.Users_Job_number')}}</label>
                                    <div class="col-lg-9 col-xl-9">
                                        <input type="number" class="form-control form-control-solid" name="job_num"  placeholder="{{__('lang.Users_Job_number')}}" >
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label  class="col-xl-3 col-lg-3 col-form-label">{{__('lang.Users_Gendar')}} :</label>
                                    <div class="radio-inline col-lg-9 col-xl-9">
                                        <label class="radio">
                                            <input type="radio" name="type"  checked value="0" />
                                            <span></span>الكل</label>
                                        <label class="radio">
                                            <input type="radio" name="type" value="1" />
                                            <span></span>ذكر</label>
                                        <label class="radio">
                                            <input type="radio" name="type"  value="2" />
                                            <span></span>انثى</label>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-xl-3 col-lg-3 col-form-label"> {{__('lang.Users_Mobile')}}  </label>
                                    <div class="col-lg-9 col-xl-9">
                                        <input class="form-control form-control-solid" type="number"  name="phone" value="">
                                    </div>
                                </div>


                                <div class="form-group row">
                                    <label class="col-xl-3 col-lg-3 col-form-label">  {{__('lang.Users_main')}} </label>
                                    <div class="col-lg-9 col-xl-9">
                                        @inject('Job','App\Job')
                                        <select name="mainJob_id" class="form-control form-control-lg form-control-solid"  id="kt_select2_1">
                                            <option value="0"> {{__('lang.show_all')}}  </option>
                                            @foreach($Job->all() as $data)
                                                <option value="{{$data->id}}">{{$data->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-xl-3 col-lg-3 col-form-label"> {{__('lang.Jobs_Section')}} </label>
                                    <div class="col-lg-9 col-xl-9">
                                        @inject('AttachmentCategory','App\Category')
                                        <select class="form-control form-control-lg form-control-solid" id="kt_select2_1" name="category_id" required>
                                            <option value="0"> {{__('lang.show_all')}}  </option>
                                            @foreach($AttachmentCategory->all() as $data)
                                                <option value="{{$data->id}}"> {{$data->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">{{__('lang.Jobs_Close')}}</button>
                            <button type="submit" class="btn btn-primary">{{__('lang.search')}}</button>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>

    <div class="modal fade" id="kt_modal_4" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">
                        {{__('lang.Users_Create')}}</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    </button>
                </div>
                <div class="modal-body">
                    <div class="wizard wizard-6 d-flex flex-column flex-lg-row flex-column-fluid" id="kt_wizard">
                        <!--begin::Container-->
                        <div class="wizard-content d-flex flex-column mx-auto py-10 py-lg-20 w-100 w-md-700px">
                            <div class="kt-container  kt-container--fluid  kt-grid__item kt-grid__item--fluid">
                                <div class="d-flex flex-column-auto flex-column px-10">
                                    <!--begin: Wizard Nav-->
                                    <div class="wizard-nav pb-lg-10 pb-3 d-flex flex-column align-items-center align-items-md-start">
                                        <!--begin::Wizard Steps-->
                                        <div class="wizard-steps d-flex flex-column flex-md-row">
                                            <!--begin::Wizard Step 1 Nav-->
                                            <div class="wizard-step flex-grow-1 flex-basis-0" data-wizard-type="step" data-wizard-state="current">
                                                <div class="wizard-wrapper pr-lg-7 pr-5">
                                                    <div class="wizard-icon">
                                                        <i class="wizard-check ki ki-check"></i>
                                                        <span class="wizard-number">1</span>
                                                    </div>
                                                    <div class="wizard-label mr-3">
                                                        <h3 class="wizard-title">{{__('lang.Users_Personal')}}</h3>
                                                    </div>
                                                    <span class="svg-icon svg-icon-success svg-icon-2x"><!--begin::Svg Icon | path:C:\wamp64\www\keenthemes\themes\metronic\theme\html\demo1\dist/../src/media/svg/icons\Navigation\Angle-left.svg--><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                        <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                            <polygon points="0 0 24 0 24 24 0 24"/>
                                            <path d="M6.70710678,15.7071068 C6.31658249,16.0976311 5.68341751,16.0976311 5.29289322,15.7071068 C4.90236893,15.3165825 4.90236893,14.6834175 5.29289322,14.2928932 L11.2928932,8.29289322 C11.6714722,7.91431428 12.2810586,7.90106866 12.6757246,8.26284586 L18.6757246,13.7628459 C19.0828436,14.1360383 19.1103465,14.7686056 18.7371541,15.1757246 C18.3639617,15.5828436 17.7313944,15.6103465 17.3242754,15.2371541 L12.0300757,10.3841378 L6.70710678,15.7071068 Z" fill="#000000" fill-rule="nonzero" transform="translate(12.000003, 11.999999) scale(-1, 1) rotate(-270.000000) translate(-12.000003, -11.999999) "/>
                                        </g>
                                    </svg><!--end::Svg Icon--></span>
                                                </div>
                                            </div>
                                            <!--end::Wizard Step 1 Nav-->
                                            <!--begin::Wizard Step 2 Nav-->
                                            <div class="wizard-step flex-grow-1 flex-basis-0" data-wizard-type="step">
                                                <div class="wizard-wrapper pr-lg-7 pr-5">
                                                    <div class="wizard-icon">
                                                        <i class="wizard-check ki ki-check"></i>
                                                        <span class="wizard-number">2</span>
                                                    </div>
                                                    <div class="wizard-label mr-3">
                                                        <h3 class="wizard-title">{{__('lang.Users_data')}}</h3>
                                                    </div>
                                                    <span class="svg-icon svg-icon-success svg-icon-2x"><!--begin::Svg Icon | path:C:\wamp64\www\keenthemes\themes\metronic\theme\html\demo1\dist/../src/media/svg/icons\Navigation\Angle-left.svg--><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                        <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                            <polygon points="0 0 24 0 24 24 0 24"/>
                                            <path d="M6.70710678,15.7071068 C6.31658249,16.0976311 5.68341751,16.0976311 5.29289322,15.7071068 C4.90236893,15.3165825 4.90236893,14.6834175 5.29289322,14.2928932 L11.2928932,8.29289322 C11.6714722,7.91431428 12.2810586,7.90106866 12.6757246,8.26284586 L18.6757246,13.7628459 C19.0828436,14.1360383 19.1103465,14.7686056 18.7371541,15.1757246 C18.3639617,15.5828436 17.7313944,15.6103465 17.3242754,15.2371541 L12.0300757,10.3841378 L6.70710678,15.7071068 Z" fill="#000000" fill-rule="nonzero" transform="translate(12.000003, 11.999999) scale(-1, 1) rotate(-270.000000) translate(-12.000003, -11.999999) "/>
                                        </g>
                                    </svg><!--end::Svg Icon--></span>
                                                </div>
                                            </div>
                                            <!--end::Wizard Step 2 Nav-->
                                            <!--begin::Wizard Step 3 Nav-->
                                            <div class="wizard-step flex-grow-1 flex-basis-0" data-wizard-type="step">
                                                <div class="wizard-wrapper">
                                                    <div class="wizard-icon">
                                                        <i class="wizard-check ki ki-check"></i>
                                                        <span class="wizard-number">3</span>
                                                    </div>
                                                    <div class="wizard-label">
                                                        <h3 class="wizard-title"> {{__('lang.Users_Appointment')}}</h3>
                                                    </div>
                                                </div>
                                            </div>
                                            <!--end::Wizard Step 3 Nav-->
                                        </div>
                                        <!--end::Wizard Steps-->
                                    </div>
                                    <!--end: Wizard Nav-->
                                </div>

                                <form class="px-10" novalidate="novalidate" id="kt_form"  method="post" action="/Store_User" enctype="multipart/form-data">
                                        @csrf
                                     <!--begin: Wizard Step 1-->
                                    <div class="pb-5" data-wizard-type="step-content" data-wizard-state="current">
                                        <!--begin::Title-->

                                        <div class="form-group row">
                                            <div class="col-lg-9 col-xl-6">
                                                <div class="image-input image-input-empty image-input-outline" id="kt_image_1" style="background-image: url({{asset('dashboard/assets/media/users/blank.png')}})">
                                                    <div class="image-input-wrapper"></div>
                                                    <label class="btn btn-xs btn-icon btn-circle btn-white btn-hover-text-primary btn-shadow" data-action="change" data-toggle="tooltip" title="" data-original-title="{{__('lang.Change_photo')}}">
                                                        <i class="fa fa-pen icon-sm text-muted"></i>
                                                        <input type="file" name="img" accept=".png, .jpg, .jpeg" required />
                                                        <input type="hidden" name="logo_remove" />
                                                    </label>
                                                    <span class="btn btn-xs btn-icon btn-circle btn-white btn-hover-text-primary btn-shadow" data-action="cancel" data-toggle="tooltip" title="{{__('lang.Cancel_photo')}}">
                                  <i class="ki ki-bold-close icon-xs text-muted"></i>
                                </span>
                                                    <span class="btn btn-xs btn-icon btn-circle btn-white btn-hover-text-primary btn-shadow" data-action="remove" data-toggle="tooltip" title="{{__('lang.Remove_photo')}}">
                                  <i class="ki ki-bold-close icon-xs text-muted"></i>
                                </span>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label>{{__('lang.Users_Name')}} </label>
                                            <input type="text" class="form-control form-control-solid" name="name" required placeholder="{{__('lang.Users_Name')}}" >
                                        </div>
                                        <div class="form-group">
                                            <label>{{__('lang.Users_Nameen')}} </label>
                                            <input type="text" class="form-control form-control-solid" name="en_name" required placeholder="{{__('lang.Users_Nameen')}}" >
                                        </div>

                                        <div class="form-group">
                                            <label>{{__('lang.Users_fpuid')}} </label>
                                            <input type="number" class="form-control form-control-solid" name="fpuid" required placeholder="{{__('lang.Users_fpuid')}}" >
                                        </div>

                                        <div class="form-group">
                                            <label>{{__('lang.Users_idnum')}} </label>
                                            <input type="number" class="form-control form-control-solid" name="national_id" required placeholder="{{__('lang.Users_idnum')}}" >
                                        </div>
                                        <div class="form-group">
                                            <label>{{__('lang.Users_idnum_date')}} </label>
                                            <input type="text" class="form-control  hijri-date-input" name="date_national_id" required value="">
                                        </div>
                                        <div class="form-group">
                                            <label>{{__('lang.Users_Passport')}} </label>
                                            <input type="text" class="form-control form-control-solid" name="passport_id" required placeholder="{{__('lang.Users_Passport')}}" >
                                        </div>
                                        <div class="form-group">
                                            <label>{{__('lang.Users_Passport_date')}} </label>
                                            <input type="text" class="form-control hijri-date-input" name="date_passport_id" required value="">
                                        </div>
                                        <div class="form-group">
                                            <label>{{__('lang.Users_Nationality')}}  </label>
                                            @inject('Nationality','App\Nationality')
                                            <select name="country_id" class="form-control form-control-lg"  id="kt_select2_1">
                                                @foreach($Nationality->all() as $data)
                                                    <option value="{{$data->id}}">{{$data->name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label>{{__('lang.Users_Transfer')}}  </label>
                                            <input type="number" class="form-control form-control-solid" name="converted_num" required placeholder="{{__('lang.Users_Transfer')}}" >
                                        </div>

                                        <div class="row">
                                            <div class="col-xl-6">
                                                <div class="form-group">
                                                    <label>{{__('lang.Users_Mobile')}} </label>
                                                    <input type="tel" class="form-control form-control-solid" required name="phone" placeholder="{{__('lang.Users_Mobile')}}" >
                                                </div>
                                            </div>
                                            <div class="col-xl-6">
                                                <div class="form-group">
                                                    <label>{{__('lang.Users_mail')}} </label>
                                                    <input type="email" class="form-control form-control-solid" required name="email" placeholder="{{__('lang.Users_mail')}}" >
                                                </div>
                                            </div>
                                        </div>
                                          <div class="form-group row">
                                    <label class="col-xl-3 col-lg-3 col-form-label"> {{__('lang.password')}}  </label>
                                    <div class="col-lg-9 col-xl-9">
                                        <input class="form-control form-control-solid" type="password"  name="password" value="">
                                    </div>
                                </div>
                                        <div class="form-group">
                                            <label>{{__('lang.Users_Birth')}} </label>
                                            <input type="text" class="form-control hijri-date-input" name="birth_date" required value="">
                                        </div>
                                        <div class="form-group">
                                            <label>{{__('lang.Users_Address')}}  </label>
                                            <input type="text" class="form-control form-control-solid" name="address" required value="">
                                        </div>

                                        <div class="form-group">
                                            <label>{{__('lang.Users_Gendar')}} :</label>
                                            <div class="radio-inline">
                                                <label class="radio">
                                                    <input type="radio" name="type" value="1" />
                                                    <span></span>ذكر</label>
                                                <label class="radio">
                                                    <input type="radio" name="type"  value="2" />
                                                    <span></span>انثى</label>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label>{{__('lang.Users_Religion')}} :</label>
                                            <div class="radio-inline">
                                                <label class="radio">
                                                    <input type="radio" name="religion" value="1" />
                                                    <span></span>مسلم</label>
                                                <label class="radio">
                                                    <input type="radio" name="religion"  value="2" />
                                                    <span></span>غير مسلم</label>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label>{{__('lang.Users_Social')}}   </label>
                                            <select name="relationship" class="form-control form-control-lg"  id="kt_select2_1">
                                                <option value="1">اعزب</option>
                                                <option value="2">متزوج </option>
                                            </select>
                                        </div>
                                        <!--end::Form Group-->
                                    </div>
                                    <!--end: Wizard Step 1-->
                                    <!--begin: Wizard Step 2-->
                                    <div class="pb-5" data-wizard-type="step-content">
                                        <!--begin::Title-->
                                        <div class="form-group">
                                            <label>{{__('lang.Users_Job_number')}} </label>
                                            <input type="number" class="form-control form-control-solid"  name="job_num" placeholder="{{__('lang.Users_Job_number')}}" value="">
                                        </div>
                                        <div class="form-group">
                                            <label>{{__('lang.Users_Dateofhiring')}}</label>
                                            <input type="text" class="form-control hijri-date-input" name="start_job_date" required placeholder="{{__('lang.Users_Dateofhiring')}}" >
                                        </div>
                                        <div class="form-group">
                                            <label> {{__('lang.Users_main')}}   </label>
                                            @inject('Job','App\Job')
                                            <select name="mainJob_id" class="form-control select2" id="kt_select2_11" style="width:100%" required>
                                                @foreach($Job->all() as $data)
                                                    <option value="{{$data->id}}">{{$data->name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label> {{__('lang.Users_Commissioning')}}   </label>
                                            @inject('Job','App\Job')
                                            <select name="subJob_id" class="form-control form-control-lg"  required  style="width:100%"  id="kt_select2_101">
                                                @foreach($Job->all() as $data)
                                                    <option value="{{$data->id}}">{{$data->name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label> {{__('lang.Users_Bonuses')}}   </label>
                                            @inject('Bonuses','App\Bonuses')
                                            <select name="bonuses_id" class="form-control form-control-lg"  required id="kt_select2_1">
                                                @foreach($Bonuses->all() as $data)

                                                        <option value="{{$data->id}}">{{$data->name}}</option>

                                                @endforeach
                                            </select>
                                        </div>



                                        <div class="form-group">
                                            <label>  {{__('lang.Users_Department')}}    </label>
                                            <input type="text" class="form-control form-control-solid" name="management" required placeholder="{{__('lang.Users_Department')}}" >
                                        </div>

                                        <div class="form-group">
                                            <label> {{__('lang.Users_Bank_name')}}    </label>
                                            @inject('Bank','App\Bank')
                                            <select name="bank_id" class="form-control form-control-lg"  id="kt_select2_1">
                                                @foreach($Bank->all() as $data)
                                                    <option value="{{$data->id}}">{{$data->name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label>{{__('lang.Users_IBAN')}} </label>
                                            <input type="text" class="form-control form-control-solid" name="ipan" placeholder="{{__('lang.Users_IBAN')}}" >
                                        </div>
                                        <div class="form-group">
                                            <label>{{__('lang.Users_Level')}} </label>
                                            <input type="number" class="form-control form-control-solid" name="jobLevel" placeholder="{{__('lang.Users_Level')}}" >
                                        </div>
                                        <div class="form-group">
                                            <label>{{__('lang.Users_degree')}}  </label>
                                            <input type="number" class="form-control form-control-solid" name="jobPercent" placeholder="{{__('lang.Users_degree')}}" >
                                        </div>
                                        <div class="form-group">
                                            <label>{{__('lang.Users_Distinguished')}}   </label>
                                            <input type="number" class="form-control form-control-solid" name="badalat" placeholder="{{__('lang.Users_Distinguished')}}" >
                                        </div>
                                        <div class="form-group">
                                            <label>  {{__('lang.Users_location')}}    </label>
                                            @inject('Category','App\Branch')
                                            <select name="category_id" class="form-control form-control-lg"  id="kt_select2_1">
                                                @foreach($Category->all() as $data)
                                                    <option value="{{$data->id}}">{{$data->name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label>  {{__('lang.Users_Insurance')}}    </label>
                                            @inject('Category','App\Insurance')
                                            <select name="insurance_id" class="form-control form-control-lg" style="width:100%"  id="kt_select2_1">
                                                @foreach($Category->all() as $data)
                                                    <option value="{{$data->id}}">{{$data->name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label>{{__('lang.Users_percentage')}}  </label>
                                            <input type="number" class="form-control form-control-solid" name="comp_insurance_percent" placeholder="{{__('lang.Users_percentage')}}" >
                                        </div>
                                        <div class="form-group">
                                            <label>{{__('lang.Users_employee_percentage')}} </label>
                                            <input type="number" class="form-control form-control-solid" name="emp_insurance_percent" placeholder="{{__('lang.Users_employee_percentage')}}" >
                                        </div>
                                         <div class="form-group">
                                            <label>{{__('lang.cost_center')}} </label>
                                            <select type="text" class="form-control form-control-solid" name="public_cost" >
                                                    <option value="1"> {{__('lang.public_cost')}}  </option>
                                                    <option value="2"> {{__('lang.cost_of_documentation')}} </option>
                                                    <option value="3"> {{__('lang.governance_cost')}}  </option>
                                                    <option value="4">  {{__('lang.cost_and_sustainability')}}  </option>
                                                    <option value="5">  {{__('lang.software_cost')}}  </option>
                                            </select>
                                        </div>

                                           <div class="form-group">
                                            <label>{{__('lang.contract_duration')}} </label>
                                            <select  class="form-control form-control-solid" name="contract_duration" >
                                                <option value="1">موسمية</option>
                                                <option value="2">سنوية</option>
                                                </select>
                                        </div>
                                        <!--end::Row-->
                                    </div>
                                    <!--end: Wizard Step 2-->
                                    <!--begin: Wizard Step 3-->
                                    <div class="pb-5" data-wizard-type="step-content">
                                        <!--begin::Title-->
                                        <div class="form-group">
                                            <label>{{__('lang.Users_Contract')}}  </label>
                                            <input type="number" class="form-control form-control-solid"  name="contract_num" required placeholder="{{__('lang.Users_Contract')}}" value="">
                                        </div>
                                        <div class="form-group">
                                            <label>{{__('lang.Users_Decision')}}</label>
                                            <input type="text" class="form-control hijri-date-input" required name="start_contract_date" placeholder="{{__('lang.Users_Decision')}}" >
                                        </div>
                                        <div class="form-group">
                                            <label>{{__('lang.Users_point')}}   </label>
                                            <input type="text" class="form-control form-control-solid" name="decision_point" required placeholder="{{__('lang.Users_point')}}" value="">
                                        </div>
                                        <div class="form-group">
                                            <label>{{__('lang.Users_expiration')}} </label>
                                            <input type="text" class="form-control hijri-date-input" required name="end_contract_date" placeholder="{{__('lang.Users_expiration')}}" >
                                        </div>
                                    </div>
                                    <!--end: Wizard Step 3-->
                                    <!--begin: Wizard Actions-->
                                    <div class="d-flex justify-content-between pt-7">
                                        <div class="mr-2">
                                            <button type="button" class="btn btn-light-primary font-weight-bolder font-size-h6 pr-8 pl-6 py-4 my-3 mr-3" data-wizard-type="action-prev">
                                <span class="svg-icon svg-icon-md ml-2">
                                    <!--begin::Svg Icon | path:assets/media/svg/icons/Navigation/Right-2.svg-->
                                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                        <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                            <polygon points="0 0 24 0 24 24 0 24" />
                                            <rect fill="#000000" opacity="0.3" transform="translate(8.500000, 12.000000) rotate(-90.000000) translate(-8.500000, -12.000000)" x="7.5" y="7.5" width="2" height="9" rx="1" />
                                            <path d="M9.70710318,15.7071045 C9.31657888,16.0976288 8.68341391,16.0976288 8.29288961,15.7071045 C7.90236532,15.3165802 7.90236532,14.6834152 8.29288961,14.2928909 L14.2928896,8.29289093 C14.6714686,7.914312 15.281055,7.90106637 15.675721,8.26284357 L21.675721,13.7628436 C22.08284,14.136036 22.1103429,14.7686034 21.7371505,15.1757223 C21.3639581,15.5828413 20.7313908,15.6103443 20.3242718,15.2371519 L15.0300721,10.3841355 L9.70710318,15.7071045 Z" fill="#000000" fill-rule="nonzero" transform="translate(14.999999, 11.999997) scale(1, -1) rotate(90.000000) translate(-14.999999, -11.999997)" />
                                        </g>
                                    </svg>
                                    <!--end::Svg Icon-->
                                </span>
                                                {{__('lang.Users_Previous')}}</button>
                                        </div>
                                        <div>
                                            <button type="button" form="kt_form" class="btn btn-primary font-weight-bolder font-size-h6 pl-8 pr-4 py-4 my-3" data-wizard-type="action-submit">{{__('lang.Users_Save')}}</button>
                                            <button type="button" class="btn btn-primary font-weight-bolder font-size-h6 pl-8 pr-4 py-4 my-3" data-wizard-type="action-next">{{__('lang.Users_Next')}}
                                                <span class="svg-icon svg-icon-md mr-2">
                                    <!--begin::Svg Icon | path:assets/media/svg/icons/Navigation/Left-2.svg-->
                                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                        <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                            <polygon points="0 0 24 0 24 24 0 24" />
                                            <rect fill="#000000" opacity="0.3" transform="translate(15.000000, 12.000000) scale(-1, 1) rotate(-90.000000) translate(-15.000000, -12.000000)" x="14" y="7" width="2" height="10" rx="1" />
                                            <path d="M3.7071045,15.7071045 C3.3165802,16.0976288 2.68341522,16.0976288 2.29289093,15.7071045 C1.90236664,15.3165802 1.90236664,14.6834152 2.29289093,14.2928909 L8.29289093,8.29289093 C8.67146987,7.914312 9.28105631,7.90106637 9.67572234,8.26284357 L15.6757223,13.7628436 C16.0828413,14.136036 16.1103443,14.7686034 15.7371519,15.1757223 C15.3639594,15.5828413 14.7313921,15.6103443 14.3242731,15.2371519 L9.03007346,10.3841355 L3.7071045,15.7071045 Z" fill="#000000" fill-rule="nonzero" transform="translate(9.000001, 11.999997) scale(-1, -1) rotate(90.000000) translate(-9.000001, -11.999997)" />
                                        </g>
                                    </svg>
                                                    <!--end::Svg Icon-->
                                </span></button>
                                        </div>
                                    </div>
                                    <!--end: Wizard Actions-->
                                </form>
                            </div>
                            <!--end::Container-->
                        </div>



                    </div>

                </div>
            </div>
        </div>
    </div>

    <div class="modal fade bs-edit-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" style="display: none;">
        <div class="modal-dialog modal-lg">
            <div class="modal-content card card-outline-info">
                <div class="modal-header card-header">
                    <h3 class="modal-title" id="myLargeModalLabel">{{__('lang.Users_Edit')}}</h3>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                </div>
                <div class="modal-body">

                </div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    <!-- /.modal -->

    <!-- /.modal -->

@section('js')
    <script src="{{asset('dashboard/assets/plugins/custom/datatables/datatables.bundle.js')}}"></script>
    <script src="{{asset('dashboard/assets/js/pages/crud/datatables/basic/basic.js')}}"></script>
    <script src="{{asset('dashboard/assets/js/pages/crud/file-upload/image-input.js')}}"></script>
    <script src="{{asset('dashboard/assets/js/pages/features/miscellaneous/sweetalert2.js')}}"></script>
    <script src="{{asset('dashboard/assets/js/pages/features/miscellaneous/dropify.min.js')}}"></script>
    <script src="{{asset('dashboard/assets/js/pages/custom/wizard/wizard-6.js')}}"></script>
		<script src="{{asset('dashboard/assets/js/pages/crud/forms/widgets/select2.js')}}"></script>
    <script src="{{asset('hijri/js/momentjs.js')}}"></script>
    <script src="{{asset('hijri/js/moment-with-locales.js')}}"></script>
    <script src="{{asset('hijri/js/moment-hijri.js')}}"></script>
    <script src="{{asset('hijri/js/bootstrap-hijri-datetimepicker.js')}}"></script>

 <script>
 //DataTable
 	var table = $('#kt_tdata').DataTable({
 			dom: 'Bfrtip',
 			"ordering":false,
 			  buttons: [
         'copy', 'excel', 'print'
     ],
 			@if( Request::segment(1) == "ar")
 					"language": {
 							"url": "//cdn.datatables.net/plug-ins/1.10.19/i18n/Arabic.json"
 					}
 			@endif
 	});
 </script>
    <!--begin::Page scripts(used by this page) -->
    <script type="text/javascript">


        $(function () {

            initHijrDatePicker();

            //initHijrDatePickerDefault();

            $('.disable-date').hijriDatePicker({

                minDate:"2020-01-01",
                maxDate:"2021-01-01",
                viewMode:"years",
                hijri:true,
                debug:true
            });

        });

        function initHijrDatePicker() {

            $(".hijri-date-input").hijriDatePicker({
                locale: "ar-sa",
                format: "DD-MM-YYYY",
                hijriFormat:"iYYYY-iMM-iDD",
                dayViewHeaderFormat: "MMMM YYYY",
                hijriDayViewHeaderFormat: "iMMMM iYYYY",
                showSwitcher: true,
                allowInputToggle: true,
                showTodayButton: false,
                useCurrent: true,
                isRTL: false,
                viewMode:'months',
                keepOpen: false,
                hijri: false,
                debug: true,
                showClear: true,
                showTodayButton: true,
                showClose: true
            });
        }

        function initHijrDatePickerDefault() {

            $(".hijri-date-input").hijriDatePicker();
        }


    </script>
    <!--begin::Page scripts(used by this page) -->
    <script>
  $('#kt_select2_101').select2({
         placeholder: ""
        });
        $('#kt_select2_11').select2({
         placeholder: ""
        });
        //Delete Row
        $("body").on("click", "#delete", function () {
            var dataList = [];
            dataList = $("#kt_datatable input:checkbox:checked").map(function(){
                return $(this).val();
            }).get();

            if(dataList.length >0){
                Swal.fire({
                    title: "{{__('lang.warrning')}}",
                    text: "",
                    icon: "warning",
                    showCancelButton: true,
                    confirmButtonColor: "#f64e60",
                    confirmButtonText: "{{__('lang.btn_yes')}}",
                    cancelButtonText: "{{__('lang.btn_no')}}",
                    closeOnConfirm: false,
                    closeOnCancel: false
                }).then(function (result) {
                    if (result.value) {
                        var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
                        $.ajax({
                            url:'{{url("Delete_User")}}',
                            type:"get",
                            data:{'id':dataList,_token: CSRF_TOKEN},
                            dataType:"JSON",
                            success: function (data) {
                                if(data.message == "Success")
                                {
                                    $("#kt_datatable .selected").hide();
                                    @if( Request::segment(1) == "ar")
                                    $('#delete').text('حذف 0 سجل');
                                    @else
                                    $('#delete').text('Delete 0 row');
                                    @endif
                                    Swal.fire("{{__('lang.Success')}}", "{{__('lang.Success_text')}}", "success");
                                    location.reload();
                                }else{
                                    Swal.fire("{{__('lang.Sorry')}}", "{{__('lang.Message_Fail_Delete')}}", "error");
                                }
                            },
                            fail: function(xhrerrorThrown){
                                Swal.fire("{{__('lang.Sorry')}}", "{{__('lang.Message_Fail_Delete')}}", "error");
                            }
                        });
                        // result.dismiss can be 'cancel', 'overlay',
                        // 'close', and 'timer'
                    } else if (result.dismiss === 'cancel') {
                        Swal.fire("{{__('lang.Cancelled')}}", "{{__('lang.Message_Cancelled_Delete')}}", "error");
                    }
                });
            }
        });

        $(document).ready(function() {
            // Basic
            $('.dropify').dropify();

            // Used events
            var drEvent = $('#input-file-events').dropify();

            drEvent.on('dropify.beforeClear', function(event, element) {
                return confirm("Do you really want to delete \"" + element.file.name + "\" ?");
            });

            drEvent.on('dropify.afterClear', function(event, element) {
                alert('File deleted');
            });

            drEvent.on('dropify.errors', function(event, element) {
                console.log('Has Errors');
            });

            var drDestroy = $('#input-file-to-destroy').dropify();
            drDestroy = drDestroy.data('dropify')
            $('#toggleDropify').on('click', function(e) {
                e.preventDefault();
                if (drDestroy.isDropified()) {
                    drDestroy.destroy();
                } else {
                    drDestroy.init();
                }
            })
        });

        $(".edit-notation").click(function(){
            var id=$(this).data('id')
            var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
            $.ajax({
                type: "GET",
                url: "{{url('Edit_User_notation')}}",
                data: {"id":id},
                success: function (data) {
                    $(".bs-edit-modal-lg .modal-body").html(data)
                    $(".bs-edit-modal-lg").modal('show')
                    $(".bs-edit-modal-lg").on('hidden.bs.modal',function (e){
                        //   $('.bs-edit-modal-lg').empty();
                        $('.bs-edit-modal-lg').hide();
                    })
                }
            })
        })
        $(".edit-inboxGroup").click(function(){
            var id=$(this).data('id')
            var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
            $.ajax({
                type: "GET",
                url: "{{url('Edit_UserinboxGroup')}}",
                data: {"id":id},
                success: function (data) {
                    $(".bs-edit-modal-lg .modal-body").html(data)
                    $(".bs-edit-modal-lg").modal('show')
                    $(".bs-edit-modal-lg").on('hidden.bs.modal',function (e){
                        //   $('.bs-edit-modal-lg').empty();
                        $('.bs-edit-modal-lg').hide();
                    })
                }
            })
        })

        //End Delete Row
        $(".edit-Shift").click(function(){
            var id=$(this).data('id')
            var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
            $.ajax({
                type: "GET",
                url: "{{url('User_shifts')}}",
                data: {"id":id},
                success: function (data) {
                    $(".bs-edit-modal-lg .modal-body").html(data)
                    $(".bs-edit-modal-lg").modal('show')
                    $(".bs-edit-modal-lg").on('hidden.bs.modal',function (e){
                        //   $('.bs-edit-modal-lg').empty();
                        $('.bs-edit-modal-lg').hide();
                    })
                }
            })
        })

        $(".edit-Advert").click(function(){
            var id=$(this).data('id')
            var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
            $.ajax({
                type: "GET",
                url: "{{url('Edit_User')}}",
                data: {"id":id},
                success: function (data) {
                    $(".bs-edit-modal-lg .modal-body").html(data)
                    $(".bs-edit-modal-lg").modal('show')
                    $(".bs-edit-modal-lg").on('hidden.bs.modal',function (e){
                        //   $('.bs-edit-modal-lg').empty();
                        $('.bs-edit-modal-lg').hide();
                    })
                }
            })
        })

        $(".switchery-demo").click(function(){
            var id=$(this).data('id')
            var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
            $.ajax({
                type: "get",
                url: "{{url('UpdateStatusUser')}}",
                data: {"id":id,_token:CSRF_TOKEN},
                success: function (data) {
                    Swal.fire("@if(Request::segment(1) == 'ar' ) تم  @else Success @endif ", "@if(Request::segment(1) == 'ar' ) تم التعديل بنجاح   @else Successfully changed @endif", "success");

                }
            })
        })
    </script>

    <?php
    $message=session()->get("message");
    ?>

    @if( session()->has("message"))
        @if( $message == "Success")
            <script>
                Swal.fire({
                    icon: 'success',
                    title: "{{__('lang.Success')}}",
                    text: "{{__('lang.Success_text')}}",
                    type:"success" ,
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
                    type:"error" ,
                    timer: 2000,
                    showConfirmButton: false
                });
            </script>
        @endif

          @if( $message == "phone")
        <script>
            Swal.fire({
                icon: 'warning',
                title: "{{__('lang.Sorry')}}",
                text: "عفوا رقم الهاتف موجود بالفعل",
                type:"error" ,
                timer: 2000,
                showConfirmButton: false
            });
        </script>
    @endif
       @if( $message == "email")
        <script>
            Swal.fire({
                icon: 'warning',
                title: "{{__('lang.Sorry')}}",
                text: "عفوا البريد الالكتروني موجود بالفعل",
                type:"error" ,
                timer: 2000,
                showConfirmButton: false
            });
        </script>
    @endif
       @if( $message == "job_num")
        <script>
            Swal.fire({
                icon: 'warning',
                title: "{{__('lang.Sorry')}}",
                text: "عفوا رقم الوظيفة موجود بالفعل",
                type:"error" ,
                timer: 2000,
                showConfirmButton: false
            });
        </script>
    @endif
       @if( $message == "contract_num")
        <script>
            Swal.fire({
                icon: 'warning',
                title: "{{__('lang.Sorry')}}",
                text: "عفوا رقم العقد موجود بالفعل",
                type:"error" ,
                timer: 2000,
                showConfirmButton: false
            });
        </script>
    @endif
    @endif

@endsection

@endsection

