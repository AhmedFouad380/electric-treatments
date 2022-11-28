<?php

namespace App\Http\Controllers\Admin;

use App\AskPermission;
use App\Category;
use App\Http\Controllers\Controller;
use App\Job;
use App\Setting;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AskPermissionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $category_id = Auth::user()->category_id;
        $sub_category = Category::whereId($category_id)->first();
        $job_id = Auth::user()->mainJob_id;
        $category_id = Job::whereId($job_id)->first();
        $jobs = Job::where('category_id', $category_id->category_id)->where('job_role', 2)->pluck('id');

        $dept_employee = User::whereIn('mainJob_id', $jobs)->get();


        return view('Admin.AskPermission.create', compact('dept_employee'));

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
//        dd($request);

        $mytime = Carbon::now();
        $data = $this->validate(\request(),
            [
                'permission_date' => 'required|date',
                'from' => 'required',
                'to' => 'required',
                'reason' => 'required',
                'description' => '',
                'request_date' => '',
                'status' => '',
                'user_id' => '',
                'manager_id' => '',
                'job_id' => ''

            ]);
        $data['description'] = 'طلب استئذان يوم    ' . request('permission_date') . ' من الساعه   ' . \request('from') . ' الى الساعه  ' . \request('to');
        $data['request_date'] = $mytime->toDateString();
        if ($request->user_id == null) {
            $data['user_id'] = Auth::user()->id;
        } else {
            $data['user_id'] = $request->user_id;
            $data['status'] = 'accepted';

        }

        $year = \Carbon\Carbon::parse($request->permission_date)->format('Y');
        if ($year < 1900) {
            $year = \Carbon\Carbon::parse($request->permission_date)->format('Y');
            $month = \Carbon\Carbon::parse($request->permission_date)->format('m');
            $day = \Carbon\Carbon::parse($request->permission_date)->format('d');
            $date = \GeniusTS\HijriDate\Hijri::convertToGregorian($day, $month, $year);
            $data['permission_date'] = $date;
        } else {
            $to_date = \Carbon\Carbon::parse($request->permission_date)->format('Y-m-d');
            $data['permission_date'] = $to_date;
        }


        $job_id = Auth::user()->mainJob_id;
        $data['job_id'] = $job_id;

        $job = Job::where('id', Auth::user()->mainJob_id)->first();
//        if ($job->job_role != 1) {
//            $job_id = Auth::user()->mainJob_id;
//            $sub_category = Job::whereId($job_id)->first();
//            $category_id = Job::whereId($sub_category->sub_id)->first();
//            $jobs = Job::where('category_id', $category_id->category_id)->where('job_role', 1)->first();
//            if(isset($jobs) &&  User::where('mainJob_id', $jobs->id)->first()  ){
//                $manager_id = User::where('mainJob_id', $jobs->id)->first();
//            }else{
//                $category_id = Job::whereId(39)->first();
//                $jobs = Job::where('category_id', $category_id->category_id)->where('job_role', 1)->first();
//                $manager_id = User::where('mainJob_id', $jobs->id)->first();
//            }
//            $data['manager_id'] = $manager_id->id;
//
//        } else {
//             $job_id = Auth::user()->mainJob_id;
//            $category_id = Job::whereId($job_id)->first();
//            $sub_category = Category::whereId($category_id->category_id)->first();
//            $manager_id = User::where('category_id', $sub_category->sub_id)->where('role', 1)->first();
//
//            if ($manager_id) {
//                $data['manager_id'] = $manager_id->id;
//            } else {
//                $data['manager_id'] = Auth::user()->id;
//            }
//
//        }


        $job_id = Auth::user()->mainJob_id;
        $data['job_id'] = $job_id;
        $sub_category = Job::whereId($job_id)->first();
        if ($sub_category) {
            $category_id = Category::find($sub_category->category_id)->sub_id;
            $jobs = Job::where('category_id', $category_id)->where('job_role', 1)->first();
            if (isset($jobs) && User::where('mainJob_id', $jobs->id)->first()) {
                $manager_id = User::where('mainJob_id', $jobs->id)->first();
                if(!isset($manager_id)){
                    $main = Category::find($category_id)->sub_id;
                    $jobs = Job::where('category_id', $main)->where('job_role', 1)->first();
                    $manager_id = User::where('mainJob_id', $jobs->id)->first();
                    if(!isset($manager_id)){
                        $main2 = Category::find($main)->sub_id;
                        $jobs = Job::where('category_id', $main2)->where('job_role', 1)->first();
                        $manager_id = User::where('mainJob_id', $jobs->id)->first();
                    }else{
                        return back()->with('error','لم يتم اضافة مدير لقسم الموارد البشريةاو للموظف  ');
                    }

                }
            } else {

                $category_id = Job::whereId(105)->first();
                $jobs = Job::where('category_id', $category_id->category_id)->where('job_role', 1)->first();
                $manager_id = User::where('mainJob_id', $jobs->id)->first();

            }
        } else {
            $category_id = Job::whereId(105)->first();
            $jobs = Job::where('category_id', $category_id->category_id)->where('job_role', 1)->first();
            if(isset($jobs)){
                $manager_id = User::where('mainJob_id', $jobs->id)->first();
            }else{
                return back()->with('error','لم يتم اضافة مدير لقسم الموارد البشرية ');
            }

        }
        $data['manager_id'] = $manager_id->id;

        $permission = AskPermission::create($data);


//        Notification::send($manager_id, new PermissionsNotifications($permission));

        return redirect(url('myrequests'))->with('message', 'Success');
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
        $permissionAsked = AskPermission::findOrFail($id);


        return view('Admin.AskPermission.permissionedit', compact('permissionAsked'));
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
        $data = $this->validate(\request(),
            [
                'permission_date' => '',
                'from' => '',
                'to' => '',
                'reason' => '',
                'description' => '',
                'request_date' => '',
                'status' => 'required',
                'user_id' => '',
                'manager_id' => '',
                'job_id' => ''

            ]);
        AskPermission::where('id', $id)->update($data);
        return back()->with('message', 'Success');
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

    public function  getHolidays(Request $request){
      $user =   User::find($request->id);
     $total =   AskPermission::where('user_id',$request->id)->where('status','accepted')->count();
     $setting = Setting::find(1);

     if($user->contract_duration == 1 ){
       $value=$setting->holiday_count_seasonal -$total ;
     }else{
         $value=$setting->holiday_count_yearly -$total ;

     }
        return response($value);
    }
}
