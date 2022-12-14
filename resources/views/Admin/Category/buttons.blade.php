<div class="dt-buttons flex-wrap">

{{--    <!--end::Filter-->--}}
{{--    <!--begin::Add user-->--}}
    <a type="button" href="/resources/CategoriesTree" class="btn btn-success font-weight-bolder">
        &nbsp;&nbsp;

        @if(Request::segment(1) == 'ar')
            شجرة الهيكل
        @else
            Temple tree
        @endif

    </a>
    <!--begin::Button-->
    <button style="margin:10px;" type="button" data-toggle="modal" data-toggle="modal" data-target="#kt_modal_5" class="btn btn-info font-weight-bolder">
        &nbsp;&nbsp;<i class="flaticon2-magnifier-tool"></i>

        {{__('lang.search')}}</button>
    <button type="button" data-toggle="modal" data-toggle="modal" data-target="#kt_modal_4" class="mr-1 btn btn-primary font-weight-bolder">
                  <span class="svg-icon svg-icon-md">
                    <!--begin::Svg Icon | path:assets/media/svg/icons/Design/Flatten.svg-->
                   <i class="fa fa-plus-circle"></i>
                      <!--end::Svg Icon-->
                  </span> {{__('lang.Nationality_Create')}}</button>
                                &nbsp;&nbsp;
                                <button id="delete" class="btn btn-danger font-weight-bolder">
                                    <i class="fa fa-trash"></i>
                                    {{__('lang.Nationality_Delete')}}</button>
                                <!--end::Button-->


    <!--begin::Modal - Add task-->

    <!--end::Modal - Add task-->
</div>
<script>
    $('.dropify').dropify();
    CKEDITOR.replace( 'editor1' );
    CKEDITOR.replace( 'editor2' );
</script>
<script type="text/javascript">

    $("#delete").on("click", function () {
        var dataList = [];
        $("input:checkbox:checked").each(function (index) {
            dataList.push($(this).val())
        })

        if (dataList.length > 0) {
            Swal.fire({
                title: "تحذير.هل انت متأكد؟!",
                text: "",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#f64e60",
                confirmButtonText: "نعم",
                cancelButtonText: "لا",
                closeOnConfirm: false,
                closeOnCancel: false
            }).then(function (result) {
                if (result.value) {
                    var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
                    $.ajax({
                        url: '{{url("Delete_Category")}}',
                        type: "get",
                        data: {'id': dataList, _token: CSRF_TOKEN},
                        dataType: "JSON",
                        success: function (data) {
                            if (data.message == "Success") {
                                $("input:checkbox:checked").parents("tr").remove();
                                Swal.fire("نجاح", "تم الحذف بنجاح", "success");
                                // location.reload();
                            } else {
                                Swal.fire("نأسف", "حدث خطأ ما اثناء الحذف", "error");
                            }
                        },
                        fail: function (xhrerrorThrown) {
                            Swal.fire("نأسف", "حدث خطأ ما اثناء الحذف", "error");
                        }
                    });
                    // result.dismiss can be 'cancel', 'overlay',
                    // 'close', and 'timer'
                } else if (result.dismiss === 'cancel') {
                    Swal.fire("ألغاء", "تم الالغاء", "error");
                }
            });
        }
    });
</script>

