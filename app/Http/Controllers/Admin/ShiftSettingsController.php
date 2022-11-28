<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Shift;
use App\Shiftsetting;
use Illuminate\Http\Request;

class  ShiftSettingsController extends Controller
{
    public function viewShiftSettings($id)
    {

        $shiftSettings = Shiftsetting::where('shift_id', $id)->get();
        $shiftName = Shift::where('id',$id)->first();

        return view('Admin.shiftsettings.index', compact('shiftSettings','shiftName'));

    }

    public function edit(Request $request)
    {
        $shiftsetting = Shiftsetting::findOrFail($request->id);
        $shift_id = $shiftsetting->shift_id;
        //dd($shift_id);
        $shiftName = Shift::where('id',$shift_id)->first();
        return view('Admin.shiftsettings.model', compact('shiftsetting','shiftName'));


    }

    public function update(Request $request)
    {

        $data=$this->validate(\request(),
            [
                //|date_format:H:i|after:time_attendance
                'time_attendance'=>'required',
                'start_attendance'=>'required',
                'end_attendance'=>'required',
                'time_leave'=>'required',
                'start_leave'=>'required',
                'end_leave'=>'required',
                'vacation'=>'required|in:yes,no',
                'nextday'=>'required|in:yes,no',

            ]);


        $addAll =  $request->addAll;



        if($addAll == 'no') {


            Shiftsetting::where('id', $request->id)->update($data);
            $shiftsetting = Shiftsetting::where('id', $request->id)->first();



            return redirect()->back()->with('message', 'Success');
        }
        else{
            Shiftsetting::where('id', $request->id)->first();
            $shiftsetting = Shiftsetting::where('id', $request->id)->first();
            $shift_id = $shiftsetting->shift_id;
            $shift_days = Shiftsetting::where('shift_id',$shift_id)->update($data);



            return redirect()->back()->with('message', 'Success');
//
//            session()->flash('msg', trans('admin.updatedsuccess'));
//            return redirect(url('shiftsettings/' . $shiftsetting->shift_id));
        }

    }
}
