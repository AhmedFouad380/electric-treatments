<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Job;
use App\User;
class JobController extends Controller
{
    public function index(){

        $Job = Job::OrderBy('id','desc')->paginate(10);
        return view('Admin.Job.index',compact('Job'));

    }
    public function Search_Job(Request $request){

        $query = Job::OrderBy('id','desc');
        if($request->name != null ){
            $query->where('name','like','%'.$request->name.'%');
        }
        if($request->job_num != null ){
            $query->where('job_num',$request->job_num);
        }
        if($request->category_id != 0 ){
            $query->where('category_id',$request->category_id);
        }
       $Job = $query->paginate(50);
        return view('Admin.Job.index',compact('Job'));

    }

    public function store(Request $request)
    {

        $this->validate(request(),[
            'name' => 'required|string',
            'category_id' => 'required',
        ]);

        $data=new Job;
        $data->name=$request->name;
        $data->job_num =$request->job_num ;
        $data->job_description=$request->job_description;
        $data->category_id=$request->category_id;
        $data->job_type=$request->job_type;
        $data->job_degree=$request->job_degree;
        $data->job_role=$request->job_role;

        try {
            $data->save();
        } catch (Exception $e) {
            return redirect('/users')->with('error_message', 'Failed');
        }
        return redirect()->back()->with('message', 'Success');
    }

    public function delete(Request $request)
    {
        if(User::whereIn('mainJob_id',$request->id)->count() > 0 || User::whereIn('mainJob_id',$request->id)->count() > 0  ){
            return response()->json(['message'=>'Failed']);
            die();
        }
        try{
            Job::whereIn('id',$request->id)->delete();
        } catch (\Exception $e) {
            return response()->json(['message'=>'Failed']);
        }
        return response()->json(['message'=>'Success']);
    }


    public function edit(Request $request)
    {
        $Job=Job::find($request->id);
        return view('Admin.Job.model',compact('Job'));
    }


    public function update(Request $request)
    {

        $this->validate(request(),[
            'name' => 'required|string',

        ]);
        $data= Job::find($request->id);
        $data->name=$request->name;
        $data->job_num =$request->job_num ;
        $data->job_description=$request->job_description;
        $data->category_id=$request->category_id;
        $data->job_type=$request->job_type;
        $data->job_degree=$request->job_degree;
        $data->job_role=$request->job_role;

         try {
            $data->save();

        } catch (Exception $e) {
            return redirect('/users')->with('error_message', 'هناك خطأ ما فى عملية الاضافة');
        }
        return redirect()->back()->with('message', 'Success');
    }
}
