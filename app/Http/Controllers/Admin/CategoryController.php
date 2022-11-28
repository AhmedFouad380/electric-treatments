<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Category;
use App\User;
use App\Job;
use Exception;
 class CategoryController extends Controller
{
    public function index(){

        $Categories = Category::OrderBy('id','desc')->paginate(10);

         $tree =  $this->addSub(0);

        return view('Admin.Category.index',compact('Categories','tree'));

    }

    public function CategoriesTree(){

        $Categories = Category::OrderBy('id','desc')->paginate(10);

        $tree =  $this->addSub(0);

        return view('Admin.Category.tree',compact('Categories','tree'));

    }

    public function CategorySearch(Request $request){

        $query = Category::OrderBy('id','desc');
        if($request->name){
            $query->where('name','like','%'.$request->name.'%');
        }
        if($request->type){
            $query->where('type',$request->type);
        }
        if($request->sub_id){
            $query->where('sub_id',$request->sub_id);
        }
        $Categories = $query->paginate(50);

        $tree =  $this->addSub(0);
        return view('Admin.Category.index',compact('Categories','tree'));

    }
    public function addSub($id){
        $dataa = null;

        foreach (Category::where('sub_id',$id)->get() as $data){
            if(Category::where('sub_id',$data->id)->count() > 0 ){
                $b = '{ "text" : "' . $data->name . '", "children":['.$this->addSub($data->id)  .'] }';
                $dataa .=$b;
                $dataa .=',';

            }else{
                $b = '{ "text": "' . $data->name . '" , "children":"" } ' ;
                $dataa .=$b;
                $dataa .=',';
            }

        }
        return $dataa;
    }
    public function addSub2($id){
        foreach (Category::where('sub_id',$id)->get() as $data){
            if(Category::where('sub_id',$data->id)->count() > 0 ){
                $b = '{ "text" : "' . $data->name . '", "children":['. $this->addSub2($data->id) .'] }';
            }else{
                $b = '{ "text": "' . $data->name . '" , "children":"" } ' ;
            }

        }
        return $b;
    }
    public function store(Request $request)
    {

        $this->validate(request(),[
            'name' => 'required|string',
            'type' => 'required',
            'sub_id' => 'required',
            'network_name' => 'sometimes|nullable',
            'mac_address' => 'sometimes|nullable',
        ]);

        $data=new Category;
        $data->name=$request->name;
        $data->type=$request->type;
        $data->sub_id=$request->sub_id;
        $data->network_name=$request->network_name;
        $data->mac_address=$request->mac_address;

        try {
            $data->save();
        } catch (Exception $e) {
            return redirect('/resources/Categories')->with('error_message', 'Failed');
        }

        return redirect()->back()->with('message', 'Success');
    }

    public function delete(Request $request)
    {
        try{
            if(Category::where('sub_id',$request->id)->count() > 0 || User::where('category_id',$request->id)->count() > 0  || Job::where('category_id',$request->id)->count() > 0) {
                return response()->json(['message'=>'Error']);

            }else{
                Category::whereIn('id',$request->id)->delete();

            }
        } catch (\Exception $e) {
            return response()->json(['message'=>'Failed']);
        }
        return response()->json(['message'=>'Success']);
    }


    public function edit(Request $request)
    {
        $Category=Category::find($request->id);
        return view('Admin.Category.model',compact('Category'));
    }


    public function update(Request $request)
    {

        $this->validate(request(),[
            'name' => 'required|string',

        ]);
        $data= Category::find($request->id);
        $data->name=$request->name;
        $data->type=$request->type;
        $data->sub_id=$request->sub_id;
        $data->network_name=$request->network_name;
        $data->mac_address=$request->mac_address;

        try {
            $data->save();

        } catch (\Exception $e) {
            return redirect('/users')->with('error_message', 'هناك خطأ ما فى عملية الاضافة');
        }
        return redirect()->back()->with('message', 'Success');
    }

}
