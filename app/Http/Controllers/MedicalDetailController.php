<?php

namespace App\Http\Controllers;

use App\Models\MedicalEmployee;
use Illuminate\Http\Request;

class MedicalDetailController extends Controller
{
    public function store(Request $request)
    {
        $medical=new MedicalEmployee();
        $medical->med_card=$request->med_card;
        $medical->issue_date=$request->issue_date;
        $medical->exp_date=$request->exp_date;
        $medical->company=$request->company;
        $medical->class=$request->class;
        $medical->blood=$request->blood;
        $medical->notes=$request->notes;
        $medical->plate_no=$request->plate_no;
        $medical->asset_no=$request->asset_no;
        $medical->vechile=$request->vechile;
        $medical->req_by=$request->req_by;

        $medical->isthimara_issue=$request->isthimara_issue;
        $medical->isthimara_expiry=$request->isthimara_expiry;
        $medical->note=$request->note;
        $medical->save();
        return redirect()->back()->with('success', 'Medical Record has been saved');


    }
}
