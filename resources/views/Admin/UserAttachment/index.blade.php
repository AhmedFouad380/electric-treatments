@extends('layout.layout')

@section('title')
  @if(Request::segment(1) == 'ar' ) مرفقات الموظف  @else Languages Settings @endif
@endsection
@section('css')
  <link href="{{asset('dashboard/assets/plugins/custom/datatables/datatables.bundle.css')}}" rel="stylesheet" type="text/css" />
@endsection

@section('content')

<!--begin::Entry-->
<div class="d-flex flex-column-fluid">
    <!--begin::Container-->
    <div class="container">
      <!--begin::Card-->
      <div class="card card-custom gutter-b">
        <div class="card-header flex-wrap py-3">
          <div class="card-title">
            <h3 class="card-label">{{__('lang.lang_title')}}
          </div>
          <div class="card-toolbar">
            <!--begin::Button-->
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
            </span> @if(Request::segment(1) == 'ar') اضافة جديده @else Create @endif</button>
            &nbsp;&nbsp;
            <button id="delete" class="btn btn-danger font-weight-bolder"><span class="svg-icon svg-icon-md"><!--begin::Svg Icon | path:C:\wamp64\www\keenthemes\themes\metronic\theme\html\demo1\dist/../src/media/svg/icons\General\Trash.svg--><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                  <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                    <rect x="0" y="0" width="24" height="24"/>
                    <circle fill="#000000" opacity="0.3" cx="12" cy="12" r="10"/>
                    <path d="M12.0355339,10.6213203 L14.863961,7.79289322 C15.2544853,7.40236893 15.8876503,7.40236893 16.2781746,7.79289322 C16.6686989,8.18341751 16.6686989,8.81658249 16.2781746,9.20710678 L13.4497475,12.0355339 L16.2781746,14.863961 C16.6686989,15.2544853 16.6686989,15.8876503 16.2781746,16.2781746 C15.8876503,16.6686989 15.2544853,16.6686989 14.863961,16.2781746 L12.0355339,13.4497475 L9.20710678,16.2781746 C8.81658249,16.6686989 8.18341751,16.6686989 7.79289322,16.2781746 C7.40236893,15.8876503 7.40236893,15.2544853 7.79289322,14.863961 L10.6213203,12.0355339 L7.79289322,9.20710678 C7.40236893,8.81658249 7.40236893,8.18341751 7.79289322,7.79289322 C8.18341751,7.40236893 8.81658249,7.40236893 9.20710678,7.79289322 L12.0355339,10.6213203 Z" fill="#000000"/>
                </g>
            </svg><!--end::Svg Icon--></span>
             @if(Request::segment(1) == 'ar')  حذف @else Delete @endif</button>
            <!--end::Button-->
          </div>
        </div>
        <div class="card-body">
  
          <!--begin: Datatable-->
          <table class="table table-bordered table-hover table-checkable mt-10" id="kt_datatable">
            <thead>
              <tr>
                <th>#</th>
                <th>الملف  </th>
                <th> نوع الملف   </th>
                <th> تاريخ الانشاء    </th>
              </tr>
            </thead>
            <tbody>
              @foreach($data as $User)
                <tr>
                  <td>
                    <label class="checkbox checkbox-single">
                      <input type="checkbox" value="{{$User->id}}" class="checkable" name="check_delete[]"/>
                      <span></span>
                    </label>
                  </td>
                  <td>
                    <div class="kt-user-card-v2">
                        <div class="kt-user-card-v2__details">
                            <span class="kt-user-card-v2__name"></span>
                            <a href="{{asset('Upload/UserFiles/'.$User->file)}}" download>
                          {{$User->file}}
                            </a>
                        </div>
                    </div>
                  </td>
                    <td>
                        @inject('AttachmentCategory','App\AttachmentCategory')
                        @if($AttachmentCategory->find($User->cat_id))
                            {{$AttachmentCategory->find($User->cat_id)->name}}
                        @else
                            تم حذف نوع الملف
                        @endif
        
                    </td>
                 <td>{{$User->created_at}}</td>
                </tr>
              @endforeach
            </tbody>
          </table>
          <!--end: Datatable-->
          {{$data->links()}}
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
                    @if(Request::segment(1) == 'ar')
                    اضافة جديده
                    @else
                    Create
                    @endif</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        </button>
      </div>
      <div class="modal-body">
        <form method="post" action="/Store_UserAttachment" enctype="multipart/form-data">
            @csrf
          <div class="col-xl-12">
            <div class="kt-section__body">
            <input type="hidden" name="user_id" value="{{$id}}">

                <div class="form-group">
                    <div class="col-lg-9 col-xl-6">
                        <label class="col-xl-3 col-lg-3 col-form-label text-right">@if(Request::segment(1) == 'ar') الملف   @else  image @endif</label>
                      <div class="image-input image-input-empty image-input-outline" id="kt_image_1" style="background-image: url({{asset('dashboard/assets/media/users/blank.png')}})">
                        <div class="image-input-wrapper"></div>
                        <label class="btn btn-xs btn-icon btn-circle btn-white btn-hover-text-primary btn-shadow" data-action="change" data-toggle="tooltip" title="" data-original-title="Change avatar">
                          <i class="fa fa-pen icon-sm text-muted"></i>
                          <input type="file" name="file" accept=".png, .jpg, .jpeg" required />
                          <input type="hidden" name="logo_remove" />
                        </label>
                        <span class="btn btn-xs btn-icon btn-circle btn-white btn-hover-text-primary btn-shadow" data-action="cancel" data-toggle="tooltip" title="Cancel avatar">
                          <i class="ki ki-bold-close icon-xs text-muted"></i>
                        </span>
                        <span class="btn btn-xs btn-icon btn-circle btn-white btn-hover-text-primary btn-shadow" data-action="remove" data-toggle="tooltip" title="Remove avatar">
                          <i class="ki ki-bold-close icon-xs text-muted"></i>
                        </span>
                      </div>
                    </div>
                </div>
                <div class="form-group">
                    <label>نوع الملف   </label>
                    @inject('AttachmentCategory','App\AttachmentCategory')
                    <select name="cat_id" class="form-control form-control-lg"  id="kt_select2_1">
                        @foreach($AttachmentCategory->all() as $data)
                            <option value="{{$data->id}}">{{$data->name}}</option>
                        @endforeach
                    </select>
                </div>

            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Save</button>
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
                <h3 class="modal-title text-white" id="myLargeModalLabel">{{trans('word.Edit Advertisement')}}</h3>
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
<script src="{{asset('dashboard/assets/js/pages/crud/file-upload/image-input.js')}}"></script>
<!--begin::Page scripts(used by this page) -->

<script>

    //Delete Row
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
                    url:'{{url("Delete_UserAttachment")}}',
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
