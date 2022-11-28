<!DOCTYPE html>
<html lang="en">
<head>

    <link rel="shortcut icon" href="{{asset('dashboard/assets/media/logos/fav.png')}}" />
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->

    <title>URAM ELECTRONIC TRADEMENT || Report</title>

     {{--    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"--}}
    {{--          integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">--}}
    <link rel="stylesheet" href="{{url('public/app-assets/css/bootstrap.css')}}"
          integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

    <link rel="stylesheet" type="text/css" href="{{url('public/app-assets/css/bootstrap.css')}}">
    <!-- font icons-->
    <link rel="stylesheet" type="text/css" href="{{url('public/app-assets/fonts/icomoon.css')}}">
    <link rel="stylesheet" type="text/css"
          href="{{url('public/app-assets/fonts/flag-icon-css/css/flag-icon.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{url('public/app-assets/vendors/css/extensions/pace.css')}}">
    <!-- END VENDOR CSS-->
    <!-- BEGIN ROBUST CSS-->
    <link rel="stylesheet" type="text/css" href="{{url('public/app-assets/css/bootstrap-extended.css')}}">
    <link rel="stylesheet" type="text/css" href="{{url('public/app-assets/css/app.css')}}">
    <link rel="stylesheet" type="text/css" href="{{url('public/app-assets/css/colors.css')}}">
    <!-- END ROBUST CSS-->
    <!-- BEGIN Page Level CSS-->
    <link rel="stylesheet" type="text/css"
          href="{{url('public/app-assets/css/core/menu/menu-types/vertical-menu.css')}}">
    <link rel="stylesheet" type="text/css"
          href="{{url('public/app-assets/css/core/menu/menu-types/vertical-overlay-menu.css')}}">
    <link rel="stylesheet" type="text/css" href="{{url('public/app-assets/css/core/colors/palette-gradient.css')}}">
    <!-- END Page Level CSS-->
    <!-- BEGIN Custom CSS-->
    <link rel="stylesheet" type="text/css" href="{{url('public/assets/css/style.css')}}">


</head>

<body style="direction: rtl;">
<div class="card">
    <div class="card-body">


        <div class="row">
            <div style="  width: 100%;

    overflow: hidden;">

        </div>

        <div class="card-body collapse in">

            <div class="card-body" style=' padding-top: 10px;
                            padding-right: 15px;
                             padding-left: 20px;
                             '>


                <div style="font-family: DejaVu Sans, sans-serif;font-size: 13px;text-align: center;">
                    <h4 class="card-title">{{trans('lang.monthlyreport')}} </h4>
                    <h5>عن الفتره من @if($date_from !== null)
                            {{$date_from->check_date}}
                        @endif
                        الى @if($date_to !== null)
                            {{$date_to->check_date}}
                            للموظف {{$date_to->getUser->name}}
                        @endif
                    </h5>
                </div>


                <div class="table-responsive">
                    <table class="table table-bordered "

                           style="font-family: DejaVu Sans, sans-serif;font-size: 13px;text-align:center;">
                        <thead class="bg-info">
                        <tr>
                            <th style="font-family: DejaVu Sans, sans-serif;font-size: 13px;text-align:center">#</th>
                            <th style="font-family: DejaVu Sans, sans-serif;font-size: 13px;text-align:center">{{trans('lang.datee')}} </th>
                            <th style="font-family: DejaVu Sans, sans-serif;font-size: 13px;text-align:center">{{trans('lang.shiftt')}} </th>
                            <th style="font-family: DejaVu Sans, sans-serif;font-size: 13px;text-align:center">{{trans('lang.day')}} </th>
                            <th style="font-family: DejaVu Sans, sans-serif;font-size: 13px;text-align:center">{{trans('lang.attendance_delay')}}</th>
                            <th style="font-family: DejaVu Sans, sans-serif;font-size: 13px;text-align:center">{{trans('lang.leave_early')}}</th>
                            <th style="font-family: DejaVu Sans, sans-serif;font-size: 13px;text-align:center">{{trans('lang.attendance_early')}}</th>
                            <th style="font-family: DejaVu Sans, sans-serif;font-size: 13px;text-align:center">{{trans('lang.leave_delay')}}</th>
                            <th style="font-family: DejaVu Sans, sans-serif;font-size: 13px;text-align:center">{{trans('lang.no_attendance')}}</th>
                            <th style="font-family: DejaVu Sans, sans-serif;font-size: 13px;text-align:center">{{trans('lang.no_leave')}}</th>
                            <th style="font-family:DejaVu Sans, sans-serif;font-size: 13px;text-align:center">{{trans('lang.absences')}}</th>


                        </tr>
                        </thead>
                        <tbody>
                        @php
                            $id = 1;
                        @endphp

                        @foreach($data as $temp)
                            <tr>
                                <th scope="row">{{$id}}</th>
                                <td>{{$temp->check_date}}</td>
                                <td>{{$temp->shift}} </td>
                                <td>{{$temp->day}} </td>
                                @if($temp->attendance_delay == null)
                                    <td></td>
                                @else
                                    <td>{{ date('H:i', strtotime($temp->attendance_delay))}} </td>

                                @endif
                                @if($temp->leave_early == null)
                                    <td></td>
                                @else
                                    <td>{{ date('H:i', strtotime($temp->leave_early))}} </td>

                                @endif
                                @if($temp->attendance_early == null)
                                    <td></td>
                                @else
                                    <td>{{ date('H:i', strtotime($temp->attendance_early))}} </td>

                                @endif
                                @if($temp->leave_delay == null)
                                    <td></td>
                                @else
                                    <td>{{ date('H:i', strtotime($temp->leave_delay))}} </td>

                                @endif

                                @if($temp->no_attendance == 'no')
                                    <td></td>
                                @else
                                    {{--                                                    <td>{{$temp->no_attendance}}</td>--}}
                                    <td><img style="width: 20px;height: 20px"
                                             src="{{asset('img/icon.png')}}"></td>
                                @endif
                                @if($temp->no_leave == 'no')
                                    <td></td>
                                @else
                                    {{--                                                    <td>{{$temp->no_leave}}</td>--}}

                                    <td><img style="width: 20px;height: 20px"
                                             src="{{asset('img/icon.png')}}"></td>
                                @endif
                                @if($temp->absences == 'no')
                                    <td></td>
                                @else
                                    {{--                                                    <td>{{$temp->absences}}</td>--}}
                                    <td><img style="width: 20px;height: 20px"
                                             src="{{asset('img/icon.png')}}"></td>
s                                @endif


                            </tr>
                            @php
                                $id++;
                            @endphp

                        @endforeach

                        </tbody>

                    </table>

                </div>


                <div style="padding-top: 25px"></div>


                <div style="font-family: DejaVu Sans, sans-serif;font-size: 13px;text-align: center;">
                    <h4 class="card-title">{{trans('lang.summary')}} </h4>
                </div>
                <div class="table-responsive">
                    <table class="table table-bordered "
                           style="font-family: DejaVu Sans, sans-serif;font-size: 13px;text-align:center;">
                        <thead class="bg-danger">
                        <tr>
                            <th style="font-family: DejaVu Sans, sans-serif;font-size: 13px;text-align:center">#</th>
                            <th style="font-family: DejaVu Sans, sans-serif;font-size: 13px;text-align:center">{{trans('lang.statement')}} </th>
                            <th style="font-family: DejaVu Sans, sans-serif;font-size: 13px;text-align:center">{{trans('lang.withPermission')}} </th>
                            <th style="font-family:DejaVu Sans, sans-serif;font-size: 13px;text-align:center">{{trans('lang.withoutPermission')}} </th>
                            <th style="font-family:DejaVu Sans, sans-serif;font-size: 13px;text-align:center">{{trans('lang.total')}}</th>


                        </tr>
                        </thead>
                        <tbody>
                        @php
                            $id = 1;
                        @endphp

                        @foreach($summary as $temp_summary)
                            <tr>
                                <th scope="row">{{$id}}</th>
                                <td>{{trans('lang.'.$temp_summary->name)}}</td>
                                @if($temp_summary->with)

                                    <td>{{$temp_summary->with}} </td>
                                @else
                                    <td>0</td>
                                @endif
                                @if($temp_summary->without)
                                    <td>{{$temp_summary->without}} </td>
                                @else
                                    <td>0</td>
                                @endif
                                @if($temp_summary->without)
                                    <td>{{$temp_summary->total}} </td>
                                @else
                                    <td>0</td>
                                @endif
                            </tr>
                            @php
                                $id++;
                            @endphp

                        @endforeach

                        </tbody>

                    </table>

                </div>


            </div>
        </div>
    </div>
</div>

<style>
    #footer {
        position: absolute;
        bottom: 0;
        height: 2.5rem; /* Footer height */
    }
</style>

<footer id="footer" class=" " style="font-family: DejaVu Sans, sans-serif;font-size: 13px;text-align: center;padding-left: 175px">
    <br>
    <p class="clearfix text-muted text-sm-center mb-0 px-2"><span class="float-md-left d-xs-block d-md-inline-block">Copyright   2020 <a
                href="#" target="_blank"
                class="text-bold-800 grey darken-2">Uram IT </a>, All rights reserved. </span><span
            class="float-md-right d-xs-block d-md-inline-block"> </span></p>
</footer>
</body>
</html>

