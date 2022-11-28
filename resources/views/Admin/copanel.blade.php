@extends('layout.layout')

@section('title')
    {{__('lang.Control')}}
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

        @if($UserRole->find(Auth::user()->role)->copanel_roles ==1 )

        <div class="col-lg-6 col-xl-4 mb-5">
    <div class="card card-custom mb-8 mb-lg-0">
      <div class="card-body">
      <div class="d-flex align-items-center p-5">
        <div class="mr-6">
          <span class="svg-icon svg-icon-primary svg-icon-4x">
          <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1" class="kt-svg-icon">
            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                <polygon id="Shape" points="0 0 24 0 24 24 0 24"/>
                <path d="M18,8 L16,8 C15.4477153,8 15,7.55228475 15,7 C15,6.44771525 15.4477153,6 16,6 L18,6 L18,4 C18,3.44771525 18.4477153,3 19,3 C19.5522847,3 20,3.44771525 20,4 L20,6 L22,6 C22.5522847,6 23,6.44771525 23,7 C23,7.55228475 22.5522847,8 22,8 L20,8 L20,10 C20,10.5522847 19.5522847,11 19,11 C18.4477153,11 18,10.5522847 18,10 L18,8 Z M9,11 C6.790861,11 5,9.209139 5,7 C5,4.790861 6.790861,3 9,3 C11.209139,3 13,4.790861 13,7 C13,9.209139 11.209139,11 9,11 Z" id="Combined-Shape" fill="#000000" fill-rule="nonzero" opacity="0.3"/>
                <path d="M0.00065168429,20.1992055 C0.388258525,15.4265159 4.26191235,13 8.98334134,13 C13.7712164,13 17.7048837,15.2931929 17.9979143,20.2 C18.0095879,20.3954741 17.9979143,21 17.2466999,21 C13.541124,21 8.03472472,21 0.727502227,21 C0.476712155,21 -0.0204617505,20.45918 0.00065168429,20.1992055 Z" id="Mask-Copy" fill="#000000" fill-rule="nonzero"/>
            </g>
          </svg>
          </span>
        </div>
        <div class="d-flex flex-column">
          <a class="text-dark text-hover-primary font-weight-bold font-size-h4 mb-3" href="/copanel/UserRole">{{__('lang.Control_Register')}}</a>
          <div class="text-dark-75">
          </div>
        </div>
      </div>
      </div>
    </div>
  </div>
        @endif
        @if($UserRole->find(Auth::user()->role)->copanel_setting ==1 )

  <div class="col-lg-6 col-xl-4 mb-5">
    <div class="card card-custom mb-8 mb-lg-0">
      <div class="card-body">
      <div class="d-flex align-items-center p-5">
        <div class="mr-6">
          <span class="svg-icon svg-icon-success svg-icon-4x">
          <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1" class="kt-svg-icon">
            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                <rect id="bound" x="0" y="0" width="24" height="24"/>
                <path d="M5,8.6862915 L5,5 L8.6862915,5 L11.5857864,2.10050506 L14.4852814,5 L19,5 L19,9.51471863 L21.4852814,12 L19,14.4852814 L19,19 L14.4852814,19 L11.5857864,21.8994949 L8.6862915,19 L5,19 L5,15.3137085 L1.6862915,12 L5,8.6862915 Z M12,15 C13.6568542,15 15,13.6568542 15,12 C15,10.3431458 13.6568542,9 12,9 C10.3431458,9 9,10.3431458 9,12 C9,13.6568542 10.3431458,15 12,15 Z" id="Combined-Shape" fill="#000000"/>
            </g>
          </svg>
          </span>
        </div>
        <div class="d-flex flex-column">
          <a class="text-dark text-hover-success font-weight-bold font-size-h4 mb-3" href="/copanel/Setting">{{__('lang.Control_settings')}}</a>
          <div class="text-dark-75">

          </div>
        </div>
      </div>
      </div>
    </div>
  </div>
        @endif
        @if($UserRole->find(Auth::user()->role)->copanel_lang == 1 )

  <div class="col-lg-6 col-xl-4 mb-5">
    <div class="card card-custom mb-8 mb-lg-0">
      <div class="card-body">
      <div class="d-flex align-items-center p-5">
        <div class="mr-6">
          <span class="svg-icon svg-icon-primary svg-icon-4x">
          <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1" class="kt-svg-icon">
            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                <rect id="bound" x="0" y="0" width="24" height="24"/>
                <path d="M0.18,19 L7.1,4.64 L14.02,19 L12.06,19 L10.3,15.28 L3.9,15.28 L2.14,19 L0.18,19 Z M7.1,8.52 L4.7,13.6 L9.5,13.6 L7.1,8.52 Z" id="Aa" fill="#000000"/>
                <path d="M21.34,19 L21.34,18 C20.5,18.76 19.38,19.16 18.16,19.16 C15.22,19.16 13.06,16.9 13.06,14 C13.06,11.1 15.22,8.84 18.16,8.84 C19.38,8.84 20.5,9.24 21.34,10 L21.34,9 L23.06,9 L23.06,19 L21.34,19 Z M18.2,17.54 C19.64,17.54 20.76,16.86 21.34,15.92 L21.34,12.08 C20.76,11.14 19.64,10.46 18.2,10.46 C16.24,10.46 14.84,12.02 14.84,14 C14.84,15.98 16.24,17.54 18.2,17.54 Z" id="Combined-Shape" fill="#000000" opacity="0.3"/>
            </g>
          </svg>
          </span>
        </div>
        <div class="d-flex flex-column">
          <a class="text-dark text-hover-primary font-weight-bold font-size-h4 mb-3" href="/copanel/Languages">{{__('lang.Control_sett')}}</a>
          <div class="text-dark-75">
          </div>
        </div>
      </div>
      </div>
    </div>
  </div>
        @endif
        @if($UserRole->find(Auth::user()->role)->copanel_logs ==1 )

  <div class="col-lg-6 col-xl-4 mb-5">
    <div class="card card-custom mb-8 mb-lg-0">
      <div class="card-body">
      <div class="d-flex align-items-center p-5">
        <div class="mr-4">
          <span class="svg-icon svg-icon-success svg-icon-4x">
          <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1" class="kt-svg-icon">
            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                <rect id="bound" x="0" y="0" width="24" height="24"/>
                <path d="M18,2 L20,2 C21.6568542,2 23,3.34314575 23,5 L23,19 C23,20.6568542 21.6568542,22 20,22 L18,22 L18,2 Z" id="Rectangle-161-Copy" fill="#000000" opacity="0.3"/>
                <path d="M5,2 L17,2 C18.6568542,2 20,3.34314575 20,5 L20,19 C20,20.6568542 18.6568542,22 17,22 L5,22 C4.44771525,22 4,21.5522847 4,21 L4,3 C4,2.44771525 4.44771525,2 5,2 Z M12,11 C13.1045695,11 14,10.1045695 14,9 C14,7.8954305 13.1045695,7 12,7 C10.8954305,7 10,7.8954305 10,9 C10,10.1045695 10.8954305,11 12,11 Z M7.00036205,16.4995035 C6.98863236,16.6619875 7.26484009,17 7.4041679,17 C11.463736,17 14.5228466,17 16.5815,17 C16.9988413,17 17.0053266,16.6221713 16.9988413,16.5 C16.8360465,13.4332455 14.6506758,12 11.9907452,12 C9.36772908,12 7.21569918,13.5165724 7.00036205,16.4995035 Z" id="Combined-Shape" fill="#000000"/>
            </g>
          </svg>
          </span>
        </div>
        <div class="d-flex flex-column">
          <a class="text-dark text-hover-success font-weight-bold font-size-h4 mb-3" href="/copanel/Logs">{{__('lang.Control_movements')}}</a>
          <div class="text-dark-75">
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
