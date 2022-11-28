<?php

namespace App\Http\Controllers\Admin;

use App\EmpsShifts;
use App\Http\Controllers\Controller;
use App\Shift;
use App\User;
use Illuminate\Http\Request;

class EmpShiftController extends Controller
{
    public function getAllShifts(Request $request)
    {
        $emp = User::find($request->id);
        $old_shifts =EmpsShifts::where('emp_id',$request->id)->pluck('shift_id')->toArray();
        $shifts = Shift::all();


        return view('Admin.User.empshifts', compact('shifts', 'emp','old_shifts'));


    }

    public function setShifts(Request $request)
    {
        $emp = User::find($request->id);
        $data = $request->input('shifts');

        $empshifts = EmpsShifts::where('emp_id', $request->id);
        if ($empshifts != null) {
            $empshifts->delete();
        }
        if ($data != null) {
            foreach ($data as $data) {
                EmpsShifts::create(['emp_id' => $emp->id, 'shift_id' => $data]);

            }
        }
//            dd($data);
        return redirect()->back()->with('message', 'Success');


    }
}
