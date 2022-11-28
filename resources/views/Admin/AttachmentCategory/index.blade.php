@extends('layout.layout')

@section('title')
    {{__('lang.AttachmentCategory_Title')}}
@endsection
@section('css')
    <link href="{{asset('dashboard/assets/plugins/custom/datatables/datatables.bundle.css')}}" rel="stylesheet" type="text/css" />
@endsection

@section('content')


    <!--begin::Entry-->
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
                                <a href="{{url('settings')}}" class="text-muted">{{trans('lang.Settings')}}</a>
                            </li>
                            {{--                            <li class="breadcrumb-item">--}}
                            {{--                                <a href="" class="text-muted">Profile</a>--}}
                            {{--                            </li>--}}
                            <li class="breadcrumb-item">
                                <a href="{{url('settings/InboxSetting')}}" class="text-muted">@if(Request::segment(1) == 'ar')  اعدادات البريد  @else Inbox Setting @endif</a>
                            </li>
                            <li class="breadcrumb-item">
                                <h5 class="text-dark font-weight-bold my-1 mr-5 ">{{trans('lang.AttachmentCategory_Title')}}</h5>
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
            <br>            <!--begin::Card-->
            <div class="card card-custom gutter-b">
                <div class="card-header flex-wrap py-3">
                    <div class="card-title">
                        <h3 class="card-label">{{__('lang.AttachmentCategory_Title')}}
                    </div>
                </div>
                <div class="card-body">
                    <!--begin: Datatable-->
                    <table class="table table-bordered table-hover table-checkable mt-10" id="users_table">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>{{__('lang.AttachmentCategory_Name')}} </th>
                            <th> {{__('lang.AttachmentCategory_Edit')}}  </th>
                        </tr>
                        </thead>
                        <tbody>
                        </tbody>
                    </table>
                </div>
            </div>
            <!--end::Card-->
        </div>
        <!--end::Container-->
    </div>



    <div class="modal fade" id="kt_modal_4" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">
                        {{__('lang.AttachmentCategory_Create')}}</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    </button>
                </div>
                <div class="modal-body">
                    <form method="post" action="/Store_AttachmentCategory">
                        @csrf
                        <div class="col-xl-12">
                            <div class="kt-section__body">

                                <div class="form-group row">
                                    <label class="col-xl-3 col-lg-3 col-form-label">{{__('lang.AttachmentCategory_Name')}}</label>
                                    <div class="col-lg-9 col-xl-9">
                                        <input class="form-control" type="text" name="name" value="">
                                    </div>
                                </div>


                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">{{__('lang.AttachmentCategory_Close')}}</button>
                            <button type="submit" class="btn btn-primary">{{__('lang.AttachmentCategory_Save')}}</button>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>
@section('js')
    <script src="{{asset('dashboard/assets/plugins/custom/datatables/datatables.bundle.js')}}"></script>
    <script src="{{asset('dashboard/assets/js/pages/crud/datatables/basic/basic.js')}}"></script>
    <script src="{{asset('dashboard/assets/js/pages/features/miscellaneous/sweetalert2.js')}}"></script>
    <script src="{{asset('dashboard/assets/js/pages/features/miscellaneous/dropify.min.js')}}"></script>

    <script type="text/javascript">
        $(function () {
            var table = $('#users_table').DataTable({
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
                    {extend: 'print', className: 'btn btn-light-primary mr-1 ', text: '<i class="fa fa-print fs-2x"></i>'},
                    // {extend: 'pdf', className: 'btn btn-raised btn-danger', text: 'PDF'},
                    {extend: 'excel', className: 'btn btn-light-primary mr-1', text: '<i class="fa fa-file-excel  fs-2x"></i>'},
                    // {extend: 'colvis', className: 'btn secondary', text: 'إظهار / إخفاء الأعمدة '}

                ],
                ajax: {
                    url: '{{ route('AttachmentCategoryDatatable') }}',
                    data: {
                    }
                },
                columns: [
                    {data: 'checkbox', name: 'checkbox', "searchable": false, "orderable": false},
                    {data: 'name', name: 'name', "searchable": true, "orderable": true},
                    {data: 'actions', name: 'actions', "searchable": true, "orderable": true},

                ]
            });
            $.ajax({
                url: "{{ URL::to('/buttons_AttachmentCategory')}}",
                success: function (data) { $('.add_button').append(data); },
                dataType: 'html'
            });
        });
    </script>
    <!--begin::Page scripts(used by this page) -->
    // <script>
        //     //DataTable
        //     var table = $('#kt_datatable').DataTable({
        //         dom: 'Bfrtip',
        //         "ordering":false,
        //         "paging":false,
        //         @if( Request::segment(1) == "ar")
        //         "language": {
        //             "url": "//cdn.datatables.net/plug-ins/1.10.19/i18n/Arabic.json"
        //         }
        //         @endif
        //     });
        // </script>
    <script>

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
                            url:'{{url("Delete_AttachmentCategory")}}',
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

        //End Delete Row
        $(".edit-Advert").click(function(){
            var id=$(this).data('id')
            var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
            $.ajax({
                type: "GET",
                url: "{{url('Edit_AttachmentCategory')}}",
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
    @endif
@endsection
@endsection
