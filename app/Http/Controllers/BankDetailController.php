<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\BankEmployee;

class BankDetailController extends Controller
{
    public function store(Request $request)
    {
        $bank=new BankEmployee();
        $bank->bank_name=$request->bank_name;
        $bank->account_no=$request->account_no;
        $bank->branch_name=$request->branch_name;
        $bank->account_code=$request->account_code;
        $bank->bank_code=$request->bank_code;
        $bank->note=$request->note;
        $bank->summary=$request->summary;
        $bank->reason=$request->reason;

        $bank->save();
        return redirect()->back()->with('success', 'Bank Record has been saved');
}
}
