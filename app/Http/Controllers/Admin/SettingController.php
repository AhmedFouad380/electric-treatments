<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Setting;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    public function index(){

        $Setting = Setting::find(1);
        return view('Admin.Setting.index',compact('Setting'));

    }


    public function store(Request $request)
    {

        $this->validate(request(),[
            'ar_company_name' => 'required|string',
            'en_company_name' => 'required|string',
            'ministry_name' => 'required|string',
            'directorate_name' => 'required|string',
            'it_name' => 'required|string',
            'logo' => 'image|mimes:png,jpg,jpeg|max:2048',
            'seal' => 'image|mimes:png,jpg,jpeg|max:2048',
            'signature' => 'image|mimes:png,jpg,jpeg|max:2048',
        ]);

        $Setting=new Setting;
        $Setting->ar_company_name = $request->ar_company_name;
        $Setting->en_company_name = $request->en_company_name;
        $Setting->ministry_name=$request->ministry_name;
        $Setting->directorate_name=$request->directorate_name;
        $Setting->date_type=$request->date_type;
        $Setting->it_name=$request->it_name;

        if($file1=$request->file('logo')){
            $name='img' .time() . '.' .$file1->getClientOriginalExtension();
            $file1->move(public_path('Upload'), $name);
            $Setting->logo=$name;

        }

        if($file2=$request->file('seal')){
            $name='img' .time() . '.' .$file2->getClientOriginalExtension();
            $file2->move(public_path('Upload'), $name);
            $Setting->company_seal=$name;

        }

        if($file3=$request->file('signature')){
            $name='img' .time() . '.' .$file3->getClientOriginalExtension();
            $file3->move(public_path('Upload'), $name);
            $Setting->signature=$name;

        }

        try {
            $Setting->save();
        } catch (Exception $e) {
            return redirect('/Setting')->with('error_message', 'Failed');
        }
        return redirect()->back()->with('message', 'Success');
    }

    public function delete(Request $request)
    {
        try{
            Setting::whereIn('id',$request->id)->delete();
        } catch (\Exception $e) {
            return response()->json(['message'=>'Failed']);
        }
        return response()->json(['message'=>'Success']);
    }


    public function edit(Request $request)
    {
        $Setting=Setting::find($request->id);
        return view('Admin.Setting.model',compact('Setting'));
    }


    public function update(Request $request)
    {

        $this->validate(request(),[

        ]);


        $Setting= Setting::find($request->id);

        $Setting->ar_company_name = $request->ar_company_name;
        $Setting->en_company_name = $request->en_company_name;
        $Setting->ministry_name=$request->ministry_name;
        $Setting->directorate_name=$request->directorate_name;
        $Setting->date_type=$request->date_type;
        $Setting->it_name=$request->it_name;
        $Setting->holiday_count_yearly=$request->holiday_count_yearly;
        $Setting->holiday_count_seasonal=$request->holiday_count_seasonal;

        if($file1=$request->file('logo')){
            $name='img' .time() . '.' .$file1->getClientOriginalExtension();
            $file1->move('Upload', $name);
            $Setting->logo=$name;
        }

        if($file2=$request->file('seal')){
            $name='img' .time() . '.' .$file2->getClientOriginalExtension();
            $file2->move('Upload', $name);
            $Setting->company_seal=$name;
        }

        if($file3=$request->file('signature')){
            $name='img' .time() . '.' .$file3->getClientOriginalExtension();
            $file3->move('Upload', $name);
            $Setting->signature=$name;
        }

        try {
            $Setting->save();

        } catch (Exception $e) {
            return redirect('/users')->with('error_message', 'هناك خطأ ما فى عملية الاضافة');
        }
        return redirect()->back()->with('message', 'Success');
    }

    public function logout(){

        Auth::logout();

        return redirect('/login');
    }
}
