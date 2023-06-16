<?php

namespace App\Http\Controllers;

use App\Models\Setting_Department;
use Illuminate\Http\Request;

use App\Models\Payslip;
use \PDF;
use App\Models\Employee;
use Illuminate\Support\Facades\DB;

class PayslipController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $payslips = Payslip::all();

        return view('payslip.list', compact('payslips'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $department=Setting_Department::all();
        $emp=Employee::all();
        $employee=Employee::all();
        $employees = DB::table('employees')->select('*')->get();

        return view('payslip.create', compact('employees','emp','department','employee'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'date' => 'required',
            'department' => 'required',
            'employee_no' => 'required',
            'emp_name' => 'required',
            'days_work' => 'required',
            'overtime' => 'required',

            'basic_monthly_pay' => 'required',
            'housing' => 'required',
            'transportation' => 'required',
            'food' => 'required',
            'overtime_hour' => 'required',
            'other' => 'required',
            'total' => 'required',
            'absent' => 'required',
            'gosi' => 'required',
            'personal_loan' => 'required',
            'late_penality' => 'required',
            'other_ded' => 'required',
            'car_loan' => 'required',
            'total_deduction' => 'required',
            'net_total' => 'required',

        ]);

        Payslip::create([

            'date' => $request->date,
            'department' => $request->department,
            'employee_no' => $request->employee_no,
            'emp_name' => $request->emp_name,
            'days_work' => $request->days_work,
            'overtime' => $request->overtime,

            'basic_monthly_pay' => $request->basic_monthly_pay,
            'housing' => $request->housing,
            'transportation' => $request->transportation,
            'food' => $request->food,
            'overtime_hour' => $request->overtime_hour,
            'other' => $request->other,
            'total' => $request->total,
            'absent' => $request->absent,
            'gosi' => $request->gosi,
            'personal_loan' => $request->personal_loan,
            'late_penality' => $request->late_penality,
            'other_ded' => $request->other_ded,
            
            'car_loan' => $request->car_loan,
            'total_deduction' => $request->total_deduction,
            'net_total' => $request->net_total,
        ]);

        return redirect()->back()->with('success', 'Record has been saved');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $payslip = Payslip::find($id);

        return view('payslip.show', compact('payslip'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $payslip = Payslip::find($id)->delete();

        return redirect('payslip')->with('delete', 'Record has been deleted');
    }


    public function generatePDF($id)
    {
        $payslip = Payslip::find($id);

        $data = [
            'date' => $payslip->date,
            'employee_no' => $payslip->employee->employee_no,
            'first_name' => $payslip->employee->first_name,
            'middle_name' => $payslip->employee->middle_name,
            'last_name' => $payslip->employee->last_name,
            'mobile_no' => $payslip->employee->mobile_no,
            'cnic' => $payslip->employee->cnic,
            'email' => $payslip->employee->email,
            'basic_monthly_pay' => $payslip->basic_monthly_pay,
            'bonus' => $payslip->bonus,
            'payable_amount' => $payslip->payable_amount,
            'hours_deduction' => $payslip->hours_deduction,
            'total' => $payslip->total,
            'payment_method' => $payslip->payment_method,
        ];

        // dd($data);

        $pdf = PDF::loadView('backend.payslip.generate_pdf', $data);

        return $pdf->download('payslip.pdf');

        // return view('backend.payslip.generate_pdf', $data);
    }
    
      public function employeeSalary(Request $request){

        // dd($request->employee_id);
        $id = $request->employee_id;

        $employee = Employee::where('id', $id)->select('salary')->first();

        return json_encode($employee);

    }



}
