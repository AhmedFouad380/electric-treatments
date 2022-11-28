<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\inboxProcessType;
use Yajra\DataTables\DataTables;


class InboxProcessTypeController extends Controller
{
    public function index()
    {

        $data = inboxProcessType::OrderBy('id', 'desc')->paginate(10);

        return view('Admin.inboxProcessType.index', compact('data'));

    }

    public function datatable(Request $request)
    {
        $data = inboxProcessType::orderBy('id', 'desc');
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
                $actions = ' <a href="' . url("/settings/Edit_InboxProcessType/" . $row->id) . '" class="btn btn-success"><i class="fa fa-pencil-alt"></i>  </a>';
                return $actions;
            })
            ->rawColumns(['actions', 'checkbox'])
            ->make();
    }

    public function Search(Request $request)
    {

        $data = inboxProcessType::OrderBy('id', 'desc')->where('ar_name', 'like', '%' . $request->search . '%')->orwhere('en_name', 'like', '%' . $request->search . '%')->paginate(50);
        return view('Admin.inboxProcessType.index', compact('data'));

    }

    public function store(Request $request)
    {

        $this->validate(request(), [
            'ar_name' => 'required|string',
            'en_name' => 'required',
        ]);

        $data = new inboxProcessType;
        $data->ar_name = $request->ar_name;
        $data->en_name = $request->en_name;

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
            inboxProcessType::whereIn('id', $request->id)->delete();
        } catch (\Exception $e) {
            return response()->json(['message' => 'Failed']);
        }
        return response()->json(['message' => 'Success']);
    }


    public function edit(Request $request)
    {
        $data = inboxProcessType::find($request->id);
        return view('Admin.inboxProcessType.model', compact('data'));
    }


    public function update(Request $request)
    {
        $this->validate(request(), [
            'ar_name' => 'required|string',
            'en_name' => 'required|string',
        ]);
        $data = inboxProcessType::find($request->id);
        $data->ar_name = $request->ar_name;
        $data->en_name = $request->en_name;
        try {
            $data->save();

        } catch (Exception $e) {
            return back()->with('error_message', 'هناك خطأ ما فى عملية الاضافة');
        }
        return redirect(url('settings/inboxProcessType'))->with('message', 'Success');
    }
}
