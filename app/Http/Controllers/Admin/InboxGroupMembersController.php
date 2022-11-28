<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\InboxGroupMembers;
use Yajra\DataTables\DataTables;

class InboxGroupMembersController extends Controller
{
    public function index($id)
    {

        $data = InboxGroupMembers::where('group_id', $id)->OrderBy('id', 'desc')->paginate(10);

        return view('Admin.InboxGroupMembers.index', compact('data', 'id'));

    }

    public function datatable(Request $request, $id)
    {
        $data = InboxGroupMembers::with('user')->where('group_id', $id)->orderBy('id', 'desc');
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
            ->editColumn('user_name', function (InboxGroupMembers $inbox_group_members) {
                return $inbox_group_members->user->name ?? '';
            })
            ->addColumn('actions', function ($row) {
                $actions = ' <a href="' . url("/settings/Edit_InboxGroupMembers/" . $row->id) . '" class="btn btn-success"><i class="fa fa-pencil-alt"></i>  </a>';
                return $actions;
            })
            ->rawColumns(['user_name', 'actions', 'checkbox'])
            ->make();
    }

    public function store(Request $request)
    {

        $this->validate(request(), [
            'group_id' => 'required',
            'user_id' => 'required',
        ]);

        $data = new InboxGroupMembers;
        $data->user_id = $request->user_id;
        $data->group_id = $request->group_id;

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
            InboxGroupMembers::whereIn('id', $request->id)->delete();
        } catch (\Exception $e) {
            return response()->json(['message' => 'Failed']);
        }
        return response()->json(['message' => 'Success']);
    }


    public function edit(Request $request)
    {
        $data = InboxGroupMembers::find($request->id);
        return view('Admin.InboxGroupMembers.model', compact('data'));
    }


    public function update(Request $request)
    {

        $this->validate(request(), [
            'group_id' => 'required|string',
            'user_id' => 'required|string',
        ]);
        $data = InboxGroupMembers::find($request->id);
        $data->user_id = $request->user_id;
        $data->group_id = $request->group_id;

        try {
            $data->save();

        } catch (Exception $e) {
            return back()->with('error_message', 'هناك خطأ ما فى عملية الاضافة');
        }
        return redirect(url('settings/InboxGroupMembers/' . $request->group_id))->with('message', 'Success');
    }
}
