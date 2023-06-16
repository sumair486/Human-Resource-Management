<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Models\Loan;
use App\Models\Loan_Type;

use Illuminate\Http\Request;

class LoanController extends Controller
{
    public function index()
    {
        $emp=Employee::all();
        $loan_type=Loan_Type::all();
        return view('loan.loan',compact('loan_type','emp'));
    }

    public function store(Request $request)
    {
        $loan=new Loan();
        $loan->ref=$request->ref;
        $loan->date=$request->date;
        $loan->hijri=$request->hijri;
        $loan->emp_code=$request->emp_code;
        $loan->name=$request->name;
        $loan->type_loan=$request->type_loan;
        $loan->amount=$request->amount;
        $loan->installment=$request->installment;
        $loan->monthly=$request->monthly;
        $loan->ded_starting=$request->ded_starting;
        $loan->unpaid=$request->unpaid;
        $loan->balance_amount=$request->balance_amount;

        $loan->req_by=$request->req_by;
        $loan->approved=$request->approved;
        $loan->req_date=$request->req_date;
        $loan->date_h=$request->date_h;
        $loan->date_req=$request->date_req;
        $loan->date_h1=$request->date_h1;

        $loan->remark=$request->remark;
        $loan->remark_2=$request->remark_2;
        // dd($loan);
        $loan->save();
        return redirect()->back()->with('success', 'Loan Record has been saved');





    }

    public function show()
    {
        $loan=Loan::all();
        return view('loan.index',compact('loan'));
    }

    public function destroy($id)
    {
        $loan=Loan::find($id);
        if(!is_null($loan)){
            $loan->delete();
            return redirect()->back()->with('success','Successfully deleted');
        }
    }


}
