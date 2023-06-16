<?php

namespace App\Http\Controllers;

use App\Models\Branches;
use App\Models\Department;
use App\Models\Position;
use App\Models\Vacation;
use App\Models\Vacation_entry;
use App\Models\Vacation_inquiry;
use App\Models\Vacation_salary;
use App\Models\Vacation_Type;
use Illuminate\Http\Request;

class Vacation_module extends Controller
{
    public function index()
    {
        $vacation_ent=Vacation_entry::all();

        $vacation_entry=Vacation_Type::all();
        return view('vacation_module.vacation_entry.vacation_entry',compact('vacation_entry','vacation_ent'));
    }

    public function store(Request $request)
    {
        $vacation_entry=new Vacation_entry;
        $vacation_entry->ref_no = $request->ref_no;
        $vacation_entry->date_g=$request->date_g;
        $vacation_entry->date_hijri=$request->date_hijri;
        $vacation_entry->employee_code=$request->employee_code;
        $vacation_entry->name=$request->name;
        $vacation_entry->vacation_type=$request->vacation_type;
        $vacation_entry->vacation_days=$request->vacation_days;
        $vacation_entry->vacation_starting_days=$request->vacation_starting_days;
        $vacation_entry->approved_days=$request->approved_days;
        $vacation_entry->vacation_starting_days_h=$request->vacation_starting_days_h;
        $vacation_entry->vacation_end_days=$request->vacation_end_days;
        $vacation_entry->days_request=$request->days_request;
        $vacation_entry->vacation_end_days_h=$request->vacation_end_days_h;
        $vacation_entry->days_consumed=$request->days_consumed;
        $vacation_entry->last_vacation_days=$request->last_vacation_days;
        $vacation_entry->balance_days=$request->balance_days;
        $vacation_entry->req_by=$request->req_by;
        $vacation_entry->req_date=$request->req_date;
        $vacation_entry->req_date_h=$request->req_date_h;
        $vacation_entry->remark_1=$request->remark_1;
        $vacation_entry->approved_by=$request->approved_by;
        $vacation_entry->date=$request->date;
        $vacation_entry->date_h=$request->date_h;
        $vacation_entry->remark=$request->remark;
        $vacation_entry->save();
        return redirect()->back()->with('success','Successfully  Submiited');

    }

    public function destroy($id)
    {
        $loan=Vacation_entry::find($id);
        if(!is_null($loan)){
            $loan->delete();
            return redirect()->back()->with('success','Successfully deleted');
        }
    }

    //vacation inquiry
    
    public function inquiry_index()
    {
        $vacation_inq=Vacation_inquiry::all();

        $position=Position::all();
        return view('vacation_module.vacation_inquiry.vacation_inquiry',compact('position','vacation_inq'));
    }

    public function inquiry_store(Request $request)
    {
        $vacation_inquiry=new Vacation_inquiry();
        $vacation_inquiry->employee=$request->employee;
        $vacation_inquiry->basic=$request->basic;
        $vacation_inquiry->name=$request->name;
        $vacation_inquiry->housing=$request->housing;
        $vacation_inquiry->division=$request->division;
        $vacation_inquiry->car_allowance=$request->car_allowance;
        $vacation_inquiry->position=$request->position;
        $vacation_inquiry->food_allowance=$request->food_allowance;
        $vacation_inquiry->join_date=$request->join_date;
        $vacation_inquiry->transport=$request->transport;
        $vacation_inquiry->other_allowance=$request->other_allowance;
        $vacation_inquiry->last_leave_date=$request->last_leave_date;
        $vacation_inquiry->current_leave_date=$request->current_leave_date;
        $vacation_inquiry->last_leave_return_date=$request->last_leave_return_date;
        $vacation_inquiry->balance_brought=$request->balance_brought;
        $vacation_inquiry->balance_after_last=$request->balance_after_last;
        $vacation_inquiry->due_from_last=$request->due_from_last;
        $vacation_inquiry->total_due=$request->total_due;
        $vacation_inquiry->amount_due=$request->amount_due;
        $vacation_inquiry->save();
        return redirect()->back()->with('success','Successfully Submitted');
    }

    public function destroy_inquiry($id)
    {
        $loan=Vacation_inquiry::find($id);
        if(!is_null($loan)){
            $loan->delete();
            return redirect()->back()->with('success','Successfully deleted');
        }
    }

    

    public function salary_index()
    {
        $vacation_sal=Vacation_salary::all();
        $branch=Branches::all();
        $department=Department::all();

        return view('vacation_module.vacation_salary.vacation_salary',compact('branch','department','vacation_sal'));
    }

    public function salary_store(Request $request)
    {
        $vacation_salary=new Vacation_salary();
        $vacation_salary->ref_no=$request->ref_no;
        $vacation_salary->date=$request->date;
        $vacation_salary->hijri=$request->hijri;
        $vacation_salary->ref_vacation_no=$request->ref_vacation_no;
        $vacation_salary->emp_code=$request->emp_code;
        $vacation_salary->name=$request->name;
        $vacation_salary->ref_vacation_date=$request->ref_vacation_date;
        $vacation_salary->ref_no=$request->ref_no;
        $vacation_salary->join_date=$request->join_date;
        $vacation_salary->last_day=$request->last_day;
        $vacation_salary->vacation_start=$request->vacation_start;
        $vacation_salary->paid_day=$request->paid_day;
        $vacation_salary->vacation_end=$request->vacation_end;
        $vacation_salary->unpaid_days=$request->unpaid_days;
        $vacation_salary->balance_days=$request->balance_days;
        $vacation_salary->public_holidays=$request->public_holidays;
        $vacation_salary->total_consumed=$request->total_consumed;
        $vacation_salary->total_leave_day=$request->total_leave_day;
        $vacation_salary->back_duty=$request->back_duty;
        $vacation_salary->total_regular_salary=$request->total_regular_salary;
        $vacation_salary->total_vacation_salary=$request->total_vacation_salary;
        $vacation_salary->net_salary=$request->net_salary;
        $vacation_salary->payment_vacation=$request->payment_vacation;
        $vacation_salary->save();
        return redirect()->back()->with('success','Successfully Submitted');

    }

    public function destroy_salary($id)
    {
        $loan=Vacation_salary::find($id);
        if(!is_null($loan)){
            $loan->delete();
            return redirect()->back()->with('success','Successfully deleted');
        }
    }



}
