@extends('layout.layout')

@section('title')
    {{__('lang.Archieve')}}
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
                                                            <a href="{{url('reports')}}" class="text-muted">{{trans('lang.Reports')}}</a>
                                                        </li>
                            <li class="breadcrumb-item">
                                <h5 class="text-dark font-weight-bold my-1 mr-5 ">{{trans('lang.Archieve')}}</h5>
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
                        <h3 class="card-label">{{__('lang.Archieve')}}
                    </div>
                    <div class="card-toolbar">
                        <!--begin::Button-->
                                                <button type="button" data-toggle="modal" data-toggle="modal" data-target="#uploadModal" class="btn btn-primary font-weight-bolder">
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
                                  </span> {{__('lang.upload')}}</button>
                        &nbsp;&nbsp;

                    </div>
                </div>
                <div class="card-body">

                    {!! Form::open(['url' => ['reports/archieves-search'] , 'method'=>'get']) !!}
                    {!! csrf_field() !!}
                    <div class="row">
                        <div class="form-group col-md-4">
                            <strong>{{trans('lang.filter_from')}}</strong>
                            {{ Form::date('filter_from',old('filter_from'),["class"=>"form-control" ]) }}
                        </div>
                        <div class="form-group col-md-4">
                            <strong>{{trans('lang.filter_to')}}</strong>
                            {{ Form::date('filter_to',old('filter_to'),["class"=>"form-control" ]) }}
                        </div>


                        <div class="form-group col-md-4">
                            <strong>{{trans('lang.employee')}}</strong>

                            <select name="user" id="user" class='form-control'>
                                <option value="all">{{trans('lang.allemployees')}}</option>


                                @foreach($emp as $user)
                                    <option value="{{$user->id}}">{{$user->name}}</option>

                                @endforeach
                            </select>
                        </div>
                        <div class="form-group col-md-12">
                        <button type="submit" class="btn btn-primary btn-block"><i
                                class="flaticon2-magnifier-tool"></i>{{trans('lang.search')}}</button>
                        </div>
                        {{ Form::close() }}

                    </div>
                    <br>
                    <br>
                    <br>


                <h3>{{trans('lang.Archieve')}}</h3>

                <div style="text-align: center;">
                    <h4>من {{$from_date}} الى {{$to_date}}
                        @if($users == "all")
                            ({{trans('lang.allemps')}})
                        @else
                 ({{$users->name}})
                        @endif
                    </h4>
                </div>
                <!--begin: Datatable-->
                <table class="table table-bordered table-hover table-checkable mt-10" id="kt_datatable">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>{{__('lang.empname')}} </th>
                        <th>{{__('lang.datee')}} </th>
                        <th>{{__('lang.hijri_date')}} </th>
                        <th>{{__('lang.checktime')}} </th>
                        <th> {{__('lang.image')}}  </th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($attendances as $User)
                        <tr>
                            <td>
                                <label class="checkbox checkbox-single">
                                    <input type="checkbox" value="{{$User->id}}" class="checkable"
                                           name="check_delete[]"/>
                                    <span></span>
                                </label>
                            </td>
                            <td>
                                <div class="kt-user-card-v2">
                                    <div class="kt-user-card-v2__details">
                                        <span class="kt-user-card-v2__name"></span>
                                        {{$User->getUser->name}}
                                    </div>
                                </div>
                            </td>
                            <td>
                                <div class="kt-user-card-v2">
                                    <div class="kt-user-card-v2__details">
                                        <span class="kt-user-card-v2__name"></span>
                                        {{$User->check_date}}
                                    </div>
                                </div>
                            </td> <td>
                                <div class="kt-user-card-v2">
                                    <div class="kt-user-card-v2__details">
                                        <span class="kt-user-card-v2__name"></span>
                                        {{\Carbon\Carbon::parse($User->hijri_date)->format('Y-m-d')}}
                                    </div>
                                </div>
                            </td>
                            <td>
                                <div class="kt-user-card-v2">
                                    <div class="kt-user-card-v2__details">
                                        <span class="kt-user-card-v2__name"></span>
                                        {{ date('H:i', strtotime($User->check_time))}}
                                    </div>
                                </div>
                            </td>
                            <td>
                                <div class="kt-user-card-v2">
                                    <div class="kt-user-card-v2__details">
                                        <span class="kt-user-card-v2__name"></span>
                                        @if($User->image != null)
                                            <a href="{{url('public/'.$User->image)}}" target="_blank">
                                                <img style="width: 25px;height: 15px"
                                                     src="{{url('public/'.$User->image)}}"></a>

                                        @endif
                                    </div>
                                </div>
                            </td>
                            {{--                                <td nowrap="nowrap">--}}
                            {{--                                    <a  class="btn btn-icon btn-success btn-sm btn-clean btn-icon btn-icon-md edit-Advert"   data-id="{{$User->id}}" data-original-title="{{__('lang.Banks_Edit')}}" title="{{__('lang.Banks_Edit')}}">--}}
                            {{--                                        <i class="flaticon-edit icon-nm"></i>--}}
                            {{--                                    </a>--}}
                            {{--                                </td>--}}
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                <!--end: Datatable-->

            </div>
        </div>
        <!--end::Card-->
    </div>
    <!--end::Container-->
    </div>



    <div id="uploadModal" class="modal fade" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">

                <div class="modal-body">
                    <h4 align="center" class="card-title" style="margin:0;">{{trans('lang.upload')}}</h4>
                </div>
                <div class="card-body">

                    <div class="row">
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <strong style="color:#ff0000;">

                                    برجاء رفع جدول  CHECKINOUT بصيغه  xlsx ... سيتم استبعاد الموظفين غير المربوطين بالنظام وجهاز البصمة
                            </strong>

                            {!! Form::open(['url' => ['import'] ,"files"=>'true','method'=>'post']) !!}
                            {!! csrf_field() !!}


                            <div class="form-group">
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <input type="file" name="file" id="file"required>
                                </div>
                            </div>

                            <div class="modal-footer">
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    {{ Form::submit( trans('lang.Banks_Save') ,['class'=>'btn btn-info']) }}
                                    <button data-dismiss="modal" class="btn btn-danger" type="button">
                                        {{trans('lang.Banks_Close')}}
                                    </button>
                                </div>
                                {{ Form::close() }}
                            </div>
                        </div>
                    </div>


                </div>
            </div>
        </div>
    </div>




    <div class="modal fade" id="kt_modal_4" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
         aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">
                        {{__('lang.Banks_Create')}}</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    </button>
                </div>
                <div class="modal-body">
                    <form method="post" action="/Store_Bank">
                        @csrf
                        <div class="col-xl-12">
                            <div class="kt-section__body">

                                <div class="form-group row">
                                    <label class="col-xl-3 col-lg-3 col-form-label">{{__('lang.Banks_Name')}}</label>
                                    <div class="col-lg-9 col-xl-9">
                                        <input class="form-control" type="text" name="name" value="">
                                    </div>
                                </div>


                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary"
                                    data-dismiss="modal">{{__('lang.Banks_Close')}}</button>
                            <button type="submit" class="btn btn-primary">{{__('lang.Banks_Save')}}</button>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>

    <!-- /.modal -->
    <div class="modal fade bs-edit-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel"
         aria-hidden="true" style="display: none;">
        <div class="modal-dialog modal-lg">
            <div class="modal-content card card-outline-info">
                <div class="modal-header card-header">
                    <h3 class="modal-title" id="myLargeModalLabel">{{__('lang.Banks_Edit')}}</h3>
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

@section('js')
    <script src="{{asset('dashboard/assets/plugins/custom/datatables/datatables.bundle.js')}}"></script>
    <script src="{{asset('dashboard/assets/js/pages/crud/datatables/basic/basic.js')}}"></script>
    <script src="{{asset('dashboard/assets/js/pages/features/miscellaneous/sweetalert2.js')}}"></script>
    <script src="{{asset('dashboard/assets/js/pages/features/miscellaneous/dropify.min.js')}}"></script>
    <!--begin::Page scripts(used by this page) -->

    <script>

        $("body").on("click", "#delete", function () {
            var dataList = [];
            dataList = $("#kt_datatable input:checkbox:checked").map(function () {
                return $(this).val();
            }).get();

            if (dataList.length > 0) {
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
                            url: '{{url("Delete_Bank")}}',
                            type: "get",
                            data: {'id': dataList, _token: CSRF_TOKEN},
                            dataType: "JSON",
                            success: function (data) {
                                if (data.message == "Success") {
                                    $("#kt_datatable .selected").hide();
                                    @if( Request::segment(1) == "ar")
                                    $('#delete').text('حذف 0 سجل');
                                    @else
                                    $('#delete').text('Delete 0 row');
                                    @endif
                                    Swal.fire("{{__('lang.Success')}}", "{{__('lang.Success_text')}}", "success");
                                    location.reload();
                                } else {
                                    Swal.fire("{{__('lang.Sorry')}}", "{{__('lang.Message_Fail_Delete')}}", "error");
                                }
                            },
                            fail: function (xhrerrorThrown) {
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

        $(document).ready(function () {
            // Basic
            $('.dropify').dropify();

            // Used events
            var drEvent = $('#input-file-events').dropify();

            drEvent.on('dropify.beforeClear', function (event, element) {
                return confirm("Do you really want to delete \"" + element.file.name + "\" ?");
            });

            drEvent.on('dropify.afterClear', function (event, element) {
                alert('File deleted');
            });

            drEvent.on('dropify.errors', function (event, element) {
                console.log('Has Errors');
            });

            var drDestroy = $('#input-file-to-destroy').dropify();
            drDestroy = drDestroy.data('dropify')
            $('#toggleDropify').on('click', function (e) {
                e.preventDefault();
                if (drDestroy.isDropified()) {
                    drDestroy.destroy();
                } else {
                    drDestroy.init();
                }
            })
        });

        //End Delete Row
        $(".edit-Advert").click(function () {
            var id = $(this).data('id')
            var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
            $.ajax({
                type: "GET",
                url: "{{url('Edit_Bank')}}",
                data: {"id": id},
                success: function (data) {
                    $(".bs-edit-modal-lg .modal-body").html(data)
                    $(".bs-edit-modal-lg").modal('show')
                    $(".bs-edit-modal-lg").on('hidden.bs.modal', function (e) {
                        //   $('.bs-edit-modal-lg').empty();
                        $('.bs-edit-modal-lg').hide();
                    })
                }
            })
        })

        $(".switchery-demo").click(function () {
            var id = $(this).data('id');
            console.log(id);
            $.ajax({
                type: "get",
                url: "{{url('UpdateStatusUser')}}",
                data: {"id": id},
                success: function (data) {
                    Swal.fire({
                        title: "@if(Request::segment(1)=='ar')  نجاح @else success @endif",
                        text: "@if(Request::segment(1) == 'ar' ) تم التعديل بنجاح   @else Successfully changed @endif",
                        type: "success",
                        timer: 1000,
                        showConfirmButton: false
                    });


                }
            })
        })
    </script>

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
