<?php

namespace App\Http\Controllers;

use App\Models\AllowanceEmployee;
use Illuminate\Http\Request;

class AllowanceDetailController extends Controller
{
    public function store(Request $request)
    {
        $allowance=new AllowanceEmployee();
        $allowance->salary=$request->salary;
        $allowance->housing=$request->housing;
        $allowance->mobile=$request->mobile;
        $allowance->badal=$request->badal;
        $allowance->transport=$request->transport;
        $allowance->other=$request->other;
        $allowance->gosi=$request->gosi;
        $allowance->eos=$request->eos;
        $allowance->vacation=$request->vacation;
        $allowance->ticket=$request->ticket;
        $allowance->housing_allowance=$request->housing_allowance;
        $allowance->family=$request->family;

        // dd($allowance);
        $allowance->save();
        return redirect()->back()->with('success', 'Allowance form has been saved');

    }
}
