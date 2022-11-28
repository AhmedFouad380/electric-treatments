<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Log;
use App\User;
use Illuminate\Http\Request;
use Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index()
    {
        $Users = User::OrderBy('id', 'desc')->get();
        return view('Admin.User.index', compact('Users'));

    }

  public function admin_index()
    {
        $data = User::
        selectRaw('year(start_job_date) year, count(id) data')
            ->groupBy('year')
            ->orderBy('year')
            ->get();
        return view('Admin.index',compact('data'));

    }

    public function changeDate()
    {
        $data = User::orderBy('id', 'desc')->get();
        foreach ($data as $User) {
            $Year = \Carbon\Carbon::parse($User->start_contract_date)->format('Y');
            $month = \Carbon\Carbon::parse($User->start_contract_date)->format('m');
            $day = \Carbon\Carbon::parse($User->start_contract_date)->format('d');
            $explode = explode('-', $User->start_contract_date);

            $date = $Year . '-' . $month . '-' . $day;
            $User->start_contract_date = $date;
            $User->save();
        }

    }

    public function getUsersWhereDate($date)
    {
        $Users = User::OrderBy('id', 'desc')->whereYear('start_job_date', '=', $date)->get();
        return view('Admin.User.index', compact('Users'));

    }

    public function getUsersWhereType($id)
    {
        if ($id == 1) {
            $Users = User::where('country_id', '=', 1)->where('type', 1)->get();

        } else if ($id == 2) {
            $Users = User::where('country_id', '=', 1)->where('type', 2)->get();

        } else if ($id == 3) {
            $Users = User::where('country_id', '!=', 1)->where('type', 1)->get();

        } else if ($id == 4) {
            $Users = User::where('country_id', '!=', 1)->where('type', 2)->get();
        }
        return view('Admin.User.index', compact('Users'));

    }

    public function Search_User(Request $request)
    {

        $query = User::OrderBy('id', 'desc');
        if ($request->name != null) {
            $query->where('name', 'like', '%' . $request->name . '%');
        }
        if ($request->job_num != null) {
            $query->where('job_num', $request->job_num);
        }
        if ($request->type != 0) {
            $query->where('type', $request->type);
        }
        if ($request->phone != null) {
            $query->where('phone', $request->phone);
        }
        if ($request->mainJob_id != 0) {
            $query->where('mainJob_id', $request->mainJob_id);
        }
        if ($request->category_id != 0) {
            $query->where('category_id', $request->category_id);
        }
        $Users = $query->get();
        return view('Admin.User.index', compact('Users'));

    }

    public function Profile()
    {
        $User = User::find(Auth::user()->id);
        return view('Admin.User.profile', compact('User'));

    }

    public function view($id)
    {
        $User = User::find($id);
        return view('Admin.User.view', compact('User'));

    }

    public function store(Request $request)
    {

        $this->validate(request(), [
            'name' => 'required|string',
            'email' => 'string|email|unique:users',
            'phone' => 'required|string|unique:users',
            'job_num' => 'required|string|unique:users',
            'contract_num' => 'required|unique:users',

        ]);
        if ($request->start_job_date) {
            $year = \Carbon\Carbon::parse($request->start_job_date)->format('Y');
            if ($year < 1900) {
                $year = \Carbon\Carbon::parse($request->start_job_date)->format('Y');
                $month = \Carbon\Carbon::parse($request->start_job_date)->format('m');
                $day = \Carbon\Carbon::parse($request->start_job_date)->format('d');
                $date = \GeniusTS\HijriDate\Hijri::convertToGregorian($day, $month, $year);
                $request->start_job_date = $date;
            } else {

                $to_date = \Carbon\Carbon::parse($request->start_job_date)->format('Y-m-d');
                $request->start_job_date = $to_date;

            }
        }

        if ($request->end_contract_date) {
            $year = \Carbon\Carbon::parse($request->end_contract_date)->format('Y');
            if ($year < 1900) {
                $year = \Carbon\Carbon::parse($request->end_contract_date)->format('Y');
                $month = \Carbon\Carbon::parse($request->end_contract_date)->format('m');
                $day = \Carbon\Carbon::parse($request->end_contract_date)->format('d');
                $date = \GeniusTS\HijriDate\Hijri::convertToGregorian($day, $month, $year);
                $request->end_contract_date = $date;
            } else {

                $to_date = \Carbon\Carbon::parse($request->end_contract_date)->format('Y-m-d');
                $request->end_contract_date = $to_date;

            }
        }
        if ($request->start_contract_date) {
            $year = \Carbon\Carbon::parse($request->start_contract_date)->format('Y');
            if ($year < 1900) {
                $year = \Carbon\Carbon::parse($request->start_contract_date)->format('Y');
                $month = \Carbon\Carbon::parse($request->start_contract_date)->format('m');
                $day = \Carbon\Carbon::parse($request->start_contract_date)->format('d');
                $date = \GeniusTS\HijriDate\Hijri::convertToGregorian($day, $month, $year);
                $request->start_contract_date = $date;
            } else {

                $to_date = \Carbon\Carbon::parse($request->start_contract_date)->format('Y-m-d');
                $request->start_contract_date = $to_date;

            }
        }
        $User = new User;
        $User->name = $request->name;
        $User->en_name = $request->en_name;
        $User->phone = $request->phone;
        $User->email = $request->email;
        $User->password = Hash::make($request->password);
        $User->role = 1;
        $User->national_id = $request->national_id;
        $User->date_national_id = $request->date_national_id;
        $User->passport_id = $request->passport_id;
        $User->date_passport_id = $request->date_passport_id;
        $User->country_id = $request->country_id;
        $User->converted_num = $request->converted_num;
        $User->birth_date = $request->birth_date;
        $User->address = $request->address;
        $User->type = $request->type;
        $User->religion = $request->religion;
        $User->relationship = $request->relationship;
        $User->job_num = $request->job_num;
        $User->start_job_date = $request->start_job_date;
        $User->mainJob_id = $request->mainJob_id;
        $User->subJob_id = $request->subJob_id;
        $User->management = $request->management;
        $User->bank_id = $request->bank_id;
        $User->ipan = $request->ipan;
        $User->jobLevel = $request->jobLevel;
        $User->jobPercent = $request->jobPercent;
        $User->badalat = $request->badalat;
        $User->category_id = $request->category_id;
        $User->insurance_id = $request->insurance_id;
        $User->comp_insurance_percent = $request->comp_insurance_percent;
        $User->emp_insurance_percent = $request->emp_insurance_percent;
        $User->contract_num = $request->contract_num;
        $User->start_contract_date = $request->start_contract_date;
        $User->decision_point = $request->decision_point;
        $User->end_contract_date = $request->end_contract_date;
        $User->isActive = 1;
        $User->bonuses_id = $request->bonuses_id;
        $User->fpuid = $request->fpuid;
        $User->public_cost = $request->public_cost;
        $User->contract_duration = $request->contract_duration;


        if ($file = $request->file('img')) {
            $name = time() . '.' . $file->getClientOriginalName();
            $file->move('Upload/User', $name);
            $User->img = $name;

        }
        try {
            $User->save();
        } catch (Exception $e) {
            return redirect('/users')->with('error_message', 'Failed');
        }
        return redirect()->back()->with('message', 'Success');
    }

    public function delete(Request $request)
    {
        try {
            User::whereIn('id', $request->id)->delete();
        } catch (\Exception $e) {
            return response()->json(['message' => 'Failed']);
        }
        return response()->json(['message' => 'Success']);
    }


    public function edit(Request $request)
    {
        $User = User::find($request->id);
        return view('Admin.User.model', compact('User'));
    }

    public function Edit_User_notation(Request $request)
    {
        $User = User::find($request->id);
        return view('Admin.User.NotationModel', compact('User'));
    }

    public function update(Request $request)
    {

        $this->validate(request(), [
            'name' => 'required|string',
            'email' => 'string|email',
            'phone' => 'required|string',
        ]);


        if (User::where('phone', $request->phone)->where('id', '!=', $request->id)->count() > 0) {
            return back()->with('message', 'phone');

        }
        if (User::where('email', $request->email)->where('id', '!=', $request->id)->count() > 0) {
            return back()->with('message', 'email');

        }
        if (User::where('contract_num', $request->contract_num)->where('id', '!=', $request->id)->count() > 0) {
            return back()->with('message', 'contract_num');

        }
        if (User::where('job_num', $request->job_num)->where('id', '!=', $request->id)->count() > 0) {
            return back()->with('message', 'job_num');

        }
        if (User::where('fpuid', $request->fpuid)->where('id', '!=', $request->id)->count() > 0) {
            return back()->with('message', 'fpuid');

        }
        if ($request->start_job_date) {
            $year = \Carbon\Carbon::parse($request->start_job_date)->format('Y');
            if ($year < 1900) {
                $year = \Carbon\Carbon::parse($request->start_job_date)->format('Y');
                $month = \Carbon\Carbon::parse($request->start_job_date)->format('m');
                $day = \Carbon\Carbon::parse($request->start_job_date)->format('d');
                $date = \GeniusTS\HijriDate\Hijri::convertToGregorian($day, $month, $year);
                $request->start_job_date = $date;
            } else {

                $to_date = \Carbon\Carbon::parse($request->start_job_date)->format('Y-m-d');
                $request->start_job_date = $to_date;

            }
        }

        if ($request->end_contract_date) {
            $year = \Carbon\Carbon::parse($request->end_contract_date)->format('Y');
            if ($year < 1900) {
                $year = \Carbon\Carbon::parse($request->end_contract_date)->format('Y');
                $month = \Carbon\Carbon::parse($request->end_contract_date)->format('m');
                $day = \Carbon\Carbon::parse($request->end_contract_date)->format('d');
                $date = \GeniusTS\HijriDate\Hijri::convertToGregorian($day, $month, $year);
                $request->end_contract_date = $date;
            } else {

                $to_date = \Carbon\Carbon::parse($request->end_contract_date)->format('Y-m-d');
                $request->end_contract_date = $to_date;

            }
        }
        if ($request->start_contract_date) {
            $year = \Carbon\Carbon::parse($request->start_contract_date)->format('Y');
            if ($year < 1900) {
                $year = \Carbon\Carbon::parse($request->start_contract_date)->format('Y');
                $month = \Carbon\Carbon::parse($request->start_contract_date)->format('m');
                $day = \Carbon\Carbon::parse($request->start_contract_date)->format('d');
                $date = \GeniusTS\HijriDate\Hijri::convertToGregorian($day, $month, $year);
                $request->start_contract_date = $date;
            } else {

                $to_date = \Carbon\Carbon::parse($request->start_contract_date)->format('Y-m-d');
                $request->start_contract_date = $to_date;

            }
        }
        $User = User::find($request->id);
        $User->name = $request->name;
        $User->en_name = $request->en_name;
        $User->phone = $request->phone;
        $User->email = $request->email;
        if ($request->password) {
            $User->password = Hash::make($request->password);
        }

//        $User->role=$request->role;
        $User->national_id = $request->national_id;
        $User->date_national_id = $request->date_national_id;
        $User->passport_id = $request->passport_id;
        $User->date_passport_id = $request->date_passport_id;
        $User->country_id = $request->country_id;
        $User->converted_num = $request->converted_num;
        $User->birth_date = $request->birth_date;
        $User->address = $request->address;
        $User->type = $request->type;
        $User->religion = $request->religion;
        $User->relationship = $request->relationship;
        $User->job_num = $request->job_num;
        $User->start_job_date = $request->start_job_date;
        $User->mainJob_id = $request->mainJob_id;
        $User->subJob_id = $request->subJob_id;
        $User->management = $request->management;
        $User->bank_id = $request->bank_id;
        $User->ipan = $request->ipan;
        $User->jobLevel = $request->jobLevel;
        $User->jobPercent = $request->jobPercent;
        $User->badalat = $request->badalat;
        $User->category_id = $request->category_id;
        $User->insurance_id = $request->insurance_id;
        $User->comp_insurance_percent = $request->comp_insurance_percent;
        $User->emp_insurance_percent = $request->emp_insurance_percent;
        $User->contract_num = $request->contract_num;
        $User->start_contract_date = $request->start_contract_date;
        $User->decision_point = $request->decision_point;
        $User->end_contract_date = $request->end_contract_date;
        $User->public_cost = $request->public_cost;
        $User->contract_duration = $request->contract_duration;

        $User->bonuses_id = $request->bonuses_id;
//        رقم الموظف فى جهاز البصمة
        $User->fpuid = $request->fpuid;

        if ($file = $request->file('img')) {
            $name = time() . '.' . $file->getClientOriginalName();
            $file->move('Upload/User', $name);
            $User->img = $name;

        }
        $User->save();


        try {

        } catch (\Exception $e) {
            return back()->with('message', 'Failed');
        }
        return redirect()->back()->with('message', 'Success');
    }

    public function Update_User_Notation(Request $request)
    {

        $User = User::find($request->id);
        if ($file = $request->file('signature_img')) {
            $name = time() . '.' . $file->getClientOriginalName();
            $file->move('Upload/UserFiles', $name);
            $User->signature_img = $name;

        }
        if ($file = $request->file('notation_img')) {
            $name = time() . '.' . $file->getClientOriginalName();
            $file->move('Upload/UserFiles', $name);
            $User->notation_img = $name;

        }
        try {
            $User->save();

        } catch (Exception $e) {
            return back()->with('message', 'Failed');
        }
        return redirect()->back()->with('message', 'Success');
    }

    public function logout()
    {

        Auth::logout();

        return redirect('/login');
    }

    public function Update_Profile(Request $request)
    {

        $this->validate(request(), [

        ]);


        $User = User::find($request->id);
        $User->name = $request->name;
        $User->en_name = $request->en_name;
        $User->phone = $request->phone;
        $User->fpuid = $request->fpuid;

        if ($request->password) {
            $User->password = Hash::make($request->password);
        }
        if ($file = $request->file('img')) {
            $name = time() . '.' . $file->getClientOriginalName();
            $file->move('Upload/User', $name);
            $User->img = $name;

        }


        try {
            $User->save();

        } catch (\Exception $e) {
            return back()->with('error_message', 'هناك خطأ ما فى عملية الاضافة');
        }
        return redirect()->back()->with('message', 'Success');
    }

    public function UpdateStatusUser(Request $request)
    {
        $User = User::find($request->id);
        if ($User->isActive == 1) {
            $User->isActive = 0;
        } else {
            $User->isActive = 1;

        }
        $User->save();
        return response($User);

    }

    public function UserUpdateContractDate(Request $request)
    {

        $User = User::find($request->id);
        $User->contract_status = $request->contract_status;
        if ($request->type == 1) {
            $User->end_contract_date = \Carbon\Carbon::parse($request->end_contract_date)->addYear(1);
        } else {
            $User->end_contract_date = \Carbon\Carbon::parse($request->end_contract_date)->addYear(2);
        }
        $User->save();

        return redirect()->back()->with('message', 'Success');
    }

    public function login(Request $request)
    {

        $this->validate(request(), [
            'national_id' => 'required|string',
            'password' => 'required',
        ]);

        if (Auth::attempt(['national_id' => $request->national_id, 'password' => $request->password, 'isActive' => 1])) {
            $data = new Log;
            $data->ip_address = \Request::ip();
            $data->description = 'قام المستخدم ' . $request->email . 'بتسجيل الدخول في يوم ' . date('Y-m-d') . '  ' . time();
            $data->user_id = Auth::user()->id;
            $data->save();
            return redirect('/');
        } else {
            $data = new Log;
            $data->ip_address = \Request::ip();
            $data->description = 'قام  بمحاولة تسجيل فاشلة للمستخدم ' . $request->email . ' في يوم ' . date('Y-m-d') . '  ' . time();
            $data->user_id = null;
            $data->save();
            return redirect()->back()->with('message', 'Failed');


        }
    }

    public function changePass()
    {
        $Users = User::all();
        foreach ($Users as $User) {
            $data = User::find($User->id);
            $data->password = Hash::make('123456');
            $data->save();
        }
        print_r('ss');
        die();

    }
}
