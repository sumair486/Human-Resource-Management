<?php

namespace App\Http\Controllers;

use App\Models\ContractDetail;
use Illuminate\Http\Request;

class ContractDetaileController extends Controller
{
    public function store(Request $request)
    {
        $contract=new ContractDetail();
        $contract->contract_period=$request->contract_period;
        $contract->join_date=$request->join_date;
        $contract->expiry_date=$request->expiry_date;
        $contract->active_form=$request->active_form;
        $contract->family_mamber=$request->family_mamber;
        $contract->no_of_ticket=$request->no_of_ticket;
        $contract->ticket_values=$request->ticket_values;
        $contract->total=$request->total;
        $contract->notes=$request->notes;
        $contract->company=$request->company;
        $contract->division=$request->division;
        $contract->branch=$request->branch;
        $contract->department=$request->department;
        $contract->job_title=$request->job_title;
        $contract->category=$request->category;
        $contract->allocation=$request->allocation;
        $contract->gl_code=$request->gl_code;
        $contract->for_index=$request->for_index;
        $contract->hijri_1=$request->hijri_1;
        $contract->hijri_2=$request->hijri_2;
        $contract->statuses=$request->statuses;
        // dd($contract);
        $contract->save();
        return redirect()->back()->with('success', 'Contract form has been saved');


    }
}
