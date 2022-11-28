@extends('layout.layout')

@section('title')
    @if(Request::segment(1) == 'ar' ) الصفحة الرئيسية  @else Dashboard @endif
@endsection
@section('css')
    <link href="{{asset('dashboard/assets/plugins/custom/datatables/datatables.bundle.css')}}" rel="stylesheet"
          type="text/css"/>
<style>
    .bootstrap-datetimepicker-widget{
     display:contents!important;
    }
</style>
@endsection


@section('content')

    <!--begin::Entry-->
    <div class="d-flex flex-column-fluid">

        <!--begin::Container-->
        <div class="container">
            <!--begin::Dashboard-->

            <div class="row">
                <div class="col-lg-12 col-xxl-12">
                    <div class="card card-custom card-stretch gutter-b">
												<div id="chart_3" style="width:100%"></div>
												</div>
</div>
										<!--<div class="card card-custom card-stretch card-stretch-half gutter-b" style="width:100%">-->
											<!--begin::Body-->
										<!--	<div class="card-body p-0">-->
										<!--		<div class="d-flex align-items-center justify-content-between card-spacer flex-grow-1">-->
										<!--			<span class="symbol symbol-50 symbol-light-primary mr-2">-->
										<!--				<span class="symbol-label">-->
										<!--					<span class="svg-icon svg-icon-xl svg-icon-primary">-->
																<!--begin::Svg Icon | path:assets/media/svg/icons/Communication/Group.svg-->
										<!--						<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">-->
										<!--							<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">-->
										<!--								<polygon points="0 0 24 0 24 24 0 24" />-->
										<!--								<path d="M18,14 C16.3431458,14 15,12.6568542 15,11 C15,9.34314575 16.3431458,8 18,8 C19.6568542,8 21,9.34314575 21,11 C21,12.6568542 19.6568542,14 18,14 Z M9,11 C6.790861,11 5,9.209139 5,7 C5,4.790861 6.790861,3 9,3 C11.209139,3 13,4.790861 13,7 C13,9.209139 11.209139,11 9,11 Z" fill="#000000" fill-rule="nonzero" opacity="0.3" />-->
										<!--								<path d="M17.6011961,15.0006174 C21.0077043,15.0378534 23.7891749,16.7601418 23.9984937,20.4 C24.0069246,20.5466056 23.9984937,21 23.4559499,21 L19.6,21 C19.6,18.7490654 18.8562935,16.6718327 17.6011961,15.0006174 Z M0.00065168429,20.1992055 C0.388258525,15.4265159 4.26191235,13 8.98334134,13 C13.7712164,13 17.7048837,15.2931929 17.9979143,20.2 C18.0095879,20.3954741 17.9979143,21 17.2466999,21 C13.541124,21 8.03472472,21 0.727502227,21 C0.476712155,21 -0.0204617505,20.45918 0.00065168429,20.1992055 Z" fill="#000000" fill-rule="nonzero" />-->
										<!--							</g>-->
										<!--						</svg>-->
																<!--end::Svg Icon-->
										<!--					</span>-->
										<!--				</span>-->
										<!--			</span>-->
										<!--			<div class="d-flex flex-column text-right">-->
										<!--			    @inject('users','App\User')-->
										<!--				<span class="text-dark-75 font-weight-bolder font-size-h3">{{$users->count()}}</span>-->
										<!--				<span class="text-muted font-weight-bold mt-2">{{__('lang.usersCountByYear')}}</span>-->
										<!--			</div>-->
										<!--		</div>-->
										<!--		<div id="kt_stats_widget_12_chart" class="card-rounded-bottom" data-color="primary" style="height: 150px"></div>-->
										<!--	</div>-->
											<!--end::Body-->
										<!--</div>-->

                <div class="col-lg-6 col-xxl-6">
                    <!--begin::Mixed Widget 1-->
                    <div class="card card-custom bg-gray-100 card-stretch gutter-b">
                        <!--begin::Header-->
                        <!--end::Header-->
                        <!--begin::Body-->
                        <div class="card-body p-0 position-relative overflow-hidden">
                            <!--begin::Chart-->
                        {{--                            <div id="kt_mixed_widget_1_chart" class="card-rounded-bottom bg-danger" style="height: 200px"></div>--}}
                        <!--end::Chart-->
                            <!--begin::Stats-->
                            <div class="card-spacer ">
                                <!--begin::Row-->
                                <div class="row m-0">
                                    <div class="col bg-light-warning px-6 py-8 rounded-xl mr-7 mb-7">
                                        <span class="svg-icon svg-icon-3x svg-icon-warning d-block my-2">
                                            <!--begin::Svg Icon | path:assets/media/svg/icons/Media/Equalizer.svg-->
                                            <span class="svg-icon svg-icon-3x svg-icon-waning-block my-2">
                                                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px"
                                                     height="24px" viewBox="0 0 24 24" version="1.1" class="kt-svg-icon">
                                                  <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                      <rect id="bound" x="0" y="0" width="24" height="24"/>
                                                      <path
                                                          d="M5,9 L19,9 C20.1045695,9 21,9.8954305 21,11 L21,20 C21,21.1045695 20.1045695,22 19,22 L5,22 C3.8954305,22 3,21.1045695 3,20 L3,11 C3,9.8954305 3.8954305,9 5,9 Z M18.1444251,10.8396467 L12,14.1481833 L5.85557487,10.8396467 C5.4908718,10.6432681 5.03602525,10.7797221 4.83964668,11.1444251 C4.6432681,11.5091282 4.77972206,11.9639747 5.14442513,12.1603533 L11.6444251,15.6603533 C11.8664074,15.7798822 12.1335926,15.7798822 12.3555749,15.6603533 L18.8555749,12.1603533 C19.2202779,11.9639747 19.3567319,11.5091282 19.1603533,11.1444251 C18.9639747,10.7797221 18.5091282,10.6432681 18.1444251,10.8396467 Z"
                                                          id="Combined-Shape" fill="#000000"/>
                                                      <path
                                                          d="M11.1288761,0.733697713 L11.1288761,2.69017121 L9.12120481,2.69017121 C8.84506244,2.69017121 8.62120481,2.91402884 8.62120481,3.19017121 L8.62120481,4.21346991 C8.62120481,4.48961229 8.84506244,4.71346991 9.12120481,4.71346991 L11.1288761,4.71346991 L11.1288761,6.66994341 C11.1288761,6.94608579 11.3527337,7.16994341 11.6288761,7.16994341 C11.7471877,7.16994341 11.8616664,7.12798964 11.951961,7.05154023 L15.4576222,4.08341738 C15.6683723,3.90498251 15.6945689,3.58948575 15.5161341,3.37873564 C15.4982803,3.35764848 15.4787093,3.33807751 15.4576222,3.32022374 L11.951961,0.352100892 C11.7412109,0.173666017 11.4257142,0.199862688 11.2472793,0.410612793 C11.1708299,0.500907473 11.1288761,0.615386087 11.1288761,0.733697713 Z"
                                                          id="Shape" fill="#000000" fill-rule="nonzero" opacity="0.3"
                                                          transform="translate(11.959697, 3.661508) rotate(-270.000000) translate(-11.959697, -3.661508) "/>
                                                  </g>
                                                </svg>
                                              </span>
                                            <!--end::Svg Icon-->
                                        </span>
                                        <a class="text-warning font-weight-bold font-size-h6"
                                           href="/transactions/inbox">{{__('lang.Transactionsmincoming')}}</a>
                                    </div>
                                    <div class="col bg-light-primary px-6 py-8 rounded-xl mb-7">
                                        <span class="svg-icon svg-icon-3x svg-icon-primary d-block my-2">
                                            <!--begin::Svg Icon | path:assets/media/svg/icons/Communication/Add-user.svg-->
                                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                                         width="24px" height="24px" viewBox="0 0 24 24" version="1.1"
                                         class="kt-svg-icon">
              <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                  <rect id="bound" x="0" y="0" width="24" height="24"/>
                  <path
                      d="M5,9 L19,9 C20.1045695,9 21,9.8954305 21,11 L21,20 C21,21.1045695 20.1045695,22 19,22 L5,22 C3.8954305,22 3,21.1045695 3,20 L3,11 C3,9.8954305 3.8954305,9 5,9 Z M18.1444251,10.8396467 L12,14.1481833 L5.85557487,10.8396467 C5.4908718,10.6432681 5.03602525,10.7797221 4.83964668,11.1444251 C4.6432681,11.5091282 4.77972206,11.9639747 5.14442513,12.1603533 L11.6444251,15.6603533 C11.8664074,15.7798822 12.1335926,15.7798822 12.3555749,15.6603533 L18.8555749,12.1603533 C19.2202779,11.9639747 19.3567319,11.5091282 19.1603533,11.1444251 C18.9639747,10.7797221 18.5091282,10.6432681 18.1444251,10.8396467 Z"
                      id="Combined-Shape" fill="#000000"/>
                  <path
                      d="M11.1288761,0.733697713 L11.1288761,2.69017121 L9.12120481,2.69017121 C8.84506244,2.69017121 8.62120481,2.91402884 8.62120481,3.19017121 L8.62120481,4.21346991 C8.62120481,4.48961229 8.84506244,4.71346991 9.12120481,4.71346991 L11.1288761,4.71346991 L11.1288761,6.66994341 C11.1288761,6.94608579 11.3527337,7.16994341 11.6288761,7.16994341 C11.7471877,7.16994341 11.8616664,7.12798964 11.951961,7.05154023 L15.4576222,4.08341738 C15.6683723,3.90498251 15.6945689,3.58948575 15.5161341,3.37873564 C15.4982803,3.35764848 15.4787093,3.33807751 15.4576222,3.32022374 L11.951961,0.352100892 C11.7412109,0.173666017 11.4257142,0.199862688 11.2472793,0.410612793 C11.1708299,0.500907473 11.1288761,0.615386087 11.1288761,0.733697713 Z"
                      id="Shape" fill="#000000" fill-rule="nonzero" opacity="0.3"
                      transform="translate(11.959697, 3.661508) rotate(-90.000000) translate(-11.959697, -3.661508) "/>
              </g>
            </svg>

                                            <!--end::Svg Icon-->
                                        </span>
                                        <a class="text-primary font-weight-bold font-size-h6 mt-2"
                                           href="/transactions/outbox">{{__('lang.TransactionsOutgoing')}}</a>
                                    </div>
                                </div>
                                <!--end::Row-->
                                <!--begin::Row-->
                                <div class="row m-0">
                                    <div class="col bg-light-danger px-6 py-8 rounded-xl mr-7">
                                        <span class="svg-icon svg-icon-3x svg-icon-danger d-block my-2">
                                            <!--begin::Svg Icon | path:assets/media/svg/icons/Design/Layers.svg-->
                                           <svg xmlns="http://www.w3.org/2000/svg"
                                                xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px"
                                                viewBox="0 0 24 24" version="1.1" class="kt-svg-icon">
              <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                  <rect id="bound" x="0" y="0" width="24" height="24"/>
                  <path
                      d="M4,16 L5,16 C5.55228475,16 6,16.4477153 6,17 C6,17.5522847 5.55228475,18 5,18 L4,18 C3.44771525,18 3,17.5522847 3,17 C3,16.4477153 3.44771525,16 4,16 Z M1,11 L5,11 C5.55228475,11 6,11.4477153 6,12 C6,12.5522847 5.55228475,13 5,13 L1,13 C0.44771525,13 6.76353751e-17,12.5522847 0,12 C-6.76353751e-17,11.4477153 0.44771525,11 1,11 Z M3,6 L5,6 C5.55228475,6 6,6.44771525 6,7 C6,7.55228475 5.55228475,8 5,8 L3,8 C2.44771525,8 2,7.55228475 2,7 C2,6.44771525 2.44771525,6 3,6 Z"
                      id="Combined-Shape" fill="#000000" opacity="0.3"/>
                  <path
                      d="M10,6 L22,6 C23.1045695,6 24,6.8954305 24,8 L24,16 C24,17.1045695 23.1045695,18 22,18 L10,18 C8.8954305,18 8,17.1045695 8,16 L8,8 C8,6.8954305 8.8954305,6 10,6 Z M21.0849395,8.0718316 L16,10.7185839 L10.9150605,8.0718316 C10.6132433,7.91473331 10.2368262,8.02389331 10.0743092,8.31564728 C9.91179228,8.60740125 10.0247174,8.9712679 10.3265346,9.12836619 L15.705737,11.9282847 C15.8894428,12.0239051 16.1105572,12.0239051 16.294263,11.9282847 L21.6734654,9.12836619 C21.9752826,8.9712679 22.0882077,8.60740125 21.9256908,8.31564728 C21.7631738,8.02389331 21.3867567,7.91473331 21.0849395,8.0718316 Z"
                      id="Combined-Shape" fill="#000000"/>
              </g>
            </svg>
                                            <!--end::Svg Icon-->
                                        </span>
                                        <a class="text-danger font-weight-bold font-size-h6 mt-2"
                                           href="/transactions/inbox_Create">{{__('lang.TransactionsmCreate')}}</a>
                                    </div>
                                    <div class="col bg-light-success px-6 py-8 rounded-xl">
                                        <span class="svg-icon svg-icon-3x svg-icon-success d-block my-2">
                                            <!--begin::Svg Icon | path:assets/media/svg/icons/Communication/Urgent-mail.svg-->
            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px"
                 height="24px" viewBox="0 0 24 24" version="1.1" class="kt-svg-icon">
              <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                  <rect id="bound" x="0" y="0" width="24" height="24"/>
                  <path
                      d="M8,13.1668961 L20.4470385,11.9999863 L8,10.8330764 L8,5.77181995 C8,5.70108058 8.01501031,5.63114635 8.04403925,5.56663761 C8.15735832,5.31481744 8.45336217,5.20254012 8.70518234,5.31585919 L22.545552,11.5440255 C22.6569791,11.5941677 22.7461882,11.6833768 22.7963304,11.794804 C22.9096495,12.0466241 22.7973722,12.342628 22.545552,12.455947 L8.70518234,18.6841134 C8.64067359,18.7131423 8.57073936,18.7281526 8.5,18.7281526 C8.22385763,18.7281526 8,18.504295 8,18.2281526 L8,13.1668961 Z"
                      id="Combined-Shape" fill="#000000"/>
                  <path
                      d="M4,16 L5,16 C5.55228475,16 6,16.4477153 6,17 C6,17.5522847 5.55228475,18 5,18 L4,18 C3.44771525,18 3,17.5522847 3,17 C3,16.4477153 3.44771525,16 4,16 Z M1,11 L5,11 C5.55228475,11 6,11.4477153 6,12 C6,12.5522847 5.55228475,13 5,13 L1,13 C0.44771525,13 6.76353751e-17,12.5522847 0,12 C-6.76353751e-17,11.4477153 0.44771525,11 1,11 Z M4,6 L5,6 C5.55228475,6 6,6.44771525 6,7 C6,7.55228475 5.55228475,8 5,8 L4,8 C3.44771525,8 3,7.55228475 3,7 C3,6.44771525 3.44771525,6 4,6 Z"
                      id="Combined-Shape" fill="#000000" opacity="0.3"/>
              </g>
            </svg>
                                            <!--end::Svg Icon-->
                                        </span>
                                        <a class="text-success font-weight-bold font-size-h6 mt-2"
                                           href="/transactions/outbox_Create">{{__('lang.Transactionsmoutbound')}}</a>
                                    </div>
                                </div>
                                <!--end::Row-->
                            </div>
                            <!--end::Stats-->
                        </div>
                        <!--end::Body-->
                    </div>
                    <!--end::Mixed Widget 1-->
                </div>
                {{-- طلبات الاستئذان اليوم--}}
                @php
                    $job_id=auth()->user()->mainJob_id;
                    $job = App\Job::where('id',$job_id)->first();

                @endphp
                @if($job->job_role == 1)
                    <div class="col-lg-6 col-xxl-6" style="width:100%!important">
                        <!--begin::List Widget 9-->
                        <div class="card card-custom card-stretch gutter-b">
                            <!--begin::Header-->
                            <div class="card-header align-items-center border-0 mt-4">
                                <h3 class="card-title align-items-start flex-column">
                                    <span class="font-weight-bolder text-dark">{{trans('lang.permissionToday')}}</span>
                                    @inject('permissions','App\AskPermission')
                                    <span class="text-muted mt-3 font-weight-bold font-size-sm">
                                    {{$permissions->where('permission_date',date('Y-m-d'))
                ->where('manager_id',\Illuminate\Support\Facades\Auth::user()->id)->count()}}</span>
                                </h3>

                            </div>
                            <!--end::Header-->
                            <!--begin::Body-->
                            <div class="card-body pt-4">
                                <!--begin::Timeline-->
                                <div class="timeline timeline-6 mt-3">
                                    <!--begin::Item-->
                                    @if($permissions->where('permission_date',date('Y-m-d'))
                        ->where('manager_id',\Illuminate\Support\Facades\Auth::user()->id)->count() > 0)

                                        @foreach($permissions->where('permission_date',date('Y-m-d'))
                             ->where('manager_id',\Illuminate\Support\Facades\Auth::user()->id)->get() as $permission)
                                            <div class="timeline-item align-items-start">
                                                <!--begin::Label-->
                                                <div
                                                    class="font-weight-mormal font-size-lg timeline-content text-muted pl-3">
                                                    {{Carbon\Carbon::parse($permission->from)->format('H:i')}}
                                                </div>
                                                <!--end::Label-->
                                                <!--begin::Badge-->
                                                <div class="timeline-badge">
                                                    <i class="fa fa-genderless text-warning icon-xl"></i>
                                                </div>
                                                <!--end::Badge-->
                                                <!--begin::Text-->
                                                <div
                                                    class="font-weight-mormal font-size-lg timeline-content text-muted pl-3">
                                                    {{$permission->description}}
                                                </div>
                                                <!--end::Text-->
                                            </div>
                                            <!--end::Item-->

                                            <!--begin::Item-->
                                        @endforeach
                                    @else
                                        لا يوجد
                                @endif

                                {{--                                <div class="timeline-item align-items-start">--}}
                                {{--                                    <!--begin::Label-->--}}
                                {{--                                    <div class="timeline-label font-weight-bolder text-dark-75 font-size-lg">10:00</div>--}}
                                {{--                                    <!--end::Label-->--}}
                                {{--                                    <!--begin::Badge-->--}}
                                {{--                                    <div class="timeline-badge">--}}
                                {{--                                        <i class="fa fa-genderless text-success icon-xl"></i>--}}
                                {{--                                    </div>--}}
                                {{--                                    <!--end::Badge-->--}}
                                {{--                                    <!--begin::Content-->--}}
                                {{--                                    <div class="timeline-content d-flex">--}}
                                {{--                                        <span class="font-weight-bolder text-dark-75 pl-3 font-size-lg">AEOL meeting</span>--}}
                                {{--                                    </div>--}}
                                {{--                                    <!--end::Content-->--}}
                                {{--                                </div>--}}
                                {{--                                <!--end::Item-->--}}
                                {{--                                <!--begin::Item-->--}}
                                {{--                                <div class="timeline-item align-items-start">--}}
                                {{--                                    <!--begin::Label-->--}}
                                {{--                                    <div class="timeline-label font-weight-bolder text-dark-75 font-size-lg">14:37</div>--}}
                                {{--                                    <!--end::Label-->--}}
                                {{--                                    <!--begin::Badge-->--}}
                                {{--                                    <div class="timeline-badge">--}}
                                {{--                                        <i class="fa fa-genderless text-danger icon-xl"></i>--}}
                                {{--                                    </div>--}}
                                {{--                                    <!--end::Badge-->--}}
                                {{--                                    <!--begin::Desc-->--}}
                                {{--                                    <div class="timeline-content font-weight-bolder font-size-lg text-dark-75 pl-3">Make deposit--}}
                                {{--                                    <a href="#" class="text-primary">USD 700</a>. to ESL</div>--}}
                                {{--                                    <!--end::Desc-->--}}
                                {{--                                </div>--}}
                                {{--                                <!--end::Item-->--}}
                                {{--                                <!--begin::Item-->--}}
                                {{--                                <div class="timeline-item align-items-start">--}}
                                {{--                                    <!--begin::Label-->--}}
                                {{--                                    <div class="timeline-label font-weight-bolder text-dark-75 font-size-lg">16:50</div>--}}
                                {{--                                    <!--end::Label-->--}}
                                {{--                                    <!--begin::Badge-->--}}
                                {{--                                    <div class="timeline-badge">--}}
                                {{--                                        <i class="fa fa-genderless text-primary icon-xl"></i>--}}
                                {{--                                    </div>--}}
                                {{--                                    <!--end::Badge-->--}}
                                {{--                                    <!--begin::Text-->--}}
                                {{--                                    <div class="timeline-content font-weight-mormal font-size-lg text-muted pl-3">Indulging in poorly driving and keep structure keep great</div>--}}
                                {{--                                    <!--end::Text-->--}}
                                {{--                                </div>--}}
                                {{--                                <!--end::Item-->--}}
                                {{--                                <!--begin::Item-->--}}
                                {{--                                <div class="timeline-item align-items-start">--}}
                                {{--                                    <!--begin::Label-->--}}
                                {{--                                    <div class="timeline-label font-weight-bolder text-dark-75 font-size-lg">21:03</div>--}}
                                {{--                                    <!--end::Label-->--}}
                                {{--                                    <!--begin::Badge-->--}}
                                {{--                                    <div class="timeline-badge">--}}
                                {{--                                        <i class="fa fa-genderless text-danger icon-xl"></i>--}}
                                {{--                                    </div>--}}
                                {{--                                    <!--end::Badge-->--}}
                                {{--                                    <!--begin::Desc-->--}}
                                {{--                                    <div class="timeline-content font-weight-bolder text-dark-75 pl-3 font-size-lg">New order placed--}}
                                {{--                                    <a href="#" class="text-primary">#XF-2356</a>.</div>--}}
                                {{--                                    <!--end::Desc-->--}}
                                {{--                                </div>--}}
                                {{--                                <!--end::Item-->--}}
                                {{--                                <!--begin::Item-->--}}
                                {{--                                <div class="timeline-item align-items-start">--}}
                                {{--                                    <!--begin::Label-->--}}
                                {{--                                    <div class="timeline-label font-weight-bolder text-dark-75 font-size-lg">23:07</div>--}}
                                {{--                                    <!--end::Label-->--}}
                                {{--                                    <!--begin::Badge-->--}}
                                {{--                                    <div class="timeline-badge">--}}
                                {{--                                        <i class="fa fa-genderless text-info icon-xl"></i>--}}
                                {{--                                    </div>--}}
                                {{--                                    <!--end::Badge-->--}}
                                {{--                                    <!--begin::Text-->--}}
                                {{--                                    <div class="timeline-content font-weight-mormal font-size-lg text-muted pl-3">Outlines keep and you honest. Indulging in poorly driving</div>--}}
                                {{--                                    <!--end::Text-->--}}
                                {{--                                </div>--}}
                                {{--                                <!--end::Item-->--}}
                                {{--                                <!--begin::Item-->--}}
                                {{--                                <div class="timeline-item align-items-start">--}}
                                {{--                                    <!--begin::Label-->--}}
                                {{--                                    <div class="timeline-label font-weight-bolder text-dark-75 font-size-lg">16:50</div>--}}
                                {{--                                    <!--end::Label-->--}}
                                {{--                                    <!--begin::Badge-->--}}
                                {{--                                    <div class="timeline-badge">--}}
                                {{--                                        <i class="fa fa-genderless text-primary icon-xl"></i>--}}
                                {{--                                    </div>--}}
                                {{--                                    <!--end::Badge-->--}}
                                {{--                                    <!--begin::Text-->--}}
                                {{--                                    <div class="timeline-content font-weight-mormal font-size-lg text-muted pl-3">Indulging in poorly driving and keep structure keep great</div>--}}
                                {{--                                    <!--end::Text-->--}}
                                {{--                                </div>--}}
                                {{--                                <!--end::Item-->--}}
                                {{--                                <!--begin::Item-->--}}
                                {{--                                <div class="timeline-item align-items-start">--}}
                                {{--                                    <!--begin::Label-->--}}
                                {{--                                    <div class="timeline-label font-weight-bolder text-dark-75 font-size-lg">21:03</div>--}}
                                {{--                                    <!--end::Label-->--}}
                                {{--                                    <!--begin::Badge-->--}}
                                {{--                                    <div class="timeline-badge">--}}
                                {{--                                        <i class="fa fa-genderless text-danger icon-xl"></i>--}}
                                {{--                                    </div>--}}
                                {{--                                    <!--end::Badge-->--}}
                                {{--                                    <!--begin::Desc-->--}}
                                {{--                                    <div class="timeline-content font-weight-bolder font-size-lg text-dark-75 pl-3">New order placed--}}
                                {{--                                    <a href="#" class="text-primary">#XF-2356</a>.</div>--}}
                                {{--                                    <!--end::Desc-->--}}
                                {{--                                </div>--}}
                                <!--end::Item-->
                                </div>
                                <!--end::Timeline-->
                            </div>
                            <!--end: Card Body-->
                        </div>
                        <!--end: List Widget 9-->
                    </div>
                    <div class="col-lg-6 col-xxl-6"  style="width:100%!important">
                        <!--begin::List Widget 9-->
                        <div class="card card-custom card-stretch gutter-b">
                            <!--begin::Header-->
                            <div class="card-header align-items-center border-0 mt-4">
                                <h3 class="card-title align-items-start flex-column">
                                    <span class="font-weight-bolder text-dark">{{trans('lang.HolidyToday')}}</span>
                                    @inject('VacationRequest','App\VacationRequest')
                                    <span class="text-muted mt-3 font-weight-bold font-size-sm">
                                    {{$VacationRequest->where('request_date',date('Y-m-d'))
                ->where('manager_id',\Illuminate\Support\Facades\Auth::user()->id)->where('status','notyet')->count()}}</span>
                                </h3>

                            </div>
                            <!--end::Header-->
                            <!--begin::Body-->
                            <div class="card-body pt-4">
                                <!--begin::Timeline-->
                                <div class="timeline timeline-6 mt-3">
                                    <!--begin::Item-->
                                    @if($VacationRequest->where('request_date',date('Y-m-d'))
                        ->where('manager_id',\Illuminate\Support\Facades\Auth::user()->id)->where('status','notyet')->count() > 0)

                                        @foreach($VacationRequest->where('request_date',date('Y-m-d'))
                             ->where('manager_id',\Illuminate\Support\Facades\Auth::user()->id)->where('status','notyet')->get() as $permission)
                                            <div class="timeline-item align-items-start">
                                                <!--begin::Label-->
                                                <div
                                                    class="timeline-label font-weight-bolder text-dark-75 font-size-lg">
                                                   {{$permission->from_date}} => {{$permission->to_date}}
                                                </div>
                                                <!--end::Label-->
                                                <!--begin::Badge-->
                                                <div class="timeline-badge">
                                                    <i class="fa fa-genderless text-warning icon-xl"></i>
                                                </div>
                                                <!--end::Badge-->
                                                <!--begin::Text-->
                                                <div
                                                    class="font-weight-mormal font-size-lg timeline-content text-muted pl-3">
                                                    {{$permission->reason}}
                                                </div>
                                                <!--end::Text-->
                                            </div>
                                            <!--end::Item-->

                                            <!--begin::Item-->
                                        @endforeach
                                    @else
                                        لا يوجد
                                @endif

                                {{--                                <div class="timeline-item align-items-start">--}}
                                {{--                                    <!--begin::Label-->--}}
                                {{--                                    <div class="timeline-label font-weight-bolder text-dark-75 font-size-lg">10:00</div>--}}
                                {{--                                    <!--end::Label-->--}}
                                {{--                                    <!--begin::Badge-->--}}
                                {{--                                    <div class="timeline-badge">--}}
                                {{--                                        <i class="fa fa-genderless text-success icon-xl"></i>--}}
                                {{--                                    </div>--}}
                                {{--                                    <!--end::Badge-->--}}
                                {{--                                    <!--begin::Content-->--}}
                                {{--                                    <div class="timeline-content d-flex">--}}
                                {{--                                        <span class="font-weight-bolder text-dark-75 pl-3 font-size-lg">AEOL meeting</span>--}}
                                {{--                                    </div>--}}
                                {{--                                    <!--end::Content-->--}}
                                {{--                                </div>--}}
                                {{--                                <!--end::Item-->--}}
                                {{--                                <!--begin::Item-->--}}
                                {{--                                <div class="timeline-item align-items-start">--}}
                                {{--                                    <!--begin::Label-->--}}
                                {{--                                    <div class="timeline-label font-weight-bolder text-dark-75 font-size-lg">14:37</div>--}}
                                {{--                                    <!--end::Label-->--}}
                                {{--                                    <!--begin::Badge-->--}}
                                {{--                                    <div class="timeline-badge">--}}
                                {{--                                        <i class="fa fa-genderless text-danger icon-xl"></i>--}}
                                {{--                                    </div>--}}
                                {{--                                    <!--end::Badge-->--}}
                                {{--                                    <!--begin::Desc-->--}}
                                {{--                                    <div class="timeline-content font-weight-bolder font-size-lg text-dark-75 pl-3">Make deposit--}}
                                {{--                                    <a href="#" class="text-primary">USD 700</a>. to ESL</div>--}}
                                {{--                                    <!--end::Desc-->--}}
                                {{--                                </div>--}}
                                {{--                                <!--end::Item-->--}}
                                {{--                                <!--begin::Item-->--}}
                                {{--                                <div class="timeline-item align-items-start">--}}
                                {{--                                    <!--begin::Label-->--}}
                                {{--                                    <div class="timeline-label font-weight-bolder text-dark-75 font-size-lg">16:50</div>--}}
                                {{--                                    <!--end::Label-->--}}
                                {{--                                    <!--begin::Badge-->--}}
                                {{--                                    <div class="timeline-badge">--}}
                                {{--                                        <i class="fa fa-genderless text-primary icon-xl"></i>--}}
                                {{--                                    </div>--}}
                                {{--                                    <!--end::Badge-->--}}
                                {{--                                    <!--begin::Text-->--}}
                                {{--                                    <div class="timeline-content font-weight-mormal font-size-lg text-muted pl-3">Indulging in poorly driving and keep structure keep great</div>--}}
                                {{--                                    <!--end::Text-->--}}
                                {{--                                </div>--}}
                                {{--                                <!--end::Item-->--}}
                                {{--                                <!--begin::Item-->--}}
                                {{--                                <div class="timeline-item align-items-start">--}}
                                {{--                                    <!--begin::Label-->--}}
                                {{--                                    <div class="timeline-label font-weight-bolder text-dark-75 font-size-lg">21:03</div>--}}
                                {{--                                    <!--end::Label-->--}}
                                {{--                                    <!--begin::Badge-->--}}
                                {{--                                    <div class="timeline-badge">--}}
                                {{--                                        <i class="fa fa-genderless text-danger icon-xl"></i>--}}
                                {{--                                    </div>--}}
                                {{--                                    <!--end::Badge-->--}}
                                {{--                                    <!--begin::Desc-->--}}
                                {{--                                    <div class="timeline-content font-weight-bolder text-dark-75 pl-3 font-size-lg">New order placed--}}
                                {{--                                    <a href="#" class="text-primary">#XF-2356</a>.</div>--}}
                                {{--                                    <!--end::Desc-->--}}
                                {{--                                </div>--}}
                                {{--                                <!--end::Item-->--}}
                                {{--                                <!--begin::Item-->--}}
                                {{--                                <div class="timeline-item align-items-start">--}}
                                {{--                                    <!--begin::Label-->--}}
                                {{--                                    <div class="timeline-label font-weight-bolder text-dark-75 font-size-lg">23:07</div>--}}
                                {{--                                    <!--end::Label-->--}}
                                {{--                                    <!--begin::Badge-->--}}
                                {{--                                    <div class="timeline-badge">--}}
                                {{--                                        <i class="fa fa-genderless text-info icon-xl"></i>--}}
                                {{--                                    </div>--}}
                                {{--                                    <!--end::Badge-->--}}
                                {{--                                    <!--begin::Text-->--}}
                                {{--                                    <div class="timeline-content font-weight-mormal font-size-lg text-muted pl-3">Outlines keep and you honest. Indulging in poorly driving</div>--}}
                                {{--                                    <!--end::Text-->--}}
                                {{--                                </div>--}}
                                {{--                                <!--end::Item-->--}}
                                {{--                                <!--begin::Item-->--}}
                                {{--                                <div class="timeline-item align-items-start">--}}
                                {{--                                    <!--begin::Label-->--}}
                                {{--                                    <div class="timeline-label font-weight-bolder text-dark-75 font-size-lg">16:50</div>--}}
                                {{--                                    <!--end::Label-->--}}
                                {{--                                    <!--begin::Badge-->--}}
                                {{--                                    <div class="timeline-badge">--}}
                                {{--                                        <i class="fa fa-genderless text-primary icon-xl"></i>--}}
                                {{--                                    </div>--}}
                                {{--                                    <!--end::Badge-->--}}
                                {{--                                    <!--begin::Text-->--}}
                                {{--                                    <div class="timeline-content font-weight-mormal font-size-lg text-muted pl-3">Indulging in poorly driving and keep structure keep great</div>--}}
                                {{--                                    <!--end::Text-->--}}
                                {{--                                </div>--}}
                                {{--                                <!--end::Item-->--}}
                                {{--                                <!--begin::Item-->--}}
                                {{--                                <div class="timeline-item align-items-start">--}}
                                {{--                                    <!--begin::Label-->--}}
                                {{--                                    <div class="timeline-label font-weight-bolder text-dark-75 font-size-lg">21:03</div>--}}
                                {{--                                    <!--end::Label-->--}}
                                {{--                                    <!--begin::Badge-->--}}
                                {{--                                    <div class="timeline-badge">--}}
                                {{--                                        <i class="fa fa-genderless text-danger icon-xl"></i>--}}
                                {{--                                    </div>--}}
                                {{--                                    <!--end::Badge-->--}}
                                {{--                                    <!--begin::Desc-->--}}
                                {{--                                    <div class="timeline-content font-weight-bolder font-size-lg text-dark-75 pl-3">New order placed--}}
                                {{--                                    <a href="#" class="text-primary">#XF-2356</a>.</div>--}}
                                {{--                                    <!--end::Desc-->--}}
                                {{--                                </div>--}}
                                <!--end::Item-->
                                </div>
                                <!--end::Timeline-->
                            </div>
                            <!--end: Card Body-->
                        </div>
                        <!--end: List Widget 9-->
                    </div>

                @endif


                <div class="col-lg-6 col-xxl-6 order-1 order-xxl-1">
                    <!--begin::List Widget 1-->
                    <div class="card card-custom card-stretch gutter-b">
                        <!--begin::Header-->
                        <div class="card-header border-0 pt-5">
                            <h3 class="card-title align-items-start flex-column">
                                <span class="card-label font-weight-bolder text-dark">{{__('lang.Reports')}}</span>
                                <span class="text-muted mt-3 font-weight-bold font-size-sm"></span>
                            </h3>

                        </div>
                        <!--end::Header-->
                        <!--begin::Body-->
                        <div class="card-body pt-8">
                            <!--begin::Item-->
                            <div class="d-flex align-items-center mb-10">
                                <!--begin::Symbol-->
                                <div class="symbol symbol-40 symbol-light-primary mr-5">
                                    <span class="symbol-label">
                                        <span class="svg-icon svg-icon-xl svg-icon-primary">
                                            <!--begin::Svg Icon | path:assets/media/svg/icons/Home/Library.svg-->
                                            <svg xmlns="http://www.w3.org/2000/svg"
                                                 xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px"
                                                 viewBox="0 0 24 24" version="1.1">
                                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                    <rect x="0" y="0" width="24" height="24"/>
                                                    <path
                                                        d="M5,3 L6,3 C6.55228475,3 7,3.44771525 7,4 L7,20 C7,20.5522847 6.55228475,21 6,21 L5,21 C4.44771525,21 4,20.5522847 4,20 L4,4 C4,3.44771525 4.44771525,3 5,3 Z M10,3 L11,3 C11.5522847,3 12,3.44771525 12,4 L12,20 C12,20.5522847 11.5522847,21 11,21 L10,21 C9.44771525,21 9,20.5522847 9,20 L9,4 C9,3.44771525 9.44771525,3 10,3 Z"
                                                        fill="#000000"/>
                                                    <rect fill="#000000" opacity="0.3"
                                                          transform="translate(17.825568, 11.945519) rotate(-19.000000) translate(-17.825568, -11.945519)"
                                                          x="16.3255682" y="2.94551858" width="3" height="18" rx="1"/>
                                                </g>
                                            </svg>
                                            <!--end::Svg Icon-->
                                        </span>
                                    </span>
                                </div>
                                <!--end::Symbol-->
                                <!--begin::Text-->
                                <div class="d-flex flex-column font-weight-bold">
                                    <a href="#"
                                       class="text-dark text-hover-primary mb-1 font-size-lg">{{__('lang.TotalIncome')}}</a>
                                    @inject('inbox','App\Inbox')
                                    <span
                                        class="text-muted">{{$inbox->where('type',0)->Orwhere('type',1)->count()}}</span>
                                </div>
                                <!--end::Text-->
                            </div>
                            <!--end::Item-->
                            <!--begin::Item-->
                            <div class="d-flex align-items-center mb-10">
                                <!--begin::Symbol-->
                                <div class="symbol symbol-40 symbol-light-warning mr-5">
                                    <span class="symbol-label">
                                        <span class="svg-icon svg-icon-lg svg-icon-warning">
                                            <!--begin::Svg Icon | path:assets/media/svg/icons/Communication/Write.svg-->
                                            <svg xmlns="http://www.w3.org/2000/svg"
                                                 xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px"
                                                 viewBox="0 0 24 24" version="1.1">
                                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                    <rect x="0" y="0" width="24" height="24"/>
                                                    <path
                                                        d="M12.2674799,18.2323597 L12.0084872,5.45852451 C12.0004303,5.06114792 12.1504154,4.6768183 12.4255037,4.38993949 L15.0030167,1.70195304 L17.5910752,4.40093695 C17.8599071,4.6812911 18.0095067,5.05499603 18.0083938,5.44341307 L17.9718262,18.2062508 C17.9694575,19.0329966 17.2985816,19.701953 16.4718324,19.701953 L13.7671717,19.701953 C12.9505952,19.701953 12.2840328,19.0487684 12.2674799,18.2323597 Z"
                                                        fill="#000000" fill-rule="nonzero"
                                                        transform="translate(14.701953, 10.701953) rotate(-135.000000) translate(-14.701953, -10.701953)"/>
                                                    <path
                                                        d="M12.9,2 C13.4522847,2 13.9,2.44771525 13.9,3 C13.9,3.55228475 13.4522847,4 12.9,4 L6,4 C4.8954305,4 4,4.8954305 4,6 L4,18 C4,19.1045695 4.8954305,20 6,20 L18,20 C19.1045695,20 20,19.1045695 20,18 L20,13 C20,12.4477153 20.4477153,12 21,12 C21.5522847,12 22,12.4477153 22,13 L22,18 C22,20.209139 20.209139,22 18,22 L6,22 C3.790861,22 2,20.209139 2,18 L2,6 C2,3.790861 3.790861,2 6,2 L12.9,2 Z"
                                                        fill="#000000" fill-rule="nonzero" opacity="0.3"/>
                                                </g>
                                            </svg>
                                            <!--end::Svg Icon-->
                                        </span>
                                    </span>
                                </div>
                                <!--end::Symbol-->
                                <!--begin::Text-->
                                <div class="d-flex flex-column font-weight-bold">
                                    <a href="#"
                                       class="text-dark-75 text-hover-primary mb-1 font-size-lg">{{__('lang.TotalOutcome')}}</a>
                                    <span
                                        class="text-muted">{{$inbox->where('type',2)->Orwhere('type',3)->count()}}</span>
                                </div>
                                <!--end::Text-->
                            </div>
                            <!--end::Item-->
                            <!--begin::Item-->

                            <!--end::Item-->
                            <!--begin::Item-->
                            <div class="d-flex align-items-center mb-10">
                                <!--begin::Symbol-->
                                <div class="symbol symbol-40 symbol-light-danger mr-5">
                                    <span class="symbol-label">
                                        <span class="svg-icon svg-icon-lg svg-icon-danger">
                                            <!--begin::Svg Icon | path:assets/media/svg/icons/General/Attachment2.svg-->
                                            <svg xmlns="http://www.w3.org/2000/svg"
                                                 xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px"
                                                 viewBox="0 0 24 24" version="1.1">
                                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                    <rect x="0" y="0" width="24" height="24"/>
                                                    <path
                                                        d="M11.7573593,15.2426407 L8.75735931,15.2426407 C8.20507456,15.2426407 7.75735931,15.6903559 7.75735931,16.2426407 C7.75735931,16.7949254 8.20507456,17.2426407 8.75735931,17.2426407 L11.7573593,17.2426407 L11.7573593,18.2426407 C11.7573593,19.3472102 10.8619288,20.2426407 9.75735931,20.2426407 L5.75735931,20.2426407 C4.65278981,20.2426407 3.75735931,19.3472102 3.75735931,18.2426407 L3.75735931,14.2426407 C3.75735931,13.1380712 4.65278981,12.2426407 5.75735931,12.2426407 L9.75735931,12.2426407 C10.8619288,12.2426407 11.7573593,13.1380712 11.7573593,14.2426407 L11.7573593,15.2426407 Z"
                                                        fill="#000000" opacity="0.3"
                                                        transform="translate(7.757359, 16.242641) rotate(-45.000000) translate(-7.757359, -16.242641)"/>
                                                    <path
                                                        d="M12.2426407,8.75735931 L15.2426407,8.75735931 C15.7949254,8.75735931 16.2426407,8.30964406 16.2426407,7.75735931 C16.2426407,7.20507456 15.7949254,6.75735931 15.2426407,6.75735931 L12.2426407,6.75735931 L12.2426407,5.75735931 C12.2426407,4.65278981 13.1380712,3.75735931 14.2426407,3.75735931 L18.2426407,3.75735931 C19.3472102,3.75735931 20.2426407,4.65278981 20.2426407,5.75735931 L20.2426407,9.75735931 C20.2426407,10.8619288 19.3472102,11.7573593 18.2426407,11.7573593 L14.2426407,11.7573593 C13.1380712,11.7573593 12.2426407,10.8619288 12.2426407,9.75735931 L12.2426407,8.75735931 Z"
                                                        fill="#000000"
                                                        transform="translate(16.242641, 7.757359) rotate(-45.000000) translate(-16.242641, -7.757359)"/>
                                                    <path
                                                        d="M5.89339828,3.42893219 C6.44568303,3.42893219 6.89339828,3.87664744 6.89339828,4.42893219 L6.89339828,6.42893219 C6.89339828,6.98121694 6.44568303,7.42893219 5.89339828,7.42893219 C5.34111353,7.42893219 4.89339828,6.98121694 4.89339828,6.42893219 L4.89339828,4.42893219 C4.89339828,3.87664744 5.34111353,3.42893219 5.89339828,3.42893219 Z M11.4289322,5.13603897 C11.8194565,5.52656326 11.8194565,6.15972824 11.4289322,6.55025253 L10.0147186,7.96446609 C9.62419433,8.35499039 8.99102936,8.35499039 8.60050506,7.96446609 C8.20998077,7.5739418 8.20998077,6.94077682 8.60050506,6.55025253 L10.0147186,5.13603897 C10.4052429,4.74551468 11.0384079,4.74551468 11.4289322,5.13603897 Z M0.600505063,5.13603897 C0.991029355,4.74551468 1.62419433,4.74551468 2.01471863,5.13603897 L3.42893219,6.55025253 C3.81945648,6.94077682 3.81945648,7.5739418 3.42893219,7.96446609 C3.0384079,8.35499039 2.40524292,8.35499039 2.01471863,7.96446609 L0.600505063,6.55025253 C0.209980772,6.15972824 0.209980772,5.52656326 0.600505063,5.13603897 Z"
                                                        fill="#000000" opacity="0.3"
                                                        transform="translate(6.014719, 5.843146) rotate(-45.000000) translate(-6.014719, -5.843146)"/>
                                                    <path
                                                        d="M17.9142136,15.4497475 C18.4664983,15.4497475 18.9142136,15.8974627 18.9142136,16.4497475 L18.9142136,18.4497475 C18.9142136,19.0020322 18.4664983,19.4497475 17.9142136,19.4497475 C17.3619288,19.4497475 16.9142136,19.0020322 16.9142136,18.4497475 L16.9142136,16.4497475 C16.9142136,15.8974627 17.3619288,15.4497475 17.9142136,15.4497475 Z M23.4497475,17.1568542 C23.8402718,17.5473785 23.8402718,18.1805435 23.4497475,18.5710678 L22.0355339,19.9852814 C21.6450096,20.3758057 21.0118446,20.3758057 20.6213203,19.9852814 C20.2307961,19.5947571 20.2307961,18.9615921 20.6213203,18.5710678 L22.0355339,17.1568542 C22.4260582,16.76633 23.0592232,16.76633 23.4497475,17.1568542 Z M12.6213203,17.1568542 C13.0118446,16.76633 13.6450096,16.76633 14.0355339,17.1568542 L15.4497475,18.5710678 C15.8402718,18.9615921 15.8402718,19.5947571 15.4497475,19.9852814 C15.0592232,20.3758057 14.4260582,20.3758057 14.0355339,19.9852814 L12.6213203,18.5710678 C12.2307961,18.1805435 12.2307961,17.5473785 12.6213203,17.1568542 Z"
                                                        fill="#000000" opacity="0.3"
                                                        transform="translate(18.035534, 17.863961) scale(1, -1) rotate(45.000000) translate(-18.035534, -17.863961)"/>
                                                </g>
                                            </svg>
                                            <!--end::Svg Icon-->
                                        </span>
                                    </span>
                                </div>
                                <!--end::Symbol-->
                                <!--begin::Text-->
                                <div class="d-flex flex-column font-weight-bold">
                                    <a href="#"
                                       class="text-dark text-hover-primary mb-1 font-size-lg">{{__('lang.TotalSaveArchive')}}</a>
                                    <span
                                        class="text-muted">{{$inbox->where('reciver_id',Auth::user()->id)->where('is_signature',null)->where('is_archive_reciver',1)->count()}}</span>
                                </div>
                                <!--end::Text-->
                            </div>
                            <!--end::Item-->
                            <div class="d-flex align-items-center mb-10">
                                <!--begin::Symbol-->
                                <div class="symbol symbol-40 symbol-light-success mr-5">
                                    <span class="symbol-label">
                                        <span class="svg-icon svg-icon-lg svg-icon-success">
                                            <!--begin::Svg Icon | path:assets/media/svg/icons/Communication/Group-chat.svg-->
                                            <svg xmlns="http://www.w3.org/2000/svg"
                                                 xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px"
                                                 viewBox="0 0 24 24" version="1.1">
                                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                    <rect x="0" y="0" width="24" height="24"/>
                                                    <path
                                                        d="M16,15.6315789 L16,12 C16,10.3431458 14.6568542,9 13,9 L6.16183229,9 L6.16183229,5.52631579 C6.16183229,4.13107011 7.29290239,3 8.68814808,3 L20.4776218,3 C21.8728674,3 23.0039375,4.13107011 23.0039375,5.52631579 L23.0039375,13.1052632 L23.0206157,17.786793 C23.0215995,18.0629336 22.7985408,18.2875874 22.5224001,18.2885711 C22.3891754,18.2890457 22.2612702,18.2363324 22.1670655,18.1421277 L19.6565168,15.6315789 L16,15.6315789 Z"
                                                        fill="#000000"/>
                                                    <path
                                                        d="M1.98505595,18 L1.98505595,13 C1.98505595,11.8954305 2.88048645,11 3.98505595,11 L11.9850559,11 C13.0896254,11 13.9850559,11.8954305 13.9850559,13 L13.9850559,18 C13.9850559,19.1045695 13.0896254,20 11.9850559,20 L4.10078614,20 L2.85693427,21.1905292 C2.65744295,21.3814685 2.34093638,21.3745358 2.14999706,21.1750444 C2.06092565,21.0819836 2.01120804,20.958136 2.01120804,20.8293182 L2.01120804,18.32426 C1.99400175,18.2187196 1.98505595,18.1104045 1.98505595,18 Z M6.5,14 C6.22385763,14 6,14.2238576 6,14.5 C6,14.7761424 6.22385763,15 6.5,15 L11.5,15 C11.7761424,15 12,14.7761424 12,14.5 C12,14.2238576 11.7761424,14 11.5,14 L6.5,14 Z M9.5,16 C9.22385763,16 9,16.2238576 9,16.5 C9,16.7761424 9.22385763,17 9.5,17 L11.5,17 C11.7761424,17 12,16.7761424 12,16.5 C12,16.2238576 11.7761424,16 11.5,16 L9.5,16 Z"
                                                        fill="#000000" opacity="0.3"/>
                                                </g>
                                            </svg>
                                            <!--end::Svg Icon-->
                                        </span>
                                    </span>
                                </div>
                                <!--end::Symbol-->
                                <!--begin::Text-->
                                <div class="d-flex flex-column font-weight-bold">
                                    <a href="#"
                                       class="text-dark text-hover-primary mb-1 font-size-lg">{{__('lang.TotalExportArchive')}}</a>
                                    <span class="text-muted">{{$inbox->where('is_signature','!=',null)->count()}}</span>
                                </div>
                                <!--end::Text-->
                            </div>
                            <!--begin::Item-->
                            <div class="d-flex align-items-center mb-2">
                                <!--begin::Symbol-->
                                <div class="symbol symbol-40 symbol-light-info mr-5">
                                    <span class="symbol-label">
                                        <span class="svg-icon svg-icon-lg svg-icon-info">
                                            <!--begin::Svg Icon | path:assets/media/svg/icons/Communication/Shield-user.svg-->
                                            <svg xmlns="http://www.w3.org/2000/svg"
                                                 xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px"
                                                 viewBox="0 0 24 24" version="1.1">
                                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                    <rect x="0" y="0" width="24" height="24"/>
                                                    <path
                                                        d="M4,4 L11.6314229,2.5691082 C11.8750185,2.52343403 12.1249815,2.52343403 12.3685771,2.5691082 L20,4 L20,13.2830094 C20,16.2173861 18.4883464,18.9447835 16,20.5 L12.5299989,22.6687507 C12.2057287,22.8714196 11.7942713,22.8714196 11.4700011,22.6687507 L8,20.5 C5.51165358,18.9447835 4,16.2173861 4,13.2830094 L4,4 Z"
                                                        fill="#000000" opacity="0.3"/>
                                                    <path
                                                        d="M12,11 C10.8954305,11 10,10.1045695 10,9 C10,7.8954305 10.8954305,7 12,7 C13.1045695,7 14,7.8954305 14,9 C14,10.1045695 13.1045695,11 12,11 Z"
                                                        fill="#000000" opacity="0.3"/>
                                                    <path
                                                        d="M7.00036205,16.4995035 C7.21569918,13.5165724 9.36772908,12 11.9907452,12 C14.6506758,12 16.8360465,13.4332455 16.9988413,16.5 C17.0053266,16.6221713 16.9988413,17 16.5815,17 C14.5228466,17 11.463736,17 7.4041679,17 C7.26484009,17 6.98863236,16.6619875 7.00036205,16.4995035 Z"
                                                        fill="#000000" opacity="0.3"/>
                                                </g>
                                            </svg>
                                            <!--end::Svg Icon-->
                                        </span>
                                    </span>
                                </div>
                                <!--end::Symbol-->
                                <!--begin::Text-->
                                <div class="d-flex flex-column font-weight-bold">
                                    <a href="#"
                                       class="text-dark text-hover-primary mb-1 font-size-lg">{{__('lang.ToTalUsers')}}</a>
                                    <span class="text-muted">@inject('User','App\User') {{$User->count() }}</span>
                                </div>
                                <!--end::Text-->
                            </div>
                            <!--end::Item-->
                        </div>
                        <!--end::Body-->
                    </div>
                    <!--end::List Widget 1-->
                </div>
                <div class="col-lg-6 col-xxl-6 order-2 order-xxl-1">
                    <!--begin::Advance Table Widget 2-->
                    <div class="card card-custom card-stretch gutter-b">
                        <!--begin::Header-->
                        <div class="card-header border-0 pt-5">
                            <h3 class="card-title align-items-start flex-column">
                                <span
                                    class="card-label font-weight-bolder text-dark">{{__('lang.usersCountByYear')}}</span>
                                <span class="text-muted mt-3 font-weight-bold font-size-sm"></span>
                            </h3>

                        </div>
                        <!--end::Header-->
                        <!--begin::Body-->
                        <div class="card-body pt-2 pb-0 mt-n3">
                            <div class="tab-content mt-5" id="myTabTables11">
                                <!--end::Tap pane-->
                                <!--begin::Tap pane-->
                                <div class="tab-pane fade show active" id="kt_tab_pane_11_3" role="tabpanel"
                                     aria-labelledby="kt_tab_pane_11_3">
                                    <!--begin::Table-->
                                    <div class="table-responsive">
                                        <table class="table table-bordered table-hover table-checkable mt-10"
                                               id="datatable">
                                            <thead>
                                            <tr>

                                                <th>اجمالي عدد الموظفين الجدد في السنة </th>
                                                <th>اجمالي عدد الموظفين في السنة</th>
                                                <th>{{__('lang.year')}}</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @foreach($data as $user)
                                                <tr>
                                                    <?php $count[] = $user['data'];
                                                    ?>
                                                    <td>{{$user['data']}}</td>
                                                    <td><? echo array_sum($count) ?> </td>
                                                    <td> <a href="/resources/getUsersWhereDate/{{$user['year']}}">{{$user['year']}} </a> </td>

                                                </tr>
                                            @endforeach


                                            </tbody>
                                        </table>
                                    </div>
                                    <!--end::Table-->
                                </div>
                                <!--end::Tap pane-->
                            </div>
                        </div>
                        <!--end::Body-->
                    </div>
                    <!--end::Advance Table Widget 2-->
                </div>
                <div class="col-lg-6 col-xxl-6 order-1 order-xxl-1">

                    <!--begin::List Widget 4-->
                    <div class="card card-custom card-stretch gutter-b">
                        <!--begin::Header-->
                        <div class="card-header border-0">
                            <h3 class="card-title font-weight-bolder text-dark"></h3>
                        </div>

                        <!--end::Header-->

                        <!--begin::Body-->
                        <div class="card-body pt-2">
                            <!--begin::Item-->
                            <div class="d-flex align-items-center">
                                <!--begin::Bullet-->
                                <span class="bullet bullet-bar bg-success align-self-stretch"></span>
                                <!--end::Bullet-->

                                <!--begin::Checkbox-->
                                <label class="checkbox checkbox-lg checkbox-light-success checkbox-inline flex-shrink-0 m-0 mx-4">
                                    <input type="checkbox" name="select"  value="1"/>
                                    <span></span>
                                </label>
                                <!--end::Checkbox-->

                                <!--begin::Text-->
                                <div class="d-flex flex-column flex-grow-1">
                                    <a href="/resources/getUsersWhereType/1" class="text-dark-75 text-hover-primary font-weight-bold font-size-lg mb-1">
                                        {{__('lang.KSA_Users_male')}}
                                    </a>
                                    <span class="text-muted font-weight-bold">
                            @inject('User','App\User')
                                        {{$User->where('country_id',1)->where('type',1)->count()}}
                </span>
                                </div>
                                <!--end::Text-->


                                <!--end::Dropdown-->
                            </div>
                            <!--end:Item-->

                            <!--begin::Item-->
                            <div class="d-flex align-items-center mt-10">
                                <!--begin::Bullet-->
                                <span class="bullet bullet-bar bg-primary align-self-stretch"></span>
                                <!--end::Bullet-->

                                <!--begin::Checkbox-->
                                <label class="checkbox checkbox-lg checkbox-light-primary checkbox-inline flex-shrink-0 m-0 mx-4">
                                    <input type="checkbox" value="1"/>
                                    <span></span>
                                </label>
                                <!--end::Checkbox-->

                                <!--begin::Text-->
                                <div class="d-flex flex-column flex-grow-1">
                                    <a href="/resources/getUsersWhereType/2" class="text-dark-75 text-hover-primary font-weight-bold font-size-lg mb-1">
                                        {{__('lang.KSA_Users_female')}}

                                    </a>
                                    <span class="text-muted font-weight-bold">
                                        {{$User->where('country_id',1)->where('type',2)->count()}}
                </span>
                                </div>
                                <!--end::Text-->

                                <!--begin::Dropdown-->
                                <!--end::Dropdown-->
                            </div>
                            <!--end::Item-->

                            <!--begin::Item-->
                            <div class="d-flex align-items-center mt-10">
                                <!--begin::Bullet-->
                                <span class="bullet bullet-bar bg-warning align-self-stretch"></span>
                                <!--end::Bullet-->

                                <!--begin::Checkbox-->
                                <label class="checkbox checkbox-lg checkbox-light-warning checkbox-inline flex-shrink-0 m-0 mx-4">
                                    <input type="checkbox" value="1"/>
                                    <span></span>
                                </label>
                                <!--end::Checkbox-->

                                <!--begin::Text-->
                                <div class="d-flex flex-column flex-grow-1">
                                    <a href="/resources/getUsersWhereType/3" class="text-dark-75 text-hover-primary font-size-sm font-weight-bold font-size-lg mb-1">
                                        {{__('lang.KSA_forgin_male')}} </a>
                                    <span class="text-muted font-weight-bold">
                                        {{$User->where('country_id','!=',1)->where('type',1)->count()}}
                                </span>
                                </div>
                                <!--end::Text-->

                                <!--begin: Dropdown-->
                                <!--end::Dropdown-->
                            </div>
                            <!--end::Item-->

                            <!--begin::Item-->
                            <div class="d-flex align-items-center mt-10">
                                <!--begin::Bullet-->
                                <span class="bullet bullet-bar bg-info align-self-stretch"></span>
                                <!--end::Bullet-->

                                <!--begin::Checkbox-->
                                <label class="checkbox checkbox-lg checkbox-light-info checkbox-inline flex-shrink-0 m-0 mx-4">
                                    <input type="checkbox" value="1"/>
                                    <span></span>
                                </label>
                                <!--end::Checkbox-->

                                <!--begin::Text-->
                                <div class="d-flex flex-column flex-grow-1">
                                    <a href="/resources/getUsersWhereType/4" class="text-dark-75 text-hover-primary font-weight-bold font-size-lg mb-1">
                                        {{__('lang.KSA_forgin_female')}}
                                    </a>
                                    <span class="text-muted font-weight-bold">
                                        {{$User->where('country_id','!=',1)->where('type',2)->count()}}                                    </a>
                </span>
                                </div>
                                <!--end::Text-->

                                <!--begin::Dropdown-->
                                <!--end::Dropdown-->
                            </div>
                            <!--end::Item-->

                            <!--begin::Item-->
                            <!--end::Item-->
                        </div>
                        <!--end::Body-->
                    </div>
                    <!--end:List Widget 4-->
                </div>

                <div class="col-lg-12 col-xxl-12 order-2 order-xxl-1">
                    <!--begin::Advance Table Widget 2-->
                    <div class="card card-custom card-stretch gutter-b">
                        <!--begin::Header-->
                        <div class="card-header border-0 pt-5">
                            <h3 class="card-title align-items-start flex-column">
                                <span
                                    class="card-label font-weight-bolder text-dark">{{__('lang.Transactionsmincoming')}}</span>
                                <span class="text-muted mt-3 font-weight-bold font-size-sm"></span>
                            </h3>
                            <div class="card-toolbar">
                                <ul class="nav nav-pills nav-pills-sm nav-dark-75">

                                    <li class="nav-item">
                                        <a class="nav-link py-2 px-4 active" data-toggle="tab"
                                           href="#kt_tab_pane_11_3">{{__('lang.Day')}}</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <!--end::Header-->
                        <!--begin::Body-->
                        <div class="card-body pt-2 pb-0 mt-n3">
                            <div class="tab-content mt-5" id="myTabTables11">
                                <!--end::Tap pane-->
                                <!--begin::Tap pane-->
                                <div class="tab-pane fade show active" id="kt_tab_pane_11_3" role="tabpanel"
                                     aria-labelledby="kt_tab_pane_11_3">
                                    <!--begin::Table-->
                                    <div class="table-responsive">
                                        <table class="table table-bordered table-hover table-checkable mt-10"
                                               id="datatable">
                                            <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>{{__('lang.Speech')}}</th>
                                                <th>{{__('lang.Attachment')}}</th>
                                                <th>{{__('lang.Transaction_number')}}</th>
                                                <th>{{__('lang.sender')}}</th>
                                                <th>{{__('lang.Topic')}}</th>
                                                <th>{{__('lang.Guidance')}}</th>
                                                <th style="width:100px !important;">{{__('lang.HijriDate')}}</th>
                                                <th style="width:100px !important;">{{__('lang.Date')}}</th>
                                                <th style="width:100px !important;">{{__('lang.time')}}</th>
                                                <th>{{__('lang.Details')}} </th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @inject('user','App\User')
                                            @inject('InboxAttachment','App\InboxAttachment')
                                            @inject('data','App\Inbox')
                                            @foreach($data->whereDay('created_at',date('Y-m-d'))->OrderBy('created_at','desc')->where('reciver_id',Auth::user()->id)->where('is_signature',null)->where('is_archive_reciver',null)->get() as $inbox)
                                                <tr>
                                                    <td>11</td>
                                                    <td>
                                                        @if($inbox->letter)
                                                            <span class="svg-icon svg-icon-warning svg-icon-3x"><!--begin::Svg Icon | path:C:\wamp64\www\keenthemes\themes\metronic\theme\html\demo1\dist/../src/media/svg/icons\Communication\Mail.svg--><svg
                                                                    xmlns="http://www.w3.org/2000/svg"
                                                                    xmlns:xlink="http://www.w3.org/1999/xlink"
                                                                    width="24px" height="24px" viewBox="0 0 24 24"
                                                                    version="1.1">
                          <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                              <rect x="0" y="0" width="24" height="24"/>
                              <path
                                  d="M5,6 L19,6 C20.1045695,6 21,6.8954305 21,8 L21,17 C21,18.1045695 20.1045695,19 19,19 L5,19 C3.8954305,19 3,18.1045695 3,17 L3,8 C3,6.8954305 3.8954305,6 5,6 Z M18.1444251,7.83964668 L12,11.1481833 L5.85557487,7.83964668 C5.4908718,7.6432681 5.03602525,7.77972206 4.83964668,8.14442513 C4.6432681,8.5091282 4.77972206,8.96397475 5.14442513,9.16035332 L11.6444251,12.6603533 C11.8664074,12.7798822 12.1335926,12.7798822 12.3555749,12.6603533 L18.8555749,9.16035332 C19.2202779,8.96397475 19.3567319,8.5091282 19.1603533,8.14442513 C18.9639747,7.77972206 18.5091282,7.6432681 18.1444251,7.83964668 Z"
                                  fill="#000000"/>
                          </g>
                      </svg>
                    </span>
                                                        @endif
                                                    </td>
                                                    <td> {{$InboxAttachment->where('inbox_id',$inbox->id)->count()}} </td>
                                                    <td> {{$inbox->id}} </td>
                                                    <td> @if($user->find($inbox->sender_id)) {{$user->find($inbox->sender_id)->name}}  @else
                                                            تم حضف الموظف @endif </td>
                                                    <td> @if($inbox->type == 2) بريد خارجي
                                                        : @endif {{$inbox->title}} </td>
                                                    <td> @if($user->find($inbox->reciver_id)) {{$user->find($inbox->reciver_id)->name}}  @else
                                                            تم حضف الموظف @endif </td>
                                                    @inject('hijri_date','App\inbox')
                                                    <td>{{$hijri_date->getHijriDate($inbox->created_at)}}</td>
                                                    <td style="width:100px !important;">{{ Carbon\Carbon::parse($inbox->created_at)->format('Y-m-d')}}</td>
                                                    <td style="width:100px !important;">{{Carbon\Carbon::parse($inbox->created_at)->format('H:m:s') }}</td>
                                                    <td nowrap="nowrap">
                                                        @if($inbox->type == 1)
                                                            <a class="btn btn-icon btn-success btn-sm btn-clean btn-icon btn-icon-md edit-Advert"
                                                               href="/transactions/inbox_details/{{$inbox->id}}"
                                                               data-original-title="Edit" title="View">
                                                                <i class="flaticon-eye icon-nm"></i>
                                                            </a>
                                                        @elseif($inbox->type == 2)
                                                            <a class="btn btn-icon btn-success btn-sm btn-clean btn-icon btn-icon-md edit-Advert"
                                                               href="/transactions/Outbound_details/{{$inbox->id}}"
                                                               data-original-title="Edit" title="View">
                                                                <i class="flaticon-eye icon-nm"></i>
                                                            </a>
                                                        @elseif($inbox->type == 0)
                                                            <a class="btn btn-icon btn-success btn-sm btn-clean btn-icon btn-icon-md edit-Advert"
                                                               href="/transactions/inbox_details/{{$inbox->id}}"
                                                               data-original-title="Edit" title="View">
                                                                <i class="flaticon-eye icon-nm"></i>
                                                            </a>
                                                        @endif
                                                    </td>
                                                </tr>
                                            @endforeach


                                            </tbody>
                                        </table>
                                    </div>
                                    <!--end::Table-->
                                </div>
                                <!--end::Tap pane-->
                            </div>
                        </div>
                        <!--end::Body-->
                    </div>
                    <!--end::Advance Table Widget 2-->
                </div>

                                <div class="col-lg-12 col-xxl-12 order-2 order-xxl-1">
                    <!--begin::Advance Table Widget 2-->
                    <div class="card card-custom card-stretch gutter-b">
                        <!--begin::Header-->
                        <div class="card-header border-0 pt-5">
                            <h3 class="card-title align-items-start flex-column">
                                <span
                                    class="card-label font-weight-bolder text-dark">@if(Request::segment(1) == 'ar' ) العقود المنتهية الموسمية @else  Expiring seasonal contracts  @endif </span>
                                <span class="text-muted mt-3 font-weight-bold font-size-sm"></span>
                            </h3>
                            <div class="card-toolbar">
                                <ul class="nav nav-pills nav-pills-sm nav-dark-75">

                                    <li class="nav-item">
                                        <a class="nav-link py-2 px-4 active" data-toggle="tab"
                                           href="#kt_tab_pane_11_3"></a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <!--end::Header-->
                        <!--begin::Body-->
                        <div class="card-body pt-2 pb-0 mt-n3">
                            <div class="tab-content mt-5" id="myTabTables11">
                                <!--end::Tap pane-->
                                <!--begin::Tap pane-->
                                <div class="tab-pane fade show active" id="kt_tab_pane_11_3" role="tabpanel"
                                     aria-labelledby="kt_tab_pane_11_3">
                                    <!--begin::Table-->
                                    <div class="table-responsive">
                    <table class="table table-bordered table-hover table-checkable mt-10" id="kt_datatable">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>{{__('lang.Users_Name')}} </th>
                            <th>{{__('lang.Users_main')}} </th>
                            <th>{{__('lang.Users_Mobile')}} </th>
                            <th>{{__('lang.Users_Nationality')}} </th>
                            <th>{{__('lang.Users_expiration')}} </th>
                            <th>{{__('lang.Actions')}} </th>
                        </tr>
                        </thead>
                        <tbody>
                            @inject('Users','App\User')
                        @foreach($Users->where('end_contract_date','<',\Carbon\Carbon::now()->addDays(60))->where('contract_duration',1)->where('contract_status',1)->get() as $User)
                            <tr>
                                <td>
                                    <label class="checkbox checkbox-single">
                                        <input type="checkbox" value="{{$User->id}}" class="checkable" name="check_delete[]"/>
                                        <span></span>
                                    </label>
                                </td>
                                <td>
                                    <a href="/viewProfile/{{$User->id}}">
                                        {{$User->name}}
                                    </a>
                                </td>
                                @inject('Job','App\Job')
                                <td>
                                    <span class="label font-weight-bold label-lg label-light-primary label-inline">@if($Job->find($User->mainJob_id)) {{$Job->find($User->mainJob_id)->name}} @else   تم حذف الوظيفة @endif</span>
                                </td>
                                <td>{{$User->phone}}</td>
                                @inject('Nationality','App\Nationality')
                                <td>@if($Nationality->find($User->country_id)) {{$Nationality->find($User->country_id)->name}} @else   تم حذف الجنسية @endif</td>


                                <td>{{$User->end_contract_date}}</td>

                               <td>
                                   <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#exampleModal" data-whatever="{{$User->id}}">{{__('lang.NotRenew')}}</button>
                                   <button type="button" class="btn btn-success" data-toggle="modal" data-target="#exampleModal1" data-b="{{$User->contract_num}}" data-whatever="{{$User->id}}">{{__('lang.Renew')}}</button>

                               </td>

                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                                    </div>
                                    <!--end::Table-->
                                </div>
                                <!--end::Tap pane-->
                            </div>
                        </div>
                        <!--end::Body-->
                    </div>
                    <!--end::Advance Table Widget 2-->
                </div>


                                <div class="col-lg-12 col-xxl-12 order-2 order-xxl-1">
                    <!--begin::Advance Table Widget 2-->
                    <div class="card card-custom card-stretch gutter-b">
                        <!--begin::Header-->
                        <div class="card-header border-0 pt-5">
                            <h3 class="card-title align-items-start flex-column">
                                <span
                                    class="card-label font-weight-bolder text-dark">@if(Request::segment(1) == 'ar' ) العقود المنتهية السنوية @else  Expiring Yearly contracts  @endif </span>
                                <span class="text-muted mt-3 font-weight-bold font-size-sm"></span>
                            </h3>
                            <div class="card-toolbar">
                                <ul class="nav nav-pills nav-pills-sm nav-dark-75">

                                    <li class="nav-item">
                                        <a class="nav-link py-2 px-4 active" data-toggle="tab"
                                           href="#kt_tab_pane_11_3"></a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <!--end::Header-->
                        <!--begin::Body-->
                        <div class="card-body pt-2 pb-0 mt-n3">
                            <div class="tab-content mt-5" id="myTabTables11">
                                <!--end::Tap pane-->
                                <!--begin::Tap pane-->
                                <div class="tab-pane fade show active" id="kt_tab_pane_11_3" role="tabpanel"
                                     aria-labelledby="kt_tab_pane_11_3">
                                    <!--begin::Table-->
                                    <div class="table-responsive">
                    <table class="table table-bordered table-hover table-checkable mt-10" id="kt_datatable">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>{{__('lang.Users_Name')}} </th>
                            <th>{{__('lang.Users_main')}} </th>
                            <th>{{__('lang.Users_Mobile')}} </th>
                            <th>{{__('lang.Users_Nationality')}} </th>
                            <th style="width:150px">{{__('lang.Users_expiration')}} </th>
                                                        <th style="width:250px">{{__('lang.Actions')}} </th>

                        </tr>
                        </thead>
                        <tbody>
                            @inject('Users','App\User')
                        @foreach($Users->where('end_contract_date','<',\Carbon\Carbon::now()->addDays(60))->where('contract_duration',2)->where('contract_status',1)->get() as $User)
                            <tr>
                                <td>
                                    <label class="checkbox checkbox-single">
                                        <input type="checkbox" value="{{$User->id}}" class="checkable" name="check_delete[]"/>
                                        <span></span>
                                    </label>
                                </td>
                                <td>
                                    <a href="/viewProfile/{{$User->id}}">
                                   {{$User->name}}
                                    </a>
                                </td>
                                @inject('Job','App\Job')
                                <td style="width:150px">
                                    <span class="label font-weight-bold label-lg label-light-primary label-inline">@if($Job->find($User->mainJob_id)) {{$Job->find($User->mainJob_id)->name}} @else   تم حذف الوظيفة @endif</span>
                                </td>
                                <td>{{$User->phone}}</td>
                                @inject('Nationality','App\Nationality')
                                <td>@if($Nationality->find($User->country_id)) {{$Nationality->find($User->country_id)->name}} @else   تم حذف الجنسية @endif</td>


                                <td>{{$User->end_contract_date}}</td>

                                     <td style="width:250px">
                                   <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#exampleModal" data-whatever="{{$User->id}}">{{__('lang.NotRenew')}}</button>
                                   <button type="button" class="btn btn-success" data-toggle="modal" data-target="#exampleModal1" data-b="{{$User->contract_num}}" data-whatever="{{$User->id}}">{{__('lang.Renew')}}</button>

                               </td>


                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                                    </div>
                                    <!--end::Table-->
                                </div>
                                <!--end::Tap pane-->
                            </div>
                        </div>
                        <!--end::Body-->
                    </div>
                    <!--end::Advance Table Widget 2-->
                </div>

            </div>
        </div>
        <!--end::Container-->
    </div>


<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">{{__('lang.NotRenew')}}</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
              <form action="{{ url('UserUpdateContractDate')}}" method="post">
            @csrf

      <div class="modal-body">
            <input type="hidden" name="id" class="form-control" id="id">
            <input type="hidden" name="contract_status" value="0" class="form-control" >
          <div class="form-group">
            <label for="message-text" class="col-form-label">{{__('lang.Reason')}}:</label>
            <textarea class="form-control" id="message-text" name="reason"></textarea>
          </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">{{__('lang.Close')}}</button>
        <button type="submit" class="btn btn-primary">{{__('lang.Save')}}</button>
      </div>
              </form>

    </div>
  </div>
</div>
<div class="modal fade" id="exampleModal1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">{{__('lang.Renew')}}</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
              <form action="{{ url('UserUpdateContractDate')}}" method="post">
            @csrf

      <div class="modal-body">
            <input type="hidden" name="id" class="form-control" id="id">
            <input type="hidden" name="contract_status" value="1" class="form-control" >
          <div class="form-group">
                        <label>{{__('lang.Users_Contract')}}  </label>
                        <input type="number" class="form-control form-control-solid" id="contract_num" value="" disabled name="contract_num" required placeholder="{{__('lang.Users_Contract')}}" value="">
                    </div>

                    <div class="form-group">
                        <label>{{__('lang.Users_expiration')}} </label>
                        <select name="type" class="form-control" >
                        <option value="1">تجديد لمدة سنة </option>
                        <option value="2">تجديد لمدة سنتين </option>
                        </select>
                    </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">{{__('lang.Close')}}</button>
        <button type="submit" class="btn btn-primary">{{__('lang.Save')}}</button>
      </div>
              </form>

    </div>
  </div>
</div>
    <!--end::Entry-->
@endsection
@section('js')
    <script src="{{asset('dashboard/assets/plugins/custom/datatables/datatables.bundle.js')}}"></script>

    <script>
    $('#exampleModal').on('show.bs.modal', function (event) {
  var button = $(event.relatedTarget) // Button that triggered the modal
  var recipient = button.data('whatever') // Extract info from data-* attributes
  var contract_num = button.data('b') // Extract info from data-* attributes

  // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
  // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
  var modal = $(this)
    modal.find('.modal-body #id').val(recipient);
        modal.find('.modal-body #contract_num').val(contract_num)


})
    $('#exampleModal1').on('show.bs.modal', function (event) {
  var button = $(event.relatedTarget) // Button that triggered the modal
  var recipient = button.data('whatever') // Extract info from data-* attributes
    var contract_num = button.data('b') // Extract info from data-* attributes

  // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
  // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
    var modal = $(this)

    modal.find('.modal-body #contract_num').val(contract_num);
  modal.find('.modal-body #id').val(recipient)
})

        $('#datatable').dataTable({
            "searching": true,
            @if( Request::segment(1) == "ar")
            "language": {
                "url": "//cdn.datatables.net/plug-ins/1.10.19/i18n/Arabic.json"
            }
            @endif
        });
    </script>


       <script src="{{asset('hijri/js/momentjs.js')}}"></script>
    <script src="{{asset('hijri/js/moment-with-locales.js')}}"></script>
    <script src="{{asset('hijri/js/moment-hijri.js')}}"></script>
    <script src="{{asset('hijri/js/bootstrap-hijri-datetimepicker.js')}}"></script>

    		<!--<script src="{{asset('dashboard/assets/js/pages/features/charts/apexcharts.js')}}"></script>-->

<script>
"use strict";

// Shared Colors Definition
const primary = '#6993FF';
const success = '#1BC5BD';
const info = '#8950FC';
const warning = '#FFA800';
const danger = '#F64E60';

// Class definition
function generateBubbleData(baseval, count, yrange) {
    var i = 0;
    var series = [];
    while (i < count) {
      var x = Math.floor(Math.random() * (750 - 1 + 1)) + 1;;
      var y = Math.floor(Math.random() * (yrange.max - yrange.min + 1)) + yrange.min;
      var z = Math.floor(Math.random() * (75 - 15 + 1)) + 15;

      series.push([x, y, z]);
      baseval += 86400000;
      i++;
    }
    return series;
  }

function generateData(count, yrange) {
    var i = 0;
    var series = [];
    while (i < count) {
        var x = 'w' + (i + 1).toString();
        var y = Math.floor(Math.random() * (yrange.max - yrange.min + 1)) + yrange.min;

        series.push({
            x: x,
            y: y
        });
        i++;
    }
    return series;
}

var KTApexChartsDemo = function () {
	// Private functions

	var _demo3 = function () {
		const apexChart = "#chart_3";
		var options = {
			series: [{
				name: 'الموظفيين',
				data: [
				    @inject('uses','App\User')
                  @for($x=2010; $x<=date('Y'); $x++)
                  "{{$user->whereYear('start_job_date','<=',$x)->count()}}",
                    @endfor
]
			}, ],
			chart: {
				type: 'bar',
				height: 350
			},
			plotOptions: {
				bar: {
					horizontal: false,
					columnWidth: '55%',
					endingShape: 'rounded'
				},
			},
			dataLabels: {
				enabled: false
			},
			stroke: {
				show: true,
				width: 2,
				colors: ['transparent']
			},
			xaxis: {
				categories: [
				                                            @for($x=2010; $x<=date('Y'); $x++)
                   {{$x}},
                    @endfor

				    ],
			},
			yaxis: {
				title: {
				}
			},
			fill: {
				opacity: 1
			},
			tooltip: {
				y: {
					formatter: function (val) {
						return val
					}
				}
			},
			colors: [primary, success, warning]
		};

		var chart = new ApexCharts(document.querySelector(apexChart), options);
		chart.render();
	}



	return {
		// public functions
		init: function () {
			_demo3();
		}
	};
}();

jQuery(document).ready(function () {
	KTApexChartsDemo.init();
});




    //     var _initStatsWidget12 = function () {
    //     var element = document.getElementById("kt_stats_widget_12_chart");

    //     var height = parseInt(KTUtil.css(element, 'height'));
    //     var color = KTUtil.hasAttr(element, 'data-color') ? KTUtil.attr(element, 'data-color') : 'primary';

    //     if (!element) {
    //         return;
    //     }

    //     var options = {
    //         series: [{
    //             name: 'Net Profit',
    //             data: [
    //                 @inject('uses','App\User')
    //               @for($x=2010; $x<=date('Y'); $x++)
    //               "{{$user->whereYear('start_job_date','=',$x)->count()}}",
    //                 @endfor

    //                 ]
    //         }],
    //         chart: {
    //             type: 'area',
    //             height: height,
    //             toolbar: {
    //                 show: false
    //             },
    //             zoom: {
    //                 enabled: false
    //             },
    //             sparkline: {
    //                 enabled: true
    //             }
    //         },
    //         plotOptions: {},
    //         legend: {
    //             show: false
    //         },
    //         dataLabels: {
    //             enabled: false
    //         },
    //         fill: {
    //             type: 'solid',
    //             opacity: 1
    //         },
    //         stroke: {
    //             curve: 'smooth',
    //             show: true,
    //             width: 3,
    //             colors: [KTApp.getSettings()['colors']['theme']['base'][color]]
    //         },
    //         xaxis: {
    //             categories: [
    //                                     @for($x=2010; $x<=date('Y'); $x++)
    //               {{$x}},
    //                 @endfor
    //                 ],
    //             axisBorder: {
    //                 show: false,
    //             },
    //             axisTicks: {
    //                 show: false
    //             },
    //             labels: {
    //                 show: false,
    //                 style: {
    //                     colors: KTApp.getSettings()['colors']['gray']['gray-500'],
    //                     fontSize: '12px',
    //                     fontFamily: KTApp.getSettings()['font-family']
    //                 }
    //             },
    //             crosshairs: {
    //                 show: false,
    //                 position: 'front',
    //                 stroke: {
    //                     color: KTApp.getSettings()['colors']['gray']['gray-300'],
    //                     width: 1,
    //                     dashArray: 3
    //                 }
    //             },
    //             tooltip: {
    //                 enabled: true,
    //                 formatter: undefined,
    //                 offsetY: 0,
    //                 style: {
    //                     fontSize: '12px',
    //                     fontFamily: KTApp.getSettings()['font-family']
    //                 }
    //             }
    //         },
    //         yaxis: {
    //             min: 0,
    //             max: 55,
    //             labels: {
    //                 show: false,
    //                 style: {
    //                     colors: KTApp.getSettings()['colors']['gray']['gray-500'],
    //                     fontSize: '12px',
    //                     fontFamily: KTApp.getSettings()['font-family']
    //                 }
    //             }
    //         },
    //         states: {
    //             normal: {
    //                 filter: {
    //                     type: 'none',
    //                     value: 0
    //                 }
    //             },
    //             hover: {
    //                 filter: {
    //                     type: 'none',
    //                     value: 0
    //                 }
    //             },
    //             active: {
    //                 allowMultipleDataPointsSelection: false,
    //                 filter: {
    //                     type: 'none',
    //                     value: 0
    //                 }
    //             }
    //         },
    //         tooltip: {
    //             style: {
    //                 fontSize: '12px',
    //                 fontFamily: KTApp.getSettings()['font-family']
    //             },
    //             y: {
    //                 formatter: function (val) {
    //                     return  val + " User"
    //                 }
    //             }
    //         },
    //         colors: [KTApp.getSettings()['colors']['theme']['light'][color]],
    //         markers: {
    //             colors: [KTApp.getSettings()['colors']['theme']['light'][color]],
    //             strokeColor: [KTApp.getSettings()['colors']['theme']['base'][color]],
    //             strokeWidth: 3
    //         }
    //     };

    //     var chart = new ApexCharts(element, options);
    //     chart.render();
    // }

</script>
    <!--begin::Page scripts(used by this page) -->
    <script type="text/javascript">


        $(function () {

            initHijrDatePicker();

            //initHijrDatePickerDefault();

            $('.disable-date').hijriDatePicker({

                minDate:"2020-01-01",
                maxDate:"2021-01-01",
                viewMode:"years",
                hijri:true,
                debug:true
            });

        });

        function initHijrDatePicker() {

            $(".hijri-date-input").hijriDatePicker({
                locale: "ar-sa",
                format: "DD-MM-YYYY",
                hijriFormat:"iYYYY-iMM-iDD",
                dayViewHeaderFormat: "MMMM YYYY",
                hijriDayViewHeaderFormat: "iMMMM iYYYY",
                showSwitcher: true,
                allowInputToggle: true,
                showTodayButton: false,
                useCurrent: true,
                isRTL: false,
                viewMode:'months',
                keepOpen: false,
                hijri: false,
                debug: true,
                showClear: true,
                showTodayButton: true,
                showClose: true
            });
        }

        function initHijrDatePickerDefault() {

            $(".hijri-date-input").hijriDatePicker();
        }


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
        @endif
    @endif
@endsection
