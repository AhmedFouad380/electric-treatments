<?php

namespace App\Http\Controllers\Admin;

use App\AskPermission;
use App\Http\Controllers\Controller;
use App\VacationRequest;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RequestsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function HRRequestList(){
        $askpermissions= AskPermission::where('status', 'accepted')
            ->get();


        $vacationRequests = VacationRequest::where('status', 'accepted')
            ->get();

//        dd($askpermission , $vacationRequest);
        return view('Admin.AskPermission.index', compact('askpermissions', 'vacationRequests'));

    }
    public function index()
    {
        $to_date = Carbon::now();


        $month = $to_date->month;
        if($month < 10){
            $month = "0".$month;
        }
        $year = $to_date->year;
        $from_date = $year."-".$month."-01";
//       dd($to_date);

        $status = 'notyet';


        $user_id = Auth::user()->id;
        $askpermissions= AskPermission::where('manager_id', $user_id)
            ->where('status',$status)->whereBetween('request_date',[ $from_date ,$to_date->toDateString() ])->get();


        $vacationRequests = VacationRequest::where('manager_id', $user_id)
            ->where('status',$status)->whereBetween('request_date',[ $from_date ,$to_date->toDateString() ])->get();

//        dd($askpermission , $vacationRequest);
        return view('Admin.AskPermission.index', compact('askpermissions', 'vacationRequests'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $from_date = $request['filter_from'];
        $to_date   =$request['filter_to'];
        $status =$request['filter_status'];

//            dd($from_date);
        $user_id = Auth::user()->id;
        if($from_date !=null && $to_date !=null) {
            if ($status == 'all') {
                $askpermissions = AskPermission::where('manager_id', $user_id)
                    ->whereBetween('request_date', [$from_date, $to_date])->get();


                $vacationRequests = VacationRequest::where('manager_id', $user_id)
                    ->whereBetween('request_date', [$from_date, $to_date])->get();

            } else {


                $askpermissions = AskPermission::where('manager_id', $user_id)
                    ->where('status', $status)->whereBetween('request_date', [$from_date, $to_date])->get();


                $vacationRequests = VacationRequest::where('manager_id', $user_id)
                    ->where('status', $status)->whereBetween('request_date', [$from_date, $to_date])->get();
            }
         }else{
            if ($status == 'all') {
                $askpermissions = AskPermission::where('manager_id', $user_id)->get();


                $vacationRequests = VacationRequest::where('manager_id', $user_id)->get();

            } else {


                $askpermissions = AskPermission::where('manager_id', $user_id)
                    ->where('status', $status)->get();


                $vacationRequests = VacationRequest::where('manager_id', $user_id)
                    ->where('status', $status)->get();
            }

        }
        return view('Admin.AskPermission.index', compact('askpermissions', 'vacationRequests'));

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
