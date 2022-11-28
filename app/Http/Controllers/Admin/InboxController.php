<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\inboxType;
use Illuminate\Http\Request;
use App\Inbox;
use Auth;
use App\User;
use DB;
use App\InboxAttachment;
use App\InboxExplan;
use PDF;
use \Milon\Barcode\DNS1D;
use Haruncpi\LaravelIdGenerator\IdGenerator;

class InboxController extends Controller
{

    public function index(){
            $data = Inbox::OrderBy('created_at','desc')->where('reciver_id',Auth::user()->id)->where('is_signature',null)->where('is_archive_reciver',null)->get();
        return view('Admin.inbox.inbox',compact('data'));
    }

    public function Letter($id){
        $data = Inbox::find($id);
        // print_r($data->letter);die();
        //         $pdf = PDF::loadView('letter',['data'=>$data]);

        // return $pdf->stream($data->name.'.pdf');
        return view('letter',compact('data'));


    }
    public function signatureLetter(Request $request){
        $data = Inbox::find($request->id);
        $data->is_signature=Auth::user()->id;
        $data->save();
        return redirect('/transactions/inbox/');
    }
    public function assginLeter(Request $request){
        $data = Inbox::find($request->id);
        $data->is_assgin=$data->is_assgin . '-' . Auth::user()->id;
        $data->save();
        $html = '<input type="checkbox" id ="is_assginValue" checked value="{{$data->id}}"  onclick="Outassgin()"/>
                                           <span></span>
                                        اللغاء تاشير الخطاب';
        return response($html);
    }

    public function assginLeterOut(Request $request){
        $data = inbox::find($request->id);
        $explode= explode('-',$data->is_assgin);
        foreach($explode as $a){
            if($a != Auth::user()->id){
            $array[] = $a;
            }
        }
        $implode = implode('-',$array);
        $data->is_assgin=$implode;
        $data->save();
        $html = ' <input type="checkbox" id ="is_assginValue" value="{{$data->id}}"  onclick="assgin()"/>
                                           <span></span>
                                                                                     تاشير الخطاب
';
        return response($html);
    }

    public function inboxSearch(Request $request){
        $query = DB::table('inboxes')->orderBy('created_at','desc');

        if($request->type == 1){
            $user = User::where('name',$request->search)->pluck('id');
            $query->whereIn('sender_id',$user);
        }
        if($request->type == 2){
            $query->where('title',$request->search);
        }
        if($request->filter == 2){
            $query->where('is_secret',1);
        }
        if($request->filter == 3){
            $query->where('is_urgent',1);
        }
        $query->where('reciver_id',Auth::user()->id);
        $data = $query->get();
        return view('Admin.inbox.inbox',compact('data'));
    }
    public function outBoxSearch(Request $request){
        $query = DB::table('inboxes')->orderBy('created_at','desc');

        if($request->type == 1){
            $user = User::where('name',$request->search)->pluck('id');
            $query->whereIn('sender_id',$user);
        }
        if($request->type == 2){
            $query->where('title',$request->search);
        }
        if($request->filter == 2){
            $query->where('is_secret',1);
        }
        if($request->filter == 3){
            $query->where('is_urgent',1);
        }
        if($request->type == 5){
            $query->where('letter_num',$request->search);
        }
        $query->where('sender_id',Auth::user()->id);
        $data = $query->get();
        return view('Admin.inbox.outbox',compact('data'));
    }
    public function outbox(){

        $data = Inbox::OrderBy('id','desc')->where('sender_id',Auth::user()->id)->where('is_archive_sender',null)->get();
        return view('Admin.inbox.outbox',compact('data'));

    }

    public function archiveinbox(){
        $data = Inbox::where('reciver_id',Auth::user()->id)->where('is_signature',null)->where('is_archive_reciver',1)->get();
        return view('Admin.inbox.archive',compact('data'));
    }
    public function archiveinboxSearch(Request $request){
        $query = DB::table('inboxes')->orderBy('created_at','desc');

        if($request->type == 1){
            $user = User::where('name',$request->search)->pluck('id');
            $query->whereIn('sender_id',$user);
        }
        if($request->type == 2){
            $query->where('title',$request->search);
        }

        $query->where('reciver_id',Auth::user()->id)->where('is_signature',null)->where('is_archive_reciver',1);
        $data = $query->get();
        return view('Admin.inbox.archive',compact('data'));
    }
    public function archiveoutbox(){

        $data = Inbox::where('is_signature','!=',null)->get();
        return view('Admin.inbox.archiveoutBox',compact('data'));

    }

    public function archiveoutboxSearch(Request $request){

        $query = DB::table('inboxes')->orderBy('created_at','desc');

        if($request->type == 1){
            $user = User::where('name',$request->search)->pluck('id');
            $query->whereIn('sender_id',$user);
        }
        if($request->type == 2){
            $query->where('title',$request->search);
        }

        $query->where('is_signature','!=',null);
        $data = $query->get();
        return view('Admin.inbox.archiveoutBox',compact('data'));

    }


    public function inbox_details($id){

        $data = Inbox::find($id);
if($data->reciver_id == Auth::user()->id){
            $data->is_read=1;
            $data->save();
            
        }
        return view('Admin.inbox.inbox_details',compact('data'));

    }
    public function Outbound_details($id){

        $data = Inbox::find($id);
        if($data->reciver_id == Auth::user()->id){
            $data->is_read=1;
            $data->save();
            
        }
        return view('Admin.inbox.Outbound_details',compact('data'));

    }

    public function Search(){

        return view('Admin.inbox.search');

    }

    public function secretSearch(){

        return view('Admin.inbox.secretSearch');

    }

    public function  outbox_Create(){

        return view('Admin.inbox.outbox_Create');
    }
    public function  outbox_Create2($data){

        return view('Admin.inbox.outbox_Create',compact('data'))->with('message','Success');
    }
    public function AdvancedSearch(Request $request){
        $query = DB::table('inboxes')->orderBy('created_at','desc');

        if($request->user_id != 0){
            $query->where('reciver_id',$request->user_id);
        }
        if($request->title){
            $query->where('title',$request->title);
        }
        if($request->id == 2){
            $query->where('is_secret',$request->id);
        }
        if($request->attachmentCount ){

        }
        if($request->type_id ){
            $query->where('type_id',$request->type_id);

        }
        if($request->is_archive_reciver ){
            $query->where('is_archive_reciver',1);

        }
        if($request->from){
            $year =   \Carbon\Carbon::parse($request->from)->format('Y');
            if($year < 1900){
                $year =   \Carbon\Carbon::parse($request->from)->format('Y');
                $month =   \Carbon\Carbon::parse($request->from)->format('m');
                $day =   \Carbon\Carbon::parse($request->from)->format('d');
                $date = \GeniusTS\HijriDate\Hijri::convertToGregorian($day, $month, $year);
                $request->from = $date;
            }else{

                    $to_date =   \Carbon\Carbon::parse($request->from)->format('Y-m-d');
                $request->from = $to_date;

            }
            $query->where('created_at','>=',$request->from);
        }
        if($request->to){
            $year =   \Carbon\Carbon::parse($request->to)->format('Y');
            if($year < 1900){
                $year =   \Carbon\Carbon::parse($request->to)->format('Y');
                $month =   \Carbon\Carbon::parse($request->to)->format('m');
                $day =   \Carbon\Carbon::parse($request->to)->format('d');
                $date = \GeniusTS\HijriDate\Hijri::convertToGregorian($day, $month, $year);
                $request->to = $date;
            }else{

                $to_date =   \Carbon\Carbon::parse($request->to)->format('Y-m-d');
                $request->to = $to_date;

            }
            $query->where('created_at','<=',$request->to);
        }
        if($request->is_confirm ){
            $query->where('is_confirm',1);
        }
        if($request->filter == 2){
            $query->where('type',1);
        }
        if($request->filter == 3){
            $query->where('type',0);
        }
        $data = $query->get();
        return view('Admin.inbox.searchResult',compact('data'));
    }

    public function AdvancedsecretSearch(Request $request){
        $query = DB::table('inboxes')->orderBy('created_at','desc');

        if($request->user_id != 0){
            $query->where('reciver_id',$request->user_id);
        }
        if($request->title){
            $query->where('title',$request->title);
        }
        if($request->from){
            $year =   \Carbon\Carbon::parse($request->from)->format('Y');
            if($year < 1900){
                $year =   \Carbon\Carbon::parse($request->from)->format('Y');
                $month =   \Carbon\Carbon::parse($request->from)->format('m');
                $day =   \Carbon\Carbon::parse($request->from)->format('d');
                $date = \GeniusTS\HijriDate\Hijri::convertToGregorian($day, $month, $year);
                $request->from = $date;
            }else{

                $to_date =   \Carbon\Carbon::parse($request->from)->format('Y-m-d');
                $request->from = $to_date;
            }
            $query->where('created_at','>=',$request->from);
        }
        if($request->to){
            $year =   \Carbon\Carbon::parse($request->to)->format('Y');
            if($year < 1900){
                $year =   \Carbon\Carbon::parse($request->to)->format('Y');
                $month =   \Carbon\Carbon::parse($request->to)->format('m');
                $day =   \Carbon\Carbon::parse($request->to)->format('d');
                $date = \GeniusTS\HijriDate\Hijri::convertToGregorian($day, $month, $year);
                $request->to = $date;
            }else{

                $to_date =   \Carbon\Carbon::parse($request->to)->format('Y-m-d');
                $request->to = $to_date;

            }
            $query->where('created_at','<=',$request->to);
        }
        if($request->id == 2){
            $query->where('is_secret',$request->id);
        }
        if($request->attachmentCount ){

        }
        if($request->type_id ){
            $query->where('type_id',$request->type_id);

        }
        if($request->is_archive_reciver ){
            $query->where('is_archive_reciver',1);

        }
        if($request->is_confirm ){
            $query->where('is_confirm',1);
        }
        if($request->filter == 2){
            $query->where('type',1);
        }
        if($request->filter == 3){
            $query->where('type',0);
        }
        $query->where('is_secret',1);
        $data = $query->get();
        return view('Admin.inbox.searchResult',compact('data'));
    }

    public function Create(){
        return view('Admin.inbox.Create');
    }

    public function  store(Request $request){
        $this->validate(request(),[
            'title' => 'required|string',
            'date' => 'required|date',

        ]);


        if($request->sendMain){
            foreach($request->sendMain as $reciver_id){

         // Date Check
           $year =   \Carbon\Carbon::parse($request->date)->format('Y');
        if($year < 1900){
            $year =   \Carbon\Carbon::parse($request->date)->format('Y');
            $month =   \Carbon\Carbon::parse($request->date)->format('m');
            $day =   \Carbon\Carbon::parse($request->date)->format('d');
            $date = \GeniusTS\HijriDate\Hijri::convertToGregorian($day, $month, $year);
        $request->date = $date;
        }else{

            $to_date =   \Carbon\Carbon::parse($request->date)->format('Y-m-d');
            $request->date = $to_date;

        }

        $data = new Inbox;
        $data->title=$request->title;
        $data->type=1;
        $data->type_id=$request->type_id;
        $data->attach_type_id=$request->attach_type_id;
        $data->sender_id=Auth::user()->id;
        $data->reciver_id=$reciver_id;
        $data->description=$request->description;
        $data->letter=$request->letter;
                $data->date=$request->date;
                $data->is_urgent=$request->is_urgent;
                $data->is_secret=$request->is_secret;
                $data->is_assgin=$request->is_assgin;
                $data->is_signature=$request->is_signature;
            $data->save();
                $ids=[];
                if($request->hasfile('file')){
                foreach($request->file('file') as $file){
                    $name=time() . '.' .$file->getClientOriginalName();
                    $file->move('Upload/Attachments',$name);
                   $InboxAttachment = new InboxAttachment;
                    $InboxAttachment->inbox_id=$data->id;
                    $InboxAttachment->file=$name;
                    $InboxAttachment->save();
                    $ids[] = $InboxAttachment->id;
                }
            }
               $explan = new InboxExplan;
                $explan->type=1;
                $explan->sender_id=Auth::user()->id;
                $explan->reciver_id=$reciver_id;
                $explan->third_party=$request->third_party;
                $explan->assginee_id=$request->assginee_id;
                $explan->explan=$request->description;
                $explan->type_id=$request->type_id;
                $explan->inbox_id=$data->id;

                if($ids){
                    $implode = implode(',',$ids);
                    $explan->attachment_id=$implode;
                }
                $explan->save();
        }
        }
        if($request->sendSub){
            foreach($request->sendSub as $reciver_id){
                $data = new Inbox;
            $data->title=$request->title;
            $data->type=0;
            $data->date=$request->date;
            $data->type_id=$request->type_id;
            $data->attach_type_id=$request->attach_type_id;
            $data->sender_id=Auth::user()->id;
            $data->reciver_id=$reciver_id;
            $data->description=$request->description;
            $data->letter=$request->letter;
            $data->is_urgent=$request->is_urgent;
            $data->is_secret=$request->is_secret;
                $data->is_assgin=$request->is_assgin;
                $data->is_signature=$request->is_signature;
            $data->save();
            $ids=[];
            if($request->hasfile('file')){
                foreach($request->file('file') as $file){
                    $name=time() . '.' .$file->getClientOriginalName();
                    $file->move('Upload/Attachments',$name);
                    $InboxAttachment = new InboxAttachment;
                    $InboxAttachment->inbox_id=$data->id;
                    $InboxAttachment->file=$name;
                    $InboxAttachment->save();
                    $ids[] = $InboxAttachment->id;

                }
            }
                $explan = new InboxExplan;
                $explan->type=0;
                $explan->sender_id=Auth::user()->id;
                $explan->reciver_id=$reciver_id;
                $explan->third_party=$request->third_party;
                $explan->assginee_id=$request->assginee_id;
                $explan->explan=$request->explan;
                $explan->type_id=$request->type_id;
                $explan->inbox_id=$data->id;
                if($ids){
                    $implode = implode(',',$ids);
                    $explan->attachment_id=$implode;

                }
                $explan->save();
            }
        }
        try {

        } catch (Exception $e) {
            return back()->with('message', 'Failed');
        }
        return redirect()->back()->with('message', 'Success');

    }

    public function OutExport(){

        $data = Inbox::where('type',4)->OrderBy('id','desc')->where('sender_id',Auth::user()->id)->get();

        return view('Admin.inbox.OutExport',compact('data'));
    }

    public function CreateOutExport(){

        return view('Admin.inbox.CreateOutExport');
    }

    public function OutExport_details($id){
        $data = Inbox::find($id);
        return view('Admin.inbox.OutExport_details',compact('data'));
    }
    public function OutExportSearch(Request $request){
        $query = DB::table('inboxes')->orderBy('created_at','desc');

        if($request->type == 2){
            $query->where('title',$request->search);
        }

        $query->where('sender_id',Auth::user()->id)->where('type',4);
        $data = $query->get();
        return view('Admin.inbox.OutExport',compact('data'));
    }
    public function  storeOutBox(Request $request){
        $this->validate(request(),[
            'title' => 'required|string',
            'date' => 'required|date',

        ]);
        $barcode = new DNS1D();
        $random = IdGenerator::generate(['table' => 'inboxes', 'length' => 10, 'prefix' =>date('ym')]);
        // Date Check
        $year =   \Carbon\Carbon::parse($request->date)->format('Y');
        if($year < 1900){
            $year =   \Carbon\Carbon::parse($request->date)->format('Y');
            $month =   \Carbon\Carbon::parse($request->date)->format('m');
            $day =   \Carbon\Carbon::parse($request->date)->format('d');
            $date = \GeniusTS\HijriDate\Hijri::convertToGregorian($day, $month, $year);
            $request->date = $date;
        }else{

            $to_date =   \Carbon\Carbon::parse($request->date)->format('Y-m-d');
            $request->date = $to_date;

        }

        $data = new Inbox;
            $data->title=$request->title;
            $data->type=2;
            $data->type_id=$request->type_id;
            $data->attach_type_id=$request->attach_type_id;
            $data->sender_id=Auth::user()->id;
            $data->reciver_id=$request->reciver_id;
            $data->third_party_id=$request->third_party_id;
            $data->assignee_id=$request->assignee_id;
            $data->description=$request->description;
            $data->is_urgent=$request->is_urgent;
            $data->is_secret=$request->is_secret;
            $data->date=$request->date;
            $data->parcode ='data:image/png;base64,' . $barcode->getBarcodePNG($random, 'C128');
            $data->letter_num=$request->letter_num;
            $data->save();
            $ids=[];
        if($request->hasfile('file')){
            foreach($request->file('file') as $file){
                $name=time() . '.' .$file->getClientOriginalName();
                $file->move('Upload/Attachments',$name);
                $InboxAttachment = new InboxAttachment;
                $InboxAttachment->inbox_id=$data->id;
                $InboxAttachment->file=$name;
                $InboxAttachment->save();
                $ids[] = $InboxAttachment->id;
            }
        }

        $explan = new InboxExplan;
        $explan->type=2;
        $explan->inbox_id=$data->id;
        $explan->sender_id=Auth::user()->id;
        $explan->reciver_id=$request->reciver_id;
        if($request->third_party_id){
            $explan->third_party=$request->third_party_id;
        }
        if($request->assignee_id){
            $explan->assginee_id=$request->assignee_id;
        }
        $explan->explan=$request->description;
        $explan->type_id=$request->type_id;
        if($ids){
            $implode = implode(',',$ids);
            $explan->attachment_id=$implode;

        }
        $explan->save();


        try {

        } catch (Exception $e) {
            return back()->with('message', 'Failed');
        }
        return redirect()->back()->with('message','Success')->with('data',$data);;

    }

    public function  storeOutExport(Request $request){
        $this->validate(request(),[
            'title' => 'required|string',
            'date' => 'required|date',

        ]);
        $barcode = new DNS1D();
        $random = IdGenerator::generate(['table' => 'inboxes', 'length' => 10, 'prefix' =>date('ym')]);
        // Date Check
        $year =   \Carbon\Carbon::parse($request->date)->format('Y');
        if($year < 1900){
            $year =   \Carbon\Carbon::parse($request->date)->format('Y');
            $month =   \Carbon\Carbon::parse($request->date)->format('m');
            $day =   \Carbon\Carbon::parse($request->date)->format('d');
            $date = \GeniusTS\HijriDate\Hijri::convertToGregorian($day, $month, $year);
            $request->date = $date;
        }else{

            $to_date =   \Carbon\Carbon::parse($request->date)->format('Y-m-d');
            $request->date = $to_date;

        }

        $data = new Inbox;
        $data->title=$request->title;
        $data->type=4;
        $data->type_id=$request->type_id;
        $data->attach_type_id=$request->attach_type_id;
        $data->sender_id=Auth::user()->id;
        $data->reciver_id=$request->reciver_id;
        $data->third_party_id=$request->third_party_id;
        $data->assignee_id=$request->assignee_id;
        $data->description=$request->description;
        $data->is_urgent=$request->is_urgent;
        $data->is_secret=$request->is_secret;
        $data->date=$request->date;
        $data->parcode ='data:image/png;base64,' . $barcode->getBarcodePNG($random, 'C128');
        $data->letter_num=$request->letter_num;
        $data->save();
        $ids=[];
        if($request->hasfile('file')){
            foreach($request->file('file') as $file){
                $name=time() . '.' .$file->getClientOriginalName();
                $file->move('Upload/Attachments',$name);
                $InboxAttachment = new InboxAttachment;
                $InboxAttachment->inbox_id=$data->id;
                $InboxAttachment->file=$name;
                $InboxAttachment->save();
                $ids[] = $InboxAttachment->id;
            }
        }

        $explan = new InboxExplan;
        $explan->type=2;
        $explan->inbox_id=$data->id;
        $explan->sender_id=Auth::user()->id;
        $explan->reciver_id=$request->reciver_id;
        if($request->third_party_id){
            $explan->third_party=$request->third_party_id;
        }
        if($request->assignee_id){
            $explan->assginee_id=$request->assignee_id;
        }
        $explan->explan=$request->description;
        $explan->type_id=$request->type_id;
        if($ids){
            $implode = implode(',',$ids);
            $explan->attachment_id=$implode;

        }
        $explan->save();


        try {

        } catch (Exception $e) {
            return back()->with('message', 'Failed');
        }
        return redirect()->back()->with('message','Success')->with('data',$data);;

    }

    public function Update_inbox(Request $request){
        $data =  Inbox::find($request->id);
        $type = inboxType::find($request->type_id);
        if($type && $type->type == 1){
            $data->is_archive_reciver=1;
            $data->save();
            $ids=[];
            if($request->hasfile('file')){
                foreach($request->file('file') as $file){
                    $name=time() . '.' .$file->getClientOriginalName();
                    $file->move('Upload/Attachments',$name);
                    $InboxAttachment = new InboxAttachment;
                    $InboxAttachment->inbox_id=$data->id;
                    $InboxAttachment->file=$name;
                    $InboxAttachment->save();
                    $ids[] = $InboxAttachment->id;
                }
            }
            $explan = new InboxExplan;
            $explan->type=$data->type;
            $explan->inbox_id=$data->id;
            $explan->sender_id=Auth::user()->id;
            if($request->reciver_id){
                $explan->reciver_id=$request->reciver_id;
            }else {
                    $explan->reciver_id=$data->reciver_id;
            }
            if($request->third_party){
                $explan->third_party=$request->third_party;
            }
            if($request->assginee_id){
                $explan->assginee_id=$request->assginee_id;
            }
            if($request->description){
                $explan->explan=$request->description;
            }else{
                $explan->explan='تم تحويل المعاملة من قبل ' . Auth::user()->name;
            }
            if($request->type_id){
                $explan->type_id=$request->type_id;
            }else{
                $explan->type_id=$data->type_id;
            }
            if($ids){
                $implode = implode(',',$ids);
                $explan->attachment_id=$implode;

            }
            $explan->save();

        }else if($type && $type->type == 2) {
            $data->is_signature=Auth::user()->id;
            $data->save();
            $ids=[];
            if($request->hasfile('file')){
                foreach($request->file('file') as $file){
                    $name=time() . '.' .$file->getClientOriginalName();
                    $file->move('Upload/Attachments',$name);
                    $InboxAttachment = new InboxAttachment;
                    $InboxAttachment->inbox_id=$data->id;
                    $InboxAttachment->file=$name;
                    $InboxAttachment->save();
                    $ids[] = $InboxAttachment->id;
                }
            }
            $explan = new InboxExplan;
            $explan->type=$data->type;
            $explan->inbox_id=$data->id;
            $explan->sender_id=Auth::user()->id;
            if($request->reciver_id){
                $explan->reciver_id=$request->reciver_id;
            }else {
                $explan->reciver_id=$data->reciver_id;

            }
            if($request->third_party){
                $explan->third_party=$request->third_party;
            }
            if($request->assginee_id){
                $explan->assginee_id=$request->assginee_id;
            }
            if($request->description){
                $explan->explan=$request->description;
            }else{
                $explan->explan='تم تحويل المعاملة من قبل ' . Auth::user()->name;
            }
            if($request->type_id){
                $explan->type_id=$request->type_id;
            }else{
                $explan->type_id=$data->type_id;
            }
            if($ids){
                $implode = implode(',',$ids);
                $explan->attachment_id=$implode;

            }
            $explan->save();

        }else{
        if($request->type_id){
        $data->type_id=$request->type_id;
            $data->save();
            $ids=[];
            if($request->hasfile('file')){
                foreach($request->file('file') as $file){
                    $name=time() . '.' .$file->getClientOriginalName();
                    $file->move('Upload/Attachments',$name);
                    $InboxAttachment = new InboxAttachment;
                    $InboxAttachment->inbox_id=$data->id;
                    $InboxAttachment->file=$name;
                    $InboxAttachment->save();
                    $ids[] = $InboxAttachment->id;
                }
            }
            $explan = new InboxExplan;
            $explan->type=$data->type;
            $explan->inbox_id=$data->id;
            $explan->sender_id=Auth::user()->id;
            $explan->reciver_id=$request->reciver_id;
            if($request->third_party){
                $explan->third_party=$request->third_party;
            }
            if($request->assginee_id){
                $explan->assginee_id=$request->assginee_id;
            }
            if($request->description){
                $explan->explan=$request->description;
            }else{
                $explan->explan='تم تحويل المعاملة من قبل ' . Auth::user()->name;
            }
            if($request->type_id){
                $explan->type_id=$request->type_id;
            }else{
                $explan->type_id=$data->type_id;
            }
            if($ids){
                $implode = implode(',',$ids);
                $explan->attachment_id=$implode;

            }
            $explan->save();

        }
        $data->reciver_id=$request->reciver_id;
        if($request->description){
            $data->description=$request->description;
        }
        if($request->is_urgent){
            $data->is_urgent=$request->is_urgent;
        }
        if($request->is_secret){
            $data->is_secret=$request->is_secret;
        }
        if($request->letter_num){
            $data->letter_num=$request->letter_num;
        }
        $data->save();
        $ids=[];
        if($request->hasfile('file')){
            foreach($request->file('file') as $file){
                $name=time() . '.' .$file->getClientOriginalName();
                $file->move('Upload/Attachments',$name);
                $InboxAttachment = new InboxAttachment;
                $InboxAttachment->inbox_id=$data->id;
                $InboxAttachment->file=$name;
                $InboxAttachment->save();
                $ids[] = $InboxAttachment->id;
            }
        }
        $explan = new InboxExplan;
        $explan->type=$data->type;
        $explan->inbox_id=$data->id;
        $explan->sender_id=Auth::user()->id;
        $explan->reciver_id=$request->reciver_id;
        if($request->third_party){
        $explan->third_party=$request->third_party;
        }
        if($request->assginee_id){
            $explan->assginee_id=$request->assginee_id;
        }
        if($request->description){
        $explan->explan=$request->description;
        }else{
            $explan->explan='تم تحويل المعاملة من قبل ' . Auth::user()->name;
        }
        if($request->type_id){
            $explan->type_id=$request->type_id;
        }else{
            $explan->type_id=$data->type_id;
        }
        if($ids){
            $implode = implode(',',$ids);
            $explan->attachment_id=$implode;

        }
        $explan->save();
        }
                return redirect('transactions/inbox')->with('message', 'Success');

    }

}
