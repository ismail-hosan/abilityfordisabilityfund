<?php

namespace App\Http\Controllers;

use App\Models\Withdraw;
use App\Models\Transaction;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class WithdrawController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $userid =Auth::user()->id;
        $listionwithdraw =Withdraw::where('user_id',$userid)->get();
                         
        return view('admin/pages/withdraws/listwithdraw',get_defined_vars());
    }
    public function application()
    {
        $withdrawblance = DB::table('withdraws')
                          ->join('users','withdraws.user_id','=','users.id')
                          ->select('users.name','users.email','users.phone','withdraws.*')
                          ->get();
         

        return view('admin/pages/withdraws/application', get_defined_vars() );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function create()
    {
        $referid=Auth::user()->id;
        $referamount =DB::table('users')
        ->join('incentives','users.id','=','incentives.user_id')
        ->OrWhere('incentives.user_refer_id','=',$referid)
        ->where('users.payment','=', 1 )
        ->select(DB::raw("SUM(incentives.percentage) as paidsum"))
        ->pluck('paidsum')
        ->first();
        // dd($referamount);
        $withdroa =DB::table('withdraws')
        ->orWhere('status',1)
        ->where('user_id',$referid)
        ->select(DB::raw("SUM(amount) as total"))
        ->pluck('total')
        ->first();

        if( empty($withdroa )){
            $withdroa ="0.00";
        }
        // dd($withdroa);
         
        $withdrawblance = $referamount - $withdroa;
        
        $withdrawcount = Withdraw::where('status',0)->count();
       // dd($withdrawcount);
        return view('admin/pages/withdraws/withdrawlist', get_defined_vars());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request->withdraw_limit);
        $limit =$request->withdraw_limit;
        $this->validate($request,[
         'withdraw_amount' => 'required|numeric|max:'.$limit,
        ]);
 
        $userid =Auth::user()->id;
         
        $store=new Withdraw();
        $store->user_id = $userid;
        $store->amount =$request->withdraw_amount;
        $store->date = date('d-m-Y g:i:s A');
        $store->user_note = $request->note;
        $store->save();
    
        session()->flash('success','Thanks for applying Withdraw.Wait for feedback from admin');
       return redirect('Withdraw');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Withdraw  $withdraw
     * @return \Illuminate\Http\Response
     */
    public function show(Withdraw $withdraw)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Withdraw  $withdraw
     * @return \Illuminate\Http\Response
     */
    public function edit(Withdraw $withdraw)
    {
       
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Withdraw  $withdraw
     * @return \Illuminate\Http\Response
     */
    public function approvewithraw($id)
    {
        $iffound=Transaction::orWhere('purpose','withdraw')->where('transaction_id',$id)->count();
        // dd($iffound);
        $details =DB::table('withdraws')->where('id',$id)->first();

        $admin_id =Auth::user()->id;
       $approvedata['admin_id'] = $admin_id ;
       $approvedata['date'] = date('d-m-Y g:i:s A');
       $approvedata['status'] =1;
       Withdraw::where('id',$id)->update($approvedata);
       
      
       if($iffound == 0 ){
       $transgation=new Transaction();
       $transgation->transaction_id=$id;
       $transgation->date=date('d-m-Y g:i:s A');
       $transgation->purpose='withdraw';
       $transgation->credit= $details->amount;
       $transgation->status= 1;
       $transgation->save();
       }elseif($iffound > 0){
        $transgation['status']= 1;
        Transaction::where('transaction_id',$id)->update($transgation);
       }

       session()->flash('success','Approve Successfully');
       return back();
    }

    public function unapprovewithdro($id)
    {
       $transgationid['status']= 0 ;
       Transaction::orWhere('purpose','withdraw')->where('transaction_id',$id)->update($transgationid);

       $admin_id =Auth::user()->id;
       $approvedata['admin_id'] = $admin_id ;
       $approvedata['date'] = date('d-m-Y g:i:s A');
       $approvedata['status'] = 0;
       Withdraw::where('id',$id)->update($approvedata);
       session()->flash('success','Unapprove Successfully');
       return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Withdraw  $withdraw
     * @return \Illuminate\Http\Response
     */
    public function destroy($withdraw)
    {
       Withdraw::where('id',$withdraw)->delete();

       Transaction::orWhere('purpose','withdraw')->where('transaction_id',$withdraw)->delete();
       
       session()->flash('success','The Withdrawal Deleted successfully');
       return back();
    }
    public function destroywithdraw($id)
    {
       Withdraw::where('id',$id)->delete();

       Transaction::orWhere('purpose','withdraw')->where('transaction_id',$id)->delete();
       
       session()->flash('success','The Withdrawal Deleted successfully');
       return back();
    }
    public function widthraw_confirmmess(Request $req)
    { 
        // dd($req->all());
        $message['admin_note']=$req->message;
        Withdraw::where('id',$req->withdraw_id)->update($message);
        session()->flash('success','Message Send Successfully');
        return back();

    }
}
