<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Rules;
use Illuminate\Foundation\Auth\RegistersUsers;
use Validator;
use Illuminate\Support\Facades\Hash;
use Auth;
use DB;

class RulesController extends Controller {

    public function rules(Rules $rules) {
        $rules = Rules::get();
        return view('admin.pages.rules', get_defined_vars());
    }

    public function addrules(Rules $rules) {
        return view('admin.pages.addRules', get_defined_vars());
    }

    public function storeRulses(Request $request) {
      
//        $this->validate($rules, [
//            'rules' => 'required',
//        ]);
        

        $rul = new Rules();
        $rul->rules = $request->rules;
        $rul->save();

        session()->flash('success', 'New Rules Updated Successfully.');
        return redirect('/Rules');
    }

}
