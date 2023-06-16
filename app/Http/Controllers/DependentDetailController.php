<?php

namespace App\Http\Controllers;

use App\Models\DependentEmployee;
use Illuminate\Http\Request;

class DependentDetailController extends Controller
{
    public function store(Request $request)
    {
        $dependent=new DependentEmployee();
        $dependent->name=$request->name;
        $dependent->relation=$request->relation;
        $dependent->dob=$request->dob;
        $dependent->passport_no=$request->passport_no;
        $dependent->pass_issue_date=$request->pass_issue_date;
        $dependent->pass_expiry_date=$request->pass_expiry_date;
        $dependent->save();
        return redirect()->back()->with('success', 'Dependent form has been saved');
        

    }
}
