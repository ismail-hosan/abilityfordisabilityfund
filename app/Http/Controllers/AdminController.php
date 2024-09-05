<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\Incentive;
use App\Models\User;
use App\Models\Payment;
use App\Models\Transaction;
use App\Models\AccountHead;
use App\Models\memberCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;

class AdminController extends Controller
{

    public function usercreate()
    {
        return view('admin/pages/usercreate/index');
    }

    public function storeuser(Request $req)
    {
        $this->validate($req, [
            'name' => 'required',
            'phone' => 'required',
            'address' => 'required',
            'email' => 'unique:users|required',
            'password' => 'required'
        ]);

        if ($req->password == $req->passwordreturn) {
            $useradd = new User;
            $useradd->name = $req->name;
            $useradd->email = $req->email;
            $useradd->address = $req->address;
            $useradd->type = 1;
            $useradd->phone = $req->phone;
            if ($req->hasFile('image')) {
                if ($req->file('image')->isValid()) {
                    $image_name = date('mdYHis') . uniqid() . $req->file('image')->getClientOriginalName();
                    $path = base_path() . '/public/images/';
                    $req->file('image')->move($path, $image_name);
                    $useradd->image = url('/') . '/images/' . $image_name;
                }
            }
            $useradd->password = Hash::make($req->password);
            $useradd->save();
            return back()->with('success', 'User Create successfully');
        } else {
            return back()->with('error', 'Password confirmation does not match');
        }
    }

    public function useraccess()
    {
        $userlist = User::where('type', 1)->get();
        return view('admin/pages/useraccess', get_defined_vars());
    }

    public function index(Request $request)
    {
        $user_id = Auth::user()->id;

        $referamount = DB::table('users')
            ->join('incentives', 'users.id', '=', 'incentives.user_id')
            ->OrWhere('incentives.user_refer_id', '=', $user_id)
            ->where('users.payment', '=', 1)
            ->select(DB::raw("SUM(incentives.percentage) as paidsum"))
            ->pluck('paidsum')
            ->first();

        $withdroa = DB::table('withdraws')
            ->orWhere('status', 1)
            ->where('user_id', $user_id)
            ->select(DB::raw("SUM(amount) as total"))
            ->pluck('total')
            ->first();

        if (empty($withdroa)) {
            $withdroa = "0.00";
        }

        $payment = $referamount - $withdroa;

        if ($request->session()) {
            $payment = Payment::where('member_id', Auth::user()->id)->get();
            return view('admin.pages.dashboard', get_defined_vars());
        } else {
            $request->session()->flash('error', 'You Can not access this page before login');
            return view('admin.include.login');
        }

        return view('admin.include.login');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }
    public function password_change()
    {

        $userlist = User::all();
        return view('admin/pages/password_change/password_admin', get_defined_vars());
    }


    public function update_password(Request $request)
    {

        // dd($request->all());
        if (!empty($request->newpassword && $request->confirmpassword)) {
            if ($request->newpassword == $request->confirmpassword) {
                // dd('Hello World');
                $updatepassword['password'] = Hash::make($request->newpassword);
                User::where('id', $request->getUserId)->update($updatepassword);
                session()->flash('success', 'Password changed Successfully ,password:' . $request->newpassword);
            } else {
                session()->flash('Wrong', 'Password does not match');
            }
        }
        return back();
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    public function all_list_payment(Request $request)
    {
        $allPayments = DB::table('payments')
            ->join('users', 'payments.member_id', '=', 'users.id')
            ->join('account_heads', 'account_heads.id', '=', 'payments.payment_type')
            ->select('users.name', 'users.id_number', 'payments.*', 'account_heads.title')
            ->orderBy('payments.accept_status', 'asc')
            ->get();
        // dd($allPayments );
        $allPaymen = DB::table('payments')
            ->select('payments.*', 'users.name')
            ->join('users', 'users.id', '=', 'payments.approved_by')
            ->first();

        return view('admin.pages.alllistpayment', get_defined_vars());
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function userlist(Admin $admin)
    {
        $users = DB::table('users')->where('type', 1)->get();
        return view('admin.pages.userList', get_defined_vars());
    }

    //saiful code
    public function memeberslist(Admin $admin)
    {
        $users = DB::table('users')->where('type', 2)->get();
        return view('admin.pages.memberList', get_defined_vars());
    }


    public function memberShow()
    {
        $memberCondition = array(
            'type' => 2,
            'payment' => 1
        );
        $users = DB::table('users')->where($memberCondition)->get();
        return view('admin.pages.memberShow', get_defined_vars());
    }

    public function storeShowMember(Request $request)
    {
        $member_id = $request->member_id;
        if ($request->m_id) {
            $m_id = 1;
        } else {
            $m_id = 0;
        }

        if ($request->m_name) {
            $m_name = 1;
        } else {
            $m_name = 0;
        }

        if ($request->m_email) {
            $m_email = 1;
        } else {
            $m_email = 0;
        }

        if ($request->m_phone) {
            $m_phone = 1;
        } else {
            $m_phone = 0;
        }

        if ($request->m_designation) {
            $m_designation = 1;
        } else {
            $m_designation = 0;
        }

        if ($request->m_blood) {
            $m_blood = 1;
        } else {
            $m_blood = 0;
        }

        if ($request->m_reference) {
            $m_reference = 1;
        } else {
            $m_reference = 0;
        }

        if ($request->m_pay) {
            $m_pay = 1;
        } else {
            $m_pay = 0;
        }

        DB::table('member_show')->truncate();

        for ($i = 0; $i < count($member_id); $i++) {
            $memberData = $member_id[$i];
            DB::table('member_show')->insert(
                array(
                    'member_id' =>  $memberData,
                    'm_id' =>  $m_id,
                    'm_name' =>  $m_name,
                    'm_email' =>  $m_email,
                    'm_phone' =>  $m_phone,
                    'm_designation' =>  $m_designation,
                    'm_blood' =>  $m_blood,
                    'm_reference' =>  $m_reference,
                    'm_pay' =>  $m_pay,
                )
            );
        }
        return Redirect::back()->with(['smessage' => 'Member showing list updated']);
    }

    //saiful code
    public function view_member(Admin $admin, $id)
    {
        $userDetails = User::where('id', $id)->first();

        return view('admin.pages.viewMember', get_defined_vars());
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function edit(Admin $admin)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Admin $admin)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        $dataList = DB::table('payments')->where('id', $id)->first();
        $userdata = DB::table('users')->where('id', $dataList->member_id)->pluck('reference')->first();
        Transaction::where('transaction_id', $id)->whereIn('purpose', ['Joining', 'Renew'])->delete();
        // dd($trasel);
        if ($dataList->type == 'Joining') {
            $data['payment'] = 0;
            User::where('id', $dataList->member_id)->update($data);
        }

        if ($dataList->type == 'Joining' && !empty($userdata)) {

            Incentive::where('user_id', $dataList->member_id)->delete();
        }

        Payment::where('id', $id)->delete();
        return back()->with('Delete', 'Payment Delete Successfully');
    }

    public function approvePayment(Request $request, $id)
    {

        $userid = auth()->user()->id;

        $dataList = DB::table('payments')->where('id', $id)->first();
        $useridaddress = DB::table('users')->where('id', $dataList->member_id)->first();
        //    dd($useridaddress);
        if ($dataList->type == 'Joining' && !empty($useridaddress->reference)) {
            $membercategory_id = $useridaddress->membercategory_id;
            $member_category = memberCategory::where('id', $membercategory_id)->first();

            $percentage = $member_category->incentive * $member_category->fee / 100;

            $incentives = new Incentive();
            $incentives->user_id = $useridaddress->id;
            $incentives->user_refer_id = $useridaddress->reference;
            $incentives->percentage = $percentage;
            $incentives->save();
        }


        $transid = DB::table('transactions')->where('transaction_id', $id)->whereIn('purpose', ['Joining', 'Renew'])->count();
        if ($transid > 0) {
            $transaction['status'] = 1;
            Transaction::where('transaction_id', $id)->whereIn('purpose', ['Joining', 'Renew'])->update($transaction);
        } else {
            $transaction = new Transaction();
            $transaction->transaction_id = $id;
            $transaction->date = date('d-m-Y g:i:s A');
            $transaction->purpose = $dataList->type;
            $transaction->debit = $dataList->amount;
            $transaction->account_id = $dataList->payment_type;
            $transaction->status = 1;
            $transaction->save();
        }


        if ($dataList->type == "Joining") {
            $data['payment'] = 1;
            User::where('id', $dataList->member_id)->update($data);
            $datas['accept_status'] = 1;
            $datas['approved_by'] = $userid;
            Payment::where('id', $id)->update($datas);
        } else {
            $datas['accept_status'] = 1;
            $datas['approved_by'] = $userid;
            Payment::where('id', $id)->update($datas);
        }

        session()->flash('success', 'Payment Accepted');
        return redirect('/All-payment-list');
    }

    public function rejectPayment(Request $request, $id)
    {
        $userid = auth()->user()->id;
        $dataList = DB::table('payments')->where('id', $id)->first();

        Incentive::where('user_id', $dataList->member_id)->delete();

        $transaction['status'] = 0;
        Transaction::where('transaction_id', $id)->whereIn('purpose', ['Joining', 'Renew'])->update($transaction);

        if ($dataList->type == "Joining") {
            $data['payment'] = 0;
            User::where('id', $dataList->member_id)->update($data);
            $datas['accept_status'] = 0;
            $datas['approved_by'] = 0;
            Payment::where('id', $id)->update($datas);
        } else {
            $datas['accept_status'] = 0;
            $datas['approved_by'] = 0;
            Payment::where('id', $id)->update($datas);
        }
        session()->flash('success', 'Payment Rejected');
        return redirect('/All-payment-list');
    }

    function get_menu_list(Request $request)
    {
        $user_id = $request->user_id;
        $navigationList = DB::table('navigation')
            ->select('*')
            ->where('parent_id', 0)
            ->get();

        return view('admin/ajax/menuListShow', get_defined_vars());
    }

    public function insert_menu_accessList(Request $request)
    {
        $pid = array();
        $user_id = $request->user_id;

        $navigation = $request->navigation;
        DB::table('admin_role')->where('admin_id', $user_id)->delete();
        foreach ($navigation as $key => $value) :
            $get_parent_id = DB::table('navigation')->where('navigation_id', $value)->first();
            DB::table('admin_role')->insert([
                'admin_id' => $user_id,
                'navigation_id' => $value,
                'parent_id' => $get_parent_id->parent_id,
            ]);

        endforeach;
        $request->session()->flash('success', 'Admin Data updated !');
        return back();
    }
}
