<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\InboxGroupMembers;
use Illuminate\Http\Request;
use App\InboxGroup;
use App\User;
use Auth;
use Yajra\DataTables\DataTables;

class InboxGroupController extends Controller
{
    public function index(){

        $data = InboxGroup::OrderBy('id','desc')->paginate(10);

        return view('Admin.InboxGroup.index',compact('data'));

    }

    public function datatable(Request $request)
    {
        $data = InboxGroup::orderBy('id', 'desc');
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
            ->addColumn('members', function ($row) {
                $actions = '<a href="' . url("/settings/InboxGroupMembers/" . $row->id) . '" class="btn btn-icon btn-primary btn-sm btn-clean btn-icon btn-icon-md " title="View">
                                        <i class="flaticon-users icon-nm"></i>
                                    </a>';
                return $actions;
            })
            ->addColumn('actions', function ($row) {
                $actions = ' <a href="' . url("/settings/Edit_InboxGroup/" . $row->id) . '" class="btn btn-success"><i class="fa fa-pencil-alt"></i>  </a>';
                return $actions;
            })
            ->rawColumns(['members','actions', 'checkbox'])
            ->make();
    }
    public function Search(Request $request){

        $data = InboxGroup::where('name','like','%'.$request->search.'%')->paginate(50);
        return view('Admin.InboxGroup.index',compact('data'));

    }

    public function store(Request $request)
    {

        $this->validate(request(),[
            'name' => 'required|string',
        ]);

        $data=new InboxGroup;
        $data->name=$request->name;

        try {
            $data->save();
        } catch (Exception $e) {
            return redirect('/users')->with('error_message', 'Failed');
        }

        return redirect()->back()->with('message', 'Success');
    }

    public function delete(Request $request)
    {
        try{
            InboxGroup::whereIn('id',$request->id)->delete();
        } catch (\Exception $e) {
            return response()->json(['message'=>'Failed']);
        }
        return response()->json(['message'=>'Success']);
    }


    public function edit(Request $request)
    {
        $data =InboxGroup::find($request->id);
        return view('Admin.InboxGroup.model',compact('data'));
    }


    public function update(Request $request)
    {

        $this->validate(request(),[
            'name' => 'required|string',

        ]);
        $data= InboxGroup::find($request->id);
        $data->name=$request->name;

        try {
            $data->save();

        } catch (Exception $e) {
            return back()->with('error_message', 'هناك خطأ ما فى عملية الاضافة');
        }
        return redirect(url('settings/InboxGroup'))->with('message', 'Success');
    }

    public function Edit_UserinboxGroup(Request $request)
    {
        $user = User::find($request->id);
        return view('Admin.InboxGroup.Edit_UserinboxGroup',compact('user'));
    }

    public function  Update_UserinboxGroup(Request $request){

        $data = User::find($request->id);
        if($request->groups_id){
            $implode = implode(',',$request->groups_id);
            $data->groups_id=$implode;
        }
        $data->save();

        return redirect()->back()->with('message', 'Success');

    }

    public function GetMemebers(Request $request){

        if($request->id == 0 ){
            $User = User::find(Auth::user()->id);
            $data = User::where('category_id',$User->category_id)->get();
        }else{
            $users_id = InboxGroupMembers::where('group_id',$request->id)->pluck('user_id');
            $data = User::whereIn('id',$users_id)->select('id','name','mainJob_id')->get();
        }
        return view('Admin.inbox.members',compact('data'));

    }

    public function GetMemebers2(Request $request){

        if($request->id == 0 ){
            $User = User::find(Auth::user()->id);
            $data = User::where('category_id',$User->category_id)->get();
        }else{
            $users_id = InboxGroupMembers::where('group_id',$request->id)->pluck('user_id');
            $data = User::whereIn('id',$users_id)->get();
        }
        return view('Admin.inbox.members2',compact('data'));

    }

 public function GetMemebers21(Request $request){

        if($request->id == 0 ){
            $User = User::find(Auth::user()->id);
            $data = User::where('category_id',$User->category_id)->get();
        }else{
            $users_id = InboxGroupMembers::where('group_id',$request->id)->pluck('user_id');
            $data = User::whereIn('id',$users_id)->get();
        }
        return view('Admin.inbox.members3',compact('data'));

    }
    public function GetDefaultMemebers(Request $request){

        $User = User::find(Auth::user()->id);
        $data = User::where('category_id',$User->category_id)->get();
        return view('Admin.inbox.members',compact('data'));

    }

    public function GetDefaultMemebers2(Request $request){
        $User = User::find(Auth::user()->id);
        $data = User::where('category_id',$User->category_id)->get();
        return view('Admin.inbox.members2',compact('data'));

    }

}
