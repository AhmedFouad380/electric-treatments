@extends('layout.layout')

@section('title')
    {{__('lang.Settings')}}
@endsection
@section('css')

@endsection

@section('js')

@endsection
@section('content')
    <div class="d-flex flex-column-fluid">
        <!--begin::Container-->
        <div class="container">
            <!--begin::Dashboard-->
            <!--begin::Row-->
            <div class="row">
                @inject('UserRole','App\UserRole')
                @if($UserRole->find(Auth::user()->role)->settings_attachmentCategory ==1 )

                    <div class="col-lg-6 col-xl-4 mb-5">
                        <div class="card card-custom mb-8 mb-lg-0">
                            <div class="card-body">
                                <div class="d-flex align-items-center p-5">
                                    <div class="mr-6">
         <span class="svg-icon svg-icon-success svg-icon-4x">
          <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1" class="kt-svg-icon">
            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                <rect id="bound" x="0" y="0" width="24" height="24"/>
                <path d="M5.5,4 L18.5,4 C19.3284271,4 20,4.67157288 20,5.5 L20,9.5 C20,10.3284271 19.3284271,11 18.5,11 L5.5,11 C4.67157288,11 4,10.3284271 4,9.5 L4,5.5 C4,4.67157288 4.67157288,4 5.5,4 Z M11,6 C10.4477153,6 10,6.44771525 10,7 C10,7.55228475 10.4477153,8 11,8 L13,8 C13.5522847,8 14,7.55228475 14,7 C14,6.44771525 13.5522847,6 13,6 L11,6 Z" id="Combined-Shape" fill="#000000" opacity="0.3"/>
                <path d="M5.5,13 L18.5,13 C19.3284271,13 20,13.6715729 20,14.5 L20,18.5 C20,19.3284271 19.3284271,20 18.5,20 L5.5,20 C4.67157288,20 4,19.3284271 4,18.5 L4,14.5 C4,13.6715729 4.67157288,13 5.5,13 Z M11,15 C10.4477153,15 10,15.4477153 10,16 C10,16.5522847 10.4477153,17 11,17 L13,17 C13.5522847,17 14,16.5522847 14,16 C14,15.4477153 13.5522847,15 13,15 L11,15 Z" id="Combined-Shape-Copy" fill="#000000"/>
            </g>
          </svg>
         </span>
                                    </div>
                                    <div class="d-flex flex-column">
                                        <a class="text-dark text-hover-success font-weight-bold font-size-h4 mb-3" href="/settings/AttachmentCategory">{{__('lang.Settingstypes')}}</a>
                                        <div class="text-dark-75">
                                            {{--             {{__('lang.SettingsAttachment')}}--}}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endif
                @if($UserRole->find(Auth::user()->role)->settings_inboxProcessType ==1 )

                    <div class="col-lg-6 col-xl-4 mb-5">
                        <div class="card card-custom mb-8 mb-lg-0">
                            <div class="card-body">
                                <div class="d-flex align-items-center p-5">
                                    <div class="mr-6">
         <span class="svg-icon svg-icon-success svg-icon-4x">
          <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1" class="kt-svg-icon">
            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                <rect id="bound" x="0" y="0" width="24" height="24"/>
                <path d="M5.5,4 L18.5,4 C19.3284271,4 20,4.67157288 20,5.5 L20,9.5 C20,10.3284271 19.3284271,11 18.5,11 L5.5,11 C4.67157288,11 4,10.3284271 4,9.5 L4,5.5 C4,4.67157288 4.67157288,4 5.5,4 Z M11,6 C10.4477153,6 10,6.44771525 10,7 C10,7.55228475 10.4477153,8 11,8 L13,8 C13.5522847,8 14,7.55228475 14,7 C14,6.44771525 13.5522847,6 13,6 L11,6 Z" id="Combined-Shape" fill="#000000" opacity="0.3"/>
                <path d="M5.5,13 L18.5,13 C19.3284271,13 20,13.6715729 20,14.5 L20,18.5 C20,19.3284271 19.3284271,20 18.5,20 L5.5,20 C4.67157288,20 4,19.3284271 4,18.5 L4,14.5 C4,13.6715729 4.67157288,13 5.5,13 Z M11,15 C10.4477153,15 10,15.4477153 10,16 C10,16.5522847 10.4477153,17 11,17 L13,17 C13.5522847,17 14,16.5522847 14,16 C14,15.4477153 13.5522847,15 13,15 L11,15 Z" id="Combined-Shape-Copy" fill="#000000"/>
            </g>
          </svg>
         </span>
                                    </div>
                                    <div class="d-flex flex-column">
                                        <a class="text-dark text-hover-success font-weight-bold font-size-h4 mb-3" href="/settings/inboxProcessType"> {{__('lang.Settingsdocuments')}} </a>
                                        <div class="text-dark-75">
                                            {{--                                {{__('lang.Settingsmail')}}--}}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endif
                @if($UserRole->find(Auth::user()->role)->settings_inboxThirdParty ==1 )

                    <div class="col-lg-6 col-xl-4 mb-5">
                        <div class="card card-custom mb-8 mb-lg-0">
                            <div class="card-body">
                                <div class="d-flex align-items-center p-5">
                                    <div class="mr-6">
         <span class="svg-icon svg-icon-success svg-icon-4x">
          <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1" class="kt-svg-icon">
            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                <rect id="bound" x="0" y="0" width="24" height="24"/>
                <path d="M5.5,4 L18.5,4 C19.3284271,4 20,4.67157288 20,5.5 L20,9.5 C20,10.3284271 19.3284271,11 18.5,11 L5.5,11 C4.67157288,11 4,10.3284271 4,9.5 L4,5.5 C4,4.67157288 4.67157288,4 5.5,4 Z M11,6 C10.4477153,6 10,6.44771525 10,7 C10,7.55228475 10.4477153,8 11,8 L13,8 C13.5522847,8 14,7.55228475 14,7 C14,6.44771525 13.5522847,6 13,6 L11,6 Z" id="Combined-Shape" fill="#000000" opacity="0.3"/>
                <path d="M5.5,13 L18.5,13 C19.3284271,13 20,13.6715729 20,14.5 L20,18.5 C20,19.3284271 19.3284271,20 18.5,20 L5.5,20 C4.67157288,20 4,19.3284271 4,18.5 L4,14.5 C4,13.6715729 4.67157288,13 5.5,13 Z M11,15 C10.4477153,15 10,15.4477153 10,16 C10,16.5522847 10.4477153,17 11,17 L13,17 C13.5522847,17 14,16.5522847 14,16 C14,15.4477153 13.5522847,15 13,15 L11,15 Z" id="Combined-Shape-Copy" fill="#000000"/>
            </g>
          </svg>
         </span>
                                    </div>
                                    <div class="d-flex flex-column">
                                        <a class="text-dark text-hover-success font-weight-bold font-size-h4 mb-3" href="/settings/inboxThirdParty"> {{__('lang.Settingsparties')}}   </a>
                                        <div class="text-dark-75">
                                            {{--                                {{__('lang.MailSettings')}}--}}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endif
                @if($UserRole->find(Auth::user()->role)->settings_inboxType ==1 )

                    <div class="col-lg-6 col-xl-4 mb-5">
                        <div class="card card-custom mb-8 mb-lg-0">
                            <div class="card-body">
                                <div class="d-flex align-items-center p-5">
                                    <div class="mr-6">
         <span class="svg-icon svg-icon-success svg-icon-4x">
          <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1" class="kt-svg-icon">
            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                <rect id="bound" x="0" y="0" width="24" height="24"/>
                <path d="M5.5,4 L18.5,4 C19.3284271,4 20,4.67157288 20,5.5 L20,9.5 C20,10.3284271 19.3284271,11 18.5,11 L5.5,11 C4.67157288,11 4,10.3284271 4,9.5 L4,5.5 C4,4.67157288 4.67157288,4 5.5,4 Z M11,6 C10.4477153,6 10,6.44771525 10,7 C10,7.55228475 10.4477153,8 11,8 L13,8 C13.5522847,8 14,7.55228475 14,7 C14,6.44771525 13.5522847,6 13,6 L11,6 Z" id="Combined-Shape" fill="#000000" opacity="0.3"/>
                <path d="M5.5,13 L18.5,13 C19.3284271,13 20,13.6715729 20,14.5 L20,18.5 C20,19.3284271 19.3284271,20 18.5,20 L5.5,20 C4.67157288,20 4,19.3284271 4,18.5 L4,14.5 C4,13.6715729 4.67157288,13 5.5,13 Z M11,15 C10.4477153,15 10,15.4477153 10,16 C10,16.5522847 10.4477153,17 11,17 L13,17 C13.5522847,17 14,16.5522847 14,16 C14,15.4477153 13.5522847,15 13,15 L11,15 Z" id="Combined-Shape-Copy" fill="#000000"/>
            </g>
          </svg>
         </span>
                                    </div>
                                    <div class="d-flex flex-column">
                                        <a class="text-dark text-hover-success font-weight-bold font-size-h4 mb-3" href="/settings/inboxType"> {{__('lang.Settingsassignments')}} </a>
                                        <div class="text-dark-75">
                                            {{--                                {{__('lang.MaSettings')}}--}}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endif
                @if($UserRole->find(Auth::user()->role)->settings_InboxGroup ==1 )

                    <div class="col-lg-6 col-xl-4 mb-5">
                        <div class="card card-custom mb-8 mb-lg-0">
                            <div class="card-body">
                                <div class="d-flex align-items-center p-5">
                                    <div class="mr-6">
         <span class="svg-icon svg-icon-success svg-icon-4x">
          <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1" class="kt-svg-icon">
            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                <rect id="bound" x="0" y="0" width="24" height="24"/>
                <path d="M5.5,4 L18.5,4 C19.3284271,4 20,4.67157288 20,5.5 L20,9.5 C20,10.3284271 19.3284271,11 18.5,11 L5.5,11 C4.67157288,11 4,10.3284271 4,9.5 L4,5.5 C4,4.67157288 4.67157288,4 5.5,4 Z M11,6 C10.4477153,6 10,6.44771525 10,7 C10,7.55228475 10.4477153,8 11,8 L13,8 C13.5522847,8 14,7.55228475 14,7 C14,6.44771525 13.5522847,6 13,6 L11,6 Z" id="Combined-Shape" fill="#000000" opacity="0.3"/>
                <path d="M5.5,13 L18.5,13 C19.3284271,13 20,13.6715729 20,14.5 L20,18.5 C20,19.3284271 19.3284271,20 18.5,20 L5.5,20 C4.67157288,20 4,19.3284271 4,18.5 L4,14.5 C4,13.6715729 4.67157288,13 5.5,13 Z M11,15 C10.4477153,15 10,15.4477153 10,16 C10,16.5522847 10.4477153,17 11,17 L13,17 C13.5522847,17 14,16.5522847 14,16 C14,15.4477153 13.5522847,15 13,15 L11,15 Z" id="Combined-Shape-Copy" fill="#000000"/>
            </g>
          </svg>
         </span>
                                    </div>
                                    <div class="d-flex flex-column">
                                        <a class="text-dark text-hover-success font-weight-bold font-size-h4 mb-3" href="/settings/InboxGroup"> {{__('lang.Settingsgroups')}}     </a>
                                        <div class="text-dark-75">
                                            {{--                                {{__('lang.ilSettings')}}--}}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endif

            </div>

        </div>

    </div>
@endsection
