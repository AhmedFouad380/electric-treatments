@extends('layout.layout')

@section('title')
    {{__('lang.Nationality_Edit')}}
@endsection
@section('css')
    <link href="{{asset('dashboard/assets/plugins/custom/datatables/datatables.bundle.css')}}" rel="stylesheet"
          type="text/css"/>
@endsection
@section('content')
    <!--begin::Entry-->
    <div class="d-flex flex-column-fluid">
        <!--begin::Container-->
        <!--begin::Container-->
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
                                <a href="{{url('settings')}}" class="text-muted">{{trans('lang.Settings')}}</a>
                            </li>
                            <li class="breadcrumb-item">
                                <a href="{{url('resources')}}" class="text-muted">{{trans('lang.HR')}}</a>
                            </li>
                            <li class="breadcrumb-item">
                                <a href="{{url('settings/Bonuses')}}"
                                   class="text-muted">{{trans('lang.Bonuses_Title')}}</a>
                            </li>
                            <li class="breadcrumb-item">
                                <h5 class="text-dark font-weight-bold my-1 mr-5 ">{{__('lang.Nationality_Edit')}}</h5>
                            </li>
                        </ul>
                        <!--end::Breadcrumb-->
                    </div>
                    <!--end::Page Heading-->
                </div>
            </div>
        </div>

        <div class="container">
            <br><br><br>            <!--begin::Card-->
            <div class="card card-custom gutter-b">
                <div class="card-header flex-wrap py-3">
                    <div class="card-title">
                        <h3 class="card-label">{{__('lang.Nationality_Edit')}}
                    </div>
                </div>
                <div class="card-body">
                    <form method="post" action="{{url('Update_Bonuses')}}">
                        @csrf
                        <div class="col-xl-12">
                            <div class="kt-section__body">
                                <div class="form-group">
                                    <strong>{{trans('lang.bonName')}}</strong>
                                    {{ Form::text('name',$Bonuses->name,["class"=>"form-control",'required' ]) }}
                                    <input class="form-control" type="hidden" name="id" value="{{$Bonuses->id}}">
                                </div>

                                <div class="form-group">
                                    <strong>{{trans('lang.overtime')}}</strong>
                                    {{ Form::number('overtime',$Bonuses->overtime,["class"=>"form-control" , 'step' => 'any' ,'max'=>'10' ,'required' ]) }}
                                </div>

                                <div class="form-group">
                                    <strong>{{trans('lang.late')}}</strong>
                                    {{ Form::number('late',$Bonuses->late,["class"=>"form-control" , 'step' => 'any','max'=>'10','required']   ) }}
                                </div>

                                <div class="form-group">
                                    <strong>{{trans('lang.early')}}</strong>
                                    {{ Form::number('early',$Bonuses->early,["class"=>"form-control" , 'step' => 'any' ,'max'=>'10','required']  ) }}
                                </div>
                                <div class="form-group">
                                    <strong>{{trans('lang.notsign')}}</strong>
                                    {{ Form::number('notsign',$Bonuses->notsign,["class"=>"form-control", 'step' => 'any' ,'max'=>'10','required']  ) }}
                                </div>
                                <div class="form-group">
                                    <strong>{{trans('lang.absence')}}</strong>
                                    {{ Form::number('absence',$Bonuses->absence,["class"=>"form-control", 'step' => 'any','max'=>'10' ,'required']) }}
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary"
                                    data-dismiss="modal">{{__('lang.Bonuses_Close')}}</button>
                            <button type="submit" class="btn btn-primary">{{__('lang.Bonuses_Save')}}</button>
                        </div>
                    </form>
                </div>
            </div>
            <!--end::Card-->
        </div>
        <!--end::Container-->
    </div>
    <!-- /.modal -->
@endsection
@section('js')
    <script>
        function transactionsFunction1() {
            var x = document.getElementById("transactionsBody1");
            if (x.style.display === "none") {
                x.style.display = "block";
            } else {
                x.style.display = "none";
            }
        }

        function resourcesFunction1() {
            var x = document.getElementById("resourcesBody1");
            if (x.style.display === "none") {
                x.style.display = "block";
            } else {
                x.style.display = "none";
            }
        }

        function copanelFunction1() {
            var x = document.getElementById("copanelBody1");
            if (x.style.display === "none") {
                x.style.display = "block";
            } else {
                x.style.display = "none";
            }
        }

        function settingsFunction1() {
            var x = document.getElementById("settingsBody1");
            if (x.style.display === "none") {
                x.style.display = "block";
            } else {
                x.style.display = "none";
            }
        }
    </script>
@endsection




