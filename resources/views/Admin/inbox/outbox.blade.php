@extends('layout.layout')

@section('title')
    {{__('lang.TransactionsOutgoing')}}
@endsection
@section('css')
    <link href="{{asset('dashboard/assets/plugins/custom/datatables/datatables.bundle.css')}}" rel="stylesheet" type="text/css" />
@endsection

@section('content')

    <div class="d-flex flex-column-fluid">
        <!--begin::Container-->
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
                                <a href="{{url('transactions')}}" class="text-muted">{{trans('lang.Transactions')}}</a>
                            </li>
                            {{--                            <li class="breadcrumb-item">--}}
                            {{--                                <a href="" class="text-muted">Profile</a>--}}
                            {{--                            </li>--}}

                            <li class="breadcrumb-item">
                                <h5 class="text-dark font-weight-bold my-1 mr-5 ">{{trans('lang.TransactionsOutgoing')}}</h5>
                            </li>
                        </ul>

                        <!--end::Breadcrumb-->
                    </div>
                    <!--end::Page Heading-->
                </div>
            </div>
        </div>

        <div class="container">
            <br><br><br>
            <!--begin::Inbox-->
            <div class="d-flex flex-row">

                <!--begin::List-->
                <div class="flex-row-fluid ml-lg-8 d-block" id="kt_inbox_list">
                    <!--begin::Card-->
{{--                    <div class="card card-custom gutter-b">--}}
{{--                        <div class="card-body">--}}
{{--                            <form method="get" action="/transactions/outBoxSearch">--}}
{{--                                <div class="row">--}}
{{--                                    <div class="col-lg-8">--}}

{{--                                        <div class="form-group row">--}}
{{--                                            <div class="col-lg-4" style="padding-left: 0px;padding-right: 0px;">--}}
{{--                                                <select class="form-control form-control-lg btn-success" style="border-radius: 0px;"   id="kt_select2_1" name="type" required>--}}
{{--                                                    <option value="5">{{__('lang.Letter_number')}}</option>--}}
{{--                                                    <option value="2">{{__('lang.Topic')}}</option>--}}
{{--                                                    <option value="1">{{__('lang.consignee')}}</option>--}}
{{--                                                </select>--}}
{{--                                            </div>--}}
{{--                                            <div class="col-lg-8" style="padding-left: 0px;padding-right: 0px;">--}}
{{--                                                <input type="text" style="border-radius: 0px;" name="search" class="form-control form-control-solid form-control-lg" aria-label="Text input with dropdown button" placeholder="{{__('lang.Search')}}"/>--}}
{{--                                            </div>--}}

{{--                                        </div>--}}
{{--                                    </div>--}}

{{--                                    <div class="col-lg-4">--}}
{{--                                        <button type="#" class="btn btn-primary form-control-lg mr-2"><i class="flaticon2-magnifier-tool"></i></button>--}}
{{--                                    </div>--}}

{{--                                    <div class="col-lg-7">--}}
{{--                                        <div class="">--}}
{{--                                            <div class="radio-inline">--}}
{{--                                                <label class="radio">--}}
{{--                                                    <input type="radio" name="filter" value="1" checked="checked"/>--}}
{{--                                                    <span></span> {{__('lang.show_all')}}</label>--}}
{{--                                                <label class="radio">--}}
{{--                                                    <input type="radio" name="filter"  value="2" />--}}
{{--                                                    <span></span> {{__('lang.Secret_transactions')}}</label>--}}
{{--                                                <label class="radio">--}}
{{--                                                    <input type="radio" name="filter"  value="3" />--}}
{{--                                                    <span></span>{{__('lang.Urgent_transactions')}} </label>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}

{{--                                </div>--}}

{{--                            </form>--}}
{{--                        </div>--}}
{{--                    </div>--}}
                    <!--end::Card-->

                    <!--begin::Card-->
                    <div class="card card-custom gutter-b">
                        <div class="card-body">
                            <!--begin: Datatable-->
                            <div class="table-responsive">
                                <table class="table table-bordered table-hover table-checkable mt-10" id="datatable">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>{{__('lang.Speech')}}</th>
                                    <th>{{__('lang.Attachment')}}</th>
                                    <th>{{__('lang.Transaction_number')}}</th>
                                    <th>{{__('lang.sender')}}</th>
                                    <th>{{__('lang.Topic')}}</th>
                                    <th>{{__('lang.Guidance')}}</th>
                                    <th style="width:100px !important;">{{__('lang.HijriDate')}}</th>
                                    <th>{{__('lang.Date')}}</th>
{{--                                    <th>{{__('lang.time')}}</th>--}}
                                    <th>{{__('lang.Details')}} </th>

                                </tr>
                                </thead>
                                <tbody>


                                </tbody>
                            </table>
                            </div>
                            <!--end: Datatable-->
                        </div>
                    </div>
                    <!--end::Card-->
                </div>
                <!--end::List-->
            </div>
            <!--end::Inbox-->
        </div>
        <!--end::Container-->
    </div>
    <!--end::Entry-->





@section('js')
    <script src="{{asset('dashboard/assets/plugins/custom/datatables/datatables.bundle.js')}}"></script>
    <script src="{{asset('dashboard/assets/js/pages/crud/datatables/basic/basic.js')}}"></script>
    <script src="{{asset('dashboard/assets/js/pages/features/miscellaneous/sweetalert2.js')}}"></script>
    <script src="{{asset('dashboard/assets/js/pages/features/miscellaneous/dropify.min.js')}}"></script>
    <script src="{{asset('dashboard/assets/js/pages/custom/inbox/inbox.js')}}"></script>
    <!--begin::Page scripts(used by this page) -->
    <script type="text/javascript">
        $(function () {
            var table = $('#datatable').DataTable({
                processing: true,
                serverSide: true,
                autoWidth: false,
                responsive: true,
                aaSorting: [],
                "dom": "<'card-header border-0 p-0 pt-6'<'card-title' <'d-flex align-items-center position-relative my-1'f> r> <'card-toolbar' <'d-flex justify-content-end add_button'B> r>>  <'row'l r> <''t><'row'<'col-md-5 col-sm-12'i><'col-md-7 col-sm-12'p>>", // horizobtal scrollable datatable
                lengthMenu: [[10, 25, 50, 100, 250, -1], [10, 25, 50, 100, 250, "الكل"]],
                "language": {
                    search: '<i class="fa fa-eye" aria-hidden="true"></i>',
                    searchPlaceholder: 'بحث سريع',
                    "url": "{{ url('admin/assets/ar.json') }}"
                },
                buttons: [
                    // {extend: 'print', className: 'btn btn-light-primary mr-1 ', text: '<i class="fa fa-print fs-2x"></i>'},
                    // {extend: 'pdf', className: 'btn btn-raised btn-danger', text: 'PDF'},
                    // {extend: 'excel', className: 'btn btn-light-primary mr-1', text: '<i class="fa fa-file-excel  fs-2x"></i>'},
                    // {extend: 'colvis', className: 'btn secondary', text: 'إظهار / إخفاء الأعمدة '}

                ],
                @if( Request::segment(1) == "ar")
                "language": {
                    "url": "//cdn.datatables.net/plug-ins/1.10.19/i18n/Arabic.json"
                },
                @endif
                ajax: {
                    url: '{{ route('outbox-Datatable') }}',
                    data: {
                        pageType:'outbox'


                    }
                },
                columns: [
                    {data: 'checkbox', name: 'checkbox', "searchable": false, "orderable": false},
                    {data: 'letter', name: 'letter', "searchable": false, "orderable": true},
                    {data: 'InboxAttachment', name: 'InboxAttachment', "searchable": false, "orderable": true},
                    {data: 'id', name: 'id', "searchable": true, "orderable": true},
                    {data: 'sender_id', name: 'sender_id', "searchable": false, "orderable": true},
                    {data: 'title', name: 'title', "searchable": true, "orderable": true},
                    {data: 'reciver_id', name: 'reciver_id', "searchable": false, "orderable": true},
                    {data: 'hijri_date', name: 'hijri_date', "searchable": false, "orderable": true},
                    {data: 'date', name: 'date', "searchable": false, "orderable": true},
                    {data: 'actions', name: 'actions', "searchable": false, "orderable": true},

                ]
            });

        });
    </script>

    <script>

        $("body").on("click", "#delete", function () {
            var dataList = [];
            dataList = $("#kt_datatable input:checkbox:checked").map(function(){
                return $(this).val();
            }).get();

            if(dataList.length >0){
                Swal.fire({
                    title: "{{trans('word.Are you sure?')}}",
                    text: "",
                    icon: "warning",
                    showCancelButton: true,
                    confirmButtonColor: "#f64e60",
                    confirmButtonText: "{{trans('word.Yes, Sure it!')}}",
                    cancelButtonText: "{{trans('word.No')}}",
                    closeOnConfirm: false,
                    closeOnCancel: false
                }).then(function (result) {
                    if (result.value) {
                        var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
                        $.ajax({
                            url:'{{url("Delete_Bank")}}',
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
                                    Swal.fire("{{trans('word.Deleted')}}", "{{trans('word.Message_Delete')}}", "success");
                                    location.reload();
                                }else{
                                    Swal.fire("{{trans('word.Sorry')}}", "{{trans('word.Message_Fail_Delete')}}", "error");
                                }
                            },
                            fail: function(xhrerrorThrown){
                                Swal.fire("{{trans('word.Sorry')}}", "{{trans('word.Message_Fail_Delete')}}", "error");
                            }
                        });
                        // result.dismiss can be 'cancel', 'overlay',
                        // 'close', and 'timer'
                    } else if (result.dismiss === 'cancel') {
                        Swal.fire("{{trans('word.Cancelled')}}", "{{trans('word.Message_Cancelled_Delete')}}", "error");
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

        //End Delete Row
        $(".edit-Advert").click(function(){
            var id=$(this).data('id')
            var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
            $.ajax({
                type: "GET",
                url: "{{url('Edit_Bank')}}",
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
            var id =$(this).data('id');
            console.log(id);
            $.ajax({
                type: "get",
                url: "{{url('UpdateStatusUser')}}",
                data: {"id":id },
                success: function (data) {
                    Swal.fire({
                        title: "@if(Request::segment(1)=='ar')  نجاح @else success @endif",
                        text: "@if(Request::segment(1) == 'ar' ) تم التعديل بنجاح   @else Successfully changed @endif",
                        type:"success" ,
                        timer: 1000,
                        showConfirmButton: false
                    });


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
                    title: "@if(Request::segment(1)=='ar')  نجاح @else Le succès @endif",
                    text: "@if(Request::segment(1)=='ar')  تمت العملية بنجاح   @else complété avec succès @endif",
                    type:"success" ,
                    timer: 1000,
                    showConfirmButton: false
                });

            </script>
        @elseif ( $message == "Failed")
            <script>
                Swal.fire({
                    icon: 'warning',
                    title: "{{trans('word.Sorry')}}",
                    text: "{{trans('word.the operation failed')}}",
                    type:"error" ,
                    timer: 2000,
                    showConfirmButton: false
                });
            </script>
        @endif
    @endif
@endsection
@endsection
