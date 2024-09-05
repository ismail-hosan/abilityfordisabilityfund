<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Gallery;
use App\Models\Admin;
use App\Models\User;
use App\Models\Payment;
use App\Models\Incentive;
use App\Models\AccountHead;
use App\Models\memberCategory;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class PaymentController extends Controller
{

    // public function pyament()
    // {
    //     $userid = Auth()->user()->id;

    //     $paymentapply = DB::table('payments')->orWhere('member_id', $userid)->count();

    //     $payment = DB::table('users')
    //         ->join('member_categories', 'users.membercategory_id', '=', 'member_categories.id')
    //         ->where('users.id', $userid)
    //         ->select('users.reference', 'users.payment', 'users.membercategory_id', 'member_categories.*')
    //         ->first();

    //     $paymethod = AccountHead::where('status', 1)->get();

    //     return view('admin.pages.pyament', get_defined_vars());
    // }

    public function list_payment()
    {

        $userid = auth()->user()->id;
        // dd($userid);
        $allPayments = DB::table('payments')
            ->where('member_id', $userid)
            ->get();


        return view('admin.pages.allpayment', get_defined_vars());
    }

    public function payment_store(Request $request)
    {
        $userid = auth()->user()->id;
        // $this->validate($request, [
        //     'date' => 'required',
        //     'type' => 'required',
        //     'payment_type' => 'required',
        //     'from_number' => 'required',
        //     'to_number' => 'required',
        //     'amount' => 'required',
        //     'trnxid' => 'required',
        // ]);

        $payment = new Payment();
        $payment->member_id = $userid;
        $payment->payment_method = $request->payment_method;
        $payment->amount = $request->amount;
        $payment->note = $request->note;
        $payment->tx_id = $request->tx_id;

        if ($request->hasfile('tx_image')) {
            $file = $request->file('tx_image');
            $fileName = time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('uploads'), $fileName);
            $payment->tx_image = $fileName;
        }
        $payment->save();
        return redirect()->back()->with('success', 'Your Transaction Successfully Complete !!');
    }


    function viewpayment($id)
    {
        // $getid = Payment::where('id', $id)->pluck('member_id')->first();
        // $userDetails = User::find($getid);

        // $paymentDetails = Payment::find($id);
        // return view('admin/pages/paymentdetails', get_defined_vars());
    }

    public function paymentRequest()
    {
        $payments = Payment::all();
        return view('admin.pages.paymentRequest', get_defined_vars());
    }

    public function status(Payment $payment)
    {
        // dd($payment);
        $payment->update(['status' => 'Approved']);
        return redirect()->back()->with('msg', 'Request Approved');
    }

    public function payment(Request $request)
    {
        $store_id = config('amarpay.store_id');
        $signature_kay = config('amarpay.signature_kay');

        $transaction_id = rand(000000000000, 999999999999);

        $url = 'https://sandbox.aamarpay.com/jsonpost.php';
        


        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => $url,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'POST',
            CURLOPT_POSTFIELDS =>'{
            "store_id": "'.$store_id.'",
            "tran_id": "'.$transaction_id.'",
            "success_url": "'.route('success').'",
            "fail_url": "'.route('fail').'",
            "cancel_url": "'.route('cancel').'",
            "amount": "10",
            "currency": "BDT",
            "signature_key": "'.$signature_kay.'",
            "desc": "Merchant Registration Payment",
            "cus_name": "Nazmul",
            "cus_email": "nazmul@gmail.com",
            "cus_add1": "House A-55 Road 10",
            "cus_add2": "Jhenaidah, Khulna, Bangladesh",
            "cus_city": "Jhenaidah",
            "cus_state": "Jhenaidah",
            "cus_postcode": "7200",
            "cus_country": "Bangladesh",
            "cus_phone": "+88001700000001",
            "type": "json"
        }',
            CURLOPT_HTTPHEADER => array(
                'Content-Type: application/json'
            ),
        ));

        $response = curl_exec($curl);

        curl_close($curl);

        $responseObject = json_decode($response, true);

        if (isset($responseObject['payment_url']) && $responseObject['payment_url'] != null) {
            return redirect()->away($responseObject['payment_url']);
            //For Inertia Js, Use this to avoid whole tab opening as modal
           // return inertia()->location($responseObject['payment_url']);
        }else{
            return redirect()->route('home')->with('error', 'Payment Url Generation Failed!');
        }

    }

    public function success(Request $request)
    {

        $request_id    = $request['mer_txnid'];
        $store_id      = config('amarpay.store_id');
        $signature_kay = config('amarpay.signature_kay');

        $url = "https://sandbox.aamarpay.com/api/v1/trxcheck/request.php?request_id=$request_id&store_id=$store_id&signature_key=$signature_kay&type=json";
        //For Live Transection Use "http://secure.aamarpay.com/api/v1/trxcheck/request.php"

        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => $url,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'GET',
        ));

        $response = curl_exec($curl);

        curl_close($curl);
//        echo $response;
        return redirect()->route('home')->with('success', 'Order placed successfully');
    }

    //get failure response
    public function fail(Request $request)
    {
        return redirect()->route('home')->with('error', 'Order Failed!');
    }

    //
    public function cancel(Request $request)
    {
        return redirect()->route('home')->with('warning', 'Order cancelled!');
    }

    
}
