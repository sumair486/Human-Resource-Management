<?php

namespace App\Http\Controllers;

use App\Models\Absent;
use Illuminate\Http\Request;
use App\Models\Insurance;
use App\Models\LateDeduction;
use App\Models\OverTime;
use App\Models\Service;
use App\Models\Ticket;
use App\Models\Vacation;


use Illuminate\Support\Facades\DB;
class SetupController extends Controller
{
//qualification


public function insurance_index()
{
    $insurance = DB::table('insurances')->get();

    return view('setup.insurance.insurance', compact('insurance'));
   
}

public function insurance_store(Request $request)
{
    $this->validate($request, [
        'name' => 'required',
        'arabic_name' => 'required',
    ]);

    DB::table('insurances')->insert([
        'name' => $request->name,
        'arabic_name' => $request->arabic_name,
        'company' => $request->company,
        'staff' => $request->staff,
        'created_at' => \Carbon\Carbon::now(),
        'updated_at' => \Carbon\Carbon::now(),
    ]);

    return redirect()->back()->with('success', 'Record submitted successfully');
}
  
public function insuranceModuleEdit($id)
{
    $insurance = DB::table('insurances')->where('id', $id)->first();

    return response()->json($insurance);
}

public function insuranceModuleUpdate(Request $request, $id)
{
    $insurance = DB::table('insurances')
    ->where('id', $id)
    ->update([
        'name' => $request->name,
        'arabic_name' => $request->arabic_name,
        'company' => $request->company,
        'staff' => $request->staff,

    ]);

    return response()->json($insurance);
}

public function insuranceModuleDestory($id)
{
    DB::table('insurances')->where('id', $id)->delete();

    return response()->json([
        'message' => 'Record deleted successfully!',
    ]);
}

public function insurance_Inactive($id)
{ 
$data=Insurance::find($id);
$data->status='In-active';
$data->save();
return redirect()->back();

}

public function insurance_active($id)
{
$data=Insurance::find($id);
$data->status='Active';
$data->save();
return redirect()->back();

}

//end of service


public function service_index()
{
    $service = DB::table('services')->get();

    return view('setup.service.end_of_service', compact('service'));
   
}

public function service_store(Request $request)
{
    $this->validate($request, [
        'name' => 'required',
        'arabic_name' => 'required',
    ]);

    DB::table('services')->insert([
        'name' => $request->name,
        'arabic_name' => $request->arabic_name,
        'service_less_than_5' => $request->service_less_than_5,
        'service_more_than_5' => $request->service_more_than_5,
        'service_more_than_10' => $request->service_more_than_10,
        'days_in_year' => $request->days_in_year,
        'created_at' => \Carbon\Carbon::now(),
        'updated_at' => \Carbon\Carbon::now(),
    ]);

    return redirect()->back()->with('success', 'Record submitted successfully');
}
  
public function serviceModuleEdit($id)
{
    $service = DB::table('services')->where('id', $id)->first();

    return response()->json($service);
}

public function serviceModuleUpdate(Request $request, $id)
{
    $service = DB::table('services')
    ->where('id', $id)
    ->update([
        'name' => $request->name,
        'arabic_name' => $request->arabic_name,
        'service_less_than_5' => $request->service_less_than_5,
        'service_more_than_5' => $request->service_more_than_5,
        'service_more_than_10' => $request->service_more_than_10,
        'days_in_year' => $request->days_in_year,

    ]);

    return response()->json($service);
}

public function serviceModuleDestory($id)
{
    DB::table('services')->where('id', $id)->delete();

    return response()->json([
        'message' => 'Record deleted successfully!',
    ]);
}

public function service_Inactive($id)
{ 
$data=Service::find($id);
$data->status='In-active';
$data->save();
return redirect()->back();

}

public function service_active($id)
{
$data=Service::find($id);
$data->status='Active';
$data->save();
return redirect()->back();

}


//vacation

public function vacation_index()
{
    $vacation = DB::table('vacations')->get();

    return view('setup.vacation.vacation', compact('vacation'));
   
}

public function vacation_store(Request $request)
{
    $this->validate($request, [
        'name' => 'required',
        'arabic_name' => 'required',
    ]);

    DB::table('vacations')->insert([
        'name' => $request->name,
        'arabic_name' => $request->arabic_name,
        'vacation_days' => $request->vacation_days,
        'leave_salary' => $request->leave_salary,
        'created_at' => \Carbon\Carbon::now(),
        'updated_at' => \Carbon\Carbon::now(),
    ]);

    return redirect()->back()->with('success', 'Record submitted successfully');
}
  
public function vacationModuleEdit($id)
{
    $vacation = DB::table('vacations')->where('id', $id)->first();

    return response()->json($vacation);
}

public function vacationModuleUpdate(Request $request, $id)
{
    $vacation = DB::table('vacations')
    ->where('id', $id)
    ->update([
        'name' => $request->name,
        'arabic_name' => $request->arabic_name,
        'vacation_days' => $request->vacation_days,
        'leave_salary' => $request->leave_salary,

    ]);

    return response()->json($vacation);
}

public function vacationModuleDestory($id)
{
    DB::table('vacations')->where('id', $id)->delete();

    return response()->json([
        'message' => 'Record deleted successfully!',
    ]);
}

public function vacation_Inactive($id)
{ 
$data=Vacation::find($id);
$data->status='In-active';
$data->save();
return redirect()->back();

}

public function vacation_active($id)
{
$data=Vacation::find($id);
$data->status='Active';
$data->save();
return redirect()->back();

}


//ticket


public function ticket_index()
{
    $ticket = DB::table('tickets')->get();

    return view('setup.ticket.ticket', compact('ticket'));
   
}

public function ticket_store(Request $request)
{
    $this->validate($request, [
        'name' => 'required',
        'arabic_name' => 'required',
        'no_of_ticket' => 'required',
        'fixed_amount' => 'required',
        'remark' => 'required',
    ]);

    DB::table('tickets')->insert([
        'name' => $request->name,
        'arabic_name' => $request->arabic_name,
        'no_of_ticket' => $request->no_of_ticket,
        'fixed_amount' => $request->fixed_amount,
        'distribute_salary' => $request->distribute_salary,
        'remark' => $request->remark,
        'created_at' => \Carbon\Carbon::now(),
        'updated_at' => \Carbon\Carbon::now(),
    ]);

    return redirect()->back()->with('success', 'Record submitted successfully');
}
  
public function ticketModuleEdit($id)
{
    $ticket = DB::table('tickets')->where('id', $id)->first();

    return response()->json($ticket);
}

public function ticketModuleUpdate(Request $request, $id)
{
    $ticket = DB::table('tickets')
    ->where('id', $id)
    ->update([
        'name' => $request->name,
        'arabic_name' => $request->arabic_name,
        'no_of_ticket' => $request->no_of_ticket,
        'fixed_amount' => $request->fixed_amount,
        'distribute_salary' => $request->distribute_salary,
        'remark' => $request->remark,

    ]);

    return response()->json($ticket);
}

public function ticketModuleDestory($id)
{
    DB::table('tickets')->where('id', $id)->delete();

    return response()->json([
        'message' => 'Record deleted successfully!',
    ]);
}

public function ticket_Inactive($id)
{ 
$data=Ticket::find($id);
$data->status='In-active';
$data->save();
return redirect()->back();

}

public function ticket_active($id)
{
$data=Ticket::find($id);
$data->status='Active';
$data->save();
return redirect()->back();

}


//overtime


public function overtime_index()
{
    $overtime = DB::table('over_times')->get();

    return view('setup.overtime.overtime', compact('overtime'));
   
}

public function overtime_store(Request $request)
{
    $this->validate($request, [
        'name' => 'required',
        'arabic_name' => 'required',
        'calculate' => 'required',

    ]);

    DB::table('over_times')->insert([
        'name' => $request->name,
        'arabic_name' => $request->arabic_name,
        'calculate' => $request->calculate,
        'created_at' => \Carbon\Carbon::now(),
        'updated_at' => \Carbon\Carbon::now(),
    ]);

    return redirect()->back()->with('success', 'Record submitted successfully');
}
  
public function overtimeModuleEdit($id)
{
    $overtime = DB::table('over_times')->where('id', $id)->first();

    return response()->json($overtime);
}

public function overtimeModuleUpdate(Request $request, $id)
{
    $overtime = DB::table('over_times')
    ->where('id', $id)
    ->update([
        'name' => $request->name,
        'arabic_name' => $request->arabic_name,
        'calculate' => $request->calculate,
    ]);

    return response()->json($overtime);
}

public function overtimeModuleDestory($id)
{
    DB::table('over_times')->where('id', $id)->delete();

    return response()->json([
        'message' => 'Record deleted successfully!',
    ]);
}

public function overtime_Inactive($id)
{ 
$data=OverTime::find($id);
$data->status='In-active';
$data->save();
return redirect()->back();

}

public function overtime_active($id)
{
$data=OverTime::find($id);
$data->status='Active';
$data->save();
return redirect()->back();

}

//absent


public function absent_index()
{
    $absent = DB::table('absents')->get();

    return view('setup.absent.absent', compact('absent'));
   
}

public function absent_store(Request $request)
{
    $this->validate($request, [
        'name' => 'required',
        'arabic_name' => 'required',
        'deduction_for_first_day' => 'required',
        'second_day_onward' => 'required',


    ]);

    DB::table('absents')->insert([
        'name' => $request->name,
        'arabic_name' => $request->arabic_name,
        'deduction_for_first_day' => $request->deduction_for_first_day,
        'second_day_onward' => $request->second_day_onward,
        'entry_date' => $request->entry_date,
        'start_date' => $request->start_date,
        'end_date' => $request->end_date,
        'total_days' => $request->total_days,

        'created_at' => \Carbon\Carbon::now(),
        'updated_at' => \Carbon\Carbon::now(),
    ]);

    return redirect()->back()->with('success', 'Record submitted successfully');
}
  
public function absentModuleEdit($id)
{
    $absent = DB::table('absents')->where('id', $id)->first();

    return response()->json($absent);
}

public function absentModuleUpdate(Request $request, $id)
{
    $absent = DB::table('absents')
    ->where('id', $id)
    ->update([
        'name' => $request->name,
        'arabic_name' => $request->arabic_name,
        'deduction_for_first_day' => $request->deduction_for_first_day,
        'second_day_onward' => $request->second_day_onward,
        'entry_date' => $request->entry_date,
        'start_date' => $request->start_date,
        'end_date' => $request->end_date,
        'total_days' => $request->total_days,

    ]);

    return response()->json($absent);
}

public function absentModuleDestory($id)
{
    DB::table('absents')->where('id', $id)->delete();

    return response()->json([
        'message' => 'Record deleted successfully!',
    ]);
}

public function absent_Inactive($id)
{ 
$data=Absent::find($id);
$data->status='In-active';
$data->save();
return redirect()->back();

}

public function absent_active($id)
{
$data=Absent::find($id);
$data->status='Active';
$data->save();
return redirect()->back();

}

//late deduction:




public function latededuction_index()
{
    $latededuction = DB::table('late_deductions')->get();

    return view('setup.latededuction.latededuction', compact('latededuction'));
   
}

public function latededuction_store(Request $request)
{
    $this->validate($request, [
        'name' => 'required',
        'arabic_name' => 'required',
        'consider' => 'required',
        'first_day_1' => 'required',
        'second_day_1' => 'required',
        'third_day_1' => 'required',
        'fourth_day_1' => 'required',
        'first_day_2' => 'required',
        'second_day_2' => 'required',
        'third_day_2' => 'required',
        'fourth_day_2' => 'required',
        'first_day_3' => 'required',
        'second_day_3' => 'required',
        'third_day_3' => 'required',
        'fourth_day_3' => 'required',
        'first_day_4' => 'required',
        'second_day_4' => 'required',
        'third_day_4' => 'required',
        'fourth_day_4' => 'required',



    ]);

    DB::table('late_deductions')->insert([
        'name' => $request->name,
        'arabic_name' => $request->arabic_name,
        'consider' => $request->consider,
        'rate_1' => $request->rate_1,
        'first_day_1' => $request->first_day_1,
        'second_day_1' => $request->second_day_1,
        'third_day_1' => $request->third_day_1,
        'fourth_day_1' => $request->fourth_day_1,
        'first_day_2' => $request->first_day_2,
        'second_day_2' => $request->second_day_2,
        'third_day_2' => $request->third_day_2,
        'fourth_day_2' => $request->fourth_day_2,
        'first_day_3' => $request->first_day_3,
        'second_day_3' => $request->second_day_3,
        'third_day_3' => $request->third_day_3,
        'fourth_day_3' => $request->fourth_day_3,
        'first_day_4' => $request->first_day_4,
        'second_day_4' => $request->second_day_4,
        'third_day_4' => $request->third_day_4,
        'fourth_day_4' => $request->fourth_day_4,
        'created_at' => \Carbon\Carbon::now(),
        'updated_at' => \Carbon\Carbon::now(),
    ]);

    return redirect()->back()->with('success', 'Record submitted successfully');
}
  
public function latedeductionModuleEdit($id)
{
    $latededuction = DB::table('late_deductions')->where('id', $id)->first();

    return response()->json($latededuction);
}

public function latedeductionModuleUpdate(Request $request, $id)
{
    $latededuction = DB::table('late_deductions')
    ->where('id', $id)
    ->update([
        'name' => $request->name,
        'arabic_name' => $request->arabic_name,
        'consider' => $request->consider,
        'rate_1' => $request->rate_1,
        'first_day_1' => $request->first_day_1,
        'second_day_1' => $request->second_day_1,
        'third_day_1' => $request->third_day_1,
        'fourth_day_1' => $request->fourth_day_1,
        'first_day_2' => $request->first_day_2,
        'second_day_2' => $request->second_day_2,
        'third_day_2' => $request->third_day_2,
        'fourth_day_2' => $request->fourth_day_2,
        'first_day_3' => $request->first_day_3,
        'second_day_3' => $request->second_day_3,
        'third_day_3' => $request->third_day_3,
        'fourth_day_3' => $request->fourth_day_3,
        'first_day_4' => $request->first_day_4,
        'second_day_4' => $request->second_day_4,
        'third_day_4' => $request->third_day_4,
        'fourth_day_4' => $request->fourth_day_4,
    ]);

    return response()->json($latededuction);
}

public function latedeductionModuleDestory($id)
{
    DB::table('late_deductions')->where('id', $id)->delete();

    return response()->json([
        'message' => 'Record deleted successfully!',
    ]);
}

public function latededuction_Inactive($id)
{ 
$data=LateDeduction::find($id);
$data->status='In-active';
$data->save();
return redirect()->back();

}

public function latededuction_active($id)
{
$data=LateDeduction::find($id);
$data->status='Active';
$data->save();
return redirect()->back();

}


}
