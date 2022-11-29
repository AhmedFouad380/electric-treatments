@extends('layout.layout')

@section('title')
    {{__('lang.Categories_Title')}}
@endsection
@section('css')
    <link href="{{asset('dashboard/assets/plugins/custom/datatables/datatables.bundle.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('dashboard/assets/plugins/custom/jstree/jstree.bundle.css')}}" rel="stylesheet" type="text/css" />
@endsection

@section('content')

    <!--begin::Entry-->
    <div class="d-flex flex-column-fluid">
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
                                <h5 class="text-dark font-weight-bold my-1 mr-5 ">{{trans('lang.Categories_Title')}}</h5>
                            </li>
                        </ul>

                        <!--end::Breadcrumb-->
                    </div>
                    <!--end::Page Heading-->
                </div>
            </div>
        </div>

        <div class="container">
            <!--begin::Card--><br><br><br>

            <div class="row">

                <div class="col-lg-12">

                    <div class="card card-custom gutter-b">

                        <div class="card-body">

                            <!--begin: Datatable-->
                            <table class="table table-bordered table-hover table-checkable mt-10" id="users_table">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>{{__('lang.Categories_Name')}} </th>
                                    <th>@if(Request::segment(1) == 'ar') النوع @else Type @endif</th>
                                    <th>@if(Request::segment(1) =='ar') الوحده الاعلى @else Main Unit @endif</th>
                                    <th>@if(Request::segment(1) =='ar')  اسم شبكة الانترنت   @else network name @endif</th>
                                    <th>@if(Request::segment(1) =='ar')  mac address   @else mac address @endif</th>
                                    <th> {{__('lang.Categories_Edit')}}  </th>
                                </tr>
                                </thead>
                                <tbody>
                                </tbody>
                            </table>
                            <!--end: Datatable-->

                        </div>
                    </div>
                    <!--end::Card-->
                </div>


            </div>
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
                    <form method="get" >

                        <div class="col-xl-12">
                            <div class="kt-section__body">

                                <div class="form-group row">
                                    <label class="col-xl-3 col-lg-3 col-form-label">{{__('lang.Categories_Name')}}</label>
                                    <div class="col-lg-9 col-xl-9">
                                        <input class="form-control form-control-solid" type="text" name="name" value="">
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-xl-3 col-lg-3 col-form-label">{{__('lang.Categories_structure')}}</label>
                                    <div class="col-lg-9 col-xl-9">
                                        @inject('CategoryUnits','App\Category')
                                        <select class="form-control form-control-lg"  id="kt_select2_1"  name="sub_id" required>
                                            <option value="0"> {{__('lang.show_all')}}  </option>
                                            @foreach($CategoryUnits->all() as $data)
                                                <option value="{{$data->id}}"> {{$data->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-xl-3 col-lg-3 col-form-label">{{__('lang.Categories_Unit')}}</label>
                                    <div class="col-lg-9 col-xl-9">
                                        @inject('CategoryUnits','App\CategoryUnits')
                                        <select class="form-control form-control-lg"  id="kt_select2_1"  name="type" required>
                                            <option value="0"> {{__('lang.show_all')}}  </option>
                                        @foreach($CategoryUnits->all() as $data)
                                                <option value="{{$data->id}}"> {{$data->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">{{__('lang.Categories_Close')}}</button>
                            <button type="submit" class="btn btn-primary">{{__('lang.Search')}}</button>
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
                        {{__('lang.Categories_Create')}}</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    </button>
                </div>
                <div class="modal-body">
                    <form method="post" action="/Store_Category">
                        @csrf
                        <div class="col-xl-12">
                            <div class="kt-section__body">

                                <div class="form-group row">
                                    <label class="col-xl-3 col-lg-3 col-form-label">{{__('lang.Categories_Name')}}</label>
                                    <div class="col-lg-9 col-xl-9">
                                        <input class="form-control form-control-solid" type="text" name="name" value="">
                                        <input class="form-control" type="hidden" name="sub_id" value="0">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-xl-3 col-lg-3 col-form-label">{{__('lang.network_name')}}</label>
                                    <div class="col-lg-9 col-xl-9">
                                        <input class="form-control form-control-solid" type="text" name="network_name" value="">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label
                                        class="col-xl-3 col-lg-3 col-form-label">{{__('lang.mac_address')}}</label>
                                    <div class="col-lg-9 col-xl-9">
                                        <input class="form-control form-control-solid" type="text" name="mac_address" value="">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-xl-3 col-lg-3 col-form-label">{{__('lang.Categories_structure')}}</label>
                                    <div class="col-lg-9 col-xl-9">
                                        @inject('CategoryUnits','App\Category')
                                        <select class="form-control form-control-lg"  id="kt_select2_1"  name="sub_id" required>
                                            <option value="0">رئيسي </option>
                                            @foreach($CategoryUnits->all() as $data)
                                                <option value="{{$data->id}}"> {{$data->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-xl-3 col-lg-3 col-form-label">{{__('lang.Categories_Unit')}}</label>
                                    <div class="col-lg-9 col-xl-9">
                                        @inject('CategoryUnits','App\CategoryUnits')
                                        <select class="form-control form-control-lg"  id="kt_select2_1"  name="type" required>
                                            @foreach($CategoryUnits->all() as $data)
                                                <option value="{{$data->id}}"> {{$data->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">{{__('lang.Categories_Close')}}</button>
                            <button type="submit" class="btn btn-primary">{{__('lang.Categories_Save')}}</button>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>



    <!-- /.modal -->
    <div class="modal fade bs-edit-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" style="display: none;">
        <div class="modal-dialog modal-lg">
            <div class="modal-content card card-outline-info">
                <div class="modal-header card-header">
                    <h3 class="modal-title" id="myLargeModalLabel">{{__('lang.Categories_Edit')}}</h3>
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
    <script src="{{asset('dashboard/assets/plugins/custom/jstree/jstree.bundle.js')}}"></script>
    <script src="{{asset('dashboard/assets/js/pages/features/miscellaneous/treeview.js')}}"></script>
    <!--begin::Page scripts(used by this page) -->

    @inject('Cat','App\Category')
    <?php


    ?>

    <script >

        "use strict";


    </script>
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
                    // {extend: 'print', className: 'btn btn-light-primary mr-1 ', text: '<i class="fa fa-print fs-2x"></i>'},
                    // {extend: 'pdf', className: 'btn btn-raised btn-danger', text: 'PDF'},
                    // {extend: 'excel', className: 'btn btn-light-primary mr-1', text: '<i class="fa fa-file-excel  fs-2x"></i>'},
                    // {extend: 'colvis', className: 'btn secondary', text: 'إظهار / إخفاء الأعمدة '}

                ],
                ajax: {
                    url: '{{ route('CategoriesDatatable') }}',
                    data: {
                        @if(Request::get('name'))
                        name:'{{Request::get('name')}}'
                        @endif
                            @if(Request::get('sub_id'))
                        sub_id:'{{Request::get('sub_id')}}'
                        @endif

                            @if(Request::get('type'))
                        type:'{{Request::get('type')}}'
                        @endif

                    }
                },
                columns: [
                    {data: 'checkbox', name: 'checkbox', "searchable": false, "orderable": false},
                    {data: 'name', name: 'name', "searchable": true, "orderable": true},
                    {data: 'categoryUnit', name: 'name', "categoryUnit": true, "orderable": true},
                    {data: 'subCategory', name: 'subCategory', "searchable": true, "orderable": true},
                    {data: 'network_name', name: 'network_name', "searchable": true, "orderable": true},
                    {data: 'mac_address', name: 'mac_address', "searchable": true, "orderable": true},
                    {data: 'actions', name: 'actions', "searchable": true, "orderable": true},

                ]
            });
            $.ajax({
                url: "{{ URL::to('/buttons_Categories')}}",
                success: function (data) { $('.add_button').append(data); },
                dataType: 'html'
            });
        });
    </script>

    <script>

        //Delete Row

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
                url: "{{url('Edit_Category')}}",
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
        @elseif ( $message == "Error")
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
