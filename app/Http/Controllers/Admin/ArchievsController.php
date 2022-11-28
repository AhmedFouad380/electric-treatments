<?php

namespace App\Http\Controllers\Admin;

use App\Attendance;
use App\Excelsheet;
use App\Http\Controllers\Controller;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Excel;

ini_set('max_execution_time', 1440); //6 minutes

class ArchievsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {


        $too_date = Carbon::now();
        $to_date = $too_date->toDateString();
        $month = $too_date->month;
        if ($month < 10) {
            $month = "0" . $month;
        }
        $year = $too_date->year;
        $from_date = $year . "-" . $month . "-01";

        $attendances = Attendance::whereBetween('check_date', [$from_date, $to_date])->get();

        $emp = User::all();
        $users = "all";

        return view('Admin.reports.archievs', compact('attendances', 'emp', 'from_date', 'to_date', 'users'));


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
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $from_date = $request['filter_from'];
        $to_date = $request['filter_to'];
        $user = $request['user'];
        $users = $request['user'];
        $emp = User::all();
        if ($user == "all") {
            $attendances = Attendance::whereBetween('check_date', [$from_date, $to_date])->get();
        } else {
            $attendances = Attendance::whereBetween('check_date', [$from_date, $to_date])->where('user_id', $user)->get();
            $users = User::where('id', $users)->first();
        }
        return view('Admin.reports.archievs', compact('attendances', 'emp', 'from_date', 'to_date', 'users'));

    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }


    public function importExcel(Request $request)
    {
        $request->validate([
            'file' => 'required|mimes:xlsx',
        ]);
        $user_id = $request->employee_id;
        $input = $request->all();
        if ($request['file'] != null) {
            // This is file Information ...
            $file = $request->file('file');
            $name = $file->getClientOriginalName();
            $ext = $file->getClientOriginalExtension();
            $size = $file->getSize();
            $path = $file->getRealPath();
            $mime = $file->getMimeType();
            // Move Image To Folder ..
            $fileNewName = "file" . time() . '.' . $ext;
             $save_path =public_path("uploads/"); //for server not localhost

            //$save_path = public_path("uploads\\");
            $file->move($save_path, $fileNewName);
            $realPath = $save_path . $fileNewName;
            $last_file_date = Attendance::where('type', '0')->orderBy('check_date', 'desc')->first();


            $data = Excel::toArray(new Excelsheet, $realPath);


            if (!empty($data)) {
                foreach ($data as $row) {

                    foreach ($row as $key => $s) {
                        if ($key != 0) {
                            $user_id = $s[0];
                            $value = $s[1];
//                             dd(\PhpOffice\PhpSpreadsheet\Shared\Date::excelToDateTimeObject($value));
//                            $dateee = new Carbon($value);
                            $dateee =\Carbon\Carbon::instance(\PhpOffice\PhpSpreadsheet\Shared\Date::excelToDateTimeObject($value));

                            if ($last_file_date == null) {
                                $time = date('H:i:s', strtotime($dateee));
                                $datee = date('Y-m-d', strtotime($dateee));
                                $user_exist = User::where('fpuid', $user_id)->first();
                                if ($user_exist) {
                                    $arr['user_id'] = $user_id;
                                    $arr ['check_date'] = $datee;
                                    $arr['check_time'] = $time;
                                    Attendance::create($arr);
                                }
                            } else {
                                if (new Carbon($last_file_date->check_date) < $dateee) {
                                    $time = date('H:i:s', strtotime($dateee));
                                    $datee = date('Y-m-d', strtotime($dateee));

                                    $user_exist = User::where('fpuid', $user_id)->first();
                                    if ($user_exist) {
                                        $arr['user_id'] = $user_id;
                                        $arr ['check_date'] = $datee;
                                        $arr['check_time'] = $time;
                                        Attendance::create($arr);
                                    }
                                }
                            }
                        }else{

                        }
                    }
                }
            }
        }


        return redirect(url('reports/archieves'))->with('message', 'Success');
    }

}
