<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use Auth;

class LeadController extends Controller
{
     public function index()
    {
    	dd('ffffff');
        $clients = DB::table('leads')->get();
        //dd('ffffff',$clients);
        return view('backend.leads.index', compact('clients'));
    }
    public function create()
    {
    	$clients = DB::table('clients')->where('user_id', Auth::user()->id)->get();
    	foreach ($clients as $key => $value) {
    		$clientid=$value->lead_no;
    	}
       // dd('kkkkk',$clients,$clientid);
        return view('backend.activities.create',compact('clients'));
           
    }
    public function store(Request $request)
    {
    	$input= \Request::all();
    	//dd($input);
        
        $message =  DB::table('leads')->insert(
                array(
            'user_id' => Auth::user()->id,
            'name' => $request->name,
            'activity' => $request->activity,
            'date' => $request->date,
            'time' => $request->time,
            'details' => $request->details,
            'status' => $request->status,
            'client_id' => $request->client_id,
            'lead_no' => $request->lead_no,
            'company_name' => $request->company_name,
            'created_at' => date('Y-m-d H:i:s'),
                ));
        dd($input,$message);
        return redirect()->route('backend.lead.index');
        
    }
}
