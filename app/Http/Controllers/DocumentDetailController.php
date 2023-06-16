<?php

namespace App\Http\Controllers;

use App\Models\DocumentEmployee;
use Illuminate\Http\Request;

class DocumentDetailController extends Controller
{
    public function store(Request $request)
    {
        $document=new DocumentEmployee();
        $document->passport=$request->passport;
        $document->passport_issuedate=$request->passport_issuedate;
        $document->passport_expdate=$request->passport_expdate;
        $document->passport_issueat=$request->passport_issueat;
        $document->Iqama=$request->Iqama;
        $document->Iqama_issuedate=$request->Iqama_issuedate;
        $document->Iqama_expdate=$request->Iqama_expdate;
        $document->Iqama_issueat=$request->Iqama_issueat;
        $document->work=$request->work;
        $document->work_issuedate=$request->work_issuedate;
        $document->work_expdate=$request->work_expdate;
        $document->work_issueat=$request->work_issueat;
        $document->driving=$request->driving;
        $document->driving_issuedate=$request->driving_issuedate;
        $document->driving_expdate=$request->driving_expdate;
        $document->driving_issueat=$request->driving_issueat;
        $document->vehicle=$request->vehicle;
        $document->vehicle_issuedate=$request->vehicle_issuedate;
        $document->vehicle_expdate=$request->vehicle_expdate;
        $document->vehicle_issueat=$request->vehicle_issueat;
        $document->gosi=$request->gosi;
        $document->gosi_issuedate=$request->gosi_issuedate;
        $document->gosi_issueat=$request->gosi_issueat;
        $document->profession=$request->profession;
        // dd($document);
        $document->save();
        return redirect()->back()->with('success', 'Document form has been saved');


    }
}
