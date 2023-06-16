<?php

namespace App\Http\Controllers;

use App\Models\AllowanceEmployee;
use App\Models\Employee;
use App\Models\Loan;
use App\Models\Service;
use App\Models\Ticket;
use App\Models\Vacation;



use App\Models\Payslip;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ReportController extends Controller
{
    public function status_index()
    {
        $employee_status=Employee::all();
        return view('report.employee_status',compact('employee_status'));
    }

    public function allowance_index()
    {
   
        $employee_allownace=Employee::all();
        return view('report.employee_allowance',compact('employee_allownace'));

    }

    public function document_index()
    {
   
        $employee_document=Employee::all();
        return view('report.employee_document',compact('employee_document'));

    }

    public function absent_index()
    {
   
        $employee_absent = DB::table('employees')
        ->join('absents', 'employees.id', '=', 'absents.id')
        ->select('*')
        ->get();
// dd($employee_absent);
        return view('report.absent',compact('employee_absent'));

    }

    public function loan_index()
    {
   
        $loan=Loan::all();
        return view('report.employee_loan',compact('loan'));

    }

    public function payroll_index()
    {
   
        $payroll=Payslip::all();
        return view('report.employee_payroll',compact('payroll'));

    }


    public function accural_index()
    {
   
        $monthly_accural = DB::table('employees')
        ->join('vacations', 'employees.id', '=', 'vacations.id')
        // ->join('services', 'employees.id', '=', 'services.id')
        ->join('tickets', 'employees.id', '=', 'tickets.id')
        ->select('employees.*', 'vacations.*', 'tickets.*')
        ->get();
    
    
        // dd($monthly_accural);
        return view('report.employee_monthly_accural',compact('monthly_accural'));

    }

    public function account_index()
    {
   
        $account=Employee::all();
        return view('report.employee_account',compact('account'));

    }

}
