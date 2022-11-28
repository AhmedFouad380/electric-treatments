@extends('layout.layout')

@section('title')
    {{__('lang.Transactionsincoming')}}
@endsection
@section('css')
  <link href="{{asset('dashboard/assets/plugins/custom/datatables/datatables.bundle.css')}}" rel="stylesheet" type="text/css" />
<meta contentType="text/html; charset=UTF-8" pageEncoding="UTF-8" />

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
                            <h5 class="text-dark font-weight-bold my-1 mr-5 ">{{trans('lang.content')}}</h5>
                        </li>
                    </ul>

                    <!--end::Breadcrumb-->
                </div>
                <!--end::Page Heading-->
            </div>
        </div>
    </div>

    <div class="container">
        <!--begin::Inbox--><br>
        <!--begin::Inbox--><br>
        <!--begin::Inbox--><br>
    <div class="d-flex flex-row">
      <!--begin::Aside-->
{{--      <div class="flex-row-auto offcanvas-mobile w-200px w-xxl-275px" id="kt_inbox_aside">--}}
{{--        <!--begin::Card-->--}}
{{--          <div class="card card-custom card-stretch">--}}
{{--              <!--begin::Body-->--}}
{{--              <div class="card-body px-5">--}}
{{--                  <!--begin::Navigations-->--}}
{{--                  <div class="navi navi-hover navi-active navi-link-rounded navi-bold navi-icon-center navi-light-icon">--}}
{{--                      <!--begin::Item-->--}}
{{--                      <div class="navi-item my-2">--}}
{{--                          <a href="/transactions/inbox" class="navi-link ">--}}
{{--                  <span class="navi-icon mr-4">--}}
{{--                    <span class="svg-icon svg-icon-lg">--}}
{{--                      <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1" class="kt-svg-icon">--}}
{{--                        <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">--}}
{{--                            <rect id="bound" x="0" y="0" width="24" height="24"/>--}}
{{--                            <path d="M5,9 L19,9 C20.1045695,9 21,9.8954305 21,11 L21,20 C21,21.1045695 20.1045695,22 19,22 L5,22 C3.8954305,22 3,21.1045695 3,20 L3,11 C3,9.8954305 3.8954305,9 5,9 Z M18.1444251,10.8396467 L12,14.1481833 L5.85557487,10.8396467 C5.4908718,10.6432681 5.03602525,10.7797221 4.83964668,11.1444251 C4.6432681,11.5091282 4.77972206,11.9639747 5.14442513,12.1603533 L11.6444251,15.6603533 C11.8664074,15.7798822 12.1335926,15.7798822 12.3555749,15.6603533 L18.8555749,12.1603533 C19.2202779,11.9639747 19.3567319,11.5091282 19.1603533,11.1444251 C18.9639747,10.7797221 18.5091282,10.6432681 18.1444251,10.8396467 Z" id="Combined-Shape" fill="#000000"/>--}}
{{--                            <path d="M11.1288761,0.733697713 L11.1288761,2.69017121 L9.12120481,2.69017121 C8.84506244,2.69017121 8.62120481,2.91402884 8.62120481,3.19017121 L8.62120481,4.21346991 C8.62120481,4.48961229 8.84506244,4.71346991 9.12120481,4.71346991 L11.1288761,4.71346991 L11.1288761,6.66994341 C11.1288761,6.94608579 11.3527337,7.16994341 11.6288761,7.16994341 C11.7471877,7.16994341 11.8616664,7.12798964 11.951961,7.05154023 L15.4576222,4.08341738 C15.6683723,3.90498251 15.6945689,3.58948575 15.5161341,3.37873564 C15.4982803,3.35764848 15.4787093,3.33807751 15.4576222,3.32022374 L11.951961,0.352100892 C11.7412109,0.173666017 11.4257142,0.199862688 11.2472793,0.410612793 C11.1708299,0.500907473 11.1288761,0.615386087 11.1288761,0.733697713 Z" id="Shape" fill="#000000" fill-rule="nonzero" opacity="0.3" transform="translate(11.959697, 3.661508) rotate(-270.000000) translate(-11.959697, -3.661508) "/>--}}
{{--                        </g>--}}
{{--                      </svg>--}}
{{--                    </span>--}}
{{--                  </span>--}}
{{--                              <span class="navi-text font-weight-bolder font-size-lg">{{__('lang.Transactionsincoming')}}</span>--}}
{{--                          </a>--}}
{{--                      </div>--}}
{{--                      <!--end::Item-->--}}
{{--                      <!--begin::Item-->--}}
{{--                      <div class="navi-item my-2">--}}
{{--                          <a href="/transactions/outbox" class="navi-link">--}}
{{--                  <span class="navi-icon mr-4">--}}
{{--                    <span class="svg-icon svg-icon-lg">--}}
{{--                      <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1" class="kt-svg-icon">--}}
{{--                        <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">--}}
{{--                            <rect id="bound" x="0" y="0" width="24" height="24"/>--}}
{{--                            <path d="M5,9 L19,9 C20.1045695,9 21,9.8954305 21,11 L21,20 C21,21.1045695 20.1045695,22 19,22 L5,22 C3.8954305,22 3,21.1045695 3,20 L3,11 C3,9.8954305 3.8954305,9 5,9 Z M18.1444251,10.8396467 L12,14.1481833 L5.85557487,10.8396467 C5.4908718,10.6432681 5.03602525,10.7797221 4.83964668,11.1444251 C4.6432681,11.5091282 4.77972206,11.9639747 5.14442513,12.1603533 L11.6444251,15.6603533 C11.8664074,15.7798822 12.1335926,15.7798822 12.3555749,15.6603533 L18.8555749,12.1603533 C19.2202779,11.9639747 19.3567319,11.5091282 19.1603533,11.1444251 C18.9639747,10.7797221 18.5091282,10.6432681 18.1444251,10.8396467 Z" id="Combined-Shape" fill="#000000"/>--}}
{{--                            <path d="M11.1288761,0.733697713 L11.1288761,2.69017121 L9.12120481,2.69017121 C8.84506244,2.69017121 8.62120481,2.91402884 8.62120481,3.19017121 L8.62120481,4.21346991 C8.62120481,4.48961229 8.84506244,4.71346991 9.12120481,4.71346991 L11.1288761,4.71346991 L11.1288761,6.66994341 C11.1288761,6.94608579 11.3527337,7.16994341 11.6288761,7.16994341 C11.7471877,7.16994341 11.8616664,7.12798964 11.951961,7.05154023 L15.4576222,4.08341738 C15.6683723,3.90498251 15.6945689,3.58948575 15.5161341,3.37873564 C15.4982803,3.35764848 15.4787093,3.33807751 15.4576222,3.32022374 L11.951961,0.352100892 C11.7412109,0.173666017 11.4257142,0.199862688 11.2472793,0.410612793 C11.1708299,0.500907473 11.1288761,0.615386087 11.1288761,0.733697713 Z" id="Shape" fill="#000000" fill-rule="nonzero" opacity="0.3" transform="translate(11.959697, 3.661508) rotate(-90.000000) translate(-11.959697, -3.661508) "/>--}}
{{--                        </g>--}}
{{--                      </svg>--}}
{{--                    </span>--}}
{{--                  </span>--}}
{{--                              <span class="navi-text font-weight-bolder font-size-lg">{{__('lang.TransactionsOutgoing')}}</span>--}}
{{--                          </a>--}}
{{--                      </div>--}}
{{--                      <!--end::Item-->--}}
{{--                      <!--begin::Item-->--}}
{{--                      <div class="navi-item my-2">--}}
{{--                          <a href="/transactions/inbox_Create" class="navi-link">--}}
{{--                  <span class="navi-icon mr-4">--}}
{{--                    <span class="svg-icon svg-icon-lg">--}}
{{--                      <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1" class="kt-svg-icon">--}}
{{--                        <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">--}}
{{--                            <rect id="bound" x="0" y="0" width="24" height="24"/>--}}
{{--                            <path d="M4,16 L5,16 C5.55228475,16 6,16.4477153 6,17 C6,17.5522847 5.55228475,18 5,18 L4,18 C3.44771525,18 3,17.5522847 3,17 C3,16.4477153 3.44771525,16 4,16 Z M1,11 L5,11 C5.55228475,11 6,11.4477153 6,12 C6,12.5522847 5.55228475,13 5,13 L1,13 C0.44771525,13 6.76353751e-17,12.5522847 0,12 C-6.76353751e-17,11.4477153 0.44771525,11 1,11 Z M3,6 L5,6 C5.55228475,6 6,6.44771525 6,7 C6,7.55228475 5.55228475,8 5,8 L3,8 C2.44771525,8 2,7.55228475 2,7 C2,6.44771525 2.44771525,6 3,6 Z" id="Combined-Shape" fill="#000000" opacity="0.3"/>--}}
{{--                            <path d="M10,6 L22,6 C23.1045695,6 24,6.8954305 24,8 L24,16 C24,17.1045695 23.1045695,18 22,18 L10,18 C8.8954305,18 8,17.1045695 8,16 L8,8 C8,6.8954305 8.8954305,6 10,6 Z M21.0849395,8.0718316 L16,10.7185839 L10.9150605,8.0718316 C10.6132433,7.91473331 10.2368262,8.02389331 10.0743092,8.31564728 C9.91179228,8.60740125 10.0247174,8.9712679 10.3265346,9.12836619 L15.705737,11.9282847 C15.8894428,12.0239051 16.1105572,12.0239051 16.294263,11.9282847 L21.6734654,9.12836619 C21.9752826,8.9712679 22.0882077,8.60740125 21.9256908,8.31564728 C21.7631738,8.02389331 21.3867567,7.91473331 21.0849395,8.0718316 Z" id="Combined-Shape" fill="#000000"/>--}}
{{--                        </g>--}}
{{--                      </svg>--}}
{{--                    </span>--}}
{{--                  </span>--}}
{{--                              <span class="navi-text font-weight-bolder font-size-lg">{{__('lang.TransactionsCreate')}}</span>--}}
{{--                          </a>--}}
{{--                      </div>--}}
{{--                      <!--end::Item-->--}}
{{--                      <!--begin::Item-->--}}
{{--                      <div class="navi-item my-2">--}}
{{--                          <a href="/transactions/outbox_Create" class="navi-link">--}}
{{--                  <span class="navi-icon mr-4">--}}
{{--                    <span class="svg-icon svg-icon-lg">--}}
{{--                      <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1" class="kt-svg-icon">--}}
{{--                        <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">--}}
{{--                            <rect id="bound" x="0" y="0" width="24" height="24"/>--}}
{{--                            <path d="M8,13.1668961 L20.4470385,11.9999863 L8,10.8330764 L8,5.77181995 C8,5.70108058 8.01501031,5.63114635 8.04403925,5.56663761 C8.15735832,5.31481744 8.45336217,5.20254012 8.70518234,5.31585919 L22.545552,11.5440255 C22.6569791,11.5941677 22.7461882,11.6833768 22.7963304,11.794804 C22.9096495,12.0466241 22.7973722,12.342628 22.545552,12.455947 L8.70518234,18.6841134 C8.64067359,18.7131423 8.57073936,18.7281526 8.5,18.7281526 C8.22385763,18.7281526 8,18.504295 8,18.2281526 L8,13.1668961 Z" id="Combined-Shape" fill="#000000"/>--}}
{{--                            <path d="M4,16 L5,16 C5.55228475,16 6,16.4477153 6,17 C6,17.5522847 5.55228475,18 5,18 L4,18 C3.44771525,18 3,17.5522847 3,17 C3,16.4477153 3.44771525,16 4,16 Z M1,11 L5,11 C5.55228475,11 6,11.4477153 6,12 C6,12.5522847 5.55228475,13 5,13 L1,13 C0.44771525,13 6.76353751e-17,12.5522847 0,12 C-6.76353751e-17,11.4477153 0.44771525,11 1,11 Z M4,6 L5,6 C5.55228475,6 6,6.44771525 6,7 C6,7.55228475 5.55228475,8 5,8 L4,8 C3.44771525,8 3,7.55228475 3,7 C3,6.44771525 3.44771525,6 4,6 Z" id="Combined-Shape" fill="#000000" opacity="0.3"/>--}}
{{--                        </g>--}}
{{--                      </svg>--}}
{{--                    </span>--}}
{{--                  </span>--}}
{{--                              <span class="navi-text font-weight-bolder font-size-lg">{{__('lang.Transactionsoutbound')}}</span>--}}
{{--                          </a>--}}
{{--                      </div>--}}
{{--                      <!--end::Item-->--}}
{{--                      <div class="navi-item my-2">--}}
{{--                          <a href="/transactions/OutExport" class="navi-link ">--}}
{{--                  <span class="navi-icon mr-4">--}}
{{--                    <span class="svg-icon svg-icon-lg">--}}
{{--                      <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1" class="kt-svg-icon">--}}
{{--                        <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">--}}
{{--                            <rect id="bound" x="0" y="0" width="24" height="24"/>--}}
{{--                            <path d="M5,9 L19,9 C20.1045695,9 21,9.8954305 21,11 L21,20 C21,21.1045695 20.1045695,22 19,22 L5,22 C3.8954305,22 3,21.1045695 3,20 L3,11 C3,9.8954305 3.8954305,9 5,9 Z M18.1444251,10.8396467 L12,14.1481833 L5.85557487,10.8396467 C5.4908718,10.6432681 5.03602525,10.7797221 4.83964668,11.1444251 C4.6432681,11.5091282 4.77972206,11.9639747 5.14442513,12.1603533 L11.6444251,15.6603533 C11.8664074,15.7798822 12.1335926,15.7798822 12.3555749,15.6603533 L18.8555749,12.1603533 C19.2202779,11.9639747 19.3567319,11.5091282 19.1603533,11.1444251 C18.9639747,10.7797221 18.5091282,10.6432681 18.1444251,10.8396467 Z" id="Combined-Shape" fill="#000000"/>--}}
{{--                            <path d="M11.1288761,0.733697713 L11.1288761,2.69017121 L9.12120481,2.69017121 C8.84506244,2.69017121 8.62120481,2.91402884 8.62120481,3.19017121 L8.62120481,4.21346991 C8.62120481,4.48961229 8.84506244,4.71346991 9.12120481,4.71346991 L11.1288761,4.71346991 L11.1288761,6.66994341 C11.1288761,6.94608579 11.3527337,7.16994341 11.6288761,7.16994341 C11.7471877,7.16994341 11.8616664,7.12798964 11.951961,7.05154023 L15.4576222,4.08341738 C15.6683723,3.90498251 15.6945689,3.58948575 15.5161341,3.37873564 C15.4982803,3.35764848 15.4787093,3.33807751 15.4576222,3.32022374 L11.951961,0.352100892 C11.7412109,0.173666017 11.4257142,0.199862688 11.2472793,0.410612793 C11.1708299,0.500907473 11.1288761,0.615386087 11.1288761,0.733697713 Z" id="Shape" fill="#000000" fill-rule="nonzero" opacity="0.3" transform="translate(11.959697, 3.661508) rotate(-270.000000) translate(-11.959697, -3.661508) "/>--}}
{{--                        </g>--}}
{{--                      </svg>--}}
{{--                    </span>--}}
{{--                  </span>--}}
{{--                              <span class="navi-text font-weight-bolder font-size-lg">{{__('lang.OutExport')}}</span>--}}
{{--                          </a>--}}
{{--                      </div>--}}
{{--                      <!--end::Item-->--}}
{{--                      <!--begin::Item-->--}}
{{--                      <div class="navi-item my-2">--}}
{{--                          <a href="/transactions/CreateOutExport" class="navi-link">--}}
{{--                  <span class="navi-icon mr-4">--}}
{{--                    <span class="svg-icon svg-icon-lg">--}}
{{--                      <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1" class="kt-svg-icon">--}}
{{--                        <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">--}}
{{--                            <rect id="bound" x="0" y="0" width="24" height="24"/>--}}
{{--                            <path d="M5,9 L19,9 C20.1045695,9 21,9.8954305 21,11 L21,20 C21,21.1045695 20.1045695,22 19,22 L5,22 C3.8954305,22 3,21.1045695 3,20 L3,11 C3,9.8954305 3.8954305,9 5,9 Z M18.1444251,10.8396467 L12,14.1481833 L5.85557487,10.8396467 C5.4908718,10.6432681 5.03602525,10.7797221 4.83964668,11.1444251 C4.6432681,11.5091282 4.77972206,11.9639747 5.14442513,12.1603533 L11.6444251,15.6603533 C11.8664074,15.7798822 12.1335926,15.7798822 12.3555749,15.6603533 L18.8555749,12.1603533 C19.2202779,11.9639747 19.3567319,11.5091282 19.1603533,11.1444251 C18.9639747,10.7797221 18.5091282,10.6432681 18.1444251,10.8396467 Z" id="Combined-Shape" fill="#000000"/>--}}
{{--                            <path d="M11.1288761,0.733697713 L11.1288761,2.69017121 L9.12120481,2.69017121 C8.84506244,2.69017121 8.62120481,2.91402884 8.62120481,3.19017121 L8.62120481,4.21346991 C8.62120481,4.48961229 8.84506244,4.71346991 9.12120481,4.71346991 L11.1288761,4.71346991 L11.1288761,6.66994341 C11.1288761,6.94608579 11.3527337,7.16994341 11.6288761,7.16994341 C11.7471877,7.16994341 11.8616664,7.12798964 11.951961,7.05154023 L15.4576222,4.08341738 C15.6683723,3.90498251 15.6945689,3.58948575 15.5161341,3.37873564 C15.4982803,3.35764848 15.4787093,3.33807751 15.4576222,3.32022374 L11.951961,0.352100892 C11.7412109,0.173666017 11.4257142,0.199862688 11.2472793,0.410612793 C11.1708299,0.500907473 11.1288761,0.615386087 11.1288761,0.733697713 Z" id="Shape" fill="#000000" fill-rule="nonzero" opacity="0.3" transform="translate(11.959697, 3.661508) rotate(-90.000000) translate(-11.959697, -3.661508) "/>--}}
{{--                        </g>--}}
{{--                      </svg>--}}
{{--                    </span>--}}
{{--                  </span>--}}
{{--                              <span class="navi-text font-weight-bolder font-size-lg">{{__('lang.CreateOutExport')}}</span>--}}
{{--                          </a>--}}
{{--                      </div>--}}

{{--                      <!--begin::Item-->--}}
{{--                      <div class="navi-item my-2">--}}
{{--                          <a href="#" class="navi-link">--}}
{{--                  <span class="navi-icon mr-4">--}}
{{--                    <span class="svg-icon svg-icon-lg">--}}
{{--                      <!--begin::Svg Icon | path:assets/media/svg/icons/General/Trash.svg-->--}}
{{--                      <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1" class="kt-svg-icon">--}}
{{--                        <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">--}}
{{--                            <rect id="bound" x="0" y="0" width="24" height="24"/>--}}
{{--                            <path d="M6,2 L18,2 C18.5522847,2 19,2.44771525 19,3 L19,12 C19,12.5522847 18.5522847,13 18,13 L6,13 C5.44771525,13 5,12.5522847 5,12 L5,3 C5,2.44771525 5.44771525,2 6,2 Z M7.5,5 C7.22385763,5 7,5.22385763 7,5.5 C7,5.77614237 7.22385763,6 7.5,6 L13.5,6 C13.7761424,6 14,5.77614237 14,5.5 C14,5.22385763 13.7761424,5 13.5,5 L7.5,5 Z M7.5,7 C7.22385763,7 7,7.22385763 7,7.5 C7,7.77614237 7.22385763,8 7.5,8 L10.5,8 C10.7761424,8 11,7.77614237 11,7.5 C11,7.22385763 10.7761424,7 10.5,7 L7.5,7 Z" id="Combined-Shape" fill="#000000" opacity="0.3"/>--}}
{{--                            <path d="M3.79274528,6.57253826 L12,12.5 L20.2072547,6.57253826 C20.4311176,6.4108595 20.7436609,6.46126971 20.9053396,6.68513259 C20.9668779,6.77033951 21,6.87277228 21,6.97787787 L21,17 C21,18.1045695 20.1045695,19 19,19 L5,19 C3.8954305,19 3,18.1045695 3,17 L3,6.97787787 C3,6.70173549 3.22385763,6.47787787 3.5,6.47787787 C3.60510559,6.47787787 3.70753836,6.51099993 3.79274528,6.57253826 Z" id="Combined-Shape" fill="#000000"/>--}}
{{--                        </g>--}}
{{--                      </svg>--}}
{{--                    </span>--}}
{{--                  </span>--}}
{{--                              <span class="navi-text font-weight-bolder font-size-lg">{{__('lang.Transactionsreports')}}</span>--}}
{{--                          </a>--}}
{{--                      </div>--}}
{{--                      <!--end::Item-->--}}
{{--                      <!--begin::Item-->--}}
{{--                      <div class="navi-item my-2">--}}
{{--                          <a href="/transactions/archiveinbox" class="navi-link ">--}}
{{--                  <span class="navi-icon mr-4">--}}
{{--                    <span class="svg-icon svg-icon-lg">--}}
{{--                      <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1" class="kt-svg-icon">--}}
{{--                        <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">--}}
{{--                            <rect id="bound" x="0" y="0" width="24" height="24"/>--}}
{{--                            <path d="M12.9835977,18 C12.7263047,14.0909841 9.47412135,11 5.5,11 C4.98630124,11 4.48466491,11.0516454 4,11.1500272 L4,7 C4,5.8954305 4.8954305,5 6,5 L20,5 C21.1045695,5 22,5.8954305 22,7 L22,16 C22,17.1045695 21.1045695,18 20,18 L12.9835977,18 Z M19.1444251,6.83964668 L13,10.1481833 L6.85557487,6.83964668 C6.4908718,6.6432681 6.03602525,6.77972206 5.83964668,7.14442513 C5.6432681,7.5091282 5.77972206,7.96397475 6.14442513,8.16035332 L12.6444251,11.6603533 C12.8664074,11.7798822 13.1335926,11.7798822 13.3555749,11.6603533 L19.8555749,8.16035332 C20.2202779,7.96397475 20.3567319,7.5091282 20.1603533,7.14442513 C19.9639747,6.77972206 19.5091282,6.6432681 19.1444251,6.83964668 Z" id="Combined-Shape" fill="#000000"/>--}}
{{--                            <path d="M8.4472136,18.1055728 C8.94119209,18.3525621 9.14141644,18.9532351 8.89442719,19.4472136 C8.64743794,19.9411921 8.0467649,20.1414164 7.5527864,19.8944272 L5,18.618034 L5,14.5 C5,13.9477153 5.44771525,13.5 6,13.5 C6.55228475,13.5 7,13.9477153 7,14.5 L7,17.381966 L8.4472136,18.1055728 Z" id="Path-85" fill="#000000" fill-rule="nonzero" opacity="0.3"/>--}}
{{--                        </g>--}}
{{--                      </svg>--}}
{{--                    </span>--}}
{{--                  </span>--}}
{{--                              <span class="navi-text font-weight-bolder font-size-lg">{{__('lang.TransactionsSave')}}</span>--}}
{{--                          </a>--}}
{{--                      </div>--}}
{{--                      <!--end::Item-->--}}
{{--                      <!--begin::Item-->--}}
{{--                      <div class="navi-item my-2">--}}
{{--                          <a href="/transactions/archiveoutbox" class="navi-link">--}}
{{--                  <span class="navi-icon mr-4">--}}
{{--                    <span class="svg-icon svg-icon-lg">--}}
{{--                      <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1" class="kt-svg-icon">--}}
{{--                        <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">--}}
{{--                            <rect id="bound" x="0" y="0" width="24" height="24"/>--}}
{{--                            <path d="M12.7037037,14 L15.6666667,10 L13.4444444,10 L13.4444444,6 L9,12 L11.2222222,12 L11.2222222,14 L6,14 C5.44771525,14 5,13.5522847 5,13 L5,3 C5,2.44771525 5.44771525,2 6,2 L18,2 C18.5522847,2 19,2.44771525 19,3 L19,13 C19,13.5522847 18.5522847,14 18,14 L12.7037037,14 Z" id="Combined-Shape" fill="#000000" opacity="0.3"/>--}}
{{--                            <path d="M9.80428954,10.9142091 L9,12 L11.2222222,12 L11.2222222,16 L15.6666667,10 L15.4615385,10 L20.2072547,6.57253826 C20.4311176,6.4108595 20.7436609,6.46126971 20.9053396,6.68513259 C20.9668779,6.77033951 21,6.87277228 21,6.97787787 L21,17 C21,18.1045695 20.1045695,19 19,19 L5,19 C3.8954305,19 3,18.1045695 3,17 L3,6.97787787 C3,6.70173549 3.22385763,6.47787787 3.5,6.47787787 C3.60510559,6.47787787 3.70753836,6.51099993 3.79274528,6.57253826 L9.80428954,10.9142091 Z" id="Combined-Shape" fill="#000000"/>--}}
{{--                        </g>--}}
{{--                      </svg>--}}
{{--                    </span>--}}
{{--                  </span>--}}
{{--                              <span class="navi-text font-weight-bolder font-size-lg">{{__('lang.Transactionsexport')}}</span>--}}
{{--                          </a>--}}
{{--                      </div>--}}
{{--                      <!--end::Item-->--}}
{{--                      <!--begin::Item-->--}}
{{--                      <div class="navi-item my-2">--}}
{{--                          <a href="/transactions/search" class="navi-link">--}}
{{--                  <span class="navi-icon mr-4">--}}
{{--                    <span class="svg-icon svg-icon-lg">--}}
{{--                      <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1" class="kt-svg-icon">--}}
{{--                        <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">--}}
{{--                            <rect id="bound" x="0" y="0" width="24" height="24"/>--}}
{{--                            <path d="M14.2928932,16.7071068 C13.9023689,16.3165825 13.9023689,15.6834175 14.2928932,15.2928932 C14.6834175,14.9023689 15.3165825,14.9023689 15.7071068,15.2928932 L19.7071068,19.2928932 C20.0976311,19.6834175 20.0976311,20.3165825 19.7071068,20.7071068 C19.3165825,21.0976311 18.6834175,21.0976311 18.2928932,20.7071068 L14.2928932,16.7071068 Z" id="Path-2" fill="#000000" fill-rule="nonzero" opacity="0.3"/>--}}
{{--                            <path d="M11,16 C13.7614237,16 16,13.7614237 16,11 C16,8.23857625 13.7614237,6 11,6 C8.23857625,6 6,8.23857625 6,11 C6,13.7614237 8.23857625,16 11,16 Z M11,18 C7.13400675,18 4,14.8659932 4,11 C4,7.13400675 7.13400675,4 11,4 C14.8659932,4 18,7.13400675 18,11 C18,14.8659932 14.8659932,18 11,18 Z" id="Path" fill="#000000" fill-rule="nonzero"/>--}}
{{--                        </g>--}}
{{--                      </svg>--}}
{{--                    </span>--}}
{{--                  </span>--}}
{{--                              <span class="navi-text font-weight-bolder font-size-lg">{{__('lang.TransactionsSearch')}}</span>--}}
{{--                          </a>--}}
{{--                      </div>--}}
{{--                      <!--end::Item-->--}}
{{--                      <!--begin::Item-->--}}
{{--                      <div class="navi-item my-2">--}}
{{--                          <a href="/transactions/secretSearch" class="navi-link">--}}
{{--                  <span class="navi-icon mr-4">--}}
{{--                    <span class="svg-icon svg-icon-lg">--}}
{{--                      <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1" class="kt-svg-icon">--}}
{{--                        <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">--}}
{{--                            <rect id="bound" x="0" y="0" width="24" height="24"/>--}}
{{--                            <path d="M4,4 L11.6314229,2.5691082 C11.8750185,2.52343403 12.1249815,2.52343403 12.3685771,2.5691082 L20,4 L20,13.2830094 C20,16.2173861 18.4883464,18.9447835 16,20.5 L12.5299989,22.6687507 C12.2057287,22.8714196 11.7942713,22.8714196 11.4700011,22.6687507 L8,20.5 C5.51165358,18.9447835 4,16.2173861 4,13.2830094 L4,4 Z" id="Path-50" fill="#000000" opacity="0.3"/>--}}
{{--                            <polygon id="Path-3-Copy" fill="#000000" opacity="0.3" points="11.3333333 18 16 11.4 13.6666667 11.4 13.6666667 7 9 13.6 11.3333333 13.6"/>--}}
{{--                        </g>--}}
{{--                      </svg>--}}
{{--                    </span>--}}
{{--                  </span>--}}
{{--                              <span class="navi-text font-weight-bolder font-size-lg">{{__('lang.TransactionsSecret')}}</span>--}}
{{--                          </a>--}}
{{--                      </div>--}}
{{--                      <!--end::Item-->--}}

{{--                  </div>--}}
{{--                  <!--end::Navigations-->--}}
{{--              </div>--}}
{{--              <!--end::Body-->--}}
{{--          </div>--}}
{{--        <!--end::Card-->--}}
{{--      </div>--}}
      <!--end::Aside-->
      <!--begin::List-->
      <div class="flex-row-fluid ml-lg-8 d-block" id="kt_inbox_list">
        <!--begin::Card-->
        <div class="card card-custom">
          <div class="card-header">
           <div class="card-toolbar">
            <ul class="nav nav-light-success nav-bold nav-pills">
             <li class="nav-item">
              <a class="nav-link active" data-toggle="tab" href="#kt_tab_pane_4_1">
                  <span class="nav-icon"><i class="flaticon2-chat-1"></i></span>
                  <span class="nav-text">{{__('lang.content')}}</span>
              </a>
             </li>
             <li class="nav-item">
              <a class="nav-link" data-toggle="tab" href="#kt_tab_pane_4_2">
                  <span class="nav-icon"><i class="flaticon2-drop"></i></span>
                  <span class="nav-text">{{__('lang.Annotations')}}</span>
              </a>
             </li>
             <li class="nav-item">
              <a class="nav-link" data-toggle="tab" href="#kt_tab_pane_4_3">
                  <span class="nav-icon"><i class="flaticon2-drop"></i></span>
                  <span class="nav-text">{{__('lang.Cover_letter')}}</span>
              </a>
             </li>
                @if($data->is_signature == null)
                <li class="nav-item">
                    <a class="nav-link" data-toggle="tab" href="#kt_tab_pane_5_4">
                        <span class="nav-icon"><i class="flaticon2-drop"></i></span>
                        <span class="nav-text">{{__('lang.Redirection')}} </span>
                    </a>
                </li>
                    @endif
                @inject('userRole','App\UserRole')
                @if($userRole->find(Auth::user()->role)->transactions_resendInbox)
                <li class="nav-item">
                    <a class="nav-link" data-toggle="tab" href="#kt_tab_pane_6">
                        <span class="nav-icon"><i class="flaticon2-drop"></i></span>
                        <span class="nav-text">تحويل المعاملة </span>
                    </a>
                </li>
                    @endif
            </ul>
           </div>
          </div>
          <div class="card-body">
           <div class="tab-content">
            <div class="tab-pane fade show active" id="kt_tab_pane_4_1" role="tabpanel" aria-labelledby="kt_tab_pane_4_1">
                <div class="row">
                  <div class="col-lg-12">

                    <div class="form-group">
                      <label>{{__('lang.Subject_transaction')}} :</label>
                      <input class="form-control form-control-solid" value="{{$data->title}}" disabled type="text" name="ministry_name" >
                    </div>
                      <div class="form-group">
                          <label for="example-date-input" class="col-form-label">{{__('lang.Date_speech')}} :</label>
                          <input class="form-control" type="date" value="{{$data->date}}" name="date" id="example-date-input" />
                      </div>
                    <div class="form-group">
                        <label>{{__('lang.Document_type')}} :</label>
                        @inject('inboxProcessType','App\inboxProcessType')
                        <input class="form-control form-control-solid" type="text" name="directorate_name" disabled
                     value="@if($inboxProcessType->find($data->attach_type_id)) @if(Request::segment(1) == 'ar') {{$inboxProcessType->find($data->attach_type_id)->ar_name}}  @else {{$inboxProcessType->find($data->attach_type_id)->en_name}} @endif @endif">
                    </div>
                    @inject('inboxType','App\inboxType')
                    <div class="form-group">
                        <label>{{__('lang.Assignment')}} :</label>
                        <input disabled class="form-control form-control-solid" type="text" name="it_name" value="@if($inboxType->find($data->type_id)) @if(Request::segment(1) == 'ar') {{$inboxType->find($data->type_id)->ar_name}}  @else {{$inboxType->find($data->attach_type_id)->en_name}} @endif @endif">
                    </div>
                    @inject('user','App\User')

                    <div class="form-group">
                      <label>{{__('lang.sender')}}:</label>
                      <input class="form-control form-control-solid" type="text" name="it_name"  disabled value="@if($user->find($data->sender_id))  {{$user->find($data->sender_id)->name}}  @endif">
                  </div>

                  <div class="form-group mb-1">
                    <label for="exampleTextarea">{{__('lang.Explanation')}}  :</label>
                    <textarea disabled class="form-control form-control-solid" id="exampleTextarea" rows="5">{{$data->description}}</textarea>
                  </div>
                      @inject('InboxAttachment','App\InboxAttachment')
                      @if($InboxAttachment->where('inbox_id',$data->id)->count() > 0)
                          <div class="form-group mb-1">
                              <table class="table">
                                  <thead>
                                  <tr>
                                      <th>#</th>
                                      <th> {{__('lang.Attached')}}  </th>
                                      <th> {{__('lang.Download')}}  </th>
                                  </tr>
                                  </thead>
                                  <?php
                                  $count=1;
                                  ?>
                                  <tbody >
                                  @foreach($InboxAttachment->where('inbox_id',$data->id)->get() as $attach)
                                      <tr>
                                          <td>{{$count}}</td>
                                          <td>{{$attach->file}}</td>
                                          <td><a download href="{{asset('Upload/Attachments/'.$attach->file)}}">
                                                  <i class="flaticon-download icon-nm"></i>
                                              </a></td>
                                      </tr>
                                      <?php
                                      $count++;
                                      ?>
                                  @endforeach
                                  </tbody>
                              </table>
                          </div>
                      @endif
                  </div>
                </div>
                    <br>
                <div class="card-footer">
                </div>


            </div>
            <div class="tab-pane fade" id="kt_tab_pane_4_2" role="tabpanel" aria-labelledby="kt_tab_pane_4_2">
              <div class="card card-custom card-stretch gutter-b">
                <!--begin::Body-->
                <div class="card-body pt-0 pb-3">
                  <div class="tab-content">
                    <!--begin::Table-->
                    <div class="table-responsive">
                      <table class="table table-head-bg table-borderless table-vertical-center" id="kt_table_1">
                        <thead>
                          <tr class="text-left text-uppercase ">
                              <th class="text-dark-75">{{__('lang.mm')}}</th>
                              <th class="text-dark-75">{{__('lang.Employee')}}</th>
                              <th class="text-dark-75">{{__('lang.Explanation')}}</th>
                              <th class="text-dark-75">{{__('lang.Guidance')}}</th>
                              <th class="text-dark-75">{{__('lang.Date')}}</th>
                              <th class="text-dark-75">{{__('lang.Attached')}}</th>
                          </tr>
                        </thead>
                          @inject('explan','App\InboxExplan')
                          @inject('User','App\User')
                          @inject('InboxType','App\InboxType')
                        <tbody>
                        @foreach($explan->where('inbox_id',$data->id)->get() as $b)
                          <tr>
                            <td>1</td>
                            <td>
                              <span class="text-dark-75"> من : @if($User->find($b->sender_id)) {{$User->find($b->sender_id)->name}} @else تم حذف الموظف  @endif  </span><br>
                              <span class="text-dark-75">الى : @if($User->find($b->reciver_id)) {{$User->find($b->reciver_id)->name}} @else تم حذف الموظف  @endif</span>
                            </td>
                            <td>
                              <span class="text-dark-75">{{$b->explan}}</span>
                            </td>
                            <td>
                              <span class="text-dark-75">
                                <span class="label font-weight-bold label-lg label-light-primary label-inline">@if($InboxType->find($b->type_id)) {{$InboxType->find($b->type_id)->ar_name}} @else تم حذف التوجيه  @endif</span>
                              </span>
                            </td>
                            <td>
                              <span class="text-dark-75">{{$b->created_at->format('Y-m-d')}}</span>
                            </td>
                              <?php
                                $explode = explode(',',$b->attachment_id);
                              ?>
                            <td class="pr-0 text-right">
                              <a href="javascript:avoid()" class="btn btn-light-success font-weight-bolder font-size-sm"><?php echo count($explode) ?></a>
                            </td>
                          </tr>
                          @endforeach

                        </tbody>
                      </table>
                    </div>
                    <!--end::Table-->
                  </div>
                </div>
                <!--end::Body-->
              </div>
              <!--end::Advance Table Widget 4-->
            </div>
               <div class="tab-pane fade" id="kt_tab_pane_4_3" role="tabpanel" aria-labelledby="kt_tab_pane_4_3">
                <a class="btn btn-primary" href="/Letter/{{$data->id}}">اظهار الخطاب </a>
                </div>

               <div class="tab-pane fade" id="kt_tab_pane_5_4" role="tabpanel" aria-labelledby="kt_tab_pane_5_4">
                   <form method="post" action="/Update_inbox">
                       @csrf

                       <div class="row">


                        <div class="col-lg-12">
                           <div class="form-group">
                               <select class="form-control row form-control-lg"  id="type_id2" name="type_id" required>
                                   @inject('inboxType','App\inboxType')
                                   @foreach($inboxType->all() as $datab)
                                       <option value="{{$datab->id}}"> @if(Request::segment(1) == 'ar') {{$datab->ar_name}} @else {{$datab->en_name}} @endif </option>
                                   @endforeach
                               </select>
                           </div>
                        </div>
                           <div class="col-lg-12" id="TypeBody">

                               <input type="hidden" name="id" value="{{$data->id}}">
                               <div class="form-group">
                                   <label for="exampleTextarea">{{__('lang.consignee')}} :</label>
                                   <select class="form-control row form-control-lg GetMemebers"  id="GetMemebers" name="date_type" required>
                                       <option value="0">مواظفين القسم </option>

                                       <?php
                                       $explode = explode(',',Auth::user()->groups_id);
                                       ?>
                                       @inject('InboxGroup','App\InboxGroup')
                                       @foreach($InboxGroup->whereIn('id',$explode)->get() as $datab)
                                           <option value="{{$datab->id}}"> {{$datab->name}}</option>
                                       @endforeach
                                   </select>
                               </div>
                                <div id="body">

                                </div>


                               <div class="form-group">
                                   <div class="checkbox-inline">
                                       <label class="checkbox">
                                           <input type="checkbox" value="1" name="is_urgent"/>
                                           <span></span>
                                           {{__('lang.Urgent')}}
                                       </label>
                                       <label class="checkbox">
                                           <input type="checkbox"  value="1"  name="is_secret"/>
                                           <span></span>
                                           {{__('lang.secret')}}
                                       </label>

                                       <label class="checkbox">
                                           <input type="checkbox"  onclick="myFunctionshowLetter()"/>
                                           <span></span>
                                           {{__('lang.Create_letter')}}
                                       </label>
                                       @php
                                           $job = \App\Job::where('id',Auth::user()->mainJob_id)->first();
                                       @endphp
                                       @if($job->job_role == 1 )
                                       <label class="checkbox" id="assgin">
                                           <?php $explode = explode('-',$data->is_assgin);  ?>
                                           @if(in_array(Auth::user()->id,$explode))
                                               <input type="checkbox" id="is_assginValue" checked value="{{$data->id}}"  onclick="Outassgin()"/>
                                               <span></span>
                                               اللغاء تاشير الخطاب
                                           @else
                                               <input type="checkbox" id="is_assginValue" data-id="{{$data->id}}"  onclick="assgin()"/>
                                               <span></span>
                                               @if(Request::segment(1) == 'ar')
                                                   تاشير الخطاب
                                               @else
                                                   تاشير الخطاب
                                               @endif
                                           @endif
                                       </label>
                                       <label class="checkbox" id="is_signature">
                                           @if($data->is_signature == null)
                                               <input type="checkbox" id="is_signatureValue" data-id="{{$data->id}}"  onclick="is_signature()"/>
                                               <span></span>
                                               @if(Request::segment(1) == 'ar')
                                                   توقيع الخطاب
                                               @else
                                                   توقيع الخطاب
                                               @endif
                                           @endif
                                       </label>
                                       @endif

                                   </div>
                               </div>
                           </div>
                           <div class="col-lg-12">
                               <div class="form-group mb-1">
                                   <label for="exampleTextarea">{{__('lang.Explanation')}}  :</label>
                                   <textarea class="form-control form-control-solid" name="description" id="exampleTextarea" rows="5"></textarea>
                               </div>
                               <div class="col-lg-12 " id="showLetter" style="display: none">
                                   <div class="form-group mb-1">
                                       <label for="exampleTextarea">{{__('lang.Speech')}} :</label>
                                       {{-- <textarea class="form-control form-control-solid" id="editor1" name="letter" rows="5">{{$data->letter}}</textarea> --}}
                                       <textarea id="kt-tinymce-3" name="letter" class="tox-target">{{$data->letter}}</textarea>
                                   </div>
                               </div>
                           </div>

                       </div>


                       <div class="card-footer">
                           <button type="#" class="btn btn-primary mr-2">{{__('lang.Redirection')}}</button>
                       </div>

                   </form>

               </div>
               <div class="tab-pane fade" id="kt_tab_pane_6" role="tabpanel" aria-labelledby="kt_tab_pane_6">
                   <form method="post" action="/Update_inbox">
                       @csrf

                       <div class="row">


                           <div class="col-lg-12">

                               <input type="hidden" name="id" value="{{$data->id}}">
                               <div class="form-group">
                                   <label for="exampleTextarea">{{__('lang.consignee')}} :</label>
                                   <select class="form-control row form-control-lg GetMemebers"  id="GetMemebers5" name="" required>
                                       <option value="0">مواظفين القسم </option>

                                       <?php
                                       $explode = explode(',',Auth::user()->groups_id);
                                       ?>
                                       @inject('InboxGroup','App\InboxGroup')
                                       @foreach($InboxGroup->whereIn('id',$explode)->get() as $datab)
                                           <option value="{{$datab->id}}"> {{$datab->name}}</option>
                                       @endforeach
                                   </select>
                               </div>
                                <div id="body5">

                                </div>



                           </div>
                       </div>


                       <div class="card-footer">
                           <button type="#" class="btn btn-primary mr-2">تحويل المعاملة </button>
                       </div>

                   </form>

               </div>
           </div>
          </div>
         </div>


      </div>
      <!--end::List-->
    </div>
    <!--end::Inbox-->
  </div>
  <!--end::Container-->
</div>
<!--end::Entry-->




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
        <form method="post" action="/Store_Bank">
            @csrf
          <div class="col-xl-12">
            <div class="kt-section__body">

              <div class="form-group row">
                <label class="col-xl-3 col-lg-3 col-form-label">@if(Request::segment(1) == 'ar') الاسم   @else  Name @endif</label>
                <div class="col-lg-9 col-xl-9">
                    <input class="form-control" type="text" name="name" value="">
                </div>
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
<script src="{{asset('dashboard/assets/js/pages/crud/datatables/search-options/advanced-search.js')}}"></script>
<!--begin::Page scripts(used by this page) -->
<script src="//cdn.ckeditor.com/4.15.1/full/ckeditor.js"></script>
<script src="{{asset('dashboard/assets/plugins/custom/tinymce/tinymce.bundle.js')}}"></script>

<script>
//DataTable
	var table = $('#kt_table_1').DataTable({
			"ordering":false,
			  buttons: [
        'copy', 'excel', 'print'
    ],

	});
</script>
<script>
    // Replace the <textarea id="editor1"> with a CKEditor 4
    // instance, using default configuration.
    // CKEDITOR.replace( 'editor1' );

    function myFunctionshowLetter() {
        var x = document.getElementById("showLetter");
        if (x.style.display === "none") {
            x.style.display = "block";
        } else {
            x.style.display = "none";
        }
    }
    var KTTinymce = function () {
        // Private functions
        var demos = function () {
            tinymce.init({
                selector: '#kt-tinymce-3',
                toolbar: ['styleselect fontselect fontsizeselect',
                'undo redo | cut copy paste | bold italic | link image | alignleft aligncenter alignright alignjustify',
                'bullist numlist | outdent indent | blockquote subscript superscript | advlist | autolink | lists charmap | print preview |  fullscreen | code'],
                plugins : 'fullscreen advlist autolink link image lists charmap print preview'
            });
        }

        return {
            // public functions
            init: function() {
                demos();
            }
        };
    }();

    function assgin(){
        var id = '{{Request::segment(4)}}';

        $.ajax({
            type: "GET",
            url: "{{url('assginLeter')}}",
            data: {'id':id },
            success: function (data) {
                Swal.fire("{{trans('word.Deleted')}}", "تم التاشير بنجاح ", "success");
                $("#assgin").html(data)


            }
        })
    }
    function Outassgin(){
        var id = '{{Request::segment(4)}}';
        $.ajax({
            type: "GET",
            url: "{{url('assginLeterOut')}}",
            data: {'id':id },
            success: function (data) {
                Swal.fire("نجح", "تم اللغاء بنجاح ", "success");
                $("#assgin").html(data)


            }
        })
    }
    function is_signature(){
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
                var id = '{{Request::segment(4)}}';
                $.ajax({
                    type: "GET",
                    url: "{{url('signatureLetter')}}",
                    data: {'id': id},
                    success: function (data) {
                        Swal.fire("نجح", "تم اللغاء بنجاح ", "success");
                        window.location.href = "{{url('/')}}/transactions/inbox";


                    }
                })                // result.dismiss can be 'cancel', 'overlay',
                // 'close', and 'timer'
            } else if (result.dismiss === 'cancel') {
                Swal.fire("{{trans('word.Cancelled')}}", "{{trans('word.Message_Cancelled_Delete')}}", "error");
            }
        });

    }

</script>
<script>

    $("#type_id2").click(function(){
        var id=$(this).val()
        var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
        $.ajax({
            type: "GET",
            url: "{{url('checkType')}}",
            data: {"id":id},
            success: function (data) {
                if(data == 1 || data == 2){
                    document.getElementById("TypeBody").style.display = "none";

                    $("#TypeBody").css("display:none");
                }else{
                    document.getElementById("TypeBody").style.display = "block";

                    $("#TypeBody").css("display:block");

                }
            }
        })
    })

    $("#GetMemebers").click(function(){
        var id=$(this).val()
        var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
        $.ajax({
            type: "GET",
            url: "{{url('GetMemebers2')}}",
            data: {"id":id},
            success: function (data) {
                $("#body").html(data)

            }
        })
    })
    $("#GetMemebers5").click(function(){
        var id=$(this).val()
        var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
        $.ajax({
            type: "GET",
            url: "{{url('GetMemebers21')}}",
            data: {"id":id},
            success: function (data) {
                $("#body5").html(data)

            }
        })
    })
    $( document ).ready(function() {
        KTTinymce.init();
        var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
        $.ajax({
            type: "GET",
            url: "{{url('GetDefaultMemebers2')}}",
            success: function (data) {
                $("#body").html(data)

            }
        })
    })

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
