<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\UserRole;
use App\User;
use Yajra\DataTables\DataTables;

class   UserRolesController extends Controller
{
    public function index(){


    return view('Admin.UserRole.index');

}


    public function datatable(Request $request)
    {
        $data = UserRole::orderBy('id', 'desc');

        return DataTables::of($data)
            ->addColumn('checkbox', function ($row) {
                $checkbox = '';
                $checkbox .= '  <label class="checkbox checkbox-single">
                                        <input type="checkbox" value="'.$row->id.'" class="checkable" name="check_delete[]"/>
                                        <span></span>
                                    </label>
                                ';
                return $checkbox;
            })

            ->addColumn('actions', function ($row) {
                $actions = ' <a href="' . url("Edit_UserRole/" . $row->id) . '" class="btn btn-success"><i class="fa fa-pencil-alt"></i>  </a>';
                return $actions;

            })


            ->rawColumns(['actions', 'checkbox' ])
            ->make();

    }

    public function store(Request $request)
{

    $this->validate(request(),[
        'name' => 'required|string',
    ]);

    $data=new UserRole;

    $data->name=$request->name;
    $data->transactions=$request->transactions;
    if($request->transactions){
    $data->transactions_Inbox=$request->transactions_Inbox;
    $data->transactions_OutBox=$request->transactions_OutBox;
    $data->transactions_create_in=$request->transactions_create_in;
    $data->transactions_create_out=$request->transactions_create_out;
    $data->transactions_report=$request->transactions_report;
    $data->transactions_archive=$request->transactions_archive;
    $data->transactions_archive_out=$request->transactions_archive_out;
    $data->transactions_search=$request->transactions_search;
    $data->transactions_advancedsearch=$request->transactions_advancedsearch;
    }
    if($request->resources){
    $data->resources=$request->resources;
    $data->resources_category=$request->resources_category;
    $data->resources_jobs=$request->resources_jobs;
    $data->resources_users=$request->resources_users;
    }
    if($request->settings){
    $data->settings=$request->settings;
    $data->settings_categoryUnits=$request->settings_categoryUnits;
    $data->settings_jopType=$request->settings_jopType;
    $data->settings_banks=$request->settings_banks;
    $data->settings_nationality=$request->settings_nationality;
    $data->settings_attachmentCategory=$request->settings_attachmentCategory;
    $data->settings_inboxProcessType=$request->settings_inboxProcessType;
    $data->settings_inboxType=$request->settings_inboxType;
    $data->settings_InboxGroup=$request->settings_InboxGroup;
    }
    if($request->copanel){
    $data->copanel=$request->copanel;
    $data->copanel_roles=$request->copanel_roles;
    $data->copanel_setting=$request->copanel_setting;
    $data->copanel_logs=$request->copanel_logs;
    }
    try {
        $data->save();
    } catch (Exception $e) {
        return redirect('/users')->with('error_message', 'Failed');
    }

    return redirect()->back()->with('message', 'Success');
}

    public function delete(Request $request)
{
      if(User::whereIn('role',$request->id)->count() > 0  ){
            return response()->json(['message'=>'Failed']);
            die();
        }
    try{
        UserRole::whereIn('id',$request->id)->delete();
    } catch (\Exception $e) {
        return response()->json(['message'=>'Failed']);
    }
    return response()->json(['message'=>'Success']);
}


    public function edit($id)
{
    $data =UserRole::find($id);
    return view('Admin.UserRole.model',compact('data'));
}


    public function update(Request $request)
{

    $this->validate(request(),[
        'name' => 'required|string',

    ]);
    $data= UserRole::find($request->id);

    $data->name=$request->name;
    $data->transactions=$request->transactions;
    if($request->transactions){
        $data->transactions_Inbox=$request->transactions_Inbox;
        $data->transactions_OutBox=$request->transactions_OutBox;
        $data->transactions_create_in=$request->transactions_create_in;
        $data->transactions_create_out=$request->transactions_create_out;
        $data->transactions_report=$request->transactions_report;
        $data->transactions_archive=$request->transactions_archive;
        $data->transactions_archive_out=$request->transactions_archive_out;
        $data->transactions_search=$request->transactions_search;
        $data->transactions_advancedsearch=$request->transactions_advancedsearch;
    }
    if($request->resources){
        $data->resources=$request->resources;
        $data->resources_category=$request->resources_category;
        $data->resources_jobs=$request->resources_jobs;
        $data->resources_users=$request->resources_users;

        $data->bounses=$request->bounses;
        $data->system_vacations=$request->system_vacations;
        $data->shifts=$request->shifts;
        $data->reports=$request->reports;


    }
    if($request->settings){
        $data->settings=$request->settings;
        $data->settings_categoryUnits=$request->settings_categoryUnits;
        $data->settings_jopType=$request->settings_jopType;
        $data->settings_banks=$request->settings_banks;
        $data->settings_nationality=$request->settings_nationality;
        $data->settings_attachmentCategory=$request->settings_attachmentCategory;
        $data->settings_inboxProcessType=$request->settings_inboxProcessType;
        $data->settings_inboxType=$request->settings_inboxType;
        $data->settings_InboxGroup=$request->settings_InboxGroup;
    }
    if($request->copanel){
        $data->copanel=$request->copanel;
        $data->copanel_roles=$request->copanel_roles;
        $data->copanel_setting=$request->copanel_setting;
        $data->copanel_logs=$request->copanel_logs;
    }
    try {
        $data->save();

    } catch (\Exception $e) {
        return back()->with('error_message', 'هناك خطأ ما فى عملية الاضافة');
    }
    return redirect('copanel/UserRole')->with('message', 'Success');
}
    //
}
