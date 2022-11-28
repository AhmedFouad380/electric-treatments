<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Language;
use App\UserRole;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class LanguageController extends Controller
{
    public function index(){

        $Languages = Language::paginate(10);
        return view('Admin.Language.index',compact('Languages'));

    }

    public function datatable(Request $request)
    {
        $data = Language::orderBy('id', 'desc');
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
                $actions = ' <a href="' . url("Edit_Language/" . $row->id) . '" class="btn btn-success"><i class="fa fa-pencil-alt"></i>  </a>';
                return $actions;

            })


            ->rawColumns(['actions', 'checkbox' ])
            ->make();

    }



    public function store(Request $request)
    {

        $this->validate(request(),[
            'ar_name' => 'required|string',
            'en_name' => 'required|string',
            'page_name' => 'required|string',
            'slug' => 'required|string',
        ]);

        $Language=new Language;
        $Language->ar_name = $request->ar_name;
        $Language->en_name = $request->en_name;
        $Language->page_name=$request->page_name;
        $Language->slug=$request->slug;

        try {
            $Language->save();
        } catch (Exception $e) {
            return redirect('/Language')->with('error_message', 'Failed');
        }
        return redirect()->back()->with('message', 'Success');
    }

    public function delete(Request $request)
    {
        try{
            Language::whereIn('id',$request->id)->delete();
        } catch (\Exception $e) {
            return response()->json(['message'=>'Failed']);
        }
        return response()->json(['message'=>'Success']);
    }


    public function edit(Request $request)
    {
        $Language=Language::find($request->id);
        return view('Admin.Language.model',compact('Language'));
    }


    public function update(Request $request)
    {

        $this->validate(request(),[

        ]);


        $Language= Language::find($request->id);

        $Language->ar_name = $request->ar_name;
        $Language->en_name = $request->en_name;
        $Language->page_name=$request->page_name;
        $Language->slug=$request->slug;

        try {
            $Language->save();

        } catch (Exception $e) {
            return redirect('copanel/Languagess')->with('error_message', 'هناك خطأ ما فى عملية الاضافة');
        }
         return redirect('copanel/Languages')->with('message', 'Success');
    }

    public function logout(){

        Auth::logout();

        return redirect('/login');
    }
}
