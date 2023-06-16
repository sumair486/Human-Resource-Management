<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payslip extends Model
{
    use HasFactory;


    protected $fillable = [
        'date',
        'department',
        'employee_no',
        'emp_name',
        'days_work',
        'overtime',

        'basic_monthly_pay',
        'housing',
        'transportation',
        'food',
        'overtime_hour',
        'other',
        'total',
        'absent',
        'gosi',
        'personal_loan',
        'late_penality',
        'other_ded',
        'car_loan',
        'total_deduction',
        'net_total',
    ];


}
