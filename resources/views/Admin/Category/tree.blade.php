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
        <!--begin::Container-->
        <div class="container">
            <!--begin::Card-->

            <div class="row">
                <div class="col-lg-12">

                    <div class="card card-custom gutter-b">
                        <div class="card-header">
                            <div class="card-title">
                                <h3 class="card-label">
                                    {{__('lang.Categories_Title')}}
                                </h3>
                            </div>
                        </div>
                        <div class="card-body">


                            <div id="kt_tree_6" class="tree-demo">
                            </div>
                        </div>
                    </div>

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
                    <form method="get" action="/resources/CategorySearch">

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
                            <button type="submit" class="btn btn-primary">{{__('lang.Categories_Save')}}</button>
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
<script>
    $("#kt_tree_6").jstree({
        "core": {
            "themes": {
                "responsive": false
            },
            // so that create works
            "check_callback": true,
            "data":[
                {!! $tree !!}
            ]
        },
        "types": {
            "default": {
                "icon": "fa fa-folder text-primary"
            },
            "file": {
                "icon": "fa fa-file  text-primary"
            }
        },
        "state": {
            "key": "demo3"
        },
        "plugins": ["dnd", "state", "types"]
    });
</script>
    <script >



    </script>

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
                            url:'{{url("Delete_Category")}}',
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
