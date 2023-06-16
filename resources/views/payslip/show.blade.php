@extends('layouts.master')
@section('title', 'Payslip')
@section('page-style')
<link rel="stylesheet" href="{{asset('assets/plugins/jquery-datatable/dataTables.bootstrap4.min.css')}}"/>
 <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet">
@stop
@section('content')




<div class="row clearfix">
    <div class="col-lg-12">
        <div class="card">
            <div class="header">
                <h2>Payslip</h2>
                <ul class="header-dropdown">
                    <li class="remove">
                        <a role="button" class="boxs-close"><i class="zmdi zmdi-close"></i></a>
                    </li>
                </ul>
            </div>
            <div class="body">
                <div class="table-responsive">
                    {{-- start --}}
                    <div class="container-fluid">
                        <div class="row">
                            <div style="text-align: center" class="col-md-12">
                                <div style="display: flex;justify-content: space-around" class="main">
                                    <div>
                                <h3>Employee Pay Slip</h3>
                                <span>For the Month of {{ $payslip->date }}</span>

                                <div>
                                    <label>Department :</label>
                                    <span>{{ $payslip->department }}</span>
                                </div>

                                <div>
                                    <label>Employee No :</label>
                                    <span> {{ $payslip->employee_no }}</span>
                                </div>

                                <div>
                                    <label>Employee Name :</label>
                                    <span>{{ $payslip->emp_name }}</span>
                                </div>

                                <div>
                                    <label>Days Worked :</label>
                                    <span>{{ $payslip->days_work }}</span>
                                </div>

                                <div>
                                    <label>Overtime Hours :</label>
                                    <span>{{ $payslip->overtime }}</span>
                                </div>
                            </div>


                            <div>
                                <h3>Employee Pay Slip</h3>
                                <span>For the Month of {{ $payslip->date }}</span>

                                <div>
                                    <label>Department :</label>
                                    <span>{{ $payslip->department }}</span>
                                </div>

                                <div>
                                    <label>Employee No :</label>
                                    <span> {{ $payslip->employee_no }} :</span>
                                </div>

                                <div>
                                    <label>Employee Name :</label>
                                    <span>{{ $payslip->emp_name }}</span>
                                </div>

                                <div>
                                    <label>Days Worked :</label>
                                    <span>{{ $payslip->days_work }}</span>
                                </div>

                                <div>
                                    <label>Overtime Hours :</label>
                                    <span>{{ $payslip->overtime }}</span>
                                </div>
                            </div>



                            </div>

                                
                                
                                <div style="display: flex;justify-content:space-around"  class="table-responsive-md">

                                <div class="table-responsive-md">
                                    <table  class="table">
                                    <h3>GROSS PAY</h3>

                                    <tr>
                                        <th>Bank Salary</th>
                                        <th>{{ $payslip->basic_monthly_pay }}</th>
                                        <th>Bank Salary</th>
                                    </tr>
                                    <tr>
                                        <th>Housing</th>
                                        <th>{{ $payslip->housing }}</th>
                                        <th>Housing</th>
                                    </tr>
                                    <tr>
                                        <th>Transportation</th>
                                        <th>{{ $payslip->transportation }}</th>
                                        <th>Transportation</th>
                                    </tr>
                                    <tr>
                                        <th>Food All</th>
                                        <th>{{ $payslip->food }}</th>
                                        <th>Food All</th>
                                    </tr>
                                    <tr>
                                        <th>Overtime</th>
                                        <th>{{ $payslip->overtime_hour }}</th>
                                        <th>Overtime</th>
                                    </tr>
                                    <tr>
                                        <th>Others</th>
                                        <th>{{ $payslip->other }}</th>
                                        <th>Others</th>
                                    </tr>

                                    <tr>
                                        <th>Gross Pay</th>
                                        <th>{{ $payslip->total }}</th>
                                        <th>Gross Pay</th>
                                    </tr>
                                    
                                    </table>
                                </div>


                                <div class="table-responsive-md">
                                    <table  class="table ">
                                    <h3>DEDUCTION</h3>

                                    <tr>
                                        <th>Absent</th>
                                        <th>{{ $payslip->absent }}</th>
                                        <th>Bank Salary</th>
                                    </tr>
                                    <tr>
                                        <th>Gosi</th>
                                        <th>{{ $payslip->gosi }}</th>
                                        <th>Bank Salary</th>
                                    </tr>
                                    <tr>
                                        <th>Personal Loans</th>
                                        <th>{{ $payslip->personal_loan }}</th>
                                        <th>Personal Loans</th>
                                    </tr>
                                    <tr>
                                        <th>Late Penality</th>
                                        <th>{{ $payslip->late_penality }}</th>
                                        <th>Late Penality</th>
                                    </tr>
                                    <tr>
                                        <th>Others</th>
                                        <th>{{ $payslip->other_ded }}</th>
                                        <th>Others</th>
                                    </tr>
                                    <tr>
                                        <th>Car Loans</th>
                                        <th>{{ $payslip->car_loan }}</th>
                                        <th>Bank Salary</th>
                                    </tr>

                                    <tr>
                                        <th>Total Deduction</th>
                                        <th>{{ $payslip->total_deduction }}</th>
                                        <th>Total Deduction</th>
                                    </tr>

                                    
                                    
                                    </table>


 
                                </div>


                                
                                


                                

                            </div>

                       

                            


                                {{-- endtable --}}

                            </div>

                            <table class="table table-bordered" >
                                <tr style="display: flex;justify-content: space-around">
                                    <th>Net Pay</th>
                                    <th>{{ $payslip->net_total }}</th>
                                    <th>Net Pay</th>

                                </tr>
                            </table>

                            
                            {{-- end 6 --}}
                            
                        </div>
                    </div>
                    {{-- end --}}
                </div>
            </div>
        </div>
    </div>
</div


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" >
</script>
@stop
@section('page-script')

@stop
