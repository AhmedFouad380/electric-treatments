<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\userAttachment;
class UserAttachmentController extends Controller
{
    public function index($id){
        $data = userAttachment::where('user_id',$id)->Orderby('id','desc')->paginate(10);
        return view('Admin.UserAttachment.index',compact('data','id'));

    }


    public function delete(Request $request)
    {
        try{
            userAttachment::whereIn('id',$request->id)->delete();
        } catch (\Exception $e) {
            return response()->json(['message'=>'Failed']);
        }
        return response()->json(['message'=>'Success']);
    }


    public function store(Request $request){

        $User= new userAttachment;
        $User->cat_id=$request->cat_id;
        $User->user_id=$request->user_id;
        if($file=$request->file('file')){
            $name=time() . '.' .$file->getClientOriginalName();
            $file->move('Upload/UserFiles',$name);
            $User->file=$name;

        }

        try {
            $User->save();

        } catch (Exception $e) {
            return back()->with('message', 'Failed');
        }
        return redirect()->back()->with('message', 'Success');
    }
}
