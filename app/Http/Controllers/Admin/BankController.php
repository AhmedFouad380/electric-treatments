<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Bank;
use Yajra\DataTables\DataTables;

class BankController extends Controller
{
    public function index(){
        $Banks = Bank::OrderBy('id','desc')->paginate(10);
        return view('Admin.Bank.index',compact('Banks'));
    }

    public function datatable(Request $request)
    {
        $data = Bank::orderBy('id', 'desc');
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
                $actions = ' <a href="' . url("Edit_Banks/" . $row->id) . '" class="btn btn-success"><i class="fa fa-pencil-alt"></i>  </a>';
                return $actions;
            })
            ->rawColumns(['actions', 'checkbox' ])
            ->make();
    }

    public function Search(Request $request){

        $Banks = Bank::OrderBy('id','desc')->where('name','like','%'.$request->search.'%')->paginate(50);
        return view('Admin.Bank.index',compact('Banks'));

    }
    public function store(Request $request)
    {

        $this->validate(request(),[
            'name' => 'required|string',
        ]);

        $data=new Bank;
        $data->name=$request->name;

        try {
            $data->save();
        } catch (Exception $e) {
            return redirect('/users')->with('error_message', 'Failed');
        }

        $this->LogStore('اضافة بنك جديد');

        return redirect()->back()->with('message', 'Success');
    }

    public function delete(Request $request)
    {
        try{
            Bank::whereIn('id',$request->id)->delete();
        } catch (\Exception $e) {
            return response()->json(['message'=>'Failed']);
        }
        return response()->json(['message'=>'Success']);
    }


    public function edit(Request $request)
    {
        $Bank=Bank::find($request->id);
        return view('Admin.Bank.model',compact('Bank'));
    }


    public function update(Request $request)
    {

        $this->validate(request(),[
            'name' => 'required|string',

        ]);
        $data= Bank::find($request->id);
        $data->name=$request->name;

        try {
            $data->save();

        } catch (Exception $e) {
            return redirect('/users')->with('error_message', 'هناك خطأ ما فى عملية الاضافة');
        }
        return redirect(url('settings/Banks'))->with('message', 'Success');
    }
}
