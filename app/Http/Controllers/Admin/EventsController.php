<?php

namespace App\Http\Controllers\Admin;

use App\Event;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
class EventsController extends Controller
{
    public function store(Request $request){
        if($request->date){

        $year =   \Carbon\Carbon::parse($request->from)->format('Y');
        if($year < 1900){
            $year =   \Carbon\Carbon::parse($request->from)->format('Y');
            $month =   \Carbon\Carbon::parse($request->from)->format('m');
            $day =   \Carbon\Carbon::parse($request->from)->format('d');
            $date = \GeniusTS\HijriDate\Hijri::convertToGregorian($day, $month, $year);
            $request->date = $date;
        }else{

            $date =   \Carbon\Carbon::parse($request->from)->format('Y-m-d');
            $request->date = $date;

        }
    }
        $data = new Event;
        $data->user_id=Auth::user()->id;
        $data->date=$date;
        $data->time=$request->time;
        $data->title=$request->title;
        $data->description=$request->description;
        $data->save();

        return redirect()->back()->with('message', 'Success');

    }
}
