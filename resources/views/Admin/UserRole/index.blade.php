@extends('layout.layout')

@section('title')
    {{__('lang.Control_Permissions')}}
@endsection
@section('css')
    <link href="{{asset('dashboard/assets/plugins/custom/datatables/datatables.bundle.css')}}" rel="stylesheet" type="text/css" />
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
                                <a href="{{url('copanel')}}" class="text-muted">{{trans('lang.Control')}}</a>
                            </li>
                            {{--                            <li class="breadcrumb-item">--}}
                            {{--                                <a href="" class="text-muted">Profile</a>--}}
                            {{--                            </li>--}}

                            <li class="breadcrumb-item">
                                <h5 class="text-dark font-weight-bold my-1 mr-5 ">{{trans('lang.Control_Permissions')}}</h5>
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
                        <h3 class="card-label">{{__('lang.Control_Permissions')}}
                    </div>
                    <div class="card-toolbar">
                        <!--begin::Button-->
{{--                        <button type="button" data-toggle="modal" data-toggle="modal" data-target="#kt_modal_4" class="btn btn-primary font-weight-bolder">--}}
{{--          <span class="svg-icon svg-icon-md">--}}
{{--            <!--begin::Svg Icon | path:assets/media/svg/icons/Design/Flatten.svg-->--}}
{{--            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">--}}
{{--              <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">--}}
{{--                <rect x="0" y="0" width="24" height="24" />--}}
{{--                <circle fill="#000000" cx="9" cy="15" r="6" />--}}
{{--                <path d="M8.8012943,7.00241953 C9.83837775,5.20768121 11.7781543,4 14,4 C17.3137085,4 20,6.6862915 20,10 C20,12.2218457 18.7923188,14.1616223 16.9975805,15.1987057 C16.9991904,15.1326658 17,15.0664274 17,15 C17,10.581722 13.418278,7 9,7 C8.93357256,7 8.86733422,7.00080962 8.8012943,7.00241953 Z" fill="#000000" opacity="0.3" />--}}
{{--              </g>--}}
{{--            </svg>--}}
{{--              <!--end::Svg Icon-->--}}
{{--          </span> {{__('lang.Nationality_Create')}}</button>--}}
{{--                        &nbsp;&nbsp;--}}
{{--                        <button id="delete" class="btn btn-danger font-weight-bolder"><span class="svg-icon svg-icon-md"><!--begin::Svg Icon | path:C:\wamp64\www\keenthemes\themes\metronic\theme\html\demo1\dist/../src/media/svg/icons\General\Trash.svg--><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">--}}
{{--                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">--}}
{{--                  <rect x="0" y="0" width="24" height="24"/>--}}
{{--                  <circle fill="#000000" opacity="0.3" cx="12" cy="12" r="10"/>--}}
{{--                  <path d="M12.0355339,10.6213203 L14.863961,7.79289322 C15.2544853,7.40236893 15.8876503,7.40236893 16.2781746,7.79289322 C16.6686989,8.18341751 16.6686989,8.81658249 16.2781746,9.20710678 L13.4497475,12.0355339 L16.2781746,14.863961 C16.6686989,15.2544853 16.6686989,15.8876503 16.2781746,16.2781746 C15.8876503,16.6686989 15.2544853,16.6686989 14.863961,16.2781746 L12.0355339,13.4497475 L9.20710678,16.2781746 C8.81658249,16.6686989 8.18341751,16.6686989 7.79289322,16.2781746 C7.40236893,15.8876503 7.40236893,15.2544853 7.79289322,14.863961 L10.6213203,12.0355339 L7.79289322,9.20710678 C7.40236893,8.81658249 7.40236893,8.18341751 7.79289322,7.79289322 C8.18341751,7.40236893 8.81658249,7.40236893 9.20710678,7.79289322 L12.0355339,10.6213203 Z" fill="#000000"/>--}}
{{--              </g>--}}
{{--          </svg><!--end::Svg Icon--></span>--}}
{{--                            {{__('lang.Nationality_Delete')}}</button>--}}
{{--                        <!--end::Button-->--}}
                    </div>
                </div>
                <div class="card-body">

                    <!--begin: Datatable-->
                    <table class="table table-bordered table-hover table-checkable mt-10" id="users_table">
                        <thead>
                        <tr>
                            <th class="w-10px pe-2">
                                <div class="form-check form-check-sm form-check-custom form-check-solid me-3">
                                    <input class="form-check-input" type="checkbox" data-kt-check="true"
                                           data-kt-check-target="#users_table .form-check-input" value="1"/>
                                </div>
                            </th>
                            <th>{{__('lang.Nationality_Name')}} </th>
                            <th> {{__('lang.Nationality_Edit')}}  </th>
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
        <!--end::Container-->
    </div>



    <div class="modal fade" id="kt_modal_4" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">
                        {{__('lang.Nationality_Create')}}</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    </button>
                </div>
                <div class="modal-body">
                    <form method="post" action="/Store_UserRole">
                        @csrf
                        <div class="col-xl-12">
                            <div class="kt-section__body">

                                <div class="form-group row">
                                    <label class="col-xl-3 col-lg-3 col-form-label">{{__('lang.Nationality_Name')}}</label>
                                    <div class="col-lg-9 col-xl-9">
                                        <input class="form-control" type="text" name="name" value="" required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="checkbox-inline">
                                        <label class="checkbox" style="font-size: 20px;">
                                            <input type="checkbox" onclick="transactionsFunction()"  id="transactions" name="transactions" value="1" />
                                            <span></span>{{__('lang.Transactions')}}</label>
                                    </div>
                                </div>
                                <div class="form-group" id="transactionsBody" style="display: none;">
                                    <label>المحتويات </label>
                                    <div class="checkbox-list">
                                        <label class="checkbox">
                                            <input type="checkbox" name="transactions_Inbox"  value="1"/>
                                            <span></span>{{__('lang.Transactionsmincoming')}}</label>
                                        <label class="checkbox">
                                            <input type="checkbox" name="transactions_OutBox" value="1"/>
                                            <span></span> {{__('lang.TransactionsOutgoing')}}</label>
                                        <label class="checkbox">
                                            <input type="checkbox" name="transactions_create_in" value="1" />
                                            <span></span>{{__('lang.TransactionsmCreate')}}</label>
                                        <label class="checkbox">
                                            <input type="checkbox" name="transactions_create_out" value="1" />
                                            <span></span> {{__('lang.Transactionsmoutbound')}}</label>
                                        <label class="checkbox">
                                            <input type="checkbox" name="transactions_report" value="1"/>
                                            <span></span> {{__('lang.Transactionsmreports')}}</label>
                                        <label class="checkbox">
                                            <input type="checkbox" name="transactions_archive" value="1"/>
                                            <span></span>{{__('lang.TransactionsmSave')}}</label>
                                        <label class="checkbox">
                                            <input type="checkbox" name="transactions_archive_out" value="1" />
                                            <span></span> {{__('lang.Transactionsmexport')}}</label>
                                        <label class="checkbox">
                                            <input type="checkbox" name="transactions_search" value="1" />
                                            <span></span>{{__('lang.TransactionsmSearch')}}</label>
                                        <label class="checkbox">
                                            <input type="checkbox" name="transactions_advancedsearch" value="1"/>
                                            <span></span> {{__('lang.TransactionsmSecret')}} </label>


                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="checkbox-inline">
                                        <label class="checkbox" style="font-size: 20px;">
                                            <input type="checkbox" onclick="resourcesFunction()" name="resources" value="1" />
                                            <span></span>{{__('lang.HR')}}</label>
                                    </div>
                                </div>
                                <div class="form-group" id="resourcesBody"  style="display: none;">
                                    <label>المحتويات </label>
                                    <div class="checkbox-list">
                                        <label class="checkbox">
                                            <input type="checkbox" name="resources_category"  value="1"/>
                                            <span></span> {{__('lang.HRList')}}</label>
                                        <label class="checkbox">
                                            <input type="checkbox" name="resources_jobs" value="1"/>
                                            <span></span> {{__('lang.HRSettings')}}</label>
                                        <label class="checkbox">
                                            <input type="checkbox" name="resources_users" value="1" />
                                            <span></span> {{__('lang.HRStaff')}}</label>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="checkbox-inline">
                                        <label class="checkbox" style="font-size: 20px;">
                                            <input type="checkbox" onclick="settingsFunction()"  name="settings" value="1" />
                                            <span></span>{{__('lang.Settings')}} </label>
                                    </div>
                                </div>
                                <div class="form-group" id="settingsBody"  style="display: none;">
                                    <label>المحتويات </label>
                                    <div class="checkbox-list">
                                        <label class="checkbox">
                                            <input type="checkbox" name="settings_categoryUnits"  value="1"/>
                                            <span></span> {{__('lang.UnitsSettings')}}</label>
                                        <label class="checkbox">
                                            <input type="checkbox" name="settings_jopType" value="1"/>
                                            <span></span> {{__('lang.Settingsjobs')}}</label>
                                        <label class="checkbox">
                                            <input type="checkbox" name="settings_banks" value="1" />
                                            <span></span> {{__('lang.BankSettings')}}</label>
                                        <label class="checkbox">
                                            <input type="checkbox" name="settings_nationality" value="1" />
                                            <span></span> {{__('lang.SettingsNationalities')}}</label>
                                        <label class="checkbox">
                                            <input type="checkbox" name="settings_attachmentCategory" value="1" />
                                            <span></span> {{__('lang.SettingsAttachment')}}</label>
                                        <label class="checkbox">
                                            <input type="checkbox" name="settings_inboxProcessType" value="1" />
                                            <span></span>  {{__('lang.Settingsmail')}}</label>
                                        <label class="checkbox">
                                            <input type="checkbox" name="settings_inboxThirdParty" value="1" />
                                            <span></span>  {{__('lang.Settingsparties')}}  </label>

                                        <label class="checkbox">
                                            <input type="checkbox" name="settings_inboxType" value="1" />
                                            <span></span>{{__('lang.Settingsassignments')}}</label>
                                        <label class="checkbox">
                                            <input type="checkbox" name="settings_InboxGroup" value="1" />
                                            <span></span>{{__('lang.Settingsgroups')}}  </label>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="checkbox-inline">
                                        <label class="checkbox" style="font-size: 20px;">
                                            <input type="checkbox" onclick="copanelFunction()" name="copanel" value="1" />
                                            <span></span>{{__('lang.Control')}} </label>
                                    </div>
                                </div>
                                <div class="form-group" id="copanelBody"  style="display: none;">
                                    <label>  </label>
                                    <div class="checkbox-list">
                                        <label class="checkbox">
                                            <input type="checkbox" name="copanel_roles"  value="1"/>
                                            <span></span>   {{__('lang.Control_Permissions')}}</label>
                                        <label class="checkbox">
                                            <input type="checkbox" name="copanel_setting" value="1"/>
                                            <span></span>  {{__('lang.Control_master')}}</label>
                                        <label class="checkbox">
                                            <input type="checkbox" name="copanel_lang" value="1"/>
                                            <span></span> {{__('lang.Control_Language')}} </label>

                                        <label class="checkbox">
                                            <input type="checkbox" name="copanel_logs" value="1" />
                                            <span></span>   {{__('lang.Control_records')}}</label>

                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">{{__('lang.Nationality_Close')}}</button>
                            <button type="submit" class="btn btn-primary">{{__('lang.Nationality_Save')}}</button>
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
                    <h3 class="modal-title" id="myLargeModalLabel">{{__('lang.Nationality_Edit')}}</h3>
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
                    url: '{{ route('UserRoleDatatable') }}',
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
                url: "{{ URL::to('/buttons_UserRole')}}",
                success: function (data) { $('.add_button').append(data); },
                dataType: 'html'
            });
        });
    </script>
    <script>
        // Replace the <textarea id="editor1"> with a CKEditor 4
        // instance, using default configuration.

        function transactionsFunction() {
            var x = document.getElementById("transactionsBody");
            if (x.style.display === "none") {
                x.style.display = "block";
            } else {
                x.style.display = "none";
            }
        }
        function resourcesFunction() {
            var x = document.getElementById("resourcesBody");
            if (x.style.display === "none") {
                x.style.display = "block";
            } else {
                x.style.display = "none";
            }
        }

        function copanelFunction() {
            var x = document.getElementById("copanelBody");
            if (x.style.display === "none") {
                x.style.display = "block";
            } else {
                x.style.display = "none";
            }
        }
        function settingsFunction() {
            var x = document.getElementById("settingsBody");
            if (x.style.display === "none") {
                x.style.display = "block";
            } else {
                x.style.display = "none";
            }
        }

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
                url: "{{url('Edit_UserRole')}}",
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
