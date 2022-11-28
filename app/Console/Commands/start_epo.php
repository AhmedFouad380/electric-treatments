<?php

namespace App\Console\Commands;

use App\User;;
use Carbon\Carbon;
use Illuminate\Console\Command;

class start_epo extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'notification:send';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'send notifiction to studdent before episode start';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $Users = User::where('end_contract_date','<',\Carbon\Carbon::now()->addDays(60))->where('contract_status',1)->get();
        foreach($Users as $Key => $request){
                $User = User::find($request->id);
                 if($request->end_contract_date){
                            $User->end_contract_date = Carbon::parse($request->end_contract_date)->addYear();
                 }
                $User->save();
        
              return redirect()->back()->with('message', 'Success');
           
        }
    }
}
