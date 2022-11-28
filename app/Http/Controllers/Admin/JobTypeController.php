<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\JobType;
use Yajra\DataTables\DataTables;

class JobTypeController extends Controller
{
    public function index()
    {
        $JobType = JobType::OrderBy('id', 'desc')->paginate(10);
        return view('Admin.JobType.index', compact('JobType'));
    }

    public function datatable(Request $request)
    {
        $data = JobType::orderBy('id', 'desc');
        return DataTables::of($data)
            ->addColumn('checkbox', function ($row) {
                $checkbox = '';
                $checkbox .= '  <label class="checkbox checkbox-single">
                                        <input type="checkbox" value="' . $row->id . '" class="checkable" name="check_delete[]"/>
                                        <span></span>
                                    </label>
                                ';
                return $checkbox;
            })
            ->addColumn('actions', function ($row) {
                $actions = ' <a href="' . url("Edit_JobType/" . $row->id) . '" class="btn btn-success"><i class="fa fa-pencil-alt"></i>  </a>';
                return $actions;

            })
            ->rawColumns(['actions', 'checkbox'])
            ->make();

    }

    public function Search(Request $request)
    {

        $JobType = JobType::where('name', 'like', '%' . $request->search . '%')->paginate(50);
        return view('Admin.JobType.index', compact('JobType'));

    }

    public function store(Request $request)
    {

        $this->validate(request(), [
            'name' => 'required|string',
            'flag' => 'string',
        ]);

        $data = new JobType;
        $data->name = $request->name;
        $data->flag = $request->flag;
        try {
            $data->save();
        } catch (Exception $e) {
            return redirect('/users')->with('error_message', 'Failed');
        }
        return redirect()->back()->with('message', 'Success');
    }

    public function delete(Request $request)
    {
        try {
            JobType::whereIn('id', $request->id)->delete();
        } catch (\Exception $e) {
            return response()->json(['message' => 'Failed']);
        }
        return response()->json(['message' => 'Success']);
    }


    public function edit(Request $request)
    {
        $JobType = JobType::find($request->id);
        return view('Admin.JobType.model', compact('JobType'));
    }


    public function update(Request $request)
    {
        $this->validate(request(), [
            'name' => 'required|string',

        ]);
        $data = JobType::find($request->id);
        $data->name = $request->name;
        $data->flag = $request->flag;
        try {
            $data->save();

        } catch (Exception $e) {
            return redirect('/users')->with('error_message', 'هناك خطأ ما فى عملية الاضافة');
        }
        return redirect(url('settings/JobType'))->with('message', 'Success');
    }
}
