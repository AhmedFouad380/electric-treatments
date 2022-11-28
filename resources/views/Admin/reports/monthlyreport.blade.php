@extends('layout.layout')

@section('title')
    {{__('lang.monthlyreport')}}
@endsection
@section('css')
    <link href="{{asset('dashboard/assets/plugins/custom/datatables/datatables.bundle.css')}}" rel="stylesheet"
          type="text/css"/>
@endsection

@section('content')

    <!--begin::Entry-->
    <div class="d-flex flex-column-fluid">
        <div class="row">
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
                                    <a href="{{url('resources')}}" class="text-muted">{{trans('lang.HR')}}</a>
                                </li>
                                {{--                            <li class="breadcrumb-item">--}}
                                {{--                                <a href="" class="text-muted">Profile</a>--}}
                                {{--                            </li>--}}
                                <li class="breadcrumb-item">
                                    <a href="{{url('reports')}}" class="text-muted">{{trans('lang.Reports')}}</a>
                                </li>
                                <li class="breadcrumb-item">
                                    <h5 class="text-dark font-weight-bold my-1 mr-5 ">{{trans('lang.monthlyreport')}}</h5>
                                </li>
                            </ul>

                            <!--end::Breadcrumb-->
                        </div>
                        <!--end::Page Heading-->
                    </div>
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
                        <h3 class="card-label">{{__('lang.monthlyreport')}}
                    </div>
                    <div class="card-toolbar">

                        <a href="{{url('printmonthlyreport')}}" target="_blank" class="btn btn-info">
                            <i class="icon-printer4"></i>{{trans('lang.print')}} </a>


                    </div>
                </div>
                <div class="card-body">

                    {!! Form::open(['url' => ['mothlyreport'] , 'method'=>'get']) !!}
                    {!! csrf_field() !!}
                    <div class="row">
                        <div class="form-group col-md-4">
                            <strong>{{trans('lang.filter_from')}}</strong>
                            {{ Form::date('filter_from',old('filter_from'),["class"=>"form-control" ,'required']) }}
                        </div>
                        <div class="form-group col-md-4">
                            <strong>{{trans('lang.filter_to')}}</strong>
                            {{ Form::date('filter_to',old('filter_to'),["class"=>"form-control" ,'required']) }}
                        </div>


                        <div class="form-group col-md-4">
                            <strong>{{trans('lang.employee')}}</strong>

                            <select name="user" id="user" class='form-control' required>
                                @foreach($emps as $user)
                                    <option value="{{$user->id}}"> {{$user->name}} </option>

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


                    <h3>{{trans('lang.monthlyreport')}}</h3>


                    <!--begin: Datatable-->
                    <table class="table table-bordered table-hover table-">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>{{trans('lang.datee')}} </th>
                            <th>{{trans('lang.shiftt')}} </th>
                            <th>{{trans('lang.day')}} </th>
                            <th>{{trans('lang.attendance_delay')}}</th>
                            <th>{{trans('lang.leave_early')}}</th>
                            <th>{{trans('lang.attendance_early')}}</th>
                            <th>{{trans('lang.leave_delay')}}</th>
                            <th>{{trans('lang.no_attendance')}}</th>
                            <th>{{trans('lang.no_leave')}}</th>
                            <th>{{trans('lang.absences')}}</th>

                        </tr>
                        </thead>
                        <tbody>
                        @php
                            $id = 1;
                        @endphp
                        @foreach($temp as $temp)
                            <tr>
                            <tr>
                                <th scope="row">{{$id}}</th>
                                <td>{{$temp->check_date}}</td>
                                <td>{{$temp->shift}} </td>
                                <td>{{$temp->day}} </td>
                                @if($temp->attendance_delay == null)
                                    <td></td>
                                @else
                                    <td>{{ date('H:i', strtotime($temp->attendance_delay))}} </td>

                                @endif
                                @if($temp->leave_early == null)
                                    <td></td>
                                @else
                                    <td>{{ date('H:i', strtotime($temp->leave_early))}} </td>

                                @endif
                                @if($temp->attendance_early == null)
                                    <td></td>
                                @else
                                    <td>{{ date('H:i', strtotime($temp->attendance_early))}} </td>

                                @endif
                                @if($temp->leave_delay == null)
                                    <td></td>
                                @else
                                    <td>{{ date('H:i', strtotime($temp->leave_delay))}} </td>

                                @endif

                                @if($temp->no_attendance == 'no')
                                    <td></td>
                                @else
                                    {{--                                                                                        <td>{{$temp->no_attendance}}</td>--}}
                                    <td><i class="fa fa-check-circle"></i></td>
                                @endif
                                @if($temp->no_leave == 'no')
                                    <td></td>
                                @else
                                    {{--                                                                                        <td>{{$temp->no_leave}}</td>--}}

                                    <td><i class="fa fa-check-circle"></i></td>
                                @endif
                                @if($temp->absences == 'no')
                                    <td></td>
                                @else
                                    {{--                                                                                        <td>{{$temp->absences}}</td>--}}
                                    <td><i class="fa fa-check-circle"></i></td>
                                @endif


                            </tr>
                            @php
                                $id++;
                            @endphp

                        @endforeach
                        </tbody>
                    </table>
                    <!--end: Datatable-->
                    <br>
                    <br>
                    <br>
                    <h3>{{trans('lang.summary')}}</h3>

                    <table class="table table-bordered table-hover ">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>{{trans('lang.statement')}} </th>
                            <th>{{trans('lang.withPermission')}} </th>
                            <th>{{trans('lang.withoutPermission')}} </th>
                            <th>{{trans('lang.total')}}</th>
                        </tr>
                        </thead>
                        <tbody>
                        @php
                            $id = 1;
                        @endphp

                        @foreach($temp_summary as $temp_summary)
                            <tr>
                                <th scope="row">{{$id}}</th>
                                <td>{{trans('lang.'.$temp_summary->name)}}</td>
                                <td>{{$temp_summary->with}} </td>
                                <td>{{$temp_summary->without}} </td>
                                <td>{{$temp_summary->total}} </td>
                            </tr>
                            @php
                                $id++;
                            @endphp

                        @endforeach

                        </tbody>
                    </table>


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
